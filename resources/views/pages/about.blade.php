@extends('layouts.app')

@section('title', 'About CalculaterTools | Our Mission & Team | Online Calculator Tools')

@section('meta-description', 'Learn about CalculaterTools - your trusted source for free online calculators. Our mission is to provide accurate, easy-to-use calculation tools for everyone.')

@section('keywords', 'about CalculaterTools, about us, calculator tools, mission, team, online calculators')

@section('canonical', url('/about'))

@section('content')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "About CalculatorTools",
  "url": "{{ url('/about') }}",
  "description": "CalculatorTools is a free online platform that provides a wide range of calculators across finance, health, daily life, and programming to make complex calculations simple and accurate.",
  "publisher": {
    "@type": "Organization",
    "name": "CalculatorTools",
    "url": "https://calculatertools.com",
    "logo": {
      "@type": "ImageObject",
      "url": "https://calculatertools.com/logo.png"
    },
  }
}
</script>
@endverbatim
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-blue-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">About Us</li>
                </ol>
            </nav>
        </div>

        <!-- Hero Section -->
        <div class="max-w-6xl mx-auto text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">About CalculaterTools</h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Empowering millions worldwide with free, accurate, and easy-to-use calculation tools for everyday life and professional needs.
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="max-w-6xl mx-auto mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-bullseye text-indigo-600 text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h2>
                        <p class="text-lg text-gray-600 leading-relaxed mb-6">
                            To democratize access to powerful calculation tools by providing free, accurate, and user-friendly calculators that help people make informed decisions in their personal and professional lives.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700">Free access to all tools</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700">No registration required</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-700">Regular updates and improvements</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-blue-600 text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h2>
                        <p class="text-lg text-gray-600 leading-relaxed mb-6">
                            We envision a world where everyone has instant access to reliable calculation tools, eliminating barriers to financial planning, educational support, and professional development.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-rocket text-blue-500 mr-3"></i>
                                <span class="text-gray-700">Innovation in calculation technology</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-globe text-blue-500 mr-3"></i>
                                <span class="text-gray-700">Global accessibility</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-heart text-blue-500 mr-3"></i>
                                <span class="text-gray-700">User-centric design</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Story -->
        <div class="max-w-6xl mx-auto mb-20">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Story</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        From a simple idea to a comprehensive platform trusted by millions
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                        <span class="text-indigo-600 font-bold">2018</span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">The Beginning</h3>
                                    <p class="text-gray-600">
                                        CalculaterTools started as a small project to help students with basic math calculations. We noticed a gap in accessible, user-friendly online tools.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                        <span class="text-green-600 font-bold">2020</span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Rapid Growth</h3>
                                    <p class="text-gray-600">
                                        Expanded to include financial, health, and programming calculators. Reached 1 million monthly users and became a go-to resource.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <span class="text-blue-600 font-bold">2023</span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Today & Beyond</h3>
                                    <p class="text-gray-600">
                                        Serving over 5 million users monthly with 150+ specialized calculators. Continuously innovating with AI-powered features and mobile optimization.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-8 text-white">
                            <div class="text-center">
                                <div class="text-4xl md:text-5xl font-bold mb-2">5M+</div>
                                <div class="text-xl opacity-90">Monthly Users</div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-8">
                                <div class="text-center">
                                    <div class="text-2xl font-bold">150+</div>
                                    <div class="text-sm opacity-90">Calculators</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">99.9%</div>
                                    <div class="text-sm opacity-90">Uptime</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">50+</div>
                                    <div class="text-sm opacity-90">Countries</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold">24/7</div>
                                    <div class="text-sm opacity-90">Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Values -->
        <div class="max-w-6xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Values</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    The principles that guide everything we do
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Accuracy</h3>
                    <p class="text-gray-600">
                        Every calculation is thoroughly tested and verified to ensure precise results you can trust.
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-universal-access text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Accessibility</h3>
                    <p class="text-gray-600">
                        Free tools available to everyone, regardless of location, device, or technical expertise.
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Innovation</h3>
                    <p class="text-gray-600">
                        Continuously improving our tools with new features and the latest web technologies.
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Community</h3>
                    <p class="text-gray-600">
                        Building tools based on user feedback and serving a global community of learners and professionals.
                    </p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="max-w-6xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    The passionate individuals behind CalculaterTools's success
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">SD</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-1">Sarah Johnson</h3>
                    <p class="text-indigo-600 font-medium mb-3">Founder & CEO</p>
                    <p class="text-gray-600 text-sm mb-4">
                        Former financial analyst with a passion for making complex calculations accessible to everyone.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition duration-200">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition duration-200">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">MK</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-1">Michael Chen</h3>
                    <p class="text-indigo-600 font-medium mb-3">Lead Developer</p>
                    <p class="text-gray-600 text-sm mb-4">
                        Full-stack developer with expertise in creating responsive, high-performance web applications.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition duration-200">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition duration-200">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">ER</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-1">Emily Rodriguez</h3>
                    <p class="text-indigo-600 font-medium mb-3">UX/UI Designer</p>
                    <p class="text-gray-600 text-sm mb-4">
                        Creative designer focused on creating intuitive, beautiful user experiences across all devices.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition duration-200">
                            <i class="fab fa-dribbble text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition duration-200">
                            <i class="fab fa-behance text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <p class="text-gray-600">
                    And many more talented individuals contributing to our mission...
                </p>
            </div>
        </div>        

        <!-- Testimonials -->
        <div class="max-w-6xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Users Say</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Trusted by students, professionals, and organizations worldwide
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-graduate text-indigo-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Alex Thompson</h4>
                            <p class="text-sm text-gray-600">Engineering Student</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "CalculaterTools has been a lifesaver for my engineering courses. The accuracy and ease of use are unmatched. I use it daily for complex calculations."
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-briefcase text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Maria Garcia</h4>
                            <p class="text-sm text-gray-600">Financial Analyst</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "As a financial analyst, I rely on accurate calculations. CalculaterTools provides reliable tools that help me make informed decisions quickly."
                    </p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-code text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">David Kim</h4>
                            <p class="text-sm text-gray-600">Software Developer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "The programming calculators and converters save me hours of work. The JSON formatter and Base64 tools are particularly helpful in my daily workflow."
                    </p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="max-w-6xl mx-auto">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl shadow-2xl p-8 md:p-12 text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Calculating?</h2>
                <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto">
                    Join millions of users who trust CalculaterTools for their calculation needs. Explore our tools today!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Explore Calculators
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition duration-300">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Simple animation for statistics counter
document.addEventListener('DOMContentLoaded', function() {
    // Animate statistics numbers
    const animateValue = (id, start, end, duration) => {
        const obj = document.getElementById(id);
        if (!obj) return;
        
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            obj.innerHTML = value.toLocaleString() + '+';
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    // Check if element is in viewport
    const isInViewport = (element) => {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    };

    // Animate when statistics come into view
    const statsSection = document.querySelector('.bg-gradient-to-br');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateValue('userCount', 0, 5, 2000);
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(statsSection);
    }
});
</script>
@endsection