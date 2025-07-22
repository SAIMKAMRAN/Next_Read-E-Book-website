<?php include("conn.php"); ?>
<?php include("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Orders</title>

  <link rel="icon" href="images/logo.png" type="image/png" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #0a0f1f;
    }
    .shine-effect::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(120deg, transparent, rgba(255,255,255,0.15), transparent);
      transform: rotate(25deg);
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.5s ease;
    }
    .group:hover .shine-effect::before {
      opacity: 1;
      animation: shineMove 1s ease forwards;
    }
    @keyframes shineMove {
      0% { transform: translateX(-100%) rotate(25deg); }
      100% { transform: translateX(100%) rotate(25deg); }
    }

    /* SweetAlert2 font override */
    .swal2-popup {
      font-family: 'Poppins', sans-serif !important;
    }
  </style>
</head>
<body>

<div class="container mx-auto px-4 py-20" data-aos="fade-up" data-aos-duration="1500">
  <div class="bg-[#0f172a] border border-blue-700 rounded-2xl shadow-2xl pt-16 pb-10 px-6 relative">

    <!-- Floating Top Logo -->
    <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 z-20">
      <img src="images/logo.png" alt="Logo" class="w-20 h-20 rounded-full border-4 border-cyan-400 bg-[#0f172a] shadow-lg" />
    </div>

    <h2 class="text-4xl font-bold text-center text-cyan-300 mb-12 drop-shadow-md leading-relaxed">
      📦 Order Management <br> <span class="text-white text-xl font-normal">NextRead Panel</span>
    </h2>

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
      <?php 
        $query = mysqli_query($conn, "SELECT * FROM shop");
        $index = 0;

        while($row = mysqli_fetch_array($query)) {
          $created_at = strtotime($row['created_at']);
          $orderId = $row[0];
      ?>
      <div id="row_<?php echo $index ?>" 
           class="group relative bg-gradient-to-br from-[#1e293b] to-[#0f172a] text-white p-6 rounded-2xl shadow-xl border border-slate-800 overflow-hidden transition transform duration-300 ease-in-out hover:scale-[1.03] hover:shadow-cyan-500/50 shine-effect"
           data-aos="zoom-in" data-aos-delay="<?php echo $index * 100 ?>">

        <!-- Floating Logo on Card -->
        <div class="absolute -top-4 -left-4 z-20">
          <img src="images/logo.png" alt="Logo" class="w-12 h-12 rounded-full border-2 border-cyan-500 bg-slate-800 shadow-md" />
        </div>

        <!-- Aura Glow -->
        <div class="absolute -inset-1 bg-cyan-400 opacity-10 blur-xl group-hover:opacity-30 transition duration-500 rounded-2xl pointer-events-none"></div>

        <!-- Countdown Badge -->
        <div class="absolute top-4 right-4 z-10">
          <span id="timer_<?php echo $index ?>" data-start="<?php echo $created_at ?>" class="bg-yellow-400 text-black font-bold text-sm px-3 py-1 rounded-full shadow animate-pulse">
            48:00:00
          </span>
        </div>

        <!-- Book Details -->
        <div class="mb-6 relative z-10">
          <h5 class="text-cyan-200 font-bold text-xl mb-3 flex items-center gap-2">
            <span class="text-2xl">📘</span> Book Details
          </h5>
          <ul class="text-base space-y-1 text-gray-300">
            <li><span class="text-cyan-300 font-medium">Name:</span> <?php echo $row["B_Book"] ?> <span class="text-sm text-gray-400">(ID: <?php echo $row["B_id"] ?>)</span></li>
            <li><span class="text-cyan-300 font-medium">Quantity:</span> <?php echo $row["B_Quantity"] ?></li>
            <li><span class="text-cyan-300 font-medium">Price:</span> <span class="text-green-400 font-bold">₹<?php echo $row["B_Price"] ?></span></li>
          </ul>
        </div>

        <!-- Buyer Info -->
        <div class="mb-5 relative z-10">
          <h5 class="text-pink-300 font-bold text-xl mb-3 flex items-center gap-2">
            <span class="text-2xl">👤</span> Buyer Info
          </h5>
          <ul class="text-base space-y-1 text-gray-300">
            <li><span class="text-cyan-300 font-medium">Name:</span> <?php echo $row["U_Name"] ?></li>
            <li><span class="text-cyan-300 font-medium">Email:</span> <?php echo $row["U_Email"] ?></li>
            <li><span class="text-cyan-300 font-medium">Phone:</span> <?php echo $row["U_Phone"] ?></li>
            <li><span class="text-cyan-300 font-medium">Payment:</span> <?php echo $row["U_Payment"] ?></li>
            <li><span class="text-cyan-300 font-medium">Message:</span> <?php echo $row["U_Message"] ?></li>
          </ul>
        </div>

        <!-- Buttons -->
        <div class="relative z-10 mt-4">
          <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <a href="OrderEdit.php?id=<?php echo $orderId ?>"
               class="px-4 py-2 rounded-md text-cyan-400 border border-cyan-400 hover:bg-cyan-500 hover:text-white transition shadow-md">
              ✏️ Edit
            </a>
            <button onclick="confirmCancel(<?php echo $orderId ?>)"
               class="px-4 py-2 rounded-md text-red-400 border border-red-400 hover:bg-red-500 hover:text-white transition shadow-md">
              🗑️ Cancel
            </button>
          </div>
        </div>

      </div>
      <?php $index++; } ?>
    </div>
  </div>
</div>

<!-- AOS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>

<!-- Countdown -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[id^='timer_']").forEach(timer => {
      const startTime = parseInt(timer.dataset.start) * 1000;
      const endTime = startTime + 48 * 60 * 60 * 1000;

      const update = () => {
        const now = new Date().getTime();
        const remaining = endTime - now;

        if (remaining <= 0) {
          const card = timer.closest(".group");
          if (card) card.remove();
          return;
        }

        const h = String(Math.floor(remaining / (1000 * 60 * 60))).padStart(2, '0');
        const m = String(Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
        const s = String(Math.floor((remaining % (1000 * 60)) / 1000)).padStart(2, '0');

        timer.textContent = `${h}:${m}:${s}`;
      };

      update();
      setInterval(update, 1000);
    });
  });
</script>

<!-- SweetAlert2 Confirmation -->
<script>
  function confirmCancel(orderId) {
    Swal.fire({
      title: 'Cancel this Order?',
      html: `
        <div style="font-family: 'Poppins', sans-serif; font-size: 16px; color: #4b5563;">
          This action <strong>cannot be undone</strong>.<br>
          Are you sure you want to cancel this order?
        </div>
      `,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Cancel it',
      cancelButtonText: 'No, Keep it',
      background: '#ffffff',
      width: 400,
      customClass: {
        popup: 'rounded-xl shadow-lg border border-slate-200',
        title: 'text-lg font-semibold text-gray-800',
        confirmButton: 'swal2-confirm-button',
        cancelButton: 'swal2-cancel-button'
      },
      buttonsStyling: false
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "OrderCancel.php?id=" + orderId;
      }
    });
  }
</script>

<style>
  .swal2-confirm-button {
    background-color: #e11d48;
    color: white;
    padding: 10px 20px;
    border-radius: 0.5rem;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    border: none;
    margin: 10px 5px 0;
    transition: background 0.3s ease;
  }

  .swal2-confirm-button:hover {
    background-color: #be123c;
  }

  .swal2-cancel-button {
    background-color: #f1f5f9;
    color: #1f2937;
    padding: 10px 20px;
    border-radius: 0.5rem;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    border: none;
    margin: 10px 5px 0;
    transition: background 0.3s ease;
  }

  .swal2-cancel-button:hover {
    background-color: #e2e8f0;
  }
</style>

</body>
</html>
