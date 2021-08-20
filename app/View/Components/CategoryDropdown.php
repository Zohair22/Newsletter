<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{

    public function render(): View|Factory|Htmlable|Closure|string|Application
    {
        return view('components.category-dropdown',[
                'categories' => Category::all(),
                'currentCategory' => Category::where('name',request('category'))->orWhere('slug',request('category'))->first(),
            ]);
    }
}
