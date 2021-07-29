<?php

namespace App\View\Components;

use App\Models\Article\Article;
use Illuminate\View\Component;

class News extends Component
{
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $id
     * @return \Closure|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $articles = Article::whereId($this->id)->get();
        return view('components.news', compact('articles'));
    }
}
