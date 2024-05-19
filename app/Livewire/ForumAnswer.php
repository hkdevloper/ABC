<?php

namespace App\Livewire;

use App\Models\Forum;
use App\Models\ForumReply;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Get;
use Filament\Forms\Set;
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
    public Forum $forum;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('forum_id')
                    ->default($this->forum->id),
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
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('forumReplies')
                    ->fileAttachmentsVisibility('public')
                    ->required()
            ])
            ->statePath('data');
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function create(): void
    {
        $data = $this->form->getState();
        dd($data);
    }

    public function render(): View
    {
        return view('livewire.forum-answer');
    }
}
