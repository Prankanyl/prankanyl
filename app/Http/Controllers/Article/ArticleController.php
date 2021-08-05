<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Article\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $category_slug;

    public function index()
    {
        $categories = ArticleCategory::get();
        $articles = Article::with('category')->orderByDesc('id')->paginate(9);
        return view('articles.article-list', compact('categories', 'articles'));
    }

    public function articleCategory($category_slug)
    {
        $this->category_slug = $category_slug;
        $categories = ArticleCategory::get();
        $articles = Article::with('category')
            ->where(['article_category_id' => function ($query){
                $query->from('article_categories')
                    ->select('id')
                    ->whereSlug($this->category_slug);
            }])
            ->orderByDesc('id')
            ->paginate(9);

        return view('articles.article-list', compact('categories', 'articles'));
    }

    public function articleDetail($category_slug, $article_slug)
    {
        $article = Article::with('category')
            ->whereSlug($article_slug)
            ->first();
        return view('articles.article-detail', compact('article'));
    }
}
