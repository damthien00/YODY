<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
        'slug'
    ];
}
