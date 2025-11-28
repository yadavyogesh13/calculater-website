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
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <!-- Tools Dropdown -->
                <div class="relative group">
                    <button class="nav-link text-gray-700 hover:text-blue-600 font-medium flex items-center">
                        Tools <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-72 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-100">
                        <div class="py-3 px-2">
                            <!-- Finance & Investment -->
                            <div class="mb-3">
                                <h3 class="px-3 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Finance & Investment</h3>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-calculator mr-2 text-blue-600"></i>Interest Calculator
                                </a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-money-bill mr-2 text-blue-600"></i>Loan Calculator
                                </a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-chart-line mr-2 text-blue-600"></i>Investment ROI
                                </a>
                            </div>

                            <!-- Health & Fitness -->
                            <div class="mb-3">
                                <h3 class="px-3 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Health & Fitness</h3>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-heartbeat mr-2 text-red-600"></i>BMI Calculator
                                </a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-fire mr-2 text-red-600"></i>Calorie Counter
                                </a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-dumbbell mr-2 text-red-600"></i>Macro Calculator
                                </a>
                            </div>

                            <!-- Utilities -->
                            <div class="mb-3">
                                <h3 class="px-3 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Utilities</h3>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-percent mr-2 text-green-600"></i>Percentage Calculator
                                </a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-balance-scale mr-2 text-green-600"></i>Unit Converter
                                </a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded transition-colors">
                                    <i class="fas fa-laptop-code mr-2 text-green-600"></i>Developer Tools
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
            <!-- Mobile Tools Section -->
            <div class="py-2">
                <button class="w-full text-left text-gray-700 font-medium mb-2 flex items-center hover:text-blue-600" onclick="toggleToolsMenu()">
                    <i class="fas fa-tools mr-2"></i>
                    Tools <i class="fas fa-chevron-down ml-1 text-xs"></i>
                </button>
                <div id="mobile-tools-menu" class="hidden pl-4 border-l-2 border-blue-600 ml-1">
                    <!-- Finance & Investment -->
                    <div class="mb-3">
                        <h3 class="py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Finance & Investment</h3>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-calculator mr-2 text-blue-600"></i>Interest Calculator
                        </a>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-money-bill mr-2 text-blue-600"></i>Loan Calculator
                        </a>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-chart-line mr-2 text-blue-600"></i>Investment ROI
                        </a>
                    </div>

                    <!-- Health & Fitness -->
                    <div class="mb-3">
                        <h3 class="py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Health & Fitness</h3>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-heartbeat mr-2 text-red-600"></i>BMI Calculator
                        </a>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-fire mr-2 text-red-600"></i>Calorie Counter
                        </a>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-dumbbell mr-2 text-red-600"></i>Macro Calculator
                        </a>
                    </div>

                    <!-- Utilities -->
                    <div class="mb-3">
                        <h3 class="py-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Utilities</h3>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-percent mr-2 text-green-600"></i>Percentage Calculator
                        </a>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-balance-scale mr-2 text-green-600"></i>Unit Converter
                        </a>
                        <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 text-sm">
                            <i class="fas fa-laptop-code mr-2 text-green-600"></i>Developer Tools
                        </a>
                    </div>
                </div>
            </div>
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