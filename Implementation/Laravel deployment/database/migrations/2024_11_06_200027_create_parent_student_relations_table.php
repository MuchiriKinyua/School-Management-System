<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentStudentRelationsTable extends Migration
{
    public function up()
{
    Schema::create('parent_student_relations', function (Blueprint $table) {
        $table->id();
        $table->string('adm_no');
        $table->string('student_name');
        $table->string('class');
        $table->string('day_or_boarding');
        $table->string('parent_name');
        $table->string('telephone');
        $table->string('stream');
        $table->string('classteacher');
        $table->string('status');
        $table->date('dob');
        $table->string('gender');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('parent_student_relations');
    }
}
