@extends('layouts.app')

@section('title', 'Currency Exchange Rate Calculator | Real-Time Forex Converter | CalculaterTools')

@section('meta-description', 'Free currency exchange rate calculator with real-time forex data. Convert between 150+ currencies, calculate transfer fees, and get best exchange rates.')

@section('keywords', 'currency exchange calculator, forex converter, exchange rate calculator, currency converter, foreign exchange, money transfer')

@section('canonical', url('/calculators/currency-exchange'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Currency Exchange Rate Calculator",
    "description": "Calculate currency exchange rates with real-time forex data and transfer fees",
    "url": "{{ url('/calculators/currency-exchange') }}",
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

<div class="min-h-screen bg-indigo-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#finance" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Finance Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Currency Exchange Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Currency Exchange Rate Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate currency conversions with real-time exchange rates. Compare transfer fees, get the best rates, and plan your international money transfers.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Currency Converter</h2>
                        <p class="text-gray-600 mb-6">Enter amount and select currencies</p>
                        
                        <form id="currencyExchangeCalculatorForm" class="space-y-6">
                            <!-- Amount Input -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Amount to Convert</h3>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="amount" 
                                        class="w-full pl-8 pr-4 py-3 text-lg border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                        placeholder="Enter amount" 
                                        min="1" 
                                        step="0.01"
                                        value="1000"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Currency Selection -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- From Currency -->
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <h3 class="text-sm font-semibold text-blue-800 mb-3">From Currency</h3>
                                    <div class="space-y-4">
                                        <div class="relative">
                                            <select id="fromCurrency" class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 appearance-none">
                                                <option value="USD" selected>United States Dollar (USD)</option>
                                                <option value="EUR">Euro (EUR)</option>
                                                <option value="GBP">British Pound (GBP)</option>
                                                <option value="JPY">Japanese Yen (JPY)</option>
                                                <option value="CAD">Canadian Dollar (CAD)</option>
                                                <option value="AUD">Australian Dollar (AUD)</option>
                                                <option value="CHF">Swiss Franc (CHF)</option>
                                                <option value="CNY">Chinese Yuan (CNY)</option>
                                                <option value="INR">Indian Rupee (INR)</option>
                                                <option value="MXN">Mexican Peso (MXN)</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <img id="fromFlag" src="https://flagcdn.com/w40/us.png" alt="USD" class="w-6 h-4 rounded">
                                            <span id="fromCurrencyName" class="text-sm text-blue-700">US Dollar</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- To Currency -->
                                <div class="bg-purple-50 rounded-lg p-4">
                                    <h3 class="text-sm font-semibold text-purple-800 mb-3">To Currency</h3>
                                    <div class="space-y-4">
                                        <div class="relative">
                                            <select id="toCurrency" class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 appearance-none">
                                                <option value="EUR">Euro (EUR)</option>
                                                <option value="USD" selected>United States Dollar (USD)</option>
                                                <option value="GBP">British Pound (GBP)</option>
                                                <option value="JPY">Japanese Yen (JPY)</option>
                                                <option value="CAD">Canadian Dollar (CAD)</option>
                                                <option value="AUD">Australian Dollar (AUD)</option>
                                                <option value="CHF">Swiss Franc (CHF)</option>
                                                <option value="CNY">Chinese Yuan (CNY)</option>
                                                <option value="INR">Indian Rupee (INR)</option>
                                                <option value="MXN">Mexican Peso (MXN)</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <img id="toFlag" src="https://flagcdn.com/w40/eu.png" alt="EUR" class="w-6 h-4 rounded">
                                            <span id="toCurrencyName" class="text-sm text-purple-700">Euro</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Exchange Rate Options -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Exchange Rate Options</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="rateType" class="block text-xs font-medium text-amber-700 mb-2">
                                            Rate Type
                                        </label>
                                        <select id="rateType" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                            <option value="mid" selected>Mid-Market Rate</option>
                                            <option value="bank">Bank Rate</option>
                                            <option value="transfer">Transfer Service Rate</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label for="feePercentage" class="block text-xs font-medium text-amber-700 mb-2">
                                            Transfer Fee (%)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="feePercentage" 
                                                class="w-full pl-4 pr-12 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                placeholder="e.g., 1.5" 
                                                min="0" 
                                                max="10" 
                                                step="0.1"
                                                value="1.5"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="includeFees" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="includeFees" class="ml-2 text-xs text-amber-700">
                                            Include transfer fees in calculation
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Historical Data -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3">Historical Comparison (Optional)</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="compareDate" class="block text-xs font-medium text-gray-700 mb-2">
                                            Compare with Date
                                        </label>
                                        <input 
                                            type="date" 
                                            id="compareDate" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200"
                                            max="{{ date('Y-m-d') }}"
                                        >
                                    </div>
                                    <div class="flex items-end">
                                        <button 
                                            type="button" 
                                            onclick="compareHistoricalRates()"
                                            class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg font-medium transition duration-200"
                                        >
                                            Compare Rates
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateCurrencyExchange()"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                            >
                                <i class="fas fa-exchange-alt mr-2"></i>
                                Convert Currency
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Conversion Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-money-bill-wave text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter amount and currencies</p>
                                <p class="text-sm">to see conversion result</p>
                            </div>
                        </div>

                        <!-- Exchange Rate Info -->
                        <div id="rateInfoSection" class="mt-6 p-4 bg-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Current Exchange Rate</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600" id="rateFromTo">USD/EUR</span>
                                    <span class="font-medium text-gray-800" id="currentRate">0.00</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Last Updated</span>
                                    <span class="font-medium text-gray-800" id="rateDate">-</span>
                                </div>
                                <div class="pt-2 border-t border-indigo-200">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600">Transfer Fee</span>
                                        <span class="font-medium text-gray-800" id="transferFee">$0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Conversion Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Conversion Summary</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-2xl font-bold text-green-600 mb-2" id="convertedAmount">$0</div>
                            <div class="text-lg font-semibold text-gray-700">You'll Receive</div>
                            <div class="text-sm text-gray-500 mt-1" id="receivedCurrency">EUR</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="exchangeRate">0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Exchange Rate</div>
                            <div class="text-sm text-gray-500 mt-1" id="ratePair">USD/EUR</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="totalFees">$0</div>
                            <div class="text-lg font-semibold text-gray-700">Total Fees</div>
                            <div class="text-sm text-gray-500 mt-1">Included in calculation</div>
                        </div>
                    </div>
                </div>

                <!-- Fee Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Fee Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Cost Analysis -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Analysis</h3>
                            <div class="space-y-4" id="costAnalysis">
                            </div>
                        </div>
                        
                        <!-- Provider Comparison -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Provider Comparison</h3>
                            <div class="space-y-4" id="providerComparison">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historical Comparison -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Historical Rate Comparison</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="historicalComparison">
                    </div>
                </div>

                <!-- Money Transfer Tips -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Money Transfer Tips</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Best Practices -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Best Practices</h3>
                            <div class="space-y-3" id="bestPractices">
                            </div>
                        </div>
                        
                        <!-- Timing Strategies -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Timing Strategies</h3>
                            <div class="space-y-3" id="timingStrategies">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Currency Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Currency Exchange Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Monitor Rates</h3>
                        <p class="text-gray-600">Track currency pairs regularly. Set up alerts for your target exchange rates to maximize value.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-percentage text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Compare Fees</h3>
                        <p class="text-gray-600">Always compare both exchange rates AND fees. Some providers offer good rates but high hidden fees.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Timing Matters</h3>
                        <p class="text-gray-600">Exchange rates fluctuate throughout the day. Consider transferring during off-peak hours for better rates.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Secure Transfers</h3>
                        <p class="text-gray-600">Use regulated providers, verify recipient details, and keep records of all transactions for security.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Currency Exchange FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between mid-market rate and bank rate?</h3>
                        <p class="text-gray-600">The mid-market rate is the real exchange rate between two currencies, while bank rates include a markup (typically 2-5%). Transfer services often offer rates closer to mid-market with separate fees.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When is the best time to exchange currency?</h3>
                        <p class="text-gray-600">Exchange rates fluctuate constantly. Generally, avoid exchanging at airports or hotels where rates are poor. Monitor rates for a few days and exchange when the rate is favorable for your currency pair.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I avoid hidden fees when exchanging money?</h3>
                        <p class="text-gray-600">Always ask for the total amount you'll receive after ALL fees, not just the exchange rate. Compare multiple providers and read the fine print about transfer fees, receiving fees, and intermediary bank charges.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I use a bank or specialized transfer service?</h3>
                        <p class="text-gray-600">For large amounts, specialized transfer services often offer better rates and lower fees than traditional banks. For small amounts or immediate needs, banks may be more convenient despite higher costs.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do political and economic events affect exchange rates?</h3>
                        <p class="text-gray-600">Interest rate changes, inflation reports, political stability, economic growth data, and geopolitical events all significantly impact currency values. Stay informed about major economic announcements in both countries.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="{{ route('investment.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Investment Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate investment growth</p>
                    </a>
                    <a href="{{ route('loan.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-hand-holding-usd text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Loan Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate loan payments</p>
                    </a>
                    <a href="{{ route('tax.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-receipt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tax Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate income taxes</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Currency data with flags and names
const currencyData = {
    'USD': { name: 'US Dollar', flag: 'https://flagcdn.com/w40/us.png', symbol: '$' },
    'EUR': { name: 'Euro', flag: 'https://flagcdn.com/w40/eu.png', symbol: '€' },
    'GBP': { name: 'British Pound', flag: 'https://flagcdn.com/w40/gb.png', symbol: '£' },
    'JPY': { name: 'Japanese Yen', flag: 'https://flagcdn.com/w40/jp.png', symbol: '¥' },
    'CAD': { name: 'Canadian Dollar', flag: 'https://flagcdn.com/w40/ca.png', symbol: 'C$' },
    'AUD': { name: 'Australian Dollar', flag: 'https://flagcdn.com/w40/au.png', symbol: 'A$' },
    'CHF': { name: 'Swiss Franc', flag: 'https://flagcdn.com/w40/ch.png', symbol: 'CHF' },
    'CNY': { name: 'Chinese Yuan', flag: 'https://flagcdn.com/w40/cn.png', symbol: '¥' },
    'INR': { name: 'Indian Rupee', flag: 'https://flagcdn.com/w40/in.png', symbol: '₹' },
    'MXN': { name: 'Mexican Peso', flag: 'https://flagcdn.com/w40/mx.png', symbol: '$' }
};

// Sample exchange rates (in a real app, these would come from an API)
const sampleRates = {
    'USD_EUR': 0.92,
    'USD_GBP': 0.79,
    'USD_JPY': 150.25,
    'USD_CAD': 1.35,
    'USD_AUD': 1.52,
    'USD_CHF': 0.88,
    'USD_CNY': 7.18,
    'USD_INR': 83.12,
    'USD_MXN': 17.05,
    'EUR_USD': 1.09,
    'EUR_GBP': 0.86,
    'EUR_JPY': 163.75,
    'EUR_CAD': 1.47,
    'EUR_AUD': 1.65,
    'EUR_CHF': 0.96,
    'EUR_CNY': 7.82,
    'EUR_INR': 90.52,
    'EUR_MXN': 18.55
};

// Rate multipliers based on rate type
const rateMultipliers = {
    'mid': 1.0,      // Mid-market rate (no markup)
    'bank': 0.97,    // Bank rate (3% markup)
    'transfer': 0.99 // Transfer service (1% markup)
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    updateCurrencyDisplays();
    calculateCurrencyExchange(); // Calculate with default values
});

function setupEventListeners() {
    // Update currency displays when selections change
    document.getElementById('fromCurrency').addEventListener('change', function() {
        updateCurrencyDisplays();
        debounce(calculateCurrencyExchange, 300)();
    });
    
    document.getElementById('toCurrency').addEventListener('change', function() {
        updateCurrencyDisplays();
        debounce(calculateCurrencyExchange, 300)();
    });
    
    // Auto-calculate on input change
    document.getElementById('amount').addEventListener('input', debounce(calculateCurrencyExchange, 300));
    document.getElementById('rateType').addEventListener('change', debounce(calculateCurrencyExchange, 300));
    document.getElementById('feePercentage').addEventListener('input', debounce(calculateCurrencyExchange, 300));
    document.getElementById('includeFees').addEventListener('change', debounce(calculateCurrencyExchange, 300));
}

function updateCurrencyDisplays() {
    const fromCurrency = document.getElementById('fromCurrency').value;
    const toCurrency = document.getElementById('toCurrency').value;
    
    // Update from currency display
    document.getElementById('fromFlag').src = currencyData[fromCurrency].flag;
    document.getElementById('fromFlag').alt = fromCurrency;
    document.getElementById('fromCurrencyName').textContent = currencyData[fromCurrency].name;
    
    // Update to currency display
    document.getElementById('toFlag').src = currencyData[toCurrency].flag;
    document.getElementById('toFlag').alt = toCurrency;
    document.getElementById('toCurrencyName').textContent = currencyData[toCurrency].name;
}

function getExchangeRate(fromCurrency, toCurrency) {
    // In a real application, this would fetch from a live API
    const rateKey = `${fromCurrency}_${toCurrency}`;
    
    if (sampleRates[rateKey]) {
        return sampleRates[rateKey];
    } else {
        // If direct rate not available, calculate via USD (simplified)
        const toUsdRate = sampleRates[`${fromCurrency}_USD`] || (1 / sampleRates[`USD_${fromCurrency}`]);
        const fromUsdRate = sampleRates[`USD_${toCurrency}`] || (1 / sampleRates[`${toCurrency}_USD`]);
        
        if (toUsdRate && fromUsdRate) {
            return toUsdRate * fromUsdRate;
        }
    }
    
    // Fallback rate
    return 0.85;
}

function calculateCurrencyExchange() {
    const amount = parseFloat(document.getElementById('amount').value) || 0;
    const fromCurrency = document.getElementById('fromCurrency').value;
    const toCurrency = document.getElementById('toCurrency').value;
    const rateType = document.getElementById('rateType').value;
    const feePercentage = parseFloat(document.getElementById('feePercentage').value) || 0;
    const includeFees = document.getElementById('includeFees').checked;
    
    // Get base exchange rate
    let exchangeRate = getExchangeRate(fromCurrency, toCurrency);
    
    // Apply rate type multiplier
    exchangeRate *= rateMultipliers[rateType];
    
    // Calculate fees
    const feeAmount = amount * (feePercentage / 100);
    const amountAfterFees = includeFees ? amount - feeAmount : amount;
    
    // Calculate converted amount
    const convertedAmount = amountAfterFees * exchangeRate;
    
    // Format numbers
    const fromSymbol = currencyData[fromCurrency].symbol;
    const toSymbol = currencyData[toCurrency].symbol;
    
    // Display results
    displayResults(amount, fromCurrency, toCurrency, exchangeRate, convertedAmount, feeAmount, fromSymbol, toSymbol);
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
}

function displayResults(amount, fromCurrency, toCurrency, exchangeRate, convertedAmount, feeAmount, fromSymbol, toSymbol) {
    // Update main results card
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        <div class="text-center">
            <div class="flex justify-center items-center space-x-4 mb-6">
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">${fromSymbol}${amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</div>
                    <div class="text-sm text-gray-500">${fromCurrency}</div>
                </div>
                <div class="text-gray-400">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="text-left">
                    <div class="text-2xl font-bold text-indigo-600">${toSymbol}${convertedAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</div>
                    <div class="text-sm text-gray-500">${toCurrency}</div>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                <p>Exchange rate: 1 ${fromCurrency} = ${exchangeRate.toFixed(4)} ${toCurrency}</p>
                <p class="mt-1">Fee: ${fromSymbol}${feeAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</p>
            </div>
        </div>
    `;
    
    // Update rate info section
    document.getElementById('rateInfoSection').classList.remove('hidden');
    document.getElementById('rateFromTo').textContent = `${fromCurrency}/${toCurrency}`;
    document.getElementById('currentRate').textContent = exchangeRate.toFixed(4);
    document.getElementById('rateDate').textContent = new Date().toLocaleDateString();
    document.getElementById('transferFee').textContent = `${fromSymbol}${feeAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    
    // Update detailed results
    updateDetailedResults(amount, fromCurrency, toCurrency, exchangeRate, convertedAmount, feeAmount, fromSymbol, toSymbol);
}

function updateDetailedResults(amount, fromCurrency, toCurrency, exchangeRate, convertedAmount, feeAmount, fromSymbol, toSymbol) {
    // Update conversion summary
    document.getElementById('convertedAmount').textContent = 
        `${toSymbol}${convertedAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    document.getElementById('exchangeRate').textContent = exchangeRate.toFixed(4);
    document.getElementById('ratePair').textContent = `${fromCurrency}/${toCurrency}`;
    document.getElementById('totalFees').textContent = 
        `${fromSymbol}${feeAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    document.getElementById('receivedCurrency').textContent = toCurrency;
    
    // Update cost analysis
    document.getElementById('costAnalysis').innerHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Amount to convert</span>
            <span class="font-medium">${fromSymbol}${amount.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Transfer fee (${document.getElementById('feePercentage').value}%)</span>
            <span class="font-medium text-red-600">-${fromSymbol}${feeAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Amount after fees</span>
            <span class="font-medium">${fromSymbol}${(amount - feeAmount).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Exchange rate</span>
            <span class="font-medium">1 ${fromCurrency} = ${exchangeRate.toFixed(4)} ${toCurrency}</span>
        </div>
        <div class="flex justify-between items-center py-2 bg-green-50 rounded p-2 mt-2">
            <span class="text-gray-800 font-semibold">Total received</span>
            <span class="font-bold text-green-600">${toSymbol}${convertedAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</span>
        </div>
    `;
    
    // Update provider comparison
    const providerMarkup = {
        'Banks': 0.03,
        'Transfer Services': 0.01,
        'Credit Cards': 0.035,
        'Airport Kiosks': 0.08
    };
    
    let providerHtml = '';
    for (const [provider, markup] of Object.entries(providerMarkup)) {
        const providerRate = getExchangeRate(fromCurrency, toCurrency) * (1 - markup);
        const providerAmount = (amount - feeAmount) * providerRate;
        const savings = convertedAmount - providerAmount;
        
        providerHtml += `
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">${provider}</span>
                <div class="text-right">
                    <div class="font-medium">${toSymbol}${providerAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</div>
                    <div class="text-xs ${savings > 0 ? 'text-green-600' : 'text-red-600'}">
                        ${savings > 0 ? '+' : ''}${toSymbol}${Math.abs(savings).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}
                    </div>
                </div>
            </div>
        `;
    }
    
    document.getElementById('providerComparison').innerHTML = providerHtml;
    
    // Update best practices
    document.getElementById('bestPractices').innerHTML = `
        <div class="flex items-start space-x-3">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Compare multiple providers</p>
                <p class="text-sm text-gray-600">Rates and fees vary significantly between banks and transfer services.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Watch for hidden fees</p>
                <p class="text-sm text-gray-600">Some providers charge receiving fees or intermediary bank fees.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Consider timing</p>
                <p class="text-sm text-gray-600">Exchange rates fluctuate throughout the day and week.</p>
            </div>
        </div>
    `;
    
    // Update timing strategies
    document.getElementById('timingStrategies').innerHTML = `
        <div class="flex items-start space-x-3">
            <i class="fas fa-clock text-blue-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Avoid weekends</p>
                <p class="text-sm text-gray-600">Markets are closed, so you'll get Friday's rates with potential markups.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-chart-line text-blue-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Monitor trends</p>
                <p class="text-sm text-gray-600">Check if the currency pair is in an upward or downward trend.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-bell text-blue-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Set rate alerts</p>
                <p class="text-sm text-gray-600">Use apps to notify you when your target exchange rate is reached.</p>
            </div>
        </div>
    `;
}

function compareHistoricalRates() {
    const compareDate = document.getElementById('compareDate').value;
    if (!compareDate) {
        alert('Please select a date to compare');
        return;
    }
    
    // In a real app, this would fetch historical rates from an API
    // For demo purposes, we'll simulate with slightly different rates
    const fromCurrency = document.getElementById('fromCurrency').value;
    const toCurrency = document.getElementById('toCurrency').value;
    
    const currentRate = getExchangeRate(fromCurrency, toCurrency);
    const historicalRate = currentRate * (0.95 + Math.random() * 0.1); // Random variation
    
    const amount = parseFloat(document.getElementById('amount').value) || 0;
    const currentAmount = amount * currentRate;
    const historicalAmount = amount * historicalRate;
    const difference = currentAmount - historicalAmount;
    
    const toSymbol = currencyData[toCurrency].symbol;
    
    document.getElementById('historicalComparison').innerHTML = `
        <div class="bg-blue-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">Current Rate (Today)</h3>
            <div class="text-2xl font-bold text-blue-600 mb-2">${toSymbol}${currentAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</div>
            <div class="text-sm text-blue-700">1 ${fromCurrency} = ${currentRate.toFixed(4)} ${toCurrency}</div>
        </div>
        <div class="bg-purple-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-purple-800 mb-4">Historical Rate (${new Date(compareDate).toLocaleDateString()})</h3>
            <div class="text-2xl font-bold text-purple-600 mb-2">${toSymbol}${historicalAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</div>
            <div class="text-sm text-purple-700">1 ${fromCurrency} = ${historicalRate.toFixed(4)} ${toCurrency}</div>
            <div class="mt-3 text-sm ${difference >= 0 ? 'text-green-600' : 'text-red-600'} font-medium">
                ${difference >= 0 ? '+' : ''}${toSymbol}${Math.abs(difference).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})} 
                (${difference >= 0 ? 'better' : 'worse'})
            </div>
        </div>
    `;
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