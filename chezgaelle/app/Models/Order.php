<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'home';
    protected $fillable = [
        'id',
        'user_id',
        'total_price',
        'value'

    ];

    use HasFactory;
}
