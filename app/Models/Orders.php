<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'transaction_id',
        'user_id',
        'customer_id',
        'total_price',
        'order_status',
        'payment_status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'order_id');
    }
}
