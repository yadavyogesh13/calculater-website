@extends('layouts.app')

@section('title', 'Discount Calculator | Calculate Sale Price & Savings | CalculaterTools')

@section('meta-description', 'Free discount calculator to calculate sale prices, percentage discounts, fixed amount discounts, and compare multiple discount options. Perfect for shopping and pricing strategies.')

@section('keywords', 'discount calculator, sale price calculator, percentage discount, fixed discount, savings calculator, price calculator, shopping calculator')

@section('canonical', url('/calculators/discount'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Discount Calculator",
    "description": "Calculate sale prices, percentage discounts, fixed amount discounts, and compare multiple discount options",
    "url": "{{ url('/calculators/discount') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-amber-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-amber-600 hover:text-amber-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#financial" class="text-amber-600 hover:text-amber-800 transition duration-150">Financial Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Discount Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Discount Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate sale prices, percentage discounts, fixed amount discounts, and compare multiple discount options. Make informed shopping decisions with detailed savings analysis.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Discount</h2>
                        <p class="text-gray-600 mb-6">Enter the original price and discount details to calculate your savings</p>
                        
                        <form id="discountCalculatorForm" class="space-y-6">
                            <!-- Original Price -->
                            <div>
                                <label for="originalPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Original Price ($)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="originalPrice" 
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                        placeholder="0.00" 
                                        min="0" 
                                        max="100000" 
                                        step="0.01"
                                        value="100"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter the original price before discount</p>
                            </div>

                            <!-- Discount Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Discount Type
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" id="percentageBtn" class="type-btn py-3 px-4 border-2 border-amber-500 bg-amber-50 text-amber-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-percentage mr-2"></i>
                                        Percentage Discount
                                    </button>
                                    <button type="button" id="fixedBtn" class="type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-dollar-sign mr-2"></i>
                                        Fixed Amount Discount
                                    </button>
                                </div>
                            </div>

                            <!-- Percentage Discount Inputs -->
                            <div id="percentageInputs" class="space-y-4">
                                <div>
                                    <label for="discountPercentage" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Discount Percentage (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="discountPercentage" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                            placeholder="e.g., 20" 
                                            min="0" 
                                            max="100" 
                                            step="0.1"
                                            value="20"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                                    </div>
                                </div>
                                
                                <!-- Quick Percentage Buttons -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Quick Discounts
                                    </label>
                                    <div class="grid grid-cols-4 gap-2">
                                        <button type="button" onclick="setQuickPercentage(10)" class="quick-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-amber-500 hover:bg-amber-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">10%</div>
                                        </button>
                                        <button type="button" onclick="setQuickPercentage(20)" class="quick-btn py-2 px-3 border border-amber-500 bg-amber-50 rounded-lg text-center transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">20%</div>
                                        </button>
                                        <button type="button" onclick="setQuickPercentage(30)" class="quick-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-amber-500 hover:bg-amber-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">30%</div>
                                        </button>
                                        <button type="button" onclick="setQuickPercentage(50)" class="quick-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-amber-500 hover:bg-amber-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">50%</div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Fixed Amount Inputs -->
                            <div id="fixedInputs" class="space-y-4 hidden">
                                <div>
                                    <label for="discountAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Discount Amount ($)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">$</span>
                                        </div>
                                        <input 
                                            type="number" 
                                            id="discountAmount" 
                                            class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                            placeholder="0.00" 
                                            min="0" 
                                            max="100000" 
                                            step="0.01"
                                            value="20"
                                            required
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="taxRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Tax Rate (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="taxRate" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                            placeholder="e.g., 8.5" 
                                            min="0" 
                                            max="50" 
                                            step="0.1"
                                            value="8.5"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Calculate Tax On
                                    </label>
                                    <select id="taxCalculation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                        <option value="original">Original Price</option>
                                        <option value="sale">Sale Price</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Multiple Items -->
                            <div>
                                <label for="quantity" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Quantity
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="quantity" 
                                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                        placeholder="e.g., 1" 
                                        min="1" 
                                        max="1000" 
                                        step="1"
                                        value="1"
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">items</span>
                                </div>
                            </div>

                            <!-- Compare Discounts -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <input 
                                        type="checkbox" 
                                        id="compareDiscounts" 
                                        class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 rounded"
                                    >
                                    <label for="compareDiscounts" class="ml-2 text-sm font-semibold text-gray-800">
                                        Compare Multiple Discounts
                                    </label>
                                </div>
                                <div id="comparisonInputs" class="space-y-3 hidden">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="comparePercentage1" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                placeholder="Discount %" 
                                                min="0" 
                                                max="100" 
                                                step="0.1"
                                                value="15"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="comparePercentage2" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                placeholder="Discount %" 
                                                min="0" 
                                                max="100" 
                                                step="0.1"
                                                value="25"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateDiscount()"
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-amber-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Discount
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Savings</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-tag text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter price & discount</p>
                                <p class="text-sm">to see your savings</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-amber-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Common Discounts</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">10% off</span>
                                    <span class="font-medium text-gray-800">Pay 90%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">25% off</span>
                                    <span class="font-medium text-gray-800">Pay 75%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">50% off</span>
                                    <span class="font-medium text-gray-800">Pay 50%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Main Savings -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Discount Summary</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200">
                            <div class="text-2xl font-bold text-amber-600 mb-2" id="salePrice">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Sale Price</div>
                            <div class="text-sm text-gray-500 mt-1">You Pay</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-2xl font-bold text-green-600 mb-2" id="amountSaved">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Amount Saved</div>
                            <div class="text-sm text-gray-500 mt-1">Your Discount</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="savingsPercentage">0%</div>
                            <div class="text-lg font-semibold text-gray-700">Savings</div>
                            <div class="text-sm text-gray-500 mt-1">Percentage</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="finalPrice">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Final Price</div>
                            <div class="text-sm text-gray-500 mt-1">With Tax</div>
                        </div>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Price Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Cost Analysis -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Analysis</h3>
                            <div class="space-y-4" id="costAnalysis">
                            </div>
                        </div>
                        
                        <!-- Savings Visualization -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Savings Visualization</h3>
                            <div class="space-y-4" id="savingsVisualization">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Multiple Items Calculation -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Multiple Items Calculation</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="multipleItems">
                    </div>
                </div>

                <!-- Discount Comparison -->
                <div id="comparisonSection" class="bg-white rounded-xl shadow-lg p-6 md=p-8 hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Discount Comparison</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="discountComparison">
                    </div>
                </div>
            </div>

            <!-- Shopping Tips -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Smart Shopping Tips</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-percentage text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Calculate Real Savings</h3>
                        <p class="text-gray-600">Always calculate the actual dollar amount saved, not just the percentage discount.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tags text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Stack Discounts</h3>
                        <p class="text-gray-600">Look for opportunities to combine coupons, promo codes, and store discounts.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-history text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Track Price History</h3>
                        <p class="text-gray-600">Use price tracking tools to identify genuine discounts versus inflated "sale" prices.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calculator text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Compare Unit Prices</h3>
                        <p class="text-gray-600">Calculate price per unit when comparing different package sizes and bulk discounts.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Discount Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I calculate a percentage discount?</h3>
                        <p class="text-gray-600">Multiply the original price by the discount percentage (as a decimal), then subtract that amount from the original price. For example: $100 × 20% = $20 discount, so sale price = $100 - $20 = $80.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between percentage and fixed amount discounts?</h3>
                        <p class="text-gray-600">Percentage discounts scale with the original price (e.g., 20% off), while fixed amount discounts subtract a specific dollar amount (e.g., $20 off). Percentage discounts are better for expensive items, fixed amounts for cheaper items.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do stacked discounts work?</h3>
                        <p class="text-gray-600">Stacked discounts are applied sequentially, not added together. A 20% discount followed by a 10% discount results in a 28% total discount (not 30%), because the second discount applies to the already reduced price.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should tax be calculated on the original or sale price?</h3>
                        <p class="text-gray-600">This depends on local regulations. Most jurisdictions calculate sales tax on the final sale price after discounts, but some may tax the original price. Check your local tax laws for specific requirements.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's a good discount percentage?</h3>
                        <p class="text-gray-600">A "good" discount depends on the product and context. For retail, 20-30% is typically substantial. For clearance items, 50-70% is common. Always compare to historical prices and competitor pricing.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('tip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-amber-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-amber-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tip Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate restaurant tips and split bills</p>
                    </a>
                    <a href="{{ route('income.tax.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-amber-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-receipt text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Income Tax Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate Income tax amounts</p>
                    </a>
                    <a href="{{ route('percentage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-amber-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate percentages and changes</p>
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
let currentDiscountType = 'percentage';
let compareDiscounts = false;

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateDiscount(); // Calculate with default values
});

function setupEventListeners() {
    // Discount type toggle
    document.getElementById('percentageBtn').addEventListener('click', () => setDiscountType('percentage'));
    document.getElementById('fixedBtn').addEventListener('click', () => setDiscountType('fixed'));
    
    // Comparison toggle
    document.getElementById('compareDiscounts').addEventListener('change', function() {
        compareDiscounts = this.checked;
        document.getElementById('comparisonInputs').classList.toggle('hidden', !compareDiscounts);
        calculateDiscount();
    });
    
    // Auto-calculate on input change
    document.getElementById('originalPrice').addEventListener('input', debounce(calculateDiscount, 300));
    document.getElementById('discountPercentage').addEventListener('input', debounce(calculateDiscount, 300));
    document.getElementById('discountAmount').addEventListener('input', debounce(calculateDiscount, 300));
    document.getElementById('taxRate').addEventListener('input', debounce(calculateDiscount, 300));
    document.getElementById('taxCalculation').addEventListener('change', debounce(calculateDiscount, 300));
    document.getElementById('quantity').addEventListener('input', debounce(calculateDiscount, 300));
    document.getElementById('comparePercentage1').addEventListener('input', debounce(calculateDiscount, 300));
    document.getElementById('comparePercentage2').addEventListener('input', debounce(calculateDiscount, 300));
}

function setDiscountType(type) {
    currentDiscountType = type;
    
    if (type === 'percentage') {
        document.getElementById('percentageBtn').classList.add('border-amber-500', 'bg-amber-50', 'text-amber-700');
        document.getElementById('percentageBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('fixedBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('fixedBtn').classList.remove('border-amber-500', 'bg-amber-50', 'text-amber-700');
        document.getElementById('percentageInputs').classList.remove('hidden');
        document.getElementById('fixedInputs').classList.add('hidden');
    } else {
        document.getElementById('fixedBtn').classList.add('border-amber-500', 'bg-amber-50', 'text-amber-700');
        document.getElementById('fixedBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('percentageBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('percentageBtn').classList.remove('border-amber-500', 'bg-amber-50', 'text-amber-700');
        document.getElementById('fixedInputs').classList.remove('hidden');
        document.getElementById('percentageInputs').classList.add('hidden');
    }
    
    calculateDiscount();
}

function setQuickPercentage(percentage) {
    document.getElementById('discountPercentage').value = percentage;
    
    // Update quick buttons
    document.querySelectorAll('.quick-btn').forEach(btn => {
        btn.classList.remove('border-amber-500', 'bg-amber-50');
    });
    event.target.classList.add('border-amber-500', 'bg-amber-50');
    
    calculateDiscount();
}

function calculateDiscount() {
    const originalPrice = parseFloat(document.getElementById('originalPrice').value);
    const taxRate = parseFloat(document.getElementById('taxRate').value) || 0;
    const quantity = parseInt(document.getElementById('quantity').value) || 1;
    const taxCalculation = document.getElementById('taxCalculation').value;
    
    // Validation
    if (!originalPrice || originalPrice <= 0) {
        showError('Please enter a valid original price');
        return;
    }
    
    let discountAmount, salePrice, savingsPercentage;
    
    if (currentDiscountType === 'percentage') {
        const discountPercentage = parseFloat(document.getElementById('discountPercentage').value);
        
        if (!discountPercentage || discountPercentage < 0 || discountPercentage > 100) {
            showError('Please enter a valid discount percentage (0-100)');
            return;
        }
        
        discountAmount = originalPrice * (discountPercentage / 100);
        salePrice = originalPrice - discountAmount;
        savingsPercentage = discountPercentage;
    } else {
        discountAmount = parseFloat(document.getElementById('discountAmount').value);
        
        if (!discountAmount || discountAmount < 0 || discountAmount > originalPrice) {
            showError('Please enter a valid discount amount (0 to original price)');
            return;
        }
        
        salePrice = originalPrice - discountAmount;
        savingsPercentage = (discountAmount / originalPrice) * 100;
    }
    
    // Calculate tax
    let taxAmount, finalPrice;
    if (taxCalculation === 'original') {
        taxAmount = originalPrice * (taxRate / 100);
        finalPrice = salePrice + taxAmount;
    } else {
        taxAmount = salePrice * (taxRate / 100);
        finalPrice = salePrice + taxAmount;
    }
    
    // Calculate for multiple items
    const totalOriginal = originalPrice * quantity;
    const totalSale = salePrice * quantity;
    const totalSaved = discountAmount * quantity;
    const totalTax = taxAmount * quantity;
    const totalFinal = finalPrice * quantity;
    
    // Display results
    displayResults(salePrice, discountAmount, savingsPercentage, finalPrice, taxAmount, 
                  totalOriginal, totalSale, totalSaved, totalTax, totalFinal, quantity);
    
    // Generate detailed analysis
    generateDetailedAnalysis(originalPrice, salePrice, discountAmount, savingsPercentage, 
                           taxAmount, finalPrice, quantity);
    
    // Generate comparison if enabled
    if (compareDiscounts) {
        generateDiscountComparison(originalPrice, taxRate, taxCalculation, quantity);
    }
}

function displayResults(salePrice, discountAmount, savingsPercentage, finalPrice, taxAmount,
                       totalOriginal, totalSale, totalSaved, totalTax, totalFinal, quantity) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl p-6 border-2 border-amber-200">
                <div class="text-center mb-4">
                    <div class="text-2xl md:text-3xl font-bold text-amber-600 mb-2">$${salePrice.toFixed(2)}</div>
                    <div class="text-lg font-semibold text-gray-700">Sale Price</div>
                    <div class="text-sm text-gray-500 mt-1">You save $${discountAmount.toFixed(2)} (${savingsPercentage.toFixed(1)}%)</div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600 mb-1">$${discountAmount.toFixed(2)}</div>
                    <div class="text-sm text-green-800">Amount Saved</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">${savingsPercentage.toFixed(1)}%</div>
                    <div class="text-sm text-blue-800">Discount</div>
                </div>
            </div>

            <!-- Final Price with Tax -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <h4 class="font-semibold text-purple-900 mb-2">Final Price with Tax</h4>
                <p class="text-sm text-purple-800">
                    <strong>$${finalPrice.toFixed(2)}</strong> (includes $${taxAmount.toFixed(2)} tax)
                </p>
            </div>

            ${quantity > 1 ? `
            <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                <h4 class="font-semibold text-indigo-900 mb-2">Total for ${quantity} Items</h4>
                <p class="text-sm text-indigo-800">
                    <strong>$${totalFinal.toFixed(2)}</strong> (saving $${totalSaved.toFixed(2)} total)
                </p>
            </div>
            ` : ''}
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('referenceSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update main metrics
    document.getElementById('salePrice').textContent = `$${salePrice.toFixed(2)}`;
    document.getElementById('amountSaved').textContent = `$${discountAmount.toFixed(2)}`;
    document.getElementById('savingsPercentage').textContent = `${savingsPercentage.toFixed(1)}%`;
    document.getElementById('finalPrice').textContent = `$${finalPrice.toFixed(2)}`;
}

function generateDetailedAnalysis(originalPrice, salePrice, discountAmount, savingsPercentage, 
                                taxAmount, finalPrice, quantity) {
    generateCostAnalysis(originalPrice, salePrice, discountAmount, taxAmount, finalPrice);
    generateSavingsVisualization(savingsPercentage, discountAmount, originalPrice);
    generateMultipleItems(originalPrice, salePrice, discountAmount, finalPrice, quantity);
}

function generateCostAnalysis(originalPrice, salePrice, discountAmount, taxAmount, finalPrice) {
    const discountPerUnit = discountAmount;
    const taxPercentage = (taxAmount / salePrice) * 100;
    
    document.getElementById('costAnalysis').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Original Price</span>
                <span class="font-semibold text-gray-900">$${originalPrice.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg border border-red-200">
                <span class="text-red-700">Discount Amount</span>
                <span class="font-semibold text-red-900">-$${discountAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-amber-50 rounded-lg border border-amber-200">
                <span class="text-amber-700">Sale Price</span>
                <span class="font-semibold text-amber-900">$${salePrice.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                <span class="text-blue-700">Sales Tax (${(taxAmount/salePrice*100).toFixed(1)}%)</span>
                <span class="font-semibold text-blue-900">+$${taxAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg border border-green-200">
                <span class="text-green-700">Final Price</span>
                <span class="font-semibold text-green-900">$${finalPrice.toFixed(2)}</span>
            </div>
        </div>
    `;
}

function generateSavingsVisualization(savingsPercentage, discountAmount, originalPrice) {
    const paidPercentage = 100 - savingsPercentage;
    
    document.getElementById('savingsVisualization').innerHTML = `
        <div class="space-y-4">
            <!-- Savings Pie Chart -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Price Distribution</h4>
                <div class="relative h-4 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-4 bg-amber-500 rounded-l-full" 
                         style="width: ${paidPercentage}%">
                    </div>
                    <div class="absolute h-4 bg-green-500 rounded-r-full" 
                         style="left: ${paidPercentage}%; width: ${savingsPercentage}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>You Pay (${paidPercentage.toFixed(1)}%)</span>
                    <span>You Save (${savingsPercentage.toFixed(1)}%)</span>
                </div>
            </div>
            
            <!-- Savings Impact -->
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-amber-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-amber-600">${paidPercentage.toFixed(1)}%</div>
                    <div class="text-xs text-amber-800">Of Original Price</div>
                </div>
                <div class="bg-green-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-green-600">${savingsPercentage.toFixed(1)}%</div>
                    <div class="text-xs text-green-800">Total Savings</div>
                </div>
            </div>
            
            <!-- Equivalent Spending -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-3">
                <h5 class="font-semibold text-purple-800 text-sm mb-1">Savings Equivalent</h5>
                <p class="text-xs text-purple-700">
                    Your savings of $${discountAmount.toFixed(2)} could buy you ${getEquivalentItem(discountAmount)}
                </p>
            </div>
        </div>
    `;
}

function getEquivalentItem(amount) {
    if (amount < 5) return "a coffee";
    if (amount < 10) return "a lunch";
    if (amount < 20) return "a movie ticket";
    if (amount < 50) return "a nice dinner";
    return "a weekend activity";
}

function generateMultipleItems(originalPrice, salePrice, discountAmount, finalPrice, quantity) {
    if (quantity <= 1) {
        document.getElementById('multipleItems').innerHTML = `
            <div class="col-span-3 text-center py-8 text-gray-400">
                <i class="fas fa-shopping-cart text-3xl mb-3"></i>
                <p class="text-lg font-medium">Single Item Purchase</p>
                <p class="text-sm">Increase quantity to see bulk savings</p>
            </div>
        `;
        return;
    }
    
    const totalOriginal = originalPrice * quantity;
    const totalSale = salePrice * quantity;
    const totalSaved = discountAmount * quantity;
    const totalFinal = finalPrice * quantity;
    const pricePerItem = salePrice;
    const savingsPerItem = discountAmount;
    
    document.getElementById('multipleItems').innerHTML = `
        <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200">
            <div class="text-2xl font-bold text-amber-600 mb-2">$${totalSale.toFixed(2)}</div>
            <div class="text-lg font-semibold text-gray-700">Total Sale Price</div>
            <div class="text-sm text-gray-500 mt-1">For ${quantity} items</div>
        </div>
        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
            <div class="text-2xl font-bold text-green-600 mb-2">$${totalSaved.toFixed(2)}</div>
            <div class="text-lg font-semibold text-gray-700">Total Savings</div>
            <div class="text-sm text-gray-500 mt-1">$${savingsPerItem.toFixed(2)} per item</div>
        </div>
        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2">$${totalFinal.toFixed(2)}</div>
            <div class="text-lg font-semibold text-gray-700">Total with Tax</div>
            <div class="text-sm text-gray-500 mt-1">Final amount due</div>
        </div>
    `;
}

function generateDiscountComparison(originalPrice, taxRate, taxCalculation, quantity) {
    const compare1 = parseFloat(document.getElementById('comparePercentage1').value) || 0;
    const compare2 = parseFloat(document.getElementById('comparePercentage2').value) || 0;
    
    const results = [
        calculateDiscountResult(originalPrice, compare1, taxRate, taxCalculation, quantity),
        calculateDiscountResult(originalPrice, compare2, taxRate, taxCalculation, quantity)
    ];
    
    document.getElementById('comparisonSection').classList.remove('hidden');
    document.getElementById('discountComparison').innerHTML = `
        <div class="text-center p-6 bg-gray-50 rounded-lg border border-gray-200">
            <div class="text-2xl font-bold text-gray-600 mb-2">${compare1}% OFF</div>
            <div class="text-3xl font-bold text-green-600 mb-2">$${results[0].salePrice.toFixed(2)}</div>
            <div class="text-lg text-gray-700">Save $${results[0].discountAmount.toFixed(2)}</div>
            <div class="text-sm text-gray-500 mt-2">Final: $${results[0].finalPrice.toFixed(2)}</div>
        </div>
        <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200 relative">
            <div class="absolute -top-2 -right-2 bg-amber-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                BEST VALUE
            </div>
            <div class="text-2xl font-bold text-amber-600 mb-2">CURRENT</div>
            <div class="text-3xl font-bold text-amber-600 mb-2">$${calculateDiscountResult(originalPrice, 
                currentDiscountType === 'percentage' ? parseFloat(document.getElementById('discountPercentage').value) : 
                (parseFloat(document.getElementById('discountAmount').value) / originalPrice * 100), 
                taxRate, taxCalculation, quantity).salePrice.toFixed(2)}</div>
            <div class="text-lg text-gray-700">Your Selection</div>
        </div>
        <div class="text-center p-6 bg-gray-50 rounded-lg border border-gray-200">
            <div class="text-2xl font-bold text-gray-600 mb-2">${compare2}% OFF</div>
            <div class="text-3xl font-bold text-green-600 mb-2">$${results[1].salePrice.toFixed(2)}</div>
            <div class="text-lg text-gray-700">Save $${results[1].discountAmount.toFixed(2)}</div>
            <div class="text-sm text-gray-500 mt-2">Final: $${results[1].finalPrice.toFixed(2)}</div>
        </div>
    `;
}

function calculateDiscountResult(originalPrice, discountPercentage, taxRate, taxCalculation, quantity) {
    const discountAmount = originalPrice * (discountPercentage / 100);
    const salePrice = originalPrice - discountAmount;
    
    let taxAmount, finalPrice;
    if (taxCalculation === 'original') {
        taxAmount = originalPrice * (taxRate / 100);
        finalPrice = salePrice + taxAmount;
    } else {
        taxAmount = salePrice * (taxRate / 100);
        finalPrice = salePrice + taxAmount;
    }
    
    return {
        discountAmount: discountAmount * quantity,
        salePrice: salePrice * quantity,
        finalPrice: finalPrice * quantity
    };
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
    document.getElementById('referenceSection').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
    document.getElementById('comparisonSection').classList.add('hidden');
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

<style>
.type-btn, .quick-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.type-btn:hover, .quick-btn:hover {
    transform: translateY(-1px);
}

.discount-option {
    transition: all 0.3s ease;
}

.discount-option:hover {
    transform: scale(1.02);
}
</style>
@endsection