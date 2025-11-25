@extends('layouts.app')

@section('title', 'SIP Calculator - Calculate Mutual Fund Returns Online | CalculaterTools')

@section('meta-description', 'Free online SIP calculator to estimate returns on your Systematic Investment Plan. Calculate mutual fund returns with compound interest. Plan your financial goals with accurate projections.')

@section('keywords', 'SIP calculator, mutual fund calculator, systematic investment plan, investment returns, financial planning, mutual fund returns, SIP returns, investment calculator')

@section('canonical', url('/calculators/sip'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "SIP Calculator",
    "description": "Calculate returns on Systematic Investment Plans with compound interest",
    "url": "{{ url('/calculators/sip') }}",
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
                    <li class="text-gray-500">SIP Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">SIP Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate potential returns on your Systematic Investment Plan (SIP) with our advanced mutual fund calculator. Plan your financial future with accurate projections.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your SIP Returns</h2>
                        <p class="text-gray-600 mb-6">Enter your investment details to get accurate return projections</p>
                        
                        <form id="sipCalculatorForm" class="space-y-6">
                            <!-- Monthly Investment -->
                            <div>
                                <label for="monthlyInvestment" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Monthly Investment Amount (₹)
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
                                <p class="text-sm text-gray-500 mt-1">Minimum: ₹500</p>
                            </div>

                            <!-- Expected Return -->
                            <div>
                                <label for="annualReturn" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Expected Annual Return Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="annualReturn" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 12" 
                                        min="1" 
                                        max="30" 
                                        step="0.1"
                                        value="12"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Typically 10-15% for equity mutual funds</p>
                            </div>

                            <!-- Investment Period -->
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
                                <p class="text-sm text-gray-500 mt-1">Longer periods benefit from compounding</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateSIP()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate SIP Returns
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
                                <p class="text-lg font-medium">Enter your investment details</p>
                                <p class="text-sm">to see projected returns</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Use SIP for Investment?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Rupee Cost Averaging</h3>
                        <p class="text-gray-600">Buy more units when prices are low and fewer units when prices are high, averaging your purchase cost.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-check text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Financial Discipline</h3>
                        <p class="text-gray-600">Regular monthly investments help build wealth systematically and develop financial discipline.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-snowflake text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Power of Compounding</h3>
                        <p class="text-gray-600">Earn returns on your returns over the long term, accelerating wealth creation exponentially.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Risk Mitigation</h3>
                        <p class="text-gray-600">Reduces impact of market volatility and timing risks through systematic investment approach.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a SIP Calculator?</h3>
                        <p class="text-gray-600">A SIP calculator is an online tool that helps investors estimate potential returns from their Systematic Investment Plan investments in mutual funds. It uses compound interest formula to project future value based on monthly investment amount, expected returns, and investment duration.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does SIP calculation work?</h3>
                        <p class="text-gray-600">SIP calculation uses the future value of annuity formula: FV = P × [((1 + r)^n - 1) / r] × (1 + r), where P is monthly investment, r is monthly return rate, and n is total number of months. This accounts for compounding effect on regular investments.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a good SIP return rate?</h3>
                        <p class="text-gray-600">For equity mutual funds, historical returns typically range between 10-15% annually. Debt funds may offer 6-8%, while hybrid funds fall in between. Actual returns depend on market conditions and fund performance.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is SIP better than lump sum investment?</h3>
                        <p class="text-gray-600">SIP is generally better for most investors as it reduces market timing risk through rupee cost averaging. Lump sum can yield higher returns in rising markets but carries higher risk if markets decline after investment.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I change my SIP amount later?</h3>
                        <p class="text-gray-600">Yes, most mutual funds allow you to increase, decrease, or stop your SIP anytime. Some funds may have minimum lock-in periods or require advance notice for changes.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('compound.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on one-time investments with compound interest</p>
                    </a>
                    <a href="{{ route('emi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-credit-card text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">EMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate monthly installments for loans and mortgages</p>
                    </a>
                    <a href="{{ route('retirement.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-umbrella-beach text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Retirement Calculator</h3>
                        <p class="text-gray-600 text-sm">Plan your retirement corpus and monthly savings needed</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function calculateSIP() {
    // Get input values
    const monthlyInvestment = parseFloat(document.getElementById('monthlyInvestment').value);
    const annualReturn = parseFloat(document.getElementById('annualReturn').value);
    const investmentPeriod = parseFloat(document.getElementById('investmentPeriod').value);

    // Validation
    if (!monthlyInvestment || monthlyInvestment < 500) {
        showError('Please enter a valid monthly investment (minimum ₹500)');
        return;
    }
    if (!annualReturn || annualReturn < 1 || annualReturn > 30) {
        showError('Please enter a valid annual return rate (1% to 30%)');
        return;
    }
    if (!investmentPeriod || investmentPeriod < 1 || investmentPeriod > 30) {
        showError('Please enter a valid investment period (1 to 30 years)');
        return;
    }

    // Calculate SIP returns
    const monthlyRate = annualReturn / 100 / 12;
    const months = investmentPeriod * 12;
    
    // Future Value of SIP formula
    const futureValue = monthlyInvestment * ((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate);
    const totalInvestment = monthlyInvestment * months;
    const wealthGained = futureValue - totalInvestment;
    const absoluteReturn = (wealthGained / totalInvestment) * 100;

    // Display results
    displayResults(futureValue, totalInvestment, wealthGained, absoluteReturn, investmentPeriod);
}

function displayResults(futureValue, totalInvestment, wealthGained, absoluteReturn, years) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(futureValue)}</div>
                    <div class="text-lg font-semibold text-gray-700">Estimated Future Value</div>
                    <div class="text-sm text-gray-500 mt-1">After ${years} years</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(totalInvestment)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Invested</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(wealthGained)}</div>
                    <div class="text-sm text-gray-600 mt-1">Wealth Gained</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">${absoluteReturn.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Absolute Return</div>
                </div>
            </div>

            <!-- Yearly Breakdown -->
            <div class="border-t pt-4">
                <h4 class="font-semibold text-gray-900 mb-3">Yearly Projection</h4>
                <div class="space-y-2 max-h-40 overflow-y-auto">
                    ${generateYearlyBreakdown()}
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Note:</strong> Returns are projections based on entered rate. Actual returns may vary due to market conditions. Past performance doesn't guarantee future results.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
}

function generateYearlyBreakdown() {
    const monthlyInvestment = parseFloat(document.getElementById('monthlyInvestment').value);
    const annualReturn = parseFloat(document.getElementById('annualReturn').value);
    const investmentPeriod = parseFloat(document.getElementById('investmentPeriod').value);
    let html = '';
    let currentValue = 0;

    for (let year = 1; year <= investmentPeriod; year++) {
        for (let month = 1; month <= 12; month++) {
            const monthlyRate = annualReturn / 100 / 12;
            currentValue = (currentValue + monthlyInvestment) * (1 + monthlyRate);
        }
        html += `
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-600">Year ${year}</span>
                <span class="font-semibold text-gray-900">₹${formatCurrency(currentValue)}</span>
            </div>
        `;
    }
    return html;
}

function formatCurrency(amount) {
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
}

// Initialize with example calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateSIP();
});
</script>
@endsection