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
        Schema::create('STKrequests', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->double('amount',8,2);
            $table->string('reference');
            $table->string('description');
            $table->string('MerchantRequestID')->unique();
            $table->string('CheckoutRequestID')->unique();
            $table->string('status'); //requested , paid , failed
            $table->string('MpesaReceiptNumber')->nullable();
            $table->string('ResultDesc')->nullable();
            $table->string('TransactionDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('STKrequests');
    }
};
