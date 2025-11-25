@extends('layouts.app')

@section('title', 'Loan EMI Calculator - Calculate Monthly EMI for Home, Car, Personal Loans | CalculaterTools')

@section('meta-description', 'Free online Loan EMI calculator to calculate monthly installments for home loans, car loans, personal loans. Check interest payable, total payment with amortization schedule.')

@section('keywords', 'EMI calculator, loan EMI calculator, home loan EMI, car loan EMI, personal loan EMI, monthly installment calculator, loan calculator, EMI calculation')

@section('canonical', url('/calculators/emi'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Loan EMI Calculator",
    "description": "Calculate Equated Monthly Installments for home loans, car loans, personal loans with amortization schedule",
    "url": "{{ url('/calculators/emi') }}",
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
                    <li class="text-gray-500">Loan EMI Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Loan EMI Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your Equated Monthly Installment (EMI) for home loans, car loans, personal loans, and more. Plan your finances with accurate monthly payment estimates.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Loan EMI</h2>
                        <p class="text-gray-600 mb-6">Enter your loan details to calculate monthly EMI and total payable amount</p>
                        
                        <form id="emiCalculatorForm" class="space-y-6">
                            <!-- Loan Amount -->
                            <div>
                                <label for="loanAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Loan Amount (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="loanAmount" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 500000" 
                                        min="10000" 
                                        step="1000"
                                        value="500000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Minimum: ₹10,000</p>
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
                                        placeholder="e.g., 8.5" 
                                        min="1" 
                                        max="30" 
                                        step="0.1"
                                        value="8.5"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Home loans: 7-9%, Personal loans: 10-18%</p>
                            </div>

                            <!-- Loan Tenure -->
                            <div>
                                <label for="loanTenure" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Loan Tenure (Years)
                                </label>
                                <input 
                                    type="number" 
                                    id="loanTenure" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="e.g., 20" 
                                    min="1" 
                                    max="30"
                                    value="20"
                                    required
                                >
                                <p class="text-sm text-gray-500 mt-1">Home loans: up to 30 years, Personal loans: 1-5 years</p>
                            </div>

                            <!-- Loan Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Loan Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setLoanType('home')" class="loan-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-home text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Home Loan</div>
                                    </button>
                                    <button type="button" onclick="setLoanType('car')" class="loan-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-car text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Car Loan</div>
                                    </button>
                                    <button type="button" onclick="setLoanType('personal')" class="loan-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Personal Loan</div>
                                    </button>
                                    <button type="button" onclick="setLoanType('education')" class="loan-type-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-graduation-cap text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Education Loan</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateEMI()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate EMI
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Loan Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-calculator text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your loan details</p>
                                <p class="text-sm">to see EMI calculation</p>
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
                            </tr>
                        </thead>
                        <tbody id="amortizationTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Use EMI Calculator?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-pie text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Budget Planning</h3>
                        <p class="text-gray-600">Plan your monthly budget accurately by knowing your exact EMI obligation in advance.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Loan Comparison</h3>
                        <p class="text-gray-600">Compare different loan offers from banks and choose the most affordable option.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-eye text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Transparency</h3>
                        <p class="text-gray-600">Understand the complete cost breakdown including principal and interest components.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Tenure Optimization</h3>
                        <p class="text-gray-600">Find the ideal loan tenure that balances affordable EMIs with total interest cost.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is EMI?</h3>
                        <p class="text-gray-600">EMI stands for Equated Monthly Installment. It's the fixed amount you pay to the bank/lender each month to repay your loan. EMI includes both principal repayment and interest charges.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is EMI calculated?</h3>
                        <p class="text-gray-600">EMI is calculated using the formula: EMI = [P × r × (1+r)^n] / [(1+r)^n - 1] where P is loan amount, r is monthly interest rate, and n is number of monthly installments.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What factors affect EMI?</h3>
                        <p class="text-gray-600">EMI depends on three main factors: Loan Amount (higher amount = higher EMI), Interest Rate (higher rate = higher EMI), and Loan Tenure (longer tenure = lower EMI but more interest).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is amortization schedule?</h3>
                        <p class="text-gray-600">An amortization schedule shows the breakup of each EMI payment into principal and interest components, and tracks the outstanding loan balance over the entire loan period.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I prepay my loan?</h3>
                        <p class="text-gray-600">Most banks allow partial or full prepayment of loans, though some may charge prepayment penalties. Prepaying reduces your total interest burden and loan tenure.</p>
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
                    <a href="{{ route('compound.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on investments with compound interest</p>
                    </a>
                    <a href="{{ route('mortgage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-building text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mortgage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate monthly payments for mortgage loans</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Set default loan type parameters
function setLoanType(type) {
    const loanTypes = {
        'home': { amount: 5000000, rate: 8.5, tenure: 20 },
        'car': { amount: 800000, rate: 9.5, tenure: 7 },
        'personal': { amount: 500000, rate: 12, tenure: 5 },
        'education': { amount: 1000000, rate: 8, tenure: 10 }
    };

    const params = loanTypes[type];
    document.getElementById('loanAmount').value = params.amount;
    document.getElementById('interestRate').value = params.rate;
    document.getElementById('loanTenure').value = params.tenure;

    // Update button styles
    document.querySelectorAll('.loan-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    calculateEMI();
}

function calculateEMI() {
    // Get input values
    const loanAmount = parseFloat(document.getElementById('loanAmount').value);
    const interestRate = parseFloat(document.getElementById('interestRate').value);
    const loanTenure = parseFloat(document.getElementById('loanTenure').value);

    // Validation
    if (!loanAmount || loanAmount < 10000) {
        showError('Please enter a valid loan amount (minimum ₹10,000)');
        return;
    }
    if (!interestRate || interestRate < 1 || interestRate > 30) {
        showError('Please enter a valid interest rate (1% to 30%)');
        return;
    }
    if (!loanTenure || loanTenure < 1 || loanTenure > 30) {
        showError('Please enter a valid loan tenure (1 to 30 years)');
        return;
    }

    // Calculate EMI
    const monthlyRate = interestRate / 100 / 12;
    const months = loanTenure * 12;
    
    // EMI Formula: [P x R x (1+R)^N]/[(1+R)^N-1]
    const emi = loanAmount * monthlyRate * Math.pow(1 + monthlyRate, months) / (Math.pow(1 + monthlyRate, months) - 1);
    const totalPayment = emi * months;
    const totalInterest = totalPayment - loanAmount;

    // Display results
    displayResults(emi, totalPayment, totalInterest, loanAmount, interestRate, loanTenure);
    
    // Generate amortization schedule
    generateAmortizationSchedule(loanAmount, interestRate, loanTenure, emi);
}

function displayResults(emi, totalPayment, totalInterest, loanAmount, interestRate, tenure) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(emi)}</div>
                    <div class="text-lg font-semibold text-gray-700">Monthly EMI</div>
                    <div class="text-sm text-gray-500 mt-1">For ${tenure} years at ${interestRate}% p.a.</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(loanAmount)}</div>
                    <div class="text-sm text-gray-600 mt-1">Loan Amount</div>
                </div>
                <div class="bg-red-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-red-600">₹${formatCurrency(totalInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Interest</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">₹${formatCurrency(totalPayment)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Payment</div>
                </div>
            </div>

            <!-- Interest to Principal Ratio -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Payment Breakdown</h4>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Principal Amount</span>
                        <span class="font-semibold text-gray-900">${((loanAmount/totalPayment)*100).toFixed(1)}%</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Interest Amount</span>
                        <span class="font-semibold text-red-600">${((totalInterest/totalPayment)*100).toFixed(1)}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: ${(loanAmount/totalPayment)*100}%"></div>
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Note:</strong> This calculation doesn't include processing fees, insurance, or other charges. Actual EMI may vary based on bank policies and credit score.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('amortizationSection').classList.remove('hidden');
}

function generateAmortizationSchedule(loanAmount, interestRate, tenure, emi) {
    let balance = loanAmount;
    let tableHTML = '';
    const monthlyRate = interestRate / 100 / 12;
    const months = tenure * 12;

    for (let year = 1; year <= tenure; year++) {
        let yearlyPrincipal = 0;
        let yearlyInterest = 0;

        for (let month = 1; month <= 12; month++) {
            const interest = balance * monthlyRate;
            const principal = emi - interest;
            
            yearlyPrincipal += principal;
            yearlyInterest += interest;
            balance -= principal;

            if (balance < 0) balance = 0;
        }

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">Year ${year}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(yearlyPrincipal)}</td>
                <td class="px-4 py-3 text-right font-semibold text-red-600">₹${formatCurrency(yearlyInterest)}</td>
                <td class="px-4 py-3 text-right font-semibold text-gray-700">₹${formatCurrency(balance)}</td>
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
    calculateEMI();
});
</script>
@endsection