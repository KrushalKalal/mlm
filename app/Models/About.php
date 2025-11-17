<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'message', 'image', 'title','message2', 'image2', 'title2','message3', 'image3', 'title3','message4', 'image4', 'title4','message5', 'image5', 'title5','message6', 'image6', 'title6'
    ];
}
