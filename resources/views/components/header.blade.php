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
                <a href="{{ route('alltools', 'finance') }}" class="nav-link">Finance</a>
                <a href="{{ route('alltools', 'health') }}" class="nav-link">Health</a>
                <a href="{{ route('alltools', 'others') }}" class="nav-link">Others</a>

                <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Contact Us</a>
                <a href="{{ route('about') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">About Us</a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
            <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-blue-600">Home</a>
            
            <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-blue-600">Contact Us</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-blue-600">About Us</a>
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