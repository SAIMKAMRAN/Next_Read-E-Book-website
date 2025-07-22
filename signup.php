<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['button'])) {
    include('conn.php'); // database connection file

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO signup (S_name, S_email, S_password) VALUES ('$fname', '$email', '$pass')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // PHPMailer email send
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kamisaim884@gmail.com'; // Your Gmail
            $mail->Password = 'hxkbovphcgeqdgyk';      // Gmail App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('kamisaim884@gmail.com', 'NextRead - User Signup');
            $mail->addAddress('kamisaim884@gmail.com'); // Your email to receive the notification

            $mail->isHTML(true);
            $mail->AddEmbeddedImage('images/logo.png', 'logoimg');

            $mail->Subject = 'New User Registered on NextRead';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; padding: 20px;'>
                    <img src='cid:logoimg' alt='Logo' style='width: 120px;'><br><br>
                    <h2>New User Registration</h2>
                    <p><strong>Name:</strong> {$fname}</p>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Password:</strong> {$pass}</p>
                </div>
            ";

            $mail->send();
        } catch (Exception $e) {
            echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Signup Successful!',
                text: 'You can now login to your account.',
                icon: 'success',
                confirmButtonColor: '#2563eb',
                background: '#ffffff',
                color: '#000000'
            }).then(() => {
                window.location.href = 'login.php';
            });
        });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Signup Failed!',
                text: 'Please try again.',
                icon: 'error',
                confirmButtonColor: '#2563eb',
                background: '#ffffff',
                color: '#000000'
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
  <title>NextRead - Signup</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<body class="relative min-h-screen bg-[#111827] text-white flex items-center justify-center p-6">

  <!-- Background Blobs -->
  <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
  <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>
  <div class="blob w-72 h-72 bg-blue-800 top-[60%] left-[30%]"></div>

  <!-- Signup Card -->
  <div class="w-full max-w-xl z-10 bg-white text-gray-900 rounded-2xl p-10 shadow-2xl fade-up">
    <div class="text-center mb-8">
      <img src="images/logo.png" alt="NextRead Logo" class="mx-auto w-20 h-20 mb-4" />
      <h2 class="text-3xl font-bold text-gray-800">Create Your Account</h2>
      <p class="text-sm text-gray-500 mt-1">Start your reading journey today</p>
    </div>

    <form method="POST" class="space-y-6">
      <div>
        <label for="fname" class="block text-sm font-medium">Full Name</label>
        <input type="text" name="fname" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium">Email Address</label>
        <input type="email" name="email" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500">
      </div>

      <div>
        <label for="pass" class="block text-sm font-medium">Password</label>
        <input type="password" name="pass" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500">
      </div>

      <div class="flex items-center">
        <input id="terms" type="checkbox" required
          class="h-4 w-4 text-sky-500 border-gray-300 rounded">
        <label for="terms" class="ml-2 block text-sm text-gray-600">
          I confirm my information is correct.
        </label>
      </div>

      <button type="submit" name="button"
        class="w-full py-3 bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold rounded-xl hover:shadow-lg transition-transform hover:scale-105 duration-300">
        Sign Up
      </button>
    </form>

    <p class="text-sm text-gray-500 text-center mt-6">
      Already have an account?
      <a href="login.php" class="text-sky-500 hover:underline">Login</a>
    </p>
  </div>
</body>
</html>
