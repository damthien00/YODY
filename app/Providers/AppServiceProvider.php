<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $categories = ProductCategory::whereNull('parent_category_id')->with('children')->get();
        View::share('categories', $categories);
    }
}
