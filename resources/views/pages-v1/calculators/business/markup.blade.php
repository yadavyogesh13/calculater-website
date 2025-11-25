@extends('layouts.app')

@section('title', 'Markup Calculator - Calculate Profit Margin & Pricing | CalculaterTools')

@section('meta-description', 'Free markup calculator to calculate selling prices, profit margins, and markup percentages. Perfect for retail, manufacturing, and service businesses.')

@section('keywords', 'markup calculator, profit margin calculator, pricing calculator, retail pricing, cost price, selling price, margin calculator')

@section('canonical', url('/calculators/markup'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Markup Calculator",
    "description": "Calculate markup percentages, profit margins, and optimal pricing strategies",
    "url": "{{ url('/calculators/markup') }}",
    "operatingSystem": "Any",
    "applicationCategory": "BusinessApplication",
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
                        <a href="#business" class="text-blue-600 hover:text-blue-800 transition duration-150">Business Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Markup Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Markup Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate optimal selling prices, profit margins, and markup percentages for your products and services.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Markup & Margin</h2>
                        <p class="text-gray-600 mb-6">Enter your cost and pricing information to calculate markup and profit margins</p>
                        
                        <form id="markupCalculatorForm" class="space-y-6">
                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setCalculationMethod('costMarkup')" class="method-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-tag text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">Cost + Markup %</div>
                                    </button>
                                    <button type="button" onclick="setCalculationMethod('costMargin')" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-percentage text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">Cost + Margin %</div>
                                    </button>
                                    <button type="button" onclick="setCalculationMethod('priceMarkup')" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-dollar-sign text-purple-600 text-lg mb-1"></i>
                                        <div class="text-sm">Price - Markup %</div>
                                    </button>
                                    <button type="button" onclick="setCalculationMethod('priceMargin')" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-chart-line text-orange-600 text-lg mb-1"></i>
                                        <div class="text-sm">Price - Margin %</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Cost + Markup Inputs -->
                            <div id="costMarkupInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="costPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Cost Price
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="costPrice" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 50" 
                                                min="0"
                                                step="0.01"
                                                value="50"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Your cost to acquire or produce the item</p>
                                    </div>
                                    <div>
                                        <label for="markupPercentage" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Markup Percentage
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="markupPercentage" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 50" 
                                                min="0"
                                                max="1000"
                                                step="0.1"
                                                value="50"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Markup percentage on cost</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Cost + Margin Inputs -->
                            <div id="costMarginInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="costPriceMargin" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Cost Price
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="costPriceMargin" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 50" 
                                                min="0"
                                                step="0.01"
                                                value="50"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="marginPercentage" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Profit Margin %
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="marginPercentage" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 33.33" 
                                                min="0"
                                                max="100"
                                                step="0.1"
                                                value="33.33"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Desired profit margin percentage</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Price - Markup Inputs -->
                            <div id="priceMarkupInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sellingPriceMarkup" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Selling Price
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="sellingPriceMarkup" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 75" 
                                                min="0"
                                                step="0.01"
                                                value="75"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="markupPercentagePrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Markup Percentage
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="markupPercentagePrice" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 50" 
                                                min="0"
                                                max="1000"
                                                step="0.1"
                                                value="50"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Markup percentage used</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Price - Margin Inputs -->
                            <div id="priceMarginInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sellingPriceMargin" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Selling Price
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="sellingPriceMargin" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 75" 
                                                min="0"
                                                step="0.01"
                                                value="75"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="marginPercentagePrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Profit Margin %
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="marginPercentagePrice" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 33.33" 
                                                min="0"
                                                max="100"
                                                step="0.1"
                                                value="33.33"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Actual profit margin percentage</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Industry Standards -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Industry Standards
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setIndustryStandard('retail')" class="industry-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-store text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Retail</div>
                                        <div class="text-xs text-gray-500">50-100% markup</div>
                                    </button>
                                    <button type="button" onclick="setIndustryStandard('wholesale')" class="industry-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-pallet text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Wholesale</div>
                                        <div class="text-xs text-gray-500">20-50% markup</div>
                                    </button>
                                    <button type="button" onclick="setIndustryStandard('manufacturing')" class="industry-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-industry text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Manufacturing</div>
                                        <div class="text-xs text-gray-500">30-60% markup</div>
                                    </button>
                                    <button type="button" onclick="setIndustryStandard('service')" class="industry-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-concierge-bell text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Service</div>
                                        <div class="text-xs text-gray-500">100-200% markup</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Quick Markup Rates -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Markup Rates
                                </label>
                                <div class="grid grid-cols-4 md:grid-cols-8 gap-2">
                                    <button type="button" onclick="setQuickMarkup(20)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">20%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(30)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">30%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(40)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">40%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(50)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">50%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(75)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">75%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(100)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">100%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(150)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-indigo-500 hover:bg-indigo-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">150%</div>
                                    </button>
                                    <button type="button" onclick="setQuickMarkup(200)" class="markup-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">200%</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-3">Additional Options</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                            Quantity
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="quantity" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="e.g., 100" 
                                                min="1"
                                                step="1"
                                                value="1"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">units</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="flex items-center mt-6">
                                            <input type="checkbox" id="includeTax" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-gray-700">Include sales tax calculation</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateMarkup()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Markup
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Pricing Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-tags text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter pricing details</p>
                                <p class="text-sm">to see markup results</p>
                            </div>
                        </div>

                        <!-- Markup vs Margin -->
                        <div id="markupComparison" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Markup vs Margin</h4>
                            <div class="space-y-2 text-sm" id="comparisonContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Pricing Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="sellingPriceResult">$0.00</div>
                        <div class="text-blue-800 font-medium">Selling Price</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="profitAmount">$0.00</div>
                        <div class="text-green-800 font-medium">Profit Amount</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="markupResult">0%</div>
                        <div class="text-purple-800 font-medium">Markup %</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="marginResult">0%</div>
                        <div class="text-orange-800 font-medium">Margin %</div>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Price Breakdown</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-blue-200">
                                <h4 class="font-semibold text-blue-800 mb-3">Per Unit</h4>
                                <div class="space-y-2 text-sm" id="unitBreakdown">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-green-200">
                                <h4 class="font-semibold text-green-800 mb-3">Total (Quantity)</h4>
                                <div class="space-y-2 text-sm" id="totalBreakdown">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alternative Pricing -->
                <div class="bg-white rounded-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Alternative Pricing Scenarios</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="alternativePricing">
                        <!-- Alternative pricing scenarios will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Markup vs Margin Explanation -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Markup vs Margin: Understanding the Difference</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-arrow-up text-blue-600 mr-2"></i>
                            Markup Percentage
                        </h3>
                        <div class="bg-blue-50 rounded-lg p-4 mb-4">
                            <p class="text-blue-800 font-semibold mb-2">Formula:</p>
                            <p class="text-blue-700 text-sm">Markup % = [(Selling Price - Cost Price) / Cost Price] × 100</p>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Based on <strong>cost price</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Common in <strong>retail and wholesale</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Easy to calculate from cost</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-2"></i>
                                <span>Can be misleading at high percentages</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-chart-line text-green-600 mr-2"></i>
                            Profit Margin
                        </h3>
                        <div class="bg-green-50 rounded-lg p-4 mb-4">
                            <p class="text-green-800 font-semibold mb-2">Formula:</p>
                            <p class="text-green-700 text-sm">Margin % = [(Selling Price - Cost Price) / Selling Price] × 100</p>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Based on <strong>selling price</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Standard in <strong>financial reporting</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Better reflects true profitability</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-2"></i>
                                <span>Harder to calculate from cost</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Industry Standards Reference -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Industry Markup Standards</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-store text-blue-600 mr-2"></i>
                            Retail
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Electronics</span><span class="font-semibold">10-30%</span></div>
                            <div class="flex justify-between"><span>Clothing</span><span class="font-semibold">50-100%</span></div>
                            <div class="flex justify-between"><span>Jewelry</span><span class="font-semibold">100-200%</span></div>
                            <div class="flex justify-between"><span>Furniture</span><span class="font-semibold">40-80%</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-utensils text-green-600 mr-2"></i>
                            Restaurant
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Food Cost</span><span class="font-semibold">28-35%</span></div>
                            <div class="flex justify-between"><span>Alcohol</span><span class="font-semibold">200-400%</span></div>
                            <div class="flex justify-between"><span>Non-Alcohol</span><span class="font-semibold">300-500%</span></div>
                            <div class="flex justify-between"><span>Desserts</span><span class="font-semibold">70-90%</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-tools text-orange-600 mr-2"></i>
                            Service
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Consulting</span><span class="font-semibold">100-300%</span></div>
                            <div class="flex justify-between"><span>Repair</span><span class="font-semibold">50-100%</span></div>
                            <div class="flex justify-between"><span>Cleaning</span><span class="font-semibold">80-150%</span></div>
                            <div class="flex justify-between"><span>Professional</span><span class="font-semibold">150-400%</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-industry text-purple-600 mr-2"></i>
                            Manufacturing
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Consumer Goods</span><span class="font-semibold">30-60%</span></div>
                            <div class="flex justify-between"><span>Industrial</span><span class="font-semibold">20-40%</span></div>
                            <div class="flex justify-between"><span>Electronics</span><span class="font-semibold">40-70%</span></div>
                            <div class="flex justify-between"><span>Automotive</span><span class="font-semibold">15-35%</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Markup Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between markup and margin?</h3>
                        <p class="text-gray-600">Markup is calculated as a percentage of the cost price, while margin is calculated as a percentage of the selling price. A 50% markup equals a 33.33% margin.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I convert markup to margin?</h3>
                        <p class="text-gray-600">Margin = Markup / (1 + Markup). For example, 50% markup = 0.50 / (1 + 0.50) = 0.3333 = 33.33% margin.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a good markup percentage?</h3>
                        <p class="text-gray-600">It varies by industry. Retail typically uses 50-100%, wholesale 20-50%, manufacturing 30-60%, and services 100-200% markup.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I use markup or margin for pricing?</h3>
                        <p class="text-gray-600">Markup is easier for quick calculations from cost, while margin gives a better picture of true profitability. Many businesses use both depending on the situation.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I account for overhead in markup?</h3>
                        <p class="text-gray-600">Include a portion of your fixed overhead costs in your cost calculation, or add an additional percentage to cover overhead expenses beyond direct costs.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('profit.margin.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Profit Margin Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate business profits and margins</p>
                    </a>
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate sale prices and discounts</p>
                    </a>
                    <a href="{{ route('break.even.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-balance-scale text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Break-Even Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate business break-even point</p>
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
let currentMethod = 'costMarkup';

// Industry standards data
const industryStandards = {
    'retail': { markup: 75, description: 'Standard retail markup' },
    'wholesale': { markup: 35, description: 'Wholesale distribution markup' },
    'manufacturing': { markup: 45, description: 'Manufacturing markup' },
    'service': { markup: 150, description: 'Service business markup' }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateMarkup(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate when inputs change
    document.getElementById('costPrice').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('markupPercentage').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('costPriceMargin').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('marginPercentage').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('sellingPriceMarkup').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('markupPercentagePrice').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('sellingPriceMargin').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('marginPercentagePrice').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('quantity').addEventListener('input', debounce(calculateMarkup, 300));
    document.getElementById('includeTax').addEventListener('change', calculateMarkup);
}

function setCalculationMethod(method) {
    currentMethod = method;
    
    // Reset all buttons
    document.querySelectorAll('.method-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Set active button
    const activeButton = event.target.closest('.method-btn');
    activeButton.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    activeButton.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide input sections
    document.getElementById('costMarkupInputs').classList.add('hidden');
    document.getElementById('costMarginInputs').classList.add('hidden');
    document.getElementById('priceMarkupInputs').classList.add('hidden');
    document.getElementById('priceMarginInputs').classList.add('hidden');
    
    document.getElementById(method + 'Inputs').classList.remove('hidden');
    
    calculateMarkup();
}

function setIndustryStandard(industry) {
    const standard = industryStandards[industry];
    
    // Set markup percentage based on current method
    if (currentMethod === 'costMarkup' || currentMethod === 'priceMarkup') {
        document.getElementById('markupPercentage').value = standard.markup;
        document.getElementById('markupPercentagePrice').value = standard.markup;
    } else {
        // Convert markup to margin for margin-based methods
        const margin = (standard.markup / 100) / (1 + (standard.markup / 100)) * 100;
        document.getElementById('marginPercentage').value = margin.toFixed(2);
        document.getElementById('marginPercentagePrice').value = margin.toFixed(2);
    }
    
    // Update industry buttons
    document.querySelectorAll('.industry-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'retail': 'blue',
        'wholesale': 'green',
        'manufacturing': 'orange',
        'service': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[industry]}-500`, `bg-${colorMap[industry]}-50`);
    
    calculateMarkup();
}

function setQuickMarkup(markup) {
    if (currentMethod === 'costMarkup' || currentMethod === 'priceMarkup') {
        document.getElementById('markupPercentage').value = markup;
        document.getElementById('markupPercentagePrice').value = markup;
    } else {
        // Convert markup to margin
        const margin = (markup / 100) / (1 + (markup / 100)) * 100;
        document.getElementById('marginPercentage').value = margin.toFixed(2);
        document.getElementById('marginPercentagePrice').value = margin.toFixed(2);
    }
    
    // Update markup buttons
    document.querySelectorAll('.markup-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-yellow-500', 'bg-yellow-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50', 'border-purple-500', 'bg-purple-50', 'border-indigo-500', 'bg-indigo-50', 'border-pink-500', 'bg-pink-50');
    });
    
    const colorMap = {
        20: 'blue', 30: 'green', 40: 'yellow', 50: 'orange',
        75: 'red', 100: 'purple', 150: 'indigo', 200: 'pink'
    };
    
    event.target.classList.add(`border-${colorMap[markup]}-500`, `bg-${colorMap[markup]}-50`);
    
    calculateMarkup();
}

function calculateMarkup() {
    let costPrice, sellingPrice, markupPercent, marginPercent, profitAmount;
    
    switch(currentMethod) {
        case 'costMarkup':
            costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
            markupPercent = parseFloat(document.getElementById('markupPercentage').value) || 0;
            
            sellingPrice = costPrice * (1 + markupPercent / 100);
            profitAmount = sellingPrice - costPrice;
            marginPercent = (profitAmount / sellingPrice) * 100;
            break;
            
        case 'costMargin':
            costPrice = parseFloat(document.getElementById('costPriceMargin').value) || 0;
            marginPercent = parseFloat(document.getElementById('marginPercentage').value) || 0;
            
            if (marginPercent >= 100) {
                showError('Margin percentage must be less than 100%');
                return;
            }
            
            sellingPrice = costPrice / (1 - marginPercent / 100);
            profitAmount = sellingPrice - costPrice;
            markupPercent = (profitAmount / costPrice) * 100;
            break;
            
        case 'priceMarkup':
            sellingPrice = parseFloat(document.getElementById('sellingPriceMarkup').value) || 0;
            markupPercent = parseFloat(document.getElementById('markupPercentagePrice').value) || 0;
            
            costPrice = sellingPrice / (1 + markupPercent / 100);
            profitAmount = sellingPrice - costPrice;
            marginPercent = (profitAmount / sellingPrice) * 100;
            break;
            
        case 'priceMargin':
            sellingPrice = parseFloat(document.getElementById('sellingPriceMargin').value) || 0;
            marginPercent = parseFloat(document.getElementById('marginPercentagePrice').value) || 0;
            
            if (marginPercent >= 100) {
                showError('Margin percentage must be less than 100%');
                return;
            }
            
            costPrice = sellingPrice * (1 - marginPercent / 100);
            profitAmount = sellingPrice - costPrice;
            markupPercent = (profitAmount / costPrice) * 100;
            break;
    }
    
    // Validate calculations
    if (costPrice <= 0 || sellingPrice <= 0 || profitAmount < 0) {
        showError('Please check your input values');
        return;
    }
    
    displayResults(costPrice, sellingPrice, profitAmount, markupPercent, marginPercent);
    updateMarkupComparison(markupPercent, marginPercent);
}

function displayResults(costPrice, sellingPrice, profitAmount, markupPercent, marginPercent) {
    const quantity = parseInt(document.getElementById('quantity').value) || 1;
    const includeTax = document.getElementById('includeTax').checked;
    
    // Calculate totals
    const totalCost = costPrice * quantity;
    const totalRevenue = sellingPrice * quantity;
    const totalProfit = profitAmount * quantity;
    
    // Calculate tax if included
    let taxAmount = 0;
    let finalPrice = sellingPrice;
    if (includeTax) {
        taxAmount = sellingPrice * 0.08; // Assuming 8% sales tax
        finalPrice = sellingPrice + taxAmount;
    }
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">$${finalPrice.toFixed(2)}</div>
                    <div class="text-lg font-semibold text-blue-800">Selling Price</div>
                    <div class="text-sm opacity-75 mt-1">${includeTax ? 'Includes tax' : 'Excludes tax'}</div>
                </div>
            </div>

            <!-- Profit Metrics -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${markupPercent.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Markup</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${marginPercent.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Margin</div>
                </div>
            </div>

            <!-- Pricing Insight -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Pricing Insight</h4>
                <p class="text-sm text-green-800">
                    ${getPricingInsight(marginPercent)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('markupComparison').classList.remove('hidden');
    
    // Update detailed results
    updateDetailedResults(costPrice, sellingPrice, profitAmount, markupPercent, marginPercent, quantity, totalCost, totalRevenue, totalProfit, finalPrice, taxAmount);
    document.getElementById('detailedResults').classList.remove('hidden');
}

function updateDetailedResults(costPrice, sellingPrice, profitAmount, markupPercent, marginPercent, quantity, totalCost, totalRevenue, totalProfit, finalPrice, taxAmount) {
    // Update main metrics
    document.getElementById('sellingPriceResult').textContent = `$${finalPrice.toFixed(2)}`;
    document.getElementById('profitAmount').textContent = `$${profitAmount.toFixed(2)}`;
    document.getElementById('markupResult').textContent = `${markupPercent.toFixed(1)}%`;
    document.getElementById('marginResult').textContent = `${marginPercent.toFixed(1)}%`;
    
    // Update unit breakdown
    const unitBreakdownHTML = `
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Cost Price:</span>
            <span class="font-semibold text-gray-900">$${costPrice.toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Profit:</span>
            <span class="font-semibold text-green-600">$${profitAmount.toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Selling Price:</span>
            <span class="font-semibold text-blue-600">$${sellingPrice.toFixed(2)}</span>
        </div>
        ${taxAmount > 0 ? `
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Sales Tax (8%):</span>
            <span class="font-semibold text-orange-600">$${taxAmount.toFixed(2)}</span>
        </div>
        ` : ''}
        <div class="flex justify-between items-center py-1">
            <span class="text-gray-700">Final Price:</span>
            <span class="font-semibold text-purple-600">$${finalPrice.toFixed(2)}</span>
        </div>
    `;
    
    document.getElementById('unitBreakdown').innerHTML = unitBreakdownHTML;
    
    // Update total breakdown
    const totalBreakdownHTML = `
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Total Cost:</span>
            <span class="font-semibold text-gray-900">$${totalCost.toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Total Profit:</span>
            <span class="font-semibold text-green-600">$${totalProfit.toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Total Revenue:</span>
            <span class="font-semibold text-blue-600">$${totalRevenue.toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-1">
            <span class="text-gray-700">Profit per Unit:</span>
            <span class="font-semibold text-purple-600">$${profitAmount.toFixed(2)}</span>
        </div>
    `;
    
    document.getElementById('totalBreakdown').innerHTML = totalBreakdownHTML;
    
    // Update alternative pricing
    updateAlternativePricing(costPrice, marginPercent);
}

function updateAlternativePricing(costPrice, currentMargin) {
    const alternativeMargins = [20, 30, 40, 50];
    let alternativeHTML = '';
    
    alternativeMargins.forEach(margin => {
        const altSellingPrice = costPrice / (1 - margin / 100);
        const altProfit = altSellingPrice - costPrice;
        const altMarkup = (altProfit / costPrice) * 100;
        
        const isCurrent = Math.abs(margin - currentMargin) < 1;
        const borderClass = isCurrent ? 'border-green-500' : 'border-gray-200';
        const bgClass = isCurrent ? 'bg-green-50' : 'bg-white';
        
        alternativeHTML += `
            <div class="border ${borderClass} ${bgClass} rounded-lg p-4 text-center">
                <div class="text-lg font-bold ${isCurrent ? 'text-green-700' : 'text-gray-700'} mb-1">${margin}%</div>
                <div class="text-sm text-gray-600 mb-2">Margin</div>
                <div class="text-md font-semibold text-blue-600">$${altSellingPrice.toFixed(2)}</div>
                <div class="text-xs text-gray-500">${altMarkup.toFixed(1)}% markup</div>
            </div>
        `;
    });
    
    document.getElementById('alternativePricing').innerHTML = alternativeHTML;
}

function updateMarkupComparison(markupPercent, marginPercent) {
    const comparisonHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Markup on Cost:</span>
            <span class="font-semibold text-blue-600">${markupPercent.toFixed(1)}%</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Margin on Price:</span>
            <span class="font-semibold text-green-600">${marginPercent.toFixed(1)}%</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-700">Conversion:</span>
            <span class="font-semibold text-purple-600">${markupPercent.toFixed(1)}% → ${marginPercent.toFixed(1)}%</span>
        </div>
    `;
    
    document.getElementById('comparisonContent').innerHTML = comparisonHTML;
}

function getPricingInsight(marginPercent) {
    if (marginPercent > 50) {
        return "Excellent margin! This indicates premium pricing or very low costs. Consider if this aligns with your market position.";
    } else if (marginPercent > 30) {
        return "Strong margin. This provides good profitability while remaining competitive in most markets.";
    } else if (marginPercent > 20) {
        return "Reasonable margin. Suitable for volume-based businesses with moderate competition.";
    } else if (marginPercent > 10) {
        return "Low margin. Focus on cost control and volume. Consider if this meets your profit goals.";
    } else {
        return "Very low margin. Review your pricing strategy and costs. This may not be sustainable long-term.";
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
    document.getElementById('markupComparison').classList.add('hidden');
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