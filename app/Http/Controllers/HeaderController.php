<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeaderController extends Controller
{
    public function getCountCart()
    {
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $carts = Cart::where('user_id', $userID)->get();
            $count = $carts->count();
            return view('layouts/component/header', compact('carts', 'count'));
        } else {
            return redirect()->route('login');
        }
    }
    public function index()
    {
        return view('layouts/component/header', compact('categorys'));
    }
}
