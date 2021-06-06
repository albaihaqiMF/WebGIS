<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')

    <title>{{ config('app.name', 'Laravel') }}</title>
    @stack('head')
    {{--
        color: https://colorhunt.co/palette/281939 
        https://colorhunt.co/palette/273466
        https://colorhunt.co/palette/201883
    --}}
    <style>
        #app {
            min-height: 100vh
        }
    </style>
</head>

<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
@stack('scripts')

</html>