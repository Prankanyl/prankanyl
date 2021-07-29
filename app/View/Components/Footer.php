<?php

namespace App\View\Components;

use App\Models\Article\ArticleCategory;
use Illuminate\View\Component;

class Footer extends Component
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
        $article_categories = ArticleCategory::take(5)->get();
//        $project_categories = ProjectCategory::take(5)->get();
        $project_categories = [];
        $socials = [];
        return view('components.footer', compact('article_categories', 'project_categories', 'socials'));
    }
}
