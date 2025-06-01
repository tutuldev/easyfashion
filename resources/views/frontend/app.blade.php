<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Easy Fashion')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
     <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* Pagination bar style */
    .swiper-pagination {
      @apply flex justify-center gap-3 bottom-8 w-full;
    }

    .swiper-pagination-bullet {
      width: 32px;
      height: 2px;
      background: rgba(255, 255, 255, 0.35);
      border-radius: 1px;
      opacity: 1;
      transition: all 0.3s;
    }

    .swiper-pagination-bullet-active {
      background: #fff;
      height: 3px;
    }

    /* Hide default swiper navigation buttons */
    .swiper-button-prev,
    .swiper-button-next {
      display: none;
    }

    </style>
</head>
<body class="min-h-screen bg-fixed bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('images/bg-image.webp') }}');">

    <header>
        @include('frontend.layouts.navbar')
    </header>
    {{-- banner  --}}
    @include('frontend.layouts.banner')





        <!-- Below content -->
    <div class="py-32 border border-red-600 text-center">
        <button
            class="group relative inline-flex items-center justify-center px-10 py-3 rounded-full border hover:border-2 w-36 h-14">
            <span class="flex items-center">
                <span class="block h-0.5 bg-white transition-all duration-300 w-10 group-hover:w-7"></span>
                <span class="block w-1.5 h-1.5 border-t-2 border-r-2 border-white rotate-45 -ml-1.5"></span>
            </span>
        </button>
    </div>




    @yield('content')
    @stack('scripts')
</body>

</html>
