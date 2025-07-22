<?php include("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Story | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-900 text-white">

  <!-- Alert Box -->
  <div id="alert-box" class="hidden bg-green-700 text-green-100 text-center py-3 px-4">
    Story uploaded successfully!
  </div>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 p-6 space-y-4 shadow-lg">
      <h2 class="text-2xl font-semibold text-white">Dashboard</h2>
      <nav class="space-y-2">
        <a href="upload.php" class="flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
          <i class="fas fa-upload mr-2"></i> Upload Story
        </a>
        <a href="viewStory.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md transition">
          <i class="fas fa-eye mr-2"></i> View Stories
        </a>
      </nav>
    </aside>

    <!-- Form Section -->
    <main class="flex-1 flex items-center justify-center px-6 py-12 bg-gray-900">
      <div class="bg-gray-800 bg-opacity-90 backdrop-blur-md shadow-2xl p-8 rounded-2xl w-full max-w-xl border border-gray-700">
        <h2 class="text-3xl font-semibold text-center text-white mb-6">Upload Essay / Story</h2>
        <form id="storyForm" action="upload_story.php" method="POST" enctype="multipart/form-data" class="space-y-5">
          <div>
            <label class="block mb-1 text-gray-300 font-medium">Title</label>
            <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-600 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
          </div>
          <div>
            <label class="block mb-1 text-gray-300 font-medium">Author Name</label>
            <input type="text" name="author" required class="w-full px-4 py-2 border border-gray-600 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
          </div>
          <div>
            <label class="block mb-1 text-gray-300 font-medium">Category</label>
            <select name="category" required class="w-full px-4 py-2 border border-gray-600 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
              <option value="">Choose...</option>
              <option value="Fiction">Fiction</option>
              <option value="Essay">Essay</option>
              <option value="Poetry">Poetry</option>
            </select>
          </div>
          <div>
            <label class="block mb-1 text-gray-300 font-medium">Your Story</label>
            <textarea id="storyText" name="story" rows="5" required class="w-full px-4 py-2 border border-gray-600 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            <div class="flex justify-between mt-1 text-sm text-gray-400">
              <span>⏱ Time: <span id="displayTimer">00:00:00</span></span>
              <span>📝 Words: <span id="wordCount">0</span></span>
            </div>
          </div>
          <div>
            <label class="block mb-1 text-gray-300 font-medium">Upload File (Optional)</label>
            <input type="file" name="file" class="w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-100 file:text-red-600 hover:file:bg-red-200">
          </div>

          <!-- 🔒 Story Password Field -->
          <div>
            <label class="block mb-1 text-gray-300 font-medium">Password for Story (Optional)</label>
            <input type="password" name="story_password" placeholder="Leave blank if public"
              class="w-full px-4 py-2 border border-gray-600 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
          </div>

          <input type="hidden" name="duration" id="durationInput">
          <input type="hidden" name="word_count" id="wordCountInput">

          <button type="submit" class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition duration-200">
            Submit
          </button>
        </form>
      </div>
    </main>
  </div>

  <!-- Timer Display -->
  <div id="timer" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-gray-800 px-6 py-2 rounded-full shadow-lg border border-yellow-400 text-yellow-300 text-xl font-bold"></div>

  <script>
    let startTime = Date.now();
    let timerInterval;

    function startTimer() {
      timerInterval = setInterval(() => {
        const elapsed = Date.now() - startTime;
        const seconds = Math.floor((elapsed / 1000) % 60);
        const minutes = Math.floor((elapsed / 1000 / 60) % 60);
        const hours = Math.floor((elapsed / 1000 / 60 / 60));

        const timeStr = `${hours.toString().padStart(2, '0')}:${minutes
          .toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        document.getElementById("timer").innerText = timeStr;
        document.getElementById("displayTimer").innerText = timeStr;
        document.getElementById("durationInput").value = timeStr;
      }, 1000);
    }

    function countWords(text) {
      return text.trim().split(/\s+/).filter(Boolean).length;
    }

    document.getElementById("storyText").addEventListener("input", function () {
      const wordCount = countWords(this.value);
      document.getElementById("wordCount").innerText = wordCount;
      document.getElementById("wordCountInput").value = wordCount;
    });

    document.getElementById("storyForm").addEventListener("submit", function () {
      clearInterval(timerInterval);
    });

    startTimer();
  </script>

</body>
</html>
