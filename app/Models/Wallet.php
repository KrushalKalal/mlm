<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'member_id', 'cashback', 'total', 'mrp', 'package_id',
    ];
}
