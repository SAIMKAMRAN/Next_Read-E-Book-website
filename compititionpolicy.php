<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Next_Read - Rules & Policies</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-950 to-gray-900 text-white min-h-screen py-10 px-4 md:px-10 lg:px-32">

  <!-- Header -->
  <div class="text-center mb-10 animate-fade-in-up">
    <img src="images/logo.png" alt="Logo" class="w-20 h-20 mx-auto rounded-full shadow-md animate-bounce-slow mb-4" />
    <h1 class="text-4xl md:text-5xl font-bold text-yellow-300">📜 Rules & Policies</h1>
    <p class="text-gray-300 mt-2 text-lg">Please make sure you read and accept all the rules before proceeding.</p>
  </div>

  <!-- Rules Box -->
  <div class="bg-white/5 backdrop-blur-md p-6 md:p-10 rounded-xl shadow-xl space-y-6 border border-white/10 animate-fade-in-up">
    <div class="space-y-4 text-gray-200 text-base md:text-lg leading-relaxed">
      <div>
        <h2 class="font-semibold text-yellow-400">1. Time Limit</h2>
        <p>You will have exactly 2 hours to complete and submit your story.</p>
      </div>
      <div>
        <h2 class="font-semibold text-yellow-400">2. Originality</h2>
        <p>All stories must be original. Plagiarism is strictly prohibited and will lead to disqualification.</p>
      </div>
      <div>
        <h2 class="font-semibold text-yellow-400">3. Content Policy</h2>
        <p>Any content containing hate speech, vulgarity, or NSFW themes will not be accepted.</p>
      </div>
      <div>
        <h2 class="font-semibold text-yellow-400">4. Submission</h2>
        <p>Once the timer ends, no further edits or submissions will be allowed.</p>
      </div>
      <div>
        <h2 class="font-semibold text-yellow-400">5. Fair Play</h2>
        <p>Any kind of cheating or taking external help will result in immediate removal.</p>
      </div>
      <div>
        <h2 class="font-semibold text-yellow-400">6. Judgement</h2>
        <p>Judging will be done by a panel and all decisions will be final.</p>
      </div>
      <div>
        <h2 class="font-semibold text-yellow-400">7. Public Sharing</h2>
        <p>By participating, you agree that your story may be featured or shared by Next_Read.</p>
      </div>
    </div>
  </div>

  <!-- Checkbox and Button -->
  <div class="mt-10 text-center animate-fade-in-up space-y-4">
    <label class="inline-flex items-center text-gray-300">
      <input type="checkbox" id="agreeCheckbox" class="form-checkbox h-5 w-5 text-yellow-400 rounded focus:ring-0 focus:outline-none">
      <span class="ml-2">I have read and agree to the Rules & Policies</span>
    </label>

    <div>
      <button id="finishBtn" disabled class="mt-4 px-8 py-3 bg-yellow-400 text-gray-900 font-semibold rounded-xl shadow-lg transition transform hover:scale-105 hover:bg-yellow-300 disabled:opacity-40 disabled:cursor-not-allowed animate-glow">
        Finish
      </button>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    const checkbox = document.getElementById('agreeCheckbox');
    const finishBtn = document.getElementById('finishBtn');

    checkbox.addEventListener('change', () => {
      finishBtn.disabled = !checkbox.checked;
    });

    finishBtn.addEventListener('click', () => {
      window.location.href = "Compititionform.php";
    });
  </script>

  <!-- Animations -->
  <style>
    @keyframes fade-in-up {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fade-in-up {
      animation: fade-in-up 1s ease-out both;
    }

    @keyframes bounce-slow {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
    }
    .animate-bounce-slow {
      animation: bounce-slow 3s infinite;
    }

    @keyframes glow {
      0%, 100% {
        box-shadow: 0 0 10px #facc15, 0 0 20px #facc15;
      }
      50% {
        box-shadow: 0 0 20px #facc15, 0 0 30px #facc15;
      }
    }
    .animate-glow {
      animation: glow 2s infinite ease-in-out;
    }
  </style>

</body>
</html>
