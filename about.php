
<?php include("navbar.php")  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EbookStore</title>
    <!-- Tailwind CSS CDN - For quick preview. For production, use local build. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Tailwind config for CDN to include custom colors and animations
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gunmetal: "#0F172A",
                        "light-grayish-white": "#F1F5F9",
                        "dark-slate-blue": "#1E293B",
                        "light-blue-tint": "#60A5FA",
                        "primary-blue": "#3B82F6",
                        "grayish-blue": "#94A3B8",
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                    animation: {
                        fadeInUp: 'fadeInUp 0.6s ease-out forwards',
                    },
                }
            }
        }
    </script>
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gunmetal text-light-grayish-white min-h-screen flex flex-col">

   
    <main class="flex-grow py-20 md:py-32">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fadeInUp">
                About Our Ebook Platform
            </h1>
            <p class="text-lg md:text-xl text-grayish-blue mb-8 animate-fadeInUp" style="animation-delay: 0.1s;">
                We are passionate about connecting readers with high-quality digital books from diverse authors. Our
                platform is built to provide a seamless and enjoyable experience for discovering, purchasing, and reading
                your next favorite ebook.
            </p>
            <div class="mb-12 animate-fadeInUp" style="animation-delay: 0.2s;">
                <img src="images/aboutebook.jpg" width="800" height="400" alt="About Us Image" class="rounded-lg shadow-lg mx-auto">
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fadeInUp" style="animation-delay: 0.3s;">
                Our Mission
            </h2>
            <p class="text-lg text-grayish-blue mb-8 animate-fadeInUp" style="animation-delay: 0.4s;">
                Our mission is to make knowledge and entertainment accessible to everyone, everywhere. We strive to offer a
                vast and diverse collection of ebooks, ensuring a smooth and secure reading journey for all our users.
            </p>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 animate-fadeInUp" style="animation-delay: 0.5s;">
                Why Choose Us?
            </h2>
            <ul class="list-disc list-inside text-left text-lg text-grayish-blue space-y-2 mx-auto max-w-2xl">
                <li class="animate-fadeInUp" style="animation-delay: 0.6s;">
                    Curated Selection: Hand-picked titles across all genres and topics.
                </li>
                <li class="animate-fadeInUp" style="animation-delay: 0.7s;">Instant Downloads: Get your books immediately after purchase.</li>
                <li class="animate-fadeInUp" style="animation-delay: 0.8s;">Read Anywhere: Enjoy your ebooks seamlessly on any device.</li>
                <li class="animate-fadeInUp" style="animation-delay: 0.9s;">
                    Secure & Easy Payments: A hassle-free and safe checkout experience.
                </li>
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gunmetal text-light-grayish-white py-10 px-6 text-center animate-fadeInUp">
        <div class="container mx-auto">
            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="hover:text-light-blue-tint transition-colors duration-300">
                    <i data-lucide="facebook" class="w-6 h-6"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="#" class="hover:text-light-blue-tint transition-colors duration-300">
                    <i data-lucide="twitter" class="w-6 h-6"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="#" class="hover:text-light-blue-tint transition-colors duration-300">
                    <i data-lucide="instagram" class="w-6 h-6"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="#" class="hover:text-light-blue-tint transition-colors duration-300">
                    <i data-lucide="linkedin" class="w-6 h-6"></i>
                    <span class="sr-only">LinkedIn</span>
                </a>
            </div>
            <p class="text-sm text-grayish-blue">&copy; <span id="current-year-about"></span> EbookStore. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons on this page too
        lucide.createIcons();
        // Set current year for footer
        document.getElementById('current-year-about').textContent = new Date().getFullYear();
    </script>
</body>
</html>
