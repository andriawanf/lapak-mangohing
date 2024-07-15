<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'status', 'order_date', 'payment_due', 'payment_status',
        'base_total_price', 'discount_amount', 'discount_percent',
        'shipping_cost', 'grand_total', 'purchase_option', 'customer_note',
        'customer_name', 'customer_address', 'customer_phone', 'customer_email',
        'customer_country', 'customer_province', 'customer_city',
        'customer_regency', 'customer_district', 'customer_postcode'
    ];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
