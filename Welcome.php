<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NextRead - Welcome</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    <script>
      tailwind.config = {
        darkMode: 'class',
      };
    </script>

    <style>
      body {
        font-family: "Poppins", sans-serif;
        overflow: hidden;
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(40px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .fade-up {
        animation: fadeInUp 1s ease forwards;
      }

      .delay-1 { animation-delay: 0.6s; }
      .delay-2 { animation-delay: 1s; }
      .delay-3 { animation-delay: 1.5s; }

      .fade-up-hidden { opacity: 0; }

      .blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(90px);
        opacity: 0.3;
        animation: blobMove 20s infinite alternate ease-in-out;
      }

      @keyframes blobMove {
        0%   { transform: translate(0, 0) scale(1); }
        50%  { transform: translate(50px, -80px) scale(1.2); }
        100% { transform: translate(-30px, 50px) scale(1); }
      }
    </style>
  </head>

  <body class="relative min-h-screen dark bg-[#111827] text-white flex items-center justify-center p-6 transition-colors duration-500">

    <!-- Animated Background Blobs -->
    <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
    <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>
    <div class="blob w-72 h-72 bg-blue-800 top-[60%] left-[30%]"></div>

    <!-- Main Content -->
    <div class="text-center max-w-xl z-10 fade-up-hidden fade-up">
      
      <!-- Logo -->
      <img 
        src="images/logo.png" 
        alt="NextRead Logo" 
        class="mx-auto w-32 h-32 mb-6 transition-transform duration-300 hover:scale-110"
      />

      <!-- Heading -->
      <h1 class="text-5xl font-extrabold mb-4 fade-up delay-1">
        Welcome to <span class="text-sky-400">NextRead</span>
      </h1>

      <!-- Subtitle -->
      <p class="text-lg text-gray-300 mb-8 fade-up delay-2">
        Your personal gateway to a smarter, smoother, and more immersive e-book experience. Explore curated reads, track your progress, and rediscover the joy of learning — all in one elegant platform.
      </p>

      <!-- CTA Button -->
      <a
        href="Signup.php"
        class="inline-flex items-center gap-2 bg-sky-500 text-white px-6 py-3 rounded-2xl text-lg font-medium shadow-md hover:bg-sky-400 transition-all fade-up delay-3"
      >
        Get Started →
      </a>
    </div>

  </body>
</html>
