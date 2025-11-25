@extends('layouts.app')

@section('title', 'BMR Calculator - Calculate Your Basal Metabolic Rate | CalculaterTools')

@section('meta-description', 'Free BMR calculator to calculate your Basal Metabolic Rate and daily calorie needs. Understand your body\'s energy requirements for weight management.')

@section('keywords', 'BMR calculator, basal metabolic rate, calorie calculator, metabolism calculator, daily calorie needs, weight management, TDEE calculator')

@section('canonical', url('/calculators/bmr'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "BMR Calculator",
    "description": "Calculate your Basal Metabolic Rate (BMR) and total daily energy expenditure (TDEE) for effective weight management",
    "url": "{{ url('/calculators/bmr') }}",
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
                    <li class="text-gray-500">BMR Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">BMR Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your Basal Metabolic Rate (BMR) to understand how many calories your body needs at rest. Perfect for weight management and fitness planning.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your BMR & TDEE</h2>
                        <p class="text-gray-600 mb-6">Enter your details to calculate your daily calorie needs</p>
                        
                        <form id="bmrCalculatorForm" class="space-y-6">
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

                            <!-- Personal Details -->
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
                                        min="15" 
                                        max="80"
                                        value="30"
                                        required
                                    >
                                </div>
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
                                                min="100" 
                                                max="250" 
                                                step="0.1"
                                                value="175"
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
                                                min="30" 
                                                max="300" 
                                                step="0.1"
                                                value="75"
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
                                                    value="9"
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
                                                min="66" 
                                                max="660" 
                                                step="0.1"
                                                value="165"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">lbs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Activity Level -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Activity Level
                                </label>
                                <div class="space-y-3">
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.2" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-800">Sedentary</div>
                                            <div class="text-xs text-gray-600">Little or no exercise</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.375" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-800">Lightly Active</div>
                                            <div class="text-xs text-gray-600">Light exercise 1-3 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.55" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-800">Moderately Active</div>
                                            <div class="text-xs text-gray-600">Moderate exercise 3-5 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.725" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-800">Very Active</div>
                                            <div class="text-xs text-gray-600">Hard exercise 6-7 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.9" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-800">Extremely Active</div>
                                            <div class="text-xs text-gray-600">Very hard exercise & physical job</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Goal -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Your Goal
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <button type="button" onclick="setGoal('lose')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-weight text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Lose Weight</div>
                                    </button>
                                    <button type="button" onclick="setGoal('maintain')" class="goal-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-balance-scale text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Maintain</div>
                                    </button>
                                    <button type="button" onclick="setGoal('gain')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-weight text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Gain Weight</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateBMR()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate BMR & Calorie Needs
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Calorie Needs</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-fire text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see your calorie needs</p>
                            </div>
                        </div>

                        <!-- Activity Multipliers -->
                        <div id="activityInfo" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Activity Multipliers</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sedentary</span>
                                    <span class="font-semibold text-gray-800">BMR × 1.2</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Lightly Active</span>
                                    <span class="font-semibold text-gray-800">BMR × 1.375</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Moderately Active</span>
                                    <span class="font-semibold text-gray-800">BMR × 1.55</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Very Active</span>
                                    <span class="font-semibold text-gray-800">BMR × 1.725</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Extremely Active</span>
                                    <span class="font-semibold text-gray-800">BMR × 1.9</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Breakdown -->
            <div id="breakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Daily Calorie Breakdown</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Calorie Goals -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Calorie Goals</h3>
                        <div class="space-y-4" id="calorieGoals">
                        </div>
                    </div>
                    
                    <!-- Macronutrient Distribution -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Macronutrient Distribution</h3>
                        <div class="space-y-4" id="macronutrients">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weight Management Plan -->
            <div id="planSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Weight Management Plan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="weightPlan">
                </div>
            </div>

            <!-- BMR Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding BMR & TDEE</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heartbeat text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is BMR?</h3>
                        <p class="text-gray-600">Basal Metabolic Rate is the number of calories your body needs to perform basic life-sustaining functions at rest.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-running text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is TDEE?</h3>
                        <p class="text-gray-600">Total Daily Energy Expenditure includes BMR plus calories burned through physical activity and digestion.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-weight text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Weight Loss</h3>
                        <p class="text-gray-600">To lose weight, consume 500 calories less than your TDEE daily to lose about 1 pound per week.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-utensils text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Weight Gain</h3>
                        <p class="text-gray-600">To gain weight, consume 500 calories more than your TDEE daily to gain about 1 pound per week.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">BMR & Calorie FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between BMR and TDEE?</h3>
                        <p class="text-gray-600">BMR (Basal Metabolic Rate) is calories burned at complete rest. TDEE (Total Daily Energy Expenditure) is BMR plus calories burned through activity and digestion.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is the BMR calculation?</h3>
                        <p class="text-gray-600">The Mifflin-St Jeor equation used here is about 80-90% accurate for most people. Individual variations in metabolism can affect actual calorie needs.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do men have higher BMR than women?</h3>
                        <p class="text-gray-600">Men typically have more muscle mass and less body fat than women of the same weight and height, resulting in a higher metabolic rate.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does age affect BMR?</h3>
                        <p class="text-gray-600">BMR decreases with age due to loss of muscle mass and changes in hormonal activity. This is why it's harder to maintain weight as you get older.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I increase my BMR?</h3>
                        <p class="text-gray-600">Yes! Building muscle through strength training, staying active, eating enough protein, and getting adequate sleep can all help increase your metabolic rate.</p>
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
                    <a href="{{ route('body.fat.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Body Fat Calculator</h3>
                        <p class="text-gray-600 text-sm">Estimate your body fat percentage</p>
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
let currentGoal = 'maintain';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateBMR(); // Calculate with default values
});

function setupEventListeners() {
    // Measurement system toggle
    document.getElementById('metricBtn').addEventListener('click', () => setMeasurementSystem('metric'));
    document.getElementById('imperialBtn').addEventListener('click', () => setMeasurementSystem('imperial'));
    
    // Activity level selection
    document.querySelectorAll('.activity-option').forEach(option => {
        option.addEventListener('click', function() {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            updateActivitySelection();
            calculateBMR();
        });
    });
    
    // Auto-calculate on input change
    document.getElementById('age').addEventListener('input', debounce(calculateBMR, 300));
    document.getElementById('heightCm').addEventListener('input', debounce(calculateBMR, 300));
    document.getElementById('weightKg').addEventListener('input', debounce(calculateBMR, 300));
    document.getElementById('heightFeet').addEventListener('input', debounce(calculateBMR, 300));
    document.getElementById('heightInches').addEventListener('input', debounce(calculateBMR, 300));
    document.getElementById('weightLbs').addEventListener('input', debounce(calculateBMR, 300));
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
    
    calculateBMR();
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
    
    calculateBMR();
}

function setGoal(goal) {
    currentGoal = goal;
    
    document.querySelectorAll('.goal-btn').forEach(btn => {
        btn.classList.remove('border-red-500', 'bg-red-50', 'border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50');
    });
    
    const colorMap = {
        'lose': 'red',
        'maintain': 'blue',
        'gain': 'green'
    };
    
    event.target.classList.add(`border-${colorMap[goal]}-500`, `bg-${colorMap[goal]}-50`);
    
    calculateBMR();
}

function updateActivitySelection() {
    document.querySelectorAll('.activity-option').forEach(option => {
        option.classList.remove('border-blue-500', 'bg-blue-50');
    });
    
    const selectedOption = document.querySelector('.activity-option input:checked').closest('.activity-option');
    selectedOption.classList.add('border-blue-500', 'bg-blue-50');
}

function calculateBMR() {
    let height, weight, age;
    
    age = parseInt(document.getElementById('age').value);
    
    if (currentSystem === 'metric') {
        height = parseFloat(document.getElementById('heightCm').value);
        weight = parseFloat(document.getElementById('weightKg').value);
    } else {
        const feet = parseFloat(document.getElementById('heightFeet').value);
        const inches = parseFloat(document.getElementById('heightInches').value);
        height = (feet * 12 + inches) * 2.54; // Convert to cm
        weight = parseFloat(document.getElementById('weightLbs').value) * 0.453592; // Convert to kg
    }
    
    const activityMultiplier = parseFloat(document.querySelector('input[name="activity"]:checked').value);
    
    // Validation
    if (!age || age < 15 || age > 80) {
        showError('Please enter a valid age (15-80 years)');
        return;
    }
    if (!height || height <= 0) {
        showError('Please enter a valid height');
        return;
    }
    if (!weight || weight <= 0) {
        showError('Please enter a valid weight');
        return;
    }
    
    // Calculate BMR using Mifflin-St Jeor Equation
    let bmr;
    if (currentGender === 'male') {
        bmr = 10 * weight + 6.25 * height - 5 * age + 5;
    } else {
        bmr = 10 * weight + 6.25 * height - 5 * age - 161;
    }
    
    // Calculate TDEE
    const tdee = bmr * activityMultiplier;
    
    // Calculate goal calories
    const goalCalories = calculateGoalCalories(tdee, currentGoal);
    
    // Display results
    displayResults(bmr, tdee, goalCalories, activityMultiplier);
    
    // Generate detailed breakdown
    generateDetailedBreakdown(bmr, tdee, goalCalories);
    
    // Generate weight management plan
    generateWeightManagementPlan(tdee, goalCalories);
}

function calculateGoalCalories(tdee, goal) {
    switch(goal) {
        case 'lose':
            return tdee - 500; // 500 calorie deficit for ~1 lb/week loss
        case 'gain':
            return tdee + 500; // 500 calorie surplus for ~1 lb/week gain
        default:
            return tdee; // Maintenance
    }
}

function displayResults(bmr, tdee, goalCalories, activityMultiplier) {
    const activityLevels = {
        1.2: 'Sedentary',
        1.375: 'Lightly Active',
        1.55: 'Moderately Active',
        1.725: 'Very Active',
        1.9: 'Extremely Active'
    };
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- BMR Result -->
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">${Math.round(bmr)}</div>
                    <div class="text-lg font-semibold text-gray-700">Basal Metabolic Rate</div>
                    <div class="text-sm text-gray-500 mt-1">Calories burned at complete rest</div>
                </div>
            </div>

            <!-- TDEE Result -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 border border-green-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">${Math.round(tdee)}</div>
                    <div class="text-lg font-semibold text-gray-700">Total Daily Energy Expenditure</div>
                    <div class="text-sm text-gray-500 mt-1">${activityLevels[activityMultiplier]} lifestyle</div>
                </div>
            </div>

            <!-- Goal Calories -->
            <div class="bg-gradient-to-r from-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-50 to-${currentGoal === 'lose' ? 'orange' : currentGoal === 'gain' ? 'emerald' : 'indigo'}-50 rounded-xl p-6 border border-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-600 mb-2">${Math.round(goalCalories)}</div>
                    <div class="text-lg font-semibold text-gray-700">Daily Calorie Target</div>
                    <div class="text-sm text-gray-500 mt-1">${getGoalText(currentGoal)}</div>
                </div>
            </div>

            <!-- Activity Impact -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Activity Impact</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">BMR (Base Metabolism)</span>
                        <span class="font-semibold text-gray-900">${Math.round(bmr)} cal</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Activity Multiplier</span>
                        <span class="font-semibold text-blue-600">× ${activityMultiplier}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">TDEE (Total Daily)</span>
                            <span class="text-green-600">${Math.round(tdee)} cal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('activityInfo').classList.remove('hidden');
    document.getElementById('breakdownSection').classList.remove('hidden');
    document.getElementById('planSection').classList.remove('hidden');
}

function getGoalText(goal) {
    switch(goal) {
        case 'lose': return 'Weight Loss (500 cal deficit)';
        case 'gain': return 'Weight Gain (500 cal surplus)';
        default: return 'Weight Maintenance';
    }
}

function generateDetailedBreakdown(bmr, tdee, goalCalories) {
    const calorieGoalsHTML = `
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div>
                    <div class="font-semibold text-blue-900">Basal Metabolic Rate</div>
                    <div class="text-sm text-blue-700">Calories for basic bodily functions</div>
                </div>
                <div class="text-xl font-bold text-blue-900">${Math.round(bmr)}</div>
            </div>
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border border-green-200">
                <div>
                    <div class="font-semibold text-green-900">Total Daily Energy Expenditure</div>
                    <div class="text-sm text-green-700">BMR + activity calories</div>
                </div>
                <div class="text-xl font-bold text-green-900">${Math.round(tdee)}</div>
            </div>
            <div class="flex items-center justify-between p-4 bg-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-50 rounded-lg border border-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-200">
                <div>
                    <div class="font-semibold text-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-900">Daily Target</div>
                    <div class="text-sm text-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-700">${getGoalText(currentGoal)}</div>
                </div>
                <div class="text-xl font-bold text-${currentGoal === 'lose' ? 'red' : currentGoal === 'gain' ? 'green' : 'blue'}-900">${Math.round(goalCalories)}</div>
            </div>
        </div>
    `;

    const protein = goalCalories * 0.3 / 4; // 30% protein, 4 cal/g
    const carbs = goalCalories * 0.4 / 4;   // 40% carbs, 4 cal/g
    const fat = goalCalories * 0.3 / 9;     // 30% fat, 9 cal/g

    const macronutrientsHTML = `
        <div class="space-y-4">
            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-800">Protein</span>
                    <span class="text-lg font-bold text-blue-600">${Math.round(protein)}g</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 30%"></div>
                </div>
                <div class="text-xs text-gray-600 mt-1">30% of total calories</div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-800">Carbohydrates</span>
                    <span class="text-lg font-bold text-green-600">${Math.round(carbs)}g</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 40%"></div>
                </div>
                <div class="text-xs text-gray-600 mt-1">40% of total calories</div>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-800">Fat</span>
                    <span class="text-lg font-bold text-yellow-600">${Math.round(fat)}g</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-600 h-2 rounded-full" style="width: 30%"></div>
                </div>
                <div class="text-xs text-gray-600 mt-1">30% of total calories</div>
            </div>
        </div>
    `;

    document.getElementById('calorieGoals').innerHTML = calorieGoalsHTML;
    document.getElementById('macronutrients').innerHTML = macronutrientsHTML;
}

function generateWeightManagementPlan(tdee, goalCalories) {
    const weeklyChange = currentGoal === 'lose' ? '1 lb loss' : currentGoal === 'gain' ? '1 lb gain' : 'Maintenance';
    const weeklyCalories = currentGoal === 'lose' ? '3,500 deficit' : currentGoal === 'gain' ? '3,500 surplus' : 'Balance';
    
    const planHTML = `
        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
            <i class="fas fa-utensils text-blue-600 text-3xl mb-4"></i>
            <div class="text-xl font-bold text-blue-900 mb-2">Nutrition</div>
            <div class="text-sm text-blue-700">Track your daily intake and focus on nutrient-dense foods</div>
        </div>
        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
            <i class="fas fa-running text-green-600 text-3xl mb-4"></i>
            <div class="text-xl font-bold text-green-900 mb-2">Exercise</div>
            <div class="text-sm text-green-700">Combine cardio and strength training for optimal results</div>
        </div>
        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
            <i class="fas fa-chart-line text-purple-600 text-3xl mb-4"></i>
            <div class="text-xl font-bold text-purple-900 mb-2">Weekly Goal</div>
            <div class="text-sm text-purple-700">${weeklyChange} (${weeklyCalories})</div>
        </div>
    `;

    document.getElementById('weightPlan').innerHTML = planHTML;
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
    document.getElementById('activityInfo').classList.add('hidden');
    document.getElementById('breakdownSection').classList.add('hidden');
    document.getElementById('planSection').classList.add('hidden');
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