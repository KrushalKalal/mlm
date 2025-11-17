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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('sponsor_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('refer_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('full_address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('bank_br_name')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('aadhar_num')->nullable();
            $table->string('pan_num')->nullable();
            $table->string('password')->nullable();
            $table->string('e_p')->nullable();
            $table->string('status')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
