@extends('layouts.app')

@section('title', 'Terms of Service | CalculaterTools Usage Agreement')

@section('meta-description', 'Terms and conditions for using CalculaterTools calculator tools. Learn about acceptable use, limitations, and user responsibilities.')

@section('keywords', 'terms of service, terms and conditions, user agreement, CalculaterTools terms')

@section('canonical', url('/terms'))

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
                    <li class="text-gray-500">Terms of Service</li>
                </ol>
            </nav>
        </div>

        <!-- Header -->
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Terms of Service</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Please read these terms carefully before using our calculator tools and services.
            </p>
            <div class="mt-6 text-sm text-gray-500">
                Effective date: {{ date('F j, Y') }}
            </div>
        </div>

        <!-- Content -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                <!-- Acceptance -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Acceptance of Terms</h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        By accessing and using CalculaterTools ("the Service"), you accept and agree to be bound by the terms and provision of this agreement.
                    </p>
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                        <p class="text-blue-800 text-sm">
                            <strong>Note:</strong> If you do not agree to these terms, please do not use our services. We reserve the right to update these terms at any time.
                        </p>
                    </div>
                </div>

                <!-- Description of Service -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">2. Description of Service</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-green-50 rounded-lg p-6">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-calculator text-green-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">What We Provide</h3>
                            <ul class="text-gray-600 space-y-2 text-sm">
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    Free online calculator tools
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    Educational resources
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    Regular tool updates
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    Customer support
                                </li>
                            </ul>
                        </div>

                        <div class="bg-red-50 rounded-lg p-6">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">What We Don't Provide</h3>
                            <ul class="text-gray-600 space-y-2 text-sm">
                                <li class="flex items-center">
                                    <i class="fas fa-times text-red-500 mr-2"></i>
                                    Financial or legal advice
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-times text-red-500 mr-2"></i>
                                    Guaranteed accuracy for critical decisions
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-times text-red-500 mr-2"></i>
                                    Professional certifications
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-times text-red-500 mr-2"></i>
                                    Personalized consulting services
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- User Responsibilities -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">3. User Responsibilities</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-user-check text-indigo-500 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Appropriate Use</h3>
                                <p class="text-gray-600 text-sm">
                                    You agree to use our services for lawful purposes only and in a way that does not infringe the rights of, restrict, or inhibit anyone else's use and enjoyment of the Service.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-balance-scale text-green-500 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Accuracy Verification</h3>
                                <p class="text-gray-600 text-sm">
                                    While we strive for accuracy, you are responsible for verifying important calculation results with qualified professionals before making decisions based on them.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-shield-alt text-blue-500 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">Security</h3>
                                <p class="text-gray-600 text-sm">
                                    You are responsible for maintaining the confidentiality of any information you process through our tools and for all activities that occur under your usage.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prohibited Activities -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">4. Prohibited Activities</h2>
                    
                    <div class="bg-red-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-ban text-red-500 mr-3"></i>
                            You May Not:
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start">
                                <i class="fas fa-times text-red-400 mt-1 mr-3"></i>
                                <span class="text-gray-700 text-sm">Use our services for any illegal purpose</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-times text-red-400 mt-1 mr-3"></i>
                                <span class="text-gray-700 text-sm">Attempt to gain unauthorized access</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-times text-red-400 mt-1 mr-3"></i>
                                <span class="text-gray-700 text-sm">Interfere with service operation</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-times text-red-400 mt-1 mr-3"></i>
                                <span class="text-gray-700 text-sm">Scrape or copy our content without permission</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-times text-red-400 mt-1 mr-3"></i>
                                <span class="text-gray-700 text-sm">Impersonate others or provide false information</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-times text-red-400 mt-1 mr-3"></i>
                                <span class="text-gray-700 text-sm">Use automated systems to access our services</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Intellectual Property -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">5. Intellectual Property</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-purple-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-copyright text-purple-500 mr-3"></i>
                                Our Rights
                            </h3>
                            <ul class="text-gray-600 space-y-2 text-sm">
                                <li>All calculator algorithms and logic</li>
                                <li>Website design and user interface</li>
                                <li>Brand names and logos</li>
                                <li>Documentation and help content</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-handshake text-green-500 mr-3"></i>
                                Your Rights
                            </h3>
                            <ul class="text-gray-600 space-y-2 text-sm">
                                <li>Calculation results for personal use</li>
                                <li>Educational and non-commercial use</li>
                                <li>Properly attributed sharing</li>
                                <li>Feedback and suggestions</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Disclaimer of Warranties -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">6. Disclaimer of Warranties</h2>
                    
                    <div class="bg-amber-50 border-l-4 border-amber-500 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-exclamation-circle text-amber-600 mr-3"></i>
                            Important Disclaimer
                        </h3>
                        <p class="text-gray-700 mb-4">
                            The Service is provided on an "AS IS" and "AS AVAILABLE" basis. CalculaterTools makes no representations or warranties of any kind, express or implied, as to the operation of the Service or the information, content, or materials included.
                        </p>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-start">
                                <i class="fas fa-chevron-right text-amber-500 mt-1 mr-2"></i>
                                <span>Calculation results are for informational purposes only</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-chevron-right text-amber-500 mt-1 mr-2"></i>
                                <span>We do not guarantee uninterrupted or error-free service</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-chevron-right text-amber-500 mt-1 mr-2"></i>
                                <span>Always verify critical calculations with qualified professionals</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Limitation of Liability -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">7. Limitation of Liability</h2>
                    
                    <div class="bg-red-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">To the fullest extent permitted by law:</h3>
                        <div class="space-y-3 text-sm text-gray-700">
                            <p>
                                CalculaterTools shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses.
                            </p>
                            <p>
                                This includes but is not limited to damages resulting from:
                            </p>
                            <ul class="list-disc list-inside space-y-1 ml-4">
                                <li>Your use or inability to use the Service</li>
                                <li>Any conduct or content of any third party on the Service</li>
                                <li>Any content obtained from the Service</li>
                                <li>Unauthorized access, use, or alteration of your transmissions or content</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Governing Law -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">8. Governing Law</h2>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-balance-scale text-gray-600 text-2xl mr-4"></i>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">Jurisdiction and Applicable Law</h3>
                                <p class="text-gray-600">These terms shall be governed by the laws of the United States</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Any legal suit, action, or proceeding arising out of, or related to, these Terms of Service or the Service shall be instituted exclusively in the federal courts of the United States.
                        </p>
                    </div>
                </div>

                <!-- Changes to Terms -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">9. Changes to Terms</h2>
                    
                    <div class="bg-blue-50 rounded-lg p-6">
                        <div class="flex items-center">
                            <i class="fas fa-sync-alt text-blue-500 text-2xl mr-4"></i>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">We May Update These Terms</h3>
                                <p class="text-blue-600">Check back periodically for updates</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mt-4 text-sm">
                            We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will provide at least 30 days' notice prior to any new terms taking effect.
                        </p>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg p-8 text-white text-center">
                    <h2 class="text-2xl font-bold mb-4">Questions About Our Terms?</h2>
                    <p class="mb-6 opacity-90 max-w-2xl mx-auto">
                        If you have any questions about these Terms of Service, please contact us for clarification.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-white text-indigo-600 hover:bg-gray-100 font-semibold rounded-lg transition duration-300 transform hover:scale-105">
                        <i class="fas fa-headset mr-2"></i>
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection