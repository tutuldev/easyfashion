{{-- singel product component HTML (e.g., resources/views/components/product-card.blade.php) --}}

<x-product-card
    :id="1"
    name="Full Shart"
    :price="1150"
    image="images/pro-1.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="2"
    name="Polo T-Shirt black"
    :price="1150"
    image="images/pro-2.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="3"
    name="Half Shart printed"
    :price="1150"
    image="images/pro-3.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="4"
    name="Panjabi"
    :price="1150"
    image="images/pro-4.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="5"
    name="Blue  T-Shirt"
    :price="1150"
    image="images/pro-5.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="6"
    name="Stripe Polo T-Shirt"
    :price="1160"
    image="images/pro-6.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="7"
    name="Stripe Polo T-Shirt"
    :price="1170"
    image="images/pro-7.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="8"
    name="Stripe Polo T-Shirt"
    :price="1180"
    image="images/pro-8.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="9"
    name="Stripe Polo T-Shirt"
    :price="1190"
    image="images/pro-9.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>
<x-product-card
    :id="10"
    name="Stripe Polo T-Shirt"
    :price="11100"
    image="images/pro-10.webp"
    :sizes="['S', 'M', 'L', 'XL']"
    sku="HF-20WBDM2H-05-1-1-1"
    :categories="['Men', 'T-Shirts', 'Polo']"
/>



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


