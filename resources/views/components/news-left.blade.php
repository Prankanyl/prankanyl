<div class="container-fluid" style="background-color: {{ $article->color ?? '#B3FFD4FF' }}; color: rgb(0,0,0)">
    <div class="row">
        <div class="col-sm-7">
            <h3 class="ms-3 mt-3">{{ $article->title }}</h3>
            <p class="ms-4">{!! $article->short_description !!}</p>
            <a href="{{ route('article-detail', ['category_slug' => $article->category->slug, 'article_slug' => $article->slug]) }}" class="btn btn-primary ms-4 mt-2 mb-2">{{ __('static.show_more') }}</a>
        </div>
        <div class="col-sm-5 me-0 pe-0">
            <img src="{{ $article->mutate_image }}" class="rounded float-start img-fluid" alt="..." style="height: 100%; width: 100%;">
        </div>
    </div>
</div>
