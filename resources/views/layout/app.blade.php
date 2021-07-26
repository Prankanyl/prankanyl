<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layout.partial.script')
    @include('layout.partial.style')
    @yield('script')
    @yield('style')
</head>
<body>
<div>
    <x-nav />
    <x-header />
    <x-news />
    <main class="py-4">
        @yield('content')
    </main>
    <x-footer />
</div>
</body>
</html>
