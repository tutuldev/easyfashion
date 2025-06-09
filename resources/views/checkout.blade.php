@extends('frontend.app')
@section('title', 'Checkout')
@section('content')

    <div class="bg-white">
        <div class="h-24"></div> {{-- Spacer for fixed header --}}

        {{-- Main Checkout Content Area --}}
        <div class="max-w-screen-xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            {{-- Updated Page Title --}}
            <h1 class="p-8 text-3xl text-center font-bold text-gray-600 px-3 py-3">Checkout</h1>

            <div class="bg-white p-8 rounded-lg shadow-md">

                {{-- Progress Stepper Section --}}
                <div class="flex justify-between items-start mb-4 text-gray-500 relative">
                    <div class="flex flex-col items-center flex-1 z-10">
                        <span class="material-icons text-2xl mb-1">shopping_bag</span>
                        <div class="font-medium text-sm">SHOPPING BAG</div>
                        <div class="text-xs mt-1">REVIEW YOUR ITEMS</div>
                    </div>

                    <div class="flex flex-col items-center flex-1 z-10">
                        <span class="material-icons text-2xl mb-1 text-gray-800">local_shipping</span>
                        <div class="font-semibold text-sm text-gray-800">SHIPPING AND CHECKOUT</div>
                        <div class="text-xs mt-1 text-gray-800">ENTER YOUR DETAILS</div>
                    </div>

                    <div class="flex flex-col items-center flex-1 z-10">
                        <span class="material-icons text-2xl mb-1">check_circle_outline</span>
                        <div class="font-medium text-sm">CONFIRMATION</div>
                        <div class="text-xs mt-1">REVIEW YOUR ORDER</div>
                    </div>
                </div>

                <div class="w-full bg-gray-200 h-1 rounded-full mb-12 relative">
                    {{-- The width should be 66% for checkout step --}}
                    <div id="progress-bar" class="absolute top-0 left-0 h-full bg-blue-500 rounded-full transition-all duration-500 ease-in-out" style="width: 66%;"></div>
                </div>

                {{-- Returning Customer / Coupon section --}}
                <div class="mb-8">
                    <p class="text-gray-700 text-sm mb-4 bg-gray-100 py-7 px-5 rounded-md shadow-sm">
                        <span class="material-icons text-sm align-middle mr-4 text-gray-500">person_outline</span>
                        Returning customer? <a href="{{route('login')}}" class="text-indigo-600 hover:underline">Click here to login</a>
                    </p>
                    <p class="text-gray-700 text-sm">
                        <span class="material-icons text-sm align-middle mr-1">confirmation_number</span>
                        Have a coupon? <a href="#" class="text-indigo-600 border-black border-b hover:border-b-2">Click here to enter your code</a>
                    </p>
                </div>

                <div class="flex flex-col lg:flex-row gap-8">
                    {{-- Billing Details Section --}}
                    <div class="w-full lg:w-1/2">
                        <h2 class="text-base font-bold text-gray-500 mb-6 pb-2 border-b">YOUR DETAILS</h2>

                        <div class="mb-4">
                            <a href="https://accounts.google.com/o/oauth2/auth?client_id=YOUR_GOOGLE_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URI&scope=email%20profile&response_type=code" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center w-full gap-3 bg-white border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-md shadow-lg hover:shadow-xl transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#4285F4"
                                        d="M20.64 12.2045c0-.6381-.0573-1.2518-.1636-1.8409H12v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7959 2.7164v2.2581h2.9087c1.7018-1.5668 2.6836-3.874 2.6836-6.615z">
                                    </path>
                                    <path fill="#34A853"
                                        d="M12 21c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2581c-.8059.54-1.8368.859-3.0477.859-2.344 0-4.3282-1.5831-5.036-3.7104H3.9574v2.3318C5.4382 18.9832 8.4818 21 12 21z">
                                    </path>
                                    <path fill="#FBBC05"
                                        d="M6.964 13.71c-.18-.54-.2822-1.1168-.2822-1.71s.1023-1.17.2823-1.71V7.9582H3.9573A8.9965 8.9965 0 0 0 3 12c0 1.4523.3477 2.8268.9573 4.0418L6.964 13.71z">
                                    </path>
                                    <path fill="#EA4335"
                                        d="M12 6.5795c1.3214 0 2.5077.4541 3.4405 1.346l2.5813-2.5814C16.4632 3.8918 14.426 3 12 3 8.4818 3 5.4382 5.0168 3.9573 7.9582L6.964 10.29C7.6718 8.1627 9.6559 6.5795 12 6.5795z">
                                    </path>
                                </svg>
                                <span>Continue with <strong>Google</strong></span>
                            </a>
                            {{-- Important: Replace YOUR_GOOGLE_CLIENT_ID and YOUR_REDIRECT_URI with actual values for Google OAuth --}}
                        </div>

                        <form id="checkoutForm">
                            @csrf {{-- Add CSRF token for Laravel forms --}}
                            <div class="mb-4">
                                <label for="customer_name" class="block text-gray-700 text-sm font-semibold mb-2">YOUR FULL NAME<span class="text-red-500">*</span></label>
                                <input type="text" id="customer_name" name="customer_name" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required />
                            </div>

                            <div class="mb-4">
                                <label for="customer_phone" class="block text-gray-700 text-sm font-semibold mb-2">MOBILE NUMBER<span class="text-red-500">*</span></label>
                                <input type="tel" id="customer_phone" name="customer_phone" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required />
                            </div>

                            <div class="mb-4">
                                <label for="customer_email" class="block text-gray-700 text-sm font-semibold mb-2">EMAIL (OPTIONAL)</label>
                                <input type="email" id="customer_email" name="customer_email" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" />
                            </div>

                            <div class="mb-4">
                                <label for="delivery_address" class="block text-gray-700 text-sm font-semibold mb-2">YOUR FULL ADDRESS<span class="text-red-500">*</span></label>
                                <textarea id="delivery_address" name="delivery_address" rows="3" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" placeholder="House number, street name, apartment, etc." required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="district" class="block text-gray-700 text-sm font-semibold mb-2">DISTRICT<span class="text-red-500">*</span></label>
                                <select id="district" name="district" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Outside Dhaka">Outside Dhaka</option>
                                    {{-- Add more districts here if needed --}}
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="postcode" class="block text-gray-700 text-sm font-semibold mb-2">POSTCODE (OPTIONAL)</label>
                                <input type="text" id="postcode" name="postcode" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" />
                            </div>

                            <div class="mb-4">
                                <label for="order_notes" class="block text-gray-700 text-sm font-semibold mb-2">ORDER NOTES (OPTIONAL)</label>
                                <textarea id="order_notes" name="order_notes" rows="3" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </form>
                    </div>

                    {{-- Your Order Section --}}
                    <div class="w-full lg:w-1/2 bg-gray-50 p-6 rounded-lg shadow-inner">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">YOUR ORDER</h2>

                        <div class="grid grid-cols-2 text-gray-600 font-medium text-sm border-b pb-2 mb-4 uppercase">
                            <div>Product</div>
                            <div class="text-right">Subtotal</div>
                        </div>

                        {{-- Product items in order summary will be dynamically loaded here --}}
                        <div id="orderItemsContainer">
                            <p class="text-gray-600 text-center py-4 hidden" id="noOrderProductsMessage">Your cart is empty.</p>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b border-gray-200 mt-4">
                            <span class="text-gray-600 text-sm">SUBTOTAL</span>
                            <span class="font-semibold text-gray-800 text-sm" id="orderSubtotal">৳0</span>
                        </div>
                        <div class="py-2 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600 text-sm">SHIPPING</span>
                                <span class="font-semibold text-gray-800 text-sm" id="shippingDisplay">Inside Dhaka & Free Delivery</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center py-4">
                            <span class="text-gray-800 font-bold text-base">TOTAL</span>
                            <span class="text-gray-800 font-bold text-base" id="orderTotal">৳0</span>
                        </div>

                        {{-- Payment Methods --}}
                        <div class="mt-4">
                            <div class="bg-gray-200 rounded-md p-4 mb-4">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash_on_delivery" class="form-radio h-4 w-4 text-blue-600" checked />
                                    <span class="ml-2 text-gray-800 font-semibold text-sm">Cash on delivery</span>
                                </label>
                                <p class="text-xs text-gray-600 mt-2">Pay with cash upon delivery.</p>
                            </div>

                            <div class="bg-gray-200 rounded-md p-4 mb-4">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="mobile_banking" class="form-radio h-4 w-4 text-blue-600" />
                                    <span class="ml-2 text-gray-800 font-semibold text-sm">BKash Mobile Banking (bKash Gateway V2)</span>
                                </label>
                                <p class="text-xs text-gray-600 mt-2">Pay via Mobile Banking (bKash, Rocket, Nagad, Any Cards or Your Bank Online Gateway)</p>
                                <div class="mt-2">
                                    <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-full">DETAILS</a>
                                </div>
                            </div>
                        </div>

                        <p class="text-xs text-gray-600 mt-4 mb-4">
                            Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" class="text-indigo-600 hover:underline">PRIVACY POLICY</a>.
                        </p>

                        <button type="submit" id="placeOrderButton" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 rounded-md mt-4 text-sm focus:outline-none focus:shadow-outline flex items-center justify-center">
                            <span class="material-icons text-base mr-2">lock</span> PLACE ORDER
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-40"></div>

@endsection




@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderItemsContainer = document.getElementById('orderItemsContainer');
        const orderSubtotalSpan = document.getElementById('orderSubtotal');
        const orderTotalSpan = document.getElementById('orderTotal');
        const noOrderProductsMessage = document.getElementById('noOrderProductsMessage');
        const placeOrderButton = document.getElementById('placeOrderButton');
        const checkoutForm = document.getElementById('checkoutForm');
        const districtSelect = document.getElementById('district'); // Renamed to districtSelect for simplicity
        const shippingDisplay = document.getElementById('shippingDisplay');

        // Function to calculate and display shipping cost and total
        function updateShippingCostAndTotal() {
            const cart = JSON.parse(localStorage.getItem('easyBagCart')) || [];
            let currentSubtotal = 0;
            cart.forEach(item => {
                currentSubtotal += item.price * item.quantity;
            });

            let shippingCost = 0;
            let displayMessage = "Inside Dhaka & Free Delivery"; // Default

            const selectedDistrict = districtSelect ? districtSelect.value : 'Dhaka'; // Default to Dhaka if not found

            if (selectedDistrict === 'Outside Dhaka') {
                shippingCost = 80; // Example cost for outside Dhaka
                displayMessage = "Outside Dhaka: ৳80";
            } else {
                shippingCost = 0; // Free delivery inside Dhaka
                displayMessage = "Inside Dhaka & Free Delivery";
            }

            shippingDisplay.textContent = displayMessage;
            orderTotalSpan.textContent = `৳${(currentSubtotal + shippingCost).toFixed(2)}`;
        }

        // Function to load cart items from localStorage
        function loadCartItems() {
            const cart = JSON.parse(localStorage.getItem('easyBagCart')) || [];
            orderItemsContainer.innerHTML = ''; // Clear previous items
            let subtotal = 0;

            if (cart.length === 0) {
                noOrderProductsMessage.classList.remove('hidden');
                placeOrderButton.disabled = true; // Disable order button if cart is empty
                placeOrderButton.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                noOrderProductsMessage.classList.add('hidden');
                placeOrderButton.disabled = false;
                placeOrderButton.classList.remove('opacity-50', 'cursor-not-allowed');

                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    subtotal += itemTotal;

                    const itemDiv = document.createElement('div');
                    itemDiv.classList.add('flex', 'justify-between', 'items-center', 'py-2', 'border-b', 'border-gray-200');
                    itemDiv.innerHTML = `
                        <div class="text-gray-700 text-sm">
                            ${item.name}
                            ${item.size ? `<span class="text-xs text-gray-500"> (Size: ${item.size})</span>` : ''}
                            ${item.color ? `<span class="text-xs text-gray-500"> (Color: ${item.color})</span>` : ''}
                            <strong class="font-semibold">× ${item.quantity}</strong>
                        </div>
                        <div class="text-gray-800 font-semibold text-sm">৳${itemTotal.toFixed(2)}</div>
                    `;
                    orderItemsContainer.appendChild(itemDiv);
                });
            }

            orderSubtotalSpan.textContent = `৳${subtotal.toFixed(2)}`;
            updateShippingCostAndTotal(); // Update total after cart items are loaded
        }

        // Event listener for district change
        districtSelect.addEventListener('change', updateShippingCostAndTotal);

        // Event listener for Place Order button
        placeOrderButton.addEventListener('click', async function(event) {
            event.preventDefault(); // Prevent default form submission

            // Basic form validation (for required fields)
            if (!checkoutForm.checkValidity()) {
                checkoutForm.reportValidity(); // Show native browser validation messages
                return;
            }

            // Collect form data manually for simplified fields
            const data = {
                customer_name: document.getElementById('customer_name').value,
                customer_phone: document.getElementById('customer_phone').value,
                customer_email: document.getElementById('customer_email').value,
                delivery_address: document.getElementById('delivery_address').value,
                district: document.getElementById('district').value,
                postcode: document.getElementById('postcode').value,
                order_notes: document.getElementById('order_notes').value,
            };

            // Add cart items from localStorage to the data object
            data.cart_items = JSON.parse(localStorage.getItem('easyBagCart')) || [];
            if (data.cart_items.length === 0) {
                showMessageBox('Your cart is empty. Please add items before placing an order.');
                return;
            }

            // Log cart_items to console for debugging
            console.log('Cart items being sent:', data.cart_items);

            // Get selected payment method
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
            if (selectedPaymentMethod) {
                data.payment_method = selectedPaymentMethod.value;
            } else {
                showMessageBox('Please select a payment method.');
                return;
            }

            // Get total from UI for sending to backend (these are just for display, backend recalculates for security)
            data.subtotal = parseFloat(orderSubtotalSpan.textContent.replace('৳', '').replace(/,/g, ''));
            data.total = parseFloat(orderTotalSpan.textContent.replace('৳', '').replace(/,/g, ''));
            data.shipping_cost = (data.district === 'Outside Dhaka') ? 80 : 0; // Send calculated shipping cost

            // Disable button and show loading state
            placeOrderButton.disabled = true;
            placeOrderButton.innerHTML = '<span class="material-icons animate-spin mr-2">refresh</span> PLACING ORDER...';
            placeOrderButton.classList.add('opacity-50', 'cursor-not-allowed');

            try {
                const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
                let csrfToken = '';
                if (csrfTokenMeta) {
                    csrfToken = csrfTokenMeta.getAttribute('content');
                } else {
                    console.error('CSRF token meta tag not found!');
                    showMessageBox('Security error: CSRF token missing. Please refresh the page.');
                    // Re-enable button and restore text
                    placeOrderButton.disabled = false;
                    placeOrderButton.innerHTML = '<span class="material-icons text-base mr-2">lock</span> PLACE ORDER';
                    placeOrderButton.classList.remove('opacity-50', 'cursor-not-allowed');
                    return; // Exit if token is missing
                }

                const response = await fetch('{{ route('order') }}', { // Ensure this route matches your web.php
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Use the obtained CSRF token
                    },
                    body: JSON.stringify(data)
                });

                // Always try to parse JSON, even if response is not OK, as Laravel sends JSON for validation errors (422)
                const result = await response.json();

                if (response.ok) {
                    showMessageBox(result.message);
                    localStorage.removeItem('easyBagCart'); // Clear cart after successful order
                    // Optionally redirect to a confirmation page or order history
                    window.location.href = result.redirect_url || '/order-confirmation/' + result.order_id;
                } else {
                    let errorMessage = 'Failed to place order.';
                    console.error('Server response:', response.status, result); // Log the full result for non-OK responses
                    if (result.errors) {
                        // Display validation errors from Laravel
                        errorMessage += '\nValidation Errors:\n';
                        for (const field in result.errors) {
                            errorMessage += `${field}: ${result.errors[field].join(', ')}\n`;
                        }
                    } else if (result.message) {
                        errorMessage = result.message;
                    }
                    showMessageBox(errorMessage);
                }
            } catch (error) {
                // This catch block will now specifically handle network errors or JSON parsing errors
                if (error instanceof SyntaxError) { // JSON parsing error
                    console.error('JSON parsing error (server sent non-JSON or malformed JSON):', error);
                    showMessageBox('Received invalid data from server. Please try again. Check server logs for details.');
                } else { // Network error or other unexpected error
                    console.error('Network or unexpected error during fetch:', error);
                    showMessageBox('An unexpected error occurred. Please try again. Check network tab and console for details.');
                }
            } finally {
                // Re-enable button and restore text
                placeOrderButton.disabled = false;
                placeOrderButton.innerHTML = '<span class="material-icons text-base mr-2">lock</span> PLACE ORDER';
                placeOrderButton.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        });

        // Custom Message Box instead of alert()
        function showMessageBox(message) {
            const messageBoxOverlay = document.createElement('div');
            messageBoxOverlay.id = 'messageBoxOverlay';
            messageBoxOverlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
            messageBoxOverlay.innerHTML = `
                <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full mx-4 text-center">
                    <p class="text-gray-800 text-lg mb-4">${message}</p>
                    <button id="messageBoxCloseBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                        OK
                    </button>
                </div>
            `;
            document.body.appendChild(messageBoxOverlay);

            document.getElementById('messageBoxCloseBtn').addEventListener('click', () => {
                document.body.removeChild(messageBoxOverlay);
            });
            messageBoxOverlay.addEventListener('click', (e) => {
                if (e.target === messageBoxOverlay) {
                    document.body.removeChild(messageBoxOverlay);
                }
            });
        }

        // Initial load of cart items
        loadCartItems();
    });
</script>
@endpush



