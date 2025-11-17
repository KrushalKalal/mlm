<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'sponser_id', 'email', 'phone', 'state', 'city', 'address', 'pincode', 'payment_receipt'
    ];
    
}
