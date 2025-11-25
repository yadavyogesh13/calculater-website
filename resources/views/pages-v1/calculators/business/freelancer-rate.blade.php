@extends('layouts.app')

@section('title', 'Freelancer Hourly Rate Calculator | Set Your Freelance Rates | CalculaterTools')

@section('meta-description', 'Free freelancer hourly rate calculator to determine your ideal freelance rates based on expenses, desired income, billable hours, and market factors.')

@section('keywords', 'freelancer hourly rate calculator, freelance rate calculator, freelancer pricing, freelance hourly rate, consultant rates, freelance business')

@section('canonical', url('/calculators/freelancer-rate'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Freelancer Hourly Rate Calculator",
    "description": "Calculate your ideal freelance hourly rate based on expenses, desired income, and business costs",
    "url": "{{ url('/calculators/freelancer-rate') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

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
                        <a href="#business" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Business Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Freelancer Rate Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Freelancer Hourly Rate Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your ideal freelance hourly rate based on expenses, desired income, billable hours, and business costs. Set rates that ensure profitability and sustainability.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Rate</h2>
                        <p class="text-gray-600 mb-6">Enter your financial goals and business expenses</p>
                        
                        <form id="freelancerRateCalculatorForm" class="space-y-6">
                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" onclick="setCalculationMethod('comprehensive')" class="method-btn py-3 px-4 border-2 border-indigo-500 bg-indigo-50 text-indigo-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-calculator mr-2"></i>
                                        Comprehensive
                                    </button>
                                    <button type="button" onclick="setCalculationMethod('quick')" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-bolt mr-2"></i>
                                        Quick Estimate
                                    </button>
                                </div>
                            </div>

                            <!-- Income Goals -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Income Goals</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="desiredSalary" class="block text-xs font-medium text-green-700 mb-2">
                                            Desired Annual Salary ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="desiredSalary" 
                                                class="w-full pl-8 pr-4 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 75000" 
                                                min="10000" 
                                                max="1000000" 
                                                step="1000"
                                                value="75000"
                                                required
                                            >
                                        </div>
                                    </div>
                                    <div>
                                        <label for="additionalProfit" class="block text-xs font-medium text-green-700 mb-2">
                                            Additional Profit Margin ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="additionalProfit" 
                                                class="w-full pl-8 pr-4 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="e.g., 10000" 
                                                min="0" 
                                                max="500000" 
                                                step="1000"
                                                value="10000"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Work Schedule -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Work Schedule</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label for="workWeeks" class="block text-xs font-medium text-blue-700 mb-2">
                                            Work Weeks/Year
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="workWeeks" 
                                                class="w-full pl-4 pr-12 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 48" 
                                                min="1" 
                                                max="52" 
                                                step="1"
                                                value="48"
                                                required
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">weeks</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="workHours" class="block text-xs font-medium text-blue-700 mb-2">
                                            Hours/Week
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="workHours" 
                                                class="w-full pl-4 pr-12 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 40" 
                                                min="10" 
                                                max="80" 
                                                step="1"
                                                value="40"
                                                required
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">hours</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="billablePercentage" class="block text-xs font-medium text-blue-700 mb-2">
                                            Billable Time (%)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="billablePercentage" 
                                                class="w-full pl-4 pr-12 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 60" 
                                                min="10" 
                                                max="100" 
                                                step="1"
                                                value="60"
                                                required
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-blue-600 mt-2" id="billableHoursInfo">Based on your inputs: 0 billable hours/year</p>
                            </div>

                            <!-- Business Expenses -->
                            <div id="businessExpensesSection" class="bg-purple-50 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="text-sm font-semibold text-purple-800">Business Expenses</h3>
                                    <button type="button" onclick="toggleExpenseDetails()" class="text-purple-600 hover:text-purple-800 text-xs font-medium">
                                        <i class="fas fa-cog mr-1"></i>Customize
                                    </button>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="annualExpenses" class="block text-xs font-medium text-purple-700 mb-2">
                                            Total Annual Expenses ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="annualExpenses" 
                                                class="w-full pl-8 pr-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="e.g., 15000" 
                                                min="0" 
                                                max="500000" 
                                                step="1000"
                                                value="15000"
                                                required
                                            >
                                        </div>
                                    </div>
                                    <div>
                                        <label for="taxPercentage" class="block text-xs font-medium text-purple-700 mb-2">
                                            Tax Rate (%)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="taxPercentage" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="e.g., 25" 
                                                min="0" 
                                                max="50" 
                                                step="0.1"
                                                value="25"
                                                required
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Detailed Expenses (Hidden by default) -->
                                <div id="detailedExpenses" class="mt-4 space-y-3 hidden">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="softwareCosts" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="Software/Tools" 
                                                min="0" 
                                                max="50000" 
                                                step="100"
                                                value="2000"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">$</span>
                                        </div>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="marketingCosts" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="Marketing" 
                                                min="0" 
                                                max="50000" 
                                                step="100"
                                                value="3000"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">$</span>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="officeCosts" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="Office/Equipment" 
                                                min="0" 
                                                max="50000" 
                                                step="100"
                                                value="4000"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">$</span>
                                        </div>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="healthInsurance" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="Health Insurance" 
                                                min="0" 
                                                max="50000" 
                                                step="100"
                                                value="6000"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">$</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Experience & Skills -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Experience & Market Factors</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="experienceLevel" class="block text-xs font-medium text-amber-700 mb-2">
                                            Experience Level
                                        </label>
                                        <select id="experienceLevel" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                            <option value="1">Entry Level (0-2 years)</option>
                                            <option value="1.2">Junior (2-4 years)</option>
                                            <option value="1.5" selected>Mid-Level (4-7 years)</option>
                                            <option value="1.8">Senior (7-10 years)</option>
                                            <option value="2.2">Expert (10+ years)</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label for="skillDemand" class="block text-xs font-medium text-amber-700 mb-2">
                                            Skill Demand & Specialization
                                        </label>
                                        <select id="skillDemand" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                            <option value="1">Standard Skills (Average demand)</option>
                                            <option value="1.1" selected>High Demand Skills</option>
                                            <option value="1.25">Niche Specialization</option>
                                            <option value="1.4">Rare/Expert Skills</option>
                                        </select>
                                    </div>

                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="premiumClient" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                        >
                                        <label for="premiumClient" class="ml-2 text-xs text-amber-700">
                                            Premium/Corporate Clients
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Estimate Inputs -->
                            <div id="quickEstimateSection" class="bg-gray-50 rounded-lg p-4 hidden">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3">Quick Estimate</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="currentRate" class="block text-xs font-medium text-gray-700 mb-2">
                                            Current/Desired Rate ($)
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">$</span>
                                            </div>
                                            <input 
                                                type="number" 
                                                id="currentRate" 
                                                class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200"
                                                placeholder="e.g., 75" 
                                                min="10" 
                                                max="1000" 
                                                step="5"
                                                value="75"
                                            >
                                        </div>
                                    </div>
                                    <div>
                                        <label for="weeklyHours" class="block text-xs font-medium text-gray-700 mb-2">
                                            Weekly Billable Hours
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="weeklyHours" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition duration-200"
                                                placeholder="e.g., 25" 
                                                min="5" 
                                                max="60" 
                                                step="1"
                                                value="25"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">hours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateFreelancerRate()"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate My Rate
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Rate Analysis</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-user-tie text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see rate calculation</p>
                            </div>
                        </div>

                        <!-- Industry Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Industry Benchmarks</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Web Development</span>
                                    <span class="font-medium text-gray-800">$75-150/hr</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Graphic Design</span>
                                    <span class="font-medium text-gray-800">$50-100/hr</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Writing/Content</span>
                                    <span class="font-medium text-gray-800">$40-80/hr</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Rate Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Rate Recommendations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-indigo-50 rounded-lg border border-indigo-200">
                            <div class="text-2xl font-bold text-indigo-600 mb-2" id="minimumRate">$0</div>
                            <div class="text-lg font-semibold text-gray-700">Minimum Rate</div>
                            <div class="text-sm text-gray-500 mt-1">Break-even point</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-2xl font-bold text-green-600 mb-2" id="targetRate">$0</div>
                            <div class="text-lg font-semibold text-gray-700">Target Rate</div>
                            <div class="text-sm text-gray-500 mt-1">Recommended</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="premiumRate">$0</div>
                            <div class="text-lg font-semibold text-gray-700">Premium Rate</div>
                            <div class="text-sm text-gray-500 mt-1">Ideal clients</div>
                        </div>
                    </div>
                </div>

                <!-- Income Analysis -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Income Analysis</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Financial Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Financial Breakdown</h3>
                            <div class="space-y-4" id="financialBreakdown">
                            </div>
                        </div>
                        
                        <!-- Rate Comparison -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Rate Comparison</h3>
                            <div class="space-y-4" id="rateComparison">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Pricing Guide -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Project Pricing Guide</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="projectPricing">
                    </div>
                </div>

                <!-- Action Plan -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Freelancing Action Plan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Rate Strategy -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Pricing Strategy</h3>
                            <div class="space-y-3" id="pricingStrategy">
                            </div>
                        </div>
                        
                        <!-- Business Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Business Growth Tips</h3>
                            <div class="space-y-3" id="businessTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Freelancer Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Freelancer Success Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-contract text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Contract Essentials</h3>
                        <p class="text-gray-600">Always use detailed contracts specifying scope, payment terms, revisions, and intellectual property rights.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-piggy-bank text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Financial Management</h3>
                        <p class="text-gray-600">Set aside 25-30% for taxes, maintain separate business accounts, and track all expenses diligently.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bullseye text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Client Management</h3>
                        <p class="text-gray-600">Focus on value-based pricing, establish clear boundaries, and learn to identify ideal clients.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Rate Optimization</h3>
                        <p class="text-gray-600">Increase rates with existing clients annually and for new clients as your skills and portfolio grow.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Freelancer Pricing FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How much should I charge as a beginner freelancer?</h3>
                        <p class="text-gray-600">Start with 20-30% below market rates to build portfolio and experience, then increase rates every 6-12 months. Focus on delivering exceptional value rather than competing on price.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I charge hourly or by project?</h3>
                        <p class="text-gray-600">Project pricing is often better as you're paid for value delivered, not time spent. Use hourly for ongoing work or when scope is unclear. Many freelancers use hybrid models.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I handle clients who say my rates are too high?</h3>
                        <p class="text-gray-600">Focus on the value and ROI you provide. Explain your process, expertise, and results. Consider offering different service tiers or payment plans rather than lowering rates.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I raise my rates?</h3>
                        <p class="text-gray-600">Raise rates when you have consistent demand, improved skills, specialized expertise, or when taking on new clients. Give existing clients advance notice of rate changes.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How much should I account for non-billable time?</h3>
                        <p class="text-gray-600">Typically 30-40% of your time will be non-billable (marketing, admin, learning). Factor this into your rates. As you become established, aim for 60-70% billable time.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('profit.margin.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Profit Margin Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate business profitability</p>
                    </a>
                    {{-- <a href="{{ route('hourly.to.salary') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-exchange-alt text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Hourly to Salary</h3>
                        <p class="text-gray-600 text-sm">Convert hourly rates to salary</p>
                    </a>
                    <a href="{{ route('tax.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-receipt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Self-Employment Tax</h3>
                        <p class="text-gray-600 text-sm">Calculate freelance taxes</p>
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
let currentMethod = 'comprehensive';
let showExpenseDetails = false;

// Industry rate benchmarks
const industryRates = {
    'web-dev': { min: 75, max: 150, average: 100 },
    'design': { min: 50, max: 100, average: 70 },
    'writing': { min: 40, max: 80, average: 55 },
    'marketing': { min: 60, max: 120, average: 85 },
    'consulting': { min: 80, max: 200, average: 120 }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    updateBillableHours(); // Initial calculation
    calculateFreelancerRate(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change
    document.getElementById('desiredSalary').addEventListener('input', function() {
        updateBillableHours();
        debounce(calculateFreelancerRate, 300)();
    });
    document.getElementById('workWeeks').addEventListener('input', function() {
        updateBillableHours();
        debounce(calculateFreelancerRate, 300)();
    });
    document.getElementById('workHours').addEventListener('input', function() {
        updateBillableHours();
        debounce(calculateFreelancerRate, 300)();
    });
    document.getElementById('billablePercentage').addEventListener('input', function() {
        updateBillableHours();
        debounce(calculateFreelancerRate, 300)();
    });
    
    document.getElementById('annualExpenses').addEventListener('input', debounce(calculateFreelancerRate, 300));
    document.getElementById('taxPercentage').addEventListener('input', debounce(calculateFreelancerRate, 300));
    document.getElementById('experienceLevel').addEventListener('change', debounce(calculateFreelancerRate, 300));
    document.getElementById('skillDemand').addEventListener('change', debounce(calculateFreelancerRate, 300));
    document.getElementById('premiumClient').addEventListener('change', debounce(calculateFreelancerRate, 300));
    document.getElementById('currentRate').addEventListener('input', debounce(calculateFreelancerRate, 300));
    document.getElementById('weeklyHours').addEventListener('input', debounce(calculateFreelancerRate, 300));
}

function setCalculationMethod(method) {
    currentMethod = method;
    
    // Update button styles
    document.querySelectorAll('.method-btn').forEach(btn => {
        btn.classList.remove('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide sections based on method
    if (method === 'comprehensive') {
        document.getElementById('quickEstimateSection').classList.add('hidden');
        document.getElementById('businessExpensesSection').classList.remove('hidden');
        document.querySelectorAll('#businessExpensesSection input, #businessExpensesSection select').forEach(el => {
            el.disabled = false;
        });
    } else {
        document.getElementById('quickEstimateSection').classList.remove('hidden');
        document.getElementById('businessExpensesSection').classList.add('hidden');
    }
    
    calculateFreelancerRate();
}

function updateBillableHours() {
    const workWeeks = parseInt(document.getElementById('workWeeks').value) || 48;
    const workHours = parseInt(document.getElementById('workHours').value) || 40;
    const billablePercentage = parseInt(document.getElementById('billablePercentage').value) || 60;
    
        const totalHours = workWeeks * workHours;
    const billableHours = totalHours * (billablePercentage / 100);
    
    document.getElementById('billableHoursInfo').textContent = 
        `Based on your inputs: ${Math.round(billableHours)} billable hours/year`;
}

function toggleExpenseDetails() {
    showExpenseDetails = !showExpenseDetails;
    const detailsSection = document.getElementById('detailedExpenses');
    const toggleButton = event.target;
    
    if (showExpenseDetails) {
        detailsSection.classList.remove('hidden');
        toggleButton.innerHTML = '<i class="fas fa-times mr-1"></i>Hide Details';
    } else {
        detailsSection.classList.add('hidden');
        toggleButton.innerHTML = '<i class="fas fa-cog mr-1"></i>Customize';
    }
}

function calculateFreelancerRate() {
    if (currentMethod === 'comprehensive') {
        calculateComprehensiveRate();
    } else {
        calculateQuickEstimate();
    }
}

function calculateComprehensiveRate() {
    // Get input values
    const desiredSalary = parseFloat(document.getElementById('desiredSalary').value) || 75000;
    const additionalProfit = parseFloat(document.getElementById('additionalProfit').value) || 10000;
    const workWeeks = parseFloat(document.getElementById('workWeeks').value) || 48;
    const workHours = parseFloat(document.getElementById('workHours').value) || 40;
    const billablePercentage = parseFloat(document.getElementById('billablePercentage').value) || 60;
    const annualExpenses = parseFloat(document.getElementById('annualExpenses').value) || 15000;
    const taxPercentage = parseFloat(document.getElementById('taxPercentage').value) || 25;
    
    // Get detailed expenses if shown
    let totalExpenses = annualExpenses;
    if (showExpenseDetails) {
        const softwareCosts = parseFloat(document.getElementById('softwareCosts').value) || 2000;
        const marketingCosts = parseFloat(document.getElementById('marketingCosts').value) || 3000;
        const officeCosts = parseFloat(document.getElementById('officeCosts').value) || 4000;
        const healthInsurance = parseFloat(document.getElementById('healthInsurance').value) || 6000;
        totalExpenses = softwareCosts + marketingCosts + officeCosts + healthInsurance;
        document.getElementById('annualExpenses').value = totalExpenses;
    }
    
    // Get experience and market factors
    const experienceMultiplier = parseFloat(document.getElementById('experienceLevel').value) || 1.5;
    const skillMultiplier = parseFloat(document.getElementById('skillDemand').value) || 1.1;
    const premiumClient = document.getElementById('premiumClient').checked;
    
    // Calculate billable hours
    const totalHours = workWeeks * workHours;
    const billableHours = totalHours * (billablePercentage / 100);
    
    // Calculate required revenue
    const preTaxIncome = desiredSalary / (1 - (taxPercentage / 100));
    const requiredRevenue = preTaxIncome + additionalProfit + totalExpenses;
    
    // Calculate base rates
    const minimumRate = requiredRevenue / billableHours;
    const targetRate = minimumRate * experienceMultiplier * skillMultiplier;
    const premiumRate = targetRate * (premiumClient ? 1.3 : 1.15);
    
    // Display results
    displayResults(minimumRate, targetRate, premiumRate, billableHours, requiredRevenue, desiredSalary, totalExpenses);
}

function calculateQuickEstimate() {
    const currentRate = parseFloat(document.getElementById('currentRate').value) || 75;
    const weeklyHours = parseFloat(document.getElementById('weeklyHours').value) || 25;
    const workWeeks = parseFloat(document.getElementById('workWeeks').value) || 48;
    
    // Calculate annual income
    const annualIncome = currentRate * weeklyHours * workWeeks;
    
    // Adjust for expenses and taxes (rough estimate)
    const estimatedExpenses = annualIncome * 0.25; // 25% for expenses
    const estimatedTaxes = (annualIncome - estimatedExpenses) * 0.25; // 25% tax rate
    const netIncome = annualIncome - estimatedExpenses - estimatedTaxes;
    
    // Calculate suggested rates based on income goals
    const desiredSalary = parseFloat(document.getElementById('desiredSalary').value) || 75000;
    const additionalProfit = parseFloat(document.getElementById('additionalProfit').value) || 10000;
    
    const requiredRevenue = (desiredSalary + additionalProfit) / (1 - 0.25) + estimatedExpenses;
    const billableHours = weeklyHours * workWeeks;
    const targetRate = requiredRevenue / billableHours;
    
    const minimumRate = targetRate * 0.8;
    const premiumRate = targetRate * 1.3;
    
    displayResults(minimumRate, targetRate, premiumRate, billableHours, requiredRevenue, desiredSalary, estimatedExpenses);
}

function displayResults(minimumRate, targetRate, premiumRate, billableHours, requiredRevenue, desiredSalary, expenses) {
    // Format currency
    const formatCurrency = (amount) => `$${amount.toFixed(2)}`;
    const formatWhole = (amount) => `$${Math.round(amount)}`;
    
    // Update main rate cards
    document.getElementById('minimumRate').textContent = formatWhole(minimumRate);
    document.getElementById('targetRate').textContent = formatWhole(targetRate);
    document.getElementById('premiumRate').textContent = formatWhole(premiumRate);
    
    // Update results section
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        <div class="text-center mb-6">
            <div class="text-4xl font-bold text-indigo-600 mb-2">${formatWhole(targetRate)}/hr</div>
            <div class="text-lg text-gray-600">Recommended Target Rate</div>
        </div>
        
        <div class="space-y-4">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-600">Annual Billable Hours</span>
                <span class="font-semibold text-gray-800">${Math.round(billableHours)} hrs</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                <span class="text-green-600">Required Revenue</span>
                <span class="font-semibold text-green-800">${formatWhole(requiredRevenue)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                <span class="text-blue-600">After Expenses & Tax</span>
                <span class="font-semibold text-blue-800">~${formatWhole(desiredSalary)}</span>
            </div>
        </div>
    `;
    
    // Show reference section
    document.getElementById('referenceSection').classList.remove('hidden');
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update detailed sections
    updateFinancialBreakdown(minimumRate, targetRate, premiumRate, billableHours, requiredRevenue, expenses);
    updateRateComparison(targetRate);
    updateProjectPricing(targetRate);
    updateActionPlan(targetRate);
}

function updateFinancialBreakdown(minimumRate, targetRate, premiumRate, billableHours, requiredRevenue, expenses) {
    const financialBreakdown = document.getElementById('financialBreakdown');
    const formatWhole = (amount) => `$${Math.round(amount)}`;
    
    financialBreakdown.innerHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">At Minimum Rate (${formatWhole(minimumRate)}/hr)</span>
            <span class="font-semibold text-gray-800">${formatWhole(minimumRate * billableHours)}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">At Target Rate (${formatWhole(targetRate)}/hr)</span>
            <span class="font-semibold text-green-600">${formatWhole(targetRate * billableHours)}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">At Premium Rate (${formatWhole(premiumRate)}/hr)</span>
            <span class="font-semibold text-purple-600">${formatWhole(premiumRate * billableHours)}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-600">Annual Business Expenses</span>
            <span class="font-semibold text-red-600">${formatWhole(expenses)}</span>
        </div>
        <div class="flex justify-between items-center py-2 bg-indigo-50 rounded-lg px-3">
            <span class="text-indigo-700 font-semibold">Required Revenue Goal</span>
            <span class="font-bold text-indigo-800">${formatWhole(requiredRevenue)}</span>
        </div>
    `;
}

function updateRateComparison(targetRate) {
    const rateComparison = document.getElementById('rateComparison');
    const formatWhole = (amount) => `$${Math.round(amount)}`;
    
    const comparisons = [
        { label: "Your Target Rate", rate: targetRate, color: "text-green-600" },
        { label: "Industry Average", rate: 85, color: "text-blue-600" },
        { label: "Senior Level", rate: 120, color: "text-purple-600" },
        { label: "Agency Rates", rate: 150, color: "text-orange-600" }
    ];
    
    let comparisonHTML = '';
    comparisons.forEach(comp => {
        const difference = ((targetRate - comp.rate) / comp.rate * 100);
        const differenceText = difference >= 0 ? `+${difference.toFixed(0)}%` : `${difference.toFixed(0)}%`;
        const differenceColor = difference >= 0 ? 'text-green-600' : 'text-red-600';
        
        comparisonHTML += `
            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                <div>
                    <span class="font-medium text-gray-800">${comp.label}</span>
                    <div class="text-sm ${comp.color} font-semibold">${formatWhole(comp.rate)}/hr</div>
                </div>
                <div class="text-right">
                    <div class="font-semibold ${differenceColor}">${differenceText}</div>
                    <div class="text-xs text-gray-500">vs. your rate</div>
                </div>
            </div>
        `;
    });
    
    rateComparison.innerHTML = comparisonHTML;
}

function updateProjectPricing(targetRate) {
    const projectPricing = document.getElementById('projectPricing');
    const formatWhole = (amount) => `$${Math.round(amount)}`;
    
    const projects = [
        { name: "Small Website", hours: 20, description: "Basic 5-page site" },
        { name: "Logo & Branding", hours: 15, description: "Logo + style guide" },
        { name: "Content Package", hours: 10, description: "5 blog posts" },
        { name: "Marketing Campaign", hours: 40, description: "Monthly management" },
        { name: "App Development", hours: 120, description: "MVP development" },
        { name: "Consulting Package", hours: 30, description: "Strategy & planning" }
    ];
    
    let pricingHTML = '';
    projects.forEach(project => {
        const projectCost = project.hours * targetRate;
        pricingHTML += `
            <div class="text-center p-4 border border-gray-200 rounded-lg">
                <h4 class="font-semibold text-gray-800 mb-1">${project.name}</h4>
                <p class="text-sm text-gray-600 mb-2">${project.description}</p>
                <div class="text-lg font-bold text-indigo-600">${formatWhole(projectCost)}</div>
                <div class="text-xs text-gray-500">${project.hours} hours × ${formatWhole(targetRate)}/hr</div>
            </div>
        `;
    });
    
    projectPricing.innerHTML = pricingHTML;
}

function updateActionPlan(targetRate) {
    const pricingStrategy = document.getElementById('pricingStrategy');
    const businessTips = document.getElementById('businessTips');
    
    const strategies = [
        "Start with your target rate for new clients",
        "Offer package pricing for common projects",
        "Consider retainer agreements for stable income",
        "Increase rates by 10-15% annually",
        "Create tiered service packages"
    ];
    
    const tips = [
        "Track all billable hours meticulously",
        "Set aside 30% of income for taxes",
        "Build an emergency fund (3-6 months expenses)",
        "Invest in continuous skill development",
        "Network regularly to maintain pipeline"
    ];
    
    pricingStrategy.innerHTML = strategies.map(strategy => 
        `<div class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
            <span class="text-gray-700">${strategy}</span>
        </div>`
    ).join('');
    
    businessTips.innerHTML = tips.map(tip => 
        `<div class="flex items-start">
            <i class="fas fa-lightbulb text-amber-500 mt-1 mr-3"></i>
            <span class="text-gray-700">${tip}</span>
        </div>`
    ).join('');
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

// Export functionality for potential module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        calculateComprehensiveRate,
        calculateQuickEstimate,
        setCalculationMethod,
        toggleExpenseDetails
    };
}
</script>

<style>
/* Additional custom styles */
.method-btn.active {
    border-color: #6366f1;
    background-color: #eef2ff;
    color: #4338ca;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}

/* Smooth transitions for all interactive elements */
button, input, select {
    transition: all 0.2s ease-in-out;
}

/* Focus states for accessibility */
input:focus, select:focus {
    outline: none;
    ring: 2px;
}
</style>
@endsection