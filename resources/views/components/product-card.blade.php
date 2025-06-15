<div class="swiper-slide">
    <div class="product-card bg-white w-full group overflow-hidden relative ">
        <div class="relative h-[400px] w-full border overflow-hidden">
            <img src="{{ asset($image) }}" alt="{{ $name }}"
                class="w-full h-full object-cover block min-w-[300px]">
            <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
        </div>

        <div class="py-4 px-4 flex flex-col items-start justify-between relative">
            <p class="text-lg font-semibold ">{{ $name }}</p>

            <div class="relative w-full h-6 mt-1 z-10">
                <p class="text-gray-600 text-sm transition-all duration-500 opacity-100 translate-y-0 group-hover:opacity-0 group-hover:-translate-y-full">
                    ৳{{ $price }}
                </p>

                <div class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                    <button class="select-options-btn transition-all duration-300 opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                        SELECT&nbsp;OPTIONS
                    </button>
                    <button class="open-quickview-btn border-b-2 border-black text-md transition-all duration-300 opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]"
                        data-product-id="{{ $id }}"
                        data-product-name="{{ $name }}"
                        data-product-price="{{ $price }}"
                        data-product-image="{{ asset($image) }}"
                        data-product-sizes='@json($sizes)'>
                        QUICKVIEW
                    </button>
                    <button class="wishlist-button transition-all duration-300 opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[150ms] delay-[200ms]"
                        data-id="{{ $id }}"
                        data-name="{{ $name }}"
                        data-price="{{ $price }}"
                        data-image="{{ asset($image) }}"
                        onclick="handleWishlistClick(this)">
                        <span class="material-symbols-outlined ">favorite</span>
                    </button>
                </div>
            </div>

            {{-- product option model --}}
            <div id="product-opction" class="product-options-modal absolute left-0 w-full bg-white p-4 shadow-xl rounded-lg z-[9999] border hidden"
                style="bottom: calc(100% - 40px);">
                <div class="absolute w-0 h-0 border-l-[10px] border-l-transparent border-r-[10px] border-r-transparent border-t-[10px] border-t-white bottom-[-10px] left-[15%] -translate-x-1/2"></div>

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
                        <select class="product-size-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md appearance-none">
                            <option value="">Choose an option</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <span class="material-symbols-outlined text-base">arrow_drop_down</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-1 xl:space-x-3 mb-4">
                    <div class="flex border border-gray-300 rounded overflow-hidden">
                        <button class="quantity-minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">-</button>
                        <input type="text" value="1" class="quantity-input w-12 text-center border-x border-gray-300 focus:outline-none" readonly>
                        <button class="quantity-plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200">+</button>
                    </div>
                    <button class="add-to-cart-btn bg-gray-800 text-gray-400 font-semibold px-5 py-2.5 rounded hover:bg-gray-800 transition-colors"
                        data-product-id="{{ $id }}"
                        data-product-name="{{ $name }}"
                        data-product-price="{{ $price }}"
                        data-product-image="{{ asset($image) }}">
                        ADD TO CART
                    </button>
                </div>
            </div>

            {{-- quick view --}}
            <div id="quickview-modal" class="fixed hidden inset-0 bg-black bg-opacity-50 z-[9999] items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg relative w-[90vw] max-w-4xl max-h-[90vh] overflow-y-auto">
                    <button id="quickview-close-btn" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl font-bold leading-none cursor-pointer">&times;</button>

                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2 flex justify-center items-center p-4">
                            <img id="quickview-product-image" src="{{ asset($image) }}" alt="Product Image" class="max-w-full h-auto object-contain">
                        </div>

                        <div class="md:w-1/2 p-4 flex flex-col justify-between">
                            <div>
                                <h2 id="quickview-product-name" class="text-2xl font-semibold mb-4">{{ $name }}</h2>
                                <p id="quickview-product-price" class="text-xl font-bold mb-4">৳{{ $price }}</p>

                                <div id="quickview-size-container" class="mb-4">
                                    <label for="quickview-size-select" class="block text-gray-700 text-sm font-bold mb-2">SIZE:</label>
                                    <select id="quickview-size-select" class="product-size-select block w-full border border-gray-400 px-4 py-2 rounded shadow focus:outline-none">
                                        <option value="">Choose an option</option>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center mb-6 border border-gray-300 rounded overflow-hidden w-32 h-10">
                                    <button id="quickview-quantity-minus-btn" class="quantity-minus-btn w-10 h-full text-lg text-gray-600 hover:bg-gray-100">−</button>
                                    <input type="text" id="quickview-quantity-input" value="1" class="quantity-input w-12 text-center border-l border-r border-gray-300 h-full focus:outline-none" readonly>
                                    <button id="quickview-quantity-plus-btn" class="quantity-plus-btn w-10 h-full text-lg text-gray-600 hover:bg-gray-100">+</button>
                                </div>

                                <button id="quickview-add-to-cart-btn" class="add-to-cart-btn bg-black text-white px-6 py-3 rounded-md hover:bg-gray-800 transition-colors duration-300 w-full mb-4"
                                    data-product-id="{{ $id }}" data-product-name="{{ $name }}" data-product-price="{{ $price }}" data-product-image="{{ asset($image) }}">
                                    ADD TO CART
                                </button>

                                <button id="quickview-wishlist-button" class="wishlist-button border border-gray-300 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-100 transition-colors duration-300 w-full flex items-center justify-center"
                                    data-id="{{ $id }}" data-name="{{ $name }}" data-price="{{ $price }}" data-image="{{ asset($image) }}"
                                    onclick="handleWishlistClick(this)">
                                    <span class="material-symbols-outlined mr-2">favorite</span>
                                    ADD TO WISHLIST
                                </button>
                            </div>

                            <div class="text-sm text-gray-600 mt-4">
                                <p>SKU: {{ $sku ?? 'N/A' }}</p>
                                <p>Categories:
                                    @foreach($categories as $cat)
                                        <a href="#" class="hover:underline">{{ $cat }}</a>@if(!$loop->last),@endif
                                    @endforeach
                                </p>
                            </div>

                            <div class="mt-4 flex space-x-2">
                                <span class="text-gray-700 font-semibold mr-2">SHARE:</span>
                                <a href="#" class="text-gray-600 hover:text-black"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-gray-600 hover:text-black"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-gray-600 hover:text-black"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
