<nav class="absolute top-0 left-0 w-full z-10 bg-white/15 shadow-md ">
    <div class="mx-auto max-w-screen-xl px-3 lg:px-5 ">
        <div class="flex justify-between py-5 items-center">

            <!-- Left Menu -->
            <div class="hidden lg:flex space-x-4 text-base font-bold text-white">

               <!-- Home -->
            <a href="{{ url('/') }}" class="relative group overflow-hidden py-1 {{ request()->is('/') ? 'text-white' : '' }}">
                HOME
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('/') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- EID AL-ADHA 25 -->
            <a href="{{ url('/offer') }}" class="relative group overflow-hidden py-1 {{ request()->is('offer') ? 'text-white' : '' }}">
                EID AL-ADHA 25
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('offer') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- Shop -->
            <a href="{{ url('/shop') }}" class="relative group overflow-hidden py-1 {{ request()->is('shop') ? 'text-white' : '' }}">
                SHOP
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('shop') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- Easy -->
            <a href="{{ url('/easy') }}" class="relative group overflow-hidden py-1 {{ request()->is('easy') ? 'text-white' : '' }}">
                EASY
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('easy') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- How to Order -->
            <a href="{{ url('/how-to-order') }}" class="relative group overflow-hidden py-1 {{ request()->is('how-to-order') ? 'text-white' : '' }}">
                How to Order
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('how-to-order') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>


            </div>



            <div class="flex items-center space-x-3">
                <div id="menu-btn" class="flex lg:hidden items-center ">
                    <span
                        class="material-symbols-outlined text-2xl   text-white cursor-pointer hover:text-green-500 transition ">menu</span>
                </div>
                <!-- Center Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/brand-logo.webp') }}" alt="Logo" class="h-5 md:h-10  mx-auto" />
                </div>
            </div>

            <!-- Right Icons -->
            <div class="flex items-center space-x-2 sm:space-x-4 lg:space-x-8 text-white">
                <button class="hover:">
                    <span class="material-symbols-outlined">search</span>
                </button>
                <div class="relative">
                    <button class="hover:">
                        <span class="material-symbols-outlined">shopping_bag</span>
                    </button>
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                        3
                    </span>
                </div>
                <button class="hover:">
                    <span class="material-symbols-outlined">shopping_cart</span>
                </button>
                <!-- Profile Icon as Link -->
                <a href="{{ route('login') }}" class="hover:">
                    <span class="material-symbols-outlined">person</span>
                </a>

                <!-- OUTLETS Button as Link -->
                <a href="/outlets" class="bg-green-400 font-bold text-white px-4 py-2 rounded hover:">
                    OUTLETS
                </a>
            </div>

        </div>
    </div>
</nav>
