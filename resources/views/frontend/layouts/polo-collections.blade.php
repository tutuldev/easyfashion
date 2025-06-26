<section class="polo-collections  py-8 px-4 md:py-12 md:px-6 lg:px-8 ">
    <div class=" bg-white ">
        <div class="max-w-screen-xl mx-auto relative">
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-8 md:mb-10 ">Latest Polo Collections</h2>

        <div class="swiper-container polo-swiper w-full pb-10">
            <div class="swiper-wrapper">

                 @include('frontend.layouts.singel-card',['products' => $products])


            </div>

            {{-- <div class="swiper-pagination polo-swiper-pagination"></div> --}}
            {{-- Swiper navigation buttons will be hidden by custom CSS, but their elements are still needed by Swiper JS --}}
            <div class="swiper-button-next polo-swiper-button-next hidden"></div> {{-- Hide default Swiper buttons via Tailwind --}}
            <div class="swiper-button-prev polo-swiper-button-prev hidden"></div> {{-- Hide default Swiper buttons via Tailwind --}}
        </div>


{{-- Custom Navigation Buttons --}}
<!-- Previous Button -->
<button id="polo-custom-prev"
    class="hidden w-16 h-10 group absolute top-1/2 left-4 -translate-y-1/2 z-20 focus:outline-none cursor-pointer md:flex items-center justify-center"
    aria-label="Previous Slide">
    <span class="flex items-center">
        <!-- Left Arrow Head -->
        <span class="block w-2 h-2 border-b-2 border-l-2 border-green-300 rotate-45 -mr-2"></span>
        <!-- Left Arrow Body -->
        <span class="block h-0.5 bg-green-300 transition-all duration-300 w-6 group-hover:w-4"></span>
    </span>
</button>

<!-- Next Button -->
<button id="polo-custom-next"
    class="hidden w-16 h-10 group absolute top-1/2 right-4 -translate-y-1/2 z-20 focus:outline-none cursor-pointer md:flex items-center justify-center"
    aria-label="Next Slide">
    <span class="flex items-center">
        <!-- Right Arrow Body -->
        <span class="block h-0.5 bg-green-300 transition-all duration-300 w-6 group-hover:w-4 -mr-2"></span>
        <!-- Right Arrow Head -->
        <span class="block w-2 h-2 border-b-2 border-r-2 border-green-300 -rotate-45"></span>
    </span>
</button>
{{-- Custom Navigation Buttons End --}}





        </div>
    </div>
</section>

@push('scripts')
<script>
    var poloSwiper = new Swiper('.polo-swiper', {
        slidesPerView: 4,
        slidesPerGroup: 4,
        spaceBetween: 20,
        loop: true,
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },

        navigation: {
            nextEl: '#polo-custom-next', // Custom button ID
            prevEl: '#polo-custom-prev', // Custom button ID
        },
        // Responsive breakpoints
        breakpoints: {
            0: {
                slidesPerView: 1,
                slidesPerGroup: 1,
                spaceBetween: 10
            },
            480: {
                slidesPerView: 2,
                slidesPerGroup: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                spaceBetween: 10
            },
            1024: {
                slidesPerView: 4,
                slidesPerGroup: 4,
                spaceBetween: 20
            }
        }
    });
</script>
@endpush
