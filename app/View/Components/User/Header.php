<?php

namespace App\View\Components\User;

use App\Models\Category;
use App\Models\Company;
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
    public string $type;

    public function __construct($title, $breadcrumb = ['Home'], $type = 'company')
    {
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $breadcrumb = $this->breadcrumb;
        $category = Category::where('type', $this->type)->where('is_active', 1)->where('is_deleted', 0)->get();
        $data = compact('title', 'breadcrumb', 'category');
        return view('components.user.header')->with($data);
    }
}
