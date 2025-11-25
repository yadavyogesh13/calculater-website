@extends('layouts.app')

@section('title', 'Percentage Calculator - Calculate Percentages, Increases & Discounts | CalculaterTools')

@section('meta-description', 'Free percentage calculator to calculate percentages, percentage increases, decreases, discounts, and more. Easy-to-use tool for all your percentage calculations.')

@section('keywords', 'percentage calculator, percent calculator, discount calculator, percentage increase, percentage decrease, tip calculator, markup calculator')

@section('canonical', url('/calculators/percentage'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Percentage Calculator",
    "description": "Calculate percentages, increases, decreases, discounts, and more with this comprehensive percentage calculator",
    "url": "{{ url('/calculators/percentage') }}",
    "operatingSystem": "Any",
    "applicationCategory": "MathApplication",
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
                        <a href="#math" class="text-blue-600 hover:text-blue-800 transition duration-150">Math Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Percentage Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Percentage Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate percentages, increases, decreases, discounts, and more with our comprehensive percentage calculator tools.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Percentage</h2>
                        <p class="text-gray-600 mb-6">Choose a calculation type and enter the values to get results</p>
                        
                        <form id="percentageForm" class="space-y-6">
                            <!-- Calculation Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setCalculationType('basic')" class="calc-type-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-percentage text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">Basic %</div>
                                    </button>
                                    <button type="button" onclick="setCalculationType('increase')" class="calc-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-arrow-up text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">% Increase</div>
                                    </button>
                                    <button type="button" onclick="setCalculationType('decrease')" class="calc-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-arrow-down text-red-600 text-lg mb-1"></i>
                                        <div class="text-sm">% Decrease</div>
                                    </button>
                                    <button type="button" onclick="setCalculationType('percentageOf')" class="calc-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-calculator text-purple-600 text-lg mb-1"></i>
                                        <div class="text-sm">% Of</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Basic Percentage Inputs -->
                            <div id="basicInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="partValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Part Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="partValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 25" 
                                                step="0.01"
                                                value="25"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">units</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="wholeValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Whole Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="wholeValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 100" 
                                                step="0.01"
                                                value="100"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">units</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 text-center">What percent is <span id="partDisplay">25</span> of <span id="wholeDisplay">100</span>?</p>
                            </div>

                            <!-- Percentage Increase Inputs -->
                            <div id="increaseInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="originalValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Original Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="originalValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 100" 
                                                step="0.01"
                                                value="100"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">units</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="increasePercent" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Increase Percentage
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="increasePercent" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 10" 
                                                step="0.01"
                                                value="10"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 text-center">What is <span id="increasePercentDisplay">10</span>% increase of <span id="originalValueDisplay">100</span>?</p>
                            </div>

                            <!-- Percentage Decrease Inputs -->
                            <div id="decreaseInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="decreaseOriginal" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Original Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="decreaseOriginal" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 100" 
                                                step="0.01"
                                                value="100"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">units</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="decreasePercent" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Decrease Percentage
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="decreasePercent" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 15" 
                                                step="0.01"
                                                value="15"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 text-center">What is <span id="decreasePercentDisplay">15</span>% decrease of <span id="decreaseOriginalDisplay">100</span>?</p>
                            </div>

                            <!-- Percentage Of Inputs -->
                            <div id="percentageOfInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="percentageValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Percentage
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="percentageValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 20" 
                                                step="0.01"
                                                value="20"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="ofValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Of Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="ofValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 250" 
                                                step="0.01"
                                                value="250"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">units</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 text-center">What is <span id="percentageValueDisplay">20</span>% of <span id="ofValueDisplay">250</span>?</p>
                            </div>

                            <!-- Common Percentages -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Common Percentages
                                </label>
                                <div class="grid grid-cols-4 md:grid-cols-8 gap-2">
                                    <button type="button" onclick="setCommonPercentage(5)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">5%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(10)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">10%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(15)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">15%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(20)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">20%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(25)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">25%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(50)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">50%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(75)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-indigo-500 hover:bg-indigo-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">75%</div>
                                    </button>
                                    <button type="button" onclick="setCommonPercentage(100)" class="common-percent-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">100%</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Quick Scenarios -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Scenarios
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <button type="button" onclick="setScenario('tip')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-utensils text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Restaurant Tip</div>
                                    </button>
                                    <button type="button" onclick="setScenario('discount')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-tag text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sale Discount</div>
                                    </button>
                                    <button type="button" onclick="setScenario('tax')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-receipt text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sales Tax</div>
                                    </button>
                                    <button type="button" onclick="setScenario('markup')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-chart-line text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Price Markup</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculatePercentage()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Percentage
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Calculation Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-percentage text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter values</p>
                                <p class="text-sm">to see percentage result</p>
                            </div>
                        </div>

                        <!-- Percentage Formula -->
                        <div id="formulaSection" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Calculation Formula</h4>
                            <div class="text-sm text-gray-700 space-y-2" id="formulaContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Calculation</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="resultPercentage">0%</div>
                        <div class="text-blue-800 font-medium">Percentage</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="resultValue">0</div>
                        <div class="text-green-800 font-medium">Result Value</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="resultDifference">0</div>
                        <div class="text-purple-800 font-medium">Difference</div>
                    </div>
                </div>

                <!-- Calculation Steps -->
                <div class="mt-8 bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Calculation Steps</h3>
                    <div class="space-y-3 text-sm text-gray-700" id="calculationSteps">
                    </div>
                </div>
            </div>

            <!-- Common Percentage Table -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Common Percentage Equivalents</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4 text-center">
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">1%</div>
                        <div class="text-sm text-gray-600">1/100</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">5%</div>
                        <div class="text-sm text-gray-600">1/20</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">10%</div>
                        <div class="text-sm text-gray-600">1/10</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">20%</div>
                        <div class="text-sm text-gray-600">1/5</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">25%</div>
                        <div class="text-sm text-gray-600">1/4</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">50%</div>
                        <div class="text-sm text-gray-600">1/2</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">75%</div>
                        <div class="text-sm text-gray-600">3/4</div>
                    </div>
                    <div class="p-3 border border-gray-200 rounded-lg">
                        <div class="text-lg font-bold text-blue-600">100%</div>
                        <div class="text-sm text-gray-600">1/1</div>
                    </div>
                </div>
            </div>

            <!-- Percentage Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Percentages</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-percentage text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a Percentage?</h3>
                        <p class="text-gray-600">A percentage is a number or ratio expressed as a fraction of 100. It is often denoted using the percent sign "%".</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calculator text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Basic Formula</h3>
                        <p class="text-gray-600">Percentage = (Part / Whole) × 100. This formula is used to find what percent one number is of another.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-bar text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Real-World Applications</h3>
                        <p class="text-gray-600">Percentages are used in discounts, interest rates, statistics, grades, and many everyday calculations.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Percentage Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I calculate percentage?</h3>
                        <p class="text-gray-600">To calculate what percent one number is of another, use the formula: (Part / Whole) × 100. For example, to find what percent 25 is of 100: (25/100) × 100 = 25%.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I calculate percentage increase?</h3>
                        <p class="text-gray-600">Percentage increase = [(New Value - Original Value) / Original Value] × 100. For example, if a price increases from $100 to $120, the increase is [(120-100)/100] × 100 = 20%.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I calculate percentage decrease?</h3>
                        <p class="text-gray-600">Percentage decrease = [(Original Value - New Value) / Original Value] × 100. For example, if a price decreases from $100 to $80, the decrease is [(100-80)/100] × 100 = 20%.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between percentage points and percent?</h3>
                        <p class="text-gray-600">Percentage points refer to the absolute difference between two percentages, while percent change refers to the relative difference. For example, going from 10% to 15% is a 5 percentage point increase or a 50% increase.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I add or subtract percentages?</h3>
                        <p class="text-gray-600">To add a percentage, multiply by (1 + percentage/100). To subtract a percentage, multiply by (1 - percentage/100). For example, to add 20% to 100: 100 × (1 + 20/100) = 120.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('gpa.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-divide text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">GPA Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate the GPA</p>
                    </a>
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tag text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate final price after discount</p>
                    </a>
                    <a href="{{ route('tip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tip Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate restaurant tips</p>
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
let currentCalculationType = 'basic';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculatePercentage(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change
    document.getElementById('partValue').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('wholeValue').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('originalValue').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('increasePercent').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('decreaseOriginal').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('decreasePercent').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('percentageValue').addEventListener('input', debounce(calculatePercentage, 300));
    document.getElementById('ofValue').addEventListener('input', debounce(calculatePercentage, 300));
    
    // Update display values
    document.getElementById('partValue').addEventListener('input', function() {
        document.getElementById('partDisplay').textContent = this.value;
    });
    document.getElementById('wholeValue').addEventListener('input', function() {
        document.getElementById('wholeDisplay').textContent = this.value;
    });
    document.getElementById('increasePercent').addEventListener('input', function() {
        document.getElementById('increasePercentDisplay').textContent = this.value;
    });
    document.getElementById('originalValue').addEventListener('input', function() {
        document.getElementById('originalValueDisplay').textContent = this.value;
    });
    document.getElementById('decreasePercent').addEventListener('input', function() {
        document.getElementById('decreasePercentDisplay').textContent = this.value;
    });
    document.getElementById('decreaseOriginal').addEventListener('input', function() {
        document.getElementById('decreaseOriginalDisplay').textContent = this.value;
    });
    document.getElementById('percentageValue').addEventListener('input', function() {
        document.getElementById('percentageValueDisplay').textContent = this.value;
    });
    document.getElementById('ofValue').addEventListener('input', function() {
        document.getElementById('ofValueDisplay').textContent = this.value;
    });
}

function setCalculationType(type) {
    currentCalculationType = type;
    
    // Reset all buttons
    document.querySelectorAll('.calc-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Set active button
    const activeButton = event.target.closest('.calc-type-btn');
    activeButton.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    activeButton.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Hide all input sections
    document.getElementById('basicInputs').classList.add('hidden');
    document.getElementById('increaseInputs').classList.add('hidden');
    document.getElementById('decreaseInputs').classList.add('hidden');
    document.getElementById('percentageOfInputs').classList.add('hidden');
    
    // Show current input section
    document.getElementById(type + 'Inputs').classList.remove('hidden');
    
    calculatePercentage();
}

function setCommonPercentage(percent) {
    const inputMap = {
        'basic': 'partValue',
        'increase': 'increasePercent',
        'decrease': 'decreasePercent',
        'percentageOf': 'percentageValue'
    };
    
    const inputId = inputMap[currentCalculationType];
    if (inputId) {
        document.getElementById(inputId).value = percent;
        
        // Update display
        if (currentCalculationType === 'basic') {
            document.getElementById('partDisplay').textContent = percent;
        } else if (currentCalculationType === 'increase') {
            document.getElementById('increasePercentDisplay').textContent = percent;
        } else if (currentCalculationType === 'decrease') {
            document.getElementById('decreasePercentDisplay').textContent = percent;
        } else if (currentCalculationType === 'percentageOf') {
            document.getElementById('percentageValueDisplay').textContent = percent;
        }
    }
    
    // Update common percentage buttons
    document.querySelectorAll('.common-percent-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-yellow-500', 'bg-yellow-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50', 'border-purple-500', 'bg-purple-50', 'border-indigo-500', 'bg-indigo-50', 'border-pink-500', 'bg-pink-50');
    });
    
    const colorMap = {
        5: 'blue', 10: 'green', 15: 'yellow', 20: 'orange',
        25: 'red', 50: 'purple', 75: 'indigo', 100: 'pink'
    };
    
    event.target.classList.add(`border-${colorMap[percent]}-500`, `bg-${colorMap[percent]}-50`);
    
    calculatePercentage();
}

function setScenario(type) {
    const scenarios = {
        'tip': { calculationType: 'percentageOf', percentage: 15, value: 50, description: '15% tip on $50 bill' },
        'discount': { calculationType: 'decrease', percentage: 20, value: 100, description: '20% discount on $100 item' },
        'tax': { calculationType: 'percentageOf', percentage: 8, value: 100, description: '8% tax on $100 purchase' },
        'markup': { calculationType: 'increase', percentage: 30, value: 50, description: '30% markup on $50 cost' }
    };
    
    const scenario = scenarios[type];
    
    // Set calculation type
    setCalculationType(scenario.calculationType);
    
    // Set values based on calculation type
    if (scenario.calculationType === 'basic') {
        document.getElementById('partValue').value = scenario.percentage;
        document.getElementById('wholeValue').value = scenario.value;
    } else if (scenario.calculationType === 'increase') {
        document.getElementById('originalValue').value = scenario.value;
        document.getElementById('increasePercent').value = scenario.percentage;
    } else if (scenario.calculationType === 'decrease') {
        document.getElementById('decreaseOriginal').value = scenario.value;
        document.getElementById('decreasePercent').value = scenario.percentage;
    } else if (scenario.calculationType === 'percentageOf') {
        document.getElementById('percentageValue').value = scenario.percentage;
        document.getElementById('ofValue').value = scenario.value;
    }
    
    // Update scenario buttons
    document.querySelectorAll('.scenario-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-red-500', 'bg-red-50', 'border-blue-500', 'bg-blue-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'tip': 'green',
        'discount': 'red',
        'tax': 'blue',
        'markup': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[type]}-500`, `bg-${colorMap[type]}-50`);
    
    calculatePercentage();
}

function calculatePercentage() {
    let result, formula, steps;
    
    switch(currentCalculationType) {
        case 'basic':
            result = calculateBasicPercentage();
            formula = "Percentage = (Part / Whole) × 100";
            steps = [
                `Part = ${result.part}`,
                `Whole = ${result.whole}`,
                `Percentage = (${result.part} / ${result.whole}) × 100`,
                `Percentage = ${result.percentage}%`
            ];
            break;
            
        case 'increase':
            result = calculatePercentageIncrease();
            formula = "New Value = Original × (1 + Percentage/100)";
            steps = [
                `Original Value = ${result.original}`,
                `Increase Percentage = ${result.percentage}%`,
                `Increase Amount = ${result.original} × (${result.percentage} / 100) = ${result.increaseAmount}`,
                `New Value = ${result.original} + ${result.increaseAmount} = ${result.newValue}`
            ];
            break;
            
        case 'decrease':
            result = calculatePercentageDecrease();
            formula = "New Value = Original × (1 - Percentage/100)";
            steps = [
                `Original Value = ${result.original}`,
                `Decrease Percentage = ${result.percentage}%`,
                `Decrease Amount = ${result.original} × (${result.percentage} / 100) = ${result.decreaseAmount}`,
                `New Value = ${result.original} - ${result.decreaseAmount} = ${result.newValue}`
            ];
            break;
            
        case 'percentageOf':
            result = calculatePercentageOf();
            formula = "Result = (Percentage / 100) × Value";
            steps = [
                `Percentage = ${result.percentage}%`,
                `Value = ${result.value}`,
                `Result = (${result.percentage} / 100) × ${result.value}`,
                `Result = ${result.result}`
            ];
            break;
    }
    
    if (result.error) {
        showError(result.error);
        return;
    }
    
    displayResults(result, formula, steps);
}

function calculateBasicPercentage() {
    const part = parseFloat(document.getElementById('partValue').value);
    const whole = parseFloat(document.getElementById('wholeValue').value);
    
    if (!part || !whole) {
        return { error: 'Please enter both part and whole values' };
    }
    
    if (whole === 0) {
        return { error: 'Whole value cannot be zero' };
    }
    
    const percentage = (part / whole) * 100;
    
    return {
        part: part,
        whole: whole,
        percentage: percentage.toFixed(2),
        result: part,
        difference: 0
    };
}

function calculatePercentageIncrease() {
    const original = parseFloat(document.getElementById('originalValue').value);
    const percentage = parseFloat(document.getElementById('increasePercent').value);
    
    if (!original || !percentage) {
        return { error: 'Please enter both original value and percentage' };
    }
    
    const increaseAmount = original * (percentage / 100);
    const newValue = original + increaseAmount;
    
    return {
        original: original,
        percentage: percentage,
        increaseAmount: increaseAmount.toFixed(2),
        newValue: newValue.toFixed(2),
        result: newValue.toFixed(2),
        difference: increaseAmount.toFixed(2)
    };
}

function calculatePercentageDecrease() {
    const original = parseFloat(document.getElementById('decreaseOriginal').value);
    const percentage = parseFloat(document.getElementById('decreasePercent').value);
    
    if (!original || !percentage) {
        return { error: 'Please enter both original value and percentage' };
    }
    
    const decreaseAmount = original * (percentage / 100);
    const newValue = original - decreaseAmount;
    
    return {
        original: original,
        percentage: percentage,
        decreaseAmount: decreaseAmount.toFixed(2),
        newValue: newValue.toFixed(2),
        result: newValue.toFixed(2),
        difference: decreaseAmount.toFixed(2)
    };
}

function calculatePercentageOf() {
    const percentage = parseFloat(document.getElementById('percentageValue').value);
    const value = parseFloat(document.getElementById('ofValue').value);
    
    if (!percentage || !value) {
        return { error: 'Please enter both percentage and value' };
    }
    
    const result = (percentage / 100) * value;
    
    return {
        percentage: percentage,
        value: value,
        result: result.toFixed(2),
        difference: 0
    };
}

function displayResults(result, formula, steps) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">${result.percentage || result.result}%</div>
                    <div class="text-lg font-semibold text-blue-800">${getResultDescription()}</div>
                    <div class="text-sm opacity-75 mt-1">${getCalculationDescription()}</div>
                </div>
            </div>

            <!-- Result Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${result.result}</div>
                    <div class="text-sm text-gray-600 mt-1">Result Value</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${result.difference || 'N/A'}</div>
                    <div class="text-sm text-gray-600 mt-1">Difference</div>
                </div>
            </div>

            <!-- Quick Facts -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Quick Facts</h4>
                <p class="text-sm text-green-800">
                    ${getQuickFacts(result)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('formulaSection').classList.remove('hidden');
    document.getElementById('formulaContent').innerHTML = formula;
    
    // Update detailed results
    updateDetailedResults(result, steps);
    document.getElementById('detailedResults').classList.remove('hidden');
}

function updateDetailedResults(result, steps) {
    document.getElementById('resultPercentage').textContent = (result.percentage || result.result) + '%';
    document.getElementById('resultValue').textContent = result.result;
    document.getElementById('resultDifference').textContent = result.difference || 'N/A';
    
    const stepsHTML = steps.map(step => 
        `<div class="flex items-center py-2 border-b border-gray-200 last:border-0">
            <i class="fas fa-arrow-right text-blue-500 mr-3"></i>
            <span class="text-gray-700">${step}</span>
        </div>`
    ).join('');
    
    document.getElementById('calculationSteps').innerHTML = stepsHTML;
}

function getResultDescription() {
    const descriptions = {
        'basic': 'Percentage Result',
        'increase': 'Increased Value',
        'decrease': 'Decreased Value',
        'percentageOf': 'Percentage Of Value'
    };
    return descriptions[currentCalculationType];
}

function getCalculationDescription() {
    const descriptions = {
        'basic': 'What percent one number is of another',
        'increase': 'Value after percentage increase',
        'decrease': 'Value after percentage decrease',
        'percentageOf': 'What is the percentage of a value'
    };
    return descriptions[currentCalculationType];
}

function getQuickFacts(result) {
    if (currentCalculationType === 'basic') {
        return `${result.part} is ${result.percentage}% of ${result.whole}. This means for every 100 units of the whole, there are ${result.percentage} units of the part.`;
    } else if (currentCalculationType === 'increase') {
        return `The value increased by ${result.increaseAmount} (${result.percentage}%). The new value is ${result.newValue}, which is ${(parseFloat(result.newValue) / parseFloat(result.original) * 100).toFixed(1)}% of the original.`;
    } else if (currentCalculationType === 'decrease') {
        return `The value decreased by ${result.decreaseAmount} (${result.percentage}%). The new value is ${result.newValue}, which is ${(parseFloat(result.newValue) / parseFloat(result.original) * 100).toFixed(1)}% of the original.`;
    } else if (currentCalculationType === 'percentageOf') {
        return `${result.percentage}% of ${result.value} is ${result.result}. This is equivalent to ${result.percentage}/100 or ${(result.percentage/100).toFixed(3)} of the value.`;
    }
    return '';
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
    document.getElementById('formulaSection').classList.add('hidden');
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