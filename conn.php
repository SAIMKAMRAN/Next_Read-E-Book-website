<?php
$conn = mysqli_connect("localhost", "root", "", "next_read");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
