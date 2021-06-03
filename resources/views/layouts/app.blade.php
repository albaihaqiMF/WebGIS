<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')

    <title>{{ config('app.name', 'Laravel') }}</title>
    @stack('head')
    <style>
        #app{
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