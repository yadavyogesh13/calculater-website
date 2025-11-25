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
                {{-- <div class="relative group">
                    <button class="nav-link text-gray-700 hover:text-blue-600 font-medium flex items-center">
                        Calculators <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <div class="py-2">
                            <a href="#finance" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-university mr-2"></i>Finance & Investment
                            </a>
                            <a href="#health" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-heartbeat mr-2"></i>Health & Fitness
                            </a>
                            <a href="#general" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-calculator mr-2"></i>Daily Use
                            </a>
                            <a href="#business" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-briefcase mr-2"></i>Business & Work
                            </a>
                            <a href="#tech" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                <i class="fas fa-laptop-code mr-2"></i>Tech & Developer
                            </a>
                        </div>
                    </div>
                </div> --}}
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
            {{-- <div class="py-2">
                <div class="text-gray-700 font-medium mb-2">Calculators</div>
                <a href="#finance" class="block py-2 pl-4 text-gray-600 hover:text-blue-600">Finance & Investment</a>
                <a href="#health" class="block py-2 pl-4 text-gray-600 hover:text-blue-600">Health & Fitness</a>
                <a href="#general" class="block py-2 pl-4 text-gray-600 hover:text-blue-600">Daily Use</a>
                <a href="#business" class="block py-2 pl-4 text-gray-600 hover:text-blue-600">Business & Work</a>
                <a href="#tech" class="block py-2 pl-4 text-gray-600 hover:text-blue-600">Tech & Developer</a>
            </div> --}}
            <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-blue-600">Contact Us</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-blue-600">About Us</a>
        </div>
    </nav>
</header>