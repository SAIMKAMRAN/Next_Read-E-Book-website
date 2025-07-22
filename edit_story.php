<?php
$conn = new mysqli("localhost", "root", "", "next_read");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$story = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE stories SET title=?, author=?, category=?, content=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $author, $category, $content, $id);

    if ($stmt->execute()) {
        header("Location: viewStory.php");
        exit;
    } else {
        echo "Failed to update story.";
    }
} else {
    $result = $conn->query("SELECT * FROM stories WHERE id=$id");
    if ($result->num_rows > 0) {
        $story = $result->fetch_assoc();
    } else {
        echo "Story not found.";
        exit;
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Story | Next_Read</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .transition-all {
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>
<body class="bg-gray-900 text-white min-h-screen transition-all">

<!-- Header with Logo -->
<header class="bg-gray-800 shadow-md px-6 py-4 flex items-center justify-between">
  <div class="flex items-center space-x-4">
    <img src="images/logo.png" alt="Next_Read Logo" class="h-10 w-10">
    <h1 class="text-2xl font-bold text-white">Next_Read</h1>
  </div>
  <a href="view_story.php" class="text-sm text-gray-300 hover:text-white transition">
    <i class="fas fa-arrow-left mr-2"></i>Back to Stories
  </a>
</header>

<!-- Edit Story Form -->
<main class="max-w-3xl mx-auto mt-10 p-8 bg-gray-800 rounded-2xl shadow-xl" data-aos="zoom-in">
  <h2 class="text-3xl font-bold mb-6 text-center">✏️ Edit Story</h2>
  <form method="POST" class="space-y-6">
    <div>
      <label class="block mb-2 font-medium">Title</label>
      <input type="text" name="title" class="w-full px-4 py-2 rounded-lg text-black" value="<?= htmlspecialchars($story['title']) ?>" required>
    </div>

    <div>
      <label class="block mb-2 font-medium">Author</label>
      <input type="text" name="author" class="w-full px-4 py-2 rounded-lg text-black" value="<?= htmlspecialchars($story['author']) ?>" required>
    </div>

    <div>
      <label class="block mb-2 font-medium">Category</label>
      <select name="category" class="w-full px-4 py-2 rounded-lg text-black" required>
        <option <?= $story['category'] == 'Fiction' ? 'selected' : '' ?>>Fiction</option>
        <option <?= $story['category'] == 'Essay' ? 'selected' : '' ?>>Essay</option>
        <option <?= $story['category'] == 'Poetry' ? 'selected' : '' ?>>Poetry</option>
      </select>
    </div>

    <div>
      <label class="block mb-2 font-medium">Story</label>
      <textarea name="content" rows="6" class="w-full px-4 py-2 rounded-lg text-black" required><?= htmlspecialchars($story['content']) ?></textarea>
    </div>

    <div class="flex justify-end gap-4 mt-6">
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">
        💾 Save Changes
      </button>
      <a href="view_story.php" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition">
        ❌ Cancel
      </a>
    </div>
  </form>
</main>

<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
