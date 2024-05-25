<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantImageDetail extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'variant_id',
        'image'
    ];
    protected $table = 'variant_image_detail'; // Tên của bảng trong cơ sở dữ liệu

}
