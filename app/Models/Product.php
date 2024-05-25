<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'brand_id',
        'created_at',
        'updated_at',
        'created_by',
        'published_on',
        'alias',
        'vendor_id',
        'summary',
    ];
    public $timestamps = true;
    protected $table = 'product'; // Tên của bảng trong cơ sở dữ liệu

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
    public function product_detail_image()
    {
        return $this->hasMany(ProductDetailImage::class, 'product_id');
    }
}
