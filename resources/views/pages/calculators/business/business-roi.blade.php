@extends('layouts.app')

@section('title', 'ROI Calculator - Calculate Return on Investment | CalculaterTools')

@section('meta-description', 'Free ROI calculator to calculate return on investment, annualized returns, and compare investment performance. Perfect for business investments, stocks, and projects.')

@section('keywords', 'ROI calculator, return on investment, investment calculator, ROI formula, business ROI, investment return, financial calculator')

@section('canonical', url('/calculators/roi'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "ROI Calculator",
    "description": "Calculate return on investment, annualized returns, and compare investment performance",
    "url": "{{ url('/calculators/roi') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
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
                        <a href="#finance" class="text-blue-600 hover:text-blue-800 transition duration-150">Financial Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">ROI Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">ROI Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate Return on Investment, analyze investment performance, and compare different investment scenarios.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate ROI</h2>
                        <p class="text-gray-600 mb-6">Enter your investment details to calculate return on investment and performance metrics</p>
                        
                        <form id="roiCalculatorForm" class="space-y-6">
                            <!-- Investment Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Investment Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setInvestmentType('business')" class="investment-type-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-building text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">Business</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('stock')" class="investment-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-chart-line text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">Stock</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('realestate')" class="investment-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-home text-purple-600 text-lg mb-1"></i>
                                        <div class="text-sm">Real Estate</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('project')" class="investment-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-project-diagram text-orange-600 text-lg mb-1"></i>
                                        <div class="text-sm">Project</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Basic Investment Inputs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="initialInvestment" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Initial Investment
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="initialInvestment" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 10000" 
                                            min="0"
                                            step="100"
                                            value="10000"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">$</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Amount initially invested</p>
                                </div>
                                <div>
                                    <label for="finalValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Final Value
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="finalValue" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 15000" 
                                            min="0"
                                            step="100"
                                            value="15000"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">$</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Current or final value</p>
                                </div>
                            </div>

                            <!-- Time Period -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="investmentPeriod" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Investment Period
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="investmentPeriod" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 3" 
                                            min="0.1"
                                            max="100"
                                            step="0.1"
                                            value="3"
                                        >
                                        <select id="periodUnit" class="absolute right-3 top-3 bg-transparent border-none focus:ring-0 text-gray-500">
                                            <option value="years">years</option>
                                            <option value="months">months</option>
                                            <option value="days">days</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex items-end">
                                    <p class="text-xs text-gray-500">Duration of the investment</p>
                                </div>
                            </div>

                            <!-- Additional Costs & Income -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-3">Additional Costs & Income</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="additionalCosts" class="block text-sm font-medium text-gray-700 mb-2">
                                            Additional Costs
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="additionalCosts" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="e.g., 500" 
                                                min="0"
                                                step="10"
                                                value="0"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">$</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Fees, maintenance, etc.</p>
                                    </div>
                                    <div>
                                        <label for="additionalIncome" class="block text-sm font-medium text-gray-700 mb-2">
                                            Additional Income
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="additionalIncome" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="e.g., 1000" 
                                                min="0"
                                                step="10"
                                                value="0"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">$</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Dividends, rent, etc.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Investment Scenarios -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Investment Scenarios
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setScenario('conservative')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-shield-alt text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Conservative</div>
                                        <div class="text-xs text-gray-500">5-10% ROI</div>
                                    </button>
                                    <button type="button" onclick="setScenario('moderate')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-balance-scale text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Moderate</div>
                                        <div class="text-xs text-gray-500">10-15% ROI</div>
                                    </button>
                                    <button type="button" onclick="setScenario('aggressive')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-bolt text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Aggressive</div>
                                        <div class="text-xs text-gray-500">15-25% ROI</div>
                                    </button>
                                    <button type="button" onclick="setScenario('venture')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-rocket text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Venture</div>
                                        <div class="text-xs text-gray-500">25%+ ROI</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Quick ROI Targets -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick ROI Targets
                                </label>
                                <div class="grid grid-cols-4 md:grid-cols-8 gap-2">
                                    <button type="button" onclick="setROITarget(25)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">25%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(50)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">50%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(100)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">100%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(200)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">200%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(500)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">500%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(1000)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">1000%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(2000)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-indigo-500 hover:bg-indigo-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">2000%</div>
                                    </button>
                                    <button type="button" onclick="setROITarget(5000)" class="roi-target-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">5000%</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h4 class="font-semibold text-blue-800 mb-3">Analysis Options</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" id="includeInflation" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-blue-700">Adjust for inflation (3%)</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" id="compareToBenchmark" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-blue-700">Compare to S&P 500 benchmark</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateROI()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate ROI
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">ROI Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-line text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter investment details</p>
                                <p class="text-sm">to see ROI results</p>
                            </div>
                        </div>

                        <!-- ROI Benchmarks -->
                        <div id="roiBenchmarks" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Industry Benchmarks</h4>
                            <div class="space-y-2 text-sm" id="benchmarksContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed ROI Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="roiPercentage">0%</div>
                        <div class="text-blue-800 font-medium">ROI Percentage</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="netProfit">$0</div>
                        <div class="text-green-800 font-medium">Net Profit</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="annualROI">0%</div>
                        <div class="text-purple-800 font-medium">Annual ROI</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="investmentPeriodResult">0</div>
                        <div class="text-orange-800 font-medium">Period</div>
                    </div>
                </div>

                <!-- Performance Metrics -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Performance Metrics</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-blue-200">
                                <h4 class="font-semibold text-blue-800 mb-3">Absolute Returns</h4>
                                <div class="space-y-2 text-sm" id="absoluteReturns">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-green-200">
                                <h4 class="font-semibold text-green-800 mb-3">Annualized Performance</h4>
                                <div class="space-y-2 text-sm" id="annualizedPerformance">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison Analysis -->
                <div class="bg-white rounded-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Comparison Analysis</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="comparisonAnalysis">
                        <!-- Comparison scenarios will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Investment Scenarios -->
            <div id="investmentScenarios" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Alternative Investment Scenarios</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="scenariosContent">
                    <!-- Investment scenarios will be populated by JavaScript -->
                </div>
            </div>

            <!-- ROI Formula & Explanation -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding ROI</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calculator text-blue-600 mr-2"></i>
                            ROI Formula
                        </h3>
                        <div class="bg-blue-50 rounded-lg p-4 mb-4">
                            <p class="text-blue-800 font-semibold mb-2">Basic ROI Formula:</p>
                            <p class="text-blue-700 text-sm font-mono">ROI = [(Final Value - Initial Investment) / Initial Investment] × 100</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4">
                            <p class="text-green-800 font-semibold mb-2">Annualized ROI Formula:</p>
                            <p class="text-green-700 text-sm font-mono">Annual ROI = [(1 + ROI)^(1/Years) - 1] × 100</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-green-600 mr-2"></i>
                            Key Insights
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Positive ROI</strong> indicates profitable investment</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-500 mt-1 mr-2"></i>
                                <span><strong>Negative ROI</strong> means investment lost money</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-clock text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Time matters</strong> - Always consider investment period</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-chart-bar text-purple-500 mt-1 mr-2"></i>
                                <span><strong>Compare to benchmarks</strong> like S&P 500 for context</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Industry ROI Benchmarks -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Industry ROI Benchmarks</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-building text-blue-600 mr-2"></i>
                            Technology
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Software</span><span class="font-semibold text-green-600">20-50%</span></div>
                            <div class="flex justify-between"><span>Hardware</span><span class="font-semibold text-blue-600">15-30%</span></div>
                            <div class="flex justify-between"><span>Startups</span><span class="font-semibold text-purple-600">50-200%</span></div>
                            <div class="flex justify-between"><span>AI/ML</span><span class="font-semibold text-orange-600">30-100%</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-home text-green-600 mr-2"></i>
                            Real Estate
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Residential</span><span class="font-semibold text-green-600">8-12%</span></div>
                            <div class="flex justify-between"><span>Commercial</span><span class="font-semibold text-blue-600">10-15%</span></div>
                            <div class="flex justify-between"><span>REITs</span><span class="font-semibold text-purple-600">12-18%</span></div>
                            <div class="flex justify-between"><span>Development</span><span class="font-semibold text-orange-600">15-25%</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-industry text-orange-600 mr-2"></i>
                            Manufacturing
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>Consumer Goods</span><span class="font-semibold text-green-600">12-20%</span></div>
                            <div class="flex justify-between"><span>Industrial</span><span class="font-semibold text-blue-600">10-18%</span></div>
                            <div class="flex justify-between"><span>Automotive</span><span class="font-semibold text-purple-600">8-15%</span></div>
                            <div class="flex justify-between"><span>Pharmaceutical</span><span class="font-semibold text-orange-600">15-25%</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-store text-purple-600 mr-2"></i>
                            Retail & Services
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>E-commerce</span><span class="font-semibold text-green-600">20-40%</span></div>
                            <div class="flex justify-between"><span>Restaurants</span><span class="font-semibold text-blue-600">15-25%</span></div>
                            <div class="flex justify-between"><span>Consulting</span><span class="font-semibold text-purple-600">25-50%</span></div>
                            <div class="flex justify-between"><span>Franchise</span><span class="font-semibold text-orange-600">10-20%</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">ROI Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a good ROI percentage?</h3>
                        <p class="text-gray-600">A good ROI depends on the investment type and risk. Generally, 7-10% is good for low-risk investments, 10-15% for moderate risk, and 15%+ for high-risk investments. Always compare to relevant benchmarks.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between ROI and annualized ROI?</h3>
                        <p class="text-gray-600">ROI shows total return over the entire period, while annualized ROI shows the average return per year. This allows comparison between investments with different time periods.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I include additional costs in ROI calculation?</h3>
                        <p class="text-gray-600">Yes, for accurate ROI, include all relevant costs like fees, maintenance, and taxes. This gives you the true net return on your investment.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does inflation affect ROI?</h3>
                        <p class="text-gray-600">Inflation reduces purchasing power. A 10% ROI with 3% inflation gives a real return of about 7%. Always consider real (inflation-adjusted) returns for long-term investments.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is considered a successful investment?</h3>
                        <p class="text-gray-600">A successful investment typically beats inflation, exceeds relevant benchmarks (like S&P 500 for stocks), meets your personal financial goals, and aligns with your risk tolerance.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="{{ route('compound.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest</h3>
                        <p class="text-gray-600 text-sm">Calculate compound growth</p>
                    </a>
                    <a href="{{ route('npv.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calculator text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">NPV Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate net present value</p>
                    </a>
                    <a href="{{ route('payback.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-clock text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Payback Period</h3>
                        <p class="text-gray-600 text-sm">Calculate investment recovery time</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variables
let currentInvestmentType = 'business';

// Investment scenarios data
const investmentScenarios = {
    'conservative': { roi: 7.5, period: 5, description: 'Low risk, stable returns' },
    'moderate': { roi: 12.5, period: 5, description: 'Balanced risk and return' },
    'aggressive': { roi: 20, period: 5, description: 'Higher risk, potential for higher returns' },
    'venture': { roi: 50, period: 5, description: 'High risk, venture capital style' }
};

// Industry benchmarks
const industryBenchmarks = {
    'technology': { min: 15, max: 50, average: 25 },
    'realestate': { min: 8, max: 25, average: 12 },
    'manufacturing': { min: 8, max: 25, average: 15 },
    'retail': { min: 10, max: 40, average: 20 }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateROI(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate when inputs change
    document.getElementById('initialInvestment').addEventListener('input', debounce(calculateROI, 300));
    document.getElementById('finalValue').addEventListener('input', debounce(calculateROI, 300));
    document.getElementById('investmentPeriod').addEventListener('input', debounce(calculateROI, 300));
    document.getElementById('periodUnit').addEventListener('change', calculateROI);
    document.getElementById('additionalCosts').addEventListener('input', debounce(calculateROI, 300));
    document.getElementById('additionalIncome').addEventListener('input', debounce(calculateROI, 300));
    document.getElementById('includeInflation').addEventListener('change', calculateROI);
    document.getElementById('compareToBenchmark').addEventListener('change', calculateROI);
}

function setInvestmentType(type) {
    currentInvestmentType = type;
    
    // Reset all buttons
    document.querySelectorAll('.investment-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Set active button
    const activeButton = event.target.closest('.investment-type-btn');
    activeButton.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    activeButton.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    calculateROI();
}

function setScenario(scenario) {
    const scenarioData = investmentScenarios[scenario];
    const initialInvestment = parseFloat(document.getElementById('initialInvestment').value) || 10000;
    
    // Calculate final value based on ROI
    const finalValue = initialInvestment * (1 + scenarioData.roi / 100);
    document.getElementById('finalValue').value = finalValue.toFixed(0);
    document.getElementById('investmentPeriod').value = scenarioData.period;
    document.getElementById('periodUnit').value = 'years';
    
    // Update scenario buttons
    document.querySelectorAll('.scenario-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-blue-500', 'bg-blue-50', 'border-orange-500', 'bg-orange-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'conservative': 'green',
        'moderate': 'blue',
        'aggressive': 'orange',
        'venture': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[scenario]}-500`, `bg-${colorMap[scenario]}-50`);
    
    calculateROI();
}

function setROITarget(roiTarget) {
    const initialInvestment = parseFloat(document.getElementById('initialInvestment').value) || 10000;
    
    // Calculate final value needed to achieve target ROI
    const finalValue = initialInvestment * (1 + roiTarget / 100);
    document.getElementById('finalValue').value = finalValue.toFixed(0);
    
    // Update ROI target buttons
    document.querySelectorAll('.roi-target-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-yellow-500', 'bg-yellow-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50', 'border-purple-500', 'bg-purple-50', 'border-indigo-500', 'bg-indigo-50', 'border-pink-500', 'bg-pink-50');
    });
    
    const colorMap = {
        25: 'blue', 50: 'green', 100: 'yellow', 200: 'orange',
        500: 'red', 1000: 'purple', 2000: 'indigo', 5000: 'pink'
    };
    
    event.target.classList.add(`border-${colorMap[roiTarget]}-500`, `bg-${colorMap[roiTarget]}-50`);
    
    calculateROI();
}

function calculateROI() {
    const initialInvestment = parseFloat(document.getElementById('initialInvestment').value) || 0;
    const finalValue = parseFloat(document.getElementById('finalValue').value) || 0;
    const investmentPeriod = parseFloat(document.getElementById('investmentPeriod').value) || 0;
    const periodUnit = document.getElementById('periodUnit').value;
    const additionalCosts = parseFloat(document.getElementById('additionalCosts').value) || 0;
    const additionalIncome = parseFloat(document.getElementById('additionalIncome').value) || 0;
    const includeInflation = document.getElementById('includeInflation').checked;
    const compareToBenchmark = document.getElementById('compareToBenchmark').checked;
    
    // Validation
    if (initialInvestment <= 0) {
        showError('Initial investment must be greater than 0');
        return;
    }
    
    // Convert period to years for calculations
    let periodInYears = investmentPeriod;
    if (periodUnit === 'months') {
        periodInYears = investmentPeriod / 12;
    } else if (periodUnit === 'days') {
        periodInYears = investmentPeriod / 365;
    }
    
    // Calculate net gain/loss
    const netGain = (finalValue + additionalIncome) - (initialInvestment + additionalCosts);
    
    // Calculate basic ROI
    const roiPercentage = (netGain / initialInvestment) * 100;
    
    // Calculate annualized ROI
    let annualROI = 0;
    if (periodInYears > 0) {
        annualROI = (Math.pow(1 + (roiPercentage / 100), 1 / periodInYears) - 1) * 100;
    }
    
    // Adjust for inflation if selected
    let realROI = roiPercentage;
    let realAnnualROI = annualROI;
    if (includeInflation && periodInYears > 0) {
        const inflationRate = 3; // 3% annual inflation
        realROI = ((1 + roiPercentage / 100) / Math.pow(1 + inflationRate / 100, periodInYears) - 1) * 100;
        realAnnualROI = (Math.pow(1 + realROI / 100, 1 / periodInYears) - 1) * 100;
    }
    
    displayResults(roiPercentage, annualROI, netGain, periodInYears, realROI, realAnnualROI);
    updateBenchmarks(roiPercentage, annualROI);
    
    // Show comparison if selected
    if (compareToBenchmark) {
        showComparisonAnalysis(initialInvestment, periodInYears, roiPercentage, annualROI);
    } else {
        document.getElementById('investmentScenarios').classList.add('hidden');
    }
}

function displayResults(roiPercentage, annualROI, netGain, periodInYears, realROI, realAnnualROI) {
    const includeInflation = document.getElementById('includeInflation').checked;
    const displayROI = includeInflation ? realROI : roiPercentage;
    const displayAnnualROI = includeInflation ? realAnnualROI : annualROI;
    
    const roiColor = getROIColor(displayROI);
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r ${roiColor.background} border-2 ${roiColor.border} rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold ${roiColor.text} mb-2">${displayROI.toFixed(1)}%</div>
                    <div class="text-lg font-semibold ${roiColor.text}">Return on Investment</div>
                    <div class="text-sm opacity-75 mt-1 ${roiColor.text}">${includeInflation ? 'Inflation-adjusted' : 'Nominal'} return</div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${displayAnnualROI.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Annual ROI</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">$${netGain.toLocaleString()}</div>
                    <div class="text-sm text-gray-600 mt-1">Net Profit</div>
                </div>
            </div>

            <!-- Investment Insight -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Investment Insight</h4>
                <p class="text-sm text-green-800">
                    ${getInvestmentInsight(displayROI, displayAnnualROI)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('roiBenchmarks').classList.remove('hidden');
    
    // Update detailed results
    updateDetailedResults(roiPercentage, annualROI, netGain, periodInYears, realROI, realAnnualROI);
    document.getElementById('detailedResults').classList.remove('hidden');
}

function updateDetailedResults(roiPercentage, annualROI, netGain, periodInYears, realROI, realAnnualROI) {
    const includeInflation = document.getElementById('includeInflation').checked;
    const displayROI = includeInflation ? realROI : roiPercentage;
    const displayAnnualROI = includeInflation ? realAnnualROI : annualROI;
    
    // Update main metrics
    document.getElementById('roiPercentage').textContent = `${displayROI.toFixed(1)}%`;
    document.getElementById('netProfit').textContent = `$${netGain.toLocaleString()}`;
    document.getElementById('annualROI').textContent = `${displayAnnualROI.toFixed(1)}%`;
    document.getElementById('investmentPeriodResult').textContent = `${periodInYears.toFixed(1)} years`;
    
    // Update absolute returns
    const initialInvestment = parseFloat(document.getElementById('initialInvestment').value) || 0;
    const finalValue = parseFloat(document.getElementById('finalValue').value) || 0;
    const additionalCosts = parseFloat(document.getElementById('additionalCosts').value) || 0;
    const additionalIncome = parseFloat(document.getElementById('additionalIncome').value) || 0;
    
    const absoluteReturnsHTML = `
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Initial Investment:</span>
            <span class="font-semibold text-gray-900">$${initialInvestment.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Final Value:</span>
            <span class="font-semibold text-blue-600">$${finalValue.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Additional Costs:</span>
            <span class="font-semibold text-red-600">-$${additionalCosts.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Additional Income:</span>
            <span class="font-semibold text-green-600">+$${additionalIncome.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-1">
            <span class="text-gray-700">Net Gain/Loss:</span>
            <span class="font-semibold ${netGain >= 0 ? 'text-green-600' : 'text-red-600'}">${netGain >= 0 ? '+' : ''}$${netGain.toLocaleString()}</span>
        </div>
    `;
    
    document.getElementById('absoluteReturns').innerHTML = absoluteReturnsHTML;
    
    // Update annualized performance
    const annualizedPerformanceHTML = `
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Nominal ROI:</span>
            <span class="font-semibold text-gray-900">${roiPercentage.toFixed(1)}%</span>
        </div>
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Annual ROI:</span>
            <span class="font-semibold text-blue-600">${annualROI.toFixed(1)}%</span>
        </div>
        ${includeInflation ? `
        <div class="flex justify-between items-center py-1 border-b border-gray-200">
            <span class="text-gray-700">Real ROI:</span>
            <span class="font-semibold text-green-600">${realROI.toFixed(1)}%</span>
        </div>
        <div class="flex justify-between items-center py-1">
            <span class="text-gray-700">Real Annual ROI:</span>
            <span class="font-semibold text-purple-600">${realAnnualROI.toFixed(1)}%</span>
        </div>
        ` : `
        <div class="flex justify-between items-center py-1">
            <span class="text-gray-700">Investment Period:</span>
            <span class="font-semibold text-purple-600">${periodInYears.toFixed(1)} years</span>
        </div>
        `}
    `;
    
    document.getElementById('annualizedPerformance').innerHTML = annualizedPerformanceHTML;
}

function updateBenchmarks(roiPercentage, annualROI) {
    const benchmark = industryBenchmarks[currentInvestmentType] || industryBenchmarks.technology;
    
    const benchmarksHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Industry Average:</span>
            <span class="font-semibold text-blue-600">${benchmark.average}%</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Your ROI:</span>
            <span class="font-semibold ${roiPercentage >= benchmark.average ? 'text-green-600' : 'text-red-600'}">${roiPercentage.toFixed(1)}%</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-700">Performance:</span>
            <span class="font-semibold ${roiPercentage >= benchmark.average ? 'text-green-600' : 'text-red-600'}">
                ${roiPercentage >= benchmark.average ? 'Above Average' : 'Below Average'}
            </span>
        </div>
    `;
    
    document.getElementById('benchmarksContent').innerHTML = benchmarksHTML;
}

function showComparisonAnalysis(initialInvestment, periodInYears, roiPercentage, annualROI) {
    const comparisons = [
        { name: 'S&P 500', annualReturn: 10, color: 'blue' },
        { name: 'Savings Account', annualReturn: 2, color: 'green' },
        { name: 'Real Estate', annualReturn: 8, color: 'purple' },
        { name: 'Bonds', annualReturn: 4, color: 'orange' },
        { name: 'Inflation', annualReturn: 3, color: 'red' }
    ];
    
    let comparisonHTML = '';
    
    comparisons.forEach(comparison => {
        const comparisonValue = initialInvestment * Math.pow(1 + comparison.annualReturn / 100, periodInYears);
        const comparisonROI = ((comparisonValue - initialInvestment) / initialInvestment) * 100;
        
        comparisonHTML += `
            <div class="border border-gray-200 rounded-lg p-4 text-center">
                <div class="text-lg font-bold text-${comparison.color}-600 mb-1">${comparison.name}</div>
                <div class="text-2xl font-semibold text-gray-700 mb-2">${comparison.annualReturn}%</div>
                <div class="text-sm text-gray-600">Annual Return</div>
                <div class="text-xs text-gray-500 mt-2">$${comparisonValue.toLocaleString()}</div>
                <div class="text-xs ${comparisonROI > roiPercentage ? 'text-red-600' : 'text-green-600'}">
                    ${comparisonROI > roiPercentage ? 'Better' : 'Worse'} than yours
                </div>
            </div>
        `;
    });
    
    document.getElementById('comparisonAnalysis').innerHTML = comparisonHTML;
    
    // Show investment scenarios
    showInvestmentScenarios(initialInvestment, periodInYears);
}

function showInvestmentScenarios(initialInvestment, periodInYears) {
    const scenarios = [
        { roi: 5, name: 'Conservative', color: 'green' },
        { roi: 10, name: 'Moderate', color: 'blue' },
        { roi: 15, name: 'Aggressive', color: 'orange' },
        { roi: 25, name: 'Venture', color: 'purple' }
    ];
    
    let scenariosHTML = '';
    
    scenarios.forEach(scenario => {
        const scenarioValue = initialInvestment * Math.pow(1 + scenario.roi / 100, periodInYears);
        const scenarioProfit = scenarioValue - initialInvestment;
        
        scenariosHTML += `
            <div class="bg-${scenario.color}-50 rounded-lg p-6 text-center border border-${scenario.color}-200">
                <div class="w-12 h-12 bg-${scenario.color}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-${scenario.color}-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-${scenario.color}-800 mb-2">${scenario.name}</h3>
                <div class="text-2xl font-bold text-${scenario.color}-700 mb-2">${scenario.roi}%</div>
                <div class="text-sm text-${scenario.color}-600">
                    <div>Final: $${scenarioValue.toLocaleString()}</div>
                    <div>Profit: $${scenarioProfit.toLocaleString()}</div>
                </div>
            </div>
        `;
    });
    
    document.getElementById('scenariosContent').innerHTML = scenariosHTML;
    document.getElementById('investmentScenarios').classList.remove('hidden');
}

function getROIColor(roi) {
    if (roi >= 20) return { background: 'from-green-50 to-green-100', border: 'border-green-200', text: 'text-green-700' };
    if (roi >= 10) return { background: 'from-blue-50 to-blue-100', border: 'border-blue-200', text: 'text-blue-700' };
    if (roi >= 0) return { background: 'from-yellow-50 to-yellow-100', border: 'border-yellow-200', text: 'text-yellow-700' };
    return { background: 'from-red-50 to-red-100', border: 'border-red-200', text: 'text-red-700' };
}

function getInvestmentInsight(roi, annualROI) {
    if (annualROI > 15) {
        return "Excellent returns! This significantly outperforms most traditional investments. Consider if the risk level matches your tolerance.";
    } else if (annualROI > 10) {
        return "Strong performance. This beats inflation and most conservative investments while maintaining reasonable risk.";
    } else if (annualROI > 5) {
        return "Solid returns. This provides decent growth while keeping risk relatively low compared to aggressive investments.";
    } else if (annualROI > 0) {
        return "Modest returns. While positive, this may not significantly outpace inflation. Consider if this meets your investment goals.";
    } else {
        return "Negative returns. This investment lost money. Review the strategy and consider reallocating to better-performing assets.";
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
    document.getElementById('roiBenchmarks').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
    document.getElementById('investmentScenarios').classList.add('hidden');
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