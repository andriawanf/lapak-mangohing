<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class OrderItems extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id', 'order_id', 'product_id', 'quantity', 'base_price', 'base_total',
        'discount_amount', 'discount_percent', 'sub_total', 'product_name'
    ];

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
