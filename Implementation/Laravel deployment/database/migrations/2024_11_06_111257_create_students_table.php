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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('adm_no')->unique();
            $table->string('student_name');
            $table->string('class');
            $table->string('day_or_boarding');          
            $table->string('stream');
            $table->string('classteacher');
            $table->string('status');
            $table->date('dob')->nullable();            ;
            $table->string('gender');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
