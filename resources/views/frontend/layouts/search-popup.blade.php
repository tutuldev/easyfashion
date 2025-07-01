<div id="fullWidthSearchPopup" class="search-popup fixed left-0 w-full bg-white shadow-lg z-40 h-0 ">
    <div class="max-w-screen-md mx-auto p-8 flex flex-col h-full">

        <h3 class="uppercase font-semibold text-lg text-gray-600">Search easyfashion.com.bd</h3>

        {{-- এখানে `<form>` ট্যাগটি ঐচ্ছিক, কিন্তু ভালো প্র্যাকটিস --}}
        <form id="searchForm" action="{{ route('search') }}" method="GET">
            <input type="search" name="query" id="searchInputField"
                class="w-full my-5 pl-0 border-0 border-b-2 font-semibold border-gray-400 focus:border-gray-400 focus:ring-0 outline-none text-md "
                placeholder="TYPE TO SEARCH.." autocomplete="off" />
        </form>

        <p class="text-base uppercase font-semibold text-gray-600 mt-5">Trending</p>
        <div class="flex flex-wrap gap-3 mt-3 text-center ">
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">t-shart</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">jeans</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">blue</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">denim</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">t-shart</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">jeans</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">blue</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">denim</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">t-shart</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">jeans</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">blue</span>
            <span
                class=" text-black border-gray-400 font-medium px-3 py-1.5 rounded-sm text-sm cursor-pointer border trending-tag">denim</span>
        </div>

        {{-- সার্চ ফলাফল দেখানোর জন্য এই নতুন div যোগ করুন --}}
        <div id="searchResultsContainer" class="flex-grow overflow-y-auto">
            <p class="text-center text-gray-500 mt-10">আপনার সার্চ ফলাফল এখানে দেখাবে।</p>
        </div>
    </div>
</div>

@push('scripts')
    {{-- search js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainNav = document.querySelector('nav');
            const frontNavbar = document.getElementById('front-navbar');

            const searchToggleButton = document.getElementById('searchToggleButton');
            const searchIconContainer = document.getElementById('searchIconContainer');
            const closeIconContainer = document.getElementById('closeIconContainer');
            const fullWidthSearchPopup = document.getElementById('fullWidthSearchPopup');
            const searchInputField = document.getElementById('searchInputField');
            const trendingTags = document.querySelectorAll('.trending-tag');

            // সার্চ ফলাফল দেখানোর জন্য কন্টেইনার
            const searchResultsContainer = document.getElementById('searchResultsContainer');

            // নেভিগেশন বাটনগুলো (null চেক করে নিবেন যদি কোনোটা HTML এ না থাকে)
            const openSidebarBtn = document.getElementById('openSidebarBtn');
            const wishlistButton = document.getElementById('wishlistButton');
            const persionLogin = document.getElementById('persion-login');
            const homeBtn = document.getElementById('home-btn');
            const eventBtn = document.getElementById('event-btn');
            const shopBtn = document.getElementById('shop-btn');
            const easyBtn = document.getElementById('easy-btn');
            const howtoBtn = document.getElementById('howto-btn');

            const navButtons = [
                homeBtn, eventBtn, shopBtn, easyBtn, howtoBtn,
                openSidebarBtn, wishlistButton, persionLogin, searchToggleButton
            ].filter(btn => btn !== null); // নিশ্চিত করুন যে শুধু বিদ্যমান বাটনগুলোই অ্যারেতে আছে

            const initialTextClasses = new Map();
            navButtons.forEach(btn => {
                if (btn) {
                    if (btn.classList.contains('text-white')) {
                        initialTextClasses.set(btn, 'text-white');
                    } else if (btn.classList.contains('text-black')) {
                        initialTextClasses.set(btn, 'text-black');
                    }
                }
            });

            let isPopupOpen = false;
            // mainNav নাও থাকতে পারে, তাই null চেক করে height নিচ্ছি
            let navHeight = mainNav ? mainNav.offsetHeight : 0;
            let searchTimeout;

            // --- পপআপ খোলা/বন্ধ করার ফাংশন ---
            function toggleSearchPopup() {
                isPopupOpen = !isPopupOpen;

                // নিশ্চিত করুন এলিমেন্টগুলো DOM-এ আছে
                if (searchIconContainer) searchIconContainer.classList.toggle('hidden', isPopupOpen);
                if (closeIconContainer) closeIconContainer.classList.toggle('hidden', !isPopupOpen);

                if (isPopupOpen) {
                    if (fullWidthSearchPopup) {
                        fullWidthSearchPopup.style.top = `${navHeight}px`;
                        fullWidthSearchPopup.style.height = `600px`; // পপআপের উচ্চতা
                        fullWidthSearchPopup.classList.add('active'); // active ক্লাস যোগ

                        // পপআপ খোলার সময় যদি কোনো সার্চ কোয়েরি না থাকে, তাহলে একটি ডিফল্ট মেসেজ দেখাবে
                        if (searchInputField && searchInputField.value.trim() === '' && searchResultsContainer) {
                            searchResultsContainer.innerHTML = '<p class="text-center text-gray-500 mt-10">আপনার সার্চ ফলাফল এখানে দেখাবে।</p>';
                        }
                    }

                    if (frontNavbar) {
                        frontNavbar.classList.remove('bg-white/15');
                        frontNavbar.classList.add('bg-white');
                    }

                    navButtons.forEach(btn => {
                        const initialClass = initialTextClasses.get(btn);
                        if (initialClass) {
                            btn.classList.remove(initialClass);
                        }
                        btn.classList.add('text-black');
                    });

                    if (searchInputField) searchInputField.focus();
                    document.body.style.overflow = 'hidden'; // বডি স্ক্রল বন্ধ
                } else {
                    if (fullWidthSearchPopup) {
                        fullWidthSearchPopup.style.height = '0px';
                        fullWidthSearchPopup.classList.remove('active'); // active ক্লাস সরান
                    }

                    if (frontNavbar) {
                        frontNavbar.classList.remove('bg-white');
                        frontNavbar.classList.add('bg-white/15');
                    }

                    navButtons.forEach(btn => {
                        btn.classList.remove('text-black');
                        const initialClass = initialTextClasses.get(btn);
                        if (initialClass) {
                            btn.classList.add(initialClass);
                        }
                    });

                    document.body.style.overflow = ''; // বডি স্ক্রল চালু
                    if (searchResultsContainer) searchResultsContainer.innerHTML = ''; // পপআপ বন্ধ হলে ফলাফল পরিষ্কার করুন
                }
            }

            // --- ইভেন্ট লিসেনার্স ---
            window.addEventListener('resize', function() {
                navHeight = mainNav ? mainNav.offsetHeight : 0;
                if (isPopupOpen && fullWidthSearchPopup) {
                    fullWidthSearchPopup.style.top = `${navHeight}px`;
                }
            });

            // searchToggleButton চেক করা হচ্ছে null কিনা
            if (searchToggleButton) {
                searchToggleButton.addEventListener('click', function(event) {
                    event.stopPropagation(); // ইভেন্ট bubbling বন্ধ করে
                    toggleSearchPopup();
                });
            } else {
                console.warn("Search toggle button not found. Please ensure 'searchToggleButton' ID exists in HTML.");
            }

            // Document এ ক্লিক করলে পপআপ বন্ধ করা
            document.addEventListener('click', function(event) {
                if (isPopupOpen && fullWidthSearchPopup && searchToggleButton &&
                    !fullWidthSearchPopup.contains(event.target) && !searchToggleButton.contains(event.target)) {
                    toggleSearchPopup();
                }
            });

            // Escape key চাপলে পপআপ বন্ধ করা
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && isPopupOpen) {
                    toggleSearchPopup();
                }
            });

            // Trending Tags এ ক্লিক করলে সার্চ ইনপুট ফিল্ডে টেক্সট সেট করা এবং সার্চ করা
            trendingTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    if (searchInputField) {
                        searchInputField.value = this.textContent;
                        searchInputField.focus();
                        performSearch(this.textContent); // সাথে সাথে সার্চ করুন
                    }
                });
            });

            // --- AJAX সার্চ লজিক ---
            if (searchInputField) {
                searchInputField.addEventListener('keyup', function() {
                    clearTimeout(searchTimeout); // আগের টাইমার বাতিল করুন
                    const query = this.value.trim(); // ইনপুটের দুপাশের খালি স্থান বাদ দিন

                    searchTimeout = setTimeout(() => { // 300ms বিরতির পর সার্চ করুন (debouncing)
                        if (query.length > 2) { // কমপক্ষে ৩টি অক্ষর টাইপ হলে সার্চ শুরু হোক
                            performSearch(query);
                        } else {
                            if (searchResultsContainer) {
                                searchResultsContainer.innerHTML = '<p class="text-center text-gray-500 mt-10">আপনার সার্চ ফলাফল এখানে দেখাবে।</p>'; // ইনপুট কম হলে ডিফল্ট মেসেজ
                            }
                        }
                    }, 300);
                });

                // যদি ফর্ম সাবমিট করা হয় (যেমন এন্টার চাপলে), তাহলে AJAX সার্চ করুন
                const searchForm = document.getElementById('searchForm');
                if (searchForm) {
                    searchForm.addEventListener('submit', function(event) {
                        event.preventDefault(); // ফর্ম সাবমিট হওয়া আটকান (পেজ রিলোড হবে না)
                        const query = searchInputField.value.trim();
                        if (query.length > 2) {
                            performSearch(query);
                        }
                    });
                }
            }

            function performSearch(query) {
                if (!searchResultsContainer) return; // কন্টেইনার না থাকলে সার্চের দরকার নেই

                const searchUrl = "{{ route('search') }}";

                searchResultsContainer.innerHTML = '<p class="text-center text-gray-500 mt-10">Searching...</p>';

                fetch(`${searchUrl}?query=${encodeURIComponent(query)}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(products => {
                    displaySearchResults(products);
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                    searchResultsContainer.innerHTML = '<p class="text-red-500 text-center mt-10">সার্চ ফলাফলে সমস্যা হয়েছে।</p>';
                });
            }

            function displaySearchResults(products) {
                let resultsHtml = '';
                if (products.length > 0) {
                    resultsHtml += '<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mt-5">';
                    products.forEach(product => {
                        resultsHtml += `
                            <a href="/product/${product.id}" class="block border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
                                {{-- এখানে সরাসরি product.image_url ব্যবহার করা হচ্ছে, কারণ এটি কন্ট্রোলার থেকে পূর্ণাঙ্গ URL হিসেবে আসবে --}}
                                <img src="${product.image_url}" alt="${product.name}" class="w-full h-40 object-cover">
                                <div class="p-2">
                                    <h4 class="text-sm font-semibold text-gray-800 truncate">${product.name}</h4>
                                    <p class="text-xs text-gray-600">${product.category_name || 'Uncategorized'}</p>
                                    <p class="text-sm font-bold text-green-600 mt-1">৳${product.price}</p>
                                </div>
                            </a>
                        `;
                    });
                    resultsHtml += '</div>';
                } else {
                    resultsHtml = '<p class="text-gray-600 text-center mt-10">কোনো ফলাফল পাওয়া যায়নি।</p>';
                }
                if (searchResultsContainer) {
                    searchResultsContainer.innerHTML = resultsHtml;
                }
            }
        });
    </script>
@endpush
