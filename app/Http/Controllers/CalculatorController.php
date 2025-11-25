<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactSubmission;

class CalculatorController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'calculator' => 'nullable|string|max:255',
            'priority' => 'required|string|in:low,normal,high',
            'message' => 'required|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the errors below.',
                'errors' => $validator->errors()
            ], 422);
        }
        

        try {
            // Here you would typically:
            // 1. Save to database
            // 2. Send email notification
            // 3. Trigger any other workflows

            // Example: Save to database (uncomment when you have the model)
            
            ContactSubmission::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'calculator' => $request->calculator,
                'priority' => $request->priority,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
            

            // Example: Send email (uncomment when you have mail setup)
            /*
            Mail::to('support@calcmaster.com')->send(new ContactFormSubmitted($request->all()));
            */

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We will get back to you within 24 hours.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Contact form submission error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again later.'
            ], 500);
        }
    }

    // 🏦 Finance & Investment Calculators
    public function sipCalculator()
    {
        return view('pages.calculators.finance.sip');
    }

    public function emiCalculator()
    {
        return view('pages.calculators.finance.emi');
    }

    public function compoundInterestCalculator()
    {
        return view('pages.calculators.finance.compound-interest');
    }

    public function simpleInterestCalculator()
    {
        return view('pages.calculators.finance.simple-interest');
    }

    public function retirementCalculator()
    {
        return view('pages.calculators.finance.retirement');
    }

    public function incomeTaxCalculator()
    {
        return view('pages.calculators.finance.income-tax');
    }

    public function fdCalculator()
    {
        return view('pages.calculators.finance.fd');
    }

    public function rdCalculator()
    {
        return view('pages.calculators.finance.rd');
    }

    public function creditCardPayoffCalculator()
    {
        return view('pages.calculators.finance.credit-card-payoff');
    }

    public function roiCalculator()
    {
        return view('pages.calculators.finance.roi');
    }

    public function mutualFundsCalculator()
    {
        return view('pages.calculators.finance.mutual-funds');
    }

    public function mortgageCalculator()
    {
        return view('pages.calculators.finance.mortgage');
    }

    public function inflationCalculator()
    {
        return view('pages.calculators.finance.inflation');
    }

    public function stockProfitCalculator()
    {
        return view('pages.calculators.finance.stock-profit');
    }

    public function currencyConverter()
    {
        return view('pages.calculators.finance.currency-converter');
    }

    // 💪 Health & Fitness Calculators
    public function bmiCalculator()
    {
        return view('pages.calculators.health.bmi');
    }

    public function bmrCalculator()
    {
        return view('pages.calculators.health.bmr');
    }

    public function calorieIntakeCalculator()
    {
        return view('pages.calculators.health.calorie-intake');
    }

    public function idealWeightCalculator()
    {
        return view('pages.calculators.health.ideal-weight');
    }

    public function bodyFatCalculator()
    {
        return view('pages.calculators.health.body-fat');
    }

    public function waterIntakeCalculator()
    {
        return view('pages.calculators.health.water-intake');
    }

    public function heartRateCalculator()
    {
        return view('pages.calculators.health.heart-rate');
    }

    public function pregnancyDueDateCalculator()
    {
        return view('pages.calculators.health.pregnancy-due-date');
    }

    public function bloodPressureCalculator()
    {
        return view('pages.calculators.health.blood-pressure');
    }

    public function stepCalorieCalculator()
    {
        return view('pages.calculators.health.step-calorie');
    }

    // 🧮 Daily Use / General Calculators
    public function ageCalculator()
    {
        return view('pages.calculators.general.age');
    }

    public function dateDifferenceCalculator()
    {
        return view('pages.calculators.general.date-difference');
    }

    public function timeZoneConverter()
    {
        return view('pages.calculators.general.time-zone');
    }

    public function percentageCalculator()
    {
        return view('pages.calculators.general.percentage');
    }

    public function discountCalculator()
    {
        return view('pages.calculators.general.discount');
    }

    public function unitConverter()
    {
        return view('pages.calculators.general.unit-converter');
    }

    public function gpaCalculator()
    {
        return view('pages.calculators.general.gpa');
    }

    public function tipCalculator()
    {
        return view('pages.calculators.general.tip');
    }

    public function splitBillCalculator()
    {
        return view('pages.calculators.general.split-bill');
    }

    public function fuelCostCalculator()
    {
        return view('pages.calculators.general.fuel-cost');
    }

    // 🧰 Business & Work Calculators
    public function profitMarginCalculator()
    {
        return view('pages.calculators.business.profit-margin');
    }

    public function breakEvenCalculator()
    {
        return view('pages.calculators.business.break-even');
    }

    public function gstCalculator()
    {
        return view('pages.calculators.business.gst');
    }

    public function markupCalculator()
    {
        return view('pages.calculators.business.markup');
    }

    public function freelancerRateCalculator()
    {
        return view('pages.calculators.business.freelancer-rate');
    }

    public function businessRoiCalculator()
    {
        return view('pages.calculators.business.business-roi');
    }

    public function payrollCalculator()
    {
        return view('pages.calculators.business.payroll');
    }

    public function currencyExchangeCalculator()
    {
        return view('pages.calculators.business.currency-exchange');
    }

    public function interestComparisonCalculator()
    {
        return view('pages.calculators.business.interest-comparison');
    }

    public function netGrossIncomeCalculator()
    {
        return view('pages.calculators.business.net-gross-income');
    }

    // ⚙️ Tech / Developer Calculators
    public function binaryHexConverter()
    {
        return view('pages.calculators.tech.binary-hex');
    }

    public function bandwidthCalculator()
    {
        return view('pages.calculators.tech.bandwidth');
    }

    public function ipSubnetCalculator()
    {
        return view('pages.calculators.tech.ip-subnet');
    }

    public function percentageErrorCalculator()
    {
        return view('pages.calculators.tech.percentage-error');
    }

    public function downloadTimeCalculator()
    {
        return view('pages.calculators.tech.download-time');
    }

    public function jsonFormatter()
    {
        return view('pages.calculators.tech.json-formatter');
    }

    public function passwordStrengthCalculator()
    {
        return view('pages.calculators.tech.password-strength');
    }

    public function base64Converter()
    {
        return view('pages.calculators.tech.base64');
    }

    public function timeComplexityCalculator()
    {
        return view('pages.calculators.tech.time-complexity');
    }

    public function imageCompressionCalculator()
    {
        return view('pages.calculators.tech.image-compression');
    }
}