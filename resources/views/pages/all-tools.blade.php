@extends('layouts.app')

@section('title', 'CalculaterTools - All-in-One Calculator Tools')

@section('content')

    <!-- Calculators Section -->
    <section id="calculators" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Comprehensive Calculator Collection</h2>
            <p class="text-xl text-center text-gray-600 mb-12 max-w-3xl mx-auto">
                Discover over 50 specialized calculators across different categories to meet all your calculation needs.
            </p>

            <!-- Finance & Investment Calculators -->
            <div id="finance" class="mb-16 {{ $activeCategory !== 'finance' ? 'hidden' : '' }}">
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
            <div id="health" class="mb-16 {{ $activeCategory !== 'health' ? 'hidden' : '' }}">
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
            <div id="general" class="mb-16 {{ $activeCategory !== 'others' ? 'hidden' : '' }}">
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
            <div id="business" class="mb-16 {{ $activeCategory !== 'others' ? 'hidden' : '' }}">
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
            <div id="tech" class="mb-16 {{ $activeCategory !== 'others' ? 'hidden' : '' }}">
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