
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: true, mobileOpen: false }" :class="{ 'dark': darkMode }" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NextRead - Professional Navbar</title>

  <!-- Tailwind CSS & Alpine.js -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Poppins', 'sans-serif']
          }
        }
      }
    };
  </script>

  <!-- Custom Hover Styles -->
  <style>
    .hover-style {
      position: relative;
      padding: 0.5rem 0.75rem;
      border-radius: 9999px;
      transition: all 0.3s ease;
    }

    .hover-style:hover {
      background-color: #1e293b;
      outline: 2px solid #ca8a04;
      color: #facc15 !important;
    }

    .dropdown-hover {
      display: block;
      padding: 0.5rem 1rem;
      border-radius: 9999px;
      transition: all 0.3s ease;
    }

    .dropdown-hover:hover {
      background-color: #1e293b;
      outline: 2px solid #ca8a04;
      color: #facc15 !important;
    }


  [x-cloak] {
    display: none !important;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fade-in {
    animation: fadeIn 0.6s ease-out forwards;
  }

    [x-cloak] { display: none !important; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
    .hover-style { transition: all 0.3s ease; }
    .hover-style:hover { color: #60a5fa; }
    .dropdown-hover { padding: 0.5rem 1rem; transition: background 0.2s ease; }
    .dropdown-hover:hover { background-color: rgba(100, 116, 139, 0.2); }
  




  </style>






</head>

<body class="bg-white text-gray-800 dark:bg-[#0f172a] dark:text-white font-sans transition-colors duration-300">

  <header class="sticky top-0 z-50 bg-gradient-to-r from-[#0f172a] via-[#1e293b] to-white dark:from-[#0f172a] dark:via-[#1e293b] dark:to-[#334155] shadow-lg transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
      
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <img src="images/logo.png" alt="Logo" class="h-8 w-auto">
        <span class="text-2xl font-extrabold tracking-wide text-white dark:text-white">NextRead</span>
      </div>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex space-x-6 text-sm font-semibold items-center text-white dark:text-white">
        <a href="index.php" class="hover-style">Home</a>

        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
          <button class="hover-style">About</button>
          <div x-show="open" x-transition class="absolute mt-2 bg-white text-black dark:bg-gray-800 dark:text-white rounded shadow-xl w-40 z-20">
            <a href="#" class="dropdown-hover">Our Story</a>
            <a href="#" class="dropdown-hover">Team</a>
          </div>
        </div>

        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
          <button class="hover-style">Shop</button>
          <div x-show="open" x-transition class="absolute mt-2 bg-white text-black dark:bg-gray-800 dark:text-white rounded shadow-xl w-40 z-20">
            <a href="shop.php" class="dropdown-hover">NextRead Shop</a>
            <a href="#" class="dropdown-hover">All Books</a>
          </div>
        </div>

        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
          <button class="hover-style">Order</button>
          <div x-show="open" x-transition class="absolute mt-2 bg-white text-black dark:bg-gray-800 dark:text-white rounded shadow-xl w-40 z-20">
            <a href="Allorder.php" class="dropdown-hover">All Orders</a>
            <a href="upload.php" class="dropdown-hover">User Stories</a>
          </div>
        </div>

        <a href="Contact.php" class="hover-style">Contact</a>
      </nav>

      <!-- Icons -->
      <div class="flex items-center space-x-4">

      

        <!-- Search -->
        <div x-data="{ open: false }" class="relative">
          <button @click="open = !open" class="text-white hover:text-yellow-300 text-xl">
            <i class="fas fa-search"></i>
          </button>
          <input x-show="open" x-transition type="text" placeholder="Search..."
                 class="absolute right-0 top-10 w-48 bg-white text-black dark:bg-gray-800 dark:text-white border border-sky-500 rounded px-3 py-2 shadow-md z-50" />
        </div>

        <!-- Cart -->
        <a href="#" class="text-white hover:text-yellow-300 text-xl">
          <i class="fas fa-shopping-cart"></i>
        </a>

        <!-- Auth Buttons -->
        <a href="welcome.php"
           class="hidden md:inline bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-1.5 rounded-full text-sm font-semibold">
          Register
        </a>
        <a href="login.php"
           class="hidden md:inline border border-white text-white hover:bg-white hover:text-black px-4 py-1.5 rounded-full text-sm font-semibold">
          Login
        </a>

        <!-- Mobile Menu Toggle -->
        <button @click="mobileOpen = !mobileOpen" class="md:hidden text-white text-2xl">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="mobileOpen" x-transition class="md:hidden bg-[#1e293b] text-white px-4 py-4 space-y-3">
      <a href="index.php" class="block hover-style">Home</a>
      <a href="#" class="block hover-style">About</a>
      <a href="shop.php" class="block hover-style">Shop</a>
      <a href="Allorder.php" class="block hover-style">Orders</a>
      <a href="Contact.php" class="block hover-style">Contact</a>


       <?php if (isset($_SESSION['email'])): ?>
  <!-- Show Logout Button -->
  <form action="logout.php" method="POST">
    <button type="submit" name="logout"
      class="mt-2 inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
      Logout
    </button>
  </form>
<?php else: ?>
  <!-- Show Login and Register Buttons -->
  <a href="login.php" class="block hover-style">Login</a>
  <a href="welcome.php" class="block hover-style">Register</a>
<?php endif; ?>









    
    </div>
  </header>

 <?php // include("SMS.php") ?> 




</body>
</html>









