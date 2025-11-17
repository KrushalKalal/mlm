<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'sponsor_id',
        'sponsor_name',
        'refer_id',
        'direction',
        'name',
        'member_id',
        'joining_date',
        'date_of_birth',
        'photo',
        'mobile_no',
        'email',
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
        'password',
        'e_p',
        'status'
    ];
}
