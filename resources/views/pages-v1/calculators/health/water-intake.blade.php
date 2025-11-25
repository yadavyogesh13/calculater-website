@extends('layouts.app')

@section('title', 'Water Intake Calculator - Daily Hydration Needs | CalculaterTools')

@section('meta-description', 'Free water intake calculator to determine your daily hydration needs based on weight, activity level, and climate. Get personalized water consumption recommendations.')

@section('keywords', 'water intake calculator, daily water intake, hydration calculator, water consumption, how much water to drink, hydration needs')

@section('canonical', url('/calculators/water-intake'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Water Intake Calculator",
    "description": "Calculate your daily water intake needs based on weight, activity level, climate, and health factors",
    "url": "{{ url('/calculators/water-intake') }}",
    "operatingSystem": "Any",
    "applicationCategory": "HealthApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

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
                    <li class="text-gray-500">Water Intake Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Water Intake Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your perfect daily water intake based on your body, lifestyle, and environment. Stay optimally hydrated for better health and performance.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Hydration Needs</h2>
                        <p class="text-gray-600 mb-6">Enter your details to get personalized water intake recommendations</p>
                        
                        <form id="waterIntakeCalculatorForm" class="space-y-6">
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

                            <!-- Weight Input -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Weight
                                </label>
                                <!-- Metric Input -->
                                <div id="metricInputs">
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="weightKg" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 70" 
                                            min="30" 
                                            max="300" 
                                            step="0.1"
                                            value="70"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">kg</span>
                                    </div>
                                </div>
                                <!-- Imperial Input -->
                                <div id="imperialInputs" class="hidden">
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="weightLbs" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 150" 
                                            min="66" 
                                            max="660" 
                                            step="0.1"
                                            value="154"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">lbs</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Activity Level -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Daily Activity Level
                                </label>
                                <div class="space-y-3">
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="sedentary" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Sedentary</div>
                                                <div class="text-xs text-blue-600 font-semibold">+0 ml</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Office work, little exercise</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="light" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Lightly Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">+250 ml</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Light exercise 1-3 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="moderate" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Moderately Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">+500 ml</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Exercise 3-5 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="very" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Very Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">+750 ml</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Intense exercise 6-7 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="athlete" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Athlete</div>
                                                <div class="text-xs text-blue-600 font-semibold">+1000 ml</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Professional athlete training</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Climate Factors -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Climate & Environment
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setClimate('temperate')" class="climate-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-cloud text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Temperate</div>
                                        <div class="text-xs text-gray-500">Normal</div>
                                    </button>
                                    <button type="button" onclick="setClimate('hot')" class="climate-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-sun text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Hot</div>
                                        <div class="text-xs text-gray-500">+250 ml</div>
                                    </button>
                                    <button type="button" onclick="setClimate('humid')" class="climate-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-tint text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Humid</div>
                                        <div class="text-xs text-gray-500">+200 ml</div>
                                    </button>
                                    <button type="button" onclick="setClimate('dry')" class="climate-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-wind text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Dry</div>
                                        <div class="text-xs text-gray-500">+300 ml</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Special Conditions -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Special Conditions (Optional)
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="toggleCondition('pregnancy')" class="condition-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                        <i class="fas fa-baby text-pink-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Pregnancy</div>
                                        <div class="text-xs text-gray-500">+300 ml</div>
                                    </button>
                                    <button type="button" onclick="toggleCondition('breastfeeding')" class="condition-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-child text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Breastfeeding</div>
                                        <div class="text-xs text-gray-500">+700 ml</div>
                                    </button>
                                    <button type="button" onclick="toggleCondition('illness')" class="condition-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-head-side-cough text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Illness</div>
                                        <div class="text-xs text-gray-500">+500 ml</div>
                                    </button>
                                    <button type="button" onclick="toggleCondition('high_altitude')" class="condition-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-mountain text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">High Altitude</div>
                                        <div class="text-xs text-gray-500">+400 ml</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateWaterIntake()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate My Water Needs
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Hydration Plan</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-tint text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see your water needs</p>
                            </div>
                        </div>

                        <!-- Hydration Tips -->
                        <div id="tipsSection" class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200 hidden">
                            <h4 class="font-semibold text-blue-900 mb-2">💧 Hydration Tip</h4>
                            <p class="text-sm text-blue-800" id="tipContent"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Daily Water Targets -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Daily Water Intake Targets</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="minWater">0</div>
                            <div class="text-lg font-semibold text-gray-700">Minimum</div>
                            <div class="text-sm text-gray-500 mt-1">Basic hydration needs</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="recommendedWater">0</div>
                            <div class="text-lg font-semibold text-gray-700">Recommended</div>
                            <div class="text-sm text-gray-500 mt-1">Optimal hydration</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="maxWater">0</div>
                            <div class="text-lg font-semibold text-gray-700">Maximum</div>
                            <div class="text-sm text-gray-500 mt-1">Active lifestyle</div>
                        </div>
                    </div>
                </div>

                <!-- Water Intake Schedule -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Daily Hydration Schedule</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Timeline -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Optimal Drinking Times</h3>
                            <div class="space-y-4" id="hydrationSchedule">
                            </div>
                        </div>
                        
                        <!-- Progress Tracking -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Daily Progress Tracker</h3>
                            <div class="space-y-4" id="progressTracker">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Container Guide -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Water Container Guide</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6" id="containerGuide">
                    </div>
                </div>

                <!-- Hydration Sources -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Hydration Beyond Water</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="hydrationSources">
                    </div>
                </div>
            </div>

            <!-- Health Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">The Importance of Proper Hydration</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-brain text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Cognitive Function</h3>
                        <p class="text-gray-600">Proper hydration improves focus, concentration, and mental clarity while reducing brain fog and fatigue.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-running text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Physical Performance</h3>
                        <p class="text-gray-600">Adequate water intake enhances endurance, reduces cramping, and improves overall athletic performance.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Organ Function</h3>
                        <p class="text-gray-600">Water supports kidney function, aids digestion, regulates body temperature, and lubricates joints.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-skin text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Skin Health</h3>
                        <p class="text-gray-600">Proper hydration maintains skin elasticity, reduces wrinkles, and promotes a healthy complexion.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Hydration FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is the "8 glasses a day" rule accurate?</h3>
                        <p class="text-gray-600">The 8-glasses rule is a rough estimate. Actual needs vary by weight, activity level, climate, and individual factors. This calculator provides personalized recommendations.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I drink too much water?</h3>
                        <p class="text-gray-600">Yes, water intoxication is rare but possible. It occurs when you drink extreme amounts quickly, diluting sodium levels. Stick to the recommended ranges for safe hydration.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Do other beverages count toward my daily intake?</h3>
                        <p class="text-gray-600">Yes, but water is best. Coffee, tea, and milk contribute to hydration, but avoid sugary drinks. About 20-30% of hydration comes from food, especially fruits and vegetables.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What are signs of dehydration?</h3>
                        <p class="text-gray-600">Dark urine, dry mouth, fatigue, dizziness, headaches, and reduced urine output. Severe dehydration requires medical attention.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I drink water even if I'm not thirsty?</h3>
                        <p class="text-gray-600">Yes, thirst isn't always a reliable indicator. By the time you feel thirsty, you may already be mildly dehydrated. Drink regularly throughout the day.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Health Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-fire text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Basal Metabolic Rate</p>
                    </a>
                    <a href="{{ route('calorie.intake.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Calorie Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your daily calorie needs</p>
                    </a>
                    <a href="{{ route('body.fat.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Body Fat Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your body fat percentage</p>
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
let currentClimate = 'temperate';
let specialConditions = new Set();

// Activity level adjustments (ml)
const activityAdjustments = {
    sedentary: 0,
    light: 250,
    moderate: 500,
    very: 750,
    athlete: 1000
};

// Climate adjustments (ml)
const climateAdjustments = {
    temperate: 0,
    hot: 250,
    humid: 200,
    dry: 300
};

// Special conditions adjustments (ml)
const conditionAdjustments = {
    pregnancy: 300,
    breastfeeding: 700,
    illness: 500,
    high_altitude: 400
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateWaterIntake(); // Calculate with default values
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
            calculateWaterIntake();
        });
    });
    
    // Auto-calculate on input change
    document.getElementById('weightKg').addEventListener('input', debounce(calculateWaterIntake, 300));
    document.getElementById('weightLbs').addEventListener('input', debounce(calculateWaterIntake, 300));
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
    
    calculateWaterIntake();
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
    
    calculateWaterIntake();
}

function setClimate(climate) {
    currentClimate = climate;
    
    document.querySelectorAll('.climate-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-orange-500', 'bg-orange-50', 'border-yellow-500', 'bg-yellow-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'temperate': 'blue',
        'hot': 'orange',
        'humid': 'yellow',
        'dry': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[climate]}-500`, `bg-${colorMap[climate]}-50`);
    
    calculateWaterIntake();
}

function toggleCondition(condition) {
    if (specialConditions.has(condition)) {
        specialConditions.delete(condition);
        event.target.classList.remove(`border-${getConditionColor(condition)}-500`, `bg-${getConditionColor(condition)}-50`);
    } else {
        specialConditions.add(condition);
        event.target.classList.add(`border-${getConditionColor(condition)}-500`, `bg-${getConditionColor(condition)}-50`);
    }
    
    calculateWaterIntake();
}

function getConditionColor(condition) {
    const colors = {
        'pregnancy': 'pink',
        'breastfeeding': 'purple',
        'illness': 'red',
        'high_altitude': 'blue'
    };
    return colors[condition] || 'blue';
}

function updateActivitySelection() {
    document.querySelectorAll('.activity-option').forEach(option => {
        option.classList.remove('border-blue-500', 'bg-blue-50');
    });
    
    const selectedOption = document.querySelector('.activity-option input:checked').closest('.activity-option');
    selectedOption.classList.add('border-blue-500', 'bg-blue-50');
}

function calculateWaterIntake() {
    let weight;
    
    if (currentSystem === 'metric') {
        weight = parseFloat(document.getElementById('weightKg').value);
    } else {
        weight = parseFloat(document.getElementById('weightLbs').value) * 0.453592; // Convert to kg
    }
    
    const activityLevel = document.querySelector('input[name="activity"]:checked').value;
    
    // Validation
    if (!weight || weight <= 0) {
        showError('Please enter a valid weight');
        return;
    }
    
    // Base calculation: 30-35 ml per kg of body weight
    const baseMin = weight * 30; // Minimum
    const baseMax = weight * 40; // Maximum
    const baseRecommended = weight * 35; // Recommended
    
    // Apply adjustments
    const activityAdjustment = activityAdjustments[activityLevel];
    const climateAdjustment = climateAdjustments[currentClimate];
    
    let conditionsAdjustment = 0;
    specialConditions.forEach(condition => {
        conditionsAdjustment += conditionAdjustments[condition];
    });
    
    // Calculate final water needs
    const minWater = baseMin + activityAdjustment + climateAdjustment + conditionsAdjustment;
    const recommendedWater = baseRecommended + activityAdjustment + climateAdjustment + conditionsAdjustment;
    const maxWater = baseMax + activityAdjustment + climateAdjustment + conditionsAdjustment;
    
    // Convert to liters and cups if imperial
    let displayUnit, conversionFactor;
    if (currentSystem === 'metric') {
        displayUnit = 'liters';
        conversionFactor = 0.001;
    } else {
        displayUnit = 'cups';
        conversionFactor = 4.22675; // 1 liter = 4.22675 cups
    }
    
    const displayMin = (minWater * conversionFactor).toFixed(1);
    const displayRecommended = (recommendedWater * conversionFactor).toFixed(1);
    const displayMax = (maxWater * conversionFactor).toFixed(1);
    
    // Display results
    displayResults(displayMin, displayRecommended, displayMax, displayUnit, weight);
    
    // Generate detailed breakdown
    generateDetailedBreakdown(displayRecommended, displayUnit);
}

function displayResults(min, recommended, max, unit, weight) {
    const activityLevel = document.querySelector('input[name="activity"]:checked').value;
    const activityText = document.querySelector('.activity-option input:checked').closest('.activity-option').querySelector('.text-sm').textContent;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Recommendation -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">${recommended} ${unit}</div>
                    <div class="text-lg font-semibold text-gray-700">Recommended Daily Intake</div>
                    <div class="text-sm text-gray-500 mt-1">${activityText}</div>
                </div>
            </div>

            <!-- Range Information -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Daily Range</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Minimum</span>
                        <span class="font-semibold text-blue-600">${min} ${unit}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Recommended</span>
                        <span class="font-semibold text-green-600">${recommended} ${unit}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Maximum</span>
                        <span class="font-semibold text-purple-600">${max} ${unit}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">Your Weight</span>
                            <span class="text-blue-600">${currentSystem === 'metric' ? weight.toFixed(1) + ' kg' : (weight / 0.453592).toFixed(1) + ' lbs'}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Adjustments Summary -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Factors Considered</h4>
                <div class="text-sm text-green-800 space-y-1">
                    <div>• Body weight: ${currentSystem === 'metric' ? weight.toFixed(1) + ' kg' : (weight / 0.453592).toFixed(1) + ' lbs'}</div>
                    <div>• Activity level: ${activityText}</div>
                    <div>• Climate: ${currentClimate.charAt(0).toUpperCase() + currentClimate.slice(1)}</div>
                    ${specialConditions.size > 0 ? `<div>• Special conditions: ${Array.from(specialConditions).map(cond => cond.replace('_', ' ')).join(', ')}</div>` : ''}
                </div>
            </div>

            <!-- Hydration Reminder -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h4 class="font-semibold text-yellow-900 mb-2">💡 Remember</h4>
                <p class="text-sm text-yellow-800">
                    Spread your water intake throughout the day. Drink more during exercise and in hot weather.
                    Listen to your body's thirst signals.
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('tipsSection').classList.remove('hidden');
    document.getElementById('tipContent').textContent = getHydrationTip();
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update detailed results
    document.getElementById('minWater').textContent = min;
    document.getElementById('recommendedWater').textContent = recommended;
    document.getElementById('maxWater').textContent = max;
}

function getHydrationTip() {
    const tips = [
        "Start your day with a glass of water to kickstart hydration",
        "Keep a water bottle visible to remind yourself to drink regularly",
        "Add lemon or cucumber slices for flavor without calories",
        "Drink a glass of water before each meal to aid digestion",
        "Monitor your urine color - pale yellow means you're well hydrated",
        "Drink extra water before, during, and after exercise",
        "Eat water-rich foods like watermelon, cucumber, and oranges"
    ];
    return tips[Math.floor(Math.random() * tips.length)];
}

function generateDetailedBreakdown(recommended, unit) {
    const recommendedNum = parseFloat(recommended);
    
    // Generate hydration schedule
    const scheduleHTML = `
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                <div class="flex items-center">
                    <i class="fas fa-sun text-yellow-600 text-lg mr-3"></i>
                    <div>
                        <div class="font-semibold text-blue-900">Morning (7-9 AM)</div>
                        <div class="text-xs text-blue-700">2 glasses upon waking</div>
                    </div>
                </div>
                <div class="text-lg font-bold text-blue-900">${(recommendedNum * 0.15).toFixed(1)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                <div class="flex items-center">
                    <i class="fas fa-cloud-sun text-green-600 text-lg mr-3"></i>
                    <div>
                        <div class="font-semibold text-green-900">Mid-Morning (10-12 PM)</div>
                        <div class="text-xs text-green-700">1 glass every hour</div>
                    </div>
                </div>
                <div class="text-lg font-bold text-green-900">${(recommendedNum * 0.25).toFixed(1)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <div class="flex items-center">
                    <i class="fas fa-sun text-orange-600 text-lg mr-3"></i>
                    <div>
                        <div class="font-semibold text-yellow-900">Afternoon (1-5 PM)</div>
                        <div class="text-xs text-yellow-700">Regular sips throughout</div>
                    </div>
                </div>
                <div class="text-lg font-bold text-yellow-900">${(recommendedNum * 0.35).toFixed(1)} ${unit}</div>
            </div>
            <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg border border-purple-200">
                <div class="flex items-center">
                    <i class="fas fa-moon text-purple-600 text-lg mr-3"></i>
                    <div>
                        <div class="font-semibold text-purple-900">Evening (6-9 PM)</div>
                        <div class="text-xs text-purple-700">1-2 glasses with dinner</div>
                    </div>
                </div>
                <div class="text-lg font-bold text-purple-900">${(recommendedNum * 0.25).toFixed(1)} ${unit}</div>
            </div>
        </div>
    `;

    // Generate progress tracker
    const progressHTML = `
        <div class="space-y-4">
            <div class="bg-gray-50 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3">Today's Progress</h4>
                <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 0%"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>0 ${unit}</span>
                    <span>${recommended} ${unit}</span>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-2">
                <button class="py-2 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium hover:bg-blue-200 transition duration-200">+0.5 ${unit}</button>
                <button class="py-2 bg-green-100 text-green-700 rounded-lg text-sm font-medium hover:bg-green-200 transition duration-200">+1 ${unit}</button>
                <button class="py-2 bg-yellow-100 text-yellow-700 rounded-lg text-sm font-medium hover:bg-yellow-200 transition duration-200">+2 ${unit}</button>
                <button class="py-2 bg-red-100 text-red-700 rounded-lg text-sm font-medium hover:bg-red-200 transition duration-200">Reset</button>
            </div>
        </div>
    `;

    // Generate container guide
    const containerSizes = currentSystem === 'metric' 
        ? [0.5, 1, 1.5, 2] 
        : [2, 4, 6, 8]; // cups
    
    const containerGuideHTML = containerSizes.map(size => {
        const containersNeeded = (recommendedNum / size).toFixed(1);
        return `
            <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="text-2xl font-bold text-blue-600 mb-2">${size} ${unit.slice(0, -1)}</div>
                <div class="text-lg font-semibold text-gray-700">${containersNeeded} containers</div>
                <div class="text-sm text-gray-500 mt-1">${size === containerSizes[0] ? 'Small bottle' : size === containerSizes[containerSizes.length-1] ? 'Large bottle' : 'Standard bottle'}</div>
            </div>
        `;
    }).join('');

    // Generate hydration sources
    const hydrationSourcesHTML = `
        <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
            <i class="fas fa-apple-alt text-green-600 text-2xl mb-3"></i>
            <div class="font-semibold text-green-900 mb-1">Watermelon</div>
            <div class="text-sm text-green-700">92% water</div>
        </div>
        <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
            <i class="fas fa-seedling text-blue-600 text-2xl mb-3"></i>
            <div class="font-semibold text-blue-900 mb-1">Cucumber</div>
            <div class="text-sm text-blue-700">95% water</div>
        </div>
        <div class="text-center p-4 bg-orange-50 rounded-lg border border-orange-200">
            <i class="fas fa-stroopwafel text-orange-600 text-2xl mb-3"></i>
            <div class="font-semibold text-orange-900 mb-1">Orange</div>
            <div class="text-sm text-orange-700">87% water</div>
        </div>
        <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
            <i class="fas fa-blender text-purple-600 text-2xl mb-3"></i>
            <div class="font-semibold text-purple-900 mb-1">Yogurt</div>
            <div class="text-sm text-purple-700">85% water</div>
        </div>
    `;

    document.getElementById('hydrationSchedule').innerHTML = scheduleHTML;
    document.getElementById('progressTracker').innerHTML = progressHTML;
    document.getElementById('containerGuide').innerHTML = containerGuideHTML;
    document.getElementById('hydrationSources').innerHTML = hydrationSourcesHTML;
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
    document.getElementById('tipsSection').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
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

// Progress tracking functionality
let currentIntake = 0;
function updateProgress(amount) {
    const recommended = parseFloat(document.getElementById('recommendedWater').textContent);
    currentIntake = Math.min(recommended, currentIntake + amount);
    
    const progressBar = document.querySelector('.bg-blue-600');
    const progressPercentage = (currentIntake / recommended) * 100;
    progressBar.style.width = `${progressPercentage}%`;
    
    if (currentIntake >= recommended) {
        progressBar.classList.add('bg-green-600');
        progressBar.classList.remove('bg-blue-600');
    }
}

function resetProgress() {
    currentIntake = 0;
    const progressBar = document.querySelector('.bg-blue-600, .bg-green-600');
    progressBar.style.width = '0%';
    progressBar.classList.add('bg-blue-600');
    progressBar.classList.remove('bg-green-600');
}

// Add event listeners for progress buttons
document.addEventListener('click', function(e) {
    if (e.target.textContent.includes('+0.5')) {
        updateProgress(0.5);
    } else if (e.target.textContent.includes('+1')) {
        updateProgress(1);
    } else if (e.target.textContent.includes('+2')) {
        updateProgress(2);
    } else if (e.target.textContent === 'Reset') {
        resetProgress();
    }
});
</script>
@endsection