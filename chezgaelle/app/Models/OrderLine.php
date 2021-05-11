<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $table = 'order_lines';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    use HasFactory;
}
