<?php include("conn.php"); ?>

<?php
  if (isset($_POST['submit'])) {
      $name = $_POST['CU_Name'];
      $email = $_POST['CU_Email'];
      $pass = $_POST['CU_Password'];

      $query = "INSERT INTO compitition_form (CU_Name, CU_Email, CU_Password) VALUES ('$name', '$email', '$pass')";
      $run = mysqli_query($conn, $query);

      if ($run) {
        echo "<script>
          localStorage.setItem('startTime', Date.now());
          setTimeout(() => {
            document.getElementById('popupBox').classList.remove('hidden');
          }, 100);
          setTimeout(() => {
            window.location.href = 'upload.php';
          }, 2500);
        </script>";
      } else {
        echo "<script>alert('Something went wrong while submitting your entry.');</script>";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Start Story - Next_Read</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in-up {
      animation: fadeInUp 1s ease-out both;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-blue-950 to-gray-900 min-h-screen flex items-center justify-center px-4 text-white">

  <!-- Success Popup -->
  <div id="popupBox" class="hidden fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl text-center z-50">
    🎉 <strong class="text-lg">You're In!</strong><br>
    Get ready to begin your storytelling challenge...
  </div>

  <!-- Form Container -->
  <div class="w-full max-w-2xl bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl shadow-2xl p-10 space-y-8 fade-in-up">

    <!-- Logo -->
    <div class="flex justify-center">
      <img src="images/logo.png" alt="Next_Read Logo" class="w-20 h-20 rounded-full shadow-md border-2 border-yellow-300" />
    </div>

    <!-- Heading -->
    <div class="text-center">
      <h1 class="text-4xl font-bold text-yellow-400">Welcome to the Next_Read Story Arena</h1>
      <p class="text-gray-300 mt-2">Start your creative journey by filling out the details below</p>
    </div>

    <!-- Form -->
    <form method="POST" class="space-y-6">

      <div>
        <label class="block mb-1 font-medium text-gray-200">Full Name</label>
        <input type="text" name="CU_Name" required placeholder="John Doe"
               class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-200">Email Address</label>
        <input type="email" name="CU_Email" required placeholder="you@example.com"
               class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-200">Story Password</label>
        <input type="password" name="CU_Password" required placeholder="Enter Secret Password"
               class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
      </div>

      <button type="submit" name="submit"
              class="w-full py-3 bg-yellow-400 text-gray-900 font-semibold text-lg rounded-xl shadow-md hover:bg-yellow-300 hover:scale-105 transition transform duration-200">
        🚀 Get Started
      </button>

    </form>
  </div>

</body>
</html>
