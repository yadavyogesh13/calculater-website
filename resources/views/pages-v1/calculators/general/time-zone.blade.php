@extends('layouts.app')

@section('title', 'Time Zone Converter - Convert Times Between Different Time Zones | CalculaterTools')

@section('meta-description', 'Free time zone converter to convert times between different time zones worldwide. Calculate meeting times across time zones with daylight saving time support.')

@section('keywords', 'time zone converter, time zone calculator, world clock, meeting planner, time conversion, international time, daylight saving time')

@section('canonical', url('/calculators/time-zone'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Time Zone Converter",
    "description": "Convert times between different time zones worldwide with daylight saving time support",
    "url": "{{ url('/calculators/time-zone') }}",
    "operatingSystem": "Any",
    "applicationCategory": "UtilityApplication",
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
                        <a href="#time" class="text-blue-600 hover:text-blue-800 transition duration-150">Time Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Time Zone Converter</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Time Zone Converter</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Convert times between different time zones worldwide. Perfect for scheduling international meetings and calls.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Convert Time Zones</h2>
                        <p class="text-gray-600 mb-6">Enter a time and select time zones to convert between them</p>
                        
                        <form id="timezoneForm" class="space-y-6">
                            <!-- Date and Time Input -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="dateInput" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Date
                                    </label>
                                    <input 
                                        type="date" 
                                        id="dateInput" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="timeInput" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Time
                                    </label>
                                    <input 
                                        type="time" 
                                        id="timeInput" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Time Zone Selection -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="fromTimezone" class="block text-sm font-semibold text-gray-800 mb-2">
                                        From Time Zone
                                    </label>
                                    <select 
                                        id="fromTimezone" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                        <!-- Time zones will be populated by JavaScript -->
                                    </select>
                                </div>
                                <div>
                                    <label for="toTimezone" class="block text-sm font-semibold text-gray-800 mb-2">
                                        To Time Zone
                                    </label>
                                    <select 
                                        id="toTimezone" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                        <!-- Time zones will be populated by JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <!-- Quick Time Zones -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Popular Time Zones
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setQuickTimezone('newyork')" class="timezone-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-city text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">New York</div>
                                    </button>
                                    <button type="button" onclick="setQuickTimezone('london')" class="timezone-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-landmark text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">London</div>
                                    </button>
                                    <button type="button" onclick="setQuickTimezone('tokyo')" class="timezone-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-torii-gate text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Tokyo</div>
                                    </button>
                                    <button type="button" onclick="setQuickTimezone('sydney')" class="timezone-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-sun text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sydney</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Quick Times -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Times
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setQuickTime('now')" class="time-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-clock text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Now</div>
                                    </button>
                                    <button type="button" onclick="setQuickTime('morning')" class="time-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                                        <i class="fas fa-sun text-orange-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">9:00 AM</div>
                                    </button>
                                    <button type="button" onclick="setQuickTime('afternoon')" class="time-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-sun text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">1:00 PM</div>
                                    </button>
                                    <button type="button" onclick="setQuickTime('evening')" class="time-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-indigo-500 hover:bg-indigo-50 transition duration-200">
                                        <i class="fas fa-moon text-indigo-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">6:00 PM</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Convert Button -->
                            <button 
                                type="button" 
                                onclick="convertTimeZone()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-sync-alt mr-2"></i>
                                Convert Time Zone
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
                                <i class="fas fa-globe-americas text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter time and zones</p>
                                <p class="text-sm">to see conversion result</p>
                            </div>
                        </div>

                        <!-- World Clocks -->
                        <div id="worldClocks" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">World Clocks</h4>
                            <div class="space-y-3" id="clocksContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meeting Planner -->
            <div id="meetingPlanner" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Meeting Time Planner</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4 border border-gray-200 rounded-lg">
                        <div class="text-2xl font-bold text-gray-900 mb-2" id="plannerNewYork">--:--</div>
                        <div class="text-sm text-gray-600">New York</div>
                        <div class="text-xs text-gray-500">EST/EDT</div>
                    </div>
                    <div class="text-center p-4 border border-gray-200 rounded-lg">
                        <div class="text-2xl font-bold text-gray-900 mb-2" id="plannerLondon">--:--</div>
                        <div class="text-sm text-gray-600">London</div>
                        <div class="text-xs text-gray-500">GMT/BST</div>
                    </div>
                    <div class="text-center p-4 border border-gray-200 rounded-lg">
                        <div class="text-2xl font-bold text-gray-900 mb-2" id="plannerTokyo">--:--</div>
                        <div class="text-sm text-gray-600">Tokyo</div>
                        <div class="text-xs text-gray-500">JST</div>
                    </div>
                    <div class="text-center p-4 border border-gray-200 rounded-lg">
                        <div class="text-2xl font-bold text-gray-900 mb-2" id="plannerSydney">--:--</div>
                        <div class="text-sm text-gray-600">Sydney</div>
                        <div class="text-xs text-gray-500">AEST/AEDT</div>
                    </div>
                </div>
            </div>

            <!-- Time Zone Map -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">World Time Zones</h2>
                <div class="bg-gray-100 rounded-lg p-6 text-center">
                    <div class="text-gray-500 mb-4">
                        <i class="fas fa-globe-americas text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Interactive Time Zone Map</h3>
                    <p class="text-gray-600 mb-4">The Earth is divided into 24 time zones, each approximately 15 degrees of longitude wide.</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <div class="font-semibold text-blue-700">UTC-12</div>
                            <div class="text-blue-600">Baker Island</div>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <div class="font-semibold text-green-700">UTC+0</div>
                            <div class="text-green-600">London, Dublin</div>
                        </div>
                        <div class="bg-purple-50 p-3 rounded-lg">
                            <div class="font-semibold text-purple-700">UTC+5:30</div>
                            <div class="text-purple-600">India</div>
                        </div>
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <div class="font-semibold text-orange-700">UTC+14</div>
                            <div class="text-orange-600">Line Islands</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Time Zone Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Time Zones</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">24 Time Zones</h3>
                        <p class="text-gray-600">The world is divided into 24 time zones, each 15 degrees of longitude apart, corresponding to one hour of time difference.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Daylight Saving</h3>
                        <p class="text-gray-600">Many regions adjust clocks forward in spring and back in autumn to make better use of daylight.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-map-marker-alt text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">UTC Reference</h3>
                        <p class="text-gray-600">Coordinated Universal Time (UTC) is the primary time standard by which the world regulates clocks and time.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Time Zone FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a time zone?</h3>
                        <p class="text-gray-600">A time zone is a region of the globe that observes a uniform standard time for legal, commercial, and social purposes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How many time zones are there?</h3>
                        <p class="text-gray-600">There are 24 primary time zones, but with daylight saving time and regional variations, there are actually more than 24 time zones in use.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is UTC?</h3>
                        <p class="text-gray-600">UTC (Coordinated Universal Time) is the primary time standard by which the world regulates clocks and time. It is within about 1 second of mean solar time at 0° longitude.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is daylight saving time?</h3>
                        <p class="text-gray-600">Daylight Saving Time (DST) is the practice of setting clocks forward by one hour during warmer months to extend evening daylight.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Which countries have the most time zones?</h3>
                        <p class="text-gray-600">France has the most time zones (12 due to its overseas territories), followed by Russia (11 time zones) and the United States (9 time zones including territories).</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('age.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-birthday-cake text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Age Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate exact age in years, months, and days</p>
                    </a>
                    <a href="{{ route('date.difference.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calendar-plus text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Date Difference Calculator</h3>
                        <p class="text-gray-600 text-sm">Add or subtract days from any date</p>
                    </a>
                    <a href="{{ route('percentage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-clock text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate the Percentage</p>
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
let timezoneData = [];
let worldClockInterval = null;

// Time zone data
const timeZones = [
    { value: 'America/New_York', label: 'Eastern Time (New York)', offset: '-05:00', dst: true },
    { value: 'America/Chicago', label: 'Central Time (Chicago)', offset: '-06:00', dst: true },
    { value: 'America/Denver', label: 'Mountain Time (Denver)', offset: '-07:00', dst: true },
    { value: 'America/Los_Angeles', label: 'Pacific Time (Los Angeles)', offset: '-08:00', dst: true },
    { value: 'America/Anchorage', label: 'Alaska Time (Anchorage)', offset: '-09:00', dst: true },
    { value: 'Pacific/Honolulu', label: 'Hawaii Time (Honolulu)', offset: '-10:00', dst: false },
    { value: 'Europe/London', label: 'Greenwich Mean Time (London)', offset: '+00:00', dst: true },
    { value: 'Europe/Paris', label: 'Central European Time (Paris)', offset: '+01:00', dst: true },
    { value: 'Europe/Moscow', label: 'Moscow Time', offset: '+03:00', dst: false },
    { value: 'Asia/Dubai', label: 'Gulf Standard Time (Dubai)', offset: '+04:00', dst: false },
    { value: 'Asia/Kolkata', label: 'India Standard Time (Mumbai)', offset: '+05:30', dst: false },
    { value: 'Asia/Bangkok', label: 'Indochina Time (Bangkok)', offset: '+07:00', dst: false },
    { value: 'Asia/Singapore', label: 'Singapore Time', offset: '+08:00', dst: false },
    { value: 'Asia/Tokyo', label: 'Japan Standard Time (Tokyo)', offset: '+09:00', dst: false },
    { value: 'Australia/Sydney', label: 'Australian Eastern Time (Sydney)', offset: '+10:00', dst: true },
    { value: 'Pacific/Auckland', label: 'New Zealand Time (Auckland)', offset: '+12:00', dst: true },
    { value: 'UTC', label: 'Coordinated Universal Time (UTC)', offset: '+00:00', dst: false }
];

// Initialize the converter
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    populateTimeZones();
    setDefaultDateTime();
    startWorldClocks();
});

function setupEventListeners() {
    // Auto-convert on input change
    document.getElementById('dateInput').addEventListener('change', convertTimeZone);
    document.getElementById('timeInput').addEventListener('change', convertTimeZone);
    document.getElementById('fromTimezone').addEventListener('change', convertTimeZone);
    document.getElementById('toTimezone').addEventListener('change', convertTimeZone);
}

function populateTimeZones() {
    const fromSelect = document.getElementById('fromTimezone');
    const toSelect = document.getElementById('toTimezone');
    
    // Clear existing options
    fromSelect.innerHTML = '';
    toSelect.innerHTML = '';
    
    // Populate time zones
    timeZones.forEach(tz => {
        const optionFrom = new Option(`${tz.label} (UTC${tz.offset})`, tz.value);
        const optionTo = new Option(`${tz.label} (UTC${tz.offset})`, tz.value);
        
        fromSelect.add(optionFrom);
        toSelect.add(optionTo);
    });
    
    // Set default values
    fromSelect.value = 'America/New_York';
    toSelect.value = 'Europe/London';
}

function setDefaultDateTime() {
    const now = new Date();
    
    // Format date as YYYY-MM-DD
    const formatDate = (date) => {
        return date.toISOString().split('T')[0];
    };
    
    // Format time as HH:MM
    const formatTime = (date) => {
        return date.toTimeString().slice(0, 5);
    };
    
    document.getElementById('dateInput').value = formatDate(now);
    document.getElementById('timeInput').value = formatTime(now);
}

function setQuickTimezone(type) {
    const timezoneMap = {
        'newyork': 'America/New_York',
        'london': 'Europe/London',
        'tokyo': 'Asia/Tokyo',
        'sydney': 'Australia/Sydney'
    };
    
    document.getElementById('toTimezone').value = timezoneMap[type];
    
    // Update quick timezone buttons
    document.querySelectorAll('.timezone-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-purple-500', 'bg-purple-50', 'border-red-500', 'bg-red-50', 'border-green-500', 'bg-green-50');
    });
    
    const colorMap = {
        'newyork': 'blue',
        'london': 'purple',
        'tokyo': 'red',
        'sydney': 'green'
    };
    
    event.target.classList.add(`border-${colorMap[type]}-500`, `bg-${colorMap[type]}-50`);
    
    convertTimeZone();
}

function setQuickTime(type) {
    const timeMap = {
        'now': () => {
            const now = new Date();
            return now.toTimeString().slice(0, 5);
        },
        'morning': '09:00',
        'afternoon': '13:00',
        'evening': '18:00'
    };
    
    const time = typeof timeMap[type] === 'function' ? timeMap[type]() : timeMap[type];
    document.getElementById('timeInput').value = time;
    
    // Update quick time buttons
    document.querySelectorAll('.time-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-orange-500', 'bg-orange-50', 'border-yellow-500', 'bg-yellow-50', 'border-indigo-500', 'bg-indigo-50');
    });
    
    const colorMap = {
        'now': 'blue',
        'morning': 'orange',
        'afternoon': 'yellow',
        'evening': 'indigo'
    };
    
    event.target.classList.add(`border-${colorMap[type]}-500`, `bg-${colorMap[type]}-50`);
    
    convertTimeZone();
}

function convertTimeZone() {
    const date = document.getElementById('dateInput').value;
    const time = document.getElementById('timeInput').value;
    const fromTZ = document.getElementById('fromTimezone').value;
    const toTZ = document.getElementById('toTimezone').value;
    
    // Validation
    if (!date || !time || !fromTZ || !toTZ) {
        showError('Please fill in all fields');
        return;
    }
    
    // Create date object in from timezone
    const fromDate = new Date(`${date}T${time}:00`);
    
    // Get timezone information
    const fromTZInfo = timeZones.find(tz => tz.value === fromTZ);
    const toTZInfo = timeZones.find(tz => tz.value === toTZ);
    
    if (!fromTZInfo || !toTZInfo) {
        showError('Invalid time zone selected');
        return;
    }
    
    // Calculate time difference (simplified - in real app, use proper timezone library)
    const fromOffset = parseTimezoneOffset(fromTZInfo.offset);
    const toOffset = parseTimezoneOffset(toTZInfo.offset);
    const timeDiff = toOffset - fromOffset;
    
    // Apply time difference
    const toDate = new Date(fromDate.getTime() + timeDiff * 60 * 60 * 1000);
    
    // Display results
    displayResults(fromDate, toDate, fromTZInfo, toTZInfo);
    
    // Update meeting planner
    updateMeetingPlanner(fromDate);
}

function parseTimezoneOffset(offset) {
    const sign = offset[0] === '-' ? -1 : 1;
    const [hours, minutes] = offset.slice(1).split(':').map(Number);
    return sign * (hours + minutes / 60);
}

function displayResults(fromDate, toDate, fromTZInfo, toTZInfo) {
    const formatDateTime = (date, timezone) => {
        return {
            date: date.toLocaleDateString('en-US', { 
                weekday: 'long',
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            }),
            time: date.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit',
                timeZoneName: 'short'
            }),
            timezone: timezone.label
        };
    };
    
    const fromFormatted = formatDateTime(fromDate, fromTZInfo);
    const toFormatted = formatDateTime(toDate, toTZInfo);
    
    // Calculate time difference
    const diffHours = Math.abs((toDate - fromDate) / (1000 * 60 * 60));
    const isAhead = toDate > fromDate;
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- From Time -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-2">
                    <div class="text-sm text-blue-700 font-semibold mb-1">FROM</div>
                    <div class="text-2xl md:text-3xl font-bold text-blue-800 mb-1">${fromFormatted.time}</div>
                    <div class="text-blue-700">${fromFormatted.date}</div>
                    <div class="text-sm text-blue-600 mt-1">${fromFormatted.timezone}</div>
                </div>
            </div>

            <!-- Conversion Arrow -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                    <i class="fas fa-arrow-down text-gray-600 text-xl"></i>
                </div>
            </div>

            <!-- To Time -->
            <div class="bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-200 rounded-xl p-6">
                <div class="text-center mb-2">
                    <div class="text-sm text-green-700 font-semibold mb-1">TO</div>
                    <div class="text-2xl md:text-3xl font-bold text-green-800 mb-1">${toFormatted.time}</div>
                    <div class="text-green-700">${toFormatted.date}</div>
                    <div class="text-sm text-green-600 mt-1">${toFormatted.timezone}</div>
                </div>
            </div>

            <!-- Time Difference -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <h4 class="font-semibold text-gray-800 mb-2">Time Difference</h4>
                <p class="text-sm text-gray-700">
                    ${toFormatted.timezone} is 
                    <strong>${diffHours.toFixed(1)} hours ${isAhead ? 'ahead' : 'behind'}</strong>
                    of ${fromFormatted.timezone}
                </p>
            </div>

            <!-- Business Hours Info -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h4 class="font-semibold text-yellow-800 mb-2">Business Hours</h4>
                <p class="text-sm text-yellow-800" id="businessHoursInfo">
                    ${getBusinessHoursInfo(fromDate, toDate)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('worldClocks').classList.remove('hidden');
    document.getElementById('meetingPlanner').classList.remove('hidden');
}

function getBusinessHoursInfo(fromDate, toDate) {
    const fromHour = fromDate.getHours();
    const toHour = toDate.getHours();
    
    let fromStatus = 'outside';
    let toStatus = 'outside';
    
    if (fromHour >= 9 && fromHour < 17) fromStatus = 'business';
    if (fromHour >= 17 && fromHour < 21) fromStatus = 'evening';
    
    if (toHour >= 9 && toHour < 17) toStatus = 'business';
    if (toHour >= 17 && toHour < 21) toStatus = 'evening';
    
    if (fromStatus === 'business' && toStatus === 'business') {
        return 'Both times are during typical business hours (9 AM - 5 PM)';
    } else if (fromStatus === 'business' && toStatus === 'evening') {
        return 'Source is business hours, target is evening time';
    } else if (fromStatus === 'evening' && toStatus === 'business') {
        return 'Source is evening time, target is business hours';
    } else if (fromStatus === 'evening' && toStatus === 'evening') {
        return 'Both times are during evening hours';
    } else {
        return 'One or both times are outside typical business hours';
    }
}

function updateMeetingPlanner(baseDate) {
    const majorTimeZones = [
        { id: 'plannerNewYork', tz: 'America/New_York' },
        { id: 'plannerLondon', tz: 'Europe/London' },
        { id: 'plannerTokyo', tz: 'Asia/Tokyo' },
        { id: 'plannerSydney', tz: 'Australia/Sydney' }
    ];
    
    majorTimeZones.forEach(({ id, tz }) => {
        const tzInfo = timeZones.find(t => t.value === tz);
        if (tzInfo) {
            const offset = parseTimezoneOffset(tzInfo.offset);
            const localDate = new Date(baseDate.getTime() + offset * 60 * 60 * 1000);
            const timeString = localDate.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit',
                hour12: false
            });
            document.getElementById(id).textContent = timeString;
        }
    });
}

function startWorldClocks() {
    function updateWorldClocks() {
        const now = new Date();
        const clocks = [
            { id: 'clockNewYork', tz: 'America/New_York', city: 'New York' },
            { id: 'clockLondon', tz: 'Europe/London', city: 'London' },
            { id: 'clockTokyo', tz: 'Asia/Tokyo', city: 'Tokyo' },
            { id: 'clockSydney', tz: 'Australia/Sydney', city: 'Sydney' }
        ];
        
        const clocksHTML = clocks.map(({ tz, city }) => {
            const tzInfo = timeZones.find(t => t.value === tz);
            if (tzInfo) {
                const offset = parseTimezoneOffset(tzInfo.offset);
                const localDate = new Date(now.getTime() + offset * 60 * 60 * 1000);
                const timeString = localDate.toLocaleTimeString('en-US', { 
                    hour: '2-digit', 
                    minute: '2-digit',
                    second: '2-digit'
                });
                
                return `
                    <div class="flex items-center justify-between py-2 border-b border-gray-200 last:border-0">
                        <div>
                            <span class="font-medium text-gray-800">${city}</span>
                            <span class="text-xs text-gray-500 ml-2">UTC${tzInfo.offset}</span>
                        </div>
                        <div class="font-mono text-sm text-gray-700">${timeString}</div>
                    </div>
                `;
            }
            return '';
        }).join('');
        
        document.getElementById('clocksContent').innerHTML = clocksHTML;
    }
    
    updateWorldClocks();
    worldClockInterval = setInterval(updateWorldClocks, 1000);
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
    document.getElementById('worldClocks').classList.add('hidden');
    document.getElementById('meetingPlanner').classList.add('hidden');
}

// Cleanup on page unload
window.addEventListener('beforeunload', function() {
    if (worldClockInterval) {
        clearInterval(worldClockInterval);
    }
});
</script>
@endsection