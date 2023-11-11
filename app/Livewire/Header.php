<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public array|object $category;
    public function __construct($category = [])
    {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.header');
    }
}
