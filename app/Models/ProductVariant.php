<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\Size;


class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'product_variant';
    protected $fillable = [
        'product_id',
        'title',
        'barcode',
        'sku',
        'inventory_quantity',
        'image',
        'retail_price',
        'wholesale_price',
        'import_price',
        'capital_price',
        'weight',
        'weight_unit',
        'size_id',
        'color_id'
    ];
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function variant_image_detail()
    {
        return $this->hasMany(VariantImageDetail::class, 'variant_id');
    }
}
