<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateB2bTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('b2b_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('originator_conversation_id')->nullable();
            $table->string('conversation_id')->nullable();
            $table->string('response_code')->nullable();
            $table->string('response_description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('sender_till');
            $table->string('receiver_till');
            $table->string('account_reference');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('b2b_transactions');
    }
}

