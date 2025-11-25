@extends('layouts.app')

@section('title', 'Split Bill Calculator | Divide Expenses Among Friends | CalculaterTools')

@section('meta-description', 'Free split bill calculator to divide restaurant bills, group expenses, and shared costs among friends. Handle tax, tip, and custom amounts with ease.')

@section('keywords', 'split bill calculator, bill splitter, expense divider, group payment, restaurant bill split, shared costs calculator')

@section('canonical', url('/calculators/split-bill'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Split Bill Calculator",
    "description": "Divide restaurant bills, group expenses, and shared costs among friends with tax and tip calculations",
    "url": "{{ url('/calculators/split-bill') }}",
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
<div class="min-h-screen bg-violet-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-violet-600 hover:text-violet-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#financial" class="text-violet-600 hover:text-violet-800 transition duration-150">Financial Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Split Bill Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Split Bill Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Divide restaurant bills, group expenses, and shared costs among friends with ease. Handle tax, tip, and custom amounts effortlessly.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Split Your Bill</h2>
                        <p class="text-gray-600 mb-6">Enter bill details and configure how to split among people</p>
                        
                        <form id="splitBillCalculatorForm" class="space-y-6">
                            <!-- Bill Amount -->
                            <div>
                                <label for="totalBill" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Total Bill Amount ($)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="totalBill" 
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200"
                                        placeholder="0.00" 
                                        min="0" 
                                        max="10000" 
                                        step="0.01"
                                        value="100"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter the total bill amount before tax and tip</p>
                            </div>

                            <!-- Tax and Tip -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="taxRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Tax Rate (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="taxRate" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200"
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
                                    <label for="tipPercentage" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Tip Percentage (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="tipPercentage" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200"
                                            placeholder="e.g., 18" 
                                            min="0" 
                                            max="100" 
                                            step="0.1"
                                            value="18"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Split Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Split Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <button type="button" onclick="setSplitMethod('equal')" class="split-method-btn py-3 px-4 border-2 border-violet-500 bg-violet-50 text-violet-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-equals mr-2"></i>
                                        Equal Split
                                    </button>
                                    <button type="button" onclick="setSplitMethod('custom')" class="split-method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-user-edit mr-2"></i>
                                        Custom Amounts
                                    </button>
                                    <button type="button" onclick="setSplitMethod('items')" class="split-method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-receipt mr-2"></i>
                                        By Items
                                    </button>
                                </div>
                            </div>

                            <!-- Number of People -->
                            <div>
                                <label for="numberOfPeople" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Number of People
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="numberOfPeople" 
                                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition duration-200"
                                        placeholder="e.g., 4" 
                                        min="1" 
                                        max="20" 
                                        step="1"
                                        value="4"
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">people</span>
                                </div>
                            </div>

                            <!-- People Configuration -->
                            <div id="peopleConfiguration" class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-sm font-semibold text-gray-800">People</h3>
                                    <button type="button" onclick="addPerson()" class="text-violet-600 hover:text-violet-800 text-sm font-medium">
                                        <i class="fas fa-plus mr-1"></i>Add Person
                                    </button>
                                </div>
                                <div id="peopleList" class="space-y-3">
                                    <!-- People will be dynamically added here -->
                                </div>
                            </div>

                            <!-- Items Configuration (Hidden by default) -->
                            <div id="itemsConfiguration" class="space-y-4 hidden">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-sm font-semibold text-gray-800">Items</h3>
                                    <button type="button" onclick="addItem()" class="text-violet-600 hover:text-violet-800 text-sm font-medium">
                                        <i class="fas fa-plus mr-1"></i>Add Item
                                    </button>
                                </div>
                                <div id="itemsList" class="space-y-3">
                                    <!-- Items will be dynamically added here -->
                                </div>
                            </div>

                            <!-- Rounding Options -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Rounding Options
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <button type="button" onclick="setRounding('exact')" class="rounding-btn border border-violet-500 bg-violet-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-calculator text-violet-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Exact</div>
                                        <div class="text-xs text-gray-500">No rounding</div>
                                    </button>
                                    <button type="button" onclick="setRounding('nearest')" class="rounding-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-exchange-alt text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Nearest Dollar</div>
                                        <div class="text-xs text-gray-500">Round to $1</div>
                                    </button>
                                    <button type="button" onclick="setRounding('up')" class="rounding-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-arrow-up text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Round Up</div>
                                        <div class="text-xs text-gray-500">To next dollar</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateSplit()"
                                class="w-full bg-violet-600 hover:bg-violet-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-violet-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Split Bill
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Split Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-users text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter bill details</p>
                                <p class="text-sm">to see split amounts</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-violet-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Common Splits</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">2 people</span>
                                    <span class="font-medium text-gray-800">50% each</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">3 people</span>
                                    <span class="font-medium text-gray-800">33.3% each</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">4 people</span>
                                    <span class="font-medium text-gray-800">25% each</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Total Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Total Bill Summary</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-6 bg-violet-50 rounded-lg border border-violet-200">
                            <div class="text-2xl font-bold text-violet-600 mb-2" id="finalTotal">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Grand Total</div>
                            <div class="text-sm text-gray-500 mt-1">With tax & tip</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="totalTax">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Total Tax</div>
                            <div class="text-sm text-gray-500 mt-1" id="taxRateDisplay">0%</div>
                        </div>
                        <div class="text-center p-6 bg-emerald-50 rounded-lg border border-emerald-200">
                            <div class="text-2xl font-bold text-emerald-600 mb-2" id="totalTip">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Total Tip</div>
                            <div class="text-sm text-gray-500 mt-1" id="tipPercentageDisplay">0%</div>
                        </div>
                        <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200">
                            <div class="text-2xl font-bold text-amber-600 mb-2" id="perPersonAverage">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Per Person</div>
                            <div class="text-sm text-gray-500 mt-1">Average share</div>
                        </div>
                    </div>
                </div>

                <!-- Individual Splits -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Individual Splits</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-xs text-gray-700 uppercase bg-violet-50">
                                <tr>
                                    <th class="px-4 py-3">Person</th>
                                    <th class="px-4 py-3">Share Amount</th>
                                    <th class="px-4 py-3">Percentage</th>
                                    <th class="px-4 py-3">Tax & Tip</th>
                                    <th class="px-4 py-3">Total Owed</th>
                                </tr>
                            </thead>
                            <tbody id="splitResults">
                                <!-- Results will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Payment Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Payment Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Cost Distribution -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Distribution</h3>
                            <div class="space-y-4" id="costDistribution">
                            </div>
                        </div>
                        
                        <!-- Quick Payment Methods -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Payment Suggestions</h3>
                            <div class="space-y-4" id="paymentSuggestions">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Export Options -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Share & Export</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <button onclick="exportToText()" class="p-4 border border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 text-center">
                            <i class="fas fa-file-alt text-blue-600 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-800">Export as Text</div>
                            <div class="text-sm text-gray-600 mt-1">Copy to clipboard</div>
                        </button>
                        <button onclick="shareResults()" class="p-4 border border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition duration-200 text-center">
                            <i class="fas fa-share-alt text-green-600 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-800">Share Results</div>
                            <div class="text-sm text-gray-600 mt-1">Send to friends</div>
                        </button>
                        <button onclick="resetCalculator()" class="p-4 border border-gray-200 rounded-lg hover:border-red-500 hover:bg-red-50 transition duration-200 text-center">
                            <i class="fas fa-redo text-red-600 text-2xl mb-2"></i>
                            <div class="font-semibold text-gray-800">Start Over</div>
                            <div class="text-sm text-gray-600 mt-1">Clear all data</div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tips & Guidelines -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Smart Bill Splitting Tips</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-violet-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-receipt text-violet-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Itemize First</h3>
                        <p class="text-gray-600">Take a photo of the receipt before splitting. This helps resolve disputes and ensures accurate custom splits.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calculator text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Tax & Tip Fairly</h3>
                        <p class="text-gray-600">Split tax and tip proportionally based on each person's share of the bill for the fairest distribution.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mobile-alt text-emerald-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Use Payment Apps</h3>
                        <p class="text-gray-600">Leverage payment apps like Venmo, PayPal, or Cash App for quick and easy money transfers between friends.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Communicate Clearly</h3>
                        <p class="text-gray-600">Discuss splitting methods before ordering to avoid confusion. Equal split is easiest for groups.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Bill Splitting FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the fairest way to split a bill?</h3>
                        <p class="text-gray-600">The fairest method depends on the situation. Equal split is simplest for similar orders, while itemized split is fairest for vastly different orders. Consider splitting tax and tip proportionally.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How should we handle tax and tip?</h3>
                        <p class="text-gray-600">Most fair is to split tax and tip proportionally based on each person's share of the subtotal. Alternatively, you can split them equally if orders were similar in value.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What if someone didn't drink alcohol?</h3>
                        <p class="text-gray-600">In custom split mode, you can assign alcohol separately to those who consumed it. This ensures non-drinkers don't subsidize others' alcohol consumption.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I handle shared appetizers?</h3>
                        <p class="text-gray-600">You can either split shared items equally among all participants or assign them specifically to those who actually ate them using the custom split method.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the easiest payment method for groups?</h3>
                        <p class="text-gray-600">Having one person pay the entire bill and others pay them back via digital payment apps is usually the most efficient method for large groups.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('tip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-violet-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-violet-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-violet-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tip Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate restaurant tips easily</p>
                    </a>
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-violet-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tag text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate sale prices & savings</p>
                    </a>
                    <a href="{{ route('percentage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-violet-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-emerald-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate percentages & splits</p>
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
let currentSplitMethod = 'equal';
let currentRounding = 'exact';
let people = [];
let items = [];

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    initializePeople();
    calculateSplit(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change
    document.getElementById('totalBill').addEventListener('input', debounce(calculateSplit, 300));
    document.getElementById('taxRate').addEventListener('input', debounce(calculateSplit, 300));
    document.getElementById('tipPercentage').addEventListener('input', debounce(calculateSplit, 300));
    document.getElementById('numberOfPeople').addEventListener('input', function() {
        updatePeopleCount();
        calculateSplit();
    });
}

function setSplitMethod(method) {
    currentSplitMethod = method;
    
    // Update button styles
    document.querySelectorAll('.split-method-btn').forEach(btn => {
        btn.classList.remove('border-violet-500', 'bg-violet-50', 'text-violet-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-violet-500', 'bg-violet-50', 'text-violet-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide configuration sections
    if (method === 'equal') {
        document.getElementById('peopleConfiguration').classList.remove('hidden');
        document.getElementById('itemsConfiguration').classList.add('hidden');
    } else if (method === 'custom') {
        document.getElementById('peopleConfiguration').classList.remove('hidden');
        document.getElementById('itemsConfiguration').classList.add('hidden');
        enableCustomAmounts();
    } else if (method === 'items') {
        document.getElementById('peopleConfiguration').classList.add('hidden');
        document.getElementById('itemsConfiguration').classList.remove('hidden');
        initializeItems();
    }
    
    calculateSplit();
}

function setRounding(rounding) {
    currentRounding = rounding;
    
    document.querySelectorAll('.rounding-btn').forEach(btn => {
        btn.classList.remove('border-violet-500', 'bg-violet-50', 'border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50');
    });
    
    const colorMap = {
        'exact': 'violet',
        'nearest': 'blue',
        'up': 'green'
    };
    
    event.target.classList.add(`border-${colorMap[rounding]}-500`, `bg-${colorMap[rounding]}-50`);
    
    calculateSplit();
}

function initializePeople() {
    const peopleCount = parseInt(document.getElementById('numberOfPeople').value) || 4;
    people = [];
    
    for (let i = 1; i <= peopleCount; i++) {
        people.push({
            id: i,
            name: `Person ${i}`,
            share: currentSplitMethod === 'custom' ? 0 : 100 / peopleCount
        });
    }
    
    renderPeopleList();
}

function updatePeopleCount() {
    const newCount = parseInt(document.getElementById('numberOfPeople').value) || 1;
    const currentCount = people.length;
    
    if (newCount > currentCount) {
        // Add new people
        for (let i = currentCount + 1; i <= newCount; i++) {
            people.push({
                id: i,
                name: `Person ${i}`,
                share: currentSplitMethod === 'custom' ? 0 : 100 / newCount
            });
        }
    } else if (newCount < currentCount) {
        // Remove extra people
        people = people.slice(0, newCount);
    } else {
        // Update shares for equal split
        if (currentSplitMethod === 'equal') {
            people.forEach(person => {
                person.share = 100 / newCount;
            });
        }
    }
    
    renderPeopleList();
    calculateSplit();
}

function renderPeopleList() {
    const container = document.getElementById('peopleList');
    container.innerHTML = '';
    
    people.forEach((person, index) => {
        const personElement = document.createElement('div');
        personElement.className = 'flex items-center space-x-3 p-3 bg-gray-50 rounded-lg';
        personElement.innerHTML = `
            <div class="flex-1">
                <input 
                    type="text" 
                    value="${person.name}"
                    oninput="updatePersonName(${index}, this.value)"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Person name"
                >
            </div>
            ${currentSplitMethod === 'custom' ? `
            <div class="w-24">
                <div class="relative">
                    <input 
                        type="number" 
                        value="${person.share}"
                        oninput="updatePersonShare(${index}, this.value)"
                        class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-violet-500 focus:border-violet-500"
                        placeholder="0"
                        min="0"
                        step="0.1"
                    >
                    <span class="absolute right-2 top-2 text-gray-500 text-sm">%</span>
                </div>
            </div>
            ` : ''}
            ${people.length > 1 ? `
            <button 
                type="button" 
                onclick="removePerson(${index})"
                class="text-red-600 hover:text-red-800 p-2"
            >
                <i class="fas fa-times"></i>
            </button>
            ` : ''}
        `;
        container.appendChild(personElement);
    });
    
    // Update total share display for custom method
    if (currentSplitMethod === 'custom') {
        updateTotalShare();
    }
}

function addPerson() {
    const newId = people.length > 0 ? Math.max(...people.map(p => p.id)) + 1 : 1;
    people.push({
        id: newId,
        name: `Person ${newId}`,
        share: currentSplitMethod === 'custom' ? 0 : 100 / (people.length + 1)
    });
    
    document.getElementById('numberOfPeople').value = people.length;
    renderPeopleList();
    calculateSplit();
}

function removePerson(index) {
    if (people.length <= 1) return;
    
    people.splice(index, 1);
    document.getElementById('numberOfPeople').value = people.length;
    renderPeopleList();
    calculateSplit();
}

function updatePersonName(index, name) {
    people[index].name = name || `Person ${index + 1}`;
}

function updatePersonShare(index, share) {
    const shareValue = parseFloat(share) || 0;
    people[index].share = shareValue;
    updateTotalShare();
    calculateSplit();
}

function updateTotalShare() {
    const totalShare = people.reduce((sum, person) => sum + (person.share || 0), 0);
    const shareElement = document.getElementById('totalShareDisplay');
    
    if (!shareElement) {
        const container = document.getElementById('peopleList');
        const totalElement = document.createElement('div');
        totalElement.id = 'totalShareDisplay';
        totalElement.className = 'text-sm font-semibold text-gray-700 p-2';
        container.appendChild(totalElement);
    }
    
    document.getElementById('totalShareDisplay').textContent = 
        `Total Share: ${totalShare.toFixed(1)}% ${totalShare !== 100 ? '(Adjust to 100%)' : ''}`;
    
    if (totalShare !== 100) {
        document.getElementById('totalShareDisplay').classList.add('text-red-600');
    } else {
        document.getElementById('totalShareDisplay').classList.remove('text-red-600');
    }
}

function enableCustomAmounts() {
    people.forEach(person => {
        person.share = 0;
    });
    renderPeopleList();
}

function initializeItems() {
    items = [
        { id: 1, name: 'Main Course', price: 25, people: people.map(p => p.id) },
        { id: 2, name: 'Appetizer', price: 15, people: people.map(p => p.id) },
        { id: 3, name: 'Dessert', price: 8, people: people.map(p => p.id) },
        { id: 4, name: 'Drinks', price: 12, people: people.map(p => p.id) }
    ];
    renderItemsList();
}

function renderItemsList() {
    const container = document.getElementById('itemsList');
    container.innerHTML = '';
    
    items.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.className = 'p-4 bg-gray-50 rounded-lg space-y-3';
        itemElement.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <input 
                        type="text" 
                        value="${item.name}"
                        oninput="updateItemName(${index}, this.value)"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-violet-500 focus:border-violet-500"
                        placeholder="Item name"
                    >
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">$</span>
                    </div>
                    <input 
                        type="number" 
                        value="${item.price}"
                        oninput="updateItemPrice(${index}, this.value)"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-violet-500 focus:border-violet-500"
                        placeholder="0.00"
                        min="0"
                        step="0.01"
                    >
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Shared by:</label>
                <div class="flex flex-wrap gap-2">
                    ${people.map(person => `
                        <label class="inline-flex items-center">
                            <input 
                                type="checkbox" 
                                ${item.people.includes(person.id) ? 'checked' : ''}
                                onchange="updateItemPeople(${index}, ${person.id}, this.checked)"
                                class="rounded border-gray-300 text-violet-600 focus:ring-violet-500"
                            >
                            <span class="ml-2 text-sm text-gray-700">${person.name}</span>
                        </label>
                    `).join('')}
                </div>
            </div>
            ${items.length > 1 ? `
            <div class="flex justify-end">
                <button 
                    type="button" 
                    onclick="removeItem(${index})"
                    class="text-red-600 hover:text-red-800 text-sm font-medium"
                >
                    <i class="fas fa-times mr-1"></i>Remove Item
                </button>
            </div>
            ` : ''}
        `;
        container.appendChild(itemElement);
    });
}

function addItem() {
    const newId = items.length > 0 ? Math.max(...items.map(i => i.id)) + 1 : 1;
    items.push({
        id: newId,
        name: `Item ${newId}`,
        price: 0,
        people: people.map(p => p.id)
    });
    renderItemsList();
    calculateSplit();
}

function removeItem(index) {
    if (items.length <= 1) return;
    items.splice(index, 1);
    renderItemsList();
    calculateSplit();
}

function updateItemName(index, name) {
    items[index].name = name || `Item ${index + 1}`;
}

function updateItemPrice(index, price) {
    items[index].price = parseFloat(price) || 0;
    calculateSplit();
}

function updateItemPeople(index, personId, included) {
    if (included) {
        if (!items[index].people.includes(personId)) {
            items[index].people.push(personId);
        }
    } else {
        items[index].people = items[index].people.filter(id => id !== personId);
    }
    calculateSplit();
}

function calculateSplit() {
    const totalBill = parseFloat(document.getElementById('totalBill').value) || 0;
    const taxRate = parseFloat(document.getElementById('taxRate').value) || 0;
    const tipPercentage = parseFloat(document.getElementById('tipPercentage').value) || 0;
    
    if (!totalBill || totalBill <= 0) {
        showError('Please enter a valid bill amount');
        return;
    }
    
    // Calculate tax and tip
    const taxAmount = totalBill * (taxRate / 100);
    const tipAmount = totalBill * (tipPercentage / 100);
    const grandTotal = totalBill + taxAmount + tipAmount;
    
    let personShares = [];
    
    if (currentSplitMethod === 'equal') {
        // Equal split among all people
        const sharePerPerson = 100 / people.length;
        personShares = people.map(person => ({
            ...person,
            shareAmount: totalBill * (sharePerPerson / 100),
            sharePercentage: sharePerPerson
        }));
    } else if (currentSplitMethod === 'custom') {
        // Custom percentage splits
        const totalShare = people.reduce((sum, person) => sum + (person.share || 0), 0);
        if (totalShare === 0) {
            showError('Please assign share percentages to people');
            return;
        }
        
        personShares = people.map(person => ({
            ...person,
            shareAmount: totalBill * ((person.share || 0) / 100),
            sharePercentage: person.share || 0
        }));
    } else if (currentSplitMethod === 'items') {
        // Split by items
        personShares = people.map(person => ({
            ...person,
            shareAmount: 0,
            sharePercentage: 0
        }));
        
        // Calculate each person's share based on items they're assigned to
        items.forEach(item => {
            const peopleCount = item.people.length;
            if (peopleCount > 0) {
                const sharePerPerson = item.price / peopleCount;
                item.people.forEach(personId => {
                    const personIndex = personShares.findIndex(p => p.id === personId);
                    if (personIndex !== -1) {
                        personShares[personIndex].shareAmount += sharePerPerson;
                    }
                });
            }
        });
        
        // Calculate percentages
        personShares.forEach(person => {
            person.sharePercentage = (person.shareAmount / totalBill) * 100;
        });
    }
    
    // Calculate final amounts with tax and tip
    personShares.forEach(person => {
        const taxShare = taxAmount * (person.sharePercentage / 100);
        const tipShare = tipAmount * (person.sharePercentage / 100);
        person.taxAndTip = taxShare + tipShare;
        person.totalOwed = person.shareAmount + taxShare + tipShare;
        
        // Apply rounding
        if (currentRounding === 'nearest') {
            person.totalOwed = Math.round(person.totalOwed);
        } else if (currentRounding === 'up') {
            person.totalOwed = Math.ceil(person.totalOwed);
        }
    });
    
    // Recalculate grand total after rounding to ensure it matches
    const recalculatedGrandTotal = personShares.reduce((sum, person) => sum + person.totalOwed, 0);
    const roundingDifference = recalculatedGrandTotal - grandTotal;
    
    // Display results
    displayResults(personShares, grandTotal, taxAmount, tipAmount, taxRate, tipPercentage, roundingDifference);
    generateDetailedAnalysis(personShares, totalBill, taxAmount, tipAmount, grandTotal);
}

function displayResults(personShares, grandTotal, taxAmount, tipAmount, taxRate, tipPercentage, roundingDifference) {
    const perPersonAverage = grandTotal / personShares.length;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-violet-50 to-purple-50 rounded-xl p-6 border-2 border-violet-200">
                <div class="text-center mb-4">
                    <div class="text-2xl md:text-3xl font-bold text-violet-600 mb-2">$${perPersonAverage.toFixed(2)}</div>
                    <div class="text-lg font-semibold text-gray-700">Average Per Person</div>
                    <div class="text-sm text-gray-500 mt-1">${personShares.length} people sharing</div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">$${grandTotal.toFixed(2)}</div>
                    <div class="text-sm text-blue-800">Grand Total</div>
                </div>
                <div class="bg-emerald-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-emerald-600 mb-1">${currentSplitMethod}</div>
                    <div class="text-sm text-emerald-800">Split Method</div>
                </div>
            </div>

            ${roundingDifference !== 0 ? `
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <h4 class="font-semibold text-amber-900 mb-2">Rounding Adjustment</h4>
                <p class="text-sm text-amber-800">
                    Total adjusted by <strong>$${Math.abs(roundingDifference).toFixed(2)}</strong> due to ${currentRounding} rounding
                </p>
            </div>
            ` : ''}
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('referenceSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update main metrics
    document.getElementById('finalTotal').textContent = `$${grandTotal.toFixed(2)}`;
    document.getElementById('totalTax').textContent = `$${taxAmount.toFixed(2)}`;
    document.getElementById('taxRateDisplay').textContent = `${taxRate}%`;
    document.getElementById('totalTip').textContent = `$${tipAmount.toFixed(2)}`;
    document.getElementById('tipPercentageDisplay').textContent = `${tipPercentage}%`;
    document.getElementById('perPersonAverage').textContent = `$${perPersonAverage.toFixed(2)}`;
    
    // Generate individual split results
    generateSplitResults(personShares);
}

function generateSplitResults(personShares) {
    const container = document.getElementById('splitResults');
    container.innerHTML = '';
    
    personShares.forEach(person => {
        const row = document.createElement('tr');
        row.className = 'bg-white border-b hover:bg-gray-50';
        row.innerHTML = `
            <td class="px-4 py-3 font-medium text-gray-900">${person.name}</td>
            <td class="px-4 py-3">$${person.shareAmount.toFixed(2)}</td>
            <td class="px-4 py-3">${person.sharePercentage.toFixed(1)}%</td>
            <td class="px-4 py-3">$${person.taxAndTip.toFixed(2)}</td>
            <td class="px-4 py-3 font-semibold text-violet-600">$${person.totalOwed.toFixed(2)}</td>
        `;
        container.appendChild(row);
    });
}

function generateDetailedAnalysis(personShares, totalBill, taxAmount, tipAmount, grandTotal) {
    generateCostDistribution(personShares, totalBill, taxAmount, tipAmount);
    generatePaymentSuggestions(personShares);
}

function generateCostDistribution(personShares, totalBill, taxAmount, tipAmount) {
    const billPercentage = (totalBill / grandTotal) * 100;
    const taxPercentage = (taxAmount / grandTotal) * 100;
    const tipPercentage = (tipAmount / grandTotal) * 100;
    
    document.getElementById('costDistribution').innerHTML = `
        <div class="space-y-4">
            <!-- Cost Breakdown Chart -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Total Cost Breakdown</h4>
                <div class="relative h-6 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-6 bg-blue-500 rounded-l-full" 
                         style="width: ${billPercentage}%">
                    </div>
                    <div class="absolute h-6 bg-violet-500" 
                         style="left: ${billPercentage}%; width: ${taxPercentage}%">
                    </div>
                    <div class="absolute h-6 bg-emerald-500 rounded-r-full" 
                         style="left: ${billPercentage + taxPercentage}%; width: ${tipPercentage}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>Bill (${billPercentage.toFixed(1)}%)</span>
                    <span>Tax (${taxPercentage.toFixed(1)}%)</span>
                    <span>Tip (${tipPercentage.toFixed(1)}%)</span>
                </div>
            </div>
            
            <!-- Person Distribution -->
            <div class="space-y-2">
                ${personShares.map(person => `
                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                        <span class="text-sm text-gray-700">${person.name}</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-medium text-gray-900">${person.sharePercentage.toFixed(1)}%</span>
                            <span class="text-sm font-semibold text-violet-600">$${person.totalOwed.toFixed(2)}</span>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;
}

function generatePaymentSuggestions(personShares) {
    // Find who should pay whom
    const payments = calculateOptimalPayments(personShares);
    
    document.getElementById('paymentSuggestions').innerHTML = `
        <div class="space-y-4">
            <!-- Payment Recommendations -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-3">Payment Recommendations</h4>
                <div class="space-y-2 text-sm">
                    ${payments.length > 0 ? payments.map(payment => `
                        <div class="flex justify-between items-center">
                            <span class="text-blue-800">${payment.from} → ${payment.to}</span>
                            <span class="font-semibold text-blue-900">$${payment.amount.toFixed(2)}</span>
                        </div>
                    `).join('') : `
                        <div class="text-center text-blue-600 py-2">
                            <i class="fas fa-check-circle mr-2"></i>
                            Amounts are perfectly balanced
                        </div>
                    `}
                </div>
            </div>
            
            <!-- Quick Tips -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <h4 class="font-semibold text-amber-900 mb-2">Payment Tips</h4>
                <div class="space-y-2 text-xs text-amber-800">
                    <div class="flex items-start">
                        <i class="fas fa-mobile-alt mt-1 mr-2"></i>
                        <span>Use payment apps like Venmo or PayPal for quick transfers</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-clock mt-1 mr-2"></i>
                        <span>Send payments within 24 hours to avoid awkwardness</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-comment mt-1 mr-2"></i>
                        <span>Include a friendly note with your payment</span>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function calculateOptimalPayments(personShares) {
    const average = personShares.reduce((sum, person) => sum + person.totalOwed, 0) / personShares.length;
    const balances = personShares.map(person => ({
        name: person.name,
        balance: person.totalOwed - average
    }));
    
    const debtors = balances.filter(b => b.balance < 0).map(b => ({...b, balance: -b.balance}));
    const creditors = balances.filter(b => b.balance > 0);
    
    const payments = [];
    
    debtors.forEach(debtor => {
        let remaining = debtor.balance;
        
        for (let i = 0; i < creditors.length && remaining > 0.01; i++) {
            if (creditors[i].balance > 0.01) {
                const amount = Math.min(remaining, creditors[i].balance);
                payments.push({
                    from: debtor.name,
                    to: creditors[i].name,
                    amount: amount
                });
                
                remaining -= amount;
                creditors[i].balance -= amount;
            }
        }
    });
    
    return payments;
}

function exportToText() {
    const results = document.getElementById('splitResults').innerText;
    const summary = document.getElementById('finalTotal').innerText;
    
    const exportText = `Bill Split Results\n\nTotal: ${summary}\n\n${results}`;
    
    navigator.clipboard.writeText(exportText).then(() => {
        alert('Results copied to clipboard!');
    });
}

function shareResults() {
    if (navigator.share) {
        navigator.share({
            title: 'Bill Split Results',
            text: 'Check out our bill split calculation!',
            url: window.location.href
        });
    } else {
        alert('Share functionality not available in your browser. You can copy the results instead.');
    }
}

function resetCalculator() {
    if (confirm('Are you sure you want to reset all data?')) {
        document.getElementById('totalBill').value = '100';
        document.getElementById('taxRate').value = '8.5';
        document.getElementById('tipPercentage').value = '18';
        document.getElementById('numberOfPeople').value = '4';
        
        setSplitMethod('equal');
        setRounding('exact');
        initializePeople();
        calculateSplit();
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
    document.getElementById('referenceSection').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
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
.split-method-btn, .rounding-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.split-method-btn:hover, .rounding-btn:hover {
    transform: translateY(-1px);
}

.person-item, .item-card {
    transition: all 0.3s ease;
}

.person-item:hover, .item-card:hover {
    transform: scale(1.01);
}
</style>
@endsection