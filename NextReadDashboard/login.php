<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
include('../conn.php');

if (isset($_POST['admin_login'])) {
    $email = $_POST['email']; // ✅ Fixed here
    $pass = $_POST['pass'];   // ✅ Fixed here

    $query = "SELECT * FROM admin_signup WHERE A_email='$email' AND A_password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['pending_admin'] = $admin;

        $otp = rand(100000, 999999);
        $_SESSION['admin_otp'] = $otp;

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kamisaim884@gmail.com';
            $mail->Password = 'yllpovkbuuzqrvof';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('kamisaim884@gmail.com', 'Admin Login OTP');
            $mail->addAddress('kamisaim884@gmail.com');
            $mail->isHTML(true);

            $mail->AddEmbeddedImage('../images/logo.png', 'logoimg');
            $mail->Subject = 'Admin OTP Verification Code';
            $mail->Body = "
  <div style='font-family: Poppins, sans-serif; background: #f8fafc; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto; color: #1f2937;'>
    <div style='text-align: center;'>
      <img src='cid:logoimg' alt='NextRead' style='width: 80px; margin-bottom: 20px;' />
      <h2 style='font-size: 24px; font-weight: 600;'>Admin Login Verification</h2>
    </div>
    <p style='font-size: 15px; line-height: 1.6; margin-top: 20px;'>
      Hello <strong>{$admin['A_name']}</strong>,
    </p>
    <p style='font-size: 15px; line-height: 1.6;'>
      We received a request to log in to the <strong>NextRead Admin Panel</strong> using your credentials.
      To verify your identity, please use the following one-time password (OTP):
    </p>
    <div style='background-color: #e0f2fe; color: #1d4ed8; font-size: 28px; font-weight: bold; padding: 12px 0; text-align: center; border-radius: 6px; margin: 25px 0; letter-spacing: 6px;'>
      {$otp}
    </div>
    <p style='font-size: 14px; line-height: 1.6;'>
      This OTP is valid for the next <strong>10 minutes</strong>. If this wasn't you, we recommend resetting your password immediately or contacting support.
    </p>
    <p style='font-size: 13px; color: #6b7280; text-align: center; margin-top: 40px;'>
      &copy; " . date('Y') . " NextRead. All rights reserved.
    </p>
  </div>
";

            $mail->send();
        } catch (Exception $e) {
            echo "<script>alert('Mail Error: {$mail->ErrorInfo}');</script>";
        }

        header('Location: OTPCode.php');
        exit;
  echo "
<script>
  Swal.fire({
    icon: 'error',
    title: 'Login Failed',
    text: 'Invalid email or password.',
    confirmButtonColor: '#2563eb',
    timer: 3000,
    showConfirmButton: false
  });
</script>
";

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login - NextRead</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  </style>
</head>

<body class="relative min-h-screen bg-[#111827] text-white flex items-center justify-center p-6">

  <!-- Background Blobs -->
  <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
  <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>
  <div class="blob w-72 h-72 bg-blue-800 top-[60%] left-[30%]"></div>

  <!-- Admin Login Card -->
  <div class="w-full max-w-md z-10 bg-white rounded-2xl p-10 shadow-2xl fade-up">
    <div class="text-center mb-8">
      <img src="../images/logo.png" alt="Admin Logo" class="mx-auto w-20 h-20 mb-4" />
      <h2 class="text-3xl font-bold text-gray-800">Admin Portal</h2>
      <p class="text-sm text-gray-500 mt-1">Enter credentials to access dashboard</p>
    </div>

    <form method="POST" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Admin Email</label>
        <input type="email" name="email" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 text-gray-900">
      </div>

      <div>
        <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="pass" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 text-gray-900">
      </div>

      <button type="submit" name="admin_login"
        class="w-full py-3 bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold rounded-xl hover:shadow-lg transition-transform hover:scale-105 duration-300">
        Login as Admin
      </button>
    </form>

    <p class="text-sm text-gray-500 text-center mt-6">
      Not an admin?
      <a href="../signup.php" class="text-sky-500 hover:underline">Go to user login</a>
    </p>
  </div>
</body>
</html>
