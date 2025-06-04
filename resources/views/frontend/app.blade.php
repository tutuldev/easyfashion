<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Easy Fashion')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
     <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

  /* --- Custom styles for the NEW Polo Collections Swiper --- */

/* Product Card specific styling (no change from previous) */
.product-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
}

.product-card {
    position: relative;
    overflow: hidden;
}
.new-badge {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background-color: white;
    border: 1px solid #e2e8f0;
    padding: 4px 8px;
    font-size: 0.75rem;
    font-weight: 600;
    color: #333;
    text-transform: uppercase;
    z-index: 10;
}

/* Position the swiper-container relative for absolute navigation buttons */
.swiper-container.polo-swiper {
    position: relative;
    overflow: hidden; /* Ensure slides don't overflow */
}

.swiper-container.polo-swiper .swiper-button-prev,
.swiper-container.polo-swiper .swiper-button-next {
    display: block !important;
    color: #1a73e8 !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    z-index: 10;
    margin-top: 0 !important;
}

.swiper-container.polo-swiper .swiper-button-prev {
    left: 10px !important; /* Adjust position from the left */
}

.swiper-container.polo-swiper .swiper-button-next {
    right: 10px !important; /* Adjust position from the right */
}

/* Override pagination bullet styles */
.swiper-container.polo-swiper .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    background: #cbd5e0;
    opacity: 1;
    border-radius: 50%;
    margin: 0 4px;
}

.swiper-container.polo-swiper .swiper-pagination-bullet-active {
    background: #1a73e8;
    width: 8px;
    height: 8px;
}

/* Optional: Hide buttons on small screens */
@media (max-width: 767px) {
    .swiper-container.polo-swiper .swiper-button-prev,
    .swiper-container.polo-swiper .swiper-button-next {
        display: none !important;
    }
}
/* Only hide navigation buttons for the specific polo-swiper */
.swiper-container.polo-swiper .swiper-button-prev,
.swiper-container.polo-swiper .swiper-button-next {
    display: none !important;
}

</style>
</head>

<body class="min-h-screen bg-fixed bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('images/bg-image.webp') }}');">

    <header>
        @include('frontend.layouts.navbar')
    </header>

    @yield('content')

    @include('frontend.layouts.footer')
    @include('frontend.layouts.copyright')
    @stack('scripts')
</body>

</html>
