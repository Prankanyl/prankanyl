<style>
    .article img{
        height: 300px;
        width: 500px;
    }
</style>
@foreach($articles as $article)
<div class="container-fluid pb-2" style="background-color: {{ $article->color }}; color: rgb(255, 255,255)">
    <div class="row article">
        <div class="col-lg-6 p5">
            <h3 class="ms-4">{{ $article->title }}</h3>
            <p class="ms-4">{!! $article->short_description !!}</p>
            <a href="#" class="btn btn-primary ms-4 mt-5">Show More</a>
        </div>
        <div class="col-lg-4 p-3 m-5">
            <img src="{{ $article->image }}" class="img ms-5" alt="...">
        </div>
    </div>
</div>
@endforeach
