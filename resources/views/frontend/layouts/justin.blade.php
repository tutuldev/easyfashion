<section class="px-4 py-8 bg-white">
        <h2 class="text-3xl md:text-4xl  text-green-600 font-bold mb-8 md:mb-10 text-center">JUST IN</h2>

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


<div class="flex justify-center items-center py-5 font-semibold">
  <a href="/another-page"
     class="inline-flex gap-5 items-center px-8 py-2 bg-green-500 text-white rounded  transition group duration-300">

    <!-- Icon -->
    <span class="material-icons border rounded-full transform transition-transform duration-300 group-hover:translate-x-2">
      chevron_right
    </span>
    <span>SHOP ALL</span>
  </a>
</div>






</section>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.justin-product-card').forEach(productCard => {
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

        // এই ফাংশনগুলো যদি আপনি আগে না ডিফাইন করে থাকেন তাহলে এখন ডিফাইন করুন
        function openModalAndOverlay(modal) {
            modal.classList.remove('hidden');
        }

        function closeModalAndOverlay(modal) {
            modal.classList.add('hidden');
        }
    });
</script>
@endpush

