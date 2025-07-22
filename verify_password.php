<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputPassword = $_POST['inputPassword'] ?? '';
    $hashedPassword = $_POST['hashedPassword'] ?? '';

    if (password_verify($inputPassword, $hashedPassword)) {
        echo '1';
    } else {
        echo '0';
    }
}
?>
