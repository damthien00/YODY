<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['id', 'customer_id', 'product_id', 'variant_id', 'quantity'];
    public $timestamps = false;

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
