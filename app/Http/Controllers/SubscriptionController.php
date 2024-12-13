<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    //

    public function retrievePlans()
    {
        $key = env('STRIPE_SECRET');
        // dd($key);
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->products->search([
          'query' => 'active:\'true\' AND metadata[\'category\']:\'subscription\'',
        ]);
        $plans = $plansraw->data;
        // dd($plansraw);
        foreach ($plans as $plan) {
            $prod = $stripe->products->retrieve($plan->id, []);
            $price = $stripe->prices->retrieve($plan->default_price, []);
            $plan->product = $prod;
            $plan->price = $price;
        }
        return ($plans);
    }

    public function showSubscription()
    {
        $plans = $this->retrievePlans();
        $user = Auth::user();
        // dd($plans);
        return view('apps.subscribe', [
            'user' => $user,
            'intent' => $user->createSetupIntent(),
            'plans' => $plans,
        ]);
    }

    public function registerSubscription(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');
        // dd($paymentMethod);

        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('plan');

        try {
            $user->newSubscription('default', $plan)->create($paymentMethod, [
                'email' => $user->email,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect('/');
    }

    public function CreditCardPage(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $pickedplan = $request->plan;
        // dd($plans);
        return view('apps.creditcard', [
            'user' => $user,
            'intent' => $user->createSetupIntent(),
            'name' => $request->name,
            'plan' => $pickedplan,
        ]);
    }

    public function prepping(Request $request)
    {
        $user = Auth::user();
        $userid = Auth::user()->id;
        $prev_end_date = DB::table('active_subscriptions')->where('userid', $userid)->first();
        if ($prev_end_date == null) {
            $new_ending_date = Carbon::now()->addmonth(1);
        } else {
            $new_ending_date = Carbon::parse($prev_end_date->ends_at)->addmonth(1);
        }
        dd($new_ending_date->format('Y-m-d H:i:s'));

        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('plan');
        // try {
        //     $user->newSubscription('default', $plan)->create($paymentMethod, [
        //         'email' => $user->email
        //     ]);
        // } catch (\Exception $e) {
        //     return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        // }

        return redirect('/');
    }

    public function buyMovie(Request $request) {
        $movie = $request->movie_id;
        dd($request);
    }

    public function manageSubscription(Request $request)
    {
        $user = Auth::user();
        $userid = Auth::user()->id;
        $userplan = DB::table('subscriptions')->where('user_id', $userid)->first();
        $data = DB::table('subscription_items')
                    ->join('subscriptions', 'subscriptions.stripe_price', '=', 'subscription_items.stripe_price')
                    ->select('subscription_items.stripe_price', 'subscription_items.stripe_product', 'subscriptions.user_id', 'subscriptions.ends_at')
                    ->where('user_id', $userid)
                    ->first();
        $date = Carbon::parse($data->ends_at);
        $formattedDate = $date->format('d - M - Y');
        // dd($end_at);
        $plan = $data->stripe_product;
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripePlan = $stripe->products->retrieve($plan, []);

        // dd($stripePlan);
        return view('apps.managesubscription', [
            'name' => $stripePlan->name,
            'end_date' => $formattedDate,
        ]);
    }

    public function cancelSubscription(Request $request)
    {
        $user = Auth::user();
        $user->subscription('default')->cancel();
        return redirect('/');
    }

    public function resumeSubscription(Request $request)
    {
        $user = Auth::user();
        $user->subscription('default')->resume();
        return redirect('/');
    }

    public function processSubscription(Request $request)
    {
        $user = Auth::user();
        $userid = Auth::user()->id;
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('plan');
        try {
            $user->newSubscription('default', $plan)->create($paymentMethod, [
                'email' => $user->email,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect('/');
    }
}
