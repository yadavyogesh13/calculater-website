@extends('layouts.app')

@section('title', 'Date Difference Calculator | Calculate Time Between Dates | CalculaterTools')

@section('meta-description', 'Free date difference calculator to calculate days, weeks, months, and years between two dates. Perfect for project planning, age calculation, and event counting.')

@section('keywords', 'date difference calculator, days between dates, date calculator, time between dates, age calculator, project timeline, date counter')

@section('canonical', url('/calculators/date-difference'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Date Difference Calculator",
    "description": "Calculate the difference between two dates in days, weeks, months, and years",
    "url": "{{ url('/calculators/date-difference') }}",
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
                        <a href="#tools" class="text-indigo-600 hover:text-indigo-800 transition duration-150">Tools</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Date Difference Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Date Difference Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate the exact time duration between two dates in days, weeks, months, and years. Perfect for project planning, age calculation, and event counting.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Date Difference</h2>
                        <p class="text-gray-600 mb-6">Enter two dates to calculate the time duration between them</p>
                        
                        <form id="dateDifferenceCalculatorForm" class="space-y-6">
                            <!-- Date Inputs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="startDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Start Date
                                    </label>
                                    <input 
                                        type="date" 
                                        id="startDate" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        required
                                    >
                                    <p class="text-sm text-gray-500 mt-1">The beginning date</p>
                                </div>
                                <div>
                                    <label for="endDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        End Date
                                    </label>
                                    <input 
                                        type="date" 
                                        id="endDate" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                        required
                                    >
                                    <p class="text-sm text-gray-500 mt-1">The ending date</p>
                                </div>
                            </div>

                            <!-- Quick Date Presets -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Date Presets
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setDatePreset('today')" class="preset-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-calendar-day text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Today</div>
                                        <div class="text-xs text-gray-500">vs Tomorrow</div>
                                    </button>
                                    <button type="button" onclick="setDatePreset('week')" class="preset-btn border border-indigo-500 bg-indigo-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-calendar-week text-indigo-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">This Week</div>
                                        <div class="text-xs text-gray-500">7 days</div>
                                    </button>
                                    <button type="button" onclick="setDatePreset('month')" class="preset-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-calendar-alt text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">This Month</div>
                                        <div class="text-xs text-gray-500">30 days</div>
                                    </button>
                                    <button type="button" onclick="setDatePreset('year')" class="preset-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-calendar text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">This Year</div>
                                        <div class="text-xs text-gray-500">365 days</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculation Options -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Options
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" id="includeEndDateBtn" class="option-btn py-3 px-4 border-2 border-indigo-500 bg-indigo-50 text-indigo-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-calendar-check mr-2"></i>
                                        Include End Date
                                    </button>
                                    <button type="button" id="excludeEndDateBtn" class="option-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-calendar-times mr-2"></i>
                                        Exclude End Date
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-2">Choose whether to include the end date in the calculation</p>
                            </div>

                            <!-- Output Format -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Output Format
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setOutputFormat('detailed')" class="format-btn border border-indigo-500 bg-indigo-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-list-ul text-indigo-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Detailed</div>
                                        <div class="text-xs text-gray-500">All units</div>
                                    </button>
                                    <button type="button" onclick="setOutputFormat('days')" class="format-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-calendar-day text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Days Only</div>
                                        <div class="text-xs text-gray-500">Total days</div>
                                    </button>
                                    <button type="button" onclick="setOutputFormat('workdays')" class="format-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-briefcase text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Workdays</div>
                                        <div class="text-xs text-gray-500">Business days</div>
                                    </button>
                                    <button type="button" onclick="setOutputFormat('age')" class="format-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-birthday-cake text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Age</div>
                                        <div class="text-xs text-gray-500">Years, months, days</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateDateDifference()"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Date Difference
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Date Difference Results</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-calendar-alt text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Select two dates</p>
                                <p class="text-sm">to see the difference</p>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div id="referenceSection" class="mt-6 p-4 bg-indigo-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Time Units</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">1 week</span>
                                    <span class="font-medium text-gray-800">7 days</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">1 month</span>
                                    <span class="font-medium text-gray-800">~30.44 days</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">1 year</span>
                                    <span class="font-medium text-gray-800">365.25 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Main Difference -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Time Duration</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-6 bg-indigo-50 rounded-lg border border-indigo-200">
                            <div class="text-2xl font-bold text-indigo-600 mb-2" id="totalDays">0</div>
                            <div class="text-lg font-semibold text-gray-700">Total Days</div>
                            <div class="text-sm text-gray-500 mt-1" id="daysDetail">Calendar days</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="totalWeeks">0</div>
                            <div class="text-lg font-semibold text-gray-700">Weeks</div>
                            <div class="text-sm text-gray-500 mt-1" id="weeksDetail">Full weeks</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="totalMonths">0</div>
                            <div class="text-lg font-semibold text-gray-700">Months</div>
                            <div class="text-sm text-gray-500 mt-1" id="monthsDetail">Approximate</div>
                        </div>
                        <div class="text-center p-6 bg-red-50 rounded-lg border border-red-200">
                            <div class="text-2xl font-bold text-red-600 mb-2" id="totalYears">0</div>
                            <div class="text-lg font-semibold text-gray-700">Years</div>
                            <div class="text-sm text-gray-500 mt-1" id="yearsDetail">Full years</div>
                        </div>
                    </div>
                </div>

                <!-- Breakdown Section -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Breakdown</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Time Breakdown -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Time Breakdown</h3>
                            <div class="space-y-4" id="timeBreakdown">
                            </div>
                        </div>
                        
                        <!-- Additional Metrics -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Additional Metrics</h3>
                            <div class="space-y-4" id="additionalMetrics">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Visualization -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Timeline Visualization</h2>
                    <div class="space-y-6">
                        <div id="timelineChart" class="bg-gray-50 rounded-lg p-6">
                            <!-- Timeline will be generated here -->
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4" id="timelineStats">
                        </div>
                    </div>
                </div>

                <!-- Date Context -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Date Context & Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Date Information -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Date Information</h3>
                            <div class="space-y-3" id="dateInformation">
                            </div>
                        </div>
                        
                        <!-- Common Uses -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Common Use Cases</h3>
                            <div class="space-y-3" id="commonUses">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calculator Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Date Calculations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-day text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Calendar Days</h3>
                        <p class="text-gray-600">Counts every day between two dates, including weekends and holidays. Perfect for vacation planning and project timelines.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-briefcase text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Business Days</h3>
                        <p class="text-gray-600">Excludes weekends and typically holidays. Essential for project management, legal deadlines, and work-related calculations.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-birthday-cake text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Age Calculation</h3>
                        <p class="text-gray-600">Precise calculation of years, months, and days between dates. Accounts for leap years and varying month lengths.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Date Difference FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is the date difference calculation?</h3>
                        <p class="text-gray-600">Our calculator is highly accurate and accounts for leap years, varying month lengths, and daylight saving time changes. It uses precise JavaScript Date object calculations.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between calendar days and business days?</h3>
                        <p class="text-gray-600">Calendar days include every day (weekends and holidays), while business days typically exclude weekends and public holidays, representing actual working days.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How are months calculated in date differences?</h3>
                        <p class="text-gray-600">Months are calculated based on the actual calendar months between dates, not fixed 30-day periods. This provides more accurate results for financial and age calculations.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I calculate age with this calculator?</h3>
                        <p class="text-gray-600">Yes! Use the "Age" output format to get precise age calculations in years, months, and days. Perfect for birthdays, anniversaries, and legal age verification.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What time zone does the calculator use?</h3>
                        <p class="text-gray-600">The calculator uses your local browser time zone. For precise calculations across different time zones, ensure both dates are entered in the same time zone context.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('age.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-birthday-cake text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Age Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate exact age from birth date</p>
                    </a>
                    {{-- <a href="{{ route('business.days.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-briefcase text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Business Days Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate working days between dates</p>
                    </a>
                    <a href="{{ route('date.add.subtract') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calendar-plus text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Date Add/Subtract</h3>
                        <p class="text-gray-600 text-sm">Add or subtract days from a date</p>
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
let includeEndDate = true;
let currentOutputFormat = 'detailed';

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    
    // Set default dates (today and 30 days from now)
    const today = new Date();
    const futureDate = new Date();
    futureDate.setDate(today.getDate() + 30);
    
    document.getElementById('startDate').valueAsDate = today;
    document.getElementById('endDate').valueAsDate = futureDate;
    
    calculateDateDifference(); // Calculate with default values
});

function setupEventListeners() {
    // Include/Exclude end date toggle
    document.getElementById('includeEndDateBtn').addEventListener('click', () => setEndDateOption(true));
    document.getElementById('excludeEndDateBtn').addEventListener('click', () => setEndDateOption(false));
    
    // Auto-calculate on date change
    document.getElementById('startDate').addEventListener('change', debounce(calculateDateDifference, 300));
    document.getElementById('endDate').addEventListener('change', debounce(calculateDateDifference, 300));
}

function setEndDateOption(include) {
    includeEndDate = include;
    
    if (include) {
        document.getElementById('includeEndDateBtn').classList.add('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
        document.getElementById('includeEndDateBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('excludeEndDateBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('excludeEndDateBtn').classList.remove('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
    } else {
        document.getElementById('excludeEndDateBtn').classList.add('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
        document.getElementById('excludeEndDateBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('includeEndDateBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('includeEndDateBtn').classList.remove('border-indigo-500', 'bg-indigo-50', 'text-indigo-700');
    }
    
    calculateDateDifference();
}

function setDatePreset(preset) {
    const today = new Date();
    const startDate = new Date();
    const endDate = new Date();
    
    switch(preset) {
        case 'today':
            endDate.setDate(today.getDate() + 1);
            break;
        case 'week':
            endDate.setDate(today.getDate() + 7);
            break;
        case 'month':
            endDate.setMonth(today.getMonth() + 1);
            break;
        case 'year':
            endDate.setFullYear(today.getFullYear() + 1);
            break;
    }
    
    document.getElementById('startDate').valueAsDate = startDate;
    document.getElementById('endDate').valueAsDate = endDate;
    
    // Update preset buttons
    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.classList.remove('border-indigo-500', 'bg-indigo-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'today': 'green',
        'week': 'indigo',
        'month': 'purple',
        'year': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[preset]}-500`, `bg-${colorMap[preset]}-50`);
    
    calculateDateDifference();
}

function setOutputFormat(format) {
    currentOutputFormat = format;
    
    document.querySelectorAll('.format-btn').forEach(btn => {
        btn.classList.remove('border-indigo-500', 'bg-indigo-50', 'border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'detailed': 'indigo',
        'days': 'blue',
        'workdays': 'green',
        'age': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[format]}-500`, `bg-${colorMap[format]}-50`);
    
    calculateDateDifference();
}

function calculateDateDifference() {
    const startDateInput = document.getElementById('startDate').value;
    const endDateInput = document.getElementById('endDate').value;
    
    if (!startDateInput || !endDateInput) {
        showError('Please select both start and end dates');
        return;
    }
    
    const startDate = new Date(startDateInput);
    const endDate = new Date(endDateInput);
    
    if (startDate > endDate) {
        showError('Start date must be before end date');
        return;
    }
    
    // Calculate basic difference in milliseconds
    let timeDiff = endDate - startDate;
    
    // Adjust for include/exclude end date
    if (!includeEndDate) {
        timeDiff -= 24 * 60 * 60 * 1000; // Subtract one day
    }
    
    // Calculate various time units
    const totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    const totalWeeks = Math.floor(totalDays / 7);
    const remainingDays = totalDays % 7;
    
    // Calculate months and years
    const years = endDate.getFullYear() - startDate.getFullYear();
    const months = endDate.getMonth() - startDate.getMonth();
    const days = endDate.getDate() - startDate.getDate();
    
    let totalMonths = years * 12 + months;
    if (days < 0) {
        totalMonths--;
    }
    
    const exactYears = totalDays / 365.25;
    const exactMonths = totalDays / 30.44;
    
    // Calculate business days
    const businessDays = calculateBusinessDays(startDate, endDate, includeEndDate);
    
    // Display results based on selected format
    displayResults(totalDays, totalWeeks, remainingDays, totalMonths, exactYears, businessDays, startDate, endDate);
    
    // Generate detailed analysis
    generateDetailedAnalysis(totalDays, totalWeeks, totalMonths, exactYears, businessDays, startDate, endDate);
}

function calculateBusinessDays(startDate, endDate, includeEnd) {
    let count = 0;
    const current = new Date(startDate);
    const end = new Date(endDate);
    
    if (!includeEnd) {
        end.setDate(end.getDate() - 1);
    }
    
    while (current <= end) {
        const dayOfWeek = current.getDay();
        if (dayOfWeek !== 0 && dayOfWeek !== 6) { // Not Sunday or Saturday
            count++;
        }
        current.setDate(current.getDate() + 1);
    }
    
    return count;
}

function displayResults(totalDays, totalWeeks, remainingDays, totalMonths, exactYears, businessDays, startDate, endDate) {
    const startDateStr = startDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    const endDateStr = endDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    
    let resultsHTML = '';
    
    switch(currentOutputFormat) {
        case 'detailed':
            resultsHTML = `
                <div class="space-y-6">
                    <!-- Main Result -->
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 border-2 border-indigo-200">
                        <div class="text-center mb-4">
                            <div class="text-2xl md:text-3xl font-bold text-indigo-600 mb-2">${totalDays} Days</div>
                            <div class="text-lg font-semibold text-gray-700">Total Duration</div>
                            <div class="text-sm text-gray-500 mt-1">${totalWeeks} weeks ${remainingDays} days</div>
                        </div>
                    </div>

                    <!-- Breakdown -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-50 rounded-lg p-4 text-center">
                            <div class="text-xl font-bold text-blue-600 mb-1">${totalMonths}</div>
                            <div class="text-sm text-blue-800">Months</div>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 text-center">
                            <div class="text-xl font-bold text-green-600 mb-1">${businessDays}</div>
                            <div class="text-sm text-green-800">Business Days</div>
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                        <h4 class="font-semibold text-purple-900 mb-2">Date Range</h4>
                        <p class="text-sm text-purple-800">
                            <strong>From:</strong> ${startDateStr}<br>
                            <strong>To:</strong> ${endDateStr}
                        </p>
                    </div>
                </div>
            `;
            break;
            
        case 'days':
            resultsHTML = `
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border-2 border-blue-200">
                        <div class="text-center mb-4">
                            <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">${totalDays}</div>
                            <div class="text-lg font-semibold text-gray-700">Total Days</div>
                            <div class="text-sm text-gray-500 mt-1">Calendar days between dates</div>
                        </div>
                    </div>
                </div>
            `;
            break;
            
        case 'workdays':
            resultsHTML = `
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border-2 border-green-200">
                        <div class="text-center mb-4">
                            <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">${businessDays}</div>
                            <div class="text-lg font-semibold text-gray-700">Business Days</div>
                            <div class="text-sm text-gray-500 mt-1">Excluding weekends</div>
                        </div>
                    </div>
                </div>
            `;
            break;
            
        case 'age':
            const years = Math.floor(exactYears);
            const months = Math.floor((exactYears - years) * 12);
            const days = Math.floor((exactYears - years - months/12) * 365.25);
            
            resultsHTML = `
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border-2 border-purple-200">
                        <div class="text-center mb-4">
                            <div class="text-2xl md:text-3xl font-bold text-purple-600 mb-2">${years} Years</div>
                            <div class="text-lg font-semibold text-gray-700">Age Duration</div>
                            <div class="text-sm text-gray-500 mt-1">${months} months, ${days} days</div>
                        </div>
                    </div>
                </div>
            `;
            break;
    }
    
    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('referenceSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update main metrics
    document.getElementById('totalDays').textContent = totalDays;
    document.getElementById('totalWeeks').textContent = totalWeeks;
    document.getElementById('totalMonths').textContent = totalMonths;
    document.getElementById('totalYears').textContent = Math.floor(exactYears);
    
    document.getElementById('daysDetail').textContent = includeEndDate ? 'Including end date' : 'Excluding end date';
    document.getElementById('weeksDetail').textContent = `${remainingDays} days remaining`;
    document.getElementById('monthsDetail').textContent = 'Calendar months';
    document.getElementById('yearsDetail').textContent = 'Approximate years';
}

function generateDetailedAnalysis(totalDays, totalWeeks, totalMonths, exactYears, businessDays, startDate, endDate) {
    generateTimeBreakdown(totalDays, totalWeeks, totalMonths, exactYears, businessDays);
    generateAdditionalMetrics(totalDays, startDate, endDate);
    generateTimeline(totalDays, startDate, endDate);
    generateDateContext(startDate, endDate);
}

function generateTimeBreakdown(totalDays, totalWeeks, totalMonths, exactYears, businessDays) {
    const hours = totalDays * 24;
    const minutes = hours * 60;
    const seconds = minutes * 60;
    
    document.getElementById('timeBreakdown').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Hours</span>
                <span class="font-semibold text-gray-900">${hours.toLocaleString()}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Minutes</span>
                <span class="font-semibold text-gray-900">${minutes.toLocaleString()}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Seconds</span>
                <span class="font-semibold text-gray-900">${seconds.toLocaleString()}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                <span class="text-blue-700">Business Days</span>
                <span class="font-semibold text-blue-900">${businessDays}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg border border-green-200">
                <span class="text-green-700">Weekends</span>
                <span class="font-semibold text-green-900">${totalDays - businessDays}</span>
            </div>
        </div>
    `;
}

function generateAdditionalMetrics(totalDays, startDate, endDate) {
    const today = new Date();
    const daysFromNow = Math.floor((endDate - today) / (1000 * 60 * 60 * 24));
    const daysAgo = Math.floor((today - startDate) / (1000 * 60 * 60 * 24));
    const season = getSeason(startDate);
    
    document.getElementById('additionalMetrics').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-indigo-50 rounded-lg border border-indigo-200">
                <span class="text-indigo-700">Days from today</span>
                <span class="font-semibold text-indigo-900">${daysFromNow > 0 ? `In ${daysFromNow} days` : `${Math.abs(daysFromNow)} days ago`}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg border border-purple-200">
                <span class="text-purple-700">Start date was</span>
                <span class="font-semibold text-purple-900">${daysAgo} days ago</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <span class="text-yellow-700">Season</span>
                <span class="font-semibold text-yellow-900">${season}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg border border-red-200">
                <span class="text-red-700">Leap Year</span>
                <span class="font-semibold text-red-900">${isLeapYear(startDate.getFullYear()) ? 'Yes' : 'No'}</span>
            </div>
        </div>
    `;
}

function getSeason(date) {
    const month = date.getMonth();
    if (month >= 2 && month <= 4) return 'Spring';
    if (month >= 5 && month <= 7) return 'Summer';
    if (month >= 8 && month <= 10) return 'Fall';
    return 'Winter';
}

function isLeapYear(year) {
    return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
}

function generateTimeline(totalDays, startDate, endDate) {
    const today = new Date();
    const progress = Math.min(100, Math.max(0, ((today - startDate) / (endDate - startDate)) * 100));
    
    document.getElementById('timelineChart').innerHTML = `
        <div class="relative pt-4">
            <div class="flex justify-between text-sm text-gray-600 mb-2">
                <span>${startDate.toLocaleDateString()}</span>
                <span>${endDate.toLocaleDateString()}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-4">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-4 rounded-full transition-all duration-500" 
                     style="width: ${progress}%"></div>
            </div>
            <div class="flex justify-between text-xs text-gray-500 mt-2">
                <span>Start</span>
                <span>${Math.round(progress)}% Complete</span>
                <span>End</span>
            </div>
        </div>
    `;
    
    document.getElementById('timelineStats').innerHTML = `
        <div class="text-center p-4 bg-indigo-50 rounded-lg">
            <div class="text-xl font-bold text-indigo-600">${Math.round(progress)}%</div>
            <div class="text-sm text-indigo-800">Progress</div>
        </div>
        <div class="text-center p-4 bg-blue-50 rounded-lg">
            <div class="text-xl font-bold text-blue-600">${totalDays - Math.floor((today - startDate) / (1000 * 60 * 60 * 24))}</div>
            <div class="text-sm text-blue-800">Days Remaining</div>
        </div>
        <div class="text-center p-4 bg-green-50 rounded-lg">
            <div class="text-xl font-bold text-green-600">${Math.floor((today - startDate) / (1000 * 60 * 60 * 24))}</div>
            <div class="text-sm text-green-800">Days Passed</div>
        </div>
    `;
}

function generateDateContext(startDate, endDate) {
    const startDay = startDate.getDay();
    const endDay = endDate.getDay();
    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    
    document.getElementById('dateInformation').innerHTML = `
        <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">Start Day</span>
                <span class="font-semibold text-gray-900">${daysOfWeek[startDay]}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                <span class="text-gray-700">End Day</span>
                <span class="font-semibold text-gray-900">${daysOfWeek[endDay]}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                <span class="text-blue-700">Quarter</span>
                <span class="font-semibold text-blue-900">Q${Math.floor(startDate.getMonth() / 3) + 1}</span>
            </div>
            <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                <span class="text-purple-700">ISO Week</span>
                <span class="font-semibold text-purple-900">${getISOWeek(startDate)}</span>
            </div>
        </div>
    `;
    
    document.getElementById('commonUses').innerHTML = `
        <div class="space-y-3">
            <div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200">
                <i class="fas fa-briefcase text-green-600 mt-1 mr-3"></i>
                <div class="text-sm text-green-800">Project deadlines and milestone tracking</div>
            </div>
            <div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <i class="fas fa-plane text-yellow-600 mt-1 mr-3"></i>
                <div class="text-sm text-yellow-800">Vacation planning and travel itineraries</div>
            </div>
            <div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200">
                <i class="fas fa-birthday-cake text-red-600 mt-1 mr-3"></i>
                <div class="text-sm text-red-800">Age calculation and birthday counting</div>
            </div>
            <div class="flex items-start p-3 bg-indigo-50 rounded-lg border border-indigo-200">
                <i class="fas fa-file-contract text-indigo-600 mt-1 mr-3"></i>
                <div class="text-sm text-indigo-800">Contract durations and legal deadlines</div>
            </div>
        </div>
    `;
}

function getISOWeek(date) {
    const target = new Date(date.valueOf());
    const dayNr = (date.getDay() + 6) % 7;
    target.setDate(target.getDate() - dayNr + 3);
    const firstThursday = target.valueOf();
    target.setMonth(0, 1);
    if (target.getDay() !== 4) {
        target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
    }
    return 1 + Math.ceil((firstThursday - target) / 604800000);
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
    document.getElementById('referenceSection').classList.add('hidden');
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

<style>
.preset-btn, .option-btn, .format-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.preset-btn:hover, .option-btn:hover, .format-btn:hover {
    transform: translateY(-1px);
}

.timeline-item {
    transition: all 0.3s ease;
}

.timeline-item:hover {
    transform: scale(1.02);
}
</style>
@endsection