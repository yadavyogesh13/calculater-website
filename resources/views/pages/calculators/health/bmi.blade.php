@extends('layouts.app')

@section('title', 'BMI Calculator - Calculate Your Body Mass Index | CalculaterTools')

@section('meta-description', 'Free BMI calculator to calculate your Body Mass Index and understand your weight category. Get personalized health insights and recommendations.')

@section('keywords', 'BMI calculator, body mass index, weight calculator, health calculator, BMI chart, weight category, health assessment')

@section('canonical', url('/calculators/bmi'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "BMI Calculator",
    "description": "Calculate your Body Mass Index (BMI) and understand your weight category with personalized health insights",
    "url": "{{ url('/calculators/bmi') }}",
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
                    <li class="text-gray-500">BMI Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">BMI Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your Body Mass Index (BMI) to understand your weight category and get personalized health insights.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your BMI</h2>
                        <p class="text-gray-600 mb-6">Enter your height and weight to calculate your Body Mass Index</p>
                        
                        <form id="bmiCalculatorForm" class="space-y-6">
                            <!-- Measurement System -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Measurement System
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <button type="button" id="metricBtn" class="system-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-ruler-combined mr-2"></i>
                                        Metric (kg, cm)
                                    </button>
                                    <button type="button" id="imperialBtn" class="system-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-weight mr-2"></i>
                                        Imperial (lbs, ft/in)
                                    </button>
                                </div>
                            </div>

                            <!-- Metric Inputs -->
                            <div id="metricInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="heightCm" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Height (cm)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="heightCm" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 170" 
                                                min="50" 
                                                max="250" 
                                                step="0.1"
                                                value="170"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">cm</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="weightKg" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Weight (kg)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="weightKg" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 70" 
                                                min="20" 
                                                max="300" 
                                                step="0.1"
                                                value="70"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Imperial Inputs -->
                            <div id="imperialInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800 mb-2">
                                            Height
                                        </label>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="heightFeet" 
                                                    class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                    placeholder="Feet" 
                                                    min="3" 
                                                    max="8"
                                                    value="5"
                                                    required
                                                >
                                                <span class="absolute right-3 top-3 text-gray-500">ft</span>
                                            </div>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="heightInches" 
                                                    class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                    placeholder="Inches" 
                                                    min="0" 
                                                    max="11"
                                                    value="7"
                                                    required
                                                >
                                                <span class="absolute right-3 top-3 text-gray-500">in</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="weightLbs" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Weight (lbs)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="weightLbs" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 150" 
                                                min="50" 
                                                max="600" 
                                                step="0.1"
                                                value="154"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">lbs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Age and Gender -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="age" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Age (years)
                                    </label>
                                    <input 
                                        type="number" 
                                        id="age" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 30" 
                                        min="2" 
                                        max="120"
                                        value="30"
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
                                    <button type="button" onclick="setProfile('underweight')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-weight-hanging text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Underweight</div>
                                    </button>
                                    <button type="button" onclick="setProfile('normal')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-weight text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Normal</div>
                                    </button>
                                    <button type="button" onclick="setProfile('overweight')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-weight text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Overweight</div>
                                    </button>
                                    <button type="button" onclick="setProfile('obese')" class="profile-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-weight text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Obese</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateBMI()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate BMI
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your BMI Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-heartbeat text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see your BMI result</p>
                            </div>
                        </div>

                        <!-- BMI Scale -->
                        <div id="bmiScale" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">BMI Categories</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-yellow-600 font-medium">Underweight</span>
                                    <span class="text-gray-600">&lt; 18.5</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 font-medium">Normal</span>
                                    <span class="text-gray-600">18.5 - 24.9</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-orange-600 font-medium">Overweight</span>
                                    <span class="text-gray-600">25 - 29.9</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-red-600 font-medium">Obese</span>
                                    <span class="text-gray-600">≥ 30</span>
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

            <!-- BMI Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">BMI Categories Chart</h2>
                <div class="max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-yellow-400 via-green-400 via-orange-400 to-red-500 h-8 rounded-full mb-4 relative">
                        <div class="absolute inset-0 flex justify-between items-center px-2 text-xs font-semibold text-white">
                            <span>Underweight</span>
                            <span>Normal</span>
                            <span>Overweight</span>
                            <span>Obese</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-600 px-2">
                        <span>16</span>
                        <span>18.5</span>
                        <span>25</span>
                        <span>30</span>
                        <span>35</span>
                        <span>40</span>
                    </div>
                </div>
            </div>

            <!-- Health Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding BMI</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is BMI?</h3>
                        <p class="text-gray-600">Body Mass Index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Health Indicator</h3>
                        <p class="text-gray-600">BMI is a reliable indicator of body fatness for most people and is used to screen for weight categories.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Limitations</h3>
                        <p class="text-gray-600">BMI may overestimate body fat in athletes and underestimate it in older persons with lost muscle mass.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">BMI FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a healthy BMI range?</h3>
                        <p class="text-gray-600">A healthy BMI range for adults is between 18.5 and 24.9. This range is associated with the lowest health risks.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is BMI accurate for everyone?</h3>
                        <p class="text-gray-600">BMI is a useful screening tool but doesn't account for muscle mass, bone density, or body composition. Athletes and elderly individuals may get misleading results.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I check my BMI?</h3>
                        <p class="text-gray-600">For most adults, checking BMI every 3-6 months is sufficient unless you're actively trying to lose or gain weight.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can children use this calculator?</h3>
                        <p class="text-gray-600">This calculator is designed for adults (20+ years). Children and teens require age and gender-specific BMI percentiles.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between BMI and body fat percentage?</h3>
                        <p class="text-gray-600">BMI estimates body fat based on height and weight, while body fat percentage directly measures fat mass. Body fat percentage is more accurate but harder to measure.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Health Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-heartbeat text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Basal Metabolic Rate</p>
                    </a>
                    <a href="{{ route('body.fat.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Body Fat Calculator</h3>
                        <p class="text-gray-600 text-sm">Estimate your body fat percentage</p>
                    </a>
                    <a href="{{ route('ideal.weight.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-weight text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Ideal Weight Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your healthy weight range</p>
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
let currentSystem = 'metric';
let currentGender = 'male';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateBMI(); // Calculate with default values
});

function setupEventListeners() {
    // Measurement system toggle
    document.getElementById('metricBtn').addEventListener('click', () => setMeasurementSystem('metric'));
    document.getElementById('imperialBtn').addEventListener('click', () => setMeasurementSystem('imperial'));
    
    // Auto-calculate on input change
    document.getElementById('heightCm').addEventListener('input', debounce(calculateBMI, 300));
    document.getElementById('weightKg').addEventListener('input', debounce(calculateBMI, 300));
    document.getElementById('heightFeet').addEventListener('input', debounce(calculateBMI, 300));
    document.getElementById('heightInches').addEventListener('input', debounce(calculateBMI, 300));
    document.getElementById('weightLbs').addEventListener('input', debounce(calculateBMI, 300));
    document.getElementById('age').addEventListener('input', debounce(calculateBMI, 300));
}

function setMeasurementSystem(system) {
    currentSystem = system;
    
    if (system === 'metric') {
        document.getElementById('metricBtn').classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('metricBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('imperialBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('imperialBtn').classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('metricInputs').classList.remove('hidden');
        document.getElementById('imperialInputs').classList.add('hidden');
    } else {
        document.getElementById('imperialBtn').classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('imperialBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('metricBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('metricBtn').classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('imperialInputs').classList.remove('hidden');
        document.getElementById('metricInputs').classList.add('hidden');
    }
    
    calculateBMI();
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
    
    calculateBMI();
}

function setProfile(profile) {
    const profiles = {
        'underweight': { metric: { height: 180, weight: 55 }, imperial: { feet: 5, inches: 11, weight: 121 } },
        'normal': { metric: { height: 170, weight: 70 }, imperial: { feet: 5, inches: 7, weight: 154 } },
        'overweight': { metric: { height: 165, weight: 75 }, imperial: { feet: 5, inches: 5, weight: 165 } },
        'obese': { metric: { height: 160, weight: 90 }, imperial: { feet: 5, inches: 3, weight: 198 } }
    };
    
    const profileData = profiles[profile];
    
    if (currentSystem === 'metric') {
        document.getElementById('heightCm').value = profileData.metric.height;
        document.getElementById('weightKg').value = profileData.metric.weight;
    } else {
        document.getElementById('heightFeet').value = profileData.imperial.feet;
        document.getElementById('heightInches').value = profileData.imperial.inches;
        document.getElementById('weightLbs').value = profileData.imperial.weight;
    }
    
    // Update profile buttons
    document.querySelectorAll('.profile-btn').forEach(btn => {
        btn.classList.remove('border-yellow-500', 'bg-yellow-50', 'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'underweight': 'yellow',
        'normal': 'green',
        'overweight': 'orange',
        'obese': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[profile]}-500`, `bg-${colorMap[profile]}-50`);
    
    calculateBMI();
}

function calculateBMI() {
    let height, weight, bmi;
    
    if (currentSystem === 'metric') {
        height = parseFloat(document.getElementById('heightCm').value) / 100; // Convert cm to meters
        weight = parseFloat(document.getElementById('weightKg').value);
    } else {
        const feet = parseFloat(document.getElementById('heightFeet').value);
        const inches = parseFloat(document.getElementById('heightInches').value);
        height = (feet * 12 + inches) * 0.0254; // Convert to meters
        weight = parseFloat(document.getElementById('weightLbs').value) * 0.453592; // Convert lbs to kg
    }
    
    const age = parseInt(document.getElementById('age').value) || 30;
    
    // Validation
    if (!height || height <= 0) {
        showError('Please enter a valid height');
        return;
    }
    if (!weight || weight <= 0) {
        showError('Please enter a valid weight');
        return;
    }
    
    // Calculate BMI
    bmi = weight / (height * height);
    
    // Get BMI category and color
    const { category, color } = getBMICategory(bmi);
    
    // Display results
    displayResults(bmi, category, color, height, weight, age);
    
    // Generate detailed analysis
    generateDetailedAnalysis(bmi, category, age, currentGender);
}

function getBMICategory(bmi) {
    if (bmi < 16) return { category: 'Severely Underweight', color: 'red' };
    if (bmi < 18.5) return { category: 'Underweight', color: 'yellow' };
    if (bmi < 25) return { category: 'Normal Weight', color: 'green' };
    if (bmi < 30) return { category: 'Overweight', color: 'orange' };
    if (bmi < 35) return { category: 'Obese Class I', color: 'red' };
    if (bmi < 40) return { category: 'Obese Class II', color: 'red' };
    return { category: 'Obese Class III', color: 'red' };
}

function displayResults(bmi, category, color, height, weight, age) {
    const bmiColorClasses = {
        'yellow': 'from-yellow-50 to-yellow-100 border-yellow-200 text-yellow-700',
        'green': 'from-green-50 to-green-100 border-green-200 text-green-700',
        'orange': 'from-orange-50 to-orange-100 border-orange-200 text-orange-700',
        'red': 'from-red-50 to-red-100 border-red-200 text-red-700'
    };
    
    const colorClass = bmiColorClasses[color] || bmiColorClasses.green;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main BMI Result -->
            <div class="bg-gradient-to-r ${colorClass} rounded-xl p-6 border-2">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold mb-2">${bmi.toFixed(1)}</div>
                    <div class="text-lg font-semibold">${category}</div>
                    <div class="text-sm opacity-75 mt-1">Body Mass Index</div>
                </div>
            </div>

            <!-- BMI Scale Position -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Your BMI Scale</h4>
                <div class="relative h-4 bg-gradient-to-r from-yellow-400 via-green-400 via-orange-400 to-red-500 rounded-full mb-2">
                    <div class="absolute w-3 h-6 bg-gray-800 rounded-full -top-1 -ml-1.5 border-2 border-white shadow-lg" 
                         style="left: ${Math.min(100, Math.max(0, ((bmi - 16) / (40 - 16)) * 100))}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>16</span>
                    <span>18.5</span>
                    <span>25</span>
                    <span>30</span>
                    <span>35</span>
                    <span>40</span>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${currentSystem === 'metric' ? weight.toFixed(1) + ' kg' : (weight / 0.453592).toFixed(1) + ' lbs'}</div>
                    <div class="text-sm text-gray-600 mt-1">Current Weight</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${currentSystem === 'metric' ? (height * 100).toFixed(1) + ' cm' : (height / 0.0254).toFixed(1) + ' inches'}</div>
                    <div class="text-sm text-gray-600 mt-1">Height</div>
                </div>
            </div>

            <!-- Healthy Weight Range -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Healthy Weight Range</h4>
                <p class="text-sm text-blue-800">
                    For your height, a healthy weight range is 
                    <strong>${calculateHealthyWeightRange(height).min} - ${calculateHealthyWeightRange(height).max} ${currentSystem === 'metric' ? 'kg' : 'lbs'}</strong>
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('bmiScale').classList.remove('hidden');
    document.getElementById('analysisSection').classList.remove('hidden');
}

function calculateHealthyWeightRange(height) {
    const minBMI = 18.5;
    const maxBMI = 24.9;
    
    if (currentSystem === 'metric') {
        return {
            min: (minBMI * height * height).toFixed(1),
            max: (maxBMI * height * height).toFixed(1)
        };
    } else {
        const minKg = minBMI * height * height;
        const maxKg = maxBMI * height * height;
        return {
            min: (minKg / 0.453592).toFixed(1),
            max: (maxKg / 0.453592).toFixed(1)
        };
    }
}

function generateDetailedAnalysis(bmi, category, age, gender) {
    const insights = getHealthInsights(bmi, category, age, gender);
    const recommendations = getRecommendations(bmi, category);
    
    document.getElementById('healthInsights').innerHTML = insights;
    document.getElementById('recommendations').innerHTML = recommendations;
}

function getHealthInsights(bmi, category, age, gender) {
    let insights = [];
    
    if (bmi < 18.5) {
        insights = [
            '<div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200"><i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i><div class="text-sm text-yellow-800">You may be at risk for nutritional deficiencies and osteoporosis</div></div>',
            '<div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200"><i class="fas fa-heart text-yellow-600 mt-1 mr-3"></i><div class="text-sm text-yellow-800">Low body weight can affect immune function and energy levels</div></div>'
        ];
    } else if (bmi < 25) {
        insights = [
            '<div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200"><i class="fas fa-check-circle text-green-600 mt-1 mr-3"></i><div class="text-sm text-green-800">You are in the healthy weight range with lower health risks</div></div>',
            '<div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200"><i class="fas fa-heart text-green-600 mt-1 mr-3"></i><div class="text-sm text-green-800">Maintaining this weight supports overall health and wellbeing</div></div>'
        ];
    } else if (bmi < 30) {
        insights = [
            '<div class="flex items-start p-3 bg-orange-50 rounded-lg border border-orange-200"><i class="fas fa-exclamation-triangle text-orange-600 mt-1 mr-3"></i><div class="text-sm text-orange-800">You may be at increased risk for developing health problems</div></div>',
            '<div class="flex items-start p-3 bg-orange-50 rounded-lg border border-orange-200"><i class="fas fa-heartbeat text-orange-600 mt-1 mr-3"></i><div class="text-sm text-orange-800">Moderate weight loss can significantly improve health outcomes</div></div>'
        ];
    } else {
        insights = [
            '<div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200"><i class="fas fa-exclamation-circle text-red-600 mt-1 mr-3"></i><div class="text-sm text-red-800">You are at high risk for serious health conditions</div></div>',
            '<div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200"><i class="fas fa-heart text-red-600 mt-1 mr-3"></i><div class="text-sm text-red-800">Consult with a healthcare provider for personalized guidance</div></div>'
        ];
    }
    
    return insights.join('');
}

function getRecommendations(bmi, category) {
    let recommendations = [];
    
    if (bmi < 18.5) {
        recommendations = [
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-utensils text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Focus on nutrient-dense foods and gradual weight gain</div></div>',
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-dumbbell text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Include strength training to build muscle mass</div></div>'
        ];
    } else if (bmi < 25) {
        recommendations = [
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-utensils text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Maintain a balanced diet with regular physical activity</div></div>',
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-heart text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Continue healthy habits for long-term wellbeing</div></div>'
        ];
    } else {
        recommendations = [
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-utensils text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Focus on portion control and balanced nutrition</div></div>',
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-walking text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Aim for 150+ minutes of moderate exercise weekly</div></div>'
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
    document.getElementById('bmiScale').classList.add('hidden');
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