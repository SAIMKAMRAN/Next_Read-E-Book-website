
<?php include("navbar.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form with Popup</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="contact.css">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>





<body>
  <section class="contact">
    <div class="content">
      <h2>Contact Us</h2>
      <p>
Have questions about our eBooks, payments, or downloads? We’re here to help!  
Whether you're facing a technical issue, want to give feedback, or need a custom solution, feel free to reach out.
Our team usually replies within 24 hours.
</p>

    </div>

    <div class="container">
      <div class="contactInfo">
        <div class="box">
          <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
          <div class="text">
            <h3>Address</h3>
            <p>E-Books HQ, Plot #45, Gulberg,<br> Lahore, Pakistan
</p>
          </div>
        </div>

        <div class="box">
          <div class="icon"><i class="fa-solid fa-phone"></i></div>
          <div class="text">
            <h3>Phone</h3>
            <p>+92 312 1234567 <br>
              (Mon–Fri, 9AM to 6PM)
            </p>
          </div>
        </div>

        <div class="box">
          <div class="icon"><i class="fa-solid fa-envelope"></i></div>
          <div class="text">
            <h3>Email</h3>
            <p>YoursE-Books@Gmail.com</p>
          </div>
        </div>

        <h2 class="txt">Connect With Us</h2>
        <ul class="sci">
          <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
          <li><a href=""><i class="fa-brands fa-x-twitter"></i></a></li>
          <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
        </ul>
      </div>

      <div class="contactForm">
        <form id="contactForm">
          <h2>Send Message</h2>

          <div class="inputBox">
            <input type="text" required="required" name="fullname">
            <span>Full Name</span>
          </div>

          <div class="inputBox">
            <input type="email" required="required" name="email">
            <span>Email</span>
          </div>

          <div class="inputBox">
            <textarea name="message" required="required"></textarea>
            <span>Type Your Message..</span>
          </div>

          <div class="inputBox">
            <input type="submit" value="Send">
          </div>
        </form>
      </div>
    </div>
  </section>

  <script>
    // Custom success popup with colored background and black tick icon
    document.getElementById("contactForm").addEventListener("submit", function (e) {
      e.preventDefault(); // Stop real form submission

      Swal.fire({
        title: 'Message Sent!',
        text: 'Your message has been submitted successfully.',
        background: '#01dbc2',
        color: '#000000',
        showConfirmButton: false,
        timer: 2000,
        backdrop: `rgba(0,0,0,0.3)`,

        imageUrl: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
          <svg width="60" height="60" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
            <circle cx="65" cy="65" r="60" fill="white" stroke="black" stroke-width="10"/>
            <path d="M40 70 L58 88 L90 48" stroke="black" stroke-width="10" fill="none" stroke-linecap="round"/>
          </svg>
        `),
        imageWidth: 60,
        imageHeight: 60
      });

      this.reset(); // Optional: clear the form
    });
  </script>
</body>

</html>