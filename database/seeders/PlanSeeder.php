<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Plus Basic',
                'slug' => 'plus-basic',
                'stripe_plan' => 'price_1O3zOFGHEf820fpXvvA28WpE',
                'price' => '9.99',
                'description' => 'Plus Basic',
            ],
            [
                'name' => 'Plus Premium',
                'slug' => 'plus-premium',
                'stripe_plan' => 'price_1O3zm9GHEf820fpXns6nPpjC',
                'price' => '15.99',
                'description' => 'Plus Premium',
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
