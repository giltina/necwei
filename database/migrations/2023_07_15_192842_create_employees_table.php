<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("employee_number"); 
            $table->foreignId('employer_id')->constrained('employers');
            $table->string("surname");
            $table->string("first_name");
            $table->date("dob");
            $table->string("gender");
            $table->string("nationality");
            $table->string("national_id");
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('wage_id')->constrained('wages');
            $table->string("contribution");
            $table->date("engagement");
            $table->string("contract");
            $table->string("duration");
            $table->date("end_contract");
            $table->string("employee_status");
            $table->string("created_by");
            $table->string("updated_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};