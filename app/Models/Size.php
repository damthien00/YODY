<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'product_size';
    protected $fillable = ['id', 'size_name'];
    public $timestamps = false;
}
