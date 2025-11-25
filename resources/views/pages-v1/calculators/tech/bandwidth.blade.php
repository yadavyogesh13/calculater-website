@extends('layouts.app')

@section('title', 'Bandwidth Calculator | Internet Speed Requirements | CalculaterTools')

@section('meta-description', 'Calculate your internet bandwidth needs for streaming, gaming, video calls, and more. Estimate required speeds for multiple devices and activities.')

@section('keywords', 'bandwidth calculator, internet speed calculator, bandwidth requirements, streaming speed, gaming bandwidth, video call bandwidth')

@section('canonical', url('/calculators/bandwidth'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Bandwidth Calculator",
    "description": "Calculate internet bandwidth requirements for various online activities",
    "url": "{{ url('/calculators/bandwidth') }}",
    "operatingSystem": "Any",
    "applicationCategory": "UtilityApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

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
                        <a href="#internet" class="text-blue-600 hover:text-blue-800 transition duration-150">Internet Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Bandwidth Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Bandwidth Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your internet speed requirements for streaming, gaming, video calls, and more. Perfect for home networks, offices, and gaming setups.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Bandwidth Requirements</h2>
                        <p class="text-gray-600 mb-6">Select your online activities and number of users</p>
                        
                        <form id="bandwidthCalculatorForm" class="space-y-6">
                            <!-- Activities Selection -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">Online Activities</h3>
                                <p class="text-xs text-green-700 mb-4">Select all activities that will be happening simultaneously</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Streaming Activities -->
                                    <div class="space-y-3">
                                        <div class="activity-item" data-activity="streaming-hd" data-bandwidth="5">
                                            <div class="flex items-center justify-between p-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 cursor-pointer">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-play-circle text-blue-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-800">HD Video Streaming</div>
                                                        <div class="text-xs text-gray-500">Netflix, YouTube, etc.</div>
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold text-green-600">5 Mbps</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item" data-activity="streaming-4k" data-bandwidth="25">
                                            <div class="flex items-center justify-between p-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 cursor-pointer">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-hd text-purple-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-800">4K Ultra HD Streaming</div>
                                                        <div class="text-xs text-gray-500">4K movies, premium content</div>
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold text-green-600">25 Mbps</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item" data-activity="streaming-music" data-bandwidth="1">
                                            <div class="flex items-center justify-between p-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 cursor-pointer">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-music text-red-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-800">Music Streaming</div>
                                                        <div class="text-xs text-gray-500">Spotify, Apple Music</div>
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold text-green-600">1 Mbps</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Gaming & Communication -->
                                    <div class="space-y-3">
                                        <div class="activity-item" data-activity="online-gaming" data-bandwidth="3">
                                            <div class="flex items-center justify-between p-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 cursor-pointer">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-gamepad text-orange-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-800">Online Gaming</div>
                                                        <div class="text-xs text-gray-500">Fortnite, COD, etc.</div>
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold text-green-600">3 Mbps</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item" data-activity="video-calls" data-bandwidth="2">
                                            <div class="flex items-center justify-between p-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 cursor-pointer">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-video text-indigo-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-800">Video Calls</div>
                                                        <div class="text-xs text-gray-500">Zoom, Teams, Meet</div>
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold text-green-600">2 Mbps</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item" data-activity="browsing" data-bandwidth="1">
                                            <div class="flex items-center justify-between p-3 bg-white border border-green-200 rounded-lg hover:border-green-400 transition duration-200 cursor-pointer">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-globe text-gray-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium text-gray-800">Web Browsing</div>
                                                        <div class="text-xs text-gray-500">Email, social media</div>
                                                    </div>
                                                </div>
                                                <div class="text-sm font-semibold text-green-600">1 Mbps</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- User Configuration -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Network Configuration</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="simultaneousUsers" class="block text-xs font-medium text-blue-700 mb-2">
                                            Simultaneous Users
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="range" 
                                                id="simultaneousUsers" 
                                                min="1" 
                                                max="10" 
                                                value="3"
                                                class="w-full h-2 bg-blue-200 rounded-lg appearance-none cursor-pointer"
                                            >
                                            <div class="flex justify-between text-xs text-blue-600 mt-1">
                                                <span>1</span>
                                                <span id="usersDisplay">3 users</span>
                                                <span>10</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="safetyBuffer" class="block text-xs font-medium text-blue-700 mb-2">
                                            Safety Buffer
                                        </label>
                                        <select id="safetyBuffer" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            <option value="1.2">20% Buffer (Recommended)</option>
                                            <option value="1.1">10% Buffer</option>
                                            <option value="1.3">30% Buffer</option>
                                            <option value="1.0">No Buffer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Current Speed Test -->
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Current Speed (Optional)</h3>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="currentDownload" class="block text-xs font-medium text-purple-700 mb-2">
                                                Current Download Speed
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="currentDownload" 
                                                    class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                    placeholder="e.g., 100"
                                                    min="1"
                                                    step="1"
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">Mbps</span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="currentUpload" class="block text-xs font-medium text-purple-700 mb-2">
                                                Current Upload Speed
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="currentUpload" 
                                                    class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                    placeholder="e.g., 20"
                                                    min="1"
                                                    step="1"
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">Mbps</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button 
                                        type="button" 
                                        id="speedTestBtn"
                                        class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 px-4 rounded-lg font-semibold transition duration-300 focus:outline-none focus:ring-4 focus:ring-purple-300"
                                    >
                                        <i class="fas fa-tachometer-alt mr-2"></i>
                                        Test My Current Speed
                                    </button>
                                    
                                    <div id="speedTestResults" class="hidden bg-white rounded-lg p-3 border border-purple-200">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-purple-700">Test Results:</span>
                                            <div class="text-right">
                                                <div class="font-semibold text-purple-600" id="testDownloadSpeed">-- Mbps</div>
                                                <div class="text-xs text-gray-500">Download</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Presets -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Quick Presets</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="loadPreset('single')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm">
                                        <i class="fas fa-user text-amber-600 mr-1"></i>
                                        Single User
                                    </button>
                                    <button type="button" onclick="loadPreset('family')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm">
                                        <i class="fas fa-home text-amber-600 mr-1"></i>
                                        Family Home
                                    </button>
                                    <button type="button" onclick="loadPreset('gaming')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm">
                                        <i class="fas fa-gamepad text-amber-600 mr-1"></i>
                                        Gaming Setup
                                    </button>
                                    <button type="button" onclick="loadPreset('office')" class="py-2 px-3 bg-white border border-amber-200 rounded-lg hover:border-amber-400 transition duration-200 text-sm">
                                        <i class="fas fa-briefcase text-amber-600 mr-1"></i>
                                        Small Office
                                    </button>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="calculateBandwidth()"
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg"
                                >
                                    <i class="fas fa-calculator mr-2"></i>
                                    Calculate Bandwidth
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
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Bandwidth Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-tachometer-alt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Select activities</p>
                                <p class="text-sm">to see bandwidth requirements</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-blue-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">Speed Requirements Guide</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Email & Basic Browsing</span>
                                    <span class="font-medium">1-5 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">HD Video Streaming</span>
                                    <span class="font-medium">5-10 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">4K Streaming</span>
                                    <span class="font-medium">25 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Online Gaming</span>
                                    <span class="font-medium">3-6 Mbps</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Video Conferencing</span>
                                    <span class="font-medium">2-4 Mbps</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Speed Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recommended Internet Speeds</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="minimumSpeed">0 Mbps</div>
                            <div class="text-lg font-semibold text-gray-700">Minimum Required</div>
                            <div class="text-sm text-gray-500 mt-1">Basic functionality</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="recommendedSpeed">0 Mbps</div>
                            <div class="text-lg font-semibold text-gray-700">Recommended</div>
                            <div class="text-sm text-gray-500 mt-1">Smooth experience</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="optimalSpeed">0 Mbps</div>
                            <div class="text-lg font-semibold text-gray-700">Optimal</div>
                            <div class="text-sm text-gray-500 mt-1">Future-proof</div>
                        </div>
                    </div>
                </div>

                <!-- Speed Comparison -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Speed Comparison</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Visual Comparison -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Current vs Required Speed</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="space-y-4">
                                    <div>
                                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                                            <span>Your Current Speed</span>
                                            <span id="currentSpeedDisplay">0 Mbps</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-4">
                                            <div id="currentSpeedBar" class="bg-blue-600 h-4 rounded-full transition-all duration-500" style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                                            <span>Recommended Speed</span>
                                            <span id="recommendedSpeedDisplay">0 Mbps</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-4">
                                            <div id="recommendedSpeedBar" class="bg-green-600 h-4 rounded-full transition-all duration-500" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="speedStatus" class="mt-4 p-3 rounded-lg text-center text-sm font-semibold"></div>
                            </div>
                        </div>
                        
                        <!-- Activity Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Bandwidth Breakdown</h3>
                            <div class="space-y-3" id="activityBreakdown">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Usage Scenarios -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Common Usage Scenarios</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Single User</h3>
                            <p class="text-sm text-gray-600 mb-2">Basic browsing, streaming, email</p>
                            <div class="text-lg font-bold text-blue-600">10-25 Mbps</div>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-home text-green-600"></i>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Family Home</h3>
                            <p class="text-sm text-gray-600 mb-2">Multiple devices, HD streaming</p>
                            <div class="text-lg font-bold text-green-600">50-100 Mbps</div>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-gamepad text-purple-600"></i>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Gaming House</h3>
                            <p class="text-sm text-gray-600 mb-2">Multiple gamers, 4K streaming</p>
                            <div class="text-lg font-bold text-purple-600">100-300 Mbps</div>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-briefcase text-orange-600"></i>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">Home Office</h3>
                            <p class="text-sm text-gray-600 mb-2">Video calls, large file transfers</p>
                            <div class="text-lg font-bold text-orange-600">100-500 Mbps</div>
                        </div>
                    </div>
                </div>

                <!-- Provider Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Internet Plan Recommendations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Plan Suggestions -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Recommended Plans</h3>
                            <div class="space-y-4" id="planSuggestions">
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
            </div>

            <!-- Technical Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Bandwidth Requirements</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            What is Bandwidth?
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Bandwidth refers to the maximum amount of data that can be transmitted over an internet connection in a given amount of time, typically measured in megabits per second (Mbps).
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-arrow-down text-green-500 mt-1 mr-2"></i>
                                <span><strong>Download Speed:</strong> How fast you can receive data (streaming, browsing)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-up text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Upload Speed:</strong> How fast you can send data (video calls, file sharing)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-wifi text-purple-500 mt-1 mr-2"></i>
                                <span><strong>Simultaneous Usage:</strong> Multiple devices and activities require more bandwidth</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-green-600 mr-2"></i>
                            Bandwidth Best Practices
                        </h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Always account for multiple simultaneous users and devices</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Include a 20-30% buffer for peak usage times</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Consider future needs - internet usage typically increases over time</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Upload speed is important for video calls, gaming, and cloud backups</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Wired connections typically provide more reliable speeds than WiFi</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Bandwidth FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do I need more bandwidth than my activities require?</h3>
                        <p class="text-gray-600">Internet providers rarely deliver exactly the advertised speed consistently. Network congestion, WiFi interference, and multiple devices sharing the connection can reduce actual speeds. A 20-30% buffer ensures smooth performance during peak usage.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How many devices can use my internet at once?</h3>
                        <p class="text-gray-600">It depends on your activities. Basic browsing uses 1-5 Mbps per device, while 4K streaming uses 25 Mbps. A 100 Mbps connection can typically support 3-4 simultaneous 4K streams or 10+ devices doing light browsing.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Is upload speed important?</h3>
                        <p class="text-gray-600">Yes! Upload speed affects video calls, online gaming, cloud backups, and file sharing. While most activities are download-heavy, insufficient upload speed can cause poor video call quality and gaming lag.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does WiFi affect my internet speed?</h3>
                        <p class="text-gray-600">WiFi typically reduces speeds by 20-50% compared to wired connections due to signal interference, distance from router, and physical obstructions. For bandwidth-intensive activities, consider using Ethernet cables.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I upgrade my internet plan?</h3>
                        <p class="text-gray-600">Consider upgrading if you experience frequent buffering, slow downloads, poor video call quality, or if you've added new devices/activities to your network. Also upgrade before major changes like adding smart home devices or starting remote work.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-download text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Download Time Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate file download times</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-wifi text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">WiFi Range Calculator</h3>
                        <p class="text-gray-600 text-sm">Estimate WiFi coverage area</p>
                    </a>
                    <a href="#" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-data text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Data Usage Calculator</h3>
                        <p class="text-gray-600 text-sm">Estimate monthly data consumption</p>
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
let selectedActivities = new Set();
let activityBandwidths = {
    'streaming-hd': 5,
    'streaming-4k': 25,
    'streaming-music': 1,
    'online-gaming': 3,
    'video-calls': 2,
    'browsing': 1
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateBandwidth(); // Calculate with default values
});

function setupEventListeners() {
    // Activity selection
    document.querySelectorAll('.activity-item').forEach(item => {
        item.addEventListener('click', function() {
            const activity = this.dataset.activity;
            
            if (selectedActivities.has(activity)) {
                selectedActivities.delete(activity);
                this.classList.remove('selected');
                this.querySelector('div').classList.remove('border-green-500', 'bg-green-50');
            } else {
                selectedActivities.add(activity);
                this.classList.add('selected');
                this.querySelector('div').classList.add('border-green-500', 'bg-green-50');
            }
            
            calculateBandwidth();
        });
    });
    
    // Users slider
    const usersSlider = document.getElementById('simultaneousUsers');
    const usersDisplay = document.getElementById('usersDisplay');
    
    usersSlider.addEventListener('input', function() {
        usersDisplay.textContent = `${this.value} user${this.value > 1 ? 's' : ''}`;
        calculateBandwidth();
    });
    
    // Current speed inputs
    document.getElementById('currentDownload').addEventListener('input', calculateBandwidth);
    document.getElementById('currentUpload').addEventListener('input', calculateBandwidth);
    
    // Safety buffer
    document.getElementById('safetyBuffer').addEventListener('change', calculateBandwidth);
    
    // Speed test button
    document.getElementById('speedTestBtn').addEventListener('click', function() {
        runSpeedTest();
    });
}

function calculateBandwidth() {
    let totalBandwidth = 0;
    const users = parseInt(document.getElementById('simultaneousUsers').value);
    const safetyBuffer = parseFloat(document.getElementById('safetyBuffer').value);
    
    // Calculate total bandwidth from selected activities
    selectedActivities.forEach(activity => {
        totalBandwidth += activityBandwidths[activity];
    });
    
    // Apply user multiplier
    totalBandwidth *= users;
    
    // Apply safety buffer
    totalBandwidth *= safetyBuffer;
    
    // Calculate speed recommendations
    const minimumSpeed = Math.max(10, Math.round(totalBandwidth * 0.8));
    const recommendedSpeed = Math.max(15, Math.round(totalBandwidth));
    const optimalSpeed = Math.max(25, Math.round(totalBandwidth * 1.3));
    
    // Update results
    displayResults(minimumSpeed, recommendedSpeed, optimalSpeed);
    
    // Show detailed results
    document.getElementById('detailedResults').classList.remove('hidden');
}

function displayResults(minimum, recommended, optimal) {
    const resultsDiv = document.getElementById('results');
    
    // Update main results card
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="text-center mb-4">
                <div class="text-lg font-bold text-gray-700 mb-2">Based on your selected activities</div>
                <div class="text-sm text-gray-500">${selectedActivities.size} activities × ${document.getElementById('simultaneousUsers').value} users</div>
            </div>
            
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg p-4 text-white text-center">
                <div class="text-2xl font-bold mb-1">${recommended} Mbps</div>
                <div class="text-sm opacity-90">Recommended Download Speed</div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 text-center">
                <div class="bg-green-50 rounded-lg p-3">
                    <div class="text-sm text-green-600 font-semibold">Minimum</div>
                    <div class="text-lg font-bold text-gray-800">${minimum} Mbps</div>
                </div>
                <div class="bg-purple-50 rounded-lg p-3">
                    <div class="text-sm text-purple-600 font-semibold">Optimal</div>
                    <div class="text-lg font-bold text-gray-800">${optimal} Mbps</div>
                </div>
            </div>
        </div>
    `;
    
    // Update detailed results
    updateDetailedResults(minimum, recommended, optimal);
}

function updateDetailedResults(minimum, recommended, optimal) {
    // Update speed numbers
    document.getElementById('minimumSpeed').textContent = `${minimum} Mbps`;
    document.getElementById('recommendedSpeed').textContent = `${recommended} Mbps`;
    document.getElementById('optimalSpeed').textContent = `${optimal} Mbps`;
    
    // Update speed comparison
    updateSpeedComparison(recommended);
    
    // Update activity breakdown
    updateActivityBreakdown();
    
    // Update plan suggestions
    updatePlanSuggestions(recommended);
    
    // Update optimization tips
    updateOptimizationTips();
}

function updateSpeedComparison(recommendedSpeed) {
    const currentDownload = parseInt(document.getElementById('currentDownload').value) || 0;
    const maxSpeed = Math.max(recommendedSpeed, currentDownload, 100);
    
    // Update displays
    document.getElementById('currentSpeedDisplay').textContent = `${currentDownload} Mbps`;
    document.getElementById('recommendedSpeedDisplay').textContent = `${recommendedSpeed} Mbps`;
    
    // Update progress bars
    const currentPercent = Math.min(100, (currentDownload / maxSpeed) * 100);
    const recommendedPercent = Math.min(100, (recommendedSpeed / maxSpeed) * 100);
    
    document.getElementById('currentSpeedBar').style.width = `${currentPercent}%`;
    document.getElementById('recommendedSpeedBar').style.width = `${recommendedPercent}%`;
    
    // Update status message
    const statusDiv = document.getElementById('speedStatus');
    if (currentDownload >= recommendedSpeed) {
        statusDiv.className = 'mt-4 p-3 rounded-lg text-center text-sm font-semibold bg-green-100 text-green-700';
        statusDiv.innerHTML = '<i class="fas fa-check-circle mr-1"></i> Your current speed meets recommendations';
    } else if (currentDownload >= recommendedSpeed * 0.7) {
        statusDiv.className = 'mt-4 p-3 rounded-lg text-center text-sm font-semibold bg-yellow-100 text-yellow-700';
        statusDiv.innerHTML = '<i class="fas fa-exclamation-triangle mr-1"></i> Your speed is close to recommendations';
    } else {
        statusDiv.className = 'mt-4 p-3 rounded-lg text-center text-sm font-semibold bg-red-100 text-red-700';
        statusDiv.innerHTML = '<i class="fas fa-times-circle mr-1"></i> Consider upgrading your internet plan';
    }
}

function updateActivityBreakdown() {
    const breakdownDiv = document.getElementById('activityBreakdown');
    const users = parseInt(document.getElementById('simultaneousUsers').value);
    let breakdownHtml = '';
    
    if (selectedActivities.size === 0) {
        breakdownHtml = '<p class="text-gray-500 text-center py-4">No activities selected</p>';
    } else {
        selectedActivities.forEach(activity => {
            const bandwidth = activityBandwidths[activity];
            const totalBandwidth = bandwidth * users;
            
            breakdownHtml += `
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600">${getActivityName(activity)}</span>
                    <div class="text-right">
                        <div class="font-medium text-gray-800">${totalBandwidth} Mbps</div>
                        <div class="text-xs text-gray-500">${bandwidth} Mbps × ${users}</div>
                    </div>
                </div>
            `;
        });
    }
    
    breakdownDiv.innerHTML = breakdownHtml;
}

function getActivityName(activityKey) {
    const names = {
        'streaming-hd': 'HD Video Streaming',
        'streaming-4k': '4K Ultra HD Streaming',
        'streaming-music': 'Music Streaming',
        'online-gaming': 'Online Gaming',
        'video-calls': 'Video Calls',
        'browsing': 'Web Browsing'
    };
    return names[activityKey] || activityKey;
}

function updatePlanSuggestions(recommendedSpeed) {
    const suggestionsDiv = document.getElementById('planSuggestions');
    let suggestionsHtml = '';
    
    const plans = [
        { speed: '25-50 Mbps', price: '$30-50', suitable: recommendedSpeed <= 50, description: 'Basic plans for light usage' },
        { speed: '50-100 Mbps', price: '$50-70', suitable: recommendedSpeed > 50 && recommendedSpeed <= 100, description: 'Good for most families' },
        { speed: '100-300 Mbps', price: '$70-100', suitable: recommendedSpeed > 100 && recommendedSpeed <= 300, description: 'Ideal for gaming and 4K streaming' },
        { speed: '300+ Mbps', price: '$100+', suitable: recommendedSpeed > 300, description: 'For heavy usage and multiple users' }
    ];
    
    plans.forEach(plan => {
        const highlightClass = plan.suitable ? 'border-green-500 bg-green-50' : 'border-gray-200';
        suggestionsHtml += `
            <div class="border rounded-lg p-4 ${highlightClass}">
                <div class="flex justify-between items-start mb-2">
                    <div class="font-semibold text-gray-800">${plan.speed}</div>
                    <div class="text-sm font-medium text-blue-600">${plan.price}/mo</div>
                </div>
                <p class="text-sm text-gray-600">${plan.description}</p>
                ${plan.suitable ? '<div class="mt-2 text-xs text-green-600 font-semibold"><i class="fas fa-check mr-1"></i>Matches your needs</div>' : ''}
            </div>
        `;
    });
    
    suggestionsDiv.innerHTML = suggestionsHtml;
}

function updateOptimizationTips() {
    const tipsDiv = document.getElementById('optimizationTips');
    const users = parseInt(document.getElementById('simultaneousUsers').value);
    
    let tipsHtml = '';
    
    const tips = [
        { icon: 'wifi', text: 'Use 5GHz WiFi for less interference and better speeds', condition: true },
        { icon: 'ethernet', text: 'Connect gaming consoles and streaming devices via Ethernet', condition: selectedActivities.has('online-gaming') || selectedActivities.has('streaming-4k') },
        { icon: 'router', text: 'Place router centrally and elevate it for better coverage', condition: users > 2 },
        { icon: 'download', text: 'Schedule large downloads during off-peak hours', condition: true },
        { icon: 'video', text: 'Lower video quality during video calls if experiencing issues', condition: selectedActivities.has('video-calls') }
    ];
    
    tips.forEach(tip => {
        if (tip.condition) {
            tipsHtml += `
                <div class="flex items-start space-x-3">
                    <i class="fas fa-${tip.icon} text-blue-500 mt-1"></i>
                    <div>
                        <p class="text-sm text-gray-700">${tip.text}</p>
                    </div>
                </div>
            `;
        }
    });
    
    tipsDiv.innerHTML = tipsHtml;
}

function runSpeedTest() {
    const btn = document.getElementById('speedTestBtn');
    const resultsDiv = document.getElementById('speedTestResults');
    
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Testing...';
    btn.disabled = true;
    
    // Simulate speed test (in real implementation, this would use a speed test API)
    setTimeout(() => {
        const downloadSpeed = Math.floor(Math.random() * 200) + 10;
        const uploadSpeed = Math.floor(downloadSpeed * 0.2) + 5;
        
        document.getElementById('testDownloadSpeed').textContent = `${downloadSpeed} Mbps`;
        document.getElementById('currentDownload').value = downloadSpeed;
        document.getElementById('currentUpload').value = uploadSpeed;
        
        resultsDiv.classList.remove('hidden');
        
        btn.innerHTML = '<i class="fas fa-tachometer-alt mr-2"></i>Test My Current Speed';
        btn.disabled = false;
        
        calculateBandwidth();
    }, 3000);
}

function loadPreset(preset) {
    // Clear current selections
    selectedActivities.clear();
    document.querySelectorAll('.activity-item').forEach(item => {
        item.classList.remove('selected');
        item.querySelector('div').classList.remove('border-green-500', 'bg-green-50');
    });
    
    // Set users
    document.getElementById('simultaneousUsers').value = 1;
    document.getElementById('usersDisplay').textContent = '1 user';
    
    // Load preset activities
    const presets = {
        'single': ['streaming-hd', 'browsing'],
        'family': ['streaming-4k', 'streaming-hd', 'video-calls', 'browsing'],
        'gaming': ['streaming-4k', 'online-gaming', 'video-calls'],
        'office': ['video-calls', 'browsing', 'streaming-hd']
    };
    
    if (presets[preset]) {
        presets[preset].forEach(activity => {
            selectedActivities.add(activity);
            const element = document.querySelector(`[data-activity="${activity}"]`);
            if (element) {
                element.classList.add('selected');
                element.querySelector('div').classList.add('border-green-500', 'bg-green-50');
            }
        });
        
        // Set appropriate user count
        if (preset === 'family') {
            document.getElementById('simultaneousUsers').value = 4;
            document.getElementById('usersDisplay').textContent = '4 users';
        } else if (preset === 'office') {
            document.getElementById('simultaneousUsers').value = 3;
            document.getElementById('usersDisplay').textContent = '3 users';
        }
    }
    
    calculateBandwidth();
}

function resetCalculator() {
    selectedActivities.clear();
    document.querySelectorAll('.activity-item').forEach(item => {
        item.classList.remove('selected');
        item.querySelector('div').classList.remove('border-green-500', 'bg-green-50');
    });
    
    document.getElementById('simultaneousUsers').value = 3;
    document.getElementById('usersDisplay').textContent = '3 users';
    document.getElementById('currentDownload').value = '';
    document.getElementById('currentUpload').value = '';
    document.getElementById('safetyBuffer').value = '1.2';
    document.getElementById('speedTestResults').classList.add('hidden');
    
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-tachometer-alt text-5xl mb-4"></i>
            <p class="text-lg font-medium">Select activities</p>
            <p class="text-sm">to see bandwidth requirements</p>
        </div>
    `;
    
    document.getElementById('detailedResults').classList.add('hidden');
}
</script>
@endsection