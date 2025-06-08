<nav class="absolute top-0 left-0 w-full z-10 bg-white/15 shadow-md ">
    <div class="mx-auto max-w-screen-xl px-3 lg:px-5 ">
        <div class="flex justify-between py-5 items-center">

            <!-- Left Menu -->
            <div class="hidden lg:flex space-x-4 text-base font-bold text-white">

                <!-- Home -->
                <a href="{{ url('/') }}"
                    class="relative group overflow-hidden py-1 {{ request()->is('/') ? 'text-white' : '' }}">
                    HOME
                    <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('/') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>

                <!-- EID AL-ADHA 25 -->
                <a href="{{ url('/offer') }}"
                    class="relative group overflow-hidden py-1 {{ request()->is('offer') ? 'text-white' : '' }}">
                    EID AL-ADHA 25
                    <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('offer') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>

                <!-- Shop -->
                <a href="{{ url('/shop') }}"
                    class="relative group overflow-hidden py-1 {{ request()->is('shop') ? 'text-white' : '' }}">
                    SHOP
                    <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('shop') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>

                <!-- Easy -->
                <a href="{{ url('/easy') }}"
                    class="relative group overflow-hidden py-1 {{ request()->is('easy') ? 'text-white' : '' }}">
                    EASY
                    <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('easy') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>

                <!-- How to Order -->
                <a href="{{ url('/how-to-order') }}"
                    class="relative group overflow-hidden py-1 {{ request()->is('how-to-order') ? 'text-white' : '' }}">
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
    <button id="openSidebarBtn"
        class="relative p-2 rounded-full  text-white   ">
        <span class="material-symbols-outlined text-3xl">shopping_bag</span>
        <span id="itemCount"
            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-6 h-6 flex items-center justify-center rounded-full ">
            0
        </span>
    </button>
</div>

<div id="sidebar"
    class="fixed top-0 right-0 h-full w-[480px] bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-out z-50 flex flex-col">
    <div class="p-6 flex-grow overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">YOUR EASY BAG</h2>
            <button id="closeSidebarBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <span>close x</span>
            </button>
        </div>

        <div id="cartItemsContainer">
            <p class="text-gray-600" id="noProductsMessage">No products in the cart.</p>
        </div>

        <div class="mt-4 text-center" id="continueShoppingDiv" style="display: none;">
            <a href="#" class="text-blue-600 hover:underline">CONTINUE SHOPPING</a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <span class="text-gray-700 font-semibold">SUBTOTAL</span>
            <span class="text-gray-900 font-bold" id="cartSubtotal">৳ 0</span>
        </div>
        <div class="mb-4">
            <a href="#" class="text-blue-600 text-sm hover:underline">Have a Coupon?</a>
        </div>
        <button class="w-full bg-blue-100 text-blue-600 font-bold py-2 rounded-md mb-2 hover:bg-blue-200 transition duration-300">VIEW CART</button>
        <button class="w-full bg-gray-800 text-white font-bold py-2 rounded-md flex items-center justify-center hover:bg-gray-700 transition duration-300">
            CHECKOUT
            <span class="material-symbols-outlined ml-2">arrow_right_alt</span>
        </button>
    </div>
</div>



                <div class="relative">
                    <button id="wishlistButton">
                        <span class="material-symbols-outlined">favorite</span>
                    </button>
                    <span id="wishlistCountBadge"
                        class="absolute -top-3 -right-4  text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                        0
                    </span>

                    <div id="wishlistPopup"
                        class="hidden absolute -right-16 mt-2 w-96 bg-white border border-gray-200 shadow-lg z-50 rounded">
                        <div class="p-5">
                            <h3 class="text-base font-semibold text-gray-800 mb-4">WISHLIST <span id="wishlistCount"
                                    class="text-gray-600">0</span></h3>
                            <p id="emptyWishlistMessage" class="text-gray-500 text-xs">Your Wishlist is currently empty.
                            </p>
                            <div id="wishlistItems" class="space-y-2"></div>
                        </div>
                    </div>
                </div>

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
@push('scripts')
{{-- wish list  --}}
    <script>
        const wishlist = new Set();

        function handleWishlistClick(btn) {
            const itemId = btn.dataset.id;
            const icon = btn.querySelector(".material-symbols-outlined");

            const item = {
                id: itemId,
                name: btn.dataset.name,
                price: parseFloat(btn.dataset.price),
                imageUrl: btn.dataset.image
            };

            if (wishlist.has(itemId)) {
                return;
            }

            wishlist.add(itemId);
            icon.classList.add("filled");
            addToWishlist(item);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const wishlistButton = document.getElementById('wishlistButton');
            const wishlistPopup = document.getElementById('wishlistPopup');
            const wishlistCountSpan = document.getElementById('wishlistCount');
            const wishlistCountBadge = document.getElementById('wishlistCountBadge');
            const emptyWishlistMessage = document.getElementById('emptyWishlistMessage');
            const wishlistItemsContainer = document.getElementById('wishlistItems');

            let wishlistItems = JSON.parse(localStorage.getItem('wishlistItems')) || [];

            function saveToLocalStorage() {
                localStorage.setItem('wishlistItems', JSON.stringify(wishlistItems));
            }

            function updateWishlistDisplay() {
                wishlistItemsContainer.innerHTML = '';
                const count = wishlistItems.length;
                wishlistCountSpan.textContent = count;
                wishlistCountBadge.textContent = count;

                if (count === 0) {
                    emptyWishlistMessage.classList.remove('hidden');
                    wishlistItemsContainer.classList.add('hidden');
                } else {
                    emptyWishlistMessage.classList.add('hidden');
                    wishlistItemsContainer.classList.remove('hidden');

                    wishlistItems.forEach((item, index) => {
                        const itemDiv = document.createElement('div');
                        itemDiv.className = 'flex items-center justify-between bg-gray-100 border p-2 rounded';

                        itemDiv.innerHTML = `
                        <div class="flex items-center">
                            <img src="${item.imageUrl}" alt="${item.name}" class="w-12 h-12 mr-3 rounded">
                            <div>
                                <p class="text-gray-800 font-medium">${item.name}</p>
                                <p class="text-gray-600 text-sm">৳${item.price}</p>
                            </div>
                        </div>
                        <button class="remove-btn text-red-500 text-sm hover:underline" data-index="${index}">Remove</button>
                    `;

                        wishlistItemsContainer.appendChild(itemDiv);
                    });

                    // Add remove functionality
                    document.querySelectorAll('.remove-btn').forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            const index = e.target.getAttribute('data-index');
                            const removedItem = wishlistItems[index];
                            wishlistItems.splice(index, 1);
                            wishlist.delete(removedItem.id); // Remove from Set

                            // Remove filled class from button
                            const btnToUpdate = document.querySelector(`button[data-id="${removedItem.id}"]`);
                            if (btnToUpdate) {
                                const icon = btnToUpdate.querySelector(".material-symbols-outlined");
                                icon.classList.remove("filled");
                            }

                            saveToLocalStorage();
                            updateWishlistDisplay();
                        });
                    });
                }

                // Restore filled class for items in wishlist
                wishlistItems.forEach(item => {
                    wishlist.add(item.id);
                    const btn = document.querySelector(`button[data-id="${item.id}"]`);
                    if (btn) {
                        const icon = btn.querySelector(".material-symbols-outlined");
                        icon.classList.add("filled");
                    }
                });
            }

            wishlistButton.addEventListener('click', (e) => {
                e.stopPropagation();
                wishlistPopup.classList.toggle('hidden');
            });

            document.addEventListener('click', (e) => {
                if (!wishlistPopup.contains(e.target) && !wishlistButton.contains(e.target)) {
                    wishlistPopup.classList.add('hidden');
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    wishlistPopup.classList.add('hidden');
                }
            });

            // Global function to add item to wishlist
            window.addToWishlist = function (item) {
                const exists = wishlistItems.find(i => i.id === item.id);
                if (!exists) {
                    wishlistItems.push(item);
                    saveToLocalStorage();
                    updateWishlistDisplay();
                }
            }

            updateWishlistDisplay();
        });
    </script>
{{-- end wish list  --}}
{{-- add to cart  --}}
<script>
    const openSidebarBtn = document.getElementById('openSidebarBtn');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');
    const sidebar = document.getElementById('sidebar');
    const itemCountSpan = document.getElementById('itemCount'); // আপনার ব্যাজ যেখানে মোট পণ্যের সংখ্যা দেখায়
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const noProductsMessage = document.getElementById('noProductsMessage');
    const cartSubtotalSpan = document.getElementById('cartSubtotal');
    const continueShoppingDiv = document.getElementById('continueShoppingDiv');

    let cart = []; // এটি আমাদের কার্ট আইটেমগুলি ধারণ করবে

    // --- Sidebar Toggle Functions ---
    function hideSidebar() {
        if (sidebar) {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('translate-x-full');
        }
    }

    function showSidebar() {
        if (sidebar) {
            sidebar.classList.remove('translate-x-full');
            sidebar.classList.add('translate-x-0');
        }
    }

    // Sidebar buttons Event Listeners - শুধুমাত্র যদি DOM এ বিদ্যমান থাকে
    if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', showSidebar);
    }
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', hideSidebar);
    }

    // Click outside to hide sidebar
    document.addEventListener('click', (event) => {
        if (sidebar && openSidebarBtn && !sidebar.contains(event.target) && !openSidebarBtn.contains(event.target) && sidebar.classList.contains('translate-x-0')) {
            hideSidebar();
        }
    });

    if (sidebar) {
        sidebar.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    }

    // --- Cart Management Functions ---

    // Load cart from local storage
    function loadCart() {
        const storedCart = localStorage.getItem('easyBagCart');
        if (storedCart) {
            cart = JSON.parse(storedCart);
        }
        updateCartUI(); // Update the UI immediately after loading
    }

    // Save cart to local storage
    function saveCart() {
        localStorage.setItem('easyBagCart', JSON.stringify(cart));
    }

    // Add item to cart
    function addToCart(product, quantity, size) {
        const cartItemId = `${product.id}-${size}`;
        const existingProductIndex = cart.findIndex(item => item.cartId === cartItemId);

        if (existingProductIndex > -1) {
            cart[existingProductIndex].quantity += quantity;
        } else {
            cart.push({
                cartId: cartItemId,
                id: product.id,
                name: product.name,
                price: product.price,
                image: product.image,
                quantity: quantity,
                size: size
            });
        }
        saveCart();
        updateCartUI();
        if (sidebar) {
            showSidebar(); // Show sidebar when an item is added
        }
    }

    // Remove item from cart
    function removeFromCart(cartItemId) {
        cart = cart.filter(item => item.cartId !== cartItemId);
        saveCart();
        updateCartUI();
    }

    // Update item quantity
    function updateQuantity(cartItemId, newQuantity) {
        const item = cart.find(item => item.cartId === cartItemId);
        if (item) {
            // নতুন পরিমাণ 1 এর নিচে না যায় তা নিশ্চিত করুন
            item.quantity = Math.max(1, parseInt(newQuantity));

            // সাইডবারের ইনপুট ফিল্ডটি খুঁজুন এবং তার value আপডেট করুন
            // এই অংশটি renderCartItems() আবার কল করার কারণে আর সরাসরি প্রয়োজন নেই,
            // কারণ renderCartItems() নিজেই সঠিক ভ্যালু দিয়ে নতুন করে রেন্ডার করবে।
            // const inputElement = document.querySelector(`.sidebar-quantity-input[data-cart-item-id="${cartItemId}"]`);
            // if (inputElement) {
            //     inputElement.value = item.quantity;
            // }

            if (item.quantity <= 0) { // যদিও Math.max(1,...) ব্যবহার করলে এটি 0 হবে না, তবুও সেফটির জন্য রাখা হলো।
                removeFromCart(cartItemId);
            } else {
                saveCart();
                updateCartUI(); // UI সম্পূর্ণ রি-রেন্ডার করার জন্য
            }
        }
    }

    // Render cart items in the sidebar
// Render cart items in the sidebar
function renderCartItems() {
    if (!cartItemsContainer || !noProductsMessage) return;

    cartItemsContainer.innerHTML = ''; // Clear previous items

    if (cart.length === 0) {
        noProductsMessage.style.display = 'block';
        if (continueShoppingDiv) continueShoppingDiv.style.display = 'none';
    } else {
        noProductsMessage.style.display = 'none';
        if (continueShoppingDiv) continueShoppingDiv.style.display = 'block';
        cart.forEach(item => {
            const itemDiv = document.createElement('div');
            // এখানে items-start রাখা হলো যাতে টেক্সট উপরে অ্যালাইন থাকে
            itemDiv.classList.add('flex', 'items-start', 'mb-4', 'border-b', 'pb-4');

            itemDiv.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="w-20 h-20 object-cover rounded-md mr-4 flex-shrink-0">
                <div class="flex-grow">
                    <h4 class="text-gray-800 font-semibold text-base">${item.name}</h4>
                    <p class="text-gray-600 text-xs mt-0.5">Size: ${item.size || 'N/A'}</p>
                    <div class="flex items-center mt-2">
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                            <button class="sidebar-quantity-minus-btn flex items-center justify-center h-8 w-8 bg-gray-50 hover:bg-gray-100 text-gray-700 font-bold text-lg cursor-pointer transition duration-200" data-cart-item-id="${item.cartId}">-</button>
                            <input type="number"
                                class="w-12 h-8 text-center border-x border-gray-200 focus:outline-none sidebar-quantity-input text-gray-800 font-medium text-base"
                                value="${item.quantity}"
                                min="1"
                                data-cart-item-id="${item.cartId}"
                                readonly>
                            <button class="sidebar-quantity-plus-btn flex items-center justify-center h-8 w-8 bg-gray-50 hover:bg-gray-100 text-gray-700 font-bold text-lg cursor-pointer transition duration-200" data-cart-item-id="${item.cartId}">+</button>
                        </div>
                        <span class="ml-3 text-gray-900 font-semibold text-base">৳ ${(item.price * item.quantity).toLocaleString()}</span>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-red-500 remove-item-btn ml-auto flex-shrink-0" data-cart-item-id="${item.cartId}">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            `;
            cartItemsContainer.appendChild(itemDiv);
        });
    }
}

    // Calculate and update cart total and item count
    function updateCartUI() {
        renderCartItems(); // রেন্ডার করার আগে
        let totalItems = 0;
        let subtotal = 0;

        cart.forEach(item => {
            totalItems += item.quantity;
            subtotal += item.quantity * item.price;
        });

        if (itemCountSpan) {
            itemCountSpan.textContent = totalItems; // ব্যাজ আপডেট
        }
        if (cartSubtotalSpan) {
            cartSubtotalSpan.textContent = `৳ ${subtotal.toLocaleString()}`; // সাবটোটাল আপডেট
        }

        // Add event listeners to newly rendered items
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const cartItemId = event.currentTarget.dataset.cartItemId;
                removeFromCart(cartItemId);
            });
        });

        // সাইডবারের Quantity input এর জন্য ইভেন্ট লিসেনার (যদি ম্যানুয়াল টাইপিং অনুমতি দেন)
        document.querySelectorAll('.sidebar-quantity-input').forEach(input => {
            input.addEventListener('change', (event) => {
                const cartItemId = event.currentTarget.dataset.cartItemId;
                const newQuantity = parseInt(event.currentTarget.value);
                updateQuantity(cartItemId, newQuantity);
            });
        });

        // সাইডবারের Quantity minus button এর জন্য ইভেন্ট লিসেনার
        document.querySelectorAll('.sidebar-quantity-minus-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const cartItemId = event.currentTarget.dataset.cartItemId;
                // যেহেতু renderCartItems() আবার কল হচ্ছে, তাই ইনপুট ভ্যালু সরাসরি সেট না করলেও চলবে
                // কারণ নতুন রেন্ডারে সঠিক ভ্যালু চলে আসবে।
                const currentItem = cart.find(item => item.cartId === cartItemId);
                if (currentItem && currentItem.quantity > 1) {
                    updateQuantity(cartItemId, currentItem.quantity - 1);
                }
            });
        });

        // সাইডবারের Quantity plus button এর জন্য ইভেন্ট লিসেনার
        document.querySelectorAll('.sidebar-quantity-plus-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const cartItemId = event.currentTarget.dataset.cartItemId;
                // যেহেতু renderCartItems() আবার কল হচ্ছে, তাই ইনপুট ভ্যালু সরাসরি সেট না করলেও চলবে
                const currentItem = cart.find(item => item.cartId === cartItemId);
                if (currentItem) {
                    updateQuantity(cartItemId, currentItem.quantity + 1);
                }
            });
        });
    }

    // --- Event Listeners for "Add to Cart" buttons and Modals ---
    document.addEventListener('DOMContentLoaded', () => {
        loadCart(); // DOM প্রস্তুত হলে কার্ট লোড করুন

        // পণ্য পৃষ্ঠার Quantity Plus/Minus buttons (মডালের ভিতরে)
        document.querySelectorAll('.quantity-minus-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const input = event.target.nextElementSibling;
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
        });

        document.querySelectorAll('.quantity-plus-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const input = event.target.previousElementSibling;
                let currentValue = parseInt(input.value);
                input.value = currentValue + 1;
            });
        });

        // Add to Cart বোতামগুলির জন্য ইভেন্ট লিসেনার
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const parentElement = event.currentTarget.closest('.product-card') || event.currentTarget.closest('.product-options-modal');

                if (!parentElement) {
                    console.error("Parent element not found for add to cart button.");
                    return;
                }

                const productId = event.currentTarget.dataset.productId;
                const productName = event.currentTarget.dataset.productName;
                const productPrice = parseFloat(event.currentTarget.dataset.productPrice);
                const productImage = event.currentTarget.dataset.productImage;

                const quantityInput = parentElement.querySelector('.quantity-input');
                const quantity = parseInt(quantityInput.value);

                const sizeSelect = parentElement.querySelector('.product-size-select');
                const selectedSize = sizeSelect ? sizeSelect.value : '';

                if (sizeSelect && sizeSelect.options.length > 1 && selectedSize === "") {
                    alert('Please select a size before adding to cart.');
                    return;
                }

                const product = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    image: productImage
                };
                addToCart(product, quantity, selectedSize);

                const modal = event.currentTarget.closest('.product-options-modal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });

        // Modal (product-options-modal) হ্যান্ডলিং
        document.querySelectorAll('.select-options-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const modalId = button.dataset.modalTarget;
                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                } else {
                    console.error(`Modal with ID '${modalId}' not found.`);
                }
            });
        });

        document.querySelectorAll('.close-modal-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const modal = event.currentTarget.closest('.product-options-modal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });

        // মডালের বাইরে ক্লিক করলে মডাল বন্ধ করুন
        document.addEventListener('click', (event) => {
            document.querySelectorAll('.product-options-modal').forEach(modal => {
                const selectOptionsBtn = modal.closest('.product-card') ? modal.closest('.product-card').querySelector('.select-options-btn') : null;

                if (selectOptionsBtn && !modal.contains(event.target) && !selectOptionsBtn.contains(event.target) && !modal.classList.contains('hidden')) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });

        // মডালের ভেতরের ক্লিক মডাল বন্ধ করা থেকে বিরত রাখবে
        document.querySelectorAll('.product-options-modal').forEach(modal => {
            modal.addEventListener('click', (event) => {
                event.stopPropagation();
            });
        });
    });
</script>
{{-- add to cart end --}}

@endpush
