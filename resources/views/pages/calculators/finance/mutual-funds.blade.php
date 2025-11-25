@extends('layouts.app')

@section('title', 'Mutual Fund Returns Calculator - Calculate SIP & Lumpsum Returns | CalculaterTools')

@section('meta-description', 'Free online Mutual Fund calculator to calculate returns on SIP and lumpsum investments. Compare different mutual funds and plan your investments effectively.')

@section('keywords', 'mutual fund calculator, mutual fund returns, SIP calculator, lumpsum calculator, mutual fund investment, NAV calculator, fund performance')

@section('canonical', url('/calculators/mutual-funds'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Mutual Fund Returns Calculator",
    "description": "Calculate returns on mutual fund investments through SIP and lumpsum modes",
    "url": "{{ url('/calculators/mutual-funds') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinanceApplication",
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
                        <a href="#finance" class="text-blue-600 hover:text-blue-800 transition duration-150">Finance Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Mutual Fund Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Mutual Fund Returns Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your mutual fund investment returns for both SIP and lumpsum investments. Plan your financial future with accurate return projections.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Mutual Fund Returns</h2>
                        <p class="text-gray-600 mb-6">Enter your mutual fund investment details to calculate potential returns</p>
                        
                        <form id="mutualFundCalculatorForm" class="space-y-6">
                            <!-- Investment Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Investment Type
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" onclick="setInvestmentType('sip')" class="investment-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-calendar-alt text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">SIP</div>
                                        <div class="text-xs text-gray-500">Systematic Investment</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('lumpsum')" class="investment-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-rupee-sign text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Lumpsum</div>
                                        <div class="text-xs text-gray-500">One-time Investment</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Investment Details -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4" id="investmentDetailsTitle">SIP Investment Details</h3>
                                
                                <!-- Monthly Investment (SIP) -->
                                <div id="sipSection" class="space-y-4">
                                    <div>
                                        <label for="monthlyInvestment" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Monthly Investment (₹)
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                            <input 
                                                type="number" 
                                                id="monthlyInvestment" 
                                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 5000" 
                                                min="500" 
                                                step="500"
                                                value="5000"
                                                required
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Minimum: ₹500 per month</p>
                                    </div>
                                </div>

                                <!-- Lumpsum Investment -->
                                <div id="lumpsumSection" class="space-y-4 hidden">
                                    <div>
                                        <label for="lumpsumInvestment" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Investment Amount (₹)
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                            <input 
                                                type="number" 
                                                id="lumpsumInvestment" 
                                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 100000" 
                                                min="1000" 
                                                step="1000"
                                                value="100000"
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Minimum: ₹1,000</p>
                                    </div>
                                </div>

                                <!-- Common Fields -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="investmentPeriod" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Investment Period (Years)
                                        </label>
                                        <input 
                                            type="number" 
                                            id="investmentPeriod" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 10" 
                                            min="1" 
                                            max="30"
                                            value="10"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <label for="expectedReturn" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Expected Return (% p.a.)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="expectedReturn" 
                                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 12" 
                                                min="5" 
                                                max="25" 
                                                step="0.1"
                                                value="12"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fund Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Mutual Fund Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setFundType('equity')" class="fund-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-chart-line text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Equity</div>
                                    </button>
                                    <button type="button" onclick="setFundType('debt')" class="fund-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-shield-alt text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Debt</div>
                                    </button>
                                    <button type="button" onclick="setFundType('hybrid')" class="fund-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-balance-scale text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Hybrid</div>
                                    </button>
                                    <button type="button" onclick="setFundType('index')" class="fund-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-chart-bar text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Index</div>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Select fund type for accurate return expectations</p>
                            </div>

                            <!-- Advanced Options -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Advanced Options</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="stepUpRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Step-up Rate (% p.a.)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="stepUpRate" 
                                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 10" 
                                                min="0" 
                                                max="20" 
                                                step="1"
                                                value="10"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Annual increase in SIP amount</p>
                                    </div>
                                    <div>
                                        <label for="expenseRatio" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Expense Ratio (% p.a.)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="expenseRatio" 
                                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 1.5" 
                                                min="0.1" 
                                                max="3" 
                                                step="0.1"
                                                value="1.5"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Fund management fees</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateMutualFundReturns()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Returns
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center" id="resultsTitle">Investment Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-pie text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter investment details</p>
                                <p class="text-sm">to see projected returns</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Growth Chart -->
            <div id="growthChartSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Investment Growth Over Time</h2>
                <div class="h-80">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>

            <!-- Popular Mutual Funds Performance -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Popular Mutual Funds Performance</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Fund Name</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Category</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">1 Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">3 Years</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">5 Years</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Expense Ratio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Mirae Asset Large Cap Fund</td>
                                <td class="px-4 py-3 text-right text-blue-600">Large Cap</td>
                                <td class="px-4 py-3 text-right text-green-600">18.5%</td>
                                <td class="px-4 py-3 text-right text-green-600">16.2%</td>
                                <td class="px-4 py-3 text-right text-green-600">15.8%</td>
                                <td class="px-4 py-3 text-right text-gray-600">0.41%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">SBI Small Cap Fund</td>
                                <td class="px-4 py-3 text-right text-red-600">Small Cap</td>
                                <td class="px-4 py-3 text-right text-green-600">24.3%</td>
                                <td class="px-4 py-3 text-right text-green-600">22.1%</td>
                                <td class="px-4 py-3 text-right text-green-600">20.5%</td>
                                <td class="px-4 py-3 text-right text-gray-600">0.65%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">ICICI Prudential Bluechip Fund</td>
                                <td class="px-4 py-3 text-right text-blue-600">Large Cap</td>
                                <td class="px-4 py-3 text-right text-green-600">17.8%</td>
                                <td class="px-4 py-3 text-right text-green-600">15.9%</td>
                                <td class="px-4 py-3 text-right text-green-600">14.7%</td>
                                <td class="px-4 py-3 text-right text-gray-600">0.44%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">HDFC Hybrid Equity Fund</td>
                                <td class="px-4 py-3 text-right text-purple-600">Hybrid</td>
                                <td class="px-4 py-3 text-right text-green-600">16.2%</td>
                                <td class="px-4 py-3 text-right text-green-600">14.8%</td>
                                <td class="px-4 py-3 text-right text-green-600">13.5%</td>
                                <td class="px-4 py-3 text-right text-gray-600">0.78%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Nippon India Liquid Fund</td>
                                <td class="px-4 py-3 text-right text-green-600">Debt</td>
                                <td class="px-4 py-3 text-right text-green-600">6.8%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.5%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.3%</td>
                                <td class="px-4 py-3 text-right text-gray-600">0.20%</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">UTI Nifty 50 Index Fund</td>
                                <td class="px-4 py-3 text-right text-orange-600">Index</td>
                                <td class="px-4 py-3 text-right text-green-600">15.2%</td>
                                <td class="px-4 py-3 text-right text-green-600">14.1%</td>
                                <td class="px-4 py-3 text-right text-green-600">13.8%</td>
                                <td class="px-4 py-3 text-right text-gray-600">0.10%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-sm text-gray-600 mt-3">* Returns are historical and not guarantees of future performance. Data is for illustrative purposes.</p>
            </div>

            <!-- SIP vs Lumpsum Comparison -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">SIP vs Lumpsum: Which is Better?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="border border-blue-200 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-alt text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-blue-600">SIP (Systematic Investment)</h3>
                        </div>
                        <ul class="space-y-3 text-gray-700 mb-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span><strong>Rupee cost averaging</strong> - buy more units when prices are low</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Disciplined investing regardless of market conditions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Lower initial investment requirement</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Reduces impact of market timing risk</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-600 mt-1 mr-3"></i>
                                <span>May miss bulk buying opportunities in market dips</span>
                            </li>
                        </ul>
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-800 mb-2">Best For:</h4>
                            <p class="text-sm text-blue-700">Salaried individuals, beginners, risk-averse investors, and those with limited lump sum capital.</p>
                        </div>
                    </div>

                    <div class="border border-green-200 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-rupee-sign text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-green-600">Lumpsum Investment</h3>
                        </div>
                        <ul class="space-y-3 text-gray-700 mb-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span><strong>Higher potential returns</strong> if invested at market lows</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Immediate full exposure to market growth</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Simplicity - one-time decision</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>No need to remember monthly investments</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-600 mt-1 mr-3"></i>
                                <span>Higher risk if market corrects after investment</span>
                            </li>
                        </ul>
                        <div class="bg-green-50 rounded-lg p-4">
                            <h4 class="font-semibold text-green-800 mb-2">Best For:</h4>
                            <p class="text-sm text-green-700">Investors with lump sum amounts, market experts, those who can time the market, and bonus/settlement recipients.</p>
                        </div>
                    </div>
                </div>

                <!-- Strategy Recommendation -->
                <div class="mt-8 bg-purple-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-purple-800 mb-4 text-center">Which Strategy Should You Choose?</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-blue-600 mb-2">Choose SIP if:</div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• You're a salaried individual</li>
                                <li>• You're new to investing</li>
                                <li>• You want to reduce risk</li>
                                <li>• You have limited capital</li>
                            </ul>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600 mb-2">Choose Lumpsum if:</div>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li>• You have a large amount to invest</li>
                                <li>• Market is at attractive levels</li>
                                <li>• You're an experienced investor</li>
                                <li>• You received bonus/tax refund</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-4 text-center text-sm text-purple-700">
                        <strong>Pro Tip:</strong> Consider a hybrid approach - invest lump sum during market corrections and continue SIP for regular investments.
                    </div>
                </div>
            </div>

            <!-- Mutual Fund Types Explained -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Types of Mutual Funds</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="border border-green-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Equity Funds</h3>
                        <p class="text-gray-600 mb-4">Invest primarily in stocks. Higher risk but potential for higher returns.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 12-18% • <span class="font-semibold">Risk:</span> High
                        </div>
                    </div>
                    <div class="border border-blue-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Debt Funds</h3>
                        <p class="text-gray-600 mb-4">Invest in fixed income instruments. Lower risk with stable returns.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 6-9% • <span class="font-semibold">Risk:</span> Low
                        </div>
                    </div>
                    <div class="border border-purple-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-balance-scale text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Hybrid Funds</h3>
                        <p class="text-gray-600 mb-4">Mix of equity and debt. Balanced risk-return profile.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 10-14% • <span class="font-semibold">Risk:</span> Medium
                        </div>
                    </div>
                    <div class="border border-orange-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-orange-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Index Funds</h3>
                        <p class="text-gray-600 mb-4">Track market indices. Low cost with market-matching returns.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 11-15% • <span class="font-semibold">Risk:</span> Medium
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the minimum investment for mutual funds?</h3>
                        <p class="text-gray-600">For SIP: Most funds allow starting with ₹500 per month. For lumpsum: Minimum investment is typically ₹1,000 to ₹5,000. Some funds may have higher minimums for specific schemes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How are mutual fund returns taxed in India?</h3>
                        <p class="text-gray-600">Equity funds: Short-term (held <1 year) - 15%, Long-term (held >1 year) - 10% over ₹1 lakh. Debt funds: Short-term (held <3 years) - as per income tax slab, Long-term (held >3 years) - 20% with indexation.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is expense ratio in mutual funds?</h3>
                        <p class="text-gray-600">Expense ratio is the annual fee charged by the fund house to manage your investment. It includes management fees, administrative costs, and other operational expenses. Lower expense ratios are generally better for investors.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I withdraw my mutual fund investment anytime?</h3>
                        <p class="text-gray-600">Most mutual funds (especially open-ended) allow redemption anytime. However, some close-ended funds have lock-in periods. ELSS funds have a mandatory 3-year lock-in period for tax benefits.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the difference between direct and regular plans?</h3>
                        <p class="text-gray-600">Direct plans have lower expense ratios as they don't involve distributors. Regular plans have higher expense ratios that include distributor commissions. Direct plans typically give 0.5-1% higher returns due to lower costs.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('sip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">SIP Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Systematic Investment Plans</p>
                    </a>
                    <a href="{{ route('compound.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate investment returns with compounding</p>
                    </a>
                    <a href="{{ route('roi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">ROI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate Return on Investment percentage</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let currentInvestmentType = 'sip';
let currentFundType = 'equity';
let growthChart = null;

function setInvestmentType(type) {
    currentInvestmentType = type;
    
    // Update button styles
    document.querySelectorAll('.investment-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    // Show/hide relevant sections
    if (type === 'sip') {
        document.getElementById('sipSection').classList.remove('hidden');
        document.getElementById('lumpsumSection').classList.add('hidden');
        document.getElementById('investmentDetailsTitle').textContent = 'SIP Investment Details';
        document.getElementById('resultsTitle').textContent = 'SIP Investment Summary';
    } else {
        document.getElementById('sipSection').classList.add('hidden');
        document.getElementById('lumpsumSection').classList.remove('hidden');
        document.getElementById('investmentDetailsTitle').textContent = 'Lumpsum Investment Details';
        document.getElementById('resultsTitle').textContent = 'Lumpsum Investment Summary';
    }
    
    calculateMutualFundReturns();
}

function setFundType(type) {
    currentFundType = type;
    
    // Update button styles
    document.querySelectorAll('.fund-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    // Set default expected returns based on fund type
    const expectedReturnInput = document.getElementById('expectedReturn');
    switch(type) {
        case 'equity':
            expectedReturnInput.value = '12';
            break;
        case 'debt':
            expectedReturnInput.value = '7';
            break;
        case 'hybrid':
            expectedReturnInput.value = '10';
            break;
        case 'index':
            expectedReturnInput.value = '11';
            break;
    }
    
    calculateMutualFundReturns();
}

function calculateMutualFundReturns() {
    // Get common input values
    const investmentPeriod = parseFloat(document.getElementById('investmentPeriod').value);
    const expectedReturn = parseFloat(document.getElementById('expectedReturn').value);
    const stepUpRate = parseFloat(document.getElementById('stepUpRate').value) || 0;
    const expenseRatio = parseFloat(document.getElementById('expenseRatio').value) || 0;

    // Validation
    if (!investmentPeriod || investmentPeriod < 1 || investmentPeriod > 30) {
        showError('Please enter a valid investment period (1-30 years)');
        return;
    }
    if (!expectedReturn || expectedReturn < 5 || expectedReturn > 25) {
        showError('Please enter a valid expected return (5-25%)');
        return;
    }

    let result;
    if (currentInvestmentType === 'sip') {
        const monthlyInvestment = parseFloat(document.getElementById('monthlyInvestment').value);
        if (!monthlyInvestment || monthlyInvestment < 500) {
            showError('Please enter a valid monthly investment (minimum ₹500)');
            return;
        }
        result = calculateSIPReturns(monthlyInvestment, expectedReturn, investmentPeriod, stepUpRate, expenseRatio);
    } else {
        const lumpsumInvestment = parseFloat(document.getElementById('lumpsumInvestment').value);
        if (!lumpsumInvestment || lumpsumInvestment < 1000) {
            showError('Please enter a valid investment amount (minimum ₹1,000)');
            return;
        }
        result = calculateLumpsumReturns(lumpsumInvestment, expectedReturn, investmentPeriod, expenseRatio);
    }
    
    // Display results
    displayResults(result);
    generateGrowthChart(result);
}

function calculateSIPReturns(monthlyInvestment, annualReturn, years, stepUpRate, expenseRatio) {
    const netAnnualReturn = annualReturn - expenseRatio;
    const monthlyRate = netAnnualReturn / 100 / 12;
    const months = years * 12;
    
    let futureValue = 0;
    let totalInvestment = 0;
    let currentMonthlyInvestment = monthlyInvestment;

    for (let month = 1; month <= months; month++) {
        // Apply step-up annually
        if (month > 1 && month % 12 === 1) {
            currentMonthlyInvestment *= (1 + stepUpRate / 100);
        }
        
        totalInvestment += currentMonthlyInvestment;
        futureValue = (futureValue + currentMonthlyInvestment) * (1 + monthlyRate);
    }

    const wealthGained = futureValue - totalInvestment;
    const absoluteReturn = (wealthGained / totalInvestment) * 100;
    const xirr = netAnnualReturn; // Simplified XIRR calculation

    return {
        futureValue: futureValue,
        totalInvestment: totalInvestment,
        wealthGained: wealthGained,
        absoluteReturn: absoluteReturn,
        xirr: xirr,
        years: years,
        investmentType: 'sip',
        monthlyInvestment: monthlyInvestment,
        stepUpRate: stepUpRate
    };
}

function calculateLumpsumReturns(investment, annualReturn, years, expenseRatio) {
    const netAnnualReturn = annualReturn - expenseRatio;
    const futureValue = investment * Math.pow(1 + netAnnualReturn/100, years);
    const wealthGained = futureValue - investment;
    const absoluteReturn = (wealthGained / investment) * 100;
    const xirr = netAnnualReturn; // For lumpsum, XIRR equals annual return

    return {
        futureValue: futureValue,
        totalInvestment: investment,
        wealthGained: wealthGained,
        absoluteReturn: absoluteReturn,
        xirr: xirr,
        years: years,
        investmentType: 'lumpsum'
    };
}

function displayResults(result) {
    const isSIP = result.investmentType === 'sip';
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(result.futureValue)}</div>
                    <div class="text-lg font-semibold text-gray-700">Estimated Future Value</div>
                    <div class="text-sm text-gray-500 mt-1">After ${result.years} years</div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(result.totalInvestment)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Invested</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(result.wealthGained)}</div>
                    <div class="text-sm text-gray-600 mt-1">Wealth Gained</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">${result.xirr.toFixed(2)}%</div>
                    <div class="text-sm text-gray-600 mt-1">XIRR</div>
                </div>
            </div>

            <!-- Investment Details -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Investment Details</h4>
                <div class="space-y-2 text-sm">
                    ${isSIP ? `
                    <div class="flex justify-between">
                        <span class="text-gray-600">Monthly Investment:</span>
                        <span class="font-semibold">₹${formatCurrency(result.monthlyInvestment)}</span>
                    </div>
                    ${result.stepUpRate > 0 ? `
                    <div class="flex justify-between">
                        <span class="text-gray-600">Step-up Rate:</span>
                        <span class="font-semibold text-green-600">${result.stepUpRate}% p.a.</span>
                    </div>
                    ` : ''}
                    ` : `
                    <div class="flex justify-between">
                        <span class="text-gray-600">Initial Investment:</span>
                        <span class="font-semibold">₹${formatCurrency(result.totalInvestment)}</span>
                    </div>
                    `}
                    <div class="flex justify-between">
                        <span class="text-gray-600">Investment Period:</span>
                        <span class="font-semibold">${result.years} years</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Fund Type:</span>
                        <span class="font-semibold capitalize">${currentFundType} Fund</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Absolute Return:</span>
                        <span class="font-semibold text-green-600">${result.absoluteReturn.toFixed(2)}%</span>
                    </div>
                </div>
            </div>

            <!-- Performance Insight -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-chart-line text-purple-600 mt-1 mr-3"></i>
                    <div class="text-sm text-purple-800">
                        <strong>Performance Insight:</strong> Your investment of ₹${formatCurrency(result.totalInvestment)} grows to ₹${formatCurrency(result.futureValue)} in ${result.years} years, generating ₹${formatCurrency(result.wealthGained)} in returns.
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-gray-600 mt-1 mr-3"></i>
                    <div class="text-sm text-gray-600">
                        <strong>Note:</strong> Returns are projections based on entered rate. Mutual fund investments are subject to market risks. Past performance doesn't guarantee future returns.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('growthChartSection').classList.remove('hidden');
}

function generateGrowthChart(result) {
    const ctx = document.getElementById('growthChart').getContext('2d');
    
    if (growthChart) {
        growthChart.destroy();
    }

    const labels = [];
    const investmentData = [];
    const valueData = [];
    
    const years = result.years;
    const isSIP = result.investmentType === 'sip';
    
    let currentValue = 0;
    let totalInvested = 0;

    for (let year = 0; year <= years; year++) {
        labels.push(`Year ${year}`);
        
        if (year === 0) {
            investmentData.push(0);
            valueData.push(0);
        } else {
            if (isSIP) {
                // Simplified SIP growth calculation for chart
                for (let month = 1; month <= 12; month++) {
                    totalInvested += result.monthlyInvestment;
                    currentValue = (currentValue + result.monthlyInvestment) * (1 + result.xirr/100/12);
                }
            } else {
                // Lumpsum growth
                currentValue = result.totalInvestment * Math.pow(1 + result.xirr/100, year);
                totalInvested = result.totalInvestment;
            }
            
            investmentData.push(totalInvested);
            valueData.push(currentValue);
        }
    }

    growthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Investment Value',
                    data: valueData,
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Amount Invested',
                    data: investmentData,
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ₹' + context.parsed.y.toLocaleString('en-IN');
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Years'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '₹' + value.toLocaleString('en-IN');
                        }
                    }
                }
            }
        }
    });
}

function formatCurrency(amount) {
    if (amount >= 10000000) {
        return (amount / 10000000).toFixed(2) + ' Cr';
    } else if (amount >= 100000) {
        return (amount / 100000).toFixed(2) + ' L';
    }
    return amount.toLocaleString('en-IN', {
        maximumFractionDigits: 0,
        minimumFractionDigits: 0
    });
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
    document.getElementById('growthChartSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateMutualFundReturns();
});
</script>
@endsection