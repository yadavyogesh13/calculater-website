@extends('layouts.app')

@section('title', 'Age Calculator - Calculate Your Exact Age in Years, Months & Days | CalculaterTools')

@section('meta-description', 'Free age calculator to calculate your exact age in years, months, weeks, and days. Find how long until your next birthday or calculate time between dates.')

@section('keywords', 'age calculator, birthday calculator, date calculator, how old am I, calculate age, time between dates, birthday countdown')

@section('canonical', url('/calculators/age'))

@section('content')
{{-- <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Age Calculator",
    "description": "Calculate your exact age in years, months, weeks, and days or find time between any two dates",
    "url": "{{ url('/calculators/age') }}",
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
                        <a href="#date" class="text-blue-600 hover:text-blue-800 transition duration-150">Date Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Age Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Age Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your exact age in years, months, and days or find the time between any two dates.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Age</h2>
                        <p class="text-gray-600 mb-6">Enter your birth date and optionally an end date to calculate your exact age</p>
                        
                        <form id="ageCalculatorForm" class="space-y-6">
                            <!-- Calculation Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Type
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <button type="button" id="ageBtn" class="type-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-birthday-cake mr-2"></i>
                                        Calculate Age
                                    </button>
                                    <button type="button" id="betweenBtn" class="type-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        Date Difference
                                    </button>
                                </div>
                            </div>

                            <!-- Age Calculation Inputs -->
                            <div id="ageInputs" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="birthDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Birth Date
                                        </label>
                                        <input 
                                            type="date" 
                                            id="birthDate" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <label for="ageAtDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Age at Specific Date (Optional)
                                        </label>
                                        <input 
                                            type="date" 
                                            id="ageAtDate" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                        <p class="text-xs text-gray-500 mt-1">Leave empty for current age</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Difference Inputs -->
                            <div id="betweenInputs" class="space-y-4 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="startDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                            Start Date
                                        </label>
                                        <input 
                                            type="date" 
                                            id="startDate" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                    </div>
                                    <div>
                                        <label for="endDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                            End Date
                                        </label>
                                        <input 
                                            type="date" 
                                            id="endDate" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        >
                                        <p class="text-xs text-gray-500 mt-1">Leave empty for current date</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Dates -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Dates
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setQuickDate('today')" class="quick-date-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-calendar-day text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Today</div>
                                    </button>
                                    <button type="button" onclick="setQuickDate('tomorrow')" class="quick-date-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-forward text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Tomorrow</div>
                                    </button>
                                    <button type="button" onclick="setQuickDate('newyear')" class="quick-date-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-glass-cheers text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">New Year</div>
                                    </button>
                                    <button type="button" onclick="setQuickDate('birthday')" class="quick-date-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-birthday-cake text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Next Birthday</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateAge()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Age
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Age Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-birthday-cake text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your birth date</p>
                                <p class="text-sm">to see your exact age</p>
                            </div>
                        </div>

                        <!-- Age Facts -->
                        <div id="ageFacts" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Age Facts</h4>
                            <div class="space-y-2 text-sm" id="factsContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Age Breakdown</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="yearsResult">0</div>
                        <div class="text-blue-800 font-medium">Years</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="monthsResult">0</div>
                        <div class="text-green-800 font-medium">Months</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="weeksResult">0</div>
                        <div class="text-purple-800 font-medium">Weeks</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="daysResult">0</div>
                        <div class="text-orange-800 font-medium">Days</div>
                    </div>
                </div>

                <!-- Additional Time Units -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-xl font-bold text-gray-900 mb-1" id="hoursResult">0</div>
                        <div class="text-sm text-gray-600">Hours</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-xl font-bold text-gray-900 mb-1" id="minutesResult">0</div>
                        <div class="text-sm text-gray-600">Minutes</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-xl font-bold text-gray-900 mb-1" id="secondsResult">0</div>
                        <div class="text-sm text-gray-600">Seconds</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <div class="text-xl font-bold text-gray-900 mb-1" id="leapYearsResult">0</div>
                        <div class="text-sm text-gray-600">Leap Years</div>
                    </div>
                </div>
            </div>

            <!-- Next Birthday Countdown -->
            <div id="birthdayCountdown" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Next Birthday Countdown</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-2xl mx-auto">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-center text-white">
                        <div class="text-3xl font-bold mb-2" id="countdownDays">0</div>
                        <div class="text-blue-100">Days</div>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-center text-white">
                        <div class="text-3xl font-bold mb-2" id="countdownHours">0</div>
                        <div class="text-green-100">Hours</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-center text-white">
                        <div class="text-3xl font-bold mb-2" id="countdownMinutes">0</div>
                        <div class="text-purple-100">Minutes</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl p-6 text-center text-white">
                        <div class="text-3xl font-bold mb-2" id="countdownSeconds">0</div>
                        <div class="text-orange-100">Seconds</div>
                    </div>
                </div>
            </div>

            <!-- Age Milestones -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Age Milestones</h2>
                <div class="max-w-4xl mx-auto">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">16</div>
                            <div class="text-sm text-gray-600 mt-1">Driving Age</div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">18</div>
                            <div class="text-sm text-gray-600 mt-1">Adult</div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="text-2xl font-bold text-purple-600">21</div>
                            <div class="text-sm text-gray-600 mt-1">Full Adult</div>
                        </div>
                        <div class="p-4 border border-gray-200 rounded-lg">
                            <div class="text-2xl font-bold text-orange-600">65</div>
                            <div class="text-sm text-gray-600 mt-1">Retirement</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Age Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How is age calculated?</h3>
                        <p class="text-gray-600">Age is calculated by counting the number of full years, months, and days between the birth date and the selected date. The calculation accounts for leap years and varying month lengths.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Why do months have different numbers of days?</h3>
                        <p class="text-gray-600">Our calendar months have varying lengths (28-31 days) due to historical reasons. The age calculator accurately handles these differences in its calculations.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What about leap years?</h3>
                        <p class="text-gray-600">The calculator automatically accounts for leap years (years divisible by 4, except century years not divisible by 400) in all calculations.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I calculate age at a future date?</h3>
                        <p class="text-gray-600">Yes! Simply enter a future date in the "Age at Specific Date" field to calculate how old you will be on that date.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is the calculator?</h3>
                        <p class="text-gray-600">The calculator is highly accurate and accounts for all calendar variations including leap years and different month lengths. It provides exact age down to the second.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('date.difference.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calendar-plus text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Date Difference Calculator</h3>
                        <p class="text-gray-600 text-sm">Add or subtract days from a date</p>
                    </a>
                    <a href="{{ route('time.zone.converter') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-clock text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Time Zone Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate time differences</p>
                    </a>
                    {{-- <a href="{{ route('birthstone.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-gem text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Birthstone Finder</h3>
                        <p class="text-gray-600 text-sm">Discover your birthstone</p>
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
let currentType = 'age';
let countdownInterval = null;

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    setDefaultDates();
    calculateAge(); // Calculate with default values
});

function setupEventListeners() {
    // Calculation type toggle
    document.getElementById('ageBtn').addEventListener('click', () => setCalculationType('age'));
    document.getElementById('betweenBtn').addEventListener('click', () => setCalculationType('between'));
    
    // Auto-calculate on input change
    document.getElementById('birthDate').addEventListener('change', calculateAge);
    document.getElementById('ageAtDate').addEventListener('change', calculateAge);
    document.getElementById('startDate').addEventListener('change', calculateAge);
    document.getElementById('endDate').addEventListener('change', calculateAge);
}

function setDefaultDates() {
    const today = new Date();
    const defaultBirthDate = new Date(today.getFullYear() - 30, today.getMonth(), today.getDate());
    
    // Format dates as YYYY-MM-DD
    const formatDate = (date) => {
        return date.toISOString().split('T')[0];
    };
    
    document.getElementById('birthDate').value = formatDate(defaultBirthDate);
    document.getElementById('startDate').value = formatDate(defaultBirthDate);
    document.getElementById('endDate').value = formatDate(today);
}

function setCalculationType(type) {
    currentType = type;
    
    if (type === 'age') {
        document.getElementById('ageBtn').classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('ageBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('betweenBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('betweenBtn').classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('ageInputs').classList.remove('hidden');
        document.getElementById('betweenInputs').classList.add('hidden');
    } else {
        document.getElementById('betweenBtn').classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('betweenBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('ageBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('ageBtn').classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        document.getElementById('betweenInputs').classList.remove('hidden');
        document.getElementById('ageInputs').classList.add('hidden');
    }
    
    calculateAge();
}

function setQuickDate(type) {
    const today = new Date();
    let targetDate = new Date();
    
    switch(type) {
        case 'today':
            targetDate = today;
            break;
        case 'tomorrow':
            targetDate.setDate(today.getDate() + 1);
            break;
        case 'newyear':
            targetDate = new Date(today.getFullYear() + 1, 0, 1);
            break;
        case 'birthday':
            const birthDate = new Date(document.getElementById('birthDate').value);
            const nextBirthday = new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate());
            if (nextBirthday < today) {
                nextBirthday.setFullYear(today.getFullYear() + 1);
            }
            targetDate = nextBirthday;
            break;
    }
    
    // Format date as YYYY-MM-DD
    const formatDate = (date) => {
        return date.toISOString().split('T')[0];
    };
    
    if (currentType === 'age') {
        document.getElementById('ageAtDate').value = formatDate(targetDate);
    } else {
        document.getElementById('endDate').value = formatDate(targetDate);
    }
    
    // Update quick date buttons
    document.querySelectorAll('.quick-date-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'today': 'blue',
        'tomorrow': 'green',
        'newyear': 'purple',
        'birthday': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[type]}-500`, `bg-${colorMap[type]}-50`);
    
    calculateAge();
}

function calculateAge() {
    let startDate, endDate;
    
    if (currentType === 'age') {
        startDate = new Date(document.getElementById('birthDate').value);
        endDate = document.getElementById('ageAtDate').value ? 
                 new Date(document.getElementById('ageAtDate').value) : 
                 new Date();
    } else {
        startDate = new Date(document.getElementById('startDate').value);
        endDate = document.getElementById('endDate').value ? 
                 new Date(document.getElementById('endDate').value) : 
                 new Date();
    }
    
    // Validation
    if (!startDate || isNaN(startDate.getTime())) {
        showError('Please enter a valid start date');
        return;
    }
    
    if (!endDate || isNaN(endDate.getTime())) {
        showError('Please enter a valid end date');
        return;
    }
    
    if (endDate < startDate) {
        showError('End date cannot be before start date');
        return;
    }
    
    // Calculate age/difference
    const result = calculateDateDifference(startDate, endDate);
    
    // Display results
    displayResults(result, startDate, endDate);
    
    // Start countdown if applicable
    if (currentType === 'age') {
        startBirthdayCountdown(startDate);
    } else {
        document.getElementById('birthdayCountdown').classList.add('hidden');
    }
}

function calculateDateDifference(startDate, endDate) {
    // Calculate years, months, days
    let years = endDate.getFullYear() - startDate.getFullYear();
    let months = endDate.getMonth() - startDate.getMonth();
    let days = endDate.getDate() - startDate.getDate();
    
    // Adjust for negative days
    if (days < 0) {
        months--;
        // Get days in previous month
        const prevMonth = new Date(endDate.getFullYear(), endDate.getMonth(), 0);
        days += prevMonth.getDate();
    }
    
    // Adjust for negative months
    if (months < 0) {
        years--;
        months += 12;
    }
    
    // Calculate total time units
    const timeDiff = endDate - startDate;
    const totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    const totalWeeks = Math.floor(totalDays / 7);
    const totalHours = Math.floor(timeDiff / (1000 * 60 * 60));
    const totalMinutes = Math.floor(timeDiff / (1000 * 60));
    const totalSeconds = Math.floor(timeDiff / 1000);
    
    // Calculate leap years
    let leapYears = 0;
    for (let year = startDate.getFullYear(); year <= endDate.getFullYear(); year++) {
        if ((year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0)) {
            if (new Date(year, 1, 29) >= startDate && new Date(year, 1, 29) <= endDate) {
                leapYears++;
            }
        }
    }
    
    return {
        years,
        months,
        days: days,
        totalDays,
        totalWeeks,
        totalHours,
        totalMinutes,
        totalSeconds,
        leapYears,
        startDate,
        endDate
    };
}

function displayResults(result, startDate, endDate) {
    const isAgeCalculation = currentType === 'age';
    const title = isAgeCalculation ? 'Your Age' : 'Time Difference';
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main Result -->
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">
                        ${result.years} years, ${result.months} months, ${result.days} days
                    </div>
                    <div class="text-lg font-semibold text-blue-800">${title}</div>
                    <div class="text-sm opacity-75 mt-1">
                        ${isAgeCalculation ? 'Born on ' + formatDisplayDate(startDate) : 'From ' + formatDisplayDate(startDate)} 
                        to ${formatDisplayDate(endDate)}
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${result.totalDays.toLocaleString()}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Days</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${result.totalWeeks.toLocaleString()}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Weeks</div>
                </div>
            </div>

            <!-- Next Birthday Info -->
            ${isAgeCalculation ? `
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <h4 class="font-semibold text-green-900 mb-2">Next Birthday</h4>
                <p class="text-sm text-green-800">
                    Your next birthday is in 
                    <strong>${calculateDaysUntilNextBirthday(startDate)} days</strong>
                </p>
            </div>
            ` : ''}
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('ageFacts').classList.remove('hidden');
    
    // Update detailed results
    updateDetailedResults(result);
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Generate age facts
    generateAgeFacts(result, isAgeCalculation);
}

function updateDetailedResults(result) {
    document.getElementById('yearsResult').textContent = result.years;
    document.getElementById('monthsResult').textContent = result.months;
    document.getElementById('weeksResult').textContent = result.totalWeeks.toLocaleString();
    document.getElementById('daysResult').textContent = result.totalDays.toLocaleString();
    document.getElementById('hoursResult').textContent = result.totalHours.toLocaleString();
    document.getElementById('minutesResult').textContent = result.totalMinutes.toLocaleString();
    document.getElementById('secondsResult').textContent = result.totalSeconds.toLocaleString();
    document.getElementById('leapYearsResult').textContent = result.leapYears;
}

function generateAgeFacts(result, isAgeCalculation) {
    const facts = [];
    
    if (isAgeCalculation) {
        if (result.years < 1) {
            facts.push('You are less than 1 year old');
        } else if (result.years === 1) {
            facts.push('You are 1 year old');
        } else {
            facts.push(`You are ${result.years} years old`);
        }
        
        if (result.years >= 18) {
            facts.push('You are legally an adult');
        }
        
        if (result.years >= 65) {
            facts.push('You are at retirement age');
        }
        
        // Zodiac sign (simplified)
        const zodiac = getZodiacSign(result.startDate);
        facts.push(`Your zodiac sign is ${zodiac}`);
        
        // Generation
        const generation = getGeneration(result.startDate.getFullYear());
        if (generation) {
            facts.push(`You belong to the ${generation} generation`);
        }
    } else {
        facts.push(`The time difference is ${result.years} years, ${result.months} months, and ${result.days} days`);
    }
    
    facts.push(`This period includes ${result.leapYears} leap years`);
    facts.push(`Total of ${result.totalDays.toLocaleString()} days`);
    
    const factsHTML = facts.map(fact => 
        `<div class="flex items-center py-2 border-b border-gray-200 last:border-0">
            <i class="fas fa-check text-green-500 mr-3"></i>
            <span class="text-gray-700">${fact}</span>
        </div>`
    ).join('');
    
    document.getElementById('factsContent').innerHTML = factsHTML;
}

function calculateDaysUntilNextBirthday(birthDate) {
    const today = new Date();
    const nextBirthday = new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate());
    
    if (nextBirthday < today) {
        nextBirthday.setFullYear(today.getFullYear() + 1);
    }
    
    const diffTime = nextBirthday - today;
    return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
}

function startBirthdayCountdown(birthDate) {
    // Clear existing interval
    if (countdownInterval) {
        clearInterval(countdownInterval);
    }
    
    function updateCountdown() {
        const nextBirthday = getNextBirthday(birthDate);
        const now = new Date();
        const diff = nextBirthday - now;
        
        if (diff <= 0) {
            // Birthday is today or passed
            document.getElementById('birthdayCountdown').classList.add('hidden');
            return;
        }
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById('countdownDays').textContent = days;
        document.getElementById('countdownHours').textContent = hours;
        document.getElementById('countdownMinutes').textContent = minutes;
        document.getElementById('countdownSeconds').textContent = seconds;
        
        document.getElementById('birthdayCountdown').classList.remove('hidden');
    }
    
    updateCountdown();
    countdownInterval = setInterval(updateCountdown, 1000);
}

function getNextBirthday(birthDate) {
    const today = new Date();
    const nextBirthday = new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate());
    
    if (nextBirthday < today) {
        nextBirthday.setFullYear(today.getFullYear() + 1);
    }
    
    return nextBirthday;
}

function getZodiacSign(birthDate) {
    const month = birthDate.getMonth() + 1;
    const day = birthDate.getDate();
    
    if ((month === 3 && day >= 21) || (month === 4 && day <= 19)) return 'Aries';
    if ((month === 4 && day >= 20) || (month === 5 && day <= 20)) return 'Taurus';
    if ((month === 5 && day >= 21) || (month === 6 && day <= 20)) return 'Gemini';
    if ((month === 6 && day >= 21) || (month === 7 && day <= 22)) return 'Cancer';
    if ((month === 7 && day >= 23) || (month === 8 && day <= 22)) return 'Leo';
    if ((month === 8 && day >= 23) || (month === 9 && day <= 22)) return 'Virgo';
    if ((month === 9 && day >= 23) || (month === 10 && day <= 22)) return 'Libra';
    if ((month === 10 && day >= 23) || (month === 11 && day <= 21)) return 'Scorpio';
    if ((month === 11 && day >= 22) || (month === 12 && day <= 21)) return 'Sagittarius';
    if ((month === 12 && day >= 22) || (month === 1 && day <= 19)) return 'Capricorn';
    if ((month === 1 && day >= 20) || (month === 2 && day <= 18)) return 'Aquarius';
    return 'Pisces';
}

function getGeneration(birthYear) {
    if (birthYear >= 1997 && birthYear <= 2012) return 'Gen Z';
    if (birthYear >= 1981 && birthYear <= 1996) return 'Millennial';
    if (birthYear >= 1965 && birthYear <= 1980) return 'Gen X';
    if (birthYear >= 1946 && birthYear <= 1964) return 'Baby Boomer';
    if (birthYear >= 1928 && birthYear <= 1945) return 'Silent Generation';
    return null;
}

function formatDisplayDate(date) {
    return date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
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
    document.getElementById('ageFacts').classList.add('hidden');
    document.getElementById('detailedResults').classList.add('hidden');
    document.getElementById('birthdayCountdown').classList.add('hidden');
}
</script>
@endsection