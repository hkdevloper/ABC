<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class SelectUser extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select.-user')->with(['users' => $this->users]);
    }
}
