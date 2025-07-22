<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "next_read");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM stories ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Stories | Next_Read</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gray-900 text-white transition duration-300" id="themeBody">

<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 p-6 space-y-6 shadow-xl">
    <div class="flex items-center space-x-3">
      <img src="images/logo.png" alt="Next_Read Logo" class="h-10 w-10 object-contain">
      <h2 class="text-2xl font-bold text-white">Next_Read</h2>
    </div>
    <nav class="space-y-2">
      <a href="upload.php" class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
        <i class="fas fa-upload mr-2"></i> Upload Story
      </a>
      <a href="viewStory.php" class="flex items-center px-4 py-2 bg-gray-700 text-white rounded-lg">
        <i class="fas fa-eye mr-2"></i> View Stories
      </a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 px-8 py-10">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-4xl font-bold">Uploaded Stories</h1>
      <input type="text" id="searchInput" placeholder="Search stories..." class="px-4 py-2 rounded-lg text-black w-72">
    </div>

    <div id="storyContainer" class="grid gap-6">
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="story-card bg-gray-800 border border-gray-700 p-6 rounded-2xl shadow-lg" data-aos="fade-up">
            <div class="flex items-center mb-4">
              <img src="images/logo.png" alt="Logo" class="h-10 w-10 mr-3">
              <div>
                <h2 class="text-2xl font-semibold title"><?= htmlspecialchars($row['title']) ?></h2>
                <p class="text-sm text-gray-400 author-category">
                  <strong>Author:</strong> <?= htmlspecialchars($row['author']) ?> |
                  <strong>Category:</strong> <?= htmlspecialchars($row['category']) ?>
                </p>
              </div>
            </div>

            <?php if (!empty($row['story_password'])): ?>
              <!-- Locked Story -->
              <div class="text-gray-300 content mb-4" id="lock-box-<?= $row['id'] ?>">
                <p class="mb-2 text-red-400">🔒 This story is locked. Enter password to view:</p>
                <input type="password" id="pass-<?= $row['id'] ?>" placeholder="Enter password..."
                       class="px-3 py-2 text-black rounded-lg w-64">
                <button onclick="unlockStory(<?= $row['id'] ?>, '<?= $row['story_password'] ?>')"
                        class="ml-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                  Unlock
                </button>
              </div>

              <div class="hidden" id="content-box-<?= $row['id'] ?>">
                <div class="text-gray-300 content mb-4">
                  <?= nl2br(htmlspecialchars($row['content'])) ?>
                </div>

                <?php if (!empty($row['file_path'])): ?>
                  <a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank"
                     class="inline-block mb-3 text-red-400 hover:underline transition">
                    📄 Download Attachment
                  </a>
                <?php endif; ?>

                <div class="flex justify-between items-center mt-4">
                  <span class="text-xs text-gray-500">Uploaded on <?= $row['created_at'] ?></span>
                  <div class="space-x-2">
                    <a href="edit_story.php?id=<?= $row['id'] ?>"
                       class="inline-flex items-center px-3 py-1 bg-yellow-500 text-sm text-white rounded-md hover:bg-yellow-600 transition">
                      ✏️ Edit
                    </a>
                    <a href="delete_story.php?id=<?= $row['id'] ?>"
                       onclick="return confirmDelete(event)"
                       class="inline-flex items-center px-3 py-1 bg-red-600 text-sm text-white rounded-md hover:bg-red-700 transition">
                      🗑 Delete
                    </a>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <!-- Public Story -->
              <div class="text-gray-300 content mb-4">
                <?= nl2br(htmlspecialchars($row['content'])) ?>
              </div>

              <?php if (!empty($row['file_path'])): ?>
                <a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank"
                   class="inline-block mb-3 text-red-400 hover:underline transition">
                  📄 Download Attachment
                </a>
              <?php endif; ?>

              <div class="flex justify-between items-center mt-4">
                <span class="text-xs text-gray-500">Uploaded on <?= $row['created_at'] ?></span>
                <div class="space-x-2">
                  <a href="edit_story.php?id=<?= $row['id'] ?>"
                     class="inline-flex items-center px-3 py-1 bg-yellow-500 text-sm text-white rounded-md hover:bg-yellow-600 transition">
                    ✏️ Edit
                  </a>
                  <a href="delete_story.php?id=<?= $row['id'] ?>"
                     onclick="return confirmDelete(event)"
                     class="inline-flex items-center px-3 py-1 bg-red-600 text-sm text-white rounded-md hover:bg-red-700 transition">
                    🗑 Delete
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="bg-yellow-600 text-white p-4 rounded-lg text-center">
          No stories found.
        </div>
      <?php endif; ?>
    </div>
  </main>
</div>

<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();

  function confirmDelete(event) {
    event.preventDefault();
    const url = event.currentTarget.href;

    Swal.fire({
      title: 'Are you sure?',
      text: "This story will be permanently deleted!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#e11d48',
      cancelButtonColor: '#6b7280',
      confirmButtonText: 'Yes, delete it!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });

    return false;
  }

  function unlockStory(id, hashedPassword) {
    const inputPassword = document.getElementById(`pass-${id}`).value;

    fetch('verify_password.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `inputPassword=${encodeURIComponent(inputPassword)}&hashedPassword=${encodeURIComponent(hashedPassword)}`
    })
    .then(res => res.text())
    .then(match => {
      if (match === '1') {
        document.getElementById(`lock-box-${id}`).classList.add('hidden');
        document.getElementById(`content-box-${id}`).classList.remove('hidden');
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Wrong password',
          text: 'Please try again!',
        });
      }
    });
  }

  document.getElementById("searchInput").addEventListener("input", function () {
    const query = this.value.toLowerCase();
    const cards = document.querySelectorAll(".story-card");

    cards.forEach(card => {
      const title = card.querySelector(".title").textContent.toLowerCase();
      const content = card.querySelector(".content").textContent.toLowerCase();
      const author = card.querySelector(".author-category").textContent.toLowerCase();
      const fullText = title + content + author;

      card.style.display = fullText.includes(query) ? "block" : "none";
    });
  });

  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('deleted')) {
    showToast('Story Deleted Successfully!');
  } else if (urlParams.has('uploaded')) {
    showToast('Story Uploaded Successfully!');
  } else if (urlParams.has('edited')) {
    showToast('Story Updated Successfully!');
  }

  function showToast(message) {
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: message,
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });
    window.history.replaceState({}, document.title, window.location.pathname);
  }
</script>

</body>
</html>

<?php $conn->close(); ?>
