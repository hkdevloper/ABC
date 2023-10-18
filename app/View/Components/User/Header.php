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

    public function __construct($title)
    {
        // Assign the Value to the Public Variable
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'title' => $this->title
        ];
        return view('components..user.header')->with('data');
    }
}
