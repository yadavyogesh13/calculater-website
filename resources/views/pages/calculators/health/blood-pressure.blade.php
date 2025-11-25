@extends('layouts.app')

@section('title', 'Blood Pressure Calculator - Check Your BP Range & Category | CalculaterTools')

@section('meta-description', 'Free blood pressure calculator to check your BP readings, understand categories, and get personalized health recommendations. Monitor your cardiovascular health.')

@section('keywords', 'blood pressure calculator, BP calculator, hypertension, systolic, diastolic, blood pressure range, cardiovascular health, health calculator')

@section('canonical', url('/calculators/blood-pressure'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Blood Pressure Calculator",
    "description": "Calculate your blood pressure category and understand your cardiovascular health with personalized recommendations",
    "url": "{{ url('/calculators/blood-pressure') }}",
    "operatingSystem": "Any",
    "applicationCategory": "HealthApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script>
@endverbatim
<div class="min-h-screen bg-gray-50 py-8">
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
                        <a href="#health" class="text-blue-600 hover:text-blue-800 transition duration-150">Health Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Blood Pressure Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Blood Pressure Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Check your blood pressure readings to understand your cardiovascular health category and get personalized recommendations.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Check Your Blood Pressure</h2>
                        <p class="text-gray-600 mb-6">Enter your systolic and diastolic readings to assess your blood pressure category</p>
                        
                        <form id="bpCalculatorForm" class="space-y-6">
                            <!-- Blood Pressure Inputs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="systolic" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Systolic Pressure (mm Hg)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="systolic" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 120" 
                                            min="70" 
                                            max="200" 
                                            value="120"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">mm Hg</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">The top number in a blood pressure reading</p>
                                </div>
                                <div>
                                    <label for="diastolic" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Diastolic Pressure (mm Hg)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="diastolic" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 80" 
                                            min="40" 
                                            max="130" 
                                            value="80"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">mm Hg</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">The bottom number in a blood pressure reading</p>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="age" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Age (years)
                                    </label>
                                    <input 
                                        type="number" 
                                        id="age" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 45" 
                                        min="18" 
                                        max="120"
                                        value="45"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Gender
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button type="button" onclick="setGender('male')" class="gender-btn py-3 px-4 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                            <i class="fas fa-mars text-blue-600 text-lg mb-1"></i>
                                            <div class="text-sm font-medium text-gray-800">Male</div>
                                        </button>
                                        <button type="button" onclick="setGender('female')" class="gender-btn py-3 px-4 border border-gray-300 rounded-lg text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                            <i class="fas fa-venus text-pink-600 text-lg mb-1"></i>
                                            <div class="text-sm font-medium text-gray-800">Female</div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Profiles -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Profiles
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setProfile('optimal')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-heart text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Optimal</div>
                                    </button>
                                    <button type="button" onclick="setProfile('elevated')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-exclamation text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Elevated</div>
                                    </button>
                                    <button type="button" onclick="setProfile('stage1')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-exclamation-triangle text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Stage 1</div>
                                    </button>
                                    <button type="button" onclick="setProfile('stage2')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-heartbeat text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Stage 2</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateBP()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-heartbeat mr-2"></i>
                                Check Blood Pressure
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your BP Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-stethoscope text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your readings</p>
                                <p class="text-sm">to see your BP category</p>
                            </div>
                        </div>

                        <!-- BP Scale -->
                        <div id="bpScale" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">BP Categories</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 font-medium">Normal</span>
                                    <span class="text-gray-600">&lt; 120/80</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-yellow-600 font-medium">Elevated</span>
                                    <span class="text-gray-600">120-129/&lt;80</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-orange-600 font-medium">Stage 1</span>
                                    <span class="text-gray-600">130-139/80-89</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-red-600 font-medium">Stage 2</span>
                                    <span class="text-gray-600">≥ 140/90</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-red-700 font-medium">Crisis</span>
                                    <span class="text-gray-600">&gt; 180/120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Analysis -->
            <div id="analysisSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Health Analysis</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Health Insights -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Health Insights</h3>
                        <div class="space-y-3" id="healthInsights">
                        </div>
                    </div>
                    
                    <!-- Recommendations -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Recommendations</h3>
                        <div class="space-y-3" id="recommendations">
                        </div>
                    </div>
                </div>
            </div>

            <!-- BP Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Blood Pressure Categories Chart</h2>
                <div class="max-w-4xl mx-auto">
                    <div class="relative h-8 rounded-full mb-4 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-yellow-400 via-orange-400 to-red-500"></div>
                        <div class="absolute inset-0 flex justify-between items-center px-2 text-xs font-semibold text-white">
                            <span>Normal</span>
                            <span>Elevated</span>
                            <span>Stage 1</span>
                            <span>Stage 2</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-600 px-2">
                        <span>&lt;120</span>
                        <span>120</span>
                        <span>130</span>
                        <span>140</span>
                        <span>180</span>
                    </div>
                    <p class="text-center text-sm text-gray-500 mt-2">Systolic Blood Pressure (mm Hg)</p>
                </div>
            </div>

            <!-- Health Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Blood Pressure</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is Blood Pressure?</h3>
                        <p class="text-gray-600">Blood pressure is the force of blood pushing against the walls of your arteries as your heart pumps blood.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tachometer-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Two Numbers</h3>
                        <p class="text-gray-600">Systolic (top number) measures pressure when heart beats. Diastolic (bottom number) measures pressure between beats.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why It Matters</h3>
                        <p class="text-gray-600">High blood pressure increases risk of heart disease, stroke, and kidney problems without showing symptoms.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Blood Pressure FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a normal blood pressure reading?</h3>
                        <p class="text-gray-600">A normal blood pressure reading is typically less than 120/80 mm Hg. The systolic (top number) should be under 120 and diastolic (bottom number) under 80.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I check my blood pressure?</h3>
                        <p class="text-gray-600">If you have normal blood pressure, check it at least once a year. If you have high blood pressure or risk factors, your doctor may recommend more frequent monitoring.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What factors affect blood pressure?</h3>
                        <p class="text-gray-600">Diet (especially salt intake), physical activity, stress, alcohol consumption, smoking, age, genetics, and certain medications can all affect blood pressure.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I see a doctor about my blood pressure?</h3>
                        <p class="text-gray-600">Consult a doctor if your readings are consistently 130/80 or higher, or if you experience symptoms like severe headaches, chest pain, or vision problems.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I lower my blood pressure naturally?</h3>
                        <p class="text-gray-600">Yes, through lifestyle changes like reducing sodium intake, exercising regularly, maintaining a healthy weight, limiting alcohol, and managing stress.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Health Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('bmi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-weight text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Body Mass Index</p>
                    </a>
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-heartbeat text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Basal Metabolic Rate</p>
                    </a>
                    <a href="{{ route('heart.rate.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-heart text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Heart Rate Calculator</h3>
                        <p class="text-gray-600 text-sm">Check your target heart rate zones</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variables
let currentGender = 'male';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateBP(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change
    document.getElementById('systolic').addEventListener('input', debounce(calculateBP, 300));
    document.getElementById('diastolic').addEventListener('input', debounce(calculateBP, 300));
    document.getElementById('age').addEventListener('input', debounce(calculateBP, 300));
}

function setGender(gender) {
    currentGender = gender;
    
    document.querySelectorAll('.gender-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-pink-500', 'bg-pink-50');
    });
    
    if (gender === 'male') {
        event.target.classList.add('border-blue-500', 'bg-blue-50');
    } else {
        event.target.classList.add('border-pink-500', 'bg-pink-50');
    }
    
    calculateBP();
}

function setProfile(profile) {
    const profiles = {
        'optimal': { systolic: 115, diastolic: 75 },
        'elevated': { systolic: 125, diastolic: 78 },
        'stage1': { systolic: 135, diastolic: 85 },
        'stage2': { systolic: 150, diastolic: 95 }
    };
    
    const profileData = profiles[profile];
    
    document.getElementById('systolic').value = profileData.systolic;
    document.getElementById('diastolic').value = profileData.diastolic;
    
    // Update profile buttons
    document.querySelectorAll('.profile-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-yellow-500', 'bg-yellow-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'optimal': 'green',
        'elevated': 'yellow',
        'stage1': 'orange',
        'stage2': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[profile]}-500`, `bg-${colorMap[profile]}-50`);
    
    calculateBP();
}

function calculateBP() {
    const systolic = parseInt(document.getElementById('systolic').value);
    const diastolic = parseInt(document.getElementById('diastolic').value);
    const age = parseInt(document.getElementById('age').value) || 45;
    
    // Validation
    if (!systolic || systolic < 70 || systolic > 200) {
        showError('Please enter a valid systolic reading (70-200 mm Hg)');
        return;
    }
    if (!diastolic || diastolic < 40 || diastolic > 130) {
        showError('Please enter a valid diastolic reading (40-130 mm Hg)');
        return;
    }
    
    // Get BP category and color
    const { category, color, description } = getBPCategory(systolic, diastolic);
    
    // Display results
    displayResults(systolic, diastolic, category, color, description, age);
    
    // Generate detailed analysis
    generateDetailedAnalysis(systolic, diastolic, category, age, currentGender);
}

function getBPCategory(systolic, diastolic) {
    if (systolic < 120 && diastolic < 80) {
        return { 
            category: 'Normal', 
            color: 'green',
            description: 'Your blood pressure is within the normal range. Continue maintaining a healthy lifestyle.'
        };
    } else if (systolic >= 120 && systolic <= 129 && diastolic < 80) {
        return { 
            category: 'Elevated', 
            color: 'yellow',
            description: 'Your blood pressure is elevated. Consider lifestyle changes to prevent hypertension.'
        };
    } else if ((systolic >= 130 && systolic <= 139) || (diastolic >= 80 && diastolic <= 89)) {
        return { 
            category: 'Stage 1 Hypertension', 
            color: 'orange',
            description: 'You have Stage 1 hypertension. Lifestyle changes and possibly medication are recommended.'
        };
    } else if (systolic >= 140 || diastolic >= 90) {
        if (systolic > 180 || diastolic > 120) {
            return { 
                category: 'Hypertensive Crisis', 
                color: 'red',
                description: 'This is a hypertensive crisis. Seek immediate medical attention.'
            };
        }
        return { 
            category: 'Stage 2 Hypertension', 
            color: 'red',
            description: 'You have Stage 2 hypertension. Medical consultation and treatment are necessary.'
        };
    }
    
    // Default fallback
    return { 
        category: 'Check Readings', 
        color: 'gray',
        description: 'Please verify your blood pressure readings.'
    };
}

function displayResults(systolic, diastolic, category, color, description, age) {
    const bpColorClasses = {
        'green': 'from-green-50 to-green-100 border-green-200 text-green-700',
        'yellow': 'from-yellow-50 to-yellow-100 border-yellow-200 text-yellow-700',
        'orange': 'from-orange-50 to-orange-100 border-orange-200 text-orange-700',
        'red': 'from-red-50 to-red-100 border-red-200 text-red-700',
        'gray': 'from-gray-50 to-gray-100 border-gray-200 text-gray-700'
    };
    
    const colorClass = bpColorClasses[color] || bpColorClasses.gray;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main BP Result -->
            <div class="bg-gradient-to-r ${colorClass} rounded-xl p-6 border-2">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold mb-2">${systolic}/${diastolic}</div>
                    <div class="text-lg font-semibold">${category}</div>
                    <div class="text-sm opacity-75 mt-1">Blood Pressure</div>
                </div>
                <p class="text-sm text-center">${description}</p>
            </div>

            <!-- BP Scale Position -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Your BP Scale Position</h4>
                <div class="relative h-4 bg-gradient-to-r from-green-400 via-yellow-400 via-orange-400 to-red-500 rounded-full mb-2">
                    <div class="absolute w-3 h-6 bg-gray-800 rounded-full -top-1 -ml-1.5 border-2 border-white shadow-lg" 
                         style="left: ${Math.min(100, Math.max(0, ((systolic - 90) / (180 - 90)) * 100))}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>90</span>
                    <span>120</span>
                    <span>130</span>
                    <span>140</span>
                    <span>180</span>
                </div>
                <p class="text-center text-xs text-gray-500 mt-1">Systolic Blood Pressure (mm Hg)</p>
            </div>

            <!-- Additional Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${systolic}</div>
                    <div class="text-sm text-gray-600 mt-1">Systolic</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${diastolic}</div>
                    <div class="text-sm text-gray-600 mt-1">Diastolic</div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Next Steps</h4>
                <p class="text-sm text-blue-800" id="nextSteps">
                    ${getNextSteps(category)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('bpScale').classList.remove('hidden');
    document.getElementById('analysisSection').classList.remove('hidden');
}

function getNextSteps(category) {
    const nextSteps = {
        'Normal': 'Continue monitoring your blood pressure annually and maintain a healthy lifestyle.',
        'Elevated': 'Implement lifestyle changes and monitor your blood pressure every 3-6 months.',
        'Stage 1 Hypertension': 'Consult with a healthcare provider about lifestyle changes and possible medication.',
        'Stage 2 Hypertension': 'Seek medical consultation promptly for appropriate treatment.',
        'Hypertensive Crisis': 'This is a medical emergency. Seek immediate medical attention.'
    };
    
    return nextSteps[category] || 'Please consult with a healthcare provider for personalized advice.';
}

function generateDetailedAnalysis(systolic, diastolic, category, age, gender) {
    const insights = getHealthInsights(systolic, diastolic, category, age, gender);
    const recommendations = getRecommendations(category, age);
    
    document.getElementById('healthInsights').innerHTML = insights;
    document.getElementById('recommendations').innerHTML = recommendations;
}

function getHealthInsights(systolic, diastolic, category, age, gender) {
    let insights = [];
    
    if (category === 'Normal') {
        insights = [
            '<div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200"><i class="fas fa-check-circle text-green-600 mt-1 mr-3"></i><div class="text-sm text-green-800">Your blood pressure is in the healthy range with lower cardiovascular risks</div></div>',
            '<div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200"><i class="fas fa-heart text-green-600 mt-1 mr-3"></i><div class="text-sm text-green-800">Maintaining this level supports long-term heart health</div></div>'
        ];
    } else if (category === 'Elevated') {
        insights = [
            '<div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200"><i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i><div class="text-sm text-yellow-800">You are at increased risk of developing hypertension</div></div>',
            '<div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200"><i class="fas fa-heartbeat text-yellow-600 mt-1 mr-3"></i><div class="text-sm text-yellow-800">Lifestyle modifications now can prevent progression to hypertension</div></div>'
        ];
    } else if (category === 'Stage 1 Hypertension') {
        insights = [
            '<div class="flex items-start p-3 bg-orange-50 rounded-lg border border-orange-200"><i class="fas fa-exclamation-circle text-orange-600 mt-1 mr-3"></i><div class="text-sm text-orange-800">You have increased risk of heart disease and stroke</div></div>',
            '<div class="flex items-start p-3 bg-orange-50 rounded-lg border border-orange-200"><i class="fas fa-clipboard-list text-orange-600 mt-1 mr-3"></i><div class="text-sm text-orange-800">Medical consultation is recommended for proper management</div></div>'
        ];
    } else {
        insights = [
            '<div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200"><i class="fas fa-exclamation-circle text-red-600 mt-1 mr-3"></i><div class="text-sm text-red-800">You are at high risk for serious cardiovascular events</div></div>',
            '<div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200"><i class="fas fa-heart text-red-600 mt-1 mr-3"></i><div class="text-sm text-red-800">Immediate medical attention and treatment are necessary</div></div>'
        ];
    }
    
    // Add age-specific insight
    if (age > 60) {
        insights.push('<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Blood pressure management is particularly important as we age</div></div>');
    }
    
    return insights.join('');
}

function getRecommendations(category, age) {
    let recommendations = [];
    
    // General recommendations for all categories
    recommendations.push('<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-utensils text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Reduce sodium intake and eat a balanced diet rich in fruits and vegetables</div></div>');
    recommendations.push('<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-walking text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Aim for at least 150 minutes of moderate exercise per week</div></div>');
    
    if (category !== 'Normal') {
        recommendations.push('<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-weight text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Maintain a healthy weight - even 5-10% weight loss can help</div></div>');
        recommendations.push('<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-wine-bottle text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Limit alcohol consumption to moderate levels</div></div>');
    }
    
    if (category === 'Stage 1 Hypertension' || category === 'Stage 2 Hypertension' || category === 'Hypertensive Crisis') {
        recommendations.push('<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-user-md text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Consult with a healthcare provider for appropriate medication if needed</div></div>');
    }
    
    if (category === 'Hypertensive Crisis') {
        recommendations = [
            '<div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200"><i class="fas fa-ambulance text-red-600 mt-1 mr-3"></i><div class="text-sm text-red-800">This is a medical emergency - seek immediate medical attention</div></div>',
            '<div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200"><i class="fas fa-hospital text-red-600 mt-1 mr-3"></i><div class="text-sm text-red-800">Do not wait to see if your blood pressure comes down on its own</div></div>'
        ];
    }
    
    return recommendations.join('');
}

function showError(message) {
    const resultsHTML = `
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-red-600 mr-3"></i>
                <div class="text-red-800 font-medium">${message}</div>
            </div>
        </div>
    `;
    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('bpScale').classList.add('hidden');
    document.getElementById('analysisSection').classList.add('hidden');
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