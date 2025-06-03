<section class="polo-collections bg-white py-8 px-4 md:py-12 md:px-6 lg:px-8 ">
    <div class="max-w-screen-xl mx-auto relative"> {{-- Make this div relative for absolute positioning of buttons --}}
        <h2 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-8 md:mb-10 ">Latest Polo Collections</h2>

        <div class="swiper-container polo-swiper w-full pb-10">
            <div class="swiper-wrapper">
                {{-- <div class="swiper-slide">
                    <div class="product-card bg-white w-full group overflow-hidden">
                        <div class="relative h-[400px] w-full border overflow-hidden">
                            <img src="{{ asset('images/1.webp') }}" alt="Polo T-Shirt 1"
                                class="w-full h-full object-cover block">
                            <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
                        </div>

                        <div class="py-4 flex flex-col items-start justify-between">
                            <p class="text-lg font-semibold ">Stripe Polo T-Shirt</p>

                            <div class="relative w-full h-6 mt-2">
                                <p class="text-gray-600 text-sm
                                        transition-all duration-500
                                        opacity-100 translate-y-0
                                        group-hover:opacity-0 group-hover:-translate-y-full">
                                    ৳1,150
                                </p>

                                <div
                                    class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                                    <button
                                        class="transition-all duration-300 opacity-0 translate-y-full
                                            group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                                        SELECT&nbsp;OPCTIONS
                                    </button>

                                    <button class="border-b-2 border-black text-md transition-all duration-300
                                            opacity-0 translate-y-full group-hover:opacity-100
                                            group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]">
                                        QUICKVIEW
                                    </button>

                                    <button
                                        class="transition-all duration-300 opacity-0 translate-y-full
                                            group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[200ms] delay-[200ms]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-black fill-transparent"
                                            viewBox="0 0 24 24" fill="none" stroke-width="2">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                                    2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44H13.37C14.09 5.01
                                                    15.76 4 17.5 4 20 4 22 6 22 8.5c0 3.78-3.4 6.86-8.55
                                                    11.54L12 21.35z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- singel post  --}}
                @include('frontend.singel-card')


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
