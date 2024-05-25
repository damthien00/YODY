<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // session()->forget('cart');
        $carts = session('cart', []);
        $totalPrice = 0; // Khởi tạo biến tổng giá tiền
        foreach ($carts as $cart) { // Duyệt qua từng mục trong giỏ hàng
            $totalPrice += $cart['price'] * $cart['quantity']; // Tính tổng giá tiền của từng mục
        }
        return view('pages/User/Cart/cart', compact('carts', 'totalPrice'));
    }
    public function store(Request $request)
    {
        $cart = session('cart', []);
        $productId = $request->input('product_id');
        $colorId = $request->input('color_id');
        $sizeId = $request->input('size_id');
        $user = Auth::user();

        $variant = ProductVariant::where('color_id', $colorId)
            ->where('size_id', $sizeId)
            ->first();

        if ($variant) {
            $cartItemId = $productId . '_' . $variant->id;
            if (isset($cart[$cartItemId])) {
                $cart[$cartItemId]['quantity'] += $request->input('quantity');
            } else {
                $image = $variant->variant_image_detail()->first()->image;
                $productItem = [
                    'id' => $cartItemId,
                    'product_id' => $productId,
                    'variant_id' => $variant->id,
                    'quantity' => $request->input('quantity'),
                    'name' => $variant->product->product_name, // Thêm đối tượng sản phẩm vào
                    'color' => $variant->color->color_name,
                    'size' => $variant->size->size_name,
                    'price' => $variant->retail_price,
                    'image' => $image,
                ];
                $cart[$cartItemId] = $productItem;
                $cartItemId = $productId . '_' . $variant->id;
                $cart[$cartItemId] = $productItem;
            }
            // Thêm đối tượng sản phẩm vào giỏ hàng

            // Cập nhật giỏ hàng trong session
            session(['cart' => $cart]);
            return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        } else {
            // Nếu không tìm thấy variant, thông báo lỗi và quay trở lại trang trước đó
            return redirect()->back()->with('error', 'Không thể thêm sản phẩm vào giỏ hàng. Vui lòng chọn một biến thể hợp lệ!');
        }
    }
    //Hàm xóa sản phẩm khỏi giỏ hàng
    public function destroy(Request $request)
    {
        // Lấy ID sản phẩm từ request
        $id = $request->input('delete_cart_id');
        $cartItems = session('cart', []);
        $updatedCart = array_values(array_filter($cartItems, function ($item) use ($id) {
            return $item['id'] !== $id;
        }));
        session(['cart' => $updatedCart]); // Cập nhật giỏ hàng trong session
        return redirect()->back()->with('success', 'Sản phẩm đã được loại bỏ khỏi giỏ hàng!');
    }
    public function update(Request $request)
    {
        // Lấy dữ liệu từ form
        $cartId = $request->input('update_cart_id');
        $quantity = $request->input('update_cart_quantity');
        $cart = session('cart', []);

        foreach ($cart as $cartItem) {
            if ($cartItem['id'] == $cartId) {
                $cart[$cartId]['quantity'] = $quantity;
                session(['cart' => $cart]);
            }
        }
        return redirect()->back()->with('success', 'Đã cập nhật số lượng thành công!');
    }
}
