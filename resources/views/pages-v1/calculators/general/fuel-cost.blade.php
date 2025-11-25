@extends('layouts.app')

@section('title', 'Fuel Cost Calculator - Calculate Trip Fuel Costs & Consumption | CalculaterTools')

@section('meta-description', 'Free fuel cost calculator to calculate trip fuel expenses, fuel consumption, and compare costs between different vehicles. Plan your travel budget efficiently.')

@section('keywords', 'fuel cost calculator, gas cost calculator, trip cost calculator, fuel consumption, mpg calculator, travel cost calculator')

@section('canonical', url('/calculators/fuel-cost'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Fuel Cost Calculator",
    "description": "Calculate fuel costs for trips, compare vehicle efficiency, and plan travel budgets",
    "url": "{{ url('/calculators/fuel-cost') }}",
    "operatingSystem": "Any",
    "applicationCategory": "TravelApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script> --}}

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
                        <a href="#travel" class="text-blue-600 hover:text-blue-800 transition duration-150">Travel Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Fuel Cost Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Fuel Cost Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate fuel costs for your trips, compare vehicle efficiency, and plan your travel budget efficiently.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Fuel Cost</h2>
                        <p class="text-gray-600 mb-6">Enter your trip details and vehicle information to calculate fuel costs</p>
                        
                        <form id="fuelCostForm" class="space-y-6">
                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <button type="button" onclick="setCalculationMethod('distance')" class="method-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-route text-blue-600 text-lg mb-1"></i>
                                        By Distance
                                    </button>
                                    <button type="button" onclick="setCalculationMethod('fuel')" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-gas-pump text-green-600 text-lg mb-1"></i>
                                        By Fuel Amount
                                    </button>
                                </div>
                            </div>

                            <!-- Distance Method Inputs -->
                            <div id="distanceInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="tripDistance" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Trip Distance
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="tripDistance" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 300" 
                                                min="1"
                                                max="10000"
                                                value="300"
                                            >
                                            <select id="distanceUnit" class="absolute right-3 top-3 bg-transparent border-none focus:ring-0 text-gray-500">
                                                <option value="miles">miles</option>
                                                <option value="km">km</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="fuelEfficiency" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Fuel Efficiency
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="fuelEfficiency" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 25" 
                                                min="1"
                                                max="100"
                                                step="0.1"
                                                value="25"
                                            >
                                            <select id="efficiencyUnit" class="absolute right-3 top-3 bg-transparent border-none focus:ring-0 text-gray-500">
                                                <option value="mpg">mpg</option>
                                                <option value="l_100km">L/100km</option>
                                                <option value="km_l">km/L</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fuel Amount Method Inputs -->
                            <div id="fuelInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="fuelAmount" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Fuel Amount
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="fuelAmount" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                                placeholder="e.g., 50" 
                                                min="1"
                                                max="500"
                                                step="0.1"
                                                value="50"
                                            >
                                            <select id="fuelUnit" class="absolute right-3 top-3 bg-transparent border-none focus:ring-0 text-gray-500">
                                                <option value="liters">liters</option>
                                                <option value="gallons">gallons</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-end">
                                        <p class="text-xs text-gray-500">Enter the amount of fuel needed for your trip</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Fuel Price -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="fuelPrice" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Fuel Price
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="fuelPrice" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            placeholder="e.g., 3.50" 
                                            min="0.1"
                                            max="20"
                                            step="0.01"
                                            value="3.50"
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500" id="priceUnit">$/gallon</span>
                                    </div>
                                </div>
                                <div class="flex items-end">
                                    <p class="text-xs text-gray-500">Current fuel price per unit</p>
                                </div>
                            </div>

                            <!-- Vehicle Types -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Vehicle Types
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setVehicleType('economy')" class="vehicle-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-car text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Economy Car</div>
                                        <div class="text-xs text-gray-500">25-35 mpg</div>
                                    </button>
                                    <button type="button" onclick="setVehicleType('sedan')" class="vehicle-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-car text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sedan</div>
                                        <div class="text-xs text-gray-500">20-30 mpg</div>
                                    </button>
                                    <button type="button" onclick="setVehicleType('suv')" class="vehicle-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-truck text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">SUV</div>
                                        <div class="text-xs text-gray-500">15-25 mpg</div>
                                    </button>
                                    <button type="button" onclick="setVehicleType('truck')" class="vehicle-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-truck-pickup text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Truck</div>
                                        <div class="text-xs text-gray-500">12-20 mpg</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Quick Trips -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Trips
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setQuickTrip('commute')" class="trip-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-briefcase text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Daily Commute</div>
                                        <div class="text-xs text-gray-500">30 miles</div>
                                    </button>
                                    <button type="button" onclick="setQuickTrip('weekend')" class="trip-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-umbrella-beach text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Weekend Trip</div>
                                        <div class="text-xs text-gray-500">200 miles</div>
                                    </button>
                                    <button type="button" onclick="setQuickTrip('roadtrip')" class="trip-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-road text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Road Trip</div>
                                        <div class="text-xs text-gray-500">500 miles</div>
                                    </button>
                                    <button type="button" onclick="setQuickTrip('crosscountry')" class="trip-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-globe-americas text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Cross Country</div>
                                        <div class="text-xs text-gray-500">3000 miles</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Additional Options -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-3">Additional Options</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" id="roundTrip" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Round trip</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" id="multipleVehicles" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Compare multiple vehicles</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateFuelCost()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-gas-pump mr-2"></i>
                                Calculate Fuel Cost
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Fuel Cost Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-gas-pump text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter trip details</p>
                                <p class="text-sm">to see fuel cost</p>
                            </div>
                        </div>

                        <!-- Fuel Price Trends -->
                        <div id="priceTrends" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Fuel Price Comparison</h4>
                            <div class="space-y-2 text-sm" id="trendsContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Cost Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="totalCost">$0.00</div>
                        <div class="text-blue-800 font-medium">Total Fuel Cost</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="fuelNeeded">0</div>
                        <div class="text-green-800 font-medium">Fuel Needed</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="costPerMile">$0.00</div>
                        <div class="text-purple-800 font-medium">Cost per Mile</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="tripDistanceResult">0</div>
                        <div class="text-orange-800 font-medium">Trip Distance</div>
                    </div>
                </div>

                <!-- Cost Breakdown -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Cost Breakdown</h3>
                    <div class="space-y-3 text-sm" id="breakdownContent">
                    </div>
                </div>
            </div>

            <!-- Vehicle Comparison -->
            <div id="vehicleComparison" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Vehicle Comparison</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="comparisonContent">
                    <!-- Vehicle comparison cards will be populated by JavaScript -->
                </div>
            </div>

            <!-- Fuel Efficiency Tips -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Fuel Efficiency Tips</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-tachometer-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Maintain Steady Speed</h3>
                        <p class="text-gray-600">Avoid rapid acceleration and braking. Cruise control can improve fuel efficiency by up to 14% on highways.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-car text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Proper Tire Pressure</h3>
                        <p class="text-gray-600">Under-inflated tires can reduce fuel efficiency by up to 3%. Check tire pressure monthly.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-weight text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Reduce Vehicle Weight</h3>
                        <p class="text-gray-600">Remove unnecessary items from your vehicle. Every 100 pounds reduces MPG by about 1%.</p>
                    </div>
                </div>
            </div>

            <!-- Fuel Price Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Fuel Costs</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Factors Affecting Fuel Prices</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-gas-pump text-blue-500 mt-1 mr-2"></i>
                                <span><strong>Crude Oil Prices:</strong> The largest component of fuel costs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-industry text-green-500 mt-1 mr-2"></i>
                                <span><strong>Refining Costs:</strong> Processing crude oil into gasoline</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-truck text-purple-500 mt-1 mr-2"></i>
                                <span><strong>Distribution & Marketing:</strong> Transportation and retail costs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-percentage text-red-500 mt-1 mr-2"></i>
                                <span><strong>Taxes:</strong> Federal, state, and local taxes</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Average Fuel Prices (US)</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium">Regular Gasoline</span>
                                <span class="text-blue-600 font-semibold">$3.50/gallon</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium">Diesel</span>
                                <span class="text-green-600 font-semibold">$3.80/gallon</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="font-medium">Premium Gasoline</span>
                                <span class="text-purple-600 font-semibold">$4.00/gallon</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Fuel Cost Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is the fuel cost calculation?</h3>
                        <p class="text-gray-600">The calculation provides a good estimate based on your inputs. Actual fuel consumption may vary due to driving conditions, vehicle maintenance, traffic, and weather conditions.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between MPG and L/100km?</h3>
                        <p class="text-gray-600">MPG (miles per gallon) measures distance per fuel unit (higher is better), while L/100km (liters per 100km) measures fuel consumption per distance (lower is better).</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I improve my vehicle's fuel efficiency?</h3>
                        <p class="text-gray-600">Maintain proper tire pressure, reduce vehicle weight, avoid rapid acceleration/braking, use cruise control on highways, and keep up with regular maintenance.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Do fuel prices vary by location?</h3>
                        <p class="text-gray-600">Yes, fuel prices can vary significantly by state, city, and even between different gas stations in the same area due to taxes, transportation costs, and competition.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How often should I update fuel prices in the calculator?</h3>
                        <p class="text-gray-600">Fuel prices can change daily. For accurate trip planning, check current local prices before your trip and update the calculator accordingly.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('tip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-violet-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-violet-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-violet-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tip Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate restaurant tips easily</p>
                    </a>
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-violet-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tag text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate sale prices & savings</p>
                    </a>
                    <a href="{{ route('percentage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-violet-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-emerald-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate percentages & splits</p>
                    </a>
                    {{-- <a href="{{ route('trip.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-route text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Trip Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate travel time and distances</p>
                    </a>
                    <a href="{{ route('car.cost.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-car text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Car Cost Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate total vehicle ownership costs</p>
                    </a>
                    <a href="{{ route('carbon.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-leaf text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Carbon Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your carbon footprint</p>
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
let currentMethod = 'distance';
let currentPriceUnit = '$/gallon';

// Vehicle data
const vehicleTypes = {
    'economy': { name: 'Economy Car', mpg: 30, color: 'green' },
    'sedan': { name: 'Sedan', mpg: 25, color: 'blue' },
    'suv': { name: 'SUV', mpg: 20, color: 'orange' },
    'truck': { name: 'Truck', mpg: 15, color: 'red' }
};

// Quick trip data
const quickTrips = {
    'commute': { distance: 30, name: 'Daily Commute' },
    'weekend': { distance: 200, name: 'Weekend Trip' },
    'roadtrip': { distance: 500, name: 'Road Trip' },
    'crosscountry': { distance: 3000, name: 'Cross Country' }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    updateUnitLabels();
    calculateFuelCost(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate when inputs change
    document.getElementById('tripDistance').addEventListener('input', debounce(calculateFuelCost, 300));
    document.getElementById('fuelEfficiency').addEventListener('input', debounce(calculateFuelCost, 300));
    document.getElementById('fuelAmount').addEventListener('input', debounce(calculateFuelCost, 300));
    document.getElementById('fuelPrice').addEventListener('input', debounce(calculateFuelCost, 300));
    
    // Update units when selection changes
    document.getElementById('distanceUnit').addEventListener('change', updateUnitLabels);
    document.getElementById('efficiencyUnit').addEventListener('change', updateUnitLabels);
    document.getElementById('fuelUnit').addEventListener('change', updateUnitLabels);
    
    // Round trip checkbox
    document.getElementById('roundTrip').addEventListener('change', calculateFuelCost);
    document.getElementById('multipleVehicles').addEventListener('change', calculateFuelCost);
}

function setCalculationMethod(method) {
    currentMethod = method;
    
    // Reset all buttons
    document.querySelectorAll('.method-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Set active button
    const activeButton = event.target.closest('.method-btn');
    activeButton.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    activeButton.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide input sections
    if (method === 'distance') {
        document.getElementById('distanceInputs').classList.remove('hidden');
        document.getElementById('fuelInputs').classList.add('hidden');
    } else {
        document.getElementById('distanceInputs').classList.add('hidden');
        document.getElementById('fuelInputs').classList.remove('hidden');
    }
    
    updateUnitLabels();
    calculateFuelCost();
}

function updateUnitLabels() {
    const distanceUnit = document.getElementById('distanceUnit').value;
    const efficiencyUnit = document.getElementById('efficiencyUnit').value;
    const fuelUnit = document.getElementById('fuelUnit').value;
    
    // Update price unit based on fuel unit
    if (fuelUnit === 'gallons' || efficiencyUnit === 'mpg') {
        currentPriceUnit = '$/gallon';
        document.getElementById('priceUnit').textContent = currentPriceUnit;
    } else {
        currentPriceUnit = '$/liter';
        document.getElementById('priceUnit').textContent = currentPriceUnit;
    }
    
    calculateFuelCost();
}

function setVehicleType(type) {
    const vehicle = vehicleTypes[type];
    
    // Set fuel efficiency based on selected unit
    const efficiencyUnit = document.getElementById('efficiencyUnit').value;
    let efficiencyValue;
    
    if (efficiencyUnit === 'mpg') {
        efficiencyValue = vehicle.mpg;
    } else if (efficiencyUnit === 'l_100km') {
        efficiencyValue = (235.214 / vehicle.mpg).toFixed(1); // Convert MPG to L/100km
    } else if (efficiencyUnit === 'km_l') {
        efficiencyValue = (vehicle.mpg * 0.425144).toFixed(1); // Convert MPG to km/L
    }
    
    document.getElementById('fuelEfficiency').value = efficiencyValue;
    
    // Update vehicle buttons
    document.querySelectorAll('.vehicle-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-blue-500', 'bg-blue-50', 'border-orange-500', 'bg-orange-50', 'border-red-500', 'bg-red-50');
    });
    
    event.target.classList.add(`border-${vehicle.color}-500`, `bg-${vehicle.color}-50`);
    
    calculateFuelCost();
}

function setQuickTrip(trip) {
    const tripData = quickTrips[trip];
    const distanceUnit = document.getElementById('distanceUnit').value;
    
    let distanceValue = tripData.distance;
    if (distanceUnit === 'km') {
        distanceValue = Math.round(tripData.distance * 1.60934); // Convert miles to km
    }
    
    document.getElementById('tripDistance').value = distanceValue;
    
    // Update trip buttons
    document.querySelectorAll('.trip-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50', 'border-orange-500', 'bg-orange-50');
    });
    
    const colorMap = {
        'commute': 'blue',
        'weekend': 'green',
        'roadtrip': 'purple',
        'crosscountry': 'orange'
    };
    
    event.target.classList.add(`border-${colorMap[trip]}-500`, `bg-${colorMap[trip]}-50`);
    
    calculateFuelCost();
}

function calculateFuelCost() {
    let fuelNeeded, totalCost, tripDistance;
    
    if (currentMethod === 'distance') {
        // Calculate based on distance and fuel efficiency
        tripDistance = parseFloat(document.getElementById('tripDistance').value) || 0;
        const fuelEfficiency = parseFloat(document.getElementById('fuelEfficiency').value) || 0;
        const distanceUnit = document.getElementById('distanceUnit').value;
        const efficiencyUnit = document.getElementById('efficiencyUnit').value;
        
        // Apply round trip if selected
        if (document.getElementById('roundTrip').checked) {
            tripDistance *= 2;
        }
        
        // Convert units to consistent system
        if (distanceUnit === 'km') {
            tripDistance = tripDistance / 1.60934; // Convert km to miles for calculation
        }
        
        // Calculate fuel needed based on efficiency unit
        if (efficiencyUnit === 'mpg') {
            fuelNeeded = tripDistance / fuelEfficiency;
        } else if (efficiencyUnit === 'l_100km') {
            fuelNeeded = (tripDistance * 1.60934 * fuelEfficiency) / 100; // Convert to liters
        } else if (efficiencyUnit === 'km_l') {
            fuelNeeded = (tripDistance * 1.60934) / fuelEfficiency; // Convert to liters
        }
        
        // Convert fuel needed to gallons if needed for price calculation
        let fuelNeededForPrice = fuelNeeded;
        if (efficiencyUnit !== 'mpg') {
            fuelNeededForPrice = fuelNeeded / 3.78541; // Convert liters to gallons
        }
        
    } else {
        // Calculate based on fuel amount
        fuelNeeded = parseFloat(document.getElementById('fuelAmount').value) || 0;
        const fuelUnit = document.getElementById('fuelUnit').value;
        
        // Convert to gallons for calculation
        if (fuelUnit === 'liters') {
            fuelNeeded = fuelNeeded / 3.78541;
        }
        
        tripDistance = 0; // Not used in fuel amount method
        fuelNeededForPrice = fuelNeeded;
    }
    
    // Calculate total cost
    const fuelPrice = parseFloat(document.getElementById('fuelPrice').value) || 0;
    totalCost = fuelNeededForPrice * fuelPrice;
    
    // Calculate cost per mile if we have distance
    let costPerMile = 0;
    if (currentMethod === 'distance' && tripDistance > 0) {
        costPerMile = totalCost / tripDistance;
    }
    
    displayResults(totalCost, fuelNeeded, costPerMile, tripDistance);
    
    // Show vehicle comparison if selected
    if (document.getElementById('multipleVehicles').checked) {
        showVehicleComparison(tripDistance, fuelPrice);
    } else {
        document.getElementById('vehicleComparison').classList.add('hidden');
    }
}

function displayResults(totalCost, fuelNeeded, costPerMile, tripDistance) {
    const fuelUnit = document.getElementById('fuelUnit').value;
    const efficiencyUnit = document.getElementById('efficiencyUnit').value;
    const distanceUnit = document.getElementById('distanceUnit').value;
    
    // Format display values
    let displayFuelNeeded = fuelNeeded;
    let displayFuelUnit = 'gallons';
    
    if (efficiencyUnit === 'l_100km' || efficiencyUnit === 'km_l' || fuelUnit === 'liters') {
        displayFuelNeeded = fuelNeeded * 3.78541; // Convert to liters
        displayFuelUnit = 'liters';
    }
    
    let displayTripDistance = tripDistance;
    if (distanceUnit === 'km') {
        displayTripDistance = tripDistance * 1.60934; // Convert to km
    }
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">$${totalCost.toFixed(2)}</div>
                    <div class="text-lg font-semibold text-blue-800">Total Fuel Cost</div>
                    <div class="text-sm opacity-75 mt-1">${displayFuelNeeded.toFixed(1)} ${displayFuelUnit} needed</div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${displayFuelNeeded.toFixed(1)}</div>
                    <div class="text-sm text-gray-600 mt-1">Fuel Needed (${displayFuelUnit})</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">$${costPerMile.toFixed(3)}</div>
                    <div class="text-sm text-gray-600 mt-1">Cost per ${distanceUnit === 'miles' ? 'mile' : 'km'}</div>
                </div>
            </div>

            <!-- Cost Saving Tips -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Cost Saving Tip</h4>
                <p class="text-sm text-green-800">
                    ${getCostSavingTip(totalCost)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('priceTrends').classList.remove('hidden');
    
    // Update detailed results
    updateDetailedResults(totalCost, displayFuelNeeded, costPerMile, displayTripDistance, displayFuelUnit, distanceUnit);
    document.getElementById('detailedResults').classList.remove('hidden');
}

function updateDetailedResults(totalCost, fuelNeeded, costPerMile, tripDistance, fuelUnit, distanceUnit) {
    document.getElementById('totalCost').textContent = `$${totalCost.toFixed(2)}`;
    document.getElementById('fuelNeeded').textContent = fuelNeeded.toFixed(1);
    document.getElementById('costPerMile').textContent = `$${costPerMile.toFixed(3)}`;
    document.getElementById('tripDistanceResult').textContent = tripDistance.toFixed(0);
    
    // Update breakdown content
    const breakdownHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Fuel Consumption:</span>
            <span class="font-semibold text-gray-900">${fuelNeeded.toFixed(1)} ${fuelUnit}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Fuel Price:</span>
            <span class="font-semibold text-gray-900">${currentPriceUnit}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">Operating Cost:</span>
            <span class="font-semibold text-gray-900">$${costPerMile.toFixed(3)} per ${distanceUnit === 'miles' ? 'mile' : 'km'}</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-700">Trip Length:</span>
            <span class="font-semibold text-gray-900">${tripDistance.toFixed(0)} ${distanceUnit}</span>
        </div>
    `;
    
    document.getElementById('breakdownContent').innerHTML = breakdownHTML;
    
    // Update price trends
    updatePriceTrends(totalCost);
}

function updatePriceTrends(totalCost) {
    const fuelPrice = parseFloat(document.getElementById('fuelPrice').value) || 0;
    
    const trendsHTML = `
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">If price was 10% lower:</span>
            <span class="font-semibold text-green-600">$${(totalCost * 0.9).toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-2 border-b border-gray-200">
            <span class="text-gray-700">If price was 10% higher:</span>
            <span class="font-semibold text-red-600">$${(totalCost * 1.1).toFixed(2)}</span>
        </div>
        <div class="flex justify-between items-center py-2">
            <span class="text-gray-700">Monthly cost (4 trips):</span>
            <span class="font-semibold text-blue-600">$${(totalCost * 4).toFixed(2)}</span>
        </div>
    `;
    
    document.getElementById('trendsContent').innerHTML = trendsHTML;
}

function showVehicleComparison(tripDistance, fuelPrice) {
    let comparisonHTML = '';
    
    Object.values(vehicleTypes).forEach(vehicle => {
        const fuelNeeded = tripDistance / vehicle.mpg;
        const totalCost = fuelNeeded * fuelPrice;
        const costPerMile = totalCost / tripDistance;
        
        comparisonHTML += `
            <div class="bg-${vehicle.color}-50 rounded-lg p-6 text-center border border-${vehicle.color}-200">
                <div class="w-12 h-12 bg-${vehicle.color}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-car text-${vehicle.color}-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-${vehicle.color}-800 mb-2">${vehicle.name}</h3>
                <div class="text-2xl font-bold text-${vehicle.color}-700 mb-2">$${totalCost.toFixed(2)}</div>
                <div class="text-sm text-${vehicle.color}-600">
                    <div>${vehicle.mpg} MPG</div>
                    <div>$${costPerMile.toFixed(3)}/mile</div>
                </div>
            </div>
        `;
    });
    
    document.getElementById('comparisonContent').innerHTML = comparisonHTML;
    document.getElementById('vehicleComparison').classList.remove('hidden');
}

function getCostSavingTip(totalCost) {
    if (totalCost > 100) {
        return "Consider carpooling or using public transportation for long trips to significantly reduce costs.";
    } else if (totalCost > 50) {
        return "Plan your route to avoid traffic and reduce idling time to improve fuel efficiency.";
    } else {
        return "Maintain proper tire pressure and remove roof racks when not in use to improve fuel economy.";
    }
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