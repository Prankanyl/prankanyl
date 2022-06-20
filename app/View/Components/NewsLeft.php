<?php

namespace App\View\Components;

use App\Models\Article\Article;
use App\Models\Project\Project;
use Illuminate\View\Component;

class NewsLeft extends Component
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
        $article = Project::whereId($this->id)->first();
        if(is_null($article)){
            $article = Project::inRandomOrder()->first();
        }
        return view('components.news-left', compact('article'));
    }
}
