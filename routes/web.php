<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopGridController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeCategoryController;
use App\Http\Controllers\UserBlogController;
use App\Models\Product;
use App\Models\ProductDetailImage;
use App\Models\ProductVariant;
use App\Http\Controllers\SearchController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;




//ADMIN
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages/Admin/Dashboard/dashboard');
    })->name('admin/dashboard');

    //Products
    Route::prefix('products')->group(function () {
        Route::get('show', function () {
            return view('pages/Admin/Products/show');
        })->name('admin/products/show');
        Route::get('create', function () {
            return view('pages/Admin/Products/create');
        })->name('admin/products/create');
        Route::get('detail', function () {
            return view('pages/Admin/Products/detail');
        })->name('admin/products/detail');

        Route::get('edit', function () {
            return view('pages/Admin/Products/edit');
        })->name('admin/products/edit');
    });

    //Customer
    Route::prefix('customer')->group(function () {
        Route::get('show', function () {
            return view('pages/Admin/Customer/show');
        })->name('admin/customer/show');
        Route::get('create', function () {
            return view('pages/Admin/Customer/create');
        })->name('admin/customer/create');
    });
});

//Customer
Route::get('/admin/customer/show', [CustomerController::class, 'show'])->name('customer.show');

//Orders
Route::get('/admin/order/show', [OrderController::class, 'index'])->name('order.index');
Route::get('/admin/order/{id}', [OrderController::class, 'show'])->name('order.show');

//Products
// Route::get('/admin/products/create', [ProductController::class, 'getCategoryAndBrand'])->name('products.show');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/admin/products/show', [ProductController::class, 'index'])->name('products.show');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
// Route::get('/products', [ProductController::class, 'index'])->name('product.index');





//Category
Route::get('/admin/category/show', [ProductCategoryController::class, 'index'])->name('admin.category.show');
Route::get('/admin/category/create', [ProductCategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [ProductCategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/update/{id}', [ProductCategoryController::class, 'update'])->name('admin.category.update');
// Route::post('/category/create', [ProductCategoryController::class, 'create'])->name('category.create');
// Route::post('/category', [ProductCategoryController::class, 'store'])->name('category.store');
// Route::put('/category/update', [ProductCategoryController::class, 'update'])->name('category.update');
Route::delete('/admin/category/delete/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.category.destroy');

// Route xử lí Brand 
Route::get('/admin/brand/show', [BrandController::class, 'index'])->name('admin.brand.show');
Route::post('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
Route::put('/brand/update', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/delete', [BrandController::class, 'destroy'])->name('brand.destroy');
Route::get('/brand', [BrandController::class, 'store'])->name('brand.store');

// Route xử lí Blog 
Route::get('/admin/blog/show', [BlogController::class, 'show'])->name('blog.index');
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('admin/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::put('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::delete('/admin/blog/delete', [BlogController::class, 'destroy'])->name('blog.destroy');

// Route xử lí TypeCategory 
Route::get('/admin/type_category/show', [TypeCategoryController::class, 'show'])->name('type_category.index');
Route::get('/admin/type_category/create', [TypeCategoryController::class, 'create'])->name('type_category.create');
Route::post('admin/type_category/store', [TypeCategoryController::class, 'store'])->name('type_category.store');
Route::put('/admin/type_category/update/{id}', [TypeCategoryController::class, 'update'])->name('type_category.update');
Route::get('/admin/type_category/edit/{id}', [TypeCategoryController::class, 'edit'])->name('type_category.edit');
Route::delete('/admin/type_category/delete', [TypeCategoryController::class, 'destroy'])->name('type_category.destroy');
Route::post('/type_category/saveProducts', [TypeCategoryController::class, 'saveProducts']);
Route::post('/type_category/deleteProduct', [TypeCategoryController::class, 'deleteProduct']);



// Route xử lí variant 
Route::get('/admin/products/{product_id}/variants/{variant_id}', [ProductController::class, 'show'])->name('admin.products.variants.detail');
Route::post('/admin/products/{product_id}/variants/create', [ProductVariantController::class, 'create'])->name('admin.products.variant.create');
Route::post('/admin/products/{product_id}/variants/store', [ProductVariantController::class, 'store'])->name('admin.products.variants.store');
Route::put('/admin/products/{product_id}/variants/{variant_id}/edit', [ProductController::class, 'edit'])->name('admin.products.variants.edit');
Route::put('/admin/products/{product_id}/variants/{variant_id}/update', [ProductController::class, 'update'])->name('admin.products.variants.update');
Route::delete('/admin/products/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');

// Route xứ lí chi tiết ảnh sản phẩm
Route::delete('/productdetailimage/delete/{id}', [ProductDetailImage::class, 'destroy'])->name('productdetailimage.destroy');
Route::delete('/variantimagedetail/delete/{id}', [ProductVariantController::class, 'destroy'])->name('variantimagedetail.destroy');
Route::get('/filter', [Product::class, 'filter'])->name('filter_products');


// Route xứ lí Attribute
Route::get('/admin/products/color', [ColorController::class, 'show'])->name('color.index');
Route::post('/admin/products/color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('/admin/products/color/store', [ColorController::class, 'store'])->name('color.store');
Route::put('/admin/products/color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
Route::put('/admin/products/color/update/{id}', [ColorController::class, 'update'])->name('color.update');
Route::delete('/admin/products/color/delete/{id}', [ColorController::class, 'destroy'])->name('color.delete');


Route::get('/admin/products/size', [ColorController::class, 'show'])->name('size.index');
Route::post('/admin/products/size/create', [SizeController::class, 'create'])->name('size.create');
Route::post('/admin/products/size/store', [SizeController::class, 'store'])->name('size.store');
Route::put('/admin/products/size/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
Route::put('/admin/products/size/update/{id}', [SizeController::class, 'update'])->name('size.update');
Route::delete('/admin/products/size/delete/{id}', [SizeController::class, 'destroy'])->name('size.delete');

//Dashboard

// Route::get('/admin/dashboard', function () {
//     return view('pages/Admin/Dashboard/dashboard');
// })->name('admin/dashboard');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::post('admin/dashboard', [DashboardController::class, 'filter'])->name('dashboard.filter');

//####################################################
//####################################################
//####################################################
//####################################################



Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [ShopController::class, 'show'])->name('shop');
Route::get('/shop/{slug}', [ShopGridController::class, 'index'])->name('shop.grid');



// Route::get('/shop-grid/{slug}', [ShopGridController::class, 'index'])->name('shop-grid.show');

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

//Detail Product
Route::get('/products/{id}/variants/{variant_id}', [ProductDetailController::class, 'show'])->name('product-detail');



//Cart
Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/delete', [CartController::class, 'destroy'])->name('cart.destroy');

//Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/registation', [AuthController::class, 'registation'])->name('registation');
Route::post('/registation', [AuthController::class, 'registationPost'])->name('registation.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');
Route::get('/auth/google/callback', [
    AuthController::class, function () {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended(route('home'));
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('123456789'),
                    'google_id' => $user->id,
                ]);
                Auth::login($newUser);
                return redirect()->intended(route('home'));
            }

            return redirect()->intended(route('home'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
]);

//Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/vnpay-payment', [CheckoutController::class, 'vnpayPayment'])->name('checkout.vnpayPayment');
Route::post('/vnpay', [PaymentController::class, 'createPayment'])->name('online.payment');
Route::get('payment/return', [PaymentController::class, 'vnpayReturn'])->name('return.payment');
Route::get('/provinces', [AddressController::class, 'getProvince']);
Route::get('/districts/{province_id}', [AddressController::class, 'getDistrict']);
Route::get('/wards/{district_id}', [AddressController::class, 'getWard']);

//Account
Route::get('/account/order', [AccountController::class, 'getOrders'])->name('account');
Route::get('/account/order', [AccountController::class, 'getOrders'])->name('account.order');
Route::get('/account/order/{id}', [AccountController::class, 'getOrderID'])->name('account.order.details');
Route::get(
    '/account/change-password',
    [AccountController::class, 'showChangePasswordForm']
)->name('account.change-password');

Route::post(
    '/change-password',
    [AccountController::class, 'submitChangePasswordForm']
)->name('submit.change.password');

Route::get('/account', function () {
    return view('pages/User/Account/account');
})->name('account');

Route::get('/account/address', function () {
    return view('pages/User/Account/address');
})->name('account.address');

Route::get('/account/wishlist', function () {
    return view('pages/User/Account/wishlist');
})->name('account.wishlist');

//Blog
Route::get('/blog', [UserBlogController::class, 'show'])->name('blog');
