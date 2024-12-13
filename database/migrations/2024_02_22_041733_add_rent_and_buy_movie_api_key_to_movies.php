<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            // $table->string('buy_key', 100)->nullable()->default('');
            $table->double('buy_price', 15, 2)->nullable()->default(0);
            $table->string('description', 1000)->nullable()->default('');
            $table->string('stripe_product_key')->nullable()->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            // $table->dropColumn('buy_key');
            $table->dropColumn('buy_price');
            $table->dropColumn('description');
            $table->dropColumn('stripe_product_key');
        });
    }
};
