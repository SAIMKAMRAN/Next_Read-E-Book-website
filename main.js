const lucide = window.lucide // Declare the lucide variable

// Initialize Lucide icons on page load
document.addEventListener("DOMContentLoaded", () => {
  lucide.createIcons()
})

// Set current year for footer
document.addEventListener("DOMContentLoaded", () => {
  const currentYearElement = document.getElementById("current-year")
  if (currentYearElement) {
    currentYearElement.textContent = new Date().getFullYear()
  }
  const currentYearAboutElement = document.getElementById("current-year-about")
  if (currentYearAboutElement) {
    currentYearAboutElement.textContent = new Date().getFullYear()
  }
})

// --- Product Data ---
const products = [
  {
    id: 1,
    name: "The Future of AI",
    price: "$29.99",
    image: "https://images.unsplash.com/photo-1628988253393-67a6293ea2f1?q=80&w=580&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    description: "Explore the groundbreaking advancements and ethical considerations of artificial intelligence.",
  },
  {
    id: 2,
    name: "Mastering JavaScript",
    price: "$39.99",
    image: "https://images.unsplash.com/photo-1672928115439-4dcaabbedfd3?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    description: "A comprehensive guide to building powerful and efficient web applications with JavaScript.",
  },
  {
    id: 3,
    name: "Healthy Eating Guide",
    price: "$19.99",
    image: "https://images.unsplash.com/photo-1714146999438-45e2c6cd4f7c?q=80&w=394&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    description: "Transform your diet and lifestyle with delicious recipes and practical nutrition advice.",
  },
  {
    id: 4,
    name: "Digital Marketing Secrets",
    price: "$49.99",
    image: "https://images.unsplash.com/photo-1718353097583-8ca64c8f7c94?q=80&w=437&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    description: "Uncover the strategies to boost your online presence and grow your business.",
  },
];


// --- Testimonial Data ---
const testimonials = [
  {
    name: "Sarah L.",
    role: "Avid Reader",
    avatar: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    quote:
      "This platform made finding my next favorite book so easy! The selection is incredible, and the download process was a breeze.",
    rating: 5,
  },
  {
    name: "David M.",
    role: "Student",
    avatar: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    quote:
      "I've found so many hidden gems here. The quality of the ebooks is consistently high, and I love being able to read on any device.",
    rating: 5,
  },
  {
    name: "Jessica T.",
    role: "Book Enthusiast",
    avatar: "https://images.unsplash.com/photo-1601745398440-0118cf2a433f?q=80&w=354&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    quote:
      "A fantastic resource for digital books. The user experience is smooth, and I appreciate the diverse range of topics available.",
    rating: 4,
  },
]

// --- Toast Notification Functionality ---
const toastContainer = document.getElementById("toast-container")

function showToast(title, description) {
  const toastElement = document.createElement("div")
  toastElement.className =
    "bg-gunmetal text-light-grayish-white p-4 rounded-lg shadow-lg opacity-0 transition-opacity duration-300 ease-out"
  toastElement.innerHTML = `
        <h3 class="font-bold text-lg">${title}</h3>
        <p class="text-sm">${description}</p>
    `
  toastContainer.appendChild(toastElement)

  // Trigger fade-in
  setTimeout(() => {
    toastElement.classList.remove("opacity-0")
    toastElement.classList.add("opacity-100")
  }, 10) // Small delay to ensure transition applies

  // Remove after 3 seconds
  setTimeout(() => {
    toastElement.classList.remove("opacity-100")
    toastElement.classList.add("opacity-0")
    toastElement.addEventListener(
      "transitionend",
      () => {
        toastElement.remove()
      },
      { once: true },
    )
  }, 3000)
}

// --- Render Products ---
function renderProducts() {
  const productGrid = document.getElementById("product-grid")
  if (!productGrid) return // Only run on homepage

  productGrid.innerHTML = products
    .map(
      (product, index) => `
        <div class="bg-white text-gunmetal border border-dark-slate-blue flex flex-col h-full rounded-lg shadow-md animate-fadeInUp" style="animation-delay: ${index * 0.1}s;">
            <div class="p-0">
                <img src="${product.image}" width="300" height="400" alt="${product.name}" class="w-full h-64 object-cover rounded-t-lg">
            </div>
            <div class="p-6 flex-grow">
                <h3 class="text-xl font-semibold mb-2">${product.name}</h3>
                <p class="text-grayish-blue text-sm mb-4 line-clamp-3">${product.description}</p>
                <div class="text-2xl font-bold text-primary-blue mb-4">${product.price}</div>
            </div>
            <div class="p-6 pt-0">
                <button class="w-full bg-primary-blue text-white px-4 py-2 rounded-md font-semibold hover:bg-light-blue-tint transition-colors duration-300 add-to-cart-btn" data-product-name="${product.name}">
                    Add to Cart
                </button>
            </div>
        </div>
    `,
    )
    .join("")

  // Add event listeners to "Add to Cart" buttons
  productGrid.querySelectorAll(".add-to-cart-btn").forEach((button) => {
    button.addEventListener("click", (event) => {
      const productName = event.target.dataset.productName
      showToast("Added to Cart!", `${productName} has been added to your cart.`)
    })
  })
}

// --- Render Testimonials ---
function renderTestimonials() {
  const testimonialGrid = document.getElementById("testimonial-grid")
  if (!testimonialGrid) return // Only run on homepage

  testimonialGrid.innerHTML = testimonials
    .map(
      (testimonial, index) => `
        <div class="bg-white p-6 rounded-lg shadow-md border border-dark-slate-blue flex flex-col items-center text-center animate-fadeInUp" style="animation-delay: ${index * 0.1}s;">
            <img src="${testimonial.avatar}" width="64" height="64" alt="${testimonial.name}" class="rounded-full mb-4">
            <p class="text-grayish-blue italic mb-4">&quot;${testimonial.quote}&quot;</p>
            <div class="flex items-center mb-2">
                ${Array(5)
                  .fill()
                  .map(
                    (_, i) => `
                    <i data-lucide="star" class="w-5 h-5 ${i < testimonial.rating ? "fill-yellow-400 text-yellow-400" : "fill-gray-300 text-gray-300"}"></i>
                `,
                  )
                  .join("")}
            </div>
            <h4 class="font-semibold">${testimonial.name}</h4>
            <p class="text-sm text-grayish-blue">${testimonial.role}</p>
        </div>
    `,
    )
    .join("")
  lucide.createIcons() // Re-initialize Lucide icons for dynamically added content
}

// --- Intersection Observer for Animations ---
const setupIntersectionObserver = () => {
  const animateOnScrollElements = document.querySelectorAll(".animate-fadeInUp")

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("opacity-100")
          entry.target.style.animationPlayState = "running"
          observer.unobserve(entry.target) // Stop observing once animated
        }
      })
    },
    {
      threshold: 0.1, // Trigger when 10% of the element is visible
    },
  )

  animateOnScrollElements.forEach((element) => {
    element.style.opacity = "0" // Hide initially
    element.style.animationFillMode = "forwards" // Keep final state
    element.style.animationPlayState = "paused" // Pause until in view
    observer.observe(element)
  })
}

// --- Run on DOMContentLoaded ---
document.addEventListener("DOMContentLoaded", () => {
  renderProducts()
  renderTestimonials()
  lucide.createIcons() // Ensure all icons are rendered after dynamic content
  setupIntersectionObserver() // Setup observer after content is rendered
})


function toggleLike(button) {
    const heart = button.querySelector('svg');
    const isLiked = heart.classList.contains('text-red-500');
    
    if (isLiked) {
        heart.classList.remove('text-red-500', 'fill-current');
        heart.classList.add('text-gray-400');
        button.classList.remove('animate-pulse');
    } else {
        heart.classList.remove('text-gray-400');
        heart.classList.add('text-red-500', 'fill-current');
        button.classList.add('animate-pulse');
        setTimeout(() => button.classList.remove('animate-pulse'), 1000);
    }
}

function addToCart(title, price) {
    // Add to cart functionality
    alert(`Added "${title}" to cart for ${price}`);
    
    // Add visual feedback
    event.target.innerHTML = '✓ Added!';
    event.target.classList.add('bg-green-500', 'hover:bg-green-600');
    event.target.classList.remove('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'hover:from-purple-700', 'hover:to-blue-700');
    
    setTimeout(() => {
        event.target.innerHTML = '🛒 Add to Cart';
        event.target.classList.remove('bg-green-500', 'hover:bg-green-600');
        event.target.classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'hover:from-purple-700', 'hover:to-blue-700');
    }, 2000);
}
function scrollToNext() {
  const nextSection = document.querySelector('#demo-contents');
  if (nextSection) {
    nextSection.scrollIntoView({ 
      behavior: 'smooth',
      block: 'start'
    });
  }
}