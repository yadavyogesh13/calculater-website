@extends('layouts.app')

@section('title', 'IP Subnet Calculator | Network Subnetting Tool | CalculaterTools')

@section('meta-description', 'Free IP subnet calculator to calculate subnet masks, network addresses, broadcast addresses, and more. Perfect for network administrators and IT professionals.')

@section('keywords', 'ip subnet calculator, subnet mask calculator, network calculator, CIDR calculator, IP addressing, network subnetting')

@section('canonical', url('/calculators/ip-subnet-calculator'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "IP Subnet Calculator",
    "description": "Calculate subnet masks, network addresses, broadcast addresses, and IP ranges",
    "url": "{{ url('/calculators/ip-subnet-calculator') }}",
    "operatingSystem": "Any",
    "applicationCategory": "NetworkApplication",
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
                        <a href="#network" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Network Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">IP Subnet Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">IP Subnet Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate subnet masks, network addresses, broadcast addresses, and IP ranges. Essential tool for network administrators and IT professionals.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Subnet Calculator</h2>
                        <p class="text-gray-600 mb-6">Enter IP address and subnet information</p>
                        
                        <form id="subnetCalculatorForm" class="space-y-6">
                            <!-- IP Address Input -->
                            <div class="bg-green-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-green-800 mb-3">IP Address</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="ipAddress" class="block text-xs font-medium text-green-700 mb-2">
                                            IP Address
                                        </label>
                                        <input 
                                            type="text" 
                                            id="ipAddress" 
                                            class="w-full px-4 py-3 text-lg border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 font-mono"
                                            placeholder="e.g., 192.168.1.1"
                                            value="192.168.1.1"
                                            required
                                        >
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="subnetMethod" class="block text-xs font-medium text-green-700 mb-2">
                                                Subnet Specification Method
                                            </label>
                                            <select id="subnetMethod" class="w-full px-3 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200">
                                                <option value="cidr" selected>CIDR Notation</option>
                                                <option value="mask">Subnet Mask</option>
                                                <option value="hosts">Number of Hosts</option>
                                                <option value="networks">Number of Subnets</option>
                                            </select>
                                        </div>
                                        <div id="cidrContainer">
                                            <label for="cidr" class="block text-xs font-medium text-green-700 mb-2">
                                                CIDR Notation
                                            </label>
                                            <div class="relative">
                                                <input 
                                                    type="number" 
                                                    id="cidr" 
                                                    class="w-full pl-4 pr-12 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200"
                                                    placeholder="e.g., 24" 
                                                    min="1" 
                                                    max="32" 
                                                    step="1"
                                                    value="24"
                                                    required
                                                >
                                                <span class="absolute right-3 top-2 text-gray-500 text-sm">/</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Subnet Mask Input -->
                            <div id="maskContainer" class="bg-blue-50 rounded-lg p-4 hidden">
                                <h3 class="text-sm font-semibold text-blue-800 mb-3">Subnet Mask</h3>
                                <div>
                                    <label for="subnetMask" class="block text-xs font-medium text-blue-700 mb-2">
                                        Subnet Mask
                                    </label>
                                    <input 
                                        type="text" 
                                        id="subnetMask" 
                                        class="w-full px-4 py-3 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 font-mono"
                                        placeholder="e.g., 255.255.255.0"
                                        value="255.255.255.0"
                                    >
                                </div>
                            </div>

                            <!-- Hosts/Networks Input -->
                            <div id="requirementsContainer" class="bg-purple-50 rounded-lg p-4 hidden">
                                <h3 class="text-sm font-semibold text-purple-800 mb-3">Network Requirements</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div id="hostsContainer">
                                        <label for="requiredHosts" class="block text-xs font-medium text-purple-700 mb-2">
                                            Required Hosts per Subnet
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="requiredHosts" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="e.g., 50" 
                                                min="2" 
                                                max="16777214"
                                                step="1"
                                                value="50"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">hosts</span>
                                        </div>
                                    </div>
                                    <div id="networksContainer" class="hidden">
                                        <label for="requiredNetworks" class="block text-xs font-medium text-purple-700 mb-2">
                                            Required Number of Subnets
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="requiredNetworks" 
                                                class="w-full pl-4 pr-12 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                                placeholder="e.g., 8" 
                                                min="2" 
                                                max="4194304"
                                                step="1"
                                                value="8"
                                            >
                                            <span class="absolute right-3 top-2 text-gray-500 text-sm">subnets</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Advanced Options -->
                            <div class="bg-amber-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-amber-800 mb-3">Advanced Options</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="ipVersion" class="block text-xs font-medium text-amber-700 mb-2">
                                            IP Version
                                        </label>
                                        <select id="ipVersion" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                            <option value="ipv4" selected>IPv4</option>
                                            <option value="ipv6">IPv6</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="networkClass" class="block text-xs font-medium text-amber-700 mb-2">
                                            Network Class
                                        </label>
                                        <select id="networkClass" class="w-full px-3 py-2 border border-amber-200 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
                                            <option value="auto" selected>Auto-detect</option>
                                            <option value="A">Class A</option>
                                            <option value="B">Class B</option>
                                            <option value="C">Class C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showBinary" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="showBinary" class="ml-2 text-xs text-amber-700">
                                            Show binary representation
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="showWildcard" 
                                            class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                                            checked
                                        >
                                        <label for="showWildcard" class="ml-2 text-xs text-amber-700">
                                            Show wildcard mask
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Presets -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3">Common Subnet Presets</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setSubnetPreset('192.168.1.1', 24)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /24 (255.255.255.0)
                                    </button>
                                    <button type="button" onclick="setSubnetPreset('10.0.0.1', 8)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /8 (255.0.0.0)
                                    </button>
                                    <button type="button" onclick="setSubnetPreset('172.16.1.1', 16)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /16 (255.255.0.0)
                                    </button>
                                    <button type="button" onclick="setSubnetPreset('192.168.1.1', 26)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /26 (255.255.255.192)
                                    </button>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-2">
                                    <button type="button" onclick="setSubnetPreset('192.168.1.1', 28)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /28 (255.255.255.240)
                                    </button>
                                    <button type="button" onclick="setSubnetPreset('192.168.1.1', 30)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /30 (255.255.255.252)
                                    </button>
                                    <button type="button" onclick="setSubnetPreset('10.1.1.1', 22)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /22 (255.255.252.0)
                                    </button>
                                    <button type="button" onclick="setSubnetPreset('172.16.1.1', 20)" class="py-2 px-3 bg-white border border-gray-200 rounded-lg hover:border-gray-400 transition duration-200 text-sm font-mono">
                                        /20 (255.255.240.0)
                                    </button>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button 
                                    type="button" 
                                    onclick="calculateSubnet()"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                                >
                                    <i class="fas fa-calculator mr-2"></i>
                                    Calculate Subnet
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
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Subnet Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-network-wired text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter IP address</p>
                                <p class="text-sm">to see subnet information</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-indigo-50 rounded-lg">
                            <h4 class="font-semibold text-gray-800 mb-3">CIDR Reference</h4>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">/24</span>
                                    <span class="font-mono text-gray-800">255.255.255.0</span>
                                    <span class="text-gray-500">254 hosts</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">/25</span>
                                    <span class="font-mono text-gray-800">255.255.255.128</span>
                                    <span class="text-gray-500">126 hosts</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">/26</span>
                                    <span class="font-mono text-gray-800">255.255.255.192</span>
                                    <span class="text-gray-500">62 hosts</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">/27</span>
                                    <span class="font-mono text-gray-800">255.255.255.224</span>
                                    <span class="text-gray-500">30 hosts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Network Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Network Summary</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="networkSummary">
                    </div>
                </div>

                <!-- IP Address Breakdown -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">IP Address Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Binary Representation -->
                        <div id="binarySection">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Binary Representation</h3>
                            <div class="space-y-4" id="binaryRepresentation">
                            </div>
                        </div>
                        
                        <!-- Address Ranges -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Address Ranges</h3>
                            <div class="space-y-4" id="addressRanges">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subnet Details -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Subnet Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Network Properties -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Network Properties</h3>
                            <div class="space-y-4" id="networkProperties">
                            </div>
                        </div>
                        
                        <!-- Usable Range -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Usable IP Range</h3>
                            <div class="bg-green-50 rounded-lg p-4" id="usableRange">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subnetting Chart -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Subnetting Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- CIDR Chart -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">CIDR Reference Chart</h3>
                            <div class="space-y-3" id="cidrChart">
                            </div>
                        </div>
                        
                        <!-- Subnetting Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Subnetting Best Practices</h3>
                            <div class="space-y-3" id="subnettingTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Network Resources -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Network Administration Resources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-sitemap text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Network Segmentation</h3>
                        <p class="text-gray-600">Subnetting improves network performance by reducing broadcast domains and organizing devices logically.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Security</h3>
                        <p class="text-gray-600">Proper subnetting enhances security by isolating network segments and controlling traffic between them.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tachometer-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Performance</h3>
                        <p class="text-gray-600">Smaller broadcast domains reduce network congestion and improve overall network performance.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-project-diagram text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Organization</h3>
                        <p class="text-gray-600">Logical grouping of devices by department, function, or location simplifies network management.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Subnetting FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is CIDR notation?</h3>
                        <p class="text-gray-600">CIDR (Classless Inter-Domain Routing) notation represents an IP address and its associated routing prefix. It's written as IP_address/prefix_length, where prefix_length is the number of bits in the subnet mask (e.g., 192.168.1.0/24).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How do I calculate the number of usable hosts?</h3>
                        <p class="text-gray-600">Usable hosts = 2^(32 - CIDR) - 2. Subtract 2 because the network address and broadcast address cannot be assigned to hosts. For example, /24 gives 2^8 - 2 = 254 usable hosts.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between network address and broadcast address?</h3>
                        <p class="text-gray-600">The network address is the first address in a subnet and identifies the network itself. The broadcast address is the last address and is used to send data to all devices on the subnet. Neither can be assigned to individual devices.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I use different subnet masks?</h3>
                        <p class="text-gray-600">Use larger subnets (/24, /25) for user segments with many devices. Use smaller subnets (/30, /31) for point-to-point links. Medium subnets (/26-/29) work well for server segments or smaller departments.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is VLSM (Variable Length Subnet Masking)?</h3>
                        <p class="text-gray-600">VLSM allows using different subnet masks within the same network address space. This enables more efficient IP address allocation by creating subnets of different sizes based on actual host requirements.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('binary.hex.converter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-exchange-alt text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Binary/Hex Converter</h3>
                        <p class="text-gray-600 text-sm">Convert between binary and hexadecimal</p>
                    </a>
                    <a href="{{ route('bandwidth.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tachometer-alt text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Bandwidth Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate network bandwidth</p>
                    </a>
                    <a href="{{ route('password.strength.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-key text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Password Generator</h3>
                        <p class="text-gray-600 text-sm">Generate secure passwords</p>
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
let currentSubnetMethod = 'cidr';

// Common subnet masks for quick reference
const subnetMasks = {
    32: '255.255.255.255',
    31: '255.255.255.254',
    30: '255.255.255.252',
    29: '255.255.255.248',
    28: '255.255.255.240',
    27: '255.255.255.224',
    26: '255.255.255.192',
    25: '255.255.255.128',
    24: '255.255.255.0',
    23: '255.255.254.0',
    22: '255.255.252.0',
    21: '255.255.248.0',
    20: '255.255.240.0',
    19: '255.255.224.0',
    18: '255.255.192.0',
    17: '255.255.128.0',
    16: '255.255.0.0',
    15: '255.254.0.0',
    14: '255.252.0.0',
    13: '255.248.0.0',
    12: '255.240.0.0',
    11: '255.224.0.0',
    10: '255.192.0.0',
    9: '255.128.0.0',
    8: '255.0.0.0',
    7: '254.0.0.0',
    6: '252.0.0.0',
    5: '248.0.0.0',
    4: '240.0.0.0',
    3: '224.0.0.0',
    2: '192.0.0.0',
    1: '128.0.0.0'
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateSubnet(); // Calculate with default values
});

function setupEventListeners() {
    // Handle subnet method changes
    document.getElementById('subnetMethod').addEventListener('change', function() {
        currentSubnetMethod = this.value;
        updateInputVisibility();
        calculateSubnet();
    });
    
    // Auto-calculate on input changes with debouncing
    document.getElementById('ipAddress').addEventListener('input', debounce(calculateSubnet, 500));
    document.getElementById('cidr').addEventListener('input', debounce(calculateSubnet, 300));
    document.getElementById('subnetMask').addEventListener('input', debounce(calculateSubnet, 500));
    document.getElementById('requiredHosts').addEventListener('input', debounce(calculateSubnet, 300));
    document.getElementById('requiredNetworks').addEventListener('input', debounce(calculateSubnet, 300));
    
    // Update options
    document.getElementById('showBinary').addEventListener('change', calculateSubnet);
    document.getElementById('showWildcard').addEventListener('change', calculateSubnet);
}

function updateInputVisibility() {
    // Hide all input containers first
    document.getElementById('cidrContainer').classList.add('hidden');
    document.getElementById('maskContainer').classList.add('hidden');
    document.getElementById('requirementsContainer').classList.add('hidden');
    document.getElementById('hostsContainer').classList.add('hidden');
    document.getElementById('networksContainer').classList.add('hidden');
    
    // Show relevant containers based on selected method
    switch(currentSubnetMethod) {
        case 'cidr':
            document.getElementById('cidrContainer').classList.remove('hidden');
            break;
        case 'mask':
            document.getElementById('maskContainer').classList.remove('hidden');
            break;
        case 'hosts':
            document.getElementById('requirementsContainer').classList.remove('hidden');
            document.getElementById('hostsContainer').classList.remove('hidden');
            break;
        case 'networks':
            document.getElementById('requirementsContainer').classList.remove('hidden');
            document.getElementById('networksContainer').classList.remove('hidden');
            break;
    }
}

function setSubnetPreset(ip, cidr) {
    document.getElementById('ipAddress').value = ip;
    document.getElementById('cidr').value = cidr;
    document.getElementById('subnetMethod').value = 'cidr';
    currentSubnetMethod = 'cidr';
    updateInputVisibility();
    calculateSubnet();
}

function clearAll() {
    document.getElementById('ipAddress').value = '';
    document.getElementById('cidr').value = '24';
    document.getElementById('subnetMask').value = '255.255.255.0';
    document.getElementById('requiredHosts').value = '50';
    document.getElementById('requiredNetworks').value = '8';
    
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-gray-400">
            <i class="fas fa-network-wired text-5xl mb-4"></i>
            <p class="text-lg font-medium">Enter IP address</p>
            <p class="text-sm">to see subnet information</p>
        </div>
    `;
    document.getElementById('detailedResults').classList.add('hidden');
}

function ipToBinary(ip) {
    return ip.split('.').map(octet => {
        return parseInt(octet).toString(2).padStart(8, '0');
    }).join('.');
}

function binaryToIp(binary) {
    return binary.split('.').map(octet => {
        return parseInt(octet, 2);
    }).join('.');
}

function cidrToMask(cidr) {
    return subnetMasks[cidr] || '255.255.255.255';
}

function maskToCidr(mask) {
    const binary = mask.split('.').map(octet => {
        return parseInt(octet).toString(2).padStart(8, '0');
    }).join('');
    
    return binary.split('1').length - 1;
}

function calculateSubnetMaskFromHosts(requiredHosts) {
    const requiredBits = Math.ceil(Math.log2(requiredHosts + 2));
    return 32 - requiredBits;
}

function calculateSubnetMaskFromNetworks(requiredNetworks) {
    const requiredBits = Math.ceil(Math.log2(requiredNetworks));
    const baseCidr = getBaseCidr(document.getElementById('ipAddress').value);
    return baseCidr + requiredBits;
}

function getBaseCidr(ip) {
    const firstOctet = parseInt(ip.split('.')[0]);
    
    if (firstOctet <= 127) return 8;      // Class A
    if (firstOctet <= 191) return 16;     // Class B
    if (firstOctet <= 223) return 24;     // Class C
    return 32;                            // Class D/E
}

function validateIpAddress(ip) {
    const ipRegex = /^(\d{1,3}\.){3}\d{1,3}$/;
    if (!ipRegex.test(ip)) {
        return { valid: false, error: 'Invalid IP address format' };
    }
    
    const octets = ip.split('.');
    for (let octet of octets) {
        const num = parseInt(octet);
        if (num < 0 || num > 255) {
            return { valid: false, error: 'IP address octets must be between 0 and 255' };
        }
    }
    
    return { valid: true, error: null };
}

function calculateSubnet() {
    const ip = document.getElementById('ipAddress').value.trim();
    const validation = validateIpAddress(ip);
    
    if (!validation.valid) {
        showError(validation.error);
        return;
    }
    
    let cidr;
    
    // Determine CIDR based on selected method
    switch(currentSubnetMethod) {
        case 'cidr':
            cidr = parseInt(document.getElementById('cidr').value);
            break;
        case 'mask':
            const mask = document.getElementById('subnetMask').value;
            cidr = maskToCidr(mask);
            document.getElementById('cidr').value = cidr;
            break;
        case 'hosts':
            const requiredHosts = parseInt(document.getElementById('requiredHosts').value);
            cidr = calculateSubnetMaskFromHosts(requiredHosts);
            document.getElementById('cidr').value = cidr;
            break;
        case 'networks':
            const requiredNetworks = parseInt(document.getElementById('requiredNetworks').value);
            cidr = calculateSubnetMaskFromNetworks(requiredNetworks);
            document.getElementById('cidr').value = cidr;
            break;
    }
    
    // Ensure CIDR is within valid range
    if (cidr < 1 || cidr > 32) {
        showError('CIDR must be between 1 and 32');
        return;
    }
    
    // Calculate subnet information
    const subnetInfo = calculateSubnetInfo(ip, cidr);
    
    // Display results
    displayResults(subnetInfo);
    displayDetailedResults(subnetInfo);
    
    // Show detailed results section
    document.getElementById('detailedResults').classList.remove('hidden');
}

function calculateSubnetInfo(ip, cidr) {
    const mask = cidrToMask(cidr);
    const wildcard = calculateWildcardMask(mask);
    const network = calculateNetworkAddress(ip, mask);
    const broadcast = calculateBroadcastAddress(ip, mask);
    const firstHost = calculateFirstHost(network);
    const lastHost = calculateLastHost(broadcast);
    const totalHosts = Math.pow(2, 32 - cidr);
    const usableHosts = Math.max(totalHosts - 2, 0);
    
    return {
        ip: ip,
        cidr: cidr,
        mask: mask,
        wildcard: wildcard,
        network: network,
        broadcast: broadcast,
        firstHost: firstHost,
        lastHost: lastHost,
        totalHosts: totalHosts,
        usableHosts: usableHosts,
        ipBinary: ipToBinary(ip),
        maskBinary: ipToBinary(mask),
        networkBinary: ipToBinary(network),
        broadcastBinary: ipToBinary(broadcast)
    };
}

function calculateWildcardMask(mask) {
    return mask.split('.').map(octet => {
        return 255 - parseInt(octet);
    }).join('.');
}

function calculateNetworkAddress(ip, mask) {
    const ipOctets = ip.split('.').map(Number);
    const maskOctets = mask.split('.').map(Number);
    
    return ipOctets.map((octet, i) => {
        return octet & maskOctets[i];
    }).join('.');
}

function calculateBroadcastAddress(ip, mask) {
    const ipOctets = ip.split('.').map(Number);
    const maskOctets = mask.split('.').map(Number);
    const wildcardOctets = maskOctets.map(octet => 255 - octet);
    
    return ipOctets.map((octet, i) => {
        return (octet & maskOctets[i]) | wildcardOctets[i];
    }).join('.');
}

function calculateFirstHost(network) {
    const octets = network.split('.').map(Number);
    octets[3] += 1;
    return octets.join('.');
}

function calculateLastHost(broadcast) {
    const octets = broadcast.split('.').map(Number);
    octets[3] -= 1;
    return octets.join('.');
}

function displayResults(info) {
    const resultsDiv = document.getElementById('results');
    
    resultsDiv.innerHTML = `
        <div class="space-y-4">
            <div class="text-center mb-4">
                <div class="text-lg font-bold text-gray-700 mb-1 font-mono">${info.ip}/${info.cidr}</div>
                <div class="text-sm text-gray-500">Network Address</div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div class="bg-green-50 rounded p-2">
                    <div class="text-green-600 text-xs font-semibold">Usable Hosts</div>
                    <div class="font-bold text-gray-800">${info.usableHosts.toLocaleString()}</div>
                </div>
                <div class="bg-blue-50 rounded p-2">
                    <div class="text-blue-600 text-xs font-semibold">Subnet Mask</div>
                    <div class="font-bold text-gray-800 font-mono">${info.mask}</div>
                </div>
            </div>
            
            <div class="text-xs text-gray-600 space-y-1">
                <div class="flex justify-between">
                    <span>First Host:</span>
                    <span class="font-mono">${info.firstHost}</span>
                </div>
                <div class="flex justify-between">
                    <span>Last Host:</span>
                    <span class="font-mono">${info.lastHost}</span>
                </div>
                <div class="flex justify-between">
                    <span>Broadcast:</span>
                    <span class="font-mono">${info.broadcast}</span>
                </div>
            </div>
        </div>
    `;
}

function displayDetailedResults(info) {
    // Update network summary
    updateNetworkSummary(info);
    
    // Update binary representation
    if (document.getElementById('showBinary').checked) {
        updateBinaryRepresentation(info);
        document.getElementById('binarySection').classList.remove('hidden');
    } else {
        document.getElementById('binarySection').classList.add('hidden');
    }
    
    // Update address ranges
    updateAddressRanges(info);
    
    // Update network properties
    updateNetworkProperties(info);
    
    // Update usable range
    updateUsableRange(info);
    
    // Update CIDR chart
    updateCidrChart();
    
    // Update subnetting tips
    updateSubnettingTips();
}

function updateNetworkSummary(info) {
    const summaryDiv = document.getElementById('networkSummary');
    
    summaryDiv.innerHTML = `
        <div class="text-center p-4 bg-green-50 rounded-lg border border-green-200">
            <div class="text-2xl font-bold text-green-600 mb-2">${info.usableHosts.toLocaleString()}</div>
            <div class="text-lg font-semibold text-gray-700">Usable Hosts</div>
            <div class="text-sm text-gray-500 mt-1">${info.totalHosts.toLocaleString()} total</div>
        </div>
        
        <div class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="text-2xl font-bold text-blue-600 mb-2 font-mono">/${info.cidr}</div>
            <div class="text-lg font-semibold text-gray-700">CIDR</div>
            <div class="text-sm text-gray-500 mt-1">Prefix Length</div>
        </div>
        
        <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
            <div class="text-2xl font-bold text-purple-600 mb-2 font-mono">${info.mask}</div>
            <div class="text-lg font-semibold text-gray-700">Subnet Mask</div>
            <div class="text-sm text-gray-500 mt-1">Network Mask</div>
        </div>
        
        <div class="text-center p-4 bg-amber-50 rounded-lg border border-amber-200">
            <div class="text-2xl font-bold text-amber-600 mb-2 font-mono">${info.network}</div>
            <div class="text-lg font-semibold text-gray-700">Network Address</div>
            <div class="text-sm text-gray-500 mt-1">Base Address</div>
        </div>
    `;
}

function updateBinaryRepresentation(info) {
    const binaryDiv = document.getElementById('binaryRepresentation');
    
    let binaryHtml = `
        <div class="space-y-3">
            <div>
                <div class="text-sm text-gray-600 mb-1">IP Address:</div>
                <div class="font-mono text-sm bg-gray-100 p-2 rounded">${info.ipBinary}</div>
            </div>
            <div>
                <div class="text-sm text-gray-600 mb-1">Subnet Mask:</div>
                <div class="font-mono text-sm bg-gray-100 p-2 rounded">${info.maskBinary}</div>
            </div>
    `;
    
    if (document.getElementById('showWildcard').checked) {
        const wildcardBinary = ipToBinary(info.wildcard);
        binaryHtml += `
            <div>
                <div class="text-sm text-gray-600 mb-1">Wildcard Mask:</div>
                <div class="font-mono text-sm bg-gray-100 p-2 rounded">${wildcardBinary}</div>
            </div>
        `;
    }
    
    binaryHtml += `
            <div>
                <div class="text-sm text-gray-600 mb-1">Network Address:</div>
                <div class="font-mono text-sm bg-gray-100 p-2 rounded">${info.networkBinary}</div>
            </div>
            <div>
                <div class="text-sm text-gray-600 mb-1">Broadcast Address:</div>
                <div class="font-mono text-sm bg-gray-100 p-2 rounded">${info.broadcastBinary}</div>
            </div>
        </div>
    `;
    
    binaryDiv.innerHTML = binaryHtml;
}

function updateAddressRanges(info) {
    const rangesDiv = document.getElementById('addressRanges');
    
    rangesDiv.innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Network Address</span>
                <span class="font-mono font-medium text-gray-800">${info.network}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">First Usable Host</span>
                <span class="font-mono font-medium text-green-600">${info.firstHost}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Last Usable Host</span>
                <span class="font-mono font-medium text-green-600">${info.lastHost}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Broadcast Address</span>
                <span class="font-mono font-medium text-red-600">${info.broadcast}</span>
            </div>
        </div>
    `;
}

function updateNetworkProperties(info) {
    const propertiesDiv = document.getElementById('networkProperties');
    
    const networkClass = getNetworkClass(info.ip);
    const ipType = getIpType(info.ip);
    
    propertiesDiv.innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">IP Version</span>
                <span class="font-medium text-gray-800">IPv4</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Network Class</span>
                <span class="font-medium text-gray-800">${networkClass}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">IP Type</span>
                <span class="font-medium text-gray-800">${ipType}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Total Addresses</span>
                <span class="font-medium text-gray-800">${info.totalHosts.toLocaleString()}</span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="text-gray-600">Usable Addresses</span>
                <span class="font-medium text-green-600">${info.usableHosts.toLocaleString()}</span>
            </div>
            <div class="flex justify-between items-center py-2">
                <span class="text-gray-600">Address Range</span>
                <span class="font-medium text-gray-800">${info.network} - ${info.broadcast}</span>
            </div>
        </div>
    `;
}

function updateUsableRange(info) {
    const rangeDiv = document.getElementById('usableRange');
    
    rangeDiv.innerHTML = `
        <div class="text-center">
            <div class="text-lg font-bold text-green-600 mb-2 font-mono">${info.firstHost} - ${info.lastHost}</div>
            <div class="text-sm text-gray-600 mb-3">${info.usableHosts.toLocaleString()} usable IP addresses</div>
            <div class="text-xs text-gray-500">
                <div class="mb-1">Network: ${info.network}</div>
                <div>Broadcast: ${info.broadcast}</div>
            </div>
        </div>
    `;
}

function updateCidrChart() {
    const chartDiv = document.getElementById('cidrChart');
    let chartHtml = '';
    
    const commonCidrs = [32, 30, 29, 28, 27, 26, 25, 24, 23, 22, 20, 16, 8];
    
    commonCidrs.forEach(cidr => {
        const hosts = Math.pow(2, 32 - cidr) - 2;
        const mask = subnetMasks[cidr];
        
        chartHtml += `
            <div class="flex justify-between items-center py-2 border-b border-gray-200 text-sm">
                <span class="font-mono text-gray-600">/${cidr}</span>
                <span class="font-mono text-gray-800">${mask}</span>
                <span class="text-gray-500">${hosts.toLocaleString()} hosts</span>
            </div>
        `;
    });
    
    chartDiv.innerHTML = chartHtml;
}

function updateSubnettingTips() {
    const tipsDiv = document.getElementById('subnettingTips');
    
    tipsDiv.innerHTML = `
        <div class="space-y-3">
            <div class="flex items-start space-x-3">
                <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Plan for growth</p>
                    <p class="text-sm text-gray-600">Always allocate more IPs than currently needed to accommodate future expansion.</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Use consistent sizing</p>
                    <p class="text-sm text-gray-600">Standardize subnet sizes across your network for easier management.</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Document thoroughly</p>
                    <p class="text-sm text-gray-600">Maintain clear documentation of all subnets and their purposes.</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                <div>
                    <p class="font-medium text-gray-800">Consider VLAN alignment</p>
                    <p class="text-sm text-gray-600">Align subnets with VLAN boundaries for logical network segmentation.</p>
                </div>
            </div>
        </div>
    `;
}

function getNetworkClass(ip) {
    const firstOctet = parseInt(ip.split('.')[0]);
    
    if (firstOctet <= 127) return 'A';
    if (firstOctet <= 191) return 'B';
    if (firstOctet <= 223) return 'C';
    if (firstOctet <= 239) return 'D (Multicast)';
    return 'E (Experimental)';
}

function getIpType(ip) {
    const octets = ip.split('.').map(Number);
    
    // Private IP ranges
    if (octets[0] === 10) return 'Private';
    if (octets[0] === 172 && octets[1] >= 16 && octets[1] <= 31) return 'Private';
    if (octets[0] === 192 && octets[1] === 168) return 'Private';
    
    // Localhost
    if (octets[0] === 127) return 'Loopback';
    
    // APIPA
    if (octets[0] === 169 && octets[1] === 254) return 'APIPA';
    
    return 'Public';
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