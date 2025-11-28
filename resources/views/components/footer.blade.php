<footer class="bg-gray-900 text-white w-full">
    <!-- Main Footer Content -->
    <div class="w-full px-3 sm:px-4 md:px-6 lg:px-8 py-8 sm:py-12 md:py-16">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 lg:gap-12">
            <!-- Brand Column -->
            <div class="lg:col-span-1">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-8 sm:w-9 md:w-10 h-8 sm:h-9 md:h-10 bg-linear-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center shrink-0">
                        <i class="fas fa-calculator text-white text-lg"></i>
                    </div>
                    <span class="text-lg sm:text-xl font-bold bg-linear-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                        CalculaterTools
                    </span>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-6">
                    Your trusted source for free, accurate, and easy-to-use online calculators. Empowering millions with reliable calculation tools.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 transform hover:scale-110">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 transform hover:scale-110">
                        <i class="fab fa-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 transform hover:scale-110">
                        <i class="fab fa-linkedin text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300 transform hover:scale-110">
                        <i class="fab fa-github text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Tools Column -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-white">Popular Tools</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('currency.converter.calculator') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-chevron-right text-indigo-400 text-xs mr-2"></i>
                            Currency Converter
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('compound.interest.calculator') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-chevron-right text-indigo-400 text-xs mr-2"></i>
                            Compound Interest Calculator
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('binary.hex.converter') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-chevron-right text-indigo-400 text-xs mr-2"></i>
                            Binary/Hex Converter
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ip.subnet.calculator') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-chevron-right text-indigo-400 text-xs mr-2"></i>
                            IP Subnet Calculator
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories Column -->
            {{-- <div>
                <h3 class="text-lg font-semibold mb-6 text-white">Categories</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="/calculators/finance" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-chart-line text-green-400 text-xs mr-2"></i>
                            Financial Calculators
                        </a>
                    </li>
                    <li>
                        <a href="/calculators/math" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-calculator text-blue-400 text-xs mr-2"></i>
                            Math Calculators
                        </a>
                    </li>
                    <li>
                        <a href="/calculators/health" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-heartbeat text-red-400 text-xs mr-2"></i>
                            Health Calculators
                        </a>
                    </li>
                    <li>
                        <a href="/calculators/programming" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-code text-purple-400 text-xs mr-2"></i>
                            Programming Tools
                        </a>
                    </li>
                    <li>
                        <a href="/calculators/conversion" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-exchange-alt text-yellow-400 text-xs mr-2"></i>
                            Conversion Tools
                        </a>
                    </li>
                </ul>
            </div> --}}

            <!-- Contact & Legal Column -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-white">Company</h3>
                <ul class="space-y-3 mb-6">
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-info-circle text-indigo-400 text-xs mr-2"></i>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-envelope text-indigo-400 text-xs mr-2"></i>
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-shield-alt text-indigo-400 text-xs mr-2"></i>
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="text-gray-300 hover:text-white transition duration-200 text-sm flex items-center">
                            <i class="fas fa-file-contract text-indigo-400 text-xs mr-2"></i>
                            Terms of Service
                        </a>
                    </li>
                </ul>

                <!-- Newsletter Signup -->
                {{-- <div class="bg-gray-800 rounded-lg p-4">
                    <h4 class="text-sm font-semibold mb-2 text-white">Stay Updated</h4>
                    <p class="text-gray-300 text-xs mb-3">Get new calculator tools and updates</p>
                    <form class="space-y-2">
                        <input 
                            type="email" 
                            placeholder="Enter your email" 
                            class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded text-sm text-white placeholder-gray-400 focus:outline-none focus:border-indigo-400 transition duration-200"
                        >
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-2 rounded text-sm font-medium transition duration-300 transform hover:scale-105"
                        >
                            Subscribe
                        </button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-700">
        <div class="w-full px-3 sm:px-4 md:px-6 lg:px-8 py-6 md:py-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 sm:gap-4 sm:space-y-0">
                <!-- Copyright -->
                <div class="text-gray-400 text-xs sm:text-sm text-center sm:text-left">
                    &copy; {{ date('Y') }} CalculaterTools. All rights reserved.
                </div>

                <!-- Trust Badges -->
                <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4">
                    <div class="flex items-center space-x-1 sm:space-x-2 text-green-400 text-xs sm:text-sm">
                        <i class="fas fa-shield-check text-xs sm:text-sm"></i>
                        <span class="font-medium hidden sm:inline">SSL Secured</span>
                    </div>
                    <div class="flex items-center space-x-1 sm:space-x-2 text-blue-400 text-xs sm:text-sm">
                        <i class="fas fa-bolt text-xs sm:text-sm"></i>
                        <span class="font-medium hidden sm:inline">Fast Tools</span>
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="text-center mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-700">
                <p class="text-gray-500 text-xs sm:text-xs max-w-4xl mx-auto px-2 sm:px-0 leading-relaxed">
                    CalculaterTools provides calculation tools for informational and educational purposes only. 
                    Results should be verified with professional sources when used for critical decisions. 
                    We are not responsible for any errors or omissions.
                </p>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button 
        onclick="scrollToTop()" 
        id="backToTop"
        class="fixed bottom-6 right-6 w-12 h-12 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 opacity-0 invisible flex items-center justify-center"
    >
        <i class="fas fa-chevron-up"></i>
    </button>
</footer>

<script>
// Back to top functionality
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show/hide back to top button
window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 300) {
        backToTop.classList.remove('opacity-0', 'invisible');
        backToTop.classList.add('opacity-100', 'visible');
    } else {
        backToTop.classList.remove('opacity-100', 'visible');
        backToTop.classList.add('opacity-0', 'invisible');
    }
});

// Newsletter form handling
// document.addEventListener('DOMContentLoaded', function() {
//     const newsletterForm = document.querySelector('form');
//     if (newsletterForm) {
//         newsletterForm.addEventListener('submit', function(e) {
//             e.preventDefault();
//             const email = this.querySelector('input[type="email"]').value;
//             if (email) {
//                 // Here you would typically send the email to your backend
//                 alert('Thank you for subscribing! You will receive updates soon.');
//                 this.reset();
//             }
//         });
//     }
// });
</script>

<style>
/* Smooth transitions for all interactive elements */
footer a, footer button {
    transition: all 0.3s ease;
}

/* Gradient text effect */
.gradient-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Hover effects for social icons */
footer .fab:hover {
    transform: translateY(-2px);
}

/* Custom scrollbar for footer if needed */
footer ::-webkit-scrollbar {
    width: 6px;
}

footer ::-webkit-scrollbar-track {
    background: #374151;
}

footer ::-webkit-scrollbar-thumb {
    background: #6b7280;
    border-radius: 3px;
}

footer ::-webkit-scrollbar-thumb:hover {
    background: #9ca3af;
}
</style>