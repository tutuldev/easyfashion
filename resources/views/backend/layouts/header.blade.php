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
                <!-- Notification Button + Dropdown -->
                <div class="relative">
                    <button id="notif-btn" class="relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span id="notif-count"
                            class="hidden absolute -top-2 -right-2 bg-red-600 text-white text-xs font-semibold px-1.5 py-0.5 rounded-full shadow">
                            0
                        </span>
                    </button>

                    <!-- Dropdown Box -->
                    <div id="notif-dropdown"
                        class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg overflow-y-auto max-h-96 z-50">
                        <div id="notif-list"></div>
                    </div>

                    <!-- Notification Sound -->
                    {{-- <audio id="notif-sound" src="{{ asset('sound/notification.mp3') }}" preload="auto"></audio> --}}
                </div>


                <!-- Dark mode toggle -->
                <button class="text-gray-600 hover:text-yellow-500 text-xl focus:outline-none">
                    <i class="fas fa-moon"></i>
                </button>
                {{-- sound test  --}}
                {{-- <button onclick="document.getElementById('notif-sound').play()">🔊 Test Sound</button> --}}

            </div>

        </div>
        </header>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const NOTIF_URL = '/notifications/orders';
    const MARK_URL  = '/notifications/orders/mark-read';
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const countEl     = document.getElementById('notif-count');
    const dropdownEl  = document.getElementById('notif-dropdown');
    const listEl      = document.getElementById('notif-list');
    const soundPlayer = document.getElementById('notif-sound');

    let prevUnread = 0;

    // 🔊 Unlock audio permission
    document.addEventListener('click', () => {
        soundPlayer.play().then(() => soundPlayer.pause());
    }, { once: true });

    // ⏱️ Start polling
    loadNotifications();
    setInterval(loadNotifications, 5000);

    function timeAgo(dateString) {
        const now  = new Date();
        const past = new Date(dateString);
        const diff = Math.floor((now - past) / 1000);

        if (diff < 60) return `${diff} sec ago`;
        if (diff < 3600) return `${Math.floor(diff / 60)} min ago`;
        if (diff < 86400) return `${Math.floor(diff / 3600)} hour ago`;
        return `${Math.floor(diff / 86400)} day ago`;
    }

    async function loadNotifications() {
        try {
            const res = await fetch(NOTIF_URL, {
                headers: { 'Accept': 'application/json' },
                cache: 'no-store'
            });
            const data = await res.json();
            updateUI(data);
        } catch (err) {
            console.error('❌ Notification fetch error:', err);
        }
    }

    function updateUI(data) {
        // 🔢 Count
        if (data.unread > 0) {
            countEl.textContent = data.unread;
            countEl.classList.remove('hidden');
        } else {
            countEl.classList.add('hidden');
        }

        // 🔔 Sound
        if (data.unread > prevUnread) {
            soundPlayer.currentTime = 0;
            soundPlayer.play().catch(() => {});
        }
        prevUnread = data.unread;

        // 📝 Order List
        if (data.orders.length > 0) {
            listEl.innerHTML = data.orders.map(order => {
                let products = "";

                if (Array.isArray(order.product_details)) {
                    products = order.product_details.map(p =>
                        `<li class="text-xs text-gray-600">• ${p.name} (${p.size}) × ${p.quantity}</li>`
                    ).join('');
                } else {
                    products = "<li class='text-xs text-red-500'>No product info</li>";
                }

                return `
                    <a href="/admin/orders/${order.id}"
                       class="block px-4 py-3 hover:bg-gray-100 ${order.is_read ? '' : 'bg-blue-50'}">
                        <div class="flex justify-between text-sm">
                            <span class="font-semibold text-gray-800">#${order.id}</span>
                            <span class="text-gray-500 text-xs">${timeAgo(order.created_at)}</span>
                        </div>
                        <div class="text-sm text-gray-700">${order.customer_name} - ৳${Number(order.total).toFixed(2)}</div>
                        <ul class="mt-1 ml-2 space-y-0.5">
                            ${products}
                        </ul>
                    </a>
                `;
            }).join('') + `
                <div class="border-t p-2 text-center text-sm">
                    <a href="/admin/orders" class="text-blue-600 hover:underline">See all orders</a>
                </div>
            `;
        } else {
            listEl.innerHTML = `<p class="p-4 text-gray-500">No orders found</p>`;
        }
    }

    document.getElementById('notif-btn').addEventListener('click', async () => {
        dropdownEl.classList.toggle('hidden');

        if (!dropdownEl.dataset.marked && !dropdownEl.classList.contains('hidden')) {
            try {
                await fetch(MARK_URL, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json'
                    }
                });

                dropdownEl.dataset.marked = 'true';
                prevUnread = 0;
                loadNotifications();
            } catch (err) {
                console.error('❌ Mark read error:', err);
            }
        }
    });
});
</script>

