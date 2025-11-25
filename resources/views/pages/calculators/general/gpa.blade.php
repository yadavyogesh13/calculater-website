@extends('layouts.app')

@section('title', 'GPA Calculator - Calculate Your GPA & CGPA | CalculaterTools')

@section('meta-description', 'Free GPA and CGPA calculator to calculate your Grade Point Average and Cumulative GPA. Supports 4.0 scale, percentage systems, and custom grading scales.')

@section('keywords', 'GPA calculator, CGPA calculator, grade point average, GPA scale, college GPA, university GPA, academic calculator')

@section('canonical', url('/calculators/gpa'))

@section('content')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Calculator",
    "name": "GPA Calculator",
    "description": "Calculate your GPA and CGPA with support for multiple grading scales and credit systems",
    "url": "{{ url('/calculators/gpa') }}",
    "operatingSystem": "Any",
    "applicationCategory": "EducationalApplication",
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
                        <a href="#education" class="text-blue-600 hover:text-blue-800 transition duration-150">Education Calculators</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-gray-400 text-xs"></i></li>
                    <li class="text-gray-500">GPA Calculator</li>
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">GPA Calculator</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Calculate your Grade Point Average (GPA) and Cumulative GPA (CGPA) for semesters, years, or your entire academic career.
                </p>
            </div>

            <!-- Calculator Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Input Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Calculate Your GPA</h2>
                        <p class="text-gray-600 mb-6">Add your courses and grades to calculate your GPA</p>
                        
                        <form id="gpaCalculatorForm" class="space-y-6">
                            <!-- Grading System -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Grading System
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="setGradingSystem('4.0')" class="grading-system-btn py-3 px-4 border-2 border-blue-500 bg-blue-50 text-blue-700 rounded-lg font-semibold transition duration-200">
                                        <i class="fas fa-graduation-cap text-blue-600 text-lg mb-1"></i>
                                        <div class="text-sm">4.0 Scale</div>
                                    </button>
                                    <button type="button" onclick="setGradingSystem('percentage')" class="grading-system-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-percentage text-green-600 text-lg mb-1"></i>
                                        <div class="text-sm">Percentage</div>
                                    </button>
                                    <button type="button" onclick="setGradingSystem('uk')" class="grading-system-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-university text-purple-600 text-lg mb-1"></i>
                                        <div class="text-sm">UK System</div>
                                    </button>
                                    <button type="button" onclick="setGradingSystem('custom')" class="grading-system-btn py-3 px-4 border-2 border-gray-300 bg-white text-gray-700 rounded-lg font-semibold hover:border-gray-400 transition duration-200">
                                        <i class="fas fa-cog text-orange-600 text-lg mb-1"></i>
                                        <div class="text-sm">Custom</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Custom Grading Scale (Hidden by Default) -->
                            <div id="customScaleSection" class="hidden">
                                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                    <h4 class="font-semibold text-gray-800 mb-3">Custom Grading Scale</h4>
                                    <div class="space-y-3" id="customScaleInputs">
                                        <!-- Custom scale inputs will be populated by JavaScript -->
                                    </div>
                                    <button type="button" onclick="addCustomGrade()" class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="fas fa-plus mr-1"></i>Add Grade Level
                                    </button>
                                </div>
                            </div>

                            <!-- Courses Input -->
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <label class="block text-sm font-semibold text-gray-800">
                                        Courses & Grades
                                    </label>
                                    <button type="button" onclick="addCourse()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="fas fa-plus mr-1"></i>Add Course
                                    </button>
                                </div>
                                
                                <div class="space-y-3" id="coursesContainer">
                                    <!-- Course rows will be added here -->
                                </div>
                                
                                <div class="mt-4 flex justify-between items-center text-sm">
                                    <span class="text-gray-600">Total Credits: <span id="totalCredits">0</span></span>
                                    <button type="button" onclick="clearAllCourses()" class="text-red-600 hover:text-red-800 font-medium">
                                        <i class="fas fa-trash mr-1"></i>Clear All
                                    </button>
                                </div>
                            </div>

                            <!-- Quick Grade Templates -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    Quick Templates
                                </label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" onclick="loadTemplate('excellent')" class="template-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-green-500 hover:bg-green-50 transition duration-200">
                                        <i class="fas fa-star text-green-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Excellent (4.0)</div>
                                    </button>
                                    <button type="button" onclick="loadTemplate('good')" class="template-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-blue-500 hover:bg-blue-50 transition duration-200">
                                        <i class="fas fa-thumbs-up text-blue-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Good (3.0)</div>
                                    </button>
                                    <button type="button" onclick="loadTemplate('average')" class="template-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-yellow-500 hover:bg-yellow-50 transition duration-200">
                                        <i class="fas fa-chart-line text-yellow-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Average (2.5)</div>
                                    </button>
                                    <button type="button" onclick="loadTemplate('sample')" class="template-btn border border-gray-300 rounded-lg py-3 px-4 text-center hover:border-purple-500 hover:bg-purple-50 transition duration-200">
                                        <i class="fas fa-graduation-cap text-purple-600 text-lg mb-2"></i>
                                        <div class="text-sm font-medium text-gray-800">Sample Semester</div>
                                    </button>
                                </div>
                            </div>

                            <!-- Calculate Button -->
                            <button 
                                type="button" 
                                onclick="calculateGPA()"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 px-6 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            >
                                <i class="fas fa-calculator mr-2"></i>
                                Calculate GPA
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 sticky top-4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Your GPA Result</h2>
                        <div id="results" class="space-y-1">
                            <div class="text-center py-8 text-gray-400">
                                <i class="fas fa-graduation-cap text-5xl mb-4"></i>
                                <p class="text-lg font-medium">Add your courses</p>
                                <p class="text-sm">to see your GPA</p>
                            </div>
                        </div>

                        <!-- GPA Scale Info -->
                        <div id="gpaScaleInfo" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-800 mb-3">GPA Scale</h4>
                            <div class="space-y-2 text-sm" id="scaleContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Results -->
            <div id="detailedResults" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed GPA Analysis</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-blue-50 rounded-xl p-6 text-center border border-blue-200">
                        <div class="text-3xl font-bold text-blue-700 mb-2" id="gpaResult">0.00</div>
                        <div class="text-blue-800 font-medium">Current GPA</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 text-center border border-green-200">
                        <div class="text-3xl font-bold text-green-700 mb-2" id="totalCreditsResult">0</div>
                        <div class="text-green-800 font-medium">Total Credits</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-6 text-center border border-purple-200">
                        <div class="text-3xl font-bold text-purple-700 mb-2" id="qualityPoints">0</div>
                        <div class="text-purple-800 font-medium">Quality Points</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-6 text-center border border-orange-200">
                        <div class="text-3xl font-bold text-orange-700 mb-2" id="coursesCount">0</div>
                        <div class="text-orange-800 font-medium">Courses</div>
                    </div>
                </div>

                <!-- Course Breakdown -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Course Breakdown</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 font-semibold text-gray-700">Course</th>
                                    <th class="px-4 py-2 font-semibold text-gray-700">Credits</th>
                                    <th class="px-4 py-2 font-semibold text-gray-700">Grade</th>
                                    <th class="px-4 py-2 font-semibold text-gray-700">Grade Points</th>
                                    <th class="px-4 py-2 font-semibold text-gray-700">Quality Points</th>
                                </tr>
                            </thead>
                            <tbody id="courseBreakdown">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Future GPA Calculator -->
            <div id="futureGPASection" class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12 hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Future GPA Calculator</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Calculate Required Grades</h3>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Target GPA
                                    </label>
                                    <input type="number" id="targetGPA" min="0" max="4" step="0.01" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="e.g., 3.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Future Credits
                                    </label>
                                    <input type="number" id="futureCredits" min="1" max="50" step="1"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="e.g., 15">
                                </div>
                            </div>
                            <button onclick="calculateRequiredGPA()" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-semibold transition duration-200">
                                Calculate Required Grades
                            </button>
                        </div>
                    </div>
                    <div id="futureGPAResult" class="bg-green-50 rounded-lg p-6 hidden">
                        <h4 class="font-semibold text-green-800 mb-3">Required Grades</h4>
                        <p class="text-green-700 text-sm" id="requiredGradesText"></p>
                    </div>
                </div>
            </div>

            <!-- GPA Scale Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">GPA Scale Reference</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-flag-usa text-blue-600 mr-2"></i>
                            4.0 Scale (USA)
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>A (90-100%)</span><span class="font-semibold">4.0</span></div>
                            <div class="flex justify-between"><span>B (80-89%)</span><span class="font-semibold">3.0</span></div>
                            <div class="flex justify-between"><span>C (70-79%)</span><span class="font-semibold">2.0</span></div>
                            <div class="flex justify-between"><span>D (60-69%)</span><span class="font-semibold">1.0</span></div>
                            <div class="flex justify-between"><span>F (Below 60%)</span><span class="font-semibold">0.0</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-university text-purple-600 mr-2"></i>
                            UK System
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>First Class</span><span class="font-semibold">4.0</span></div>
                            <div class="flex justify-between"><span>Upper Second</span><span class="font-semibold">3.3</span></div>
                            <div class="flex justify-between"><span>Lower Second</span><span class="font-semibold">2.7</span></div>
                            <div class="flex justify-between"><span>Third Class</span><span class="font-semibold">2.0</span></div>
                            <div class="flex justify-between"><span>Pass</span><span class="font-semibold">1.0</span></div>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-globe text-green-600 mr-2"></i>
                            Percentage Scale
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between"><span>90-100%</span><span class="font-semibold">A/A+</span></div>
                            <div class="flex justify-between"><span>80-89%</span><span class="font-semibold">A-/B+</span></div>
                            <div class="flex justify-between"><span>70-79%</span><span class="font-semibold">B/B-</span></div>
                            <div class="flex justify-between"><span>60-69%</span><span class="font-semibold">C+/C</span></div>
                            <div class="flex justify-between"><span>50-59%</span><span class="font-semibold">C-/D</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">GPA Calculator FAQs</h2>
                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is GPA and how is it calculated?</h3>
                        <p class="text-gray-600">GPA (Grade Point Average) is calculated by dividing the total quality points earned by the total credits attempted. Quality points = Grade Points × Credits. For example, an A (4.0) in a 3-credit course gives 12 quality points.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What's the difference between GPA and CGPA?</h3>
                        <p class="text-gray-600">GPA typically refers to your average for a single semester or term, while CGPA (Cumulative GPA) is your overall average across all semesters or your entire academic career.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">What is a good GPA?</h3>
                        <p class="text-gray-600">A GPA of 3.0-3.5 is generally considered good, 3.5-4.0 is excellent. However, this varies by institution and program. Graduate programs often expect 3.0+, while competitive programs may require 3.5+.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Do all schools use the same GPA scale?</h3>
                        <p class="text-gray-600">No, grading scales vary by institution and country. The 4.0 scale is common in the US, while other countries may use percentage scales, letter grades with different point values, or custom scales.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">How can I improve my GPA?</h3>
                        <p class="text-gray-600">Focus on courses with higher credit values, retake courses with low grades if allowed, maintain consistent study habits, and use the future GPA calculator to plan what grades you need in upcoming courses.</p>
                    </div>
                </div>
            </div>

            <!-- Related Calculators -->
            <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Calculators</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('discount.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-calculator text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Discount Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate the discount</p>
                    </a>
                    <a href="{{ route('percentage.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-green-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-percentage text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Percentage Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate percentages and changes</p>
                    </a>
                    {{-- <a href="{{ route('scholarship.calculator') }}" class="block p-6 border border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-md transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-award text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Scholarship Calculator</h3>
                        <p class="text-gray-600 text-sm">Calculate scholarship eligibility</p>
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
let currentGradingSystem = '4.0';
let courseCounter = 0;
let customScale = [];

// Grading systems data
const gradingSystems = {
    '4.0': {
        name: '4.0 Scale (USA)',
        grades: [
            { grade: 'A+', points: 4.0, minPercent: 97, maxPercent: 100 },
            { grade: 'A', points: 4.0, minPercent: 93, maxPercent: 96 },
            { grade: 'A-', points: 3.7, minPercent: 90, maxPercent: 92 },
            { grade: 'B+', points: 3.3, minPercent: 87, maxPercent: 89 },
            { grade: 'B', points: 3.0, minPercent: 83, maxPercent: 86 },
            { grade: 'B-', points: 2.7, minPercent: 80, maxPercent: 82 },
            { grade: 'C+', points: 2.3, minPercent: 77, maxPercent: 79 },
            { grade: 'C', points: 2.0, minPercent: 73, maxPercent: 76 },
            { grade: 'C-', points: 1.7, minPercent: 70, maxPercent: 72 },
            { grade: 'D+', points: 1.3, minPercent: 67, maxPercent: 69 },
            { grade: 'D', points: 1.0, minPercent: 65, maxPercent: 66 },
            { grade: 'F', points: 0.0, minPercent: 0, maxPercent: 64 }
        ]
    },
    'percentage': {
        name: 'Percentage System',
        grades: [
            { grade: '90-100%', points: 4.0 },
            { grade: '85-89%', points: 3.7 },
            { grade: '80-84%', points: 3.3 },
            { grade: '75-79%', points: 3.0 },
            { grade: '70-74%', points: 2.7 },
            { grade: '65-69%', points: 2.3 },
            { grade: '60-64%', points: 2.0 },
            { grade: '55-59%', points: 1.7 },
            { grade: '50-54%', points: 1.0 },
            { grade: 'Below 50%', points: 0.0 }
        ]
    },
    'uk': {
        name: 'UK System',
        grades: [
            { grade: 'First Class', points: 4.0 },
            { grade: 'Upper Second', points: 3.3 },
            { grade: 'Lower Second', points: 2.7 },
            { grade: 'Third Class', points: 2.0 },
            { grade: 'Pass', points: 1.0 },
            { grade: 'Fail', points: 0.0 }
        ]
    },
    'custom': {
        name: 'Custom Scale',
        grades: []
    }
};

// Initialize the calculator
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    initializeCustomScale();
    addCourse(); // Add first course by default
    updateGPAInfo();
});

function setupEventListeners() {
    // Auto-calculate when inputs change
    document.addEventListener('input', debounce(calculateGPA, 500));
}

function setGradingSystem(system) {
    currentGradingSystem = system;
    
    // Reset all buttons
    document.querySelectorAll('.grading-system-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
        btn.classList.add('border-gray-300', 'bg-white', 'text-gray-700');
    });
    
    // Set active button
    const activeButton = event.target.closest('.grading-system-btn');
    activeButton.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
    activeButton.classList.remove('border-gray-300', 'bg-white', 'text-gray-700');
    
    // Show/hide custom scale section
    if (system === 'custom') {
        document.getElementById('customScaleSection').classList.remove('hidden');
        initializeCustomScale();
    } else {
        document.getElementById('customScaleSection').classList.add('hidden');
    }
    
    // Update grade dropdowns in existing courses
    updateAllCourseGradeOptions();
    updateGPAInfo();
    calculateGPA();
}

function initializeCustomScale() {
    const container = document.getElementById('customScaleInputs');
    container.innerHTML = '';
    
    // Add default custom grades
    const defaultGrades = [
        { grade: 'A', points: 4.0 },
        { grade: 'B', points: 3.0 },
        { grade: 'C', points: 2.0 },
        { grade: 'D', points: 1.0 },
        { grade: 'F', points: 0.0 }
    ];
    
    defaultGrades.forEach((grade, index) => {
        addCustomGradeRow(grade.grade, grade.points, index);
    });
    
    updateCustomScale();
}

function addCustomGrade() {
    const index = document.querySelectorAll('.custom-grade-row').length;
    addCustomGradeRow('', 0.0, index);
    updateCustomScale();
}

function addCustomGradeRow(grade, points, index) {
    const container = document.getElementById('customScaleInputs');
    const row = document.createElement('div');
    row.className = 'custom-grade-row grid grid-cols-2 gap-3 items-center';
    row.innerHTML = `
        <input type="text" class="custom-grade-name px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" 
               placeholder="Grade (e.g., A)" value="${grade}" oninput="updateCustomScale()">
        <div class="flex gap-2">
            <input type="number" class="custom-grade-points px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" 
                   min="0" max="4" step="0.1" placeholder="Points" value="${points}" oninput="updateCustomScale()">
            <button type="button" onclick="removeCustomGrade(this)" class="text-red-600 hover:text-red-800 px-2">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    container.appendChild(row);
}

function removeCustomGrade(button) {
    const row = button.closest('.custom-grade-row');
    row.remove();
    updateCustomScale();
}

function updateCustomScale() {
    customScale = [];
    document.querySelectorAll('.custom-grade-row').forEach(row => {
        const grade = row.querySelector('.custom-grade-name').value;
        const points = parseFloat(row.querySelector('.custom-grade-points').value);
        
        if (grade && !isNaN(points)) {
            customScale.push({ grade: grade, points: points });
        }
    });
    
    // Update the grading system
    gradingSystems.custom.grades = customScale;
    updateAllCourseGradeOptions();
    calculateGPA();
}

function addCourse() {
    courseCounter++;
    const container = document.getElementById('coursesContainer');
    
    const courseRow = document.createElement('div');
    courseRow.className = 'course-row grid grid-cols-1 md:grid-cols-12 gap-2 items-center p-3 border border-gray-200 rounded-lg';
    courseRow.innerHTML = `
        <div class="md:col-span-5">
            <input type="text" class="course-name w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Course name" value="Course ${courseCounter}">
        </div>
        <div class="md:col-span-3">
            <input type="number" class="course-credits w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" 
                   min="0.5" max="10" step="0.5" placeholder="Credits" value="3" oninput="updateTotalCredits()">
        </div>
        <div class="md:col-span-3">
            <select class="course-grade w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                <!-- Grade options will be populated by JavaScript -->
            </select>
        </div>
        <div class="md:col-span-1 flex justify-center">
            <button type="button" onclick="removeCourse(this)" class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    container.appendChild(courseRow);
    updateCourseGradeOptions(courseRow);
    updateTotalCredits();
    calculateGPA();
}

function removeCourse(button) {
    const courseRow = button.closest('.course-row');
    courseRow.remove();
    updateTotalCredits();
    calculateGPA();
}

function updateAllCourseGradeOptions() {
    document.querySelectorAll('.course-row').forEach(row => {
        updateCourseGradeOptions(row);
    });
}

function updateCourseGradeOptions(courseRow) {
    const gradeSelect = courseRow.querySelector('.course-grade');
    gradeSelect.innerHTML = '';
    
    const grades = gradingSystems[currentGradingSystem].grades;
    
    grades.forEach(gradeInfo => {
        const option = document.createElement('option');
        option.value = gradeInfo.points;
        option.textContent = `${gradeInfo.grade} (${gradeInfo.points})`;
        gradeSelect.appendChild(option);
    });
    
    // Set default selection to first grade
    if (grades.length > 0) {
        gradeSelect.value = grades[0].points;
    }
}

function updateTotalCredits() {
    let total = 0;
    document.querySelectorAll('.course-credits').forEach(input => {
        const credits = parseFloat(input.value) || 0;
        total += credits;
    });
    document.getElementById('totalCredits').textContent = total.toFixed(1);
}

function clearAllCourses() {
    document.getElementById('coursesContainer').innerHTML = '';
    courseCounter = 0;
    updateTotalCredits();
    calculateGPA();
}

function loadTemplate(template) {
    clearAllCourses();
    
    const templates = {
        'excellent': [
            { name: 'Mathematics', credits: 4, grade: 4.0 },
            { name: 'Physics', credits: 3, grade: 4.0 },
            { name: 'Chemistry', credits: 3, grade: 4.0 },
            { name: 'English', credits: 3, grade: 4.0 }
        ],
        'good': [
            { name: 'Mathematics', credits: 4, grade: 3.0 },
            { name: 'Physics', credits: 3, grade: 3.3 },
            { name: 'Chemistry', credits: 3, grade: 3.0 },
            { name: 'English', credits: 3, grade: 3.7 }
        ],
        'average': [
            { name: 'Mathematics', credits: 4, grade: 2.0 },
            { name: 'Physics', credits: 3, grade: 2.7 },
            { name: 'Chemistry', credits: 3, grade: 2.3 },
            { name: 'English', credits: 3, grade: 3.0 }
        ],
        'sample': [
            { name: 'Calculus I', credits: 4, grade: 3.7 },
            { name: 'General Physics', credits: 3, grade: 3.3 },
            { name: 'Organic Chemistry', credits: 3, grade: 3.0 },
            { name: 'Academic Writing', credits: 3, grade: 4.0 },
            { name: 'Introduction to CS', credits: 3, grade: 3.7 }
        ]
    };
    
    const courses = templates[template];
    courses.forEach(course => {
        addCourse();
        const lastRow = document.querySelector('.course-row:last-child');
        lastRow.querySelector('.course-name').value = course.name;
        lastRow.querySelector('.course-credits').value = course.credits;
        lastRow.querySelector('.course-grade').value = course.grade;
    });
    
    // Update template buttons
    document.querySelectorAll('.template-btn').forEach(btn => {
        btn.classList.remove('border-green-500', 'bg-green-50', 'border-blue-500', 'bg-blue-50', 'border-yellow-500', 'bg-yellow-50', 'border-purple-500', 'bg-purple-50');
    });
    
    const colorMap = {
        'excellent': 'green',
        'good': 'blue',
        'average': 'yellow',
        'sample': 'purple'
    };
    
    event.target.classList.add(`border-${colorMap[template]}-500`, `bg-${colorMap[template]}-50`);
    
    updateTotalCredits();
    calculateGPA();
}

function calculateGPA() {
    let totalQualityPoints = 0;
    let totalCredits = 0;
    const courses = [];
    
    document.querySelectorAll('.course-row').forEach(row => {
        const name = row.querySelector('.course-name').value || 'Unnamed Course';
        const credits = parseFloat(row.querySelector('.course-credits').value) || 0;
        const gradePoints = parseFloat(row.querySelector('.course-grade').value) || 0;
        
        if (credits > 0) {
            const qualityPoints = credits * gradePoints;
            totalQualityPoints += qualityPoints;
            totalCredits += credits;
            
            courses.push({
                name: name,
                credits: credits,
                gradePoints: gradePoints,
                qualityPoints: qualityPoints
            });
        }
    });
    
    const gpa = totalCredits > 0 ? totalQualityPoints / totalCredits : 0;
    
    displayResults(gpa, totalCredits, totalQualityPoints, courses);
    updateGPAInfo();
}

function displayResults(gpa, totalCredits, totalQualityPoints, courses) {
    const gpaColor = getGPAColor(gpa);
    
    const resultsHTML = `
        <div class="space-y-6">
            <!-- Main GPA Result -->
            <div class="bg-gradient-to-r ${gpaColor.background} border-2 ${gpaColor.border} rounded-xl p-6">
                <div class="text-center mb-4">
                    <div class="text-3xl md:text-4xl font-bold ${gpaColor.text} mb-2">${gpa.toFixed(2)}</div>
                    <div class="text-lg font-semibold ${gpaColor.text}">GPA Score</div>
                    <div class="text-sm opacity-75 mt-1 ${gpaColor.text}">${getGPACategory(gpa)}</div>
                </div>
            </div>

            <!-- Summary -->
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${totalCredits.toFixed(1)}</div>
                    <div class="text-sm text-gray-600 mt-1">Total Credits</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    <div class="text-xl font-bold text-gray-900">${totalQualityPoints.toFixed(1)}</div>
                    <div class="text-sm text-gray-600 mt-1">Quality Points</div>
                </div>
            </div>

            <!-- GPA Interpretation -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-900 mb-2">GPA Interpretation</h4>
                <p class="text-sm text-blue-800">
                    ${getGPAInterpretation(gpa)}
                </p>
            </div>
        </div>
    `;

    document.getElementById('results').innerHTML = resultsHTML;
    document.getElementById('gpaScaleInfo').classList.remove('hidden');
    
    // Update detailed results
    updateDetailedResults(gpa, totalCredits, totalQualityPoints, courses);
    document.getElementById('detailedResults').classList.remove('hidden');
    document.getElementById('futureGPASection').classList.remove('hidden');
}

function updateDetailedResults(gpa, totalCredits, totalQualityPoints, courses) {
    document.getElementById('gpaResult').textContent = gpa.toFixed(2);
    document.getElementById('totalCreditsResult').textContent = totalCredits.toFixed(1);
    document.getElementById('qualityPoints').textContent = totalQualityPoints.toFixed(1);
    document.getElementById('coursesCount').textContent = courses.length;
    
    // Update course breakdown table
    let breakdownHTML = '';
    courses.forEach(course => {
        breakdownHTML += `
            <tr class="border-b border-gray-200">
                <td class="px-4 py-2 text-gray-700">${course.name}</td>
                <td class="px-4 py-2 text-gray-700 text-center">${course.credits}</td>
                <td class="px-4 py-2 text-gray-700 text-center">${course.gradePoints.toFixed(1)}</td>
                <td class="px-4 py-2 text-gray-700 text-center">${course.qualityPoints.toFixed(1)}</td>
                <td class="px-4 py-2 text-gray-700 text-center">${course.qualityPoints.toFixed(1)}</td>
            </tr>
        `;
    });
    document.getElementById('courseBreakdown').innerHTML = breakdownHTML;
}

function calculateRequiredGPA() {
    const currentGPA = parseFloat(document.getElementById('gpaResult').textContent) || 0;
    const currentCredits = parseFloat(document.getElementById('totalCreditsResult').textContent) || 0;
    const targetGPA = parseFloat(document.getElementById('targetGPA').value);
    const futureCredits = parseFloat(document.getElementById('futureCredits').value);
    
    if (!targetGPA || !futureCredits) {
        alert('Please enter both target GPA and future credits');
        return;
    }
    
    const totalCredits = currentCredits + futureCredits;
    const requiredQualityPoints = (targetGPA * totalCredits) - (currentGPA * currentCredits);
    const requiredGPA = requiredQualityPoints / futureCredits;
    
    let resultText;
    if (requiredGPA > 4.0) {
        resultText = `To achieve a ${targetGPA} CGPA, you would need a ${requiredGPA.toFixed(2)} GPA in your future ${futureCredits} credits, which is impossible on a 4.0 scale. You may need to take additional courses or adjust your target.`;
    } else if (requiredGPA < 0) {
        resultText = `You've already exceeded your target! Your current GPA of ${currentGPA.toFixed(2)} is already above your target of ${targetGPA}.`;
    } else {
        resultText = `To achieve a ${targetGPA} CGPA, you need to maintain a ${requiredGPA.toFixed(2)} GPA in your future ${futureCredits} credits.`;
        
        if (requiredGPA > 3.5) {
            resultText += " This will require excellent performance (mostly A's).";
        } else if (requiredGPA > 3.0) {
            resultText += " This will require good performance (mostly B+'s and A's).";
        } else if (requiredGPA > 2.5) {
            resultText += " This is achievable with consistent B-level work.";
        } else {
            resultText += " This should be easily achievable with moderate effort.";
        }
    }
    
    document.getElementById('requiredGradesText').textContent = resultText;
    document.getElementById('futureGPAResult').classList.remove('hidden');
}

function getGPAColor(gpa) {
    if (gpa >= 3.7) return { background: 'from-green-50 to-green-100', border: 'border-green-200', text: 'text-green-700' };
    if (gpa >= 3.3) return { background: 'from-blue-50 to-blue-100', border: 'border-blue-200', text: 'text-blue-700' };
    if (gpa >= 2.7) return { background: 'from-yellow-50 to-yellow-100', border: 'border-yellow-200', text: 'text-yellow-700' };
    if (gpa >= 2.0) return { background: 'from-orange-50 to-orange-100', border: 'border-orange-200', text: 'text-orange-700' };
    return { background: 'from-red-50 to-red-100', border: 'border-red-200', text: 'text-red-700' };
}

function getGPACategory(gpa) {
    if (gpa >= 3.7) return 'Excellent - Dean\'s List Level';
    if (gpa >= 3.3) return 'Very Good - Strong Performance';
    if (gpa >= 2.7) return 'Good - Solid Performance';
    if (gpa >= 2.0) return 'Satisfactory - Meeting Requirements';
    return 'Needs Improvement - Below Standards';
}

function getGPAInterpretation(gpa) {
    if (gpa >= 3.7) return 'Outstanding academic performance! This GPA is competitive for honors programs, scholarships, and graduate school admissions.';
    if (gpa >= 3.3) return 'Strong academic performance. You\'re well above average and competitive for most opportunities.';
    if (gpa >= 2.7) return 'Good academic standing. You\'re meeting expectations and have a solid foundation for future success.';
    if (gpa >= 2.0) return 'Satisfactory performance. You\'re meeting minimum requirements but could benefit from improvement in some areas.';
    return 'Your GPA indicates academic difficulty. Consider seeking academic support, tutoring, or meeting with advisors to develop improvement strategies.';
}

function updateGPAInfo() {
    const system = gradingSystems[currentGradingSystem];
    let scaleHTML = '';
    
    system.grades.forEach(grade => {
        scaleHTML += `
            <div class="flex items-center justify-between py-1">
                <span class="text-gray-700">${grade.grade}</span>
                <span class="font-semibold text-gray-900">${grade.points.toFixed(1)}</span>
            </div>
        `;
    });
    
    document.getElementById('scaleContent').innerHTML = scaleHTML;
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