<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function getOrders()
    {
        $user_id = Auth::id(); // Lấy id của người dùng hiện tại

        // Lấy ra các đơn hàng của người dùng hiện tại
        $orders = Orders::where('user_id', $user_id)->get();

        return view('pages.User.Account.order', compact('orders'));
    }

    function getOrderID($id)
    {
        $order = Orders::findOrFail($id);
        return view('pages/User/Account/order-details', compact('order'));
    }
    public function showChangePasswordForm()
    {
        return view('pages.User.Account.change-password');
    }

    public function submitChangePasswordForm(Request $request)
    {
        $user = Auth::user();

        // Kiểm tra xem mật khẩu cũ có khớp với mật khẩu hiện tại của người dùng không
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withInput()->with('error', 'Old password is incorrect!');
        }

        // Kiểm tra xem hai trường mật khẩu mới có khớp nhau không
        if ($request->new_password !== $request->new_password_confirmation) {
            return back()->withInput()->with('error', 'New password confirmation does not match!');
        }

        // Cập nhật mật khẩu mới của người dùng
        $user->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('home')->with('message', 'Your password has been changed successfully!');
    }
}
