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

  <!-- Wrapper Flex Layout -->
  <div class="flex flex-col md:flex-row min-h-screen">

    <!-- Sidebar -->
    <aside class="md:w-64 w-full bg-white shadow-md p-6 sticky top-0 self-start z-10">
      <h2 class="text-xl font-bold mb-4 text-gray-800">📚 Categories</h2>
      <ul class="space-y-3">
        <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">History</a></li>
        <li><a href="finance.php" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Finance</a></li>
        <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Health Care</a></li>
        <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Motivation</a></li>
        <li><a href="#" class="block px-3 py-2 rounded-lg hover:bg-blue-100 text-gray-700">Psychology</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:scale-105 transition-transform duration-300 relative group">
          
          <!-- Like Button -->
          <button class="absolute top-4 right-4 z-10 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg hover:bg-white transition-all duration-300">
            <svg class="w-5 h-5 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </button>

          <!-- Badge -->
          <div class="absolute top-4 left-4 z-10">
            <span class="bg-gradient-to-r from-orange-400 to-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">Finance</span>
          </div>

          <!-- Book Image -->
          <div class="relative overflow-hidden">
            <img src="<?= htmlspecialchars($row['Image_URL']) ?: 'https://via.placeholder.com/300x400' ?>" width="300" height="400"
              alt="<?= htmlspecialchars($row['F_Name']) ?>" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300" />
          </div>

          <!-- Book Info -->
          <div class="p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-2">
              <?= htmlspecialchars($row['F_Name']) ?>
            </h3>
            <p class="text-gray-600 text-sm mb-4">
              <?= htmlspecialchars($row['F_Des']) ?>
            </p>

            <!-- Price and Author -->
            <div class="flex items-center justify-between mb-4">
              <div class="text-2xl font-bold text-gray-900">
                ₹<?= number_format($row['F_Price'], 2) ?>
              </div>
              <div class="text-sm text-gray-500">
                By <?= htmlspecialchars($row['F_Author']) ?>
              </div>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-2">
              <button class="flex-1 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                🛒 Add to Cart
              </button>
              <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-4 rounded-xl transition-all duration-300">
                👁️
              </button>
            </div>
          </div>
        </div>
      <?php } ?>

    </main>
  </div>

</body>
</html>
