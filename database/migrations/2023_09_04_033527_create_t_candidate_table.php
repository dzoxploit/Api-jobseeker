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
        Schema::create('t_candidate', function (Blueprint $table) {
            $table->id('candidate_id');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('full_name');
            $table->string('dob');
            $table->string('pob');
            $table->string('gender', 1); // F or M
            $table->string('year_exp');
            $table->string('last_salary')->nullable();
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
        Schema::dropIfExists('t_candidate');
    }
};
