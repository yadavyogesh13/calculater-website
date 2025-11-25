@extends('layouts.app')

@section('title', 'Body Fat Calculator - Calculate Your Body Fat Percentage | CalculaterTools')

@section('meta-description', 'Free body fat percentage calculator using multiple methods. Calculate your body fat with US Navy, BMI, and skinfold methods. Get personalized health insights.')

@section('keywords', 'body fat calculator, body fat percentage, body composition, fat percentage, US Navy method, skinfold measurement, BMI method')

@section('canonical', url('/calculators/body-fat'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Body Fat Percentage Calculator",
    "description": "Calculate your body fat percentage using multiple scientific methods including US Navy, BMI, and skinfold measurements",
    "url": "{{ url('/calculators/body-fat') }}",
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
                    <li class="text-gray-500">Body Fat Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Body Fat Percentage Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your body fat percentage using multiple scientific methods. Get accurate body composition analysis and personalized health recommendations.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Body Fat</h2>
                        <p class="text-gray-600 mb-6">Choose your preferred method and enter measurements</p>
                        
                        <form id="bodyFatCalculatorForm" class="space-y-6">
                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <button type="button" onclick="setMethod('us_navy')" class="method-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-anchor text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">US Navy Method</div>
                                        <div class="text-xs text-gray-500">Most Accurate</div>
                                    </button>
                                    <button type="button" onclick="setMethod('bmi')" class="method-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-weight text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">BMI Method</div>
                                        <div class="text-xs text-gray-500">Simple</div>
                                    </button>
                                    <button type="button" onclick="setMethod('skinfold')" class="method-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-ruler text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Skinfold Method</div>
                                        <div class="text-xs text-gray-500">Advanced</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Basic Information -->
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
                                        min="18" 
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

                            <!-- Measurement System -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Measurement System
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

                            <!-- Height and Weight -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Metric Inputs -->
                                <div id="metricInputs">
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

                                <!-- Imperial Inputs -->
                                <div id="imperialInputs" class="hidden">
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

                            <!-- US Navy Method Inputs -->
                            <div id="usNavyInputs" class="space-y-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">US Navy Method Measurements</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="waist" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Waist Circumference
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="waist" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 32" 
                                                min="20" 
                                                max="60" 
                                                step="0.1"
                                                value="34"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500" id="waistUnit">inches</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Measure at narrowest point (men) or at navel level (women)</p>
                                    </div>
                                    <div>
                                        <label for="neck" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Neck Circumference
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="neck" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 15" 
                                                min="10" 
                                                max="25" 
                                                step="0.1"
                                                value="16"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500" id="neckUnit">inches</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Measure below Adam's apple</p>
                                    </div>
                                </div>
                                <div id="hipInput" class="hidden">
                                    <label for="hips" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Hip Circumference
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="hips" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 36" 
                                            min="20" 
                                            max="60" 
                                            step="0.1"
                                            value="38"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500" id="hipUnit">inches</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Measure at widest point (women only)</p>
                                </div>
                            </div>

                            <!-- Skinfold Method Inputs -->
                            <div id="skinfoldInputs" class="space-y-4 hidden">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Skinfold Measurements (mm)</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="chestSkinfold" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Chest Skinfold
                                        </label>
                                        <input 
                                            type="number" 
                                            id="chestSkinfold" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 12" 
                                            min="3" 
                                            max="50" 
                                            step="0.1"
                                            value="15"
                                        >
                                    </div>
                                    <div>
                                        <label for="abdominalSkinfold" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Abdominal Skinfold
                                        </label>
                                        <input 
                                            type="number" 
                                            id="abdominalSkinfold" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 20" 
                                            min="3" 
                                            max="50" 
                                            step="0.1"
                                            value="22"
                                        >
                                    </div>
                                    <div>
                                        <label for="thighSkinfold" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Thigh Skinfold
                                        </label>
                                        <input 
                                            type="number" 
                                            id="thighSkinfold" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 18" 
                                            min="3" 
                                            max="50" 
                                            step="0.1"
                                            value="20"
                                        >
                                    </div>
                                    <div>
                                        <label for="tricepSkinfold" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Tricep Skinfold
                                        </label>
                                        <input 
                                            type="number" 
                                            id="tricepSkinfold" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 15" 
                                            min="3" 
                                            max="50" 
                                            step="0.1"
                                            value="16"
                                        >
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500">Measure skinfold thickness using calipers at specified locations</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateBodyFat()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Body Fat Percentage
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Body Fat Analysis</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-percentage text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your measurements</p>
                                <p class="text-sm">to see body fat analysis</p>
                            </div>
                        </div>

                        <!-- Body Fat Categories -->
                        <div id="categoriesSection" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Body Fat Categories</h4>
                            <div class="space-y-2 text-sm" id="bodyFatCategories">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Analysis -->
            <div id="analysisSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Comprehensive Body Composition Analysis</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Fat Mass Breakdown -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Body Composition</h3>
                        <div class="space-y-4" id="compositionBreakdown">
                        </div>
                    </div>
                    
                    <!-- Health Insights -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Health Insights & Recommendations</h3>
                        <div class="space-y-4" id="healthInsights">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body Fat Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Body Fat Percentage Categories</h2>
                <div class="max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Men's Chart -->
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                            <h3 class="text-xl font-bold text-blue-900 mb-4 text-center">Men's Body Fat Categories</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center p-3 bg-green-100 rounded-lg">
                                    <span class="font-semibold text-green-800">Essential Fat</span>
                                    <span class="font-bold text-green-800">2-5%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-blue-100 rounded-lg">
                                    <span class="font-semibold text-blue-800">Athletes</span>
                                    <span class="font-bold text-blue-800">6-13%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-green-100 rounded-lg">
                                    <span class="font-semibold text-green-800">Fitness</span>
                                    <span class="font-bold text-green-800">14-17%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-yellow-100 rounded-lg">
                                    <span class="font-semibold text-yellow-800">Average</span>
                                    <span class="font-bold text-yellow-800">18-24%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-orange-100 rounded-lg">
                                    <span class="font-semibold text-orange-800">Overweight</span>
                                    <span class="font-bold text-orange-800">25%+</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Women's Chart -->
                        <div class="bg-pink-50 rounded-xl p-6 border border-pink-200">
                            <h3 class="text-xl font-bold text-pink-900 mb-4 text-center">Women's Body Fat Categories</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center p-3 bg-green-100 rounded-lg">
                                    <span class="font-semibold text-green-800">Essential Fat</span>
                                    <span class="font-bold text-green-800">10-13%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-blue-100 rounded-lg">
                                    <span class="font-semibold text-blue-800">Athletes</span>
                                    <span class="font-bold text-blue-800">14-20%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-green-100 rounded-lg">
                                    <span class="font-semibold text-green-800">Fitness</span>
                                    <span class="font-bold text-green-800">21-24%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-yellow-100 rounded-lg">
                                    <span class="font-semibold text-yellow-800">Average</span>
                                    <span class="font-bold text-yellow-800">25-31%</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-orange-100 rounded-lg">
                                    <span class="font-semibold text-orange-800">Overweight</span>
                                    <span class="font-bold text-orange-800">32%+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Body Fat Percentage</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Health Indicator</h3>
                        <p class="text-gray-600">Body fat percentage is a better health indicator than BMI as it distinguishes between fat and muscle mass.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-dumbbell text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Athletic Performance</h3>
                        <p class="text-gray-600">Optimal body fat levels vary by sport and can significantly impact athletic performance and recovery.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Metabolic Health</h3>
                        <p class="text-gray-600">Healthy body fat levels support proper hormone function, metabolism, and overall physiological balance.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Disease Risk</h3>
                        <p class="text-gray-600">Both excessively high and low body fat percentages can increase risk of various health conditions.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Body Fat Percentage FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Which method is most accurate?</h3>
                        <p class="text-gray-600">The US Navy method is generally the most accurate of these calculator methods (within 3-4%). For clinical accuracy, DEXA scans or hydrostatic weighing are recommended.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do women have higher essential fat?</h3>
                        <p class="text-gray-600">Women require more essential fat for reproductive health, including hormone production and childbearing functions. Essential fat is stored in breasts, hips, and thighs.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I measure body fat?</h3>
                        <p class="text-gray-600">For tracking progress, measure every 4-8 weeks. Daily fluctuations are normal, so focus on long-term trends rather than day-to-day changes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I be overweight with normal BMI?</h3>
                        <p class="text-gray-600">Yes, this is called "normal weight obesity." People can have normal BMI but high body fat percentage if they have low muscle mass and high fat mass.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's a healthy body fat range?</h3>
                        <p class="text-gray-600">For men: 8-19% is good, 20%+ is high. For women: 21-33% is good, 34%+ is high. However, optimal ranges vary by age, genetics, and fitness goals.</p>
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
                    <a href="{{ route('ideal.weight.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-balance-scale text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Ideal Weight Calculator</h3>
                        <p class="text-gray-600 text-sm">Find your healthy weight range</p>
                    </a>
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-fire text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your metabolic rate</p>
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
let currentMethod = 'us_navy';

// Body fat categories
const bodyFatCategories = {
    male: [
        { range: [2, 5], category: 'Essential Fat', color: 'green', description: 'Minimum for basic physiological function' },
        { range: [6, 13], category: 'Athletes', color: 'blue', description: 'Typical for competitive athletes' },
        { range: [14, 17], category: 'Fitness', color: 'green', description: 'Good fitness level, lean and toned' },
        { range: [18, 24], category: 'Average', color: 'yellow', description: 'Acceptable, typical for general population' },
        { range: [25, 100], category: 'Overweight', color: 'orange', description: 'Higher health risks, consider reduction' }
    ],
    female: [
        { range: [10, 13], category: 'Essential Fat', color: 'green', description: 'Minimum for basic physiological function' },
        { range: [14, 20], category: 'Athletes', color: 'blue', description: 'Typical for competitive athletes' },
        { range: [21, 24], category: 'Fitness', color: 'green', description: 'Good fitness level, lean and toned' },
        { range: [25, 31], category: 'Average', color: 'yellow', description: 'Acceptable, typical for general population' },
        { range: [32, 100], category: 'Overweight', color: 'orange', description: 'Higher health risks, consider reduction' }
    ]
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    updateMeasurementUnits();
    calculateBodyFat(); // Calculate with default values
});

function setupEventListeners() {
    // Measurement system toggle
    document.getElementById('metricBtn').addEventListener('click', () => setMeasurementSystem('metric'));
    document.getElementById('imperialBtn').addEventListener('click', () => setMeasurementSystem('imperial'));
    
    // Auto-calculate on input change
    document.getElementById('age').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('heightCm').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('weightKg').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('heightFeet').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('heightInches').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('weightLbs').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('waist').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('neck').addEventListener('input', debounce(calculateBodyFat, 300));
    document.getElementById('hips').addEventListener('input', debounce(calculateBodyFat, 300));
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
    
    updateMeasurementUnits();
    calculateBodyFat();
}

function setGender(gender) {
    currentGender = gender;
    
    document.querySelectorAll('.gender-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-pink-500', 'bg-pink-50');
    });
    
    if (gender === 'male') {
        event.target.classList.add('border-blue-500', 'bg-blue-50');
        document.getElementById('hipInput').classList.add('hidden');
    } else {
        event.target.classList.add('border-pink-500', 'bg-pink-50');
        if (currentMethod === 'us_navy') {
            document.getElementById('hipInput').classList.remove('hidden');
        }
    }
    
    calculateBodyFat();
}

function setMethod(method) {
    currentMethod = method;
    
    document.querySelectorAll('.method-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'us_navy': 'blue',
        'bmi': 'green',
        'skinfold': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[method]}-500`, `bg-${colorMap[method]}-50`);
    
    // Show/hide method-specific inputs
    document.getElementById('usNavyInputs').classList.toggle('hidden', method !== 'us_navy');
    document.getElementById('skinfoldInputs').classList.toggle('hidden', method !== 'skinfold');
    
    // Show hip input for women using US Navy method
    if (method === 'us_navy' && currentGender === 'female') {
        document.getElementById('hipInput').classList.remove('hidden');
    } else {
        document.getElementById('hipInput').classList.add('hidden');
    }
    
    calculateBodyFat();
}

function updateMeasurementUnits() {
    const unit = currentSystem === 'metric' ? 'cm' : 'inches';
    document.getElementById('waistUnit').textContent = unit;
    document.getElementById('neckUnit').textContent = unit;
    document.getElementById('hipUnit').textContent = unit;
}

function calculateBodyFat() {
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
    
    // Validation
    if (!age || age < 18 || age > 80) {
        showError('Please enter a valid age (18-80 years)');
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
    
    let bodyFatPercentage;
    let methodName;
    
    switch(currentMethod) {
        case 'us_navy':
            bodyFatPercentage = calculateUSNavyMethod(height, weight, age);
            methodName = 'US Navy Method';
            break;
        case 'bmi':
            bodyFatPercentage = calculateBMIMethod(height, weight, age);
            methodName = 'BMI Method';
            break;
        case 'skinfold':
            bodyFatPercentage = calculateSkinfoldMethod(age);
            methodName = 'Skinfold Method';
            break;
    }
    
    if (bodyFatPercentage === null) {
        showError('Please complete all required measurements for the selected method');
        return;
    }
    
    // Display results
    displayResults(bodyFatPercentage, methodName, weight);
    
    // Generate detailed analysis
    generateDetailedAnalysis(bodyFatPercentage, weight);
}

function calculateUSNavyMethod(height, weight, age) {
    let waist, neck, hips;
    
    if (currentSystem === 'metric') {
        waist = parseFloat(document.getElementById('waist').value) * 0.393701; // Convert cm to inches
        neck = parseFloat(document.getElementById('neck').value) * 0.393701; // Convert cm to inches
        if (currentGender === 'female') {
            hips = parseFloat(document.getElementById('hips').value) * 0.393701; // Convert cm to inches
        }
    } else {
        waist = parseFloat(document.getElementById('waist').value);
        neck = parseFloat(document.getElementById('neck').value);
        if (currentGender === 'female') {
            hips = parseFloat(document.getElementById('hips').value);
        }
    }
    
    if (!waist || !neck || (currentGender === 'female' && !hips)) {
        return null;
    }
    
    let bodyFatPercentage;
    
    if (currentGender === 'male') {
        // US Navy formula for men
        bodyFatPercentage = 86.010 * Math.log10(waist - neck) - 70.041 * Math.log10(height / 2.54) + 36.76;
    } else {
        // US Navy formula for women
        bodyFatPercentage = 163.205 * Math.log10(waist + hips - neck) - 97.684 * Math.log10(height / 2.54) - 78.387;
    }
    
    // Age adjustment
    bodyFatPercentage += (age - 25) * 0.1;
    
    return Math.max(3, Math.min(50, bodyFatPercentage));
}

function calculateBMIMethod(height, weight, age) {
    const heightMeters = height / 100;
    const bmi = weight / (heightMeters * heightMeters);
    
    // BMI to body fat conversion formula
    let bodyFatPercentage;
    if (currentGender === 'male') {
        bodyFatPercentage = (1.20 * bmi) + (0.23 * age) - 16.2;
    } else {
        bodyFatPercentage = (1.20 * bmi) + (0.23 * age) - 5.4;
    }
    
    return Math.max(8, Math.min(45, bodyFatPercentage));
}

function calculateSkinfoldMethod(age) {
    const chest = parseFloat(document.getElementById('chestSkinfold').value);
    const abdominal = parseFloat(document.getElementById('abdominalSkinfold').value);
    const thigh = parseFloat(document.getElementById('thighSkinfold').value);
    const tricep = parseFloat(document.getElementById('tricepSkinfold').value);
    
    if (!chest || !abdominal || !thigh || !tricep) {
        return null;
    }
    
    const sum = chest + abdominal + thigh + tricep;
    
    // Jackson & Pollock 4-site formula
    let bodyDensity;
    if (currentGender === 'male') {
        bodyDensity = 1.10938 - (0.0008267 * sum) + (0.0000016 * sum * sum) - (0.0002574 * age);
    } else {
        bodyDensity = 1.0994921 - (0.0009929 * sum) + (0.0000023 * sum * sum) - (0.0001392 * age);
    }
    
    // Convert body density to body fat percentage (Siri formula)
    const bodyFatPercentage = (495 / bodyDensity) - 450;
    
    return Math.max(8, Math.min(45, bodyFatPercentage));
}

function displayResults(bodyFatPercentage, methodName, weight) {
    const category = getBodyFatCategory(bodyFatPercentage);
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-${category.color}-50 to-${category.color}-100 rounded-xl p-6 border border-${category.color}-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-${category.color}-600 mb-2">${bodyFatPercentage.toFixed(1)}%</div>
                    <div class="text-lg font-semibold text-gray-700">Body Fat Percentage</div>
                    <div class="text-sm text-gray-500 mt-1">${category.name} • ${methodName}</div>
                </div>
            </div>

            <!-- Category Info -->
            <div class="bg-${category.color}-50 border border-${category.color}-200 rounded-lg p-4">
                <h4 class="font-semibold text-${category.color}-900 mb-2">${category.name} Category</h4>
                <p class="text-sm text-${category.color}-800">${category.description}</p>
            </div>

            <!-- Fat Mass -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Body Composition</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Fat Mass</span>
                        <span class="font-semibold text-red-600">${(weight * bodyFatPercentage / 100).toFixed(1)} ${currentSystem === 'metric' ? 'kg' : 'lbs'}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Lean Mass</span>
                        <span class="font-semibold text-green-600">${(weight * (100 - bodyFatPercentage) / 100).toFixed(1)} ${currentSystem === 'metric' ? 'kg' : 'lbs'}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">Total Weight</span>
                            <span class="text-blue-600">${weight.toFixed(1)} ${currentSystem === 'metric' ? 'kg' : 'lbs'}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Method Accuracy -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Method Accuracy</h4>
                <p class="text-sm text-blue-800">
                    ${methodName} accuracy: ±3-4%. For clinical precision, consider DEXA scan or hydrostatic weighing.
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('categoriesSection').classList.remove('hidden');
    document.getElementById('analysisSection').classList.remove('hidden');
    
    // Update body fat categories
    updateBodyFatCategories(bodyFatPercentage);
}

function getBodyFatCategory(percentage) {
    const categories = bodyFatCategories[currentGender];
    for (const category of categories) {
        if (percentage >= category.range[0] && percentage <= category.range[1]) {
            return category;
        }
    }
    return categories[categories.length - 1]; // Return last category as fallback
}

function updateBodyFatCategories(currentPercentage) {
    const categories = bodyFatCategories[currentGender];
    let categoriesHTML = '';
    
    categories.forEach(cat => {
        const isCurrent = currentPercentage >= cat.range[0] && currentPercentage <= cat.range[1];
        const rangeText = cat.range[1] === 100 ? `${cat.range[0]}%+` : `${cat.range[0]}%-${cat.range[1]}%`;
        
        categoriesHTML += `
            <div class="flex items-center justify-between p-2 ${isCurrent ? 'bg-' + cat.color + '-100 rounded' : ''}">
                <span class="text-${cat.color}-600 font-medium">${cat.category}</span>
                <span class="text-gray-600 ${isCurrent ? 'font-bold' : ''}">${rangeText}</span>
            </div>
        `;
    });
    
    document.getElementById('bodyFatCategories').innerHTML = categoriesHTML;
}

function generateDetailedAnalysis(bodyFatPercentage, weight) {
    const fatMass = weight * bodyFatPercentage / 100;
    const leanMass = weight - fatMass;
    
    const compositionHTML = `
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border border-red-200">
                <div>
                    <div class="font-semibold text-red-900">Fat Mass</div>
                    <div class="text-xs text-red-700">${bodyFatPercentage.toFixed(1)}% of total weight</div>
                </div>
                <div class="text-lg font-bold text-red-900">${fatMass.toFixed(1)} ${currentSystem === 'metric' ? 'kg' : 'lbs'}</div>
            </div>
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border border-green-200">
                <div>
                    <div class="font-semibold text-green-900">Lean Mass</div>
                    <div class="text-xs text-green-700">Muscle, bones, organs, water</div>
                </div>
                <div class="text-lg font-bold text-green-900">${leanMass.toFixed(1)} ${currentSystem === 'metric' ? 'kg' : 'lbs'}</div>
            </div>
            
            <!-- Visual Representation -->
            <div class="bg-gray-50 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3">Body Composition</h4>
                <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                    <div class="bg-red-500 h-4 rounded-full" style="width: ${bodyFatPercentage}%"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>Fat: ${bodyFatPercentage.toFixed(1)}%</span>
                    <span>Lean: ${(100 - bodyFatPercentage).toFixed(1)}%</span>
                </div>
            </div>
        </div>
    `;

    const category = getBodyFatCategory(bodyFatPercentage);
    let recommendations = '';
    
    if (category.color === 'orange') {
        recommendations = `
            <div class="space-y-3">
                <div class="flex items-start p-3 bg-orange-50 rounded-lg border border-orange-200">
                    <i class="fas fa-exclamation-triangle text-orange-600 mt-1 mr-3"></i>
                    <div class="text-sm text-orange-800">
                        <strong>Focus on fat loss:</strong> Create a calorie deficit through diet and increase cardiovascular exercise.
                    </div>
                </div>
                <div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <i class="fas fa-dumbbell text-blue-600 mt-1 mr-3"></i>
                    <div class="text-sm text-blue-800">
                        <strong>Strength training:</strong> Preserve muscle mass while losing fat with resistance training 2-3 times per week.
                    </div>
                </div>
            </div>
        `;
    } else if (category.color === 'green' || category.color === 'blue') {
        recommendations = `
            <div class="space-y-3">
                <div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200">
                    <i class="fas fa-check-circle text-green-600 mt-1 mr-3"></i>
                    <div class="text-sm text-green-800">
                        <strong>Maintain your progress:</strong> Continue with balanced nutrition and regular exercise routine.
                    </div>
                </div>
                <div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200">
                    <i class="fas fa-running text-blue-600 mt-1 mr-3"></i>
                    <div class="text-sm text-blue-800">
                        <strong>Performance focus:</strong> Consider sport-specific training to optimize your athletic performance.
                    </div>
                </div>
            </div>
        `;
    } else {
        recommendations = `
            <div class="space-y-3">
                <div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                    <i class="fas fa-info-circle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Healthy maintenance:</strong> Your body fat percentage is in a healthy range. Focus on overall wellness.
                    </div>
                </div>
            </div>
        `;
    }

    document.getElementById('compositionBreakdown').innerHTML = compositionHTML;
    document.getElementById('healthInsights').innerHTML = recommendations;
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
    document.getElementById('categoriesSection').classList.add('hidden');
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