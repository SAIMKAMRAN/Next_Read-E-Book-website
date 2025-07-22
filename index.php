<?php 
include("navbar.php")
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EbookStore - Unlock a World of Knowledge</title>
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
                "0%": { opacity: "0", transform: "translateY(20px)" },
                "100%": { opacity: "1", transform: "translateY(0)" },
              },
              bounceDown: {
                "0%, 100%": { transform: "translateY(-10px)" },
                "50%": { transform: "translateY(0)" },
              },
            },
            animation: {
              fadeInUp: "fadeInUp 0.6s ease-out forwards",
              bounceDown: "bounceDown 1.5s infinite ease-in-out",
            },
          },
        },
      };
    </script>
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
  </head>
  <body class="bg-gunmetal text-light-grayish-white min-h-screen flex flex-col">
    <!-- Header -->
    <header
      class="bg-gunmetal text-light-grayish-white py-4 px-6 flex items-center justify-between shadow-md animate-fadeInUp"
    >
      <div class="flex items-center gap-2">
        <img
          src="https://img.freepik.com/free-vector/bike-guy-wattpad-book-cover_23-2149452163.jpg?t=st=1752922123~exp=1752925723~hmac=c218edd506e9503b891252c059ddf51a4c5a755f9dbe23c390f7588759bb663e&w=826"
          width="24"
          height="24"
          alt="EbookStore Logo"
          class="invert"
        />
        <span class="font-semibold text-lg">EbookStore</span>
      </div>
      <nav class="hidden md:flex items-center gap-6">
        <a
          href="index.html"
          class="hover:text-light-blue-tint transition-colors duration-300"
          >Home</a
        >
        <a
          href="about.php"
          class="hover:text-light-blue-tint transition-colors duration-300"
          >About</a
        >
      </nav>
      <button
        class="bg-primary-blue text-white px-6 py-2 rounded-md hover:bg-light-blue-tint transition-colors duration-300"
      >
        Buy now
      </button>
    </header>

    <main class="flex-grow">
      <!-- Hero Section -->
      <section
        class="bg-light-grayish-white text-gunmetal py-20 md:py-32 text-center overflow-hidden relative"
      >
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
          <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-primary-blue/5 rounded-full blur-3xl animate-pulse"
          ></div>
          <div
            class="absolute -bottom-40 -left-40 w-96 h-96 bg-grayish-blue/5 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s"
          ></div>
          <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary-blue/3 rounded-full blur-2xl animate-bounce"
            style="animation-duration: 6s"
          ></div>
        </div>

        <div class="container mx-auto px-4 max-w-4xl relative z-10">
          <!-- Version Badge with Modern Design -->
          <div class="animate-fadeInUp" style="animation-delay: 0.1s">
            <span
              class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm text-primary-blue font-semibold text-sm px-4 py-2 rounded-full shadow-lg border border-primary-blue/20 hover:shadow-xl hover:scale-105 transition-all duration-300"
            >
              <div
                class="w-2 h-2 bg-primary-blue rounded-full animate-pulse"
              ></div>
              VERSION 1.0
              <div
                class="w-2 h-2 bg-primary-blue rounded-full animate-pulse"
                style="animation-delay: 0.5s"
              ></div>
            </span>
          </div>

          <!-- Main Heading with Gradient Text -->
          <h1
            class="text-4xl md:text-6xl font-bold leading-tight mb-6 animate-fadeInUp bg-gradient-to-r from-gunmetal via-primary-blue to-gunmetal bg-clip-text text-transparent bg-300 animate-gradient-x"
            style="animation-delay: 0.2s"
          >
            Unlock a World of Knowledge with Our Ebooks!
          </h1>

          <!-- Subtitle with enhanced styling -->
          <p
            class="text-grayish-blue text-lg md:text-xl mb-10 max-w-2xl mx-auto animate-fadeInUp leading-relaxed"
            style="animation-delay: 0.3s"
          >
            Dive into our curated collection of
            <span class="text-primary-blue font-semibold"
              >high-quality digital books</span
            >, covering a vast array of topics from captivating fiction to
            insightful non-fiction.
            <span class="relative inline-block">
              Start your reading journey today!
              <div
                class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-primary-blue to-transparent animate-pulse"
              ></div>
            </span>
          </p>

          <!-- Enhanced Feature Grid -->
          <div
            class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16 max-w-3xl mx-auto"
          >
            <div
              class="group bg-white/60 backdrop-blur-sm rounded-2xl p-4 shadow-lg hover:shadow-xl hover:bg-white/80 transition-all duration-500 animate-fadeInUp border border-primary-blue/10 hover:border-primary-blue/30 hover:-translate-y-2"
              style="animation-delay: 0.4s"
            >
              <div class="flex flex-col items-center gap-2">
                <div
                  class="bg-primary-blue/10 p-3 rounded-full group-hover:bg-primary-blue/20 transition-colors duration-300 group-hover:scale-110 transform"
                >
                  <i
                    data-lucide="download"
                    class="w-5 h-5 text-primary-blue"
                  ></i>
                </div>
                <span
                  class="text-sm font-medium group-hover:text-primary-blue transition-colors"
                  >Instant Download</span
                >
              </div>
            </div>

            <div
              class="group bg-white/60 backdrop-blur-sm rounded-2xl p-4 shadow-lg hover:shadow-xl hover:bg-white/80 transition-all duration-500 animate-fadeInUp border border-primary-blue/10 hover:border-primary-blue/30 hover:-translate-y-2"
              style="animation-delay: 0.5s"
            >
              <div class="flex flex-col items-center gap-2">
                <div
                  class="bg-primary-blue/10 p-3 rounded-full group-hover:bg-primary-blue/20 transition-colors duration-300 group-hover:scale-110 transform"
                >
                  <i
                    data-lucide="smartphone"
                    class="w-5 h-5 text-primary-blue"
                  ></i>
                </div>
                <span
                  class="text-sm font-medium group-hover:text-primary-blue transition-colors"
                  >Read Anywhere</span
                >
              </div>
            </div>

            <div
              class="group bg-white/60 backdrop-blur-sm rounded-2xl p-4 shadow-lg hover:shadow-xl hover:bg-white/80 transition-all duration-500 animate-fadeInUp border border-primary-blue/10 hover:border-primary-blue/30 hover:-translate-y-2"
              style="animation-delay: 0.6s"
            >
              <div class="flex flex-col items-center gap-2">
                <div
                  class="bg-primary-blue/10 p-3 rounded-full group-hover:bg-primary-blue/20 transition-colors duration-300 group-hover:scale-110 transform"
                >
                  <i
                    data-lucide="shield-check"
                    class="w-5 h-5 text-primary-blue"
                  ></i>
                </div>
                <span
                  class="text-sm font-medium group-hover:text-primary-blue transition-colors"
                  >Secure Payments</span
                >
              </div>
            </div>

            <div
              class="group bg-white/60 backdrop-blur-sm rounded-2xl p-4 shadow-lg hover:shadow-xl hover:bg-white/80 transition-all duration-500 animate-fadeInUp border border-primary-blue/10 hover:border-primary-blue/30 hover:-translate-y-2"
              style="animation-delay: 0.7s"
            >
              <div class="flex flex-col items-center gap-2">
                <div
                  class="bg-primary-blue/10 p-3 rounded-full group-hover:bg-primary-blue/20 transition-colors duration-300 group-hover:scale-110 transform"
                >
                  <i data-lucide="star" class="w-5 h-5 text-primary-blue"></i>
                </div>
                <span
                  class="text-sm font-medium group-hover:text-primary-blue transition-colors"
                  >Expert Curated</span
                >
              </div>
            </div>
          </div>

          <!-- CTA Buttons -->
          <div
            class="flex flex-col sm:flex-row gap-4 justify-center mb-16 animate-fadeInUp"
            style="animation-delay: 0.8s"
          >
            <button
              class="group bg-primary-blue hover:bg-primary-blue/90 text-white font-semibold px-8 py-4 rounded-2xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 flex items-center justify-center gap-2 min-w-[200px]"
            >
              <i
                data-lucide="book-open"
                class="w-5 h-5 group-hover:rotate-12 transition-transform"
              ></i>
              Explore Library
              <div
                class="absolute inset-0 bg-white/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity blur"
              ></div>
            </button>
            <button
              class="group bg-white/80 backdrop-blur hover:bg-white text-gunmetal font-semibold px-8 py-4 rounded-2xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 flex items-center justify-center gap-2 border border-primary-blue/20 hover:border-primary-blue/40 min-w-[200px]"
            >
              <i
                data-lucide="play-circle"
                class="w-5 h-5 group-hover:scale-110 transition-transform text-primary-blue"
              ></i>
              Watch Demo
            </button>
          </div>

          <!-- Enhanced Scroll Indicator -->
          <div class="flex justify-center animate-bounceDown">
            <div class="relative group cursor-pointer" onclick="scrollToNext()">
              <div
                class="absolute inset-0 bg-primary-blue/20 rounded-full blur-md group-hover:blur-lg transition-all"
              ></div>
              <div
                class="relative bg-white/80 backdrop-blur rounded-full p-3 shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300 border border-primary-blue/30"
              >
                <i
                  data-lucide="chevron-down"
                  class="w-6 h-6 text-primary-blue group-hover:animate-bounce"
                ></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Floating Elements -->
        <div
          class="absolute top-1/4 left-10 w-4 h-4 bg-primary-blue/30 rounded-full animate-ping"
          style="animation-delay: 2s"
        ></div>
        <div
          class="absolute top-1/3 right-16 w-3 h-3 bg-grayish-blue/40 rounded-full animate-ping"
          style="animation-delay: 3s"
        ></div>
        <div
          class="absolute bottom-1/4 left-20 w-2 h-2 bg-primary-blue/50 rounded-full animate-ping"
          style="animation-delay: 4s"
        ></div>
      </section>

      <!-- Demo Contents Section -->
      <section
        id="demo-contents"
        class="bg-light-grayish-white text-gunmetal py-20 md:py-32 text-center overflow-hidden"
      >
        <div class="container mx-auto px-4">
          <h2
            class="text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent"
          >
            Explore Our Featured Ebooks
          </h2>
          <p class="text-grayish-blue text-lg mb-12 max-w-2xl mx-auto">
            Discover popular titles and new releases across various genres. Find
            your next great read with ease.
          </p>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div
              class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 animate-fadeInUp hover:transform hover:scale-105 transition-all duration-300 relative group"
            >
              <!-- Like Button -->
              <button
                class="absolute top-4 right-4 z-10 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg hover:bg-white transition-all duration-300"
                onclick="toggleLike(this)"
              >
                <svg
                  class="w-5 h-5 text-gray-400 hover:text-red-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  ></path>
                </svg>
              </button>

              <!-- Badge -->
              <div class="absolute top-4 left-4 z-10">
                <span
                  class="bg-gradient-to-r from-green-400 to-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg"
                  >NEW</span
                >
              </div>

              <div class="relative overflow-hidden">
                <img
                  src="https://img.freepik.com/free-vector/bike-guy-wattpad-book-cover_23-2149452163.jpg?t=st=1752922123~exp=1752925723~hmac=c218edd506e9503b891252c059ddf51a4c5a755f9dbe23c390f7588759bb663e&w=826"
                  width="300"
                  height="400"
                  alt="Ebook Preview 1"
                  class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300"
                />
              </div>

              <div class="p-6">
                <!-- Rating -->
                <div class="flex items-center justify-between mb-3">
                  <div class="flex items-center space-x-1">
                    <div class="flex text-yellow-400">★★★★★</div>
                    <span class="text-sm text-gray-600 ml-1">(4.8)</span>
                  </div>
                  <span
                    class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded-full font-medium"
                    >Adventure</span
                  >
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">
                  The Ultimate Cycling Adventure
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                  Discover breathtaking routes and cycling techniques for the
                  modern adventurer.
                </p>

                <!-- Price -->
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center space-x-2">
                    <span class="text-2xl font-bold text-gray-900">$12.99</span>
                    <span class="text-sm text-gray-500 line-through"
                      >$19.99</span
                    >
                  </div>
                  <span
                    class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded-full"
                    >35% OFF</span
                  >
                </div>

                <!-- Buttons -->
                <div class="flex space-x-2">
                  <button
                    class="flex-1 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                    onclick="addToCart('The Ultimate Cycling Adventure', '$12.99')"
                  >
                    🛒 Add to Cart
                  </button>
                  <button
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-4 rounded-xl transition-all duration-300"
                  >
                    👁️
                  </button>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div
              class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 animate-fadeInUp hover:transform hover:scale-105 transition-all duration-300 relative group"
              style="animation-delay: 0.1s"
            >
              <!-- Like Button -->
              <button
                class="absolute top-4 right-4 z-10 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg hover:bg-white transition-all duration-300"
                onclick="toggleLike(this)"
              >
                <svg
                  class="w-5 h-5 text-gray-400 hover:text-red-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  ></path>
                </svg>
              </button>

              <!-- Badge -->
              <div class="absolute top-4 left-4 z-10">
                <span
                  class="bg-gradient-to-r from-orange-400 to-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg"
                  >BESTSELLER</span
                >
              </div>

              <div class="relative overflow-hidden">
                <img
                  src="https://img.freepik.com/free-psd/book-flight-poster-template_23-2148948032.jpg?t=st=1752922093~exp=1752925693~hmac=7feca4d36f47da52475ad759e83fb7f6379e9945591f95e923f25e47a9ce0cd4&w=740"
                  width="300"
                  height="400"
                  alt="Ebook Preview 2"
                  class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300"
                />
              </div>

              <div class="p-6">
                <!-- Rating -->
                <div class="flex items-center justify-between mb-3">
                  <div class="flex items-center space-x-1">
                    <div class="flex text-yellow-400">★★★★★</div>
                    <span class="text-sm text-gray-600 ml-1">(4.9)</span>
                  </div>
                  <span
                    class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium"
                    >Travel</span
                  >
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">
                  Flight Destinations Guide
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                  Explore the world's most amazing destinations with insider
                  travel tips.
                </p>

                <!-- Price -->
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center space-x-2">
                    <span class="text-2xl font-bold text-gray-900">$15.99</span>
                    <span class="text-sm text-gray-500 line-through"
                      >$24.99</span
                    >
                  </div>
                  <span
                    class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded-full"
                    >36% OFF</span
                  >
                </div>

                <!-- Buttons -->
                <div class="flex space-x-2">
                  <button
                    class="flex-1 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                    onclick="addToCart('Flight Destinations Guide', '$15.99')"
                  >
                    🛒 Add to Cart
                  </button>
                  <button
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-4 rounded-xl transition-all duration-300"
                  >
                    👁️
                  </button>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div
              class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 animate-fadeInUp hover:transform hover:scale-105 transition-all duration-300 relative group"
              style="animation-delay: 0.2s"
            >
              <!-- Like Button -->
              <button
                class="absolute top-4 right-4 z-10 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg hover:bg-white transition-all duration-300"
                onclick="toggleLike(this)"
              >
                <svg
                  class="w-5 h-5 text-gray-400 hover:text-red-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  ></path>
                </svg>
              </button>

              <!-- Badge -->
              <div class="absolute top-4 left-4 z-10">
                <span
                  class="bg-gradient-to-r from-pink-400 to-purple-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg"
                  >FEATURED</span
                >
              </div>

              <div class="relative overflow-hidden">
                <img
                  src="https://img.freepik.com/premium-psd/book-cover-mockup_528542-2494.jpg?ga=GA1.1.547705516.1726225839&semt=ais_hybrid&w=740"
                  width="300"
                  height="400"
                  alt="Ebook Preview 3"
                  class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300"
                />
              </div>

              <div class="p-6">
                <!-- Rating -->
                <div class="flex items-center justify-between mb-3">
                  <div class="flex items-center space-x-1">
                    <div class="flex text-yellow-400">★★★★☆</div>
                    <span class="text-sm text-gray-600 ml-1">(4.6)</span>
                  </div>
                  <span
                    class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full font-medium"
                    >Fiction</span
                  >
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">
                  Modern Literature Collection
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                  A curated collection of contemporary stories that captivate
                  the soul.
                </p>

                <!-- Price -->
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center space-x-2">
                    <span class="text-2xl font-bold text-gray-900">$18.99</span>
                    <span class="text-sm text-gray-500 line-through"
                      >$29.99</span
                    >
                  </div>
                  <span
                    class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded-full"
                    >37% OFF</span
                  >
                </div>

                <!-- Buttons -->
                <div class="flex space-x-2">
                  <button
                    class="flex-1 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5"
                    onclick="addToCart('Modern Literature Collection', '$18.99')"
                  >
                    🛒 Add to Cart
                  </button>
                  <button
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-4 rounded-xl transition-all duration-300"
                  >
                    👁️
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Products Section -->
      <section
        id="products-section"
        class="bg-light-grayish-white text-gunmetal py-20 md:py-32 overflow-hidden"
      >
        <div class="container mx-auto px-4 text-center">
          <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Latest Ebooks</h2>
          <p class="text-grayish-blue text-lg mb-12 max-w-2xl mx-auto">
            Discover our curated collection of digital books on various topics.
          </p>
          <div
            id="product-grid"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
          >
            <!-- Products will be injected here by JavaScript -->
          </div>
        </div>
      </section>

     <!-- Features Section -->
<section id="features-section" class="bg-light-grayish-white text-gunmetal py-20 md:py-32 overflow-hidden">
  <div class="container mx-auto px-4">
    <!-- Header -->
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold mb-4 relative inline-block">
        Why Choose Our Ebooks?
        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-primary-blue rounded-full"></div>
      </h2>
      <p class="text-grayish-blue text-lg max-w-2xl mx-auto leading-relaxed">
        We are committed to providing you with the best reading experience
        and a diverse selection of high-quality digital books.
      </p>
    </div>

    <!-- Features Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
      
      <!-- Feature 1 -->
      <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-blue/20 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp">
        <div class="flex flex-col items-center text-center">
          <div class="w-16 h-16 bg-gradient-to-br from-primary-blue/10 to-primary-blue/5 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
            <i data-lucide="zap" class="w-8 h-8 text-primary-blue"></i>
          </div>
          <h3 class="text-xl font-semibold mb-3 group-hover:text-primary-blue transition-colors">Instant Access</h3>
          <p class="text-grayish-blue leading-relaxed text-sm">
            Get your books immediately after purchase, no waiting required.
          </p>
        </div>
      </div>

      <!-- Feature 2 -->
      <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-blue/20 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: 0.1s">
        <div class="flex flex-col items-center text-center">
          <div class="w-16 h-16 bg-gradient-to-br from-primary-blue/10 to-primary-blue/5 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
            <i data-lucide="monitor-smartphone" class="w-8 h-8 text-primary-blue"></i>
          </div>
          <h3 class="text-xl font-semibold mb-3 group-hover:text-primary-blue transition-colors">Multi-Device Reading</h3>
          <p class="text-grayish-blue leading-relaxed text-sm">
            Read seamlessly on your phone, tablet, or computer with cloud sync.
          </p>
        </div>
      </div>

      <!-- Feature 3 -->
      <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-blue/20 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: 0.2s">
        <div class="flex flex-col items-center text-center">
          <div class="w-16 h-16 bg-gradient-to-br from-primary-blue/10 to-primary-blue/5 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
            <i data-lucide="shield-check" class="w-8 h-8 text-primary-blue"></i>
          </div>
          <h3 class="text-xl font-semibold mb-3 group-hover:text-primary-blue transition-colors">Secure & Easy Checkout</h3>
          <p class="text-grayish-blue leading-relaxed text-sm">
            A smooth and safe purchasing process with trusted payment options.
          </p>
        </div>
      </div>

      <!-- Feature 4 -->
      <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-blue/20 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: 0.3s">
        <div class="flex flex-col items-center text-center">
          <div class="w-16 h-16 bg-gradient-to-br from-primary-blue/10 to-primary-blue/5 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
            <i data-lucide="crown" class="w-8 h-8 text-primary-blue"></i>
          </div>
          <h3 class="text-xl font-semibold mb-3 group-hover:text-primary-blue transition-colors">Exclusive Content</h3>
          <p class="text-grayish-blue leading-relaxed text-sm">
            Access unique titles, author interviews, and bonus materials.
          </p>
        </div>
      </div>

      <!-- Feature 5 -->
      <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-blue/20 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: 0.4s">
        <div class="flex flex-col items-center text-center">
          <div class="w-16 h-16 bg-gradient-to-br from-primary-blue/10 to-primary-blue/5 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
            <i data-lucide="paintbrush" class="w-8 h-8 text-primary-blue"></i>
          </div>
          <h3 class="text-xl font-semibold mb-3 group-hover:text-primary-blue transition-colors">Beautifully Formatted</h3>
          <p class="text-grayish-blue leading-relaxed text-sm">
            Enjoy a pleasant reading experience with professional layouts and typography.
          </p>
        </div>
      </div>

      <!-- Feature 6 -->
      <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-primary-blue/20 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: 0.5s">
        <div class="flex flex-col items-center text-center">
          <div class="w-16 h-16 bg-gradient-to-br from-primary-blue/10 to-primary-blue/5 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
            <i data-lucide="file-check" class="w-8 h-8 text-primary-blue"></i>
          </div>
          <h3 class="text-xl font-semibold mb-3 group-hover:text-primary-blue transition-colors">High-Quality Files</h3>
          <p class="text-grayish-blue leading-relaxed text-sm">
            Receive crisp, clear ebook files optimized for various readers.
          </p>
        </div>
      </div>

    </div>

    <!-- Bottom CTA -->
    <div class="text-center mt-16">
      <div class="inline-flex items-center gap-2 text-primary-blue font-medium">
        <span>Ready to start reading?</span>
        <i data-lucide="arrow-right" class="w-4 h-4 animate-pulse"></i>
      </div>
    </div>
  </div>
</section>
      <section id="testimonials-section" class="py-20 md:py-32">
        <div class="container mx-auto px-4 text-center">
            <div class="mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gradient">
                    What Our Users Say
                </h2>
                <p class="text-gray-600 text-lg md:text-xl mb-4 max-w-2xl mx-auto leading-relaxed">
                    Hear from people who found their ideal telecom solutions with FiberSolution's guidance.
                </p>
                <div class="flex justify-center items-center gap-2 mb-8">
                    <div class="flex">
                        <span class="text-yellow-400 text-2xl">★</span>
                        <span class="text-yellow-400 text-2xl">★</span>
                        <span class="text-yellow-400 text-2xl">★</span>
                        <span class="text-yellow-400 text-2xl">★</span>
                        <span class="text-yellow-400 text-2xl">★</span>
                    </div>
                    <span class="text-gray-600 ml-2 font-medium">4.9/5 from 2,847 reviews</span>
                </div>
            </div>
            
            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                    <div class="flex mb-4">
                        <span class="text-yellow-400 text-lg">★★★★★</span>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg leading-relaxed italic">
                        "I'm not great with tech stuff, but FiberSolution helped me figure out the best internet plan for my house without the usual headache. Everything was explained in plain English!"
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            C
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-gray-800">Carlos D.</p>
                            <p class="text-gray-500 text-sm">Homeowner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                    <div class="flex mb-4">
                        <span class="text-yellow-400 text-lg">★★★★★</span>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg leading-relaxed italic">
                        "I just moved and had no clue which provider worked best here. FiberSolution showed me options in minutes, and even pointed out which ones had hidden fees. Honestly saved me hours of frustration."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            E
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-gray-800">Emily T.</p>
                            <p class="text-gray-500 text-sm">New Resident</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                    <div class="flex mb-4">
                        <span class="text-yellow-400 text-lg">★★★★★</span>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg leading-relaxed italic">
                        "Finally found a service that explains fiber internet in terms I can understand! No more confusing technical jargon. They helped me get the perfect plan for my home office."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            J
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-gray-800">Jason R.</p>
                            <p class="text-gray-500 text-sm">Remote Worker</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                    <div class="flex mb-4">
                        <span class="text-yellow-400 text-lg">★★★★★</span>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg leading-relaxed italic">
                        "Switching internet providers used to be such a nightmare. FiberSolution made it simple and stress-free. They even helped me negotiate a better deal!"
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            M
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-gray-800">Maria S.</p>
                            <p class="text-gray-500 text-sm">Small Business Owner</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                    <div class="flex mb-4">
                        <span class="text-yellow-400 text-lg">★★★★★</span>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg leading-relaxed italic">
                        "The comparison tools are fantastic! I could see all the providers in my area side-by-side with real pricing. No more calling around or dealing with pushy salespeople."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-rose-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            T
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-gray-800">Tom W.</p>
                            <p class="text-gray-500 text-sm">IT Professional</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 6 -->
                <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                    <div class="flex mb-4">
                        <span class="text-yellow-400 text-lg">★★★★★</span>
                    </div>
                    <p class="text-gray-700 mb-6 text-lg leading-relaxed italic">
                        "Customer support was incredible when I had questions about fiber installation. They walked me through everything and made sure I got connected quickly."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            A
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-gray-800">Alex K.</p>
                            <p class="text-gray-500 text-sm">Tech Enthusiast</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Call to action -->
            <div class="mt-16">
                <p class="text-gray-600 mb-6">Join thousands of satisfied customers today</p>
                <button class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-4 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                    Get Connected Today
                </button>
            </div>
        </div>
    </section>

      <!-- CTA Section -->
      <section
        class="bg-light-grayish-white text-gunmetal py-20 md:py-32 text-center overflow-hidden"
      >
        <div class="container mx-auto px-4 max-w-3xl">
          <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-6">
            Ready to Dive into Your Next Story?
          </h2>
          <p class="text-grayish-blue text-lg md:text-xl mb-10">
            Browse our extensive library and find the perfect ebook to inspire,
            entertain, or educate you.
          </p>
          <button
            class="bg-primary-blue text-white px-8 py-4 rounded-md text-lg font-semibold hover:bg-light-blue-tint transition-colors duration-300"
          >
            Start Exploring Ebooks
          </button>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer
      class="bg-gunmetal text-light-grayish-white py-10 px-6 text-center animate-fadeInUp"
    >
      <div class="container mx-auto">
        <div class="flex justify-center space-x-6 mb-6">
          <a
            href="#"
            class="hover:text-light-blue-tint transition-colors duration-300"
          >
            <i data-lucide="facebook" class="w-6 h-6"></i>
            <span class="sr-only">Facebook</span>
          </a>
          <a
            href="#"
            class="hover:text-light-blue-tint transition-colors duration-300"
          >
            <i data-lucide="twitter" class="w-6 h-6"></i>
            <span class="sr-only">Twitter</span>
          </a>
          <a
            href="#"
            class="hover:text-light-blue-tint transition-colors duration-300"
          >
            <i data-lucide="instagram" class="w-6 h-6"></i>
            <span class="sr-only">Instagram</span>
          </a>
          <a
            href="#"
            class="hover:text-light-blue-tint transition-colors duration-300"
          >
            <i data-lucide="linkedin" class="w-6 h-6"></i>
            <span class="sr-only">LinkedIn</span>
          </a>
        </div>
        <p class="text-sm text-grayish-blue">
          &copy; <span id="current-year"></span> EbookStore. All rights
          reserved.
        </p>
      </div>
    </footer>

    <!-- Toast Notification Container -->
    <div
      id="toast-container"
      class="fixed bottom-4 right-4 z-50 space-y-2"
    ></div>

    <script src="main.js"></script>
  </body>
</html>
