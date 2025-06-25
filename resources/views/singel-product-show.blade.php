@extends('frontend.app')
@section('title', 'singel product')
@section('content')


<div id="singel-product-quickview-modal" class="pt-36 bg-white  z-[9999]  ">
    <div class="mx-auto max-w-screen-2xl  max-h-[90vh] ">


        <div class="flex flex-col md:flex-row gap-10">
            <div class="md:w-1/2 flex justify-center items-center px-10">
                <img id="quickview-product-image" src="{{asset('images/3.webp')}}" alt="Product Image" class="max-w-full h-auto object-contain">
            </div>

            <div class="md:w-1/2  flex flex-col justify-between bg-sky-100 p-10">
                <div>
                    <h2 id="quickview-product-name" class="text-5xl font-semibold mb-4">Full Sleeve Classic Fit Shirt</h2>
                    <p id="quickview-product-price" class="text-xl font-bold mb-4">৳499</p>

                    <div id="quickview-size-container" class="mb-4">
                        <label for="quickview-size-select" class="block text-gray-700 text-sm font-bold mb-2">SIZE:</label>
                        <select id="quickview-size-select" class="product-size-select block w-full border border-gray-400 px-4 py-2 rounded shadow focus:outline-none">
                            <option value="">Choose an option</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <div class="flex items-center mb-6 border border-gray-300 rounded overflow-hidden w-32 h-10">
                        <button id="quickview-quantity-minus-btn" class="quantity-minus-btn w-10 h-full text-lg text-gray-600 hover:bg-gray-100 bg-white">−</button>
                        <input type="text" id="quickview-quantity-input" value="1" class="quantity-input w-12 text-center border-l border-r border-gray-300 h-full focus:outline-none" readonly>
                        <button id="quickview-quantity-plus-btn" class="quantity-plus-btn w-10 h-full text-lg text-gray-600 hover:bg-gray-100 bg-white">+</button>
                    </div>

                    <button id="quickview-add-to-cart-btn" class="add-to-cart-btn bg-black text-white px-6 py-3 rounded-md hover:bg-gray-800 transition-colors duration-300 w-full mb-4"
                        data-product-id="1" data-product-name="Classic White T-Shirt" data-product-price="499" data-product-image="images/products/shirt.jpg">
                        ADD TO CART
                    </button>

                    <button id="quickview-wishlist-button" class="wishlist-button border border-gray-300 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-100 transition-colors duration-300 w-full flex items-center justify-center"
                        data-id="1" data-name="Classic White T-Shirt" data-price="499" data-image="images/products/shirt.jpg"
                        onclick="handleWishlistClick(this)">
                        <span class="material-symbols-outlined mr-2">favorite</span>
                        ADD TO WISHLIST
                    </button>
                </div>

                <div class="text-sm text-gray-600 mt-4">
                    <p>SKU: TSHIRT-001</p>
                    <p>Categories:
                        <a href="#" class="hover:underline">Men</a>,
                        <a href="#" class="hover:underline">T-Shirts</a>
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
{{-- description  --}}
<div class="bg-white pt-20 ">
    <div class="flex flex-col sm:flex-row mx-auto max-w-screen-2xl justify-between ">
    <div class=" flex-1 ">
        <h3 class="text-black font-bold text-2xl">Description</h3>
        <p class=" text-xl font-semibold mt-10 mb-20">Full Sleeve Classic Fit Shirt</p>
        <div class="flex flex-col gap-y-8">
            <p class="text-lg">– Free Delivery Inside Dhaka City.</p>
            <p class="text-lg">– Outside Dhaka City, 100 BDT will be charged as delivery Charge.</p>
            <p class="text-lg">– Enjoy Free Delivery for shopping products worth 1000 BDT or more.</p>
            <p class="text-lg">Super Fast Delivery Nationwide, Get your products in Dhaka within 48 hours or 2 Days.</p>
            <p class="text-lg">For outside Dhaka, Delivery within 96 Hours or 4 Days.</p>
        </div>
    </div>
    <div class=" flex-1 px-20">
        <h3 class="text-black font-bold text-2xl">Specifications</h3>
        <div class="flex justify-between mt-8">
            <span class="font-semibold">Size</span>
            <p>15, 15.5, 16, 16.5</p>
        </div>
    </div>
</div>
</div>

{{-- related product --}}
    <section class="px-4 py-20 bg-white">
     <div class="max-w-screen-xl mx-auto grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @for ($i = 3; $i <= 10; $i++)
            <div class="product">
                <div class="justin-product-card bg-white w-full group overflow-hidden relative ">
                    <div class="relative h-[400px] w-full border overflow-hidden">
                        <img src="{{ asset('images/pro-' . $i . '.webp') }}" alt="Polo T-Shirt {{ $i }}"
                            class="w-full h-full object-cover block min-w-[300px]">
                        <span class="absolute bottom-2 left-2 bg-white text-[10px] px-2 py-0.5">New</span>
                    </div>

                    <div class="py-4 px-4 flex flex-col items-start justify-between relative">
                        <p class="text-lg font-semibold ">Stripe Polo T-Shirt {{ $i }}</p>

                        <div class="relative w-full h-6 mt-1 z-10">
                            <p class="text-gray-600 text-sm transition-all duration-500 opacity-100 translate-y-0 group-hover:opacity-0 group-hover:-translate-y-full">
                                ৳1,150
                            </p>

                            <div class="flex items-center gap-3 text-[14px] font-semibold absolute top-0 left-0 text-gray-600">
                                <button class="select-options-btn transition-all duration-300 opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[0ms] delay-[200ms]">
                                    SELECT&nbsp;OPTIONS
                                </button>

                                <button class="border-b-2 border-black text-md transition-all duration-300 opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[100ms] delay-[200ms]">
                                    QUICKVIEW
                                </button>

                                <button class="transition-all duration-300 opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0 group-hover:delay-[200ms] delay-[200ms]">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 stroke-black fill-transparent" viewBox="0 0 24 24" fill="none"
                                        stroke-width="2">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                            2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44H13.37C14.09 5.01
                                            15.76 4 17.5 4 20 4 22 6 22 8.5c0 3.78-3.4 6.86-8.55
                                            11.54L12 21.35z" />
                                    </svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
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
                                    class="add-to-cart-btn bg-gray-800 text-gray-400 font-semibold px-4 py-2.5 rounded hover:bg-gray-800 transition-colors">ADD
                                    TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>



    </section>
@endsection




