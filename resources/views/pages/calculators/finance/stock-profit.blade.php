@extends('layouts.app')

@section('title', 'Stock Profit/Loss Calculator - Calculate Investment Returns | CalculaterTools')

@section('meta-description', 'Free stock profit/loss calculator to calculate returns on your stock investments. Compute capital gains, percentage returns, and analyze investment performance.')

@section('keywords', 'stock calculator, profit loss calculator, investment returns, capital gains, stock returns, portfolio calculator, share market calculator')

@section('canonical', url('/calculators/stock-profit-loss'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Stock Profit/Loss Calculator",
    "description": "Calculate profit and loss on stock investments including brokerage charges, taxes, and percentage returns",
    "url": "{{ url('/calculators/stock-profit-loss') }}",
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
                        <a href="#investment" class="text-blue-600 hover:text-blue-800 transition duration-150">Investment Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Stock Profit/Loss Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Stock Profit/Loss Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your stock investment returns including brokerage charges, taxes, and total profit/loss. Analyze your investment performance with detailed breakdown.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Stock Returns</h2>
                        <p class="text-gray-600 mb-6">Enter your stock trade details to calculate profit/loss and returns</p>
                        
                        <form id="stockCalculatorForm" class="space-y-6">
                            <!-- Stock Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="stockName" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Stock Name/Symbol
                                    </label>
                                    <input 
                                        type="text" 
                                        id="stockName" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., RELIANCE, TCS"
                                        value="RELIANCE"
                                    >
                                </div>
                                <div>
                                    <label for="quantity" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Quantity
                                    </label>
                                    <input 
                                        type="number" 
                                        id="quantity" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 100" 
                                        min="1" 
                                        value="100"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Buy Price -->
                            <div>
                                <label for="buyPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Buy Price per Share (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="buyPrice" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 2500" 
                                        min="1" 
                                        step="0.01"
                                        value="2500"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Sell Price -->
                            <div>
                                <label for="sellPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Sell Price per Share (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="sellPrice" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 2800" 
                                        min="1" 
                                        step="0.01"
                                        value="2800"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Brokerage Charges -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Brokerage & Charges</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="brokeragePercent" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Brokerage (%)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="brokeragePercent" 
                                                class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 0.5" 
                                                min="0" 
                                                max="5" 
                                                step="0.01"
                                                value="0.5"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="otherCharges" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Other Charges (₹)
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                            <input 
                                                type="number" 
                                                id="otherCharges" 
                                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 100" 
                                                min="0" 
                                                value="100"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tax Settings -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Tax Settings</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between">
                                        <label for="holdingPeriod" class="block text-sm font-semibold text-gray-700">
                                            Holding Period
                                        </label>
                                        <select 
                                            id="holdingPeriod" 
                                            class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                            <option value="short">Short Term (&lt; 1 year)</option>
                                            <option value="long" selected>Long Term (&gt;= 1 year)</option>
                                        </select>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="includeTax" 
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                            checked
                                        >
                                        <label for="includeTax" class="ml-2 block text-sm font-semibold text-gray-700">
                                            Include Capital Gains Tax Calculation
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Scenarios -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Scenarios
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setScenario('profit')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-chart-line text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Good Profit</div>
                                    </button>
                                    <button type="button" onclick="setScenario('loss')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-chart-line-down text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Stop Loss</div>
                                    </button>
                                    <button type="button" onclick="setScenario('intraday')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-sync-alt text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Intraday</div>
                                    </button>
                                    <button type="button" onclick="setScenario('longterm')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-calendar-alt text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Long Term</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateStockProfitLoss()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Profit/Loss
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Investment Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-line text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter stock details</p>
                                <p class="text-sm">to see profit/loss calculation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Breakdown -->
            <div id="breakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Breakdown</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Cost Breakdown -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Analysis</h3>
                        <div class="space-y-3" id="costBreakdown">
                        </div>
                    </div>
                    
                    <!-- Return Analysis -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Return Analysis</h3>
                        <div class="space-y-3" id="returnAnalysis">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Metrics -->
            <div id="metricsSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Performance Metrics</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="performanceMetrics">
                </div>
            </div>

            <!-- Investment Insights -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Stock Investment Insights</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-percentage text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Brokerage Impact</h3>
                        <p class="text-gray-600">Even small brokerage percentages can significantly impact your overall returns, especially for frequent trading.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Tax Efficiency</h3>
                        <p class="text-gray-600">Long-term investments enjoy lower tax rates. Plan your holding period to optimize tax efficiency.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-pie text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Portfolio Management</h3>
                        <p class="text-gray-600">Regularly calculate profits/losses to rebalance your portfolio and maintain optimal asset allocation.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Stock Investment FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the difference between short-term and long-term capital gains?</h3>
                        <p class="text-gray-600">In India, stocks held for less than 1 year are considered short-term and taxed at 15%. Stocks held for 1 year or more are long-term with 10% tax on gains above ₹1 lakh.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How are brokerage charges calculated?</h3>
                        <p class="text-gray-600">Brokerage is typically a percentage of the total trade value (buy + sell). Most brokers charge between 0.1% to 0.5% per trade, plus GST and other statutory charges.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is Securities Transaction Tax (STT)?</h3>
                        <p class="text-gray-600">STT is a tax levied on every stock transaction. For equity delivery trades, it's 0.1% on the sell side only. For intraday trades, it's 0.025% on both buy and sell.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I reduce my tax liability on stock investments?</h3>
                        <p class="text-gray-600">Hold stocks for over 1 year to qualify for long-term capital gains benefits, use tax-loss harvesting, and consider equity-linked savings schemes (ELSS) for additional deductions.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the break-even point in stock trading?</h3>
                        <p class="text-gray-600">The break-even point is when your selling price equals your total cost (including brokerage and taxes). You need to account for all charges to determine the actual break-even price.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Investment Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                    {{-- <a href="{{ route('dividend.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-money-bill-wave text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Dividend Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate dividend income from stock investments</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Tax rates for India
const taxRates = {
    short: 15, // Short-term capital gains tax %
    long: 10   // Long-term capital gains tax %
};

// Set quick scenarios
function setScenario(type) {
    const scenarios = {
        'profit': { 
            buyPrice: 1500, 
            sellPrice: 2000, 
            quantity: 50,
            brokerage: 0.3,
            holdingPeriod: 'long'
        },
        'loss': { 
            buyPrice: 3000, 
            sellPrice: 2500, 
            quantity: 25,
            brokerage: 0.5,
            holdingPeriod: 'short'
        },
        'intraday': { 
            buyPrice: 500, 
            sellPrice: 520, 
            quantity: 200,
            brokerage: 0.1,
            holdingPeriod: 'short'
        },
        'longterm': { 
            buyPrice: 800, 
            sellPrice: 1500, 
            quantity: 100,
            brokerage: 0.5,
            holdingPeriod: 'long'
        }
    };

    const scenario = scenarios[type];
    document.getElementById('buyPrice').value = scenario.buyPrice;
    document.getElementById('sellPrice').value = scenario.sellPrice;
    document.getElementById('quantity').value = scenario.quantity;
    document.getElementById('brokeragePercent').value = scenario.brokerage;
    document.getElementById('holdingPeriod').value = scenario.holdingPeriod;

    // Update button styles
    document.querySelectorAll('.scenario-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-red-500', 'bg-red-50', 'border-blue-500', 'bg-blue-50', 'border-purple-500', 'bg-purple-50', 'ring-2', 'ring-blue-300');
    });
    
    const colorMap = {
        'profit': 'green',
        'loss': 'red',
        'intraday': 'blue',
        'longterm': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[type]}-500`, `bg-${colorMap[type]}-50`, 'ring-2', 'ring-blue-300');
    
    calculateStockProfitLoss();
}

function calculateStockProfitLoss() {
    // Get input values
    const stockName = document.getElementById('stockName').value || 'Stock';
    const quantity = parseInt(document.getElementById('quantity').value);
    const buyPrice = parseFloat(document.getElementById('buyPrice').value);
    const sellPrice = parseFloat(document.getElementById('sellPrice').value);
    const brokeragePercent = parseFloat(document.getElementById('brokeragePercent').value) || 0;
    const otherCharges = parseFloat(document.getElementById('otherCharges').value) || 0;
    const holdingPeriod = document.getElementById('holdingPeriod').value;
    const includeTax = document.getElementById('includeTax').checked;

    // Validation
    if (!quantity || quantity < 1) {
        showError('Please enter a valid quantity');
        return;
    }
    if (!buyPrice || buyPrice < 1) {
        showError('Please enter a valid buy price');
        return;
    }
    if (!sellPrice || sellPrice < 1) {
        showError('Please enter a valid sell price');
        return;
    }

    // Calculate basic amounts
    const buyValue = buyPrice * quantity;
    const sellValue = sellPrice * quantity;

    // Calculate brokerage
    const buyBrokerage = (buyValue * brokeragePercent) / 100;
    const sellBrokerage = (sellValue * brokeragePercent) / 100;
    const totalBrokerage = buyBrokerage + sellBrokerage;

    // Calculate STT (Securities Transaction Tax)
    const sttRate = 0.1; // 0.1% on sell side for delivery
    const sttCharges = (sellValue * sttRate) / 100;

    // Total charges
    const totalCharges = totalBrokerage + sttCharges + otherCharges;

    // Calculate gross profit/loss
    const grossProfitLoss = sellValue - buyValue;
    const netProfitLoss = grossProfitLoss - totalCharges;

    // Calculate tax
    let taxAmount = 0;
    if (includeTax && netProfitLoss > 0) {
        const taxRate = taxRates[holdingPeriod];
        // For long-term, tax only on gains above 1 lakh
        const taxableAmount = holdingPeriod === 'long' ? Math.max(0, netProfitLoss - 100000) : netProfitLoss;
        taxAmount = (taxableAmount * taxRate) / 100;
    }

    // Final net amount after tax
    const finalNetProfitLoss = netProfitLoss - taxAmount;

    // Calculate percentages
    const totalInvestment = buyValue + buyBrokerage + otherCharges;
    const netReturnPercentage = (finalNetProfitLoss / totalInvestment) * 100;
    const grossReturnPercentage = (grossProfitLoss / buyValue) * 100;

    // Calculate break-even price
    const breakEvenPrice = (totalInvestment / quantity) * (1 + (brokeragePercent / 100));

    // Display results
    displayResults(stockName, quantity, finalNetProfitLoss, netProfitLoss, grossProfitLoss, taxAmount, 
                  totalCharges, netReturnPercentage, grossReturnPercentage, breakEvenPrice, totalInvestment);
    
    // Generate detailed breakdown
    generateDetailedBreakdown(buyValue, sellValue, buyBrokerage, sellBrokerage, sttCharges, otherCharges, totalCharges);
    
    // Generate performance metrics
    generatePerformanceMetrics(grossProfitLoss, netProfitLoss, finalNetProfitLoss, grossReturnPercentage, netReturnPercentage);
}

function displayResults(stockName, quantity, finalNetProfitLoss, netProfitLoss, grossProfitLoss, taxAmount, 
                       totalCharges, netReturnPercentage, grossReturnPercentage, breakEvenPrice, totalInvestment) {
    
    const isProfit = finalNetProfitLoss >= 0;
    const resultColor = isProfit ? 'green' : 'red';
    const resultIcon = isProfit ? 'fa-arrow-up' : 'fa-arrow-down';
    const resultText = isProfit ? 'Profit' : 'Loss';

    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-${resultColor}-50 to-${resultColor}-100 rounded-xl p-6 border border-${resultColor}-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-${resultColor}-600 mb-2">
                        <i class="fas ${resultIcon} mr-2"></i>
                        ₹${formatCurrency(Math.abs(finalNetProfitLoss))}
                    </div>
                    <div class="text-lg font-semibold text-gray-700">Net ${resultText}</div>
                    <div class="text-sm text-gray-500 mt-1">${stockName} • ${quantity} shares</div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold ${grossProfitLoss >= 0 ? 'text-green-600' : 'text-red-600'}">
                        ${grossReturnPercentage >= 0 ? '+' : ''}${grossReturnPercentage.toFixed(2)}%
                    </div>
                    <div class="text-sm text-gray-600 mt-1">Gross Return</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold ${netReturnPercentage >= 0 ? 'text-green-600' : 'text-red-600'}">
                        ${netReturnPercentage >= 0 ? '+' : ''}${netReturnPercentage.toFixed(2)}%
                    </div>
                    <div class="text-sm text-gray-600 mt-1">Net Return</div>
                </div>
            </div>

            <!-- Key Numbers -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Transaction Summary</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Investment</span>
                        <span class="font-semibold text-gray-900">₹${formatCurrency(totalInvestment)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Gross ${grossProfitLoss >= 0 ? 'Profit' : 'Loss'}</span>
                        <span class="font-semibold ${grossProfitLoss >= 0 ? 'text-green-600' : 'text-red-600'}">
                            ${grossProfitLoss >= 0 ? '+' : ''}₹${formatCurrency(grossProfitLoss)}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Charges & Taxes</span>
                        <span class="font-semibold text-red-600">-₹${formatCurrency(totalCharges + taxAmount)}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">Net ${resultText}</span>
                            <span class="text-${resultColor}-600">
                                ${finalNetProfitLoss >= 0 ? '+' : ''}₹${formatCurrency(finalNetProfitLoss)}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Break-even Info -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Break-even Analysis</h4>
                <p class="text-sm text-blue-800">
                    You need to sell at <strong>₹${breakEvenPrice.toFixed(2)}</strong> per share to break even after all charges.
                </p>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Note:</strong> This calculation includes estimated charges. Actual brokerage and taxes may vary based on your broker and specific transaction details.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('breakdownSection').classList.remove('hidden');
    document.getElementById('metricsSection').classList.remove('hidden');
}

function generateDetailedBreakdown(buyValue, sellValue, buyBrokerage, sellBrokerage, sttCharges, otherCharges, totalCharges) {
    const costBreakdownHTML = `
        <div class="space-y-2 text-sm">
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Buy Value</span>
                <span class="font-semibold text-gray-900">₹${formatCurrency(buyValue)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Buy Brokerage</span>
                <span class="font-semibold text-red-600">-₹${formatCurrency(buyBrokerage)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Sell Value</span>
                <span class="font-semibold text-gray-900">₹${formatCurrency(sellValue)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Sell Brokerage</span>
                <span class="font-semibold text-red-600">-₹${formatCurrency(sellBrokerage)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">STT Charges</span>
                <span class="font-semibold text-red-600">-₹${formatCurrency(sttCharges)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Other Charges</span>
                <span class="font-semibold text-red-600">-₹${formatCurrency(otherCharges)}</span>
            </div>
            <div class="flex justify-between p-2 bg-red-50 rounded border border-red-200">
                <span class="text-red-700 font-semibold">Total Charges</span>
                <span class="font-bold text-red-700">-₹${formatCurrency(totalCharges)}</span>
            </div>
        </div>
    `;

    const returnAnalysisHTML = `
        <div class="space-y-2 text-sm">
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Gross P&L</span>
                <span class="font-semibold text-green-600">+₹${formatCurrency(sellValue - buyValue)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Brokerage Impact</span>
                <span class="font-semibold text-red-600">-${((totalCharges/(sellValue - buyValue))*100).toFixed(1)}%</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Net P&L Before Tax</span>
                <span class="font-semibold text-blue-600">+₹${formatCurrency(sellValue - buyValue - totalCharges)}</span>
            </div>
            <div class="flex justify-between p-2 bg-gray-50 rounded">
                <span class="text-gray-600">Tax Impact</span>
                <span class="font-semibold text-red-600">-₹${formatCurrency(document.getElementById('includeTax').checked ? (() => {
                    const netProfit = sellValue - buyValue - totalCharges;
                    if (netProfit > 0) {
                        const holdingPeriod = document.getElementById('holdingPeriod').value;
                        const taxRate = taxRates[holdingPeriod];
                        const taxableAmount = holdingPeriod === 'long' ? Math.max(0, netProfit - 100000) : netProfit;
                        return (taxableAmount * taxRate) / 100;
                    }
                    return 0;
                })() : 0)}</span>
            </div>
        </div>
    `;

    document.getElementById('costBreakdown').innerHTML = costBreakdownHTML;
    document.getElementById('returnAnalysis').innerHTML = returnAnalysisHTML;
}

function generatePerformanceMetrics(grossProfitLoss, netProfitLoss, finalNetProfitLoss, grossReturnPercentage, netReturnPercentage) {
    const metricsHTML = `
        <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
            <div class="text-2xl font-bold text-green-600">${grossReturnPercentage >= 0 ? '+' : ''}${grossReturnPercentage.toFixed(2)}%</div>
            <div class="text-sm text-green-800 mt-1">Gross Return</div>
        </div>
        <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600">${netReturnPercentage >= 0 ? '+' : ''}${netReturnPercentage.toFixed(2)}%</div>
            <div class="text-sm text-blue-800 mt-1">Net Return</div>
        </div>
        <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
            <div class="text-2xl font-bold text-purple-600">${((netReturnPercentage - grossReturnPercentage) / grossReturnPercentage * 100).toFixed(1)}%</div>
            <div class="text-sm text-purple-800 mt-1">Charges Impact</div>
        </div>
        <div class="text-center p-4 bg-yellow-50 rounded-lg border border-yellow-200">
            <div class="text-2xl font-bold text-yellow-600">₹${formatCurrency(finalNetProfitLoss)}</div>
            <div class="text-sm text-yellow-800 mt-1">Final P&L</div>
        </div>
    `;

    document.getElementById('performanceMetrics').innerHTML = metricsHTML;
}

function formatCurrency(amount) {
    return Math.abs(amount).toLocaleString('en-IN', {
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
    document.getElementById('breakdownSection').classList.add('hidden');
    document.getElementById('metricsSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateStockProfitLoss();
});
</script>
@endsection