<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include('conn.php');

// Enable error reporting (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if user exists
    $query = "SELECT * FROM signup WHERE S_email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+15 minutes'));

        // Save token in DB
        mysqli_query($conn, "UPDATE signup SET reset_token='$token', reset_expires='$expires' WHERE S_email='$email'");

        // Generate proper link
        $host = $_SERVER['HTTP_HOST']; // e.g., localhost or yourdomain.com
    $resetLink = "http://localhost/PHP/dataStore_form/READ/NEXT/reset_password.php?token=$token";


        // Send email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kamisaim884@gmail.com'; // ✅ Your Gmail
            $mail->Password = 'hxkbovphcgeqdgyk';    // ✅ App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your_email@gmail.com', 'NextRead Support');
            $mail->addAddress($email);
            $mail->isHTML(true);

            $mail->Subject = 'Reset Your Password - NextRead';
            $mail->Body = "
                <div style='font-family: Poppins, sans-serif; padding: 20px;'>
                    <h2>Password Reset Request</h2>
                    <p>Click the button below to reset your password:</p>
                    <a href='$resetLink' style='display:inline-block;margin-top:15px;padding:10px 20px;background-color:#2563eb;color:#fff;text-decoration:none;border-radius:6px;'>Reset Password</a>
                    <p style='margin-top:20px;color:#6b7280;'>This link expires in 15 minutes.</p>
                </div>
            ";

            $mail->send();

            // SweetAlert success
            echo "
            <html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head>
            <body>
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Email Sent!',
                text: 'Check your inbox to reset your password.',
                confirmButtonColor: '#2563eb'
              }).then(() => {
                window.location.href = 'login.php';
              });
            </script>
            </body></html>";
            exit;

        } catch (Exception $e) {
            // SweetAlert error
            echo "
            <html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head>
            <body>
            <script>
              Swal.fire({
                icon: 'error',
                title: 'Failed to Send Email!',
                text: '". addslashes($mail->ErrorInfo) ."',
                confirmButtonColor: '#2563eb'
              });
            </script>
            </body></html>";
            exit;
        }

    } else {
        // SweetAlert: Email not found
        echo "
        <html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head>
        <body>
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Email Not Found!',
            text: 'No account is registered with this email.',
            confirmButtonColor: '#2563eb'
          });
        </script>
        </body></html>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password - NextRead</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
      0% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(50px, -80px) scale(1.2); }
      100% { transform: translate(-30px, 50px) scale(1); }
    }
  </style>
</head>
<body class="relative min-h-screen dark bg-[#111827] text-white flex items-center justify-center p-6">

  <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
  <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>

  <div class="w-full max-w-md z-10 bg-white rounded-2xl p-10 shadow-2xl fade-up">
    <div class="text-center mb-8">
      <img src="images/logo.png" alt="NextRead Logo" class="mx-auto w-20 h-20 mb-4" />
      <h2 class="text-2xl font-bold text-gray-800">Forgot Password</h2>
      <p class="text-sm text-gray-500 mt-1">We'll send you a reset link</p>
    </div>

    <form method="POST" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" name="email" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500 text-gray-900">
      </div>

      <button type="submit"
        class="w-full py-3 bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold rounded-xl hover:shadow-lg transition-transform hover:scale-105 duration-300">
        Send Reset Link
      </button>
    </form>

    <p class="text-sm text-gray-500 text-center mt-6">
      <a href="login.php" class="text-sky-500 hover:underline">Back to Login</a>
    </p>
  </div>
</body>
</html>
