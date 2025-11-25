@extends('layouts.app')

@section('title', 'Privacy Policy | CalculaterTools Data Protection')

@section('meta-description', 'Learn how CalculaterTools protects your privacy and handles your data. Our commitment to data security and user privacy.')

@section('keywords', 'privacy policy, data protection, CalculaterTools privacy, user data, GDPR')

@section('canonical', url('/privacy'))

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 to-blue-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-4xl mx-auto mb-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Privacy Policy</li>
                </ol>
            </nav>
        </div>

        <!-- Header -->
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Privacy Policy</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Your privacy is important to us. This policy explains how we collect, use, and protect your information.
            </p>
            <div class="mt-6 text-sm text-gray-500">
                Last updated: {{ date('F j, Y') }}
            </div>
        </div>

        <!-- Content -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                <!-- Introduction -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Introduction</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Welcome to CalculaterTools. We are committed to protecting your privacy and ensuring transparency about how we handle your information. This Privacy Policy applies to all users of our website and services.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        By using CalculaterTools, you agree to the collection and use of information in accordance with this policy. We do not sell your personal data to third parties.
                    </p>
                </div>

                <!-- Information Collection -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">2. Information We Collect</h2>
                    
                    <div class="space-y-6">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-mouse-pointer text-indigo-500 mr-3"></i>
                                Information You Provide
                            </h3>
                            <ul class="text-gray-600 space-y-2 list-disc list-inside">
                                <li>Calculation inputs and parameters you enter into our tools</li>
                                <li>Contact information when you reach out to us</li>
                                <li>Feedback and survey responses</li>
                                <li>Newsletter subscription email addresses</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-chart-line text-green-500 mr-3"></i>
                                Automatically Collected Information
                            </h3>
                            <ul class="text-gray-600 space-y-2 list-disc list-inside">
                                <li>IP address and browser type</li>
                                <li>Device information and operating system</li>
                                <li>Usage patterns and calculator preferences</li>
                                <li>Cookies and similar tracking technologies</li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-database text-blue-500 mr-3"></i>
                                What We Don't Collect
                            </h3>
                            <ul class="text-gray-600 space-y-2 list-disc list-inside">
                                <li>Personal identification documents</li>
                                <li>Financial account information</li>
                                <li>Sensitive personal data</li>
                                <li>Payment information (all tools are free)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- How We Use Information -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">3. How We Use Your Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-indigo-50 rounded-lg p-6">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-cogs text-indigo-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Service Operation</h3>
                            <p class="text-gray-600 text-sm">
                                To provide and maintain our calculator tools, process your calculations, and improve user experience.
                            </p>
                        </div>

                        <div class="bg-green-50 rounded-lg p-6">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Analytics</h3>
                            <p class="text-gray-600 text-sm">
                                To understand how users interact with our tools and identify areas for improvement and new features.
                            </p>
                        </div>

                        <div class="bg-blue-50 rounded-lg p-6">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Security</h3>
                            <p class="text-gray-600 text-sm">
                                To monitor and prevent security issues, fraud, and unauthorized access to our services.
                            </p>
                        </div>

                        <div class="bg-purple-50 rounded-lg p-6">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-envelope text-purple-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Communication</h3>
                            <p class="text-gray-600 text-sm">
                                To respond to your inquiries, send service updates, and provide customer support.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Data Sharing -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">4. Data Sharing and Disclosure</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h3 class="font-semibold text-gray-900">Service Providers</h3>
                                <p class="text-gray-600 text-sm">
                                    We may share information with trusted third-party providers who assist us in operating our website and services, under strict confidentiality agreements.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h3 class="font-semibold text-gray-900">Legal Requirements</h3>
                                <p class="text-gray-600 text-sm">
                                    We may disclose information when required by law, to protect our rights, or to ensure the safety of our users and the public.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <i class="fas fa-times-circle text-red-500 mt-1 mr-3"></i>
                            <div>
                                <h3 class="font-semibold text-gray-900">No Sale of Data</h3>
                                <p class="text-gray-600 text-sm">
                                    We do not and will not sell your personal information to third parties for marketing or any other purposes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cookies -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">5. Cookies and Tracking</h2>
                    
                    <div class="bg-amber-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-cookie-bite text-amber-600 mr-3"></i>
                            Our Use of Cookies
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Essential Cookies</h4>
                                <p class="text-gray-600">
                                    Required for basic site functionality and cannot be disabled.
                                </p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Analytics Cookies</h4>
                                <p class="text-gray-600">
                                    Help us understand how visitors interact with our website.
                                </p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Preference Cookies</h4>
                                <p class="text-gray-600">
                                    Remember your settings and preferences for future visits.
                                </p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Marketing Cookies</h4>
                                <p class="text-gray-600">
                                    Used to deliver relevant advertisements (we use minimal marketing cookies).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">6. Data Security</h2>
                    
                    <div class="bg-green-50 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-lock text-green-600 text-2xl mr-4"></i>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">We Take Security Seriously</h3>
                                <p class="text-green-600">Enterprise-grade security measures</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                            <div class="bg-white rounded-lg p-4">
                                <i class="fas fa-shield-alt text-blue-500 text-xl mb-2"></i>
                                <h4 class="font-semibold text-gray-900 mb-1">SSL Encryption</h4>
                                <p class="text-gray-600 text-xs">All data transmitted via HTTPS</p>
                            </div>
                            <div class="bg-white rounded-lg p-4">
                                <i class="fas fa-server text-green-500 text-xl mb-2"></i>
                                <h4 class="font-semibold text-gray-900 mb-1">Secure Servers</h4>
                                <p class="text-gray-600 text-xs">Protected cloud infrastructure</p>
                            </div>
                            <div class="bg-white rounded-lg p-4">
                                <i class="fas fa-user-shield text-purple-500 text-xl mb-2"></i>
                                <h4 class="font-semibold text-gray-900 mb-1">Access Control</h4>
                                <p class="text-gray-600 text-xs">Strict internal data access policies</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Rights -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">7. Your Rights</h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-eye text-indigo-500 mr-3"></i>
                                <span class="font-medium text-gray-900">Right to Access</span>
                            </div>
                            <span class="text-sm text-gray-600">Request what data we have about you</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-edit text-green-500 mr-3"></i>
                                <span class="font-medium text-gray-900">Right to Rectification</span>
                            </div>
                            <span class="text-sm text-gray-600">Correct inaccurate information</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-trash-alt text-red-500 mr-3"></i>
                                <span class="font-medium text-gray-900">Right to Erasure</span>
                            </div>
                            <span class="text-sm text-gray-600">Request deletion of your data</span>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-download text-blue-500 mr-3"></i>
                                <span class="font-medium text-gray-900">Right to Portability</span>
                            </div>
                            <span class="text-sm text-gray-600">Receive your data in a readable format</span>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="bg-indigo-50 rounded-lg p-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Questions About Privacy?</h2>
                    <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                        If you have any questions about this Privacy Policy or our data practices, please don't hesitate to contact us.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition duration-300 transform hover:scale-105">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection