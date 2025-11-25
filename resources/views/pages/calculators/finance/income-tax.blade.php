@extends('layouts.app')

@section('title', 'Income Tax Calculator India - Calculate Your Income Tax for FY 2024-25 | CalculaterTools')

@section('meta-description', 'Free online Income Tax Calculator for India. Calculate your income tax liability for FY 2024-25 with old and new tax regimes. Includes deductions, HRA, and tax-saving investments.')

@section('keywords', 'income tax calculator, tax calculator India, income tax calculation, tax saving, tax deductions, HRA calculator, tax regime, FY 2024-25')

@section('canonical', url('/calculators/income-tax'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Income Tax Calculator",
    "description": "Calculate income tax liability for India with old and new tax regimes",
    "url": "{{ url('/calculators/income-tax') }}",
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
                    <li class="text-gray-500">Income Tax Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Income Tax Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your income tax liability for FY 2024-25. Compare old vs new tax regimes and optimize your tax savings with deductions.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Income Tax</h2>
                        <p class="text-gray-600 mb-6">Enter your income details and deductions to calculate tax liability</p>
                        
                        <form id="incomeTaxForm" class="space-y-6">
                            <!-- Basic Information -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
                                
                                <!-- Age Group -->
                                <div class="mb-4">
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">Age Group</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        <button type="button" onclick="setAgeGroup('below60')" class="age-group-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">Below 60</div>
                                        </button>
                                        <button type="button" onclick="setAgeGroup('60to80')" class="age-group-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">60-80 Years</div>
                                        </button>
                                        <button type="button" onclick="setAgeGroup('above80')" class="age-group-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">Above 80</div>
                                        </button>
                                    </div>
                                </div>

                                <!-- Financial Year -->
                                <div class="mb-4">
                                    <label for="financialYear" class="block text-sm font-semibold text-gray-800 mb-2">Financial Year</label>
                                    <select 
                                        id="financialYear" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                        <option value="2024-25" selected>2024-25 (AY 2025-26)</option>
                                        <option value="2023-24">2023-24 (AY 2024-25)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Income Details -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Income Details</h3>
                                
                                <!-- Annual Income -->
                                <div class="mb-4">
                                    <label for="annualIncome" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Gross Annual Income (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="annualIncome" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 800000" 
                                            min="0" 
                                            step="1000"
                                            value="800000"
                                            required
                                        >
                                    </div>
                                </div>

                                <!-- HRA Exemption -->
                                <div class="mb-4">
                                    <label for="hraExemption" class="block text-sm font-semibold text-gray-800 mb-2">
                                        HRA Exemption (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="hraExemption" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 100000" 
                                            min="0" 
                                            step="1000"
                                            value="100000"
                                        >
                                    </div>
                                </div>

                                <!-- Other Exemptions -->
                                <div>
                                    <label for="otherExemptions" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Other Exemptions (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="otherExemptions" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 50000" 
                                            min="0" 
                                            step="1000"
                                            value="50000"
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Deductions (Old Regime) -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Deductions (Old Regime)</h3>
                                
                                <!-- Section 80C -->
                                <div class="mb-4">
                                    <label for="section80C" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Section 80C Investments (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="section80C" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 150000" 
                                            min="0" 
                                            max="150000"
                                            step="1000"
                                            value="150000"
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Max: ₹1,50,000 (EPF, PPF, ELSS, etc.)</p>
                                </div>

                                <!-- Section 80D -->
                                <div class="mb-4">
                                    <label for="section80D" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Section 80D - Health Insurance (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="section80D" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 25000" 
                                            min="0" 
                                            max="100000"
                                            step="1000"
                                            value="25000"
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Max: ₹25,000 (₹50,000 for senior citizens)</p>
                                </div>

                                <!-- NPS 80CCD -->
                                <div class="mb-4">
                                    <label for="npsInvestment" class="block text-sm font-semibold text-gray-800 mb-2">
                                        NPS - Section 80CCD(1B) (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="npsInvestment" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 50000" 
                                            min="0" 
                                            max="50000"
                                            step="1000"
                                            value="50000"
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Additional deduction up to ₹50,000</p>
                                </div>

                                <!-- Home Loan Interest -->
                                <div>
                                    <label for="homeLoanInterest" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Home Loan Interest - Section 24 (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="homeLoanInterest" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 200000" 
                                            min="0" 
                                            max="200000"
                                            step="1000"
                                            value="200000"
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Max: ₹2,00,000 for self-occupied property</p>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateIncomeTax()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Income Tax
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Tax Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-file-invoice-dollar text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your income details</p>
                                <p class="text-sm">to see tax calculation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tax Regime Comparison -->
            <div id="regimeComparisonSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Tax Regime Comparison</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="regimeComparison">
                </div>
            </div>

            <!-- Tax Slabs Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Income Tax Slabs FY 2024-25</h2>
                
                <!-- New Tax Regime -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-green-600 mb-4">New Tax Regime (Default)</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm border border-gray-200">
                            <thead class="bg-green-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Income Slab</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Tax Rate</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Tax Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">Up to ₹3,00,000</td>
                                    <td class="px-4 py-3 text-right text-green-600">0%</td>
                                    <td class="px-4 py-3 text-right font-semibold">Nil</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">₹3,00,001 - ₹7,00,000</td>
                                    <td class="px-4 py-3 text-right text-green-600">5%</td>
                                    <td class="px-4 py-3 text-right font-semibold">5% of income exceeding ₹3,00,000</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">₹7,00,001 - ₹10,00,000</td>
                                    <td class="px-4 py-3 text-right text-green-600">10%</td>
                                    <td class="px-4 py-3 text-right font-semibold">₹20,000 + 10% of income exceeding ₹7,00,000</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">₹10,00,001 - ₹12,00,000</td>
                                    <td class="px-4 py-3 text-right text-green-600">15%</td>
                                    <td class="px-4 py-3 text-right font-semibold">₹50,000 + 15% of income exceeding ₹10,00,000</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">₹12,00,001 - ₹15,00,000</td>
                                    <td class="px-4 py-3 text-right text-green-600">20%</td>
                                    <td class="px-4 py-3 text-right font-semibold">₹80,000 + 20% of income exceeding ₹12,00,000</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-gray-700">Above ₹15,00,000</td>
                                    <td class="px-4 py-3 text-right text-green-600">30%</td>
                                    <td class="px-4 py-3 text-right font-semibold">₹1,40,000 + 30% of income exceeding ₹15,00,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-600 mt-3">* Rebate under Section 87A available up to ₹7 Lakhs income</p>
                </div>

                <!-- Old Tax Regime -->
                <div>
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Old Tax Regime</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm border border-gray-200">
                            <thead class="bg-blue-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-700">Income Slab</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Tax Rate</th>
                                    <th class="px-4 py-3 text-right font-semibold text-gray-700">Tax Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">Up to ₹2,50,000</td>
                                    <td class="px-4 py-3 text-right text-blue-600">0%</td>
                                    <td class="px-4 py-3 text-right font-semibold">Nil</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">₹2,50,001 - ₹5,00,000</td>
                                    <td class="px-4 py-3 text-right text-blue-600">5%</td>
                                    <td class="px-4 py-3 text-right font-semibold">5% of income exceeding ₹2,50,000</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">₹5,00,001 - ₹10,00,000</td>
                                    <td class="px-4 py-3 text-right text-blue-600">20%</td>
                                    <td class="px-4 py-3 text-right font-semibold">₹12,500 + 20% of income exceeding ₹5,00,000</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-gray-700">Above ₹10,00,000</td>
                                    <td class="px-4 py-3 text-right text-blue-600">30%</td>
                                    <td class="px-4 py-3 text-right font-semibold">₹1,12,500 + 30% of income exceeding ₹10,00,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-600 mt-3">* Standard deduction of ₹50,000 available. Rebate under Section 87A available up to ₹5 Lakhs income</p>
                </div>
            </div>

            <!-- Tax Saving Tips -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tax Saving Strategies</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Section 80C</h3>
                        <p class="text-gray-600">Invest up to ₹1.5 Lakhs in ELSS, PPF, EPF, NSC, tax-saving FDs, and life insurance premiums.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heartbeat text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Health Insurance</h3>
                        <p class="text-gray-600">Claim up to ₹25,000 for self/family and ₹50,000 for senior citizens under Section 80D.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-home text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Home Loan Benefits</h3>
                        <p class="text-gray-600">Claim up to ₹2 Lakhs interest under Section 24 and principal repayment under Section 80C.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-retirement text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">NPS Investment</h3>
                        <p class="text-gray-600">Additional ₹50,000 deduction under Section 80CCD(1B) over and above Section 80C limit.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Which tax regime should I choose?</h3>
                        <p class="text-gray-600">Choose the new tax regime if you have minimal deductions and investments. Choose the old regime if you have significant investments (Section 80C, 80D, HRA, home loan interest, etc.) that can reduce your taxable income substantially.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the basic exemption limit?</h3>
                        <p class="text-gray-600">Under the new regime: ₹3,00,000 for all individuals. Under the old regime: ₹2,50,000 for individuals below 60 years, ₹3,00,000 for senior citizens (60-80 years), and ₹5,00,000 for super senior citizens (above 80 years).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is Section 87A rebate?</h3>
                        <p class="text-gray-600">Section 87A provides tax rebate for individuals with total income up to ₹7 lakhs under new regime (full tax rebate) and up to ₹5 lakhs under old regime (maximum rebate of ₹12,500).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I switch between tax regimes?</h3>
                        <p class="text-gray-600">Salaried individuals can switch between regimes each financial year. For business/profession income, once you choose a regime, you must continue with it unless you opt out under specified conditions.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the standard deduction?</h3>
                        <p class="text-gray-600">A flat deduction of ₹50,000 is available for salaried individuals under both old and new tax regimes from FY 2023-24 onwards.</p>
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
                    <a href="{{ route('emi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-credit-card text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Loan EMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate monthly loan installments</p>
                    </a>
                    <a href="{{ route('gst.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-receipt text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">GST Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate GST and tax amounts</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let currentAgeGroup = 'below60';

function setAgeGroup(ageGroup) {
    currentAgeGroup = ageGroup;
    
    // Update button styles
    document.querySelectorAll('.age-group-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    calculateIncomeTax();
}

function calculateIncomeTax() {
    // Get input values
    const annualIncome = parseFloat(document.getElementById('annualIncome').value);
    const hraExemption = parseFloat(document.getElementById('hraExemption').value) || 0;
    const otherExemptions = parseFloat(document.getElementById('otherExemptions').value) || 0;
    const section80C = parseFloat(document.getElementById('section80C').value) || 0;
    const section80D = parseFloat(document.getElementById('section80D').value) || 0;
    const npsInvestment = parseFloat(document.getElementById('npsInvestment').value) || 0;
    const homeLoanInterest = parseFloat(document.getElementById('homeLoanInterest').value) || 0;

    // Validation
    if (!annualIncome || annualIncome < 0) {
        showError('Please enter a valid annual income');
        return;
    }

    // Calculate tax for both regimes
    const newRegimeTax = calculateNewRegimeTax(annualIncome, hraExemption, otherExemptions);
    const oldRegimeTax = calculateOldRegimeTax(annualIncome, hraExemption, otherExemptions, section80C, section80D, npsInvestment, homeLoanInterest);

    // Display results
    displayResults(newRegimeTax, oldRegimeTax, annualIncome);
    displayRegimeComparison(newRegimeTax, oldRegimeTax);
}

function calculateNewRegimeTax(income, hraExemption, otherExemptions) {
    // Standard deduction for salaried individuals
    const standardDeduction = 50000;
    
    // Calculate taxable income
    let taxableIncome = income - hraExemption - otherExemptions - standardDeduction;
    taxableIncome = Math.max(0, taxableIncome);

    // New regime slabs for FY 2024-25
    let tax = 0;

    if (taxableIncome <= 300000) {
        tax = 0;
    } else if (taxableIncome <= 700000) {
        tax = (taxableIncome - 300000) * 0.05;
    } else if (taxableIncome <= 1000000) {
        tax = 20000 + (taxableIncome - 700000) * 0.10;
    } else if (taxableIncome <= 1200000) {
        tax = 50000 + (taxableIncome - 1000000) * 0.15;
    } else if (taxableIncome <= 1500000) {
        tax = 80000 + (taxableIncome - 1200000) * 0.20;
    } else {
        tax = 140000 + (taxableIncome - 1500000) * 0.30;
    }

    // Section 87A rebate for income up to 7 lakhs
    if (taxableIncome <= 700000) {
        tax = 0;
    }

    // Add cess
    const cess = tax * 0.04;
    const totalTax = tax + cess;

    return {
        taxableIncome: taxableIncome,
        tax: tax,
        cess: cess,
        totalTax: totalTax,
        effectiveRate: (totalTax / income) * 100
    };
}

function calculateOldRegimeTax(income, hraExemption, otherExemptions, section80C, section80D, npsInvestment, homeLoanInterest) {
    // Standard deduction for salaried individuals
    const standardDeduction = 50000;
    
    // Calculate total deductions
    const totalDeductions = Math.min(section80C, 150000) + 
                           Math.min(section80D, 25000) + 
                           Math.min(npsInvestment, 50000) + 
                           Math.min(homeLoanInterest, 200000);

    // Calculate taxable income
    let taxableIncome = income - hraExemption - otherExemptions - standardDeduction - totalDeductions;
    taxableIncome = Math.max(0, taxableIncome);

    // Set basic exemption based on age
    let basicExemption = 250000; // Below 60 years
    if (currentAgeGroup === '60to80') basicExemption = 300000;
    if (currentAgeGroup === 'above80') basicExemption = 500000;

    taxableIncome = Math.max(0, taxableIncome - basicExemption);

    // Old regime slabs
    let tax = 0;

    if (taxableIncome <= 0) {
        tax = 0;
    } else if (taxableIncome <= 250000) {
        tax = taxableIncome * 0.05;
    } else if (taxableIncome <= 1000000) {
        tax = 12500 + (taxableIncome - 250000) * 0.20;
    } else {
        tax = 112500 + (taxableIncome - 1000000) * 0.30;
    }

    // Section 87A rebate for income up to 5 lakhs
    if ((income - totalDeductions) <= 500000) {
        tax = Math.max(0, tax - 12500);
    }

    // Add cess
    const cess = tax * 0.04;
    const totalTax = tax + cess;

    return {
        taxableIncome: taxableIncome + basicExemption,
        tax: tax,
        cess: cess,
        totalTax: totalTax,
        effectiveRate: (totalTax / income) * 100,
        totalDeductions: totalDeductions
    };
}

function displayResults(newRegimeTax, oldRegimeTax, annualIncome) {
    const betterRegime = newRegimeTax.totalTax <= oldRegimeTax.totalTax ? 'new' : 'old';
    const savings = Math.abs(newRegimeTax.totalTax - oldRegimeTax.totalTax);

    const resultsHTML = `
        <div class="space-y-6">
            <!-- Recommendation -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center">
                    <div class="text-2xl font-bold ${betterRegime === 'new' ? 'text-green-600' : 'text-blue-600'} mb-2">
                        ${betterRegime === 'new' ? 'New Tax Regime Recommended' : 'Old Tax Regime Recommended'}
                    </div>
                    <div class="text-lg text-gray-700">You can save</div>
                    <div class="text-3xl font-bold text-green-600">₹${formatCurrency(savings)}</div>
                    <div class="text-sm text-gray-500 mt-1">annually in taxes</div>
                </div>
            </div>

            <!-- Quick Comparison -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(newRegimeTax.totalTax)}</div>
                    <div class="text-sm text-gray-600 mt-1">New Regime Tax</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">₹${formatCurrency(oldRegimeTax.totalTax)}</div>
                    <div class="text-sm text-gray-600 mt-1">Old Regime Tax</div>
                </div>
            </div>

            <!-- Effective Tax Rate -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Effective Tax Rates</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">New Regime:</span>
                        <span class="font-semibold text-green-600">${newRegimeTax.effectiveRate.toFixed(2)}%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Old Regime:</span>
                        <span class="font-semibold text-blue-600">${oldRegimeTax.effectiveRate.toFixed(2)}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: ${Math.min(newRegimeTax.effectiveRate, 100)}%"></div>
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Note:</strong> This calculation is for illustrative purposes. Actual tax liability may vary based on specific circumstances. Consult a tax advisor for accurate planning.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('regimeComparisonSection').classList.remove('hidden');
}

function displayRegimeComparison(newRegimeTax, oldRegimeTax) {
    const comparisonHTML = `
        <div class="border border-green-200 rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-check text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-bold text-green-600">New Tax Regime</h3>
            </div>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Taxable Income:</span>
                    <span class="font-semibold">₹${formatCurrency(newRegimeTax.taxableIncome)}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Income Tax:</span>
                    <span class="font-semibold">₹${formatCurrency(newRegimeTax.tax)}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Cess (4%):</span>
                    <span class="font-semibold">₹${formatCurrency(newRegimeTax.cess)}</span>
                </div>
                <div class="border-t pt-2 mt-2">
                    <div class="flex justify-between font-semibold text-green-600">
                        <span>Total Tax:</span>
                        <span>₹${formatCurrency(newRegimeTax.totalTax)}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-blue-200 rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-file-invoice text-white text-lg"></i>
                </div>
                <h3 class="text-xl font-bold text-blue-600">Old Tax Regime</h3>
            </div>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Taxable Income:</span>
                    <span class="font-semibold">₹${formatCurrency(oldRegimeTax.taxableIncome)}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Deductions Claimed:</span>
                    <span class="font-semibold">₹${formatCurrency(oldRegimeTax.totalDeductions || 0)}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Income Tax:</span>
                    <span class="font-semibold">₹${formatCurrency(oldRegimeTax.tax)}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Cess (4%):</span>
                    <span class="font-semibold">₹${formatCurrency(oldRegimeTax.cess)}</span>
                </div>
                <div class="border-t pt-2 mt-2">
                    <div class="flex justify-between font-semibold text-blue-600">
                        <span>Total Tax:</span>
                        <span>₹${formatCurrency(oldRegimeTax.totalTax)}</span>
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('regimeComparison').innerHTML = comparisonHTML;
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
    document.getElementById('regimeComparisonSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateIncomeTax();
});
</script>
@endsection