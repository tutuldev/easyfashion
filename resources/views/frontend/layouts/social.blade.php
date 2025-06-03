<section class="connect-section py-8 px-4 bg-white">
    <div class="max-w-screen-xl mx-auto text-center">
        <div class="flex flex-col items-center gap-6 sm:flex-col md:flex-row md:justify-between lg:justify-between">

            {{-- Image for Call --}}
            <div class="w-full sm:w-3/4 md:w-1/3 lg:w-1/3">
                <a href="#" class="block"> {{-- Replace # with your actual call link, e.g., "tel:+880123456789" --}}
                    <div class="relative w-full overflow-hidden h-[200px] sm:h-auto sm:aspect-video">
                        {{-- object-cover এর বদলে object-contain ব্যবহার করা হয়েছে --}}
                        <img src="{{ asset('images/call.webp') }}" alt="Call us" class="absolute top-0 left-0 w-full h-full object-contain rounded-lg shadow-md">
                    </div>
                </a>
            </div>

            {{-- Image for Instagram --}}
            <div class="w-full sm:w-3/4 md:w-1/3 lg:w-1/3">
                <a href="#" target="_blank" rel="noopener noreferrer" class="block"> {{-- Replace # with your actual Instagram profile link --}}
                    <div class="relative w-full overflow-hidden h-[200px] sm:h-auto sm:aspect-video">
                        {{-- object-cover এর বদলে object-contain ব্যবহার করা হয়েছে --}}
                        <img src="{{ asset('images/inst.webp') }}" alt="Follow us on Instagram" class="absolute top-0 left-0 w-full h-full object-contain rounded-lg shadow-md">
                    </div>
                </a>
            </div>

            {{-- Image for WhatsApp --}}
            <div class="w-full sm:w-3/4 md:w-1/3 lg:w-1/3">
                <a href="#" target="_blank" rel="noopener noreferrer" class="block"> {{-- Replace # with your actual WhatsApp link, e.g., "https://wa.me/880123456789" --}}
                    <div class="relative w-full overflow-hidden h-[200px] sm:h-auto sm:aspect-video">
                        {{-- object-cover এর বদলে object-contain ব্যবহার করা হয়েছে --}}
                        <img src="{{ asset('images/what.webp') }}" alt="Message us on WhatsApp" class="absolute top-0 left-0 w-full h-full object-contain rounded-lg shadow-md">
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
