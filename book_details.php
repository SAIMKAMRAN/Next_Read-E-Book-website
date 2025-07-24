<?php
include 'conn.php';

$bookId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$paid = isset($_GET['paid']) && $_GET['paid'] === 'true';

$query = mysqli_query($conn, "SELECT * FROM finance WHERE F_id = $bookId");
$book = mysqli_fetch_assoc($query);

if (!$book) {
    echo "❌ Book not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($book['F_Name']) ?> | Digital Library</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-white text-gray-800">


    <main class="max-w-4xl mx-auto p-6">
        <div class="bg-gray-100 rounded-xl shadow p-6 md:flex items-start gap-6">
            <div class="md:w-1/3 mb-6 md:mb-0">
                <img src="<?= htmlspecialchars($book['Image_URL']) ?: 'https://via.placeholder.com/300x400' ?>"
                    alt="Book Cover" class="rounded-lg w-full shadow-md object-cover aspect-[3/4]">
            </div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold mb-2"><?= htmlspecialchars($book['F_Name']) ?></h2>
                <p class="text-gray-600 text-sm mb-4">By <strong><?= htmlspecialchars($book['F_Author']) ?></strong></p>
                <p class="text-gray-700 leading-relaxed mb-4"><?= nl2br(htmlspecialchars($book['F_Des'])) ?></p>

                <?php if ($paid): ?>
                <div class="mt-4 bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-md">
                    ✅ Payment Verified! You can now download the content.
                </div>
                <a href="downloads/sample.pdf" target="_blank"
                    class="mt-4 inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg transition">
                    📥 Download Now
                </a>
                <?php else: ?>
                <div class="mt-4 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-md">
                    🔒 This content is locked. Payment is required to access.
                </div>
                <a href="finance.php"
                    class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition">
                    💳 Pay & Unlock
                </a>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer class="text-center text-gray-500 text-sm mt-12 mb-6">
        &copy; <?= date("Y") ?> Digital Library. All rights reserved.
    </footer>

</body>

</html>