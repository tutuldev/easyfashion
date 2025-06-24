@extends('frontend.app')
@section('title', 'Category')
@section('content')

    {{--just remove the navbar space --}}
    <div class="bg-white pt-24">
        <div class="bg-gray-200">
            <div class="max-w-screen-xl  mx-auto  py-16">
            <h1 class="text-4xl font-bold text-gray-600">MEN</h1>
        </div>
        </div>
    </div>

    {{-- filter button  --}}
    <div class="bg-white">
        <div class="max-w-screen-xl mx-auto px-4 py-8 ">
      <div class="flex flex-col md:flex-row items-center justify-between mb-8">
        <div class="flex items-center space-x-4 mb-4 md:mb-0">
          <div class="flex items-center">
            <button>
                <span class="material-symbols-outlined mr-2">
                    discover_tune
                </span>
            </button>
            <span class=" font-semibold text-gray-700">FILTERS:</span>
          </div>
          <div class="flex items-center space-x-2">
            <span class="text-gray-600 text-sm">50</span>
            <input type="range" min="0" max="200" value="50" class="w-32 h-1 bg-gray-200 rounded-lg appearance-none cursor-pointer range-sm">
            <span class="text-gray-600 text-sm">200</span>
          </div>
          <div class="relative">
            <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option>Choose SIZE</option>
              <option>Small</option>
              <option>Medium</option>
              <option>Large</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <span class="material-icons">keyboard_arrow_down</span>
            </div>
          </div>
          <div class="relative">
            <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option>Categories</option>
              <option>Category 1</option>
              <option>Category 2</option>
              <option>Category 3</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <span class="material-icons">keyboard_arrow_down</span>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col md:flex-row items-center justify-between mt-8">
        <div class="text-gray-600 mb-4 md:mb-0">
          SHOWING 1-10 OF 353 RESULTS
        </div>
        <div class="flex items-center space-x-4">
          <div class="hidden lg:flex items-center space-x-2 text-gray-600 ">
            <span class="mr-2">VIEW</span>
            <a href="#" class="px-2 py-1 hover:text-blue-500">2</a>
            <a href="#" class="px-2 py-1 hover:text-blue-500">3</a>
            <a href="#" class="px-2 py-1 hover:text-blue-500 underline">4</a>
            <a href="#" class="px-2 py-1 hover:text-blue-500">6</a>
          </div>
          <div class="relative">
            <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option>SORT BY LATEST</option>
              <option>Price: Low to High</option>
              <option>Price: High to Low</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <span class="material-icons">keyboard_arrow_down</span>
            </div>
          </div>
            <div class="flex items-center">
            <button>
                <span class="material-symbols-outlined mr-2">
                    discover_tune
                </span>
            </button>
            <span class=" font-semibold text-gray-700">FILTERS</span>
          </div>
        </div>
      </div>
    </div>
    </div>
    {{-- end filter button  --}}

    <section class="px-4 py-8 bg-white">
     <div class="max-w-screen-xl mx-auto grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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




