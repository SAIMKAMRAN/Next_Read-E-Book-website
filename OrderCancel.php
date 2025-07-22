<?php 

include("conn.php");
$id = $_GET["id"];
$sql = "DELETE FROM `shop` WHERE B_id = $id";
$result = mysqli_query($conn ,$sql);
header("location:Allorder.php");


?>
