@extends('layout.app')

@section('styles')
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-11">
                        <h3 class="card-title">{{ $article->title }}</h3>
                    </div>
                    <div class="col-sm-1 d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="{{ route('article-update-form', ['category_slug' => $article->category->slug,'article_slug' => $article->slug]) }}" method="get" id="update-article-form">
                            <button class="btn btn-primary">{{ __('static.btn.update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ $article->mutate_image }}" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-lg-8">
                        {!! $article->mutate_short_description !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>{{ __('static.description') }}</h3>
                        {!! $article->mutate_long_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
