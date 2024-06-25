<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'product_tag',
        'product_weight',
        'product_length',
        'product_breadth',
        'product_width'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
