@extends('layouts.app')

@section('title', 'Calorie Intake Calculator - Daily Calorie Needs & Macronutrients | CalculaterTools')

@section('meta-description', 'Free calorie intake calculator to determine your daily calorie needs for weight loss, maintenance, or gain. Get personalized macronutrient breakdown and meal plans.')

@section('keywords', 'calorie calculator, daily calorie intake, calorie needs, macronutrient calculator, weight loss calories, maintenance calories, TDEE calculator')

@section('canonical', url('/calculators/calorie-intake'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Calorie Intake Calculator",
    "description": "Calculate your daily calorie needs and macronutrient distribution for weight management goals",
    "url": "{{ url('/calculators/calorie-intake') }}",
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
                    <li class="text-gray-500">Calorie Intake Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Calorie Intake Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your perfect daily calorie intake for weight loss, maintenance, or muscle gain. Get personalized macronutrient targets and meal planning guidance.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Calorie Needs</h2>
                        <p class="text-gray-600 mb-6">Enter your details to get personalized calorie recommendations</p>
                        
                        <form id="calorieCalculatorForm" class="space-y-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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

                            <!-- Height and Weight -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Metric Inputs -->
                                <div id="metricInputs">
                                    <div class="grid grid-cols-2 gap-4">
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
                                <div id="imperialInputs" class="hidden">
                                    <div class="grid grid-cols-2 gap-4">
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
                            </div>

                            <!-- Activity Level -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Activity Level
                                </label>
                                <div class="space-y-3">
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.2" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Sedentary</div>
                                                <div class="text-xs text-blue-600 font-semibold">BMR × 1.2</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Office job, little or no exercise</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.375" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Lightly Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">BMR × 1.375</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Light exercise 1-3 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.55" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Moderately Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">BMR × 1.55</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Moderate exercise 3-5 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.725" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Very Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">BMR × 1.725</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Hard exercise 6-7 days/week</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 cursor-pointer activity-option">
                                        <input type="radio" name="activity" value="1.9" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                        <div class="ml-3 flex-1">
                                            <div class="flex justify-between items-center">
                                                <div class="text-sm font-medium text-gray-800">Extremely Active</div>
                                                <div class="text-xs text-blue-600 font-semibold">BMR × 1.9</div>
                                            </div>
                                            <div class="text-xs text-gray-600">Athlete or physical job + exercise</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Goal Setting -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Your Weight Goal
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setGoal('extreme_loss')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-600 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-running text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Extreme Loss</div>
                                        <div class="text-xs text-gray-500">-2 lb/week</div>
                                    </button>
                                    <button type="button" onclick="setGoal('loss')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-weight text-red-500 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Weight Loss</div>
                                        <div class="text-xs text-gray-500">-1 lb/week</div>
                                    </button>
                                    <button type="button" onclick="setGoal('maintain')" class="goal-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-balance-scale text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Maintain</div>
                                        <div class="text-xs text-gray-500">Current weight</div>
                                    </button>
                                    <button type="button" onclick="setGoal('gain')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-weight text-green-500 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Muscle Gain</div>
                                        <div class="text-xs text-gray-500">+1 lb/week</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Diet Style -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Preferred Diet Style
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setDiet('balanced')" class="diet-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-apple-alt text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Balanced</div>
                                    </button>
                                    <button type="button" onclick="setDiet('high_protein')" class="diet-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-drumstick-bite text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">High Protein</div>
                                    </button>
                                    <button type="button" onclick="setDiet('low_carb')" class="diet-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-bread-slice text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Low Carb</div>
                                    </button>
                                    <button type="button" onclick="setDiet('low_fat')" class="diet-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-seedling text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Low Fat</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateCalories()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate My Calorie Plan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Calorie Plan</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-utensils text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see your calorie plan</p>
                            </div>
                        </div>

                        <!-- Quick Tips -->
                        <div id="tipsSection" class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200 hidden">
                            <h4 class="font-semibold text-yellow-900 mb-2">💡 Pro Tip</h4>
                            <p class="text-sm text-yellow-800" id="tipContent"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Daily Calorie Targets -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Daily Calorie Targets</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="text-center p-6 bg-red-50 rounded-lg border border-red-200">
                            <div class="text-3xl font-bold text-red-600 mb-2" id="extremeLossCalories">0</div>
                            <div class="text-lg font-semibold text-gray-700">Extreme Weight Loss</div>
                            <div class="text-sm text-gray-500 mt-1">-2 lb/week</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="weightLossCalories">0</div>
                            <div class="text-lg font-semibold text-gray-700">Weight Loss</div>
                            <div class="text-sm text-gray-500 mt-1">-1 lb/week</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="maintenanceCalories">0</div>
                            <div class="text-lg font-semibold text-gray-700">Maintenance</div>
                            <div class="text-sm text-gray-500 mt-1">Current weight</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="muscleGainCalories">0</div>
                            <div class="text-lg font-semibold text-gray-700">Muscle Gain</div>
                            <div class="text-sm text-gray-500 mt-1">+1 lb/week</div>
                        </div>
                        <div class="text-center p-6 bg-orange-50 rounded-lg border border-orange-200">
                            <div class="text-3xl font-bold text-orange-600 mb-2" id="extremeGainCalories">0</div>
                            <div class="text-lg font-semibold text-gray-700">Extreme Gain</div>
                            <div class="text-sm text-gray-500 mt-1">+2 lb/week</div>
                        </div>
                    </div>
                </div>

                <!-- Macronutrient Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Macronutrient Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Macronutrient Chart -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Macronutrient Split</h3>
                            <div class="relative h-64 mb-4" id="macronutrientChart">
                                <!-- Chart will be generated by JavaScript -->
                            </div>
                            <div class="grid grid-cols-3 gap-4 text-center" id="macroNumbers">
                            </div>
                        </div>
                        
                        <!-- Meal Planning -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Sample Meal Distribution</h3>
                            <div class="space-y-4" id="mealDistribution">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Weekly Progress -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Expected Weekly Progress</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6" id="weeklyProgress">
                    </div>
                </div>

                <!-- Food Suggestions -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recommended Food Choices</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="foodSuggestions">
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Calorie Needs</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-fire text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">BMR & TDEE</h3>
                        <p class="text-gray-600">Your Basal Metabolic Rate (BMR) is calories burned at rest. Total Daily Energy Expenditure (TDEE) includes activity.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-weight text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Weight Loss</h3>
                        <p class="text-gray-600">Create a 500-1000 calorie deficit daily to lose 1-2 pounds per week safely and sustainably.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-dumbbell text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Muscle Gain</h3>
                        <p class="text-gray-600">A 250-500 calorie surplus with adequate protein supports muscle growth without excess fat.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-apple-alt text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Macronutrients</h3>
                        <p class="text-gray-600">Balance protein, carbs, and fats based on your goals for optimal results and health.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Calorie Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is this calorie calculator?</h3>
                        <p class="text-gray-600">This calculator uses the Mifflin-St Jeor equation, which is about 80-90% accurate for most people. Individual metabolism can vary based on genetics, muscle mass, and other factors.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I choose extreme weight loss?</h3>
                        <p class="text-gray-600">Extreme weight loss (2+ lbs/week) is only recommended for very obese individuals under medical supervision. For most people, 1 lb/week is safer and more sustainable.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do I need different macronutrient ratios?</h3>
                        <p class="text-gray-600">Different goals require different nutrient emphasis. Weight loss benefits from higher protein, muscle gain needs adequate carbs for energy, and specific diets may require adjustments.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I recalculate my calories?</h3>
                        <p class="text-gray-600">Recalculate every 10-15 pounds of weight change or if your activity level changes significantly. Most people should reassess every 2-3 months.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What if I'm not seeing results?</h3>
                        <p class="text-gray-600">Track consistently for 2-3 weeks before making adjustments. Consider factors like water retention, measurement accuracy, and non-scale victories like energy levels and clothing fit.</p>
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
                    <a href="{{ route('bmi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-weight text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Body Mass Index</p>
                    </a>
                    <a href="{{ route('body.fat.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Body Fat Calculator</h3>
                        <p class="text-gray-600 text-sm">Estimate your body fat percentage</p>
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
let currentDiet = 'balanced';

// Macronutrient ratios for different diet styles
const dietRatios = {
    'balanced': { protein: 0.3, carbs: 0.4, fat: 0.3 },
    'high_protein': { protein: 0.4, carbs: 0.3, fat: 0.3 },
    'low_carb': { protein: 0.35, carbs: 0.25, fat: 0.4 },
    'low_fat': { protein: 0.3, carbs: 0.55, fat: 0.15 }
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
    
    // Activity level selection
    document.querySelectorAll('.activity-option').forEach(option => {
        option.addEventListener('click', function() {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            updateActivitySelection();
            calculateCalories();
        });
    });
    
    // Auto-calculate on input change
    document.getElementById('age').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('heightCm').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('weightKg').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('heightFeet').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('heightInches').addEventListener('input', debounce(calculateCalories, 300));
    document.getElementById('weightLbs').addEventListener('input', debounce(calculateCalories, 300));
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

function setGoal(goal) {
    currentGoal = goal;
    
    document.querySelectorAll('.goal-btn').forEach(btn => {
        btn.classList.remove('border-red-600', 'bg-red-50', 'border-red-500', 'bg-red-50', 'border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50');
    });
    
    const colorMap = {
        'extreme_loss': 'red-600',
        'loss': 'red-500',
        'maintain': 'blue-500',
        'gain': 'green-500'
    };
    
    event.target.classList.add(`border-${colorMap[goal]}`, `bg-${colorMap[goal].split('-')[0]}-50`);
    
    calculateCalories();
}

function setDiet(diet) {
    currentDiet = diet;
    
    document.querySelectorAll('.diet-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50', 'border-yellow-500', 'bg-yellow-50');
    });
    
    const colorMap = {
        'balanced': 'blue-500',
        'high_protein': 'green-500',
        'low_carb': 'purple-500',
        'low_fat': 'yellow-500'
    };
    
    event.target.classList.add(`border-${colorMap[diet]}`, `bg-${colorMap[diet].split('-')[0]}-50`);
    
    calculateCalories();
}

function updateActivitySelection() {
    document.querySelectorAll('.activity-option').forEach(option => {
        option.classList.remove('border-blue-500', 'bg-blue-50');
    });
    
    const selectedOption = document.querySelector('.activity-option input:checked').closest('.activity-option');
    selectedOption.classList.add('border-blue-500', 'bg-blue-50');
}

function calculateCalories() {
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
    
    // Calculate TDEE (Maintenance Calories)
    const maintenanceCalories = bmr * activityMultiplier;
    
    // Calculate different goal calories
    const calorieTargets = {
        extreme_loss: maintenanceCalories - 1000, // -2 lb/week
        loss: maintenanceCalories - 500,          // -1 lb/week
        maintain: maintenanceCalories,            // Maintenance
        gain: maintenanceCalories + 250,          // +0.5 lb/week
        extreme_gain: maintenanceCalories + 500   // +1 lb/week
    };
    
    // Get selected goal calories
    const selectedCalories = calorieTargets[currentGoal];
    
    // Display results
    displayResults(bmr, maintenanceCalories, selectedCalories, calorieTargets);
    
    // Generate detailed breakdown
    generateDetailedBreakdown(selectedCalories, calorieTargets);
}

function displayResults(bmr, maintenanceCalories, selectedCalories, calorieTargets) {
    const activityLevels = {
        1.2: 'Sedentary',
        1.375: 'Lightly Active',
        1.55: 'Moderately Active',
        1.725: 'Very Active',
        1.9: 'Extremely Active'
    };
    
    const activityLevel = activityLevels[document.querySelector('input[name="activity"]:checked').value];
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Selected Goal -->
            <div class="bg-gradient-to-r from-${getGoalColor(currentGoal)}-50 to-${getGoalColor(currentGoal)}-100 rounded-xl p-6 border border-${getGoalColor(currentGoal)}-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-${getGoalColor(currentGoal)}-600 mb-2">${Math.round(selectedCalories)}</div>
                    <div class="text-lg font-semibold text-gray-700">Daily Calorie Target</div>
                    <div class="text-sm text-gray-500 mt-1">${getGoalText(currentGoal)}</div>
                </div>
            </div>

            <!-- Maintenance Calories -->
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">${Math.round(maintenanceCalories)}</div>
                    <div class="text-lg font-semibold text-gray-700">Maintenance Calories</div>
                    <div class="text-sm text-gray-500 mt-1">${activityLevel} lifestyle</div>
                </div>
            </div>

            <!-- BMR -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Metabolic Breakdown</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">BMR (Base Metabolism)</span>
                        <span class="font-semibold text-gray-900">${Math.round(bmr)} cal</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Activity Level</span>
                        <span class="font-semibold text-blue-600">${activityLevel}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Activity Multiplier</span>
                        <span class="font-semibold text-blue-600">× ${document.querySelector('input[name="activity"]:checked').value}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">Maintenance Calories</span>
                            <span class="text-green-600">${Math.round(maintenanceCalories)} cal</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weekly Projection -->
            <div class="bg-${getGoalColor(currentGoal)}-50 border border-${getGoalColor(currentGoal)}-200 rounded-lg p-4">
                <h4 class="font-semibold text-${getGoalColor(currentGoal)}-900 mb-2">Weekly Projection</h4>
                <p class="text-sm text-${getGoalColor(currentGoal)}-800">
                    ${getWeeklyProjection(currentGoal)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('tipsSection').classList.remove('hidden');
    document.getElementById('tipContent').textContent = getProTip(currentGoal, currentDiet);
    document.getElementById('detailedResults').classList.remove('hidden');
}

function getGoalColor(goal) {
    const colors = {
        'extreme_loss': 'red',
        'loss': 'red',
        'maintain': 'blue',
        'gain': 'green',
        'extreme_gain': 'orange'
    };
    return colors[goal] || 'blue';
}

function getGoalText(goal) {
    const texts = {
        'extreme_loss': 'Extreme Weight Loss (-2 lb/week)',
        'loss': 'Weight Loss (-1 lb/week)',
        'maintain': 'Weight Maintenance',
        'gain': 'Muscle Gain (+0.5 lb/week)',
        'extreme_gain': 'Extreme Muscle Gain (+1 lb/week)'
    };
    return texts[goal] || 'Weight Maintenance';
}

function getWeeklyProjection(goal) {
    const projections = {
        'extreme_loss': 'Lose approximately 2 pounds per week',
        'loss': 'Lose approximately 1 pound per week',
        'maintain': 'Maintain your current weight',
        'gain': 'Gain approximately 0.5 pounds per week',
        'extreme_gain': 'Gain approximately 1 pound per week'
    };
    return projections[goal] || 'Maintain your current weight';
}

function getProTip(goal, diet) {
    const tips = {
        'extreme_loss': 'Focus on nutrient-dense foods and ensure adequate protein to preserve muscle mass during rapid weight loss.',
        'loss': 'Combine your calorie target with regular exercise for optimal fat loss while maintaining muscle.',
        'maintain': 'Monitor your weight weekly and adjust calories by ±100-200 if needed to fine-tune maintenance.',
        'gain': 'Prioritize protein intake and strength training to ensure weight gain is primarily muscle.',
        'extreme_gain': 'Ensure adequate protein and consider spreading calories across 5-6 meals for optimal absorption.'
    };
    
    return tips[goal] || 'Stay consistent with your calorie target and track your progress weekly.';
}

function generateDetailedBreakdown(selectedCalories, calorieTargets) {
    // Update all calorie targets
    document.getElementById('extremeLossCalories').textContent = Math.round(calorieTargets.extreme_loss);
    document.getElementById('weightLossCalories').textContent = Math.round(calorieTargets.loss);
    document.getElementById('maintenanceCalories').textContent = Math.round(calorieTargets.maintain);
    document.getElementById('muscleGainCalories').textContent = Math.round(calorieTargets.gain);
    document.getElementById('extremeGainCalories').textContent = Math.round(calorieTargets.extreme_gain);
    
    // Generate macronutrient breakdown
    generateMacronutrientBreakdown(selectedCalories);
    
    // Generate meal distribution
    generateMealDistribution(selectedCalories);
    
    // Generate weekly progress
    generateWeeklyProgress();
    
    // Generate food suggestions
    generateFoodSuggestions();
}

function generateMacronutrientBreakdown(calories) {
    const ratios = dietRatios[currentDiet];
    const proteinGrams = Math.round((calories * ratios.protein) / 4);
    const carbGrams = Math.round((calories * ratios.carbs) / 4);
    const fatGrams = Math.round((calories * ratios.fat) / 9);
    
    // Update macro numbers
    document.getElementById('macroNumbers').innerHTML = `
        <div class="p-3 bg-blue-50 rounded-lg">
            <div class="text-lg font-bold text-blue-600">${proteinGrams}g</div>
            <div class="text-sm text-blue-800">Protein</div>
            <div class="text-xs text-blue-600">${Math.round(ratios.protein * 100)}%</div>
        </div>
        <div class="p-3 bg-green-50 rounded-lg">
            <div class="text-lg font-bold text-green-600">${carbGrams}g</div>
            <div class="text-sm text-green-800">Carbs</div>
            <div class="text-xs text-green-600">${Math.round(ratios.carbs * 100)}%</div>
        </div>
        <div class="p-3 bg-yellow-50 rounded-lg">
            <div class="text-lg font-bold text-yellow-600">${fatGrams}g</div>
            <div class="text-sm text-yellow-800">Fat</div>
            <div class="text-xs text-yellow-600">${Math.round(ratios.fat * 100)}%</div>
        </div>
    `;
    
    // Simple chart implementation
    document.getElementById('macronutrientChart').innerHTML = `
        <div class="flex items-end justify-center h-48 space-x-2">
            <div class="flex flex-col items-center">
                <div class="w-12 bg-blue-500 rounded-t" style="height: ${ratios.protein * 180}px"></div>
                <div class="text-xs mt-2">Protein</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-12 bg-green-500 rounded-t" style="height: ${ratios.carbs * 180}px"></div>
                <div class="text-xs mt-2">Carbs</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-12 bg-yellow-500 rounded-t" style="height: ${ratios.fat * 180}px"></div>
                <div class="text-xs mt-2">Fat</div>
            </div>
        </div>
    `;
}

function generateMealDistribution(calories) {
    const mealDistribution = {
        breakfast: Math.round(calories * 0.25),
        lunch: Math.round(calories * 0.35),
        dinner: Math.round(calories * 0.30),
        snacks: Math.round(calories * 0.10)
    };
    
    document.getElementById('mealDistribution').innerHTML = `
        <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg border border-orange-200">
            <div class="flex items-center">
                <i class="fas fa-sun text-orange-600 text-lg mr-3"></i>
                <div>
                    <div class="font-semibold text-orange-900">Breakfast</div>
                    <div class="text-xs text-orange-700">25% of daily calories</div>
                </div>
            </div>
            <div class="text-lg font-bold text-orange-600">${mealDistribution.breakfast}</div>
        </div>
        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
            <div class="flex items-center">
                <i class="fas fa-utensils text-green-600 text-lg mr-3"></i>
                <div>
                    <div class="font-semibold text-green-900">Lunch</div>
                    <div class="text-xs text-green-700">35% of daily calories</div>
                </div>
            </div>
            <div class="text-lg font-bold text-green-600">${mealDistribution.lunch}</div>
        </div>
        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
            <div class="flex items-center">
                <i class="fas fa-moon text-blue-600 text-lg mr-3"></i>
                <div>
                    <div class="font-semibold text-blue-900">Dinner</div>
                    <div class="text-xs text-blue-700">30% of daily calories</div>
                </div>
            </div>
            <div class="text-lg font-bold text-blue-600">${mealDistribution.dinner}</div>
        </div>
        <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg border border-purple-200">
            <div class="flex items-center">
                <i class="fas fa-apple-alt text-purple-600 text-lg mr-3"></i>
                <div>
                    <div class="font-semibold text-purple-900">Snacks</div>
                    <div class="text-xs text-purple-700">10% of daily calories</div>
                </div>
            </div>
            <div class="text-lg font-bold text-purple-600">${mealDistribution.snacks}</div>
        </div>
    `;
}

function generateWeeklyProgress() {
    const weeklyChanges = {
        'extreme_loss': '-2 lbs',
        'loss': '-1 lb',
        'maintain': '0 lbs',
        'gain': '+0.5 lbs',
        'extreme_gain': '+1 lb'
    };
    
    document.getElementById('weeklyProgress').innerHTML = `
        <div class="text-center p-6 bg-red-50 rounded-lg border border-red-200">
            <div class="text-2xl font-bold text-red-600 mb-2">${weeklyChanges[currentGoal]}</div>
            <div class="text-lg font-semibold text-gray-700">Weekly Change</div>
        </div>
        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2">7</div>
            <div class="text-lg font-semibold text-gray-700">Days Tracking</div>
        </div>
        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
            <div class="text-2xl font-bold text-green-600 mb-2">4-6</div>
            <div class="text-lg font-semibold text-gray-700">Weeks for Results</div>
        </div>
        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
            <div class="text-2xl font-bold text-purple-600 mb-2">85%</div>
            <div class="text-lg font-semibold text-gray-700">Success Rate</div>
        </div>
    `;
}

function generateFoodSuggestions() {
    const foodSuggestions = {
        'balanced': [
            { name: 'Grilled Chicken', category: 'Protein', icon: 'fa-drumstick-bite', color: 'red' },
            { name: 'Brown Rice', category: 'Carbs', icon: 'fa-bread-slice', color: 'amber' },
            { name: 'Avocado', category: 'Healthy Fats', icon: 'fa-seedling', color: 'green' },
            { name: 'Mixed Vegetables', category: 'Fiber', icon: 'fa-carrot', color: 'orange' }
        ],
        'high_protein': [
            { name: 'Lean Beef', category: 'Protein', icon: 'fa-hamburger', color: 'red' },
            { name: 'Greek Yogurt', category: 'Protein', icon: 'fa-blender', color: 'blue' },
            { name: 'Eggs', category: 'Protein', icon: 'fa-egg', color: 'yellow' },
            { name: 'Protein Shake', category: 'Supplement', icon: 'fa-wine-bottle', color: 'purple' }
        ],
        'low_carb': [
            { name: 'Salmon', category: 'Protein & Fat', icon: 'fa-fish', color: 'blue' },
            { name: 'Leafy Greens', category: 'Vegetables', icon: 'fa-leaf', color: 'green' },
            { name: 'Nuts & Seeds', category: 'Healthy Fats', icon: 'fa-acorn', color: 'amber' },
            { name: 'Berries', category: 'Low-carb Fruits', icon: 'fa-apple-alt', color: 'pink' }
        ],
        'low_fat': [
            { name: 'Turkey Breast', category: 'Lean Protein', icon: 'fa-drumstick-bite', color: 'red' },
            { name: 'Oatmeal', category: 'Complex Carbs', icon: 'fa-bread-slice', color: 'amber' },
            { name: 'Fruits', category: 'Natural Carbs', icon: 'fa-apple-alt', color: 'green' },
            { name: 'Vegetables', category: 'Fiber', icon: 'fa-carrot', color: 'orange' }
        ]
    };
    
    const foods = foodSuggestions[currentDiet] || foodSuggestions.balanced;
    
    document.getElementById('foodSuggestions').innerHTML = foods.map(food => `
        <div class="text-center p-4 bg-${food.color}-50 rounded-lg border border-${food.color}-200">
            <i class="fas ${food.icon} text-${food.color}-600 text-2xl mb-3"></i>
            <div class="font-semibold text-gray-900 mb-1">${food.name}</div>
            <div class="text-sm text-gray-600">${food.category}</div>
        </div>
    `).join('');
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
</script>
@endsection