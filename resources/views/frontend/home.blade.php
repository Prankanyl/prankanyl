@extends('layout.app')

@section('content')
    <x-news-right :id="1"/>
    @include('frontend.partial.what_am_i_doing')
    <x-news-left :id="2"/>
@endsection
