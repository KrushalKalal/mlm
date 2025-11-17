<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 'bank_details', 'upi', 'qr_code', 'company_name', 'company_phone', 'company_email', 'company_website', 'logo', 'company_address'
    ];
}
