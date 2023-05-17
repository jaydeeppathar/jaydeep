<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 
        'name',
        'status',
    ];

    public function subcategory()
    {
        return $this->hasOne('App\Models\SubCategory');
    }
    
    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'id');
    }   
}
