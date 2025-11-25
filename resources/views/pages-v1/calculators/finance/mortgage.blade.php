@extends('layouts.app')

@section('title', 'Mortgage Calculator - Calculate Monthly Home Loan Payments | CalculaterTools')

@section('meta-description', 'Free mortgage calculator to estimate monthly home loan payments with principal, interest, taxes, and insurance. Calculate amortization schedule and total loan cost.')

@section('keywords', 'mortgage calculator, home loan calculator, monthly mortgage payment, mortgage amortization, home loan EMI, housing loan calculator')

@section('canonical', url('/calculators/mortgage'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Mortgage Calculator",
    "description": "Calculate monthly mortgage payments including principal, interest, taxes, and insurance with detailed amortization schedule",
    "url": "{{ url('/calculators/mortgage') }}",
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
                    <li class="text-gray-500">Mortgage Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Mortgage Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your monthly mortgage payment including principal, interest, property taxes, and home insurance. Plan your home purchase with accurate payment estimates.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Mortgage Payment</h2>
                        <p class="text-gray-600 mb-6">Enter your home loan details to calculate monthly payment and total cost</p>
                        
                        <form id="mortgageCalculatorForm" class="space-y-6">
                            <!-- Home Price -->
                            <div>
                                <label for="homePrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Home Price (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="homePrice" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 5000000" 
                                        min="100000" 
                                        step="100000"
                                        value="5000000"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Down Payment -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label for="downPayment" class="block text-sm font-semibold text-gray-800">
                                        Down Payment (₹)
                                    </label>
                                    <span id="downPaymentPercent" class="text-sm text-gray-500">20%</span>
                                </div>
                                <div class="relative mb-2">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="downPayment" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 1000000" 
                                        min="0" 
                                        step="50000"
                                        value="1000000"
                                        required
                                    >
                                </div>
                                <input 
                                    type="range" 
                                    id="downPaymentSlider" 
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                    min="0" 
                                    max="100" 
                                    value="20"
                                >
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>0%</span>
                                    <span>50%</span>
                                    <span>100%</span>
                                </div>
                            </div>

                            <!-- Loan Amount (Auto-calculated) -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-semibold text-gray-800">Loan Amount</span>
                                    <span id="loanAmountDisplay" class="text-lg font-bold text-blue-600">₹40,00,000</span>
                                </div>
                            </div>

                            <!-- Interest Rate -->
                            <div>
                                <label for="interestRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Interest Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="interestRate" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 7.5" 
                                        min="1" 
                                        max="20" 
                                        step="0.1"
                                        value="7.5"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Current home loan rates: 7-9%</p>
                            </div>

                            <!-- Loan Term -->
                            <div>
                                <label for="loanTerm" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Loan Term (Years)
                                </label>
                                <select 
                                    id="loanTerm" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    <option value="10">10 Years</option>
                                    <option value="15">15 Years</option>
                                    <option value="20" selected>20 Years</option>
                                    <option value="25">25 Years</option>
                                    <option value="30">30 Years</option>
                                </select>
                            </div>

                            <!-- Additional Costs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="propertyTax" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Annual Property Tax (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="propertyTax" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 25000" 
                                            min="0" 
                                            value="25000"
                                        >
                                    </div>
                                </div>
                                <div>
                                    <label for="homeInsurance" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Annual Home Insurance (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="homeInsurance" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 15000" 
                                            min="0" 
                                            value="15000"
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- PMI -->
                            <div id="pmiSection" class="hidden">
                                <label for="pmi" class="block text-sm font-semibold text-gray-800 mb-2">
                                    PMI (Private Mortgage Insurance) %
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="pmi" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 0.5" 
                                        min="0" 
                                        max="2" 
                                        step="0.1"
                                        value="0.5"
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Typically required for down payments less than 20%</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateMortgage()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Mortgage
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Mortgage Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-home text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your mortgage details</p>
                                <p class="text-sm">to see payment calculation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Amortization Schedule -->
            <div id="amortizationSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Amortization Schedule</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Principal Paid</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Interest Paid</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Remaining Balance</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Equity Built</th>
                            </tr>
                        </thead>
                        <tbody id="amortizationTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Use Mortgage Calculator?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search-dollar text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Budget Planning</h3>
                        <p class="text-gray-600">Determine affordable home price range based on your monthly budget and down payment capability.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Loan Comparison</h3>
                        <p class="text-gray-600">Compare different loan terms and interest rates to find the most suitable mortgage option.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Equity Tracking</h3>
                        <p class="text-gray-600">Understand how your equity builds over time and plan for future financial decisions.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-invoice-dollar text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Tax Benefits</h3>
                        <p class="text-gray-600">Estimate potential tax deductions on mortgage interest payments.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Mortgage FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is included in a mortgage payment?</h3>
                        <p class="text-gray-600">A typical mortgage payment includes Principal (loan amount repayment), Interest (cost of borrowing), Taxes (property taxes), and Insurance (home insurance). This is often referred to as PITI.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is PMI and when is it required?</h3>
                        <p class="text-gray-600">Private Mortgage Insurance (PMI) is required when your down payment is less than 20% of the home price. It protects the lender in case of default and typically costs 0.5-1% of the loan amount annually.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does down payment affect my mortgage?</h3>
                        <p class="text-gray-600">A larger down payment reduces your loan amount, monthly payments, and total interest paid. It can also help you avoid PMI and get better interest rates.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is amortization?</h3>
                        <p class="text-gray-600">Amortization is the process of paying off your mortgage through regular payments over time. Initially, most of your payment goes toward interest, but over time, more goes toward reducing the principal.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I choose a 15-year or 30-year mortgage?</h3>
                        <p class="text-gray-600">A 15-year mortgage has higher monthly payments but much less total interest. A 30-year mortgage offers lower monthly payments but more total interest. Choose based on your budget and financial goals.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('emi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calculator text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Loan EMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate EMIs for personal, car, and education loans</p>
                    </a>
                    {{-- <a href="{{ route('refinance.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-sync-alt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Refinance Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate savings from mortgage refinancing</p>
                    </a>
                    <a href="{{ route('affordability.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-house-user text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Home Affordability</h3>
                        <p class="text-gray-600 text-sm">Calculate how much house you can afford</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Update down payment and loan amount in real-time
function updateDownPayment() {
    const homePrice = parseFloat(document.getElementById('homePrice').value) || 0;
    const downPaymentPercent = parseInt(document.getElementById('downPaymentSlider').value);
    const downPaymentAmount = (homePrice * downPaymentPercent / 100);
    const loanAmount = homePrice - downPaymentAmount;
    
    document.getElementById('downPayment').value = Math.round(downPaymentAmount);
    document.getElementById('downPaymentPercent').textContent = downPaymentPercent + '%';
    document.getElementById('loanAmountDisplay').textContent = '₹' + formatCurrency(loanAmount);
    
    // Show/hide PMI section
    const pmiSection = document.getElementById('pmiSection');
    if (downPaymentPercent < 20) {
        pmiSection.classList.remove('hidden');
    } else {
        pmiSection.classList.add('hidden');
    }
}

// Sync down payment inputs
document.getElementById('homePrice').addEventListener('input', updateDownPayment);
document.getElementById('downPaymentSlider').addEventListener('input', updateDownPayment);
document.getElementById('downPayment').addEventListener('input', function() {
    const homePrice = parseFloat(document.getElementById('homePrice').value) || 0;
    const downPaymentAmount = parseFloat(this.value) || 0;
    const downPaymentPercent = Math.min(100, Math.round((downPaymentAmount / homePrice) * 100));
    
    document.getElementById('downPaymentSlider').value = downPaymentPercent;
    document.getElementById('downPaymentPercent').textContent = downPaymentPercent + '%';
    
    const loanAmount = homePrice - downPaymentAmount;
    document.getElementById('loanAmountDisplay').textContent = '₹' + formatCurrency(loanAmount);
    
    // Show/hide PMI section
    const pmiSection = document.getElementById('pmiSection');
    if (downPaymentPercent < 20) {
        pmiSection.classList.remove('hidden');
    } else {
        pmiSection.classList.add('hidden');
    }
});

function calculateMortgage() {
    // Get input values
    const homePrice = parseFloat(document.getElementById('homePrice').value);
    const downPayment = parseFloat(document.getElementById('downPayment').value);
    const interestRate = parseFloat(document.getElementById('interestRate').value);
    const loanTerm = parseInt(document.getElementById('loanTerm').value);
    const propertyTax = parseFloat(document.getElementById('propertyTax').value) || 0;
    const homeInsurance = parseFloat(document.getElementById('homeInsurance').value) || 0;
    const pmi = parseFloat(document.getElementById('pmi').value) || 0;

    // Validation
    if (!homePrice || homePrice < 100000) {
        showError('Please enter a valid home price (minimum ₹1,00,000)');
        return;
    }
    if (downPayment >= homePrice) {
        showError('Down payment must be less than home price');
        return;
    }
    if (!interestRate || interestRate < 1 || interestRate > 20) {
        showError('Please enter a valid interest rate (1% to 20%)');
        return;
    }

    // Calculate loan amount
    const loanAmount = homePrice - downPayment;
    
    // Calculate monthly mortgage payment (P&I)
    const monthlyRate = interestRate / 100 / 12;
    const months = loanTerm * 12;
    const monthlyPandI = loanAmount * monthlyRate * Math.pow(1 + monthlyRate, months) / (Math.pow(1 + monthlyRate, months) - 1);
    
    // Calculate additional monthly costs
    const monthlyTax = propertyTax / 12;
    const monthlyInsurance = homeInsurance / 12;
    const monthlyPMI = (downPayment < homePrice * 0.2) ? (loanAmount * (pmi / 100) / 12) : 0;
    
    // Total monthly payment
    const totalMonthlyPayment = monthlyPandI + monthlyTax + monthlyInsurance + monthlyPMI;
    
    // Calculate totals
    const totalPayment = totalMonthlyPayment * months;
    const totalInterest = (monthlyPandI * months) - loanAmount;
    const totalPMI = monthlyPMI * months;
    const totalTax = monthlyTax * months;
    const totalInsurance = monthlyInsurance * months;

    // Display results
    displayResults(totalMonthlyPayment, monthlyPandI, monthlyTax, monthlyInsurance, monthlyPMI, 
                  totalPayment, totalInterest, loanAmount, homePrice, downPayment, interestRate, loanTerm);
    
    // Generate amortization schedule
    generateAmortizationSchedule(loanAmount, interestRate, loanTerm, monthlyPandI);
}

function displayResults(totalMonthly, monthlyPandI, monthlyTax, monthlyInsurance, monthlyPMI, 
                       totalPayment, totalInterest, loanAmount, homePrice, downPayment, interestRate, loanTerm) {
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(totalMonthly)}</div>
                    <div class="text-lg font-semibold text-gray-700">Monthly Mortgage Payment</div>
                    <div class="text-sm text-gray-500 mt-1">For ${loanTerm} years at ${interestRate}%</div>
                </div>
            </div>

            <!-- Payment Breakdown -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Monthly Payment Breakdown</h4>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Principal & Interest</span>
                        <span class="font-semibold text-gray-900">₹${formatCurrency(monthlyPandI)}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Property Tax</span>
                        <span class="font-semibold text-blue-600">₹${formatCurrency(monthlyTax)}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Home Insurance</span>
                        <span class="font-semibold text-purple-600">₹${formatCurrency(monthlyInsurance)}</span>
                    </div>
                    ${monthlyPMI > 0 ? `
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">PMI</span>
                        <span class="font-semibold text-orange-600">₹${formatCurrency(monthlyPMI)}</span>
                    </div>
                    ` : ''}
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-semibold">
                            <span class="text-gray-800">Total Monthly Payment</span>
                            <span class="text-green-600">₹${formatCurrency(totalMonthly)}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Totals Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(loanAmount)}</div>
                    <div class="text-sm text-gray-600 mt-1">Loan Amount</div>
                </div>
                <div class="bg-red-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-red-600">₹${formatCurrency(totalInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Interest</div>
                </div>
            </div>

            <!-- Equity Information -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">Initial Equity</h4>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-blue-800">Down Payment</span>
                    <span class="text-lg font-bold text-blue-900">₹${formatCurrency(downPayment)}</span>
                </div>
                <div class="text-xs text-blue-700 mt-1">
                    ${Math.round((downPayment / homePrice) * 100)}% of home value
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Note:</strong> This calculation is for estimation purposes. Actual rates and payments may vary based on credit score, location, and lender policies. Does not include HOA fees or other potential costs.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('amortizationSection').classList.remove('hidden');
}

function generateAmortizationSchedule(loanAmount, interestRate, tenure, monthlyPandI) {
    let balance = loanAmount;
    let tableHTML = '';
    const monthlyRate = interestRate / 100 / 12;
    const months = tenure * 12;
    let totalPrincipal = 0;
    let totalInterest = 0;

    for (let year = 1; year <= tenure; year++) {
        let yearlyPrincipal = 0;
        let yearlyInterest = 0;

        for (let month = 1; month <= 12; month++) {
            const interest = balance * monthlyRate;
            const principal = monthlyPandI - interest;
            
            yearlyPrincipal += principal;
            yearlyInterest += interest;
            balance -= principal;

            if (balance < 0) balance = 0;
        }

        totalPrincipal += yearlyPrincipal;
        totalInterest += yearlyInterest;
        const equityBuilt = totalPrincipal;

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">Year ${year}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(yearlyPrincipal)}</td>
                <td class="px-4 py-3 text-right font-semibold text-red-600">₹${formatCurrency(yearlyInterest)}</td>
                <td class="px-4 py-3 text-right font-semibold text-gray-700">₹${formatCurrency(balance)}</td>
                <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(equityBuilt)}</td>
            </tr>
        `;
    }

    document.getElementById('amortizationTable').innerHTML = tableHTML;
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
    document.getElementById('amortizationSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    updateDownPayment();
    calculateMortgage();
});
</script>
@endsection