<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id', 
        'sub_category_name', 
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }
}
