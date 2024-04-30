<?php

namespace App\Livewire;

use Filament\Forms\Components\RichEditor;
use Illuminate\Contracts\View\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class ForumAnswer extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('body')
                    ->label('')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->autofocus()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('forumReplies')
                    ->fileAttachmentsVisibility('public')
                    ->autofocus()
                    ->required()
            ])
            ->statePath('data');
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    #[NoReturn] public function create(): void
    {
        $this->validate();
        dd($this->data);
    }

    public function render(): View
    {
        return view('livewire.forum-answer');
    }
}
