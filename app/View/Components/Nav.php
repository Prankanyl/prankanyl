<?php

namespace App\View\Components;

use App\Models\Article\ArticleCategory;
use App\Models\Project\ProjectCategory;
use Illuminate\View\Component;

class Nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $article_categories = ArticleCategory::get();
        $project_categories = ProjectCategory::get();
        return view('components.nav', compact('article_categories', 'project_categories'));
    }
}
