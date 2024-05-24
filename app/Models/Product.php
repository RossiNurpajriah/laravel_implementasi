<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image', // Add 'image' to the fillable properties
        'name',
        'price',
        'stock',
        'weight',
        'condition',
        'description',
    ];
}
