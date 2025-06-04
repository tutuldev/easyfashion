<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Easy Fashion')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
     <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* Optional: Add a smooth transition for the sidebar */

        /* Transition for dropdown menu */
        .dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .dropdown-menu.active {
            max-height: 200px; /* Adjust as needed for content height. Make it large enough for your content. */
        }
        .rotate-arrow {
            transform: rotate(180deg);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen">

        <div id="sidebarBackdrop" class="fixed inset-0 bg-black opacity-50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

        @include('backend.layouts.asidebar')
        @include('backend.layouts.main')

        @yield('content')
    </div>



    <script>
        const sidebar = document.getElementById('sidebar');
        const menuButton = document.getElementById('menuButton');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');

        // Function to toggle main sidebar visibility
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarBackdrop.classList.toggle('hidden');
        }

        // Function to toggle dropdown menus
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            // Find the arrow icon using the button that triggered the click
            const button = document.querySelector(`[data-dropdown-target="${dropdownId}"]`);
            const arrowIcon = button ? button.querySelector('.arrow-icon') : null;

            // Toggle the 'active' class on the dropdown content
            dropdown.classList.toggle('active');

            // Rotate the arrow icon if found
            if (arrowIcon) {
                arrowIcon.classList.toggle('rotate-arrow');
            }
        }

        // Add event listeners to all dropdown buttons
        document.querySelectorAll('[data-dropdown-target]').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-dropdown-target');
                toggleDropdown(targetId);
            });
        });

        // Event listeners for main sidebar toggle
        menuButton.addEventListener('click', toggleSidebar);
        closeSidebarBtn.addEventListener('click', toggleSidebar);
        sidebarBackdrop.addEventListener('click', toggleSidebar);

        // Close sidebar on resize for small screens
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) { // 'lg' breakpoint in Tailwind is 1024px
                sidebar.classList.remove('-translate-x-full');
                sidebarBackdrop.classList.add('hidden');
            } else {
                // If resized to small screen, ensure it's hidden unless opened
                // This prevents it from being visible if it was open on large screen and resized down
                if (!sidebar.classList.contains('-translate-x-full') && !sidebarBackdrop.classList.contains('hidden')) {
                     // Do nothing, it's open, keep it open.
                } else if (!sidebar.classList.contains('-translate-x-full')) {
                     sidebar.classList.add('-translate-x-full');
                }
            }
        });

        // Initial check for small screens to hide sidebar
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
            sidebarBackdrop.classList.add('hidden');
        }

    </script>
     @stack('scripts-bk')
</body>
</html>
