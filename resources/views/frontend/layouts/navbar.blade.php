<nav id="front-navbar" class="absolute top-0 left-0 w-full z-10 bg-white/15 shadow-md ">
    <div class="mx-auto max-w-screen-xl px-3 lg:px-5 ">
        <div class="flex justify-between py-5 items-center">

            <!-- Left Menu -->
            <div
                class="hidden lg:flex space-x-4 text-base font-bold  {{ request()->is('/') ? 'text-white' : 'text-black' }}">

                <!-- Home -->
                <a href="{{ url('/') }}" id="home-btn"
                    class="relative group overflow-hidden py-1 text-black {{ request()->is('/') ? 'text-white' : 'text-black' }}">
                    HOME
                    <span class="absolute bottom-0 left-0 h-[3px] w-full {{ request()->is('/') ? 'bg-white' : 'bg-black' }} transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('/') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>

                <!-- EID AL-ADHA 25 -->
                <a href="{{ route('category.single.show', 'polo') }}" id="event-btn"
                    class="relative group overflow-hidden py-1 {{ request()->is('offer') ? 'text-white' : '' }}">
                    EID AL-ADHA 25
                    <span class="absolute bottom-0 left-0 h-[3px] w-full {{ request()->is('/') ? 'bg-white' : 'bg-black' }} transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('offer') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>

                <!-- Shop -->

                <a href="{{ url('/shop') }}" id="shop-btn"
                    class="relative group overflow-hidden py-1 px-4 inline-block {{ request()->is('shop') ? 'text-black' : '' }}">
                    SHOP
                    <span class="absolute bottom-0 left-0 h-[3px] w-full
                        {{ request()->is('/') ? 'bg-white' : 'bg-black' }}
                        transition-transform duration-300 ease-in-out
                        origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                        {{ request()->is('shop') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>



                <!-- Easy -->
                <div class="relative group">
                    <a href="{{ url('/easy') }}" id="easy-btn"
                        class="relative  overflow-hidden py-1 inline-block {{ request()->is('easy') ? 'group-hover:text-black text-black' : '' }}">
                        EASY
                        <span class="absolute bottom-0 left-0 h-[3px] w-full {{ request()->is('/') ? 'bg-white' : 'bg-black' }} transition-transform duration-300 ease-in-out
                                origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                                {{ request()->is('easy') ? 'scale-x-100 origin-left' : '' }}"></span>
                    </a>

                    <!-- Dropdown -->
                    <div
                        class="absolute left-0 mt-2 w-80 bg-white border border-gray-200 rounded-md shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="p-8">
                        <a href="{{ url('/about') }}" class="block px-3 py-3  text-sm text-gray-700 hover:bg-gray-100">About Us</a>
                        <a href="{{ url('/contact') }}" class="block px-3 py-3 text-sm text-gray-700 hover:bg-gray-100">Contact Us</a>
                        <a href="{{ url('/contact') }}" class="block px-3 py-3 text-sm text-gray-700 hover:bg-gray-100">Size Guid</a>
                        <a href="{{ url('/contact') }}" class="block px-3 py-3 text-sm text-gray-700 hover:bg-gray-100">Order,Payment,Shipping &    Policies</a>
                        <a href="{{ url('/contact') }}" class="block px-3 py-3 text-sm text-gray-700 hover:bg-gray-100">Order Tracking</a>
                        <a href="{{ url('/contact') }}" class="block px-3 py-3 text-sm text-gray-700 hover:bg-gray-100">SHOP Outlate Locations</a>
                        </div>
                    </div>
                </div>


                <!-- How to Order -->
                <a href="{{ url('/how-to-order') }}" id="howto-btn"
                    class="relative group overflow-hidden py-1 {{ request()->is('how-to-order') ? 'text-black' : '' }}">
                    How to Order
                    <span class="absolute bottom-0 left-0 h-[3px] w-full {{ request()->is('/') ? 'bg-white' : 'bg-black' }} transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('how-to-order') ? 'scale-x-100 origin-left' : '' }}"></span>
                </a>


            </div>



            <div class="flex items-center space-x-3">
                <div id="menu-btn" class="flex lg:hidden items-center ">
                    <span
                        class="material-symbols-outlined text-2xl   {{ request()->is('/') ? 'text-white' : 'text-black' }} cursor-pointer hover:text-green-500 transition ">menu</span>
                </div>
                <!-- Center Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/brand-logo.webp') }}" alt="Logo" class="h-5 md:h-10  mx-auto" />
                </div>
            </div>

            <!-- Right Icons -->
            <div
                class="flex items-center space-x-2 sm:space-x-4 lg:space-x-8 {{ request()->is('/') ? 'text-white' : 'text-black' }}">
                <button id="searchToggleButton"
                    class="  font-medium focus:outline-none flex items-center justify-center">
                    <span id="searchIconContainer"><i class="fas fa-search text-lg"></i></span>
                    <span id="closeIconContainer" class="hidden"><i class="fas fa-times text-lg"></i></span>
                </button>
                <div class="relative">
                    <button id="openSidebarBtn"
                        class="relative p-2 rounded-full  {{ request()->is('/') ? 'text-white' : 'text-black' }}   ">
                        <span class="material-symbols-outlined text-3xl">shopping_bag</span>
                        <span id="itemCount"
                            class="absolute -top-2 -right-2 bg-red-500 {{ request()->is('/') ? 'text-white' : 'text-black' }} text-xs w-6 h-6 flex items-center justify-center rounded-full ">
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
                        <a href="/cart">
                            <button
                                class="w-full bg-blue-100 text-blue-600 font-bold py-2 rounded-md mb-2 hover:bg-blue-200 transition duration-300">
                                VIEW CART
                            </button>
                        </a>

                        <a href="/checkout"
                            class="w-full bg-gray-800 text-white font-bold py-2 rounded-md flex items-center justify-center hover:bg-gray-700 transition duration-300">
                            CHECKOUT
                            <span class="material-symbols-outlined ml-2">arrow_right_alt</span>
                        </a>

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
                    <span id="persion-login" class="material-symbols-outlined text-white">person</span>
                </a>

                <!-- OUTLETS Button as Link -->
                <a href="/outlets" class="bg-green-400 font-bold text-white px-4 py-2 rounded hover:">
                    OUTLETS
                </a>
            </div>

        </div>
    </div>
</nav>
{{-- when shop hover then open this section --}}
<!-- Smooth Mega Menu -->
<div id="shop-mega-menu"
     class="invisible opacity-0 translate-y-5 transition-all duration-300 ease-in-out relative z-50 mx-auto max-w-screen-xl px-3 lg:px-5">
    <div class="absolute left-0 w-full mt-12 px-4 py-5">
        <div class="flex py-5 gap-6 bg-white shadow-md rounded-md">

            <div class="bg-white py-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-32 px-20">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">PANJABI</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Easy Design Panjabi</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Easy Karchupi Panjabi</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Kabli Panjabi Set</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">T - SHIRTS</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Printed T-Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Polo T-Shirt</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">SHIRTS</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Casual Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Formal Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Half Shirt</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">JUNIOR</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Boys Full Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Boys Half Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Boys Polo T-Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Boys T-Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Boys Panjabi</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Girls T-Shirt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Girls Frock</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">ACCESSORIES</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Belt</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Easy Tie</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Men's Underwear</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">PANTS</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Gabardine Pants</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Jeans</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Formal Pants</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Pajama</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Shorts</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Trousers</a></li>
                </ul>
            </div>
        </div>

</div>
        </div>
    </div>
</div>




@push('scripts')
{{-- script  for show hover --}}
    <script>
    const shopBtn = document.getElementById('shop-btn');
    const megaMenu = document.getElementById('shop-mega-menu');

    // Show menu on hover
    shopBtn.addEventListener('mouseenter', () => {
        megaMenu.classList.remove('invisible', 'opacity-0', 'translate-y-5');
        megaMenu.classList.add('visible', 'opacity-100', 'translate-y-0');
    });

    // Hide on mouse leave
    shopBtn.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!megaMenu.matches(':hover')) {
                megaMenu.classList.remove('visible', 'opacity-100', 'translate-y-0');
                megaMenu.classList.add('invisible', 'opacity-0', 'translate-y-5');
            }
        }, 200);
    });

    megaMenu.addEventListener('mouseenter', () => {
        megaMenu.classList.remove('invisible', 'opacity-0', 'translate-y-5');
        megaMenu.classList.add('visible', 'opacity-100', 'translate-y-0');
    });

    megaMenu.addEventListener('mouseleave', () => {
        megaMenu.classList.remove('visible', 'opacity-100', 'translate-y-0');
        megaMenu.classList.add('invisible', 'opacity-0', 'translate-y-5');
    });
    </script>


    {{-- wish list --}}
    <script>
        // এই Set টি ট্র্যাক করে কোন item.id গুলো wishlist এ আছে
        // এটি localStorage থেকে লোড করা হবে এবং runtime এ আপডেট হবে।
        const wishlist = new Set();

        // handleWishlistClick ফাংশন: যখন কোনো উইশলিস্ট বাটন ক্লিক করা হয়
        function handleWishlistClick(btn) {
            const itemId = btn.dataset.id;
            const icon = btn.querySelector(".material-symbols-outlined");

            // আইটেমের বিস্তারিত তথ্য সংগ্রহ করুন
            const item = {
                id: itemId,
                name: btn.dataset.name,
                price: parseFloat(btn.dataset.price),
                imageUrl: btn.dataset.image
            };

            // যদি আইটেমটি ইতিমধ্যেই উইশলিস্টে থাকে
            if (wishlist.has(itemId)) {
                // আইকনটি যদি filled না থাকে, তাহলে filled করে দিন
                if (icon && !icon.classList.contains("filled")) {
                    icon.classList.add("filled");
                }
                return; // ফাংশন থেকে বেরিয়ে যান, কারণ এটি Already Added
            }

            // যদি আইটেমটি উইশলিস্টে না থাকে, তাহলে যোগ করুন
            wishlist.add(itemId);
            if (icon) { // নিশ্চিত করুন icon এলিমেন্টটি আছে
                icon.classList.add("filled");
            }
            addToWishlist(item); // গ্লোবাল addToWishlist ফাংশন কল করুন
        }

        document.addEventListener('DOMContentLoaded', () => {
            // উইশলিস্ট পপআপ এবং কাউন্টার সম্পর্কিত DOM উপাদানগুলো
            const wishlistButton = document.getElementById('wishlistButton'); // আপনার মেইন উইশলিস্ট আইকনের বাটন
            const wishlistPopup = document.getElementById('wishlistPopup');
            const wishlistCountSpan = document.getElementById('wishlistCount');
            const wishlistCountBadge = document.getElementById('wishlistCountBadge');
            const emptyWishlistMessage = document.getElementById('emptyWishlistMessage');
            const wishlistItemsContainer = document.getElementById('wishlistItems');

            // localStorage থেকে উইশলিস্ট আইটেম লোড করুন
            let wishlistItems = JSON.parse(localStorage.getItem('wishlistItems')) || [];

            // localStorage এ উইশলিস্ট আইটেম সেভ করার ফাংশন
            function saveToLocalStorage() {
                localStorage.setItem('wishlistItems', JSON.stringify(wishlistItems));
            }

            // উইশলিস্ট ডিসপ্লে (পপআপের ভেতরের তালিকা এবং কাউন্টার) আপডেট করার ফাংশন
            function updateWishlistDisplay() {
                // পপআপের ভেতরের আইটেম তালিকা পরিষ্কার করুন
                wishlistItemsContainer.innerHTML = '';
                const count = wishlistItems.length;
                wishlistCountSpan.textContent = count;
                wishlistCountBadge.textContent = count;

                // যদি কোনো আইটেম না থাকে
                if (count === 0) {
                    emptyWishlistMessage.classList.remove('hidden');
                    wishlistItemsContainer.classList.add('hidden');
                } else {
                    emptyWishlistMessage.classList.add('hidden');
                    wishlistItemsContainer.classList.remove('hidden');

                    // প্রতিটি আইটেমকে পপআপে যোগ করুন
                    wishlistItems.forEach((item, index) => {
                        const itemDiv = document.createElement('div');
                        itemDiv.className = 'flex items-center justify-between bg-gray-100 border p-2 rounded mb-2';

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

                    // রিমুভ বাটনের কার্যকারিতা যোগ করুন
                    document.querySelectorAll('.remove-btn').forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            const index = e.target.getAttribute('data-index');
                            const removedItem = wishlistItems[index];
                            wishlistItems.splice(index, 1);
                            wishlist.delete(removedItem.id); // Set থেকে আইটেম সরান

                            saveToLocalStorage();
                            updateWishlistDisplay(); // রিমুভ করার পর ডিসপ্লে এবং বাটনগুলো আপডেট করুন
                        });
                    });
                }

                // --- এই অংশটি সব উইশলিস্ট বাটনগুলোর অবস্থা চেক করে আপডেট করবে ---
                // এটি নিশ্চিত করবে যে পেজ লোড হওয়ার সময় বা অন্য কোনো আপডেটের সময়
                // সকল `wishlist-button` (যেমন: প্রোডাক্ট কার্ড, কুইক ভিউ মডাল) তাদের সঠিক Filled/Unfilled অবস্থা দেখায়।
                document.querySelectorAll('button.wishlist-button').forEach(btn => {
                    const itemId = btn.dataset.id;
                    const icon = btn.querySelector(".material-symbols-outlined");

                    if (icon) { // নিশ্চিত করুন icon এলিমেন্টটি বিদ্যমান
                        if (wishlist.has(itemId)) {
                            icon.classList.add("filled");
                        } else {
                            icon.classList.remove("filled");
                        }
                    }
                });
                // --- আপডেট করা অংশ শেষ ---
            }

            // মেইন উইশলিস্ট বাটন এবং পপআপের ইভেন্ট লিসেনার
            if (wishlistButton) {
                wishlistButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (wishlistPopup) {
                        wishlistPopup.classList.toggle('hidden');
                        // পপআপ খোলার সময় উইশলিস্ট ডিসপ্লে এবং বাটনগুলো আপডেট করুন
                        updateWishlistDisplay();
                    }
                });
            }

            // পপআপের বাইরে ক্লিক করলে বাটন বন্ধ করার লজিক
            document.addEventListener('click', (e) => {
                if (wishlistPopup && wishlistButton) {
                    // If click is outside popup AND not on wishlist button or its child
                    if (!wishlistPopup.contains(e.target) && !wishlistButton.contains(e.target) && !e.target.closest('.wishlist-button')) {
                        wishlistPopup.classList.add('hidden');
                    }
                }
            });

            // 'Escape' চাপলে পপআপ বন্ধ করার লজিক
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && wishlistPopup && !wishlistPopup.classList.contains('hidden')) {
                    wishlistPopup.classList.add('hidden');
                }
            });

            // Global function to add item to wishlist (handleWishlistClick এই ফাংশনটি ব্যবহার করে)
            window.addToWishlist = function (item) {
                // যদি আইটেমটি ইতিমধ্যেই local storage এ না থাকে, তবে যোগ করুন
                const exists = wishlistItems.find(i => i.id === item.id);
                if (!exists) {
                    wishlistItems.push(item);
                    saveToLocalStorage();
                }
                // আইটেম যোগ করার পর ডিসপ্লে এবং বাটনগুলো আপডেট করুন
                updateWishlistDisplay();
            }

            // পেজ লোড হওয়ার সময় initial setup
            // 1. localStorage থেকে লোড করা wishlistItems ব্যবহার করে wishlist Set পপুলেট করুন।
            wishlistItems.forEach(item => wishlist.add(item.id));
            // 2. উইশলিস্ট ডিসপ্লে এবং সকল বাটনগুলোর অবস্থা আপডেট করুন।
            updateWishlistDisplay();
        });
    </script>


    {{-- js for add cart and cart page and quick view --}}
    <script>
        (function () {
            // DOM Elements - একবার ধরে নিন
            const openSidebarBtn = document.getElementById('openSidebarBtn');
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            const sidebar = document.getElementById('sidebar');
            const itemCountSpan = document.getElementById('itemCount');
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const noProductsMessage = document.getElementById('noProductsMessage');
            const cartSubtotalSpan = document.getElementById('cartSubtotal');
            const continueShoppingDiv = document.getElementById('continueShoppingDiv');
            const mainCartContainer = document.getElementById('mainCartItemsContainer');
            const mainCartSubtotalSpan = document.getElementById('mainCartSubtotal');
            const mainCartTotalSpan = document.getElementById('mainCartTotal');
            const quickviewModal = document.getElementById('quickview-modal');
            const quickviewImage = document.getElementById('quickview-product-image');
            const quickviewName = document.getElementById('quickview-product-name');
            const quickviewPrice = document.getElementById('quickview-product-price');
            const quickviewSizeSelect = document.getElementById('quickview-size-select');
            const quickviewQuantityInput = document.getElementById('quickview-quantity-input');
            const quickviewMinusBtn = document.getElementById('quickview-quantity-minus-btn');
            const quickviewPlusBtn = document.getElementById('quickview-quantity-plus-btn');
            const quickviewAddToCartBtn = document.getElementById('quickview-add-to-cart-btn');
            const quickviewWishlistBtn = document.getElementById('quickview-wishlist-button');
            const quickviewCloseBtn = document.getElementById('quickview-close-btn');
            const quickviewSizeContainer = document.getElementById('quickview-size-container');

            let cart = [];

            // হেল্পার ফাংশন
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

            function loadCart() {
                try {
                    const storedCart = localStorage.getItem('easyBagCart');
                    if (storedCart) {
                        cart = JSON.parse(storedCart);
                        cart.forEach(item => {
                            item.id = parseInt(item.id); // Ensure ID is integer
                        });
                    }
                } catch (e) {
                    console.error("Error loading cart from localStorage:", e);
                    cart = []; // Reset cart on error
                }
                updateCartUI();
            }

            function saveCart() {
                localStorage.setItem('easyBagCart', JSON.stringify(cart));
            }

            function addToCart(product, quantity, size) {
                const parsedProductId = parseInt(product.id);
                const cartItemId = `${parsedProductId}-${size}`;
                const existingProductIndex = cart.findIndex(item => item.cartId === cartItemId);

                if (existingProductIndex > -1) {
                    cart[existingProductIndex].quantity += quantity;
                } else {
                    cart.push({
                        cartId: cartItemId,
                        id: parsedProductId,
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
                    showSidebar();
                }
            }

            function removeFromCart(cartItemId) {
                cart = cart.filter(item => item.cartId !== cartItemId);
                saveCart();
                updateCartUI();
            }

            function updateQuantity(cartItemId, newQuantity) {
                const item = cart.find(item => item.cartId === cartItemId);
                if (item) {
                    item.quantity = Math.max(1, parseInt(newQuantity));
                    if (item.quantity <= 0) {
                        removeFromCart(cartItemId);
                    } else {
                        saveCart();
                        updateCartUI();
                    }
                }
            }

            function renderCartItems(targetContainer, isMainCartPage = false) {
                if (!targetContainer) return;

                targetContainer.innerHTML = '';
                const fragment = document.createDocumentFragment();

                if (cart.length === 0) {
                    if (isMainCartPage) {
                        const noProductsDiv = document.createElement('div');
                        noProductsDiv.classList.add('text-center', 'py-8');
                        noProductsDiv.innerHTML = '<p class="text-gray-600 text-lg">Your cart is empty.</p><a href="/" class="mt-4 inline-block bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition">Continue Shopping</a>';
                        fragment.appendChild(noProductsDiv);

                        const cartTotalsSection = document.getElementById('mainCartTotalsSection');
                        if (cartTotalsSection) {
                            cartTotalsSection.style.display = 'none';
                        }
                    } else {
                        if (noProductsMessage) noProductsMessage.style.display = 'block';
                        if (continueShoppingDiv) continueShoppingDiv.style.display = 'none';
                    }
                } else {
                    if (!isMainCartPage) {
                        if (noProductsMessage) noProductsMessage.style.display = 'none';
                        if (continueShoppingDiv) continueShoppingDiv.style.display = 'block';
                    }

                    if (isMainCartPage) {
                        const cartTotalsSection = document.getElementById('mainCartTotalsSection');
                        if (cartTotalsSection) {
                            cartTotalsSection.style.display = 'flex';
                        }
                    }

                    cart.forEach(item => {
                        const itemDiv = document.createElement('div');
                        let itemHtml = '';
                        if (isMainCartPage) {
                            itemHtml = `
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center border-b pb-4 mb-4 relative">
                            <div class="flex items-center col-span-2">
                                <img src="${item.image}" alt="${item.name}" class="w-20 h-20 object-cover mr-4 border border-gray-200" />
                                <div>
                                    <div class="font-semibold text-gray-800 text-base">${item.name}</div>
                                    <div class="text-gray-600 text-sm">Size: ${item.size || 'N/A'}</div>
                                </div>
                            </div>
                            <div class="text-gray-800 text-base font-medium">৳${item.price.toLocaleString()}</div>
                            <div class="flex items-center justify-center border border-gray-300 rounded overflow-hidden w-28 mx-auto md:mx-0">
                                <button class="cart-page-quantity-minus-btn px-2 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200" data-cart-item-id="${item.cartId}">
                                    <span class="material-icons text-base">remove</span>
                                </button>
                                <input type="number"
                                    class="w-12 text-center py-1 outline-none text-gray-800 text-base cart-page-quantity-input"
                                    value="${item.quantity}"
                                    min="1"
                                    data-cart-item-id="${item.cartId}"
                                    readonly />
                                <button class="cart-page-quantity-plus-btn px-2 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200" data-cart-item-id="${item.cartId}">
                                    <span class="material-icons text-base">add</span>
                                </button>
                            </div>
                            <div class="text-gray-800 text-base font-medium text-right">৳${(item.price * item.quantity).toLocaleString()}</div>
                           <button class="text-gray-400 hover:text-red-500 remove-item-btn ml-auto md:ml-0 md:absolute md:right-0 md:top-1/2 md:transform md:-translate-y-1/2" data-cart-item-id="${item.cartId}" style="right: -25px;">
                                <span class="material-symbols-outlined text-xl">close</span>
                            </button>
                        </div>
                        `;
                        } else {
                            itemHtml = `
                            <div class="flex items-start mb-4 border-b pb-4">
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
                            </div>
                        `;
                        }
                        itemDiv.innerHTML = itemHtml;
                        fragment.appendChild(itemDiv);
                    });
                }
                targetContainer.appendChild(fragment);
            }

            function updateCartUI() {
                renderCartItems(cartItemsContainer, false); // Sidebar
                if (mainCartContainer) {
                    renderCartItems(mainCartContainer, true); // Main cart page
                }

                let totalItems = 0;
                let subtotal = 0;

                cart.forEach(item => {
                    totalItems += item.quantity;
                    subtotal += item.quantity * item.price;
                });

                if (itemCountSpan) {
                    itemCountSpan.textContent = totalItems;
                }
                if (cartSubtotalSpan) {
                    cartSubtotalSpan.textContent = `৳ ${subtotal.toLocaleString()}`;
                }
                if (mainCartSubtotalSpan) {
                    mainCartSubtotalSpan.textContent = `৳ ${subtotal.toLocaleString()}`;
                }
                if (mainCartTotalSpan) {
                    mainCartTotalSpan.textContent = `৳ ${subtotal.toLocaleString()}`;
                }
            }

            // Quick View Modal functions
            window.openQuickviewModal = function (productData) {
                if (!quickviewModal) {
                    console.error('Quick View Modal element not found!');
                    return;
                }

                quickviewImage.src = productData.image;
                quickviewImage.alt = productData.name;
                quickviewName.textContent = productData.name;
                quickviewPrice.textContent = `৳${parseFloat(productData.price).toLocaleString()}`;
                quickviewQuantityInput.value = 1;

                quickviewSizeSelect.innerHTML = '';
                if (productData.sizes && productData.sizes.length > 0) {
                    quickviewSizeContainer.style.display = 'block';
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Select Size';
                    defaultOption.disabled = true;
                    defaultOption.selected = true;
                    quickviewSizeSelect.appendChild(defaultOption);

                    productData.sizes.forEach(size => {
                        const option = document.createElement('option');
                        option.value = size;
                        option.textContent = size;
                        quickviewSizeSelect.appendChild(option);
                    });
                } else {
                    quickviewSizeContainer.style.display = 'none';
                }

                quickviewAddToCartBtn.dataset.productId = productData.id;
                quickviewAddToCartBtn.dataset.productName = productData.name;
                quickviewAddToCartBtn.dataset.productPrice = productData.price;
                quickviewAddToCartBtn.dataset.productImage = productData.image;

                quickviewWishlistBtn.dataset.id = productData.id;
                quickviewWishlistBtn.dataset.name = productData.name;
                quickviewWishlistBtn.dataset.price = productData.price;
                quickviewWishlistBtn.dataset.image = productData.image;

                quickviewModal.classList.remove('hidden');
                quickviewModal.classList.add('flex');
            };

            function showAlertDialog(message) {
                const messageBoxOverlay = document.createElement('div');
                messageBoxOverlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999]';
                messageBoxOverlay.innerHTML = `
                <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full mx-4 text-center">
                    <p class="text-gray-800 text-lg mb-4">${message}</p>
                    <button id="alertCloseBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                        OK
                    </button>
                </div>
            `;
                document.body.appendChild(messageBoxOverlay);

                document.getElementById('alertCloseBtn').addEventListener('click', () => {
                    document.body.removeChild(messageBoxOverlay);
                });

                messageBoxOverlay.addEventListener('click', (e) => {
                    if (e.target === messageBoxOverlay) {
                        document.body.removeChild(messageBoxOverlay);
                    }
                });
            }

            // ইভেন্ট লিসেনার ইনিশিয়ালাইজেশন
            document.addEventListener('DOMContentLoaded', () => {
                loadCart();

                if (openSidebarBtn) {
                    openSidebarBtn.addEventListener('click', showSidebar);
                }
                if (closeSidebarBtn) {
                    closeSidebarBtn.addEventListener('click', hideSidebar);
                }

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

                // ইভেন্ট ডেলিগেশন ব্যবহার করে কার্ট আইটেমগুলোর জন্য ইভেন্ট লিসেনার
                const cartContainers = [cartItemsContainer, mainCartContainer].filter(Boolean); // উভয় কন্টেইনার নিশ্চিত করুন
                cartContainers.forEach(container => {
                    container.addEventListener('click', (event) => {
                        const target = event.target.closest('button, input');
                        if (!target) return; // যদি বাটন বা ইনপুট না হয়, তাহলে কিছু করবেন না

                        const cartItemId = target.dataset.cartItemId;

                        if (target.classList.contains('remove-item-btn')) {
                            removeFromCart(cartItemId);
                        } else if (target.classList.contains('sidebar-quantity-minus-btn') || target.classList.contains('cart-page-quantity-minus-btn')) {
                            const currentItem = cart.find(item => item.cartId === cartItemId);
                            if (currentItem && currentItem.quantity > 1) {
                                updateQuantity(cartItemId, currentItem.quantity - 1);
                            } else if (currentItem && currentItem.quantity === 1) {
                                removeFromCart(cartItemId);
                            }
                        } else if (target.classList.contains('sidebar-quantity-plus-btn') || target.classList.contains('cart-page-quantity-plus-btn')) {
                            const currentItem = cart.find(item => item.cartId === cartItemId);
                            if (currentItem) {
                                updateQuantity(cartItemId, currentItem.quantity + 1);
                            }
                        }
                    });

                    container.addEventListener('change', (event) => {
                        const target = event.target;
                        if (target.classList.contains('sidebar-quantity-input') || target.classList.contains('cart-page-quantity-input')) {
                            const cartItemId = target.dataset.cartItemId;
                            const newQuantity = parseInt(target.value);
                            updateQuantity(cartItemId, newQuantity);
                        }
                    });
                });


                // Add to Cart button logic for product cards and quick view modal
                document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                    button.addEventListener('click', (event) => {
                        const isInsideQuickviewModal = event.currentTarget.closest('#quickview-modal');
                        const parentElement = isInsideQuickviewModal ? quickviewModal : (event.currentTarget.closest('.product-card') || event.currentTarget.closest('.product-options-modal'));

                        if (!parentElement) {
                            console.error("Parent element not found for add to cart button.");
                            return;
                        }

                        const productId = event.currentTarget.dataset.productId;
                        const productName = event.currentTarget.dataset.productName;
                        const productPrice = parseFloat(event.currentTarget.dataset.productPrice);
                        const productImage = event.currentTarget.dataset.productImage;

                        const quantityInput = isInsideQuickviewModal ? quickviewQuantityInput : parentElement.querySelector('.quantity-input');
                        const quantity = parseInt(quantityInput.value);

                        const sizeSelect = isInsideQuickviewModal ? quickviewSizeSelect : parentElement.querySelector('.product-size-select');
                        const selectedSize = sizeSelect ? sizeSelect.value : '';

                        if (sizeSelect && sizeSelect.style.display !== 'none' && sizeSelect.options.length > 1 && selectedSize === "") {
                            showAlertDialog('Please select a size before adding to cart.');
                            return;
                        }

                        const product = {
                            id: productId,
                            name: productName,
                            price: productPrice,
                            image: productImage
                        };
                        addToCart(product, quantity, selectedSize);

                        if (isInsideQuickviewModal) {
                            quickviewModal.classList.add('hidden');
                            quickviewModal.classList.remove('flex');
                        } else {
                            const modal = event.currentTarget.closest('.product-options-modal');
                            if (modal) {
                                modal.classList.add('hidden');
                                modal.classList.remove('flex');
                            }
                        }
                    });
                });

                // Open Quick View Modal
                document.querySelectorAll('.open-quickview-btn').forEach(button => {
                    button.addEventListener('click', (event) => {
                        const productData = {
                            id: event.currentTarget.dataset.productId,
                            name: event.currentTarget.dataset.productName,
                            price: event.currentTarget.dataset.productPrice,
                            image: event.currentTarget.dataset.productImage,
                            sizes: event.currentTarget.dataset.productSizes ? JSON.parse(event.currentTarget.dataset.productSizes) : []
                        };
                        window.openQuickviewModal(productData);
                    });
                });

                // Quick View Modal Quantity controls
                if (quickviewMinusBtn) {
                    quickviewMinusBtn.addEventListener('click', () => {
                        let currentValue = parseInt(quickviewQuantityInput.value);
                        if (currentValue > 1) {
                            quickviewQuantityInput.value = currentValue - 1;
                        }
                    });
                }
                if (quickviewPlusBtn) {
                    quickviewPlusBtn.addEventListener('click', () => {
                        let currentValue = parseInt(quickviewQuantityInput.value);
                        quickviewQuantityInput.value = currentValue + 1;
                    });
                }

                // Close Quick View Modal
                if (quickviewCloseBtn) {
                    quickviewCloseBtn.addEventListener('click', () => {
                        quickviewModal.classList.add('hidden');
                        quickviewModal.classList.remove('flex');
                    });
                }
                if (quickviewModal) {
                    quickviewModal.addEventListener('click', (event) => {
                        if (event.target === quickviewModal) {
                            quickviewModal.classList.add('hidden');
                            quickviewModal.classList.remove('flex');
                        }
                    });
                }

                // Existing 'Select Options' and 'Close Modal' buttons
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

                // Outside click logic for product options modals
                document.addEventListener('click', (event) => {
                    document.querySelectorAll('.product-options-modal').forEach(modal => {
                        const selectOptionsBtn = modal.closest('.product-card') ? modal.closest('.product-card').querySelector('.select-options-btn') : null;
                        if (selectOptionsBtn && !modal.contains(event.target) && !selectOptionsBtn.contains(event.target) && !modal.classList.contains('hidden')) {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                        }
                    });
                });

                document.querySelectorAll('.product-options-modal').forEach(modal => {
                    modal.addEventListener('click', (event) => {
                        event.stopPropagation();
                    });
                });

                // Wishlist button logic
                document.querySelectorAll('.wishlist-button').forEach(button => {
                    button.addEventListener('click', (event) => {
                        if (typeof window.handleWishlistClick === 'function') {
                            window.handleWishlistClick(event.currentTarget);
                        } else {
                            console.warn('handleWishlistClick function is not defined.');
                        }
                    });
                });
            });

        })();
    </script>

    {{-- js for menu bton --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('menu-btn');
            const menu_sidebar = document.getElementById('side-menu-front');
            const closeSidebarButton = document.getElementById('closeSidebarButton');
            const body = document.body;

            const openSidebar = () => {
                menu_sidebar.classList.remove('-translate-x-full');
                menu_sidebar.classList.add('translate-x-0');
                body.classList.add('overflow-hidden', 'fixed', 'w-screen', 'h-screen', 'inset-0');
            };

            const closeSidebar = () => {
                menu_sidebar.classList.add('-translate-x-full');
                menu_sidebar.classList.remove('translate-x-0');
                body.classList.remove('overflow-hidden', 'fixed', 'w-screen', 'h-screen', 'inset-0');
            };

            if (menuButton) {
                menuButton.addEventListener('click', openSidebar);
            }

            if (closeSidebarButton) {
                closeSidebarButton.addEventListener('click', closeSidebar);
            }

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 640) {
                    closeSidebar();
                    body.classList.remove('overflow-hidden', 'fixed', 'w-screen', 'h-screen', 'inset-0');
                }
            });
        });
    </script>

@endpush
