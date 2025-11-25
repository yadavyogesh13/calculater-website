@extends('layouts.app')

@section('title', 'CalculaterTools - All-in-One Calculator Tools')

@section('content')
    <!-- Enhanced Hero Section with Keyboard-Enabled Calculator -->
    <section class="gradient-bg text-white py-20 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-32 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        </div>
        
        <!-- Floating Calculator Icons -->
        <div class="absolute top-10 left-10 opacity-20 animate-float">
            <i class="fas fa-calculator text-4xl"></i>
        </div>
        <div class="absolute top-20 right-20 opacity-15 animate-float-delayed">
            <i class="fas fa-chart-pie text-3xl"></i>
        </div>
        <div class="absolute bottom-20 left-20 opacity-10 animate-float-slow">
            <i class="fas fa-percentage text-5xl"></i>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <!-- Left Content -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 border border-white/20">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium">Trusted by 10,000+ users worldwide</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        All Your Calculator Needs
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                            In One Place
                        </span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl mb-8 leading-relaxed">
                        From <span class="font-semibold text-yellow-300">financial planning</span> to <span class="font-semibold text-green-300">health tracking</span>, 
                        <span class="font-semibold text-blue-300">business calculations</span> to <span class="font-semibold text-purple-300">tech tools</span> - 
                        we've got every calculator you'll ever need.
                    </p>
                    
                    <!-- Stats -->
                    <div class="flex flex-wrap gap-8 mb-8">
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-bold text-yellow-300">50+</div>
                            <div class="text-white/80">Calculators</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-bold text-green-300">10K+</div>
                            <div class="text-white/80">Active Users</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-bold text-blue-300">99.9%</div>
                            <div class="text-white/80">Uptime</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 items-center lg:items-start">
                        <a href="#calculators" class="group bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-2">
                            <i class="fas fa-rocket"></i>
                            Explore Calculators
                        </a>
                        {{-- <a href="{{ route('about') }}" class="group border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-blue-600 transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                            <i class="fas fa-play-circle"></i>
                            Watch Demo
                        </a> --}}
                    </div>
                </div>
                
                <!-- Right Side - Live Calculator -->
                <div class="lg:w-1/2">
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 shadow-2xl">
                        <div class="text-center mb-6">
                            <h3 class="text-2xl font-bold text-white mb-2">Try Our Calculator</h3>
                            <p class="text-white/70 flex items-center justify-center gap-2">
                                <i class="fas fa-keyboard text-yellow-300"></i>
                                Type or click to calculate
                            </p>
                        </div>
                        
                        <!-- Calculator Display -->
                        <div class="bg-black/30 rounded-2xl p-4 mb-6 border border-white/10 relative">
                            <div class="text-right">
                                <div id="calc-expression" class="text-white/60 text-sm h-6 overflow-hidden">0</div>
                                <div id="calc-result" class="text-white text-3xl font-bold h-10 overflow-hidden">0</div>
                            </div>
                            <!-- Keyboard Focus Indicator -->
                            <div id="keyboard-focus" class="absolute bottom-2 left-4 flex items-center gap-2 opacity-0 transition-opacity duration-300">
                                <i class="fas fa-keyboard text-yellow-300 text-sm"></i>
                                <span class="text-white/50 text-xs">Keyboard Active</span>
                            </div>
                        </div>
                        
                        <!-- Calculator Keypad -->
                        <div class="grid grid-cols-4 gap-3">
                            <!-- Row 1 -->
                            <button onclick="clearCalculator()" class="calc-btn bg-red-500/20 hover:bg-red-500/30 text-red-200" data-key="Escape">
                                C
                            </button>
                            <button onclick="deleteLast()" class="calc-btn bg-white/10 hover:bg-white/20" data-key="Backspace">
                                ⌫
                            </button>
                            <button onclick="appendToCalc('%')" class="calc-btn bg-white/10 hover:bg-white/20" data-key="%">
                                %
                            </button>
                            <button onclick="appendToCalc('/')" class="calc-btn bg-yellow-500/30 hover:bg-yellow-500/40 text-yellow-200" data-key="/">
                                ÷
                            </button>
                            
                            <!-- Row 2 -->
                            <button onclick="appendToCalc('7')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="7">
                                7
                            </button>
                            <button onclick="appendToCalc('8')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="8">
                                8
                            </button>
                            <button onclick="appendToCalc('9')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="9">
                                9
                            </button>
                            <button onclick="appendToCalc('*')" class="calc-btn bg-yellow-500/30 hover:bg-yellow-500/40 text-yellow-200" data-key="*">
                                ×
                            </button>
                            
                            <!-- Row 3 -->
                            <button onclick="appendToCalc('4')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="4">
                                4
                            </button>
                            <button onclick="appendToCalc('5')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="5">
                                5
                            </button>
                            <button onclick="appendToCalc('6')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="6">
                                6
                            </button>
                            <button onclick="appendToCalc('-')" class="calc-btn bg-yellow-500/30 hover:bg-yellow-500/40 text-yellow-200" data-key="-">
                                -
                            </button>
                            
                            <!-- Row 4 -->
                            <button onclick="appendToCalc('1')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="1">
                                1
                            </button>
                            <button onclick="appendToCalc('2')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="2">
                                2
                            </button>
                            <button onclick="appendToCalc('3')" class="calc-btn bg-white/5 hover:bg-white/10" data-key="3">
                                3
                            </button>
                            <button onclick="appendToCalc('+')" class="calc-btn bg-yellow-500/30 hover:bg-yellow-500/40 text-yellow-200" data-key="+">
                                +
                            </button>
                            
                            <!-- Row 5 -->
                            <button onclick="appendToCalc('0')" class="calc-btn bg-white/5 hover:bg-white/10 col-span-2" data-key="0">
                                0
                            </button>
                            <button onclick="appendToCalc('.')" class="calc-btn bg-white/5 hover:bg-white/10" data-key=".">
                                .
                            </button>
                            <button onclick="calculateResult()" class="calc-btn bg-green-500/30 hover:bg-green-500/40 text-green-200" data-key="Enter">
                                =
                            </button>
                        </div>
                        
                        <!-- Quick Calculation Examples -->
                        <div class="mt-6 pt-6 border-t border-white/10">
                            <h4 class="text-white/80 text-sm font-semibold mb-3">Quick Calculations:</h4>
                            <div class="grid grid-cols-2 gap-2">
                                <button onclick="setQuickCalculation('15% of 200')" class="quick-calc-btn">
                                    15% of 200
                                </button>
                                <button onclick="setQuickCalculation('(25*4)+50')" class="quick-calc-btn">
                                    25×4+50
                                </button>
                                <button onclick="setQuickCalculation('1000/8')" class="quick-calc-btn">
                                    1000÷8
                                </button>
                                <button onclick="setQuickCalculation('12.5*8')" class="quick-calc-btn">
                                    12.5×8
                                </button>
                            </div>
                        </div>

                        <!-- Keyboard Shortcuts Help -->
                        <div class="mt-4 pt-4 border-t border-white/10">
                            <details class="text-white/60 text-sm">
                                <summary class="cursor-pointer hover:text-white/80 transition-colors">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Keyboard Shortcuts
                                </summary>
                                <div class="mt-2 grid grid-cols-2 gap-2 text-xs">
                                    <div><kbd class="bg-white/10 px-1 rounded">0-9</kbd> Numbers</div>
                                    <div><kbd class="bg-white/10 px-1 rounded">+ - * /</kbd> Operations</div>
                                    <div><kbd class="bg-white/10 px-1 rounded">Enter</kbd> Calculate</div>
                                    <div><kbd class="bg-white/10 px-1 rounded">Esc</kbd> Clear</div>
                                    <div><kbd class="bg-white/10 px-1 rounded">Backspace</kbd> Delete</div>
                                    <div><kbd class="bg-white/10 px-1 rounded">%</kbd> Percentage</div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="text-center mt-12 animate-bounce">
                <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center mx-auto">
                    <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
                </div>
            </div>
        </div>
    </section>

    <style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    @keyframes float-delayed {
        0%, 100% { transform: translateY(0px) rotate(5deg); }
        50% { transform: translateY(-15px) rotate(-5deg); }
    }

    @keyframes float-slow {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-10px) scale(1.1); }
    }

    @keyframes key-press {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(0.95); }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float-delayed 8s ease-in-out infinite;
    }

    .animate-float-slow {
        animation: float-slow 10s ease-in-out infinite;
    }

    .animate-key-press {
        animation: key-press 0.1s ease-in-out;
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .calc-btn {
        @apply rounded-2xl p-4 text-xl font-semibold transition-all duration-200 transform active:scale-95;
    }

    .quick-calc-btn {
        @apply bg-white/5 hover:bg-white/10 text-white/80 text-sm py-2 px-3 rounded-lg transition-all duration-200 text-center;
    }

    .key-active {
        @apply bg-yellow-500/40 border-2 border-yellow-300;
    }

    kbd {
        font-family: monospace;
        padding: 2px 6px;
        border-radius: 4px;
    }
    </style>

    <script src="{{ asset('calculatorBoard.js') }}"></script>

    <!-- Calculators Section -->
    <section id="calculators" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Comprehensive Calculator Collection</h2>
            <p class="text-xl text-center text-gray-600 mb-12 max-w-3xl mx-auto">
                Discover over 50 specialized calculators across different categories to meet all your calculation needs.
            </p>

            <!-- Finance & Investment Calculators -->
            <div id="finance" class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-university text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">🏦 Finance & Investment Calculators</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'SIP Calculator',
                        'description' => 'Calculate returns on Systematic Investment Plans',
                        'route' => route('sip.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-credit-card',
                        'title' => 'Loan EMI Calculator',
                        'description' => 'Calculate Equated Monthly Installments for loans',
                        'route' => route('emi.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Compound Interest Calculator',
                        'description' => 'Calculate investment returns with compounding over time',
                        'route' => route('compound.interest.calculator'),
                        'color' => 'purple'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-calculator',
                        'title' => 'Simple Interest Calculator',
                        'description' => 'Calculate basic interest returns on investments and loans',
                        'route' => route('simple.interest.calculator'),
                        'color' => 'indigo'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-umbrella-beach',
                        'title' => 'Retirement Calculator',
                        'description' => 'Plan your retirement corpus and savings needed',
                        'route' => route('retirement.calculator'),
                        'color' => 'teal'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-file-invoice-dollar',
                        'title' => 'Income Tax Calculator',
                        'description' => 'Calculate your income tax liability',
                        'route' => route('income.tax.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-piggy-bank',
                        'title' => 'FD Calculator',
                        'description' => 'Calculate returns on Fixed Deposits',
                        'route' => route('fd.calculator'),
                        'color' => 'yellow'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-calendar-alt',
                        'title' => 'RD Calculator',
                        'description' => 'Calculate returns on Recurring Deposits',
                        'route' => route('rd.calculator'),
                        'color' => 'pink'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-credit-card',
                        'title' => 'Credit Card Payoff',
                        'description' => 'Calculate payoff timeline for credit card debt',
                        'route' => route('credit.card.payoff.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'ROI Calculator',
                        'description' => 'Calculate Return on Investment for projects',
                        'route' => route('roi.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-pie',
                        'title' => 'Mutual Fund Returns',
                        'description' => 'Calculate returns on mutual fund investments',
                        'route' => route('mutual.funds.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-home',
                        'title' => 'Mortgage Calculator',
                        'description' => 'Calculate monthly mortgage payments',
                        'route' => route('mortgage.calculator'),
                        'color' => 'indigo'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Inflation Calculator',
                        'description' => 'Calculate future value considering inflation',
                        'route' => route('inflation.calculator'),
                        'color' => 'orange'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Stock Profit/Loss',
                        'description' => 'Calculate profit or loss on stock investments',
                        'route' => route('stock.profit.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-exchange-alt',
                        'title' => 'Currency Converter',
                        'description' => 'Convert between different currencies',
                        'route' => route('currency.converter.calculator'),
                        'color' => 'yellow'
                    ])
                </div>
            </div>

            <!-- Health & Fitness Calculators -->
            <div id="health" class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">💪 Health & Fitness Calculators</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-weight',
                        'title' => 'BMI Calculator',
                        'description' => 'Calculate your Body Mass Index',
                        'route' => route('bmi.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-fire',
                        'title' => 'BMR Calculator',
                        'description' => 'Calculate your Basal Metabolic Rate',
                        'route' => route('bmr.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-utensils',
                        'title' => 'Calorie Intake Calculator',
                        'description' => 'Calculate daily calorie requirements',
                        'route' => route('calorie.intake.calculator'),
                        'color' => 'orange'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-balance-scale',
                        'title' => 'Ideal Weight Calculator',
                        'description' => 'Calculate your ideal body weight',
                        'route' => route('ideal.weight.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-percentage',
                        'title' => 'Body Fat Calculator',
                        'description' => 'Calculate your body fat percentage',
                        'route' => route('body.fat.calculator'),
                        'color' => 'purple'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-tint',
                        'title' => 'Water Intake Calculator',
                        'description' => 'Calculate daily water requirements',
                        'route' => route('water.intake.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-heart',
                        'title' => 'Heart Rate Calculator',
                        'description' => 'Calculate target heart rate zones',
                        'route' => route('heart.rate.calculator'),
                        'color' => 'red'
                    ])
                    {{-- @include('components.calculator-card', [
                        'icon' => 'fas fa-baby',
                        'title' => 'Pregnancy Due Date',
                        'description' => 'Calculate pregnancy due date and timeline',
                        'route' => route('pregnancy.due.date.calculator'),
                        'color' => 'pink'
                    ]) --}}
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-heartbeat',
                        'title' => 'Blood Pressure',
                        'description' => 'Check blood pressure ranges and categories',
                        'route' => route('blood.pressure.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-walking',
                        'title' => 'Step to Calorie Converter',
                        'description' => 'Convert steps to calories burned',
                        'route' => route('step.calorie.calculator'),
                        'color' => 'green'
                    ])
                </div>
            </div>

            <!-- Daily Use / General Calculators -->
            <div id="general" class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-calculator text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">🧮 Daily Use / General Calculators</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-birthday-cake',
                        'title' => 'Age Calculator',
                        'description' => 'Calculate exact age in years, months, and days',
                        'route' => route('age.calculator'),
                        'color' => 'pink'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-calendar-day',
                        'title' => 'Date Difference Calculator',
                        'description' => 'Calculate days between two dates',
                        'route' => route('date.difference.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-globe',
                        'title' => 'Time Zone Converter',
                        'description' => 'Convert time between different time zones',
                        'route' => route('time.zone.converter'),
                        'color' => 'indigo'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-percentage',
                        'title' => 'Percentage Calculator',
                        'description' => 'Calculate percentages, increases, and decreases',
                        'route' => route('percentage.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-tag',
                        'title' => 'Discount Calculator',
                        'description' => 'Calculate discounts and final prices',
                        'route' => route('discount.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-ruler-combined',
                        'title' => 'Unit Converter',
                        'description' => 'Convert length, weight, temperature, and more',
                        'route' => route('unit.converter'),
                        'color' => 'purple'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-graduation-cap',
                        'title' => 'GPA Calculator',
                        'description' => 'Calculate Grade Point Average',
                        'route' => route('gpa.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-utensils',
                        'title' => 'Tip Calculator',
                        'description' => 'Calculate restaurant tips and split bills',
                        'route' => route('tip.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-receipt',
                        'title' => 'Split Bill Calculator',
                        'description' => 'Split bills among multiple people',
                        'route' => route('split.bill.calculator'),
                        'color' => 'orange'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-gas-pump',
                        'title' => 'Fuel Cost Calculator',
                        'description' => 'Calculate fuel costs for trips',
                        'route' => route('fuel.cost.calculator'),
                        'color' => 'yellow'
                    ])
                </div>
            </div>

            <!-- Business & Work Calculators -->
            <div id="business" class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-briefcase text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">🧰 Business & Work Calculators</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Profit Margin Calculator',
                        'description' => 'Calculate profit margins and markup',
                        'route' => route('profit.margin.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Break-Even Point Calculator',
                        'description' => 'Calculate business break-even point',
                        'route' => route('break.even.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-receipt',
                        'title' => 'GST Calculator',
                        'description' => 'Calculate GST and tax amounts',
                        'route' => route('gst.calculator'),
                        'color' => 'purple'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-tags',
                        'title' => 'Markup Calculator',
                        'description' => 'Calculate product markup percentages',
                        'route' => route('markup.calculator'),
                        'color' => 'orange'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-laptop-code',
                        'title' => 'Freelancer Rate Calculator',
                        'description' => 'Calculate freelance hourly rates',
                        'route' => route('freelancer.rate.calculator'),
                        'color' => 'indigo'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-chart-pie',
                        'title' => 'Business ROI Calculator',
                        'description' => 'Calculate return on investment for business',
                        'route' => route('business.roi.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-money-check',
                        'title' => 'Payroll Calculator',
                        'description' => 'Calculate employee payroll and deductions',
                        'route' => route('payroll.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-exchange-alt',
                        'title' => 'Currency Exchange',
                        'description' => 'Calculate currency exchange rates',
                        'route' => route('currency.exchange.calculator'),
                        'color' => 'yellow'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-percentage',
                        'title' => 'Interest Rate Comparison',
                        'description' => 'Compare different interest rates',
                        'route' => route('interest.comparison.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-money-bill-wave',
                        'title' => 'Net vs Gross Income',
                        'description' => 'Calculate net and gross income differences',
                        'route' => route('net.gross.income.calculator'),
                        'color' => 'green'
                    ])
                </div>
            </div>

            <!-- Tech / Developer Calculators -->
            <div id="tech" class="mb-16">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-teal-600 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-laptop-code text-white text-xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">⚙️ Tech / Developer Calculators</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-code',
                        'title' => 'Binary/Hex Converter',
                        'description' => 'Convert between binary and hexadecimal',
                        'route' => route('binary.hex.converter'),
                        'color' => 'indigo'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-wifi',
                        'title' => 'Bandwidth Calculator',
                        'description' => 'Calculate network bandwidth requirements',
                        'route' => route('bandwidth.calculator'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-network-wired',
                        'title' => 'IP Subnet Calculator',
                        'description' => 'Calculate IP subnets and ranges',
                        'route' => route('ip.subnet.calculator'),
                        'color' => 'purple'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-exclamation-triangle',
                        'title' => 'Percentage Error Calculator',
                        'description' => 'Calculate percentage error in measurements',
                        'route' => route('percentage.error.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-download',
                        'title' => 'Download Time Estimator',
                        'description' => 'Estimate file download times',
                        'route' => route('download.time.calculator'),
                        'color' => 'green'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-code',
                        'title' => 'JSON Formatter & Validator',
                        'description' => 'Format and validate JSON data',
                        'route' => route('json.formatter'),
                        'color' => 'yellow'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-lock',
                        'title' => 'Password Strength Estimator',
                        'description' => 'Check password strength and security',
                        'route' => route('password.strength.calculator'),
                        'color' => 'red'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-key',
                        'title' => 'Base64 Encoder/Decoder',
                        'description' => 'Encode and decode Base64 strings',
                        'route' => route('base64.converter'),
                        'color' => 'blue'
                    ])
                    @include('components.calculator-card', [
                        'icon' => 'fas fa-clock',
                        'title' => 'Time Complexity Estimator',
                        'description' => 'Estimate algorithm time complexity',
                        'route' => route('time.complexity.calculator'),
                        'color' => 'purple'
                    ])
                    {{-- @include('components.calculator-card', [
                        'icon' => 'fas fa-file-image',
                        'title' => 'Image Size Compressor',
                        'description' => 'Calculate image compression ratios',
                        'route' => route('image.compression.calculator'),
                        'color' => 'green'
                    ]) --}}
                </div>
            </div>
        </div>
    </section>
@endsection