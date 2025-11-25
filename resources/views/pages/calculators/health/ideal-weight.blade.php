@extends('layouts.app')

@section('title', 'Ideal Weight Calculator - Calculate Your Healthy Weight Range | CalculaterTools')

@section('meta-description', 'Free ideal weight calculator to determine your healthy weight range based on height, gender, and body frame. Get personalized weight recommendations and BMI analysis.')

@section('keywords', 'ideal weight calculator, healthy weight, weight range calculator, body weight calculator, target weight, BMI calculator')

@section('canonical', url('/calculators/ideal-weight'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Ideal Weight Calculator",
    "description": "Calculate your ideal weight range based on height, gender, and body frame size with multiple scientific formulas",
    "url": "{{ url('/calculators/ideal-weight') }}",
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
                    <li class="text-gray-500">Ideal Weight Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Ideal Weight Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Discover your healthy weight range using multiple scientific formulas. Get personalized recommendations based on your height, gender, and body frame.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Ideal Weight</h2>
                        <p class="text-gray-600 mb-6">Enter your details to discover your healthy weight range</p>
                        
                        <form id="idealWeightCalculatorForm" class="space-y-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Gender
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button type="button" onclick="setGender('male')" class="gender-btn py-3 px-4 border border-blue-500 bg-blue-50 rounded-lg text-center transition duration-200">
                                            <i class="fas fa-mars text-blue-600 text-lg mb-1"></i>
                                            <div class="text-sm font-medium text-gray-800">Male</div>
                                        </button>
                                        <button type="button" onclick="setGender('female')" class="gender-btn py-3 px-4 border border-gray-300 rounded-lg text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                            <i class="fas fa-venus text-pink-600 text-lg mb-1"></i>
                                            <div class="text-sm font-medium text-gray-800">Female</div>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Measurement
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button type="button" id="metricBtn" class="system-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg text-center transition duration-200">
                                            <div class="text-sm font-medium">Metric</div>
                                        </button>
                                        <button type="button" id="imperialBtn" class="system-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg text-center hover:border-gray-400 transition duration-200">
                                            <div class="text-sm font-medium">Imperial</div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Height Input -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Height
                                </label>
                                <!-- Metric Input -->
                                <div id="metricInputs">
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="heightCm" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 170" 
                                            min="100" 
                                            max="250" 
                                            step="0.1"
                                            value="170"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">cm</span>
                                    </div>
                                </div>
                                <!-- Imperial Input -->
                                <div id="imperialInputs" class="hidden">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="heightFeet" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="Feet" 
                                                min="4" 
                                                max="7"
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
                            </div>

                            <!-- Body Frame Size -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Body Frame Size
                                </label>
                                <div class="grid grid-cols-3 gap-3">
                                    <button type="button" onclick="setFrameSize('small')" class="frame-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Small</div>
                                        <div class="text-xs text-gray-500">Slender build</div>
                                    </button>
                                    <button type="button" onclick="setFrameSize('medium')" class="frame-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-user text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Medium</div>
                                        <div class="text-xs text-gray-500">Average build</div>
                                    </button>
                                    <button type="button" onclick="setFrameSize('large')" class="frame-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-user text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Large</div>
                                        <div class="text-xs text-gray-500">Stocky build</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Age (Optional) -->
                            <div>
                                <label for="age" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Age (years) - Optional
                                </label>
                                <input 
                                    type="number" 
                                    id="age" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="e.g., 30" 
                                    min="18" 
                                    max="80"
                                >
                                <p class="text-sm text-gray-500 mt-1">Age helps provide more accurate recommendations for adults</p>
                            </div>

                            <!-- Current Weight (Optional) -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Current Weight (Optional)
                                </label>
                                <!-- Metric Weight -->
                                <div id="metricWeightInput">
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="currentWeightKg" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 70" 
                                            min="30" 
                                            max="300" 
                                            step="0.1"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">kg</span>
                                    </div>
                                </div>
                                <!-- Imperial Weight -->
                                <div id="imperialWeightInput" class="hidden">
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="currentWeightLbs" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 150" 
                                            min="66" 
                                            max="660" 
                                            step="0.1"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">lbs</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateIdealWeight()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Ideal Weight
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Ideal Weight</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-weight text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see your ideal weight range</p>
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Weight Analysis</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Different Formulas -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Weight by Different Formulas</h3>
                        <div class="space-y-4" id="formulaResults">
                        </div>
                    </div>
                    
                    <!-- Progress Tracking -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Progress</h3>
                        <div class="space-y-4" id="progressAnalysis">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weight Ranges Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Ideal Weight Ranges</h2>
                <div class="max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-yellow-400 via-green-400 via-orange-400 to-red-500 h-8 rounded-full mb-4 relative">
                        <div class="absolute inset-0 flex justify-between items-center px-2 text-xs font-semibold text-white">
                            <span>Underweight</span>
                            <span>Healthy</span>
                            <span>Overweight</span>
                            <span>Obese</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-600 px-2 mb-8">
                        <span>BMI 16</span>
                        <span>BMI 18.5</span>
                        <span>BMI 25</span>
                        <span>BMI 30</span>
                        <span>BMI 35</span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-2xl font-bold text-green-600 mb-2">18.5 - 24.9</div>
                            <div class="text-lg font-semibold text-gray-700">Healthy BMI Range</div>
                            <div class="text-sm text-gray-600 mt-2">Associated with lowest health risks and optimal wellbeing</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2">± 10%</div>
                            <div class="text-lg font-semibold text-gray-700">Frame Size Adjustment</div>
                            <div class="text-sm text-gray-600 mt-2">Small or large frame sizes adjust the ideal range</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2">5+ Formulas</div>
                            <div class="text-lg font-semibold text-gray-700">Scientific Methods</div>
                            <div class="text-sm text-gray-600 mt-2">Multiple calculations for comprehensive analysis</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Ideal Weight Matters</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Heart Health</h3>
                        <p class="text-gray-600">Maintaining a healthy weight reduces strain on your cardiovascular system and lowers heart disease risk.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bone text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Joint Protection</h3>
                        <p class="text-gray-600">Healthy weight reduces pressure on joints, decreasing arthritis risk and improving mobility.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bed text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Better Sleep</h3>
                        <p class="text-gray-600">Proper weight management can reduce sleep apnea and improve sleep quality.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-brain text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Mental Wellbeing</h3>
                        <p class="text-gray-600">Healthy weight is linked to better self-esteem, reduced depression risk, and improved cognitive function.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Ideal Weight FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why are there different ideal weight formulas?</h3>
                        <p class="text-gray-600">Different formulas account for various factors like body frame, muscle mass, and population differences. Using multiple formulas provides a more comprehensive range.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does body frame size affect ideal weight?</h3>
                        <p class="text-gray-600">People with larger frames can healthily carry more weight due to greater bone structure and muscle mass, while smaller-framed individuals have lower optimal weights.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is BMI the best measure of healthy weight?</h3>
                        <p class="text-gray-600">BMI is a useful screening tool but doesn't account for muscle mass. Athletes may have high BMI but low body fat. It's best used with other measurements.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should age affect my ideal weight?</h3>
                        <p class="text-gray-600">While some weight gain with age is normal, maintaining a BMI between 18.5-24.9 is generally recommended for adults of all ages.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What if I'm muscular and my BMI is high?</h3>
                        <p class="text-gray-600">If you have high muscle mass, focus on body fat percentage instead of BMI. A body fat test can provide more accurate health assessment.</p>
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
                        <p class="text-gray-600 text-sm">Calculate your Body Mass Index and weight category</p>
                    </a>
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-fire text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Basal Metabolic Rate</p>
                    </a>
                    <a href="{{ route('ideal.weight.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-balance-scale text-purple-600 text-xl"></i>
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
let currentFrameSize = 'medium';

// Frame size multipliers
const frameMultipliers = {
    'small': 0.9,
    'medium': 1.0,
    'large': 1.1
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateIdealWeight(); // Calculate with default values
});

function setupEventListeners() {
    // Measurement system toggle
    document.getElementById('metricBtn').addEventListener('click', () => setMeasurementSystem('metric'));
    document.getElementById('imperialBtn').addEventListener('click', () => setMeasurementSystem('imperial'));
    
    // Auto-calculate on input change
    document.getElementById('heightCm').addEventListener('input', debounce(calculateIdealWeight, 300));
    document.getElementById('heightFeet').addEventListener('input', debounce(calculateIdealWeight, 300));
    document.getElementById('heightInches').addEventListener('input', debounce(calculateIdealWeight, 300));
    document.getElementById('currentWeightKg').addEventListener('input', debounce(calculateIdealWeight, 300));
    document.getElementById('currentWeightLbs').addEventListener('input', debounce(calculateIdealWeight, 300));
    document.getElementById('age').addEventListener('input', debounce(calculateIdealWeight, 300));
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
        document.getElementById('metricWeightInput').classList.remove('hidden');
        document.getElementById('imperialWeightInput').classList.add('hidden');
    } else {
        document.getElementById('imperialBtn').classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('imperialBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('metricBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('metricBtn').classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('imperialInputs').classList.remove('hidden');
        document.getElementById('metricInputs').classList.add('hidden');
        document.getElementById('imperialWeightInput').classList.remove('hidden');
        document.getElementById('metricWeightInput').classList.add('hidden');
    }
    
    calculateIdealWeight();
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
    
    calculateIdealWeight();
}

function setFrameSize(frameSize) {
    currentFrameSize = frameSize;
    
    document.querySelectorAll('.frame-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-orange-500', 'bg-orange-50');
    });
    
    const colorMap = {
        'small': 'blue',
        'medium': 'blue',
        'large': 'orange'
    };
    
    event.target.classList.add(`border-${colorMap[frameSize]}-500`, `bg-${colorMap[frameSize]}-50`);
    
    calculateIdealWeight();
}

function calculateIdealWeight() {
    let height, currentWeight;
    
    // Get height
    if (currentSystem === 'metric') {
        height = parseFloat(document.getElementById('heightCm').value);
        currentWeight = parseFloat(document.getElementById('currentWeightKg').value);
    } else {
        const feet = parseFloat(document.getElementById('heightFeet').value);
        const inches = parseFloat(document.getElementById('heightInches').value);
        height = (feet * 12 + inches) * 2.54; // Convert to cm
        currentWeight = parseFloat(document.getElementById('currentWeightLbs').value) * 0.453592; // Convert to kg
    }
    
    const age = parseInt(document.getElementById('age').value);
    
    // Validation
    if (!height || height <= 0) {
        showError('Please enter a valid height');
        return;
    }
    
    // Calculate ideal weight using multiple formulas
    const heightMeters = height / 100;
    
    // Formula 1: Devine Formula (Most common)
    let devineWeight;
    if (currentGender === 'male') {
        devineWeight = 50 + 2.3 * ((height / 2.54) - 60);
    } else {
        devineWeight = 45.5 + 2.3 * ((height / 2.54) - 60);
    }
    
    // Formula 2: Robinson Formula
    let robinsonWeight;
    if (currentGender === 'male') {
        robinsonWeight = 52 + 1.9 * ((height / 2.54) - 60);
    } else {
        robinsonWeight = 49 + 1.7 * ((height / 2.54) - 60);
    }
    
    // Formula 3: Miller Formula
    let millerWeight;
    if (currentGender === 'male') {
        millerWeight = 56.2 + 1.41 * ((height / 2.54) - 60);
    } else {
        millerWeight = 53.1 + 1.36 * ((height / 2.54) - 60);
    }
    
    // Formula 4: Hamwi Formula
    let hamwiWeight;
    if (currentGender === 'male') {
        hamwiWeight = 48 + 2.7 * ((height / 2.54) - 60);
    } else {
        hamwiWeight = 45.5 + 2.2 * ((height / 2.54) - 60);
    }
    
    // Formula 5: BMI-based range (18.5 - 24.9)
    const bmiMin = 18.5 * heightMeters * heightMeters;
    const bmiMax = 24.9 * heightMeters * heightMeters;
    
    // Apply frame size adjustment
    const frameMultiplier = frameMultipliers[currentFrameSize];
    const adjustedBMIMin = bmiMin * frameMultiplier;
    const adjustedBMIMax = bmiMax * frameMultiplier;
    
    // Calculate average of all formulas
    const formulaWeights = [devineWeight, robinsonWeight, millerWeight, hamwiWeight];
    const averageWeight = formulaWeights.reduce((a, b) => a + b, 0) / formulaWeights.length;
    
    // Apply frame adjustment to average
    const adjustedAverage = averageWeight * frameMultiplier;
    
    // Create comprehensive weight range
    const weightRange = {
        min: Math.min(adjustedBMIMin, adjustedAverage * 0.95),
        max: Math.max(adjustedBMIMax, adjustedAverage * 1.05),
        bmiRange: { min: adjustedBMIMin, max: adjustedBMIMax },
        formulas: {
            devine: devineWeight * frameMultiplier,
            robinson: robinsonWeight * frameMultiplier,
            miller: millerWeight * frameMultiplier,
            hamwi: hamwiWeight * frameMultiplier,
            average: adjustedAverage
        }
    };
    
    // Convert back to imperial if needed
    if (currentSystem === 'imperial') {
        weightRange.min = weightRange.min / 0.453592;
        weightRange.max = weightRange.max / 0.453592;
        weightRange.bmiRange.min = weightRange.bmiRange.min / 0.453592;
        weightRange.bmiRange.max = weightRange.bmiRange.max / 0.453592;
        weightRange.formulas.devine = weightRange.formulas.devine / 0.453592;
        weightRange.formulas.robinson = weightRange.formulas.robinson / 0.453592;
        weightRange.formulas.miller = weightRange.formulas.miller / 0.453592;
        weightRange.formulas.hamwi = weightRange.formulas.hamwi / 0.453592;
        weightRange.formulas.average = weightRange.formulas.average / 0.453592;
    }
    
    // Display results
    displayResults(weightRange, currentWeight, height);
    
    // Generate detailed analysis
    generateDetailedAnalysis(weightRange, currentWeight, height);
}

function displayResults(weightRange, currentWeight, height) {
    const unit = currentSystem === 'metric' ? 'kg' : 'lbs';
    const heightDisplay = currentSystem === 'metric' ? `${height} cm` : `${Math.floor(height/2.54/12)}'${Math.round(height/2.54%12)}"`;
    
    // Calculate BMI for current weight if provided
    let currentBMI = null;
    let bmiCategory = null;
    if (currentWeight) {
        const heightMeters = height / 100;
        let weightKg = currentWeight;
        if (currentSystem === 'imperial') {
            weightKg = currentWeight * 0.453592;
        }
        currentBMI = weightKg / (heightMeters * heightMeters);
        bmiCategory = getBMICategory(currentBMI);
    }
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Weight Range -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 border border-green-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">
                        ${formatWeight(weightRange.min)} - ${formatWeight(weightRange.max)} ${unit}
                    </div>
                    <div class="text-lg font-semibold text-gray-700">Healthy Weight Range</div>
                    <div class="text-sm text-gray-500 mt-1">For ${currentGender === 'male' ? 'male' : 'female'}, ${heightDisplay}, ${currentFrameSize} frame</div>
                </div>
            </div>

            <!-- BMI Range -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">BMI-Based Range</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Minimum (BMI 18.5)</span>
                        <span class="font-semibold text-green-600">${formatWeight(weightRange.bmiRange.min)} ${unit}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Maximum (BMI 24.9)</span>
                        <span class="font-semibold text-green-600">${formatWeight(weightRange.bmiRange.max)} ${unit}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">Frame Adjusted Range</span>
                            <span class="text-blue-600">${formatWeight(weightRange.min)} - ${formatWeight(weightRange.max)} ${unit}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Weight Status -->
            ${currentWeight ? `
            <div class="bg-${bmiCategory.color}-50 border border-${bmiCategory.color}-200 rounded-lg p-4">
                <h4 class="font-semibold text-${bmiCategory.color}-900 mb-2">Your Current Status</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-${bmiCategory.color}-700">Current Weight</span>
                        <span class="font-semibold text-${bmiCategory.color}-900">${formatWeight(currentWeight)} ${unit}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-${bmiCategory.color}-700">BMI</span>
                        <span class="font-semibold text-${bmiCategory.color}-900">${currentBMI.toFixed(1)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-${bmiCategory.color}-700">Category</span>
                        <span class="font-semibold text-${bmiCategory.color}-900">${bmiCategory.name}</span>
                    </div>
                </div>
            </div>
            ` : ''}

            <!-- Frame Size Impact -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <h4 class="font-semibold text-purple-900 mb-2">Frame Size Impact</h4>
                <p class="text-sm text-purple-800">
                    Your ${currentFrameSize} frame size adjusts the ideal weight range by 
                    <strong>${Math.round((frameMultipliers[currentFrameSize] - 1) * 100)}%</strong> 
                    compared to average frame.
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('bmiScale').classList.remove('hidden');
    document.getElementById('analysisSection').classList.remove('hidden');
}

function getBMICategory(bmi) {
    if (bmi < 16) return { name: 'Severely Underweight', color: 'red' };
    if (bmi < 18.5) return { name: 'Underweight', color: 'yellow' };
    if (bmi < 25) return { name: 'Normal Weight', color: 'green' };
    if (bmi < 30) return { name: 'Overweight', color: 'orange' };
    if (bmi < 35) return { name: 'Obese Class I', color: 'red' };
    if (bmi < 40) return { name: 'Obese Class II', color: 'red' };
    return { name: 'Obese Class III', color: 'red' };
}

function generateDetailedAnalysis(weightRange, currentWeight, height) {
    const unit = currentSystem === 'metric' ? 'kg' : 'lbs';
    
    // Formula results
    const formulaResultsHTML = `
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                <div>
                    <div class="font-semibold text-blue-900">Devine Formula</div>
                    <div class="text-xs text-blue-700">Most commonly used</div>
                </div>
                <div class="text-lg font-bold text-blue-900">${formatWeight(weightRange.formulas.devine)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                <div>
                    <div class="font-semibold text-green-900">Robinson Formula</div>
                    <div class="text-xs text-green-700">1983 revision</div>
                </div>
                <div class="text-lg font-bold text-green-900">${formatWeight(weightRange.formulas.robinson)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg border border-purple-200">
                <div>
                    <div class="font-semibold text-purple-900">Miller Formula</div>
                    <div class="text-xs text-purple-700">1983 formula</div>
                </div>
                <div class="text-lg font-bold text-purple-900">${formatWeight(weightRange.formulas.miller)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg border border-orange-200">
                <div>
                    <div class="font-semibold text-orange-900">Hamwi Formula</div>
                    <div class="text-xs text-orange-700">1964 original</div>
                </div>
                <div class="text-lg font-bold text-orange-900">${formatWeight(weightRange.formulas.hamwi)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-200">
                <div>
                    <div class="font-semibold text-red-900">Average</div>
                    <div class="text-xs text-red-700">All formulas combined</div>
                </div>
                <div class="text-lg font-bold text-red-900">${formatWeight(weightRange.formulas.average)} ${unit}</div>
            </div>
        </div>
    `;

    // Progress analysis
    let progressHTML = '';
    if (currentWeight) {
        const weightDiff = currentWeight - weightRange.formulas.average;
        const absDiff = Math.abs(weightDiff);
        const percentageDiff = (absDiff / weightRange.formulas.average) * 100;
        
        let status, color, icon, recommendation;
        
        if (weightDiff < -weightRange.formulas.average * 0.1) {
            status = 'Underweight';
            color = 'yellow';
            icon = 'fa-arrow-down';
            recommendation = 'Consider gradual weight gain with nutrient-dense foods and strength training.';
        } else if (weightDiff > weightRange.formulas.average * 0.1) {
            status = 'Above Range';
            color = 'orange';
            icon = 'fa-arrow-up';
            recommendation = 'Focus on sustainable weight loss through balanced diet and regular exercise.';
        } else {
            status = 'Within Range';
            color = 'green';
            icon = 'fa-check';
            recommendation = 'Maintain your current weight with healthy habits and regular activity.';
        }
        
        progressHTML = `
            <div class="space-y-4">
                <div class="text-center p-4 bg-${color}-50 rounded-lg border border-${color}-200">
                    <i class="fas ${icon} text-${color}-600 text-2xl mb-2"></i>
                    <div class="text-lg font-bold text-${color}-900">${status}</div>
                    <div class="text-sm text-${color}-700">${formatWeight(absDiff)} ${unit} ${weightDiff > 0 ? 'above' : 'below'} average</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-800 mb-2">Recommendation</h4>
                    <p class="text-sm text-gray-700">${recommendation}</p>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <h4 class="font-semibold text-blue-800 mb-2">Next Steps</h4>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>• Monitor your weight weekly</li>
                        <li>• Focus on body composition, not just weight</li>
                        <li>• Consult healthcare provider for personalized advice</li>
                    </ul>
                </div>
            </div>
        `;
    } else {
        progressHTML = `
            <div class="text-center p-6 bg-gray-50 rounded-lg border border-gray-200">
                <i class="fas fa-weight text-gray-400 text-3xl mb-3"></i>
                <div class="text-lg font-semibold text-gray-700 mb-2">Enter Your Current Weight</div>
                <p class="text-sm text-gray-600">Add your current weight to see personalized progress analysis and recommendations.</p>
            </div>
        `;
    }
    
    document.getElementById('formulaResults').innerHTML = formulaResultsHTML;
    document.getElementById('progressAnalysis').innerHTML = progressHTML;
}

function formatWeight(weight) {
    if (currentSystem === 'metric') {
        return weight.toFixed(1);
    } else {
        return Math.round(weight);
    }
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