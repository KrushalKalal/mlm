<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Userlist extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users_list';

    protected $fillable = [
        'name',
        'role',
        'email',
        'package_id',
        'email_verified_at',
        'password',
        'sponsor_id',
        'sponsor_name',
        'refer_id',
        'direction',
        'member_id',
        'joining_date',
        'date_of_birth',
        'photo',
        'mobile_no',
        'state',
        'city',
        'district',
        'full_address',
        'pin_code',
        'bank_name',
        'ifsc_code',
        'bank_ac',
        'bank_br_name',
        'nominee_name',
        'nominee_relation',
        'aadhar_num',
        'pan_num',
        'e_p',
        'status',
        'remember_token',
        'mobile_bank',
        'upi'
    ];

    protected $casts = [
        'role' => 'string',
    ];
}
