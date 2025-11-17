<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'name', 'mrp', 'discount_price', 'distribute_price', 'description'
    ];
    public function cate()
    {
        return $this->belongsTo(Category::class, 'category'); 
    }
}
