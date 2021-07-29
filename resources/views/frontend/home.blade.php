@extends('layout.app')

@section('content')
    <x-news :id="1"/>
    @include('frontend.partial.what_are_we_doing')
    <x-news :id="2"/>
@endsection
