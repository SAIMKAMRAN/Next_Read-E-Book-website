<?php
include 'conn.php';
$query = "SELECT * FROM finance";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Finance Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex flex-col md:flex-row max-w-7xl mx-auto p-4">

        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 mb-6 md:mb-0 md:mr-6">
            <div class="bg-white rounded-xl shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold mb-4 text-gray-800">📚 Categories</h2>
                <ul class="space-y-3">
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">History</a></li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Finance</a></li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Health Care</a>
                    </li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Motivation</a>
                    </li>
                    <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Psychology</a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Books -->
        <main class="w-full md:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:scale-105 transition-transform duration-300 relative group">

                <!-- Like Button -->
                <button
                    class="absolute top-4 right-4 z-10 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg hover:bg-white transition-all duration-300">
                    <svg class="w-5 h-5 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>

                <!-- Badge -->
                <div class="absolute top-4 left-4 z-10">
                    <span
                        class="bg-gradient-to-r from-orange-400 to-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">Finance</span>
                </div>

                <!-- Book Image -->
                <div class="relative overflow-hidden">
                    <img src="<?= htmlspecialchars($row['Image_URL']) ?: 'https://via.placeholder.com/300x400' ?>"
                        alt="<?= htmlspecialchars($row['F_Name']) ?>"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300" />
                </div>

                <div class="flex space-x-2">
                    <button
                        onclick="openPaymentModal(<?= $row['F_id'] ?>, '<?= htmlspecialchars($row['F_Name']) ?>', '<?= htmlspecialchars($row['F_Des']) ?>', <?= $row['F_Price'] ?>)"
                        class="pay-button w-full bg-yellow-100 text-yellow-700 font-semibold py-3 px-4 rounded-xl transition"
                        data-id="<?= $row['F_id'] ?>">
                        💳 Pay First
                    </button>

                    <a href="book_details.php?id=<?= $row['F_id'] ?>&paid=true"
                        class="more-info-button hidden w-full bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold py-3 px-4 rounded-xl transition-all duration-300"
                        data-id="<?= $row['F_id'] ?>">
                        🔍 More Info
                    </a>
                </div>

            </div>
            <?php } ?>
        </main>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-lg w-full shadow-xl relative">
            <h2 class="text-2xl font-bold mb-4">Complete Your Purchase</h2>
            <p class="text-gray-700 mb-2" id="modalBookName"></p>
            <p class="text-gray-500 text-sm mb-4" id="modalBookDesc"></p>
            <p class="text-green-700 font-bold mb-4">Price: ₹<span id="modalBookPrice"></span></p>

            <label for="paymentMethod" class="block text-sm font-semibold mb-1">Select Payment Method:</label>
            <select id="paymentMethod" class="w-full border rounded p-2 mb-4">
                <option value="PayPal">PayPal</option>
                <option value="Stripe">Stripe</option>
                <option value="Razorpay">Razorpay</option>
            </select>

            <button id="confirmPayBtn" onclick="completePayment()"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition relative">
                <span id="payBtnText">Pay Now</span>
                <svg id="spinner" class="w-5 h-5 text-white animate-spin absolute right-4 top-2 hidden" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
            </button>

            <button onclick="closePaymentModal()"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-xl shadow-lg text-center max-w-md">
            <h2 class="text-xl font-bold text-green-600 mb-2">🎉 Payment Successful</h2>
            <p class="text-gray-700 mb-4">Your request has been submitted. The admin will approve your book download
                shortly.</p>
            <button onclick="closeSuccessModal()"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Okay</button>
        </div>
    </div>

    <!-- JS -->
    <script>
    let selectedBookId = null;
    let hasPaidMap = {};

    function openPaymentModal(id, name, desc, price) {
        selectedBookId = id;
        document.getElementById('modalBookName').textContent = name;
        document.getElementById('modalBookDesc').textContent = desc;
        document.getElementById('modalBookPrice').textContent = price;
        document.getElementById('paymentModal').classList.remove('hidden');
    }

    function closePaymentModal() {
        document.getElementById('paymentModal').classList.add('hidden');
    }

    function showSuccessModal() {
        document.getElementById('successModal').classList.remove('hidden');
    }

    function closeSuccessModal() {
        document.getElementById('successModal').classList.add('hidden');

        // Reset all buttons
        document.querySelectorAll('.pay-button').forEach(btn => btn.classList.remove('hidden'));
        document.querySelectorAll('.more-info-button').forEach(btn => btn.classList.add('hidden'));

        // Show only the paid one
        updateBookButtons(selectedBookId);
    }

    function updateBookButtons(bookId) {
        // Hide all others
        document.querySelectorAll('.pay-button').forEach(btn => btn.classList.remove('hidden'));
        document.querySelectorAll('.more-info-button').forEach(btn => btn.classList.add('hidden'));

        const payBtn = document.querySelector(`.pay-button[data-id='${bookId}']`);
        const infoBtn = document.querySelector(`.more-info-button[data-id='${bookId}']`);

        if (hasPaidMap[bookId]) {
            payBtn?.classList.add('hidden');
            infoBtn?.classList.remove('hidden');
        }
    }

    function completePayment() {
        const payBtn = document.getElementById('confirmPayBtn');
        const spinner = document.getElementById('spinner');
        const payText = document.getElementById('payBtnText');
        const method = document.getElementById('paymentMethod').value;

        payBtn.disabled = true;
        spinner.classList.remove('hidden');
        payText.classList.add('invisible');

        fetch('handle_payment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `book_id=${selectedBookId}&method=${encodeURIComponent(method)}`
            })
            .then(res => res.json())
            .then(data => {
                spinner.classList.add('hidden');
                payText.classList.remove('invisible');
                payBtn.disabled = false;

                if (data.status === 'success') {
                    hasPaidMap[selectedBookId] = true;
                    closePaymentModal();
                    showSuccessModal();
                } else {
                    alert(data.message || '❌ Unknown error occurred.');
                }
            })
            .catch(err => {
                spinner.classList.add('hidden');
                payText.classList.remove('invisible');
                payBtn.disabled = false;
                alert('❌ Network or server error occurred.');
            });

    }
    </script>

</body>

</html>