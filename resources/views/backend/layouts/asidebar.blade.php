    <aside id="sidebar" class="w-64 bg-gray-800 text-white p-4 flex flex-col fixed inset-y-0 left-0 z-50 shadow-lg sidebar-transition transform -translate-x-full lg:translate-x-0 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <div class="text-2xl font-semibold">Dashboard</div>
                <button id="closeSidebarBtn" class="lg:hidden text-gray-400 hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <nav class="flex-grow">
                <ul>
                    <li class="mb-2">
                        <a href="/" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 01-1 1h-3"></path></svg>
                            Overview
                        </a>
                    </li>
                    <li class="mb-2">
                        <div class="p-2 text-gray-400 text-xs font-semibold uppercase tracking-wider">
                            Catalog
                        </div>
                    </li>

                    <li class="mb-2">
                        <button class="flex items-center justify-between w-full p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200 focus:outline-none" data-dropdown-target="categoriesDropdown">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                Categories
                            </span>
                            <svg class="w-4 h-4 transform transition-transform arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul id="categoriesDropdown" class="dropdown-menu ml-6 mt-1 space-y-1">
                            <li><a href="{{route('categories.index')}}" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">All Categories</a></li>
                            <li><a href="{{route("categories.create")}}" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">Add New Category</a></li>
                            <li><a href="#" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">Category Reports</a></li>
                        </ul>
                    </li>

                    <li class="mb-2">
                        <button class="flex items-center justify-between w-full p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200 focus:outline-none" data-dropdown-target="productsDropdown">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 16h14M5 16a2 2 0 110-4h14a2 2 0 110 4"></path></svg>
                                Products
                            </span>
                            <svg class="w-4 h-4 transform transition-transform arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <ul id="productsDropdown" class="dropdown-menu ml-6 mt-1 space-y-1">
                            <li><a href="{{route('products.index')}}" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">All Products</a></li>
                            <li><a href="{{route('products.create')}}" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">Add New Product</a></li>
                            <li><a href="#" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">Product Inventory</a></li>
                            <li><a href="#" class="block p-2 text-gray-400 hover:bg-gray-700 rounded-md text-sm">Product Reviews</a></li>
                        </ul>
                    </li>

                    <li class="mb-2">
                        <div class="p-2 text-gray-400 text-xs font-semibold uppercase tracking-wider mt-4">
                            Orders
                        </div>
                    </li>
                    <li class="mb-2">
                        <a href="{{route('orders.index')}}" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-6-4v8m-3-4h.01M9 16h.01"></path></svg>
                            All Orders
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-2.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Returns
                        </a>
                    </li>
                    <li class="mb-2">
                        <div class="p-2 text-gray-400 text-xs font-semibold uppercase tracking-wider mt-4">
                            Customers
                        </div>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Customers List
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m8-6h2M4 12H2m15.364-6.364l1.414-1.414M6.222 17.778l-1.414 1.414m12.364 0l1.414 1.414M6.222 6.222L4.808 4.808"></path></svg>
                            Analytics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m8-6h2M4 12H2m15.364-6.364l1.414-1.414M6.222 17.778l-1.414 1.414m12.364 0l1.414 1.414M6.222 6.222L4.808 4.808"></path></svg>
                            Coupons
                        </a>
                    </li>
                     <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m8-6h2M4 12H2m15.364-6.364l1.414-1.414M6.222 17.778l-1.414 1.414m12.364 0l1.414 1.414M6.222 6.222L4.808 4.808"></path></svg>
                            Reports
                        </a>
                    </li>
                     <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m8-6h2M4 12H2m15.364-6.364l1.414-1.414M6.222 17.778l-1.414 1.414m12.364 0l1.414 1.414M6.222 6.222L4.808 4.808"></path></svg>
                            Settings
                        </a>
                    </li>
                     <li class="mb-2">
                        <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 16v-2m8-6h2M4 12H2m15.364-6.364l1.414-1.414M6.222 17.778l-1.414 1.414m12.364 0l1.414 1.414M6.222 6.222L4.808 4.808"></path></svg>
                            Integrations
                        </a>
                    </li>
                </ul>
            </nav>

         <div class="mt-auto">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
    <a href="#" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 rounded-md transition duration-200"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
        Logout
    </a>
</div>
        </aside>
