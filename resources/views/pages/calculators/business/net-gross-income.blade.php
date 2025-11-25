@extends('layouts.app')

@section('title', 'Net vs Gross Income Calculator | Calculate Take-Home Pay | CalculaterTools')

@section('meta-description', 'Calculate the difference between gross and net income. Understand taxes, deductions, and your actual take-home pay with detailed breakdowns.')

@section('keywords', 'net income calculator, gross income calculator, take-home pay, salary calculator, tax calculator, income after taxes')

@section('canonical', url('/calculators/net-gross-income'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Net vs Gross Income Calculator",
    "description": "Calculate the difference between gross and net income with detailed tax and deduction breakdowns",
    "url": "{{ url('/calculators/net-gross-income') }}",
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

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
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
                    <li class="text-gray-500">Net vs Gross Income Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Net vs Gross Income Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Understand the difference between your gross income and actual take-home pay. Calculate taxes, deductions, and see exactly where your money goes.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Income Details</h2>
                        <p class="text-gray-600 mb-6">Enter your income information and deductions</p>
                        
                        <form id="incomeCalculatorForm" class="space-y-6">
                            <!-- Income Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Income Type
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button" onclick="setIncomeType('salary')" class="income-type-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-user-tie text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">Salaried</div>
                                    </button>
                                    <button type="button" onclick="setIncomeType('hourly')" class="income-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-clock text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">Hourly</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Basic Income Information -->
                            <div id="salaryInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="annualSalary" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Annual Gross Salary
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="annualSalary" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 60000" 
                                                min="0"
                                                step="1000"
                                                value="60000"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Your total income before any deductions</p>
                                    </div>
                                    <div>
                                        <label for="payFrequency" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Pay Frequency
                                        </label>
                                        <select 
                                            id="payFrequency" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                            <option value="weekly">Weekly</option>
                                            <option value="biweekly" selected>Bi-Weekly</option>
                                            <option value="semimonthly">Semi-Monthly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="annual">Annual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Hourly Inputs -->
                            <div id="hourlyInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="hourlyRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Hourly Rate
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="hourlyRate" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 25" 
                                                min="0"
                                                step="0.01"
                                                value="25"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="hoursPerWeek" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Hours per Week
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="hoursPerWeek" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 40" 
                                                min="0"
                                                max="168"
                                                step="0.5"
                                                value="40"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">hours</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="weeksPerYear" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Weeks Worked per Year
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="weeksPerYear" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 52" 
                                                min="1"
                                                max="52"
                                                step="1"
                                                value="52"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">weeks</span>
                                        </div>
                                    </div>
                                    <div class="flex items-end">
                                        <p class="text-xs text-gray-500">Standard full-time is 52 weeks</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tax Information -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Tax Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="filingStatus" class="block text-xs font-medium text-blue-700 mb-2">
                                            Filing Status
                                        </label>
                                        <select 
                                            id="filingStatus" 
                                            class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                            <option value="single">Single</option>
                                            <option value="married" selected>Married Filing Jointly</option>
                                            <option value="head">Head of Household</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="state" class="block text-xs font-medium text-blue-700 mb-2">
                                            State
                                        </label>
                                        <select 
                                            id="state" 
                                            class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                            <option value="ca">California</option>
                                            <option value="ny">New York</option>
                                            <option value="tx">Texas</option>
                                            <option value="fl">Florida</option>
                                            <option value="il">Illinois</option>
                                            <option value="pa">Pennsylvania</option>
                                            <option value="other" selected>Other States</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Common Salary Levels -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Common Salary Levels
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setSalaryLevel(30000)" class="salary-level-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-user-graduate text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Entry Level</div>
                                        <div class="text-xs text-gray-500">$30,000</div>
                                    </button>
                                    <button type="button" onclick="setSalaryLevel(50000)" class="salary-level-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-user text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Mid Level</div>
                                        <div class="text-xs text-gray-500">$50,000</div>
                                    </button>
                                    <button type="button" onclick="setSalaryLevel(75000)" class="salary-level-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-user-tie text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Senior</div>
                                        <div class="text-xs text-gray-500">$75,000</div>
                                    </button>
                                    <button type="button" onclick="setSalaryLevel(100000)" class="salary-level-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-crown text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Manager</div>
                                        <div class="text-xs text-gray-500">$100,000</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Deductions & Benefits -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Deductions & Benefits</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="retirementContribution" class="block text-xs font-medium text-green-700 mb-2">
                                            401(k) Contribution
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="retirementContribution" 
                                                class="w-full pl-4 pr-12 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 6" 
                                                min="0"
                                                max="100"
                                                step="0.5"
                                                value="6"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="healthInsurance" class="block text-xs font-medium text-green-700 mb-2">
                                            Health Insurance
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="healthInsurance" 
                                                class="w-full pl-4 pr-12 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 200" 
                                                min="0"
                                                step="10"
                                                value="200"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">$/month</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                                    <div>
                                        <label for="otherDeductions" class="block text-xs font-medium text-green-700 mb-2">
                                            Other Deductions
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="otherDeductions" 
                                                class="w-full pl-4 pr-12 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 100" 
                                                min="0"
                                                step="10"
                                                value="100"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">$/month</span>
                                        </div>
                                    </div>
                                    <div class="flex items-end">
                                        <p class="text-xs text-green-600">Includes union dues, insurance, etc.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateIncome()"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Net Income
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Income Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-money-bill-wave text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your income details</p>
                                <p class="text-sm">to see your net vs gross comparison</p>
                            </div>
                        </div>

                        <!-- Income Comparison -->
                        <div id="incomeComparison" class="mt-6 p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3 text-center">Gross vs Net</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Gross Income:</span>
                                    <span class="font-medium text-gray-800" id="grossIncomeResult">$0</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Net Income:</span>
                                    <span class="font-bold text-green-600" id="netIncomeResult">$0</span>
                                </div>
                                <div class="pt-2 border-t border-blue-200">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Difference:</span>
                                        <span class="font-medium text-red-600" id="incomeDifference">$0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Income Comparison Cards -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Income Breakdown</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="annualGrossIncome">$0</div>
                            <div class="text-lg font-semibold text-gray-700">Annual Gross Income</div>
                            <div class="text-sm text-gray-500 mt-1">Before any deductions</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="annualNetIncome">$0</div>
                            <div class="text-lg font-semibold text-gray-700">Annual Net Income</div>
                            <div class="text-sm text-gray-500 mt-1">Your take-home pay</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="effectiveTaxRate">0%</div>
                            <div class="text-lg font-semibold text-gray-700">Effective Tax Rate</div>
                            <div class="text-sm text-gray-500 mt-1">Total taxes as % of income</div>
                        </div>
                    </div>
                </div>

                <!-- Pay Period Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pay Period Breakdown</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <h4 class="font-semibold text-gray-800 mb-3">Current Pay Period</h4>
                                <div class="space-y-2 text-sm" id="currentPeriod">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <h4 class="font-semibold text-gray-800 mb-3">Annual Summary</h4>
                                <div class="space-y-2 text-sm" id="annualSummary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deductions Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Where Your Money Goes</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Tax Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tax Deductions</h3>
                            <div class="space-y-3" id="taxDeductions">
                            </div>
                        </div>
                        
                        <!-- Voluntary Deductions -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Voluntary Deductions</h3>
                            <div class="space-y-3" id="voluntaryDeductions">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visual Comparison -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Income Distribution</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Pie Chart Placeholder -->
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Income Allocation</h3>
                            <div class="h-64 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-40 h-40 bg-gradient-to-br from-blue-100 to-indigo-200 rounded-full mx-auto mb-4 flex items-center justify-center shadow-inner">
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-gray-700" id="takeHomePercent">0%</div>
                                            <div class="text-xs text-gray-600">Take Home</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-xs mt-4">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                                    <span>Take Home Pay</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded mr-2"></div>
                                    <span>Federal Tax</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <span>FICA Taxes</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-purple-500 rounded mr-2"></div>
                                    <span>State Tax</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-orange-500 rounded mr-2"></div>
                                    <span>Retirement</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-yellow-500 rounded mr-2"></div>
                                    <span>Insurance</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Monthly Budget Impact -->
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Monthly Impact</h3>
                            <div class="space-y-4" id="monthlyImpact">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Understanding Income -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Gross vs Net Income</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-money-bill-wave text-green-600 mr-2"></i>
                            What is Gross Income?
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Gross income is your total earnings before any taxes or deductions are taken out. This includes:
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Salary or wages before deductions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Bonuses and commissions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Overtime pay</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Tips and other compensation</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-wallet text-blue-600 mr-2"></i>
                            What is Net Income?
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Net income (take-home pay) is what remains after all deductions. Key deductions include:
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span>Federal and state income taxes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span>Social Security and Medicare (FICA)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span>Health insurance premiums</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span>Retirement contributions</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Income Calculation FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why is there such a big difference between gross and net income?</h3>
                        <p class="text-gray-600">The difference comes from various mandatory deductions (federal/state taxes, Social Security, Medicare) and voluntary deductions (retirement contributions, health insurance). Typically, 25-35% of gross income goes to taxes and deductions.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I increase my net income?</h3>
                        <p class="text-gray-600">You can increase net income by adjusting tax withholdings (via W-4), optimizing retirement contributions, choosing more cost-effective insurance plans, or exploring tax-advantaged accounts like HSAs and FSAs.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are all deductions bad?</h3>
                        <p class="text-gray-600">No! Many deductions provide future benefits. Retirement contributions grow tax-deferred, health insurance protects against medical costs, and some deductions may lower your taxable income, reducing your overall tax burden.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I review my income and deductions?</h3>
                        <p class="text-gray-600">Review your paycheck deductions at least annually, or whenever you experience major life changes (marriage, children, job change, significant salary increase). This helps ensure your withholdings and benefits align with your current situation.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between effective tax rate and marginal tax rate?</h3>
                        <p class="text-gray-600">Your marginal tax rate is the rate on your last dollar of income, while your effective tax rate is the average rate you pay on all your income. The effective rate is typically lower because of progressive tax brackets and deductions.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="{{ route('tax.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tax Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate income taxes and refunds</p>
                    </a>
                    <a href="{{ route('budget.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-pie text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Budget Calculator</h3>
                        <p class="text-gray-600 text-sm">Plan your monthly budget</p>
                    </a>
                    <a href="{{ route('salary.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-money-bill-wave text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Salary Converter</h3>
                        <p class="text-gray-600 text-sm">Convert hourly to annual salary</p>
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
let currentIncomeType = 'salary';

// State tax rates (simplified for demonstration)
const stateTaxRates = {
    'ca': { rate: 8.0, name: 'California' },
    'ny': { rate: 6.5, name: 'New York' },
    'tx': { rate: 0, name: 'Texas' },
    'fl': { rate: 0, name: 'Florida' },
    'il': { rate: 4.95, name: 'Illinois' },
    'pa': { rate: 3.07, name: 'Pennsylvania' },
    'other': { rate: 4.0, name: 'Other States' }
};

// Pay frequency multipliers
const payFrequencyMultipliers = {
    'weekly': 52,
    'biweekly': 26,
    'semimonthly': 24,
    'monthly': 12,
    'annual': 1
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateIncome(); // Calculate with default values
});

function setupEventListeners() {
    // Income type buttons
    document.querySelectorAll('.income-type-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            setIncomeType(this.getAttribute('onclick').match(/'([^']+)'/)[1]);
        });
    });

    // Salary level buttons
    document.querySelectorAll('.salary-level-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const salary = parseInt(this.getAttribute('onclick').match(/\((\d+)\)/)[1]);
            setSalaryLevel(salary);
        });
    });

    // Real-time calculation on input changes
    const inputs = ['annualSalary', 'hourlyRate', 'hoursPerWeek', 'weeksPerYear', 'retirementContribution', 'healthInsurance', 'otherDeductions'];
    inputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('input', debounce(calculateIncome, 300));
        }
    });

    // Real-time calculation on select changes
    const selects = ['payFrequency', 'filingStatus', 'state'];
    selects.forEach(selectId => {
        document.getElementById(selectId).addEventListener('change', debounce(calculateIncome, 300));
    });
}

function setIncomeType(type) {
    currentIncomeType = type;
    
    // Update button styles
    document.querySelectorAll('.income-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Activate current button
    const activeBtn = document.querySelector(`[onclick="setIncomeType('${type}')"]`);
    activeBtn.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    activeBtn.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    
    // Show/hide input sections
    document.getElementById('salaryInputs').classList.toggle('hidden', type !== 'salary');
    document.getElementById('hourlyInputs').classList.toggle('hidden', type !== 'hourly');
    
    calculateIncome();
}

function setSalaryLevel(salary) {
    document.getElementById('annualSalary').value = salary;
    calculateIncome();
}

function calculateIncome() {
    let grossIncomeAnnual = 0;
    
    // Calculate gross income based on income type
    if (currentIncomeType === 'salary') {
        grossIncomeAnnual = parseFloat(document.getElementById('annualSalary').value) || 0;
    } else if (currentIncomeType === 'hourly') {
        const hourlyRate = parseFloat(document.getElementById('hourlyRate').value) || 0;
        const hoursPerWeek = parseFloat(document.getElementById('hoursPerWeek').value) || 0;
        const weeksPerYear = parseFloat(document.getElementById('weeksPerYear').value) || 0;
        
        grossIncomeAnnual = hourlyRate * hoursPerWeek * weeksPerYear;
    }
    
    // Calculate taxes
    const taxResults = calculateTaxes(grossIncomeAnnual);
    
    // Calculate deductions
    const deductionResults = calculateDeductions(grossIncomeAnnual);
    
    // Calculate net income
    const netIncomeAnnual = grossIncomeAnnual - taxResults.totalAnnual - deductionResults.totalAnnual;
    
    // Update results
    updateResults({
        grossIncomeAnnual,
        netIncomeAnnual,
        taxResults,
        deductionResults
    });
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
}

function calculateTaxes(grossIncomeAnnual) {
    const filingStatus = document.getElementById('filingStatus').value;
    const state = document.getElementById('state').value;
    
    // Federal tax calculation (simplified 2024 brackets)
    let federalTax = 0;
    if (filingStatus === 'married') {
        if (grossIncomeAnnual <= 23200) federalTax = grossIncomeAnnual * 0.10;
        else if (grossIncomeAnnual <= 94300) federalTax = 2320 + (grossIncomeAnnual - 23200) * 0.12;
        else if (grossIncomeAnnual <= 201050) federalTax = 10834 + (grossIncomeAnnual - 94300) * 0.22;
        else if (grossIncomeAnnual <= 383900) federalTax = 34474 + (grossIncomeAnnual - 201050) * 0.24;
        else federalTax = 78054 + (grossIncomeAnnual - 383900) * 0.32;
    } else { // single
        if (grossIncomeAnnual <= 11600) federalTax = grossIncomeAnnual * 0.10;
        else if (grossIncomeAnnual <= 47150) federalTax = 1160 + (grossIncomeAnnual - 11600) * 0.12;
        else if (grossIncomeAnnual <= 100525) federalTax = 5426 + (grossIncomeAnnual - 47150) * 0.22;
        else if (grossIncomeAnnual <= 191950) federalTax = 17168 + (grossIncomeAnnual - 100525) * 0.24;
        else federalTax = 39028 + (grossIncomeAnnual - 191950) * 0.32;
    }
    
    // FICA taxes
    const socialSecurity = Math.min(grossIncomeAnnual, 168600) * 0.062;
    const medicare = grossIncomeAnnual * 0.0145;
    
    // State tax
    const stateTaxRate = stateTaxRates[state].rate / 100;
    const stateTax = grossIncomeAnnual * stateTaxRate;
    
    const totalAnnual = federalTax + socialSecurity + medicare + stateTax;
    
    return {
        federalTax,
        socialSecurity,
        medicare,
        stateTax,
        totalAnnual,
        effectiveRate: (totalAnnual / grossIncomeAnnual) * 100
    };
}

function calculateDeductions(grossIncomeAnnual) {
    // Retirement contribution
    const retirementRate = parseFloat(document.getElementById('retirementContribution').value) || 0;
    const retirementAnnual = grossIncomeAnnual * (retirementRate / 100);
    
    // Health insurance (annualize monthly cost)
    const healthInsuranceMonthly = parseFloat(document.getElementById('healthInsurance').value) || 0;
    const healthInsuranceAnnual = healthInsuranceMonthly * 12;
    
    // Other deductions (annualize monthly cost)
    const otherDeductionsMonthly = parseFloat(document.getElementById('otherDeductions').value) || 0;
    const otherDeductionsAnnual = otherDeductionsMonthly * 12;
    
    const totalAnnual = retirementAnnual + healthInsuranceAnnual + otherDeductionsAnnual;
    
    return {
        retirementAnnual,
        healthInsuranceAnnual,
        otherDeductionsAnnual,
        totalAnnual
    };
}

function updateResults(data) {
    const payFrequency = document.getElementById('payFrequency').value;
    const periodsPerYear = payFrequencyMultipliers[payFrequency];
    
    // Calculate period amounts
    const grossIncomePeriod = data.grossIncomeAnnual / periodsPerYear;
    const netIncomePeriod = data.netIncomeAnnual / periodsPerYear;
    const differencePeriod = grossIncomePeriod - netIncomePeriod;
    
    // Update main results card
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <span class="text-gray-600">Gross Income:</span>
                <span class="text-xl font-bold text-gray-900">$${formatCurrency(grossIncomePeriod)}</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <span class="text-gray-600">Net Income:</span>
                <span class="text-xl font-bold text-green-600">$${formatCurrency(netIncomePeriod)}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Taxes & Deductions:</span>
                <span class="text-lg font-semibold text-red-600">$${formatCurrency(differencePeriod)}</span>
            </div>
        </div>
    `;
    
    // Update income comparison
    document.getElementById('incomeComparison').classList.remove('hidden');
    document.getElementById('grossIncomeResult').textContent = `$${formatCurrency(grossIncomePeriod)}`;
    document.getElementById('netIncomeResult').textContent = `$${formatCurrency(netIncomePeriod)}`;
    document.getElementById('incomeDifference').textContent = `$${formatCurrency(differencePeriod)}`;
    
    // Update detailed results
    document.getElementById('annualGrossIncome').textContent = `$${formatCurrency(data.grossIncomeAnnual)}`;
    document.getElementById('annualNetIncome').textContent = `$${formatCurrency(data.netIncomeAnnual)}`;
    document.getElementById('effectiveTaxRate').textContent = `${data.taxResults.effectiveRate.toFixed(1)}%`;
    
    // Update pay period breakdown
    updatePayPeriodBreakdown(data, periodsPerYear);
    
    // Update deductions breakdown
    updateDeductionsBreakdown(data);
    
    // Update visual elements
    updateVisualElements(data);
}

function updatePayPeriodBreakdown(data, periodsPerYear) {
    document.getElementById('currentPeriod').innerHTML = `
        <div class="flex justify-between">
            <span>Gross Pay:</span>
            <span>$${formatCurrency(data.grossIncomeAnnual / periodsPerYear)}</span>
        </div>
        <div class="flex justify-between">
            <span>Net Pay:</span>
            <span class="text-green-600">$${formatCurrency(data.netIncomeAnnual / periodsPerYear)}</span>
        </div>
        <div class="flex justify-between">
            <span>Taxes:</span>
            <span class="text-red-600">$${formatCurrency(data.taxResults.totalAnnual / periodsPerYear)}</span>
        </div>
        <div class="flex justify-between">
            <span>Deductions:</span>
            <span class="text-orange-600">$${formatCurrency(data.deductionResults.totalAnnual / periodsPerYear)}</span>
        </div>
    `;
    
    document.getElementById('annualSummary').innerHTML = `
        <div class="flex justify-between">
            <span>Annual Gross:</span>
            <span>$${formatCurrency(data.grossIncomeAnnual)}</span>
        </div>
        <div class="flex justify-between">
            <span>Annual Net:</span>
            <span class="text-green-600">$${formatCurrency(data.netIncomeAnnual)}</span>
        </div>
        <div class="flex justify-between">
            <span>Total Taxes:</span>
            <span class="text-red-600">$${formatCurrency(data.taxResults.totalAnnual)}</span>
        </div>
        <div class="flex justify-between">
            <span>Total Deductions:</span>
            <span class="text-orange-600">$${formatCurrency(data.deductionResults.totalAnnual)}</span>
        </div>
    `;
}

function updateDeductionsBreakdown(data) {
    document.getElementById('taxDeductions').innerHTML = `
        <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg mb-2">
            <span>Federal Income Tax</span>
            <span class="font-semibold text-red-700">$${formatCurrency(data.taxResults.federalTax)}</span>
        </div>
        <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg mb-2">
            <span>Social Security</span>
            <span class="font-semibold text-red-700">$${formatCurrency(data.taxResults.socialSecurity)}</span>
        </div>
        <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg mb-2">
            <span>Medicare</span>
            <span class="font-semibold text-red-700">$${formatCurrency(data.taxResults.medicare)}</span>
        </div>
        <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg">
            <span>State Income Tax</span>
            <span class="font-semibold text-red-700">$${formatCurrency(data.taxResults.stateTax)}</span>
        </div>
    `;
    
    document.getElementById('voluntaryDeductions').innerHTML = `
        <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg mb-2">
            <span>401(k) Contribution</span>
            <span class="font-semibold text-blue-700">$${formatCurrency(data.deductionResults.retirementAnnual)}</span>
        </div>
        <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg mb-2">
            <span>Health Insurance</span>
            <span class="font-semibold text-blue-700">$${formatCurrency(data.deductionResults.healthInsuranceAnnual)}</span>
        </div>
        <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
            <span>Other Deductions</span>
            <span class="font-semibold text-blue-700">$${formatCurrency(data.deductionResults.otherDeductionsAnnual)}</span>
        </div>
    `;
}

function updateVisualElements(data) {
    // Calculate percentages for visual representation
    const takeHomePercent = (data.netIncomeAnnual / data.grossIncomeAnnual) * 100;
    const federalTaxPercent = (data.taxResults.federalTax / data.grossIncomeAnnual) * 100;
    const ficaTaxPercent = ((data.taxResults.socialSecurity + data.taxResults.medicare) / data.grossIncomeAnnual) * 100;
    const stateTaxPercent = (data.taxResults.stateTax / data.grossIncomeAnnual) * 100;
    const retirementPercent = (data.deductionResults.retirementAnnual / data.grossIncomeAnnual) * 100;
    const insurancePercent = (data.deductionResults.healthInsuranceAnnual / data.grossIncomeAnnual) * 100;
    
    // Update take home percentage
    document.getElementById('takeHomePercent').textContent = `${takeHomePercent.toFixed(1)}%`;
    
    // Update monthly impact
    const monthlyGross = data.grossIncomeAnnual / 12;
    const monthlyNet = data.netIncomeAnnual / 12;
    
    document.getElementById('monthlyImpact').innerHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Monthly Gross Income</span>
            <span class="font-medium">$${formatCurrency(monthlyGross)}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Monthly Net Income</span>
            <span class="font-bold text-green-600">$${formatCurrency(monthlyNet)}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Monthly Taxes</span>
            <span class="font-medium text-red-600">$${formatCurrency(data.taxResults.totalAnnual / 12)}</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-600">Monthly Deductions</span>
            <span class="font-medium text-orange-600">$${formatCurrency(data.deductionResults.totalAnnual / 12)}</span>
        </div>
    `;
}

function formatCurrency(amount) {
    return Math.round(amount).toLocaleString('en-US');
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

// Export functions for global access
window.calculateIncome = calculateIncome;
window.setIncomeType = setIncomeType;
window.setSalaryLevel = setSalaryLevel;
</script>
@endsection