<div id="fullWidthSearchPopup" class="search-popup fixed left-0 w-full bg-white shadow-lg z-40 h-0 border-t">
    <div class="max-w-screen-md mx-auto  p-8 flex flex-col h-full">

        <h3 class="uppercase font-semibold text-lg text-gray-600">Search easyfashion.com.bd</h3>
        <input type="search" name="" id="searchInputField"
            class="w-full my-5 pl-0 border-0 border-b-2 font-semibold border-gray-400 focus:border-gray-400 focus:ring-0 outline-none text-md "
            placeholder="TYPE TO SEARCH.." />

        <p class="text-base uppercase font-semibold text-gray-600">Tranding</p>
        <div class="flex flex-wrap  gap-3 mt-3 text-center ">
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

        {{-- search product card  --}}




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

            const openSidebarBtn = document.getElementById('openSidebarBtn');
            const wishlistButton = document.getElementById('wishlistButton');
            const persionLogin = document.getElementById('persion-login');

            const homeBtn = document.getElementById('home-btn');
            const eventBtn = document.getElementById('event-btn');
            const shopBtn = document.getElementById('shop-btn');
            const easyBtn = document.getElementById('easy-btn');
            const howtoBtn = document.getElementById('howto-btn');

            // একটি অ্যারেতে সব বাটন একত্রিত করুন এবং তাদের ইনিশিয়াল টেক্সট ক্লাস সংরক্ষণ করুন
            const navButtons = [
                homeBtn,
                eventBtn,
                shopBtn,
                easyBtn,
                howtoBtn,
                openSidebarBtn,
                wishlistButton,
                persionLogin,
                searchToggleButton
            ].filter(btn => btn !== null); // নিশ্চিত করুন যে শুধু বিদ্যমান বাটনগুলোই অ্যারেতে আছে

            // প্রতিটি বাটনের জন্য তার initial text color class সংরক্ষণ করার জন্য একটি Map ব্যবহার করুন
            const initialTextClasses = new Map();

            navButtons.forEach(btn => {
                if (btn) {
                    // btn-এর বর্তমান text-white বা text-black ক্লাসটি খুঁজে বের করে সংরক্ষণ করুন
                    if (btn.classList.contains('text-white')) {
                        initialTextClasses.set(btn, 'text-white');
                    } else if (btn.classList.contains('text-black')) {
                        initialTextClasses.set(btn, 'text-black');
                    }
                }
            });


            let isPopupOpen = false;
            let navHeight = mainNav.offsetHeight;

            function toggleSearchPopup() {
                isPopupOpen = !isPopupOpen;

                searchIconContainer.classList.toggle('hidden', isPopupOpen);
                closeIconContainer.classList.toggle('hidden', !isPopupOpen);

                if (isPopupOpen) {
                    fullWidthSearchPopup.style.top = `${navHeight}px`;
                    fullWidthSearchPopup.style.height = `600px`;
                    fullWidthSearchPopup.classList.add('active');

                    // পপআপ সক্রিয় হলে front-navbar ক্লাসে পরিবর্তন করুন
                    frontNavbar.classList.remove('bg-white/15');
                    frontNavbar.classList.add('bg-white');

                    // প্রতিটি বাটনের text ক্লাস পরিবর্তন করে text-black করুন
                    navButtons.forEach(btn => {
                        // আগে যদি text-white বা text-black থাকে, তা সরিয়ে text-black সেট করুন
                        const initialClass = initialTextClasses.get(btn);
                        if (initialClass) {
                            btn.classList.remove(initialClass);
                        }
                        btn.classList.add('text-black');
                    });

                    fullWidthSearchPopup.querySelector('input').focus();
                    document.body.style.overflow = 'hidden';
                } else {
                    fullWidthSearchPopup.style.height = '0px';
                    fullWidthSearchPopup.classList.remove('active');

                    // পপআপ নিষ্ক্রিয় হলে front-navbar ক্লাসে পরিবর্তন ফিরিয়ে আনুন
                    frontNavbar.classList.remove('bg-white');
                    frontNavbar.classList.add('bg-white/15');

                    // প্রতিটি বাটনের text ক্লাস তার প্রাথমিক অবস্থায় ফিরিয়ে আনুন
                    navButtons.forEach(btn => {
                        btn.classList.remove('text-black'); // নিশ্চিত করুন যে text-black সরিয়ে দেওয়া হয়েছে
                        const initialClass = initialTextClasses.get(btn);
                        if (initialClass) {
                            btn.classList.add(initialClass); // প্রাথমিক ক্লাসটি ফিরিয়ে আনুন
                        }
                    });

                    document.body.style.overflow = '';
                }
            }

            window.addEventListener('resize', function() {
                navHeight = mainNav.offsetHeight;
                if (isPopupOpen) {
                    fullWidthSearchPopup.style.top = `${navHeight}px`;
                }
            });

            searchToggleButton.addEventListener('click', function(event) {
                event.stopPropagation();
                toggleSearchPopup();
            });

            document.addEventListener('click', function(event) {
                if (isPopupOpen && !fullWidthSearchPopup.contains(event.target) && !searchToggleButton.contains(event.target)) {
                    toggleSearchPopup();
                }
            });

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && isPopupOpen) {
                    toggleSearchPopup();
                }
            });

            trendingTags.forEach(tag => {
                tag.addEventListener('click', function() {
                    searchInputField.value = this.textContent;
                    searchInputField.focus();
                });
            });
        });
    </script>
@endpush


