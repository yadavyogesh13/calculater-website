@extends('layouts.app')

@section('title', 'Credit Card Payoff Calculator - Calculate Payoff Time & Interest Savings | CalculaterTools')

@section('meta-description', 'Free online Credit Card Payoff calculator to calculate debt payoff timeline, total interest cost, and find the best strategy to become debt-free faster.')

@section('keywords', 'credit card payoff calculator, debt payoff calculator, credit card debt, interest calculator, debt free, snowball method, avalanche method')

@section('canonical', url('/calculators/credit-card-payoff'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Credit Card Payoff Calculator",
    "description": "Calculate credit card debt payoff timeline and interest savings with different payment strategies",
    "url": "{{ url('/calculators/credit-card-payoff') }}",
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
                    <li class="text-gray-500">Credit Card Payoff Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Credit Card Payoff Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your credit card debt payoff timeline and discover how to save thousands in interest. Choose the best strategy to become debt-free faster.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Payoff Plan</h2>
                        <p class="text-gray-600 mb-6">Enter your credit card details to create an optimized payoff strategy</p>
                        
                        <form id="creditCardPayoffForm" class="space-y-6">
                            <!-- Credit Card Details -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Credit Card Details</h3>
                                
                                <!-- Current Balance -->
                                <div class="mb-4">
                                    <label for="currentBalance" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Current Balance (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="currentBalance" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 50000" 
                                            min="1000" 
                                            step="1000"
                                            value="50000"
                                            required
                                        >
                                    </div>
                                </div>

                                <!-- Annual Interest Rate -->
                                <div class="mb-4">
                                    <label for="annualInterestRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Annual Interest Rate (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="annualInterestRate" 
                                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 36" 
                                            min="10" 
                                            max="48" 
                                            step="0.1"
                                            value="36"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Typically 24-48% for credit cards in India</p>
                                </div>

                                <!-- Minimum Payment -->
                                <div>
                                    <label for="minimumPayment" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Minimum Monthly Payment (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="minimumPayment" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 2000" 
                                            min="100" 
                                            step="100"
                                            value="2000"
                                            required
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Usually 5% of outstanding balance</p>
                                </div>
                            </div>

                            <!-- Payment Strategy -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Payment Strategy</h3>
                                
                                <!-- Monthly Payment -->
                                <div class="mb-4">
                                    <label for="monthlyPayment" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Planned Monthly Payment (₹)
                                    </label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                        <input 
                                            type="number" 
                                            id="monthlyPayment" 
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 5000" 
                                            min="100" 
                                            step="100"
                                            value="5000"
                                            required
                                        >
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Pay more than minimum to save on interest</p>
                                </div>

                                <!-- Strategy Type -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Payoff Strategy
                                    </label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <button type="button" onclick="setPayoffStrategy('avalanche')" class="strategy-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                            <i class="fas fa-mountain text-blue-600 text-lg mb-2"></i>
                                            <div class="text-sm font-medium text-gray-800">Avalanche</div>
                                            <div class="text-xs text-gray-500">Save on interest</div>
                                        </button>
                                        <button type="button" onclick="setPayoffStrategy('snowball')" class="strategy-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                            <i class="fas fa-snowflake text-green-600 text-lg mb-2"></i>
                                            <div class="text-sm font-medium text-gray-800">Snowball</div>
                                            <div class="text-xs text-gray-500">Quick wins</div>
                                        </button>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Avalanche saves more money, Snowball provides motivation</p>
                                </div>
                            </div>

                            <!-- Additional Cards (Multiple Debt) -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Additional Credit Cards (Optional)</h3>
                                <div id="additionalCards">
                                    <!-- Additional cards will be added here dynamically -->
                                </div>
                                <button type="button" onclick="addAdditionalCard()" class="w-full mt-3 border-2 border-dashed border-gray-300 rounded-lg py-3 text-gray-500 hover:border-blue-500 hover:text-blue-600 transition duration-200">
                                    <i class="fas fa-plus mr-2"></i>Add Another Credit Card
                                </button>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculatePayoff()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Payoff Plan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Payoff Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-credit-card text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your credit card details</p>
                                <p class="text-sm">to see payoff plan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payoff Timeline -->
            <div id="payoffTimelineSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Payoff Timeline</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Month</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Payment</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Principal</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Interest</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Remaining Balance</th>
                            </tr>
                        </thead>
                        <tbody id="payoffTimelineTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Strategy Comparison -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Debt Payoff Strategies</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="border border-blue-200 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-mountain text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-blue-600">Avalanche Method</h3>
                        </div>
                        <ul class="space-y-3 text-gray-700 mb-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span><strong>Pay highest interest rate debts first</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Mathematically optimal - saves the most money</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Lowest total interest paid</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-600 mt-1 mr-3"></i>
                                <span>May take longer to see first debt cleared</span>
                            </li>
                        </ul>
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-800 mb-2">Best For:</h4>
                            <p class="text-sm text-blue-700">People who want to save the most money and are motivated by mathematical efficiency.</p>
                        </div>
                    </div>

                    <div class="border border-green-200 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-snowflake text-white text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-green-600">Snowball Method</h3>
                        </div>
                        <ul class="space-y-3 text-gray-700 mb-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span><strong>Pay smallest balance debts first</strong></span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Psychological wins keep you motivated</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-600 mt-1 mr-3"></i>
                                <span>Quickly clear multiple small debts</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-600 mt-1 mr-3"></i>
                                <span>May pay more total interest overall</span>
                            </li>
                        </ul>
                        <div class="bg-green-50 rounded-lg p-4">
                            <h4 class="font-semibold text-green-800 mb-2">Best For:</h4>
                            <p class="text-sm text-green-700">People who need quick wins and psychological motivation to stay on track with debt repayment.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Comparison -->
                <div class="mt-8 bg-gray-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 text-center">Which Strategy Saves More Money?</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-blue-600 mb-2">Avalanche Method</div>
                            <div class="text-sm text-gray-600">Saves more money in interest</div>
                            <div class="text-xs text-gray-500 mt-1">Mathematically efficient</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-green-600 mb-2">Snowball Method</div>
                            <div class="text-sm text-gray-600">Provides faster motivation</div>
                            <div class="text-xs text-gray-500 mt-1">Psychological benefits</div>
                        </div>
                    </div>
                    <div class="mt-4 text-center text-sm text-gray-600">
                        <strong>Pro Tip:</strong> Start with Snowball if you need motivation, then switch to Avalanche once you build momentum!
                    </div>
                </div>
            </div>

            <!-- Money Saving Tips -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">How to Pay Off Credit Card Debt Faster</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-ban text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Stop Using Cards</h3>
                        <p class="text-gray-600">Freeze your credit cards temporarily to avoid accumulating more debt while paying off existing balances.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exchange-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Balance Transfer</h3>
                        <p class="text-gray-600">Transfer high-interest debt to a card with 0% introductory APR or lower interest rate personal loan.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Increase Payments</h3>
                        <p class="text-gray-600">Even small increases in monthly payments can significantly reduce your payoff time and total interest.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-wallet text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Create Budget</h3>
                        <p class="text-gray-600">Track your spending and create a realistic budget to free up more money for debt repayment each month.</p>
                    </div>
                </div>

                <!-- Emergency Fund Tip -->
                <div class="mt-8 bg-yellow-50 rounded-xl p-6">
                    <div class="flex items-start">
                        <i class="fas fa-lightbulb text-yellow-600 text-2xl mt-1 mr-4"></i>
                        <div>
                            <h4 class="text-lg font-semibold text-yellow-800 mb-2">Pro Tip: Build a Small Emergency Fund First</h4>
                            <p class="text-yellow-700 text-sm">
                                Before aggressively paying down debt, save ₹10,000-₹20,000 as an emergency fund. This prevents you from going deeper into debt when unexpected expenses arise.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How much should I pay monthly to pay off credit card debt?</h3>
                        <p class="text-gray-600">Pay as much as you can afford above the minimum payment. Even an extra ₹1,000-₹2,000 per month can reduce your payoff time by years and save thousands in interest. Aim to pay at least 2-3 times the minimum payment if possible.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between avalanche and snowball methods?</h3>
                        <p class="text-gray-600">Avalanche method focuses on paying debts with the highest interest rates first, saving you the most money. Snowball method focuses on paying smallest balances first, giving you psychological wins and motivation. Avalanche is mathematically better, Snowball is psychologically better.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I take a personal loan to pay off credit card debt?</h3>
                        <p class="text-gray-600">If you can get a personal loan with significantly lower interest rate (below 15-18%), it can be a good strategy. This is called debt consolidation. However, be disciplined and don't run up new credit card balances after consolidating.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does credit card interest work in India?</h3>
                        <p class="text-gray-600">Credit cards in India typically charge 24-48% annual interest, compounded monthly. Interest is calculated on daily outstanding balance. If you pay only the minimum amount, most of your payment goes toward interest rather than reducing the principal balance.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What happens if I only pay the minimum amount?</h3>
                        <p class="text-gray-600">Paying only the minimum can extend your payoff period to 10+ years and cost 2-3 times your original balance in interest. For example, ₹50,000 debt at 36% interest with minimum payments could take 12+ years to pay off and cost ₹80,000+ in interest.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('emi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-credit-card text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Loan EMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate monthly installments for loans</p>
                    </a>
                    <a href="{{ route('compound.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate investment returns with compounding</p>
                    </a>
                    <a href="{{ route('sip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-purple-600 text-xl"></i>
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
let currentStrategy = 'avalanche';
let additionalCardCount = 0;

function setPayoffStrategy(strategy) {
    currentStrategy = strategy;
    
    // Update button styles
    document.querySelectorAll('.strategy-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'ring-2', 'ring-blue-300', 'ring-green-300');
    });
    
    if (strategy === 'avalanche') {
        event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    } else {
        event.target.classList.add('border-green-500', 'bg-green-50', 'ring-2', 'ring-green-300');
    }
    
    calculatePayoff();
}

function addAdditionalCard() {
    additionalCardCount++;
    const cardHtml = `
        <div class="additional-card border border-gray-200 rounded-lg p-4 mb-3">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-semibold text-gray-800">Credit Card ${additionalCardCount + 1}</h4>
                <button type="button" onclick="removeAdditionalCard(this)" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Balance (₹)</label>
                    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="Balance" min="1000" step="1000">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Interest Rate (%)</label>
                    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="Rate" min="10" max="48" step="0.1" value="36">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Min Payment (₹)</label>
                    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm" placeholder="Min Pay" min="100" step="100">
                </div>
            </div>
        </div>
    `;
    document.getElementById('additionalCards').insertAdjacentHTML('beforeend', cardHtml);
}

function removeAdditionalCard(button) {
    button.closest('.additional-card').remove();
    additionalCardCount--;
}

function calculatePayoff() {
    // Get main card values
    const currentBalance = parseFloat(document.getElementById('currentBalance').value);
    const annualInterestRate = parseFloat(document.getElementById('annualInterestRate').value);
    const minimumPayment = parseFloat(document.getElementById('minimumPayment').value);
    const monthlyPayment = parseFloat(document.getElementById('monthlyPayment').value);

    // Validation
    if (!currentBalance || currentBalance < 1000) {
        showError('Please enter a valid current balance (minimum ₹1,000)');
        return;
    }
    if (!annualInterestRate || annualInterestRate < 10 || annualInterestRate > 48) {
        showError('Please enter a valid interest rate (10-48%)');
        return;
    }
    if (!minimumPayment || minimumPayment < 100) {
        showError('Please enter a valid minimum payment');
        return;
    }
    if (!monthlyPayment || monthlyPayment < minimumPayment) {
        showError('Monthly payment must be greater than minimum payment');
        return;
    }

    // Calculate payoff for single card
    const result = calculateSingleCardPayoff(currentBalance, annualInterestRate, monthlyPayment);
    
    // Display results
    displayResults(result, currentBalance, annualInterestRate, monthlyPayment);
    generatePayoffTimeline(currentBalance, annualInterestRate, monthlyPayment);
}

function calculateSingleCardPayoff(balance, annualRate, monthlyPayment) {
    const monthlyRate = annualRate / 100 / 12;
    let currentBalance = balance;
    let totalMonths = 0;
    let totalInterest = 0;
    let totalPaid = 0;

    while (currentBalance > 0 && totalMonths < 600) { // Max 50 years
        totalMonths++;
        
        // Calculate interest for this month
        const monthlyInterest = currentBalance * monthlyRate;
        totalInterest += monthlyInterest;
        
        // Calculate principal payment
        const principalPayment = Math.min(monthlyPayment - monthlyInterest, currentBalance);
        
        // Update balance
        currentBalance = currentBalance - principalPayment;
        totalPaid += monthlyPayment;
        
        if (currentBalance <= 0) {
            // Adjust final payment
            totalPaid = totalPaid - Math.abs(currentBalance);
            currentBalance = 0;
        }
    }

    const years = Math.floor(totalMonths / 12);
    const months = totalMonths % 12;
    
    // Calculate minimum payment scenario for comparison
    const minPaymentResult = calculateSingleCardPayoff(balance, annualRate, Math.min(monthlyPayment, balance * 0.05));

    return {
        totalMonths: totalMonths,
        years: years,
        months: months,
        totalInterest: totalInterest,
        totalPaid: totalPaid,
        interestSavings: minPaymentResult.totalInterest - totalInterest,
        timeSavings: minPaymentResult.totalMonths - totalMonths
    };
}

function displayResults(result, balance, interestRate, monthlyPayment) {
    const timeText = result.years > 0 ? 
        `${result.years} years ${result.months > 0 ? `and ${result.months} months` : ''}` : 
        `${result.months} months`;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">${timeText}</div>
                    <div class="text-lg font-semibold text-gray-700">Time to Become Debt-Free</div>
                    <div class="text-sm text-gray-500 mt-1">With ₹${formatCurrency(monthlyPayment)} monthly payments</div>
                </div>
            </div>

            <!-- Financial Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-red-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-red-600">₹${formatCurrency(result.totalInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Interest Cost</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(result.totalPaid)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Amount Paid</div>
                </div>
            </div>

            <!-- Savings Comparison -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="text-center">
                    <div class="text-lg font-semibold text-yellow-800 mb-2">Compared to Minimum Payments</div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-xl font-bold text-green-600">₹${formatCurrency(result.interestSavings)}</div>
                            <div class="text-sm text-gray-600">Interest Saved</div>
                        </div>
                        <div>
                            <div class="text-xl font-bold text-blue-600">${Math.floor(result.timeSavings/12)}y ${result.timeSavings%12}m</div>
                            <div class="text-sm text-gray-600">Time Saved</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Strategy -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Your Payoff Strategy</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Current Strategy:</span>
                        <span class="font-semibold ${currentStrategy === 'avalanche' ? 'text-blue-600' : 'text-green-600'}">
                            ${currentStrategy === 'avalanche' ? 'Avalanche Method' : 'Snowball Method'}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Monthly Payment:</span>
                        <span class="font-semibold">₹${formatCurrency(monthlyPayment)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Interest Rate:</span>
                        <span class="font-semibold text-red-600">${interestRate}% APR</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Original Debt:</span>
                        <span class="font-semibold">₹${formatCurrency(balance)}</span>
                    </div>
                </div>
            </div>

            <!-- Tips -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-purple-600 mt-1 mr-3"></i>
                    <div class="text-sm text-purple-800">
                        <strong>Pro Tip:</strong> Increase your monthly payment by just ₹1,000 to become debt-free even faster and save more on interest!
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('payoffTimelineSection').classList.remove('hidden');
}

function generatePayoffTimeline(balance, annualRate, monthlyPayment) {
    let tableHTML = '';
    let currentBalance = balance;
    const monthlyRate = annualRate / 100 / 12;
    let month = 1;

    // Show first 12 months and then every 6 months
    while (currentBalance > 0 && month <= 60) {
        const monthlyInterest = currentBalance * monthlyRate;
        const principalPayment = Math.min(monthlyPayment - monthlyInterest, currentBalance);
        currentBalance = currentBalance - principalPayment;

        if (month <= 12 || month % 6 === 0 || currentBalance <= 0) {
            tableHTML += `
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-700">${month}</td>
                    <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(monthlyPayment)}</td>
                    <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(principalPayment)}</td>
                    <td class="px-4 py-3 text-right font-semibold text-red-600">₹${formatCurrency(monthlyInterest)}</td>
                    <td class="px-4 py-3 text-right font-semibold ${currentBalance <= 0 ? 'text-green-600' : 'text-gray-900'}">
                        ₹${formatCurrency(Math.max(0, currentBalance))}
                    </td>
                </tr>
            `;
        }

        if (currentBalance <= 0) break;
        month++;
    }

    document.getElementById('payoffTimelineTable').innerHTML = tableHTML;
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
    document.getElementById('payoffTimelineSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculatePayoff();
});
</script>
@endsection