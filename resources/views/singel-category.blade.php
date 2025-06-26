@extends('frontend.app')
@section('title', 'Category')
@section('content')

    {{--just remove the navbar space --}}
    <div class="bg-white pt-24">
        <div class="bg-gray-200">
            <div class="max-w-screen-xl  mx-auto  py-16">
          <h1 class="text-4xl font-bold text-gray-600">{{ $category->name }}</h1>

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

  {{-- Related Products --}}
<section class="px-4 py-10 bg-white">
    <div class="max-w-screen-xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">{{ $category->name }}</h1>

        <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($products as $product)
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



