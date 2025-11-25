@extends('layouts.app')

@section('title', 'JSON Formatter & Validator | JSON Beautifier & Syntax Checker | CalculaterTools')

@section('meta-description', 'Free JSON formatter and validator tool. Beautify, validate, and fix JSON syntax with real-time error checking. Perfect for developers and API work.')

@section('keywords', 'json formatter, json validator, json beautifier, json syntax checker, json parser, json lint')

@section('canonical', url('/calculators/json-formatter'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "JSON Formatter & Validator",
    "description": "Format, validate, and beautify JSON data with syntax checking",
    "url": "{{ url('/calculators/json-formatter') }}",
    "operatingSystem": "Any",
    "applicationCategory": "DeveloperApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

<div class="min-h-screen bg-indigo-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#developer" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Developer Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">JSON Formatter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">JSON Formatter & Validator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Beautify, validate, and fix JSON syntax with real-time error checking. Essential tool for developers working with APIs and JSON data.
                </p>
            </div>

            <!-- Main Tool Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">JSON Input</h2>
                        <p class="text-gray-600 mb-6">Paste your JSON data to format and validate</p>
                        
                        <form id="jsonFormatterForm" class="space-y-6">
                            <!-- JSON Input Area -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">JSON Data</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="jsonInput" class="block text-xs font-medium text-green-700 mb-2">
                                            Input JSON
                                        </label>
                                        <textarea 
                                            id="jsonInput" 
                                            class="w-full h-64 px-4 py-3 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 font-mono text-sm resize-none"
                                            placeholder='Paste your JSON here... Example: {"name": "John", "age": 30, "city": "New York"}'
                                            spellcheck="false"
                                        >{"name": "John", "age": 30, "city": "New York", "hobbies": ["reading", "swimming"], "address": {"street": "123 Main St", "zip": "10001"}}</textarea>
                                    </div>
                                    <div class="flex flex-wrap gap-2">
                                        <button type="button" onclick="formatJSON()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                            <i class="fas fa-code mr-1"></i>Format JSON
                                        </button>
                                        <button type="button" onclick="minifyJSON()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                            <i class="fas fa-compress-alt mr-1"></i>Minify JSON
                                        </button>
                                        <button type="button" onclick="validateJSON()" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                            <i class="fas fa-check-circle mr-1"></i>Validate JSON
                                        </button>
                                        <button type="button" onclick="clearJSON()" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                            <i class="fas fa-eraser mr-1"></i>Clear
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Formatting Options -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Formatting Options</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="indentSize" class="block text-xs font-medium text-blue-700 mb-2">
                                            Indentation
                                        </label>
                                        <select id="indentSize" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            <option value="2">2 spaces</option>
                                            <option value="4" selected>4 spaces</option>
                                            <option value="8">8 spaces</option>
                                            <option value="tab">Tab</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="quoteStyle" class="block text-xs font-medium text-blue-700 mb-2">
                                            Quote Style
                                        </label>
                                        <select id="quoteStyle" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            <option value="double" selected>Double quotes</option>
                                            <option value="single">Single quotes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="sortKeys" 
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded"
                                        >
                                        <label for="sortKeys" class="ml-2 text-xs text-blue-700">
                                            Sort keys alphabetically
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="trailingCommas" 
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded"
                                        >
                                        <label for="trailingCommas" class="ml-2 text-xs text-blue-700">
                                            Allow trailing commas
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick JSON Templates -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Quick Templates</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="loadTemplate('user')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        User Object
                                    </button>
                                    <button type="button" onclick="loadTemplate('api_response')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        API Response
                                    </button>
                                    <button type="button" onclick="loadTemplate('array')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        Array Data
                                    </button>
                                    <button type="button" onclick="loadTemplate('nested')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm">
                                        Nested Objects
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
                                            id="autoValidate" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="autoValidate" class="ml-2 text-xs text-amber-700">
                                            Auto-validate on input
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="lineNumbers" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="lineNumbers" class="ml-2 text-xs text-amber-700">
                                            Show line numbers
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="processJSON()"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                                >
                                    <i class="fas fa-magic mr-2"></i>
                                    Process JSON
                                </button>
                                <button 
                                    type="button" 
                                    onclick="copyToClipboard()"
                                    class="w-full bg-gray-600 hover:bg-gray-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                >
                                    <i class="fas fa-copy mr-2"></i>
                                    Copy to Clipboard
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Validation Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-code text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter JSON data</p>
                                <p class="text-sm">to see validation results</p>
                            </div>
                        </div>

                        <!-- JSON Statistics -->
                        <div id="statisticsSection" class="mt-6 p-4 bg-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">JSON Statistics</h4>
                            <div class="space-y-2 text-sm" id="jsonStats">
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div class="mt-6 p-4 bg-green-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">JSON Syntax Rules</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Use double quotes for strings</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">No trailing commas (unless allowed)</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Keys must be strings</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-600">Valid data types: string, number, object, array, boolean, null</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formatted Output Section -->
            <div id="outputSection" class="hidden">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Formatted JSON Output</h2>
                        <div class="flex space-x-2">
                            <button onclick="copyOutput()" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                <i class="fas fa-copy mr-1"></i>Copy Output
                            </button>
                            <button onclick="downloadJSON()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                <i class="fas fa-download mr-1"></i>Download
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-gray-900 rounded-lg p-4">
                        <pre id="jsonOutput" class="text-green-400 text-sm overflow-auto max-h-96 font-mono"></pre>
                    </div>
                </div>

                <!-- JSON Analysis -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">JSON Analysis</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="analysisCards">
                    </div>
                </div>

                <!-- Data Structure Visualization -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Data Structure</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Tree View -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tree Structure</h3>
                            <div class="bg-gray-50 rounded-lg p-4 max-h-96 overflow-auto" id="treeView">
                            </div>
                        </div>
                        
                        <!-- Type Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Type Breakdown</h3>
                            <div class="space-y-4" id="typeBreakdown">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JSON Tools -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">JSON Utilities</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Conversion Tools -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Conversion Tools</h3>
                            <div class="space-y-3" id="conversionTools">
                                <button onclick="jsonToYaml()" class="w-full text-left p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="font-medium text-gray-800">Convert to YAML</div>
                                            <div class="text-sm text-gray-600">Transform JSON to YAML format</div>
                                        </div>
                                        <i class="fas fa-arrow-right text-blue-500"></i>
                                    </div>
                                </button>
                                <button onclick="jsonToXml()" class="w-full text-left p-3 bg-green-50 hover:bg-green-100 rounded-lg transition duration-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="font-medium text-gray-800">Convert to XML</div>
                                            <div class="text-sm text-gray-600">Transform JSON to XML format</div>
                                        </div>
                                        <i class="fas fa-arrow-right text-green-500"></i>
                                    </div>
                                </button>
                                <button onclick="escapeJSON()" class="w-full text-left p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition duration-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="font-medium text-gray-800">Escape JSON</div>
                                            <div class="text-sm text-gray-600">Escape special characters</div>
                                        </div>
                                        <i class="fas fa-shield-alt text-purple-500"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Developer Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">JSON Best Practices</h3>
                            <div class="space-y-3" id="developerTips">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Use consistent formatting</p>
                                        <p class="text-sm text-gray-600">Maintain consistent indentation and key naming conventions.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Validate early</p>
                                        <p class="text-sm text-gray-600">Always validate JSON before processing to catch errors early.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Handle errors gracefully</p>
                                        <p class="text-sm text-gray-600">Implement proper error handling for malformed JSON.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Developer Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">JSON Developer Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-sitemap text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Data Structure</h3>
                        <p class="text-gray-600">JSON uses key-value pairs and supports nested objects and arrays, making it ideal for hierarchical data.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exchange-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">API Integration</h3>
                        <p class="text-gray-600">JSON is the standard format for REST APIs, enabling seamless data exchange between applications.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-database text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">NoSQL Databases</h3>
                        <p class="text-gray-600">Many modern databases like MongoDB use JSON-like documents for flexible data storage.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mobile-alt text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Mobile & Web Apps</h3>
                        <p class="text-gray-600">JSON is lightweight and easy to parse, making it perfect for mobile and web applications.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">JSON FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What are the most common JSON syntax errors?</h3>
                        <p class="text-gray-600">Common errors include missing quotes around keys, trailing commas, unescaped special characters, mismatched brackets, and using single quotes instead of double quotes. Always validate your JSON before using it in production.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between JSON and JavaScript objects?</h3>
                        <p class="text-gray-600">JSON is a data format that must use double quotes, cannot contain functions or undefined values, and has stricter syntax rules. JavaScript objects are more flexible but not necessarily valid JSON.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I handle large JSON files?</h3>
                        <p class="text-gray-600">For large JSON files, consider streaming parsers, chunked processing, or using specialized libraries. Always validate structure before processing and implement proper error handling for memory management.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I use JSON vs other data formats?</h3>
                        <p class="text-gray-600">Use JSON for APIs, configuration files, and web applications. Consider XML for document-centric data, YAML for configuration files, and Protocol Buffers for high-performance applications.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What are JSON Schema and JSON-LD?</h3>
                        <p class="text-gray-600">JSON Schema defines the structure and validation rules for JSON data. JSON-LD (JSON for Linking Data) is used for semantic web applications and adding context to JSON data.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Tools</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('base64.converter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-exchange-alt text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Base64 Converter</h3>
                        <p class="text-gray-600 text-sm">Encode/decode Base64</p>
                    </a>
                    {{-- <a href="{{ route('url.encoder') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-link text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">URL Encoder</h3>
                        <p class="text-gray-600 text-sm">Encode/decode URLs</p>
                    </a>
                    <a href="{{ route('html.formatter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-code text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">HTML Formatter</h3>
                        <p class="text-gray-600 text-sm">Beautify HTML code</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// JSON templates
const jsonTemplates = {
    'user': `{
    "id": 12345,
    "username": "johndoe",
    "email": "john.doe@example.com",
    "profile": {
        "firstName": "John",
        "lastName": "Doe",
        "age": 30
    },
    "isActive": true,
    "roles": ["user", "admin"],
    "createdAt": "2023-01-15T10:30:00Z"
}`,

    'api_response': `{
    "status": "success",
    "code": 200,
    "message": "Data retrieved successfully",
    "data": {
        "users": [
            {
                "id": 1,
                "name": "Alice Smith",
                "email": "alice@example.com"
            },
            {
                "id": 2,
                "name": "Bob Johnson",
                "email": "bob@example.com"
            }
        ],
        "pagination": {
            "page": 1,
            "limit": 10,
            "total": 2
        }
    },
    "timestamp": "2023-12-01T15:45:30Z"
}`,

    'array': `[
    {
        "product": "Laptop",
        "brand": "Dell",
        "price": 999.99,
        "specs": {
            "ram": "16GB",
            "storage": "512GB SSD"
        },
        "inStock": true
    },
    {
        "product": "Mouse",
        "brand": "Logitech",
        "price": 29.99,
        "specs": {
            "type": "Wireless",
            "dpi": 1600
        },
        "inStock": false
    }
]`,

    'nested': `{
    "company": "Tech Corp",
    "departments": {
        "engineering": {
            "manager": "Sarah Chen",
            "employees": [
                {
                    "name": "Mike Brown",
                    "position": "Senior Developer",
                    "skills": ["JavaScript", "Python", "AWS"]
                },
                {
                    "name": "Lisa Wang",
                    "position": "Frontend Developer",
                    "skills": ["React", "TypeScript", "CSS"]
                }
            ]
        },
        "marketing": {
            "manager": "David Kim",
            "employees": [
                {
                    "name": "Emma Davis",
                    "position": "Content Strategist",
                    "skills": ["SEO", "Copywriting", "Analytics"]
                }
            ]
        }
    }
}`
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    validateJSON(); // Validate initial JSON
});

function setupEventListeners() {
    // Auto-validate if enabled
    document.getElementById('jsonInput').addEventListener('input', function() {
        if (document.getElementById('autoValidate').checked) {
            validateJSON();
        }
    });
    
    // Update formatting options
    document.getElementById('indentSize').addEventListener('change', validateJSON);
    document.getElementById('quoteStyle').addEventListener('change', validateJSON);
    document.getElementById('sortKeys').addEventListener('change', validateJSON);
    document.getElementById('trailingCommas').addEventListener('change', validateJSON);
}

function loadTemplate(templateName) {
    const template = jsonTemplates[templateName];
    if (template) {
        document.getElementById('jsonInput').value = template;
        validateJSON();
    }
}

function clearJSON() {
    document.getElementById('jsonInput').value = '';
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-code text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter JSON data</p>
            <p class="text-sm">to see validation results</p>
        </div>
    `;
    document.getElementById('statisticsSection').classList.add('hidden');
    document.getElementById('outputSection').classList.add('hidden');
}

function formatJSON() {
    const input = document.getElementById('jsonInput').value.trim();
    if (!input) {
        showError('Please enter JSON data to format');
        return;
    }
    
    try {
        const parsed = JSON.parse(input);
        const indent = document.getElementById('indentSize').value === 'tab' ? '\t' : 
                      parseInt(document.getElementById('indentSize').value);
        
        let formatted = JSON.stringify(parsed, null, indent);
        
        // Apply quote style if needed
        if (document.getElementById('quoteStyle').value === 'single') {
            formatted = formatted.replace(/"/g, "'");
        }
        
        // Sort keys if enabled
        if (document.getElementById('sortKeys').checked) {
            formatted = JSON.stringify(parsed, Object.keys(parsed).sort(), indent);
            if (document.getElementById('quoteStyle').value === 'single') {
                formatted = formatted.replace(/"/g, "'");
            }
        }
        
        displayFormattedOutput(formatted, 'Formatted JSON');
        showSuccess('JSON formatted successfully!');
        
    } catch (error) {
        showError('Invalid JSON: ' + error.message);
    }
}

function minifyJSON() {
    const input = document.getElementById('jsonInput').value.trim();
    if (!input) {
        showError('Please enter JSON data to minify');
        return;
    }
    
    try {
        const parsed = JSON.parse(input);
        const minified = JSON.stringify(parsed);
        displayFormattedOutput(minified, 'Minified JSON');
        showSuccess('JSON minified successfully!');
        
    } catch (error) {
        showError('Invalid JSON: ' + error.message);
    }
}

function validateJSON() {
    const input = document.getElementById('jsonInput').value.trim();
    const resultsDiv = document.getElementById('results');
    const statsSection = document.getElementById('statisticsSection');
    
    if (!input) {
        resultsDiv.innerHTML = `
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-code text-5xl mb-4"></i>
                <p class="text-lg font-medium">Enter JSON data</p>
                <p class="text-sm">to see validation results</p>
            </div>
        `;
        statsSection.classList.add('hidden');
        return;
    }
    
    try {
        const parsed = JSON.parse(input);
        const stats = analyzeJSON(parsed);
        
        resultsDiv.innerHTML = `
            <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
                <i class="fas fa-check-circle text-green-500 text-3xl mb-2"></i>
                <div class="text-lg font-semibold text-green-700 mb-1">Valid JSON</div>
                <div class="text-sm text-green-600">Syntax is correct and well-formed</div>
            </div>
        `;
        
        displayStatistics(stats);
        statsSection.classList.remove('hidden');
        
    } catch (error) {
        const errorMessage = extractErrorMessage(error, input);
        resultsDiv.innerHTML = `
            <div class="text-center p-4 bg-red-50 rounded-lg border border-red-200">
                <i class="fas fa-exclamation-triangle text-red-500 text-3xl mb-2"></i>
                <div class="text-lg font-semibold text-red-700 mb-1">Invalid JSON</div>
                <div class="text-sm text-red-600 font-mono">${errorMessage}</div>
            </div>
        `;
        statsSection.classList.add('hidden');
    }
}

function extractErrorMessage(error, input) {
    let message = error.message;
    
    // Try to extract line and column information
    const lineMatch = message.match(/position\s+(\d+)/);
    if (lineMatch) {
        const position = parseInt(lineMatch[1]);
        const lines = input.substring(0, position).split('\n');
        const lineNumber = lines.length;
        const columnNumber = lines[lines.length - 1].length + 1;
        
        message += ` (Line ${lineNumber}, Column ${columnNumber})`;
    }
    
    return message;
}

function analyzeJSON(json) {
    const stats = {
        totalKeys: 0,
        totalValues: 0,
        depth: 0,
        types: {
            string: 0,
            number: 0,
            boolean: 0,
            object: 0,
            array: 0,
            null: 0
        }
    };
    
    function traverse(obj, currentDepth = 0) {
        stats.depth = Math.max(stats.depth, currentDepth);
        
        if (Array.isArray(obj)) {
            stats.types.array++;
            stats.totalValues += obj.length;
            obj.forEach(item => {
                if (typeof item === 'object' && item !== null) {
                    traverse(item, currentDepth + 1);
                }
            });
        } else if (typeof obj === 'object' && obj !== null) {
            stats.types.object++;
            stats.totalKeys += Object.keys(obj).length;
            stats.totalValues += Object.keys(obj).length;
            
            Object.values(obj).forEach(value => {
                const type = typeof value;
                if (type === 'object' && value !== null) {
                    traverse(value, currentDepth + 1);
                } else {
                    stats.types[type] = (stats.types[type] || 0) + 1;
                }
            });
        }
    }
    
    traverse(json);
    return stats;
}

function displayStatistics(stats) {
    const statsDiv = document.getElementById('jsonStats');
    
    statsDiv.innerHTML = `
        <div class="flex justify-between">
            <span class="text-gray-600">Total Keys:</span>
            <span class="font-medium text-gray-800">${stats.totalKeys}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Total Values:</span>
            <span class="font-medium text-gray-800">${stats.totalValues}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Max Depth:</span>
            <span class="font-medium text-gray-800">${stats.depth}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Objects:</span>
            <span class="font-medium text-gray-800">${stats.types.object}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Arrays:</span>
            <span class="font-medium text-gray-800">${stats.types.array}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Strings:</span>
            <span class="font-medium text-gray-800">${stats.types.string}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Numbers:</span>
            <span class="font-medium text-gray-800">${stats.types.number}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Booleans:</span>
            <span class="font-medium text-gray-800">${stats.types.boolean}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Nulls:</span>
            <span class="font-medium text-gray-800">${stats.types.null || 0}</span>
        </div>
    `;
}

function displayFormattedOutput(formattedJSON, title = 'JSON Output') {
    const outputSection = document.getElementById('outputSection');
    const jsonOutput = document.getElementById('jsonOutput');
    
    // Apply syntax highlighting
    const highlighted = syntaxHighlight(formattedJSON);
    jsonOutput.innerHTML = highlighted;
    
    outputSection.classList.remove('hidden');
    
    // Update analysis
    updateJSONAnalysis(formattedJSON);
    updateTreeView(formattedJSON);
    updateTypeBreakdown(formattedJSON);
    
    // Scroll to output section
    outputSection.scrollIntoView({ behavior: 'smooth' });
}

function syntaxHighlight(json) {
    if (typeof json !== 'string') {
        json = JSON.stringify(json, null, 2);
    }
    
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        let cls = 'text-green-400'; // default for strings
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'text-yellow-300'; // keys
            } else {
                cls = 'text-green-400'; // string values
            }
        } else if (/true|false/.test(match)) {
            cls = 'text-purple-400'; // booleans
        } else if (/null/.test(match)) {
            cls = 'text-blue-400'; // null
        } else if (!isNaN(parseFloat(match))) {
            cls = 'text-orange-400'; // numbers
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}

function updateJSONAnalysis(json) {
    const analysisDiv = document.getElementById('analysisCards');
    const parsed = JSON.parse(json);
    const stats = analyzeJSON(parsed);
    const jsonSize = new Blob([json]).size;
    
    analysisDiv.innerHTML = `
        <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
            <div class="text-2xl font-bold text-green-600 mb-2">${stats.totalKeys}</div>
            <div class="text-lg font-semibold text-gray-700">Total Keys</div>
            <div class="text-sm text-gray-500 mt-1">Properties in JSON</div>
        </div>
        
        <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2">${stats.depth}</div>
            <div class="text-lg font-semibold text-gray-700">Max Depth</div>
            <div class="text-sm text-gray-500 mt-1">Nesting levels</div>
        </div>
        
        <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
            <div class="text-2xl font-bold text-purple-600 mb-2">${jsonSize}</div>
            <div class="text-lg font-semibold text-gray-700">Size (bytes)</div>
            <div class="text-sm text-gray-500 mt-1">Raw JSON size</div>
        </div>
        
        <div class="text-center p-4 bg-amber-50 rounded-lg border border-amber-200">
            <div class="text-2xl font-bold text-amber-600 mb-2">${Object.keys(stats.types).filter(k => stats.types[k] > 0).length}</div>
            <div class="text-lg font-semibold text-gray-700">Data Types</div>
            <div class="text-sm text-gray-500 mt-1">Unique types used</div>
        </div>
    `;
}

function updateTreeView(json) {
    const treeDiv = document.getElementById('treeView');
    const parsed = JSON.parse(json);
    
    function buildTree(obj, level = 0) {
        let html = '';
        const indent = '  '.repeat(level);
        
        if (Array.isArray(obj)) {
            html += `${indent}<div class="text-blue-400">[</div>`;
            obj.forEach((item, index) => {
                html += `${indent}  <div class="flex items-start">`;
                html += `<span class="text-gray-500 mr-2">${index}:</span>`;
                if (typeof item === 'object' && item !== null) {
                    html += buildTree(item, level + 1);
                } else {
                    html += `<span class="text-green-400">${JSON.stringify(item)}</span>`;
                }
                html += `</div>`;
            });
            html += `${indent}<div class="text-blue-400">]</div>`;
        } else if (typeof obj === 'object' && obj !== null) {
            html += `${indent}<div class="text-yellow-300">{</div>`;
            Object.entries(obj).forEach(([key, value]) => {
                html += `${indent}  <div class="flex items-start">`;
                html += `<span class="text-yellow-300 mr-2">"${key}"</span><span class="text-gray-500 mr-2">:</span>`;
                if (typeof value === 'object' && value !== null) {
                    html += buildTree(value, level + 1);
                } else {
                    const valueColor = typeof value === 'string' ? 'text-green-400' : 
                                     typeof value === 'number' ? 'text-orange-400' :
                                     typeof value === 'boolean' ? 'text-purple-400' : 'text-blue-400';
                    html += `<span class="${valueColor}">${JSON.stringify(value)}</span>`;
                }
                html += `</div>`;
            });
            html += `${indent}<div class="text-yellow-300">}</div>`;
        }
        
        return html;
    }
    
    treeDiv.innerHTML = buildTree(parsed);
}

function updateTypeBreakdown(json) {
    const breakdownDiv = document.getElementById('typeBreakdown');
    const parsed = JSON.parse(json);
    const stats = analyzeJSON(parsed);
    const total = stats.totalValues;
    
    const typeColors = {
        string: 'bg-green-500',
        number: 'bg-orange-500',
        boolean: 'bg-purple-500',
        object: 'bg-yellow-500',
        array: 'bg-blue-500',
        null: 'bg-gray-500'
    };
    
    let breakdownHtml = '';
    Object.entries(stats.types).forEach(([type, count]) => {
        if (count > 0) {
            const percentage = total > 0 ? (count / total * 100).toFixed(1) : 0;
            breakdownHtml += `
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 capitalize">${type}</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-16 bg-gray-200 rounded-full h-2">
                            <div class="${typeColors[type]} h-2 rounded-full" style="width: ${percentage}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-800 w-12">${count} (${percentage}%)</span>
                    </div>
                </div>
            `;
        }
    });
    
    breakdownDiv.innerHTML = breakdownHtml;
}

function processJSON() {
    validateJSON();
    formatJSON();
}

function copyToClipboard() {
    const input = document.getElementById('jsonInput');
    input.select();
    document.execCommand('copy');
    showSuccess('JSON copied to clipboard!');
}

function copyOutput() {
    const output = document.getElementById('jsonOutput');
    const textArea = document.createElement('textarea');
    textArea.value = output.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    showSuccess('Formatted JSON copied to clipboard!');
}

function downloadJSON() {
    const output = document.getElementById('jsonOutput').textContent;
    const blob = new Blob([output], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'formatted.json';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    showSuccess('JSON file downloaded!');
}

// Utility functions for conversion tools
function jsonToYaml() {
    showInfo('YAML conversion feature would be implemented here');
}

function jsonToXml() {
    showInfo('XML conversion feature would be implemented here');
}

function escapeJSON() {
    showInfo('JSON escaping feature would be implemented here');
}

function showError(message) {
    // You could implement a toast notification system here
    alert('Error: ' + message);
}

function showSuccess(message) {
    // You could implement a toast notification system here
    alert('Success: ' + message);
}

function showInfo(message) {
    // You could implement a toast notification system here
    alert('Info: ' + message);
}
</script>
@endsection