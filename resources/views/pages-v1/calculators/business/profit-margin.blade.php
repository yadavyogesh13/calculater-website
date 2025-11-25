@extends('layouts.app')

@section('title', 'Profit Margin Calculator | Calculate Markup & Profit | CalculaterTools')

@section('meta-description', 'Free profit margin calculator to calculate gross profit, net profit, markup percentages, and analyze business profitability. Essential for pricing strategies.')

@section('keywords', 'profit margin calculator, gross profit, net profit, markup calculator, business profitability, pricing strategy, margin calculator')

@section('canonical', url('/calculators/profit-margin'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Profit Margin Calculator",
    "description": "Calculate gross profit, net profit, markup percentages, and analyze business profitability",
    "url": "{{ url('/calculators/profit-margin') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-teal-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-teal-600 hover:text-teal-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#business" class="text-teal-600 hover:text-teal-800 transition duration-150">Business Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Profit Margin Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Profit Margin Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate gross profit, net profit, markup percentages, and analyze business profitability. Make informed pricing decisions with comprehensive margin analysis.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Profit Margins</h2>
                        <p class="text-gray-600 mb-6">Enter your cost and revenue details to analyze profitability</p>
                        
                        <form id="profitMarginCalculatorForm" class="space-y-6">
                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" id="costPriceBtn" class="method-btn py-3 px-4 border-2 border-teal-500 bg-teal-50 text-teal-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-tag mr-2"></i>
                                        Cost & Selling Price
                                    </button>
                                    <button type="button" id="revenueCostBtn" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Revenue & Costs
                                    </button>
                                </div>
                            </div>

                            <!-- Cost & Selling Price Inputs -->
                            <div id="costPriceInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="costPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Cost Price ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="costPrice" 
                                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="0.00" 
                                                min="0" 
                                                max="1000000" 
                                                step="0.01"
                                                value="50"
                                                required
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Cost to produce or acquire item</p>
                                    </div>
                                    <div>
                                        <label for="sellingPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Selling Price ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="sellingPrice" 
                                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="0.00" 
                                                min="0" 
                                                max="1000000" 
                                                step="0.01"
                                                value="75"
                                                required
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Price you sell to customers</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Revenue & Costs Inputs -->
                            <div id="revenueCostInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="totalRevenue" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Total Revenue ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="totalRevenue" 
                                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="0.00" 
                                                min="0" 
                                                max="10000000" 
                                                step="0.01"
                                                value="10000"
                                                required
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Total sales revenue</p>
                                    </div>
                                    <div>
                                        <label for="cogs" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Cost of Goods Sold ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="cogs" 
                                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="0.00" 
                                                min="0" 
                                                max="10000000" 
                                                step="0.01"
                                                value="6000"
                                                required
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Direct costs of production</p>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="operatingExpenses" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Operating Expenses ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="operatingExpenses" 
                                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="0.00" 
                                                min="0" 
                                                max="10000000" 
                                                step="0.01"
                                                value="2000"
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Overhead and operating costs</p>
                                    </div>
                                    <div>
                                        <label for="otherExpenses" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Other Expenses ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="otherExpenses" 
                                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="0.00" 
                                                min="0" 
                                                max="10000000" 
                                                step="0.01"
                                                value="500"
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Additional expenses</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label for="quantity" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Quantity
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="quantity" 
                                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                        placeholder="e.g., 1" 
                                        min="1" 
                                        max="1000000" 
                                        step="1"
                                        value="1"
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">units</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Number of units sold</p>
                            </div>

                            <!-- Industry Benchmarks -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <input 
                                        type="checkbox" 
                                        id="showBenchmarks" 
                                        class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                                        checked
                                    >
                                    <label for="showBenchmarks" class="ml-2 text-sm font-semibold text-gray-800">
                                        Compare with Industry Benchmarks
                                    </label>
                                </div>
                                <div id="industrySelection" class="space-y-3">
                                    <label class="block text-sm font-medium text-gray-700">Select Industry</label>
                                    <select id="industryType" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200">
                                        <option value="retail">Retail</option>
                                        <option value="restaurant">Restaurant</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="software">Software/SaaS</option>
                                        <option value="consulting">Consulting</option>
                                        <option value="construction">Construction</option>
                                        <option value="ecommerce">E-commerce</option>
                                        <option value="custom">Custom Benchmark</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Target Margin -->
                            <div class="bg-teal-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-teal-800 mb-3">Target Profit Margin</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="targetMargin" class="block text-xs font-medium text-teal-700 mb-2">
                                            Target Margin (%)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="targetMargin" 
                                                class="w-full pl-4 pr-12 py-2 border border-teal-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                                placeholder="e.g., 30" 
                                                min="0" 
                                                max="100" 
                                                step="0.1"
                                                value="30"
                                            >
                                            <span class="absolute right-3 top-2 text-teal-500 text-sm">%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" onclick="calculateTargetPrice()" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-lg font-medium text-sm transition duration-200">
                                            Calculate Target Price
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateProfitMargin()"
                                class="w-full bg-teal-600 hover:bg-teal-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-teal-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Profit Margins
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Profit Analysis</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-line text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter cost & price details</p>
                                <p class="text-sm">to see profit analysis</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-teal-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Margin vs Markup</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">50% Markup</span>
                                    <span class="font-medium text-gray-800">33% Margin</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">100% Markup</span>
                                    <span class="font-medium text-gray-800">50% Margin</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">200% Markup</span>
                                    <span class="font-medium text-gray-800">67% Margin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Key Metrics -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Key Profit Metrics</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-6 bg-teal-50 rounded-lg border border-teal-200">
                            <div class="text-2xl font-bold text-teal-600 mb-2" id="grossProfit">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Gross Profit</div>
                            <div class="text-sm text-gray-500 mt-1" id="grossMargin">0% Margin</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="netProfit">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Net Profit</div>
                            <div class="text-sm text-gray-500 mt-1" id="netMargin">0% Margin</div>
                        </div>
                        <div class="text-center p-6 bg-emerald-50 rounded-lg border border-emerald-200">
                            <div class="text-2xl font-bold text-emerald-600 mb-2" id="markupPercentage">0%</div>
                            <div class="text-lg font-semibold text-gray-700">Markup</div>
                            <div class="text-sm text-gray-500 mt-1">Over cost</div>
                        </div>
                        <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200">
                            <div class="text-2xl font-bold text-amber-600 mb-2" id="roiPercentage">0%</div>
                            <div class="text-lg font-semibold text-gray-700">ROI</div>
                            <div class="text-sm text-gray-500 mt-1">Return on investment</div>
                        </div>
                    </div>
                </div>

                <!-- Profit Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Profit Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Cost Structure -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Structure</h3>
                            <div class="space-y-4" id="costStructure">
                            </div>
                        </div>
                        
                        <!-- Profit Visualization -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Profit Distribution</h3>
                            <div class="space-y-4" id="profitVisualization">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Industry Comparison -->
                <div id="industryComparison" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8 hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Industry Comparison</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Benchmark Chart -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Gross Margin Benchmarks</h3>
                            <div class="space-y-4" id="benchmarkChart">
                            </div>
                        </div>
                        
                        <!-- Performance Analysis -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Performance Analysis</h3>
                            <div class="space-y-4" id="performanceAnalysis">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pricing Recommendations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="pricingRecommendations">
                    </div>
                </div>
            </div>

            <!-- Business Insights -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Profit Margin Insights</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-industry text-teal-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Industry Standards</h3>
                        <p class="text-gray-600">Average gross margins vary by industry: Retail (25-35%), Software (80-90%), Restaurants (3-15%), Manufacturing (20-40%).</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Margin vs Markup</h3>
                        <p class="text-gray-600">Margin is profit as percentage of revenue, while markup is profit as percentage of cost. A 50% markup equals 33% margin.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-pie text-emerald-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Break-even Analysis</h3>
                        <p class="text-gray-600">Calculate your break-even point to understand how many units you need to sell to cover fixed and variable costs.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trending-up text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Scaling Impact</h3>
                        <p class="text-gray-600">As production scales, fixed costs spread over more units, potentially increasing profit margins through economies of scale.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Profit Margin FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between gross margin and net margin?</h3>
                        <p class="text-gray-600">Gross margin is (Revenue - COGS) / Revenue, showing production efficiency. Net margin is (Revenue - All Expenses) / Revenue, showing overall profitability after all costs.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I convert markup to margin?</h3>
                        <p class="text-gray-600">Margin = Markup / (1 + Markup). Example: 50% markup = 0.50 / (1 + 0.50) = 33% margin. Use our calculator for automatic conversions.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a good profit margin for my business?</h3>
                        <p class="text-gray-600">Good margins vary by industry. Generally, 10-20% net margin is healthy for most businesses. Software often sees 20-30%, while retail might be 2-10%.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I improve my profit margins?</h3>
                        <p class="text-gray-600">Increase prices strategically, reduce production costs, optimize operations, increase sales volume, or focus on higher-margin products/services.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I worry about low profit margins?</h3>
                        <p class="text-gray-600">Be concerned if margins are consistently below industry averages, declining over time, or insufficient to cover business growth and unexpected expenses.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('break.even.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-teal-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-teal-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Break-even Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your break-even point</p>
                    </a>
                    <a href="{{ route('markup.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-teal-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Markup Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate markup percentages</p>
                    </a>
                    <a href="{{ route('roi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-teal-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-emerald-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">ROI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate return on investment</p>
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
let currentMethod = 'costPrice';
let showBenchmarks = true;

// Industry benchmark data
const industryBenchmarks = {
    'retail': { grossMargin: 25, netMargin: 3 },
    'restaurant': { grossMargin: 70, netMargin: 5 },
    'manufacturing': { grossMargin: 35, netMargin: 12 },
    'software': { grossMargin: 85, netMargin: 25 },
    'consulting': { grossMargin: 90, netMargin: 30 },
    'construction': { grossMargin: 20, netMargin: 5 },
    'ecommerce': { grossMargin: 40, netMargin: 10 },
    'custom': { grossMargin: 30, netMargin: 15 }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateProfitMargin(); // Calculate with default values
});

function setupEventListeners() {
    // Calculation method toggle
    document.getElementById('costPriceBtn').addEventListener('click', () => setCalculationMethod('costPrice'));
    document.getElementById('revenueCostBtn').addEventListener('click', () => setCalculationMethod('revenueCost'));
    
    // Benchmark toggle
    document.getElementById('showBenchmarks').addEventListener('change', function() {
        showBenchmarks = this.checked;
        calculateProfitMargin();
    });
    
    // Industry selection
    document.getElementById('industryType').addEventListener('change', calculateProfitMargin);
    
    // Auto-calculate on input change
    document.getElementById('costPrice').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('sellingPrice').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('totalRevenue').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('cogs').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('operatingExpenses').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('otherExpenses').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('quantity').addEventListener('input', debounce(calculateProfitMargin, 300));
    document.getElementById('targetMargin').addEventListener('input', debounce(calculateProfitMargin, 300));
}

function setCalculationMethod(method) {
    currentMethod = method;
    
    if (method === 'costPrice') {
        document.getElementById('costPriceBtn').classList.add('border-teal-500', 'bg-teal-50', 'text-teal-700');
        document.getElementById('costPriceBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('revenueCostBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('revenueCostBtn').classList.remove('border-teal-500', 'bg-teal-50', 'text-teal-700');
        document.getElementById('costPriceInputs').classList.remove('hidden');
        document.getElementById('revenueCostInputs').classList.add('hidden');
    } else {
        document.getElementById('revenueCostBtn').classList.add('border-teal-500', 'bg-teal-50', 'text-teal-700');
        document.getElementById('revenueCostBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('costPriceBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('costPriceBtn').classList.remove('border-teal-500', 'bg-teal-50', 'text-teal-700');
        document.getElementById('revenueCostInputs').classList.remove('hidden');
        document.getElementById('costPriceInputs').classList.add('hidden');
    }
    
    calculateProfitMargin();
}

function calculateProfitMargin() {
    let costPrice, sellingPrice, totalRevenue, cogs, operatingExpenses, otherExpenses, quantity;
    
    quantity = parseInt(document.getElementById('quantity').value) || 1;
    
    if (currentMethod === 'costPrice') {
        costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
        sellingPrice = parseFloat(document.getElementById('sellingPrice').value) || 0;
        
        if (!costPrice || costPrice <= 0) {
            showError('Please enter a valid cost price');
            return;
        }
        if (!sellingPrice || sellingPrice <= 0) {
            showError('Please enter a valid selling price');
            return;
        }
        
        // Calculate revenue and costs from unit prices
        totalRevenue = sellingPrice * quantity;
        cogs = costPrice * quantity;
        operatingExpenses = 0;
        otherExpenses = 0;
    } else {
        totalRevenue = parseFloat(document.getElementById('totalRevenue').value) || 0;
        cogs = parseFloat(document.getElementById('cogs').value) || 0;
        operatingExpenses = parseFloat(document.getElementById('operatingExpenses').value) || 0;
        otherExpenses = parseFloat(document.getElementById('otherExpenses').value) || 0;
        
        if (!totalRevenue || totalRevenue <= 0) {
            showError('Please enter valid revenue');
            return;
        }
        if (!cogs || cogs <= 0) {
            showError('Please enter valid cost of goods sold');
            return;
        }
        
        // Calculate unit prices from totals
        costPrice = cogs / quantity;
        sellingPrice = totalRevenue / quantity;
    }
    
    // Calculate profit metrics
    const grossProfit = totalRevenue - cogs;
    const totalExpenses = cogs + operatingExpenses + otherExpenses;
    const netProfit = totalRevenue - totalExpenses;
    
    // Calculate percentages
    const grossMargin = (grossProfit / totalRevenue) * 100;
    const netMargin = (netProfit / totalRevenue) * 100;
    const markup = ((sellingPrice - costPrice) / costPrice) * 100;
    const roi = (netProfit / totalExpenses) * 100;
    
    // Calculate per unit metrics
    const grossProfitPerUnit = grossProfit / quantity;
    const netProfitPerUnit = netProfit / quantity;
    
    // Display results
    displayResults(grossProfit, netProfit, grossMargin, netMargin, markup, roi, 
                  grossProfitPerUnit, netProfitPerUnit, quantity);
    
    // Generate detailed analysis
    generateDetailedAnalysis(costPrice, sellingPrice, grossProfit, netProfit, grossMargin, 
                           netMargin, totalRevenue, cogs, operatingExpenses, otherExpenses, quantity);
    
    // Show industry comparison if enabled
    if (showBenchmarks) {
        generateIndustryComparison(grossMargin, netMargin);
    }
    
    // Generate pricing recommendations
    generatePricingRecommendations(costPrice, grossMargin, netMargin);
}

function displayResults(grossProfit, netProfit, grossMargin, netMargin, markup, roi,
                       grossProfitPerUnit, netProfitPerUnit, quantity) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-teal-50 to-green-50 rounded-xl p-6 border-2 border-teal-200">
                <div class="text-center mb-4">
                    <div class="text-2xl md:text-3xl font-bold text-teal-600 mb-2">${grossMargin.toFixed(1)}%</div>
                    <div class="text-lg font-semibold text-gray-700">Gross Margin</div>
                    <div class="text-sm text-gray-500 mt-1">$${grossProfit.toFixed(2)} total profit</div>
                </div>
            </div>

            <!-- Additional Metrics -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">${netMargin.toFixed(1)}%</div>
                    <div class="text-sm text-blue-800">Net Margin</div>
                </div>
                <div class="bg-emerald-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-emerald-600 mb-1">${markup.toFixed(1)}%</div>
                    <div class="text-sm text-emerald-800">Markup</div>
                </div>
            </div>

            ${quantity > 1 ? `
            <!-- Per Unit Info -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <h4 class="font-semibold text-amber-900 mb-2">Per Unit (${quantity} units)</h4>
                <p class="text-sm text-amber-800">
                    <strong>$${grossProfitPerUnit.toFixed(2)} gross profit</strong> per unit<br>
                    <strong>$${netProfitPerUnit.toFixed(2)} net profit</strong> per unit
                </p>
            </div>
            ` : ''}

            <!-- ROI Info -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <h4 class="font-semibold text-purple-900 mb-2">Return on Investment</h4>
                <p class="text-sm text-purple-800">
                    <strong>${roi.toFixed(1)}% ROI</strong> - For every $1 invested, you get $${(roi/100).toFixed(2)} back
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('referenceSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update main metrics
    document.getElementById('grossProfit').textContent = `$${grossProfit.toFixed(2)}`;
    document.getElementById('grossMargin').textContent = `${grossMargin.toFixed(1)}% Margin`;
    document.getElementById('netProfit').textContent = `$${netProfit.toFixed(2)}`;
    document.getElementById('netMargin').textContent = `${netMargin.toFixed(1)}% Margin`;
    document.getElementById('markupPercentage').textContent = `${markup.toFixed(1)}%`;
    document.getElementById('roiPercentage').textContent = `${roi.toFixed(1)}%`;
}

function generateDetailedAnalysis(costPrice, sellingPrice, grossProfit, netProfit, grossMargin, 
                                netMargin, totalRevenue, cogs, operatingExpenses, otherExpenses, quantity) {
    generateCostStructure(totalRevenue, cogs, operatingExpenses, otherExpenses, grossProfit, netProfit);
    generateProfitVisualization(totalRevenue, cogs, operatingExpenses, otherExpenses, grossMargin, netMargin);
}

function generateCostStructure(totalRevenue, cogs, operatingExpenses, otherExpenses, grossProfit, netProfit) {
    const cogsPercentage = (cogs / totalRevenue) * 100;
    const operatingPercentage = (operatingExpenses / totalRevenue) * 100;
    const otherPercentage = (otherExpenses / totalRevenue) * 100;
    const grossPercentage = (grossProfit / totalRevenue) * 100;
    const netPercentage = (netProfit / totalRevenue) * 100;
    
    document.getElementById('costStructure').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Total Revenue</span>
                <span class="font-semibold text-gray-900">$${totalRevenue.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg border border-red-200">
                <span class="text-red-700">Cost of Goods Sold (${cogsPercentage.toFixed(1)}%)</span>
                <span class="font-semibold text-red-900">-$${cogs.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-teal-50 rounded-lg border border-teal-200">
                <span class="text-teal-700">Gross Profit (${grossPercentage.toFixed(1)}%)</span>
                <span class="font-semibold text-teal-900">$${grossProfit.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg border border-orange-200">
                <span class="text-orange-700">Operating Expenses (${operatingPercentage.toFixed(1)}%)</span>
                <span class="font-semibold text-orange-900">-$${operatingExpenses.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <span class="text-yellow-700">Other Expenses (${otherPercentage.toFixed(1)}%)</span>
                <span class="font-semibold text-yellow-900">-$${otherExpenses.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg border border-green-200">
                <span class="text-green-700">Net Profit (${netPercentage.toFixed(1)}%)</span>
                <span class="font-semibold text-green-900">$${netProfit.toFixed(2)}</span>
            </div>
        </div>
    `;
}

function generateProfitVisualization(totalRevenue, cogs, operatingExpenses, otherExpenses, grossMargin, netMargin) {
    const cogsPercentage = (cogs / totalRevenue) * 100;
    const operatingPercentage = (operatingExpenses / totalRevenue) * 100;
    const otherPercentage = (otherExpenses / totalRevenue) * 100;
    const netProfitPercentage = netMargin;
    
    document.getElementById('profitVisualization').innerHTML = `
        <div class="space-y-4">
            <!-- Revenue Distribution Chart -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Revenue Distribution</h4>
                <div class="relative h-6 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-6 bg-red-500 rounded-l-full" 
                         style="width: ${cogsPercentage}%">
                    </div>
                    <div class="absolute h-6 bg-orange-500" 
                         style="left: ${cogsPercentage}%; width: ${operatingPercentage}%">
                    </div>
                    <div class="absolute h-6 bg-yellow-500" 
                         style="left: ${cogsPercentage + operatingPercentage}%; width: ${otherPercentage}%">
                    </div>
                    <div class="absolute h-6 bg-green-500 rounded-r-full" 
                         style="left: ${cogsPercentage + operatingPercentage + otherPercentage}%; width: ${netProfitPercentage}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>COGS (${cogsPercentage.toFixed(1)}%)</span>
                    <span>Operating (${operatingPercentage.toFixed(1)}%)</span>
                    <span>Other (${otherPercentage.toFixed(1)}%)</span>
                    <span>Profit (${netProfitPercentage.toFixed(1)}%)</span>
                </div>
            </div>
            
            <!-- Margin Analysis -->
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-teal-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-teal-600">${grossMargin.toFixed(1)}%</div>
                    <div class="text-xs text-teal-800">Gross Margin</div>
                </div>
                <div class="bg-green-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-green-600">${netMargin.toFixed(1)}%</div>
                    <div class="text-xs text-green-800">Net Margin</div>
                </div>
            </div>
            
            <!-- Efficiency Metrics -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                <h5 class="font-semibold text-blue-800 text-sm mb-1">Efficiency Metrics</h5>
                <p class="text-xs text-blue-700">
                    Every $1 of revenue generates $${(netMargin/100).toFixed(2)} in net profit<br>
                    Operating efficiency: ${(100 - cogsPercentage).toFixed(1)}% of revenue available for expenses & profit
                </p>
            </div>
        </div>
    `;
}

function generateIndustryComparison(grossMargin, netMargin) {
    const industry = document.getElementById('industryType').value;
    const benchmark = industryBenchmarks[industry];
    
    document.getElementById('industryComparison').classList.remove('hidden');
    
    // Benchmark Chart
    document.getElementById('benchmarkChart').innerHTML = `
        <div class="space-y-4">
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Gross Margin Comparison</h4>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-700">Your Business</span>
                            <span class="font-semibold ${grossMargin >= benchmark.grossMargin ? 'text-green-600' : 'text-red-600'}">
                                ${grossMargin.toFixed(1)}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-teal-500 h-3 rounded-full" style="width: ${Math.min(grossMargin, 100)}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-700">Industry Average</span>
                            <span class="font-semibold text-blue-600">${benchmark.grossMargin}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: ${Math.min(benchmark.grossMargin, 100)}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Net Margin Comparison</h4>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-700">Your Business</span>
                            <span class="font-semibold ${netMargin >= benchmark.netMargin ? 'text-green-600' : 'text-red-600'}">
                                ${netMargin.toFixed(1)}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-green-500 h-3 rounded-full" style="width: ${Math.min(netMargin, 100)}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-700">Industry Average</span>
                            <span class="font-semibold text-blue-600">${benchmark.netMargin}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-blue-500 h-3 rounded-full" style="width: ${Math.min(benchmark.netMargin, 100)}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Performance Analysis
    const grossComparison = grossMargin - benchmark.grossMargin;
    const netComparison = netMargin - benchmark.netMargin;
    
    document.getElementById('performanceAnalysis').innerHTML = `
        <div class="space-y-4">
            <div class="bg-${grossComparison >= 0 ? 'green' : 'red'}-50 border border-${grossComparison >= 0 ? 'green' : 'red'}-200 rounded-lg p-4">
                <h4 class="font-semibold text-${grossComparison >= 0 ? 'green' : 'red'}-900 mb-2">Gross Margin Analysis</h4>
                <p class="text-sm text-${grossComparison >= 0 ? 'green' : 'red'}-800">
                    Your gross margin is <strong>${Math.abs(grossComparison).toFixed(1)}% ${grossComparison >= 0 ? 'above' : 'below'}</strong> industry average.
                    ${grossComparison >= 0 ? 
                        'Excellent! Your production efficiency is better than average.' :
                        'Consider optimizing your production costs or increasing prices.'
                    }
                </p>
            </div>
            
            <div class="bg-${netComparison >= 0 ? 'green' : 'red'}-50 border border-${netComparison >= 0 ? 'green' : 'red'}-200 rounded-lg p-4">
                <h4 class="font-semibold text-${netComparison >= 0 ? 'green' : 'red'}-900 mb-2">Net Margin Analysis</h4>
                <p class="text-sm text-${netComparison >= 0 ? 'green' : 'red'}-800">
                    Your net margin is <strong>${Math.abs(netComparison).toFixed(1)}% ${netComparison >= 0 ? 'above' : 'below'}</strong> industry average.
                    ${netComparison >= 0 ? 
                        'Great! Your overall profitability exceeds industry standards.' :
                        'Look for opportunities to reduce operating expenses or increase revenue.'
                    }
                </p>
            </div>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Industry Insights</h4>
                <p class="text-sm text-blue-800">
                    ${getIndustryInsights(industry)}
                </p>
            </div>
        </div>
    `;
}

function getIndustryInsights(industry) {
    const insights = {
        'retail': 'Focus on inventory management, supplier negotiations, and strategic pricing to improve margins.',
        'restaurant': 'Control food costs, optimize menu pricing, and manage labor efficiency for better profitability.',
        'manufacturing': 'Improve production efficiency, reduce waste, and optimize supply chain for margin enhancement.',
        'software': 'Leverage scalability, focus on customer retention, and optimize development costs.',
        'consulting': 'Maximize billable hours, manage project scope, and control overhead expenses.',
        'construction': 'Improve project estimation accuracy, manage subcontractor costs, and control timeline overruns.',
        'ecommerce': 'Optimize shipping costs, reduce returns, and implement dynamic pricing strategies.',
        'custom': 'Analyze your specific cost structure and identify areas for optimization and efficiency improvements.'
    };
    return insights[industry] || 'Focus on cost control, pricing strategy, and operational efficiency.';
}

function generatePricingRecommendations(costPrice, grossMargin, netMargin) {
    const targetMargin = parseFloat(document.getElementById('targetMargin').value) || 30;
    const targetSellingPrice = costPrice / (1 - targetMargin/100);
    
    document.getElementById('pricingRecommendations').innerHTML = `
        <div class="text-center p-6 bg-teal-50 rounded-lg border border-teal-200">
            <div class="text-2xl font-bold text-teal-600 mb-2">$${targetSellingPrice.toFixed(2)}</div>
            <div class="text-lg font-semibold text-gray-700">Target Selling Price</div>
            <div class="text-sm text-gray-500 mt-1">For ${targetMargin}% gross margin</div>
        </div>
        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2">${getPricingStrategy(grossMargin)}</div>
            <div class="text-lg font-semibold text-gray-700">Pricing Strategy</div>
            <div class="text-sm text-gray-500 mt-1">Recommended approach</div>
        </div>
        <div class="text-center p-6 bg-emerald-50 rounded-lg border border-emerald-200">
            <div class="text-2xl font-bold text-emerald-600 mb-2">${getImprovementAreas(grossMargin, netMargin)}</div>
            <div class="text-lg font-semibold text-gray-700">Focus Areas</div>
            <div class="text-sm text-gray-500 mt-1">For margin improvement</div>
        </div>
    `;
}

function getPricingStrategy(grossMargin) {
    if (grossMargin < 20) return 'Cost-Plus';
    if (grossMargin < 40) return 'Value-Based';
    if (grossMargin < 60) return 'Competitive';
    return 'Premium';
}

function getImprovementAreas(grossMargin, netMargin) {
    if (grossMargin - netMargin > 30) return 'Cost Control';
    if (grossMargin < 25) return 'Pricing';
    if (netMargin < 10) return 'Efficiency';
    return 'Growth';
}

function calculateTargetPrice() {
    const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
    const targetMargin = parseFloat(document.getElementById('targetMargin').value) || 30;
    
    if (!costPrice || costPrice <= 0) {
        alert('Please enter a valid cost price first');
        return;
    }
    
    const targetSellingPrice = costPrice / (1 - targetMargin/100);
    document.getElementById('sellingPrice').value = targetSellingPrice.toFixed(2);
    calculateProfitMargin();
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
    document.getElementById('referenceSection').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
    document.getElementById('industryComparison').classList.add('hidden');
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
.method-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.method-btn:hover {
    transform: translateY(-1px);
}

.metric-card {
    transition: all 0.3s ease;
}

.metric-card:hover {
    transform: scale(1.02);
}
</style>
@endsection