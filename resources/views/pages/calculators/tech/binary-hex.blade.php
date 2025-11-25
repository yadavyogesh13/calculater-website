@extends('layouts.app')

@section('title', 'Binary to Hexadecimal Converter | Digital Number Converter | CalculaterTools')

@section('meta-description', 'Free binary to hexadecimal converter tool. Convert between binary, hexadecimal, decimal, and octal number systems with instant results and step-by-step explanations.')

@section('keywords', 'binary to hex converter, hexadecimal converter, binary calculator, number system converter, digital converter, binary hexadecimal decimal')

@section('canonical', url('/calculators/binary-hex-converter'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Binary to Hexadecimal Converter",
    "description": "Convert between binary, hexadecimal, decimal, and octal number systems",
    "url": "{{ url('/calculators/binary-hex-converter') }}",
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
                        <a href="#programming" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Programming Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Binary/Hex Converter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Binary to Hexadecimal Converter</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Convert between binary, hexadecimal, decimal, and octal number systems instantly. Perfect for programmers, students, and digital electronics work.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Number System Converter</h2>
                        <p class="text-gray-600 mb-6">Enter a value and convert between different number systems</p>
                        
                        <form id="binaryHexConverterForm" class="space-y-6">
                            <!-- Input Value -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Input Value</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="inputValue" class="block text-xs font-medium text-green-700 mb-2">
                                            Enter Number
                                        </label>
                                        <input 
                                            type="text" 
                                            id="inputValue" 
                                            class="w-full px-4 py-3 text-lg border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 font-mono"
                                            placeholder="Enter binary, hex, decimal, or octal"
                                            value="10101101"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <label for="inputBase" class="block text-xs font-medium text-green-700 mb-2">
                                            Input Number System
                                        </label>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                            <button type="button" onclick="setInputBase(2)" class="base-btn py-2 px-3 border-2 border-green-500 bg-green-50 text-green-700 rounded-lg font-semibold transition duration-200 text-sm">
                                                <i class="fas fa-digital-tachograph mr-1"></i>
                                                Binary (2)
                                            </button>
                                            <button type="button" onclick="setInputBase(16)" class="base-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                                <i class="fas fa-hashtag mr-1"></i>
                                                Hex (16)
                                            </button>
                                            <button type="button" onclick="setInputBase(10)" class="base-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                                <i class="fas fa-numbers mr-1"></i>
                                                Decimal (10)
                                            </button>
                                            <button type="button" onclick="setInputBase(8)" class="base-btn py-2 px-3 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200 text-sm">
                                                <i class="fas fa-cube mr-1"></i>
                                                Octal (8)
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Conversion Options -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Conversion Options</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-medium text-blue-700 mb-2">
                                            Convert To
                                        </label>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                            <div class="flex items-center">
                                                <input 
                                                    type="checkbox" 
                                                    id="convertBinary" 
                                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded"
                                                    checked
                                                >
                                                <label for="convertBinary" class="ml-2 text-xs text-blue-700">
                                                    Binary
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input 
                                                    type="checkbox" 
                                                    id="convertHex" 
                                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded"
                                                    checked
                                                >
                                                <label for="convertHex" class="ml-2 text-xs text-blue-700">
                                                    Hexadecimal
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input 
                                                    type="checkbox" 
                                                    id="convertDecimal" 
                                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded"
                                                    checked
                                                >
                                                <label for="convertDecimal" class="ml-2 text-xs text-blue-700">
                                                    Decimal
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input 
                                                    type="checkbox" 
                                                    id="convertOctal" 
                                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-blue-300 rounded"
                                                    checked
                                                >
                                                <label for="convertOctal" class="ml-2 text-xs text-blue-700">
                                                    Octal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="bitLength" class="block text-xs font-medium text-blue-700 mb-2">
                                                Bit Length (Optional)
                                            </label>
                                            <select id="bitLength" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                                <option value="0">Auto-detect</option>
                                                <option value="4">4-bit (Nibble)</option>
                                                <option value="8" selected>8-bit (Byte)</option>
                                                <option value="16">16-bit (Word)</option>
                                                <option value="32">32-bit (Long)</option>
                                                <option value="64">64-bit</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="outputCase" class="block text-xs font-medium text-blue-700 mb-2">
                                                Hex Case
                                            </label>
                                            <select id="outputCase" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                                <option value="upper" selected>Uppercase (A-F)</option>
                                                <option value="lower">Lowercase (a-f)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Conversions -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Quick Conversions</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setQuickValue('1010')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        1010₂
                                    </button>
                                    <button type="button" onclick="setQuickValue('FF')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        FF₁₆
                                    </button>
                                    <button type="button" onclick="setQuickValue('255')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        255₁₀
                                    </button>
                                    <button type="button" onclick="setQuickValue('377')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        377₈
                                    </button>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-2">
                                    <button type="button" onclick="setQuickValue('11001100')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        11001100₂
                                    </button>
                                    <button type="button" onclick="setQuickValue('DEADBEEF')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        DEADBEEF₁₆
                                    </button>
                                    <button type="button" onclick="setQuickValue('65535')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        65535₁₀
                                    </button>
                                    <button type="button" onclick="setQuickValue('777')" class="py-2 px-3 bg-white border border-purple-200 rounded-lg hover:border-purple-400 transition duration-200 text-sm font-mono">
                                        777₈
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
                                            Show conversion steps
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="twosComplement" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                        >
                                        <label for="twosComplement" class="ml-2 text-xs text-amber-700">
                                            Two's complement (signed)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="convertNumber()"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                                >
                                    <i class="fas fa-exchange-alt mr-2"></i>
                                    Convert Number
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
                                <i class="fas fa-calculator text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter a number</p>
                                <p class="text-sm">to see conversion results</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-indigo-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Binary-Hex Reference</h4>
                            <div class="grid grid-cols-4 gap-2 text-xs font-mono">
                                <div class="text-center p-1 bg-white rounded">0000 = 0</div>
                                <div class="text-center p-1 bg-white rounded">0001 = 1</div>
                                <div class="text-center p-1 bg-white rounded">0010 = 2</div>
                                <div class="text-center p-1 bg-white rounded">0011 = 3</div>
                                <div class="text-center p-1 bg-white rounded">0100 = 4</div>
                                <div class="text-center p-1 bg-white rounded">0101 = 5</div>
                                <div class="text-center p-1 bg-white rounded">0110 = 6</div>
                                <div class="text-center p-1 bg-white rounded">0111 = 7</div>
                                <div class="text-center p-1 bg-white rounded">1000 = 8</div>
                                <div class="text-center p-1 bg-white rounded">1001 = 9</div>
                                <div class="text-center p-1 bg-white rounded">1010 = A</div>
                                <div class="text-center p-1 bg-white rounded">1011 = B</div>
                                <div class="text-center p-1 bg-white rounded">1100 = C</div>
                                <div class="text-center p-1 bg-white rounded">1101 = D</div>
                                <div class="text-center p-1 bg-white rounded">1110 = E</div>
                                <div class="text-center p-1 bg-white rounded">1111 = F</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Conversion Results -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Number System Conversions</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="conversionResults">
                    </div>
                </div>

                <!-- Step-by-Step Conversion -->
                <div id="stepByStepSection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Step-by-Step Conversion</h2>
                    <div class="space-y-6" id="stepByStepContent">
                    </div>
                </div>

                <!-- Bit Representation -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Bit Representation</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Binary Visualization -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Binary Breakdown</h3>
                            <div class="bg-gray-50 rounded-lg p-4" id="binaryVisualization">
                            </div>
                        </div>
                        
                        <!-- Number Properties -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Number Properties</h3>
                            <div class="space-y-4" id="numberProperties">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Common Conversions -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Common Binary-Hex Conversions</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Power of 2 Reference -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Powers of 2 Reference</h3>
                            <div class="space-y-3" id="powersReference">
                            </div>
                        </div>
                        
                        <!-- Quick Lookup Table -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Conversion Table</h3>
                            <div class="space-y-3" id="quickLookupTable">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Programming Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Programming & Digital Electronics Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-microchip text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Digital Logic</h3>
                        <p class="text-gray-600">Binary is fundamental to digital circuits. Each bit represents a voltage level (high/low) in electronic systems.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-code text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Programming</h3>
                        <p class="text-gray-600">Hex is widely used in programming for memory addresses, color codes, and bitmask operations.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-memory text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Memory Addressing</h3>
                        <p class="text-gray-600">Memory addresses are typically represented in hexadecimal for compactness and easy conversion to binary.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-palette text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Color Codes</h3>
                        <p class="text-gray-600">Hexadecimal is used in web design for RGB color codes (#RRGGBB) where each pair represents red, green, and blue.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Number System FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why is hexadecimal used in programming?</h3>
                        <p class="text-gray-600">Hexadecimal provides a compact way to represent binary data. One hex digit represents exactly 4 bits (a nibble), making it easy to convert between binary and hex. It's more human-readable than long binary strings while maintaining a direct relationship with the underlying binary data.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between binary, decimal, and hexadecimal?</h3>
                        <p class="text-gray-600">Binary is base-2 (digits: 0-1), decimal is base-10 (digits: 0-9), and hexadecimal is base-16 (digits: 0-9, A-F). Binary is used by computers, decimal by humans, and hexadecimal serves as a bridge between them in programming and digital systems.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I convert binary to hexadecimal quickly?</h3>
                        <p class="text-gray-600">Group binary digits into sets of 4 from right to left (pad with leading zeros if needed). Then convert each 4-bit group to its corresponding hex digit using the reference table (0000=0, 0001=1, ..., 1111=F).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is two's complement?</h3>
                        <p class="text-gray-600">Two's complement is a mathematical operation used to represent signed integers in binary. To get the two's complement: invert all bits (ones' complement) and then add 1. This representation simplifies arithmetic operations in digital systems.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I use octal vs hexadecimal?</h3>
                        <p class="text-gray-600">Octal (base-8) was more common in older systems and when working with 3-bit groupings. Hexadecimal is now more prevalent as it aligns perfectly with 4-bit and 8-bit bytes used in modern computing. Use hex for most programming work and octal only when specifically required.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="{{ route('base.converter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-exchange-alt text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Base Converter</h3>
                        <p class="text-gray-600 text-sm">Convert between any number bases</p>
                    </a>
                    <a href="{{ route('bitwise.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-android text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Bitwise Calculator</h3>
                        <p class="text-gray-600 text-sm">AND, OR, XOR, NOT operations</p>
                    </a>
                    <a href="{{ route('color.converter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-palette text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Color Converter</h3>
                        <p class="text-gray-600 text-sm">Convert color formats</p>
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
let currentInputBase = 2;
let conversionHistory = [];

// Binary to Hex mapping
const binToHexMap = {
    '0000': '0', '0001': '1', '0010': '2', '0011': '3',
    '0100': '4', '0101': '5', '0110': '6', '0111': '7',
    '1000': '8', '1001': '9', '1010': 'A', '1011': 'B',
    '1100': 'C', '1101': 'D', '1110': 'E', '1111': 'F'
};

const hexToBinMap = {
    '0': '0000', '1': '0001', '2': '0010', '3': '0011',
    '4': '0100', '5': '0101', '6': '0110', '7': '0111',
    '8': '1000', '9': '1001', 'A': '1010', 'B': '1011',
    'C': '1100', 'D': '1101', 'E': '1110', 'F': '1111',
    'a': '1010', 'b': '1011', 'c': '1100', 'd': '1101', 'e': '1110', 'f': '1111'
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    convertNumber(); // Convert with default values
});

function setupEventListeners() {
    // Auto-convert on input change with debouncing
    document.getElementById('inputValue').addEventListener('input', debounce(convertNumber, 500));
    
    // Update conversion when options change
    document.getElementById('convertBinary').addEventListener('change', convertNumber);
    document.getElementById('convertHex').addEventListener('change', convertNumber);
    document.getElementById('convertDecimal').addEventListener('change', convertNumber);
    document.getElementById('convertOctal').addEventListener('change', convertNumber);
    document.getElementById('bitLength').addEventListener('change', convertNumber);
    document.getElementById('outputCase').addEventListener('change', convertNumber);
    document.getElementById('showSteps').addEventListener('change', convertNumber);
    document.getElementById('twosComplement').addEventListener('change', convertNumber);
}

function setInputBase(base) {
    currentInputBase = base;
    
    // Update button styles
    document.querySelectorAll('.base-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'text-green-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    event.target.classList.add('border-green-500', 'bg-green-50', 'text-green-700');
    event.target.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    convertNumber();
}

function setQuickValue(value) {
    document.getElementById('inputValue').value = value;
    convertNumber();
}

function clearAll() {
    document.getElementById('inputValue').value = '';
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-calculator text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter a number</p>
            <p class="text-sm">to see conversion results</p>
        </div>
    `;
    document.getElementById('detailedResults').classList.add('hidden');
}

function validateInput(value, base) {
    if (!value) return { valid: false, error: 'Please enter a value' };
    
    const validChars = {
        2: /^[01]+$/,
        8: /^[0-7]+$/,
        10: /^-?[0-9]+$/,
        16: /^[0-9A-Fa-f]+$/
    };
    
    if (!validChars[base].test(value)) {
        return { 
            valid: false, 
            error: `Invalid ${getBaseName(base)} number. Valid characters: ${getValidChars(base)}` 
        };
    }
    
    return { valid: true, error: null };
}

function getBaseName(base) {
    const names = { 2: 'binary', 8: 'octal', 10: 'decimal', 16: 'hexadecimal' };
    return names[base] || 'unknown';
}

function getValidChars(base) {
    const chars = { 2: '0-1', 8: '0-7', 10: '0-9', 16: '0-9, A-F' };
    return chars[base] || 'unknown';
}

function convertToDecimal(value, base) {
    if (base === 10) return parseInt(value, 10);
    return parseInt(value, base);
}

function convertFromDecimal(decimalValue, targetBase, bitLength = 0) {
    if (targetBase === 10) return decimalValue.toString();
    
    let result = decimalValue.toString(targetBase);
    
    // Apply bit length padding if specified
    if (bitLength > 0 && (targetBase === 2 || targetBase === 16)) {
        const bitsPerDigit = targetBase === 2 ? 1 : 4;
        const targetLength = Math.ceil(bitLength / bitsPerDigit);
        
        // Pad with leading zeros
        while (result.length < targetLength) {
            result = '0' + result;
        }
        
        // Handle two's complement for negative numbers
        if (decimalValue < 0 && targetBase === 2) {
            // This is a simplified version - in a real implementation, 
            // you'd calculate the actual two's complement
            result = result.substring(result.length - targetLength);
        }
    }
    
    // Apply case for hexadecimal
    if (targetBase === 16) {
        const caseType = document.getElementById('outputCase').value;
        result = caseType === 'upper' ? result.toUpperCase() : result.toLowerCase();
    }
    
    return result;
}

function binaryToHex(binaryStr) {
    // Pad with leading zeros to make length multiple of 4
    const paddedBinary = binaryStr.padStart(Math.ceil(binaryStr.length / 4) * 4, '0');
    let hexResult = '';
    
    // Convert each 4-bit group to hex
    for (let i = 0; i < paddedBinary.length; i += 4) {
        const nibble = paddedBinary.substring(i, i + 4);
        hexResult += binToHexMap[nibble];
    }
    
    const caseType = document.getElementById('outputCase').value;
    return caseType === 'upper' ? hexResult : hexResult.toLowerCase();
}

function hexToBinary(hexStr) {
    let binaryResult = '';
    
    for (let i = 0; i < hexStr.length; i++) {
        const hexDigit = hexStr[i];
        binaryResult += hexToBinMap[hexDigit];
    }
    
    return binaryResult;
}

function getConversionSteps(inputValue, inputBase) {
    const decimalValue = convertToDecimal(inputValue, inputBase);
    const steps = [];
    
    // Binary conversion steps
    if (inputBase !== 2 && document.getElementById('convertBinary').checked) {
        steps.push({
            title: 'Binary Conversion',
            content: `Divide ${decimalValue} by 2 repeatedly and note remainders:`,
            calculation: generateDivisionSteps(decimalValue, 2, 'binary')
        });
    }
    
    // Hexadecimal conversion steps
    if (inputBase !== 16 && document.getElementById('convertHex').checked) {
        steps.push({
            title: 'Hexadecimal Conversion',
            content: `Divide ${decimalValue} by 16 repeatedly and note remainders:`,
            calculation: generateDivisionSteps(decimalValue, 16, 'hexadecimal')
        });
    }
    
    // Octal conversion steps
    if (inputBase !== 8 && document.getElementById('convertOctal').checked) {
        steps.push({
            title: 'Octal Conversion',
            content: `Divide ${decimalValue} by 8 repeatedly and note remainders:`,
            calculation: generateDivisionSteps(decimalValue, 8, 'octal')
        });
    }
    
    return steps;
}

function generateDivisionSteps(value, base, baseName) {
    let current = Math.abs(value);
    const steps = [];
    const remainders = [];
    
    if (current === 0) {
        return ['0 ÷ ' + base + ' = 0 remainder 0'];
    }
    
    while (current > 0) {
        const quotient = Math.floor(current / base);
        const remainder = current % base;
        remainders.unshift(remainder);
        
        let remainderStr = remainder.toString();
        if (base === 16) {
            remainderStr = convertFromDecimal(remainder, 16);
        }
        
        steps.push(`${current} ÷ ${base} = ${quotient} remainder ${remainderStr}`);
        current = quotient;
    }
    
    const result = convertFromDecimal(Math.abs(value), base);
    steps.push(`Reading remainders from bottom to top: ${result}<sub>${base}</sub>`);
    
    return steps;
}

function convertNumber() {
    const inputValue = document.getElementById('inputValue').value.trim();
    const validation = validateInput(inputValue, currentInputBase);
    
    if (!validation.valid) {
        showError(validation.error);
        return;
    }
    
    const decimalValue = convertToDecimal(inputValue, currentInputBase);
    const bitLength = parseInt(document.getElementById('bitLength').value) || 0;
    const showSteps = document.getElementById('showSteps').checked;
    
    // Perform conversions
    const conversions = {};
    
    if (document.getElementById('convertBinary').checked) {
        conversions.binary = convertFromDecimal(decimalValue, 2, bitLength);
    }
    
    if (document.getElementById('convertHex').checked) {
        conversions.hex = convertFromDecimal(decimalValue, 16, bitLength);
    }
    
    if (document.getElementById('convertDecimal').checked) {
        conversions.decimal = decimalValue.toString();
    }
    
    if (document.getElementById('convertOctal').checked) {
        conversions.octal = convertFromDecimal(decimalValue, 8, bitLength);
    }
    
    // Display results
    displayResults(conversions, inputValue, currentInputBase);
    
    // Show step-by-step if enabled
    if (showSteps) {
        const steps = getConversionSteps(inputValue, currentInputBase);
        displayStepByStep(steps);
        document.getElementById('stepByStepSection').classList.remove('hidden');
    } else {
        document.getElementById('stepByStepSection').classList.add('hidden');
    }
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update number properties and visualization
    updateNumberProperties(decimalValue, inputValue, currentInputBase);
    updateCommonReferences();
}

function displayResults(conversions, originalValue, originalBase) {
    const resultsDiv = document.getElementById('results');
    const baseName = getBaseName(originalBase);
    
    let resultsHtml = `
        <div class="text-center mb-4">
            <div class="text-lg font-bold text-gray-700 mb-2">Original: ${originalValue}<sub>${originalBase}</sub></div>
            <div class="text-sm text-gray-500">${baseName} number</div>
        </div>
    `;
    
    // Update main results card
    if (conversions.binary && conversions.hex) {
        resultsHtml += `
            <div class="space-y-3">
                <div class="bg-green-50 rounded-lg p-3">
                    <div class="text-xs text-green-600 font-semibold">Binary</div>
                    <div class="text-lg font-mono font-bold text-gray-800">${conversions.binary}</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-3">
                    <div class="text-xs text-blue-600 font-semibold">Hexadecimal</div>
                    <div class="text-lg font-mono font-bold text-gray-800">${conversions.hex}</div>
                </div>
            </div>
        `;
    }
    
    resultsDiv.innerHTML = resultsHtml;
    
    // Update detailed conversion results
    updateConversionResults(conversions);
}

function updateConversionResults(conversions) {
    const resultsContainer = document.getElementById('conversionResults');
    let resultsHtml = '';
    
    if (conversions.binary) {
        resultsHtml += `
            <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                <div class="text-2xl font-bold text-green-600 mb-2 font-mono">${conversions.binary}</div>
                <div class="text-lg font-semibold text-gray-700">Binary</div>
                <div class="text-sm text-gray-500 mt-1">Base 2</div>
            </div>
        `;
    }
    
    if (conversions.hex) {
        resultsHtml += `
            <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                <div class="text-2xl font-bold text-blue-600 mb-2 font-mono">${conversions.hex}</div>
                <div class="text-lg font-semibold text-gray-700">Hexadecimal</div>
                <div class="text-sm text-gray-500 mt-1">Base 16</div>
            </div>
        `;
    }
    
    if (conversions.decimal) {
        resultsHtml += `
            <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                <div class="text-2xl font-bold text-purple-600 mb-2 font-mono">${conversions.decimal}</div>
                <div class="text-lg font-semibold text-gray-700">Decimal</div>
                <div class="text-sm text-gray-500 mt-1">Base 10</div>
            </div>
        `;
    }
    
    if (conversions.octal) {
        resultsHtml += `
            <div class="text-center p-6 bg-amber-50 rounded-lg border border-amber-200">
                <div class="text-2xl font-bold text-amber-600 mb-2 font-mono">${conversions.octal}</div>
                <div class="text-lg font-semibold text-gray-700">Octal</div>
                <div class="text-sm text-gray-500 mt-1">Base 8</div>
            </div>
        `;
    }
    
    resultsContainer.innerHTML = resultsHtml;
}

function displayStepByStep(steps) {
    const container = document.getElementById('stepByStepContent');
    let stepsHtml = '';
    
    steps.forEach(step => {
        stepsHtml += `
            <div class="border-l-4 border-indigo-500 pl-4">
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

function updateNumberProperties(decimalValue, originalValue, originalBase) {
    const propertiesDiv = document.getElementById('numberProperties');
    const binaryValue = decimalValue.toString(2);
    
    const properties = [
        { label: 'Decimal Value', value: decimalValue.toLocaleString() },
        { label: 'Binary Length', value: `${binaryValue.length} bits` },
        { label: 'Even/Odd', value: decimalValue % 2 === 0 ? 'Even' : 'Odd' },
        { label: 'Sign', value: decimalValue >= 0 ? 'Positive' : 'Negative' },
        { label: 'Power of 2', value: (decimalValue & (decimalValue - 1)) === 0 ? 'Yes' : 'No' }
    ];
    
    let propertiesHtml = '';
    properties.forEach(prop => {
        propertiesHtml += `
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">${prop.label}</span>
                <span class="font-medium text-gray-800">${prop.value}</span>
            </div>
        `;
    });
    
    propertiesDiv.innerHTML = propertiesHtml;
    
    // Update binary visualization
    updateBinaryVisualization(binaryValue);
}

function updateBinaryVisualization(binaryStr) {
    const visualizationDiv = document.getElementById('binaryVisualization');
    let visualizationHtml = '<div class="text-center font-mono text-sm mb-4">';
    
    // Create bit positions
    for (let i = 0; i < binaryStr.length; i++) {
        const bitValue = parseInt(binaryStr[i]);
        const bitColor = bitValue === 1 ? 'text-green-600' : 'text-gray-400';
        visualizationHtml += `
            <div class="inline-block mx-1">
                <div class="text-xs text-gray-500">${binaryStr.length - 1 - i}</div>
                <div class="text-lg font-bold ${bitColor}">${binaryStr[i]}</div>
            </div>
        `;
    }
    
    visualizationHtml += '</div>';
    
    // Add bit groups for hex conversion
    const paddedBinary = binaryStr.padStart(Math.ceil(binaryStr.length / 4) * 4, '0');
    visualizationHtml += '<div class="text-center text-xs text-gray-500 mt-4">4-bit groups for hex conversion:</div>';
    visualizationHtml += '<div class="text-center font-mono text-sm mt-2">';
    
    for (let i = 0; i < paddedBinary.length; i += 4) {
        const nibble = paddedBinary.substring(i, i + 4);
        visualizationHtml += `<span class="mx-1 border border-gray-300 px-1 rounded">${nibble}</span>`;
    }
    
    visualizationHtml += '</div>';
    
    visualizationDiv.innerHTML = visualizationHtml;
}

function updateCommonReferences() {
    // Powers of 2 reference
    const powersDiv = document.getElementById('powersReference');
    let powersHtml = '';
    
    const powers = [
        { power: '2⁰', value: '1' },
        { power: '2¹', value: '2' },
        { power: '2²', value: '4' },
        { power: '2³', value: '8' },
        { power: '2⁴', value: '16' },
        { power: '2⁵', value: '32' },
        { power: '2⁶', value: '64' },
        { power: '2⁷', value: '128' },
        { power: '2⁸', value: '256' },
        { power: '2¹⁶', value: '65,536' },
        { power: '2³²', value: '4,294,967,296' }
    ];
    
    powers.forEach(p => {
        powersHtml += `
            <div class="flex justify-between items-center py-1">
                <span class="text-gray-600 font-mono">${p.power}</span>
                <span class="font-medium text-gray-800">${p.value}</span>
            </div>
        `;
    });
    
    powersDiv.innerHTML = powersHtml;
    
    // Quick lookup table
    const lookupDiv = document.getElementById('quickLookupTable');
    let lookupHtml = '';
    
    const commonValues = [
        { dec: '0', bin: '0000', hex: '0' },
        { dec: '1', bin: '0001', hex: '1' },
        { dec: '2', bin: '0010', hex: '2' },
        { dec: '4', bin: '0100', hex: '4' },
        { dec: '8', bin: '1000', hex: '8' },
        { dec: '10', bin: '1010', hex: 'A' },
        { dec: '15', bin: '1111', hex: 'F' },
        { dec: '16', bin: '00010000', hex: '10' },
        { dec: '255', bin: '11111111', hex: 'FF' }
    ];
    
    commonValues.forEach(v => {
        lookupHtml += `
            <div class="grid grid-cols-4 gap-2 text-xs font-mono py-1 border-b border-gray-100">
                <div class="text-gray-600">${v.dec}</div>
                <div class="text-gray-800">${v.bin}</div>
                <div class="text-gray-800">${v.hex}</div>
                <div class="text-gray-500">${v.dec}<sub>10</sub></div>
            </div>
        `;
    });
    
    lookupDiv.innerHTML = lookupHtml;
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