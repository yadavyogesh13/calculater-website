@extends('layouts.app')

@section('title', 'ROI Calculator - Calculate Return on Investment & Profit Percentage | CalculaterTools')

@section('meta-description', 'Free online ROI calculator to calculate Return on Investment percentage, absolute returns, and investment performance. Analyze different investment scenarios.')

@section('keywords', 'ROI calculator, return on investment calculator, investment return calculator, profit calculator, investment analysis, ROI percentage, investment performance')

@section('canonical', url('/calculators/roi'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "ROI Calculator",
    "description": "Calculate Return on Investment percentage and analyze investment performance",
    "url": "{{ url('/calculators/roi') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinanceApplication",
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
                        <a href="#finance" class="text-blue-600 hover:text-blue-800 transition duration-150">Finance Calculators</a>
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
                    Calculate your Return on Investment (ROI) percentage and analyze investment performance. Make informed decisions with accurate ROI calculations.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Return on Investment</h2>
                        <p class="text-gray-600 mb-6">Enter your investment details to calculate ROI percentage and returns</p>
                        
                        <form id="roiCalculatorForm" class="space-y-6">
                            <!-- Investment Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Investment Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setInvestmentType('stocks')" class="investment-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-chart-line text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Stocks</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('real_estate')" class="investment-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-home text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Real Estate</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('business')" class="investment-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-briefcase text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Business</div>
                                    </button>
                                    <button type="button" onclick="setInvestmentType('other')" class="investment-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-chart-pie text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Other</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Investment Details -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Investment Details</h3>
                                
                                <!-- Initial Investment -->
                                <div class="mb-4">
                                    <label for="initialInvestment" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Initial Investment Amount (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="initialInvestment" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 100000" 
                                            min="1000" 
                                            step="1000"
                                            value="100000"
                                            required
                                        >
                                    </div>
                                </div>

                                <!-- Final Value -->
                                <div class="mb-4">
                                    <label for="finalValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Final Value or Selling Price (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="finalValue" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 150000" 
                                            min="0" 
                                            step="1000"
                                            value="150000"
                                            required
                                        >
                                    </div>
                                </div>

                                <!-- Investment Period -->
                                <div>
                                    <label for="investmentPeriod" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Investment Period
                                    </label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <input 
                                                type="number" 
                                                id="periodValue" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 5" 
                                                min="0.1" 
                                                max="50"
                                                step="0.1"
                                                value="5"
                                                required
                                            >
                                        </div>
                                        <div>
                                            <select 
                                                id="periodUnit" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            >
                                                <option value="days">Days</option>
                                                <option value="months">Months</option>
                                                <option value="years" selected>Years</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Costs (Optional) -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Additional Costs (Optional)</h3>
                                
                                <!-- Additional Investments -->
                                <div class="mb-4">
                                    <label for="additionalInvestments" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Additional Investments (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="additionalInvestments" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 10000" 
                                            min="0" 
                                            step="1000"
                                            value="0"
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Any extra money invested during the period</p>
                                </div>

                                <!-- Expenses & Fees -->
                                <div>
                                    <label for="expenses" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Expenses & Fees (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="expenses" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 5000" 
                                            min="0" 
                                            step="1000"
                                            value="0"
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Brokerage fees, maintenance costs, taxes, etc.</p>
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
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">ROI Analysis</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-bar text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter investment details</p>
                                <p class="text-sm">to see ROI analysis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROI Comparison Table -->
            <div id="roiComparisonSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">ROI Comparison</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Metric</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Amount</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Percentage</th>
                            </tr>
                        </thead>
                        <tbody id="roiComparisonTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Investment Performance Benchmarks -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Investment Performance Benchmarks</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Investment Type</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Average Annual ROI</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Good ROI</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Excellent ROI</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Risk Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Stock Market (Equity)</td>
                                <td class="px-4 py-3 text-right text-green-600">12-15%</td>
                                <td class="px-4 py-3 text-right text-green-600">15-18%</td>
                                <td class="px-4 py-3 text-right text-green-600">20%+</td>
                                <td class="px-4 py-3 text-right"><span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">High</span></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Real Estate</td>
                                <td class="px-4 py-3 text-right text-green-600">8-12%</td>
                                <td class="px-4 py-3 text-right text-green-600">12-15%</td>
                                <td class="px-4 py-3 text-right text-green-600">18%+</td>
                                <td class="px-4 py-3 text-right"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Medium</span></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Mutual Funds</td>
                                <td class="px-4 py-3 text-right text-green-600">10-14%</td>
                                <td class="px-4 py-3 text-right text-green-600">14-16%</td>
                                <td class="px-4 py-3 text-right text-green-600">18%+</td>
                                <td class="px-4 py-3 text-right"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Medium</span></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Fixed Deposits</td>
                                <td class="px-4 py-3 text-right text-green-600">6-8%</td>
                                <td class="px-4 py-3 text-right text-green-600">7-9%</td>
                                <td class="px-4 py-3 text-right text-green-600">9%+</td>
                                <td class="px-4 py-3 text-right"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Low</span></td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Gold</td>
                                <td class="px-4 py-3 text-right text-green-600">8-10%</td>
                                <td class="px-4 py-3 text-right text-green-600">10-12%</td>
                                <td class="px-4 py-3 text-right text-green-600">15%+</td>
                                <td class="px-4 py-3 text-right"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Medium</span></td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Business Investment</td>
                                <td class="px-4 py-3 text-right text-green-600">15-25%</td>
                                <td class="px-4 py-3 text-right text-green-600">25-35%</td>
                                <td class="px-4 py-3 text-right text-green-600">50%+</td>
                                <td class="px-4 py-3 text-right"><span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Very High</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-sm text-gray-600 mt-3">* Returns are historical averages and not guarantees of future performance. Actual returns may vary.</p>
            </div>

            <!-- ROI Formula & Explanation -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding ROI Calculation</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-blue-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Basic ROI Formula</h3>
                        <div class="text-sm text-gray-700 space-y-3">
                            <p><strong>ROI = (Net Profit / Total Investment) × 100%</strong></p>
                            <p>Where:</p>
                            <ul class="space-y-2 ml-4">
                                <li><strong>Net Profit</strong> = Final Value - Total Investment</li>
                                <li><strong>Total Investment</strong> = Initial Investment + Additional Investments + Expenses</li>
                                <li><strong>Final Value</strong> = Selling price or current market value</li>
                            </ul>
                            <p class="mt-4"><strong>Annualized ROI</strong> = [(1 + Total ROI)^(1/Years) - 1] × 100%</p>
                        </div>
                    </div>

                    <div class="bg-green-50 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Example Calculation</h3>
                        <div class="text-sm text-gray-700">
                            <p><strong>Scenario:</strong> ₹1,00,000 invested for 5 years, sold for ₹1,80,000</p>
                            <div class="mt-3 space-y-2">
                                <div class="flex justify-between">
                                    <span>Net Profit:</span>
                                    <span class="font-semibold">₹80,000</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Total ROI:</span>
                                    <span class="font-semibold text-green-600">80%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Annualized ROI:</span>
                                    <span class="font-semibold text-green-600">12.47%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Investment Period:</span>
                                    <span class="font-semibold">5 years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key ROI Metrics -->
                <div class="mt-8 bg-purple-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Key ROI Metrics to Consider</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                        <div class="text-center">
                            <div class="text-lg font-bold text-purple-600">Total ROI</div>
                            <div class="text-gray-600">Overall return on investment</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-purple-600">Annualized ROI</div>
                            <div class="text-gray-600">Yearly average return</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-purple-600">Net Profit</div>
                            <div class="text-gray-600">Absolute profit amount</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-purple-600">Payback Period</div>
                            <div class="text-gray-600">Time to recover investment</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Investment Tips -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Improving Your Investment ROI</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Research Thoroughly</h3>
                        <p class="text-gray-600">Conduct proper due diligence before investing. Understand the business model, market potential, and risks involved.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-diversity text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Diversify Portfolio</h3>
                        <p class="text-gray-600">Spread investments across different asset classes to reduce risk and improve overall portfolio returns.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Long-term Focus</h3>
                        <p class="text-gray-600">Think long-term rather than short-term gains. Compounding works best over extended periods.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Monitor & Rebalance</h3>
                        <p class="text-gray-600">Regularly review your investments and rebalance your portfolio to maintain optimal asset allocation.</p>
                    </div>
                </div>

                <!-- Risk Management -->
                <div class="mt-8 bg-yellow-50 rounded-xl p-6">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl mt-1 mr-4"></i>
                        <div>
                            <h4 class="text-lg font-semibold text-yellow-800 mb-2">Important: Risk Management</h4>
                            <p class="text-yellow-700 text-sm">
                                Higher potential returns usually come with higher risks. Always assess your risk tolerance and invest only what you can afford to lose. Consider consulting with a financial advisor for personalized investment advice.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a good ROI percentage?</h3>
                        <p class="text-gray-600">A good ROI depends on the investment type and risk level. Generally, 8-12% annual ROI is good for moderate-risk investments, while 15%+ is excellent. However, always compare with relevant benchmarks and consider inflation (typically 5-6% in India).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between total ROI and annualized ROI?</h3>
                        <p class="text-gray-600">Total ROI shows your overall return percentage for the entire investment period. Annualized ROI calculates the average yearly return, making it easier to compare investments with different timeframes. Annualized ROI is more useful for comparison purposes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I include additional investments in ROI calculation?</h3>
                        <p class="text-gray-600">Yes, for accurate ROI calculation, include all money invested - initial investment plus any additional contributions. This gives you the true picture of your investment performance and helps in proper decision-making.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does investment period affect ROI?</h3>
                        <p class="text-gray-600">Longer investment periods generally lead to better returns due to compounding. However, they also involve more uncertainty. Short-term investments might show higher volatility but can offer quick returns if timed correctly.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is considered a bad ROI?</h3>
                        <p class="text-gray-600">Any ROI below inflation rate (currently 5-6% in India) is essentially a negative real return. ROI below fixed deposit rates (6-7%) might indicate poor performance unless the investment offers other benefits like liquidity or tax advantages.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('compound.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate investment returns with compounding</p>
                    </a>
                    <a href="{{ route('sip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">SIP Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Systematic Investment Plans</p>
                    </a>
                    <a href="{{ route('stock.profit.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Stock Profit Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate profit or loss on stock investments</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let currentInvestmentType = 'stocks';

function setInvestmentType(type) {
    currentInvestmentType = type;
    
    // Update button styles
    document.querySelectorAll('.investment-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    // Set default values based on investment type
    setDefaultValues(type);
}

function setDefaultValues(type) {
    const initialInvestment = document.getElementById('initialInvestment');
    const finalValue = document.getElementById('finalValue');
    const periodValue = document.getElementById('periodValue');
    
    switch(type) {
        case 'stocks':
            initialInvestment.value = '100000';
            finalValue.value = '150000';
            periodValue.value = '2';
            break;
        case 'real_estate':
            initialInvestment.value = '5000000';
            finalValue.value = '6500000';
            periodValue.value = '5';
            break;
        case 'business':
            initialInvestment.value = '1000000';
            finalValue.value = '1800000';
            periodValue.value = '3';
            break;
        case 'other':
            initialInvestment.value = '50000';
            finalValue.value = '75000';
            periodValue.value = '1';
            break;
    }
    
    calculateROI();
}

function calculateROI() {
    // Get input values
    const initialInvestment = parseFloat(document.getElementById('initialInvestment').value);
    const finalValue = parseFloat(document.getElementById('finalValue').value);
    const periodValue = parseFloat(document.getElementById('periodValue').value);
    const periodUnit = document.getElementById('periodUnit').value;
    const additionalInvestments = parseFloat(document.getElementById('additionalInvestments').value) || 0;
    const expenses = parseFloat(document.getElementById('expenses').value) || 0;

    // Validation
    if (!initialInvestment || initialInvestment < 1000) {
        showError('Please enter a valid initial investment (minimum ₹1,000)');
        return;
    }
    if (!finalValue || finalValue < 0) {
        showError('Please enter a valid final value');
        return;
    }
    if (!periodValue || periodValue <= 0) {
        showError('Please enter a valid investment period');
        return;
    }

    // Convert period to years
    let years;
    switch (periodUnit) {
        case 'days':
            years = periodValue / 365;
            break;
        case 'months':
            years = periodValue / 12;
            break;
        default:
            years = periodValue;
    }

    // Calculate ROI
    const result = calculateROIValues(initialInvestment, finalValue, additionalInvestments, expenses, years);
    
    // Display results
    displayResults(result, initialInvestment, finalValue, years);
    generateROIComparison(result);
}

function calculateROIValues(initial, final, additional, expenses, years) {
    // Total investment including additional investments and expenses
    const totalInvestment = initial + additional + expenses;
    
    // Net profit
    const netProfit = final - totalInvestment;
    
    // Total ROI percentage
    const totalROI = (netProfit / totalInvestment) * 100;
    
    // Annualized ROI (CAGR)
    const annualizedROI = (Math.pow(1 + totalROI/100, 1/years) - 1) * 100;
    
    // Profit percentage of initial investment
    const profitPercentage = ((final - initial) / initial) * 100;
    
    // Payback period (in years)
    const paybackPeriod = totalInvestment / (netProfit / years);
    
    return {
        totalInvestment: totalInvestment,
        netProfit: netProfit,
        totalROI: totalROI,
        annualizedROI: annualizedROI,
        profitPercentage: profitPercentage,
        paybackPeriod: paybackPeriod,
        years: years,
        isProfitable: netProfit > 0
    };
}

function displayResults(result, initial, final, years) {
    const roiColor = result.isProfitable ? 'text-green-600' : 'text-red-600';
    const roiIcon = result.isProfitable ? 'fa-arrow-up' : 'fa-arrow-down';
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold ${roiColor} mb-2">
                        <i class="fas ${roiIcon} mr-2"></i>
                        ${result.totalROI.toFixed(2)}%
                    </div>
                    <div class="text-lg font-semibold text-gray-700">Total Return on Investment</div>
                    <div class="text-sm text-gray-500 mt-1">Over ${years.toFixed(1)} years</div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">${result.annualizedROI.toFixed(2)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Annualized ROI</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">₹${formatCurrency(result.netProfit)}</div>
                    <div class="text-sm text-gray-600 mt-1">Net Profit</div>
                </div>
            </div>

            <!-- Investment Summary -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Investment Summary</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Investment:</span>
                        <span class="font-semibold">₹${formatCurrency(result.totalInvestment)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Final Value:</span>
                        <span class="font-semibold">₹${formatCurrency(final)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Investment Period:</span>
                        <span class="font-semibold">${years.toFixed(1)} years</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Payback Period:</span>
                        <span class="font-semibold">${result.paybackPeriod.toFixed(1)} years</span>
                    </div>
                </div>
            </div>

            <!-- Performance Rating -->
            <div class="bg-${result.isProfitable ? 'green' : 'red'}-50 border border-${result.isProfitable ? 'green' : 'red'}-200 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas ${result.isProfitable ? 'fa-check-circle text-green-600' : 'fa-exclamation-circle text-red-600'} text-xl mr-3"></i>
                    <div>
                        <div class="font-semibold text-${result.isProfitable ? 'green' : 'red'}-800">
                            ${result.isProfitable ? 'Profitable Investment' : 'Loss-making Investment'}
                        </div>
                        <div class="text-sm text-${result.isProfitable ? 'green' : 'red'}-700 mt-1">
                            ${result.isProfitable ? 
                                `Your investment generated ${result.totalROI.toFixed(2)}% returns over ${years.toFixed(1)} years.` :
                                `Your investment resulted in ${Math.abs(result.totalROI).toFixed(2)}% loss over ${years.toFixed(1)} years.`
                            }
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benchmark Comparison -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-chart-line text-purple-600 mt-1 mr-3"></i>
                    <div class="text-sm text-purple-800">
                        <strong>Benchmark Comparison:</strong> Compare your ${result.annualizedROI.toFixed(2)}% annualized ROI with industry averages shown below.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('roiComparisonSection').classList.remove('hidden');
}

function generateROIComparison(result) {
    const comparisonHTML = `
        <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="px-4 py-3 text-gray-700">Total ROI</td>
            <td class="px-4 py-3 text-right font-semibold ${result.isProfitable ? 'text-green-600' : 'text-red-600'}">${result.totalROI.toFixed(2)}%</td>
            <td class="px-4 py-3 text-right font-semibold ${result.isProfitable ? 'text-green-600' : 'text-red-600'}">${result.totalROI.toFixed(2)}%</td>
        </tr>
        <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="px-4 py-3 text-gray-700">Annualized ROI</td>
            <td class="px-4 py-3 text-right font-semibold ${result.annualizedROI > 0 ? 'text-green-600' : 'text-red-600'}">${result.annualizedROI.toFixed(2)}%</td>
            <td class="px-4 py-3 text-right font-semibold ${result.annualizedROI > 0 ? 'text-green-600' : 'text-red-600'}">${result.annualizedROI.toFixed(2)}%</td>
        </tr>
        <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="px-4 py-3 text-gray-700">Net Profit</td>
            <td class="px-4 py-3 text-right font-semibold ${result.isProfitable ? 'text-green-600' : 'text-red-600'}">₹${formatCurrency(result.netProfit)}</td>
            <td class="px-4 py-3 text-right font-semibold ${result.isProfitable ? 'text-green-600' : 'text-red-600'}">${result.profitPercentage.toFixed(2)}%</td>
        </tr>
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-gray-700">Total Investment</td>
            <td class="px-4 py-3 text-right font-semibold text-gray-900">₹${formatCurrency(result.totalInvestment)}</td>
            <td class="px-4 py-3 text-right font-semibold text-gray-900">100%</td>
        </tr>
    `;

    document.getElementById('roiComparisonTable').innerHTML = comparisonHTML;
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
    document.getElementById('roiComparisonSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateROI();
});
</script>
@endsection