<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function show()
    {
        return view('/pages/User/Blog/blog');
    }
}
