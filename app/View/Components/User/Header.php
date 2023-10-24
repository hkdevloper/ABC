<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public string $title;
    public array $breadcrumb;

    public function __construct($title, $breadcrumb = ['Home'])
    {
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'title' => $this->title,
            'breadcrumb' => $this->breadcrumb
        ];
        return view('components..user.header')->with('data');
    }
}
