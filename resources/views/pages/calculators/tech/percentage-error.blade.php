@extends('layouts.app')

@section('title', 'Percentage Error Calculator | Measurement Accuracy | CalculaterTools')

@section('meta-description', 'Calculate percentage error between measured and actual values. Perfect for science experiments, quality control, and data analysis.')

@section('keywords', 'percentage error calculator, percent error, measurement error, accuracy calculator, experimental error, relative error')

@section('canonical', url('/calculators/percentage-error'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Percentage Error Calculator",
    "description": "Calculate percentage error between measured and actual values",
    "url": "{{ url('/calculators/percentage-error') }}",
    "operatingSystem": "Any",
    "applicationCategory": "EducationalApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script>
@endverbatim
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
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
                        <a href="#math" class="text-blue-600 hover:text-blue-800 transition duration-150">Math Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Percentage Error Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Percentage Error Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate the accuracy of your measurements and experiments. Perfect for students, researchers, and quality control professionals.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Percentage Error</h2>
                        <p class="text-gray-600 mb-6">Enter your measured and actual values to calculate accuracy</p>
                        
                        <form id="percentageErrorCalculatorForm" class="space-y-6">
                            <!-- Input Values -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Measurement Values</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="measuredValue" class="block text-xs font-medium text-green-700 mb-2">
                                            Measured Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="measuredValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="Enter measured value"
                                                step="any"
                                                value="25.4"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500 text-sm">units</span>
                                        </div>
                                        <p class="text-xs text-green-600 mt-1">The value you obtained from measurement</p>
                                    </div>
                                    
                                    <div>
                                        <label for="actualValue" class="block text-xs font-medium text-green-700 mb-2">
                                            Actual Value
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="actualValue" 
                                                class="w-full pl-4 pr-12 py-3 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                placeholder="Enter actual value"
                                                step="any"
                                                value="25.0"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500 text-sm">units</span>
                                        </div>
                                        <p class="text-xs text-green-600 mt-1">The true or accepted value</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculation Options -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Calculation Options</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-medium text-blue-700 mb-2">
                                            Error Type
                                        </label>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                            <button type="button" onclick="setErrorType('percentage')" class="error-type-btn py-2 px-3 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200 text-sm">
                                                <i class="fas fa-percentage mr-1"></i>
                                                Percentage Error
                                            </button>
                                            <button type="button" onclick="setErrorType('absolute')" class="error-type-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                                <i class="fas fa-arrows-alt-h mr-1"></i>
                                                Absolute Error
                                            </button>
                                            <button type="button" onclick="setErrorType('relative')" class="error-type-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                                <i class="fas fa-balance-scale mr-1"></i>
                                                Relative Error
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="decimalPlaces" class="block text-xs font-medium text-blue-700 mb-2">
                                                Decimal Places
                                            </label>
                                            <select id="decimalPlaces" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                                <option value="0">0 (Whole number)</option>
                                                <option value="1">1 decimal place</option>
                                                <option value="2" selected>2 decimal places</option>
                                                <option value="3">3 decimal places</option>
                                                <option value="4">4 decimal places</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="outputFormat" class="block text-xs font-medium text-blue-700 mb-2">
                                                Output Format
                                            </label>
                                            <select id="outputFormat" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                                <option value="decimal" selected>Decimal (0.25)</option>
                                                <option value="percentage">Percentage (25%)</option>
                                                <option value="fraction">Fraction (1/4)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Examples -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Quick Examples</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="loadExample('chemistry')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-flask text-purple-600 mr-1"></i>
                                        Chemistry Lab
                                    </button>
                                    <button type="button" onclick="loadExample('physics')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-atom text-purple-600 mr-1"></i>
                                        Physics Exp
                                    </button>
                                    <button type="button" onclick="loadExample('engineering')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-cog text-purple-600 mr-1"></i>
                                        Engineering
                                    </button>
                                    <button type="button" onclick="loadExample('quality')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        <i class="fas fa-chart-bar text-purple-600 mr-1"></i>
                                        Quality Control
                                    </button>
                                </div>
                            </div>

                            <!-- Advanced Options -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Advanced Options</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showSteps" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="showSteps" class="ml-2 text-xs text-amber-700">
                                            Show calculation steps
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="includeDirection" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="includeDirection" class="ml-2 text-xs text-amber-700">
                                            Show error direction
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="tolerance" class="block text-xs font-medium text-amber-700 mb-2">
                                        Acceptable Tolerance (%)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="tolerance" 
                                            class="w-full pl-4 pr-12 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                            placeholder="e.g., 5"
                                            min="0"
                                            max="100"
                                            step="0.1"
                                            value="5"
                                        >
                                        <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="calculatePercentageError()"
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg"
                                >
                                    <i class="fas fa-calculator mr-2"></i>
                                    Calculate Error
                                </button>
                                <button 
                                    type="button" 
                                    onclick="resetCalculator()"
                                    class="w-full bg-gray-600 hover:bg-gray-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                >
                                    <i class="fas fa-eraser mr-2"></i>
                                    Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Error Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-calculator text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter values</p>
                                <p class="text-sm">to see error calculation</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-blue-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Error Formulas</h4>
                            <div class="space-y-2 text-xs">
                                <div class="font-mono bg-white p-2 rounded">
                                    Percentage Error = |(Measured - Actual)| / |Actual| × 100%
                                </div>
                                <div class="font-mono bg-white p-2 rounded">
                                    Absolute Error = |Measured - Actual|
                                </div>
                                <div class="font-mono bg-white p-2 rounded">
                                    Relative Error = |Measured - Actual| / |Actual|
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Error Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Error Analysis</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="percentageErrorResult">0%</div>
                            <div class="text-lg font-semibold text-gray-700">Percentage Error</div>
                            <div class="text-sm text-gray-500 mt-1">Accuracy measurement</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="absoluteErrorResult">0</div>
                            <div class="text-lg font-semibold text-gray-700">Absolute Error</div>
                            <div class="text-sm text-gray-500 mt-1">Direct difference</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="relativeErrorResult">0</div>
                            <div class="text-lg font-semibold text-gray-700">Relative Error</div>
                            <div class="text-sm text-gray-500 mt-1">Proportional difference</div>
                        </div>
                    </div>
                </div>

                <!-- Accuracy Assessment -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Accuracy Assessment</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Tolerance Check -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tolerance Analysis</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-gray-700">Acceptable Tolerance:</span>
                                    <span class="font-semibold text-blue-600" id="toleranceDisplay">5%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                                    <div id="toleranceBar" class="h-4 rounded-full transition-all duration-500" style="width: 0%"></div>
                                </div>
                                <div id="toleranceStatus" class="text-center p-3 rounded-lg text-sm font-semibold"></div>
                            </div>
                        </div>
                        
                        <!-- Error Direction -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Error Direction</h3>
                            <div class="space-y-4" id="errorDirection">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step-by-Step Calculation -->
                <div id="stepByStepSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Calculation Steps</h2>
                    <div class="space-y-6" id="stepByStepContent">
                    </div>
                </div>

                <!-- Error Interpretation -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Error Interpretation Guide</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Common Ranges -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Common Error Ranges</h3>
                            <div class="space-y-3" id="errorRanges">
                            </div>
                        </div>
                        
                        <!-- Improvement Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Improvement Tips</h3>
                            <div class="space-y-3" id="improvementTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Educational Content -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Percentage Error</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            What is Percentage Error?
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Percentage error measures the accuracy of a measurement by comparing the difference between measured and actual values relative to the actual value. It's expressed as a percentage to provide a standardized measure of accuracy.
                        </p>
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-800 mb-2">Key Formula:</h4>
                            <div class="font-mono text-sm bg-white p-3 rounded border border-blue-200">
                                Percentage Error = |(Measured Value - Actual Value)| ÷ |Actual Value| × 100%
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-green-600 mr-2"></i>
                            Why Calculate Percentage Error?
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Quality Control:</strong> Ensure manufacturing precision and product quality</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Scientific Research:</strong> Validate experimental results and methodology</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Education:</strong> Teach measurement accuracy and error analysis</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Engineering:</strong> Verify design specifications and tolerances</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Data Analysis:</strong> Assess reliability of measurements and observations</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Percentage Error FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between percentage error and absolute error?</h3>
                        <p class="text-gray-600">Absolute error is the simple difference between measured and actual values (Measured - Actual), while percentage error expresses this difference as a percentage of the actual value. Percentage error is more useful for comparing accuracy across different scales of measurement.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can percentage error be negative?</h3>
                        <p class="text-gray-600">Typically, percentage error is expressed as an absolute value (always positive) because we're interested in the magnitude of error, not the direction. However, some contexts may preserve the sign to indicate whether the measurement was above or below the actual value.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is an acceptable percentage error?</h3>
                        <p class="text-gray-600">Acceptable error depends on the context. In precise scientific measurements, errors under 1% are often desired. In manufacturing, tolerances might be 5% or higher. For rough estimates, even 10-20% might be acceptable. Always consider the specific requirements of your application.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I reduce percentage error in my measurements?</h3>
                        <p class="text-gray-600">Use calibrated instruments, take multiple measurements and average them, minimize environmental interference, follow proper measurement techniques, use instruments with appropriate precision, and ensure operators are properly trained.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I use relative error vs percentage error?</h3>
                        <p class="text-gray-600">Relative error is the decimal form (e.g., 0.05), while percentage error is the percentage form (5%). Use relative error for mathematical calculations and percentage error for reporting and communication, as percentages are more intuitive for most people.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate percentages and changes</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-ruler text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Standard Deviation</h3>
                        <p class="text-gray-600 text-sm">Calculate data variability</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-balance-scale text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Uncertainty Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate measurement uncertainty</p>
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
let currentErrorType = 'percentage';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculatePercentageError(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change with debouncing
    document.getElementById('measuredValue').addEventListener('input', debounce(calculatePercentageError, 500));
    document.getElementById('actualValue').addEventListener('input', debounce(calculatePercentageError, 500));
    
    // Update calculation when options change
    document.getElementById('decimalPlaces').addEventListener('change', calculatePercentageError);
    document.getElementById('outputFormat').addEventListener('change', calculatePercentageError);
    document.getElementById('showSteps').addEventListener('change', calculatePercentageError);
    document.getElementById('includeDirection').addEventListener('change', calculatePercentageError);
    document.getElementById('tolerance').addEventListener('input', debounce(calculatePercentageError, 500));
}

function setErrorType(type) {
    currentErrorType = type;
    
    // Update button styles
    document.querySelectorAll('.error-type-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Activate current button
    event.target.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    calculatePercentageError();
}

function loadExample(example) {
    const examples = {
        'chemistry': { measured: 9.85, actual: 10.00, description: 'Titration experiment measuring acid concentration' },
        'physics': { measured: 9.65, actual: 9.81, description: 'Gravity acceleration measurement' },
        'engineering': { measured: 24.8, actual: 25.0, description: 'Machined part diameter measurement' },
        'quality': { measured: 499, actual: 500, description: 'Product weight quality control check' }
    };
    
    if (examples[example]) {
        document.getElementById('measuredValue').value = examples[example].measured;
        document.getElementById('actualValue').value = examples[example].actual;
        calculatePercentageError();
    }
}

function resetCalculator() {
    document.getElementById('measuredValue').value = '';
    document.getElementById('actualValue').value = '';
    document.getElementById('tolerance').value = '5';
    document.getElementById('decimalPlaces').value = '2';
    document.getElementById('outputFormat').value = 'decimal';
    document.getElementById('showSteps').checked = true;
    document.getElementById('includeDirection').checked = true;
    
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-calculator text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter values</p>
            <p class="text-sm">to see error calculation</p>
        </div>
    `;
    
    document.getElementById('detailedResults').classList.add('hidden');
}

function calculatePercentageError() {
    const measured = parseFloat(document.getElementById('measuredValue').value);
    const actual = parseFloat(document.getElementById('actualValue').value);
    
    // Validate inputs
    if (isNaN(measured) || isNaN(actual)) {
        showError('Please enter valid numbers for both measured and actual values');
        return;
    }
    
    if (actual === 0) {
        showError('Actual value cannot be zero (division by zero)');
        return;
    }
    
    const decimalPlaces = parseInt(document.getElementById('decimalPlaces').value);
    const showSteps = document.getElementById('showSteps').checked;
    const includeDirection = document.getElementById('includeDirection').checked;
    const tolerance = parseFloat(document.getElementById('tolerance').value) || 0;
    
    // Calculate errors
    const absoluteError = Math.abs(measured - actual);
    const relativeError = absoluteError / Math.abs(actual);
    const percentageError = relativeError * 100;
    
    // Determine error direction
    const direction = measured > actual ? 'overestimation' : measured < actual ? 'underestimation' : 'exact';
    
    // Display results
    displayResults(measured, actual, absoluteError, relativeError, percentageError, direction, decimalPlaces);
    
    // Show step-by-step if enabled
    if (showSteps) {
        displayStepByStep(measured, actual, absoluteError, relativeError, percentageError);
        document.getElementById('stepByStepSection').classList.remove('hidden');
    } else {
        document.getElementById('stepByStepSection').classList.add('hidden');
    }
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update tolerance analysis and interpretation
    updateToleranceAnalysis(percentageError, tolerance);
    updateErrorInterpretation(percentageError, direction);
}

function displayResults(measured, actual, absoluteError, relativeError, percentageError, direction, decimalPlaces) {
    const resultsDiv = document.getElementById('results');
    const outputFormat = document.getElementById('outputFormat').value;
    
    // Format numbers based on decimal places
    const formatNumber = (num) => num.toFixed(decimalPlaces);
    
    let primaryResult, primaryLabel;
    
    switch (currentErrorType) {
        case 'percentage':
            primaryResult = `${formatNumber(percentageError)}%`;
            primaryLabel = 'Percentage Error';
            break;
        case 'absolute':
            primaryResult = formatNumber(absoluteError);
            primaryLabel = 'Absolute Error';
            break;
        case 'relative':
            if (outputFormat === 'percentage') {
                primaryResult = `${formatNumber(relativeError * 100)}%`;
            } else if (outputFormat === 'fraction') {
                primaryResult = `${formatNumber(relativeError * 100)}/100`;
            } else {
                primaryResult = formatNumber(relativeError);
            }
            primaryLabel = 'Relative Error';
            break;
    }
    
    // Update main results card
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="text-center mb-4">
                <div class="text-lg font-bold text-gray-700 mb-2">${primaryLabel}</div>
                <div class="text-3xl font-bold text-blue-600">${primaryResult}</div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 text-center">
                <div class="bg-green-50 rounded-lg p-3">
                    <div class="text-sm text-green-600 font-semibold">Measured</div>
                    <div class="text-lg font-bold text-gray-800">${formatNumber(measured)}</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-3">
                    <div class="text-sm text-blue-600 font-semibold">Actual</div>
                    <div class="text-lg font-bold text-gray-800">${formatNumber(actual)}</div>
                </div>
            </div>
            
            ${direction !== 'exact' ? `
                <div class="bg-amber-50 rounded-lg p-3 text-center">
                    <div class="text-sm text-amber-600 font-semibold">Direction</div>
                    <div class="text-md font-medium text-gray-800 capitalize">${direction}</div>
                </div>
            ` : ''}
        </div>
    `;
    
    // Update detailed results
    updateDetailedResults(absoluteError, relativeError, percentageError, decimalPlaces, outputFormat);
}

function updateDetailedResults(absoluteError, relativeError, percentageError, decimalPlaces, outputFormat) {
    const formatNumber = (num) => num.toFixed(decimalPlaces);
    
    // Update error summary cards
    document.getElementById('percentageErrorResult').textContent = `${formatNumber(percentageError)}%`;
    document.getElementById('absoluteErrorResult').textContent = formatNumber(absoluteError);
    
    if (outputFormat === 'percentage') {
        document.getElementById('relativeErrorResult').textContent = `${formatNumber(relativeError * 100)}%`;
    } else if (outputFormat === 'fraction') {
        document.getElementById('relativeErrorResult').textContent = `${formatNumber(relativeError * 100)}/100`;
    } else {
        document.getElementById('relativeErrorResult').textContent = formatNumber(relativeError);
    }
}

function displayStepByStep(measured, actual, absoluteError, relativeError, percentageError) {
    const container = document.getElementById('stepByStepContent');
    const decimalPlaces = parseInt(document.getElementById('decimalPlaces').value);
    const formatNumber = (num) => num.toFixed(decimalPlaces);
    
    const steps = [
        {
            title: 'Step 1: Calculate Absolute Error',
            content: 'Find the difference between measured and actual values (always positive)',
            calculation: [
                `Absolute Error = |Measured - Actual|`,
                `= |${formatNumber(measured)} - ${formatNumber(actual)}|`,
                `= |${formatNumber(measured - actual)}|`,
                `= ${formatNumber(absoluteError)}`
            ]
        },
        {
            title: 'Step 2: Calculate Relative Error',
            content: 'Divide absolute error by the actual value',
            calculation: [
                `Relative Error = Absolute Error ÷ |Actual|`,
                `= ${formatNumber(absoluteError)} ÷ |${formatNumber(actual)}|`,
                `= ${formatNumber(absoluteError)} ÷ ${formatNumber(Math.abs(actual))}`,
                `= ${formatNumber(relativeError)}`
            ]
        },
        {
            title: 'Step 3: Calculate Percentage Error',
            content: 'Multiply relative error by 100%',
            calculation: [
                `Percentage Error = Relative Error × 100%`,
                `= ${formatNumber(relativeError)} × 100%`,
                `= ${formatNumber(percentageError)}%`
            ]
        }
    ];
    
    let stepsHtml = '';
    
    steps.forEach(step => {
        stepsHtml += `
            <div class="border-l-4 border-blue-500 pl-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">${step.title}</h3>
                <p class="text-gray-600 mb-3">${step.content}</p>
                <div class="bg-gray-50 rounded-lg p-4 font-mono text-sm space-y-1">
                    ${step.calculation.map(calc => `<div>${calc}</div>`).join('')}
                </div>
            </div>
        `;
    });
    
    container.innerHTML = stepsHtml;
}

function updateToleranceAnalysis(percentageError, tolerance) {
    document.getElementById('toleranceDisplay').textContent = `${tolerance}%`;
    
    const toleranceBar = document.getElementById('toleranceBar');
    const toleranceStatus = document.getElementById('toleranceStatus');
    
    // Calculate bar width (capped at 100%)
    const barWidth = Math.min(100, (percentageError / tolerance) * 100);
    
    // Set bar color and status based on tolerance
    if (percentageError <= tolerance) {
        toleranceBar.className = 'h-4 rounded-full transition-all duration-500 bg-green-500';
        toleranceStatus.className = 'text-center p-3 rounded-lg text-sm font-semibold bg-green-100 text-green-700';
        toleranceStatus.innerHTML = `<i class="fas fa-check-circle mr-1"></i> Within acceptable tolerance (${tolerance}%)`;
    } else {
        toleranceBar.className = 'h-4 rounded-full transition-all duration-500 bg-red-500';
        toleranceStatus.className = 'text-center p-3 rounded-lg text-sm font-semibold bg-red-100 text-red-700';
        toleranceStatus.innerHTML = `<i class="fas fa-exclamation-triangle mr-1"></i> Exceeds acceptable tolerance (${tolerance}%)`;
    }
    
    toleranceBar.style.width = `${barWidth}%`;
}

function updateErrorInterpretation(percentageError, direction) {
    const errorDirectionDiv = document.getElementById('errorDirection');
    const errorRangesDiv = document.getElementById('errorRanges');
    const improvementTipsDiv = document.getElementById('improvementTips');
    
    // Error direction analysis
    let directionHtml = '';
    if (direction === 'exact') {
        directionHtml = `
            <div class="bg-green-50 rounded-lg p-4 text-center">
                <i class="fas fa-check-circle text-green-500 text-2xl mb-2"></i>
                <div class="font-semibold text-green-700">Perfect Measurement</div>
                <div class="text-sm text-green-600 mt-1">Measured value matches actual value exactly</div>
            </div>
        `;
    } else {
        directionHtml = `
            <div class="bg-blue-50 rounded-lg p-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-blue-700 font-semibold">Error Direction:</span>
                    <span class="text-blue-600 capitalize">${direction}</span>
                </div>
                <div class="text-sm text-blue-600">
                    The measured value is ${direction === 'overestimation' ? 'higher' : 'lower'} than the actual value
                </div>
            </div>
        `;
    }
    
    errorDirectionDiv.innerHTML = directionHtml;
    
    // Common error ranges
    const ranges = [
        { range: '0% - 1%', description: 'Excellent precision', color: 'green' },
        { range: '1% - 5%', description: 'Good accuracy', color: 'blue' },
        { range: '5% - 10%', description: 'Acceptable for many applications', color: 'yellow' },
        { range: '10% - 20%', description: 'Moderate error', color: 'orange' },
        { range: '20%+', description: 'High error - review methodology', color: 'red' }
    ];
    
    let rangesHtml = '';
    ranges.forEach(range => {
        const isCurrentRange = 
            (range.range === '0% - 1%' && percentageError <= 1) ||
            (range.range === '1% - 5%' && percentageError > 1 && percentageError <= 5) ||
            (range.range === '5% - 10%' && percentageError > 5 && percentageError <= 10) ||
            (range.range === '10% - 20%' && percentageError > 10 && percentageError <= 20) ||
            (range.range === '20%+' && percentageError > 20);
        
        const highlightClass = isCurrentRange ? 'border-l-4 border-' + range.color + '-500 bg-' + range.color + '-50' : '';
        
        rangesHtml += `
            <div class="flex justify-between items-center p-3 border border-gray-200 rounded-lg ${highlightClass}">
                <div>
                    <div class="font-medium text-gray-800">${range.range}</div>
                    <div class="text-sm text-gray-600">${range.description}</div>
                </div>
                ${isCurrentRange ? `<i class="fas fa-arrow-right text-${range.color}-500"></i>` : ''}
            </div>
        `;
    });
    
    errorRangesDiv.innerHTML = rangesHtml;
    
    // Improvement tips
    let tipsHtml = '';
    const tips = [
        { icon: 'ruler', text: 'Use calibrated and appropriate measuring instruments' },
        { icon: 'redo', text: 'Take multiple measurements and calculate average' },
        { icon: 'user-graduate', text: 'Ensure proper training for measurement techniques' },
        { icon: 'thermometer', text: 'Control environmental conditions when possible' },
        { icon: 'clock', text: 'Allow instruments to stabilize before measurement' }
    ];
    
    if (percentageError > 10) {
        tips.unshift(
            { icon: 'exclamation-triangle', text: 'Review measurement methodology and procedures' },
            { icon: 'search', text: 'Identify and eliminate sources of systematic error' }
        );
    }
    
    tips.forEach(tip => {
        tipsHtml += `
            <div class="flex items-start space-x-3">
                <i class="fas fa-${tip.icon} text-blue-500 mt-1"></i>
                <div>
                    <p class="text-sm text-gray-700">${tip.text}</p>
                </div>
            </div>
        `;
    });
    
    improvementTipsDiv.innerHTML = tipsHtml;
}

function showError(message) {
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        <div class="text-center py-4 text-red-600">
            <i class="fas fa-exclamation-triangle text-3xl mb-2"></i>
            <p class="font-medium">${message}</p>
        </div>
    `;
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
@endsection