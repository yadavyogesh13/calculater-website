@extends('layouts.app')

@section('title', 'Retirement Calculator - Plan Your Retirement Savings & Corpus | CalculaterTools')

@section('meta-description', 'Free online retirement calculator to plan your retirement savings, calculate required corpus, and estimate monthly investments needed for a comfortable retirement.')

@section('keywords', 'retirement calculator, retirement planning, retirement savings, retirement corpus, pension calculator, retirement plan, financial planning')

@section('canonical', url('/calculators/retirement'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Retirement Calculator",
    "description": "Calculate retirement savings and plan your retirement corpus",
    "url": "{{ url('/calculators/retirement') }}",
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
                    <li class="text-gray-500">Retirement Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Retirement Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Plan your golden years with confidence. Calculate how much you need to save for a comfortable retirement and create your retirement roadmap.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Plan Your Retirement</h2>
                        <p class="text-gray-600 mb-6">Enter your details to calculate your retirement corpus and savings plan</p>
                        
                        <form id="retirementCalculatorForm" class="space-y-6">
                            <!-- Current Age -->
                            <div>
                                <label for="currentAge" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Current Age (Years)
                                </label>
                                <input 
                                    type="number" 
                                    id="currentAge" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="e.g., 30" 
                                    min="18" 
                                    max="65"
                                    value="30"
                                    required
                                >
                                <p class="text-sm text-gray-500 mt-1">Your current age in years</p>
                            </div>

                            <!-- Retirement Age -->
                            <div>
                                <label for="retirementAge" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Planned Retirement Age (Years)
                                </label>
                                <input 
                                    type="number" 
                                    id="retirementAge" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="e.g., 60" 
                                    min="40" 
                                    max="75"
                                    value="60"
                                    required
                                >
                                <p class="text-sm text-gray-500 mt-1">Age at which you plan to retire</p>
                            </div>

                            <!-- Life Expectancy -->
                            <div>
                                <label for="lifeExpectancy" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Life Expectancy (Years)
                                </label>
                                <input 
                                    type="number" 
                                    id="lifeExpectancy" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="e.g., 85" 
                                    min="70" 
                                    max="100"
                                    value="85"
                                    required
                                >
                                <p class="text-sm text-gray-500 mt-1">Expected lifespan for planning</p>
                            </div>

                            <!-- Current Savings -->
                            <div>
                                <label for="currentSavings" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Current Retirement Savings (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="currentSavings" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 500000" 
                                        min="0" 
                                        step="1000"
                                        value="500000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Amount already saved for retirement</p>
                            </div>

                            <!-- Monthly Expenses -->
                            <div>
                                <label for="monthlyExpenses" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Expected Monthly Expenses in Retirement (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="monthlyExpenses" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 50000" 
                                        min="10000" 
                                        step="5000"
                                        value="50000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Monthly living expenses after retirement</p>
                            </div>

                            <!-- Expected Returns -->
                            <div>
                                <label for="expectedReturns" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Expected Annual Returns (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="expectedReturns" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 8" 
                                        min="1" 
                                        max="20" 
                                        step="0.1"
                                        value="8"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Expected annual return on investments</p>
                            </div>

                            <!-- Inflation Rate -->
                            <div>
                                <label for="inflationRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Expected Inflation Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="inflationRate" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 6" 
                                        min="1" 
                                        max="10" 
                                        step="0.1"
                                        value="6"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Average annual inflation rate</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateRetirement()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Retirement Plan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Retirement Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-umbrella-beach text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your retirement details</p>
                                <p class="text-sm">to see your retirement plan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Savings Plan -->
            <div id="savingsPlanSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Yearly Savings Plan</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Age</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Yearly Savings</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Total Corpus</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Monthly Savings</th>
                            </tr>
                        </thead>
                        <tbody id="savingsPlanTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Retirement Planning Guide -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Retirement Planning Guide</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bullseye text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Set Clear Goals</h3>
                        <p class="text-gray-600">Define your retirement lifestyle and calculate the corpus needed to support it comfortably.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Start Early</h3>
                        <p class="text-gray-600">The power of compounding works best when you start saving early in your career.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-diversity text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Diversify Investments</h3>
                        <p class="text-gray-600">Spread your investments across different asset classes to manage risk effectively.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-sync-alt text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Regular Review</h3>
                        <p class="text-gray-600">Review your retirement plan annually and adjust for life changes and market conditions.</p>
                    </div>
                </div>

                <!-- Retirement Corpus Examples -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">The Power of Starting Early</h4>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Starting at age 25:</span>
                                <span class="font-semibold text-green-600">₹5,000/month</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Starting at age 35:</span>
                                <span class="font-semibold text-orange-600">₹12,000/month</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">Starting at age 45:</span>
                                <span class="font-semibold text-red-600">₹30,000/month</span>
                            </div>
                        </div>
                        <p class="text-xs text-gray-600 mt-3">To achieve same retirement corpus of ₹5 Crores at age 60 (8% returns)</p>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Impact of Returns</h4>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">At 6% returns:</span>
                                <span class="font-semibold">₹8,200/month</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">At 8% returns:</span>
                                <span class="font-semibold text-green-600">₹5,000/month</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700">At 10% returns:</span>
                                <span class="font-semibold text-green-600">₹3,200/month</span>
                            </div>
                        </div>
                        <p class="text-xs text-gray-600 mt-3">Monthly savings needed for ₹2 Crores corpus starting at age 30</p>
                    </div>
                </div>
            </div>

            <!-- Investment Options -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Retirement Investment Options</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-pie text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">EPF & PPF</h3>
                        <p class="text-gray-600 mb-4">Government-backed savings with tax benefits and guaranteed returns.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 7-8% • <span class="font-semibold">Risk:</span> Low
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Mutual Funds</h3>
                        <p class="text-gray-600 mb-4">Diversified equity and debt funds for long-term wealth creation.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 10-12% • <span class="font-semibold">Risk:</span> Medium
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-home text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">NPS</h3>
                        <p class="text-gray-600 mb-4">National Pension System with tax benefits and flexible investment options.</p>
                        <div class="text-sm text-gray-500">
                            <span class="font-semibold">Returns:</span> 8-10% • <span class="font-semibold">Risk:</span> Medium
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I start retirement planning?</h3>
                        <p class="text-gray-600">The ideal time to start retirement planning is in your 20s or early 30s. Starting early allows you to benefit from compounding and requires smaller monthly contributions. However, it's never too late to start - begin as soon as possible regardless of your age.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How much retirement corpus do I need?</h3>
                        <p class="text-gray-600">A common rule of thumb is to aim for 25-30 times your annual expenses at retirement. For example, if you need ₹6 lakhs per year (₹50,000 per month), you should target ₹1.5-1.8 crores corpus. However, this varies based on lifestyle, inflation, and life expectancy.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the 4% retirement rule?</h3>
                        <p class="text-gray-600">The 4% rule suggests that you can withdraw 4% of your retirement corpus annually without running out of money for 30 years. For example, with a ₹2 crore corpus, you can withdraw ₹8 lakhs per year. This rule considers inflation and investment returns.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does inflation affect retirement planning?</h3>
                        <p class="text-gray-600">Inflation reduces purchasing power over time. If inflation is 6%, ₹50,000 today will be equivalent to ₹1.07 lakhs in 15 years. Your retirement corpus must account for inflation to maintain your standard of living throughout retirement.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What are the best investment options for retirement?</h3>
                        <p class="text-gray-600">Diversify across EPF/PPF for safety, equity mutual funds for growth, NPS for tax efficiency, and debt funds for stability. The allocation should become more conservative as you approach retirement age to protect your corpus.</p>
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
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate investment returns with compounding</p>
                    </a>
                    <a href="{{ route('inflation.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-orange-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Inflation Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate future value considering inflation</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function calculateRetirement() {
    // Get input values
    const currentAge = parseInt(document.getElementById('currentAge').value);
    const retirementAge = parseInt(document.getElementById('retirementAge').value);
    const lifeExpectancy = parseInt(document.getElementById('lifeExpectancy').value);
    const currentSavings = parseFloat(document.getElementById('currentSavings').value);
    const monthlyExpenses = parseFloat(document.getElementById('monthlyExpenses').value);
    const expectedReturns = parseFloat(document.getElementById('expectedReturns').value);
    const inflationRate = parseFloat(document.getElementById('inflationRate').value);

    // Validation
    if (!currentAge || currentAge < 18 || currentAge > 65) {
        showError('Please enter a valid current age (18-65 years)');
        return;
    }
    if (!retirementAge || retirementAge <= currentAge || retirementAge > 75) {
        showError('Please enter a valid retirement age (greater than current age, max 75)');
        return;
    }
    if (!lifeExpectancy || lifeExpectancy <= retirementAge || lifeExpectancy > 100) {
        showError('Please enter a valid life expectancy (greater than retirement age)');
        return;
    }
    if (!currentSavings || currentSavings < 0) {
        showError('Please enter valid current savings');
        return;
    }
    if (!monthlyExpenses || monthlyExpenses < 10000) {
        showError('Please enter valid monthly expenses (minimum ₹10,000)');
        return;
    }
    if (!expectedReturns || expectedReturns < 1 || expectedReturns > 20) {
        showError('Please enter valid expected returns (1-20%)');
        return;
    }
    if (!inflationRate || inflationRate < 1 || inflationRate > 10) {
        showError('Please enter valid inflation rate (1-10%)');
        return;
    }

    // Calculate retirement values
    const workingYears = retirementAge - currentAge;
    const retirementYears = lifeExpectancy - retirementAge;
    
    // Future value of current savings
    const futureValueOfSavings = currentSavings * Math.pow(1 + expectedReturns/100, workingYears);
    
    // Future monthly expenses at retirement (adjusted for inflation)
    const futureMonthlyExpenses = monthlyExpenses * Math.pow(1 + inflationRate/100, workingYears);
    const annualExpensesInRetirement = futureMonthlyExpenses * 12;
    
    // Required retirement corpus (using 4% withdrawal rule)
    const requiredCorpus = annualExpensesInRetirement * 25;
    
    // Additional corpus needed
    const additionalCorpusNeeded = Math.max(0, requiredCorpus - futureValueOfSavings);
    
    // Monthly savings required
    const monthlyRate = expectedReturns / 100 / 12;
    const months = workingYears * 12;
    let monthlySavings = 0;
    
    if (additionalCorpusNeeded > 0) {
        monthlySavings = additionalCorpusNeeded * monthlyRate / (Math.pow(1 + monthlyRate, months) - 1);
    }

    // Display results
    displayResults(requiredCorpus, futureValueOfSavings, additionalCorpusNeeded, monthlySavings, 
                  workingYears, retirementYears, futureMonthlyExpenses, currentAge, retirementAge);
    
    // Generate savings plan
    generateSavingsPlan(currentAge, retirementAge, currentSavings, monthlySavings, expectedReturns);
}

function displayResults(requiredCorpus, futureValueOfSavings, additionalCorpusNeeded, monthlySavings, 
                       workingYears, retirementYears, futureMonthlyExpenses, currentAge, retirementAge) {
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(requiredCorpus)}</div>
                    <div class="text-lg font-semibold text-gray-700">Required Retirement Corpus</div>
                    <div class="text-sm text-gray-500 mt-1">At age ${retirementAge} for ${retirementYears} years of retirement</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(futureValueOfSavings)}</div>
                    <div class="text-sm text-gray-600 mt-1">Future Value of Current Savings</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">₹${formatCurrency(additionalCorpusNeeded)}</div>
                    <div class="text-sm text-gray-600 mt-1">Additional Corpus Needed</div>
                </div>
            </div>

            <!-- Monthly Savings -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="text-center">
                    <div class="text-2xl font-bold text-orange-600 mb-2">₹${formatCurrency(monthlySavings)}</div>
                    <div class="text-lg font-semibold text-gray-700">Monthly Savings Required</div>
                    <div class="text-sm text-gray-600 mt-1">For next ${workingYears} years to reach your goal</div>
                </div>
            </div>

            <!-- Expense Projection -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Retirement Expense Projection</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Current monthly expenses:</span>
                        <span class="font-semibold">₹${formatCurrency(document.getElementById('monthlyExpenses').value)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Future monthly expenses (at retirement):</span>
                        <span class="font-semibold text-green-600">₹${formatCurrency(futureMonthlyExpenses)}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Years until retirement:</span>
                        <span class="font-semibold">${workingYears} years</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Retirement duration:</span>
                        <span class="font-semibold">${retirementYears} years</span>
                    </div>
                </div>
            </div>

            <!-- 4% Rule Explanation -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-purple-600 mt-1 mr-3"></i>
                    <div class="text-sm text-purple-800">
                        <strong>4% Withdrawal Rule:</strong> You can safely withdraw 4% of your corpus annually (₹${formatCurrency(requiredCorpus * 0.04)}/year or ₹${formatCurrency(requiredCorpus * 0.04 / 12)}/month) without depleting your savings for ${retirementYears} years.
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-gray-600 mt-1 mr-3"></i>
                    <div class="text-sm text-gray-600">
                        <strong>Note:</strong> This calculation uses the 4% withdrawal rule and considers inflation. Actual returns may vary based on market performance. Consult a financial advisor for personalized planning.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('savingsPlanSection').classList.remove('hidden');
}

function generateSavingsPlan(currentAge, retirementAge, currentSavings, monthlySavings, expectedReturns) {
    let tableHTML = '';
    let corpus = currentSavings;
    const yearlySavings = monthlySavings * 12;

    for (let age = currentAge; age <= retirementAge; age++) {
        const yearsFromNow = age - currentAge;
        
        if (yearsFromNow === 0) {
            // Current year
            tableHTML += `
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-700">${age} (Current)</td>
                    <td class="px-4 py-3 text-right font-semibold text-green-600">-</td>
                    <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(corpus)}</td>
                    <td class="px-4 py-3 text-right font-semibold text-gray-700">-</td>
                </tr>
            `;
        } else {
            // Future years
            corpus = corpus * (1 + expectedReturns/100) + yearlySavings;
            
            tableHTML += `
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-700">${age}</td>
                    <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(yearlySavings)}</td>
                    <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(corpus)}</td>
                    <td class="px-4 py-3 text-right font-semibold text-gray-700">₹${formatCurrency(monthlySavings)}</td>
                </tr>
            `;
        }
    }

    document.getElementById('savingsPlanTable').innerHTML = tableHTML;
}

function formatCurrency(amount) {
    if (amount >= 10000000) {
        return (amount / 10000000).toFixed(2) + ' Cr';
    } else if (amount >= 100000) {
        return (amount / 100000).toFixed(2) + ' L';
    }
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
    document.getElementById('savingsPlanSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateRetirement();
});
</script>
@endsection