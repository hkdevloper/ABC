<?php

namespace Awcodes\FilamentQuickCreate\Components;

use Awcodes\FilamentQuickCreate\QuickCreatePlugin;
use Exception;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\App;
use InvalidArgumentException;
use Livewire\Component;

class QuickCreateMenu extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public array $resources = [];

    public ?bool $rounded = null;

    public bool $hiddenIcons = false;

    public ?string $label = null;

    /**
     * @throws Exception
     */
    public function mount(): void
    {
        $this->resources = QuickCreatePlugin::get()->getResources();
        $this->rounded = QuickCreatePlugin::get()->isRounded();
        $this->hiddenIcons = QuickCreatePlugin::get()->shouldHideIcons();
        $this->label = QuickCreatePlugin::get()->getLabel();
    }

    /**
     * @throws Exception
     */
    public function bootedInteractsWithActions(): void
    {
        $this->cacheActions();
    }

    /**
     * @throws Exception
     */
    protected function cacheActions(): void
    {
        $actions = Action::configureUsing(
            $this->configureAction(...),
            fn (): array => $this->getActions(),
        );

        foreach ($actions as $action) {
            if (! $action instanceof Action) {
                throw new InvalidArgumentException('Header actions must be an instance of ' . Action::class . ', or ' . ActionGroup::class . '.');
            }
            $this->cacheAction($action);
            $this->cachedActions[$action->getName()] = $action;
        }
    }

    public function getActions(): array
    {
        return collect($this->resources)->transform(function ($resource) {
            $r = App::make($resource['resource_name']);

            return CreateAction::make($resource['action_name'])
                ->authorize($r::canCreate())
                ->model($resource['model'])
                ->slideOver(fn (): bool => QuickCreatePlugin::get()->shouldUseSlideOver())
                ->form(function ($arguments, $form) use ($r) {
                    return $r->form($form->operation('create')->columns());
                })->action(function (array $arguments, Form $form, CreateAction $action) use ($r): void {
                    $model = $action->getModel();

                    $record = $action->process(function (array $data, HasActions $livewire) use ($model, $action, $r): Model {
                        if ($translatableContentDriver = $livewire->makeFilamentTranslatableContentDriver()) {
                            $record = $translatableContentDriver->makeRecord($model, $data);
                        } else {
                            $record = new $model();
                            $record->fill($data);
                        }

                        if ($relationship = $action->getRelationship()) {
                            /** @phpstan-ignore-next-line */
                            $relationship->save($record);

                            return $record;
                        }

                        if (
                            $r::isScopedToTenant() &&
                            ($tenant = Filament::getTenant())
                        ) {
                            $relationship = $r::getTenantRelationship($tenant);

                            if ($relationship instanceof HasManyThrough) {
                                $record->save();

                                return $record;
                            }

                            return $relationship->save($record);
                        }

                        $record->save();

                        return $record;
                    });

                    $action->record($record);
                    $form->model($record)->saveRelationships();

                    if ($arguments['another'] ?? false) {
                        $action->callAfter();
                        $action->sendSuccessNotification();

                        $action->record(null);

                        // Ensure that the form record is anonymized so that relationships aren't loaded.
                        $form->model($model);

                        $form->fill();

                        $action->halt();

                        return;
                    }

                    $action->success();
                });
        })
            ->values()
            ->toArray();
    }

    public function shouldBeHidden(): bool
    {
        return QuickCreatePlugin::get()->shouldBeHidden();
    }

    public function render(): View
    {
        return view('filament-quick-create::components.create-menu');
    }
}
