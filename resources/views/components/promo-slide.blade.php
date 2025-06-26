<div class="swiper-slide relative h-full w-full">
    <img src="{{ asset($image) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $title }}" />
    <div class=" absolute inset-0 bg-black bg-opacity-10 z-[1]"></div>
    <div class="overlay"></div>
    <div class="blur-layer"></div>

    <div class="relative z-10 flex flex-col justify-center h-full pl-[15%] text-left text-white space-y-4">
        <p class="text-[13px] font-bold">Easy Special</p>
        <h2 class="text-4xl md:text-5xl lg:text-6xl 2xl:text-7xl font-bold leading-tight pb-10">{{ $title }}</h2>

        <a href="{{ $url }}"
           class="group inline-flex items-center justify-center
                  w-32 h-10 rounded-full border border-white hover:border-2
                  text-white font-semibold space-x-2">
            <span class="text-sm">BUY NOW</span>
            <span class="block h-0.5 w-6 bg-white
                         origin-center transform
                         transition-transform duration-300 ease-in-out
                         group-hover:scale-x-50"></span>
        </a>
    </div>
</div>
