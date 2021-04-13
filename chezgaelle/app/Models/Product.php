<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'picture_slug',
        'price',
        'stock',
        'category_id'
    ];

    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
