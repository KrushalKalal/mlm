<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membersincome extends Model
{
    use HasFactory;
    protected $table = 'membersincome';
    protected $fillable = [
        'member_id',
        'level_id',
        'matching_level',
        'income',
        'status',
        'remarks',
        'S_id',
        'R_id',
        'u_id',
    ];

}
