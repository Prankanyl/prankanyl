@extends('layout.app')

@section('styles')
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-2">
                <h3>{{ __('static.categories') }}</h3>
                <ol>
                    @forelse($categories as $item)
                        <a href="{{ route('article-category-list', ['category_slug' => $item->slug]) }}">
                            <li>{{ $item->title }}</li>
                        </a>
                    @empty
                    @endforelse
                        <a href="{{ route('article-list') }}">
                            <li>{{ __('static.show_all') }}</li>
                        </a>
                </ol>
            </div>
            <div class="col-lg-10">
                <h3>{{ __('static.articles') }}</h3>
                <div class="row row-cols-1 row-cols-md-3 g-5">
                @forelse($articles as $item)
                    <a href="{{ route('article-detail', ['category_slug' => $item->category->slug, 'slug' => $item->slug]) }}">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ $item->mutate_image }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->mutate_short_description }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                @endforelse
                </div>
                @if($articles->links())
                {{ $articles->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
