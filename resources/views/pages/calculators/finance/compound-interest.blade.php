@extends('layouts.app')

@section('title', 'Compound Interest Calculator - Calculate Investment Returns with Compounding | CalculaterTools')

@section('meta-description', 'Free online compound interest calculator to calculate returns on investments with daily, monthly, quarterly, or yearly compounding. See how your money grows over time.')

@section('keywords', 'compound interest calculator, investment calculator, compounding returns, interest calculator, savings calculator, financial calculator, compound growth')

@section('canonical', url('/calculators/compound-interest'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Compound Interest Calculator",
    "description": "Calculate investment returns with compound interest and different compounding frequencies",
    "url": "{{ url('/calculators/compound-interest') }}",
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
                    <li class="text-gray-500">Compound Interest Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Compound Interest Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Discover the power of compounding! Calculate how your investments can grow over time with compound interest - the eighth wonder of the world.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Compound Interest</h2>
                        <p class="text-gray-600 mb-6">Enter your investment details to see the magic of compounding</p>
                        
                        <form id="compoundInterestForm" class="space-y-6">
                            <!-- Principal Amount -->
                            <div>
                                <label for="principalAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Principal Investment Amount (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="principalAmount" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 100000" 
                                        min="1000" 
                                        step="1000"
                                        value="100000"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Initial investment amount</p>
                            </div>

                            <!-- Annual Interest Rate -->
                            <div>
                                <label for="annualInterestRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Annual Interest Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="annualInterestRate" 
                                        class="w-full pr-10 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 8" 
                                        min="0.1" 
                                        max="30" 
                                        step="0.1"
                                        value="8"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Expected annual return rate</p>
                            </div>

                            <!-- Time Period -->
                            <div>
                                <label for="timePeriod" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Time Period (Years)
                                </label>
                                <input 
                                    type="number" 
                                    id="timePeriod" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="e.g., 10" 
                                    min="1" 
                                    max="50"
                                    value="10"
                                    required
                                >
                                <p class="text-sm text-gray-500 mt-1">Investment duration in years</p>
                            </div>

                            <!-- Compounding Frequency -->
                            <div>
                                <label for="compoundingFrequency" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Compounding Frequency
                                </label>
                                <select 
                                    id="compoundingFrequency" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                >
                                    <option value="365">Daily</option>
                                    <option value="12">Monthly</option>
                                    <option value="4">Quarterly</option>
                                    <option value="2">Semi-Annually</option>
                                    <option value="1" selected>Annually</option>
                                </select>
                                <p class="text-sm text-gray-500 mt-1">How often interest is compounded</p>
                            </div>

                            <!-- Additional Contributions -->
                            <div>
                                <label for="additionalContributions" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Additional Monthly Contributions (₹)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">₹</span>
                                    <input 
                                        type="number" 
                                        id="additionalContributions" 
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 5000" 
                                        min="0" 
                                        step="100"
                                        value="0"
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Optional monthly additions to investment</p>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateCompoundInterest()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Compound Interest
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Investment Growth</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-line text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter investment details</p>
                                <p class="text-sm">to see compounding results</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Growth Chart -->
            <div id="growthChartSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Investment Growth Over Time</h2>
                <div class="h-80">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>

            <!-- Yearly Breakdown -->
            <div id="yearlyBreakdownSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Yearly Breakdown</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-700">Year</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Principal</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Interest</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">Total Value</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-700">CAGR</th>
                            </tr>
                        </thead>
                        <tbody id="yearlyBreakdownTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Power of Compounding Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">The Power of Compound Interest</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Exponential Growth</h3>
                        <p class="text-gray-600">Your money grows faster over time as you earn interest on both your principal and accumulated interest.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Time is Key</h3>
                        <p class="text-gray-600">The longer you stay invested, the more powerful compounding becomes. Start early to maximize returns.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-snowflake text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Frequency Matters</h3>
                        <p class="text-gray-600">More frequent compounding (daily vs annually) can significantly boost your overall returns over time.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Wealth Building</h3>
                        <p class="text-gray-600">Compound interest is the most effective way to build long-term wealth and achieve financial goals.</p>
                    </div>
                </div>

                <!-- Compound Interest Examples -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">The Early Bird Advantage</h4>
                        <p class="text-gray-700 mb-3">If you invest ₹10,000 per year starting at age 25 with 8% return:</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• By age 65: <strong>₹29,90,000</strong> (You invested only ₹4,00,000)</li>
                            <li>• Wealth created: <strong>₹25,90,000</strong> through compounding</li>
                        </ul>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Frequency Impact</h4>
                        <p class="text-gray-700 mb-3">₹1,00,000 at 8% for 10 years:</p>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Annual compounding: <strong>₹2,15,892</strong></li>
                            <li>• Monthly compounding: <strong>₹2,21,964</strong></li>
                            <li>• Daily compounding: <strong>₹2,22,534</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is compound interest?</h3>
                        <p class="text-gray-600">Compound interest is interest calculated on the initial principal and also on the accumulated interest of previous periods. It's often called "interest on interest" and makes your money grow faster over time.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is compound interest calculated?</h3>
                        <p class="text-gray-600">The formula for compound interest is: A = P(1 + r/n)^(nt) where A = final amount, P = principal, r = annual interest rate, n = compounding frequency, and t = time in years.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between simple and compound interest?</h3>
                        <p class="text-gray-600">Simple interest is calculated only on the principal amount, while compound interest is calculated on both principal and accumulated interest. Compound interest yields higher returns over long periods.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does compounding frequency affect returns?</h3>
                        <p class="text-gray-600">More frequent compounding (daily, monthly) results in higher returns because interest is calculated and added to the principal more often, leading to more "interest on interest" cycles.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is the Rule of 72?</h3>
                        <p class="text-gray-600">The Rule of 72 is a quick formula to estimate how long it takes for an investment to double: Divide 72 by the annual interest rate. For example, at 8% return, your money doubles in approximately 9 years (72 ÷ 8 = 9).</p>
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
                    <a href="{{ route('simple.interest.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calculator text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Simple Interest Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns with simple interest only</p>
                    </a>
                    <a href="{{ route('fd.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-piggy-bank text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">FD Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate returns on Fixed Deposits</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let growthChart = null;

function calculateCompoundInterest() {
    // Get input values
    const principal = parseFloat(document.getElementById('principalAmount').value);
    const annualRate = parseFloat(document.getElementById('annualInterestRate').value);
    const years = parseFloat(document.getElementById('timePeriod').value);
    const compoundingFreq = parseInt(document.getElementById('compoundingFrequency').value);
    const monthlyContributions = parseFloat(document.getElementById('additionalContributions').value) || 0;

    // Validation
    if (!principal || principal < 1000) {
        showError('Please enter a valid principal amount (minimum ₹1,000)');
        return;
    }
    if (!annualRate || annualRate < 0.1 || annualRate > 30) {
        showError('Please enter a valid interest rate (0.1% to 30%)');
        return;
    }
    if (!years || years < 1 || years > 50) {
        showError('Please enter a valid time period (1 to 50 years)');
        return;
    }

    // Calculate compound interest
    const ratePerPeriod = annualRate / 100 / compoundingFreq;
    const totalPeriods = years * compoundingFreq;
    
    // Future value with regular contributions
    let futureValue = principal * Math.pow(1 + ratePerPeriod, totalPeriods);
    
    if (monthlyContributions > 0) {
        // Adjust for monthly contributions with compounding frequency
        const monthlyRate = annualRate / 100 / 12;
        const totalMonths = years * 12;
        futureValue += monthlyContributions * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate);
    }

    const totalInterest = futureValue - principal - (monthlyContributions * years * 12);
    const totalContributions = principal + (monthlyContributions * years * 12);

    // Display results
    displayResults(futureValue, totalInterest, totalContributions, principal, annualRate, years, monthlyContributions);
    
    // Generate growth chart and yearly breakdown
    generateGrowthChart(principal, annualRate, years, compoundingFreq, monthlyContributions);
    generateYearlyBreakdown(principal, annualRate, years, compoundingFreq, monthlyContributions);
}

function displayResults(futureValue, totalInterest, totalContributions, principal, rate, years, monthlyContributions) {
    const cagr = (Math.pow(futureValue / principal, 1/years) - 1) * 100;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">₹${formatCurrency(futureValue)}</div>
                    <div class="text-lg font-semibold text-gray-700">Future Investment Value</div>
                    <div class="text-sm text-gray-500 mt-1">After ${years} years at ${rate}% p.a.</div>
                </div>
            </div>

            <!-- Breakdown -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">₹${formatCurrency(totalContributions)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Invested</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600">₹${formatCurrency(totalInterest)}</div>
                    <div class="text-sm text-gray-600 mt-1">Interest Earned</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600">${cagr.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Annualized Return</div>
                </div>
            </div>

            <!-- Investment vs Returns -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-900 mb-3">Investment vs Returns</h4>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Your Investment</span>
                        <span class="font-semibold text-gray-900">${((totalContributions/futureValue)*100).toFixed(1)}%</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Interest Earned</span>
                        <span class="font-semibold text-green-600">${((totalInterest/futureValue)*100).toFixed(1)}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: ${(totalInterest/futureValue)*100}%"></div>
                    </div>
                </div>
            </div>

            <!-- Rule of 72 -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-yellow-600 mt-1 mr-3"></i>
                    <div class="text-sm text-yellow-800">
                        <strong>Rule of 72:</strong> Your investment will double in approximately <strong>${(72 / parseFloat(document.getElementById('annualInterestRate').value)).toFixed(1)} years</strong>
                    </div>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-gray-600 mt-1 mr-3"></i>
                    <div class="text-sm text-gray-600">
                        Returns are projections. Actual returns may vary based on market conditions and investment performance.
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('growthChartSection').classList.remove('hidden');
    document.getElementById('yearlyBreakdownSection').classList.remove('hidden');
}

function generateGrowthChart(principal, annualRate, years, compoundingFreq, monthlyContributions) {
    const ctx = document.getElementById('growthChart').getContext('2d');
    
    if (growthChart) {
        growthChart.destroy();
    }

    const labels = [];
    const principalData = [];
    const interestData = [];
    const totalData = [];

    let currentValue = principal;
    const ratePerPeriod = annualRate / 100 / compoundingFreq;
    const periodsPerYear = compoundingFreq;

    for (let year = 0; year <= years; year++) {
        labels.push(`Year ${year}`);
        
        if (year === 0) {
            principalData.push(principal);
            interestData.push(0);
            totalData.push(principal);
        } else {
            // Calculate value at end of year
            for (let period = 0; period < periodsPerYear; period++) {
                currentValue = currentValue * (1 + ratePerPeriod);
                if (monthlyContributions > 0) {
                    // Add monthly contributions adjusted for compounding frequency
                    const monthsPerPeriod = 12 / periodsPerYear;
                    currentValue += monthlyContributions * monthsPerPeriod;
                }
            }
            
            const totalInvested = principal + (monthlyContributions * 12 * year);
            const interestEarned = currentValue - totalInvested;
            
            principalData.push(totalInvested);
            interestData.push(interestEarned);
            totalData.push(currentValue);
        }
    }

    growthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Total Value',
                    data: totalData,
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Your Investment',
                    data: principalData,
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Years'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    ticks: {
                        callback: function(value) {
                            return '₹' + value.toLocaleString('en-IN');
                        }
                    }
                }
            }
        }
    });
}

function generateYearlyBreakdown(principal, annualRate, years, compoundingFreq, monthlyContributions) {
    let tableHTML = '';
    let currentValue = principal;
    const ratePerPeriod = annualRate / 100 / compoundingFreq;
    const periodsPerYear = compoundingFreq;

    for (let year = 1; year <= years; year++) {
        let yearlyInterest = 0;
        const startValue = currentValue;

        for (let period = 0; period < periodsPerYear; period++) {
            const periodInterest = currentValue * ratePerPeriod;
            yearlyInterest += periodInterest;
            currentValue = currentValue * (1 + ratePerPeriod);
            
            if (monthlyContributions > 0) {
                const monthsPerPeriod = 12 / periodsPerYear;
                currentValue += monthlyContributions * monthsPerPeriod;
            }
        }

        const totalInvested = principal + (monthlyContributions * 12 * year);
        const cagr = (Math.pow(currentValue / principal, 1/year) - 1) * 100;

        tableHTML += `
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">${year}</td>
                <td class="px-4 py-3 text-right font-semibold text-blue-600">₹${formatCurrency(totalInvested)}</td>
                <td class="px-4 py-3 text-right font-semibold text-green-600">₹${formatCurrency(yearlyInterest)}</td>
                <td class="px-4 py-3 text-right font-semibold text-gray-900">₹${formatCurrency(currentValue)}</td>
                <td class="px-4 py-3 text-right font-semibold ${cagr >= 0 ? 'text-green-600' : 'text-red-600'}">${cagr.toFixed(1)}%</td>
            </tr>
        `;
    }

    document.getElementById('yearlyBreakdownTable').innerHTML = tableHTML;
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
    document.getElementById('growthChartSection').classList.add('hidden');
    document.getElementById('yearlyBreakdownSection').classList.add('hidden');
}

// Initialize with default calculation
document.addEventListener('DOMContentLoaded', function() {
    calculateCompoundInterest();
});
</script>
@endsection