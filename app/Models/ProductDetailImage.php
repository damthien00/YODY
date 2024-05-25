<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailImage extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'product_id',
        'image'
    ];
    protected $table = 'product_image_detail'; // Tên của bảng trong cơ sở dữ liệu

}
