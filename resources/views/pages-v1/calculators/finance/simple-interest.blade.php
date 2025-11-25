@extends('layouts.app')

@section('title', 'Simple Interest Calculator - Calculate Basic Interest Returns | CalculaterTools')

@section('meta-description', 'Free online simple interest calculator to calculate returns on investments with simple interest only. Easy to use calculator for loans and investments.')

@section('keywords', 'simple interest calculator, interest calculator, basic interest calculator, loan interest calculator, investment calculator, financial calculator')

@section('canonical', url('/calculators/simple-interest'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Simple Interest Calculator",
    "description": "Calculate returns on investments and loans using simple interest formula",
    "url": "{{ url('/calculators/simple-interest') }}",
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
                    <li class="text-gray-500">Simple Interest Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Simple Interest Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate returns on investments and loans using simple interest. Perfect for short-term investments, personal loans, and basic financial planning.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Simple Interest</h2>
                        <p class="text-gray-600 mb-6">Enter your investment or loan details to calculate simple interest returns</p>
                        
                        <form id="simpleInterestForm" class="space-y-6">
                            <!-- Principal Amount -->
                            <div>
                                <label for="principalAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Principal Amount (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="principalAmount" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 100000" 
                                        min="1000" 
                                        step="1000"
                                        value="100000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Initial investment or loan amount</p>
                            </div>

                            <!-- Annual Interest Rate -->
                            <div>
                                <label for="annualInterestRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Annual Interest Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="annualInterestRate" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 8" 
                                        min="0.1" 
                                        max="30" 
                                        step="0.1"
                                        value="8"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Annual interest rate for investment or loan</p>
                            </div>

                            <!-- Time Period -->
                            <div>
                                <label for="timePeriod" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Time Period
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <input 
                                            type="number" 
                                            id="timeValue" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 5" 
                                            min="1" 
                                            max="50"
                                            value="5"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <select 
                                            id="timeUnit" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                            <option value="years">Years</option>
                                            <option value="months">Months</option>
                                            <option value="days">Days</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Investment or loan duration</p>
                            </div>

                            <!-- Calculation Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Calculation Type
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" onclick="setCalculationType('investment')" class="calculation-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-chart-line text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Investment</div>
                                    </button>
                                    <button type="button" onclick="setCalculationType('loan')" class="calculation-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-credit-card text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Loan</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateSimpleInterest()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Simple Interest
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
                                <i class="fas fa-calculator text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see interest calculation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Breakdown -->
            <div id="yearlyBreakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Yearly Breakdown</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Interest Earned</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Total Interest</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="yearlyBreakdownTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Comparison Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Simple Interest vs Compound Interest</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-green-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-calculator text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Simple Interest</h3>
                        </div>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Interest calculated only on principal amount</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Linear growth over time</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Easy to calculate and understand</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Common for short-term loans</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Formula: SI = P × R × T</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-blue-50 rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-chart-line text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Compound Interest</h3>
                        </div>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Interest calculated on principal + accumulated interest</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Exponential growth over time</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>More complex calculation</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Common for long-term investments</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-blue-600 mt-1 mr-3"></i>
                                <span>Formula: A = P(1 + r/n)^(nt)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Quick Comparison Calculator -->
                <div class="mt-8 bg-gray-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 text-center">Quick Comparison: ₹1,00,000 at 8% for 10 years</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600 mb-2">₹1,80,000</div>
                            <div class="text-sm text-gray-600">Simple Interest Total</div>
                            <div class="text-xs text-gray-500">(₹80,000 interest earned)</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600 mb-2">₹2,15,892</div>
                            <div class="text-sm text-gray-600">Compound Interest Total</div>
                            <div class="text-xs text-gray-500">(₹1,15,892 interest earned)</div>
                        </div>
                    </div>
                    <div class="mt-4 text-center text-sm text-gray-600">
                        Compound interest earns <strong class="text-blue-600">₹35,892 more</strong> over 10 years!
                    </div>
                </div>
            </div>

            <!-- Applications Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Where is Simple Interest Used?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Personal Loans</h3>
                        <p class="text-gray-600">Short-term personal loans often use simple interest for easy calculation and transparency.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-car text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Auto Loans</h3>
                        <p class="text-gray-600">Car loans typically use simple interest with fixed monthly payments.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-home text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Short-term Deposits</h3>
                        <p class="text-gray-600">Fixed deposits with tenure less than 1 year often use simple interest.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hand-holding-usd text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Informal Lending</h3>
                        <p class="text-gray-600">Friends and family loans commonly use simple interest for simplicity.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is simple interest?</h3>
                        <p class="text-gray-600">Simple interest is a quick method of calculating the interest charge on a loan or investment. It's calculated only on the principal amount and doesn't take into account any accumulated interest from previous periods.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is simple interest calculated?</h3>
                        <p class="text-gray-600">Simple interest is calculated using the formula: SI = P × R × T, where P is the principal amount, R is the annual interest rate (in decimal), and T is the time period in years.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I use simple interest?</h3>
                        <p class="text-gray-600">Simple interest is best for short-term loans and investments (usually less than 1 year). It's simpler to calculate and understand, making it ideal for personal loans, auto loans, and short-term deposits.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between simple and compound interest?</h3>
                        <p class="text-gray-600">Simple interest is calculated only on the principal amount, while compound interest is calculated on both the principal and accumulated interest. Compound interest yields higher returns over long periods.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I convert between time units?</h3>
                        <p class="text-gray-600">Yes! For simple interest calculations: 1 year = 12 months = 365 days. Our calculator automatically handles these conversions for accurate results.</p>
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
                        <p class="text-gray-600 text-sm">Calculate returns with compound interest</p>
                    </a>
                    <a href="{{ route('sip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">SIP Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Systematic Investment Plans</p>
                    </a>
                    <a href="{{ route('emi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-credit-card text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Loan EMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate monthly loan installments</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let calculationType = 'investment';

function setCalculationType(type) {
    calculationType = type;
    
    // Update button styles
    document.querySelectorAll('.calculation-type-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-red-500', 'bg-red-50', 'ring-2', 'ring-green-300', 'ring-red-300');
    });
    
    if (type === 'investment') {
        event.target.classList.add('border-green-500', 'bg-green-50', 'ring-2', 'ring-green-300');
        document.getElementById('resultsTitle').textContent = 'Investment Summary';
    } else {
        event.target.classList.add('border-red-500', 'bg-red-50', 'ring-2', 'ring-red-300');
        document.getElementById('resultsTitle').textContent = 'Loan Summary';
    }
    
    calculateSimpleInterest();
}

function calculateSimpleInterest() {
    // Get input values
    const principal = parseFloat(document.getElementById('principalAmount').value);
    const annualRate = parseFloat(document.getElementById('annualInterestRate').value);
    const timeValue = parseFloat(document.getElementById('timeValue').value);
    const timeUnit = document.getElementById('timeUnit').value;

    // Validation
    if (!principal || principal < 1000) {
        showError('Please enter a valid principal amount (minimum ₹1,000)');
        return;
    }
    if (!annualRate || annualRate < 0.1 || annualRate > 30) {
        showError('Please enter a valid interest rate (0.1% to 30%)');
        return;
    }
    if (!timeValue || timeValue < 1) {
        showError('Please enter a valid time period');
        return;
    }

    // Convert time to years based on unit
    let timeInYears;
    switch (timeUnit) {
        case 'months':
            timeInYears = timeValue / 12;
            break;
        case 'days':
            timeInYears = timeValue / 365;
            break;
        default:
            timeInYears = timeValue;
    }

    // Calculate simple interest
    const simpleInterest = (principal * annualRate * timeInYears) / 100;
    const totalAmount = principal + simpleInterest;

    // Display results
    displayResults(principal, simpleInterest, totalAmount, annualRate, timeInYears, timeValue, timeUnit);
    
    // Generate yearly breakdown
    generateYearlyBreakdown(principal, annualRate, timeInYears, simpleInterest, totalAmount);
}

function displayResults(principal, simpleInterest, totalAmount, rate, years, timeValue, timeUnit) {
    const timeDisplay = timeValue + ' ' + timeUnit;
    const isLoan = calculationType === 'loan';
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r ${isLoan ? 'from-red-50 to-orange-50' : 'from-blue-50 to-green-50'} rounded-xl p-6 border ${isLoan ? 'border-red-200' : 'border-blue-200'}">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold ${isLoan ? 'text-red-600' : 'text-green-600'} mb-2">₹${formatCurrency(totalAmount)}</div>
                    <div class="text-lg font-semibold text-gray-700">${isLoan ? 'Total Repayment' : 'Future Value'}</div>
                    <div class="text-sm text-gray-500 mt-1">After ${timeDisplay} at ${rate}% p.a.</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(principal)}</div>
                    <div class="text-sm text-gray-600 mt-1">${isLoan ? 'Loan Amount' : 'Principal'}</div>
                </div>
                <div class="${isLoan ? 'bg-red-50' : 'bg-green-50'} rounded-lg p-4 text-center">
                    <div class="text-xl font-bold ${isLoan ? 'text-red-600' : 'text-green-600'}">₹${formatCurrency(simpleInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">${isLoan ? 'Total Interest' : 'Interest Earned'}</div>
                </div>
            </div>

            <!-- Formula Display -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Simple Interest Formula</h4>
                <div class="text-sm text-gray-600 space-y-2">
                    <div class="flex justify-between">
                        <span>Principal (P):</span>
                        <span class="font-semibold">₹${formatCurrency(principal)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Rate (R):</span>
                        <span class="font-semibold">${rate}% per annum</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Time (T):</span>
                        <span class="font-semibold">${timeDisplay}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span>SI = P × R × T / 100</span>
                            <span>₹${formatCurrency(simpleInterest)}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Note:</strong> ${isLoan ? 'This calculation doesn\'t include processing fees or other charges. Actual loan terms may vary.' : 'Returns are projections. Actual returns may vary based on investment performance.'}
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('yearlyBreakdownSection').classList.remove('hidden');
}

function generateYearlyBreakdown(principal, annualRate, years, totalInterest, totalAmount) {
    let tableHTML = '';
    const yearlyInterest = totalInterest / years;
    let accumulatedInterest = 0;

    for (let year = 1; year <= Math.ceil(years); year++) {
        const interestThisYear = year <= years ? yearlyInterest : 0;
        accumulatedInterest += interestThisYear;
        const totalThisYear = principal + accumulatedInterest;

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">${year}</td>
                <td class="px-4 py-3 text-right font-semibold ${calculationType === 'loan' ? 'text-red-600' : 'text-green-600'}">₹${formatCurrency(interestThisYear)}</td>
                <td class="px-4 py-3 text-right font-semibold ${calculationType === 'loan' ? 'text-red-600' : 'text-green-600'}">₹${formatCurrency(accumulatedInterest)}</td>
                <td class="px-4 py-3 text-right font-semibold text-gray-900">₹${formatCurrency(totalThisYear)}</td>
            </tr>
        `;
    }

    document.getElementById('yearlyBreakdownTable').innerHTML = tableHTML;
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
    calculateSimpleInterest();
});
</script>
@endsection