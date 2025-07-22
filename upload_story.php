<?php
include("conn.php"); // Database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['story'];
    $duration = $_POST['duration'];
    $wordCount = $_POST['word_count'];
    $createdAt = date('Y-m-d H:i:s');

    // Handle password (optional)
    $rawPassword = $_POST['story_password'] ?? null;
    $storyPassword = !empty($rawPassword) ? password_hash($rawPassword, PASSWORD_DEFAULT) : null;

    // Handle file upload
    $filePath = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileName = time() . "_" . basename($_FILES['file']['name']);
        $uploadDir = "uploads/";
        $filePath = $uploadDir . $fileName;

        move_uploaded_file($fileTmp, $filePath);
    }

    // Prepare SQL
    $stmt = $conn->prepare("INSERT INTO stories (title, author, category, content, file_path, created_at, story_password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $author, $category, $content, $filePath, $createdAt, $storyPassword);

    if ($stmt->execute()) {
        echo "<script>
                alert('Story uploaded successfully!');
                window.location.href = 'viewStory.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid Request";
}
?>
