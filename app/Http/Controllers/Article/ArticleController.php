<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Article\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::get();
        $articles = Article::with('category')->paginate(9);
        return view('articles.article-list', compact('categories', 'articles'));
    }

    public function articleCategory($category_slug)
    {
        $categories = ArticleCategory::get();
        $articles = Article::get();
        return view('articles.article-list', compact('categories', 'articles'));
    }

    public function articleDetail($category_slug, $article_slug)
    {
        $article = Article::with('category')->first();
        return view('articles.article-detail', compact('article'));
    }
}
