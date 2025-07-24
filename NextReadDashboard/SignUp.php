<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['admin_signup'])) {
    include('../conn.php');

    $name = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_pass']; // Plain password (not recommended)

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM admin_signup WHERE A_email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Email Already Registered!',
                icon: 'warning',
                confirmButtonColor: '#2563eb'
            });
        });
        </script>";
    } else {
        // Insert into database
        $sql = "INSERT INTO admin_signup (A_name, A_email, A_password) VALUES ('$name', '$email', '$pass')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Send email with PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kamisaim884@gmail.com';  // Your Gmail
                $mail->Password = 'yllpovkbuuzqrvof';       // Gmail App Password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('kamisaim884@gmail.com', 'Admin Registration');
                $mail->addAddress('kamisaim884@gmail.com'); // Email recipient (your own)

                $mail->isHTML(true);

                // Embed logo
                $mail->AddEmbeddedImage('../images/logo.png', 'logoimg');

                // Email content
                $mail->Subject = 'New Admin Registered';
                $mail->Body = "
                    <div style='font-family: Arial, sans-serif; padding: 20px;'>
                        <img src='cid:logoimg' alt='Logo' style='width: 150px;'><br><br>
                        <h2>New Admin Registered</h2>
                        <p><strong>Name:</strong> {$name}</p>
                        <p><strong>Email:</strong> {$email}</p>
                        <p><strong>Password:</strong> {$pass}</p>
                    </div>
                ";

                $mail->send();
            } catch (Exception $e) {
                echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }

            // Success alert
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Admin Registered!',
                    icon: 'success',
                    confirmButtonColor: '#2563eb'
                }).then(() => {
                    window.location.href = 'login.php';
                });
            });
            </script>";
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                title: 'Registration Failed!',
                icon: 'error',
                confirmButtonColor: '#2563eb'
            });
            </script>";
        }
    }
}
?>

 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Registration</title>

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
      0% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(50px, -80px) scale(1.2); }
      100% { transform: translate(-30px, 50px) scale(1); }
    }
  </style>
</head>

<body class="relative min-h-screen bg-[#111827] text-white flex items-center justify-center p-6">

  <!-- Background Blobs -->
  <div class="blob w-96 h-96 bg-sky-500 top-[-100px] left-[-100px]"></div>
  <div class="blob w-80 h-80 bg-indigo-600 bottom-[-80px] right-[-80px]"></div>
  <div class="blob w-72 h-72 bg-blue-800 top-[60%] left-[30%]"></div>

  <!-- Admin Signup Card -->
  <div class="w-full max-w-xl z-10 bg-white text-gray-900 rounded-2xl p-10 shadow-2xl fade-up">
    <div class="text-center mb-8">
      <img src="../images/logo.png" alt="Admin Logo" class="mx-auto w-20 h-20 mb-4" />
      <h2 class="text-3xl font-bold text-gray-800">Admin Registration</h2>
      <p class="text-sm text-gray-500 mt-1">Secure admin access panel</p>
    </div>

    <form method="POST" class="space-y-6">
      <div>
        <label for="admin_name" class="block text-sm font-medium">Full Name</label>
        <input type="text" name="admin_name" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:outline-none">
      </div>

      <div>
        <label for="admin_email" class="block text-sm font-medium">Email Address</label>
        <input type="email" name="admin_email" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:outline-none">
      </div>

      <div>
        <label for="admin_pass" class="block text-sm font-medium">Password</label>
        <input type="password" name="admin_pass" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sky-500 focus:outline-none">
      </div>

      <div class="flex items-center">
        <input id="admin_terms" type="checkbox" required
          class="h-4 w-4 text-sky-500 border-gray-300 rounded">
        <label for="admin_terms" class="ml-2 block text-sm text-gray-600">
          I confirm this is an authorized admin account.
        </label>
      </div>

      <button type="submit" name="admin_signup"
        class="w-full py-3 bg-gradient-to-r from-sky-500 to-indigo-500 text-white font-semibold rounded-xl hover:shadow-lg transition-transform hover:scale-105 duration-300">
        Register Admin
      </button>
    </form>

    <p class="text-sm text-gray-500 text-center mt-6">
      Already registered?
      <a href="login.php" class="text-sky-500 hover:underline">Login</a>
    </p>
  </div>




</body>
</html>
