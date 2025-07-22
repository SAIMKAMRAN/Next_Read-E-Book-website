<?php
include('conn.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if email is provided
if (!isset($_GET['email']) || empty($_GET['email'])) {
    echo "Email missing in the URL.";
    exit;
}

$email = $_GET['email'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        echo "Passwords do not match.";
    } else {
        $hashed = password_hash($new, PASSWORD_DEFAULT);

        $sql = "UPDATE signup SET S_password = ? WHERE S_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $hashed, $email);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php");
            exit;
        } else {
            echo "Error updating password.";
        }
    }
}
?>

<!-- Simple HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form method="POST">
        <label>New Password:</label><br>
        <input type="password" name="new_password" required><br><br>
        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password" required><br><br>
        <button type="submit">Update Password</button>
    </form>
</body>
</html>
