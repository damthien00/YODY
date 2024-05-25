<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Product;

class ProductCategory extends Model
{
    protected $table = 'product_category';
    protected $fillable = ['id', 'parent_category_id', 'category_name', 'slug', 'status', 'show_menu', 'image'];
    public $timestamps = true;
    public function parentCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
