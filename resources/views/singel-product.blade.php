@extends('frontend.app')
@section('title', 'singel product')
@section('content')


<div id="singel-product-quickview-modal" class="pt-36 sm:px-20  bg-white z-[9999]">
    <div class="mx-auto max-w-screen-2xl max-h-[90vh]">
        <div class="flex flex-col md:flex-row gap-10">
            <div class="md:w-1/2 flex justify-center items-center px-10">
                      @php
                        $img = $product->images[0] ?? null;

                        $imgUrl = $img
                            ? (Str::startsWith($img, 'products/')
                                ? asset('storage/' . $img)
                                : asset($img))
                            : asset('images/default.webp');
                    @endphp
                <img id="quickview-product-image" src="{{ asset($imgUrl) }}" alt="{{ $product->name }}" class="max-w-full h-auto object-contain">
            </div>

            <div class="md:w-1/2 flex flex-col  bg-sky-100 p-10">
                <div>
                    <h2 id="quickview-product-name" class="text-5xl font-semibold mb-4">{{ $product->name }}</h2>
                    <p id="quickview-product-price" class="text-xl font-bold mb-4">৳{{ number_format($product->price, 0, '.', ',') }}</p>

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
                        data-product-id="{{ $product->id }}"
                        data-product-name="{{ $product->name }}"
                        data-product-price="{{ $product->price }}"
                        data-product-image="{{ asset('storage/' . $product->image) }}">
                        ADD TO CART
                    </button>

                    <button id="quickview-wishlist-button" class="wishlist-button border border-gray-300 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-100 transition-colors duration-300 w-full flex items-center justify-center"
                    data-id="{{ $product->id }}"
                    data-name="{{ $product->name }}"
                    data-price="{{ $product->price }}"
                    data-image="{{ $imgUrl }}"
                    onclick="handleWishlistClick(this)">
                    <span class="material-symbols-outlined mr-2">favorite</span>
                    ADD TO WISHLIST
                </button>
                </div>

                <div class="text-sm text-gray-600 mt-4">
                    <p>SKU: {{ $product->sku ?? 'N/A' }}</p>
                 <p>Categories:
                    @if (isset($product->category))
                    {{-- {{ route('category.show', $product->category->slug) }} --}}
                        <a href="" class="hover:underline">{{ $product->category->name }}</a>
                    @else
                        N/A
                    @endif
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

{{-- Description section --}}
<div class="bg-white pt-32 sm:px-20">
    <div class="flex flex-col sm:flex-row mx-auto max-w-screen-2xl justify-between">
        <div class="flex-1">
            <h3 class="text-black font-bold text-2xl">Description</h3>
            <p class="text-xl font-semibold mt-10 mb-20">{{ $product->short_description ?? '' }}</p>
            <div class="flex flex-col gap-y-8">
                {!! $product->description ?? '' !!}
                <p class="text-lg">– Free Delivery Inside Dhaka City.</p>
                <p class="text-lg">– Outside Dhaka City, 100 BDT will be charged as delivery Charge.</p>
                <p class="text-lg">– Enjoy Free Delivery for shopping products worth 1000 BDT or more.</p>
                <p class="text-lg">Super Fast Delivery Nationwide, Get your products in Dhaka within 48 hours or 2 Days.</p>
                <p class="text-lg">For outside Dhaka, Delivery within 96 Hours or 4 Days.</p>
            </div>
        </div>
        <div class="flex-1 px-20">
            <h3 class="text-black font-bold text-2xl">Specifications</h3>
            <div class="flex justify-between mt-8">
                <span class="font-semibold">Size</span>
                <p>15, 15.5, 16, 16.5</p>
            </div>
        </div>
    </div>
</div>

{{-- related product --}}
    <section class="px-4 py-20 bg-white ">
        <div class="max-w-screen-2xl mx-auto">
            <h3 class="pb-5 text-xl">You May Interested In...</h3>
                 <div class=" grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts  as $product)
                @php
                    $img = $product->images[0] ?? null;

                    $imgUrl = $img
                        ? (Str::startsWith($img, 'products/')
                            ? asset('storage/' . $img)
                            : asset($img))
                        : asset('images/default.webp');
                @endphp

                <x-product-card
                    :id="$product->id"
                    :name="$product->name"
                    :price="$product->price"
                    :comparePrice="$product->compare_at_price"
                    :sku="$product->sku"
                    :sizes="['S', 'M', 'L', 'XL']"
                    :image="$imgUrl"
                />
             @endforeach
    </div>
        </div>



    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ========== Global Overlay ==========
    const globalOverlay = document.getElementById('global-overlay');

    const openModalAndOverlay = (modal) => {
        document.querySelectorAll('.product-options-modal:not(.hidden)').forEach(otherModal => {
            otherModal.classList.add('hidden');
        });
        modal.classList.remove('hidden');
        if (globalOverlay) globalOverlay.classList.remove('hidden');
    };

    const closeModalAndOverlay = (modal) => {
        modal.classList.add('hidden');
        const anyModalOpen = document.querySelectorAll('.product-options-modal:not(.hidden)').length > 0;
        if (globalOverlay && !anyModalOpen) globalOverlay.classList.add('hidden');
    };

    document.querySelectorAll('.product-card').forEach(productCard => {
        const selectOptionsBtn = productCard.querySelector('.select-options-btn');
        const productModal = productCard.querySelector('.product-options-modal');
        const closeModalBtn = productModal.querySelector('.close-modal-btn');
        const quantityInput = productModal.querySelector('.quantity-input');
        const quantityMinusBtn = productModal.querySelector('.quantity-minus-btn');
        const quantityPlusBtn = productModal.querySelector('.quantity-plus-btn');

        if (selectOptionsBtn && productModal) {
            selectOptionsBtn.addEventListener('click', (event) => {
                event.stopPropagation();
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

        if (quantityMinusBtn && quantityInput) {
            quantityMinusBtn.addEventListener('click', () => {
                let currentQuantity = parseInt(quantityInput.value);
                currentQuantity = Math.max(1, currentQuantity - 1);
                quantityInput.value = currentQuantity;
            });
        }

        if (quantityPlusBtn && quantityInput) {
            quantityPlusBtn.addEventListener('click', () => {
                let currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
            });
        }
    });

    if (globalOverlay) {
        globalOverlay.addEventListener('click', () => {
            document.querySelectorAll('.product-options-modal:not(.hidden)').forEach(modal => {
                closeModalAndOverlay(modal);
            });
        });
    }

    // ========== Quick View Modal ==========
    const modal = document.getElementById('quickview-modal');
    if (modal && modal.parentElement !== document.body) {
        document.body.appendChild(modal);
    }

    const quickviewButton = document.querySelector('.quickview-button');
    const quickviewPopup = document.getElementById('quickview-popup');
    const closePopupButton = document.getElementById('close-popup');
    const quantityInputQuickView = document.getElementById('quantity');

    if (quickviewButton) {
        quickviewButton.addEventListener('click', function () {
            quickviewPopup.classList.remove('hidden');
            quickviewPopup.classList.add('flex');
        });
    }

    if (closePopupButton) {
        closePopupButton.addEventListener('click', function () {
            quickviewPopup.classList.add('hidden');
            quickviewPopup.classList.remove('flex');
        });
    }

    if (quickviewPopup) {
        quickviewPopup.addEventListener('click', function (event) {
            if (event.target === quickviewPopup) {
                quickviewPopup.classList.add('hidden');
                quickviewPopup.classList.remove('flex');
            }
        });
    }

    window.updateQuantity = function (change) {
        if (quantityInputQuickView) {
            let currentQuantity = parseInt(quantityInputQuickView.value);
            let newQuantity = currentQuantity + change;
            if (newQuantity >= 1) {
                quantityInputQuickView.value = newQuantity;
            }
        }
    };
});
</script>
@endpush


