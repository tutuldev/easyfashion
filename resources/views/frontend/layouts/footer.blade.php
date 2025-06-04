<!-- Footer Wave and Section -->
<div class="relative -mt-[5px]">

    <div class="absolute top-0 left-0 w-full overflow-hidden leading-[0] z-10">
        <svg class="relative block w-full h-[60px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path d="M0,50 C250,100 750,0 1000,50 V0 H0 Z" class="fill-white"></path>
        </svg>
    </div>

    <footer class=" text-white pt-44 pb-10 px-4">
        {{-- Changed flex to grid and added responsive columns --}}
        <div class="max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- card 1 (Logo & About Us) --}}
            <div
                class="md:col-span-1 lg:col-span-1 bg-black/70 flex flex-col justify-center gap-8 px-7 py-8 rounded-lg text-center">
                <img src="{{ asset('images/brand-logo.webp') }}" alt="Logo" class="h-5 md:h-10 mx-auto" />
                <p class="text-sm leading-relaxed">Easy Fashion Ltd. providing elegance & lucrative outfit items
                    sourced both locally & globally. Proudly Made in Bangladesh.</p>
                <div class="flex justify-center gap-6 text-xl text-gray-700">
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-black text-white flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-black text-white flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-black text-white flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-lg bg-black text-white flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- card 2 (Contact Info) --}}
            <div
                class="md:col-span-1 lg:col-span-1 bg-green-400/70 flex flex-col justify-center gap-8 px-7 py-8 rounded-lg text-left text-black">
                <div class="space-y-4 text-sm">
                    <p class="flex items-start gap-4 hover:text-white transition-colors duration-300">
                        <i class="far fa-envelope text-xl mt-1 min-w-[24px]"></i> easyonline330@gmail.com
                    </p>
                    <p class="flex items-start gap-4 hover:text-white transition-colors duration-300">
                        <i class="fas fa-phone-alt text-xl mt-1 min-w-[24px]"></i> +880 1713-489530
                    </p>
                    <p class="flex items-start gap-4 hover:text-white transition-colors duration-300">
                        <i class="fa-solid fa-location-arrow text-xl mt-1 min-w-[24px]"></i> 34 B, Mofijbagh,
                        Chowdhurypuri, Dhaka-1219.
                    </p>
                    <p class="flex items-start gap-4 hover:text-white transition-colors duration-300">
                        <i class="fas fa-magnifying-glass-location text-xl mt-1 min-w-[24px]"></i> 25 Rowshan Manjil,
                        Chamelibagh, Shantinagar, Dhaka-1217
                    </p>
                </div>
            </div>

            {{-- card 3 (Services & Help / Account / Shop Outlets) --}}
            <div
                class="md:col-span-2 lg:col-span-2 bg-black/70 flex flex-col justify-center gap-5 px-7 py-8 rounded-lg">
                <h4 class="text-white font-semibold text-xl text-center sm:text-start mb-4">Services & Help</h4> {{-- Adjusted mb-3 to mb-4 for
                consistency --}}
                <div class="hidden sm:grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-12 mb-6"> {{-- Nested grid for lists
                    --}}
                    <ul class="text-sm space-y-1"> {{-- Adjusted text-lg to text-sm for consistency --}}
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Size Guide</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Gift Card &
                                Offers</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Exchange Policy</a>
                        </li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Order, Payment,
                                Shipping & Policies</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Terms of Services &
                                Conditions</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Privacy Policy</a>
                        </li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">About Us</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Contact Us</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Career</a></li>
                    </ul>
                    <ul class="text-sm space-y-1"> {{-- Adjusted text-sm for consistency, combined remaining items --}}

                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Sign In</a></li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Order Tracking</a>
                        </li>
                        <li><a href="#" class="hover:text-green-500 transition-colors duration-300">Wishlist</a></li>
                    </ul>
                </div>
                <div class="mx-auto sm:hidden mb-3">
                    <span
                        class="material-symbols-outlined text-2xl   text-white cursor-pointer hover:text-green-500 transition">menu</span>
                </div>

             <a href="#"
   class="bg-green-400 text-black py-3 px-6 rounded font-semibold flex items-center justify-center hover:bg-green-500 transition-colors duration-300">
    <i class="fa-solid fa-map-location-dot mr-2"></i>
    <span>EASY SHOP OUTLETS</span> <span class="ml-4 border-b-2 border-black w-8 pb-1"></span> </a>
            </div>
        </div>
    </footer>
</div>
