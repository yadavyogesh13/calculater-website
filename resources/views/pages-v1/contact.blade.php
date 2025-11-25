@extends('layouts.app')

@section('title', 'Contact Us | CalculaterTools Support & Help')

@section('meta-description', 'Get in touch with CalculaterTools support team. We are here to help with any questions, feedback, or technical issues.')

@section('keywords', 'contact CalculaterTools, support, help, feedback, technical support')

@section('canonical', url('/contact'))

@section('content')
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
                    <li class="text-gray-500">Contact Us</li>
                </ol>
            </nav>
        </div>

        <!-- Header -->
        <div class="max-w-6xl mx-auto text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Contact Us</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We're here to help! Get in touch with our support team for any questions, feedback, or technical issues.
            </p>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl p-8 sticky top-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Get in Touch</h2>
                        
                        <!-- Contact Methods -->
                        <div class="space-y-6">
                            {{-- <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-indigo-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Email Us</h3>
                                    <p class="text-gray-600 text-sm">support@CalculaterTools.com</p>
                                    <p class="text-gray-500 text-xs">Typically reply within 24 hours</p>
                                </div>
                            </div> --}}

                            {{-- <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-comments text-green-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Live Chat</h3>
                                    <p class="text-gray-600 text-sm">Available 9AM-6PM EST</p>
                                    <p class="text-gray-500 text-xs">Mon-Fri business hours</p>
                                </div>
                            </div> --}}

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-file-alt text-blue-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Help Center</h3>
                                    <p class="text-gray-600 text-sm">Documentation & FAQs</p>
                                    <p class="text-gray-500 text-xs">Instant answers</p>
                                </div>
                            </div>
                        </div>

                        <!-- Response Time -->
                        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-clock text-amber-500 text-lg"></i>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm">Response Time</h4>
                                    <p class="text-gray-600 text-xs">24-48 hours for detailed inquiries</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Quick Links -->
                        {{-- <div class="mt-8">
                            <h3 class="font-semibold text-gray-900 mb-4">Common Questions</h3>
                            <div class="space-y-2">
                                <a href="#" class="block text-sm text-indigo-600 hover:text-indigo-800 transition duration-200">
                                    <i class="fas fa-chevron-right text-xs mr-2"></i>
                                    How accurate are your calculators?
                                </a>
                                <a href="#" class="block text-sm text-indigo-600 hover:text-indigo-800 transition duration-200">
                                    <i class="fas fa-chevron-right text-xs mr-2"></i>
                                    Can I suggest a new calculator?
                                </a>
                                <a href="#" class="block text-sm text-indigo-600 hover:text-indigo-800 transition duration-200">
                                    <i class="fas fa-chevron-right text-xs mr-2"></i>
                                    Do you offer API access?
                                </a>
                                <a href="#" class="block text-sm text-indigo-600 hover:text-indigo-800 transition duration-200">
                                    <i class="fas fa-chevron-right text-xs mr-2"></i>
                                    Reporting calculation errors
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Send us a Message</h2>
                        <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you as soon as possible.</p>

                        <!-- Success/Error Messages -->
                        <div id="formMessages" class="hidden mb-6 p-4 rounded-lg">
                            <!-- Messages will be inserted here by JavaScript -->
                        </div>

                        <form id="contactForm" class="space-y-6">
                            @csrf

                            <!-- Name & Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name *
                                    </label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        placeholder="Enter your full name"
                                        required
                                    >
                                    <div class="text-red-500 text-xs mt-1 hidden" id="nameError"></div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        placeholder="your.email@example.com"
                                        required
                                    >
                                    <div class="text-red-500 text-xs mt-1 hidden" id="emailError"></div>
                                </div>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subject *
                                </label>
                                <select 
                                    id="subject" 
                                    name="subject"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                    required
                                >
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    {{-- <option value="technical">Technical Support</option> --}}
                                    <option value="feedback">Feedback & Suggestions</option>
                                    <option value="bug">Report a Bug</option>
                                    <option value="feature">Feature Request</option>
                                    {{-- <option value="partnership">Partnership Opportunity</option> --}}
                                    <option value="other">Other</option>
                                </select>
                                <div class="text-red-500 text-xs mt-1 hidden" id="subjectError"></div>
                            </div>

                            <!-- Calculator Reference -->
                            <div id="calculatorField" class="hidden">
                                <label for="calculator" class="block text-sm font-medium text-gray-700 mb-2">
                                    Related Calculator
                                </label>
                                <select 
                                    id="calculator" 
                                    name="calculator"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                >
                                    <option value="">Select a calculator (optional)</option>
                                    <option value="currency-exchange">Currency Exchange Calculator</option>
                                    <option value="interest-rate">Interest Rate Calculator</option>
                                    <option value="binary-converter">Binary/Hex Converter</option>
                                    <option value="subnet-calculator">IP Subnet Calculator</option>
                                    <option value="download-time">Download Time Calculator</option>
                                    <option value="json-formatter">JSON Formatter</option>
                                    <option value="base64-converter">Base64 Converter</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    Message *
                                </label>
                                <textarea 
                                    id="message" 
                                    name="message"
                                    rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 resize-none"
                                    placeholder="Please describe your inquiry in detail..."
                                    required
                                ></textarea>
                                <div class="flex justify-between items-center mt-1">
                                    <div class="text-red-500 text-xs" id="messageError"></div>
                                    <div class="text-gray-500 text-xs">
                                        <span id="charCount">0</span>/1000 characters
                                    </div>
                                </div>
                            </div>

                            <!-- Priority -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                    Priority Level
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition duration-200">
                                        <input type="radio" name="priority" value="low" class="text-indigo-600 focus:ring-indigo-500" checked>
                                        <span class="ml-3">
                                            <span class="block text-sm font-medium text-gray-900">Low</span>
                                            <span class="block text-xs text-gray-500">General question</span>
                                        </span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition duration-200">
                                        <input type="radio" name="priority" value="normal" class="text-indigo-600 focus:ring-indigo-500">
                                        <span class="ml-3">
                                            <span class="block text-sm font-medium text-gray-900">Normal</span>
                                            <span class="block text-xs text-gray-500">Standard support</span>
                                        </span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition duration-200">
                                        <input type="radio" name="priority" value="high" class="text-indigo-600 focus:ring-indigo-500">
                                        <span class="ml-3">
                                            <span class="block text-sm font-medium text-gray-900">High</span>
                                            <span class="block text-xs text-gray-500">Urgent issue</span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                <div class="text-sm text-gray-500">
                                    * Required fields
                                </div>
                                <button 
                                    type="submit" 
                                    id="submitButton"
                                    class="inline-flex items-center px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                                >
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Additional Information -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 rounded-xl p-6">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-info-circle text-blue-500 text-xl mr-3"></i>
                                <h3 class="text-lg font-semibold text-gray-900">What Happens Next?</h3>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2 text-xs"></i>
                                    <span>You'll receive an automated confirmation email</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2 text-xs"></i>
                                    <span>Our team reviews your message within 24 hours</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2 text-xs"></i>
                                    <span>We'll respond via email with a solution or follow-up questions</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-lightbulb text-green-500 text-xl mr-3"></i>
                                <h3 class="text-lg font-semibold text-gray-900">Tips for Better Help</h3>
                            </div>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-star text-amber-500 mt-1 mr-2 text-xs"></i>
                                    <span>Include specific calculator names when relevant</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-amber-500 mt-1 mr-2 text-xs"></i>
                                    <span>Describe the issue or question in detail</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-star text-amber-500 mt-1 mr-2 text-xs"></i>
                                    <span>Attach screenshots if applicable (reply to confirmation email)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const formMessages = document.getElementById('formMessages');
    const submitButton = document.getElementById('submitButton');
    const originalButtonText = submitButton.innerHTML;
    const calculatorField = document.getElementById('calculatorField');
    const subjectSelect = document.getElementById('subject');
    const messageTextarea = document.getElementById('message');
    const charCount = document.getElementById('charCount');

    // Show calculator field for technical/bug/feature subjects
    subjectSelect.addEventListener('change', function() {
        const relevantSubjects = ['technical', 'bug', 'feature', 'feedback'];
        if (relevantSubjects.includes(this.value)) {
            calculatorField.classList.remove('hidden');
        } else {
            calculatorField.classList.add('hidden');
        }
    });

    // Character count for message
    messageTextarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;
        
        if (count > 1000) {
            charCount.classList.add('text-red-500');
        } else {
            charCount.classList.remove('text-red-500');
        }
    });

    // Form submission handler
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Reset previous messages and errors
        resetFormState();
        
        // Validate form
        if (!validateForm()) {
            return;
        }

        // Disable submit button and show loading state
        setLoadingState(true);

        // Prepare form data
        const formData = new FormData(this);

        // Send AJAX request
        fetch('{{ route("contact.submit") }}', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('success', data.message || 'Thank you! Your message has been sent successfully. We will get back to you soon.');
                contactForm.reset();
                calculatorField.classList.add('hidden');
                charCount.textContent = '0';
            } else {
                showMessage('error', data.message || 'There was an error sending your message. Please try again.');
                
                // Show field errors if provided
                if (data.errors) {
                    displayFieldErrors(data.errors);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('error', 'There was a network error. Please check your connection and try again.');
        })
        .finally(() => {
            setLoadingState(false);
        });
    });

    // Form validation
    function validateForm() {
        let isValid = true;
        const fields = ['name', 'email', 'subject', 'message'];

        fields.forEach(field => {
            const element = document.getElementById(field);
            const errorElement = document.getElementById(field + 'Error');
            
            if (!element.value.trim()) {
                showFieldError(field, 'This field is required');
                isValid = false;
            } else if (field === 'email' && !isValidEmail(element.value)) {
                showFieldError(field, 'Please enter a valid email address');
                isValid = false;
            } else if (field === 'message' && element.value.length > 1000) {
                showFieldError(field, 'Message must be less than 1000 characters');
                isValid = false;
            }
        });

        return isValid;
    }

    // Email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Show field error
    function showFieldError(field, message) {
        const errorElement = document.getElementById(field + 'Error');
        const inputElement = document.getElementById(field);
        
        errorElement.textContent = message;
        errorElement.classList.remove('hidden');
        inputElement.classList.add('border-red-500');
    }

    // Display multiple field errors
    function displayFieldErrors(errors) {
        Object.keys(errors).forEach(field => {
            showFieldError(field, errors[field][0]);
        });
    }

    // Reset form state
    function resetFormState() {
        // Clear messages
        formMessages.classList.add('hidden');
        formMessages.innerHTML = '';

        // Clear field errors
        const errorElements = document.querySelectorAll('[id$="Error"]');
        errorElements.forEach(element => {
            element.classList.add('hidden');
            element.textContent = '';
        });

        // Remove error borders
        const inputElements = document.querySelectorAll('input, select, textarea');
        inputElements.forEach(element => {
            element.classList.remove('border-red-500');
        });
    }

    // Show message
    function showMessage(type, message) {
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';
        const bgColor = type === 'success' ? 'bg-green-50 border-green-200 text-green-800' : 'bg-red-50 border-red-200 text-red-800';
        
        formMessages.innerHTML = `
            <div class="flex items-center">
                <i class="fas ${icon} mr-3 text-lg"></i>
                <div>${message}</div>
            </div>
        `;
        formMessages.className = `p-4 rounded-lg border ${bgColor}`;
        formMessages.classList.remove('hidden');

        // Scroll to message
        formMessages.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Set loading state
    function setLoadingState(loading) {
        if (loading) {
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <i class="fas fa-spinner fa-spin mr-2"></i>
                Sending...
            `;
            submitButton.classList.remove('hover:scale-105', 'transform');
        } else {
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
            submitButton.classList.add('hover:scale-105', 'transform');
        }
    }

    // Auto-hide success message after 10 seconds
    function autoHideMessage() {
        if (formMessages.classList.contains('bg-green-50')) {
            setTimeout(() => {
                formMessages.classList.add('hidden');
            }, 10000);
        }
    }
});
</script>

<style>
/* Custom styles for the contact form */
#contactForm input:focus,
#contactForm select:focus,
#contactForm textarea:focus {
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

/* Smooth transitions for all interactive elements */
#contactForm * {
    transition: all 0.2s ease-in-out;
}

/* Custom radio button styling */
input[type="radio"]:checked {
    background-color: #4f46e5;
    border-color: #4f46e5;
}

/* Loading animation */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.fa-spinner {
    animation: spin 1s linear infinite;
}
</style>
@endsection