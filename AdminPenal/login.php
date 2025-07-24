<?php
include 'config.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];

                $otp = rand(100000, 999999);
                $_SESSION['admin_otp'] = $otp;

                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'kamisaim884@gmail.com';
                    $mail->Password = 'yllpovkbuuzqrvof'; // App password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('kamisaim884@gmail.com', 'Admin Panel');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = '🔐 Your OTP Code to Access Admin Panel';

                    $mail->Body = "
                    <div style='font-family:Poppins, sans-serif; max-width:600px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background-color:#f9f9f9;'>
                        <h2 style='color:#333;'>Hello " . htmlspecialchars($row['name']) . ",</h2>
                        <p style='font-size:15px;'>You requested access to the admin panel. Please use the following OTP code:</p>
                        <div style='text-align:center; margin:20px 0;'>
                            <h1 style='font-size:48px; color:#2563eb;'>$otp</h1>
                        </div>
                        <p style='font-size:14px; color:#555;'>This code is valid for 10 minutes. If you didn't request this, please ignore the email.</p>
                        <p style='margin-top:20px; font-size:13px; color:#aaa;'>Sent automatically by the Admin Panel System</p>
                    </div>";

                    $mail->send();

                    // Redirect to OTP code verification
                    header('Location: OTPCode.php');
                    exit;
                } catch (Exception $e) {
                    echo "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Email Failed',
                            text: 'OTP not sent. Error: " . addslashes($mail->ErrorInfo) . "',
                            confirmButtonColor: '#2563eb'
                        });
                    </script>";
                }
            } else {
                // Normal user login
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];

                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: 'Welcome back!',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'home.php';
                    });
                </script>";
                exit;
            }
        } else {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrect Password',
                    text: 'Please check your password and try again.',
                    confirmButtonColor: '#2563eb'
                });
            </script>";
        }
    } else {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'User Not Found',
                text: 'No account found with that email.',
                confirmButtonColor: '#2563eb'
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- ✅ Favicon -->
  <link rel="icon" type="image/png" href="../images/logo.png" />

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

  <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-2xl w-full max-w-md fade-in">
    
    <!-- ✅ Logo -->
    <div class="flex justify-center mb-4">
      <img src="../images/logo.png" alt="Logo" class="w-24 h-24 object-contain" />
    </div>

    <h2 class="text-2xl text-white font-bold text-center mb-6">Admin Login</h2>

    <?php if (!empty($message)) : ?>
      <div class="mb-4 p-3 bg-red-500/90 text-white rounded text-sm shadow">
        <?= implode("<br>", $message); ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">
      <input type="email" name="email" placeholder="Enter admin email" required
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105" />

      <input type="password" name="password" placeholder="Enter OTP (Password)" required
        class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white/20 transition duration-300 ease-in-out transform focus:scale-105" />

      <button type="submit" name="submit"
        class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
        Send OTP
      </button>
    </form>
  </div>

</body>
</html>
