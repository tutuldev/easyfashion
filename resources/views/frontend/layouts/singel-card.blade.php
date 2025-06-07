{{-- singel product component HTML (e.g., resources/views/components/product-card.blade.php) --}}


<div class="swiper-slide">
    <div class="product-card bg-white w-full group overflow-hidden relative ">
        <div class="relative h-[400px]  w-full border overflow-hidden">
            <img src="{{ asset('images/1.webp') }}" alt="Polo T-Shirt 1"
                class="w-full h-full object-cover block min-w-[300px]">
            <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
        </div>

        <div class="py-4 px-4 flex flex-col items-start justify-between relative">
            <p class="text-lg font-semibold ">Stripe Polo T-Shirt</p>

            <div class="relative w-full h-6 mt-1 z-10">
                <p class="text-gray-600 text-sm
                                transition-all duration-500
                                opacity-100 translate-y-0
                                group-hover:opacity-0 group-hover:-translate-y-full">
                    ৳1,150
                </p>

                <div class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                    <button class="select-options-btn transition-all duration-300 opacity-0 translate-y-full
                                    group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                        SELECT&nbsp;OPTIONS
                    </button>

                    <button class="border-b-2 border-black text-md transition-all duration-300
                                    opacity-0 translate-y-full group-hover:opacity-100
                                    group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]">
                        QUICKVIEW
                    </button>

                    <button class="wishlist-button" data-id="1" data-name="Stripe Polo T-Shirt" data-price="1150"
                        data-image="{{ asset('images/1.webp') }}" onclick="handleWishlistClick(this)">
                        <span class="material-symbols-outlined ">favorite</span>
                    </button>

                </div>
            </div>
            <div class="product-options-modal absolute left-0 w-full bg-white p-4 shadow-xl rounded-lg z-[9999] border hidden"
                style="bottom: calc(100% - 40px);">

                <div class="absolute w-0 h-0 border-l-[10px] border-l-transparent
                                border-r-[10px] border-r-transparent border-t-[10px] border-t-white
                                bottom-[-10px] left-[15%] -translate-x-1/2"></div>

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-semibold text-gray-600">SIZE</h3>
                    <button class="close-modal-btn text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mb-4">
                    <div class="relative mt-1">
                        <select
                            class="size-option-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md appearance-none">
                            <option value="">Choose an option</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <span class="material-symbols-outlined text-base">
                                arrow_drop_down
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-1 xl:space-x-3 mb-4">
                    <div class="flex border border-gray-300 rounded overflow-hidden">
                        <button class="quantity-minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">-</button>
                        <input type="text" value="1"
                            class="quantity-input w-12 text-center border-x border-gray-300 focus:outline-none"
                            readonly>
                        <button class="quantity-plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">+</button>
                    </div>
                    <button
                        class="add-to-cart-btn bg-gray-800 text-gray-400 font-semibold px-5 py-2.5 rounded hover:bg-gray-800 transition-colors">ADD
                        TO CART</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="swiper-slide">
    <div class="product-card bg-white w-full group overflow-hidden relative ">
        <div class="relative h-[400px]  w-full border overflow-hidden">
            <img src="{{ asset('images/2.webp') }}" alt="Polo T-Shirt 1"
                class="w-full h-full object-cover block min-w-[300px]">
            <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
        </div>

        <div class="py-4 px-4 flex flex-col items-start justify-between relative">
            <p class="text-lg font-semibold ">Stripe Polo T-Shirt</p>

            <div class="relative w-full h-6 mt-1 z-10">
                <p class="text-gray-600 text-sm
                                transition-all duration-500
                                opacity-100 translate-y-0
                                group-hover:opacity-0 group-hover:-translate-y-full">
                    ৳1,150
                </p>

                <div class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                    <button class="select-options-btn transition-all duration-300 opacity-0 translate-y-full
                                    group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                        SELECT&nbsp;OPTIONS
                    </button>

                    <button class="border-b-2 border-black text-md transition-all duration-300
                                    opacity-0 translate-y-full group-hover:opacity-100
                                    group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]">
                        QUICKVIEW
                    </button>

                    <button class="wishlist-button" data-id="2" data-name="Stripe Polo T-Shirt 2" data-price="11502"
                        data-image="{{ asset('images/2.webp') }}" onclick="handleWishlistClick(this)">
                        <span class="material-symbols-outlined ">favorite</span>
                    </button>

                </div>
            </div>
            <div class="product-options-modal absolute left-0 w-full bg-white p-4 shadow-xl rounded-lg z-[9999] border hidden"
                style="bottom: calc(100% - 40px);">

                <div class="absolute w-0 h-0 border-l-[10px] border-l-transparent
                                border-r-[10px] border-r-transparent border-t-[10px] border-t-white
                                bottom-[-10px] left-[15%] -translate-x-1/2"></div>

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-semibold text-gray-600">SIZE</h3>
                    <button class="close-modal-btn text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mb-4">
                    <div class="relative mt-1">
                        <select
                            class="size-option-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md appearance-none">
                            <option value="">Choose an option</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <span class="material-symbols-outlined text-base">
                                arrow_drop_down
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-1 xl:space-x-3 mb-4">
                    <div class="flex border border-gray-300 rounded overflow-hidden">
                        <button class="quantity-minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">-</button>
                        <input type="text" value="1"
                            class="quantity-input w-12 text-center border-x border-gray-300 focus:outline-none"
                            readonly>
                        <button class="quantity-plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">+</button>
                    </div>
                    <button
                        class="add-to-cart-btn bg-gray-800 text-gray-400 font-semibold px-5 py-2.5 rounded hover:bg-gray-800 transition-colors">ADD
                        TO CART</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="swiper-slide">
    <div class="product-card bg-white w-full group overflow-hidden relative ">
        <div class="relative h-[400px]  w-full border overflow-hidden">
            <img src="{{ asset('images/3.webp') }}" alt="Polo T-Shirt 1"
                class="w-full h-full object-cover block min-w-[300px]">
            <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
        </div>

        <div class="py-4 px-4 flex flex-col items-start justify-between relative">
            <p class="text-lg font-semibold ">Stripe Polo T-Shirt</p>

            <div class="relative w-full h-6 mt-1 z-10">
                <p class="text-gray-600 text-sm
                                transition-all duration-500
                                opacity-100 translate-y-0
                                group-hover:opacity-0 group-hover:-translate-y-full">
                    ৳1,150
                </p>

                <div class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                    <button class="select-options-btn transition-all duration-300 opacity-0 translate-y-full
                                    group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                        SELECT&nbsp;OPTIONS
                    </button>

                    <button class="border-b-2 border-black text-md transition-all duration-300
                                    opacity-0 translate-y-full group-hover:opacity-100
                                    group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]">
                        QUICKVIEW
                    </button>

                    <button class="wishlist-button" data-id="3" data-name="Stripe Polo T-Shirt" data-price="11503"
                        data-image="{{ asset('images/3.webp') }}" onclick="handleWishlistClick(this)">
                        <span class="material-symbols-outlined">favorite</span>
                    </button>

                </div>
            </div>
            <div class="product-options-modal absolute left-0 w-full bg-white p-4 shadow-xl rounded-lg z-[9999] border hidden"
                style="bottom: calc(100% - 40px);">

                <div class="absolute w-0 h-0 border-l-[10px] border-l-transparent
                                border-r-[10px] border-r-transparent border-t-[10px] border-t-white
                                bottom-[-10px] left-[15%] -translate-x-1/2"></div>

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-semibold text-gray-600">SIZE</h3>
                    <button class="close-modal-btn text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mb-4">
                    <div class="relative mt-1">
                        <select
                            class="size-option-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md appearance-none">
                            <option value="">Choose an option</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <span class="material-symbols-outlined text-base">
                                arrow_drop_down
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-1 xl:space-x-3 mb-4">
                    <div class="flex border border-gray-300 rounded overflow-hidden">
                        <button class="quantity-minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">-</button>
                        <input type="text" value="1"
                            class="quantity-input w-12 text-center border-x border-gray-300 focus:outline-none"
                            readonly>
                        <button class="quantity-plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">+</button>
                    </div>
                    <button
                        class="add-to-cart-btn bg-gray-800 text-gray-400 font-semibold px-5 py-2.5 rounded hover:bg-gray-800 transition-colors">ADD
                        TO CART</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="swiper-slide">
    <div class="product-card bg-white w-full group overflow-hidden relative ">
        <div class="relative h-[400px]  w-full border overflow-hidden">
            <img src="{{ asset('images/4.webp') }}" alt="Polo T-Shirt 1"
                class="w-full h-full object-cover block min-w-[300px]">
            <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
        </div>

        <div class="py-4 px-4 flex flex-col items-start justify-between relative">
            <p class="text-lg font-semibold ">Stripe Polo T-Shirt</p>

            <div class="relative w-full h-6 mt-1 z-10">
                <p class="text-gray-600 text-sm
                                transition-all duration-500
                                opacity-100 translate-y-0
                                group-hover:opacity-0 group-hover:-translate-y-full">
                    ৳1,150
                </p>

                <div class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                    <button class="select-options-btn transition-all duration-300 opacity-0 translate-y-full
                                    group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                        SELECT&nbsp;OPTIONS
                    </button>

                    <button class="border-b-2 border-black text-md transition-all duration-300
                                    opacity-0 translate-y-full group-hover:opacity-100
                                    group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]">
                        QUICKVIEW
                    </button>

                    <button class="wishlist-button" data-id="4" data-name="Stripe Polo T-Shirt" data-price="11504"
                        data-image="{{ asset('images/4.webp') }}" onclick="handleWishlistClick(this)">
                        <span class="material-symbols-outlined ">favorite</span>
                    </button>

                </div>
            </div>
            <div class="product-options-modal absolute left-0 w-full bg-white p-4 shadow-xl rounded-lg z-[9999] border hidden"
                style="bottom: calc(100% - 40px);">

                <div class="absolute w-0 h-0 border-l-[10px] border-l-transparent
                                border-r-[10px] border-r-transparent border-t-[10px] border-t-white
                                bottom-[-10px] left-[15%] -translate-x-1/2"></div>

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-semibold text-gray-600">SIZE</h3>
                    <button class="close-modal-btn text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mb-4">
                    <div class="relative mt-1">
                        <select
                            class="size-option-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md appearance-none">
                            <option value="">Choose an option</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <span class="material-symbols-outlined text-base">
                                arrow_drop_down
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-1 xl:space-x-3 mb-4">
                    <div class="flex border border-gray-300 rounded overflow-hidden">
                        <button class="quantity-minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">-</button>
                        <input type="text" value="1"
                            class="quantity-input w-12 text-center border-x border-gray-300 focus:outline-none"
                            readonly>
                        <button class="quantity-plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">+</button>
                    </div>
                    <button
                        class="add-to-cart-btn bg-gray-800 text-gray-400 font-semibold px-5 py-2.5 rounded hover:bg-gray-800 transition-colors">ADD
                        TO CART</button>
                </div>
            </div>
        </div>
    </div>
</div>




@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const globalOverlay = document.getElementById('global-overlay'); // Get the single global overlay

            // ফাংশন যা একটি নির্দিষ্ট মডাল এবং গ্লোবাল ওভারলে ওপেন করে
            const openModalAndOverlay = (modal) => {
                // প্রথমে, অন্যান্য সব মডাল বন্ধ করুন
                document.querySelectorAll('.product-options-modal:not(.hidden)').forEach(otherModal => {
                    otherModal.classList.add('hidden');
                });

                modal.classList.remove('hidden');
                if (globalOverlay) {
                    globalOverlay.classList.remove('hidden');
                }
            };

            // ফাংশন যা একটি নির্দিষ্ট মডাল এবং গ্লোবাল ওভারলে বন্ধ করে
            const closeModalAndOverlay = (modal) => {
                modal.classList.add('hidden');
                // কোনো মডাল খোলা না থাকলে তবেই গ্লোবাল ওভারলে লুকান
                const anyModalOpen = document.querySelectorAll('.product-options-modal:not(.hidden)').length > 0;
                if (globalOverlay && !anyModalOpen) {
                    globalOverlay.classList.add('hidden');
                }
            };

            // প্রত্যেকটি প্রোডাক্ট কার্ডের জন্য ইভেন্ট লিসেনার সেট করুন
            document.querySelectorAll('.product-card').forEach(productCard => {
                const selectOptionsBtn = productCard.querySelector('.select-options-btn');
                const productModal = productCard.querySelector('.product-options-modal');
                const closeModalBtn = productModal.querySelector('.close-modal-btn');
                const quantityInput = productModal.querySelector('.quantity-input');
                const quantityMinusBtn = productModal.querySelector('.quantity-minus-btn');
                const quantityPlusBtn = productModal.querySelector('.quantity-plus-btn');

                if (selectOptionsBtn && productModal) {
                    selectOptionsBtn.addEventListener('click', (event) => {
                        event.stopPropagation(); // ইভেন্ট বুদবুদ হওয়া বন্ধ করুন

                        if (productModal.classList.contains('hidden')) {
                            openModalAndOverlay(productModal);
                        } else {
                            closeModalAndOverlay(productModal);
                        }
                    });
                }

                if (closeModalBtn && productModal) {
                    closeModalBtn.addEventListener('click', (event) => {
                        event.stopPropagation();
                        closeModalAndOverlay(productModal);
                    });
                }

                // Quantity update buttons
                if (quantityMinusBtn && quantityInput) {
                    quantityMinusBtn.addEventListener('click', () => {
                        let currentQuantity = parseInt(quantityInput.value);
                        currentQuantity -= 1;
                        if (currentQuantity < 1) currentQuantity = 1;
                        quantityInput.value = currentQuantity;
                    });
                }

                if (quantityPlusBtn && quantityInput) {
                    quantityPlusBtn.addEventListener('click', () => {
                        let currentQuantity = parseInt(quantityInput.value);
                        currentQuantity += 1;
                        quantityInput.value = currentQuantity;
                    });
                }
            });

            // ঐচ্ছিক: গ্লোবাল ওভারলেতে ক্লিক করলে মডাল বন্ধ করুন
            if (globalOverlay) {
                globalOverlay.addEventListener('click', () => {
                    // সব খোলা মডাল খুঁজুন এবং বন্ধ করুন
                    document.querySelectorAll('.product-options-modal:not(.hidden)').forEach(modal => {
                        closeModalAndOverlay(modal);
                    });
                });
            }
        });
    </script>
@endpush
