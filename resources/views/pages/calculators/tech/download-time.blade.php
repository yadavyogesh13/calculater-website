@extends('layouts.app')

@section('title', 'Download Time Calculator | File Download Time Estimator | CalculaterTools')

@section('meta-description', 'Free download time calculator to estimate how long downloads will take based on file size and internet speed. Calculate download times for large files, videos, and more.')

@section('keywords', 'download time calculator, download speed calculator, file download time, internet speed test, download estimator, bandwidth calculator')

@section('canonical', url('/calculators/download-time'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Download Time Calculator",
    "description": "Calculate download time based on file size and internet speed",
    "url": "{{ url('/calculators/download-time') }}",
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
                        <a href="#internet" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Internet Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Download Time Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Download Time Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Estimate how long your downloads will take based on file size and internet speed. Perfect for planning large downloads, video files, and software installations.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Download Time</h2>
                        <p class="text-gray-600 mb-6">Enter file size and internet speed details</p>
                        
                        <form id="downloadTimeCalculatorForm" class="space-y-6">
                            <!-- File Size Input -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">File Size</h3>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="fileSize" class="block text-xs font-medium text-green-700 mb-2">
                                                File Size
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="fileSize" 
                                                    class="w-full pl-4 pr-12 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                    placeholder="e.g., 500" 
                                                    min="0.1" 
                                                    max="1000000" 
                                                    step="0.1"
                                                    value="500"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm" id="fileSizeUnit">MB</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="fileSizeUnitSelect" class="block text-xs font-medium text-green-700 mb-2">
                                                Size Unit
                                            </label>
                                            <select id="fileSizeUnitSelect" class="w-full px-3 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200">
                                                <option value="bytes">Bytes</option>
                                                <option value="kb">Kilobytes (KB)</option>
                                                <option value="mb" selected>Megabytes (MB)</option>
                                                <option value="gb">Gigabytes (GB)</option>
                                                <option value="tb">Terabytes (TB)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                        <button type="button" onclick="setFileSizePreset(5, 'mb')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                            5 MB
                                        </button>
                                        <button type="button" onclick="setFileSizePreset(100, 'mb')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                            100 MB
                                        </button>
                                        <button type="button" onclick="setFileSizePreset(1, 'gb')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                            1 GB
                                        </button>
                                        <button type="button" onclick="setFileSizePreset(10, 'gb')" class="py-2 px-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 text-sm">
                                            10 GB
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Internet Speed Input -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Internet Speed</h3>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="downloadSpeed" class="block text-xs font-medium text-blue-700 mb-2">
                                                Download Speed
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="downloadSpeed" 
                                                    class="w-full pl-4 pr-12 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                    placeholder="e.g., 50" 
                                                    min="0.1" 
                                                    max="10000" 
                                                    step="0.1"
                                                    value="50"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm" id="speedUnit">Mbps</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="speedUnitSelect" class="block text-xs font-medium text-blue-700 mb-2">
                                                Speed Unit
                                            </label>
                                            <select id="speedUnitSelect" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                                <option value="bps">Bits per second (bps)</option>
                                                <option value="kbps">Kilobits per second (Kbps)</option>
                                                <option value="mbps" selected>Megabits per second (Mbps)</option>
                                                <option value="gbps">Gigabits per second (Gbps)</option>
                                                <option value="MBps">Megabytes per second (MB/s)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                        <button type="button" onclick="setSpeedPreset(10, 'mbps')" class="py-2 px-3 bg-white border border-blue-200 rounded-lg hover:border-blue-400 transition duration-200 text-sm">
                                            10 Mbps
                                        </button>
                                        <button type="button" onclick="setSpeedPreset(50, 'mbps')" class="py-2 px-3 bg-white border border-blue-200 rounded-lg hover:border-blue-400 transition duration-200 text-sm">
                                            50 Mbps
                                        </button>
                                        <button type="button" onclick="setSpeedPreset(100, 'mbps')" class="py-2 px-3 bg-white border border-blue-200 rounded-lg hover:border-blue-400 transition duration-200 text-sm">
                                            100 Mbps
                                        </button>
                                        <button type="button" onclick="setSpeedPreset(1000, 'mbps')" class="py-2 px-3 bg-white border border-blue-200 rounded-lg hover:border-blue-400 transition duration-200 text-sm">
                                            1 Gbps
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Connection Factors -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Connection Factors</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="connectionType" class="block text-xs font-medium text-purple-700 mb-2">
                                            Connection Type
                                        </label>
                                        <select id="connectionType" class="w-full px-3 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                                            <option value="excellent" selected>Excellent (95% efficiency)</option>
                                            <option value="good">Good (85% efficiency)</option>
                                            <option value="average">Average (75% efficiency)</option>
                                            <option value="poor">Poor (60% efficiency)</option>
                                            <option value="custom">Custom efficiency</option>
                                        </select>
                                    </div>
                                    
                                    <div id="customEfficiencyContainer" class="hidden">
                                        <label for="customEfficiency" class="block text-xs font-medium text-purple-700 mb-2">
                                            Custom Efficiency (%)
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="customEfficiency" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="e.g., 80" 
                                                min="1" 
                                                max="100" 
                                                step="1"
                                                value="80"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">%</span>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="flex items-center">
                                            <input 
                                                type="checkbox" 
                                                id="includeOverhead" 
                                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-purple-300 rounded"
                                                checked
                                            >
                                            <label for="includeOverhead" class="ml-2 text-xs text-purple-700">
                                                Include network overhead (~10%)
                                            </label>
                                        </div>
                                        <div class="flex items-center">
                                            <input 
                                                type="checkbox" 
                                                id="includeBurst" 
                                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-purple-300 rounded"
                                            >
                                            <label for="includeBurst" class="ml-2 text-xs text-purple-700">
                                                Include speed burst allowance
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Multiple Files -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Multiple Files (Optional)</h3>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="fileCount" class="block text-xs font-medium text-amber-700 mb-2">
                                                Number of Files
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="fileCount" 
                                                    class="w-full pl-4 pr-12 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                                                    placeholder="e.g., 1" 
                                                    min="1" 
                                                    max="1000" 
                                                    step="1"
                                                    value="1"
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">files</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="downloadType" class="block text-xs font-medium text-amber-700 mb-2">
                                                Download Type
                                            </label>
                                            <select id="downloadType" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                                <option value="sequential" selected>Sequential (one after another)</option>
                                                <option value="parallel">Parallel (simultaneous)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Real-world Examples -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3">Common Download Scenarios</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    <button type="button" onclick="setScenario('hd_movie')" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">HD Movie</div>
                                        <div class="text-xs text-gray-500">2 GB file</div>
                                    </button>
                                    <button type="button" onclick="setScenario('4k_movie')" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">4K Movie</div>
                                        <div class="text-xs text-gray-500">8 GB file</div>
                                    </button>
                                    <button type="button" onclick="setScenario('game')" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Video Game</div>
                                        <div class="text-xs text-gray-500">50 GB file</div>
                                    </button>
                                    <button type="button" onclick="setScenario('os_install')" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">OS Install</div>
                                        <div class="text-xs text-gray-500">5 GB file</div>
                                    </button>
                                    <button type="button" onclick="setScenario('software')" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Software Suite</div>
                                        <div class="text-xs text-gray-500">1 GB file</div>
                                    </button>
                                    <button type="button" onclick="setScenario('photo_album')" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm text-left">
                                        <div class="font-medium text-gray-800">Photo Album</div>
                                        <div class="text-xs text-gray-500">500 MB file</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="calculateDownloadTime()"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                                >
                                    <i class="fas fa-calculator mr-2"></i>
                                    Calculate Download Time
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
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Download Estimate</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-download text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter file details</p>
                                <p class="text-sm">to see download time estimate</p>
                            </div>
                        </div>

                        <!-- Speed Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-indigo-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Common Internet Speeds</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Basic DSL</span>
                                    <span class="font-medium text-gray-800">5-10 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Cable</span>
                                    <span class="font-medium text-gray-800">50-100 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Fiber</span>
                                    <span class="font-medium text-gray-800">200-1000 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">5G Mobile</span>
                                    <span class="font-medium text-gray-800">100-500 Mbps</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Time Estimate Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Download Time Estimate</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="timeSummary">
                    </div>
                </div>

                <!-- Progress Visualization -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Download Progress</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Time Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Time Breakdown</h3>
                            <div class="space-y-4" id="timeBreakdown">
                            </div>
                        </div>
                        
                        <!-- Progress Bars -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Estimated Progress</h3>
                            <div class="space-y-6" id="progressVisualization">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Speed Analysis -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Speed Analysis</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Speed Comparison -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Speed Comparison</h3>
                            <div class="space-y-4" id="speedComparison">
                            </div>
                        </div>
                        
                        <!-- Efficiency Factors -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Efficiency Factors</h3>
                            <div class="space-y-4" id="efficiencyFactors">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Download Planning -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Download Planning Tips</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Optimization Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Optimization Tips</h3>
                            <div class="space-y-3" id="optimizationTips">
                            </div>
                        </div>
                        
                        <!-- Best Practices -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Best Practices</h3>
                            <div class="space-y-3" id="bestPractices">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Internet Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Internet Speed Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tachometer-alt text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Speed Testing</h3>
                        <p class="text-gray-600">Test your actual internet speed using online speed test tools. Run multiple tests at different times for accuracy.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-wifi text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">WiFi Optimization</h3>
                        <p class="text-gray-600">Position your router centrally, reduce interference, and use 5GHz band for faster wireless speeds.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-network-wired text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Wired Connection</h3>
                        <p class="text-gray-600">Use Ethernet cables for critical downloads. Wired connections are faster and more reliable than WiFi.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Off-Peak Hours</h3>
                        <p class="text-gray-600">Schedule large downloads during off-peak hours (late night/early morning) for better speeds.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Download Time FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why is my actual download time different from the calculation?</h3>
                        <p class="text-gray-600">Actual download times can vary due to network congestion, server limitations, WiFi interference, background internet usage, and internet service provider throttling. The calculator provides an ideal scenario estimate.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between Mbps and MB/s?</h3>
                        <p class="text-gray-600">Mbps (megabits per second) is used by internet providers, while MB/s (megabytes per second) is used for file sizes. 1 byte = 8 bits, so to convert Mbps to MB/s, divide by 8. 100 Mbps ≈ 12.5 MB/s.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I improve my download speeds?</h3>
                        <p class="text-gray-600">Use a wired connection, close bandwidth-heavy applications, pause other downloads, use download managers, connect to closer servers, and download during off-peak hours.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do downloads sometimes start fast then slow down?</h3>
                        <p class="text-gray-600">This can be due to speed burst (initial fast speed offered by ISPs), server limitations kicking in, network congestion increasing, or your ISP's fair usage policy reducing speeds after detecting heavy usage.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is there a maximum download speed I can achieve?</h3>
                        <p class="text-gray-600">Your maximum download speed is limited by your internet plan, network equipment, connection type (WiFi vs Ethernet), and the server's upload capacity. You cannot download faster than the slowest point in the connection chain.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('bandwidth.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tachometer-alt text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Bandwidth Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate data transfer needs</p>
                    </a>
                    {{-- <a href="{{ route('file.size') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-file text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">File Size Converter</h3>
                        <p class="text-gray-600 text-sm">Convert between size units</p>
                    </a>
                    <a href="{{ route('data.transfer') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-exchange-alt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Data Transfer Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate transfer times</p>
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
const efficiencyLevels = {
    'excellent': 0.95,
    'good': 0.85,
    'average': 0.75,
    'poor': 0.60,
    'custom': 0.80
};

const scenarioPresets = {
    'hd_movie': { size: 2, unit: 'gb', speed: 50, speedUnit: 'mbps' },
    '4k_movie': { size: 8, unit: 'gb', speed: 100, speedUnit: 'mbps' },
    'game': { size: 50, unit: 'gb', speed: 200, speedUnit: 'mbps' },
    'os_install': { size: 5, unit: 'gb', speed: 75, speedUnit: 'mbps' },
    'software': { size: 1, unit: 'gb', speed: 50, speedUnit: 'mbps' },
    'photo_album': { size: 500, unit: 'mb', speed: 25, speedUnit: 'mbps' }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateDownloadTime(); // Calculate with default values
});

function setupEventListeners() {
    // Update unit labels when selections change
    document.getElementById('fileSizeUnitSelect').addEventListener('change', function() {
        document.getElementById('fileSizeUnit').textContent = this.options[this.selectedIndex].text.split(' ')[0];
        calculateDownloadTime();
    });
    
    document.getElementById('speedUnitSelect').addEventListener('change', function() {
        document.getElementById('speedUnit').textContent = this.options[this.selectedIndex].text.split(' ')[0];
        calculateDownloadTime();
    });
    
    // Handle connection type changes
    document.getElementById('connectionType').addEventListener('change', function() {
        const customContainer = document.getElementById('customEfficiencyContainer');
        if (this.value === 'custom') {
            customContainer.classList.remove('hidden');
        } else {
            customContainer.classList.add('hidden');
        }
        calculateDownloadTime();
    });
    
    // Auto-calculate on input changes with debouncing
    document.getElementById('fileSize').addEventListener('input', debounce(calculateDownloadTime, 300));
    document.getElementById('downloadSpeed').addEventListener('input', debounce(calculateDownloadTime, 300));
    document.getElementById('customEfficiency').addEventListener('input', debounce(calculateDownloadTime, 300));
    document.getElementById('fileCount').addEventListener('input', debounce(calculateDownloadTime, 300));
    document.getElementById('downloadType').addEventListener('change', debounce(calculateDownloadTime, 300));
    document.getElementById('includeOverhead').addEventListener('change', debounce(calculateDownloadTime, 300));
    document.getElementById('includeBurst').addEventListener('change', debounce(calculateDownloadTime, 300));
}

function setFileSizePreset(size, unit) {
    document.getElementById('fileSize').value = size;
    document.getElementById('fileSizeUnitSelect').value = unit;
    document.getElementById('fileSizeUnit').textContent = unit.toUpperCase();
    calculateDownloadTime();
}

function setSpeedPreset(speed, unit) {
    document.getElementById('downloadSpeed').value = speed;
    document.getElementById('speedUnitSelect').value = unit;
    document.getElementById('speedUnit').textContent = unit.toUpperCase();
    calculateDownloadTime();
}

function setScenario(scenario) {
    const preset = scenarioPresets[scenario];
    if (preset) {
        setFileSizePreset(preset.size, preset.unit);
        setSpeedPreset(preset.speed, preset.speedUnit);
    }
}

function clearAll() {
    document.getElementById('fileSize').value = '500';
    document.getElementById('fileSizeUnitSelect').value = 'mb';
    document.getElementById('fileSizeUnit').textContent = 'MB';
    document.getElementById('downloadSpeed').value = '50';
    document.getElementById('speedUnitSelect').value = 'mbps';
    document.getElementById('speedUnit').textContent = 'Mbps';
    document.getElementById('fileCount').value = '1';
    document.getElementById('connectionType').value = 'excellent';
    document.getElementById('customEfficiencyContainer').classList.add('hidden');
    
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-download text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter file details</p>
            <p class="text-sm">to see download time estimate</p>
        </div>
    `;
    document.getElementById('detailedResults').classList.add('hidden');
}

function convertToBytes(size, unit) {
    const units = {
        'bytes': 1,
        'kb': 1024,
        'mb': 1024 * 1024,
        'gb': 1024 * 1024 * 1024,
        'tb': 1024 * 1024 * 1024 * 1024
    };
    return size * (units[unit] || 1);
}

function convertToBitsPerSecond(speed, unit) {
    const units = {
        'bps': 1,
        'kbps': 1000,
        'mbps': 1000 * 1000,
        'gbps': 1000 * 1000 * 1000,
        'MBps': 8 * 1000 * 1000 // Megabytes per second to bits per second
    };
    return speed * (units[unit] || 1);
}

function formatTime(seconds) {
    if (seconds < 1) {
        return '< 1 second';
    }
    
    const days = Math.floor(seconds / 86400);
    const hours = Math.floor((seconds % 86400) / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    const secs = Math.floor(seconds % 60);
    
    const parts = [];
    if (days > 0) parts.push(`${days} day${days > 1 ? 's' : ''}`);
    if (hours > 0) parts.push(`${hours} hour${hours > 1 ? 's' : ''}`);
    if (minutes > 0) parts.push(`${minutes} minute${minutes > 1 ? 's' : ''}`);
    if (secs > 0 && days === 0 && hours === 0) parts.push(`${secs} second${secs > 1 ? 's' : ''}`);
    
    return parts.join(' ') || '< 1 second';
}

function formatFileSize(bytes) {
    const units = ['B', 'KB', 'MB', 'GB', 'TB'];
    let size = bytes;
    let unitIndex = 0;
    
    while (size >= 1024 && unitIndex < units.length - 1) {
        size /= 1024;
        unitIndex++;
    }
    
    return `${size.toFixed(2)} ${units[unitIndex]}`;
}

function calculateDownloadTime() {
    // Get input values
    const fileSize = parseFloat(document.getElementById('fileSize').value) || 0;
    const fileSizeUnit = document.getElementById('fileSizeUnitSelect').value;
    const downloadSpeed = parseFloat(document.getElementById('downloadSpeed').value) || 0;
    const speedUnit = document.getElementById('speedUnitSelect').value;
    const connectionType = document.getElementById('connectionType').value;
    const customEfficiency = parseFloat(document.getElementById('customEfficiency').value) || 80;
    const includeOverhead = document.getElementById('includeOverhead').checked;
    const includeBurst = document.getElementById('includeBurst').checked;
    const fileCount = parseInt(document.getElementById('fileCount').value) || 1;
    const downloadType = document.getElementById('downloadType').value;
    
    if (fileSize <= 0 || downloadSpeed <= 0) {
        showError('Please enter valid file size and download speed');
        return;
    }
    
    // Convert to common units
    const totalBytes = convertToBytes(fileSize, fileSizeUnit) * fileCount;
    const speedBps = convertToBitsPerSecond(downloadSpeed, speedUnit);
    
    // Calculate efficiency
    let efficiency = efficiencyLevels[connectionType];
    if (connectionType === 'custom') {
        efficiency = customEfficiency / 100;
    }
    
    // Apply overhead if included
    let effectiveSpeed = speedBps * efficiency;
    if (includeOverhead) {
        effectiveSpeed *= 0.9; // 10% overhead
    }
    
    // Apply burst allowance if included
    if (includeBurst) {
        effectiveSpeed *= 1.2; // 20% burst allowance
    }
    
    // Calculate download time in seconds
    const totalBits = totalBytes * 8;
    let downloadTimeSeconds = totalBits / effectiveSpeed;
    
    // Adjust for download type
    if (downloadType === 'sequential' && fileCount > 1) {
        downloadTimeSeconds *= fileCount;
    }
    
    // Prepare results
    const results = {
        totalBytes: totalBytes,
        effectiveSpeed: effectiveSpeed,
        downloadTimeSeconds: downloadTimeSeconds,
        fileCount: fileCount,
        downloadType: downloadType,
        efficiency: efficiency,
        includeOverhead: includeOverhead,
        includeBurst: includeBurst
    };
    
    // Display results
    displayResults(results);
    displayDetailedResults(results);
    
    // Show detailed results section
    document.getElementById('detailedResults').classList.remove('hidden');
}

function displayResults(results) {
    const resultsDiv = document.getElementById('results');
    const formattedTime = formatTime(results.downloadTimeSeconds);
    const fileSizeFormatted = formatFileSize(results.totalBytes);
    
    resultsDiv.innerHTML = `
        <div class="text-center mb-4">
            <div class="text-2xl font-bold text-indigo-600 mb-2">${formattedTime}</div>
            <div class="text-sm text-gray-500">Estimated download time</div>
        </div>
        
        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-600">Total size:</span>
                <span class="font-medium">${fileSizeFormatted}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Files:</span>
                <span class="font-medium">${results.fileCount}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Effective speed:</span>
                <span class="font-medium">${(results.effectiveSpeed / 1000000).toFixed(1)} Mbps</span>
            </div>
        </div>
        
        ${results.downloadTimeSeconds > 300 ? `
        <div class="mt-4 p-3 bg-amber-50 rounded-lg border border-amber-200">
            <div class="text-amber-800 text-xs">
                <i class="fas fa-clock mr-1"></i>
                This is a large download. Consider scheduling it during off-peak hours.
            </div>
        </div>
        ` : ''}
    `;
}

function displayDetailedResults(results) {
    // Update time summary
    updateTimeSummary(results);
    
    // Update time breakdown
    updateTimeBreakdown(results);
    
    // Update progress visualization
    updateProgressVisualization(results);
    
    // Update speed comparison
    updateSpeedComparison(results);
    
    // Update efficiency factors
    updateEfficiencyFactors(results);
    
    // Update optimization tips
    updateOptimizationTips(results);
    
    // Update best practices
    updateBestPractices();
}

function updateTimeSummary(results) {
    const summaryDiv = document.getElementById('timeSummary');
    const hours = results.downloadTimeSeconds / 3600;
    const minutes = results.downloadTimeSeconds / 60;
    
    summaryDiv.innerHTML = `
        <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
            <div class="text-2xl font-bold text-green-600 mb-2">${formatTime(results.downloadTimeSeconds)}</div>
            <div class="text-lg font-semibold text-gray-700">Total Time</div>
            <div class="text-sm text-gray-500 mt-1">Complete download</div>
        </div>
        
        <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2">${(results.effectiveSpeed / 1000000).toFixed(1)}</div>
            <div class="text-lg font-semibold text-gray-700">Effective Speed</div>
            <div class="text-sm text-gray-500 mt-1">Mbps</div>
        </div>
        
        <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
            <div class="text-2xl font-bold text-purple-600 mb-2">${formatFileSize(results.totalBytes)}</div>
            <div class="text-lg font-semibold text-gray-700">Total Size</div>
            <div class="text-sm text-gray-500 mt-1">${results.fileCount} file${results.fileCount > 1 ? 's' : ''}</div>
        </div>
        
        <div class="text-center p-4 bg-amber-50 rounded-lg border border-amber-200">
            <div class="text-2xl font-bold text-amber-600 mb-2">${(results.efficiency * 100).toFixed(0)}%</div>
            <div class="text-lg font-semibold text-gray-700">Efficiency</div>
            <div class="text-sm text-gray-500 mt-1">Connection quality</div>
        </div>
    `;
}

function updateTimeBreakdown(results) {
    const breakdownDiv = document.getElementById('timeBreakdown');
    const timeIntervals = [0.25, 0.5, 0.75, 1.0]; // 25%, 50%, 75%, 100%
    
    let breakdownHtml = '';
    timeIntervals.forEach(interval => {
        const timeForInterval = results.downloadTimeSeconds * interval;
        const sizeForInterval = results.totalBytes * interval;
        
        breakdownHtml += `
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">${(interval * 100).toFixed(0)}% complete</span>
                <div class="text-right">
                    <div class="font-medium text-gray-800">${formatTime(timeForInterval)}</div>
                    <div class="text-xs text-gray-500">${formatFileSize(sizeForInterval)}</div>
                </div>
            </div>
        `;
    });
    
    breakdownDiv.innerHTML = breakdownHtml;
}

function updateProgressVisualization(results) {
    const progressDiv = document.getElementById('progressVisualization');
    const intervals = [
        { label: '25%', value: 0.25, color: 'bg-red-500' },
        { label: '50%', value: 0.5, color: 'bg-orange-500' },
        { label: '75%', value: 0.75, color: 'bg-yellow-500' },
        { label: '100%', value: 1.0, color: 'bg-green-500' }
    ];
    
    let progressHtml = '';
    intervals.forEach(interval => {
        const time = results.downloadTimeSeconds * interval.value;
        const width = (interval.value * 100) + '%';
        
        progressHtml += `
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">${interval.label}</span>
                    <span class="font-medium text-gray-800">${formatTime(time)}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="${interval.color} h-3 rounded-full transition-all duration-500" style="width: ${width}"></div>
                </div>
            </div>
        `;
    });
    
    progressDiv.innerHTML = progressHtml;
}

function updateSpeedComparison(results) {
    const comparisonDiv = document.getElementById('speedComparison');
    const currentSpeed = results.effectiveSpeed / 1000000; // Convert to Mbps
    const comparisonSpeeds = [10, 25, 50, 100, 200, 500, 1000];
    
    let comparisonHtml = '';
    comparisonSpeeds.forEach(speed => {
        if (speed <= currentSpeed * 1.5) { // Only show relevant comparisons
            const timeAtSpeed = (results.totalBytes * 8) / (speed * 1000000);
            const timeDifference = results.downloadTimeSeconds - timeAtSpeed;
            const isFaster = timeDifference > 0;
            
            comparisonHtml += `
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">${speed} Mbps</span>
                    <div class="text-right">
                        <div class="font-medium text-gray-800">${formatTime(timeAtSpeed)}</div>
                        <div class="text-xs ${isFaster ? 'text-green-600' : 'text-gray-500'}">
                            ${isFaster ? `${formatTime(timeDifference)} faster` : 'slower'}
                        </div>
                    </div>
                </div>
            `;
        }
    });
    
    comparisonDiv.innerHTML = comparisonHtml;
}

function updateEfficiencyFactors(results) {
    const factorsDiv = document.getElementById('efficiencyFactors');
    
    let efficiencyHtml = `
        <div class="space-y-3">
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Connection efficiency</span>
                <span class="font-medium text-gray-800">${(results.efficiency * 100).toFixed(0)}%</span>
            </div>
    `;
    
    if (results.includeOverhead) {
        efficiencyHtml += `
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Network overhead</span>
                <span class="font-medium text-red-600">-10%</span>
            </div>
        `;
    }
    
    if (results.includeBurst) {
        efficiencyHtml += `
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Speed burst allowance</span>
                <span class="font-medium text-green-600">+20%</span>
            </div>
        `;
    }
    
    efficiencyHtml += `
            <div class="flex justify-between items-center py-2 bg-green-50 rounded p-2 mt-2">
                <span class="text-gray-800 font-semibold">Effective speed</span>
                <span class="font-bold text-green-600">${(results.effectiveSpeed / 1000000).toFixed(1)} Mbps</span>
            </div>
        </div>
    `;
    
    factorsDiv.innerHTML = efficiencyHtml;
}

function updateOptimizationTips(results) {
    const tipsDiv = document.getElementById('optimizationTips');
    let tips = [];
    
    if (results.downloadTimeSeconds > 3600) {
        tips.push({
            icon: 'fa-clock',
            title: 'Schedule downloads',
            description: 'Download during off-peak hours (late night/early morning) for better speeds.'
        });
    }
    
    if (results.efficiency < 0.8) {
        tips.push({
            icon: 'fa-wifi',
            title: 'Improve connection',
            description: 'Use a wired Ethernet connection or move closer to your WiFi router.'
        });
    }
    
    if (results.fileCount > 1 && results.downloadType === 'sequential') {
        tips.push({
            icon: 'fa-tasks',
            title: 'Use download manager',
            description: 'Download multiple files simultaneously with a download manager.'
        });
    }
    
    if (results.totalBytes > 500 * 1024 * 1024) { // Larger than 500MB
        tips.push({
            icon: 'fa-pause',
            title: 'Pause other activities',
            description: 'Close streaming services and pause other downloads during large transfers.'
        });
    }
    
    // Default tips if no specific recommendations
    if (tips.length === 0) {
        tips = [
            {
                icon: 'fa-rocket',
                title: 'Use download accelerator',
                description: 'Download managers can improve speeds by using multiple connections.'
            },
            {
                icon: 'fa-shield-alt',
                title: 'Check security software',
                description: 'Temporarily disable VPNs or adjust firewall settings if they slow downloads.'
            },
            {
                icon: 'fa-sync',
                title: 'Restart equipment',
                description: 'Restart your router and modem to clear any temporary issues.'
            }
        ];
    }
    
    let tipsHtml = '';
    tips.forEach(tip => {
        tipsHtml += `
            <div class="flex items-start space-x-3">
                <i class="fas ${tip.icon} text-indigo-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">${tip.title}</p>
                    <p class="text-sm text-gray-600">${tip.description}</p>
                </div>
            </div>
        `;
    });
    
    tipsDiv.innerHTML = tipsHtml;
}

function updateBestPractices() {
    const practicesDiv = document.getElementById('bestPractices');
    
    practicesDiv.innerHTML = `
        <div class="space-y-3">
            <div class="flex items-start space-x-3">
                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Verify download sources</p>
                    <p class="text-sm text-gray-600">Only download from trusted, official sources to ensure safety and optimal speeds.</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Monitor data caps</p>
                    <p class="text-sm text-gray-600">Be aware of your internet plan's data limits to avoid additional charges.</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Use resume capability</p>
                    <p class="text-sm text-gray-600">Choose download methods that support resuming interrupted downloads.</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Check file integrity</p>
                    <p class="text-sm text-gray-600">Verify checksums or hashes after download to ensure file completeness.</p>
                </div>
            </div>
        </div>
    `;
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