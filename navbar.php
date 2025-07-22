
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

<!-- <?php // include("SMS.php") ?> -->



  <style>
 .category-gradient {
  background: linear-gradient(to right, #ffffff1e, #1e293b, #0f172a);
}


  

  .nav-link {
    padding: 0.5rem 0.75rem;
    border-radius: 9999px;
    transition: all 0.3s ease;
  }

  .nav-link:hover {
    background-color: #1e293b;
    color: #facc15 !important; /* Tailwind yellow-400 */
    outline: 2px solid #ca8a04;
  }

  .group ul li:hover {
    background-color: #1e293b;
    color: #facc15 !important;
    border-radius: 0.5rem;
  }
</style>


<!-- Alpine.js (required for toggle) -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

Full Width Section
<div class="category-gradient px-4 lg:px-8 py-4" x-data="{ open: false }">


  <!-- Desktop View -->
  <div class="hidden lg:flex justify-between items-center">
    
    <!-- Left Horror Book Image -->
    <div class="h-20 w-auto max-w-[80px] flex-shrink-0 transform transition hover:scale-105 hover:shadow-xl">
      <img src="images/pic2.jpg" alt="Left Horror Book" class="h-full w-auto object-cover rounded-xl shadow-md">
    </div>

    <!-- Category Navbar (Center) -->
    <nav class="flex justify-center gap-x-10 text-sm font-medium text-gray-800 dark:text-white">

      <!-- Finance -->
      <div class="relative group">
        <button class="nav-link cursor-pointer hover:text-sky-400 transition">Finance</button>
        <div class="absolute hidden group-hover:block bg-[#374151] mt-3 w-56 rounded shadow-lg z-30 text-white py-2">
          <ul class="flex flex-col gap-y-1">
            <li class="px-4 py-2 hover:bg-sky-400">The Intelligent Investor</li>
            <li class="px-4 py-2 hover:bg-sky-400">Rich Dad Poor Dad</li>
            <li class="px-4 py-2 hover:bg-sky-400">Think and Grow Rich</li>
            <li class="px-4 py-2 hover:bg-sky-400">Your Money or Your Life</li>
            <li class="px-4 py-2 hover:bg-sky-400">The Psychology of Money</li>
          </ul>
        </div>
      </div>

      <!-- Business -->
      <div class="relative group">
        <button class="nav-link cursor-pointer hover:text-sky-400 transition">Business</button>
        <div class="absolute hidden group-hover:block bg-[#374151] mt-3 w-56 rounded shadow-lg z-30 text-white py-2">
          <ul class="flex flex-col gap-y-1">
            <li class="px-4 py-2 hover:bg-sky-400">Zero to One</li>
            <li class="px-4 py-2 hover:bg-sky-400">Good to Great</li>
            <li class="px-4 py-2 hover:bg-sky-400">The Lean Startup</li>
            <li class="px-4 py-2 hover:bg-sky-400">Start with Why</li>
            <li class="px-4 py-2 hover:bg-sky-400">Shoe Dog</li>
          </ul>
        </div>
      </div>

      <!-- Entertainment -->
      <div class="relative group">
        <button class="nav-link cursor-pointer hover:text-sky-400 transition">Entertainment</button>
        <div class="absolute hidden group-hover:block bg-[#374151] mt-3 w-56 rounded shadow-lg z-30 text-white py-2">
          <ul class="flex flex-col gap-y-1">
            <li class="px-4 py-2 hover:bg-sky-400">Bossypants</li>
            <li class="px-4 py-2 hover:bg-sky-400">Born a Crime</li>
            <li class="px-4 py-2 hover:bg-sky-400">Me</li>
            <li class="px-4 py-2 hover:bg-sky-400">Yes Please</li>
            <li class="px-4 py-2 hover:bg-sky-400">Open Book</li>
          </ul>
        </div>
      </div>

      <!-- Marketing -->
      <div class="relative group">
        <button class="nav-link cursor-pointer hover:text-sky-400 transition">Marketing</button>
        <div class="absolute hidden group-hover:block bg-[#374151] mt-3 w-56 rounded shadow-lg z-30 text-white py-2">
          <ul class="flex flex-col gap-y-1">
            <li class="px-4 py-2 hover:bg-sky-400">Contagious</li>
            <li class="px-4 py-2 hover:bg-sky-400">Hooked</li>
            <li class="px-4 py-2 hover:bg-sky-400">Influence</li>
            <li class="px-4 py-2 hover:bg-sky-400">Purple Cow</li>
            <li class="px-4 py-2 hover:bg-sky-400">Crushing It!</li>
          </ul>
        </div>
      </div>

      <!-- Technology -->
      <div class="relative group">
        <button class="nav-link cursor-pointer hover:text-sky-400 transition">Technology</button>
        <div class="absolute hidden group-hover:block bg-[#374151] mt-3 w-56 rounded shadow-lg z-30 text-white py-2">
          <ul class="flex flex-col gap-y-1">
            <li class="px-4 py-2 hover:bg-sky-400">Clean Code</li>
            <li class="px-4 py-2 hover:bg-sky-400">Pragmatic Programmer</li>
            <li class="px-4 py-2 hover:bg-sky-400">Refactoring</li>
            <li class="px-4 py-2 hover:bg-sky-400">Don't Make Me Think</li>
            <li class="px-4 py-2 hover:bg-sky-400">Intro to Algorithms</li>
          </ul>
        </div>
      </div>

    </nav>

    <!-- Right Horror Book Image -->
    <div class="h-20 w-auto max-w-[80px] flex-shrink-0 transform transition hover:scale-105 hover:shadow-xl">
      <img src="images/Pic1.jpg" alt="Right Horror Book" class="h-full w-auto object-cover rounded-xl shadow-md">
    </div>

  </div>

  <!-- Mobile View (Only visible below lg) -->
  <div class="lg:hidden text-white mt-4">

    <!-- Categories Button -->
    <button @click="open = !open"
            class="w-full bg-gray-800 dark:bg-gray-700 px-4 py-2 rounded-md shadow hover:bg-sky-500 transition">
      Categories
    </button>

    <!-- Dropdown Categories -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="mt-4 bg-[#374151] rounded-md p-4 space-y-4 shadow-lg">

      <!-- Finance -->
      <div>
        <h3 class="text-sky-300 font-semibold mb-2">Finance</h3>
        <ul class="space-y-1">
          <li class="hover:text-sky-400">The Intelligent Investor</li>
          <li class="hover:text-sky-400">Rich Dad Poor Dad</li>
          <li class="hover:text-sky-400">Think and Grow Rich</li>
          <li class="hover:text-sky-400">Your Money or Your Life</li>
          <li class="hover:text-sky-400">The Psychology of Money</li>
        </ul>
      </div>

      <!-- Business -->
      <div>
        <h3 class="text-sky-300 font-semibold mb-2">Business</h3>
        <ul class="space-y-1">
          <li class="hover:text-sky-400">Zero to One</li>
          <li class="hover:text-sky-400">Good to Great</li>
          <li class="hover:text-sky-400">The Lean Startup</li>
          <li class="hover:text-sky-400">Start with Why</li>
          <li class="hover:text-sky-400">Shoe Dog</li>
        </ul>
      </div>

      <!-- Entertainment -->
      <div>
        <h3 class="text-sky-300 font-semibold mb-2">Entertainment</h3>
        <ul class="space-y-1">
          <li class="hover:text-sky-400">Bossypants</li>
          <li class="hover:text-sky-400">Born a Crime</li>
          <li class="hover:text-sky-400">Me</li>
          <li class="hover:text-sky-400">Yes Please</li>
          <li class="hover:text-sky-400">Open Book</li>
        </ul>
      </div>

      <!-- Marketing -->
      <div>
        <h3 class="text-sky-300 font-semibold mb-2">Marketing</h3>
        <ul class="space-y-1">
          <li class="hover:text-sky-400">Contagious</li>
          <li class="hover:text-sky-400">Hooked</li>
          <li class="hover:text-sky-400">Influence</li>
          <li class="hover:text-sky-400">Purple Cow</li>
          <li class="hover:text-sky-400">Crushing It!</li>
        </ul>
      </div>

      <!-- Technology -->
      <div>
        <h3 class="text-sky-300 font-semibold mb-2">Technology</h3>
        <ul class="space-y-1">
          <li class="hover:text-sky-400">Clean Code</li>
          <li class="hover:text-sky-400">Pragmatic Programmer</li>
          <li class="hover:text-sky-400">Refactoring</li>
          <li class="hover:text-sky-400">Don't Make Me Think</li>
          <li class="hover:text-sky-400">Intro to Algorithms</li>
        </ul>
      </div>

    </div>
  </div>
</div>



<!-- Hover Sound -->
<audio id="hover-sound" src="https://www.soundjay.com/buttons/sounds/button-30.mp3" preload="auto"></audio>
<script>
  let hoverSound;
  document.addEventListener('DOMContentLoaded', () => {
    hoverSound = document.getElementById('hover-sound');
    const enableAudio = () => {
      hoverSound.play().then(() => {
        hoverSound.pause();
        hoverSound.currentTime = 0;
        document.removeEventListener('click', enableAudio);
      }).catch(() => {});
    };
    document.addEventListener('click', enableAudio);

    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('mouseenter', () => {
        if (hoverSound) {
          hoverSound.currentTime = 0;
          hoverSound.play();
        }
      });
    });
  });
</script>



</body>
</html>









