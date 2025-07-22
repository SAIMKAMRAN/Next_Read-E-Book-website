<?php
session_start();
session_unset();
session_destroy();
echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      title: 'Logged out successfully!',
      icon: 'success',
      confirmButtonColor: '#2563eb'
    }).then(() => {
      window.location.href = 'login.php';
    });
  });
</script>";
exit();
?>
