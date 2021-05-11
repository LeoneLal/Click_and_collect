<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'user_id',
        'total_price', 
        'pickup_date',
        'order_status'

    ];

    use HasFactory;
}
