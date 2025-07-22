<?php
session_start();

if (!isset($_SESSION['admin_otp'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['otp'];
    if ($entered_otp == $_SESSION['admin_otp']) {
        $_SESSION['admin_logged_in'] = true;
        unset($_SESSION['admin_otp']); // OTP used, now clear it
        header("Location: Main.php"); // Redirect to admin dashboard
        exit;
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              icon: 'error',
              title: 'Invalid OTP',
              text: 'The code you entered is incorrect. Please try again.',
              confirmButtonColor: '#2563eb'
            });
          });
        </script>
        ";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Verify OTP - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-up { animation: fadeInUp 1s ease forwards; }
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
    input[type="text"]::-webkit-inner-spin-button,
    input[type="text"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>

<body class="relative min-h-screen bg-[#111827] text-white flex items-center justify-center p-6">

  <!-- Background Blobs -->
  <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
  <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>
  <div class="blob w-72 h-72 bg-blue-800 top-[60%] left-[30%]"></div>

  <!-- OTP Card -->
  <div class="w-full max-w-sm z-10 bg-white text-gray-900 rounded-2xl p-10 shadow-2xl fade-up">
    <div class="text-center mb-6">
      <img src="../images/logo.png" class="w-16 mx-auto mb-4" alt="Logo">
      <h2 class="text-2xl font-bold text-gray-800">Enter OTP</h2>
      <p class="text-sm text-gray-500">A 6-digit code was sent to your email</p>
    </div>

    <form method="POST" class="space-y-6">
      <input type="text" name="otp" maxlength="6" pattern="\d{6}" required
        class="text-center text-2xl tracking-widest w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500"
        placeholder="000000">

      <button type="submit" name="verify_otp"
        class="w-full py-3 bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition duration-300">
        Verify OTP
      </button>
    </form>
  </div>
</body>
</html>
