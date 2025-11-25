@extends('layouts.app')

@section('title', 'Payroll Calculator - Calculate Salary, Taxes & Take-Home Pay | CalculaterTools')

@section('meta-description', 'Free payroll calculator to calculate gross pay, deductions, taxes, and net take-home pay. Perfect for employers and employees.')

@section('keywords', 'payroll calculator, salary calculator, tax calculator, take-home pay, gross pay, net pay, payroll taxes, salary deduction')

@section('canonical', url('/calculators/payroll'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Payroll Calculator",
    "description": "Calculate salary, taxes, deductions, and net take-home pay",
    "url": "{{ url('/calculators/payroll') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
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
                        <a href="#finance" class="text-blue-600 hover:text-blue-800 transition duration-150">Financial Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Payroll Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Payroll Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate gross pay, deductions, taxes, and net take-home pay for employees and contractors.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Payroll</h2>
                        <p class="text-gray-600 mb-6">Enter employee details and compensation information</p>
                        
                        <form id="payrollCalculatorForm" class="space-y-6">
                            <!-- Employee Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Employee Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setEmployeeType('salaried')" class="employee-type-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-user-tie text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">Salaried</div>
                                    </button>
                                    <button type="button" onclick="setEmployeeType('hourly')" class="employee-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-clock text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">Hourly</div>
                                    </button>
                                    <button type="button" onclick="setEmployeeType('contractor')" class="employee-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-file-contract text-purple-600 text-lg mb-1"></i>
                                        <div class="text-sm">Contractor</div>
                                    </button>
                                    <button type="button" onclick="setEmployeeType('commission')" class="employee-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-chart-line text-orange-600 text-lg mb-1"></i>
                                        <div class="text-sm">Commission</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Basic Compensation -->
                            <div id="salariedInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="annualSalary" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Annual Salary
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
                                        <p class="text-xs text-gray-500 mt-1">Gross annual salary before taxes</p>
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
                                        <label for="hoursWorked" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Hours Worked
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="hoursWorked" 
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
                                        <label for="overtimeHours" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Overtime Hours
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="overtimeHours" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 5" 
                                                min="0"
                                                max="80"
                                                step="0.5"
                                                value="0"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">hours</span>
                                        </div>
                                    </div>
                                    <div class="flex items-end">
                                        <p class="text-xs text-gray-500">Overtime rate: 1.5x regular rate</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Location & Taxes -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="filingStatus" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Filing Status
                                    </label>
                                    <select 
                                        id="filingStatus" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                        <option value="single">Single</option>
                                        <option value="married" selected>Married Filing Jointly</option>
                                        <option value="head">Head of Household</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-semibold text-gray-800 mb-2">
                                        State
                                    </label>
                                    <select 
                                        id="state" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
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
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-3">Deductions & Benefits</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="retirementContribution" class="block text-sm font-medium text-gray-700 mb-2">
                                            401(k) Contribution
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="retirementContribution" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
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
                                        <label for="healthInsurance" class="block text-sm font-medium text-gray-700 mb-2">
                                            Health Insurance
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="healthInsurance" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="e.g., 200" 
                                                min="0"
                                                step="10"
                                                value="200"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">$/month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h4 class="font-semibold text-blue-800 mb-3">Additional Options</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" id="includeBonus" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-blue-700">Include annual bonus</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" id="includeOvertime" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                                        <span class="ml-2 text-sm text-blue-700">Include overtime pay</span>
                                    </label>
                                </div>
                                <div id="bonusSection" class="mt-3 hidden">
                                    <label for="annualBonus" class="block text-sm font-medium text-blue-700 mb-2">
                                        Annual Bonus Amount
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="annualBonus" 
                                            class="w-full pl-4 pr-12 py-2 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., 5000" 
                                            min="0"
                                            step="100"
                                            value="5000"
                                        >
                                        <span class="absolute right-3 top-2 text-blue-500">$</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculatePayroll()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Payroll
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Payroll Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-money-check-alt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter payroll details</p>
                                <p class="text-sm">to see calculation results</p>
                            </div>
                        </div>

                        <!-- Tax Breakdown -->
                        <div id="taxBreakdown" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Tax Breakdown</h4>
                            <div class="space-y-2 text-sm" id="taxContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Payroll Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="grossPay">$0</div>
                        <div class="text-blue-800 font-medium">Gross Pay</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="netPay">$0</div>
                        <div class="text-green-800 font-medium">Net Pay</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="totalTaxes">$0</div>
                        <div class="text-purple-800 font-medium">Total Taxes</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="effectiveTaxRate">0%</div>
                        <div class="text-orange-800 font-medium">Effective Tax Rate</div>
                    </div>
                </div>

                <!-- Pay Period Breakdown -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Pay Period Breakdown</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-blue-200">
                                <h4 class="font-semibold text-blue-800 mb-3">Current Pay Period</h4>
                                <div class="space-y-2 text-sm" id="currentPeriod">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-green-200">
                                <h4 class="font-semibold text-green-800 mb-3">Annual Summary</h4>
                                <div class="space-y-2 text-sm" id="annualSummary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deductions Breakdown -->
                <div class="bg-white rounded-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Deductions Breakdown</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-3">Tax Deductions</h4>
                            <div class="space-y-3 text-sm" id="taxDeductions">
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-3">Voluntary Deductions</h4>
                            <div class="space-y-3 text-sm" id="voluntaryDeductions">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salary Comparison -->
            <div id="salaryComparison" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Salary Comparison by State</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="comparisonContent">
                    <!-- State comparisons will be populated by JavaScript -->
                </div>
            </div>

            <!-- Payroll Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Payroll Calculations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calculator text-blue-600 mr-2"></i>
                            Key Payroll Components
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-arrow-up text-green-500 mt-1 mr-2"></i>
                                <span><strong>Gross Pay:</strong> Total earnings before any deductions</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span><strong>Federal Tax:</strong> Based on IRS tax brackets and filing status</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span><strong>FICA Taxes:</strong> Social Security (6.2%) and Medicare (1.45%)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-red-500 mt-1 mr-2"></i>
                                <span><strong>State Tax:</strong> Varies by state (0-13.3%)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dollar-sign text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Net Pay:</strong> Take-home pay after all deductions</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-green-600 mr-2"></i>
                            Payroll Best Practices
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Always calculate overtime for non-exempt employees</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Consider state and local tax requirements</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Account for retirement contributions and benefits</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Stay updated with changing tax laws and rates</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Provide clear pay stubs with detailed breakdowns</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- State Tax Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">State Income Tax Rates</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-600 mr-2"></i>
                            No Income Tax
                        </h3>
                        <div class="space-y-1 text-sm text-gray-600">
                            <div>Alaska</div>
                            <div>Florida</div>
                            <div>Nevada</div>
                            <div>New Hampshire</div>
                            <div>South Dakota</div>
                            <div>Tennessee</div>
                            <div>Texas</div>
                            <div>Washington</div>
                            <div>Wyoming</div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-percentage text-green-600 mr-2"></i>
                            Low Tax (0-5%)
                        </h3>
                        <div class="space-y-1 text-sm text-gray-600">
                            <div>Colorado: 4.55%</div>
                            <div>Illinois: 4.95%</div>
                            <div>Indiana: 3.23%</div>
                            <div>Michigan: 4.25%</div>
                            <div>North Carolina: 4.99%</div>
                            <div>Pennsylvania: 3.07%</div>
                            <div>Utah: 4.95%</div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-chart-line text-orange-600 mr-2"></i>
                            Medium Tax (5-8%)
                        </h3>
                        <div class="space-y-1 text-sm text-gray-600">
                            <div>Georgia: 5.75%</div>
                            <div>Maryland: 5.75%</div>
                            <div>Minnesota: 5.35-9.85%</div>
                            <div>Missouri: 5.4%</div>
                            <div>New Mexico: 4.9%</div>
                            <div>Virginia: 5.75%</div>
                            <div>Wisconsin: 3.54-7.65%</div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                            High Tax (8%+)
                        </h3>
                        <div class="space-y-1 text-sm text-gray-600">
                            <div>California: 1-13.3%</div>
                            <div>Hawaii: 1.4-11%</div>
                            <div>New Jersey: 1.4-10.75%</div>
                            <div>New York: 4-10.9%</div>
                            <div>Oregon: 4.75-9.9%</div>
                            <div>Vermont: 3.35-8.75%</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Payroll Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between gross pay and net pay?</h3>
                        <p class="text-gray-600">Gross pay is your total earnings before any deductions. Net pay (take-home pay) is what you receive after all taxes, insurance, retirement contributions, and other deductions are subtracted.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How are federal taxes calculated?</h3>
                        <p class="text-gray-600">Federal taxes use progressive tax brackets. Your income is taxed at different rates as it moves through each bracket. The calculator uses 2024 tax brackets for married filing jointly: 10% up to $23,200, 12% up to $94,300, 22% up to $201,050, etc.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What are FICA taxes?</h3>
                        <p class="text-gray-600">FICA stands for Federal Insurance Contributions Act. It includes Social Security tax (6.2% on income up to $168,600) and Medicare tax (1.45% on all income). Self-employed individuals pay both employer and employee portions.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does overtime pay work?</h3>
                        <p class="text-gray-600">Non-exempt employees must receive overtime pay at 1.5 times their regular rate for hours worked over 40 in a workweek. Some states have daily overtime rules or higher overtime rates.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between bi-weekly and semi-monthly pay?</h3>
                        <p class="text-gray-600">Bi-weekly pay means 26 pay periods per year (every two weeks). Semi-monthly pay means 24 pay periods per year (twice a month, e.g., 15th and last day). Annual salary divided by pay periods determines gross pay per period.</p>
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
                    <a href="{{ route('salary.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Salary Converter</h3>
                        <p class="text-gray-600 text-sm">Convert between hourly and salary</p>
                    </a>
                    <a href="{{ route('budget.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-pie text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Budget Calculator</h3>
                        <p class="text-gray-600 text-sm">Plan your monthly budget</p>
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
let currentEmployeeType = 'salaried';

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
    'monthly': 12
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    // Set up event listeners
    setupEventListeners();
    
    // Calculate initial payroll
    calculatePayroll();
});

function setupEventListeners() {
    // Employee type buttons
    document.querySelectorAll('.employee-type-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            setEmployeeType(this.getAttribute('onclick').match(/'([^']+)'/)[1]);
        });
    });

    // Salary level buttons
    document.querySelectorAll('.salary-level-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const salary = parseInt(this.getAttribute('onclick').match(/\((\d+)\)/)[1]);
            setSalaryLevel(salary);
        });
    });

    // Bonus checkbox
    document.getElementById('includeBonus').addEventListener('change', function() {
        document.getElementById('bonusSection').classList.toggle('hidden', !this.checked);
    });

    // Real-time calculation on input changes
    const inputs = ['annualSalary', 'hourlyRate', 'hoursWorked', 'overtimeHours', 'retirementContribution', 'healthInsurance'];
    inputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('input', calculatePayroll);
        }
    });

    // Real-time calculation on select changes
    const selects = ['payFrequency', 'filingStatus', 'state'];
    selects.forEach(selectId => {
        document.getElementById(selectId).addEventListener('change', calculatePayroll);
    });
}

function setEmployeeType(type) {
    currentEmployeeType = type;
    
    // Update button styles
    document.querySelectorAll('.employee-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Activate current button
    const activeBtn = document.querySelector(`[onclick="setEmployeeType('${type}')"]`);
    activeBtn.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    activeBtn.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    
    // Show/hide input sections
    document.getElementById('salariedInputs').classList.toggle('hidden', type !== 'salaried');
    document.getElementById('hourlyInputs').classList.toggle('hidden', type !== 'hourly');
    
    calculatePayroll();
}

function setSalaryLevel(salary) {
    document.getElementById('annualSalary').value = salary;
    calculatePayroll();
}

function calculatePayroll() {
    let grossPayAnnual = 0;
    let grossPayPeriod = 0;
    
    // Calculate gross pay based on employee type
    if (currentEmployeeType === 'salaried') {
        grossPayAnnual = parseFloat(document.getElementById('annualSalary').value) || 0;
        const payFrequency = document.getElementById('payFrequency').value;
        grossPayPeriod = grossPayAnnual / payFrequencyMultipliers[payFrequency];
    } else if (currentEmployeeType === 'hourly') {
        const hourlyRate = parseFloat(document.getElementById('hourlyRate').value) || 0;
        const hoursWorked = parseFloat(document.getElementById('hoursWorked').value) || 0;
        const overtimeHours = parseFloat(document.getElementById('overtimeHours').value) || 0;
        
        const regularPay = hourlyRate * Math.min(hoursWorked, 40);
        const overtimePay = hourlyRate * 1.5 * overtimeHours;
        grossPayPeriod = regularPay + overtimePay;
        
        // Estimate annual pay (assuming 52 weeks)
        grossPayAnnual = grossPayPeriod * 52;
    }
    
    // Add bonus if included
    if (document.getElementById('includeBonus').checked) {
        const bonus = parseFloat(document.getElementById('annualBonus').value) || 0;
        grossPayAnnual += bonus;
    }
    
    // Calculate taxes
    const taxResults = calculateTaxes(grossPayAnnual);
    
    // Calculate deductions
    const deductionResults = calculateDeductions(grossPayAnnual, grossPayPeriod);
    
    // Calculate net pay
    const netPayAnnual = grossPayAnnual - taxResults.totalAnnual - deductionResults.totalAnnual;
    const netPayPeriod = grossPayPeriod - taxResults.totalPeriod - deductionResults.totalPeriod;
    
    // Update results
    updateResults({
        grossPayAnnual,
        grossPayPeriod,
        netPayAnnual,
        netPayPeriod,
        taxResults,
        deductionResults
    });
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
    document.getElementById('salaryComparison').classList.remove('hidden');
}

function calculateTaxes(grossPayAnnual) {
    const filingStatus = document.getElementById('filingStatus').value;
    const state = document.getElementById('state').value;
    
    // Federal tax calculation (simplified 2024 brackets)
    let federalTax = 0;
    if (filingStatus === 'married') {
        if (grossPayAnnual <= 23200) federalTax = grossPayAnnual * 0.10;
        else if (grossPayAnnual <= 94300) federalTax = 2320 + (grossPayAnnual - 23200) * 0.12;
        else if (grossPayAnnual <= 201050) federalTax = 10834 + (grossPayAnnual - 94300) * 0.22;
        else if (grossPayAnnual <= 383900) federalTax = 34474 + (grossPayAnnual - 201050) * 0.24;
        else federalTax = 78054 + (grossPayAnnual - 383900) * 0.32;
    } else { // single
        if (grossPayAnnual <= 11600) federalTax = grossPayAnnual * 0.10;
        else if (grossPayAnnual <= 47150) federalTax = 1160 + (grossPayAnnual - 11600) * 0.12;
        else if (grossPayAnnual <= 100525) federalTax = 5426 + (grossPayAnnual - 47150) * 0.22;
        else if (grossPayAnnual <= 191950) federalTax = 17168 + (grossPayAnnual - 100525) * 0.24;
        else federalTax = 39028 + (grossPayAnnual - 191950) * 0.32;
    }
    
    // FICA taxes
    const socialSecurity = Math.min(grossPayAnnual, 168600) * 0.062;
    const medicare = grossPayAnnual * 0.0145;
    
    // State tax
    const stateTaxRate = stateTaxRates[state].rate / 100;
    const stateTax = grossPayAnnual * stateTaxRate;
    
    const totalAnnual = federalTax + socialSecurity + medicare + stateTax;
    const totalPeriod = totalAnnual / 26; // Default to bi-weekly for period calculation
    
    return {
        federalTax,
        socialSecurity,
        medicare,
        stateTax,
        totalAnnual,
        totalPeriod,
        effectiveRate: (totalAnnual / grossPayAnnual) * 100
    };
}

function calculateDeductions(grossPayAnnual, grossPayPeriod) {
    // Retirement contribution
    const retirementRate = parseFloat(document.getElementById('retirementContribution').value) || 0;
    const retirementAnnual = grossPayAnnual * (retirementRate / 100);
    const retirementPeriod = grossPayPeriod * (retirementRate / 100);
    
    // Health insurance (annualize monthly cost)
    const healthInsuranceMonthly = parseFloat(document.getElementById('healthInsurance').value) || 0;
    const healthInsuranceAnnual = healthInsuranceMonthly * 12;
    const healthInsurancePeriod = healthInsuranceAnnual / 26; // Bi-weekly
    
    const totalAnnual = retirementAnnual + healthInsuranceAnnual;
    const totalPeriod = retirementPeriod + healthInsurancePeriod;
    
    return {
        retirementAnnual,
        retirementPeriod,
        healthInsuranceAnnual,
        healthInsurancePeriod,
        totalAnnual,
        totalPeriod
    };
}

function updateResults(data) {
    // Update main results card
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <span class="text-gray-600">Gross Pay:</span>
                <span class="text-xl font-bold text-gray-900">$${formatCurrency(data.grossPayPeriod)}</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <span class="text-gray-600">Net Pay:</span>
                <span class="text-xl font-bold text-green-600">$${formatCurrency(data.netPayPeriod)}</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <span class="text-gray-600">Taxes:</span>
                <span class="text-lg font-semibold text-red-600">$${formatCurrency(data.taxResults.totalPeriod)}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Deductions:</span>
                <span class="text-lg font-semibold text-orange-600">$${formatCurrency(data.deductionResults.totalPeriod)}</span>
            </div>
        </div>
    `;
    
    // Update tax breakdown
    const taxContent = document.getElementById('taxContent');
    taxContent.innerHTML = `
        <div class="flex justify-between">
            <span>Federal Tax:</span>
            <span>$${formatCurrency(data.taxResults.federalTax / 26)}</span>
        </div>
        <div class="flex justify-between">
            <span>Social Security:</span>
            <span>$${formatCurrency(data.taxResults.socialSecurity / 26)}</span>
        </div>
        <div class="flex justify-between">
            <span>Medicare:</span>
            <span>$${formatCurrency(data.taxResults.medicare / 26)}</span>
        </div>
        <div class="flex justify-between">
            <span>State Tax:</span>
            <span>$${formatCurrency(data.taxResults.stateTax / 26)}</span>
        </div>
    `;
    document.getElementById('taxBreakdown').classList.remove('hidden');
    
    // Update detailed results
    document.getElementById('grossPay').textContent = `$${formatCurrency(data.grossPayAnnual)}`;
    document.getElementById('netPay').textContent = `$${formatCurrency(data.netPayAnnual)}`;
    document.getElementById('totalTaxes').textContent = `$${formatCurrency(data.taxResults.totalAnnual)}`;
    document.getElementById('effectiveTaxRate').textContent = `${data.taxResults.effectiveRate.toFixed(1)}%`;
    
    // Update pay period breakdown
    updatePayPeriodBreakdown(data);
    
    // Update deductions breakdown
    updateDeductionsBreakdown(data);
    
    // Update salary comparison
    updateSalaryComparison(data.grossPayAnnual);
}

function updatePayPeriodBreakdown(data) {
    const payFrequency = document.getElementById('payFrequency').value;
    const periodsPerYear = payFrequencyMultipliers[payFrequency];
    
    document.getElementById('currentPeriod').innerHTML = `
        <div class="flex justify-between">
            <span>Gross Pay:</span>
            <span>$${formatCurrency(data.grossPayAnnual / periodsPerYear)}</span>
        </div>
        <div class="flex justify-between">
            <span>Net Pay:</span>
            <span class="text-green-600">$${formatCurrency(data.netPayAnnual / periodsPerYear)}</span>
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
            <span>$${formatCurrency(data.grossPayAnnual)}</span>
        </div>
        <div class="flex justify-between">
            <span>Annual Net:</span>
            <span class="text-green-600">$${formatCurrency(data.netPayAnnual)}</span>
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
        <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
            <span>Federal Income Tax</span>
            <span class="font-semibold">$${formatCurrency(data.taxResults.federalTax)}</span>
        </div>
        <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
            <span>Social Security</span>
            <span class="font-semibold">$${formatCurrency(data.taxResults.socialSecurity)}</span>
        </div>
        <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
            <span>Medicare</span>
            <span class="font-semibold">$${formatCurrency(data.taxResults.medicare)}</span>
        </div>
        <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
            <span>State Income Tax</span>
            <span class="font-semibold">$${formatCurrency(data.taxResults.stateTax)}</span>
        </div>
    `;
    
    document.getElementById('voluntaryDeductions').innerHTML = `
        <div class="flex justify-between items-center p-2 bg-blue-50 rounded">
            <span>401(k) Contribution</span>
            <span class="font-semibold">$${formatCurrency(data.deductionResults.retirementAnnual)}</span>
        </div>
        <div class="flex justify-between items-center p-2 bg-blue-50 rounded">
            <span>Health Insurance</span>
            <span class="font-semibold">$${formatCurrency(data.deductionResults.healthInsuranceAnnual)}</span>
        </div>
    `;
}

function updateSalaryComparison(baseSalary) {
    const comparisonContent = document.getElementById('comparisonContent');
    let html = '';
    
    Object.entries(stateTaxRates).forEach(([stateCode, stateData]) => {
        const stateTax = baseSalary * (stateData.rate / 100);
        const netSalary = baseSalary - stateTax;
        const difference = stateTax - (baseSalary * (stateTaxRates['other'].rate / 100));
        
        html += `
            <div class="border border-gray-200 rounded-lg p-4">
                <h3 class="font-semibold text-gray-900 mb-2">${stateData.name}</h3>
                <div class="text-2xl font-bold text-green-600 mb-2">$${formatCurrency(netSalary)}</div>
                <div class="text-sm text-gray-600">
                    <div>State Tax: ${stateData.rate}%</div>
                    <div class="${difference > 0 ? 'text-red-600' : 'text-green-600'}">
                        ${difference > 0 ? '+' : ''}$${formatCurrency(Math.abs(difference))} ${difference > 0 ? 'more' : 'less'} tax
                    </div>
                </div>
            </div>
        `;
    });
    
    comparisonContent.innerHTML = html;
}

function formatCurrency(amount) {
    return Math.round(amount).toLocaleString('en-US');
}

// Export function for global access
window.calculatePayroll = calculatePayroll;
window.setEmployeeType = setEmployeeType;
window.setSalaryLevel = setSalaryLevel;
</script>
@endsection