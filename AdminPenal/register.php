<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message[] = 'User already exists!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm password not matched!';
      } else {
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')") or die('query failed');

         // Send email to admin
         $mail = new PHPMailer(true);
         try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kamisaim884@gmail.com';
            $mail->Password = 'hxkbovphcgeqdgyk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('kamisaim884@gmail.com', 'New Registration Alert');
            $mail->addAddress('kamisaim884@gmail.com');

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
            $message[] = 'Mail could not be sent. Error: ' . $mail->ErrorInfo;
         }

         $message[] = 'Registered successfully!';
         header('location:login.php');
      }
   }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register | Admin Panel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap">

   <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Poppins', sans-serif;
      }

      body {
         height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      }

      .form-container {
         background: rgba(255, 255, 255, 0.1);
         backdrop-filter: blur(10px);
         padding: 40px;
         border-radius: 15px;
         box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
         width: 100%;
         max-width: 400px;
         position: relative;
         animation: slideIn 0.6s ease-out;
      }

      @keyframes slideIn {
         from {
            transform: translateY(-30px);
            opacity: 0;
         }
         to {
            transform: translateY(0);
            opacity: 1;
         }
      }

      .form-container img.logo {
         width: 100px;
         display: block;
         margin: 0 auto 20px;
      }

      .form-container h3 {
         text-align: center;
         color: #fff;
         margin-bottom: 20px;
      }

      .box {
         width: 100%;
         padding: 12px;
         margin-bottom: 15px;
         border: none;
         border-radius: 10px;
         outline: none;
         transition: 0.3s ease;
      }

      .box:focus {
         background-color: #eef;
         transform: scale(1.02);
      }

      .btn {
         width: 100%;
         padding: 12px;
         background: #3498db;
         border: none;
         border-radius: 10px;
         color: #fff;
         font-weight: 600;
         cursor: pointer;
         transition: background 0.3s ease;
      }

      .btn:hover {
         background: #2980b9;
      }

      p {
         text-align: center;
         color: #fff;
         margin-top: 10px;
      }

      a {
         color: #00f;
         text-decoration: underline;
      }

      .message {
         background: #fff;
         color: #000;
         padding: 10px 15px;
         margin: 10px auto;
         border-radius: 8px;
         width: fit-content;
         display: flex;
         align-items: center;
         gap: 10px;
         box-shadow: 0 0 10px rgba(0,0,0,0.2);
         animation: fadeIn 0.4s ease;
      }

      .message i {
         cursor: pointer;
         color: #888;
      }

      @keyframes fadeIn {
         from {opacity: 0;}
         to {opacity: 1;}
      }
   </style>
</head>
<body>

<?php
if (isset($message)) {
   foreach ($message as $msg) {
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
}
?>

<div class="form-container">
   <img src="../images/logo.png" alt="Logo" class="logo">
   <form action="" method="post">
      <h3>Register Now</h3>
      <input type="text" name="name" placeholder="Enter your name" required class="box">
      <input type="email" name="email" placeholder="Enter your email" required class="box">
      <input type="password" name="password" placeholder="Enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
      <select name="user_type" class="box">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="btn">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>
</div>

</body>
</html>
