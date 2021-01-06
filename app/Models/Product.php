<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_detail',
        'product_price',
        'product_image',
        
        'subcategory_id'
    ];
}
