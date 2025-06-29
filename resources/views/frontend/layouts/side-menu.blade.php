   <div id="side-menu-front" class="fixed inset-y-0 left-0 bg-white w-screen h-screen transform -translate-x-full transition-transform duration-300 ease-in-out z-40 shadow-lg sm:hidden">
    <div class="px-4 pb-10 pt-7 border-b flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Easy Fasion Ltd.</h2>
        <button id="closeSidebarButton" class="text-gray-700 focus:outline-none">
            <i class="material-icons text-2xl">arrow_back</i>
        </button>
    </div>
  <nav class="mt-4">
    <a href="/" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200">
        HOME
    </a>
    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200">
       EID AL-ADHA 25

    </a>
    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200">
        SHOP
    </a>
    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-200">
        EASY
    </a>
</nav>
    <div class="fixed bottom-2 w-full flex justify-between border-t px-10 py-2">
        <p class="">CREATE TO YOUR ACOUNT</p>

        <a href="{{ route('login') }}" class="hover:">
            <span class="material-symbols-outlined">person</span>
        </a>
    </div>
    </div>
