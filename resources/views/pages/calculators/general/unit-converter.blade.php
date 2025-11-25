@extends('layouts.app')

@section('title', 'Unit Converter - Convert Length, Weight, Temperature & More | CalculaterTools')

@section('meta-description', 'Free unit converter for length, weight, temperature, area, volume, speed, and digital storage. Accurate conversions between metric, imperial, and other measurement systems.')

@section('keywords', 'unit converter, measurement converter, length converter, weight converter, temperature converter, metric converter, imperial converter')

@section('canonical', url('/calculators/unit-converter'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Unit Converter",
    "description": "Comprehensive unit converter for length, weight, temperature, area, volume, and more measurement systems",
    "url": "{{ url('/calculators/unit-converter') }}",
    "operatingSystem": "Any",
    "applicationCategory": "UtilityApplication",
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
                        <a href="#tools" class="text-blue-600 hover:text-blue-800 transition duration-150">Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Unit Converter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Unit Converter</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Convert between different units of measurement including length, weight, temperature, area, volume, and more.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Convert Units</h2>
                        <p class="text-gray-600 mb-6">Select conversion type and enter values to convert between units</p>
                        
                        <form id="unitConverterForm" class="space-y-6">
                            <!-- Conversion Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Conversion Type
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setConversionType('length')" class="conversion-type-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-ruler text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">Length</div>
                                    </button>
                                    <button type="button" onclick="setConversionType('weight')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-weight text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">Weight</div>
                                    </button>
                                    <button type="button" onclick="setConversionType('temperature')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-thermometer-half text-red-600 text-lg mb-1"></i>
                                        <div class="text-sm">Temperature</div>
                                    </button>
                                    <button type="button" onclick="setConversionType('area')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-vector-square text-purple-600 text-lg mb-1"></i>
                                        <div class="text-sm">Area</div>
                                    </button>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-3">
                                    <button type="button" onclick="setConversionType('volume')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-wine-bottle text-indigo-600 text-lg mb-1"></i>
                                        <div class="text-sm">Volume</div>
                                    </button>
                                    <button type="button" onclick="setConversionType('speed')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-tachometer-alt text-orange-600 text-lg mb-1"></i>
                                        <div class="text-sm">Speed</div>
                                    </button>
                                    <button type="button" onclick="setConversionType('digital')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-hdd text-pink-600 text-lg mb-1"></i>
                                        <div class="text-sm">Digital</div>
                                    </button>
                                    <button type="button" onclick="setConversionType('time')" class="conversion-type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-clock text-yellow-600 text-lg mb-1"></i>
                                        <div class="text-sm">Time</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Conversion Inputs -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="fromValue" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Value
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="fromValue" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 100" 
                                            step="0.01"
                                            value="100"
                                        >
                                    </div>
                                </div>
                                <div>
                                    <label for="fromUnit" class="block text-sm font-semibold text-gray-800 mb-2">
                                        From Unit
                                    </label>
                                    <select 
                                        id="fromUnit" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                        <!-- Units will be populated by JavaScript -->
                                    </select>
                                </div>
                                <div>
                                    <label for="toUnit" class="block text-sm font-semibold text-gray-800 mb-2">
                                        To Unit
                                    </label>
                                    <select 
                                        id="toUnit" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                        <!-- Units will be populated by JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <!-- Quick Conversions -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Conversions
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3" id="quickConversions">
                                    <!-- Quick conversions will be populated by JavaScript -->
                                </div>
                            </div>

                            <!-- Common Values -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Common Values
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setCommonValue(1)" class="common-value-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">1</div>
                                    </button>
                                    <button type="button" onclick="setCommonValue(10)" class="common-value-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">10</div>
                                    </button>
                                    <button type="button" onclick="setCommonValue(100)" class="common-value-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">100</div>
                                    </button>
                                    <button type="button" onclick="setCommonValue(1000)" class="common-value-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <div class="text-sm font-medium text-gray-800">1000</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Convert Button -->
                            <button 
                                type="button" 
                                onclick="convertUnits()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-exchange-alt mr-2"></i>
                                Convert Units
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Conversion Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-balance-scale text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter values</p>
                                <p class="text-sm">to see conversion result</p>
                            </div>
                        </div>

                        <!-- Conversion Table -->
                        <div id="conversionTable" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Common Conversions</h4>
                            <div class="space-y-2 text-sm" id="tableContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Multiple Results -->
            <div id="multipleResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Multiple Unit Conversions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="multipleResultsContent">
                    <!-- Multiple results will be populated by JavaScript -->
                </div>
            </div>

            <!-- Measurement Systems -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Measurement Systems</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe-europe text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Metric System</h3>
                        <p class="text-gray-600">Used worldwide, based on meters, grams, and liters. Uses decimal multiples (kilo, centi, milli).</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-flag-usa text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Imperial System</h3>
                        <p class="text-gray-600">Used in the United States, based on feet, pounds, and gallons. Uses fractions and specific conversion factors.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-crown text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">US Customary</h3>
                        <p class="text-gray-600">Similar to imperial but with some differences in volume measurements. Used in the United States.</p>
                    </div>
                </div>
            </div>

            <!-- Conversion Charts -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Common Conversion Factors</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Length -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-ruler mr-2 text-blue-600"></i>
                            Length
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>1 inch</span><span>= 2.54 cm</span></div>
                            <div class="flex justify-between"><span>1 foot</span><span>= 30.48 cm</span></div>
                            <div class="flex justify-between"><span>1 mile</span><span>= 1.609 km</span></div>
                            <div class="flex justify-between"><span>1 meter</span><span>= 3.281 feet</span></div>
                            <div class="flex justify-between"><span>1 km</span><span>= 0.621 miles</span></div>
                        </div>
                    </div>
                    
                    <!-- Weight -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-weight mr-2 text-green-600"></i>
                            Weight
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>1 ounce</span><span>= 28.35 g</span></div>
                            <div class="flex justify-between"><span>1 pound</span><span>= 453.59 g</span></div>
                            <div class="flex justify-between"><span>1 kg</span><span>= 2.205 pounds</span></div>
                            <div class="flex justify-between"><span>1 stone</span><span>= 6.35 kg</span></div>
                            <div class="flex justify-between"><span>1 ton</span><span>= 907.18 kg</span></div>
                        </div>
                    </div>
                    
                    <!-- Temperature -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-thermometer-half mr-2 text-red-600"></i>
                            Temperature
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>°C to °F</span><span>×1.8 + 32</span></div>
                            <div class="flex justify-between"><span>°F to °C</span><span>(°F-32) ÷ 1.8</span></div>
                            <div class="flex justify-between"><span>°C to K</span><span>+ 273.15</span></div>
                            <div class="flex justify-between"><span>K to °C</span><span>- 273.15</span></div>
                            <div class="flex justify-between"><span>Water Freezes</span><span>0°C / 32°F</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Unit Converter FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between metric and imperial systems?</h3>
                        <p class="text-gray-600">The metric system is decimal-based and used worldwide, while the imperial system uses specific conversion factors and is primarily used in the United States. Metric units are generally easier to convert because they use powers of 10.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate are the conversions?</h3>
                        <p class="text-gray-600">Our conversions use standard conversion factors and are accurate for most practical purposes. For scientific or engineering applications, always verify with official standards as some conversions may have very small rounding differences.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why are there different measurement systems?</h3>
                        <p class="text-gray-600">Different measurement systems developed independently in various cultures and regions. The metric system was developed during the French Revolution for standardization, while imperial units evolved from older English measurement systems.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the most commonly converted unit?</h3>
                        <p class="text-gray-600">Length conversions (especially between inches/centimeters and miles/kilometers) and temperature conversions (between Celsius and Fahrenheit) are among the most commonly used unit conversions worldwide.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Are there any units that don't convert directly?</h3>
                        <p class="text-gray-600">Yes, temperature requires special formulas rather than simple multiplication. Some units also have different definitions in different contexts (like fluid ounces vs. weight ounces), so it's important to select the correct unit type.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('percentage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate percentages and changes</p>
                    </a>
                    <a href="{{ route('currency.converter.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Currency Converter</h3>
                        <p class="text-gray-600 text-sm">Convert between world currencies</p>
                    </a>
                    {{-- <a href="{{ route('cooking.converter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Cooking Converter</h3>
                        <p class="text-gray-600 text-sm">Convert cooking measurements</p>
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
let currentConversionType = 'length';
let conversionData = {};

// Conversion data
const conversionTypes = {
    length: {
        name: 'Length',
        icon: 'fas fa-ruler',
        color: 'blue',
        units: [
            { name: 'Millimeters', value: 'mm', factor: 0.001 },
            { name: 'Centimeters', value: 'cm', factor: 0.01 },
            { name: 'Meters', value: 'm', factor: 1 },
            { name: 'Kilometers', value: 'km', factor: 1000 },
            { name: 'Inches', value: 'in', factor: 0.0254 },
            { name: 'Feet', value: 'ft', factor: 0.3048 },
            { name: 'Yards', value: 'yd', factor: 0.9144 },
            { name: 'Miles', value: 'mi', factor: 1609.34 }
        ],
        quickConversions: [
            { from: 'cm', to: 'in', value: 10, label: '10 cm to inches' },
            { from: 'm', to: 'ft', value: 1, label: '1 m to feet' },
            { from: 'km', to: 'mi', value: 5, label: '5 km to miles' },
            { from: 'in', to: 'cm', value: 12, label: '12 in to cm' }
        ]
    },
    weight: {
        name: 'Weight',
        icon: 'fas fa-weight',
        color: 'green',
        units: [
            { name: 'Milligrams', value: 'mg', factor: 0.000001 },
            { name: 'Grams', value: 'g', factor: 0.001 },
            { name: 'Kilograms', value: 'kg', factor: 1 },
            { name: 'Metric Tons', value: 't', factor: 1000 },
            { name: 'Ounces', value: 'oz', factor: 0.0283495 },
            { name: 'Pounds', value: 'lb', factor: 0.453592 },
            { name: 'Stones', value: 'st', factor: 6.35029 },
            { name: 'US Tons', value: 'ust', factor: 907.185 }
        ],
        quickConversions: [
            { from: 'kg', to: 'lb', value: 1, label: '1 kg to pounds' },
            { from: 'lb', to: 'kg', value: 10, label: '10 lb to kg' },
            { from: 'g', to: 'oz', value: 100, label: '100 g to ounces' },
            { from: 'oz', to: 'g', value: 8, label: '8 oz to grams' }
        ]
    },
    temperature: {
        name: 'Temperature',
        icon: 'fas fa-thermometer-half',
        color: 'red',
        units: [
            { name: 'Celsius', value: 'c', factor: 1, offset: 0 },
            { name: 'Fahrenheit', value: 'f', factor: 1, offset: 32 },
            { name: 'Kelvin', value: 'k', factor: 1, offset: 273.15 }
        ],
        quickConversions: [
            { from: 'c', to: 'f', value: 0, label: '0°C to °F' },
            { from: 'f', to: 'c', value: 32, label: '32°F to °C' },
            { from: 'c', to: 'f', value: 100, label: '100°C to °F' },
            { from: 'f', to: 'c', value: 212, label: '212°F to °C' }
        ]
    },
    area: {
        name: 'Area',
        icon: 'fas fa-vector-square',
        color: 'purple',
        units: [
            { name: 'Square Millimeters', value: 'mm²', factor: 0.000001 },
            { name: 'Square Centimeters', value: 'cm²', factor: 0.0001 },
            { name: 'Square Meters', value: 'm²', factor: 1 },
            { name: 'Hectares', value: 'ha', factor: 10000 },
            { name: 'Square Kilometers', value: 'km²', factor: 1000000 },
            { name: 'Square Inches', value: 'in²', factor: 0.00064516 },
            { name: 'Square Feet', value: 'ft²', factor: 0.092903 },
            { name: 'Square Yards', value: 'yd²', factor: 0.836127 },
            { name: 'Acres', value: 'ac', factor: 4046.86 },
            { name: 'Square Miles', value: 'mi²', factor: 2589988.11 }
        ],
        quickConversions: [
            { from: 'm²', to: 'ft²', value: 1, label: '1 m² to ft²' },
            { from: 'ft²', to: 'm²', value: 100, label: '100 ft² to m²' },
            { from: 'ha', to: 'ac', value: 1, label: '1 hectare to acres' },
            { from: 'ac', to: 'ha', value: 5, label: '5 acres to hectares' }
        ]
    },
    volume: {
        name: 'Volume',
        icon: 'fas fa-wine-bottle',
        color: 'indigo',
        units: [
            { name: 'Milliliters', value: 'ml', factor: 0.001 },
            { name: 'Liters', value: 'l', factor: 1 },
            { name: 'Cubic Meters', value: 'm³', factor: 1000 },
            { name: 'Teaspoons', value: 'tsp', factor: 0.00492892 },
            { name: 'Tablespoons', value: 'tbsp', factor: 0.0147868 },
            { name: 'Fluid Ounces', value: 'fl oz', factor: 0.0295735 },
            { name: 'Cups', value: 'cup', factor: 0.236588 },
            { name: 'Pints', value: 'pt', factor: 0.473176 },
            { name: 'Quarts', value: 'qt', factor: 0.946353 },
            { name: 'Gallons', value: 'gal', factor: 3.78541 }
        ],
        quickConversions: [
            { from: 'l', to: 'gal', value: 1, label: '1 liter to gallons' },
            { from: 'gal', to: 'l', value: 1, label: '1 gallon to liters' },
            { from: 'ml', to: 'fl oz', value: 500, label: '500 ml to fl oz' },
            { from: 'cup', to: 'ml', value: 2, label: '2 cups to ml' }
        ]
    },
    speed: {
        name: 'Speed',
        icon: 'fas fa-tachometer-alt',
        color: 'orange',
        units: [
            { name: 'Meters per Second', value: 'm/s', factor: 1 },
            { name: 'Kilometers per Hour', value: 'km/h', factor: 0.277778 },
            { name: 'Miles per Hour', value: 'mph', factor: 0.44704 },
            { name: 'Feet per Second', value: 'ft/s', factor: 0.3048 },
            { name: 'Knots', value: 'kn', factor: 0.514444 }
        ],
        quickConversions: [
            { from: 'km/h', to: 'mph', value: 100, label: '100 km/h to mph' },
            { from: 'mph', to: 'km/h', value: 60, label: '60 mph to km/h' },
            { from: 'm/s', to: 'km/h', value: 10, label: '10 m/s to km/h' },
            { from: 'kn', to: 'km/h', value: 1, label: '1 knot to km/h' }
        ]
    },
    digital: {
        name: 'Digital Storage',
        icon: 'fas fa-hdd',
        color: 'pink',
        units: [
            { name: 'Bits', value: 'b', factor: 0.125 },
            { name: 'Bytes', value: 'B', factor: 1 },
            { name: 'Kilobytes', value: 'KB', factor: 1024 },
            { name: 'Megabytes', value: 'MB', factor: 1048576 },
            { name: 'Gigabytes', value: 'GB', factor: 1073741824 },
            { name: 'Terabytes', value: 'TB', factor: 1099511627776 }
        ],
        quickConversions: [
            { from: 'MB', to: 'GB', value: 1024, label: '1024 MB to GB' },
            { from: 'GB', to: 'TB', value: 1024, label: '1024 GB to TB' },
            { from: 'MB', to: 'KB', value: 1, label: '1 MB to KB' },
            { from: 'GB', to: 'MB', value: 1, label: '1 GB to MB' }
        ]
    },
    time: {
        name: 'Time',
        icon: 'fas fa-clock',
        color: 'yellow',
        units: [
            { name: 'Seconds', value: 's', factor: 1 },
            { name: 'Minutes', value: 'min', factor: 60 },
            { name: 'Hours', value: 'h', factor: 3600 },
            { name: 'Days', value: 'd', factor: 86400 },
            { name: 'Weeks', value: 'wk', factor: 604800 },
            { name: 'Months', value: 'mo', factor: 2629746 },
            { name: 'Years', value: 'yr', factor: 31556952 }
        ],
        quickConversions: [
            { from: 'h', to: 'min', value: 1, label: '1 hour to minutes' },
            { from: 'd', to: 'h', value: 1, label: '1 day to hours' },
            { from: 'wk', to: 'd', value: 1, label: '1 week to days' },
            { from: 'yr', to: 'd', value: 1, label: '1 year to days' }
        ]
    }
};

// Initialize the converter
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    setConversionType('length'); // Set default conversion type
    convertUnits(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-convert on input change
    document.getElementById('fromValue').addEventListener('input', debounce(convertUnits, 300));
    document.getElementById('fromUnit').addEventListener('change', convertUnits);
    document.getElementById('toUnit').addEventListener('change', convertUnits);
}

function setConversionType(type) {
    currentConversionType = type;
    const typeData = conversionTypes[type];
    
    // Reset all buttons
    document.querySelectorAll('.conversion-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Set active button
    const activeButton = event.target.closest('.conversion-type-btn');
    activeButton.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    activeButton.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Populate unit selectors
    populateUnitSelectors(typeData.units);
    
    // Populate quick conversions
    populateQuickConversions(typeData.quickConversions);
    
    // Set default values for the conversion type
    setDefaultValues(type);
    
    convertUnits();
}

function populateUnitSelectors(units) {
    const fromSelect = document.getElementById('fromUnit');
    const toSelect = document.getElementById('toUnit');
    
    // Clear existing options
    fromSelect.innerHTML = '';
    toSelect.innerHTML = '';
    
    // Populate units
    units.forEach(unit => {
        const optionFrom = new Option(unit.name, unit.value);
        const optionTo = new Option(unit.name, unit.value);
        
        fromSelect.add(optionFrom);
        toSelect.add(optionTo);
    });
    
    // Set default selections (metric to imperial where applicable)
    if (units.some(u => u.value === 'm') && units.some(u => u.value === 'ft')) {
        fromSelect.value = 'm';
        toSelect.value = 'ft';
    } else if (units.some(u => u.value === 'kg') && units.some(u => u.value === 'lb')) {
        fromSelect.value = 'kg';
        toSelect.value = 'lb';
    } else if (units.some(u => u.value === 'c') && units.some(u => u.value === 'f')) {
        fromSelect.value = 'c';
        toSelect.value = 'f';
    } else {
        fromSelect.value = units[0].value;
        toSelect.value = units[1]?.value || units[0].value;
    }
}

function populateQuickConversions(quickConversions) {
    const container = document.getElementById('quickConversions');
    container.innerHTML = '';
    
    quickConversions.forEach(conversion => {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'quick-conv-btn py-2 px-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200';
        button.innerHTML = `<div class="text-xs font-medium text-gray-800">${conversion.label}</div>`;
        button.onclick = () => setQuickConversion(conversion);
        container.appendChild(button);
    });
}

function setQuickConversion(conversion) {
    document.getElementById('fromValue').value = conversion.value;
    document.getElementById('fromUnit').value = conversion.from;
    document.getElementById('toUnit').value = conversion.to;
    
    // Update quick conversion buttons
    document.querySelectorAll('.quick-conv-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50');
    });
    
    event.target.classList.add('border-blue-500', 'bg-blue-50');
    
    convertUnits();
}

function setCommonValue(value) {
    document.getElementById('fromValue').value = value;
    
    // Update common value buttons
    document.querySelectorAll('.common-value-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50', 'border-orange-500', 'bg-orange-50');
    });
    
    const colorMap = {
        1: 'blue',
        10: 'green',
        100: 'purple',
        1000: 'orange'
    };
    
    event.target.classList.add(`border-${colorMap[value]}-500`, `bg-${colorMap[value]}-50`);
    
    convertUnits();
}

function setDefaultValues(type) {
    const defaults = {
        'length': { value: 1, from: 'm', to: 'ft' },
        'weight': { value: 1, from: 'kg', to: 'lb' },
        'temperature': { value: 0, from: 'c', to: 'f' },
        'area': { value: 1, from: 'm²', to: 'ft²' },
        'volume': { value: 1, from: 'l', to: 'gal' },
        'speed': { value: 100, from: 'km/h', to: 'mph' },
        'digital': { value: 1024, from: 'MB', to: 'GB' },
        'time': { value: 1, from: 'h', to: 'min' }
    };
    
    const defaultValues = defaults[type];
    if (defaultValues) {
        document.getElementById('fromValue').value = defaultValues.value;
        document.getElementById('fromUnit').value = defaultValues.from;
        document.getElementById('toUnit').value = defaultValues.to;
    }
}

function convertUnits() {
    const value = parseFloat(document.getElementById('fromValue').value);
    const fromUnit = document.getElementById('fromUnit').value;
    const toUnit = document.getElementById('toUnit').value;
    const typeData = conversionTypes[currentConversionType];
    
    // Validation
    if (!value && value !== 0) {
        showError('Please enter a valid value');
        return;
    }
    
    if (fromUnit === toUnit) {
        showError('Please select different units to convert between');
        return;
    }
    
    // Perform conversion
    let result;
    if (currentConversionType === 'temperature') {
        result = convertTemperature(value, fromUnit, toUnit);
    } else {
        result = convertStandard(value, fromUnit, toUnit, typeData.units);
    }
    
    if (result.error) {
        showError(result.error);
        return;
    }
    
    displayResults(value, fromUnit, toUnit, result);
    generateConversionTable(typeData.units, value, fromUnit);
    generateMultipleResults(typeData.units, value, fromUnit);
}

function convertStandard(value, fromUnit, toUnit, units) {
    const fromUnitData = units.find(u => u.value === fromUnit);
    const toUnitData = units.find(u => u.value === toUnit);
    
    if (!fromUnitData || !toUnitData) {
        return { error: 'Invalid unit selection' };
    }
    
    // Convert to base unit first, then to target unit
    const baseValue = value * fromUnitData.factor;
    const result = baseValue / toUnitData.factor;
    
    return {
        result: result,
        formula: `${value} ${fromUnit} × (${fromUnitData.factor} / ${toUnitData.factor}) = ${result.toFixed(6)} ${toUnit}`
    };
}

function convertTemperature(value, fromUnit, toUnit) {
    let result;
    let formula;
    
    // Convert to Celsius first
    let celsius;
    switch(fromUnit) {
        case 'c':
            celsius = value;
            formula = `${value}°C`;
            break;
        case 'f':
            celsius = (value - 32) * 5/9;
            formula = `(${value}°F - 32) × 5/9 = ${celsius.toFixed(2)}°C`;
            break;
        case 'k':
            celsius = value - 273.15;
            formula = `${value}K - 273.15 = ${celsius.toFixed(2)}°C`;
            break;
        default:
            return { error: 'Invalid temperature unit' };
    }
    
    // Convert from Celsius to target unit
    switch(toUnit) {
        case 'c':
            result = celsius;
            formula += ` = ${result.toFixed(2)}°C`;
            break;
        case 'f':
            result = (celsius * 9/5) + 32;
            formula += ` × 9/5 + 32 = ${result.toFixed(2)}°F`;
            break;
        case 'k':
            result = celsius + 273.15;
            formula += ` + 273.15 = ${result.toFixed(2)}K`;
            break;
        default:
            return { error: 'Invalid temperature unit' };
    }
    
    return {
        result: result,
        formula: formula
    };
}

function displayResults(value, fromUnit, toUnit, conversion) {
    const fromUnitName = getUnitName(fromUnit);
    const toUnitName = getUnitName(toUnit);
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">${formatNumber(conversion.result)}</div>
                    <div class="text-lg font-semibold text-blue-800">${toUnitName}</div>
                    <div class="text-sm opacity-75 mt-1">${formatNumber(value)} ${fromUnitName} = ${formatNumber(conversion.result)} ${toUnitName}</div>
                </div>
            </div>

            <!-- Conversion Details -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Conversion Details</h4>
                <p class="text-sm text-gray-700">
                    ${conversion.formula}
                </p>
            </div>

            <!-- Quick Facts -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Quick Facts</h4>
                <p class="text-sm text-green-800">
                    ${getQuickFacts(value, fromUnit, conversion.result, toUnit)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('conversionTable').classList.remove('hidden');
}

function generateConversionTable(units, value, fromUnit) {
    const fromUnitData = units.find(u => u.value === fromUnit);
    if (!fromUnitData) return;
    
    let tableHTML = '';
    
    // Show conversions to 6 other common units
    const displayUnits = units.filter(u => u.value !== fromUnit).slice(0, 6);
    
    displayUnits.forEach(unit => {
        let convertedValue;
        if (currentConversionType === 'temperature') {
            convertedValue = convertTemperature(value, fromUnit, unit.value).result;
        } else {
            const baseValue = value * fromUnitData.factor;
            convertedValue = baseValue / unit.factor;
        }
        
        tableHTML += `
            <div class="flex items-center justify-between py-2 border-b border-gray-200 last:border-0">
                <span class="text-gray-700">${getUnitName(unit.value)}</span>
                <span class="font-mono text-sm text-gray-900">${formatNumber(convertedValue)}</span>
            </div>
        `;
    });
    
    document.getElementById('tableContent').innerHTML = tableHTML;
}

function generateMultipleResults(units, value, fromUnit) {
    const fromUnitData = units.find(u => u.value === fromUnit);
    if (!fromUnitData) return;
    
    let resultsHTML = '';
    const displayUnits = units.filter(u => u.value !== fromUnit);
    
    // Group units by category (metric/imperial)
    const metricUnits = displayUnits.filter(u => 
        ['mm', 'cm', 'm', 'km', 'mg', 'g', 'kg', 't', 'ml', 'l', 'm³', 'mm²', 'cm²', 'm²', 'ha', 'km²'].includes(u.value)
    );
    const imperialUnits = displayUnits.filter(u => 
        ['in', 'ft', 'yd', 'mi', 'oz', 'lb', 'st', 'ust', 'tsp', 'tbsp', 'fl oz', 'cup', 'pt', 'qt', 'gal', 'in²', 'ft²', 'yd²', 'ac', 'mi²'].includes(u.value)
    );
    const otherUnits = displayUnits.filter(u => 
        !metricUnits.includes(u) && !imperialUnits.includes(u)
    );
    
    const categories = [
        { name: 'Metric Units', units: metricUnits.slice(0, 4), color: 'blue' },
        { name: 'Imperial Units', units: imperialUnits.slice(0, 4), color: 'green' },
        { name: 'Other Units', units: otherUnits.slice(0, 4), color: 'purple' }
    ];
    
    categories.forEach(category => {
        if (category.units.length > 0) {
            let categoryHTML = '';
            
            category.units.forEach(unit => {
                let convertedValue;
                if (currentConversionType === 'temperature') {
                    convertedValue = convertTemperature(value, fromUnit, unit.value).result;
                } else {
                    const baseValue = value * fromUnitData.factor;
                    convertedValue = baseValue / unit.factor;
                }
                
                categoryHTML += `
                    <div class="flex justify-between items-center py-2 px-3 bg-${category.color}-50 rounded-lg">
                        <span class="text-${category.color}-700 text-sm">${getUnitName(unit.value)}</span>
                        <span class="font-mono text-${category.color}-900 font-semibold">${formatNumber(convertedValue)}</span>
                    </div>
                `;
            });
            
            resultsHTML += `
                <div class="space-y-2">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">${category.name}</h3>
                    <div class="space-y-2">
                        ${categoryHTML}
                    </div>
                </div>
            `;
        }
    });
    
    document.getElementById('multipleResultsContent').innerHTML = resultsHTML;
    document.getElementById('multipleResults').classList.remove('hidden');
}

function getUnitName(unitValue) {
    const allUnits = Object.values(conversionTypes).flatMap(type => type.units);
    const unit = allUnits.find(u => u.value === unitValue);
    return unit ? unit.name : unitValue;
}

function getQuickFacts(value, fromUnit, result, toUnit) {
    const typeData = conversionTypes[currentConversionType];
    
    if (currentConversionType === 'length') {
        if (fromUnit === 'm' && toUnit === 'ft') {
            return `A ${value}-meter ${value === 1 ? 'is' : 's are'} approximately ${result.toFixed(1)} feet long. For comparison, a basketball hoop is 10 feet high.`;
        } else if (fromUnit === 'km' && toUnit === 'mi') {
            return `${value} kilometer${value === 1 ? '' : 's'} is about ${result.toFixed(2)} mile${result === 1 ? '' : 's'}. Most marathons are 42.195 kilometers (26.219 miles).`;
        }
    } else if (currentConversionType === 'weight') {
        if (fromUnit === 'kg' && toUnit === 'lb') {
            return `${value} kilogram${value === 1 ? '' : 's'} equals ${result.toFixed(1)} pound${result === 1 ? '' : 's'}. A standard bag of sugar is usually 1 kg (2.2 lbs).`;
        }
    } else if (currentConversionType === 'temperature') {
        if (fromUnit === 'c' && toUnit === 'f') {
            if (value === 0) return 'Water freezes at 0°C (32°F). This is the freezing point of water at sea level.';
            if (value === 100) return 'Water boils at 100°C (212°F). This is the boiling point of water at sea level.';
            if (value === 37) return 'Normal human body temperature is approximately 37°C (98.6°F).';
        }
    }
    
    return `Conversion from ${getUnitName(fromUnit)} to ${getUnitName(toUnit)}. ${typeData.name} conversions are commonly used in ${getUsageContext(currentConversionType)}.`;
}

function getUsageContext(type) {
    const contexts = {
        'length': 'construction, sports, and everyday measurements',
        'weight': 'cooking, shipping, and health monitoring',
        'temperature': 'weather, cooking, and scientific applications',
        'area': 'real estate, agriculture, and construction',
        'volume': 'cooking, chemistry, and liquid measurements',
        'speed': 'transportation, sports, and weather',
        'digital': 'computing and data storage',
        'time': 'scheduling, cooking, and scientific calculations'
    };
    return contexts[type] || 'various applications';
}

function formatNumber(num) {
    if (Math.abs(num) < 0.0001) {
        return num.toExponential(4);
    } else if (Math.abs(num) < 1) {
        return num.toFixed(6).replace(/\.?0+$/, '');
    } else if (Math.abs(num) < 1000) {
        return num.toFixed(4).replace(/\.?0+$/, '');
    } else {
        return num.toLocaleString('en-US', { maximumFractionDigits: 2 });
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
    document.getElementById('conversionTable').classList.add('hidden');
    document.getElementById('multipleResults').classList.add('hidden');
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