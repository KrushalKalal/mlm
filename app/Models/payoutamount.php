<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payoutamount extends Model
{
    use HasFactory;
          protected $table = 'payoutamount';
        protected $fillable = [
        'member_id', 'type', 'amount', 'remarks'
    ];
}
