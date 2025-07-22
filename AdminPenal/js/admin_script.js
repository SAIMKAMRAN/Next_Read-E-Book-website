// DOM Elements
let sidebar = document.querySelector('#sidebar');
let sidebarOverlay = document.querySelector('#sidebar-overlay');
let accountBox = document.querySelector('.header .account-box');
let searchInput = document.querySelector('#search-input');
let searchResults = document.querySelector('#search-results');
let menuBtn = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');
let closeSidebar = document.querySelector('#close-sidebar');

// Sidebar functionality
if (menuBtn) {
   menuBtn.onclick = () => {
      sidebar.classList.toggle('active');
      sidebarOverlay.classList.toggle('active');
      accountBox.classList.remove('active');
      document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : 'auto';
   }
}

// Close sidebar
if (closeSidebar) {
   closeSidebar.onclick = () => {
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      document.body.style.overflow = 'auto';
   }
}

// Close sidebar when clicking overlay
if (sidebarOverlay) {
   sidebarOverlay.onclick = () => {
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      document.body.style.overflow = 'auto';
   }
}

// User profile dropdown
if (userBtn) {
   userBtn.onclick = () => {
      accountBox.classList.toggle('active');
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      document.body.style.overflow = 'auto';
   }
}

// Search functionality
if (searchInput) {
   let searchTimeout;
   
   searchInput.addEventListener('input', function() {
      clearTimeout(searchTimeout);
      const query = this.value.trim();
      
      if (query.length < 2) {
         searchResults.classList.remove('active');
         return;
      }
      
      searchTimeout = setTimeout(() => {
         performSearch(query);
      }, 300);
   });
   
   searchInput.addEventListener('focus', function() {
      if (this.value.trim().length >= 2) {
         searchResults.classList.add('active');
      }
   });
}

// Search function
function performSearch(query) {
   // Show loading
   searchResults.innerHTML = '<div class="search-result-item">Searching...</div>';
   searchResults.classList.add('active');
   
   // Make AJAX request
   fetch('admin_search.php', {
      method: 'POST',
      headers: {
         'Content-Type': 'application/x-www-form-urlencoded',
         'X-Requested-With': 'XMLHttpRequest'
      },
      body: 'search=' + encodeURIComponent(query)
   })
   .then(response => response.json())
   .then(data => {
      displaySearchResults(data);
   })
   .catch(error => {
      console.error('Search error:', error);
      searchResults.innerHTML = '<div class="search-result-item">Search error occurred</div>';
   });
}

// Display search results
function displaySearchResults(results) {
   if (results.length === 0) {
      searchResults.innerHTML = '<div class="search-result-item">No results found</div>';
   } else {
      searchResults.innerHTML = results.map(result => 
         `<div class="search-result-item" onclick="window.location.href='${result.url}'">
            <strong>${result.name}</strong>
            <small style="display: block; color: var(--light-color);">${result.type}</small>
         </div>`
      ).join('');
   }
   
   searchResults.classList.add('active');
}

// Close search results when clicking outside
document.addEventListener('click', function(e) {
   if (!e.target.closest('.search-container')) {
      searchResults.classList.remove('active');
   }
});

// Close dropdowns on scroll
window.onscroll = () => {
   accountBox.classList.remove('active');
   searchResults.classList.remove('active');
}

// Active nav link highlighting
function setActiveNavLink() {
   const currentPage = window.location.pathname.split('/').pop();
   const navLinks = document.querySelectorAll('.sidebar .nav-link');
   
   navLinks.forEach(link => {
      const href = link.getAttribute('href');
      if (href === currentPage) {
         link.classList.add('active');
      } else {
         link.classList.remove('active');
      }
   });
}

// Smooth scrolling for nav links
function addSmoothScrolling() {
   const navLinks = document.querySelectorAll('.nav-link');
   navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
         // Add ripple effect
         const ripple = document.createElement('span');
         ripple.classList.add('ripple');
         this.appendChild(ripple);
         
         const rect = this.getBoundingClientRect();
         const size = Math.max(rect.width, rect.height);
         ripple.style.width = ripple.style.height = size + 'px';
         ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
         ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
         
         setTimeout(() => {
            ripple.remove();
         }, 600);
      });
   });
}

// Add floating animation to nav badges
function animateNavBadges() {
   const badges = document.querySelectorAll('.nav-badge');
   badges.forEach(badge => {
      badge.style.animation = 'float 3s ease-in-out infinite';
   });
}

// Initialize active nav link on page load
document.addEventListener('DOMContentLoaded', function() {
   setActiveNavLink();
   addSmoothScrolling();
   animateNavBadges();
});

// Close edit product form
if (document.querySelector('#close-update')) {
   document.querySelector('#close-update').onclick = () => {
      document.querySelector('.edit-product-form').style.display = 'none';
      window.location.href = 'admin_products.php';
   }
}

// Escape key functionality
document.addEventListener('keydown', function(e) {
   if (e.key === 'Escape') {
      // Close sidebar
      sidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      document.body.style.overflow = 'auto';
      
      // Close account box
      accountBox.classList.remove('active');
      
      // Close search results
      searchResults.classList.remove('active');
   }
});
