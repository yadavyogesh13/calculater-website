@extends('layouts.app')

@section('title', 'Time Complexity Estimator | Algorithm Analysis | CalculaterTools')

@section('meta-description', 'Analyze algorithm time complexity and understand Big O notation. Estimate performance for different input sizes and optimize your code.')

@section('keywords', 'time complexity, big o notation, algorithm analysis, computational complexity, algorithm efficiency, programming')

@section('canonical', url('/calculators/time-complexity'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Time Complexity Estimator",
    "description": "Analyze algorithm time complexity and understand Big O notation",
    "url": "{{ url('/calculators/time-complexity') }}",
    "operatingSystem": "Any",
    "applicationCategory": "ProgrammingApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-purple-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-purple-600 hover:text-purple-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#programming" class="text-purple-600 hover:text-purple-800 transition duration-150">Programming Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Time Complexity Estimator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Time Complexity Estimator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Analyze algorithm efficiency and understand Big O notation. Estimate performance for different input sizes and optimize your code.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Algorithm Analysis</h2>
                        <p class="text-gray-600 mb-6">Select your algorithm type and input parameters</p>
                        
                        <form id="timeComplexityForm" class="space-y-6">
                            <!-- Algorithm Selection -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Algorithm Type</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="selectAlgorithm('constant')" class="algorithm-btn py-2 px-3 border-2 border-purple-500 bg-purple-50 text-purple-700 rounded-lg font-semibold transition duration-200 text-sm">
                                        <i class="fas fa-bolt mr-1"></i>
                                        O(1)
                                    </button>
                                    <button type="button" onclick="selectAlgorithm('logarithmic')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-chart-line mr-1"></i>
                                        O(log n)
                                    </button>
                                    <button type="button" onclick="selectAlgorithm('linear')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-arrow-right mr-1"></i>
                                        O(n)
                                    </button>
                                    <button type="button" onclick="selectAlgorithm('quadratic')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        O(n²)
                                    </button>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-2">
                                    <button type="button" onclick="selectAlgorithm('cubic')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-cube mr-1"></i>
                                        O(n³)
                                    </button>
                                    <button type="button" onclick="selectAlgorithm('exponential')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-rocket mr-1"></i>
                                        O(2ⁿ)
                                    </button>
                                    <button type="button" onclick="selectAlgorithm('factorial')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-infinity mr-1"></i>
                                        O(n!)
                                    </button>
                                    <button type="button" onclick="selectAlgorithm('linearithmic')" class="algorithm-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                        <i class="fas fa-wave-square mr-1"></i>
                                        O(n log n)
                                    </button>
                                </div>
                            </div>

                            <!-- Input Parameters -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Input Parameters</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="inputSize" class="block text-xs font-medium text-blue-700 mb-2">
                                            Input Size (n)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="inputSize" 
                                                class="w-full pl-4 pr-12 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 1000"
                                                min="1"
                                                max="1000000"
                                                value="1000"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500 text-sm">elements</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="operationTime" class="block text-xs font-medium text-blue-700 mb-2">
                                            Operation Time
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="operationTime" 
                                                class="w-full pl-4 pr-12 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 0.001"
                                                min="0.000001"
                                                max="1"
                                                step="0.000001"
                                                value="0.001"
                                                required
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500 text-sm">ms</span>
                                        </div>
                                        <p class="text-xs text-blue-600 mt-1">Time per basic operation</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Common Algorithms -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Common Algorithms</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="loadAlgorithmExample('binary-search')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                        <i class="fas fa-search text-green-600 mr-1"></i>
                                        Binary Search
                                    </button>
                                    <button type="button" onclick="loadAlgorithmExample('bubble-sort')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                        <i class="fas fa-sort text-green-600 mr-1"></i>
                                        Bubble Sort
                                    </button>
                                    <button type="button" onclick="loadAlgorithmExample('quick-sort')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                        <i class="fas fa-bolt text-green-600 mr-1"></i>
                                        Quick Sort
                                    </button>
                                    <button type="button" onclick="loadAlgorithmExample('fibonacci')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                        <i class="fas fa-code-branch text-green-600 mr-1"></i>
                                        Fibonacci
                                    </button>
                                </div>
                            </div>

                            <!-- Analysis Options -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Analysis Options</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="comparisonSize" class="block text-xs font-medium text-amber-700 mb-2">
                                            Comparison Input Size
                                        </label>
                                        <select id="comparisonSize" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                            <option value="10x">10x larger (10n)</option>
                                            <option value="100x" selected>100x larger (100n)</option>
                                            <option value="1000x">1000x larger (1000n)</option>
                                            <option value="custom">Custom multiplier</option>
                                        </select>
                                    </div>
                                    <div id="customMultiplierContainer" class="hidden">
                                        <label for="customMultiplier" class="block text-xs font-medium text-amber-700 mb-2">
                                            Custom Multiplier
                                        </label>
                                        <input 
                                            type="number" 
                                            id="customMultiplier" 
                                            class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                            placeholder="e.g., 50"
                                            min="2"
                                            max="10000"
                                            value="100"
                                        >
                                    </div>
                                </div>
                                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showGraph" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="showGraph" class="ml-2 text-xs text-amber-700">
                                            Show growth graph
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showComparison" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="showComparison" class="ml-2 text-xs text-amber-700">
                                            Compare with other complexities
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="analyzeComplexity()"
                                    class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300 shadow-lg"
                                >
                                    <i class="fas fa-calculator mr-2"></i>
                                    Analyze Complexity
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
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Complexity Analysis</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-chart-line text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Select algorithm type</p>
                                <p class="text-sm">to see complexity analysis</p>
                            </div>
                        </div>

                        <!-- Complexity Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-purple-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Common Complexities</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">O(1):</span>
                                    <span class="font-medium">Constant</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">O(log n):</span>
                                    <span class="font-medium">Logarithmic</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">O(n):</span>
                                    <span class="font-medium">Linear</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">O(n log n):</span>
                                    <span class="font-medium">Linearithmic</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">O(n²):</span>
                                    <span class="font-medium">Quadratic</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">O(2ⁿ):</span>
                                    <span class="font-medium">Exponential</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Complexity Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Time Complexity Analysis</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="bigONotation">O(1)</div>
                            <div class="text-lg font-semibold text-gray-700">Big O Notation</div>
                            <div class="text-sm text-gray-500 mt-1">Worst case complexity</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="estimatedTime">0 ms</div>
                            <div class="text-lg font-semibold text-gray-700">Estimated Time</div>
                            <div class="text-sm text-gray-500 mt-1">For given input size</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="scaledTime">0 ms</div>
                            <div class="text-lg font-semibold text-gray-700">Scaled Time</div>
                            <div class="text-sm text-gray-500 mt-1">For larger input</div>
                        </div>
                    </div>
                </div>

                <!-- Growth Analysis -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Growth Analysis</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Performance Graph -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Performance Scaling</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div id="performanceGraph" class="h-64 flex items-end justify-between space-x-2">
                                    <!-- Graph bars will be generated by JavaScript -->
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-2">
                                    <span>n</span>
                                    <span>2n</span>
                                    <span>5n</span>
                                    <span>10n</span>
                                    <span>100n</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Complexity Comparison -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Complexity Comparison</h3>
                            <div class="space-y-3" id="complexityComparison">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Practical Implications -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Practical Implications</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Use Cases -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Recommended Use Cases</h3>
                            <div class="space-y-3" id="useCases">
                            </div>
                        </div>
                        
                        <!-- Optimization Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Optimization Tips</h3>
                            <div class="space-y-3" id="optimizationTips">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Algorithm Examples -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Algorithm Examples</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Code Examples -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Code Implementation</h3>
                            <div class="space-y-4" id="codeExamples">
                            </div>
                        </div>
                        
                        <!-- Real-world Scenarios -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Real-world Scenarios</h3>
                            <div class="space-y-3" id="realWorldScenarios">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Educational Content -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Time Complexity</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-purple-600 mr-2"></i>
                            What is Time Complexity?
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Time complexity describes how the runtime of an algorithm scales with the size of the input. It's expressed using Big O notation, which provides an upper bound on the growth rate of the algorithm's running time.
                        </p>
                        <div class="bg-purple-50 rounded-lg p-4">
                            <h4 class="font-semibold text-purple-800 mb-2">Key Concepts:</h4>
                            <ul class="space-y-2 text-sm text-purple-700">
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mt-1 mr-2"></i>
                                    <span><strong>Big O Notation:</strong> Describes worst-case scenario</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mt-1 mr-2"></i>
                                    <span><strong>Input Size (n):</strong> Number of elements being processed</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mt-1 mr-2"></i>
                                    <span><strong>Growth Rate:</strong> How runtime increases as n increases</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-arrow-right text-purple-500 mt-1 mr-2"></i>
                                    <span><strong>Asymptotic Analysis:</strong> Behavior as n approaches infinity</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-green-600 mr-2"></i>
                            Why Time Complexity Matters
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Scalability:</strong> Predict how algorithms perform with large datasets</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Optimization:</strong> Identify bottlenecks and improve efficiency</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Algorithm Selection:</strong> Choose the right tool for specific problems</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>System Design:</strong> Design systems that can handle expected loads</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span><strong>Interview Preparation:</strong> Essential knowledge for technical interviews</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Time Complexity FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between time complexity and actual runtime?</h3>
                        <p class="text-gray-600">Time complexity describes how runtime scales with input size (the growth rate), while actual runtime depends on specific hardware, implementation details, and constant factors. Two algorithms with the same time complexity can have very different actual runtimes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do we use Big O notation instead of exact formulas?</h3>
                        <p class="text-gray-600">Big O notation focuses on the dominant factors that affect scalability, ignoring constants and lower-order terms. This simplification helps compare algorithms' fundamental efficiency without getting bogged down in implementation-specific details.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the practical difference between O(n) and O(n log n)?</h3>
                        <p class="text-gray-600">For small inputs, the difference might be negligible. But for large datasets (millions of elements), O(n) algorithms can be significantly faster. O(n log n) grows faster than linear but much slower than quadratic time.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I worry about time complexity?</h3>
                        <p class="text-gray-600">Focus on time complexity when dealing with large datasets, performance-critical applications, or when you expect your code to scale. For small, one-time operations or prototypes, simpler (but less efficient) algorithms might be acceptable.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate are these time estimates?</h3>
                        <p class="text-gray-600">These estimates provide a theoretical understanding of scaling behavior. Actual performance depends on many factors including hardware, compiler optimizations, memory access patterns, and constant factors that Big O notation ignores.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Programming Tools</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-memory text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Space Complexity</h3>
                        <p class="text-gray-600 text-sm">Analyze memory usage patterns</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-sort-amount-down text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Sorting Visualizer</h3>
                        <p class="text-gray-600 text-sm">Visualize sorting algorithms</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-project-diagram text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Data Structure</h3>
                        <p class="text-gray-600 text-sm">Explore data structures</p>
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
let currentAlgorithm = 'constant';
const algorithmData = {
    'constant': {
        name: 'Constant Time',
        notation: 'O(1)',
        formula: (n) => 1,
        description: 'Runtime is independent of input size',
        examples: ['Array access', 'Hash table lookup', 'Arithmetic operations'],
        useCases: ['Small fixed operations', 'Cache lookups', 'Mathematical operations'],
        optimization: 'Already optimal - cannot be improved further'
    },
    'logarithmic': {
        name: 'Logarithmic Time',
        notation: 'O(log n)',
        formula: (n) => Math.log2(n),
        description: 'Runtime grows logarithmically with input size',
        examples: ['Binary search', 'Balanced BST operations', 'Heap operations'],
        useCases: ['Searching in sorted data', 'Divide and conquer algorithms'],
        optimization: 'Use binary search instead of linear search when possible'
    },
    'linear': {
        name: 'Linear Time',
        notation: 'O(n)',
        formula: (n) => n,
        description: 'Runtime grows linearly with input size',
        examples: ['Linear search', 'Array traversal', 'Finding max/min'],
        useCases: ['Processing each element once', 'Simple data transformations'],
        optimization: 'Avoid nested loops, use efficient data structures'
    },
    'linearithmic': {
        name: 'Linearithmic Time',
        notation: 'O(n log n)',
        formula: (n) => n * Math.log2(n),
        description: 'Runtime grows in proportion to n log n',
        examples: ['Efficient sorting algorithms', 'FFT', 'Closest pair'],
        useCases: ['Sorting large datasets', 'Complex divide and conquer'],
        optimization: 'Use efficient algorithms like merge sort or quick sort'
    },
    'quadratic': {
        name: 'Quadratic Time',
        notation: 'O(n²)',
        formula: (n) => n * n,
        description: 'Runtime grows with the square of input size',
        examples: ['Bubble sort', 'Selection sort', 'Nested loops'],
        useCases: ['Small datasets', 'Matrix operations', 'All pairs'],
        optimization: 'Replace with O(n log n) algorithms for large n'
    },
    'cubic': {
        name: 'Cubic Time',
        notation: 'O(n³)',
        formula: (n) => n * n * n,
        description: 'Runtime grows with the cube of input size',
        examples: ['3 nested loops', 'Naive matrix multiplication'],
        useCases: ['Very small datasets only', 'Theoretical examples'],
        optimization: 'Use optimized algorithms like Strassen for matrices'
    },
    'exponential': {
        name: 'Exponential Time',
        notation: 'O(2ⁿ)',
        formula: (n) => Math.pow(2, n),
        description: 'Runtime doubles with each additional element',
        examples: ['Brute force subset generation', 'Traveling salesman (naive)'],
        useCases: ['Only for very small n (< 30)', 'Theoretical problems'],
        optimization: 'Use dynamic programming or approximation algorithms'
    },
    'factorial': {
        name: 'Factorial Time',
        notation: 'O(n!)',
        formula: (n) => {
            let result = 1;
            for (let i = 2; i <= n; i++) result *= i;
            return result;
        },
        description: 'Runtime grows factorially with input size',
        examples: ['Permutation generation', 'Brute force TSP'],
        useCases: ['Extremely small n only (< 12)', 'Theoretical analysis'],
        optimization: 'Use heuristic or approximation approaches'
    }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    analyzeComplexity(); // Analyze with default values
});

function setupEventListeners() {
    // Auto-analyze on input change with debouncing
    document.getElementById('inputSize').addEventListener('input', debounce(analyzeComplexity, 300));
    document.getElementById('operationTime').addEventListener('input', debounce(analyzeComplexity, 300));
    
    // Comparison size selector
    document.getElementById('comparisonSize').addEventListener('change', function() {
        const customContainer = document.getElementById('customMultiplierContainer');
        customContainer.classList.toggle('hidden', this.value !== 'custom');
        analyzeComplexity();
    });
    
    document.getElementById('customMultiplier').addEventListener('input', debounce(analyzeComplexity, 300));
    
    // Analysis options
    document.getElementById('showGraph').addEventListener('change', analyzeComplexity);
    document.getElementById('showComparison').addEventListener('change', analyzeComplexity);
}

function selectAlgorithm(algorithm) {
    currentAlgorithm = algorithm;
    
    // Update button styles
    document.querySelectorAll('.algorithm-btn').forEach(btn => {
        btn.classList.remove('border-purple-500', 'bg-purple-50', 'text-purple-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Activate current button
    event.target.classList.add('border-purple-500', 'bg-purple-50', 'text-purple-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    analyzeComplexity();
}

function loadAlgorithmExample(example) {
    const examples = {
        'binary-search': { algorithm: 'logarithmic', size: 1000000, time: 0.001 },
        'bubble-sort': { algorithm: 'quadratic', size: 1000, time: 0.001 },
        'quick-sort': { algorithm: 'linearithmic', size: 100000, time: 0.001 },
        'fibonacci': { algorithm: 'exponential', size: 30, time: 0.001 }
    };
    
    if (examples[example]) {
        const config = examples[example];
        currentAlgorithm = config.algorithm;
        document.getElementById('inputSize').value = config.size;
        document.getElementById('operationTime').value = config.time;
        
        // Update algorithm button
        document.querySelectorAll('.algorithm-btn').forEach(btn => {
            btn.classList.remove('border-purple-500', 'bg-purple-50', 'text-purple-700');
            btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        });
        
        const targetBtn = document.querySelector(`[onclick="selectAlgorithm('${config.algorithm}')"]`);
        if (targetBtn) {
            targetBtn.classList.add('border-purple-500', 'bg-purple-50', 'text-purple-700');
            targetBtn.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        }
        
        analyzeComplexity();
    }
}

function resetCalculator() {
    document.getElementById('inputSize').value = '1000';
    document.getElementById('operationTime').value = '0.001';
    document.getElementById('comparisonSize').value = '100x';
    document.getElementById('customMultiplierContainer').classList.add('hidden');
    document.getElementById('showGraph').checked = true;
    document.getElementById('showComparison').checked = true;
    
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-chart-line text-5xl mb-4"></i>
            <p class="text-lg font-medium">Select algorithm type</p>
            <p class="text-sm">to see complexity analysis</p>
        </div>
    `;
    
    document.getElementById('detailedResults').classList.add('hidden');
}

function analyzeComplexity() {
    const inputSize = parseInt(document.getElementById('inputSize').value);
    const operationTime = parseFloat(document.getElementById('operationTime').value);
    
    if (!inputSize || !operationTime || inputSize < 1) {
        showError('Please enter valid input parameters');
        return;
    }
    
    const algorithm = algorithmData[currentAlgorithm];
    const comparisonConfig = getComparisonConfig();
    const showGraph = document.getElementById('showGraph').checked;
    const showComparison = document.getElementById('showComparison').checked;
    
    // Calculate time estimates
    const operations = algorithm.formula(inputSize);
    const estimatedTime = operations * operationTime;
    const scaledOperations = algorithm.formula(inputSize * comparisonConfig.multiplier);
    const scaledTime = scaledOperations * operationTime;
    
    // Display results
    displayResults(algorithm, inputSize, estimatedTime, scaledTime, comparisonConfig);
    
    // Show detailed analysis
    if (showGraph) {
        updatePerformanceGraph(algorithm, inputSize, operationTime);
    }
    
    if (showComparison) {
        updateComplexityComparison(inputSize, operationTime);
    }
    
    updatePracticalImplications(algorithm);
    updateAlgorithmExamples(algorithm);
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
}

function getComparisonConfig() {
    const comparisonType = document.getElementById('comparisonSize').value;
    
    switch (comparisonType) {
        case '10x':
            return { multiplier: 10, description: '10x larger input' };
        case '100x':
            return { multiplier: 100, description: '100x larger input' };
        case '1000x':
            return { multiplier: 1000, description: '1000x larger input' };
        case 'custom':
            const multiplier = parseInt(document.getElementById('customMultiplier').value) || 100;
            return { multiplier: multiplier, description: `${multiplier}x larger input` };
        default:
            return { multiplier: 100, description: '100x larger input' };
    }
}

function displayResults(algorithm, inputSize, estimatedTime, scaledTime, comparisonConfig) {
    const resultsDiv = document.getElementById('results');
    
    // Format time for display
    const formatTime = (time) => {
        if (time < 0.001) return `${(time * 1000).toFixed(3)} microseconds`;
        if (time < 1) return `${(time * 1000).toFixed(2)} milliseconds`;
        if (time < 60) return `${time.toFixed(2)} seconds`;
        if (time < 3600) return `${(time / 60).toFixed(2)} minutes`;
        if (time < 86400) return `${(time / 3600).toFixed(2)} hours`;
        return `${(time / 86400).toFixed(2)} days`;
    };
    
    // Update main results card
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="text-center mb-4">
                <div class="text-lg font-bold text-gray-700 mb-2">${algorithm.name}</div>
                <div class="text-2xl font-bold text-purple-600">${algorithm.notation}</div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 text-center">
                <div class="bg-blue-50 rounded-lg p-3">
                    <div class="text-sm text-blue-600 font-semibold">Current Input</div>
                    <div class="text-lg font-bold text-gray-800">${inputSize.toLocaleString()}</div>
                </div>
                <div class="bg-green-50 rounded-lg p-3">
                    <div class="text-sm text-green-600 font-semibold">Estimated Time</div>
                    <div class="text-lg font-bold text-gray-800">${formatTime(estimatedTime)}</div>
                </div>
            </div>
            
            <div class="bg-amber-50 rounded-lg p-3 text-center">
                <div class="text-sm text-amber-600 font-semibold">Scaled Analysis</div>
                <div class="text-md font-medium text-gray-800">${formatTime(scaledTime)}</div>
                <div class="text-xs text-amber-600 mt-1">${comparisonConfig.description}</div>
            </div>
        </div>
    `;
    
    // Update detailed results
    updateDetailedResults(algorithm, estimatedTime, scaledTime, formatTime);
}

function updateDetailedResults(algorithm, estimatedTime, scaledTime, formatTime) {
    // Update summary cards
    document.getElementById('bigONotation').textContent = algorithm.notation;
    document.getElementById('estimatedTime').textContent = formatTime(estimatedTime);
    document.getElementById('scaledTime').textContent = formatTime(scaledTime);
}

function updatePerformanceGraph(algorithm, inputSize, operationTime) {
    const graphDiv = document.getElementById('performanceGraph');
    const sizes = [inputSize, inputSize * 2, inputSize * 5, inputSize * 10, inputSize * 100];
    
    let graphHtml = '';
    const maxHeight = 240; // Maximum bar height in pixels
    
    // Find maximum operations for scaling
    const maxOperations = Math.max(...sizes.map(size => algorithm.formula(size)));
    
    sizes.forEach((size, index) => {
        const operations = algorithm.formula(size);
        const height = (operations / maxOperations) * maxHeight;
        const time = formatGraphTime(operations * operationTime);
        
        graphHtml += `
            <div class="flex flex-col items-center">
                <div 
                    class="w-8 bg-gradient-to-t from-purple-500 to-purple-300 rounded-t transition-all duration-500"
                    style="height: ${height}px"
                    title="${size.toLocaleString()} elements: ${time}"
                ></div>
                <div class="text-xs text-gray-600 mt-1">${index === 0 ? 'n' : index === 1 ? '2n' : index === 2 ? '5n' : index === 3 ? '10n' : '100n'}</div>
            </div>
        `;
    });
    
    graphDiv.innerHTML = graphHtml;
}

function updateComplexityComparison(inputSize, operationTime) {
    const comparisonDiv = document.getElementById('complexityComparison');
    let comparisonHtml = '';
    
    const complexities = ['constant', 'logarithmic', 'linear', 'linearithmic', 'quadratic', 'exponential'];
    
    complexities.forEach(complexity => {
        const algo = algorithmData[complexity];
        const operations = algo.formula(inputSize);
        const time = operations * operationTime;
        
        comparisonHtml += `
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg border border-gray-200">
                <div>
                    <div class="font-medium text-gray-800">${algo.notation}</div>
                    <div class="text-xs text-gray-600">${algo.name}</div>
                </div>
                <div class="text-right">
                    <div class="font-semibold ${getComplexityColor(algo.notation)}">${formatComparisonTime(time)}</div>
                    <div class="text-xs text-gray-500">${operations.toLocaleString()} ops</div>
                </div>
            </div>
        `;
    });
    
    comparisonDiv.innerHTML = comparisonHtml;
}

function updatePracticalImplications(algorithm) {
    const useCasesDiv = document.getElementById('useCases');
    const optimizationDiv = document.getElementById('optimizationTips');
    
    // Use cases
    let useCasesHtml = '';
    algorithm.useCases.forEach(useCase => {
        useCasesHtml += `
            <div class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg border border-green-200">
                <i class="fas fa-check text-green-500 mt-1"></i>
                <div>
                    <p class="text-sm text-green-700">${useCase}</p>
                </div>
            </div>
        `;
    });
    
    // Optimization tips
    let optimizationHtml = `
        <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
            <i class="fas fa-lightbulb text-blue-500 mt-1"></i>
            <div>
                <p class="text-sm text-blue-700">${algorithm.optimization}</p>
            </div>
        </div>
    `;
    
    // Additional tips based on complexity
    if (algorithm.notation === 'O(n²)' || algorithm.notation === 'O(n³)') {
        optimizationHtml += `
            <div class="flex items-start space-x-3 p-3 bg-amber-50 rounded-lg border border-amber-200">
                <i class="fas fa-exclamation-triangle text-amber-500 mt-1"></i>
                <div>
                    <p class="text-sm text-amber-700">Consider alternative algorithms for large datasets</p>
                </div>
            </div>
        `;
    }
    
    if (algorithm.notation === 'O(2ⁿ)' || algorithm.notation === 'O(n!)') {
        optimizationHtml += `
            <div class="flex items-start space-x-3 p-3 bg-red-50 rounded-lg border border-red-200">
                <i class="fas fa-exclamation-circle text-red-500 mt-1"></i>
                <div>
                    <p class="text-sm text-red-700">Only suitable for very small input sizes</p>
                </div>
            </div>
        `;
    }
    
    useCasesDiv.innerHTML = useCasesHtml;
    optimizationDiv.innerHTML = optimizationHtml;
}

function updateAlgorithmExamples(algorithm) {
    const codeExamplesDiv = document.getElementById('codeExamples');
    const scenariosDiv = document.getElementById('realWorldScenarios');
    
    // Code examples
    let codeHtml = '';
    algorithm.examples.forEach(example => {
        codeHtml += `
            <div class="bg-gray-800 rounded-lg p-4">
                <div class="text-green-400 font-mono text-sm">
                    // ${example}
                </div>
                <div class="text-gray-400 text-xs mt-2">
                    ${getCodeSnippet(example)}
                </div>
            </div>
        `;
    });
    
    // Real-world scenarios
    let scenariosHtml = '';
    const scenarios = getRealWorldScenarios(algorithm.notation);
    
    scenarios.forEach(scenario => {
        scenariosHtml += `
            <div class="flex items-start space-x-3 p-3 bg-purple-50 rounded-lg border border-purple-200">
                <i class="fas fa-globe text-purple-500 mt-1"></i>
                <div>
                    <p class="text-sm text-purple-700">${scenario}</p>
                </div>
            </div>
        `;
    });
    
    codeExamplesDiv.innerHTML = codeHtml;
    scenariosDiv.innerHTML = scenariosHtml;
}

// Helper functions
function formatGraphTime(time) {
    if (time < 0.001) return `${(time * 1000).toFixed(2)} μs`;
    if (time < 1) return `${(time * 1000).toFixed(1)} ms`;
    if (time < 60) return `${time.toFixed(1)} s`;
    return `${(time / 60).toFixed(1)} min`;
}

function formatComparisonTime(time) {
    if (time < 0.001) return '<1 ms';
    if (time < 1) return `${(time * 1000).toFixed(0)} ms`;
    if (time < 60) return `${time.toFixed(1)} s`;
    if (time < 3600) return `${(time / 60).toFixed(1)} min`;
    return `${(time / 3600).toFixed(1)} h`;
}

function getComplexityColor(notation) {
    const colors = {
        'O(1)': 'text-green-600',
        'O(log n)': 'text-blue-600',
        'O(n)': 'text-purple-600',
        'O(n log n)': 'text-indigo-600',
        'O(n²)': 'text-orange-600',
        'O(2ⁿ)': 'text-red-600',
        'O(n!)': 'text-red-700'
    };
    return colors[notation] || 'text-gray-600';
}

function getCodeSnippet(example) {
    const snippets = {
        'Array access': 'return array[index];',
        'Hash table lookup': 'return hashTable.get(key);',
        'Binary search': `while (low <= high) {
    mid = Math.floor((low + high) / 2);
    if (array[mid] === target) return mid;
    else if (array[mid] < target) low = mid + 1;
    else high = mid - 1;
}`,
        'Linear search': `for (let i = 0; i < array.length; i++) {
    if (array[i] === target) return i;
}`,
        'Bubble sort': `for (let i = 0; i < n; i++) {
    for (let j = 0; j < n-i-1; j++) {
        if (array[j] > array[j+1]) {
            swap(array, j, j+1);
        }
    }
}`
    };
    return snippets[example] || '// Implementation varies...';
}

function getRealWorldScenarios(notation) {
    const scenarios = {
        'O(1)': [
            'Database primary key lookups',
            'Cache access in web applications',
            'Array indexing operations'
        ],
        'O(log n)': [
            'Searching in phone book or dictionary',
            'Finding word in sorted list',
            'Database index searches'
        ],
        'O(n)': [
            'Reading a file line by line',
            'Counting items in a list',
            'Finding maximum value in array'
        ],
        'O(n log n)': [
            'Sorting large datasets efficiently',
            'Building efficient search indexes',
            'Complex data processing tasks'
        ],
        'O(n²)': [
            'Comparing all pairs of items',
            'Simple image processing algorithms',
            'Small matrix operations'
        ],
        'O(2ⁿ)': [
            'Brute force password cracking',
            'Solving complex puzzles exhaustively',
            'Theoretical computer science problems'
        ]
    };
    return scenarios[notation] || ['Theoretical analysis and complex computations'];
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