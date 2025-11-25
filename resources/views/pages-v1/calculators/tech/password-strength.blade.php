@extends('layouts.app')

@section('title', 'Password Strength Estimator | Check Password Security | CalculaterTools')

@section('meta-description', 'Evaluate your password strength and security. Get detailed feedback and recommendations for creating strong, secure passwords.')

@section('keywords', 'password strength checker, password security, password estimator, strong password, password generator, cybersecurity')

@section('canonical', url('/calculators/password-strength'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Password Strength Estimator",
    "description": "Evaluate password strength and security with detailed feedback",
    "url": "{{ url('/calculators/password-strength') }}",
    "operatingSystem": "Any",
    "applicationCategory": "SecurityApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#security" class="text-blue-600 hover:text-blue-800 transition duration-150">Security Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Password Strength Estimator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Password Strength Estimator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Test your password security and get detailed feedback. Learn how to create strong, memorable passwords that protect your accounts.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Test Your Password</h2>
                        <p class="text-gray-600 mb-6">Enter a password to evaluate its strength and security</p>
                        
                        <form id="passwordStrengthForm" class="space-y-6">
                            <!-- Password Input -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Password Analysis</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="passwordInput" class="block text-xs font-medium text-blue-700 mb-2">
                                            Enter Password to Test
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="password" 
                                                id="passwordInput" 
                                                class="w-full pl-4 pr-12 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 font-mono"
                                                placeholder="Enter your password"
                                                value="MySecurePass123!"
                                                required
                                            >
                                            <button 
                                                type="button" 
                                                id="togglePassword"
                                                class="absolute right-3 top-3 text-gray-500 hover:text-blue-600 transition duration-200"
                                            >
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <p class="text-xs text-blue-600 mt-1">We don't store or transmit your password</p>
                                    </div>
                                    
                                    <!-- Strength Meter -->
                                    <div>
                                        <div class="flex justify-between text-xs text-blue-700 mb-1">
                                            <span>Password Strength</span>
                                            <span id="strengthText">Very Weak</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div id="strengthMeter" class="h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Requirements -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Security Requirements</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="minLength" class="block text-xs font-medium text-green-700 mb-2">
                                            Minimum Length
                                        </label>
                                        <select id="minLength" class="w-full px-3 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200">
                                            <option value="8">8 characters</option>
                                            <option value="12" selected>12 characters</option>
                                            <option value="16">16 characters</option>
                                            <option value="20">20 characters</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="checkCommon" class="block text-xs font-medium text-green-700 mb-2">
                                            Common Passwords Check
                                        </label>
                                        <select id="checkCommon" class="w-full px-3 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200">
                                            <option value="strict" selected>Strict (Recommended)</option>
                                            <option value="moderate">Moderate</option>
                                            <option value="none">None</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Tests -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Quick Security Tests</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="testCommonPassword()" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-ban text-purple-600 mr-1"></i>
                                        Common Pass
                                    </button>
                                    <button type="button" onclick="testStrongPassword()" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-shield-alt text-purple-600 mr-1"></i>
                                        Strong Pass
                                    </button>
                                    <button type="button" onclick="testWeakPassword()" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-exclamation-triangle text-purple-600 mr-1"></i>
                                        Weak Pass
                                    </button>
                                    <button type="button" onclick="generateStrongPassword()" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-key text-purple-600 mr-1"></i>
                                        Generate
                                    </button>
                                </div>
                            </div>

                            <!-- Advanced Options -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Advanced Analysis</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showEntropy" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="showEntropy" class="ml-2 text-xs text-amber-700">
                                            Show entropy analysis
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="crackTime" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="crackTime" class="ml-2 text-xs text-amber-700">
                                            Estimate crack time
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="analyzePassword()"
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg"
                                >
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    Analyze Password
                                </button>
                                <button 
                                    type="button" 
                                    onclick="clearPassword()"
                                    class="w-full bg-gray-600 hover:bg-gray-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                >
                                    <i class="fas fa-eraser mr-2"></i>
                                    Clear
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Security Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-lock text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter a password</p>
                                <p class="text-sm">to see security analysis</p>
                            </div>
                        </div>

                        <!-- Quick Tips -->
                        <div id="tipsSection" class="mt-6 p-4 bg-green-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Password Tips</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Use at least 12 characters</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Mix uppercase, lowercase, numbers & symbols</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Avoid common words and patterns</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Don't reuse passwords across sites</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Security Score -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Security Assessment</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="securityScore">0/100</div>
                            <div class="text-lg font-semibold text-gray-700">Security Score</div>
                            <div class="text-sm text-gray-500 mt-1">Overall strength</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="crackTimeResult">Instant</div>
                            <div class="text-lg font-semibold text-gray-700">Time to Crack</div>
                            <div class="text-sm text-gray-500 mt-1">Estimated duration</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="entropyScore">0 bits</div>
                            <div class="text-lg font-semibold text-gray-700">Entropy</div>
                            <div class="text-sm text-gray-500 mt-1">Randomness measure</div>
                        </div>
                    </div>
                </div>

                <!-- Requirements Check -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Security Requirements Check</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Requirements List -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Password Requirements</h3>
                            <div class="space-y-3" id="requirementsList">
                            </div>
                        </div>
                        
                        <!-- Improvement Suggestions -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Improvement Suggestions</h3>
                            <div class="space-y-3" id="improvementSuggestions">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Analysis -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Advanced Security Analysis</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Pattern Analysis -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Pattern Analysis</h3>
                            <div class="space-y-4" id="patternAnalysis">
                            </div>
                        </div>
                        
                        <!-- Common Threats -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Common Threats</h3>
                            <div class="space-y-3" id="commonThreats">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password Examples -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Password Strength Examples</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Strong Examples -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Strong Password Examples</h3>
                            <div class="space-y-3" id="strongExamples">
                            </div>
                        </div>
                        
                        <!-- Weak Examples -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Weak Password Examples</h3>
                            <div class="space-y-3" id="weakExamples">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Education -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Password Security Best Practices</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                            Creating Strong Passwords
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Length Matters:</strong> Aim for at least 12-16 characters. Longer passwords are exponentially harder to crack.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Character Diversity:</strong> Use uppercase, lowercase, numbers, and special characters randomly.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Avoid Patterns:</strong> Don't use sequential numbers, repeated characters, or keyboard patterns.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>No Personal Info:</strong> Avoid names, birthdays, addresses, or other easily discoverable information.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Passphrases:</strong> Consider using a random combination of words that's easy to remember but hard to guess.</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-user-lock text-green-600 mr-2"></i>
                            Password Management
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-sync-alt text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Unique Passwords:</strong> Use different passwords for every account to prevent credential stuffing attacks.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-history text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Regular Updates:</strong> Change passwords periodically, especially after security breaches.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-toolbox text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Password Managers:</strong> Use reputable password managers to generate and store complex passwords securely.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-mobile-alt text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Two-Factor Authentication:</strong> Enable 2FA wherever possible for an additional security layer.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Security Questions:</strong> Treat security questions like additional passwords - use random answers.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Password Security FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is password strength calculated?</h3>
                        <p class="text-gray-600">Password strength is calculated based on multiple factors including length, character diversity, randomness, absence of common patterns, and resistance to dictionary attacks. We use entropy calculations and common password databases to provide a comprehensive assessment.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What makes a password truly secure?</h3>
                        <p class="text-gray-600">A secure password is long (12+ characters), uses a mix of character types randomly, doesn't contain dictionary words or personal information, and is unique to each account. Passphrases combining multiple random words can be both secure and memorable.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are password managers safe to use?</h3>
                        <p class="text-gray-600">Reputable password managers are generally safe and significantly improve security. They use strong encryption, require a master password, and help you use unique, complex passwords for every account. The security benefits typically outweigh the risks when using trusted providers.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I change my passwords?</h3>
                        <p class="text-gray-600">Current best practices suggest changing passwords when there's evidence of compromise, not on a fixed schedule. However, for high-security accounts, consider changing every 3-6 months. Focus more on using strong, unique passwords than frequent changes.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between entropy and password strength?</h3>
                        <p class="text-gray-600">Entropy measures the randomness and unpredictability of a password in bits. Password strength combines entropy with other factors like resistance to common attacks and patterns. A password with high entropy but common patterns might still be weak against sophisticated attacks.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Security Tools</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-key text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Password Generator</h3>
                        <p class="text-gray-600 text-sm">Generate secure random passwords</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-user-shield text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">2FA Setup Guide</h3>
                        <p class="text-gray-600 text-sm">Set up two-factor authentication</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-fingerprint text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Data Breach Check</h3>
                        <p class="text-gray-600 text-sm">Check if your data was compromised</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Common passwords list (truncated for example)
const commonPasswords = [
    'password', '123456', '12345678', '1234', 'qwerty', '12345', 'dragon', 'baseball',
    'football', 'letmein', 'monkey', 'abc123', 'mustang', 'michael', 'shadow', 'master',
    'jennifer', '111111', 'superman', 'harley', '1234567', 'freedom', 'whatever', 'admin'
];

// Character sets for entropy calculation
const charSets = {
    lowercase: 'abcdefghijklmnopqrstuvwxyz',
    uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    numbers: '0123456789',
    symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?'
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    analyzePassword(); // Analyze with default password
});

function setupEventListeners() {
    // Auto-analyze on input change with debouncing
    document.getElementById('passwordInput').addEventListener('input', debounce(analyzePassword, 300));
    
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('passwordInput');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });
    
    // Update analysis when options change
    document.getElementById('minLength').addEventListener('change', analyzePassword);
    document.getElementById('checkCommon').addEventListener('change', analyzePassword);
    document.getElementById('showEntropy').addEventListener('change', analyzePassword);
    document.getElementById('crackTime').addEventListener('change', analyzePassword);
}

function analyzePassword() {
    const password = document.getElementById('passwordInput').value;
    const minLength = parseInt(document.getElementById('minLength').value);
    const checkCommon = document.getElementById('checkCommon').value;
    const showEntropy = document.getElementById('showEntropy').checked;
    const showCrackTime = document.getElementById('crackTime').checked;
    
    if (!password) {
        showEmptyState();
        return;
    }
    
    // Calculate password metrics
    const metrics = calculatePasswordMetrics(password);
    const requirements = checkPasswordRequirements(password, minLength);
    const strength = calculatePasswordStrength(metrics, requirements, checkCommon);
    const crackTime = estimateCrackTime(metrics.entropy);
    
    // Display results
    displayResults(password, metrics, requirements, strength, crackTime);
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
}

function calculatePasswordMetrics(password) {
    const metrics = {
        length: password.length,
        hasLowercase: /[a-z]/.test(password),
        hasUppercase: /[A-Z]/.test(password),
        hasNumbers: /[0-9]/.test(password),
        hasSymbols: /[^a-zA-Z0-9]/.test(password),
        entropy: calculateEntropy(password),
        commonPatterns: detectCommonPatterns(password)
    };
    
    return metrics;
}

function calculateEntropy(password) {
    let charsetSize = 0;
    
    if (/[a-z]/.test(password)) charsetSize += 26;
    if (/[A-Z]/.test(password)) charsetSize += 26;
    if (/[0-9]/.test(password)) charsetSize += 10;
    if (/[^a-zA-Z0-9]/.test(password)) charsetSize += 32; // Common symbols
    
    // If no character types detected, assume lowercase only
    if (charsetSize === 0) charsetSize = 26;
    
    return Math.log2(Math.pow(charsetSize, password.length));
}

function detectCommonPatterns(password) {
    const patterns = [];
    const lowerPassword = password.toLowerCase();
    
    // Check for common passwords
    if (commonPasswords.includes(lowerPassword)) {
        patterns.push('common_password');
    }
    
    // Check for sequential characters
    if (/(abc|bcd|cde|def|efg|fgh|ghi|hij|ijk|jkl|klm|lmn|mno|nop|opq|pqr|qrs|rst|stu|tuv|uvw|vwx|wxy|xyz)/i.test(password)) {
        patterns.push('sequential_letters');
    }
    
    if (/(012|123|234|345|456|567|678|789|890)/.test(password)) {
        patterns.push('sequential_numbers');
    }
    
    // Check for repeated characters
    if (/(.)\1{2,}/.test(password)) {
        patterns.push('repeated_characters');
    }
    
    // Check for keyboard patterns
    const keyboardPatterns = [
        'qwerty', 'asdfgh', 'zxcvbn', 'qazwsx', '123qwe'
    ];
    
    keyboardPatterns.forEach(pattern => {
        if (lowerPassword.includes(pattern)) {
            patterns.push('keyboard_pattern');
        }
    });
    
    // Check for dates
    if (/(19|20)\d{2}/.test(password) || /\d{1,2}[\/\-\.]\d{1,2}[\/\-\.](\d{2,4})?/.test(password)) {
        patterns.push('contains_date');
    }
    
    return patterns;
}

function checkPasswordRequirements(password, minLength) {
    const requirements = {
        length: password.length >= minLength,
        lowercase: /[a-z]/.test(password),
        uppercase: /[A-Z]/.test(password),
        numbers: /[0-9]/.test(password),
        symbols: /[^a-zA-Z0-9]/.test(password),
        noCommon: !commonPasswords.includes(password.toLowerCase()),
        noSequential: !/(abc|123|qwe|asd|zxc)/i.test(password)
    };
    
    requirements.allMet = Object.values(requirements).every(req => req === true);
    
    return requirements;
}

function calculatePasswordStrength(metrics, requirements, checkCommon) {
    let score = 0;
    const maxScore = 100;
    
    // Length score (up to 30 points)
    score += Math.min(30, (metrics.length / 20) * 30);
    
    // Character diversity (up to 40 points)
    let diversityScore = 0;
    if (metrics.hasLowercase) diversityScore += 10;
    if (metrics.hasUppercase) diversityScore += 10;
    if (metrics.hasNumbers) diversityScore += 10;
    if (metrics.hasSymbols) diversityScore += 10;
    score += diversityScore;
    
    // Entropy score (up to 20 points)
    score += Math.min(20, (metrics.entropy / 100) * 20);
    
    // Penalties for common patterns
    const penalty = metrics.commonPatterns.length * 5;
    score = Math.max(0, score - penalty);
    
    // Additional penalty for very common passwords
    if (checkCommon === 'strict' && commonPasswords.includes(metrics.password)) {
        score = Math.max(0, score - 20);
    }
    
    return Math.min(maxScore, Math.round(score));
}

function estimateCrackTime(entropy) {
    // Assuming 10^12 guesses per second (modern cracking hardware)
    const guessesPerSecond = 1e12;
    const possibleCombinations = Math.pow(2, entropy);
    const seconds = possibleCombinations / guessesPerSecond;
    
    if (seconds < 1) return 'Instant';
    if (seconds < 60) return 'Seconds';
    if (seconds < 3600) return `${Math.round(seconds / 60)} minutes`;
    if (seconds < 86400) return `${Math.round(seconds / 3600)} hours`;
    if (seconds < 31536000) return `${Math.round(seconds / 86400)} days`;
    if (seconds < 3153600000) return `${Math.round(seconds / 31536000)} years`;
    return 'Centuries';
}

function displayResults(password, metrics, requirements, strength, crackTime) {
    const resultsDiv = document.getElementById('results');
    const strengthMeter = document.getElementById('strengthMeter');
    const strengthText = document.getElementById('strengthText');
    
    // Update strength meter and text
    let strengthLevel, strengthColor;
    if (strength >= 80) {
        strengthLevel = 'Very Strong';
        strengthColor = 'bg-green-500';
    } else if (strength >= 60) {
        strengthLevel = 'Strong';
        strengthColor = 'bg-blue-500';
    } else if (strength >= 40) {
        strengthLevel = 'Moderate';
        strengthColor = 'bg-yellow-500';
    } else if (strength >= 20) {
        strengthLevel = 'Weak';
        strengthColor = 'bg-orange-500';
    } else {
        strengthLevel = 'Very Weak';
        strengthColor = 'bg-red-500';
    }
    
    strengthMeter.className = `h-2 rounded-full transition-all duration-500 ${strengthColor}`;
    strengthMeter.style.width = `${strength}%`;
    strengthText.textContent = strengthLevel;
    
    // Update main results card
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="text-center mb-4">
                <div class="text-lg font-bold text-gray-700 mb-2">Security Assessment</div>
                <div class="text-2xl font-bold ${getStrengthColorClass(strength)}">${strengthLevel}</div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 text-center">
                <div class="bg-blue-50 rounded-lg p-3">
                    <div class="text-sm text-blue-600 font-semibold">Length</div>
                    <div class="text-lg font-bold text-gray-800">${metrics.length} chars</div>
                </div>
                <div class="bg-green-50 rounded-lg p-3">
                    <div class="text-sm text-green-600 font-semibold">Crack Time</div>
                    <div class="text-lg font-bold text-gray-800">${crackTime}</div>
                </div>
            </div>
            
            <div class="bg-${requirements.allMet ? 'green' : 'amber'}-50 rounded-lg p-3 text-center">
                <div class="text-sm text-${requirements.allMet ? 'green' : 'amber'}-600 font-semibold">
                    ${requirements.allMet ? 'All Requirements Met' : 'Needs Improvement'}
                </div>
                <div class="text-xs text-gray-600 mt-1">${requirements.allMet ? 'Good job!' : 'Check requirements below'}</div>
            </div>
        </div>
    `;
    
    // Update detailed results
    updateDetailedResults(metrics, requirements, strength, crackTime);
}

function updateDetailedResults(metrics, requirements, strength, crackTime) {
    // Update security score cards
    document.getElementById('securityScore').textContent = `${strength}/100`;
    document.getElementById('crackTimeResult').textContent = crackTime;
    document.getElementById('entropyScore').textContent = `${Math.round(metrics.entropy)} bits`;
    
    // Update requirements list
    updateRequirementsList(requirements);
    
    // Update improvement suggestions
    updateImprovementSuggestions(metrics, requirements);
    
    // Update pattern analysis
    updatePatternAnalysis(metrics);
    
    // Update common threats
    updateCommonThreats(metrics);
    
    // Update examples
    updatePasswordExamples();
}

function updateRequirementsList(requirements) {
    const requirementsList = document.getElementById('requirementsList');
    const minLength = parseInt(document.getElementById('minLength').value);
    
    const requirementItems = [
        { 
            name: `Minimum ${minLength} characters`, 
            met: requirements.length,
            description: `Current: ${metrics.length} characters`
        },
        { 
            name: 'Lowercase letters (a-z)', 
            met: requirements.lowercase,
            description: 'Adds character diversity'
        },
        { 
            name: 'Uppercase letters (A-Z)', 
            met: requirements.uppercase,
            description: 'Increases complexity'
        },
        { 
            name: 'Numbers (0-9)', 
            met: requirements.numbers,
            description: 'Adds numerical variation'
        },
        { 
            name: 'Symbols (!@#$ etc.)', 
            met: requirements.symbols,
            description: 'Significantly improves security'
        },
        { 
            name: 'Not a common password', 
            met: requirements.noCommon,
            description: 'Avoids easily guessed passwords'
        },
        { 
            name: 'No sequential patterns', 
            met: requirements.noSequential,
            description: 'Prevents pattern-based attacks'
        }
    ];
    
    let requirementsHtml = '';
    requirementItems.forEach(item => {
        const icon = item.met ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500';
        const bgColor = item.met ? 'bg-green-50' : 'bg-red-50';
        
        requirementsHtml += `
            <div class="flex items-start p-3 ${bgColor} rounded-lg border ${item.met ? 'border-green-200' : 'border-red-200'}">
                <i class="fas ${icon} mt-1 mr-3"></i>
                <div class="flex-1">
                    <div class="font-medium ${item.met ? 'text-green-800' : 'text-red-800'}">${item.name}</div>
                    <div class="text-xs ${item.met ? 'text-green-600' : 'text-red-600'} mt-1">${item.description}</div>
                </div>
            </div>
        `;
    });
    
    requirementsList.innerHTML = requirementsHtml;
}

function updateImprovementSuggestions(metrics, requirements) {
    const suggestionsDiv = document.getElementById('improvementSuggestions');
    let suggestions = [];
    
    if (!requirements.length) {
        suggestions.push('Increase password length to at least 12 characters');
    }
    
    if (!requirements.lowercase) {
        suggestions.push('Add lowercase letters for better diversity');
    }
    
    if (!requirements.uppercase) {
        suggestions.push('Include uppercase letters to increase complexity');
    }
    
    if (!requirements.numbers) {
        suggestions.push('Incorporate numbers to improve strength');
    }
    
    if (!requirements.symbols) {
        suggestions.push('Add special characters for maximum security');
    }
    
    if (!requirements.noCommon) {
        suggestions.push('Avoid using common passwords or dictionary words');
    }
    
    if (metrics.commonPatterns.length > 0) {
        suggestions.push('Remove sequential or repeated character patterns');
    }
    
    if (suggestions.length === 0) {
        suggestions.push('Your password meets all security requirements! Consider using a password manager for better security practices.');
    }
    
    let suggestionsHtml = '';
    suggestions.forEach(suggestion => {
        suggestionsHtml += `
            <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
                <i class="fas fa-lightbulb text-blue-500 mt-1"></i>
                <div>
                    <p class="text-sm text-blue-700">${suggestion}</p>
                </div>
            </div>
        `;
    });
    
    suggestionsDiv.innerHTML = suggestionsHtml;
}

function updatePatternAnalysis(metrics) {
    const patternDiv = document.getElementById('patternAnalysis');
    let analysisHtml = '';
    
    // Character distribution
    analysisHtml += `
        <div class="bg-gray-50 rounded-lg p-4">
            <h4 class="font-semibold text-gray-800 mb-2">Character Distribution</h4>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Length:</span>
                    <span class="font-medium">${metrics.length} characters</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Character Types:</span>
                    <span class="font-medium">${getCharacterTypesCount(metrics)}/4</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Entropy Score:</span>
                    <span class="font-medium">${Math.round(metrics.entropy)} bits</span>
                </div>
            </div>
        </div>
    `;
    
    // Detected patterns
    if (metrics.commonPatterns.length > 0) {
        analysisHtml += `
            <div class="bg-amber-50 rounded-lg p-4">
                <h4 class="font-semibold text-amber-800 mb-2">Detected Patterns</h4>
                <div class="space-y-1 text-sm">
                    ${metrics.commonPatterns.map(pattern => `
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-amber-500 mr-2"></i>
                            <span class="text-amber-700">${getPatternDescription(pattern)}</span>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
    } else {
        analysisHtml += `
            <div class="bg-green-50 rounded-lg p-4">
                <h4 class="font-semibold text-green-800 mb-2">Pattern Analysis</h4>
                <div class="text-sm text-green-700">
                    <i class="fas fa-check-circle mr-1"></i>
                    No common patterns detected
                </div>
            </div>
        `;
    }
    
    patternDiv.innerHTML = analysisHtml;
}

function updateCommonThreats(metrics) {
    const threatsDiv = document.getElementById('commonThreats');
    let threats = [];
    
    if (metrics.length < 8) {
        threats.push('Brute force attacks can crack short passwords quickly');
    }
    
    if (metrics.commonPatterns.includes('common_password')) {
        threats.push('Dictionary attacks will instantly recognize common passwords');
    }
    
    if (metrics.commonPatterns.includes('sequential_letters') || metrics.commonPatterns.includes('sequential_numbers')) {
        threats.push('Pattern-based attacks can guess sequential characters easily');
    }
    
    if (metrics.commonPatterns.includes('keyboard_pattern')) {
        threats.push('Keyboard walk attacks target common keyboard patterns');
    }
    
    if (metrics.entropy < 40) {
        threats.push('Low entropy makes the password vulnerable to advanced cracking techniques');
    }
    
    if (threats.length === 0) {
        threats.push('Your password shows good resistance to common attack methods');
    }
    
    let threatsHtml = '';
    threats.forEach(threat => {
        threatsHtml += `
            <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-lg border border-red-200">
                <i class="fas fa-shield-alt text-red-500 mt-1"></i>
                <div>
                    <p class="text-sm text-red-700">${threat}</p>
                </div>
            </div>
        `;
    });
    
    threatsDiv.innerHTML = threatsHtml;
}

function updatePasswordExamples() {
    const strongExamples = [
        'Tr0ub4dour&3',
        'correct horse battery staple',
        'W@lk1ngD0g5#Sunset',
        'M0nkey$R1deUn1c0rn!',
        'C@t1nTh3H@t&Jump'
    ];
    
    const weakExamples = [
        'password123',
        '123456789',
        'qwertyuiop',
        'letmein',
        'admin123'
    ];
    
    let strongHtml = '';
    strongExamples.forEach(example => {
        strongHtml += `
            <div class="p-3 bg-green-50 rounded-lg border border-green-200">
                <div class="font-mono text-sm text-green-800">${example}</div>
                <div class="text-xs text-green-600 mt-1">Strong - mixes character types randomly</div>
            </div>
        `;
    });
    
    let weakHtml = '';
    weakExamples.forEach(example => {
        weakHtml += `
            <div class="p-3 bg-red-50 rounded-lg border border-red-200">
                <div class="font-mono text-sm text-red-800">${example}</div>
                <div class="text-xs text-red-600 mt-1">Weak - common patterns or words</div>
            </div>
        `;
    });
    
    document.getElementById('strongExamples').innerHTML = strongHtml;
    document.getElementById('weakExamples').innerHTML = weakHtml;
}

// Helper functions
function getStrengthColorClass(strength) {
    if (strength >= 80) return 'text-green-600';
    if (strength >= 60) return 'text-blue-600';
    if (strength >= 40) return 'text-yellow-600';
    if (strength >= 20) return 'text-orange-600';
    return 'text-red-600';
}

function getCharacterTypesCount(metrics) {
    let count = 0;
    if (metrics.hasLowercase) count++;
    if (metrics.hasUppercase) count++;
    if (metrics.hasNumbers) count++;
    if (metrics.hasSymbols) count++;
    return count;
}

function getPatternDescription(pattern) {
    const descriptions = {
        'common_password': 'Common password (easily guessed)',
        'sequential_letters': 'Sequential letters (abc, def, etc.)',
        'sequential_numbers': 'Sequential numbers (123, 456, etc.)',
        'repeated_characters': 'Repeated characters (aaa, 111, etc.)',
        'keyboard_pattern': 'Keyboard pattern (qwerty, asdf, etc.)',
        'contains_date': 'Contains date information'
    };
    return descriptions[pattern] || pattern;
}

// Quick test functions
function testCommonPassword() {
    document.getElementById('passwordInput').value = 'password123';
    analyzePassword();
}

function testStrongPassword() {
    document.getElementById('passwordInput').value = 'W@lk1ngD0g5#Sunset';
    analyzePassword();
}

function testWeakPassword() {
    document.getElementById('passwordInput').value = '123456';
    analyzePassword();
}

function generateStrongPassword() {
    const length = 16;
    const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
    let password = '';
    
    for (let i = 0; i < length; i++) {
        password += charset.charAt(Math.floor(Math.random() * charset.length));
    }
    
    document.getElementById('passwordInput').value = password;
    analyzePassword();
}

function clearPassword() {
    document.getElementById('passwordInput').value = '';
    showEmptyState();
}

function showEmptyState() {
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-lock text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter a password</p>
            <p class="text-sm">to see security analysis</p>
        </div>
    `;
    document.getElementById('detailedResults').classList.add('hidden');
    
    // Reset strength meter
    document.getElementById('strengthMeter').style.width = '0%';
    document.getElementById('strengthText').textContent = 'Very Weak';
}

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
</script>
@endsection