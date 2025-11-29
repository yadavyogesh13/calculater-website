<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', [CalculatorController::class, 'home'])->name('home');
Route::get('/about', [CalculatorController::class, 'about'])->name('about');
Route::get('/privacy', [CalculatorController::class, 'privacy'])->name('privacy');
Route::get('/terms', [CalculatorController::class, 'terms'])->name('terms');
Route::get('/contact', [CalculatorController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [CalculatorController::class, 'submit'])->name('contact.submit');

// All Tools Lists
Route::get('/alltools/{toolname}', [CalculatorController::class, 'toolsList'])->name('alltools');

// Blogs
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Authentication Routes - Only call this once
Auth::routes();

// Custom logout if needed (optional)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Posts routes
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.delete');

    // Categories routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');

});

// Home route (after login)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Finance Calculators
Route::get('/calculators/sip', [CalculatorController::class, 'sipCalculator'])->name('sip.calculator');
Route::get('/calculators/emi', [CalculatorController::class, 'emiCalculator'])->name('emi.calculator');
Route::get('/calculators/compound-interest', [CalculatorController::class, 'compoundInterestCalculator'])->name('compound.interest.calculator');
Route::get('/calculators/simple-interest', [CalculatorController::class, 'simpleInterestCalculator'])->name('simple.interest.calculator');
Route::get('/calculators/retirement', [CalculatorController::class, 'retirementCalculator'])->name('retirement.calculator');
Route::get('/calculators/income-tax', [CalculatorController::class, 'incomeTaxCalculator'])->name('income.tax.calculator');
Route::get('/calculators/fd', [CalculatorController::class, 'fdCalculator'])->name('fd.calculator');
Route::get('/calculators/rd', [CalculatorController::class, 'rdCalculator'])->name('rd.calculator');
Route::get('/calculators/credit-card-payoff', [CalculatorController::class, 'creditCardPayoffCalculator'])->name('credit.card.payoff.calculator');
Route::get('/calculators/roi', [CalculatorController::class, 'roiCalculator'])->name('roi.calculator');
Route::get('/calculators/mutual-funds', [CalculatorController::class, 'mutualFundsCalculator'])->name('mutual.funds.calculator');
Route::get('/calculators/mortgage', [CalculatorController::class, 'mortgageCalculator'])->name('mortgage.calculator');
Route::get('/calculators/inflation', [CalculatorController::class, 'inflationCalculator'])->name('inflation.calculator');
Route::get('/calculators/stock-profit', [CalculatorController::class, 'stockProfitCalculator'])->name('stock.profit.calculator');
Route::get('/calculators/currency-converter', [CalculatorController::class, 'currencyConverter'])->name('currency.converter.calculator');

// Health Calculators
Route::get('/calculators/bmi', [CalculatorController::class, 'bmiCalculator'])->name('bmi.calculator');
Route::get('/calculators/bmr', [CalculatorController::class, 'bmrCalculator'])->name('bmr.calculator');
Route::get('/calculators/calorie-intake', [CalculatorController::class, 'calorieIntakeCalculator'])->name('calorie.intake.calculator');
Route::get('/calculators/ideal-weight', [CalculatorController::class, 'idealWeightCalculator'])->name('ideal.weight.calculator');
Route::get('/calculators/body-fat', [CalculatorController::class, 'bodyFatCalculator'])->name('body.fat.calculator');
Route::get('/calculators/water-intake', [CalculatorController::class, 'waterIntakeCalculator'])->name('water.intake.calculator');
Route::get('/calculators/heart-rate', [CalculatorController::class, 'heartRateCalculator'])->name('heart.rate.calculator');
Route::get('/calculators/pregnancy-due-date', [CalculatorController::class, 'pregnancyDueDateCalculator'])->name('pregnancy.due.date.calculator');
Route::get('/calculators/blood-pressure', [CalculatorController::class, 'bloodPressureCalculator'])->name('blood.pressure.calculator');
Route::get('/calculators/step-calorie', [CalculatorController::class, 'stepCalorieCalculator'])->name('step.calorie.calculator');

// General Calculators
Route::get('/calculators/age', [CalculatorController::class, 'ageCalculator'])->name('age.calculator');
Route::get('/calculators/date-difference', [CalculatorController::class, 'dateDifferenceCalculator'])->name('date.difference.calculator');
Route::get('/calculators/time-zone', [CalculatorController::class, 'timeZoneConverter'])->name('time.zone.converter');
Route::get('/calculators/percentage', [CalculatorController::class, 'percentageCalculator'])->name('percentage.calculator');
Route::get('/calculators/discount', [CalculatorController::class, 'discountCalculator'])->name('discount.calculator');
Route::get('/calculators/unit-converter', [CalculatorController::class, 'unitConverter'])->name('unit.converter');
Route::get('/calculators/gpa', [CalculatorController::class, 'gpaCalculator'])->name('gpa.calculator');
Route::get('/calculators/tip', [CalculatorController::class, 'tipCalculator'])->name('tip.calculator');
Route::get('/calculators/split-bill', [CalculatorController::class, 'splitBillCalculator'])->name('split.bill.calculator');
Route::get('/calculators/fuel-cost', [CalculatorController::class, 'fuelCostCalculator'])->name('fuel.cost.calculator');

// Business Calculators
Route::get('/calculators/profit-margin', [CalculatorController::class, 'profitMarginCalculator'])->name('profit.margin.calculator');
Route::get('/calculators/break-even', [CalculatorController::class, 'breakEvenCalculator'])->name('break.even.calculator');
Route::get('/calculators/gst', [CalculatorController::class, 'gstCalculator'])->name('gst.calculator');
Route::get('/calculators/markup', [CalculatorController::class, 'markupCalculator'])->name('markup.calculator');
Route::get('/calculators/freelancer-rate', [CalculatorController::class, 'freelancerRateCalculator'])->name('freelancer.rate.calculator');
Route::get('/calculators/business-roi', [CalculatorController::class, 'businessRoiCalculator'])->name('business.roi.calculator');
Route::get('/calculators/payroll', [CalculatorController::class, 'payrollCalculator'])->name('payroll.calculator');
Route::get('/calculators/currency-exchange', [CalculatorController::class, 'currencyExchangeCalculator'])->name('currency.exchange.calculator');
Route::get('/calculators/interest-comparison', [CalculatorController::class, 'interestComparisonCalculator'])->name('interest.comparison.calculator');
Route::get('/calculators/net-gross-income', [CalculatorController::class, 'netGrossIncomeCalculator'])->name('net.gross.income.calculator');

// Tech Calculators
Route::get('/calculators/binary-hex', [CalculatorController::class, 'binaryHexConverter'])->name('binary.hex.converter');
Route::get('/calculators/bandwidth', [CalculatorController::class, 'bandwidthCalculator'])->name('bandwidth.calculator');
Route::get('/calculators/ip-subnet', [CalculatorController::class, 'ipSubnetCalculator'])->name('ip.subnet.calculator');
Route::get('/calculators/percentage-error', [CalculatorController::class, 'percentageErrorCalculator'])->name('percentage.error.calculator');
Route::get('/calculators/download-time', [CalculatorController::class, 'downloadTimeCalculator'])->name('download.time.calculator');
Route::get('/calculators/json-formatter', [CalculatorController::class, 'jsonFormatter'])->name('json.formatter');
Route::get('/calculators/password-strength', [CalculatorController::class, 'passwordStrengthCalculator'])->name('password.strength.calculator');
Route::get('/calculators/base64', [CalculatorController::class, 'base64Converter'])->name('base64.converter');
Route::get('/calculators/time-complexity', [CalculatorController::class, 'timeComplexityCalculator'])->name('time.complexity.calculator');
Route::get('/calculators/image-compression', [CalculatorController::class, 'imageCompressionCalculator'])->name('image.compression.calculator');