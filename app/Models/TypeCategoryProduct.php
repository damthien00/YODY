<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'type_category_product';
    protected $fillable = ['type_category_id', 'product_id', 'created_at', 'updated_at'];
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(TypeCategory::class, 'type_category_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
