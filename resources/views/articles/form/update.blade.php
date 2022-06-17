@extends('layout.app')

@section('styles')
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mt-3 mb-3">
            <form action="{{ route('article-update', ['category_slug' => $article->category->slug,'article_slug' => $article->slug]) }}" method="post" id="UpdateArticleForm">
                @csrf
                @method('put')
                <div class="card-header">
                    <input type="text" class="form-control" name="title" id="ArticleTitle" value="{{ $article->title }}">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ $article->mutate_image }}" class="img-thumbnail" alt="">
                            <div class="mb-3">
                                <input class="form-control mt-1" type="file" name="image" id="ArticleImage" value="{{ $article->image }}">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="short_description" id="ArticleShortDescription" style="height: 200px;">
                            {!! $article->mutate_short_description !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>{{ __('static.description') }}</h3>
                            <div class="form-floating">
                                <textarea class="form-control" name="long_description" id="ArticleLongDescription" style="height: 300px;">
                                    {!! $article->mutate_long_description !!}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 d-md-block mt-2">
                            <button class="btn btn-primary">{{ __('static.btn.update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
