<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \Stripe\Stripe;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::get();
        return view('apps.plans', compact('plans'));
    }

    public function show(Plan $plan, Request $request) {
        $intent = auth()->user()->createSetupIntent();
        return view('apps.subscribe', compact('plan', 'intent'));
    }

    public function confirm_pay(Request $request){
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try
        {
        $user->charge(10*100, $paymentMethod);
        }
        catch (Exception $e)
        {
        return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        // Session::flash('success', 'Payment has been succesfully processed');
        $request->session()->put('success', 'Payment has been successfully processed');
     
        return redirect('/');

    }

    public function processSubscription(Request $request)
    {
        dd($request);
        // $user = Auth::user();
        // $paymentMethod = $request->input('payment_method');
                    
        // $user->createOrGetStripeCustomer();
        // $user->addPaymentMethod($paymentMethod);
        // $plan = $request->input('plan');
        // try {
        //     $user->newSubscription('default', $plan)->create($paymentMethod, [
        //         'email' => $user->email
        //     ]);
        // } catch (\Exception $e) {
        //     return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        // }
        
        // return redirect('/browse');
    }

}
