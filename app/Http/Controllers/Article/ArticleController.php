<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article\Article;
use App\Models\Article\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $categories = ArticleCategory::get();
        $articles = Article::with('category')->orderByDesc('id')->paginate(9);
        return view('articles.article-list', compact('categories', 'articles'));
    }

    public function articleCategory($category_slug)
    {
        $categories = ArticleCategory::get();
        $category = ArticleCategory::whereSlug($category_slug)->first();
        $articles = Article::with('category')
            ->where('article_category_id', $category->id)
            ->orderByDesc('id')
            ->paginate(9);

        return view('articles.article-list', compact('categories', 'category', 'articles'));
    }

    public function articleDetail($category_slug, $article_slug)
    {
        $article = Article::with('category')
            ->whereSlug($article_slug)
            ->first();
        return view('articles.article-detail', compact('article'));
    }

    public function articleAddFrom(Request $request)
    {
        $article = collect();
        return view('articles.form.update', compact('article'));
    }

    public function articleUpdateFrom($category_slug, $article_slug)
    {
        $article = Article::with('category')
            ->whereSlug($article_slug)
            ->first();
        return view('articles.form.update', compact('article'));
    }

    public function articleAdd(ArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->user_id = $request->user_id;
        $article->article_category_id = $request->article_category_id;
        $article->short_description = $request->short_description;
        $article->long_description = $request->long_description;
        $article->place = $request->place;
        $article->slug = str_slug($request->title);
        $article->save();

        return view('articles.article-detail', compact('article'));
    }

    public function articleUpdate(ArticleRequest $request, $category_slug, $article_slug)
    {
        $article = Article::whereSlug($article_slug)->first();
        $article->title = $request->title;
        $article->user_id = $request->user_id;
        $article->article_category_id = $request->article_category_id;
        $article->short_description = $request->short_description;
        $article->long_description = $request->long_description;
        $article->place = $request->place;
        $article->slug = str_slug($request->title);
        $article->update();

        return view('articles.article-detail', compact('article'));
    }

    public function articleDelete($category_slug, $article_slug)
    {
        $article = Article::whereSlug($article_slug)->delete();
        return redirect()->back();
    }
}
