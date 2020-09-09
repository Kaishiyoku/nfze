<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div id="app" class="container mx-auto py-8 px-4 lg:px-20">
    <main>
        @yield('content')
    </main>

    <footer class="mt-20 text-gray-600">
        <div>
            <span>v{{ env('APP_VERSION') }}</span>
        </div>
    </footer>
</div>

</body>
</html>
