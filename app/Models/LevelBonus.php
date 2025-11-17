<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelBonus extends Model
{
    use HasFactory;
    protected $fillable = [
        'level',
        'bonus',
    ];
}
