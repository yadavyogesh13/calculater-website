@extends('layouts.app')

@section('title', 'Base64 Encoder & Decoder | Base64 Converter Tool | CalculaterTools')

@section('meta-description', 'Free Base64 encoder and decoder tool. Encode text, files, and images to Base64 format or decode Base64 back to original format instantly.')

@section('keywords', 'base64 encoder, base64 decoder, base64 converter, base64 encode, base64 decode, base64 tool')

@section('canonical', url('/calculators/base64-converter'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Base64 Encoder & Decoder",
    "description": "Encode and decode text, files, and images to/from Base64 format",
    "url": "{{ url('/calculators/base64-converter') }}",
    "operatingSystem": "Any",
    "applicationCategory": "UtilityApplication",
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
                    <li class="text-gray-500">Base64 Converter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Base64 Encoder & Decoder</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Encode text, files, and images to Base64 format or decode Base64 strings back to their original format. Essential for web development and data transmission.
                </p>
            </div>

            <!-- Main Tool Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Base64 Converter</h2>
                        <p class="text-gray-600 mb-6">Encode or decode your data to/from Base64 format</p>
                        
                        <form id="base64ConverterForm" class="space-y-6">
                            <!-- Operation Type -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Operation</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" onclick="setOperation('encode')" class="operation-btn py-3 px-4 border-2 border-green-500 bg-green-50 text-green-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-lock mr-2"></i>
                                        Encode to Base64
                                    </button>
                                    <button type="button" onclick="setOperation('decode')" class="operation-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-lock-open mr-2"></i>
                                        Decode from Base64
                                    </button>
                                </div>
                            </div>

                            <!-- Input Area -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3" id="inputLabel">Text to Encode</h3>
                                <div class="space-y-4">
                                    <div>
                                        <textarea 
                                            id="inputText" 
                                            class="w-full h-48 px-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 font-mono text-sm resize-none"
                                            placeholder='Enter text to encode to Base64... Example: "Hello, World!"'
                                            spellcheck="false"
                                        >Hello, World! This is a test message for Base64 encoding.</textarea>
                                    </div>
                                    
                                    <!-- File Upload -->
                                    <div id="fileUploadSection">
                                        <label class="block text-xs font-medium text-blue-700 mb-2">
                                            Or upload a file
                                        </label>
                                        <div class="flex items-center space-x-4">
                                            <input 
                                                type="file" 
                                                id="fileInput" 
                                                class="hidden"
                                                accept="*/*"
                                            >
                                            <button 
                                                type="button" 
                                                onclick="document.getElementById('fileInput').click()"
                                                class="px-4 py-2 bg-white border border-blue-300 rounded-lg hover:border-blue-500 transition duration-200 text-sm"
                                            >
                                                <i class="fas fa-upload mr-1"></i>Choose File
                                            </button>
                                            <span id="fileName" class="text-sm text-gray-500">No file chosen</span>
                                        </div>
                                        <div class="mt-2 text-xs text-blue-600">
                                            Supports images, documents, and other file types (max 10MB)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Encoding Options -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Encoding Options</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="charset" class="block text-xs font-medium text-purple-700 mb-2">
                                            Character Set
                                        </label>
                                        <select id="charset" class="w-full px-3 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                                            <option value="utf-8" selected>UTF-8</option>
                                            <option value="ascii">ASCII</option>
                                            <option value="latin1">Latin-1</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="lineBreaks" class="block text-xs font-medium text-purple-700 mb-2">
                                            Line Breaks
                                        </label>
                                        <select id="lineBreaks" class="w-full px-3 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                                            <option value="none" selected>No line breaks</option>
                                            <option value="76">76 characters</option>
                                            <option value="64">64 characters</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="urlSafe" 
                                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-purple-300 rounded"
                                        >
                                        <label for="urlSafe" class="ml-2 text-xs text-purple-700">
                                            URL-safe encoding (replace +/ with -_)
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="validateInput" 
                                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-purple-300 rounded"
                                            checked
                                        >
                                        <label for="validateInput" class="ml-2 text-xs text-purple-700">
                                            Validate input before processing
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Examples -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Quick Examples</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    <button type="button" onclick="loadExample('simple_text')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Simple Text</div>
                                        <div class="text-xs text-gray-500">"Hello World"</div>
                                    </button>
                                    <button type="button" onclick="loadExample('json_data')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">JSON Data</div>
                                        <div class="text-xs text-gray-500">Sample JSON object</div>
                                    </button>
                                    <button type="button" onclick="loadExample('special_chars')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Special Chars</div>
                                        <div class="text-xs text-gray-500">Unicode & symbols</div>
                                    </button>
                                    <button type="button" onclick="loadExample('base64_string')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Base64 String</div>
                                        <div class="text-xs text-gray-500">For decoding</div>
                                    </button>
                                    <button type="button" onclick="loadExample('image_data')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Image Data URL</div>
                                        <div class="text-xs text-gray-500">Base64 image</div>
                                    </button>
                                    <button type="button" onclick="loadExample('binary_data')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Binary Data</div>
                                        <div class="text-xs text-gray-500">Sample binary</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="processBase64()"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                                >
                                    <i class="fas fa-cogs mr-2"></i>
                                    Process Base64
                                </button>
                                <button 
                                    type="button" 
                                    onclick="clearAll()"
                                    class="w-full bg-gray-600 hover:bg-gray-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                >
                                    <i class="fas fa-eraser mr-2"></i>
                                    Clear All
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Conversion Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-exchange-alt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter data to convert</p>
                                <p class="text-sm">to see Base64 results</p>
                            </div>
                        </div>

                        <!-- Statistics -->
                        <div id="statisticsSection" class="mt-6 p-4 bg-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Conversion Statistics</h4>
                            <div class="space-y-2 text-sm" id="conversionStats">
                            </div>
                        </div>

                        <!-- Base64 Reference -->
                        <div class="mt-6 p-4 bg-green-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Base64 Characters</h4>
                            <div class="text-xs text-gray-600 space-y-1">
                                <div>Uppercase: A-Z (26 chars)</div>
                                <div>Lowercase: a-z (26 chars)</div>
                                <div>Numbers: 0-9 (10 chars)</div>
                                <div>Symbols: +, / (2 chars)</div>
                                <div class="mt-2 font-medium">Padding: = (1-2 chars)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Output Section -->
            <div id="outputSection" class="hidden">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900" id="outputTitle">Base64 Output</h2>
                        <div class="flex space-x-2">
                            <button onclick="copyOutput()" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                <i class="fas fa-copy mr-1"></i>Copy Output
                            </button>
                            <button onclick="downloadOutput()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition duration-200 text-sm">
                                <i class="fas fa-download mr-1"></i>Download
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-gray-900 rounded-lg p-4">
                        <pre id="base64Output" class="text-green-400 text-sm overflow-auto max-h-96 font-mono whitespace-pre-wrap break-words"></pre>
                    </div>

                    <!-- Preview Section -->
                    <div id="previewSection" class="mt-6 hidden">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Preview</h3>
                        <div class="bg-gray-50 rounded-lg p-4" id="previewContent">
                        </div>
                    </div>
                </div>

                <!-- Analysis Section -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Base64 Analysis</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="analysisCards">
                    </div>
                </div>

                <!-- Technical Details -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Technical Details</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Encoding Process -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Encoding Process</h3>
                            <div class="space-y-4" id="encodingProcess">
                            </div>
                        </div>
                        
                        <!-- Data Information -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Data Information</h3>
                            <div class="space-y-4" id="dataInformation">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Use Cases -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Common Use Cases</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Encoding Uses -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Base64 Encoding Uses</h3>
                            <div class="space-y-3" id="encodingUses">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-image text-blue-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Data URIs</p>
                                        <p class="text-sm text-gray-600">Embed images and files directly in HTML/CSS</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-file-alt text-green-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Email Attachments</p>
                                        <p class="text-sm text-gray-600">Encode binary files for email transmission</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-database text-purple-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">API Data</p>
                                        <p class="text-sm text-gray-600">Send binary data in JSON APIs</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-lock text-amber-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Basic Authentication</p>
                                        <p class="text-sm text-gray-600">Encode credentials for HTTP auth headers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Best Practices -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Best Practices</h3>
                            <div class="space-y-3" id="bestPractices">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-exclamation-triangle text-red-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Not Encryption</p>
                                        <p class="text-sm text-gray-600">Base64 is encoding, not encryption. Don't use for sensitive data.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-chart-line text-green-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Size Increase</p>
                                        <p class="text-sm text-gray-600">Base64 increases data size by ~33%. Consider compression.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-check-circle text-blue-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">URL Safety</p>
                                        <p class="text-sm text-gray-600">Use URL-safe encoding for web applications.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-microchip text-purple-500 mt-1"></i>
                                    <div>
                                        <p class="font-medium text-gray-800">Performance</p>
                                        <p class="text-sm text-gray-600">Consider binary alternatives for large files.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Base64 Technical Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-binary text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Binary to Text</h3>
                        <p class="text-gray-600">Base64 converts binary data to ASCII text, making it safe for text-based protocols like JSON, XML, and email.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-expand-arrows-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">33% Size Increase</h3>
                        <p class="text-gray-600">Base64 encoding increases data size by approximately 33% due to 6 bits representing 8 bits of binary data.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-puzzle-piece text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Padding Characters</h3>
                        <p class="text-gray-600">Base64 uses = padding characters to ensure the final encoded string length is a multiple of 4.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Web Standards</h3>
                        <p class="text-gray-600">Widely used in web development for Data URIs, authentication, and transmitting binary data over HTTP.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Base64 FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is Base64 encoding used for?</h3>
                        <p class="text-gray-600">Base64 is commonly used to encode binary data for transmission over text-based protocols. This includes email attachments, data URIs in web pages, storing complex data in JSON, and basic authentication headers.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why does Base64 increase data size?</h3>
                        <p class="text-gray-600">Base64 represents 6 bits of binary data with each character (64 possible characters). Since 6 bits is 3/4 of a byte, the encoded data is approximately 33% larger than the original binary data.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is Base64 secure for sensitive data?</h3>
                        <p class="text-gray-600">No, Base64 is encoding, not encryption. It provides no security or confidentiality. Base64-encoded data can be easily decoded by anyone. Always use proper encryption for sensitive information.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What are the padding characters (=) for?</h3>
                        <p class="text-gray-600">Padding characters ensure that the Base64 string length is a multiple of 4. They indicate how many padding bytes were added during encoding and help decoders determine the original data length.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between standard and URL-safe Base64?</h3>
                        <p class="text-gray-600">URL-safe Base64 replaces the + and / characters with - and _ respectively, making the encoded string safe to use in URLs and filenames without requiring URL encoding.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Tools</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="{{ route('url.encoder') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-link text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">URL Encoder</h3>
                        <p class="text-gray-600 text-sm">Encode/decode URLs</p>
                    </a>
                    <a href="{{ route('html.encoder') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-code text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">HTML Encoder</h3>
                        <p class="text-gray-600 text-sm">Encode/decode HTML</p>
                    </a> --}}
                    <a href="{{ route('json.formatter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-brackets-curly text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">JSON Formatter</h3>
                        <p class="text-gray-600 text-sm">Format & validate JSON</p>
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
let currentOperation = 'encode';
let currentFile = null;

// Example data
const examples = {
    'simple_text': {
        input: 'Hello, World!',
        operation: 'encode'
    },
    'json_data': {
        input: '{"name": "John", "age": 30, "city": "New York"}',
        operation: 'encode'
    },
    'special_chars': {
        input: 'Text with émojis 🚀 and symbols ©®™',
        operation: 'encode'
    },
    'base64_string': {
        input: 'SGVsbG8sIFdvcmxkIQ==',
        operation: 'decode'
    },
    'image_data': {
        input: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCI+PHJlY3Qgd2lkdGg9IjEwMCIgaGVpZ2h0PSIxMDAiIGZpbGw9IiMzYzIxNjYiLz48L3N2Zz4=',
        operation: 'decode'
    },
    'binary_data': {
        input: '0100100001100101011011000110110001101111',
        operation: 'encode'
    }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
});

function setupEventListeners() {
    // File input change handler
    document.getElementById('fileInput').addEventListener('change', handleFileSelect);
    
    // Auto-process if enabled
    document.getElementById('inputText').addEventListener('input', function() {
        if (document.getElementById('validateInput').checked) {
            validateInput();
        }
    });
}

function setOperation(operation) {
    currentOperation = operation;
    
    // Update button styles
    document.querySelectorAll('.operation-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'text-green-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-green-500', 'bg-green-50', 'text-green-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Update labels
    const inputLabel = document.getElementById('inputLabel');
    const outputTitle = document.getElementById('outputTitle');
    
    if (operation === 'encode') {
        inputLabel.textContent = 'Text to Encode';
        outputTitle.textContent = 'Base64 Output';
        document.getElementById('inputText').placeholder = 'Enter text to encode to Base64...';
    } else {
        inputLabel.textContent = 'Base64 to Decode';
        outputTitle.textContent = 'Decoded Output';
        document.getElementById('inputText').placeholder = 'Enter Base64 string to decode...';
    }
    
    validateInput();
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) return;
    
    // Check file size (10MB limit)
    if (file.size > 10 * 1024 * 1024) {
        showError('File size exceeds 10MB limit');
        document.getElementById('fileInput').value = '';
        document.getElementById('fileName').textContent = 'No file chosen';
        return;
    }
    
    currentFile = file;
    document.getElementById('fileName').textContent = file.name;
    
    // Read file and set as input
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('inputText').value = e.target.result;
        validateInput();
    };
    reader.readAsDataURL(file);
}

function loadExample(exampleName) {
    const example = examples[exampleName];
    if (example) {
        document.getElementById('inputText').value = example.input;
        setOperation(example.operation);
        validateInput();
    }
}

function clearAll() {
    document.getElementById('inputText').value = '';
    document.getElementById('fileInput').value = '';
    document.getElementById('fileName').textContent = 'No file chosen';
    currentFile = null;
    
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-exchange-alt text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter data to convert</p>
            <p class="text-sm">to see Base64 results</p>
        </div>
    `;
    document.getElementById('statisticsSection').classList.add('hidden');
    document.getElementById('outputSection').classList.add('hidden');
    document.getElementById('previewSection').classList.add('hidden');
}

function validateInput() {
    const input = document.getElementById('inputText').value.trim();
    const resultsDiv = document.getElementById('results');
    const statsSection = document.getElementById('statisticsSection');
    
    if (!input) {
        resultsDiv.innerHTML = `
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-exchange-alt text-5xl mb-4"></i>
                <p class="text-lg font-medium">Enter data to convert</p>
                <p class="text-sm">to see Base64 results</p>
            </div>
        `;
        statsSection.classList.add('hidden');
        return false;
    }
    
    if (currentOperation === 'decode') {
        // Validate Base64 string
        if (!isValidBase64(input)) {
            resultsDiv.innerHTML = `
                <div class="text-center p-4 bg-red-50 rounded-lg border border-red-200">
                    <i class="fas fa-exclamation-triangle text-red-500 text-3xl mb-2"></i>
                    <div class="text-lg font-semibold text-red-700 mb-1">Invalid Base64</div>
                    <div class="text-sm text-red-600">Input is not a valid Base64 string</div>
                </div>
            `;
            statsSection.classList.add('hidden');
            return false;
        }
    }
    
    resultsDiv.innerHTML = `
        <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
            <i class="fas fa-check-circle text-green-500 text-3xl mb-2"></i>
            <div class="text-lg font-semibold text-green-700 mb-1">Valid Input</div>
            <div class="text-sm text-green-600">Ready for ${currentOperation === 'encode' ? 'encoding' : 'decoding'}</div>
        </div>
    `;
    
    return true;
}

function isValidBase64(str) {
    try {
        // Remove data URL prefix if present
        const base64Str = str.replace(/^data:[^;]+;base64,/, '');
        
        // Check if it's a valid Base64 string
        return btoa(atob(base64Str)) === base64Str;
    } catch (e) {
        return false;
    }
}

function processBase64() {
    if (!validateInput()) {
        return;
    }
    
    const input = document.getElementById('inputText').value.trim();
    const urlSafe = document.getElementById('urlSafe').checked;
    const lineBreaks = document.getElementById('lineBreaks').value;
    
    try {
        let output, stats;
        
        if (currentOperation === 'encode') {
            const result = encodeBase64(input, urlSafe, lineBreaks);
            output = result.output;
            stats = result.stats;
        } else {
            const result = decodeBase64(input);
            output = result.output;
            stats = result.stats;
        }
        
        displayOutput(output, stats);
        showSuccess(`${currentOperation === 'encode' ? 'Encoded' : 'Decoded'} successfully!`);
        
    } catch (error) {
        showError(`Error during ${currentOperation}: ${error.message}`);
    }
}

function encodeBase64(input, urlSafe = false, lineBreaks = 'none') {
    // Convert string to Base64
    let base64;
    
    if (input.startsWith('data:')) {
        // If it's already a data URL, extract the Base64 part
        base64 = input.split(',')[1];
    } else {
        // Regular string encoding
        base64 = btoa(unescape(encodeURIComponent(input)));
    }
    
    // Apply URL-safe encoding if requested
    if (urlSafe) {
        base64 = base64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
    }
    
    // Apply line breaks if requested
    if (lineBreaks !== 'none') {
        const chunkSize = parseInt(lineBreaks);
        base64 = base64.match(new RegExp(`.{1,${chunkSize}}`, 'g')).join('\n');
    }
    
    const stats = {
        originalSize: input.length,
        encodedSize: base64.length,
        sizeIncrease: ((base64.length - input.length) / input.length * 100).toFixed(1),
        operation: 'encode'
    };
    
    return { output: base64, stats: stats };
}

function decodeBase64(input) {
    // Remove data URL prefix if present
    let base64Str = input;
    let mimeType = 'text/plain';
    
    if (input.startsWith('data:')) {
        const matches = input.match(/^data:([^;]+);base64,/);
        if (matches) {
            mimeType = matches[1];
            base64Str = input.replace(/^data:[^;]+;base64,/, '');
        }
    }
    
    // Handle URL-safe encoding
    base64Str = base64Str.replace(/-/g, '+').replace(/_/g, '/');
    
    // Add padding if necessary
    while (base64Str.length % 4) {
        base64Str += '=';
    }
    
    let decoded;
    try {
        // Try to decode as text first
        decoded = decodeURIComponent(escape(atob(base64Str)));
    } catch (e) {
        // If it's binary data, return as is
        decoded = atob(base64Str);
    }
    
    const stats = {
        originalSize: input.length,
        decodedSize: decoded.length,
        sizeDecrease: ((input.length - decoded.length) / input.length * 100).toFixed(1),
        operation: 'decode',
        mimeType: mimeType
    };
    
    return { output: decoded, stats: stats };
}

function displayOutput(output, stats) {
    const outputSection = document.getElementById('outputSection');
    const base64Output = document.getElementById('base64Output');
    const previewSection = document.getElementById('previewSection');
    const previewContent = document.getElementById('previewContent');
    
    // Display output
    base64Output.textContent = output;
    outputSection.classList.remove('hidden');
    
    // Update statistics
    displayStatistics(stats);
    
    // Show preview if applicable
    if (currentOperation === 'decode' && stats.mimeType && stats.mimeType.startsWith('image/')) {
        previewContent.innerHTML = `
            <div class="text-center">
                <img src="data:${stats.mimeType};base64,${btoa(output)}" alt="Decoded image" class="max-w-full max-h-64 mx-auto rounded-lg">
                <div class="mt-2 text-sm text-gray-600">Image preview (${stats.mimeType})</div>
            </div>
        `;
        previewSection.classList.remove('hidden');
    } else if (currentOperation === 'decode' && output.length < 1000) {
        previewContent.innerHTML = `
            <div class="bg-white border border-gray-200 rounded p-3">
                <div class="text-sm font-mono whitespace-pre-wrap">${output}</div>
            </div>
        `;
        previewSection.classList.remove('hidden');
    } else {
        previewSection.classList.add('hidden');
    }
    
    // Update analysis
    updateAnalysis(stats);
    updateTechnicalDetails(stats);
    
    // Scroll to output section
    outputSection.scrollIntoView({ behavior: 'smooth' });
}

function displayStatistics(stats) {
    const statsDiv = document.getElementById('conversionStats');
    const statsSection = document.getElementById('statisticsSection');
    
    let statsHtml = '';
    
    if (stats.operation === 'encode') {
        statsHtml = `
            <div class="flex justify-between">
                <span class="text-gray-600">Original size:</span>
                <span class="font-medium text-gray-800">${stats.originalSize} bytes</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Encoded size:</span>
                <span class="font-medium text-gray-800">${stats.encodedSize} bytes</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Size increase:</span>
                <span class="font-medium text-red-600">+${stats.sizeIncrease}%</span>
            </div>
        `;
    } else {
        statsHtml = `
            <div class="flex justify-between">
                <span class="text-gray-600">Encoded size:</span>
                <span class="font-medium text-gray-800">${stats.originalSize} bytes</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Decoded size:</span>
                <span class="font-medium text-gray-800">${stats.decodedSize} bytes</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Size decrease:</span>
                <span class="font-medium text-green-600">-${stats.sizeDecrease}%</span>
            </div>
            ${stats.mimeType ? `
            <div class="flex justify-between">
                <span class="text-gray-600">MIME type:</span>
                <span class="font-medium text-gray-800">${stats.mimeType}</span>
            </div>
            ` : ''}
        `;
    }
    
    statsDiv.innerHTML = statsHtml;
    statsSection.classList.remove('hidden');
}

function updateAnalysis(stats) {
    const analysisDiv = document.getElementById('analysisCards');
    
    let analysisHtml = '';
    
    if (stats.operation === 'encode') {
        analysisHtml = `
            <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
                <div class="text-2xl font-bold text-green-600 mb-2">${stats.originalSize}</div>
                <div class="text-lg font-semibold text-gray-700">Input Size</div>
                <div class="text-sm text-gray-500 mt-1">Bytes</div>
            </div>
            
            <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="text-2xl font-bold text-blue-600 mb-2">${stats.encodedSize}</div>
                <div class="text-lg font-semibold text-gray-700">Output Size</div>
                <div class="text-sm text-gray-500 mt-1">Bytes</div>
            </div>
            
            <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
                <div class="text-2xl font-bold text-purple-600 mb-2">+${stats.sizeIncrease}%</div>
                <div class="text-lg font-semibold text-gray-700">Size Increase</div>
                <div class="text-sm text-gray-500 mt-1">Base64 overhead</div>
            </div>
            
            <div class="text-center p-4 bg-amber-50 rounded-lg border border-amber-200">
                <div class="text-2xl font-bold text-amber-600 mb-2">${Math.ceil(stats.encodedSize / 76)}</div>
                <div class="text-lg font-semibold text-gray-700">Lines (est.)</div>
                <div class="text-sm text-gray-500 mt-1">At 76 chars/line</div>
            </div>
        `;
    } else {
        analysisHtml = `
            <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
                <div class="text-2xl font-bold text-green-600 mb-2">${stats.originalSize}</div>
                <div class="text-lg font-semibold text-gray-700">Input Size</div>
                <div class="text-sm text-gray-500 mt-1">Base64 bytes</div>
            </div>
            
            <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="text-2xl font-bold text-blue-600 mb-2">${stats.decodedSize}</div>
                <div class="text-lg font-semibold text-gray-700">Output Size</div>
                <div class="text-sm text-gray-500 mt-1">Decoded bytes</div>
            </div>
            
            <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
                <div class="text-2xl font-bold text-purple-600 mb-2">-${stats.sizeDecrease}%</div>
                <div class="text-lg font-semibold text-gray-700">Size Decrease</div>
                <div class="text-sm text-gray-500 mt-1">Base64 overhead removed</div>
            </div>
            
            <div class="text-center p-4 bg-amber-50 rounded-lg border border-amber-200">
                <div class="text-2xl font-bold text-amber-600 mb-2">${stats.mimeType ? 'Binary' : 'Text'}</div>
                <div class="text-lg font-semibold text-gray-700">Data Type</div>
                <div class="text-sm text-gray-500 mt-1">${stats.mimeType || 'Plain text'}</div>
            </div>
        `;
    }
    
    analysisDiv.innerHTML = analysisHtml;
}

function updateTechnicalDetails(stats) {
    const processDiv = document.getElementById('encodingProcess');
    const infoDiv = document.getElementById('dataInformation');
    
    if (stats.operation === 'encode') {
        processDiv.innerHTML = `
            <div class="space-y-3 text-sm">
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">Input data split into</span>
                    <span class="font-medium text-gray-800">6-bit chunks</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">Each chunk mapped to</span>
                    <span class="font-medium text-gray-800">Base64 character</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">Padding added to reach</span>
                    <span class="font-medium text-gray-800">Multiple of 4</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-600">Character set used</span>
                    <span class="font-medium text-gray-800">A-Z, a-z, 0-9, +, /</span>
                </div>
            </div>
        `;
    } else {
        processDiv.innerHTML = `
            <div class="space-y-3 text-sm">
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">Padding characters</span>
                    <span class="font-medium text-gray-800">Removed first</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">Each character converted to</span>
                    <span class="font-medium text-gray-800">6-bit value</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">6-bit chunks combined to</span>
                    <span class="font-medium text-gray-800">8-bit bytes</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-600">Result interpreted as</span>
                    <span class="font-medium text-gray-800">${stats.mimeType || 'Text/binary data'}</span>
                </div>
            </div>
        `;
    }
    
    infoDiv.innerHTML = `
        <div class="space-y-3 text-sm">
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Efficiency</span>
                <span class="font-medium text-gray-800">${stats.operation === 'encode' ? '75%' : '133%'}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Overhead</span>
                <span class="font-medium text-gray-800">${stats.operation === 'encode' ? '+33%' : '-25%'}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Character set</span>
                <span class="font-medium text-gray-800">64 characters</span>
            </div>
            <div class="flex justify-between items-center py-2">
                <span class="text-gray-600">Common uses</span>
                <span class="font-medium text-gray-800">Data URIs, Email, APIs</span>
            </div>
        </div>
    `;
}

function copyOutput() {
    const output = document.getElementById('base64Output').textContent;
    const textArea = document.createElement('textarea');
    textArea.value = output;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
    showSuccess('Output copied to clipboard!');
}

function downloadOutput() {
    const output = document.getElementById('base64Output').textContent;
    const operation = currentOperation === 'encode' ? 'base64' : 'decoded';
    const extension = currentOperation === 'encode' ? 'txt' : 
                     (document.getElementById('previewSection').classList.contains('hidden') ? 'txt' : 'bin');
    
    const blob = new Blob([output], { 
        type: currentOperation === 'encode' ? 'text/plain' : 'application/octet-stream' 
    });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `base64_${operation}.${extension}`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    showSuccess('File downloaded!');
}

function showError(message) {
    // You could implement a toast notification system here
    alert('Error: ' + message);
}

function showSuccess(message) {
    // You could implement a toast notification system here
    alert('Success: ' + message);
}
</script>
@endsection