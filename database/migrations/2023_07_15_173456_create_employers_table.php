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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->constrained('sectors');
            $table->string("registration_number"); 
            $table->string("institution");
            $table->string("region");
            $table->string("pobox_one");
            $table->string("pobox_two")->nullable();
            $table->string("city_one");
            $table->string("physical_address_one");
            $table->string("physical_address_two")->nullable();
            $table->string("physical_address_three")->nullable();
            $table->string("city_two");
            $table->string("manager_name");
            $table->string("manager_phone")->nullable();
            $table->string("manager_cell")->nullable();
            $table->string("manager_email")->nullable();
            $table->string("employee_name");
            $table->string("employee_phone")->nullable();
            $table->string("employee_cell")->nullable();
            $table->string("employee_email")->nullable();
            $table->date("effective_date");
            $table->date("status");
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
        Schema::dropIfExists('employers');
    }
};
