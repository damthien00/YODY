<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

use function PHPSTORM_META\type;

class PaymentController extends Controller
{
    function postPayment(Request $request)
    {
        $carts = Cart::all();
        $totalPrice = 0; // Khởi tạo biến tổng giá tiền
        foreach ($carts as $cart) { // Duyệt qua từng mục trong giỏ hàng
            $totalPrice += $cart->variant->retail_price * $cart->quantity; // Tính tổng giá tiền của từng mục
        }

        $user = Auth::user();
        if (!$user) { // Sử dụng $user thay vì $datauser
            Session::flash('toast', [
                'type' => 'error',
                'message' => 'Đăng nhập để thực hiện tính năng này'
            ]);
            return redirect()->back();
        }
        $data['cus_name'] = $request->cus_name;
        $data['cus_phone'] = $request->cus_phone;
        $data['cus_province'] = $request->cus_province;
        $data['cus_district'] = $request->cus_district;
        $data['cus_ward'] = $request->cus_ward;
        $data['total_money'] = $totalPrice;
        $data['created_at'] = Carbon::now();
        session(['info_customer' => $data]);
        return view('pages/User/VNPAY/index', compact('totalPrice'));
    }

    function createPayment(Request $request)
    {
        $data['cus_name'] = $request->cus_name;
        $data['cus_phone'] = $request->cus_phone;
        $data['cus_address'] = $request->cus_address;
        $data['cus_province'] = $request->cus_province;
        $data['cus_district'] = $request->cus_district;
        $data['cus_ward'] = $request->cus_ward;
        $data['total_money'] =  $request->input('Amount');
        $data['created_at'] = Carbon::now();
        session(['info_customer' => $data]);
        $order_info = $request->input('OrderDescription') ?: 'Không có thông tin đơn hàng';
        $vnp_TmnCode = "LYRIKVIV"; //Mã website tại VNPAY 
        $vnp_HashSecret = "UFFJOEWPWNWQJBTNMSJISCSSAOVGOOUT"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return.payment');
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $order_info;
        $vnp_OrderType =  'billpayment';
        $vnp_Amount = $request->input('Amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        // dd($inputData);
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = strtoupper(hash_hmac('sha512', $hashdata, $vnp_HashSecret));
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    function vnpayReturn(Request $request)
    {
        if (session()->has('info_customer') && $request->vnp_ResponseCode == "00") {
            try {
                $user_id = Auth::user()->id;
                $vnpayData = $request->all();
                $data = session()->get('info_customer');
                $customer =  Customer::create([
                    'user_id' => $user_id,
                    'customer_name' => $data['cus_name'],
                    'address' => $data['cus_address'],
                    'phone' => $data['cus_phone'],
                    'province_id' => $data['cus_province'],
                    'district_id' => $data['cus_district'],
                    'ward_id' => $data['cus_ward']
                ]);

                $order =  [
                    'user_id' => $user_id,
                    'customer_id' => $customer->id,
                    'total_price' =>  $data['total_money'],
                    'created_at' => now(),
                    'updated_at' => now(),
                    'order_status' => 1,
                    'payment_status' => 1,
                ];
                $orderID = Orders::insertGetId($order);
                if ($orderID) {
                    $shopping =
                        session('cart', []);

                    foreach ($shopping as $key => $item) {
                        OrderDetails::insert([
                            'order_id' => $orderID,
                            'product_id' => $item['product_id'],
                            'variant_id' => $item['variant_id'],
                            'quantity' => $item['quantity']
                        ]);
                    };
                    $dataPayment = [
                        'order_id' => $orderID,
                        'p_transaction_code' => $vnpayData['vnp_TxnRef'],
                        'user_id' => $user_id,
                        'p_money' =>  $data['total_money'],
                        'p_note' => $vnpayData['vnp_OrderInfo'],
                        'p_vnp_response_code' => $vnpayData['vnp_ResponseCode'],
                        'p_code_vnpay' => $vnpayData['vnp_TransactionNo'],
                        'p_code_bank' => $vnpayData['vnp_BankCode'],
                        'p_time' => date('Y-m-d H:i:s', strtotime($vnpayData['vnp_PayDate'])),
                    ];
                    Payment::insert([$dataPayment]);
                }

                Session::flash('toast', [
                    'type' => 'success',
                    'message' => 'Đơn hàng của bạn đã được lưu'
                ]);
                session()->forget('cart');
                session()->forget('info_customer');
                return view('/pages/User/VNPAY/vnpay_return', compact('vnpayData'));
            } catch (Exception $e) {
                Session::flash('toast', [
                    'type' => 'error',
                    'message' => 'Đã xảy ra lỗi không thể thanh toán đơn hàng'
                ]);
            }
        } else {
            Session::flash('toast', [
                'type' => 'error',
                'message' => 'Đã xảy ra lỗi không thể thanh toán đơn hàng'
            ]);
        };
    }
}
