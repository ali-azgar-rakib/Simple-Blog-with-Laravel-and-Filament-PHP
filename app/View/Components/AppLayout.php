<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $categories = Category::withCount(['posts' => function (Builder $query) {
            $query->where('is_active', 1);
            $query->whereNotNull('published_at');
        }])
            ->orderBy('posts_count', 'desc')
            ->take(4)
            ->get();
        return view('layout.app', compact('categories'));
    }
}
