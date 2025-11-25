@extends('layouts.app')

@section('title', 'Step to Calorie Converter | Calculate Calories Burned from Steps | CalculaterTools')

@section('meta-description', 'Free step to calorie converter to calculate how many calories you burn from steps. Get personalized insights based on your weight, pace, and step count.')

@section('keywords', 'step to calorie converter, calories from steps, steps calculator, pedometer calories, walking calories, fitness tracker, step counter')

@section('canonical', url('/calculators/step-calorie'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Step to Calorie Converter",
    "description": "Convert steps to calories burned based on your weight, pace, and activity level",
    "url": "{{ url('/calculators/step-calorie') }}",
    "operatingSystem": "Any",
    "applicationCategory": "HealthApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-green-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-green-600 hover:text-green-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#fitness" class="text-green-600 hover:text-green-800 transition duration-150">Fitness Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Step to Calorie Converter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Step to Calorie Converter</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Convert your daily steps into calories burned and track your fitness progress with personalized insights.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Calories from Steps</h2>
                        <p class="text-gray-600 mb-6">Enter your step count and personal details for accurate calorie estimation</p>
                        
                        <form id="stepCalorieCalculatorForm" class="space-y-6">
                            <!-- Step Count -->
                            <div>
                                <label for="stepCount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Step Count
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="stepCount" 
                                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                        placeholder="e.g., 10000" 
                                        min="100" 
                                        max="100000" 
                                        step="100"
                                        value="10000"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">steps</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter your total steps for the day</p>
                            </div>

                            <!-- Measurement System -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Measurement System
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <button type="button" id="metricBtn" class="system-btn py-3 px-4 border-2 border-green-500 bg-green-50 text-green-700 rounded-lg font-semibold transition duration-200">
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
                                        <label for="weightKg" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Weight (kg)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="weightKg" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 70" 
                                                min="30" 
                                                max="200" 
                                                step="0.1"
                                                value="70"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">kg</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="heightCm" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Height (cm)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="heightCm" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 170" 
                                                min="100" 
                                                max="250" 
                                                step="1"
                                                value="170"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Imperial Inputs -->
                            <div id="imperialInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="weightLbs" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Weight (lbs)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="weightLbs" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 154" 
                                                min="50" 
                                                max="440" 
                                                step="0.1"
                                                value="154"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">lbs</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-800 mb-2">
                                            Height
                                        </label>
                                        <div class="grid grid-cols-2 gap-2">
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="heightFeet" 
                                                    class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
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
                                                    class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
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
                            </div>

                            <!-- Walking Pace -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Walking Pace
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setPace('leisurely')" class="pace-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-walking text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Leisurely</div>
                                        <div class="text-xs text-gray-500">2-3 mph</div>
                                    </button>
                                    <button type="button" onclick="setPace('brisk')" class="pace-btn border border-green-500 bg-green-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-walking text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Brisk</div>
                                        <div class="text-xs text-gray-500">3-4 mph</div>
                                    </button>
                                    <button type="button" onclick="setPace('power')" class="pace-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-running text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Power</div>
                                        <div class="text-xs text-gray-500">4-5 mph</div>
                                    </button>
                                    <button type="button" onclick="setPace('running')" class="pace-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-running text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Running</div>
                                        <div class="text-xs text-gray-500">5+ mph</div>
                                    </button>
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
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                        placeholder="e.g., 30" 
                                        min="15" 
                                        max="100"
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

                            <!-- Activity Level -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Daily Activity Level
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setActivityLevel('sedentary')" class="activity-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-gray-500 hover:bg-gray-50 transition duration-200">
                                        <i class="fas fa-couch text-gray-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sedentary</div>
                                        <div class="text-xs text-gray-500">Little exercise</div>
                                    </button>
                                    <button type="button" onclick="setActivityLevel('light')" class="activity-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-walking text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Light</div>
                                        <div class="text-xs text-gray-500">1-3 days/week</div>
                                    </button>
                                    <button type="button" onclick="setActivityLevel('moderate')" class="activity-btn border border-green-500 bg-green-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-running text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Moderate</div>
                                        <div class="text-xs text-gray-500">3-5 days/week</div>
                                    </button>
                                    <button type="button" onclick="setActivityLevel('active')" class="activity-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-bicycle text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Active</div>
                                        <div class="text-xs text-gray-500">6-7 days/week</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateCalories()"
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Calories Burned
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Calorie Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-fire-alt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see calories burned</p>
                            </div>
                        </div>

                        <!-- Step Goals -->
                        <div id="goalsSection" class="mt-6 p-4 bg-green-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Daily Step Goals</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Sedentary</span>
                                    <span class="font-medium text-gray-800">5,000 steps</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Active</span>
                                    <span class="font-medium text-gray-800">7,500 steps</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-green-600 font-medium">Very Active</span>
                                    <span class="font-medium text-gray-800">10,000+ steps</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Analysis -->
            <div id="analysisSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Fitness Analysis</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Activity Insights -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Activity Insights</h3>
                        <div class="space-y-3" id="activityInsights">
                        </div>
                    </div>
                    
                    <!-- Health Benefits -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Health Benefits</h3>
                        <div class="space-y-3" id="healthBenefits">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step Conversion Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Step to Calorie Conversion Guide</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="text-xs text-gray-700 uppercase bg-green-50">
                            <tr>
                                <th class="px-4 py-3">Steps</th>
                                <th class="px-4 py-3">Distance (approx.)</th>
                                <th class="px-4 py-3">Calories (150 lbs)</th>
                                <th class="px-4 py-3">Calories (200 lbs)</th>
                                <th class="px-4 py-3">Time (brisk walk)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">2,000</td>
                                <td class="px-4 py-3">1 mile</td>
                                <td class="px-4 py-3">80-100</td>
                                <td class="px-4 py-3">100-130</td>
                                <td class="px-4 py-3">20 min</td>
                            </tr>
                            <tr class="bg-gray-50 border-b hover:bg-gray-100">
                                <td class="px-4 py-3 font-medium">5,000</td>
                                <td class="px-4 py-3">2.5 miles</td>
                                <td class="px-4 py-3">200-250</td>
                                <td class="px-4 py-3">250-325</td>
                                <td class="px-4 py-3">50 min</td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">10,000</td>
                                <td class="px-4 py-3">5 miles</td>
                                <td class="px-4 py-3">400-500</td>
                                <td class="px-4 py-3">500-650</td>
                                <td class="px-4 py-3">1 hr 40 min</td>
                            </tr>
                            <tr class="bg-gray-50 border-b hover:bg-gray-100">
                                <td class="px-4 py-3 font-medium">15,000</td>
                                <td class="px-4 py-3">7.5 miles</td>
                                <td class="px-4 py-3">600-750</td>
                                <td class="px-4 py-3">750-975</td>
                                <td class="px-4 py-3">2 hr 30 min</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Fitness Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Benefits of Walking</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Heart Health</h3>
                        <p class="text-gray-600">Regular walking reduces risk of heart disease, lowers blood pressure, and improves circulation.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-weight text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Weight Management</h3>
                        <p class="text-gray-600">Walking burns calories, boosts metabolism, and helps maintain healthy body weight.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-brain text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Mental Health</h3>
                        <p class="text-gray-600">Walking reduces stress, improves mood, and enhances cognitive function.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Step Conversion FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is step to calorie conversion?</h3>
                        <p class="text-gray-600">Calorie estimates are based on average metabolic rates and can vary by ±15% depending on individual factors like fitness level, terrain, and walking efficiency.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why does weight affect calories burned?</h3>
                        <p class="text-gray-600">Heavier individuals burn more calories because it takes more energy to move a larger mass. The relationship is roughly linear - double the weight, double the calories.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How many steps equal one mile?</h3>
                        <p class="text-gray-600">Approximately 2,000 steps equal one mile for average stride length. This can vary from 1,800-2,400 steps depending on your height and stride.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is 10,000 steps really necessary?</h3>
                        <p class="text-gray-600">10,000 steps is a good general goal, but any increase from your current activity level provides health benefits. Even 7,500 steps daily shows significant health improvements.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Do running steps burn more calories?</h3>
                        <p class="text-gray-600">Yes, running typically burns 30-50% more calories per step than walking due to higher intensity and greater muscle engagement.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Fitness Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('calorie.intake.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-fire text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Calorie Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your daily calorie needs</p>
                    </a>
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
                        <pp class="text-gray-600 text-sm">Calculate calories burned walking</p>
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
let currentPace = 'brisk';
let currentActivityLevel = 'moderate';

// Calorie conversion factors (calories per step per kg)
const paceFactors = {
    'leisurely': 0.03,
    'brisk': 0.04,
    'power': 0.05,
    'running': 0.08
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateCalories(); // Calculate with default values
});

function setupEventListeners() {
    // Measurement system toggle
    document.getElementById('metricBtn').addEventListener('click', () => setMeasurementSystem('metric'));
    document.getElementById('imperialBtn').addEventListener('click', () => setMeasurementSystem('imperial'));
    
    // Auto-calculate on input change
    document.getElementById('stepCount').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('weightKg').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('heightCm').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('weightLbs').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('heightFeet').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('heightInches').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('age').addEventListener('input', debounce(calculateCalories, 300));
}

function setMeasurementSystem(system) {
    currentSystem = system;
    
    if (system === 'metric') {
        document.getElementById('metricBtn').classList.add('border-green-500', 'bg-green-50', 'text-green-700');
        document.getElementById('metricBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('imperialBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('imperialBtn').classList.remove('border-green-500', 'bg-green-50', 'text-green-700');
        document.getElementById('metricInputs').classList.remove('hidden');
        document.getElementById('imperialInputs').classList.add('hidden');
    } else {
        document.getElementById('imperialBtn').classList.add('border-green-500', 'bg-green-50', 'text-green-700');
        document.getElementById('imperialBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('metricBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('metricBtn').classList.remove('border-green-500', 'bg-green-50', 'text-green-700');
        document.getElementById('imperialInputs').classList.remove('hidden');
        document.getElementById('metricInputs').classList.add('hidden');
    }
    
    calculateCalories();
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
    
    calculateCalories();
}

function setPace(pace) {
    currentPace = pace;
    
    document.querySelectorAll('.pace-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'leisurely': 'blue',
        'brisk': 'green',
        'power': 'orange',
        'running': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[pace]}-500`, `bg-${colorMap[pace]}-50`);
    
    calculateCalories();
}

function setActivityLevel(level) {
    currentActivityLevel = level;
    
    document.querySelectorAll('.activity-btn').forEach(btn => {
        btn.classList.remove('border-gray-500', 'bg-gray-50', 'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'sedentary': 'gray',
        'light': 'green',
        'moderate': 'green',
        'active': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[level]}-500`, `bg-${colorMap[level]}-50`);
    
    calculateCalories();
}

function calculateCalories() {
    const steps = parseInt(document.getElementById('stepCount').value);
    const age = parseInt(document.getElementById('age').value) || 30;
    
    let weight, height;
    
    if (currentSystem === 'metric') {
        weight = parseFloat(document.getElementById('weightKg').value);
        height = parseFloat(document.getElementById('heightCm').value);
    } else {
        weight = parseFloat(document.getElementById('weightLbs').value) * 0.453592; // Convert to kg
        const feet = parseFloat(document.getElementById('heightFeet').value);
        const inches = parseFloat(document.getElementById('heightInches').value);
        height = (feet * 12 + inches) * 2.54; // Convert to cm
    }
    
    // Validation
    if (!steps || steps <= 0) {
        showError('Please enter a valid step count');
        return;
    }
    if (!weight || weight <= 0) {
        showError('Please enter a valid weight');
        return;
    }
    if (!height || height <= 0) {
        showError('Please enter a valid height');
        return;
    }
    
    // Calculate calories burned
    const paceFactor = paceFactors[currentPace];
    let caloriesBurned = steps * paceFactor * weight;
    
    // Adjust for gender (men typically burn 5-10% more calories)
    if (currentGender === 'male') {
        caloriesBurned *= 1.07;
    }
    
    // Adjust for age (metabolism slows with age)
    const ageFactor = Math.max(0.7, 1 - ((age - 25) * 0.005));
    caloriesBurned *= ageFactor;
    
    // Calculate additional metrics
    const distanceKm = (steps * 0.000762); // Average step length 0.762 meters
    const distanceMiles = distanceKm * 0.621371;
    const activeMinutes = Math.round(steps / 100); // Rough estimate
    
    // Display results
    displayResults(caloriesBurned, steps, distanceKm, distanceMiles, activeMinutes);
    
    // Generate detailed analysis
    generateDetailedAnalysis(caloriesBurned, steps, currentActivityLevel);
}

function displayResults(calories, steps, distanceKm, distanceMiles, activeMinutes) {
    const stepGoal = getStepGoal(steps);
    const distanceStr = currentSystem === 'metric' ? 
        `${distanceKm.toFixed(2)} km` : 
        `${distanceMiles.toFixed(2)} miles`;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Calories Burned -->
            <div class="bg-gradient-to-r from-green-50 to-orange-50 rounded-xl p-6 border-2 border-green-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">${Math.round(calories)}</div>
                    <div class="text-lg font-semibold text-gray-700">Calories Burned</div>
                    <div class="text-sm text-gray-500 mt-1">From ${steps.toLocaleString()} steps</div>
                </div>
            </div>

            <!-- Activity Metrics -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">${distanceStr}</div>
                    <div class="text-sm text-blue-800">Distance</div>
                </div>
                <div class="bg-purple-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-purple-600 mb-1">${activeMinutes}</div>
                    <div class="text-sm text-purple-800">Active Minutes</div>
                </div>
            </div>

            <!-- Step Goal Progress -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-900">Step Goal Progress</h4>
                    <span class="text-sm font-medium ${stepGoal.color}">${stepGoal.status}</span>
                </div>
                <div class="relative h-4 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-4 bg-gradient-to-r from-green-400 to-green-600 rounded-full" 
                         style="width: ${Math.min(100, (steps / stepGoal.target) * 100)}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>0</span>
                    <span>${Math.round(stepGoal.target / 2).toLocaleString()}</span>
                    <span>${stepGoal.target.toLocaleString()}</span>
                </div>
            </div>

            <!-- Equivalent Activities -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h4 class="font-semibold text-yellow-900 mb-2">Equivalent To</h4>
                <p class="text-sm text-yellow-800">
                    ${getActivityEquivalent(Math.round(calories))}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('goalsSection').classList.remove('hidden');
    document.getElementById('analysisSection').classList.remove('hidden');
}

function getStepGoal(steps) {
    if (steps >= 10000) {
        return { status: 'Excellent!', target: 10000, color: 'text-green-600' };
    } else if (steps >= 7500) {
        return { status: 'Great!', target: 10000, color: 'text-green-500' };
    } else if (steps >= 5000) {
        return { status: 'Good', target: 7500, color: 'text-yellow-600' };
    } else {
        return { status: 'Keep Going', target: 5000, color: 'text-orange-600' };
    }
}

function getActivityEquivalent(calories) {
    if (calories < 100) return "A small banana or 30 minutes of light stretching";
    if (calories < 250) return "A medium apple or 20 minutes of yoga";
    if (calories < 500) return "A protein bar or 30 minutes of cycling";
    if (calories < 750) return "A chicken sandwich or 45 minutes of swimming";
    return "A full meal or 60 minutes of intense workout";
}

function generateDetailedAnalysis(calories, steps, activityLevel) {
    const insights = getActivityInsights(steps, activityLevel);
    const benefits = getHealthBenefits(steps);
    
    document.getElementById('activityInsights').innerHTML = insights;
    document.getElementById('healthBenefits').innerHTML = benefits;
}

function getActivityInsights(steps, activityLevel) {
    let insights = [];
    
    if (steps >= 10000) {
        insights = [
            '<div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200"><i class="fas fa-trophy text-green-600 mt-1 mr-3"></i><div class="text-sm text-green-800">Excellent! You\'ve met the recommended daily step goal for optimal health benefits.</div></div>',
            '<div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200"><i class="fas fa-heart text-green-600 mt-1 mr-3"></i><div class="text-sm text-green-800">Maintaining this activity level significantly reduces cardiovascular disease risk.</div></div>'
        ];
    } else if (steps >= 7500) {
        insights = [
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-thumbs-up text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Great job! You\'re close to the optimal 10,000 steps goal.</div></div>',
            '<div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200"><i class="fas fa-chart-line text-blue-600 mt-1 mr-3"></i><div class="text-sm text-blue-800">Adding just 2,500 more steps daily can boost your calorie burn by 25%.</div></div>'
        ];
    } else {
        insights = [
            '<div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200"><i class="fas fa-walking text-yellow-600 mt-1 mr-3"></i><div class="text-sm text-yellow-800">Every step counts! Consider adding short walks throughout your day.</div></div>',
            '<div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200"><i class="fas fa-clock text-yellow-600 mt-1 mr-3"></i><div class="text-sm text-yellow-800">Try taking the stairs, parking farther away, or short walking breaks.</div></div>'
        ];
    }
    
    return insights.join('');
}

function getHealthBenefits(steps) {
    let benefits = [];
    
    if (steps >= 5000) {
        benefits = [
            '<div class="flex items-start p-3 bg-purple-50 rounded-lg border border-purple-200"><i class="fas fa-brain text-purple-600 mt-1 mr-3"></i><div class="text-sm text-purple-800">Improved cognitive function and reduced stress levels</div></div>',
            '<div class="flex items-start p-3 bg-purple-50 rounded-lg border border-purple-200"><i class="fas fa-bed text-purple-600 mt-1 mr-3"></i><div class="text-sm text-purple-800">Better sleep quality and increased energy throughout the day</div></div>'
        ];
    }
    
    benefits.push(
        '<div class="flex items-start p-3 bg-indigo-50 rounded-lg border border-indigo-200"><i class="fas fa-bone text-indigo-600 mt-1 mr-3"></i><div class="text-sm text-indigo-800">Strengthened bones and improved joint health</div></div>',
        '<div class="flex items-start p-3 bg-indigo-50 rounded-lg border border-indigo-200"><i class="fas fa-lungs text-indigo-600 mt-1 mr-3"></i><div class="text-sm text-indigo-800">Enhanced lung capacity and cardiovascular endurance</div></div>'
    );
    
    return benefits.join('');
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
    document.getElementById('goalsSection').classList.add('hidden');
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

<style>
.system-btn, .pace-btn, .activity-btn, .gender-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.system-btn:hover, .pace-btn:hover, .activity-btn:hover, .gender-btn:hover {
    transform: translateY(-1px);
}
</style>
@endsection