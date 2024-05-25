<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = session('cart', []);
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }
        $user = Auth::user();
        $customers = Customer::all();
        $customer = Customer::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')->first();
        return view('pages/User/Checkout/checkout', compact('carts', 'totalPrice', 'user', 'customer', 'customers'));
    }

    // public function vnpayPayment(Request $request)
    // {
    //     $vnp_TmnCode = "LYRIKVIV"; //Mã website tại VNPAY 
    //     $vnp_HashSecret = "UFFJOEWPWNWQJBTNMSJISCSSAOVGOOUT"; //Chuỗi bí mật
    //     $vnp_Returnurl = "http://127.0.0.1:8000/checkout";
    //     $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
    //     $vnp_OrderType = 'billpayment';
    //     $vnp_Amount = $request->input('Amount') * 100;
    //     $vnp_Locale = $request->language;
    //     $vnp_BankCode = $request->bank_code;
    //     $vnp_IpAddr = request()->ip();

    //     $inputData = array(
    //         "vnp_Version" => "2.0.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,
    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . $key . "=" . $value;
    //         } else {
    //             $hashdata .= $key . "=" . $value;
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }
    //     $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Url = $vnp_Url . "?" . $query;

    //     dd($vnp_Url);
    //     if (isset($vnp_HashSecret)) {
    //         // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
    //         $vnpSecureHash = strtoupper(hash_hmac('sha512', $hashdata, $vnp_HashSecret));
    //         $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     return redirect($vnp_Url);
    // }

    // public function vnpayeturn(Request $request)
    // {
    //     $url = session('url_prev', '/');
    //     if ($request->vnp_ResponseCode == "00") {
    //         return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
    //     }
    //     session()->forget('url_prev');
    //     return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    // }
}
