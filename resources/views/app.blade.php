{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->--}}

{{--        <title inertia>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">--}}

{{--        <!-- Styles -->--}}
{{--        <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}

{{--        <!-- Scripts -->--}}
{{--        @routes--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>--}}
{{--        <script src="{{ mix('js/app.js') }}" defer></script>--}}
{{--    </head>--}}
{{--    <body>--}}
{{--        @inertia--}}

{{--        @env ('local')--}}
{{--         <!--   <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script> -->--}}
{{--        @endenv--}}
{{--    </body>--}}
{{--</html>--}}





<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Vue JS File Upload Example</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">

    <main class="py-4">
        @yield('content')
    </main>

</div>
</body>
</html>
