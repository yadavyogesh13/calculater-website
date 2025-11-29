<header class="bg-white shadow-lg sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calculator text-white text-xl"></i>
                </div>
                <a href="{{ route('home') }}"><span class="text-2xl font-bold text-gray-800">CalculaterTools</span></a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-10">
                <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Home</a>
                
                <a href="{{ route('alltools', 'finance') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-50 text-blue-700 font-semibold hover:bg-blue-100 transition-colors border-l-4 border-blue-600 shadow-sm">
                    <i class="fas fa-wallet text-blue-600"></i>
                    Finance
                </a>
                
                <a href="{{ route('alltools', 'health') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-red-50 text-red-700 font-semibold hover:bg-red-100 transition-colors border-l-4 border-red-600 shadow-sm">
                    <i class="fas fa-heart text-red-600"></i>
                    Health
                </a>
                
                <a href="{{ route('alltools', 'others') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-green-50 text-green-700 font-semibold hover:bg-green-100 transition-colors border-l-4 border-green-600 shadow-sm">
                    <i class="fas fa-th text-green-600"></i>
                    Others
                </a>
                
                <a href="{{ route('blog') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Blog</a>

                <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Contact Us</a>
                <a href="{{ route('about') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">About Us</a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-200 pt-4">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                <i class="fas fa-home mr-3 w-5 text-center"></i>Home
            </a>
            
            <a href="{{ route('alltools', 'finance') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-blue-50 text-blue-700 font-semibold hover:bg-blue-100 transition-colors border-l-4 border-blue-600 my-2">
                <i class="fas fa-wallet text-blue-600"></i>Finance
            </a>
            
            <a href="{{ route('alltools', 'health') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-red-50 text-red-700 font-semibold hover:bg-red-100 transition-colors border-l-4 border-red-600 my-2">
                <i class="fas fa-heart text-red-600"></i>Health
            </a>
            
            <a href="{{ route('alltools', 'others') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-green-50 text-green-700 font-semibold hover:bg-green-100 transition-colors border-l-4 border-green-600 my-2">
                <i class="fas fa-th text-green-600"></i>Others
            </a>
            
            <a href="{{ route('contact') }}" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                <i class="fas fa-envelope mr-3 w-5 text-center"></i>Contact Us
            </a>
            <a href="{{ route('about') }}" class="block py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                <i class="fas fa-info-circle mr-3 w-5 text-center"></i>About Us
            </a>
        </div>
    </nav>
</header>

<script>
function toggleMobileMenu() {
    document.getElementById("mobile-menu").classList.toggle("hidden");
}
function toggleToolsMenu() {
    document.getElementById("mobile-tools-menu").classList.toggle("hidden");
}
</script>