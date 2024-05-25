<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'summary',
        'blog_cate_id',
        'image'
    ];

    // Specify the table associated with the model
    protected $table = 'blogs';

    // Enable timestamps
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(BlogCategories::class, 'blog_cate_id');
    }
}
