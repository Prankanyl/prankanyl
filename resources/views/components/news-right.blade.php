<div class="container-fluid" style="background-color: {{ $article->color }}; color: rgb(255, 255,255)">
    <div class="row article">
        <div class="col-sm-auto ms-0 ps-0">
            <img src="{{ $article->mutate_image }}" class="rounded float-start img-fluid" alt="..." style="height: auto;">
        </div>
        <div class="col-sm">
            <h3 class="ms-3 mt-3">{{ $article->title }}</h3>
            <p class="ms-4">{!! $article->short_description !!}</p>
            <a href="{{ route('article-detail', ['category_slug' => $article->category->slug, 'article_slug' => $article->slug]) }}" class="btn btn-primary ms-4 mt-2">{{ __('static.show_more') }}</a>
        </div>
    </div>
</div>
