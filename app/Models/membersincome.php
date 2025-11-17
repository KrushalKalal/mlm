<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membersincome extends Model
{
    use HasFactory;
    protected $table = 'membersincome';
    protected $fillable = [
       'member_id', 'level_id', 'income', 'remarks', 'S_id', 'R_id','u_id'
    ];

}
