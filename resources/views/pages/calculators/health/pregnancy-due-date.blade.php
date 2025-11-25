@extends('layouts.app')

@section('title', 'Pregnancy Due Date Calculator | Baby Arrival Estimator | CalculaterTools')

@section('meta-description', 'Free pregnancy due date calculator to estimate your baby\'s arrival date. Track pregnancy progress, trimesters, and get personalized week-by-week insights.')

@section('keywords', 'pregnancy due date calculator, baby due date, pregnancy calculator, conception date, gestational age, pregnancy timeline, baby arrival date')

@section('canonical', url('/calculators/pregnancy-due-date'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Pregnancy Due Date Calculator",
    "description": "Calculate your pregnancy due date and track your baby's development week by week",
    "url": "{{ url('/calculators/pregnancy-due-date') }}",
    "operatingSystem": "Any",
    "applicationCategory": "HealthApplication",
    "permissions": "browser",
    "creator": {
        "@type": "Organization",
        "name": "CalculaterTools"
    }
}
</script>
@endverbatim
<div class="min-h-screen bg-pink-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="max-w-6xl mx-auto mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-pink-600 hover:text-pink-800 transition duration-150">Home</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li>
                        <a href="#health" class="text-pink-600 hover:text-pink-800 transition duration-150">Health Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Pregnancy Due Date Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Pregnancy Due Date Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your estimated due date and track your pregnancy journey week by week with personalized insights.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Due Date</h2>
                        <p class="text-gray-600 mb-6">Enter your pregnancy information to estimate your baby's arrival date</p>
                        
                        <form id="pregnancyCalculatorForm" class="space-y-6">
                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <button type="button" id="lmpMethodBtn" class="method-btn py-3 px-4 border-2 border-pink-500 bg-pink-50 text-pink-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-calendar-day mr-2"></i>
                                        Last Menstrual Period
                                    </button>
                                    <button type="button" id="conceptionMethodBtn" class="method-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-purple-500 transition duration-200">
                                        <i class="fas fa-heart mr-2"></i>
                                        Conception Date
                                    </button>
                                </div>
                            </div>

                            <!-- LMP Inputs -->
                            <div id="lmpInputs" class="space-y-4">
                                <div>
                                    <label for="lmpDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        First Day of Last Menstrual Period
                                    </label>
                                    <input 
                                        type="date" 
                                        id="lmpDate" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="cycleLength" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Average Cycle Length (days)
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="number" 
                                            id="cycleLength" 
                                            class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                                            placeholder="e.g., 28" 
                                            min="21" 
                                            max="35" 
                                            value="28"
                                            required
                                        >
                                        <span class="absolute right-3 top-3 text-gray-500">days</span>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Typical cycle length is 28 days</p>
                                </div>
                            </div>

                            <!-- Conception Inputs -->
                            <div id="conceptionInputs" class="space-y-4 hidden">
                                <div>
                                    <label for="conceptionDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Conception Date
                                    </label>
                                    <input 
                                        type="date" 
                                        id="conceptionDate" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                                    >
                                </div>
                                <div>
                                    <label for="ivfDate" class="block text-sm font-semibold text-gray-800 mb-2">
                                        IVF/Embryo Transfer Date (Optional)
                                    </label>
                                    <input 
                                        type="date" 
                                        id="ivfDate" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                                    >
                                </div>
                            </div>

                            <!-- Current Pregnancy Status -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Current Pregnancy Status
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setPregnancyStatus('planning')" class="status-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-baby text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Planning</div>
                                    </button>
                                    <button type="button" onclick="setPregnancyStatus('first-trimester')" class="status-btn border border-pink-500 bg-pink-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-seedling text-pink-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">1st Trimester</div>
                                    </button>
                                    <button type="button" onclick="setPregnancyStatus('second-trimester')" class="status-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-leaf text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">2nd Trimester</div>
                                    </button>
                                    <button type="button" onclick="setPregnancyStatus('third-trimester')" class="status-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-star text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">3rd Trimester</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Pregnancy History -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="pregnancyNumber" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Pregnancy Number
                                    </label>
                                    <select id="pregnancyNumber" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200">
                                        <option value="1">First Pregnancy</option>
                                        <option value="2">Second Pregnancy</option>
                                        <option value="3">Third Pregnancy</option>
                                        <option value="4">Fourth+ Pregnancy</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Previous Births
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="previousFullTerm" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                                                placeholder="Full term" 
                                                min="0" 
                                                max="10"
                                                value="0"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500 text-xs">full</span>
                                        </div>
                                        <div class="relative">
                                            <input 
                                                type="number" 
                                                id="previousPreTerm" 
                                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-200"
                                                placeholder="Pre-term" 
                                                min="0" 
                                                max="10"
                                                value="0"
                                            >
                                            <span class="absolute right-3 top-3 text-gray-500 text-xs">pre-term</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateDueDate()"
                                class="w-full bg-pink-600 hover:bg-pink-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-pink-300"
                            >
                                <i class="fas fa-baby-carriage mr-2"></i>
                                Calculate Due Date
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Pregnancy Timeline</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-baby text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see your due date</p>
                            </div>
                        </div>

                        <!-- Pregnancy Progress -->
                        <div id="progressSection" class="mt-6 p-4 bg-pink-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Pregnancy Progress</h4>
                            <div class="space-y-3 text-sm" id="progressList">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Key Dates -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Key Pregnancy Dates</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-pink-50 rounded-lg border border-pink-200">
                            <div class="text-2xl font-bold text-pink-600 mb-2" id="dueDate">-</div>
                            <div class="text-lg font-semibold text-gray-700">Estimated Due Date</div>
                            <div class="text-sm text-gray-500 mt-1">40 weeks from LMP</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-2xl font-bold text-blue-600 mb-2" id="conceptionWeek">-</div>
                            <div class="text-lg font-semibold text-gray-700">Conception Period</div>
                            <div class="text-sm text-gray-500 mt-1">Week 2 of pregnancy</div>
                        </div>
                        <div class="text-center p-6 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="text-2xl font-bold text-purple-600 mb-2" id="currentWeek">-</div>
                            <div class="text-lg font-semibold text-gray-700">Current Week</div>
                            <div class="text-sm text-gray-500 mt-1" id="trimesterInfo">-</div>
                        </div>
                    </div>
                </div>

                <!-- Pregnancy Timeline -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pregnancy Timeline</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Timeline Chart -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Week-by-Week Progress</h3>
                            <div class="space-y-4" id="timelineChart">
                            </div>
                        </div>
                        
                        <!-- Current Week Details -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4" id="currentWeekTitle">Current Week</h3>
                            <div class="space-y-4" id="weekDetails">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Important Milestones -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Important Milestones</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="milestones">
                    </div>
                </div>

                <!-- Pregnancy Tips -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pregnancy Health & Tips</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Health Guidelines -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Health Guidelines</h3>
                            <div class="space-y-3" id="healthGuidelines">
                            </div>
                        </div>
                        
                        <!-- Preparation Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Preparation Tips</h3>
                            <div class="space-y-3" id="preparationTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pregnancy Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Pregnancy Timeline</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-seedling text-pink-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">First Trimester</h3>
                        <p class="text-gray-600">Weeks 1-13: Early development, organ formation, and initial pregnancy symptoms.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-leaf text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Second Trimester</h3>
                        <p class="text-gray-600">Weeks 14-27: Rapid growth, movement felt, and gender may be detectable.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-star text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Third Trimester</h3>
                        <p class="text-gray-600">Weeks 28-40+: Final growth, preparation for birth, and baby positioning.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Pregnancy Due Date FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How accurate is the due date calculation?</h3>
                        <p class="text-gray-600">Due dates are estimates - only about 5% of babies are born on their exact due date. Most births occur within two weeks before or after the estimated date.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What if I don't know my last menstrual period?</h3>
                        <p class="text-gray-600">If you're unsure about your LMP, an ultrasound in early pregnancy can provide a more accurate due date estimation.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can my due date change?</h3>
                        <p class="text-gray-600">Yes, healthcare providers may adjust your due date based on ultrasound measurements, especially if there's a significant difference from LMP-based calculations.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is Naegele's Rule?</h3>
                        <p class="text-gray-600">This is the standard method for due date calculation: Add 7 days to the first day of your last period, then subtract 3 months (or add 9 months).</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I contact my healthcare provider?</h3>
                        <p class="text-gray-600">Schedule your first prenatal appointment as soon as you suspect pregnancy. Early care is important for monitoring both maternal and fetal health.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Health Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- <a href="{{ route('ovulation.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-pink-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-egg text-pink-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Ovulation Calculator</h3>
                        <p class="text-gray-600 text-sm">Track your fertile window</p>
                    </a>
                    <a href="{{ route('pregnancy.weight.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-pink-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-weight text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Pregnancy Weight Calculator</h3>
                        <p class="text-gray-600 text-sm">Track healthy weight gain</p>
                    </a>
                    <a href="{{ route('baby.growth.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-pink-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-baby text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Baby Growth Calculator</h3>
                        <p class="text-gray-600 text-sm">Track infant development</p>
                    </a> --}}
                    <a href="{{ route('bmi.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-weight text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMI Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Body Mass Index</p>
                    </a>
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-heartbeat text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Basal Metabolic Rate</p>
                    </a>
                    <a href="{{ route('heart.rate.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-heart text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Heart Rate Calculator</h3>
                        <p class="text-gray-600 text-sm">Check your target heart rate zones</p>
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
let currentMethod = 'lmp';
let currentStatus = 'first-trimester';

// Pregnancy milestones data
const pregnancyMilestones = [
    { week: 4, title: 'Positive Test', description: 'Pregnancy test may show positive' },
    { week: 6, title: 'Heartbeat', description: 'Baby\'s heartbeat may be detectable' },
    { week: 8, title: 'Major Organs', description: 'All major organs beginning to form' },
    { week: 12, title: 'First Trimester End', description: 'Risk of miscarriage decreases' },
    { week: 16, title: 'Gender Reveal', description: 'Gender may be visible on ultrasound' },
    { week: 20, title: 'Halfway Point', description: 'Mid-pregnancy ultrasound' },
    { week: 24, title: 'Viability', description: 'Baby may survive if born early' },
    { week: 28, title: 'Third Trimester', description: 'Final growth phase begins' },
    { week: 32, title: 'Positioning', description: 'Baby may move to head-down position' },
    { week: 36, title: 'Full Term', description: 'Baby is considered full term' },
    { week: 40, title: 'Due Date', description: 'Estimated arrival date' }
];

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    // Set default date to 4 weeks ago (typical LMP for early pregnancy detection)
    const defaultDate = new Date();
    defaultDate.setDate(defaultDate.getDate() - 28);
    document.getElementById('lmpDate').valueAsDate = defaultDate;
    document.getElementById('conceptionDate').valueAsDate = new Date();
    
    calculateDueDate(); // Calculate with default values
});

function setupEventListeners() {
    // Method toggle
    document.getElementById('lmpMethodBtn').addEventListener('click', () => setCalculationMethod('lmp'));
    document.getElementById('conceptionMethodBtn').addEventListener('click', () => setCalculationMethod('conception'));
    
    // Auto-calculate on input change
    document.getElementById('lmpDate').addEventListener('change', debounce(calculateDueDate, 300));
    document.getElementById('cycleLength').addEventListener('input', debounce(calculateDueDate, 300));
    document.getElementById('conceptionDate').addEventListener('change', debounce(calculateDueDate, 300));
    document.getElementById('ivfDate').addEventListener('change', debounce(calculateDueDate, 300));
}

function setCalculationMethod(method) {
    currentMethod = method;
    
    if (method === 'lmp') {
        document.getElementById('lmpMethodBtn').classList.add('border-pink-500', 'bg-pink-50', 'text-pink-700');
        document.getElementById('lmpMethodBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('conceptionMethodBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('conceptionMethodBtn').classList.remove('border-purple-500', 'bg-purple-50', 'text-purple-700');
        document.getElementById('lmpInputs').classList.remove('hidden');
        document.getElementById('conceptionInputs').classList.add('hidden');
    } else {
        document.getElementById('conceptionMethodBtn').classList.add('border-purple-500', 'bg-purple-50', 'text-purple-700');
        document.getElementById('conceptionMethodBtn').classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('lmpMethodBtn').classList.add('border-gray-300', 'bg-white', 'text-gray-700');
        document.getElementById('lmpMethodBtn').classList.remove('border-pink-500', 'bg-pink-50', 'text-pink-700');
        document.getElementById('conceptionInputs').classList.remove('hidden');
        document.getElementById('lmpInputs').classList.add('hidden');
    }
    
    calculateDueDate();
}

function setPregnancyStatus(status) {
    currentStatus = status;
    
    document.querySelectorAll('.status-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-pink-500', 'bg-pink-50', 'border-green-500', 'bg-green-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'planning': 'blue',
        'first-trimester': 'pink',
        'second-trimester': 'green',
        'third-trimester': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[status]}-500`, `bg-${colorMap[status]}-50`);
    
    calculateDueDate();
}

function calculateDueDate() {
    let dueDate, conceptionDate, currentWeek;
    
    if (currentMethod === 'lmp') {
        const lmpDate = new Date(document.getElementById('lmpDate').value);
        const cycleLength = parseInt(document.getElementById('cycleLength').value) || 28;
        
        if (!lmpDate || isNaN(lmpDate.getTime())) {
            showError('Please enter a valid last menstrual period date');
            return;
        }
        
        // Calculate due date using Naegele's rule
        dueDate = new Date(lmpDate);
        dueDate.setDate(dueDate.getDate() + 280); // 40 weeks from LMP
        
        // Adjust for cycle length if different from 28 days
        if (cycleLength !== 28) {
            const adjustment = cycleLength - 28;
            dueDate.setDate(dueDate.getDate() + adjustment);
        }
        
        // Calculate conception date (approximately 2 weeks after LMP)
        conceptionDate = new Date(lmpDate);
        conceptionDate.setDate(conceptionDate.getDate() + 14);
        
        // Calculate current week
        const today = new Date();
        const timeDiff = today - lmpDate;
        currentWeek = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 7)) + 1;
        
    } else {
        const conceptionInput = document.getElementById('conceptionDate').value;
        const ivfInput = document.getElementById('ivfDate').value;
        
        if (!conceptionInput && !ivfInput) {
            showError('Please enter either conception date or IVF date');
            return;
        }
        
        let baseDate;
        if (ivfInput) {
            baseDate = new Date(ivfInput);
            // For IVF, due date is 38 weeks from transfer date
            dueDate = new Date(baseDate);
            dueDate.setDate(dueDate.getDate() + 266); // 38 weeks
            conceptionDate = baseDate;
        } else {
            baseDate = new Date(conceptionInput);
            // For natural conception, due date is 38 weeks from conception
            dueDate = new Date(baseDate);
            dueDate.setDate(dueDate.getDate() + 266); // 38 weeks
            conceptionDate = baseDate;
        }
        
        // Calculate current week
        const today = new Date();
        const timeDiff = today - baseDate;
        currentWeek = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 7)) + 3; // Add 2 weeks for LMP equivalent
    }
    
    // Validate current week
    if (currentWeek < 1) currentWeek = 1;
    if (currentWeek > 42) currentWeek = 42;
    
    // Display results
    displayResults(dueDate, conceptionDate, currentWeek);
    
    // Generate detailed analysis
    generateDetailedAnalysis(dueDate, currentWeek);
}

function displayResults(dueDate, conceptionDate, currentWeek) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const dueDateStr = dueDate.toLocaleDateString('en-US', options);
    const conceptionStr = conceptionDate.toLocaleDateString('en-US', options);
    
    const trimester = getTrimester(currentWeek);
    const progressPercentage = Math.min(100, (currentWeek / 40) * 100);
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Due Date -->
            <div class="bg-gradient-to-r from-pink-50 to-purple-50 rounded-xl p-6 border-2 border-pink-200">
                <div class="text-center mb-4">
                    <div class="text-2xl md:text-3xl font-bold text-pink-600 mb-2">${dueDateStr}</div>
                    <div class="text-lg font-semibold text-gray-700">Estimated Due Date</div>
                    <div class="text-sm text-gray-500 mt-1">Based on ${currentMethod === 'lmp' ? 'last menstrual period' : 'conception date'}</div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-gray-900">Pregnancy Progress</h4>
                    <span class="text-sm font-medium text-pink-600">Week ${currentWeek}</span>
                </div>
                <div class="relative h-4 bg-gray-200 rounded-full mb-2">
                    <div class="absolute h-4 bg-gradient-to-r from-pink-400 to-purple-500 rounded-full" 
                         style="width: ${progressPercentage}%">
                    </div>
                </div>
                <div class="flex justify-between text-xs text-gray-600">
                    <span>Week 1</span>
                    <span>Week 20</span>
                    <span>Week 40</span>
                </div>
                <div class="text-center text-sm text-gray-600 mt-2">
                    ${trimester.name} • ${Math.round(progressPercentage)}% Complete
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">${40 - currentWeek}</div>
                    <div class="text-sm text-blue-800">Weeks to Go</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-green-600 mb-1">${Math.floor((280 - (currentWeek * 7)) / 30)}</div>
                    <div class="text-sm text-green-800">Months Left</div>
                </div>
            </div>

            <!-- Conception Info -->
            <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                <h4 class="font-semibold text-purple-900 mb-2">Conception Period</h4>
                <p class="text-sm text-purple-800">
                    Estimated conception around <strong>${conceptionStr}</strong>
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('progressSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update key metrics
    document.getElementById('dueDate').textContent = dueDateStr;
    document.getElementById('conceptionWeek').textContent = `Week ${Math.max(2, currentWeek - 2)}`;
    document.getElementById('currentWeek').textContent = `Week ${currentWeek}`;
    document.getElementById('trimesterInfo').textContent = trimester.name;
}

function getTrimester(week) {
    if (week <= 13) {
        return { name: 'First Trimester', color: 'pink' };
    } else if (week <= 27) {
        return { name: 'Second Trimester', color: 'green' };
    } else {
        return { name: 'Third Trimester', color: 'purple' };
    }
}

function generateDetailedAnalysis(dueDate, currentWeek) {
    // Generate timeline chart
    generateTimelineChart(currentWeek);
    
    // Generate current week details
    generateWeekDetails(currentWeek);
    
    // Generate milestones
    generateMilestones(currentWeek);
    
    // Generate tips and guidelines
    generateTipsAndGuidelines(currentWeek);
}

function generateTimelineChart(currentWeek) {
    let timelineHTML = '';
    
    for (let week = 1; week <= 40; week++) {
        const isCurrent = week === currentWeek;
        const isPast = week < currentWeek;
        const trimester = getTrimester(week);
        
        let bgColor = 'bg-gray-200';
        if (isPast) bgColor = 'bg-green-400';
        if (isCurrent) bgColor = 'bg-pink-500';
        
        timelineHTML += `
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-full ${bgColor} flex items-center justify-center text-white text-xs font-bold">
                    ${week}
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium ${isCurrent ? 'text-pink-600' : 'text-gray-700'}">
                            Week ${week}
                            ${isCurrent ? '<span class="ml-2 text-xs bg-pink-100 text-pink-800 px-2 py-1 rounded-full">Current</span>' : ''}
                        </span>
                        <span class="text-xs text-gray-500">${trimester.name}</span>
                    </div>
                    ${week % 5 === 0 ? `<div class="w-full h-1 bg-${trimester.color}-200 rounded-full mt-1"></div>` : ''}
                </div>
            </div>
        `;
    }
    
    document.getElementById('timelineChart').innerHTML = timelineHTML;
}

function generateWeekDetails(currentWeek) {
    const weekData = getWeekData(currentWeek);
    const trimester = getTrimester(currentWeek);
    
    document.getElementById('currentWeekTitle').textContent = `Week ${currentWeek} - ${trimester.name}`;
    
    document.getElementById('weekDetails').innerHTML = `
        <div class="space-y-4">
            <div class="p-4 bg-${trimester.color}-50 rounded-lg border border-${trimester.color}-200">
                <h4 class="font-semibold text-${trimester.color}-800 mb-2">Baby's Development</h4>
                <p class="text-${trimester.color}-700 text-sm">${weekData.babyDevelopment}</p>
            </div>
            
            <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h4 class="font-semibold text-blue-800 mb-2">Your Body</h4>
                <p class="text-blue-700 text-sm">${weekData.maternalChanges}</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="p-3 bg-yellow-50 rounded-lg">
                    <h5 class="font-semibold text-yellow-800 text-sm">Baby Size</h5>
                    <p class="text-yellow-700 text-sm">${weekData.babySize}</p>
                </div>
                <div class="p-3 bg-purple-50 rounded-lg">
                    <h5 class="font-semibold text-purple-800 text-sm">Key Developments</h5>
                    <p class="text-purple-700 text-sm">${weekData.keyDevelopments}</p>
                </div>
            </div>
            
            <div class="p-3 bg-green-50 rounded-lg border border-green-200">
                <h4 class="font-semibold text-green-800 mb-2 text-sm">This Week's Tips</h4>
                <p class="text-green-700 text-sm">${weekData.tips}</p>
            </div>
        </div>
    `;
}

function getWeekData(week) {
    // Simplified week data - in a real application, this would be more comprehensive
    const weekData = {
        babyDevelopment: '',
        maternalChanges: '',
        babySize: '',
        keyDevelopments: '',
        tips: ''
    };
    
    if (week <= 13) {
        weekData.babyDevelopment = 'Rapid cell division and organ formation. Major organs and structures begin to develop.';
        weekData.maternalChanges = 'Early pregnancy symptoms like fatigue, nausea, and breast tenderness may appear.';
        weekData.babySize = 'About the size of a pea to a lemon';
        weekData.keyDevelopments = 'Neural tube, heart, and limb buds form';
        weekData.tips = 'Start prenatal vitamins, schedule first doctor appointment, and focus on nutrition.';
    } else if (week <= 27) {
        weekData.babyDevelopment = 'Rapid growth phase. Baby begins to move and can hear sounds. Features become more defined.';
        weekData.maternalChanges = 'Energy often returns. Baby bump becomes visible. You may feel baby movements.';
        weekData.babySize = 'About the size of an avocado to an eggplant';
        weekData.keyDevelopments = 'Gender visible, vernix coating forms, practice breathing begins';
        weekData.tips = 'Consider maternity clothes, plan for baby registry, and stay active with doctor-approved exercise.';
    } else {
        weekData.babyDevelopment = 'Final growth and brain development. Baby gains weight and practices breathing movements.';
        weekData.maternalChanges = 'Increased discomfort, Braxton Hicks contractions, and preparation for labor.';
        weekData.babySize = 'About the size of a squash to a watermelon';
        weekData.keyDevelopments = 'Lungs mature, fat accumulation, positioning for birth';
        weekData.tips = 'Prepare hospital bag, finalize birth plan, and practice relaxation techniques.';
    }
    
    return weekData;
}

function generateMilestones(currentWeek) {
    let milestonesHTML = '';
    
    pregnancyMilestones.forEach(milestone => {
        const isPast = milestone.week < currentWeek;
        const isCurrent = milestone.week === currentWeek;
        const isFuture = milestone.week > currentWeek;
        
        let statusClass = 'bg-gray-100 border-gray-300';
        let statusIcon = 'far fa-clock text-gray-400';
        
        if (isPast) {
            statusClass = 'bg-green-50 border-green-200';
            statusIcon = 'fas fa-check text-green-500';
        } else if (isCurrent) {
            statusClass = 'bg-pink-50 border-pink-200';
            statusIcon = 'fas fa-star text-pink-500';
        }
        
        milestonesHTML += `
            <div class="${statusClass} border rounded-lg p-4 text-center">
                <i class="${statusIcon} text-xl mb-2"></i>
                <div class="font-semibold text-gray-800">Week ${milestone.week}</div>
                <div class="text-sm text-gray-600 mt-1">${milestone.title}</div>
                <div class="text-xs text-gray-500 mt-2">${milestone.description}</div>
            </div>
        `;
    });
    
    document.getElementById('milestones').innerHTML = milestonesHTML;
}

function generateTipsAndGuidelines(currentWeek) {
    const trimester = getTrimester(currentWeek);
    
    document.getElementById('healthGuidelines').innerHTML = `
        <div class="space-y-4">
            <div class="flex items-start p-3 bg-pink-50 rounded-lg border border-pink-200">
                <i class="fas fa-utensils text-pink-600 mt-1 mr-3"></i>
                <div class="text-sm text-pink-800">Eat balanced meals with plenty of fruits, vegetables, and protein</div>
            </div>
            <div class="flex items-start p-3 bg-green-50 rounded-lg border border-green-200">
                <i class="fas fa-walking text-green-600 mt-1 mr-3"></i>
                <div class="text-sm text-green-800">Stay active with 30 minutes of moderate exercise most days</div>
            </div>
            <div class="flex items-start p-3 bg-blue-50 rounded-lg border border-blue-200">
                <i class="fas fa-prescription-bottle text-blue-600 mt-1 mr-3"></i>
                <div class="text-sm text-blue-800">Take prenatal vitamins and attend all scheduled appointments</div>
            </div>
            <div class="flex items-start p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <i class="fas fa-ban text-yellow-600 mt-1 mr-3"></i>
                <div class="text-sm text-yellow-800">Avoid alcohol, tobacco, and limit caffeine intake</div>
            </div>
        </div>
    `;
    
    document.getElementById('preparationTips').innerHTML = `
        <div class="space-y-4">
            <div class="flex items-start p-3 bg-purple-50 rounded-lg border border-purple-200">
                <i class="fas fa-book text-purple-600 mt-1 mr-3"></i>
                <div class="text-sm text-purple-800">Research childbirth education classes and breastfeeding resources</div>
            </div>
            <div class="flex items-start p-3 bg-indigo-50 rounded-lg border border-indigo-200">
                <i class="fas fa-shopping-cart text-indigo-600 mt-1 mr-3"></i>
                <div class="text-sm text-indigo-800">Start planning your baby registry and nursery setup</div>
            </div>
            <div class="flex items-start p-3 bg-red-50 rounded-lg border border-red-200">
                <i class="fas fa-file-medical text-red-600 mt-1 mr-3"></i>
                <div class="text-sm text-red-800">Discuss birth plan options with your healthcare provider</div>
            </div>
            <div class="flex items-start p-3 bg-teal-50 rounded-lg border border-teal-200">
                <i class="fas fa-hand-holding-heart text-teal-600 mt-1 mr-3"></i>
                <div class="text-sm text-teal-800">Build your support network and consider postpartum planning</div>
            </div>
        </div>
    `;
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
    document.getElementById('progressSection').classList.add('hidden');
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
.method-btn, .status-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.method-btn:hover, .status-btn:hover {
    transform: translateY(-1px);
}

.week-item:hover {
    transform: translateX(5px);
    transition: transform 0.2s ease;
}
</style>
@endsection