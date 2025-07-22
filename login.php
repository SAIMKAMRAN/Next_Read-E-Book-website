<?php
if (isset($_POST['login'])) {
    include('conn.php');

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM signup WHERE S_email='$email' AND S_password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              title: 'Login Successful!',
              icon: 'success',
              confirmButtonColor: '#2563eb'
            }).then(() => {
              window.location.href = 'index.php'; // update with your home page
            });
          });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              title: 'Invalid Credentials!',
              icon: 'error',
              confirmButtonColor: '#2563eb'
            });
          });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NextRead - Login</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    tailwind.config = {
      darkMode: 'class',
    };
  </script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
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

  <!-- Background Blobs -->
  <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
  <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>
  <div class="blob w-72 h-72 bg-blue-800 top-[60%] left-[30%]"></div>

  <!-- Login Card -->
  <div class="w-full max-w-md z-10 bg-white rounded-2xl p-10 shadow-2xl fade-up-hidden fade-up">
    <div class="text-center mb-8">
      <img src="images/logo.png" alt="NextRead Logo" class="mx-auto w-20 h-20 mb-4" />
      <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
      <p class="text-sm text-gray-500 mt-1">Login to your account</p>
    </div>

    <form method="POST" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 text-gray-900">
      </div>

      <div>
        <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="pass" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 text-gray-900">
      </div>

      <button type="submit" name="login"
        class="w-full py-3 bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold rounded-xl hover:shadow-lg transition-transform hover:scale-105 duration-300">
        Login
      </button>
    </form>

    <p class="text-sm text-gray-500 text-center mt-6">
      Don't have an account?
      <a href="signup.php" class="text-sky-500 hover:underline">Sign up</a>
    </p>
  </div>
</body>
</html>
