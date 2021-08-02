@extends('layout.app')

@section('styles')
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ $article->mutate_image }}" alt="">
            </div>
            <div class="col-lg-8">
                <h3>{{ $article->title }}</h3>
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
@endsection
