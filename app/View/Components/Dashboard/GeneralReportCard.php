<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralReportCard extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = "",
        public string $value = "0",
        public string $icon ="",
        public string $percentage = "0",
        public string $name ="",
        public string $status ="up",
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.general-report-card');
    }
}
