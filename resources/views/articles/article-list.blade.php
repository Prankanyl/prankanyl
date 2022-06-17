@extends('layout.app')

@section('styles')
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('articles.form.add')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-2">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <h3 class="card-title">{{ __('static.categories') }}</h3>
                    </a>
                    <a href="{{ route('article-list') }}" class="list-group-item list-group-item-action @if(!isset($category)) active @endif" aria-current="true">
                        <i class="la la-bars"></i>
                        {{ __('static.show_all') }}
                    </a>
                    @forelse($categories as $item)
                        <a href="{{ route('article-category-list', ['category_slug' => $item->slug]) }}" class="list-group-item list-group-item-action @if(isset($category) && $item->id == $category->id) active @endif">
                            <i class="{{ $item->icon }}"></i>
                            {{ $item->title }}
                        </a>
                    @empty
                        <a href="#" class="list-group-item list-group-item-action disabled" aria-current="true">
                            {{ __('static.not_found') }}
                        </a>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-11">
                                <h3 class="card-title">
                                    {{ __('static.articles') }}
                                </h3>
                            </div>
                            <div class="col-sm-1 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ArticleAddModal">{{ __('static.btn.add') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            @forelse($articles as $item)
                                <a href="{{ route('article-detail', ['category_slug' => $item->category->slug, 'article_slug' => $item->slug]) }}">
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ $item->mutate_image }}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->title }}</h5>
                                                <p class="card-text">{!! $item->mutate_short_description !!}</p>
                                                <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p>
                                    {{ __('static.not_found') }}
                                </p>
                            @endforelse
                        </div>
                        @if($articles->links())
                            {{ $articles->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
