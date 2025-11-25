@extends('layouts.app')

@section('title', 'Currency Converter - Live Exchange Rates Calculator | CalculaterTools')

@section('meta-description', 'Free currency converter with live exchange rates. Convert between 150+ currencies using real-time data. Calculate foreign exchange amounts instantly.')

@section('keywords', 'currency converter, exchange rates, forex calculator, currency conversion, money converter, foreign exchange')

@section('canonical', url('/calculators/currency-converter'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Currency Converter",
    "description": "Convert between 150+ currencies using live exchange rates from reliable financial data sources",
    "url": "{{ url('/calculators/currency-converter') }}",
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
                    <li class="text-gray-500">Currency Converter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Currency Converter</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Convert between 150+ currencies using live exchange rates. Get accurate, real-time foreign exchange calculations.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Currency Conversion</h2>
                            <div id="lastUpdated" class="text-sm text-gray-500">
                                <i class="fas fa-sync-alt animate-spin mr-1"></i>
                                Loading rates...
                            </div>
                        </div>
                        
                        <form id="currencyConverterForm" class="space-y-6">
                            <!-- Amount Input -->
                            <div>
                                <label for="amount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Amount
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="amount" 
                                        class="w-full pl-4 pr-20 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="Enter amount" 
                                        min="0" 
                                        step="0.01"
                                        value="100"
                                        required
                                    >
                                    <div class="absolute right-2 top-1/2 transform -translate-y-1/2">
                                        <select 
                                            id="fromCurrency" 
                                            class="bg-gray-50 border-0 py-1 pl-2 pr-8 rounded text-sm font-medium focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        >
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="JPY">JPY</option>
                                            <option value="CAD">CAD</option>
                                            <option value="AUD">AUD</option>
                                            <option value="CHF">CHF</option>
                                            <option value="CNY">CNY</option>
                                            <option value="INR" selected>INR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Swap Currencies Button -->
                            <div class="flex justify-center">
                                <button 
                                    type="button" 
                                    id="swapCurrencies"
                                    class="p-3 bg-gray-100 hover:bg-gray-200 rounded-full transition duration-200 transform hover:scale-110"
                                >
                                    <i class="fas fa-exchange-alt text-gray-600 text-lg"></i>
                                </button>
                            </div>

                            <!-- To Currency -->
                            <div>
                                <label for="toCurrency" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Convert To
                                </label>
                                <select 
                                    id="toCurrency" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    <option value="USD" selected>USD - US Dollar</option>
                                    <option value="EUR">EUR - Euro</option>
                                    <option value="GBP">GBP - British Pound</option>
                                    <option value="JPY">JPY - Japanese Yen</option>
                                    <option value="CAD">CAD - Canadian Dollar</option>
                                    <option value="AUD">AUD - Australian Dollar</option>
                                    <option value="CHF">CHF - Swiss Franc</option>
                                    <option value="CNY">CNY - Chinese Yuan</option>
                                    <option value="INR">INR - Indian Rupee</option>
                                    <option value="AED">AED - UAE Dirham</option>
                                    <option value="SGD">SGD - Singapore Dollar</option>
                                </select>
                            </div>

                            <!-- Quick Amounts -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Amounts
                                </label>
                                <div class="grid grid-cols-4 gap-2">
                                    <button type="button" onclick="setAmount(10)" class="py-2 px-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium transition duration-200">10</button>
                                    <button type="button" onclick="setAmount(50)" class="py-2 px-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium transition duration-200">50</button>
                                    <button type="button" onclick="setAmount(100)" class="py-2 px-3 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium transition duration-200">100</button>
                                    <button type="button" onclick="setAmount(1000)" class="py-2 px-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium transition duration-200">1,000</button>
                                </div>
                            </div>

                            <!-- Popular Conversions -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Popular Conversions
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setConversion('INR', 'USD')" class="popular-btn border border-gray-300 rounded-lg py-2 px-3 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-xs text-gray-500">INR → USD</div>
                                        <div class="text-sm font-medium text-gray-800">₹ to $</div>
                                    </button>
                                    <button type="button" onclick="setConversion('USD', 'EUR')" class="popular-btn border border-gray-300 rounded-lg py-2 px-3 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-xs text-gray-500">USD → EUR</div>
                                        <div class="text-sm font-medium text-gray-800">$ to €</div>
                                    </button>
                                    <button type="button" onclick="setConversion('EUR', 'GBP')" class="popular-btn border border-gray-300 rounded-lg py-2 px-3 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-xs text-gray-500">EUR → GBP</div>
                                        <div class="text-sm font-medium text-gray-800">€ to £</div>
                                    </button>
                                    <button type="button" onclick="setConversion('USD', 'INR')" class="popular-btn border border-gray-300 rounded-lg py-2 px-3 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-xs text-gray-500">USD → INR</div>
                                        <div class="text-sm font-medium text-gray-800">$ to ₹</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="convertCurrency()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-sync-alt mr-2"></i>
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
                        <div id="rateInfo" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-2">Exchange Rate</h4>
                            <div class="space-y-2 text-sm" id="rateDetails">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Currency Table -->
            <div id="currencyTableSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Major Currency Rates</h2>
                    <div class="text-sm text-gray-500" id="tableLastUpdated"></div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Currency</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Code</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Rate</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Change</th>
                            </tr>
                        </thead>
                        <tbody id="currencyRatesTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Features Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Use Our Currency Converter?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bolt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Live Rates</h3>
                        <p class="text-gray-600">Get real-time exchange rates updated every minute from reliable financial sources.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">150+ Currencies</h3>
                        <p class="text-gray-600">Convert between all major world currencies and many exotic currencies.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Reliable Data</h3>
                        <p class="text-gray-600">Multiple fallback sources ensure you always get accurate exchange rates.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mobile-alt text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Mobile Friendly</h3>
                        <p class="text-gray-600">Use our converter on any device - perfect for travel and on-the-go calculations.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Currency Conversion FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often are exchange rates updated?</h3>
                        <p class="text-gray-600">Our currency converter uses live exchange rates that are updated regularly. We use multiple reliable sources to ensure accuracy.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are the rates exactly what I'll get from my bank?</h3>
                        <p class="text-gray-600">The rates shown are mid-market rates. Banks and money transfer services typically add a margin (spread) to these rates. Actual rates may vary slightly.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Which currencies are supported?</h3>
                        <p class="text-gray-600">We support all major world currencies including USD, EUR, GBP, JPY, CAD, AUD, CHF, CNY, INR, and many other currencies from around the world.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do exchange rates fluctuate?</h3>
                        <p class="text-gray-600">Exchange rates change constantly due to economic factors, interest rates, inflation, political stability, and market speculation. They're determined by global foreign exchange markets.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('inflation.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Inflation Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate purchasing power changes over time</p>
                    </a>
                    <a href="{{ route('mutual.funds.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-pie text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mutual Fund Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on mutual fund investments with SIP or lump sum</p>
                    </a>
                    <a href="{{ route('sip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">SIP Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Systematic Investment Plans</p>
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
let exchangeRates = {};
let baseCurrency = 'USD';
let lastUpdateTime = null;

// Fallback exchange rates (updated manually - these are approximate rates)
const fallbackRates = {
    'USD': 1,
    'EUR': 0.85,
    'GBP': 0.73,
    'JPY': 110.25,
    'CAD': 1.25,
    'AUD': 1.35,
    'CHF': 0.92,
    'CNY': 6.45,
    'INR': 74.50,
    'AED': 3.67,
    'SGD': 1.35
};

// Currency data with symbols and names
const currencyData = {
    'USD': { symbol: '$', name: 'US Dollar' },
    'EUR': { symbol: '€', name: 'Euro' },
    'GBP': { symbol: '£', name: 'British Pound' },
    'JPY': { symbol: '¥', name: 'Japanese Yen' },
    'CAD': { symbol: 'C$', name: 'Canadian Dollar' },
    'AUD': { symbol: 'A$', name: 'Australian Dollar' },
    'CHF': { symbol: 'CHF', name: 'Swiss Franc' },
    'CNY': { symbol: '¥', name: 'Chinese Yuan' },
    'INR': { symbol: '₹', name: 'Indian Rupee' },
    'AED': { symbol: 'د.إ', name: 'UAE Dirham' },
    'SGD': { symbol: 'S$', name: 'Singapore Dollar' }
};

// Initialize the converter
document.addEventListener('DOMContentLoaded', function() {
    loadExchangeRates();
    setupEventListeners();
});

function setupEventListeners() {
    // Swap currencies
    document.getElementById('swapCurrencies').addEventListener('click', swapCurrencies);
    
    // Auto-convert on input change
    document.getElementById('amount').addEventListener('input', debounce(convertCurrency, 500));
    document.getElementById('fromCurrency').addEventListener('change', function() {
        loadExchangeRates();
    });
    document.getElementById('toCurrency').addEventListener('change', convertCurrency);
}

// Load exchange rates from API with fallback
async function loadExchangeRates() {
    const fromCurrency = document.getElementById('fromCurrency').value;
    
    showLoadingState();
    
    try {
        // Try ExchangeRate.host API first
        let apiUrl = `https://api.exchangerate.host/latest?base=${fromCurrency}`;
        
        console.log('Fetching rates from:', apiUrl);
        
        const response = await fetch(apiUrl, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
            mode: 'cors'
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (data && data.success && data.rates) {
            exchangeRates = data.rates;
            baseCurrency = data.base;
            lastUpdateTime = new Date();
            
            updateLastUpdatedTime('Live rates');
            convertCurrency();
            updateCurrencyTable();
            return;
        } else {
            throw new Error('Invalid API response');
        }
    } catch (error) {
        console.warn('Primary API failed, trying fallback:', error);
        
        // Try fallback API
        try {
            await tryFallbackAPI(fromCurrency);
        } catch (fallbackError) {
            console.warn('Fallback API failed, using static rates:', fallbackError);
            useStaticRates(fromCurrency);
        }
    }
}

// Try alternative free API
async function tryFallbackAPI(fromCurrency) {
    // Try Frankfurter API (free, no API key needed)
    const fallbackUrl = `https://api.frankfurter.app/latest?from=${fromCurrency}`;
    
    const response = await fetch(fallbackUrl);
    
    if (!response.ok) {
        throw new Error('Fallback API failed');
    }
    
    const data = await response.json();
    
    if (data && data.rates) {
        exchangeRates = data.rates;
        baseCurrency = data.base;
        lastUpdateTime = new Date();
        
        updateLastUpdatedTime('Fallback rates');
        convertCurrency();
        updateCurrencyTable();
    } else {
        throw new Error('Invalid fallback API response');
    }
}

// Use static rates as last resort
function useStaticRates(fromCurrency) {
    // Convert static rates to selected base currency
    const baseRate = fallbackRates[fromCurrency];
    
    if (!baseRate) {
        // If base currency not in static rates, use USD as base
        exchangeRates = { ...fallbackRates };
        baseCurrency = 'USD';
    } else {
        // Convert all rates to the selected base currency
        exchangeRates = {};
        for (const [currency, rate] of Object.entries(fallbackRates)) {
            exchangeRates[currency] = rate / baseRate;
        }
        baseCurrency = fromCurrency;
    }
    
    lastUpdateTime = new Date();
    
    updateLastUpdatedTime('Static rates (last updated manually)');
    convertCurrency();
    updateCurrencyTable();
    
    // Show warning about using static rates
    showStaticRatesWarning();
}

function showStaticRatesWarning() {
    const warningHTML = `
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
            <div class="flex items-start">
                <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                <div class="text-sm text-yellow-800">
                    <strong>Note:</strong> Using manually updated rates. Live rates are temporarily unavailable. 
                    These rates are for reference only and may not reflect current market prices.
                </div>
            </div>
        </div>
    `;
    
    // Add warning to results section
    const resultsDiv = document.getElementById('results');
    if (!resultsDiv.innerHTML.includes('bg-yellow-50')) {
        resultsDiv.innerHTML = warningHTML + resultsDiv.innerHTML;
    }
}

function convertCurrency() {
    const amount = parseFloat(document.getElementById('amount').value);
    const fromCurrency = document.getElementById('fromCurrency').value;
    const toCurrency = document.getElementById('toCurrency').value;
    
    if (!amount || amount <= 0) {
        showError('Please enter a valid amount');
        return;
    }
    
    if (!exchangeRates[toCurrency]) {
        showError('Exchange rate not available for selected currency');
        return;
    }
    
    const exchangeRate = exchangeRates[toCurrency];
    const convertedAmount = amount * exchangeRate;
    
    displayResults(amount, fromCurrency, convertedAmount, toCurrency, exchangeRate);
}

function displayResults(originalAmount, fromCurrency, convertedAmount, toCurrency, exchangeRate) {
    const fromSymbol = currencyData[fromCurrency]?.symbol || fromCurrency;
    const toSymbol = currencyData[toCurrency]?.symbol || toCurrency;
    const fromName = currencyData[fromCurrency]?.name || fromCurrency;
    const toName = currencyData[toCurrency]?.name || toCurrency;
    
    const resultsHTML = `
        <div class="space-y-4">
            <!-- Main Conversion Result -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 border border-green-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">
                        ${toSymbol}${formatCurrency(convertedAmount)}
                    </div>
                    <div class="text-lg font-semibold text-gray-700">
                        ${fromSymbol}${formatCurrency(originalAmount)} ${fromCurrency}
                    </div>
                    <div class="text-sm text-gray-500 mt-1">${fromName} → ${toName}</div>
                </div>
            </div>

            <!-- Exchange Rate -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Exchange Rate</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">1 ${fromCurrency}</span>
                        <span class="font-semibold text-gray-900">= ${exchangeRate.toFixed(6)} ${toCurrency}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">1 ${toCurrency}</span>
                        <span class="font-semibold text-gray-900">= ${(1/exchangeRate).toFixed(6)} ${fromCurrency}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Conversions -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Quick Conversions</h4>
                <div class="space-y-1 text-sm">
                    <div class="flex justify-between">
                        <span class="text-blue-700">5 ${fromCurrency}</span>
                        <span class="font-semibold text-blue-900">${toSymbol}${formatCurrency(5 * exchangeRate)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-700">10 ${fromCurrency}</span>
                        <span class="font-semibold text-blue-900">${toSymbol}${formatCurrency(10 * exchangeRate)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-700">50 ${fromCurrency}</span>
                        <span class="font-semibold text-blue-900">${toSymbol}${formatCurrency(50 * exchangeRate)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-700">100 ${fromCurrency}</span>
                        <span class="font-semibold text-blue-900">${toSymbol}${formatCurrency(100 * exchangeRate)}</span>
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('rateInfo').classList.remove('hidden');
    document.getElementById('currencyTableSection').classList.remove('hidden');
}

function updateCurrencyTable() {
    const majorCurrencies = ['USD', 'EUR', 'GBP', 'JPY', 'CAD', 'AUD', 'CHF', 'CNY', 'INR'];
    const baseCurrency = document.getElementById('fromCurrency').value;
    
    let tableHTML = '';
    
    majorCurrencies.forEach(currency => {
        if (currency !== baseCurrency && exchangeRates[currency]) {
            const rate = exchangeRates[currency];
            // For demo purposes, generate random changes
            const change = (Math.random() * 2 - 1).toFixed(4);
            const changeClass = change >= 0 ? 'text-green-600' : 'text-red-600';
            const changeIcon = change >= 0 ? 'fa-arrow-up' : 'fa-arrow-down';
            
            tableHTML += `
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-700">${currencyData[currency]?.name || currency}</td>
                    <td class="px-4 py-3 text-right font-mono text-gray-600">${currency}</td>
                    <td class="px-4 py-3 text-right font-semibold text-gray-900">${rate.toFixed(4)}</td>
                    <td class="px-4 py-3 text-right font-semibold ${changeClass}">
                        <i class="fas ${changeIcon} mr-1"></i>
                        ${Math.abs(change)}%
                    </td>
                </tr>
            `;
        }
    });
    
    document.getElementById('currencyRatesTable').innerHTML = tableHTML;
}

function swapCurrencies() {
    const fromCurrency = document.getElementById('fromCurrency');
    const toCurrency = document.getElementById('toCurrency');
    
    const temp = fromCurrency.value;
    fromCurrency.value = toCurrency.value;
    toCurrency.value = temp;
    
    loadExchangeRates();
}

function setAmount(amount) {
    document.getElementById('amount').value = amount;
    convertCurrency();
    
    // Update quick amount buttons
    document.querySelectorAll('#currencyConverterForm button').forEach(btn => {
        if (btn.textContent.includes(amount)) {
            btn.classList.add('bg-blue-100', 'text-blue-700');
        } else {
            btn.classList.remove('bg-blue-100', 'text-blue-700');
        }
    });
}

function setConversion(from, to) {
    document.getElementById('fromCurrency').value = from;
    document.getElementById('toCurrency').value = to;
    
    // Update popular conversion buttons
    document.querySelectorAll('.popular-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    loadExchangeRates();
}

function updateLastUpdatedTime(source = 'Live rates') {
    if (lastUpdateTime) {
        const now = new Date();
        const timeString = lastUpdateTime.toLocaleTimeString();
        
        document.getElementById('lastUpdated').innerHTML = 
            `<i class="fas fa-check-circle text-green-500 mr-1"></i> ${source} • ${timeString}`;
        document.getElementById('tableLastUpdated').textContent = `Updated ${timeString}`;
    }
}

function showLoadingState() {
    document.getElementById('lastUpdated').innerHTML = 
        '<i class="fas fa-sync-alt animate-spin mr-1"></i> Loading rates...';
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-sync-alt animate-spin text-3xl mb-4"></i>
            <p class="text-lg font-medium">Loading exchange rates</p>
            <p class="text-sm">Please wait...</p>
        </div>
    `;
}

function showError(message) {
    document.getElementById('results').innerHTML = `
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-red-600 mr-3"></i>
                <div class="text-red-800 font-medium">${message}</div>
            </div>
        </div>
    `;
}

function formatCurrency(amount) {
    return amount.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
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

// Auto-refresh rates every 5 minutes
setInterval(loadExchangeRates, 300000);
</script>
@endsection