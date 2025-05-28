<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Easy Fashion')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
     <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-image.webp') }}');">
    <header>
        @include('frontend.layouts.navbar')
    </header>

    @yield('content')
    @stack('scripts')
</body>

</html>
