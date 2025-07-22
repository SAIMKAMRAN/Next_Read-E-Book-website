
<?php
include 'config.php';
session_start();

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];

            // Generate OTP
            $otp = rand(100000, 999999);
            $_SESSION['admin_otp'] = $otp;

            // Send OTP email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kamisaim84@gmail.com';
                $mail->Password = 'hxkbovphcgeqdgyk'; // Gmail app password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('kamisaim84@gmail.com', 'Admin Panel');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Your Admin OTP Code';
                $mail->Body = "
                    <h2>Hi " . $row['name'] . ",</h2>
                    <p>Your OTP code is:</p>
                    <h1 style='color:#2563eb;'>$otp</h1>
                    <p>Please enter this code to verify your login.</p>
                ";

                $mail->send();

                header('Location: OTPCode.php');
                exit;
            } catch (Exception $e) {
                echo "<script>alert('OTP not sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
            exit;
        }
    } else {
        echo "<script>alert('Incorrect email or password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 text-white h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-10 rounded-lg w-full max-w-md shadow-xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>

        <?php if (!empty($message)) : ?>
            <div class="mb-4 p-3 bg-red-500 text-white rounded text-sm">
                <?= implode("<br>", $message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="password" name="password" placeholder="Password (used as OTP)" required class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" name="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 rounded font-semibold">Send OTP</button>
        </form>
    </div>
</body>
</html>
