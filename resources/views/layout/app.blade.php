<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ $setting->mutate_favicon }}" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting->title }}</title>
    @include('layout.partial.script')
    @include('layout.partial.style')
    @yield('script')
    @yield('style')
</head>
<body>
<div>
    <x-nav />
    <x-header />
    @yield('content')
    <x-footer />
</div>
</body>
</html>
