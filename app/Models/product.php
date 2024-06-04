<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_images',
        'product_category',
        'product_number',
        'product_stock',
        'discount_percentage',
        'minimum_order_amount',
        'discount_period_start',
        'discount_period_end',
        'product_tag',
        'product_weight',
        'product_length',
        'product_breadth',
        'product_width'
    ];
}
