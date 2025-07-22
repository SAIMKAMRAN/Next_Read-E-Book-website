<?php 
include("navbar.php");
include("conn.php");

$showModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $book = $_POST["book"];
  $quantity = (int)$_POST["quantity"];
  $priceText = $_POST["price"];
  $price = floatval(str_replace('$', '', $priceText)); // Remove $ sign
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $payment = $_POST["payment"];
  $message = $_POST["message"];

  // Secure insertion using prepared statements
  $stmt = $conn->prepare("INSERT INTO shop (B_Book, B_Quantity, B_Price, U_Name, U_Email, U_Phone, U_Payment, U_Message) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sidsssss", $book, $quantity, $price, $name, $email, $phone, $payment, $message);

  if ($stmt->execute()) {
    $showModal = true;
  } else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";
  }

  $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NextRead | Book Order</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .animate-fade-in-up {
      animation: fadeInUp 0.6s ease-out both;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .bg-gradient-darkblue {
      background: linear-gradient(to bottom right, #0f172a, #1e293b);
    }

    select,
    select option {
      background-color: #0f172a;
      color: white;
    }
  </style>
</head>
<body class="bg-gradient-darkblue text-white min-h-screen">

  <!-- Title -->
  <section class="text-center py-10 animate-fade-in-up">
    <h1 class="text-4xl font-bold text-white mb-2">Place Your Book Order</h1>
    <p class="text-white/70">Fill the form below to get your favorite book delivered</p>
  </section>

  <!-- Order Form -->
  <section class="bg-[#1e293b] py-10 px-6 md:px-16 rounded-xl shadow-xl mx-4 md:mx-auto max-w-5xl animate-fade-in-up">
    <form id="orderForm" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- Book Name -->
      <div class="md:col-span-2">
        <label class="block mb-1 text-sm font-medium">Book Name</label>
        <input type="text" name="book" placeholder="Enter book name" class="w-full p-3 bg-[#0f172a] text-white placeholder-white/60 border border-white/20 rounded-lg focus:ring-2 focus:ring-blue-500" required />
      </div>

      <!-- Quantity -->
      <div>
        <label class="block mb-1 text-sm font-medium">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" max="10" value="1" class="w-full p-3 bg-[#0f172a] text-white border border-white/20 rounded-lg placeholder-white/60 focus:ring-2 focus:ring-blue-500" required />
      </div>

      <!-- Total Price -->
      <div>
        <label class="block mb-1 text-sm font-medium">Total Price ($)</label>
        <input type="text" name="price" id="totalPrice" value="$20" readonly class="w-full p-3 bg-[#0f172a] text-white border border-white/20 rounded-lg" />
      </div>

      <!-- Full Name -->
      <div>
        <label class="block mb-1 text-sm font-medium">Full Name</label>
        <input type="text" name="name" placeholder="John Doe" class="w-full p-3 bg-[#0f172a] text-white border border-white/20 rounded-lg placeholder-white/60 focus:ring-2 focus:ring-blue-500" required />
      </div>

      <!-- Email -->
      <div>
        <label class="block mb-1 text-sm font-medium">Email Address</label>
        <input type="email" name="email" placeholder="john@example.com" class="w-full p-3 bg-[#0f172a] text-white border border-white/20 rounded-lg placeholder-white/60 focus:ring-2 focus:ring-blue-500" required />
      </div>

      <!-- Phone -->
      <div>
        <label class="block mb-1 text-sm font-medium">Phone Number</label>
        <input type="tel" name="phone" placeholder="+91 9876543210" class="w-full p-3 bg-[#0f172a] text-white border border-white/20 rounded-lg placeholder-white/60 focus:ring-2 focus:ring-blue-500" required />
      </div>

      <!-- Payment Method -->
      <div>
        <label class="block mb-1 text-sm font-medium">Payment Method</label>
        <select name="payment" class="w-full p-3 border border-white/20 rounded-lg focus:ring-2 focus:ring-blue-500" required>
          <option disabled selected>Select Payment Option</option>
          <option>UPI / Paytm</option>
          <option>PayPal</option>
          <option>Credit/Debit Card</option>
        </select>
      </div>

      <!-- Message -->
      <div class="md:col-span-2">
        <label class="block mb-1 text-sm font-medium">Any Message</label>
        <textarea name="message" rows="3" placeholder="Message" class="w-full p-3 bg-[#0f172a] text-white border border-white/20 rounded-lg placeholder-white/60 focus:ring-2 focus:ring-blue-500" required></textarea>
      </div>

      <!-- Submit -->
      <div class="md:col-span-2 text-center pt-6">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3 rounded-lg font-semibold text-lg transition">
          Place Order
        </button>
      </div>
    </form>
  </section>

  <!-- Footer -->
  <footer class="py-6 text-center text-white/70 text-sm">
    © 2025 NextRead. All rights reserved.
  </footer>

  <!-- Success Modal -->
  <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black/60 z-50 hidden" style="font-family: 'Poppins', sans-serif;">
    <div class="bg-white text-gray-800 p-8 pt-10 rounded-xl shadow-lg max-w-md text-center relative animate-fade-in-up">
      <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 w-24 h-24 rounded-full bg-white p-2 shadow-md">
        <img src="images/logo.png" alt="NextRead Logo" class="w-full h-full object-contain rounded-full" />
      </div>
      <h2 class="text-2xl font-semibold text-blue-600 mt-14 mb-4">Order Placed Successfully!</h2>
      <p class="text-gray-700 text-[15px] font-medium mb-6 leading-relaxed">
        Thank you for your order! We have successfully received your payment.<br />
        You will receive an email on your provided Gmail address within 2 days.<br />
        Please read it carefully to download your book.<br />
        <span class="text-blue-600 font-semibold">We truly appreciate your trust in NextRead.</span>
      </p>
      <button onclick="closeModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
        Close
      </button>
    </div>
  </div>

  <!-- Script -->
  <script>
    const quantityInput = document.getElementById("quantity");
    const priceField = document.getElementById("totalPrice");
    const pricePerBook = 20;

    quantityInput.addEventListener("input", () => {
      const qty = parseInt(quantityInput.value) || 1;
      const total = qty * pricePerBook;
      priceField.value = `$${total}`;
    });

    function closeModal() {
      document.getElementById("successModal").classList.add("hidden");
      document.getElementById("orderForm").reset();
      priceField.value = "$20";
    }
  </script>

  <!-- Show modal if PHP sets the flag -->
  <?php if ($showModal): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("successModal").classList.remove("hidden");
    });
  </script>
  <?php endif; ?>

</body>
</html>
