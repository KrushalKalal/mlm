<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdrawl extends Model
{
    use HasFactory;
        protected $table = 'withdrawals';
        protected $fillable = [
        'member_id', 'amount'
    ];
}
