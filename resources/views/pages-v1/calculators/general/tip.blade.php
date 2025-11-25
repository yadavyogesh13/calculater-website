@extends('layouts.app')

@section('title', 'Tip Calculator | Calculate Restaurant Tips & Split Bills | CalculaterTools')

@section('meta-description', 'Free tip calculator to calculate restaurant tips, split bills among friends, and manage group payments. Perfect for dining out and service tipping.')

@section('keywords', 'tip calculator, restaurant tip, bill splitter, gratuity calculator, service tip, bill calculator, dining calculator')

@section('canonical', url('/calculators/tip'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Tip Calculator",
    "description": "Calculate restaurant tips, split bills among friends, and manage group payments",
    "url": "{{ url('/calculators/tip') }}",
    "operatingSystem": "Any",
    "applicationCategory": "FinancialApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-emerald-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-emerald-600 hover:text-emerald-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#financial" class="text-emerald-600 hover:text-emerald-800 transition duration-150">Financial Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Tip Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Tip Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate restaurant tips, split bills among friends, and manage group payments with ease. Never struggle with tipping math again!
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Tip</h2>
                        <p class="text-gray-600 mb-6">Enter your bill details to calculate the perfect tip</p>
                        
                        <form id="tipCalculatorForm" class="space-y-6">
                            <!-- Bill Amount -->
                            <div>
                                <label for="billAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Bill Amount ($)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="billAmount" 
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                        placeholder="0.00" 
                                        min="0" 
                                        max="10000" 
                                        step="0.01"
                                        value="100"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter the total bill amount before tax</p>
                            </div>

                            <!-- Tip Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Tip Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" id="percentageBtn" class="method-btn py-3 px-4 border-2 border-emerald-500 bg-emerald-50 text-emerald-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-percentage mr-2"></i>
                                        Percentage
                                    </button>
                                    <button type="button" id="fixedBtn" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-dollar-sign mr-2"></i>
                                        Fixed Amount
                                    </button>
                                </div>
                            </div>

                            <!-- Percentage Tip Inputs -->
                            <div id="percentageInputs" class="space-y-4">
                                <div>
                                    <label for="tipPercentage" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Tip Percentage (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="tipPercentage" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="e.g., 15" 
                                            min="0" 
                                            max="100" 
                                            step="0.1"
                                            value="15"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">%</span>
                                    </div>
                                </div>
                                
                                <!-- Quick Tip Buttons -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Quick Tip Rates
                                    </label>
                                    <div class="grid grid-cols-4 gap-2">
                                        <button type="button" onclick="setQuickTip(15)" class="quick-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-emerald-500 hover:bg-emerald-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">15%</div>
                                            <div class="text-xs text-gray-500">Standard</div>
                                        </button>
                                        <button type="button" onclick="setQuickTip(18)" class="quick-btn py-2 px-3 border border-emerald-500 bg-emerald-50 rounded-lg text-center transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">18%</div>
                                            <div class="text-xs text-gray-500">Good</div>
                                        </button>
                                        <button type="button" onclick="setQuickTip(20)" class="quick-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-emerald-500 hover:bg-emerald-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">20%</div>
                                            <div class="text-xs text-gray-500">Great</div>
                                        </button>
                                        <button type="button" onclick="setQuickTip(25)" class="quick-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-emerald-500 hover:bg-emerald-50 transition duration-200">
                                            <div class="text-sm font-medium text-gray-800">25%</div>
                                            <div class="text-xs text-gray-500">Excellent</div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Fixed Amount Inputs -->
                            <div id="fixedInputs" class="space-y-4 hidden">
                                <div>
                                    <label for="fixedTipAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Tip Amount ($)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">$</span>
                                        </div>
                                        <input 
                                            type="number" 
                                            id="fixedTipAmount" 
                                            class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="0.00" 
                                            min="0" 
                                            max="10000" 
                                            step="0.01"
                                            value="15"
                                            required
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Tax and Split Options -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="taxRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Tax Rate (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="taxRate" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
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
                                    <label for="numberOfPeople" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Split Between
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="numberOfPeople" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200"
                                            placeholder="e.g., 1" 
                                            min="1" 
                                            max="50" 
                                            step="1"
                                            value="1"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">people</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Rounding Options -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Rounding Options
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    <button type="button" onclick="setRounding('none')" class="rounding-btn border border-emerald-500 bg-emerald-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-calculator text-emerald-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Exact</div>
                                        <div class="text-xs text-gray-500">No rounding</div>
                                    </button>
                                    <button type="button" onclick="setRounding('up')" class="rounding-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-arrow-up text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Round Up</div>
                                        <div class="text-xs text-gray-500">To nearest dollar</div>
                                    </button>
                                    <button type="button" onclick="setRounding('nearest')" class="rounding-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-exchange-alt text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Nearest</div>
                                        <div class="text-xs text-gray-500">To nearest dollar</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Service Quality -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Service Quality
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setServiceQuality('poor')" class="service-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-frown text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Poor</div>
                                        <div class="text-xs text-gray-500">10-12%</div>
                                    </button>
                                    <button type="button" onclick="setServiceQuality('average')" class="service-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-meh text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Average</div>
                                        <div class="text-xs text-gray-500">15%</div>
                                    </button>
                                    <button type="button" onclick="setServiceQuality('good')" class="service-btn border border-emerald-500 bg-emerald-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-smile text-emerald-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Good</div>
                                        <div class="text-xs text-gray-500">18-20%</div>
                                    </button>
                                    <button type="button" onclick="setServiceQuality('excellent')" class="service-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-grin-stars text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Excellent</div>
                                        <div class="text-xs text-gray-500">22-25%</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateTip()"
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-emerald-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Tip
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Tip Summary</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-utensils text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter bill details</p>
                                <p class="text-sm">to see tip calculation</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-emerald-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Standard Tip Rates</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Standard Service</span>
                                    <span class="font-medium text-gray-800">15%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Good Service</span>
                                    <span class="font-medium text-gray-800">18-20%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Excellent Service</span>
                                    <span class="font-medium text-gray-800">22-25%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Main Totals -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Payment Summary</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-6 bg-emerald-50 rounded-lg border border-emerald-200">
                            <div class="text-2xl font-bold text-emerald-600 mb-2" id="totalTip">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Total Tip</div>
                            <div class="text-sm text-gray-500 mt-1" id="tipPercentageDisplay">0%</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="totalWithTip">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Bill + Tip</div>
                            <div class="text-sm text-gray-500 mt-1">Before tax</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="taxAmount">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Tax Amount</div>
                            <div class="text-sm text-gray-500 mt-1" id="taxRateDisplay">0%</div>
                        </div>
                        <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200">
                            <div class="text-2xl font-bold text-amber-600 mb-2" id="grandTotal">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Grand Total</div>
                            <div class="text-sm text-gray-500 mt-1">Final amount</div>
                        </div>
                    </div>
                </div>

                <!-- Split Bill Results -->
                <div id="splitSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8 hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Split Bill Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="splitDetails">
                    </div>
                </div>

                <!-- Cost Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Cost Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Amount Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Amount Breakdown</h3>
                            <div class="space-y-4" id="amountBreakdown">
                            </div>
                        </div>
                        
                        <!-- Visual Representation -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Distribution</h3>
                            <div class="space-y-4" id="costVisualization">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tipping Guidelines -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tipping Guidelines & Tips</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Service Guidelines -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Service Quality Guidelines</h3>
                            <div class="space-y-3" id="serviceGuidelines">
                            </div>
                        </div>
                        
                        <!-- Quick Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Smart Tipping Tips</h3>
                            <div class="space-y-3" id="tippingTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tipping Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tipping Etiquette Guide</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-utensils text-emerald-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Restaurants</h3>
                        <p class="text-gray-600">15-20% for standard service, 18-25% for exceptional service. Always tip on the pre-tax amount.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-cocktail text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Bars</h3>
                        <p class="text-gray-600">$1-2 per drink or 15-20% of the total bar tab. Tip more for complex cocktails.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-car text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Delivery</h3>
                        <p class="text-gray-600">15-20% for food delivery, minimum $3-5. Consider weather and distance.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hotel text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Hotels</h3>
                        <p class="text-gray-600">$2-5 per night for housekeeping, $1-2 per bag for bellhops, $5-10 for concierge.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tip Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Should I tip on the total bill including tax?</h3>
                        <p class="text-gray-600">Standard practice is to tip on the pre-tax amount. However, some people prefer to tip on the total including tax, especially if the service was exceptional.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between 15%, 18%, and 20% tips?</h3>
                        <p class="text-gray-600">15% is standard for adequate service, 18% for good service, and 20% or more for excellent service. Many restaurants now suggest 18-20% as the new standard.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I split the bill evenly among friends?</h3>
                        <p class="text-gray-600">Use the "Split Between" feature to divide the total bill (including tip and tax) evenly among all people. The calculator will show each person's share.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I tip more than 20%?</h3>
                        <p class="text-gray-600">Consider tipping 22-25% for exceptional service, large groups (6+ people), during holidays, or when the server goes above and beyond expectations.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is it okay to tip less than 15%?</h3>
                        <p class="text-gray-600">Only tip less than 15% for genuinely poor service. If service was terrible, speak with a manager first. Remember that servers often share tips with other staff.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-emerald-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tag text-emerald-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate sale prices and discounts</p>
                    </a>
                    <a href="{{ route('income.tax.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-emerald-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-receipt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Sales Tax Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate sales tax amounts</p>
                    </a>
                    <a href="{{ route('split.bill.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-emerald-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Bill Split Calculator</h3>
                        <p class="text-gray-600 text-sm">Split bills with custom amounts</p>
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
let currentMethod = 'percentage';
let currentRounding = 'none';
let currentServiceQuality = 'good';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateTip(); // Calculate with default values
});

function setupEventListeners() {
    // Calculation method toggle
    document.getElementById('percentageBtn').addEventListener('click', () => setCalculationMethod('percentage'));
    document.getElementById('fixedBtn').addEventListener('click', () => setCalculationMethod('fixed'));
    
    // Auto-calculate on input change
    document.getElementById('billAmount').addEventListener('input', debounce(calculateTip, 300));
    document.getElementById('tipPercentage').addEventListener('input', debounce(calculateTip, 300));
    document.getElementById('fixedTipAmount').addEventListener('input', debounce(calculateTip, 300));
    document.getElementById('taxRate').addEventListener('input', debounce(calculateTip, 300));
    document.getElementById('numberOfPeople').addEventListener('input', debounce(calculateTip, 300));
}

function setCalculationMethod(method) {
    currentMethod = method;
    
    if (method === 'percentage') {
        document.getElementById('percentageBtn').classList.add('border-emerald-500', 'bg-emerald-50', 'text-emerald-700');
        document.getElementById('percentageBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('fixedBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('fixedBtn').classList.remove('border-emerald-500', 'bg-emerald-50', 'text-emerald-700');
        document.getElementById('percentageInputs').classList.remove('hidden');
        document.getElementById('fixedInputs').classList.add('hidden');
    } else {
        document.getElementById('fixedBtn').classList.add('border-emerald-500', 'bg-emerald-50', 'text-emerald-700');
        document.getElementById('fixedBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('percentageBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('percentageBtn').classList.remove('border-emerald-500', 'bg-emerald-50', 'text-emerald-700');
        document.getElementById('fixedInputs').classList.remove('hidden');
        document.getElementById('percentageInputs').classList.add('hidden');
    }
    
    calculateTip();
}

function setQuickTip(percentage) {
    document.getElementById('tipPercentage').value = percentage;
    
    // Update quick buttons
    document.querySelectorAll('.quick-btn').forEach(btn => {
        btn.classList.remove('border-emerald-500', 'bg-emerald-50');
    });
    event.target.classList.add('border-emerald-500', 'bg-emerald-50');
    
    // Update service quality based on percentage
    if (percentage <= 12) setServiceQuality('poor');
    else if (percentage <= 15) setServiceQuality('average');
    else if (percentage <= 20) setServiceQuality('good');
    else setServiceQuality('excellent');
    
    calculateTip();
}

function setRounding(rounding) {
    currentRounding = rounding;
    
    document.querySelectorAll('.rounding-btn').forEach(btn => {
        btn.classList.remove('border-emerald-500', 'bg-emerald-50', 'border-blue-500', 'bg-blue-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'none': 'emerald',
        'up': 'blue',
        'nearest': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[rounding]}-500`, `bg-${colorMap[rounding]}-50`);
    
    calculateTip();
}

function setServiceQuality(quality) {
    currentServiceQuality = quality;
    
    document.querySelectorAll('.service-btn').forEach(btn => {
        btn.classList.remove('border-emerald-500', 'bg-emerald-50', 'border-red-500', 'bg-red-50', 'border-yellow-500', 'bg-yellow-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'poor': 'red',
        'average': 'yellow',
        'good': 'emerald',
        'excellent': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[quality]}-500`, `bg-${colorMap[quality]}-50`);
    
    // Update tip percentage based on service quality
    const percentageMap = {
        'poor': 10,
        'average': 15,
        'good': 18,
        'excellent': 22
    };
    
    if (currentMethod === 'percentage') {
        document.getElementById('tipPercentage').value = percentageMap[quality];
        calculateTip();
    }
}

function calculateTip() {
    const billAmount = parseFloat(document.getElementById('billAmount').value);
    const taxRate = parseFloat(document.getElementById('taxRate').value) || 0;
    const numberOfPeople = parseInt(document.getElementById('numberOfPeople').value) || 1;
    
    // Validation
    if (!billAmount || billAmount <= 0) {
        showError('Please enter a valid bill amount');
        return;
    }
    
    let tipAmount, tipPercentage;
    
    if (currentMethod === 'percentage') {
        tipPercentage = parseFloat(document.getElementById('tipPercentage').value);
        
        if (!tipPercentage || tipPercentage < 0 || tipPercentage > 100) {
            showError('Please enter a valid tip percentage (0-100)');
            return;
        }
        
        tipAmount = billAmount * (tipPercentage / 100);
    } else {
        tipAmount = parseFloat(document.getElementById('fixedTipAmount').value);
        
        if (!tipAmount || tipAmount < 0) {
            showError('Please enter a valid tip amount');
            return;
        }
        
        tipPercentage = (tipAmount / billAmount) * 100;
    }
    
    // Calculate tax
    const taxAmount = billAmount * (taxRate / 100);
    
    // Calculate totals
    const totalWithTip = billAmount + tipAmount;
    const grandTotal = totalWithTip + taxAmount;
    
    // Apply rounding if selected
    let finalGrandTotal = grandTotal;
    let finalTipAmount = tipAmount;
    
    if (currentRounding === 'up') {
        finalGrandTotal = Math.ceil(grandTotal);
        finalTipAmount = finalGrandTotal - (billAmount + taxAmount);
    } else if (currentRounding === 'nearest') {
        finalGrandTotal = Math.round(grandTotal);
        finalTipAmount = finalGrandTotal - (billAmount + taxAmount);
    }
    
    // Recalculate percentage after rounding
    const finalTipPercentage = (finalTipAmount / billAmount) * 100;
    
    // Calculate per person amounts
    const perPersonTotal = finalGrandTotal / numberOfPeople;
    const perPersonTip = finalTipAmount / numberOfPeople;
    
    // Display results
    displayResults(finalTipAmount, finalTipPercentage, totalWithTip, taxAmount, finalGrandTotal, 
                  perPersonTotal, perPersonTip, numberOfPeople, taxRate);
    
    // Generate detailed analysis
    generateDetailedAnalysis(billAmount, finalTipAmount, taxAmount, finalGrandTotal, 
                           finalTipPercentage, numberOfPeople);
}

function displayResults(tipAmount, tipPercentage, totalWithTip, taxAmount, grandTotal,
                       perPersonTotal, perPersonTip, numberOfPeople, taxRate) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl p-6 border-2 border-emerald-200">
                <div class="text-center mb-4">
                    <div class="text-2xl md:text-3xl font-bold text-emerald-600 mb-2">$${tipAmount.toFixed(2)}</div>
                    <div class="text-lg font-semibold text-gray-700">Total Tip</div>
                    <div class="text-sm text-gray-500 mt-1">${tipPercentage.toFixed(1)}% of bill</div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">$${grandTotal.toFixed(2)}</div>
                    <div class="text-sm text-blue-800">Grand Total</div>
                </div>
                <div class="bg-purple-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-purple-600 mb-1">${currentRounding === 'none' ? 'Exact' : currentRounding === 'up' ? 'Rounded Up' : 'Rounded'}</div>
                    <div class="text-sm text-purple-800">Calculation</div>
                </div>
            </div>

            ${numberOfPeople > 1 ? `
            <!-- Split Bill Info -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <h4 class="font-semibold text-amber-900 mb-2">Split Between ${numberOfPeople} People</h4>
                <p class="text-sm text-amber-800">
                    <strong>$${perPersonTotal.toFixed(2)} per person</strong> (includes $${perPersonTip.toFixed(2)} tip each)
                </p>
            </div>
            ` : ''}

            <!-- Tax Info -->
            <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                <h4 class="font-semibold text-indigo-900 mb-2">Tax Information</h4>
                <p class="text-sm text-indigo-800">
                    Tax amount: <strong>$${taxAmount.toFixed(2)}</strong> (${taxRate}% rate)
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('referenceSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update main metrics
    document.getElementById('totalTip').textContent = `$${tipAmount.toFixed(2)}`;
    document.getElementById('tipPercentageDisplay').textContent = `${tipPercentage.toFixed(1)}%`;
    document.getElementById('totalWithTip').textContent = `$${totalWithTip.toFixed(2)}`;
    document.getElementById('taxAmount').textContent = `$${taxAmount.toFixed(2)}`;
    document.getElementById('taxRateDisplay').textContent = `${taxRate}%`;
    document.getElementById('grandTotal').textContent = `$${grandTotal.toFixed(2)}`;
    
    // Show/hide split section
    if (numberOfPeople > 1) {
        document.getElementById('splitSection').classList.remove('hidden');
        generateSplitDetails(perPersonTotal, perPersonTip, numberOfPeople);
    } else {
        document.getElementById('splitSection').classList.add('hidden');
    }
}

function generateSplitDetails(perPersonTotal, perPersonTip, numberOfPeople) {
    document.getElementById('splitDetails').innerHTML = `
        <div class="text-center p-6 bg-emerald-50 rounded-lg border border-emerald-200">
            <div class="text-2xl font-bold text-emerald-600 mb-2">$${perPersonTotal.toFixed(2)}</div>
            <div class="text-lg font-semibold text-gray-700">Per Person Total</div>
            <div class="text-sm text-gray-500 mt-1">Each person pays</div>
        </div>
        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2">$${perPersonTip.toFixed(2)}</div>
            <div class="text-lg font-semibold text-gray-700">Tip Per Person</div>
            <div class="text-sm text-gray-500 mt-1">Individual tip share</div>
        </div>
        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
            <div class="text-2xl font-bold text-purple-600 mb-2">${numberOfPeople}</div>
            <div class="text-lg font-semibold text-gray-700">People Sharing</div>
            <div class="text-sm text-gray-500 mt-1">Total in group</div>
        </div>
    `;
}

function generateDetailedAnalysis(billAmount, tipAmount, taxAmount, grandTotal, tipPercentage, numberOfPeople) {
    generateAmountBreakdown(billAmount, tipAmount, taxAmount, grandTotal);
    generateCostVisualization(billAmount, tipAmount, taxAmount, tipPercentage);
    generateServiceGuidelines();
    generateTippingTips();
}

function generateAmountBreakdown(billAmount, tipAmount, taxAmount, grandTotal) {
    const tipPerDollar = tipAmount / billAmount;
    
    document.getElementById('amountBreakdown').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Original Bill</span>
                <span class="font-semibold text-gray-900">$${billAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-emerald-50 rounded-lg border border-emerald-200">
                <span class="text-emerald-700">Tip Amount</span>
                <span class="font-semibold text-emerald-900">+$${tipAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                <span class="text-blue-700">Tax Amount</span>
                <span class="font-semibold text-blue-900">+$${taxAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-amber-50 rounded-lg border border-amber-200">
                <span class="text-amber-700">Grand Total</span>
                <span class="font-semibold text-amber-900">$${grandTotal.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg border border-purple-200">
                <span class="text-purple-700">Tip per $1</span>
                <span class="font-semibold text-purple-900">$${tipPerDollar.toFixed(2)}</span>
            </div>
        </div>
    `;
}

function generateCostVisualization(billAmount, tipAmount, taxAmount, tipPercentage) {
    const total = billAmount + tipAmount + taxAmount;
    const billPercentage = (billAmount / total) * 100;
    const tipPercentageVisual = (tipAmount / total) * 100;
    const taxPercentage = (taxAmount / total) * 100;
    
    document.getElementById('costVisualization').innerHTML = `
        <div class="space-y-4">
            <!-- Cost Distribution Chart -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Cost Distribution</h4>
                <div class="relative h-6 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-6 bg-blue-500 rounded-l-full" 
                         style="width: ${billPercentage}%">
                    </div>
                    <div class="absolute h-6 bg-emerald-500" 
                         style="left: ${billPercentage}%; width: ${tipPercentageVisual}%">
                    </div>
                    <div class="absolute h-6 bg-purple-500 rounded-r-full" 
                         style="left: ${billPercentage + tipPercentageVisual}%; width: ${taxPercentage}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>Bill (${billPercentage.toFixed(1)}%)</span>
                    <span>Tip (${tipPercentageVisual.toFixed(1)}%)</span>
                    <span>Tax (${taxPercentage.toFixed(1)}%)</span>
                </div>
            </div>
            
            <!-- Quick Calculation Tips -->
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-emerald-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-emerald-600">${tipPercentage.toFixed(1)}%</div>
                    <div class="text-xs text-emerald-800">Of Bill</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-blue-600">${(tipPercentage/100).toFixed(3)}</div>
                    <div class="text-xs text-blue-800">Per Dollar</div>
                </div>
            </div>
            
            <!-- Quick Math Tip -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-3">
                <h5 class="font-semibold text-amber-800 text-sm mb-1">Quick Calculation</h5>
                <p class="text-xs text-amber-700">
                    For 20% tip: Move decimal left 1 place and double ($${billAmount.toFixed(2)} → $${(billAmount/10).toFixed(2)} → $${(billAmount/10*2).toFixed(2)})
                </p>
            </div>
        </div>
    `;
}

function generateServiceGuidelines() {
    document.getElementById('serviceGuidelines').innerHTML = `
        <div class="space-y-3">
            <div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200">
                <i class="fas fa-frown text-red-600 mt-1 mr-3"></i>
                <div class="text-sm text-red-800"><strong>Poor Service (10-12%):</strong> Service was slow, orders were wrong, or server was inattentive.</div>
            </div>
            <div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <i class="fas fa-meh text-yellow-600 mt-1 mr-3"></i>
                <div class="text-sm text-yellow-800"><strong>Average Service (15%):</strong> Standard service - orders correct, timely, but nothing exceptional.</div>
            </div>
            <div class="flex items-start p-3 bg-emerald-50 rounded-lg border border-emerald-200">
                <i class="fas fa-smile text-emerald-600 mt-1 mr-3"></i>
                <div class="text-sm text-emerald-800"><strong>Good Service (18-20%):</strong> Attentive service, friendly staff, good timing, went beyond basics.</div>
            </div>
            <div class="flex items-start p-3 bg-purple-50 rounded-lg border border-purple-200">
                <i class="fas fa-grin-stars text-purple-600 mt-1 mr-3"></i>
                <div class="text-sm text-purple-800"><strong>Excellent Service (22-25%+):</strong> Exceptional service, memorable experience, went above and beyond.</div>
            </div>
        </div>
    `;
}

function generateTippingTips() {
    document.getElementById('tippingTips').innerHTML = `
        <div class="space-y-3">
            <div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200">
                <i class="fas fa-lightbulb text-blue-600 mt-1 mr-3"></i>
                <div class="text-sm text-blue-800"><strong>Tip on Pre-tax Amount:</strong> Calculate your tip based on the bill before tax is added for consistent percentages.</div>
            </div>
            <div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200">
                <i class="fas fa-users text-green-600 mt-1 mr-3"></i>
                <div class="text-sm text-green-800"><strong>Large Groups:</strong> Many restaurants automatically add 18-20% gratuity for parties of 6 or more - check your bill!</div>
            </div>
            <div class="flex items-start p-3 bg-purple-50 rounded-lg border border-purple-200">
                <i class="fas fa-calculator text-purple-600 mt-1 mr-3"></i>
                <div class="text-sm text-purple-800"><strong>Easy Math:</strong> For 20% tip, move decimal left one place and double. For 15%, find 10% and add half.</div>
            </div>
            <div class="flex items-start p-3 bg-amber-50 rounded-lg border border-amber-200">
                <i class="fas fa-comment-dollar text-amber-600 mt-1 mr-3"></i>
                <div class="text-sm text-amber-800"><strong>Cash vs Card:</strong> Consider tipping in cash when possible - servers often get cash tips immediately.</div>
            </div>
        </div>
    `;
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
    document.getElementById('splitSection').classList.add('hidden');
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
.method-btn, .quick-btn, .rounding-btn, .service-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.method-btn:hover, .quick-btn:hover, .rounding-btn:hover, .service-btn:hover {
    transform: translateY(-1px);
}

.tip-option {
    transition: all 0.3s ease;
}

.tip-option:hover {
    transform: scale(1.02);
}
</style>
@endsection