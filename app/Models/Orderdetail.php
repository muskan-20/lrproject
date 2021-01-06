<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    
    protected $primaryKey = 'order_detail_id';
    protected $fillable =[
        'order_id',
        'product_id',
        'product_qty',
        'product_price'
    ];
}
