<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'conn.php';

// Safely get and sanitize POST data
$bookId = isset($_POST['book_id']) ? (int)$_POST['book_id'] : 0;
$method = $_POST['method'] ?? 'Unknown';

// Fetch book from DB
$bookQuery = mysqli_query($conn, "SELECT * FROM finance WHERE F_id = $bookId");
$book = mysqli_fetch_assoc($bookQuery);

if (!$book) {
    echo json_encode([
        "status" => "error",
        "message" => "❌ Invalid book ID."
    ]);
    exit;
}

$mail = new PHPMailer(true);

try {
    // Mail server setup
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kamisaim884@gmail.com';
    $mail->Password = 'yllpovkbuuzqrvof'; // ⚠️ Move this to env/secure config
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email details
    $mail->setFrom('kamisaim884@gmail.com', 'Book Store');
    $mail->addAddress('kamisaim884@gmail.com', 'Admin');

    $mail->Subject = "📩 New Payment Request: {$book['F_Name']}";
    $mail->Body = "📖 Book: {$book['F_Name']}\n💵 Price: ₹{$book['F_Price']}\n🧾 Method: {$method}\n\nPlease approve the download request.";

    $mail->send();

    echo json_encode([
        "status" => "success",
        "message" => "✅ Payment submitted.",
        "paid" => true,
        "redirect" => "details.php?id={$bookId}&paid=true"
    ]);
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "❌ Email Error: {$mail->ErrorInfo}"
    ]);
}
?>
