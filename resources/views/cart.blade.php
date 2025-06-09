@extends('frontend.app')
@section('title', 'Cart')
@section('content')

    <div class="bg-white">
        <div class="h-24"></div> {{-- Spacer for fixed header --}}

        {{-- Page Title Section --}}
        <div class="h-40 border flex items-center justify-center bg-gray-200">
            <h1 class="text-5xl font-bold text-white px-3 py-3 bg-black">Cart</h1>
        </div>

        {{-- Main Cart Content Area --}}
        <div class="max-w-screen-xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-md">

                {{-- Progress Stepper Section --}}
                <div class="flex justify-between items-start mb-4 text-gray-500 relative">
                    <div class="flex flex-col items-center flex-1 z-10">
                        <span class="material-icons text-2xl mb-1 text-gray-800">shopping_bag</span>
                        <div class="font-semibold text-sm text-gray-800">SHOPPING BAG</div>
                        <div class="text-xs mt-1">REVIEW YOUR ITEMS</div>
                    </div>

                    <div class="flex flex-col items-center flex-1 z-10">
                        <span class="material-icons text-2xl mb-1">local_shipping</span>
                        <div class="font-medium text-sm">SHIPPING AND CHECKOUT</div>
                        <div class="text-xs mt-1">ENTER YOUR DETAILS</div>
                    </div>

                    <div class="flex flex-col items-center flex-1 z-10">
                        <span class="material-icons text-2xl mb-1">check_circle_outline</span>
                        <div class="font-medium text-sm">CONFIRMATION</div>
                        <div class="text-xs mt-1">REVIEW YOUR ORDER</div>
                    </div>
                </div>

                <div class="w-full bg-gray-200 h-1 rounded-full mb-12 relative">
                    <div id="progress-bar" class="absolute top-0 left-0 h-full bg-blue-500 rounded-full transition-all duration-500 ease-in-out" style="width: 33%;"></div>
                </div>


                {{-- Cart Table Header --}}
                <div class="hidden md:grid grid-cols-5 text-gray-500 font-medium text-sm border-b pb-4 mb-4 uppercase">
                    <div class="col-span-2">Product</div>
                    <div>Price</div>
                    <div class="text-center">Quantity</div>
                    <div class="text-right">Subtotal</div>
                    <div></div> {{-- For the remove button column --}}
                </div>

                {{-- Products will be rendered here by JavaScript --}}
                <div id="mainCartItemsContainer">
                    {{-- JavaScript will populate this div with product items --}}
                    {{-- Initially, a loading message or empty message can be here --}}
                    <p class="text-gray-600 text-center py-8" id="noProductsMessageMainCart">Loading cart...</p>
                </div>

                {{-- Coupon Code and Cart Totals Section --}}
                <div id="mainCartTotalsSection" class="flex flex-col lg:flex-row justify-between items-start mt-8">
                    {{-- Coupon Code Input --}}
                    <div class="w-full lg:w-1/3 mb-8 lg:mb-0">
                        <label for="coupon" class="block text-gray-700 text-sm font-semibold mb-2">Coupon code</label>
                        <div class="flex">
                            <input type="text" id="coupon" class="flex-grow shadow appearance-none border rounded-l py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" placeholder="Coupon code" />
                            <button class="bg-gray-700 hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-r text-sm focus:outline-none focus:shadow-outline">
                                APPLY
                            </button>
                        </div>
                    </div>

                    {{-- Cart Totals Summary --}}
                    <div class="w-full lg:w-1/3 p-6 rounded-lg">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">CART TOTALS</h3>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 text-sm">SUBTOTAL</span>
                            <span class="font-semibold text-gray-800 text-sm" id="mainCartSubtotal">৳0</span>
                        </div>
                        <div class="py-2 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600 text-sm">SHIPPING</span>
                                <span class="font-semibold text-gray-800 text-sm">Inside Dhaka & Free Delivery</span>
                            </div>
                            <p class="text-xs text-gray-500 mb-1">Shipping is in Dhaka.</p>
                            <button class="text-indigo-600 hover:text-indigo-800 flex items-center text-xs font-medium">
                                <span class="material-icons text-sm mr-1">edit_location_alt</span> CHANGE ADDRESS
                            </button>
                        </div>
                        <div class="flex justify-between items-center py-4">
                            <span class="text-gray-800 font-bold text-base">TOTAL</span>
                            <span class="text-gray-800 font-bold text-base" id="mainCartTotal">৳0</span>
                        </div>
                    <a href="/checkout"
                        class="w-full bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 rounded-md mt-4 text-sm focus:outline-none focus:shadow-outline block text-center">
                        PROCEED TO CHECKOUT
                    </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-40"></div>

@endsection
