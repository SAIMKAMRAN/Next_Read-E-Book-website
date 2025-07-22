<?php
$conn = new mysqli("localhost", "root", "", "next_read");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete uploaded file
    $res = $conn->query("SELECT file_path FROM stories WHERE id=$id");
    $row = $res->fetch_assoc();
    if (!empty($row['file_path']) && file_exists($row['file_path'])) {
        unlink($row['file_path']);
    }

    $conn->query("DELETE FROM stories WHERE id=$id");
}

$conn->close();

// Redirect to viewStory.php with delete popup flag
header("Location: viewStory.php?deleted=1");
exit;
?>
