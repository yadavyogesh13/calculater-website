@extends('layouts.app')

@section('title', 'Heart Rate Calculator - Target Zones & Maximum HR | CalculaterTools')

@section('meta-description', 'Free heart rate calculator to determine your maximum heart rate, target zones for different exercise intensities, and resting heart rate analysis.')

@section('keywords', 'heart rate calculator, target heart rate, maximum heart rate, resting heart rate, exercise zones, cardio training, heart rate zones')

@section('canonical', url('/calculators/heart-rate'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "Heart Rate Calculator",
    "description": "Calculate your maximum heart rate, target heart rate zones, and analyze your resting heart rate for optimal exercise training",
    "url": "{{ url('/calculators/heart-rate') }}",
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
                        <a href="#health" class="text-blue-600 hover:text-blue-800 transition duration-150">Health Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">Heart Rate Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Heart Rate Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your maximum heart rate, target training zones, and analyze your cardiovascular health. Optimize your workouts with personalized heart rate guidance.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your Heart Rate Zones</h2>
                        <p class="text-gray-600 mb-6">Enter your details to get personalized heart rate recommendations</p>
                        
                        <form id="heartRateCalculatorForm" class="space-y-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="age" class="block text-sm font-semibold text-gray-800 mb-2">
                                        Age (years)
                                    </label>
                                    <input 
                                        type="number" 
                                        id="age" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 30" 
                                        min="15" 
                                        max="100"
                                        value="30"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Gender
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button type="button" onclick="setGender('male')" class="gender-btn py-3 px-4 border border-blue-500 bg-blue-50 rounded-lg text-center transition duration-200">
                                            <i class="fas fa-mars text-blue-600 text-lg mb-1"></i>
                                            <div class="text-sm font-medium text-gray-800">Male</div>
                                        </button>
                                        <button type="button" onclick="setGender('female')" class="gender-btn py-3 px-4 border border-gray-300 rounded-lg text-center hover:border-pink-500 hover:bg-pink-50 transition duration-200">
                                            <i class="fas fa-venus text-pink-600 text-lg mb-1"></i>
                                            <div class="text-sm font-medium text-gray-800">Female</div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Resting Heart Rate (Optional) -->
                            <div>
                                <label for="restingHR" class="block text-sm font-semibold text-gray-800 mb-2">
                                    Resting Heart Rate (Optional)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="number" 
                                        id="restingHR" 
                                        class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        placeholder="e.g., 65" 
                                        min="30" 
                                        max="120"
                                        step="1"
                                    >
                                    <span class="absolute right-3 top-3 text-gray-500">BPM</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Measure when completely at rest (morning before getting up)</p>
                            </div>

                            <!-- Fitness Level -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Fitness Level
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setFitnessLevel('beginner')" class="fitness-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-walking text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Beginner</div>
                                        <div class="text-xs text-gray-500">New to exercise</div>
                                    </button>
                                    <button type="button" onclick="setFitnessLevel('intermediate')" class="fitness-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-running text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Intermediate</div>
                                        <div class="text-xs text-gray-500">Regular exercise</div>
                                    </button>
                                    <button type="button" onclick="setFitnessLevel('advanced')" class="fitness-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-bicycle text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Advanced</div>
                                        <div class="text-xs text-gray-500">Athlete level</div>
                                    </button>
                                    <button type="button" onclick="setFitnessLevel('elite')" class="fitness-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-red-500 hover:bg-red-50 transition duration-200">
                                        <i class="fas fa-trophy text-red-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Elite</div>
                                        <div class="text-xs text-gray-500">Professional</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculation Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Calculation Method
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <button type="button" onclick="setMethod('standard')" class="method-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-heart text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Standard Formula</div>
                                        <div class="text-xs text-gray-500">220 - Age (Most Common)</div>
                                    </button>
                                    <button type="button" onclick="setMethod('tannaka')" class="method-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-heartbeat text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Tanaka Formula</div>
                                        <div class="text-xs text-gray-500">208 - (0.7 × Age)</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Training Goal -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Primary Training Goal
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setGoal('fat_burn')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-fire text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Fat Burn</div>
                                        <div class="text-xs text-gray-500">Weight loss</div>
                                    </button>
                                    <button type="button" onclick="setGoal('cardio')" class="goal-btn border border-blue-500 bg-blue-50 rounded-lg py-3 px-4 text-center transition duration-200">
                                        <i class="fas fa-lungs text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Cardio</div>
                                        <div class="text-xs text-gray-500">Endurance</div>
                                    </button>
                                    <button type="button" onclick="setGoal('performance')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-running text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Performance</div>
                                        <div class="text-xs text-gray-500">Athletic training</div>
                                    </button>
                                    <button type="button" onclick="setGoal('recovery')" class="goal-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-bed text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Recovery</div>
                                        <div class="text-xs text-gray-500">Active recovery</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateHeartRate()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate Heart Rate Zones
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your Heart Rate Analysis</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-heartbeat text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Enter your details</p>
                                <p class="text-sm">to see heart rate analysis</p>
                            </div>
                        </div>

                        <!-- Heart Rate Zones -->
                        <div id="zonesSection" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">Heart Rate Zones</h4>
                            <div class="space-y-2 text-sm" id="zonesList">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="hidden">
                <!-- Key Metrics -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Key Heart Rate Metrics</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-red-50 rounded-lg border border-red-200">
                            <div class="text-3xl font-bold text-red-600 mb-2" id="maxHR">0</div>
                            <div class="text-lg font-semibold text-gray-700">Maximum HR</div>
                            <div class="text-sm text-gray-500 mt-1">Theoretical maximum</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2" id="targetHR">0</div>
                            <div class="text-lg font-semibold text-gray-700">Target Zone</div>
                            <div class="text-sm text-gray-500 mt-1" id="targetRange">For your goal</div>
                        </div>
                        <div class="text-center p-6 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="restingHRResult">-</div>
                            <div class="text-lg font-semibold text-gray-700">Resting HR</div>
                            <div class="text-sm text-gray-500 mt-1" id="restingHRAnalysis">Analysis</div>
                        </div>
                    </div>
                </div>

                <!-- Training Zones -->
                <div class="bg-white rounded-xl shadow-lg p-6 md=p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Training Heart Rate Zones</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Zones Chart -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Zone Intensity Levels</h3>
                            <div class="space-y-4" id="zonesChart">
                            </div>
                        </div>
                        
                        <!-- Zone Description -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4" id="selectedZoneTitle">Zone Description</h3>
                            <div class="space-y-4" id="zoneDescription">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Workout Recommendations -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Workout Recommendations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="workoutRecommendations">
                    </div>
                </div>

                <!-- Heart Rate Safety -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Heart Rate Safety & Monitoring</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Safety Guidelines -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Safety Guidelines</h3>
                            <div class="space-y-3" id="safetyGuidelines">
                            </div>
                        </div>
                        
                        <!-- Monitoring Tips -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Monitoring Tips</h3>
                            <div class="space-y-3" id="monitoringTips">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Understanding Heart Rate Zones</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-walking text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Zone 1: Very Light</h3>
                        <p class="text-gray-600">50-60% of max HR. Perfect for warm-ups, cool-downs, and active recovery days.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-fire text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Zone 2: Fat Burn</h3>
                        <p class="text-gray-600">60-70% of max HR. Optimal for fat burning and building endurance.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Zone 3: Aerobic</h3>
                        <p class="text-gray-600">70-80% of max HR. Improves cardiovascular fitness and stamina.</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-running text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Zone 4-5: Anaerobic</h3>
                        <p class="text-gray-600">80-100% of max HR. For maximum performance and speed training.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Heart Rate FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Which heart rate formula is most accurate?</h3>
                        <p class="text-gray-600">The Tanaka formula (208 - 0.7 × age) is generally more accurate for older adults, while the standard formula (220 - age) works well for younger individuals. Both provide good estimates for training purposes.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a healthy resting heart rate?</h3>
                        <p class="text-gray-600">For adults, 60-100 BPM is normal. Well-trained athletes may have 40-60 BPM. Lower resting heart rates generally indicate better cardiovascular fitness.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Can I exceed my maximum heart rate?</h3>
                        <p class="text-gray-600">The calculated maximum is an estimate. Some well-trained individuals can briefly exceed it, but sustained exercise above 90% of max HR should be limited and supervised.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How does fitness level affect heart rate?</h3>
                        <p class="text-gray-600">Fitter individuals typically have lower resting heart rates and can maintain higher exercise intensities at lower heart rates due to better cardiovascular efficiency.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">When should I be concerned about my heart rate?</h3>
                        <p class="text-gray-600">Consult a doctor if you experience: resting HR consistently above 100 or below 40 BPM, irregular heartbeat, chest pain, dizziness, or extreme fatigue during normal activities.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Health Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('bmr.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-fire text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">BMR Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your Basal Metabolic Rate</p>
                    </a>
                    <a href="{{ route('calorie.intake.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-utensils text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Calorie Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your daily calorie needs</p>
                    </a>
                    <a href="{{ route('water.intake.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tint text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Water Intake Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate your hydration needs</p>
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
let currentGender = 'male';
let currentFitnessLevel = 'intermediate';
let currentMethod = 'standard';
let currentGoal = 'cardio';

// Heart rate zones definition
const heartRateZones = [
    { name: 'Zone 1: Very Light', range: [50, 60], color: 'blue', description: 'Recovery & Warm-up' },
    { name: 'Zone 2: Fat Burn', range: [60, 70], color: 'green', description: 'Fat Burning & Endurance' },
    { name: 'Zone 3: Aerobic', range: [70, 80], color: 'yellow', description: 'Aerobic Fitness' },
    { name: 'Zone 4: Anaerobic', range: [80, 90], color: 'orange', description: 'Anaerobic Threshold' },
    { name: 'Zone 5: Maximum', range: [90, 100], color: 'red', description: 'Maximum Effort' }
];

// Target zones for different goals
const goalZones = {
    'fat_burn': [60, 70],
    'cardio': [70, 80],
    'performance': [80, 90],
    'recovery': [50, 60]
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    calculateHeartRate(); // Calculate with default values
});

function setupEventListeners() {
    // Auto-calculate on input change
    document.getElementById('age').addEventListener('input', debounce(calculateHeartRate, 300));
    document.getElementById('restingHR').addEventListener('input', debounce(calculateHeartRate, 300));
}

function setGender(gender) {
    currentGender = gender;
    
    document.querySelectorAll('.gender-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-pink-500', 'bg-pink-50');
    });
    
    if (gender === 'male') {
        event.target.classList.add('border-blue-500', 'bg-blue-50');
    } else {
        event.target.classList.add('border-pink-500', 'bg-pink-50');
    }
    
    calculateHeartRate();
}

function setFitnessLevel(level) {
    currentFitnessLevel = level;
    
    document.querySelectorAll('.fitness-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-purple-500', 'bg-purple-50', 'border-red-500', 'bg-red-50');
    });
    
    const colorMap = {
        'beginner': 'blue',
        'intermediate': 'blue',
        'advanced': 'purple',
        'elite': 'red'
    };
    
    event.target.classList.add(`border-${colorMap[level]}-500`, `bg-${colorMap[level]}-50`);
    
    calculateHeartRate();
}

function setMethod(method) {
    currentMethod = method;
    
    document.querySelectorAll('.method-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'border-green-500', 'bg-green-50');
    });
    
    const colorMap = {
        'standard': 'blue',
        'tannaka': 'green'
    };
    
    event.target.classList.add(`border-${colorMap[method]}-500`, `bg-${colorMap[method]}-50`);
    
    calculateHeartRate();
}

function setGoal(goal) {
    currentGoal = goal;
    
    document.querySelectorAll('.goal-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-blue-500', 'bg-blue-50', 'border-purple-500', 'bg-purple-50', 'border-yellow-500', 'bg-yellow-50');
    });
    
    const colorMap = {
        'fat_burn': 'green',
        'cardio': 'blue',
        'performance': 'purple',
        'recovery': 'yellow'
    };
    
    event.target.classList.add(`border-${colorMap[goal]}-500`, `bg-${colorMap[goal]}-50`);
    
    calculateHeartRate();
}

function calculateHeartRate() {
    const age = parseInt(document.getElementById('age').value);
    const restingHR = parseInt(document.getElementById('restingHR').value);
    
    // Validation
    if (!age || age < 15 || age > 100) {
        showError('Please enter a valid age (15-100 years)');
        return;
    }
    
    // Calculate maximum heart rate
    let maxHR;
    if (currentMethod === 'standard') {
        maxHR = 220 - age; // Standard formula
    } else {
        maxHR = 208 - (0.7 * age); // Tanaka formula
    }
    
    // Adjust for gender (small adjustment)
    if (currentGender === 'female') {
        maxHR -= 5;
    }
    
    // Calculate heart rate reserve (Karvonen method)
    const hrReserve = maxHR - (restingHR || 70);
    
    // Calculate target zones
    const zones = heartRateZones.map(zone => {
        const minBPM = Math.round((hrReserve * zone.range[0] / 100) + (restingHR || 70));
        const maxBPM = Math.round((hrReserve * zone.range[1] / 100) + (restingHR || 70));
        return {
            ...zone,
            minBPM,
            maxBPM,
            rangeBPM: `${minBPM}-${maxBPM} BPM`
        };
    });
    
    // Get target zone for current goal
    const targetZoneRange = goalZones[currentGoal];
    const targetMinBPM = Math.round((hrReserve * targetZoneRange[0] / 100) + (restingHR || 70));
    const targetMaxBPM = Math.round((hrReserve * targetZoneRange[1] / 100) + (restingHR || 70));
    
    // Display results
    displayResults(maxHR, targetMinBPM, targetMaxBPM, restingHR, zones);
    
    // Generate detailed analysis
    generateDetailedAnalysis(maxHR, zones, restingHR);
}

function displayResults(maxHR, targetMin, targetMax, restingHR, zones) {
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Maximum Heart Rate -->
            <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-xl p-6 border border-red-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-red-600 mb-2">${maxHR} BPM</div>
                    <div class="text-lg font-semibold text-gray-700">Maximum Heart Rate</div>
                    <div class="text-sm text-gray-500 mt-1">${currentMethod === 'standard' ? 'Standard Formula' : 'Tanaka Formula'}</div>
                </div>
            </div>

            <!-- Target Zone -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 border border-green-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">${targetMin}-${targetMax} BPM</div>
                    <div class="text-lg font-semibold text-gray-700">Target Training Zone</div>
                    <div class="text-sm text-gray-500 mt-1">${getGoalDescription(currentGoal)}</div>
                </div>
            </div>

            <!-- Resting Heart Rate Analysis -->
            ${restingHR ? `
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-200">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">${restingHR} BPM</div>
                    <div class="text-lg font-semibold text-gray-700">Resting Heart Rate</div>
                    <div class="text-sm text-gray-500 mt-1">${getRestingHRAnalysis(restingHR)}</div>
                </div>
            </div>
            ` : ''}

            <!-- Training Recommendation -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h4 class="font-semibold text-yellow-900 mb-2">🎯 Training Focus</h4>
                <p class="text-sm text-yellow-800">
                    ${getTrainingRecommendation(currentGoal, currentFitnessLevel)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('zonesSection').classList.remove('hidden');
    document.getElementById('detailedResults').classList.remove('hidden');
    
    // Update key metrics
    document.getElementById('maxHR').textContent = maxHR;
    document.getElementById('targetHR').textContent = `${targetMin}-${targetMax}`;
    document.getElementById('targetRange').textContent = getGoalDescription(currentGoal);
    document.getElementById('restingHRResult').textContent = restingHR || '-';
    document.getElementById('restingHRAnalysis').textContent = restingHR ? getRestingHRAnalysis(restingHR) : 'Not provided';
    
    // Update zones list
    updateZonesList(zones);
}

function getGoalDescription(goal) {
    const descriptions = {
        'fat_burn': 'Fat Burning Zone',
        'cardio': 'Cardiovascular Training',
        'performance': 'Performance Training',
        'recovery': 'Active Recovery'
    };
    return descriptions[goal] || 'Cardiovascular Training';
}

function getRestingHRAnalysis(restingHR) {
    if (restingHR < 60) return 'Excellent (Athlete Level)';
    if (restingHR < 70) return 'Good (Very Fit)';
    if (restingHR < 80) return 'Average (Healthy)';
    if (restingHR < 90) return 'Below Average';
    return 'High (Consult Doctor)';
}

function getTrainingRecommendation(goal, fitness) {
    const recommendations = {
        'fat_burn': `Focus on longer duration, moderate intensity workouts. Aim for 30-60 minutes in your target zone.`,
        'cardio': `Build cardiovascular endurance with sustained effort in your target zone. Include interval training.`,
        'performance': `Push your limits with high-intensity intervals and tempo workouts. Include adequate recovery.`,
        'recovery': `Light activity to promote recovery. Keep intensity low and focus on movement quality.`
    };
    
    return recommendations[goal] || 'Regular cardiovascular exercise is recommended for overall health.';
}

function updateZonesList(zones) {
    let zonesHTML = '';
    
    zones.forEach(zone => {
        zonesHTML += `
            <div class="flex items-center justify-between p-2">
                <span class="text-${zone.color}-600 font-medium">${zone.name}</span>
                <span class="text-gray-600">${zone.rangeBPM}</span>
            </div>
        `;
    });
    
    document.getElementById('zonesList').innerHTML = zonesHTML;
}

function generateDetailedAnalysis(maxHR, zones, restingHR) {
    // Generate zones chart
    generateZonesChart(zones);
    
    // Generate workout recommendations
    generateWorkoutRecommendations();
    
    // Generate safety guidelines
    generateSafetyGuidelines(maxHR, restingHR);
}

function generateZonesChart(zones) {
    let zonesHTML = '';
    
    zones.forEach((zone, index) => {
        const percentage = zone.range[1] - zone.range[0];
        const colorClasses = {
            'blue': 'from-blue-400 to-blue-600',
            'green': 'from-green-400 to-green-600',
            'yellow': 'from-yellow-400 to-yellow-600',
            'orange': 'from-orange-400 to-orange-600',
            'red': 'from-red-400 to-red-600'
        };
        
        zonesHTML += `
            <div class="zone-item cursor-pointer" data-zone="${index}" onclick="showZoneDescription(${index})">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-800">${zone.name}</span>
                    <span class="text-sm text-gray-600">${zone.range[0]}%-${zone.range[1]}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-gradient-to-r ${colorClasses[zone.color]} h-4 rounded-full transition-all duration-300" 
                         style="width: ${percentage}%"></div>
                </div>
                <div class="text-center mt-2 text-sm font-medium text-gray-700">
                    ${zone.rangeBPM}
                </div>
                <div class="text-center text-xs text-gray-500 mt-1">
                    ${zone.description}
                </div>
            </div>
        `;
    });
    
    document.getElementById('zonesChart').innerHTML = zonesHTML;
    
    // Show first zone description by default
    showZoneDescription(0);
}

function showZoneDescription(zoneIndex) {
    const zone = heartRateZones[zoneIndex];
    const zoneBPM = document.querySelectorAll('.zone-item')[zoneIndex].querySelector('.text-sm').textContent;
    
    const zoneDescriptions = {
        0: {
            intensity: 'Very Light',
            feel: 'Easy, comfortable breathing, can hold full conversation',
            benefits: 'Improves recovery, promotes blood flow, reduces stress',
            duration: '20-60 minutes',
            frequency: 'Daily for active recovery',
            examples: 'Walking, gentle yoga, stretching, light cycling'
        },
        1: {
            intensity: 'Light to Moderate',
            feel: 'Comfortable pace, slightly deeper breathing, can speak in full sentences',
            benefits: 'Builds aerobic base, improves fat burning, enhances endurance',
            duration: '30-90 minutes',
            frequency: '3-5 times per week',
            examples: 'Jogging, brisk walking, steady cycling, swimming laps'
        },
        2: {
            intensity: 'Moderate',
            feel: 'Breathing deeper, can speak in short phrases',
            benefits: 'Improves cardiovascular fitness, increases lung capacity',
            duration: '20-60 minutes',
            frequency: '2-4 times per week',
            examples: 'Running, cycling hills, aerobic classes'
        },
        3: {
            intensity: 'Hard',
            feel: 'Breathing hard, can only speak a few words',
            benefits: 'Increases anaerobic threshold, improves speed endurance',
            duration: '10-30 minutes (intervals)',
            frequency: '1-2 times per week',
            examples: 'Interval training, tempo runs, hill repeats'
        },
        4: {
            intensity: 'Maximum',
            feel: 'Breathing very hard, cannot speak, maximum effort',
            benefits: 'Develops maximum performance, increases power',
            duration: '30 seconds - 5 minutes (intervals)',
            frequency: 'Limited to 1 time per week',
            examples: 'Sprinting, high-intensity intervals, racing'
        }
    };
    
    const desc = zoneDescriptions[zoneIndex];
    
    document.getElementById('selectedZoneTitle').textContent = `${zone.name} - ${desc.intensity}`;
    
    document.getElementById('zoneDescription').innerHTML = `
        <div class="space-y-4">
            <div class="p-4 bg-${zone.color}-50 rounded-lg border border-${zone.color}-200">
                <h4 class="font-semibold text-${zone.color}-800 mb-2">Heart Rate Range</h4>
                <p class="text-${zone.color}-700">${zoneBPM} (${zone.range[0]}%-${zone.range[1]}% of max HR)</p>
            </div>
            
            <div class="p-4 bg-gray-50 rounded-lg">
                <h4 class="font-semibold text-gray-800 mb-2">How It Feels</h4>
                <p class="text-gray-700">${desc.feel}</p>
            </div>
            
            <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                <h4 class="font-semibold text-green-800 mb-2">Key Benefits</h4>
                <p class="text-green-700">${desc.benefits}</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="p-3 bg-blue-50 rounded-lg">
                    <h5 class="font-semibold text-blue-800 text-sm">Duration</h5>
                    <p class="text-blue-700 text-sm">${desc.duration}</p>
                </div>
                <div class="p-3 bg-purple-50 rounded-lg">
                    <h5 class="font-semibold text-purple-800 text-sm">Frequency</h5>
                    <p class="text-purple-700 text-sm">${desc.frequency}</p>
                </div>
            </div>
            
            <div class="p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                <h4 class="font-semibold text-yellow-800 mb-2 text-sm">Example Activities</h4>
                <p class="text-yellow-700 text-sm">${desc.examples}</p>
            </div>
        </div>
    `;
    
    // Highlight selected zone
    document.querySelectorAll('.zone-item').forEach((item, index) => {
        if (index === zoneIndex) {
            item.classList.add('ring-2', 'ring-blue-500', 'rounded-lg', 'p-2');
        } else {
            item.classList.remove('ring-2', 'ring-blue-500', 'rounded-lg', 'p-2');
        }
    });
}

function generateWorkoutRecommendations() {
    const recommendations = {
        'beginner': [
            {
                title: 'Walking Program',
                duration: '20-30 minutes',
                frequency: '3-4 times/week',
                intensity: 'Zone 1-2',
                description: 'Start with brisk walking, gradually increase pace',
                icon: 'fas fa-walking text-green-600'
            },
            {
                title: 'Beginner Intervals',
                duration: '20 minutes',
                frequency: '2 times/week',
                intensity: 'Zone 2-3',
                description: 'Walk 3 min, jog 1 min, repeat',
                icon: 'fas fa-exchange-alt text-blue-600'
            }
        ],
        'intermediate': [
            {
                title: 'Steady State Cardio',
                duration: '30-45 minutes',
                frequency: '3-4 times/week',
                intensity: 'Zone 3',
                description: 'Maintain consistent pace in aerobic zone',
                icon: 'fas fa-heartbeat text-yellow-600'
            },
            {
                title: 'HIIT Training',
                duration: '25 minutes',
                frequency: '2 times/week',
                intensity: 'Zone 4-5',
                description: '30 sec high intensity, 90 sec recovery',
                icon: 'fas fa-bolt text-orange-600'
            }
        ],
        'advanced': [
            {
                title: 'Tempo Training',
                duration: '45-60 minutes',
                frequency: '2-3 times/week',
                intensity: 'Zone 3-4',
                description: 'Sustained effort at lactate threshold',
                icon: 'fas fa-tachometer-alt text-red-600'
            },
            {
                title: 'VO2 Max Intervals',
                duration: '40 minutes',
                frequency: '1-2 times/week',
                intensity: 'Zone 5',
                description: '3-5 min intervals at maximum effort',
                icon: 'fas fa-mountain text-purple-600'
            }
        ],
        'elite': [
            {
                title: 'Race Pace Training',
                duration: '60-90 minutes',
                frequency: '2-3 times/week',
                intensity: 'Zone 4',
                description: 'Extended efforts at competition pace',
                icon: 'fas fa-medal text-gold-600'
            },
            {
                title: 'Peak Performance',
                duration: 'Varies',
                frequency: 'As needed',
                intensity: 'Zone 5',
                description: 'Maximum effort intervals for peak conditioning',
                icon: 'fas fa-trophy text-red-600'
            }
        ]
    };
    
    const workoutRecs = recommendations[currentFitnessLevel];
    let workoutsHTML = '';
    
    workoutRecs.forEach(workout => {
        workoutsHTML += `
            <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition duration-200">
                <div class="flex items-center mb-4">
                    <i class="${workout.icon} text-2xl mr-3"></i>
                    <h3 class="text-lg font-semibold text-gray-900">${workout.title}</h3>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Duration:</span>
                        <span class="font-medium">${workout.duration}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Frequency:</span>
                        <span class="font-medium">${workout.frequency}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Intensity:</span>
                        <span class="font-medium">${workout.intensity}</span>
                    </div>
                </div>
                <p class="text-gray-700 text-sm mt-3">${workout.description}</p>
            </div>
        `;
    });
    
    // Add recovery workout for all levels
    workoutsHTML += `
        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition duration-200">
            <div class="flex items-center mb-4">
                <i class="fas fa-bed text-blue-600 text-2xl mr-3"></i>
                <h3 class="text-lg font-semibold text-gray-900">Active Recovery</h3>
            </div>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Duration:</span>
                    <span class="font-medium">20-30 minutes</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Frequency:</span>
                    <span class="font-medium">After intense workouts</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Intensity:</span>
                    <span class="font-medium">Zone 1</span>
                </div>
            </div>
            <p class="text-gray-700 text-sm mt-3">Light activity to promote recovery and reduce soreness</p>
        </div>
    `;
    
    document.getElementById('workoutRecommendations').innerHTML = workoutsHTML;
}

function generateSafetyGuidelines(maxHR, restingHR) {
    document.getElementById('safetyGuidelines').innerHTML = `
        <div class="space-y-4">
            <div class="flex items-start space-x-3">
                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Consult Your Doctor</h4>
                    <p class="text-gray-600 text-sm">If you have heart conditions, high blood pressure, or are new to exercise</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-heart text-red-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Listen to Your Body</h4>
                    <p class="text-gray-600 text-sm">Stop immediately if you experience chest pain, dizziness, or severe shortness of breath</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-temperature-high text-orange-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Stay Hydrated</h4>
                    <p class="text-gray-600 text-sm">Drink water before, during, and after exercise</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-wind text-blue-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Proper Warm-up</h4>
                    <p class="text-gray-600 text-sm">Always start with 5-10 minutes of light activity</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-moon text-purple-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Cool Down</h4>
                    <p class="text-gray-600 text-sm">Gradually reduce intensity and stretch after workouts</p>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('monitoringTips').innerHTML = `
        <div class="space-y-4">
            <div class="flex items-start space-x-3">
                <i class="fas fa-clock text-blue-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Morning Check</h4>
                    <p class="text-gray-600 text-sm">Measure resting HR first thing in the morning</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-chart-line text-green-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Track Trends</h4>
                    <p class="text-gray-600 text-sm">Monitor changes in resting HR over time</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-running text-orange-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Exercise Response</h4>
                    <p class="text-gray-600 text-sm">Note how quickly HR returns to normal after exercise</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-stethoscope text-red-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Regular Check-ups</h4>
                    <p class="text-gray-600 text-sm">Annual physical exams with HR assessment</p>
                </div>
            </div>
            
            <div class="flex items-start space-x-3">
                <i class="fas fa-mobile-alt text-purple-500 mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Use Technology</h4>
                    <p class="text-gray-600 text-sm">Heart rate monitors and fitness trackers can help</p>
                </div>
            </div>
        </div>
    `;
}

function showError(message) {
    document.getElementById('results').innerHTML = `
        <div class="text-center py-8 text-red-600">
            <i class="fas fa-exclamation-triangle text-4xl mb-4"></i>
            <p class="text-lg font-medium">${message}</p>
        </div>
    `;
    document.getElementById('zonesSection').classList.add('hidden');
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

// Initialize with default values
setGender('male');
setFitnessLevel('intermediate');
setMethod('standard');
setGoal('cardio');
</script>

<style>
.zone-item:hover {
    transform: translateY(-2px);
    transition: transform 0.2s ease;
}

.gender-btn, .fitness-btn, .method-btn, .goal-btn {
    cursor: pointer;
    transition: all 0.3s ease;
}

.gender-btn:hover, .fitness-btn:hover, .method-btn:hover, .goal-btn:hover {
    transform: translateY(-1px);
}
</style>
@endsection