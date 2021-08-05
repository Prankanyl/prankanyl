@extends('layout.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-2">
                <h3>{{ __('static.categories') }}</h3>
                <form action="#" method="post">
                    <select name="project_category" id="project_category">
                        <option value="{{ null }}" selected disabled>{{ __('static.select_one') }}</option>
                        @forelse($categories as $item)
                            <option value="{{ $item->slug }}">{{ $item->title }}</option>
                        @empty
                        <p>
                            {{ __('static.not_found') }}
                        </p>
                        @endforelse
                    </select>
                    <select name="project_type" id="project_type">
                        <option value="{{ null }}" selected disabled>{{ __('static.select_one') }}</option>
                        @forelse($types as $item)
                            <option value="{{ $item->slug }}">{{ $item->title }}</option>
                        @empty
                        <p>
                            {{ __('static.not_found') }}
                        </p>
                        @endforelse
                    </select>
                    <select name="development_tool" id="development_tool">
                        <option value="{{ null }}" selected disabled>{{ __('static.select_one') }}</option>
                        @forelse($tools as $item)
                            <option value="{{ $item->slug }}">{{ $item->title }}</option>
                        @empty
                        <p>
                            {{ __('static.not_found') }}
                        </p>
                        @endforelse
                    </select>
                    <button type="submit" class="btn btn-primary">{{ __('static.sort') }}</button>
                </form>
            </div>
            <div class="col-lg-10">
                <h3>{{ __('static.projects') }}</h3>
                <div class="row row-cols-1 row-cols-md-3 g-5">
                    @forelse($projects as $item)
                        <a href="{{ route('article-detail', ['category_slug' => $item->category->slug, 'slug' => $item->slug]) }}">
                            <div class="col">
                                <div class="card" style="width: 18rem;">
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
            </div>
        </div>
    </div>
@endsection
