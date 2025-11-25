@extends('layouts.app')

@section('title', 'Interest Rate Comparison Calculator | Compare Loan & Savings Rates | CalculaterTools')

@section('meta-description', 'Free interest rate comparison calculator to compare loan rates, savings accounts, and investment returns. Calculate total costs and earnings with different interest rates.')

@section('keywords', 'interest rate calculator, loan rate comparison, savings rate calculator, compare interest rates, APR calculator, investment return calculator')

@section('canonical', url('/calculators/interest-rate-comparison'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Interest Rate Comparison Calculator",
    "description": "Compare loan interest rates, savings account rates, and investment returns",
    "url": "{{ url('/calculators/interest-rate-comparison') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script>
@endverbatim

<div class="min-h-screen bg-indigo-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#finance" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Finance Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Interest Rate Comparison</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Interest Rate Comparison Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Compare loan rates, savings accounts, and investment returns. Calculate total costs, earnings, and find the best financial products for your needs.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Compare Interest Rates</h2>
                        <p class="text-gray-600 mb-6">Enter your financial details and compare options</p>
                        
                        <form id="interestRateCalculatorForm" class="space-y-6">
                            <!-- Calculator Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculator Type
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <button type="button" onclick="setCalculatorType('loan')" class="type-btn py-3 px-4 border-2 border-indigo-500 bg-indigo-50 text-indigo-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-home mr-2"></i>
                                        Loan Comparison
                                    </button>
                                    <button type="button" onclick="setCalculatorType('savings')" class="type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-piggy-bank mr-2"></i>
                                        Savings Comparison
                                    </button>
                                    <button type="button" onclick="setCalculatorType('investment')" class="type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Investment Comparison
                                    </button>
                                </div>
                            </div>

                            <!-- Basic Amount Input -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3" id="amountLabel">Loan Amount</h3>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="principalAmount" 
                                        class="w-full pl-8 pr-4 py-3 text-lg border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                        placeholder="Enter amount" 
                                        min="100" 
                                        step="100"
                                        value="25000"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Loan-specific Inputs -->
                            <div id="loanInputs">
                                <div class="bg-blue-50 rounded-lg p-4">
                                    <h3 class="text-sm font-semibold text-blue-800 mb-3">Loan Details</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="loanTerm" class="block text-xs font-medium text-blue-700 mb-2">
                                                Loan Term (Years)
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="loanTerm" 
                                                    class="w-full pl-4 pr-12 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                    placeholder="e.g., 5" 
                                                    min="1" 
                                                    max="30" 
                                                    step="1"
                                                    value="5"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">years</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="loanType" class="block text-xs font-medium text-blue-700 mb-2">
                                                Loan Type
                                            </label>
                                            <select id="loanType" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                                <option value="fixed" selected>Fixed Rate</option>
                                                <option value="variable">Variable Rate</option>
                                                <option value="interest-only">Interest Only</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Savings/Investment Inputs -->
                            <div id="savingsInputs" class="hidden">
                                <div class="bg-purple-50 rounded-lg p-4">
                                    <h3 class="text-sm font-semibold text-purple-800 mb-3">Savings/Investment Details</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="timePeriod" class="block text-xs font-medium text-purple-700 mb-2">
                                                Time Period (Years)
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="timePeriod" 
                                                    class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                    placeholder="e.g., 10" 
                                                    min="1" 
                                                    max="50" 
                                                    step="1"
                                                    value="10"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">years</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="compoundFrequency" class="block text-xs font-medium text-purple-700 mb-2">
                                                Compound Frequency
                                            </label>
                                            <select id="compoundFrequency" class="w-full px-3 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                                                <option value="1">Annually</option>
                                                <option value="2">Semi-Annually</option>
                                                <option value="4" selected>Quarterly</option>
                                                <option value="12">Monthly</option>
                                                <option value="365">Daily</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Interest Rate Options -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Compare Interest Rates</h3>
                                <div class="space-y-4">
                                    <!-- Rate Option 1 -->
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                                        <div class="md:col-span-2">
                                            <label for="rate1Name" class="block text-xs font-medium text-amber-700 mb-2">
                                                Option 1 Name
                                            </label>
                                            <input 
                                                type="text" 
                                                id="rate1Name" 
                                                class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                placeholder="e.g., Bank A"
                                                value="Bank A"
                                            >
                                        </div>
                                        <div>
                                            <label for="rate1Value" class="block text-xs font-medium text-amber-700 mb-2">
                                                Interest Rate (%)
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="rate1Value" 
                                                    class="w-full pl-4 pr-12 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                    placeholder="e.g., 3.5" 
                                                    min="0" 
                                                    max="50" 
                                                    step="0.01"
                                                    value="3.5"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="rate1Fees" class="block text-xs font-medium text-amber-700 mb-2">
                                                Annual Fees ($)
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">$</span>
                                                </div>
                                                <input 
                                                    type="number" 
                                                    id="rate1Fees" 
                                                    class="w-full pl-8 pr-4 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                    placeholder="e.g., 100" 
                                                    min="0" 
                                                    max="10000" 
                                                    step="10"
                                                    value="100"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rate Option 2 -->
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                                        <div class="md:col-span-2">
                                            <label for="rate2Name" class="block text-xs font-medium text-amber-700 mb-2">
                                                Option 2 Name
                                            </label>
                                            <input 
                                                type="text" 
                                                id="rate2Name" 
                                                class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                placeholder="e.g., Bank B"
                                                value="Bank B"
                                            >
                                        </div>
                                        <div>
                                            <label for="rate2Value" class="block text-xs font-medium text-amber-700 mb-2">
                                                Interest Rate (%)
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="rate2Value" 
                                                    class="w-full pl-4 pr-12 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                    placeholder="e.g., 4.2" 
                                                    min="0" 
                                                    max="50" 
                                                    step="0.01"
                                                    value="4.2"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="rate2Fees" class="block text-xs font-medium text-amber-700 mb-2">
                                                Annual Fees ($)
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">$</span>
                                                </div>
                                                <input 
                                                    type="number" 
                                                    id="rate2Fees" 
                                                    class="w-full pl-8 pr-4 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                    placeholder="e.g., 50" 
                                                    min="0" 
                                                    max="10000" 
                                                    step="10"
                                                    value="50"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More Rates Button -->
                                    <div class="text-center">
                                        <button 
                                            type="button" 
                                            onclick="addRateOption()"
                                            class="text-amber-600 hover:text-amber-800 font-medium text-sm transition duration-200"
                                        >
                                            <i class="fas fa-plus-circle mr-1"></i>Add Another Rate Option
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3">Additional Options</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="includeFees" 
                                            class="h-4 w-4 text-gray-600 focus:ring-gray-500 border-gray-300 rounded"
                                            checked
                                        >
                                        <label for="includeFees" class="ml-2 text-xs text-gray-700">
                                            Include fees in calculations
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showAmortization" 
                                            class="h-4 w-4 text-gray-600 focus:ring-gray-500 border-gray-300 rounded"
                                        >
                                        <label for="showAmortization" class="ml-2 text-xs text-gray-700">
                                            Show amortization schedule
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateInterestComparison()"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Compare Rates
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Comparison Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-percentage text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter rate details</p>
                                <p class="text-sm">to see comparison results</p>
                            </div>
                        </div>

                        <!-- Quick Summary -->
                        <div id="summarySection" class="mt-6 p-4 bg-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Best Option</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600" id="bestOptionName">-</span>
                                    <span class="font-medium text-green-600" id="bestOptionValue">-</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Total Difference</span>
                                    <span class="font-medium text-gray-800" id="totalDifference">-</span>
                                </div>
                                <div class="pt-2 border-t border-indigo-200">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-600">Time Period</span>
                                        <span class="font-medium text-gray-800" id="summaryPeriod">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Rate Comparison Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Rate Comparison Summary</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="rateComparisonCards">
                    </div>
                </div>

                <!-- Cost Analysis -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6" id="costAnalysisTitle">Total Cost Analysis</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Financial Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Financial Breakdown</h3>
                            <div class="space-y-4" id="financialBreakdown">
                            </div>
                        </div>
                        
                        <!-- Visual Comparison -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Visual Comparison</h3>
                            <div class="bg-gray-50 rounded-lg p-4 h-64 flex items-center justify-center">
                                <p class="text-gray-500 text-center">
                                    <i class="fas fa-chart-bar text-3xl mb-2 block"></i>
                                    Comparison chart would appear here<br>
                                    <span class="text-sm">(Bar chart showing different rates)</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amortization Schedule -->
                <div id="amortizationSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8 hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Amortization Schedule</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="col1Header">Bank A Payment</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" id="col2Header">Bank B Payment</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Difference</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="amortizationBody">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recommendations & Next Steps</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Action Plan -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Action Plan</h3>
                            <div class="space-y-3" id="actionPlan">
                            </div>
                        </div>
                        
                        <!-- Additional Considerations -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Additional Considerations</h3>
                            <div class="space-y-3" id="additionalConsiderations">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Financial Decision Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search-dollar text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Compare Total Costs</h3>
                        <p class="text-gray-600">Look beyond interest rates. Include all fees, closing costs, and other charges in your comparison.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Risk Assessment</h3>
                        <p class="text-gray-600">Consider fixed vs variable rates. Fixed offers predictability, variable may offer lower initial rates.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Negotiation Power</h3>
                        <p class="text-gray-600">Use competing offers as leverage. Many lenders will match or beat competitors' rates.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-contract text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Read Fine Print</h3>
                        <p class="text-gray-600">Check for prepayment penalties, rate lock policies, and conditions that could affect your rate.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Interest Rate FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between APR and interest rate?</h3>
                        <p class="text-gray-600">The interest rate is the cost of borrowing the principal amount, while APR (Annual Percentage Rate) includes the interest rate plus other charges like fees, closing costs, and insurance. Always compare APRs when evaluating loans.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I choose a fixed or variable rate?</h3>
                        <p class="text-gray-600">Fixed rates offer predictability with consistent payments. Variable rates may start lower but can increase over time. Choose fixed if you prefer stability, or variable if you believe rates may decrease or you plan to pay off quickly.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How much does 0.5% interest rate difference really matter?</h3>
                        <p class="text-gray-600">A 0.5% difference can save you thousands over the life of a loan. On a $300,000 30-year mortgage, 0.5% lower rate saves approximately $30,000 in interest payments. Even small differences add up significantly over time.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When is the best time to get a loan or open a savings account?</h3>
                        <p class="text-gray-600">Loan rates are often lowest during economic slowdowns when central banks reduce rates. Savings rates may be highest when banks need deposits. Monitor economic trends and compare rates regularly rather than timing the market perfectly.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I improve my chances of getting better rates?</h3>
                        <p class="text-gray-600">Maintain a good credit score (700+), lower your debt-to-income ratio, have stable employment history, and shop around with multiple lenders. Consider using a co-signer or offering collateral for better rates.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('mortgage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-home text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mortgage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate monthly payments</p>
                    </a>
                    {{-- <a href="{{ route('loan.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-hand-holding-usd text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Loan Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate loan payments</p>
                    </a>
                    <a href="{{ route('investment.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Investment Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate investment growth</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variables
let currentType = 'loan';
let rateOptionsCount = 2;

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateInterestComparison(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change
    document.getElementById('principalAmount').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('loanTerm').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('timePeriod').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('rate1Value').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('rate2Value').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('rate1Fees').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('rate2Fees').addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById('includeFees').addEventListener('change', debounce(calculateInterestComparison, 300));
    document.getElementById('showAmortization').addEventListener('change', debounce(calculateInterestComparison, 300));
}

function setCalculatorType(type) {
    currentType = type;
    
    // Update button styles
    document.querySelectorAll('.type-btn').forEach(btn => {
        btn.classList.remove('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide sections based on type
    if (type === 'loan') {
        document.getElementById('loanInputs').classList.remove('hidden');
        document.getElementById('savingsInputs').classList.add('hidden');
        document.getElementById('amountLabel').textContent = 'Loan Amount';
        document.getElementById('costAnalysisTitle').textContent = 'Total Cost Analysis';
    } else {
        document.getElementById('loanInputs').classList.add('hidden');
        document.getElementById('savingsInputs').classList.remove('hidden');
        document.getElementById('amountLabel').textContent = 'Initial Deposit/Investment';
        document.getElementById('costAnalysisTitle').textContent = 'Earnings Analysis';
    }
    
    calculateInterestComparison();
}

function addRateOption() {
    if (rateOptionsCount >= 5) {
        alert('Maximum 5 rate options allowed');
        return;
    }
    
    rateOptionsCount++;
    const newRateHtml = `
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end" id="rateOption${rateOptionsCount}">
            <div class="md:col-span-2">
                <label for="rate${rateOptionsCount}Name" class="block text-xs font-medium text-amber-700 mb-2">
                    Option ${rateOptionsCount} Name
                </label>
                <input 
                    type="text" 
                    id="rate${rateOptionsCount}Name" 
                    class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                    placeholder="e.g., Bank C"
                    value="Bank C"
                >
            </div>
            <div>
                <label for="rate${rateOptionsCount}Value" class="block text-xs font-medium text-amber-700 mb-2">
                    Interest Rate (%)
                </label>
                <div class="relative">
                    <input 
                        type="number" 
                        id="rate${rateOptionsCount}Value" 
                        class="w-full pl-4 pr-12 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                        placeholder="e.g., 4.0" 
                        min="0" 
                        max="50" 
                        step="0.01"
                        value="4.0"
                        required
                    >
                    <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                </div>
            </div>
            <div>
                <label for="rate${rateOptionsCount}Fees" class="block text-xs font-medium text-amber-700 mb-2">
                    Annual Fees ($)
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">$</span>
                    </div>
                    <input 
                        type="number" 
                        id="rate${rateOptionsCount}Fees" 
                        class="w-full pl-8 pr-4 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                        placeholder="e.g., 75" 
                        min="0" 
                        max="10000" 
                        step="10"
                        value="75"
                    >
                </div>
            </div>
        </div>
    `;
    
    document.querySelector('.bg-amber-50 .space-y-4').insertAdjacentHTML('beforeend', newRateHtml);
    
    // Add event listeners to new inputs
    document.getElementById(`rate${rateOptionsCount}Value`).addEventListener('input', debounce(calculateInterestComparison, 300));
    document.getElementById(`rate${rateOptionsCount}Fees`).addEventListener('input', debounce(calculateInterestComparison, 300));
    
    calculateInterestComparison();
}

function calculateLoanPayment(principal, annualRate, years) {
    const monthlyRate = annualRate / 100 / 12;
    const numberOfPayments = years * 12;
    
    if (monthlyRate === 0) {
        return principal / numberOfPayments;
    }
    
    const payment = principal * monthlyRate * Math.pow(1 + monthlyRate, numberOfPayments) / 
                   (Math.pow(1 + monthlyRate, numberOfPayments) - 1);
    
    return payment;
}

function calculateCompoundInterest(principal, annualRate, years, compoundFrequency) {
    const rate = annualRate / 100;
    const n = compoundFrequency;
    const amount = principal * Math.pow(1 + rate / n, n * years);
    return amount;
}

function calculateInterestComparison() {
    const principal = parseFloat(document.getElementById('principalAmount').value) || 0;
    const includeFees = document.getElementById('includeFees').checked;
    const showAmortization = document.getElementById('showAmortization').checked;
    
    let results = [];
    
    // Calculate results for each rate option
    for (let i = 1; i <= rateOptionsCount; i++) {
        const name = document.getElementById(`rate${i}Name`).value || `Option ${i}`;
        const rate = parseFloat(document.getElementById(`rate${i}Value`).value) || 0;
        const fees = parseFloat(document.getElementById(`rate${i}Fees`).value) || 0;
        
        if (rate > 0) {
            let totalCost = 0;
            let monthlyPayment = 0;
            let totalInterest = 0;
            
            if (currentType === 'loan') {
                const years = parseFloat(document.getElementById('loanTerm').value) || 1;
                monthlyPayment = calculateLoanPayment(principal, rate, years);
                totalCost = monthlyPayment * years * 12;
                totalInterest = totalCost - principal;
                
                // Add fees if included
                if (includeFees) {
                    totalCost += fees * years;
                    totalInterest += fees * years;
                }
            } else {
                const years = parseFloat(document.getElementById('timePeriod').value) || 1;
                const compoundFreq = parseInt(document.getElementById('compoundFrequency').value) || 1;
                const futureValue = calculateCompoundInterest(principal, rate, years, compoundFreq);
                totalCost = futureValue;
                totalInterest = futureValue - principal;
                
                // Subtract fees if included
                if (includeFees) {
                    totalCost -= fees * years;
                    totalInterest -= fees * years;
                }
            }
            
            results.push({
                name: name,
                rate: rate,
                fees: fees,
                monthlyPayment: monthlyPayment,
                totalCost: totalCost,
                totalInterest: totalInterest
            });
        }
    }
    
    // Sort results by best option (lowest cost for loans, highest return for savings/investments)
    if (currentType === 'loan') {
        results.sort((a, b) => a.totalCost - b.totalCost);
    } else {
        results.sort((a, b) => b.totalCost - a.totalCost);
    }
    
    // Display results
    displayResults(results, principal);
    
    // Show/hide amortization
    if (showAmortization && currentType === 'loan' && results.length >= 2) {
        document.getElementById('amortizationSection').classList.remove('hidden');
        displayAmortizationSchedule(results[0], results[1], principal);
    } else {
        document.getElementById('amortizationSection').classList.add('hidden');
    }
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
}

function displayResults(results, principal) {
    if (results.length === 0) return;
    
    const bestOption = results[0];
    const years = currentType === 'loan' ? 
        parseFloat(document.getElementById('loanTerm').value) || 1 : 
        parseFloat(document.getElementById('timePeriod').value) || 1;
    
    // Update main results card
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        <div class="text-center">
            <div class="mb-4">
                <div class="text-lg font-bold text-indigo-600 mb-1">${bestOption.name}</div>
                <div class="text-2xl font-bold text-gray-900">${bestOption.rate}%</div>
                <div class="text-sm text-gray-500 mt-1">${currentType === 'loan' ? 'Lowest Total Cost' : 'Highest Return'}</div>
            </div>
            <div class="text-sm text-gray-600 space-y-1">
                <div class="flex justify-between">
                    <span>${currentType === 'loan' ? 'Monthly Payment:' : 'Future Value:'}</span>
                    <span class="font-medium">$${currentType === 'loan' ? bestOption.monthlyPayment.toFixed(2) : bestOption.totalCost.toFixed(2)}</span>
                </div>
                <div class="flex justify-between">
                    <span>Total ${currentType === 'loan' ? 'Cost' : 'Earnings'}:</span>
                    <span class="font-medium">$${currentType === 'loan' ? bestOption.totalCost.toFixed(2) : bestOption.totalInterest.toFixed(2)}</span>
                </div>
            </div>
        </div>
    `;
    
    // Update summary section
    document.getElementById('summarySection').classList.remove('hidden');
    document.getElementById('bestOptionName').textContent = bestOption.name;
    document.getElementById('bestOptionValue').textContent = `${bestOption.rate}%`;
    document.getElementById('summaryPeriod').textContent = `${years} years`;
    
    if (results.length > 1) {
        const secondBest = results[1];
        const difference = currentType === 'loan' ? 
            secondBest.totalCost - bestOption.totalCost : 
            bestOption.totalInterest - secondBest.totalInterest;
        
        document.getElementById('totalDifference').textContent = `$${Math.abs(difference).toFixed(2)} ${currentType === 'loan' ? 'savings' : 'more earnings'}`;
    }
    
    // Update detailed results
    updateDetailedResults(results, principal, years);
}

function updateDetailedResults(results, principal, years) {
    // Update rate comparison cards
    let comparisonHtml = '';
    results.forEach((result, index) => {
        const isBest = index === 0;
        const bgColor = isBest ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200';
        const textColor = isBest ? 'text-green-600' : 'text-gray-600';
        
        comparisonHtml += `
            <div class="text-center p-6 ${bgColor} rounded-lg border-2 ${isBest ? 'border-green-400' : 'border-gray-300'}">
                <div class="text-lg font-bold ${textColor} mb-2">${result.name}</div>
                <div class="text-3xl font-bold text-gray-900 mb-2">${result.rate}%</div>
                <div class="text-sm text-gray-500 space-y-1">
                    <div class="flex justify-between">
                        <span>${currentType === 'loan' ? 'Monthly:' : 'Future Value:'}</span>
                        <span class="font-medium">$${currentType === 'loan' ? result.monthlyPayment.toFixed(2) : result.totalCost.toFixed(2)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Total ${currentType === 'loan' ? 'Cost' : 'Earnings'}:</span>
                        <span class="font-medium">$${currentType === 'loan' ? result.totalCost.toFixed(2) : result.totalInterest.toFixed(2)}</span>
                    </div>
                    ${result.fees > 0 ? `
                    <div class="flex justify-between">
                        <span>Annual Fees:</span>
                        <span class="font-medium">$${result.fees.toFixed(2)}</span>
                    </div>
                    ` : ''}
                </div>
                ${isBest ? '<div class="mt-3 text-xs font-semibold text-green-600">★ BEST OPTION</div>' : ''}
            </div>
        `;
    });
    
    document.getElementById('rateComparisonCards').innerHTML = comparisonHtml;
    
    // Update financial breakdown
    let breakdownHtml = '';
    results.forEach((result, index) => {
        breakdownHtml += `
            <div class="border-b border-gray-200 pb-3">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-800">${result.name}</span>
                    <span class="text-lg font-bold ${index === 0 ? 'text-green-600' : 'text-gray-700'}">${result.rate}%</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div class="text-gray-600">${currentType === 'loan' ? 'Monthly Payment' : 'Future Value'}:</div>
                    <div class="text-right font-medium">$${currentType === 'loan' ? result.monthlyPayment.toFixed(2) : result.totalCost.toFixed(2)}</div>
                    
                    <div class="text-gray-600">Total ${currentType === 'loan' ? 'Interest' : 'Earnings'}:</div>
                    <div class="text-right font-medium">$${result.totalInterest.toFixed(2)}</div>
                    
                    ${result.fees > 0 ? `
                    <div class="text-gray-600">Total Fees:</div>
                    <div class="text-right font-medium">$${(result.fees * years).toFixed(2)}</div>
                    ` : ''}
                    
                    <div class="text-gray-600 font-semibold">Total ${currentType === 'loan' ? 'Cost' : 'Value'}:</div>
                    <div class="text-right font-bold ${index === 0 ? 'text-green-600' : 'text-gray-800'}">$${result.totalCost.toFixed(2)}</div>
                </div>
            </div>
        `;
    });
    
    document.getElementById('financialBreakdown').innerHTML = breakdownHtml;
    
    // Update recommendations
    updateRecommendations(results, principal, years);
}

function displayAmortizationSchedule(option1, option2, principal) {
    const years = parseFloat(document.getElementById('loanTerm').value) || 1;
    const tableBody = document.getElementById('amortizationBody');
    tableBody.innerHTML = '';
    
    // Update column headers
    document.getElementById('col1Header').textContent = `${option1.name} Payment`;
    document.getElementById('col2Header').textContent = `${option2.name} Payment`;
    
    for (let year = 1; year <= years; year++) {
        const payment1 = option1.monthlyPayment * 12;
        const payment2 = option2.monthlyPayment * 12;
        const difference = payment1 - payment2;
        
        tableBody.innerHTML += `
            <tr class="${year % 2 === 0 ? 'bg-gray-50' : 'bg-white'}">
                <td class="px-4 py-2 text-sm text-gray-900">Year ${year}</td>
                <td class="px-4 py-2 text-sm text-gray-900">$${payment1.toFixed(2)}</td>
                <td class="px-4 py-2 text-sm text-gray-900">$${payment2.toFixed(2)}</td>
                <td class="px-4 py-2 text-sm ${difference < 0 ? 'text-green-600' : 'text-red-600'}">
                    $${Math.abs(difference).toFixed(2)} ${difference < 0 ? 'savings' : 'extra'}
                </td>
            </tr>
        `;
    }
}

function updateRecommendations(results, principal, years) {
    const bestOption = results[0];
    
    // Action Plan
    document.getElementById('actionPlan').innerHTML = `
        <div class="flex items-start space-x-3">
            <i class="fas fa-check-circle text-green-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Choose ${bestOption.name}</p>
                <p class="text-sm text-gray-600">This option offers the ${currentType === 'loan' ? 'lowest total cost' : 'highest return'} over ${years} years.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-file-contract text-blue-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Review all terms carefully</p>
                <p class="text-sm text-gray-600">Check for prepayment penalties, rate lock duration, and other conditions.</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-handshake text-amber-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Negotiate with lenders</p>
                <p class="text-sm text-gray-600">Use competing offers as leverage to potentially get even better terms.</p>
            </div>
        </div>
    `;
    
    // Additional Considerations
    document.getElementById('additionalConsiderations').innerHTML = `
        <div class="flex items-start space-x-3">
            <i class="fas fa-exclamation-triangle text-red-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Consider rate stability</p>
                <p class="text-sm text-gray-600">${currentType === 'loan' ? 'Fixed rates offer predictability, while variable rates may change.' : 'Some savings rates are introductory and may decrease later.'}</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-piggy-bank text-green-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Emergency fund priority</p>
                <p class="text-sm text-gray-600">${currentType === 'loan' ? 'Ensure you can comfortably afford payments even if income changes.' : 'Maintain 3-6 months of expenses in accessible savings first.'}</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <i class="fas fa-chart-line text-blue-500 mt-1"></i>
            <div>
                <p class="font-medium text-gray-800">Monitor market trends</p>
                <p class="text-sm text-gray-600">Interest rates change over time. Consider if now is the right time for your financial goals.</p>
            </div>
        </div>
    `;
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
</script>
@endsection