@extends('layouts.app')

@section('title', 'FD Calculator - Calculate Fixed Deposit Returns & Interest Rates | CalculaterTools')

@section('meta-description', 'Free online Fixed Deposit calculator to calculate FD returns, maturity amount, and interest earnings. Compare different FD tenures and interest rates for better investment decisions.')

@section('keywords', 'FD calculator, fixed deposit calculator, FD interest calculator, fixed deposit returns, maturity amount calculator, FD investment, bank FD calculator')

@section('canonical', url('/calculators/fd'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Fixed Deposit Calculator",
    "description": "Calculate returns on Fixed Deposits with compound interest and different payout options",
    "url": "{{ url('/calculators/fd') }}",
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
                    <li class="text-gray-500">FD Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Fixed Deposit Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your Fixed Deposit returns with accuracy. Plan your investments with different interest payout options and compare FD rates across tenures.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate FD Returns</h2>
                        <p class="text-gray-600 mb-6">Enter your FD details to calculate maturity amount and interest earned</p>
                        
                        <form id="fdCalculatorForm" class="space-y-6">
                            <!-- Deposit Amount -->
                            <div>
                                <label for="depositAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Deposit Amount (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="depositAmount" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 100000" 
                                        min="1000" 
                                        step="1000"
                                        value="100000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Minimum deposit: ₹1,000</p>
                            </div>

                            <!-- Interest Rate -->
                            <div>
                                <label for="interestRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Annual Interest Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="interestRate" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 7.5" 
                                        min="3" 
                                        max="15" 
                                        step="0.1"
                                        value="7.5"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Typically 3-9% for bank FDs</p>
                            </div>

                            <!-- Tenure -->
                            <div>
                                <label for="tenure" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Tenure
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <input 
                                            type="number" 
                                            id="tenureValue" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 5" 
                                            min="7" 
                                            max="10"
                                            value="5"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <select 
                                            id="tenureUnit" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                            <option value="days">Days</option>
                                            <option value="months">Months</option>
                                            <option value="years" selected>Years</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">7 days to 10 years tenure</p>
                            </div>

                            <!-- Interest Payout Frequency -->
                            <div>
                                <label for="payoutFrequency" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Interest Payout Frequency
                                </label>
                                <select 
                                    id="payoutFrequency" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    <option value="monthly">Monthly</option>
                                    <option value="quarterly">Quarterly</option>
                                    <option value="half-yearly">Half-Yearly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="at_maturity" selected>At Maturity (Cumulative)</option>
                                </select>
                                <p class="text-sm text-gray-500 mt-1">Choose how you want to receive interest</p>
                            </div>

                            <!-- FD Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    FD Type
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" onclick="setFdType('regular')" class="fd-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Regular FD</div>
                                    </button>
                                    <button type="button" onclick="setFdType('senior')" class="fd-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user-friends text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Senior Citizen</div>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Senior citizens get 0.25-0.50% higher rates</p>
                            </div>

                            <!-- Tax Status -->
                            <div>
                                <label for="taxStatus" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Tax Status
                                </label>
                                <select 
                                    id="taxStatus" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    <option value="with_tax" selected>Include TDS (10%)</option>
                                    <option value="without_tax">Exclude TDS</option>
                                    <option value="form15g">Form 15G/H (No TDS)</option>
                                </select>
                                <p class="text-sm text-gray-500 mt-1">TDS deducted if interest exceeds ₹40,000/₹50,000</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateFD()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate FD Returns
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">FD Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-piggy-bank text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your FD details</p>
                                <p class="text-sm">to see maturity amount</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Breakdown -->
            <div id="yearlyBreakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Yearly Growth</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Interest Earned</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Cumulative Interest</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="yearlyBreakdownTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bank FD Rates Comparison -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Bank FD Rates Comparison</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Bank</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">1 Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">2 Years</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">3 Years</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">5 Years</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">SBI</td>
                                <td class="px-4 py-3 text-right text-green-600">6.80%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.00%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.50%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.50%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">HDFC Bank</td>
                                <td class="px-4 py-3 text-right text-green-600">7.00%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.10%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.00%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.00%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">ICICI Bank</td>
                                <td class="px-4 py-3 text-right text-green-600">6.90%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.10%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.00%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.90%</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Axis Bank</td>
                                <td class="px-4 py-3 text-right text-green-600">7.10%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.25%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.10%</td>
                                <td class="px-4 py-3 text-right text-green-600">7.10%</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-700 font-semibold">Small Finance Banks</td>
                                <td class="px-4 py-3 text-right text-green-600">8.00-9.50%</td>
                                <td class="px-4 py-3 text-right text-green-600">8.25-9.75%</td>
                                <td class="px-4 py-3 text-right text-green-600">8.50-9.25%</td>
                                <td class="px-4 py-3 text-right text-green-600">8.00-9.00%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-sm text-gray-600 mt-3">* Rates are indicative and subject to change. Senior citizens get additional 0.25-0.50%</p>
            </div>

            <!-- FD Benefits & Features -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Invest in Fixed Deposits?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Capital Safety</h3>
                        <p class="text-gray-600">Fixed Deposits offer guaranteed returns and capital protection, making them one of the safest investment options.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Fixed Returns</h3>
                        <p class="text-gray-600">Lock in interest rates for the entire tenure, immune to market fluctuations and economic changes.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hand-holding-usd text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Flexible Payouts</h3>
                        <p class="text-gray-600">Choose monthly, quarterly, or cumulative interest payouts based on your income needs.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-university text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Loan Facility</h3>
                        <p class="text-gray-600">Get up to 90% loan against your FD at nominal interest rates for emergency fund requirements.</p>
                    </div>
                </div>

                <!-- Tax Benefits -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Tax Benefits of 5-Year Tax Saver FD</h4>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Deduction under Section 80C up to ₹1.5 lakhs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Lock-in period of 5 years</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>No loan facility available</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Premature withdrawal not allowed</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">TDS on Fixed Deposits</h4>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                                <span>TDS deducted at 10% if interest exceeds ₹40,000 (₹50,000 for senior citizens)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                                <span>Submit Form 15G/H if total income below taxable limit</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                                <span>Interest income taxable as 'Income from Other Sources'</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                                <span>No TDS on FDs with cumulative interest option</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the minimum amount for FD?</h3>
                        <p class="text-gray-600">Most banks allow Fixed Deposits starting from ₹1,000 to ₹10,000. Some banks may have higher minimum amounts for specific FD schemes. There's usually no upper limit for FD investments.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I withdraw FD before maturity?</h3>
                        <p class="text-gray-600">Yes, but premature withdrawal attracts penalty charges (usually 0.5-1% lower interest rate). Tax-saver FDs have a lock-in period of 5 years and don't allow premature withdrawal.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the difference between cumulative and non-cumulative FD?</h3>
                        <p class="text-gray-600">Cumulative FD pays interest at maturity (compounded), giving higher returns. Non-cumulative FD pays interest periodically (monthly/quarterly) providing regular income.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are Fixed Deposits safe?</h3>
                        <p class="text-gray-600">Yes, FDs in scheduled commercial banks are safe as they're insured under DICGC up to ₹5 lakhs per depositor per bank. This includes both principal and interest amount.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is FD interest calculated?</h3>
                        <p class="text-gray-600">FD interest is calculated using compound interest formula: A = P(1 + r/n)^(nt). For cumulative FDs, interest is compounded quarterly. For non-cumulative, simple interest is paid periodically.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('rd.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calendar-alt text-pink-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">RD Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Recurring Deposits</p>
                    </a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let currentFdType = 'regular';

function setFdType(type) {
    currentFdType = type;
    
    // Update button styles
    document.querySelectorAll('.fd-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    // Adjust interest rate for senior citizens
    const interestRateInput = document.getElementById('interestRate');
    let currentRate = parseFloat(interestRateInput.value);
    
    if (type === 'senior' && currentRate < 8) {
        interestRateInput.value = (currentRate + 0.5).toFixed(1);
    } else if (type === 'regular' && currentRate > 7.5) {
        interestRateInput.value = (currentRate - 0.5).toFixed(1);
    }
    
    calculateFD();
}

function calculateFD() {
    // Get input values
    const depositAmount = parseFloat(document.getElementById('depositAmount').value);
    let interestRate = parseFloat(document.getElementById('interestRate').value);
    const tenureValue = parseFloat(document.getElementById('tenureValue').value);
    const tenureUnit = document.getElementById('tenureUnit').value;
    const payoutFrequency = document.getElementById('payoutFrequency').value;
    const taxStatus = document.getElementById('taxStatus').value;

    // Validation
    if (!depositAmount || depositAmount < 1000) {
        showError('Please enter a valid deposit amount (minimum ₹1,000)');
        return;
    }
    if (!interestRate || interestRate < 3 || interestRate > 15) {
        showError('Please enter a valid interest rate (3-15%)');
        return;
    }
    if (!tenureValue || tenureValue < 7) {
        showError('Please enter a valid tenure');
        return;
    }

    // Adjust interest rate for senior citizens
    if (currentFdType === 'senior') {
        interestRate += 0.5; // Additional 0.5% for senior citizens
    }

    // Convert tenure to years
    let tenureInYears;
    switch (tenureUnit) {
        case 'days':
            tenureInYears = tenureValue / 365;
            break;
        case 'months':
            tenureInYears = tenureValue / 12;
            break;
        default:
            tenureInYears = tenureValue;
    }

    // Calculate FD returns
    const result = calculateFDReturns(depositAmount, interestRate, tenureInYears, payoutFrequency, taxStatus);
    
    // Display results
    displayResults(result, depositAmount, interestRate, tenureInYears);
    generateYearlyBreakdown(depositAmount, interestRate, tenureInYears, payoutFrequency);
}

function calculateFDReturns(principal, annualRate, years, payoutFrequency, taxStatus) {
    let maturityAmount, totalInterest, effectiveAnnualRate;
    const quarterlyRate = annualRate / 100 / 4;
    const quarters = years * 4;

    if (payoutFrequency === 'at_maturity') {
        // Cumulative FD - compound interest quarterly
        maturityAmount = principal * Math.pow(1 + quarterlyRate, quarters);
        totalInterest = maturityAmount - principal;
        effectiveAnnualRate = (Math.pow(1 + quarterlyRate, 4) - 1) * 100;
    } else {
        // Non-cumulative FD - simple interest
        let periodsPerYear;
        switch (payoutFrequency) {
            case 'monthly':
                periodsPerYear = 12;
                break;
            case 'quarterly':
                periodsPerYear = 4;
                break;
            case 'half-yearly':
                periodsPerYear = 2;
                break;
            case 'yearly':
                periodsPerYear = 1;
                break;
        }
        
        const periodicRate = annualRate / 100 / periodsPerYear;
        totalInterest = principal * periodicRate * periodsPerYear * years;
        maturityAmount = principal + totalInterest;
        effectiveAnnualRate = annualRate;
    }

    // Calculate TDS if applicable
    let tdsAmount = 0;
    let netInterest = totalInterest;
    
    if (taxStatus === 'with_tax' && totalInterest > 40000) {
        tdsAmount = totalInterest * 0.10; // 10% TDS
        netInterest = totalInterest - tdsAmount;
    }

    return {
        maturityAmount: maturityAmount,
        totalInterest: totalInterest,
        netInterest: netInterest,
        tdsAmount: tdsAmount,
        effectiveAnnualRate: effectiveAnnualRate,
        payoutFrequency: payoutFrequency
    };
}

function displayResults(result, depositAmount, interestRate, years) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(result.maturityAmount)}</div>
                    <div class="text-lg font-semibold text-gray-700">Maturity Amount</div>
                    <div class="text-sm text-gray-500 mt-1">After ${years.toFixed(1)} years at ${interestRate}% p.a.</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(depositAmount)}</div>
                    <div class="text-sm text-gray-600 mt-1">Principal Amount</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(result.totalInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Interest</div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">FD Details</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Interest Payout:</span>
                        <span class="font-semibold">${getPayoutFrequencyText(result.payoutFrequency)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Effective Annual Rate:</span>
                        <span class="font-semibold text-green-600">${result.effectiveAnnualRate.toFixed(2)}%</span>
                    </div>
                    ${result.tdsAmount > 0 ? `
                    <div class="flex justify-between">
                        <span class="text-gray-600">TDS Deducted:</span>
                        <span class="font-semibold text-red-600">₹${formatCurrency(result.tdsAmount)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Net Interest:</span>
                        <span class="font-semibold text-green-600">₹${formatCurrency(result.netInterest)}</span>
                    </div>
                    ` : ''}
                    <div class="flex justify-between">
                        <span class="text-gray-600">FD Type:</span>
                        <span class="font-semibold">${currentFdType === 'senior' ? 'Senior Citizen' : 'Regular'}</span>
                    </div>
                </div>
            </div>

            <!-- Interest Comparison -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-chart-line text-purple-600 mt-1 mr-3"></i>
                    <div class="text-sm text-purple-800">
                        <strong>Returns:</strong> Your investment of ₹${formatCurrency(depositAmount)} grows to ₹${formatCurrency(result.maturityAmount)} in ${years.toFixed(1)} years, earning ₹${formatCurrency(result.totalInterest)} in interest.
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-gray-600 mt-1 mr-3"></i>
                    <div class="text-sm text-gray-600">
                        <strong>Note:</strong> Interest rates are indicative. Actual rates may vary by bank. TDS calculation assumes interest exceeds ₹40,000 threshold.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('yearlyBreakdownSection').classList.remove('hidden');
}

function generateYearlyBreakdown(principal, annualRate, years, payoutFrequency) {
    let tableHTML = '';
    let currentAmount = principal;
    const quarterlyRate = annualRate / 100 / 4;

    for (let year = 1; year <= Math.ceil(years); year++) {
        let yearlyInterest = 0;
        
        if (payoutFrequency === 'at_maturity') {
            // Cumulative FD
            for (let quarter = 1; quarter <= 4; quarter++) {
                const quarterInterest = currentAmount * quarterlyRate;
                yearlyInterest += quarterInterest;
                currentAmount += quarterInterest;
            }
        } else {
            // Non-cumulative - simple interest per year
            yearlyInterest = principal * (annualRate / 100);
            currentAmount = principal + (yearlyInterest * year);
        }

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">${year}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(yearlyInterest)}</td>
                <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(yearlyInterest * year)}</td>
                <td class="px-4 py-3 text-right font-semibold text-gray-900">₹${formatCurrency(currentAmount)}</td>
            </tr>
        `;
    }

    document.getElementById('yearlyBreakdownTable').innerHTML = tableHTML;
}

function getPayoutFrequencyText(frequency) {
    const frequencyMap = {
        'monthly': 'Monthly',
        'quarterly': 'Quarterly',
        'half-yearly': 'Half-Yearly',
        'yearly': 'Yearly',
        'at_maturity': 'At Maturity (Cumulative)'
    };
    return frequencyMap[frequency] || frequency;
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
    document.getElementById('yearlyBreakdownSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateFD();
});
</script>
@endsection