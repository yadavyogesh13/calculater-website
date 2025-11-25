@extends('layouts.app')

@section('title', 'Sales Tax Calculator | GST Calculator | Tax Calculation Tool | CalculaterTools')

@section('meta-description', 'Free sales tax and GST calculator to calculate tax amounts for purchases. Supports multiple tax types, jurisdictions, and provides detailed tax breakdowns.')

@section('keywords', 'sales tax calculator, GST calculator, tax calculator, VAT calculator, purchase tax, tax calculation, sales tax rate')

@section('canonical', url('/calculators/sales-tax'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Sales Tax / GST Calculator",
    "description": "Calculate sales tax, GST, VAT amounts for purchases with multiple tax types and jurisdictions",
    "url": "{{ url('/calculators/sales-tax') }}",
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

<div class="min-h-screen bg-orange-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-orange-600 hover:text-orange-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#financial" class="text-orange-600 hover:text-orange-800 transition duration-150">Financial Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Sales Tax Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Sales Tax Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate sales tax, GST, VAT amounts for purchases. Supports multiple tax types, jurisdictions, and provides detailed tax breakdowns.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Sales Tax</h2>
                        <p class="text-gray-600 mb-6">Enter purchase details and tax information</p>
                        
                        <form id="salesTaxCalculatorForm" class="space-y-6">
                            <!-- Purchase Amount -->
                            <div>
                                <label for="purchaseAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Purchase Amount ($)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="purchaseAmount" 
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                                        placeholder="0.00" 
                                        min="0" 
                                        max="1000000" 
                                        step="0.01"
                                        value="100"
                                        required
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter the amount before tax</p>
                            </div>

                            <!-- Tax Type Selection -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Tax Type
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <button type="button" onclick="setTaxType('sales')" class="tax-type-btn py-3 px-4 border-2 border-orange-500 bg-orange-50 text-orange-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-store mr-2"></i>
                                        Sales Tax
                                    </button>
                                    <button type="button" onclick="setTaxType('gst')" class="tax-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-receipt mr-2"></i>
                                        GST
                                    </button>
                                    <button type="button" onclick="setTaxType('vat')" class="tax-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-globe-europe mr-2"></i>
                                        VAT
                                    </button>
                                </div>
                            </div>

                            <!-- Location Selection -->
                            <div>
                                <label for="taxLocation" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Location
                                </label>
                                <select id="taxLocation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200">
                                    <option value="custom">Custom Tax Rate</option>
                                    <optgroup label="United States">
                                        <option value="us-al">Alabama (4%)</option>
                                        <option value="us-ak">Alaska (0%)</option>
                                        <option value="us-az">Arizona (5.6%)</option>
                                        <option value="us-ca" selected>California (7.25%)</option>
                                        <option value="us-co">Colorado (2.9%)</option>
                                        <option value="us-fl">Florida (6%)</option>
                                        <option value="us-ga">Georgia (4%)</option>
                                        <option value="us-il">Illinois (6.25%)</option>
                                        <option value="us-ny">New York (4%)</option>
                                        <option value="us-tx">Texas (6.25%)</option>
                                        <option value="us-wa">Washington (6.5%)</option>
                                    </optgroup>
                                    <optgroup label="Canada">
                                        <option value="ca-on">Ontario (13% HST)</option>
                                        <option value="ca-bc">British Columbia (12% HST)</option>
                                        <option value="ca-qc">Quebec (14.975% QST)</option>
                                        <option value="ca-ab">Alberta (5% GST)</option>
                                    </optgroup>
                                    <optgroup label="International">
                                        <option value="uk">United Kingdom (20% VAT)</option>
                                        <option value="de">Germany (19% VAT)</option>
                                        <option value="fr">France (20% VAT)</option>
                                        <option value="au">Australia (10% GST)</option>
                                        <option value="in">India (18% GST)</option>
                                        <option value="sg">Singapore (9% GST)</option>
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Tax Rate Input -->
                            <div id="customTaxSection">
                                <label for="taxRate" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Tax Rate (%)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="taxRate" 
                                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                                        placeholder="e.g., 8.5" 
                                        min="0" 
                                        max="100" 
                                        step="0.01"
                                        value="7.25"
                                        required
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">%</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter the sales tax rate percentage</p>
                            </div>

                            <!-- Multiple Tax Rates -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <input 
                                        type="checkbox" 
                                        id="multipleTaxes" 
                                        class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded"
                                    >
                                    <label for="multipleTaxes" class="ml-2 text-sm font-semibold text-gray-800">
                                        Add Multiple Tax Rates
                                    </label>
                                </div>
                                <div id="additionalTaxesSection" class="space-y-3 hidden">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="additionalTax1" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                                                placeholder="Additional tax %" 
                                                min="0" 
                                                max="100" 
                                                step="0.01"
                                                value="2.5"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="additionalTax2" 
                                                class="w-full pl-4 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                                                placeholder="Additional tax %" 
                                                min="0" 
                                                max="100" 
                                                step="0.01"
                                                value="1.0"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500">Some locations have state/province + local taxes</p>
                                </div>
                            </div>

                            <!-- Tax Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" onclick="setCalculationMethod('add')" class="calc-method-btn py-3 px-4 border-2 border-orange-500 bg-orange-50 text-orange-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-plus-circle mr-2"></i>
                                        Add Tax to Price
                                    </button>
                                    <button type="button" onclick="setCalculationMethod('reverse')" class="calc-method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-minus-circle mr-2"></i>
                                        Reverse Calculate
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-2" id="methodDescription">Calculate total price including tax</p>
                            </div>

                            <!-- Reverse Calculation Input -->
                            <div id="reverseCalculationSection" class="hidden">
                                <label for="totalWithTax" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Total Amount with Tax ($)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input 
                                        type="number" 
                                        id="totalWithTax" 
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                                        placeholder="0.00" 
                                        min="0" 
                                        max="1000000" 
                                        step="0.01"
                                        value="107.25"
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Enter the total amount including tax</p>
                            </div>

                            <!-- Exempt Items -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <input 
                                        type="checkbox" 
                                        id="taxExempt" 
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    >
                                    <label for="taxExempt" class="ml-2 text-sm font-semibold text-gray-800">
                                        Tax-Exempt Purchase
                                    </label>
                                </div>
                                <div id="exemptDetails" class="space-y-3 hidden">
                                    <div>
                                        <label for="exemptReason" class="block text-xs font-medium text-blue-700 mb-2">
                                            Exemption Reason
                                        </label>
                                        <select id="exemptReason" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            <option value="nonprofit">Non-profit Organization</option>
                                            <option value="government">Government Entity</option>
                                            <option value="resale">Resale/Wholesale</option>
                                            <option value="essential">Essential Goods</option>
                                            <option value="other">Other Exemption</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateSalesTax()"
                                class="w-full bg-orange-600 hover:bg-orange-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-orange-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Tax
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Tax Calculation</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-receipt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter purchase details</p>
                                <p class="text-sm">to see tax calculation</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-orange-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Common Tax Rates</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Standard US</span>
                                    <span class="font-medium text-gray-800">5-10%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">GST Countries</span>
                                    <span class="font-medium text-gray-800">5-20%</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">VAT Countries</span>
                                    <span class="font-medium text-gray-800">15-27%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Tax Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tax Summary</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-6 bg-orange-50 rounded-lg border border-orange-200">
                            <div class="text-2xl font-bold text-orange-600 mb-2" id="taxAmount">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Tax Amount</div>
                            <div class="text-sm text-gray-500 mt-1" id="taxRateDisplay">0% Rate</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="totalWithTaxResult">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Total with Tax</div>
                            <div class="text-sm text-gray-500 mt-1">Final amount</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-2xl font-bold text-green-600 mb-2" id="purchaseAmountResult">$0.00</div>
                            <div class="text-lg font-semibold text-gray-700">Purchase Amount</div>
                            <div class="text-sm text-gray-500 mt-1">Before tax</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="taxPercentage">0%</div>
                            <div class="text-lg font-semibold text-gray-700">Tax Percentage</div>
                            <div class="text-sm text-gray-500 mt-1">Of total</div>
                        </div>
                    </div>
                </div>

                <!-- Tax Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tax Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Tax Details -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tax Details</h3>
                            <div class="space-y-4" id="taxDetails">
                            </div>
                        </div>
                        
                        <!-- Tax Visualization -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Amount Distribution</h3>
                            <div class="space-y-4" id="taxVisualization">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Multiple Taxes Breakdown -->
                <div id="multipleTaxesSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8 hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Multiple Taxes Breakdown</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-xs text-gray-700 uppercase bg-orange-50">
                                <tr>
                                    <th class="px-4 py-3">Tax Type</th>
                                    <th class="px-4 py-3">Rate</th>
                                    <th class="px-4 py-3">Amount</th>
                                    <th class="px-4 py-3">Percentage</th>
                                </tr>
                            </thead>
                            <tbody id="multipleTaxesResults">
                                <!-- Results will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Jurisdiction Information -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tax Jurisdiction Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Location Details -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4" id="jurisdictionTitle">Location Details</h3>
                            <div class="space-y-3" id="jurisdictionDetails">
                            </div>
                        </div>
                        
                        <!-- Tax Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tax Tips & Information</h3>
                            <div class="space-y-3" id="taxTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tax Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Sales Tax & GST</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-store text-orange-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Sales Tax</h3>
                        <p class="text-gray-600">Applied at point of sale in the US. Rates vary by state, county, and city. Businesses collect and remit to authorities.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-receipt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">GST</h3>
                        <p class="text-gray-600">Goods and Services Tax used in Canada, Australia, India, and others. Single comprehensive tax on most goods and services.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe-europe text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">VAT</h3>
                        <p class="text-gray-600">Value Added Tax used in EU and many countries. Applied at each stage of production and distribution chain.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-balance-scale text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Exemptions</h3>
                        <p class="text-gray-600">Many jurisdictions exempt essential items like food, medicine, and educational materials from sales tax or apply reduced rates.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Sales Tax FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between sales tax and VAT/GST?</h3>
                        <p class="text-gray-600">Sales tax is applied only at the final sale to consumers, while VAT/GST is applied at each stage of production. Businesses can claim back VAT/GST paid on inputs.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I calculate sales tax backwards from total?</h3>
                        <p class="text-gray-600">Use the reverse calculation method: Original Price = Total Price ÷ (1 + Tax Rate). For example, $107.25 total with 7.25% tax = $107.25 ÷ 1.0725 = $100.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are online purchases subject to sales tax?</h3>
                        <p class="text-gray-600">Yes, most online purchases are subject to sales tax based on the buyer's location. Rules vary by jurisdiction and business size thresholds.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What items are typically tax-exempt?</h3>
                        <p class="text-gray-600">Common exemptions include groceries, prescription drugs, clothing (in some states), educational materials, and purchases by non-profit organizations.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often do tax rates change?</h3>
                        <p class="text-gray-600">Tax rates can change annually or even more frequently. Always check current rates with local tax authorities for accurate calculations.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('tip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-orange-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tip Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate restaurant tips easily</p>
                    </a>
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tag text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate sale prices & savings</p>
                    </a>
                    <a href="{{ route('profit.margin.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Profit Margin Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate business profitability</p>
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
let currentTaxType = 'sales';
let currentCalculationMethod = 'add';
let multipleTaxes = false;
let taxExempt = false;

// Tax rate database
const taxRates = {
    'custom': { rate: 0, name: 'Custom Rate', type: 'custom' },
    
    // United States
    'us-al': { rate: 4, name: 'Alabama Sales Tax', type: 'state' },
    'us-ak': { rate: 0, name: 'Alaska Sales Tax', type: 'state' },
    'us-az': { rate: 5.6, name: 'Arizona Sales Tax', type: 'state' },
    'us-ca': { rate: 7.25, name: 'California Sales Tax', type: 'state' },
    'us-co': { rate: 2.9, name: 'Colorado Sales Tax', type: 'state' },
    'us-fl': { rate: 6, name: 'Florida Sales Tax', type: 'state' },
    'us-ga': { rate: 4, name: 'Georgia Sales Tax', type: 'state' },
    'us-il': { rate: 6.25, name: 'Illinois Sales Tax', type: 'state' },
    'us-ny': { rate: 4, name: 'New York Sales Tax', type: 'state' },
    'us-tx': { rate: 6.25, name: 'Texas Sales Tax', type: 'state' },
    'us-wa': { rate: 6.5, name: 'Washington Sales Tax', type: 'state' },
    
    // Canada
    'ca-on': { rate: 13, name: 'Ontario HST', type: 'hst' },
    'ca-bc': { rate: 12, name: 'British Columbia HST', type: 'hst' },
    'ca-qc': { rate: 14.975, name: 'Quebec QST', type: 'qst' },
    'ca-ab': { rate: 5, name: 'Alberta GST', type: 'gst' },
    
    // International
    'uk': { rate: 20, name: 'United Kingdom VAT', type: 'vat' },
    'de': { rate: 19, name: 'Germany VAT', type: 'vat' },
    'fr': { rate: 20, name: 'France VAT', type: 'vat' },
    'au': { rate: 10, name: 'Australia GST', type: 'gst' },
    'in': { rate: 18, name: 'India GST', type: 'gst' },
    'sg': { rate: 9, name: 'Singapore GST', type: 'gst' }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateSalesTax(); // Calculate with default values
});

function setupEventListeners() {
    // Location selection
    document.getElementById('taxLocation').addEventListener('change', function() {
        updateTaxRateFromLocation();
        calculateSalesTax();
    });
    
    // Multiple taxes toggle
    document.getElementById('multipleTaxes').addEventListener('change', function() {
        multipleTaxes = this.checked;
        document.getElementById('additionalTaxesSection').classList.toggle('hidden', !multipleTaxes);
        calculateSalesTax();
    });
    
    // Tax exempt toggle
    document.getElementById('taxExempt').addEventListener('change', function() {
        taxExempt = this.checked;
        document.getElementById('exemptDetails').classList.toggle('hidden', !taxExempt);
        calculateSalesTax();
    });
    
    // Auto-calculate on input change
    document.getElementById('purchaseAmount').addEventListener('input', debounce(calculateSalesTax, 300));
    document.getElementById('taxRate').addEventListener('input', debounce(calculateSalesTax, 300));
    document.getElementById('additionalTax1').addEventListener('input', debounce(calculateSalesTax, 300));
    document.getElementById('additionalTax2').addEventListener('input', debounce(calculateSalesTax, 300));
    document.getElementById('totalWithTax').addEventListener('input', debounce(calculateSalesTax, 300));
}

function setTaxType(type) {
    currentTaxType = type;
    
    // Update button styles
    document.querySelectorAll('.tax-type-btn').forEach(btn => {
        btn.classList.remove('border-orange-500', 'bg-orange-50', 'text-orange-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-orange-500', 'bg-orange-50', 'text-orange-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    calculateSalesTax();
}

function setCalculationMethod(method) {
    currentCalculationMethod = method;
    
    // Update button styles
    document.querySelectorAll('.calc-method-btn').forEach(btn => {
        btn.classList.remove('border-orange-500', 'bg-orange-50', 'text-orange-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-orange-500', 'bg-orange-50', 'text-orange-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide sections based on method
    if (method === 'add') {
        document.getElementById('reverseCalculationSection').classList.add('hidden');
        document.getElementById('purchaseAmount').closest('div').classList.remove('hidden');
        document.getElementById('methodDescription').textContent = 'Calculate total price including tax';
    } else {
        document.getElementById('reverseCalculationSection').classList.remove('hidden');
        document.getElementById('purchaseAmount').closest('div').classList.add('hidden');
        document.getElementById('methodDescription').textContent = 'Calculate original price from total with tax';
    }
    
    calculateSalesTax();
}

function updateTaxRateFromLocation() {
    const location = document.getElementById('taxLocation').value;
    const taxInfo = taxRates[location];
    
    if (taxInfo && location !== 'custom') {
        document.getElementById('taxRate').value = taxInfo.rate;
    }
}

function calculateSalesTax() {
    let purchaseAmount, taxRate, totalWithTax;
    
    // Get base tax rate
    taxRate = parseFloat(document.getElementById('taxRate').value) || 0;
    
    if (currentCalculationMethod === 'add') {
        // Forward calculation: purchase amount + tax = total
        purchaseAmount = parseFloat(document.getElementById('purchaseAmount').value) || 0;
        
        if (!purchaseAmount || purchaseAmount <= 0) {
            showError('Please enter a valid purchase amount');
            return;
        }
        
        if (taxExempt) {
            totalWithTax = purchaseAmount;
        } else {
            // Calculate total with all taxes
            totalWithTax = calculateTotalWithTax(purchaseAmount, taxRate);
        }
    } else {
        // Reverse calculation: total with tax -> purchase amount
        totalWithTax = parseFloat(document.getElementById('totalWithTax').value) || 0;
        
        if (!totalWithTax || totalWithTax <= 0) {
            showError('Please enter a valid total amount');
            return;
        }
        
        if (taxExempt) {
            purchaseAmount = totalWithTax;
        } else {
            // Calculate original price from total with tax
            purchaseAmount = calculateOriginalPrice(totalWithTax, taxRate);
        }
    }
    
    // Calculate tax amount
    const taxAmount = totalWithTax - purchaseAmount;
    const taxPercentageOfTotal = (taxAmount / totalWithTax) * 100;
    
    // Display results
    displayResults(purchaseAmount, taxAmount, totalWithTax, taxRate, taxPercentageOfTotal);
    
    // Generate detailed analysis
    generateDetailedAnalysis(purchaseAmount, taxAmount, totalWithTax, taxRate);
    
    // Generate jurisdiction information
    generateJurisdictionInfo();
}

function calculateTotalWithTax(purchaseAmount, baseTaxRate) {
    let totalTaxRate = baseTaxRate;
    let taxAmount = purchaseAmount * (baseTaxRate / 100);
    
    // Add additional taxes if enabled
    if (multipleTaxes) {
        const additionalTax1 = parseFloat(document.getElementById('additionalTax1').value) || 0;
        const additionalTax2 = parseFloat(document.getElementById('additionalTax2').value) || 0;
        
        totalTaxRate += additionalTax1 + additionalTax2;
        taxAmount += purchaseAmount * (additionalTax1 / 100);
        taxAmount += purchaseAmount * (additionalTax2 / 100);
    }
    
    return purchaseAmount + taxAmount;
}

function calculateOriginalPrice(totalWithTax, baseTaxRate) {
    let totalTaxRate = baseTaxRate;
    
    // Include additional taxes if enabled
    if (multipleTaxes) {
        const additionalTax1 = parseFloat(document.getElementById('additionalTax1').value) || 0;
        const additionalTax2 = parseFloat(document.getElementById('additionalTax2').value) || 0;
        totalTaxRate += additionalTax1 + additionalTax2;
    }
    
    const taxMultiplier = 1 + (totalTaxRate / 100);
    return totalWithTax / taxMultiplier;
}

function displayResults(purchaseAmount, taxAmount, totalWithTax, taxRate, taxPercentageOfTotal) {
    const location = document.getElementById('taxLocation').value;
    const taxInfo = taxRates[location];
    const taxName = taxInfo ? taxInfo.name : 'Custom Tax';
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-xl p-6 border-2 border-orange-200">
                <div class="text-center mb-4">
                    <div class="text-2xl md:text-3xl font-bold text-orange-600 mb-2">$${taxAmount.toFixed(2)}</div>
                    <div class="text-lg font-semibold text-gray-700">Tax Amount</div>
                    <div class="text-sm text-gray-500 mt-1">${taxName} • ${taxRate}% rate</div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">$${totalWithTax.toFixed(2)}</div>
                    <div class="text-sm text-blue-800">Total with Tax</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600 mb-1">${taxPercentageOfTotal.toFixed(1)}%</div>
                    <div class="text-sm text-green-800">Of Total</div>
                </div>
            </div>

            ${taxExempt ? `
            <!-- Tax Exempt Notice -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <div>
                        <div class="font-semibold text-green-900">Tax-Exempt Purchase</div>
                        <div class="text-sm text-green-800 mt-1">No tax applied due to exemption</div>
                    </div>
                </div>
            </div>
            ` : ''}

            <!-- Calculation Method -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <h4 class="font-semibold text-purple-900 mb-2">Calculation Method</h4>
                <p class="text-sm text-purple-800">
                    ${currentCalculationMethod === 'add' ? 
                        `$${purchaseAmount.toFixed(2)} + $${taxAmount.toFixed(2)} tax = $${totalWithTax.toFixed(2)}` :
                        `$${totalWithTax.toFixed(2)} total - $${taxAmount.toFixed(2)} tax = $${purchaseAmount.toFixed(2)}`
                    }
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('referenceSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update main metrics
    document.getElementById('taxAmount').textContent = `$${taxAmount.toFixed(2)}`;
    document.getElementById('taxRateDisplay').textContent = `${taxRate}% Rate`;
    document.getElementById('totalWithTaxResult').textContent = `$${totalWithTax.toFixed(2)}`;
    document.getElementById('purchaseAmountResult').textContent = `$${purchaseAmount.toFixed(2)}`;
    document.getElementById('taxPercentage').textContent = `${taxPercentageOfTotal.toFixed(1)}%`;
    
    // Show/hide multiple taxes section
    if (multipleTaxes && !taxExempt) {
        document.getElementById('multipleTaxesSection').classList.remove('hidden');
        generateMultipleTaxesBreakdown(purchaseAmount, taxRate);
    } else {
        document.getElementById('multipleTaxesSection').classList.add('hidden');
    }
}

function generateMultipleTaxesBreakdown(purchaseAmount, baseTaxRate) {
    const additionalTax1 = parseFloat(document.getElementById('additionalTax1').value) || 0;
    const additionalTax2 = parseFloat(document.getElementById('additionalTax2').value) || 0;
    const totalTaxRate = baseTaxRate + additionalTax1 + additionalTax2;
    
    const taxes = [
        { name: 'Base Tax', rate: baseTaxRate, amount: purchaseAmount * (baseTaxRate / 100) },
        { name: 'Additional Tax 1', rate: additionalTax1, amount: purchaseAmount * (additionalTax1 / 100) },
        { name: 'Additional Tax 2', rate: additionalTax2, amount: purchaseAmount * (additionalTax2 / 100) }
    ].filter(tax => tax.rate > 0);
    
    const totalTaxAmount = taxes.reduce((sum, tax) => sum + tax.amount, 0);
    
    let tableHTML = '';
    taxes.forEach(tax => {
        const percentageOfTotal = (tax.amount / totalTaxAmount) * 100;
        tableHTML += `
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-4 py-3 font-medium text-gray-900">${tax.name}</td>
                <td class="px-4 py-3">${tax.rate.toFixed(2)}%</td>
                <td class="px-4 py-3">$${tax.amount.toFixed(2)}</td>
                <td class="px-4 py-3">${percentageOfTotal.toFixed(1)}%</td>
            </tr>
        `;
    });
    
    // Add total row
    tableHTML += `
        <tr class="bg-orange-50 font-semibold">
            <td class="px-4 py-3 text-gray-900">Total Tax</td>
            <td class="px-4 py-3 text-orange-600">${totalTaxRate.toFixed(2)}%</td>
            <td class="px-4 py-3 text-orange-600">$${totalTaxAmount.toFixed(2)}</td>
            <td class="px-4 py-3 text-orange-600">100%</td>
        </tr>
    `;
    
    document.getElementById('multipleTaxesResults').innerHTML = tableHTML;
}

function generateDetailedAnalysis(purchaseAmount, taxAmount, totalWithTax, taxRate) {
    generateTaxDetails(purchaseAmount, taxAmount, totalWithTax, taxRate);
    generateTaxVisualization(purchaseAmount, taxAmount, totalWithTax);
}

function generateTaxDetails(purchaseAmount, taxAmount, totalWithTax, taxRate) {
    const taxPerDollar = taxAmount / purchaseAmount;
    const effectiveRate = (taxAmount / purchaseAmount) * 100;
    
    document.getElementById('taxDetails').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Purchase Amount</span>
                <span class="font-semibold text-gray-900">$${purchaseAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg border border-orange-200">
                <span class="text-orange-700">Tax Rate</span>
                <span class="font-semibold text-orange-900">${taxRate}%</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg border border-red-200">
                <span class="text-red-700">Tax Amount</span>
                <span class="font-semibold text-red-900">$${taxAmount.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                <span class="text-blue-700">Total with Tax</span>
                <span class="font-semibold text-blue-900">$${totalWithTax.toFixed(2)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg border border-green-200">
                <span class="text-green-700">Tax per $1</span>
                <span class="font-semibold text-green-900">$${taxPerDollar.toFixed(3)}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg border border-purple-200">
                <span class="text-purple-700">Effective Rate</span>
                <span class="font-semibold text-purple-900">${effectiveRate.toFixed(2)}%</span>
            </div>
        </div>
    `;
}

function generateTaxVisualization(purchaseAmount, taxAmount, totalWithTax) {
    const purchasePercentage = (purchaseAmount / totalWithTax) * 100;
    const taxPercentage = (taxAmount / totalWithTax) * 100;
    
    document.getElementById('taxVisualization').innerHTML = `
        <div class="space-y-4">
            <!-- Amount Distribution Chart -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-3 text-center">Amount Distribution</h4>
                <div class="relative h-6 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-6 bg-blue-500 rounded-l-full" 
                         style="width: ${purchasePercentage}%">
                    </div>
                    <div class="absolute h-6 bg-orange-500 rounded-r-full" 
                         style="left: ${purchasePercentage}%; width: ${taxPercentage}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>Purchase (${purchasePercentage.toFixed(1)}%)</span>
                    <span>Tax (${taxPercentage.toFixed(1)}%)</span>
                </div>
            </div>
            
            <!-- Quick Calculation Tips -->
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-blue-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-blue-600">${purchasePercentage.toFixed(1)}%</div>
                    <div class="text-xs text-blue-800">Purchase Amount</div>
                </div>
                <div class="bg-orange-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-orange-600">${taxPercentage.toFixed(1)}%</div>
                    <div class="text-xs text-orange-800">Tax Amount</div>
                </div>
            </div>
            
            <!-- Quick Math Tip -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                <h5 class="font-semibold text-green-800 text-sm mb-1">Quick Calculation</h5>
                <p class="text-xs text-green-700">
                    For ${document.getElementById('taxRate').value}% tax: Multiply by ${(1 + (parseFloat(document.getElementById('taxRate').value)/100)).toFixed(4)}<br>
                    Example: $100 × ${(1 + (parseFloat(document.getElementById('taxRate').value)/100)).toFixed(4)} = $${totalWithTax.toFixed(2)}
                </p>
            </div>
        </div>
    `;
}

function generateJurisdictionInfo() {
    const location = document.getElementById('taxLocation').value;
    const taxInfo = taxRates[location];
    
    document.getElementById('jurisdictionTitle').textContent = taxInfo ? `${taxInfo.name} Information` : 'Custom Tax Rate';
    
    if (taxInfo && location !== 'custom') {
        document.getElementById('jurisdictionDetails').innerHTML = `
            <div class="space-y-3">
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-700">Tax Type</span>
                    <span class="font-semibold text-gray-900">${getTaxTypeName(taxInfo.type)}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg">
                    <span class="text-orange-700">Standard Rate</span>
                    <span class="font-semibold text-orange-900">${taxInfo.rate}%</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                    <span class="text-blue-700">Jurisdiction</span>
                    <span class="font-semibold text-blue-900">${getJurisdictionName(location)}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                    <span class="text-green-700">Tax Authority</span>
                    <span class="font-semibold text-green-900">${getTaxAuthority(location)}</span>
                </div>
            </div>
        `;
    } else {
        document.getElementById('jurisdictionDetails').innerHTML = `
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-edit text-3xl mb-3"></i>
                <p class="text-lg font-medium">Custom Tax Rate</p>
                <p class="text-sm">Using user-defined tax rate</p>
            </div>
        `;
    }
    
    // Generate tax tips
    generateTaxTips();
}

function getTaxTypeName(type) {
    const typeNames = {
        'state': 'State Sales Tax',
        'gst': 'Goods and Services Tax',
        'hst': 'Harmonized Sales Tax',
        'qst': 'Quebec Sales Tax',
        'vat': 'Value Added Tax',
        'custom': 'Custom Tax Rate'
    };
    return typeNames[type] || 'Sales Tax';
}

function getJurisdictionName(location) {
    if (location.startsWith('us-')) {
        return location.split('-')[1].toUpperCase() + ', United States';
    } else if (location.startsWith('ca-')) {
        return location.split('-')[1].toUpperCase() + ', Canada';
    } else {
        return getCountryName(location);
    }
}

function getCountryName(code) {
    const countries = {
        'uk': 'United Kingdom',
        'de': 'Germany',
        'fr': 'France',
        'au': 'Australia',
        'in': 'India',
        'sg': 'Singapore'
    };
    return countries[code] || code.toUpperCase();
}

function getTaxAuthority(location) {
    if (location.startsWith('us-')) {
        return 'State Department of Revenue';
    } else if (location.startsWith('ca-')) {
        return 'Canada Revenue Agency';
    } else if (location === 'uk') {
        return 'HM Revenue & Customs';
    } else if (['de', 'fr'].includes(location)) {
        return 'European Tax Authority';
    } else if (location === 'au') {
        return 'Australian Taxation Office';
    } else if (location === 'in') {
        return 'Goods and Services Tax Network';
    } else if (location === 'sg') {
        return 'Inland Revenue Authority';
    } else {
        return 'Local Tax Authority';
    }
}

function generateTaxTips() {
    const location = document.getElementById('taxLocation').value;
    const taxInfo = taxRates[location];
    
    document.getElementById('taxTips').innerHTML = `
        <div class="space-y-3">
            <div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200">
                <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                <div class="text-sm text-blue-800">
                    <strong>Tax Rate Changes:</strong> Always verify current rates with local authorities as tax rates can change frequently.
                </div>
            </div>
            
            <div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200">
                <i class="fas fa-receipt text-green-600 mt-1 mr-3"></i>
                <div class="text-sm text-green-800">
                    <strong>Keep Records:</strong> Maintain detailed records of tax calculations for business purchases and expense reporting.
                </div>
            </div>
            
            <div class="flex items-start p-3 bg-purple-50 rounded-lg border border-purple-200">
                <i class="fas fa-globe text-purple-600 mt-1 mr-3"></i>
                <div class="text-sm text-purple-800">
                    <strong>Online Purchases:</strong> Most online retailers now collect sales tax based on your shipping address.
                </div>
            </div>
            
            <div class="flex items-start p-3 bg-amber-50 rounded-lg border border-amber-200">
                <i class="fas fa-exclamation-triangle text-amber-600 mt-1 mr-3"></i>
                <div class="text-sm text-amber-800">
                    <strong>Business Purchases:</strong> Businesses can often claim back sales tax/VAT on eligible business expenses.
                </div>
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
    document.getElementById('multipleTaxesSection').classList.add('hidden');
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
.tax-type-btn, .calc-method-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.tax-type-btn:hover, .calc-method-btn:hover {
    transform: translateY(-1px);
}

.tax-card {
    transition: all 0.3s ease;
}

.tax-card:hover {
    transform: scale(1.02);
}
</style>
@endsection