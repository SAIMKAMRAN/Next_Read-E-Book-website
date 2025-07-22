<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['search']) || isset($_GET['search'])){
   $search_query = $_POST['search'] ?? $_GET['search'];
   $search_query = filter_var($search_query, FILTER_SANITIZE_STRING);
   
   $results = [];
   
   // Search Products
   $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_query}%' LIMIT 5") or die('query failed');
   while($fetch_products = mysqli_fetch_assoc($select_products)){
      $results[] = [
         'type' => 'product',
         'name' => $fetch_products['name'],
         'url' => 'admin_products.php',
         'id' => $fetch_products['id']
      ];
   }
   
   // Search Orders
   $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE name LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' LIMIT 5") or die('query failed');
   while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      $results[] = [
         'type' => 'order',
         'name' => 'Order #' . $fetch_orders['id'] . ' - ' . $fetch_orders['name'],
         'url' => 'admin_orders.php',
         'id' => $fetch_orders['id']
      ];
   }
   
   // Search Users
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE name LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' LIMIT 5") or die('query failed');
   while($fetch_users = mysqli_fetch_assoc($select_users)){
      $results[] = [
         'type' => 'user',
         'name' => $fetch_users['name'] . ' (' . $fetch_users['email'] . ')',
         'url' => 'admin_users.php',
         'id' => $fetch_users['id']
      ];
   }
   
   // Search Messages
   $select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE name LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR subject LIKE '%{$search_query}%' LIMIT 5") or die('query failed');
   while($fetch_messages = mysqli_fetch_assoc($select_messages)){
      $results[] = [
         'type' => 'message',
         'name' => $fetch_messages['subject'] . ' - ' . $fetch_messages['name'],
         'url' => 'admin_contacts.php',
         'id' => $fetch_messages['id']
      ];
   }
   
   // Return JSON response for AJAX requests
   if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
      header('Content-Type: application/json');
      echo json_encode($results);
      exit;
   }
   
   // For non-AJAX requests, redirect to appropriate page
   if(count($results) > 0){
      header('location:' . $results[0]['url']);
   } else {
      header('location:admin_page.php');
   }
}

?>
