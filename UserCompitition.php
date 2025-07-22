<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome - Next_Read Competition</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-950 to-gray-900 min-h-screen flex flex-col items-center justify-center text-center px-6 text-white space-y-6">

  <!-- Logo -->
  <div class="flex justify-center">
    <img src="images/logo.png" alt="Logo" class="w-24 h-24 rounded-full shadow-lg animate-bounce-slow" />
  </div>

  <!-- Heading -->
  <h1 class="text-4xl md:text-5xl font-bold tracking-wide animate-pulse">
    Welcome to <span class="text-yellow-300">Next_Read</span> Competition!
  </h1>

  <!-- Description -->
  <p class="text-lg md:text-xl text-gray-300 max-w-2xl">
    Join the excitement! You'll have 2 hours to write your own unique story. Compete, create, and get inspired with other amazing storytellers.
  </p>

  <!-- Button -->
  <div>
    <a href="Compititionpolicy.php" class="inline-block px-8 py-4 bg-yellow-400 text-gray-900 font-semibold rounded-2xl shadow-xl transition transform hover:scale-105 hover:bg-yellow-300 animate-glow hover:shadow-yellow-500/40">
      View Competition Policy
    </a>
  </div>

  <!-- Animations -->
  <style>
    @keyframes fade-in-up {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fade-in-up {
      animation: fade-in-up 1.2s ease-out both;
    }

    @keyframes glow {
      0%, 100% {
        box-shadow: 0 0 10px #facc15, 0 0 20px #facc15;
      }
      50% {
        box-shadow: 0 0 20px #facc15, 0 0 30px #facc15;
      }
    }
    .animate-glow {
      animation: glow 2s infinite ease-in-out;
    }

    @keyframes bounce-slow {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
    }
    .animate-bounce-slow {
      animation: bounce-slow 3s infinite;
    }
  </style>

</body>
</html>
