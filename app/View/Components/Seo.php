<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Seo extends Component
{
    /**
     * Create a new component instance.
     */
    public $seo;

    public function __construct($seo = null)
    {
        if ($seo) {
            $this->seo = \App\Models\Seo::find($seo);
        } else {
            $this->seo = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seo')->with(['seo' => $this->seo]);
    }
}
