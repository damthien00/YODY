<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    use HasFactory;
    protected $table = 'type_category';
    protected $fillable = ['name', 'description', 'image', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(TypeCategoryProduct::class, 'type_category_id');
    }
}
