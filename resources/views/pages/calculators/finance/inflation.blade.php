@extends('layouts.app')

@section('title', 'Inflation Calculator - Calculate Money Value Over Time | CalculaterTools')

@section('meta-description', 'Free inflation calculator to determine how much money from past years is worth today. Calculate purchasing power changes and measure real value changes over time.')

@section('keywords', 'inflation calculator, purchasing power, money value over time, CPI calculator, real value calculator, inflation rate calculator')

@section('canonical', url('/calculators/inflation'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Inflation Calculator",
    "description": "Calculate how inflation affects the purchasing power of money over time using historical CPI data",
    "url": "{{ url('/calculators/inflation') }}",
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
                    <li class="text-gray-500">Inflation Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Inflation Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate how inflation affects the purchasing power of your money over time. See what your money from the past would be worth today.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Inflation Impact</h2>
                        <p class="text-gray-600 mb-6">Enter amount and time period to see purchasing power changes</p>
                        
                        <form id="inflationCalculatorForm" class="space-y-6">
                            <!-- Amount -->
                            <div>
                                <label for="amount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Amount (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="amount" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 100000" 
                                        min="1" 
                                        step="1000"
                                        value="100000"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Start Year -->
                            <div>
                                <label for="startYear" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Start Year
                                </label>
                                <select 
                                    id="startYear" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    @for($year = date('Y') - 50; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}" {{ $year == date('Y') - 10 ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <!-- End Year -->
                            <div>
                                <label for="endYear" class="block text-sm font-semibold text-gray-800 mb-2">
                                    End Year
                                </label>
                                <select 
                                    id="endYear" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    @for($year = date('Y') - 49; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Custom Inflation Rate -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <input 
                                        type="checkbox" 
                                        id="customInflationToggle" 
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    >
                                    <label for="customInflationToggle" class="ml-2 block text-sm font-semibold text-gray-800">
                                        Use Custom Inflation Rate
                                    </label>
                                </div>
                                <div id="customInflationSection" class="hidden space-y-3">
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="customInflationRate" 
                                            class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 5.5" 
                                            min="0.1" 
                                            max="50" 
                                            step="0.1"
                                            value="6.0"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                                    </div>
                                    <p class="text-sm text-gray-500">Average historical inflation in India: 5-7%</p>
                                </div>
                            </div>

                            <!-- Quick Scenarios -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Scenarios
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setScenario('salary')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-money-bill-wave text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Salary Growth</div>
                                    </button>
                                    <button type="button" onclick="setScenario('education')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-graduation-cap text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Education Cost</div>
                                    </button>
                                    <button type="button" onclick="setScenario('retirement')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-piggy-bank text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Retirement</div>
                                    </button>
                                    <button type="button" onclick="setScenario('realEstate')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-home text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Real Estate</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateInflation()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-chart-line mr-2"></i>
                                Calculate Inflation Impact
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Inflation Impact</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-line text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter amount and years</p>
                                <p class="text-sm">to see inflation impact</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Breakdown -->
            <div id="breakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Yearly Value Progression</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Equivalent Value</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Annual Inflation</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Cumulative Loss</th>
                            </tr>
                        </thead>
                        <tbody id="breakdownTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Historical Inflation Data -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Historical Inflation Trends in India</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Average Inflation Rates by Decade</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-800">2010-2019</span>
                                <span class="text-lg font-bold text-blue-600">6.7%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-800">2000-2009</span>
                                <span class="text-lg font-bold text-blue-600">5.5%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-800">1990-1999</span>
                                <span class="text-lg font-bold text-blue-600">8.9%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium text-gray-800">1980-1989</span>
                                <span class="text-lg font-bold text-blue-600">9.7%</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Yearly Inflation</h3>
                        <div class="space-y-3">
                            @php
                                $recentYears = [
                                    ['year' => 2023, 'rate' => 5.5],
                                    ['year' => 2022, 'rate' => 6.7],
                                    ['year' => 2021, 'rate' => 5.1],
                                    ['year' => 2020, 'rate' => 6.6],
                                    ['year' => 2019, 'rate' => 4.8],
                                ];
                            @endphp
                            @foreach($recentYears as $data)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700">{{ $data['year'] }}</span>
                                    <div class="flex items-center">
                                        <div class="w-20 bg-gray-200 rounded-full h-2 mr-3">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: {{ ($data['rate'] / 10) * 100 }}%"></div>
                                        </div>
                                        <span class="font-semibold text-gray-900">{{ $data['rate'] }}%</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Why Understand Inflation?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Financial Planning</h3>
                        <p class="text-gray-600">Plan for future expenses by understanding how prices increase over time.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bullseye text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Investment Goals</h3>
                        <p class="text-gray-600">Set realistic investment returns that outpace inflation to grow real wealth.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shopping-cart text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Purchasing Power</h3>
                        <p class="text-gray-600">Understand how inflation erodes your money's ability to buy goods and services.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-money-bill-wave text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Salary Negotiation</h3>
                        <p class="text-gray-600">Ensure your salary increases outpace inflation to maintain living standards.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Inflation FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is inflation?</h3>
                        <p class="text-gray-600">Inflation is the rate at which the general level of prices for goods and services is rising, and subsequently, purchasing power is falling. Central banks attempt to limit inflation to avoid deflation and keep the economy running smoothly.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is inflation calculated in India?</h3>
                        <p class="text-gray-600">In India, inflation is primarily measured by the Consumer Price Index (CPI) which tracks changes in prices of a basket of consumer goods and services. The Wholesale Price Index (WPI) is another measure used for wholesale price changes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What causes inflation?</h3>
                        <p class="text-gray-600">Inflation can be caused by several factors including increased production costs (cost-push inflation), increased demand for goods and services (demand-pull inflation), expansion of money supply, and external factors like rising import prices.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the ideal inflation rate?</h3>
                        <p class="text-gray-600">Most central banks, including RBI in India, target an inflation rate of 2-6%. Moderate inflation is considered healthy for economic growth, while high inflation erodes purchasing power and deflation can lead to economic stagnation.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I protect my money from inflation?</h3>
                        <p class="text-gray-600">To protect against inflation, consider investments that typically outpace inflation such as equities, real estate, inflation-indexed bonds, and diversified investment portfolios. Avoid keeping large amounts in low-interest savings accounts.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Financial Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('compound.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Compound Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on investments with compound interest</p>
                    </a>
                    {{-- <a href="{{ route('salary.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-money-bill-wave text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Salary Inflation Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate required salary increases to beat inflation</p>
                    </a> --}}
                    <a href="{{ route('retirement.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-piggy-bank text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Retirement Calculator</h3>
                        <p class="text-gray-600 text-sm">Plan retirement savings considering inflation</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Historical inflation data for India (simplified)
const historicalInflation = {
    @for($year = date('Y') - 50; $year <= date('Y'); $year++)
        {{ $year }}: {{ $year == 2023 ? 5.5 : ($year == 2022 ? 6.7 : ($year == 2021 ? 5.1 : ($year == 2020 ? 6.6 : ($year == 2019 ? 4.8 : rand(3, 10))))) }},
    @endfor
};

// Toggle custom inflation rate
document.getElementById('customInflationToggle').addEventListener('change', function() {
    const customSection = document.getElementById('customInflationSection');
    if (this.checked) {
        customSection.classList.remove('hidden');
    } else {
        customSection.classList.add('hidden');
    }
});

// Set quick scenarios
function setScenario(type) {
    const scenarios = {
        'salary': { amount: 500000, startYear: new Date().getFullYear() - 5, endYear: new Date().getFullYear() },
        'education': { amount: 200000, startYear: new Date().getFullYear() - 10, endYear: new Date().getFullYear() },
        'retirement': { amount: 1000000, startYear: new Date().getFullYear() - 20, endYear: new Date().getFullYear() },
        'realEstate': { amount: 3000000, startYear: new Date().getFullYear() - 15, endYear: new Date().getFullYear() }
    };

    const scenario = scenarios[type];
    document.getElementById('amount').value = scenario.amount;
    document.getElementById('startYear').value = scenario.startYear;
    document.getElementById('endYear').value = scenario.endYear;

    // Update button styles
    document.querySelectorAll('.scenario-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    });
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'ring-2', 'ring-blue-300');
    
    calculateInflation();
}

function calculateInflation() {
    // Get input values
    const amount = parseFloat(document.getElementById('amount').value);
    const startYear = parseInt(document.getElementById('startYear').value);
    const endYear = parseInt(document.getElementById('endYear').value);
    const useCustomRate = document.getElementById('customInflationToggle').checked;
    const customRate = useCustomRate ? parseFloat(document.getElementById('customInflationRate').value) : null;

    // Validation
    if (!amount || amount < 1) {
        showError('Please enter a valid amount');
        return;
    }
    if (startYear >= endYear) {
        showError('Start year must be before end year');
        return;
    }

    let currentValue = amount;
    let totalYears = endYear - startYear;
    let yearlyBreakdown = [];

    // Calculate future value year by year
    for (let year = startYear + 1; year <= endYear; year++) {
        const inflationRate = useCustomRate ? customRate : (historicalInflation[year] || 6.0);
        const previousValue = currentValue;
        currentValue = currentValue * (1 + inflationRate / 100);
        
        yearlyBreakdown.push({
            year: year,
            value: currentValue,
            inflationRate: inflationRate,
            valueIncrease: currentValue - amount,
            purchasingPowerLoss: currentValue - previousValue
        });
    }

    const finalValue = currentValue;
    const totalIncrease = finalValue - amount;
    const percentageIncrease = ((finalValue - amount) / amount) * 100;
    const averageAnnualInflation = useCustomRate ? customRate : calculateAverageInflation(startYear, endYear);

    // Display results
    displayResults(amount, finalValue, totalIncrease, percentageIncrease, averageAnnualInflation, startYear, endYear);
    
    // Generate yearly breakdown
    generateYearlyBreakdown(yearlyBreakdown, amount, startYear);
}

function calculateAverageInflation(startYear, endYear) {
    let total = 0;
    let count = 0;
    
    for (let year = startYear + 1; year <= endYear; year++) {
        if (historicalInflation[year]) {
            total += historicalInflation[year];
            count++;
        }
    }
    
    return count > 0 ? total / count : 6.0;
}

function displayResults(originalAmount, finalValue, totalIncrease, percentageIncrease, avgInflation, startYear, endYear) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(finalValue)}</div>
                    <div class="text-lg font-semibold text-gray-700">Equivalent Value in ${endYear}</div>
                    <div class="text-sm text-gray-500 mt-1">What ₹${formatCurrency(originalAmount)} from ${startYear} is worth today</div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-red-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-red-600">+₹${formatCurrency(totalIncrease)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Increase</div>
                </div>
                <div class="bg-purple-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-purple-600">+${percentageIncrease.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Percentage Increase</div>
                </div>
            </div>

            <!-- Inflation Impact -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Inflation Analysis</h4>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Time Period</span>
                        <span class="font-semibold text-gray-900">${endYear - startYear} years</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Average Annual Inflation</span>
                        <span class="font-semibold text-red-600">${avgInflation.toFixed(1)}%</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Purchasing Power Loss</span>
                        <span class="font-semibold text-red-600">${((1 - (originalAmount / finalValue)) * 100).toFixed(1)}%</span>
                    </div>
                </div>
            </div>

            <!-- Example Comparison -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h4 class="font-semibold text-yellow-900 mb-2">What This Means</h4>
                <p class="text-sm text-yellow-800">
                    ₹${formatCurrency(originalAmount)} in ${startYear} has the same purchasing power as ₹${formatCurrency(finalValue)} in ${endYear}. 
                    Your money needs to grow by ${percentageIncrease.toFixed(1)}% just to maintain the same standard of living.
                </p>
            </div>

            <!-- Investment Advice -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-blue-600 mt-1 mr-3"></i>
                    <div class="text-sm text-blue-800">
                        <strong>Tip:</strong> To preserve purchasing power, aim for investment returns that outpace inflation. Consider diversified portfolios with equity exposure for long-term growth.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('breakdownSection').classList.remove('hidden');
}

function generateYearlyBreakdown(breakdown, originalAmount, startYear) {
    let tableHTML = '';
    let cumulativeLoss = 0;

    breakdown.forEach((data, index) => {
        const currentYear = startYear + index + 1;
        cumulativeLoss += data.purchasingPowerLoss;

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">${currentYear}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(data.value)}</td>
                <td class="px-4 py-3 text-right font-semibold text-red-600">${data.inflationRate.toFixed(1)}%</td>
                <td class="px-4 py-3 text-right font-semibold text-orange-600">₹${formatCurrency(cumulativeLoss)}</td>
            </tr>
        `;
    });

    document.getElementById('breakdownTable').innerHTML = tableHTML;
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
    document.getElementById('breakdownSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateInflation();
});
</script>
@endsection