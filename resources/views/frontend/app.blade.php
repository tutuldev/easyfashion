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
  /* Swiper Pagination Customization */
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

  /* Hide default Swiper navigation buttons */
  .swiper-button-prev,
  .swiper-button-next {
    display: none;
  }

  /* Scroll Button Animation */
  @keyframes borderSlideInRightVanishLeft {
    0% {
      transform: scaleX(0);
      opacity: 0;
      transform-origin: right;
    }
    40% {
      transform: scaleX(1);
      opacity: 1;
      transform-origin: right;
    }
    70% {
      transform: scaleX(1);
      opacity: 1;
      transform-origin: left;
    }
    100% {
      transform: scaleX(0);
      opacity: 0;
      transform-origin: left;
    }
  }

  .animate-borderSlideInRightVanishLeft {
    animation: borderSlideInRightVanishLeft 3s ease-in-out infinite;
    display: block;
  }

  /* --- Custom Layers CSS --- */
  .overlay,
  .blur-layer {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    will-change: transform, opacity;
    z-index: 5;
  }

  /* Overlay (white) */
  .overlay {
    background: #fff;
    transform: translateX(0);
  }

  .overlay-slide {
    animation: overlay-slide 0.7s forwards ease-in-out;
  }

  @keyframes overlay-slide {
    from {
      transform: translateX(0);
    }
    to {
      transform: translateX(-100%);
    }
  }

  /* Blur Layer */
  .blur-layer {
    opacity: 0;
    z-index: 4;
    backdrop-filter: blur(8px);
  }

  /* Initial state for blur layer on page load - 80% left and visible */
  .blur-layer.initial-state {
    transform: translateX(-75%) translateZ(0);
    opacity: 1;
  }

  .blur-enter {
    animation: blur-enter 0.2s forwards ease-out;
  }

  @keyframes blur-enter {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  .blur-slide-left {
    animation: blur-slide-left 0.7s forwards ease-in-out;
  }

  @keyframes blur-slide-left {
    from {
      transform: translateX(0%) translateZ(0);
    }
    to {
      transform: translateX(-75%) translateZ(0);
    }
  }

  /* Adjust pagination position in a more specific way for the bottom bar */
  .swiper-pagination.custom-bottom-bar {
    position: static !important;
    transform: none !important;
    width: auto !important;
    display: flex;
    justify-content: center;
    flex-grow: 1;
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
