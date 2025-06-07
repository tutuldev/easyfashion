<nav class="absolute top-0 left-0 w-full z-10 bg-white/15 shadow-md ">
    <div class="mx-auto max-w-screen-xl px-3 lg:px-5 ">
        <div class="flex justify-between py-5 items-center">

            <!-- Left Menu -->
            <div class="hidden lg:flex space-x-4 text-base font-bold text-white">

               <!-- Home -->
            <a href="{{ url('/') }}" class="relative group overflow-hidden py-1 {{ request()->is('/') ? 'text-white' : '' }}">
                HOME
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('/') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- EID AL-ADHA 25 -->
            <a href="{{ url('/offer') }}" class="relative group overflow-hidden py-1 {{ request()->is('offer') ? 'text-white' : '' }}">
                EID AL-ADHA 25
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('offer') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- Shop -->
            <a href="{{ url('/shop') }}" class="relative group overflow-hidden py-1 {{ request()->is('shop') ? 'text-white' : '' }}">
                SHOP
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('shop') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- Easy -->
            <a href="{{ url('/easy') }}" class="relative group overflow-hidden py-1 {{ request()->is('easy') ? 'text-white' : '' }}">
                EASY
                <span class="absolute bottom-0 left-0 h-[3px] w-full bg-white transition-transform duration-300 ease-in-out
                            origin-right scale-x-0 group-hover:origin-left group-hover:scale-x-100
                            {{ request()->is('easy') ? 'scale-x-100 origin-left' : '' }}"></span>
            </a>

            <!-- How to Order -->
            <a href="{{ url('/how-to-order') }}" class="relative group overflow-hidden py-1 {{ request()->is('how-to-order') ? 'text-white' : '' }}">
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
                    <button class="hover:">
                        <span class="material-symbols-outlined">shopping_bag</span>
                    </button>
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                        0
                    </span>
                </div>

        <div class="relative">
            <button id="wishlistButton" >
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
                    <p id="emptyWishlistMessage" class="text-gray-500 text-xs">Your Wishlist is currently empty.</p>
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
    window.addToWishlist = function(item) {
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


@endpush
