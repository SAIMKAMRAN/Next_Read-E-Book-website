<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'config.php';
session_start();

$message = [];

if (isset($_POST['submit'])) {
   $name = trim($_POST['name']);
   $email = trim($_POST['email']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $user_type = $_POST['user_type'];

   if ($password !== $cpassword) {
      $message[] = 'Confirm password not matched!';
   } else {
      // Check if user already exists
      $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
         // User exists, redirect without showing message
         $_SESSION['message'] = 'You are already registered. Please login.';
         header('Location: login.php');
         exit;
      } else {
         // Register new user
         $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

         $insert = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
         $insert->bind_param("ssss", $name, $email, $hashed_pass, $user_type);
         $insert->execute();

         // Send notification email to admin
         $mail = new PHPMailer(true);
         try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kamisaim884@gmail.com'; // Replace with your Gmail
            $mail->Password = 'yllpovkbuuzqrvof';    // Replace with your App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('kamisaim884@gmail.com', 'Registration System');
            $mail->addAddress('kamisaim884@gmail.om'); // Replace with admin email

            $mail->isHTML(true);
            $mail->Subject = 'New User Registered';
            $mail->Body = "
               <h3>New Registration Details</h3>
               <p><strong>Name:</strong> $name</p>
               <p><strong>Email:</strong> $email</p>
               <p><strong>User Type:</strong> $user_type</p>
            ";

            $mail->send();
         } catch (Exception $e) {
            // Optional: log error to file instead of showing it
            $message[] = 'Mail could not be sent. Error: ' . $mail->ErrorInfo;
         }

         $_SESSION['message'] = 'Registered successfully!';
         header('Location: login.php');
         exit;
      }
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Admin Panel</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .fade-in {
      animation: fadeIn 0.5s ease forwards;
      opacity: 0;
      transform: scale(0.95);
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#0a0f2c] to-[#1d3557] flex items-center justify-center px-4">

  <div class="bg-white/10 backdrop-blur-md shadow-2xl rounded-2xl p-8 w-full max-w-md fade-in">
    <div class="flex justify-center mb-6">
      <img src="../images/logo.png" alt="Logo" class="h-16">
    </div>
    <h2 class="text-center text-white text-2xl font-semibold mb-4">Register Now</h2>

    <form action="" method="post" class="space-y-5">
      <input type="text" name="name" placeholder="Enter your name" required
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105" />

      <input type="email" name="email" placeholder="Enter your email" required
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105" />

      <input type="password" name="password" placeholder="Enter your password" required
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105" />

      <input type="password" name="cpassword" placeholder="Confirm your password" required
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105" />

      <select name="user_type"
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105">
        <option value="user" class="text-black">User</option>
        <option value="admin" class="text-black">Admin</option>
      </select>

      <button type="submit" name="submit"
        class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
        Register Now
      </button>
    </form>

    <p class="text-center text-gray-200 text-sm mt-6">
      Already have an account?
      <a href="login.php" class="text-white font-medium hover:underline">Login now</a>
    </p>
  </div>

</body>
</html>
