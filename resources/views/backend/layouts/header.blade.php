
 <header class="mb-20">
        <div class="fixed top-0 left-6 right-6 lg:left-[280px] bg-white shadow p-4  flex items-center justify-between ">

            <!-- Logo / Title -->
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 lg:block hidden">Admin</h1>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex justify-start">
            <button id="menuButton" class="p-2 text-gray-800 bg-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            </div>

            <!-- Center: Search Bar -->
            <div class="flex items-center space-x-4 w-full max-w-xl mx-6">
            <div class="relative w-full">
                <input
                type="text"
                placeholder="Search..."
                class="w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <svg
                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
                </svg>
            </div>
            </div>

            <!-- Right side icons -->
            <div class="flex items-center space-x-4">
            <!-- Notification -->
            <button class="relative text-gray-600 hover:text-blue-600 text-xl focus:outline-none">
                <i class="fas fa-bell"></i>
                <span
                    class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-semibold px-1.5 py-0.5 rounded-full shadow">
                    3
                </span>
            </button>


            <!-- Dark mode toggle -->
            <button class="text-gray-600 hover:text-yellow-500 text-xl focus:outline-none">
                <i class="fas fa-moon"></i>
            </button>
            </div>

        </div>
        </header>
