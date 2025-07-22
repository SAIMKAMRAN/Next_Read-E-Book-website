<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Management Modal</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
          colors: {
            'dark-blue': '#0a2342',
            'light-blue': '#e6f0ff',
          },
        },
      },
    };
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-white flex flex-col items-center justify-center min-h-screen p-4">

  <!-- Button -->
  <button id="openModal" class="w-full md:w-1/2 bg-dark-blue text-white py-4 px-6 rounded-xl shadow-lg hover:bg-blue-800 transition-all duration-300 text-xl font-semibold">
    Student Management
  </button>

  <!-- Modal Overlay -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <!-- Modal Content -->
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full text-center space-y-6 transform scale-100 transition-transform duration-300">
      <h2 class="text-2xl font-bold text-dark-blue">Join Student Management</h2>
      <p class="text-gray-700">Kya aap <span class="text-blue-600 font-medium">Next_Read</span> ke Student Management System ka hissa banna chahte hain? Yeh platform students ko track karne, assign karne aur monitor karne ke liye perfect solution hai.</p>
      
      <!-- Buttons -->
      <div class="flex justify-center gap-4">
        <a href="S_welcome.php" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Haan, zaroor</a>
        <button id="closeModal" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">Nahi, abhi nahi</button>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script>
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');
    const modal = document.getElementById('modal');

    openBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    // Close modal on outside click
    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
