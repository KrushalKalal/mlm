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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sponsor_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('refer_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('photo')->nullable();
            $table->string('mobile_no')->nullable();
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
            $table->string('e_p')->nullable();
            $table->string('status')->nullable();
            $table->string('upi')->nullable();
            $table->string('mobile_bank')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
