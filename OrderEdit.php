<?php 
include("conn.php");

// Check if 'id' is provided in the URL
if (!isset($_GET["id"])) {
    die("Error: ID not provided in URL.");
}
$id = (int)$_GET["id"]; // Cast to int for safety

// Fetch existing data
$sql = "SELECT * FROM shop WHERE B_id = $id";
$result = mysqli_query($conn, $sql);
$php_curd = mysqli_fetch_array($result);

if (isset($_POST["Obtn"])) {
    $book = $_POST['book'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $payment = $_POST['payment'];
    $message = $_POST['message'];

    // Prevent SQL injection (recommended to use prepared statements in real apps)
    $book = mysqli_real_escape_string($conn, $book);
    $quantity = (int)$quantity;
    $price = mysqli_real_escape_string($conn, $price);
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $payment = mysqli_real_escape_string($conn, $payment);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "UPDATE shop SET 
                B_Book = '$book',
                B_Quantity = '$quantity',
                B_Price = '$price',
                U_Name = '$name',
                U_Email = '$email',
                U_Phone = '$phone',
                U_Payment = '$payment',
                U_Message = '$message'
            WHERE B_id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: Allorder.php?submitted=1");
        exit();
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NextRead | Book Order</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
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

  <section class="text-center py-10">
    <h1 class="text-4xl font-bold text-white mb-2">Update Your Book Order</h1>
    <p class="text-white/70">Edit the form below and update your order</p>
  </section>

  <section class="bg-[#1e293b] py-10 px-6 md:px-16 rounded-xl shadow-xl mx-4 md:mx-auto max-w-5xl">
    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <!-- Book Name -->
      <div class="md:col-span-2">
        <label class="block mb-1 text-sm font-medium">Book Name</label>
        <input type="text" name="book" value="<?php echo $php_curd['B_Book']; ?>" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg" />
      </div>

      <!-- Quantity -->
      <div>
        <label class="block mb-1 text-sm font-medium">Quantity</label>
        <input type="number" name="quantity" min="1" max="10" value="<?php echo $php_curd['B_Quantity']; ?>" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg" />
      </div>

      <!-- Total Price -->
      <div>
        <label class="block mb-1 text-sm font-medium">Total Price ($)</label>
        <input type="text" name="price" value="<?php echo $php_curd['B_Price']; ?>" readonly class="w-full p-3 bg-[#0f172a] text-white rounded-lg" />
      </div>

      <!-- Full Name -->
      <div>
        <label class="block mb-1 text-sm font-medium">Full Name</label>
        <input type="text" name="name" value="<?php echo $php_curd['U_Name']; ?>" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg" />
      </div>

      <!-- Email -->
      <div>
        <label class="block mb-1 text-sm font-medium">Email Address</label>
        <input type="email" name="email" value="<?php echo $php_curd['U_Email']; ?>" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg" />
      </div>

      <!-- Phone -->
      <div>
        <label class="block mb-1 text-sm font-medium">Phone Number</label>
        <input type="tel" name="phone" value="<?php echo $php_curd['U_Phone']; ?>" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg" />
      </div>

      <!-- Payment Method -->
      <div>
        <label class="block mb-1 text-sm font-medium">Payment Method</label>
        <select name="payment" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg">
          <option disabled>Select Payment Option</option>
          <option value="UPI / Paytm" <?php if($php_curd["U_Payment"] == "UPI / Paytm") echo "selected"; ?>>UPI / Paytm</option>
          <option value="PayPal" <?php if($php_curd["U_Payment"] == "PayPal") echo "selected"; ?>>PayPal</option>
          <option value="Credit/Debit Card" <?php if($php_curd["U_Payment"] == "Credit/Debit Card") echo "selected"; ?>>Credit/Debit Card</option>
        </select>
      </div>

      <!-- Message -->
      <div class="md:col-span-2">
        <label class="block mb-1 text-sm font-medium">Any Message</label>
        <textarea name="message" rows="3" required class="w-full p-3 bg-[#0f172a] text-white rounded-lg"><?php echo $php_curd['U_Message']; ?></textarea>
      </div>

      <!-- Submit Button -->
      <div class="md:col-span-2 text-center pt-6">
        <button type="submit" name="Obtn" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3 rounded-lg font-semibold text-lg transition">
          Update Order
        </button>
      </div>
    </form>
  </section>
</body>
</html>
