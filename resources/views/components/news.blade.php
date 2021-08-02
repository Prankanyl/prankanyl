<style>

</style>
@foreach($articles as $article)
<div class="container-fluid" style="background-color: {{ $article->color }}; color: rgb(255, 255,255)">
    <div class="row article">
        <div class="col-lg-7 .col-sm-4 p-5">
            <h3 class="ms-4 pb-1">{{ $article->title }}</h3>
            <p class="ms-4">{!! $article->short_description !!}</p>
            <a href="#" class="btn btn-primary ms-4 mt-2">{{ __('static.show_more') }}</a>
        </div>
        <div class="col-lg-3 .col-sm-8 d-flex justify-content-center">
            <img src="{{ $article->mutate_image }}" class="" alt="...">
        </div>
    </div>
</div>
@endforeach
