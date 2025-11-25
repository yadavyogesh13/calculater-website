@extends('layouts.app')

@section('title', 'RD Calculator - Calculate Recurring Deposit Returns & Maturity Value | CalculaterTools')

@section('meta-description', 'Free online Recurring Deposit calculator to calculate RD maturity amount, interest earned, and returns. Plan your monthly savings with RD investment calculator.')

@section('keywords', 'RD calculator, recurring deposit calculator, RD interest calculator, RD returns, maturity amount calculator, monthly savings, RD investment')

@section('canonical', url('/calculators/rd'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Recurring Deposit Calculator",
    "description": "Calculate returns on Recurring Deposits with quarterly compounding interest",
    "url": "{{ url('/calculators/rd') }}",
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
                    <li class="text-gray-500">RD Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Recurring Deposit Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your RD maturity value and interest earnings. Build wealth systematically with disciplined monthly savings through Recurring Deposits.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate RD Returns</h2>
                        <p class="text-gray-600 mb-6">Enter your RD details to calculate maturity amount and interest earned</p>
                        
                        <form id="rdCalculatorForm" class="space-y-6">
                            <!-- Monthly Deposit -->
                            <div>
                                <label for="monthlyDeposit" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Monthly Deposit Amount (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="monthlyDeposit" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 5000" 
                                        min="100" 
                                        step="100"
                                        value="5000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Minimum deposit: ₹100 per month</p>
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
                                <p class="text-sm text-gray-500 mt-1">Typically 5-8% for bank RDs</p>
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
                                            min="6" 
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
                                            <option value="months">Months</option>
                                            <option value="years" selected>Years</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">6 months to 10 years tenure</p>
                            </div>

                            <!-- RD Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    RD Type
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" onclick="setRdType('regular')" class="rd-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Regular RD</div>
                                    </button>
                                    <button type="button" onclick="setRdType('senior')" class="rd-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user-friends text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Senior Citizen</div>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Senior citizens get 0.25-0.50% higher rates</p>
                            </div>

                            <!-- Compounding Frequency -->
                            <div>
                                <label for="compoundingFrequency" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Compounding Frequency
                                </label>
                                <select 
                                    id="compoundingFrequency" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    <option value="quarterly" selected>Quarterly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                                <p class="text-sm text-gray-500 mt-1">Most banks compound RD interest quarterly</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateRD()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate RD Returns
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">RD Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-calendar-alt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your RD details</p>
                                <p class="text-sm">to see maturity amount</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Breakdown -->
            <div id="monthlyBreakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Monthly Contribution Growth</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Month</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Monthly Deposit</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Cumulative Deposit</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Interest Earned</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="monthlyBreakdownTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bank RD Rates Comparison -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Bank RD Rates Comparison</h2>
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
                                <td class="px-4 py-3 text-gray-700 font-semibold">Post Office RD</td>
                                <td class="px-4 py-3 text-right text-green-600">6.70%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.70%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.70%</td>
                                <td class="px-4 py-3 text-right text-green-600">6.70%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-sm text-gray-600 mt-3">* Rates are indicative and subject to change. Senior citizens get additional 0.25-0.50%</p>
            </div>

            <!-- RD Benefits & Features -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Choose Recurring Deposits?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-check text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Disciplined Savings</h3>
                        <p class="text-gray-600">RD instills financial discipline through fixed monthly contributions, helping you build savings systematically.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Capital Safety</h3>
                        <p class="text-gray-600">RDs offer guaranteed returns and are insured under DICGC up to ₹5 lakhs, ensuring complete capital protection.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hand-holding-usd text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Flexible Tenure</h3>
                        <p class="text-gray-600">Choose tenure from 6 months to 10 years with flexible monthly deposit amounts starting from just ₹100.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-university text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Loan Facility</h3>
                        <p class="text-gray-600">Get up to 90% loan against your RD balance at nominal interest rates for emergency fund requirements.</p>
                    </div>
                </div>

                <!-- RD vs FD Comparison -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Recurring Deposit (RD)</h4>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Regular monthly deposits</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Ideal for salaried individuals</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Builds savings discipline</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Lower minimum investment</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-600 mt-1 mr-3"></i>
                                <span>Lower overall returns than FD for same total amount</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Fixed Deposit (FD)</h4>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Lump sum one-time deposit</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Ideal for lump sum amounts</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Higher overall returns</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Tax-saver option available</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-600 mt-1 mr-3"></i>
                                <span>Requires larger initial capital</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- RD Calculation Formula -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">How RD Interest is Calculated</h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">RD Maturity Value Formula</h3>
                    <div class="text-sm text-gray-700 space-y-3">
                        <p><strong>Maturity Value = P × (1 + r/n)^(nt) + P × (1 + r/n)^(nt-1) + ... + P</strong></p>
                        <p>Where:</p>
                        <ul class="space-y-2 ml-4">
                            <li><strong>P</strong> = Monthly installment amount</li>
                            <li><strong>r</strong> = Annual interest rate (in decimal)</li>
                            <li><strong>n</strong> = Number of compounding periods per year</li>
                            <li><strong>t</strong> = Tenure in years</li>
                        </ul>
                        <p class="mt-4">For quarterly compounding (most common):</p>
                        <p><strong>Maturity Value = P × [((1 + r/4)^(4t) - 1) / (1 - (1 + r/4)^(-1/3))]</strong></p>
                    </div>
                </div>

                <!-- Example Calculation -->
                <div class="mt-6 bg-blue-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Example Calculation</h3>
                    <div class="text-sm text-gray-700">
                        <p><strong>Scenario:</strong> ₹5,000 monthly RD for 5 years at 7.5% interest compounded quarterly</p>
                        <div class="mt-3 space-y-2">
                            <div class="flex justify-between">
                                <span>Total Months:</span>
                                <span class="font-semibold">60 months</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total Investment:</span>
                                <span class="font-semibold">₹3,00,000</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Interest Earned:</span>
                                <span class="font-semibold text-green-600">₹67,479</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Maturity Amount:</span>
                                <span class="font-semibold text-green-600">₹3,67,479</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the minimum amount for RD?</h3>
                        <p class="text-gray-600">Most banks allow Recurring Deposits starting from ₹100 to ₹500 per month. Some banks may have higher minimum amounts. There's usually no upper limit for RD investments.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I withdraw RD before maturity?</h3>
                        <p class="text-gray-600">Yes, but premature withdrawal attracts penalty charges (usually 0.5-1% lower interest rate). Some banks may not allow partial withdrawals from RD accounts.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What happens if I miss an RD installment?</h3>
                        <p class="text-gray-600">Most banks provide a grace period of 1-2 months. If installments are missed beyond the grace period, the RD may be discontinued and converted to a fixed deposit with penalty charges.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are Recurring Deposits safe?</h3>
                        <p class="text-gray-600">Yes, RDs in scheduled commercial banks are safe as they're insured under DICGC up to ₹5 lakhs per depositor per bank. This includes both principal and interest amount.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is TDS applicable on RD interest?</h3>
                        <p class="text-gray-600">Yes, TDS at 10% is deducted if the total interest income from all RDs and FDs with the bank exceeds ₹40,000 (₹50,000 for senior citizens) in a financial year.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('fd.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-piggy-bank text-yellow-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">FD Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Fixed Deposits</p>
                    </a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let currentRdType = 'regular';

function setRdType(type) {
    currentRdType = type;
    
    // Update button styles
    document.querySelectorAll('.rd-type-btn').forEach(btn => {
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
    
    calculateRD();
}

function calculateRD() {
    // Get input values
    const monthlyDeposit = parseFloat(document.getElementById('monthlyDeposit').value);
    let interestRate = parseFloat(document.getElementById('interestRate').value);
    const tenureValue = parseFloat(document.getElementById('tenureValue').value);
    const tenureUnit = document.getElementById('tenureUnit').value;
    const compoundingFrequency = document.getElementById('compoundingFrequency').value;

    // Validation
    if (!monthlyDeposit || monthlyDeposit < 100) {
        showError('Please enter a valid monthly deposit (minimum ₹100)');
        return;
    }
    if (!interestRate || interestRate < 3 || interestRate > 15) {
        showError('Please enter a valid interest rate (3-15%)');
        return;
    }
    if (!tenureValue || tenureValue < 6) {
        showError('Please enter a valid tenure');
        return;
    }

    // Adjust interest rate for senior citizens
    if (currentRdType === 'senior') {
        interestRate += 0.5; // Additional 0.5% for senior citizens
    }

    // Convert tenure to months
    let totalMonths;
    if (tenureUnit === 'years') {
        totalMonths = tenureValue * 12;
    } else {
        totalMonths = tenureValue;
    }

    // Calculate RD returns
    const result = calculateRDReturns(monthlyDeposit, interestRate, totalMonths, compoundingFrequency);
    
    // Display results
    displayResults(result, monthlyDeposit, interestRate, totalMonths);
    generateMonthlyBreakdown(monthlyDeposit, interestRate, totalMonths, compoundingFrequency);
}

function calculateRDReturns(monthlyDeposit, annualRate, totalMonths, compoundingFrequency) {
    const monthlyRate = annualRate / 100 / 12;
    let maturityAmount = 0;
    let totalDeposit = monthlyDeposit * totalMonths;

    // Calculate compounding periods per year
    let n;
    switch (compoundingFrequency) {
        case 'monthly':
            n = 12;
            break;
        case 'quarterly':
            n = 4;
            break;
        case 'yearly':
            n = 1;
            break;
        default:
            n = 4; // Default quarterly
    }

    const periodicRate = annualRate / 100 / n;
    const totalPeriods = (totalMonths / 12) * n;

    // RD maturity formula for quarterly compounding
    if (compoundingFrequency === 'quarterly') {
        const quarters = totalMonths / 3;
        for (let i = 1; i <= quarters; i++) {
            const depositsInQuarter = monthlyDeposit * 3;
            const periodsRemaining = quarters - i + 1;
            maturityAmount += depositsInQuarter * Math.pow(1 + periodicRate, periodsRemaining);
        }
    } else {
        // Simplified calculation for other frequencies
        for (let month = 1; month <= totalMonths; month++) {
            const monthsRemaining = totalMonths - month + 1;
            const periodsRemaining = (monthsRemaining / 12) * n;
            maturityAmount += monthlyDeposit * Math.pow(1 + periodicRate, periodsRemaining);
        }
    }

    const totalInterest = maturityAmount - totalDeposit;
    const effectiveAnnualRate = (Math.pow(1 + periodicRate, n) - 1) * 100;

    return {
        maturityAmount: maturityAmount,
        totalDeposit: totalDeposit,
        totalInterest: totalInterest,
        effectiveAnnualRate: effectiveAnnualRate,
        totalMonths: totalMonths
    };
}

function displayResults(result, monthlyDeposit, interestRate, totalMonths) {
    const years = (totalMonths / 12).toFixed(1);
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(result.maturityAmount)}</div>
                    <div class="text-lg font-semibold text-gray-700">Maturity Amount</div>
                    <div class="text-sm text-gray-500 mt-1">After ${years} years at ${interestRate}% p.a.</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(result.totalDeposit)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Investment</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(result.totalInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">Interest Earned</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">${result.effectiveAnnualRate.toFixed(2)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Effective Yield</div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">RD Details</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Monthly Deposit:</span>
                        <span class="font-semibold">₹${formatCurrency(monthlyDeposit)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tenure:</span>
                        <span class="font-semibold">${totalMonths} months (${years} years)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Annual Interest Rate:</span>
                        <span class="font-semibold text-green-600">${interestRate}%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">RD Type:</span>
                        <span class="font-semibold">${currentRdType === 'senior' ? 'Senior Citizen' : 'Regular'}</span>
                    </div>
                </div>
            </div>

            <!-- Growth Comparison -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-chart-line text-purple-600 mt-1 mr-3"></i>
                    <div class="text-sm text-purple-800">
                        <strong>Wealth Creation:</strong> Your monthly investment of ₹${formatCurrency(monthlyDeposit)} grows to ₹${formatCurrency(result.maturityAmount)} in ${years} years, earning ₹${formatCurrency(result.totalInterest)} in interest.
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-gray-600 mt-1 mr-3"></i>
                    <div class="text-sm text-gray-600">
                        <strong>Note:</strong> Interest rates are indicative. Actual rates may vary by bank. Calculation assumes timely monthly deposits and quarterly compounding.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('monthlyBreakdownSection').classList.remove('hidden');
}

function generateMonthlyBreakdown(monthlyDeposit, annualRate, totalMonths, compoundingFrequency) {
    let tableHTML = '';
    let cumulativeDeposit = 0;
    let cumulativeInterest = 0;
    let totalAmount = 0;
    const monthlyRate = annualRate / 100 / 12;

    // Show only every 6 months to keep table manageable
    for (let month = 1; month <= totalMonths; month += 6) {
        if (month > totalMonths) month = totalMonths;
        
        cumulativeDeposit = monthlyDeposit * month;
        
        // Simplified interest calculation for display
        const approximateInterest = cumulativeDeposit * monthlyRate * month / 2;
        totalAmount = cumulativeDeposit + approximateInterest;
        cumulativeInterest = approximateInterest;

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">${month}</td>
                <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(monthlyDeposit)}</td>
                <td class="px-4 py-3 text-right font-semibold text-gray-900">₹${formatCurrency(cumulativeDeposit)}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(cumulativeInterest)}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(totalAmount)}</td>
            </tr>
        `;
    }

    document.getElementById('monthlyBreakdownTable').innerHTML = tableHTML;
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
    document.getElementById('monthlyBreakdownSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateRD();
});
</script>
@endsection