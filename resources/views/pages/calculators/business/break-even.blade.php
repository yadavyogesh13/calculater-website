@extends('layouts.app')

@section('title', 'Break-Even Point Calculator - Calculate Your Business Break-Even | CalculaterTools')

@section('meta-description', 'Free break-even point calculator to determine when your business becomes profitable. Calculate break-even point, margin of safety, and analyze your business costs.')

@section('keywords', 'break-even calculator, break-even point, business calculator, cost analysis, profit calculator, business planning, financial calculator')

@section('canonical', url('/calculators/break-even'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Break-Even Point Calculator",
    "description": "Calculate your business break-even point and analyze profitability scenarios",
    "url": "{{ url('/calculators/break-even') }}",
    "operatingSystem": "Any",
    "applicationCategory": "BusinessApplication",
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
                        <a href="#business" class="text-blue-600 hover:text-blue-800 transition duration-150">Business Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Break-Even Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Break-Even Point Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate when your business becomes profitable by analyzing fixed costs, variable costs, and pricing.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Break-Even Point</h2>
                        <p class="text-gray-600 mb-6">Enter your business costs and pricing to find your break-even point</p>
                        
                        <form id="breakEvenForm" class="space-y-6">
                            <!-- Cost Structure -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Cost Structure
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="fixedCosts" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Fixed Costs
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="fixedCosts" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 5000" 
                                                min="0"
                                                step="100"
                                                value="5000"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Monthly fixed expenses (rent, salaries, etc.)</p>
                                    </div>
                                    <div>
                                        <label for="variableCosts" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Variable Cost per Unit
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="variableCosts" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 10" 
                                                min="0"
                                                step="0.01"
                                                value="10"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500">$</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Cost to produce one unit</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="pricePerUnit" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Price per Unit
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="pricePerUnit" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 25" 
                                            min="0"
                                            step="0.01"
                                            value="25"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">$</span>
                                    </div>
                                </div>
                                <div class="flex items-end">
                                    <p class="text-xs text-gray-500">Selling price for each unit</p>
                                </div>
                            </div>

                            <!-- Business Scenarios -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Business Scenarios
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setScenario('service')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-concierge-bell text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Service</div>
                                        <div class="text-xs text-gray-500">Low variable costs</div>
                                    </button>
                                    <button type="button" onclick="setScenario('retail')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-store text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Retail</div>
                                        <div class="text-xs text-gray-500">Medium costs</div>
                                    </button>
                                    <button type="button" onclick="setScenario('manufacturing')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-industry text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Manufacturing</div>
                                        <div class="text-xs text-gray-500">High variable costs</div>
                                    </button>
                                    <button type="button" onclick="setScenario('saas')" class="scenario-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-cloud text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">SaaS</div>
                                        <div class="text-xs text-gray-500">Very low variable</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Quick Analysis -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Analysis
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setQuickAnalysis('breakEven')" class="analysis-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-balance-scale text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Break-Even</div>
                                    </button>
                                    <button type="button" onclick="setQuickAnalysis('profitTarget')" class="analysis-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-chart-line text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Profit Target</div>
                                    </button>
                                    <button type="button" onclick="setQuickAnalysis('sensitivity')" class="analysis-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-chart-bar text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sensitivity</div>
                                    </button>
                                    <button type="button" onclick="setQuickAnalysis('whatIf')" class="analysis-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-question-circle text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">What-If</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-3">Additional Analysis</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="targetProfit" class="block text-sm font-medium text-gray-700 mb-2">
                                            Target Profit
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="targetProfit" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="e.g., 2000" 
                                                min="0"
                                                step="100"
                                                value="2000"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">$</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="currentSales" class="block text-sm font-medium text-gray-700 mb-2">
                                            Current Monthly Sales
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="currentSales" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="e.g., 300" 
                                                min="0"
                                                step="1"
                                                value="300"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500">units</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateBreakEven()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Break-Even
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Break-Even Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-balance-scale text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your costs</p>
                                <p class="text-sm">to see break-even point</p>
                            </div>
                        </div>

                        <!-- Key Metrics -->
                        <div id="keyMetrics" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Key Metrics</h4>
                            <div class="space-y-2 text-sm" id="metricsContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Break-Even Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="breakEvenUnits">0</div>
                        <div class="text-blue-800 font-medium">Break-Even Units</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="breakEvenRevenue">$0</div>
                        <div class="text-green-800 font-medium">Break-Even Revenue</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="contributionMargin">0%</div>
                        <div class="text-purple-800 font-medium">Contribution Margin</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="marginOfSafety">0%</div>
                        <div class="text-orange-800 font-medium">Margin of Safety</div>
                    </div>
                </div>

                <!-- Profit Target Analysis -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Profit Target Analysis</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-green-200">
                                <div class="text-2xl font-bold text-green-700 mb-2" id="targetUnits">0</div>
                                <div class="text-green-800 font-medium">Units for Target Profit</div>
                                <p class="text-sm text-gray-600 mt-1">Units needed to achieve your profit goal</p>
                            </div>
                        </div>
                        <div>
                            <div class="bg-white rounded-lg p-4 border border-blue-200">
                                <div class="text-2xl font-bold text-blue-700 mb-2" id="targetRevenue">$0</div>
                                <div class="text-blue-800 font-medium">Revenue for Target Profit</div>
                                <p class="text-sm text-gray-600 mt-1">Revenue needed to achieve your profit goal</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cost Structure Breakdown -->
                <div class="bg-white rounded-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Structure Breakdown</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-3">At Break-Even Point</h4>
                            <div class="space-y-3 text-sm" id="costBreakdown">
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-3">Financial Ratios</h4>
                            <div class="space-y-3 text-sm" id="financialRatios">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sensitivity Analysis -->
            <div id="sensitivityAnalysis" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Sensitivity Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Price Changes</h4>
                        <div class="space-y-2 text-sm" id="priceSensitivity">
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Cost Changes</h4>
                        <div class="space-y-2 text-sm" id="costSensitivity">
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Fixed Cost Changes</h4>
                        <div class="space-y-2 text-sm" id="fixedCostSensitivity">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visual Chart Area -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Break-Even Analysis Chart</h2>
                <div class="bg-gray-100 rounded-lg p-8 text-center">
                    <div class="text-gray-500 mb-4">
                        <i class="fas fa-chart-line text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Interactive Break-Even Chart</h3>
                    <p class="text-gray-600 mb-4">Visual representation of your break-even point showing costs, revenue, and profit zones</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <div class="font-semibold text-blue-700">Revenue Line</div>
                            <div class="text-blue-600">Shows total revenue</div>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <div class="font-semibold text-green-700">Total Costs</div>
                            <div class="text-green-600">Fixed + Variable costs</div>
                        </div>
                        <div class="bg-red-50 p-3 rounded-lg">
                            <div class="font-semibold text-red-700">Loss Zone</div>
                            <div class="text-red-600">Below break-even</div>
                        </div>
                        <div class="bg-purple-50 p-3 rounded-lg">
                            <div class="font-semibold text-purple-700">Profit Zone</div>
                            <div class="text-purple-600">Above break-even</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Insights -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Business Insights & Strategies</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Reduce Fixed Costs</h3>
                        <p class="text-gray-600">Lowering fixed costs decreases your break-even point, making profitability easier to achieve.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tags text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Increase Prices</h3>
                        <p class="text-gray-600">Higher prices increase contribution margin, reducing the number of units needed to break even.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-cog text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Lower Variable Costs</h3>
                        <p class="text-gray-600">Reducing production costs per unit improves margins and lowers break-even volume.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Break-Even Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a break-even point?</h3>
                        <p class="text-gray-600">The break-even point is where total revenue equals total costs (both fixed and variable). At this point, the business is neither making a profit nor incurring a loss.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is break-even point calculated?</h3>
                        <p class="text-gray-600">Break-even point in units = Fixed Costs ÷ (Price per Unit - Variable Cost per Unit). Break-even revenue = Break-even units × Price per Unit.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between fixed and variable costs?</h3>
                        <p class="text-gray-600">Fixed costs remain constant regardless of production volume (rent, salaries). Variable costs change with production volume (materials, commissions).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is contribution margin?</h3>
                        <p class="text-gray-600">Contribution margin is the amount each unit contributes to covering fixed costs and generating profit. It's calculated as Price - Variable Cost per Unit.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I use break-even analysis for decision making?</h3>
                        <p class="text-gray-600">Break-even analysis helps in pricing decisions, cost control, sales target setting, and evaluating the financial viability of new products or business ventures.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('profit.margin.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Profit Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate business profits and margins</p>
                    </a>
                    <a href="{{ route('roi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">ROI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate return on investment</p>
                    </a>
                    <a href="{{ route('gst.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-bar text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">GST Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate the GST</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variables
let currentScenario = 'service';

// Business scenarios data
const businessScenarios = {
    'service': {
        name: 'Service Business',
        fixedCosts: 3000,
        variableCosts: 5,
        pricePerUnit: 50,
        description: 'Low variable costs, moderate fixed costs'
    },
    'retail': {
        name: 'Retail Business',
        fixedCosts: 5000,
        variableCosts: 15,
        pricePerUnit: 30,
        description: 'Medium costs, inventory-based'
    },
    'manufacturing': {
        name: 'Manufacturing',
        fixedCosts: 10000,
        variableCosts: 20,
        pricePerUnit: 35,
        description: 'High fixed and variable costs'
    },
    'saas': {
        name: 'SaaS Business',
        fixedCosts: 8000,
        variableCosts: 2,
        pricePerUnit: 99,
        description: 'High fixed costs, very low variable costs'
    }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateBreakEven(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate when inputs change
    document.getElementById('fixedCosts').addEventListener('input', debounce(calculateBreakEven, 300));
    document.getElementById('variableCosts').addEventListener('input', debounce(calculateBreakEven, 300));
    document.getElementById('pricePerUnit').addEventListener('input', debounce(calculateBreakEven, 300));
    document.getElementById('targetProfit').addEventListener('input', debounce(calculateBreakEven, 300));
    document.getElementById('currentSales').addEventListener('input', debounce(calculateBreakEven, 300));
}

function setScenario(scenario) {
    currentScenario = scenario;
    const scenarioData = businessScenarios[scenario];
    
    // Set input values
    document.getElementById('fixedCosts').value = scenarioData.fixedCosts;
    document.getElementById('variableCosts').value = scenarioData.variableCosts;
    document.getElementById('pricePerUnit').value = scenarioData.pricePerUnit;
    
    // Update scenario buttons
    document.querySelectorAll('.scenario-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'service': 'blue',
        'retail': 'green',
        'manufacturing': 'orange',
        'saas': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[scenario]}-500`, `bg-${colorMap[scenario]}-50`);
    
    calculateBreakEven();
}

function setQuickAnalysis(type) {
    // Update analysis buttons
    document.querySelectorAll('.analysis-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-orange-500', 'bg-orange-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'breakEven': 'blue',
        'profitTarget': 'green',
        'sensitivity': 'orange',
        'whatIf': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[type]}-500`, `bg-${colorMap[type]}-50`);
    
    // Show/hide relevant sections
    if (type === 'sensitivity') {
        document.getElementById('sensitivityAnalysis').classList.remove('hidden');
    } else {
        document.getElementById('sensitivityAnalysis').classList.add('hidden');
    }
    
    calculateBreakEven();
}

function calculateBreakEven() {
    const fixedCosts = parseFloat(document.getElementById('fixedCosts').value) || 0;
    const variableCosts = parseFloat(document.getElementById('variableCosts').value) || 0;
    const pricePerUnit = parseFloat(document.getElementById('pricePerUnit').value) || 0;
    const targetProfit = parseFloat(document.getElementById('targetProfit').value) || 0;
    const currentSales = parseFloat(document.getElementById('currentSales').value) || 0;
    
    // Validation
    if (pricePerUnit <= variableCosts) {
        showError('Price per unit must be greater than variable cost per unit');
        return;
    }
    
    // Calculate key metrics
    const contributionMargin = pricePerUnit - variableCosts;
    const contributionMarginRatio = (contributionMargin / pricePerUnit) * 100;
    
    // Break-even calculations
    const breakEvenUnits = Math.ceil(fixedCosts / contributionMargin);
    const breakEvenRevenue = breakEvenUnits * pricePerUnit;
    
    // Target profit calculations
    const targetUnits = Math.ceil((fixedCosts + targetProfit) / contributionMargin);
    const targetRevenue = targetUnits * pricePerUnit;
    
    // Margin of safety
    const marginOfSafety = currentSales > 0 ? ((currentSales - breakEvenUnits) / currentSales) * 100 : 0;
    
    displayResults(breakEvenUnits, breakEvenRevenue, contributionMarginRatio, marginOfSafety, targetUnits, targetRevenue);
    updateSensitivityAnalysis(fixedCosts, variableCosts, pricePerUnit, contributionMargin);
}

function displayResults(breakEvenUnits, breakEvenRevenue, contributionMargin, marginOfSafety, targetUnits, targetRevenue) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">${breakEvenUnits}</div>
                    <div class="text-lg font-semibold text-blue-800">Break-Even Units</div>
                    <div class="text-sm opacity-75 mt-1">$${breakEvenRevenue.toLocaleString()} revenue</div>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${contributionMargin.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Contribution Margin</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${marginOfSafety.toFixed(1)}%</div>
                    <div class="text-sm text-gray-600 mt-1">Margin of Safety</div>
                </div>
            </div>

            <!-- Business Insight -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Business Insight</h4>
                <p class="text-sm text-green-800">
                    ${getBusinessInsight(breakEvenUnits, marginOfSafety)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('keyMetrics').classList.remove('hidden');
    
    // Update detailed results
    updateDetailedResults(breakEvenUnits, breakEvenRevenue, contributionMargin, marginOfSafety, targetUnits, targetRevenue);
    document.getElementById('detailedResults').classList.remove('hidden');
}

function updateDetailedResults(breakEvenUnits, breakEvenRevenue, contributionMargin, marginOfSafety, targetUnits, targetRevenue) {
    // Update main metrics
    document.getElementById('breakEvenUnits').textContent = breakEvenUnits.toLocaleString();
    document.getElementById('breakEvenRevenue').textContent = '$' + breakEvenRevenue.toLocaleString();
    document.getElementById('contributionMargin').textContent = contributionMargin.toFixed(1) + '%';
    document.getElementById('marginOfSafety').textContent = marginOfSafety.toFixed(1) + '%';
    
    // Update target analysis
    document.getElementById('targetUnits').textContent = targetUnits.toLocaleString();
    document.getElementById('targetRevenue').textContent = '$' + targetRevenue.toLocaleString();
    
    // Update cost breakdown
    const fixedCosts = parseFloat(document.getElementById('fixedCosts').value) || 0;
    const variableCosts = parseFloat(document.getElementById('variableCosts').value) || 0;
    const pricePerUnit = parseFloat(document.getElementById('pricePerUnit').value) || 0;
    
    const totalVariableCosts = breakEvenUnits * variableCosts;
    const totalCosts = fixedCosts + totalVariableCosts;
    
    const costBreakdownHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Fixed Costs:</span>
            <span class="font-semibold text-gray-900">$${fixedCosts.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Variable Costs:</span>
            <span class="font-semibold text-gray-900">$${totalVariableCosts.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Total Costs:</span>
            <span class="font-semibold text-gray-900">$${totalCosts.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-700">Total Revenue:</span>
            <span class="font-semibold text-gray-900">$${breakEvenRevenue.toLocaleString()}</span>
        </div>
    `;
    
    document.getElementById('costBreakdown').innerHTML = costBreakdownHTML;
    
    // Update financial ratios
    const currentSales = parseFloat(document.getElementById('currentSales').value) || 0;
    const currentRevenue = currentSales * pricePerUnit;
    const currentProfit = currentRevenue - (fixedCosts + (currentSales * variableCosts));
    
    const financialRatiosHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Current Profit:</span>
            <span class="font-semibold ${currentProfit >= 0 ? 'text-green-600' : 'text-red-600'}">$${currentProfit.toLocaleString()}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Profit Margin:</span>
            <span class="font-semibold text-gray-900">${currentRevenue > 0 ? ((currentProfit / currentRevenue) * 100).toFixed(1) : 0}%</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Operating Leverage:</span>
            <span class="font-semibold text-gray-900">${(fixedCosts / (fixedCosts + (currentSales * variableCosts))).toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-700">Units to Target:</span>
            <span class="font-semibold text-gray-900">${Math.max(0, targetUnits - currentSales).toLocaleString()}</span>
        </div>
    `;
    
    document.getElementById('financialRatios').innerHTML = financialRatiosHTML;
}

function updateSensitivityAnalysis(fixedCosts, variableCosts, pricePerUnit, contributionMargin) {
    // Price sensitivity
    let priceSensitivityHTML = '';
    const priceChanges = [-20, -10, 0, 10, 20];
    
    priceChanges.forEach(change => {
        const newPrice = pricePerUnit * (1 + change/100);
        const newContribution = newPrice - variableCosts;
        const newBreakEven = Math.ceil(fixedCosts / newContribution);
        const changeClass = change > 0 ? 'text-green-600' : change < 0 ? 'text-red-600' : 'text-gray-600';
        
        priceSensitivityHTML += `
            <div class="flex justify-between items-center">
                <span class="${changeClass}">${change > 0 ? '+' : ''}${change}%</span>
                <span class="font-semibold">${newBreakEven.toLocaleString()} units</span>
            </div>
        `;
    });
    document.getElementById('priceSensitivity').innerHTML = priceSensitivityHTML;
    
    // Variable cost sensitivity
    let costSensitivityHTML = '';
    const costChanges = [-20, -10, 0, 10, 20];
    
    costChanges.forEach(change => {
        const newVariableCost = variableCosts * (1 + change/100);
        const newContribution = pricePerUnit - newVariableCost;
        const newBreakEven = Math.ceil(fixedCosts / newContribution);
        const changeClass = change > 0 ? 'text-red-600' : change < 0 ? 'text-green-600' : 'text-gray-600';
        
        costSensitivityHTML += `
            <div class="flex justify-between items-center">
                <span class="${changeClass}">${change > 0 ? '+' : ''}${change}%</span>
                <span class="font-semibold">${newBreakEven.toLocaleString()} units</span>
            </div>
        `;
    });
    document.getElementById('costSensitivity').innerHTML = costSensitivityHTML;
    
    // Fixed cost sensitivity
    let fixedCostSensitivityHTML = '';
    const fixedCostChanges = [-20, -10, 0, 10, 20];
    
    fixedCostChanges.forEach(change => {
        const newFixedCost = fixedCosts * (1 + change/100);
        const newBreakEven = Math.ceil(newFixedCost / contributionMargin);
        const changeClass = change > 0 ? 'text-red-600' : change < 0 ? 'text-green-600' : 'text-gray-600';
        
        fixedCostSensitivityHTML += `
            <div class="flex justify-between items-center">
                <span class="${changeClass}">${change > 0 ? '+' : ''}${change}%</span>
                <span class="font-semibold">${newBreakEven.toLocaleString()} units</span>
            </div>
        `;
    });
    document.getElementById('fixedCostSensitivity').innerHTML = fixedCostSensitivityHTML;
}

function getBusinessInsight(breakEvenUnits, marginOfSafety) {
    if (breakEvenUnits > 1000) {
        return "High break-even point suggests focusing on cost reduction or premium pricing strategies.";
    } else if (breakEvenUnits > 500) {
        return "Moderate break-even point. Consider volume-based strategies to spread fixed costs.";
    } else if (breakEvenUnits > 100) {
        return "Reasonable break-even point. Focus on consistent sales to maintain profitability.";
    } else {
        return "Low break-even point provides flexibility. Consider scaling operations carefully.";
    }
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
    document.getElementById('keyMetrics').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
    document.getElementById('sensitivityAnalysis').classList.add('hidden');
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