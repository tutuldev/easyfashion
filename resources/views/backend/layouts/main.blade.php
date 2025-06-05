 <main class="flex-grow p-6 lg:ml-64 overflow-y-auto">
            {{-- <div class="lg:hidden flex justify-start mb-6">
                <button id="menuButton" class="p-2 text-gray-800 bg-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div> --}}


<header class="mb-20">
  <div class="fixed top-0 left-6 right-6 lg:left-[280px] bg-white shadow p-4 rounded-lg flex items-center justify-between ">

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



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Total Orders</h2>
                    <p class="text-4xl font-bold text-blue-600">4,567</p>
                    <p class="text-sm text-gray-500 mt-2">Last 30 days</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Total Products</h2>
                    <p class="text-4xl font-bold text-green-600">876</p>
                    <p class="text-sm text-gray-500 mt-2">Active products</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Total Revenue (BDT)</h2>
                    <p class="text-4xl font-bold text-purple-600">৳ 1,250,000</p>
                    <p class="text-sm text-gray-500 mt-2">This month</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Orders</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount (BDT)</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#1001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Imran Hossain</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">৳ 1,500</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Processing</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#1002</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Farah Khan</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">৳ 2,200</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Shipped</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#1003</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Aminul Islam</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">৳ 850</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Delivered</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Top Selling Categories</h2>
                    <ul class="space-y-2">
                        <li class="py-2 border-b border-gray-200 last:border-b-0 flex items-center justify-between">
                            <span class="text-gray-700">Electronics</span>
                            <span class="text-blue-500 font-semibold">32%</span>
                        </li>
                        <li class="py-2 border-b border-gray-200 last:border-b-0 flex items-center justify-between">
                            <span class="text-gray-700">Fashion</span>
                            <span class="text-blue-500 font-semibold">28%</span>
                        </li>
                        <li class="py-2 border-b border-gray-200 last:border-b-0 flex items-center justify-between">
                            <span class="text-gray-700">Home & Garden</span>
                            <span class="text-blue-500 font-semibold">21%</span>
                        </li>
                        <li class="py-2 flex items-center justify-between">
                            <span class="text-gray-700">Books</span>
                            <span class="text-blue-500 font-semibold">19%</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Product Statistics</h2>
                <p class="text-gray-600 mb-4">Overview of your current product inventory and performance.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-100 p-4 rounded-md">
                        <h3 class="font-semibold text-gray-700 mb-2">Top Selling Products</h3>
                        <ol class="list-decimal list-inside text-gray-600">
                            <li class="py-1">Smartphone X</li>
                            <li class="py-1">Summer Dress Y</li>
                            <li class="py-1">Cookbook Z</li>
                        </ol>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-md">
                        <h3 class="font-semibold text-gray-700 mb-2">Low Stock Products</h3>
                        <ul class="list-disc list-inside text-red-500">
                            <li class="py-1">Product A (5 left)</li>
                            <li class="py-1">Product B (12 left)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Sales Chart</h2>
                <p class="text-gray-600">Visual representation of sales trends over time.</p>
                <div class="mt-4 h-64 bg-gray-50 border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                    <span>Sales Chart Placeholder</span>
                </div>
            </div>

        </main>
