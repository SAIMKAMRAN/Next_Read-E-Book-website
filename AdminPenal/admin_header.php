<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
 <div class="flex">
      <!-- Logo -->
      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>
      
      <!-- Menu Button -->
      <div id="menu-btn" class="fas fa-bars"></div>
      
      <!-- Search Bar -->
      <div class="search-container">
         <input type="text" id="search-input" placeholder="Search products, orders, users..." class="search-input">
         <i class="fas fa-search search-icon" id="search-btn"></i>
         <div class="search-results" id="search-results"></div>
      </div>
      
      <!-- User Profile -->
      <div class="user-profile">
         <div class="user-avatar" id="user-btn">
            <img src="https://via.placeholder.com/40x40/8e44ad/ffffff?text=<?php echo strtoupper(substr($_SESSION['admin_name'], 0, 1)); ?>" alt="User Avatar">
         </div>
         
         <div class="account-box">
            <div class="user-info">
               <img src="https://via.placeholder.com/60x60/8e44ad/ffffff?text=<?php echo strtoupper(substr($_SESSION['admin_name'], 0, 1)); ?>" alt="User Avatar" class="user-avatar-large">
               <h3><?php echo $_SESSION['admin_name']; ?></h3>
               <p><?php echo $_SESSION['admin_email']; ?></p>
            </div>
            <div class="account-actions">
               <a href="#" class="btn profile-btn">Profile</a>
               <a href="#" class="btn settings-btn">Settings</a>
               <a href="logout.php" class="delete-btn">Logout</a>
            </div>
         </div>
      </div>
   </div>
</header>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
   <div class="sidebar-container">
      <!-- Sidebar Header -->
      <div class="sidebar-header">
         <div class="sidebar-brand">
            <div class="brand-icon">
               <i class="fas fa-shield-alt"></i>
            </div>
            <div class="brand-text">
               <h3>Admin<span>Panel</span></h3>
               <p>Management System</p>
            </div>
         </div>
         <button class="sidebar-close" id="close-sidebar">
            <i class="fas fa-times"></i>
         </button>
      </div>
      
      <!-- Navigation Menu -->
      <nav class="sidebar-nav">
         <div class="nav-section">
            <h4 class="nav-title">Main Navigation</h4>
            <ul class="nav-menu">
               <li class="nav-item">
                  <a href="admin_page.php" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-chart-pie"></i>
                     </div>
                     <span class="nav-text">Dashboard</span>
                     <div class="nav-badge">5</div>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="admin_products.php" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-box-open"></i>
                     </div>
                     <span class="nav-text">Products</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="admin_orders.php" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-shopping-bag"></i>
                     </div>
                     <span class="nav-text">Orders</span>
                     <div class="nav-badge new">3</div>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="admin_users.php" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-users"></i>
                     </div>
                     <span class="nav-text">Users</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="admin_contacts.php" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-envelope"></i>
                     </div>
                     <span class="nav-text">Messages</span>
                  </a>
               </li>
            </ul>
         </div>
         
         <div class="nav-section">
            <h4 class="nav-title">Settings</h4>
            <ul class="nav-menu">
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-cog"></i>
                     </div>
                     <span class="nav-text">Settings</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <div class="nav-icon">
                        <i class="fas fa-chart-bar"></i>
                     </div>
                     <span class="nav-text">Analytics</span>
                  </a>
               </li>
            </ul>
         </div>
      </nav>
      
      <!-- Sidebar Footer -->
      <div class="sidebar-footer">
         <div class="admin-profile">
            <div class="profile-avatar">
               <img src="https://via.placeholder.com/48x48/8e44ad/ffffff?text=<?php echo strtoupper(substr($_SESSION['admin_name'], 0, 1)); ?>" alt="Admin Avatar">
               <div class="status-indicator online"></div>
            </div>
            <div class="profile-info">
               <h4><?php echo $_SESSION['admin_name']; ?></h4>
               <p>Administrator</p>
            </div>
            <div class="profile-actions">
               <a href="logout.php" class="action-btn logout" title="Logout">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</aside>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>
