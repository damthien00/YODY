@extends('layouts.AccountLayout')
@section('content')
<link rel="stylesheet" href="{{asset('assets/user/css/account-order.css')}}">
<section class="bread-crumb d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 a-left">
                <ul class="breadcrumb">
                    <li class="home d-none">
                        <a href="/"><span>Trang chủ</span></a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="/account"><span>Tài khoản</span></a>
                    </li>
                    <li class="last">
                        <strong><span>Tài khoản</span></strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="signup page_customer_account">
    <div class="container">
        <div class="row">
            <div class="col-left-ac">
                <div class="block-account">
                    <div class="info info-1">
                        <img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/account_ava.jpg?1713495880758" alt="Thiện">
                        <p>Thiện</p>
                        <a class="click_logout" href="/account/logout">Đăng xuất</a>
                    </div>
                    <ul>
                        <li>
                            <a class="title-info" href="{{route('account')}}">Tài khoản của tôi</a>
                        </li>
                        <li>
                            <a disabled="disabled" class="title-info active" href="{{route('account.order')}}">Đơn hàng của tôi</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.change-password')}}">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.address')}}">Sổ địa chỉ</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.order')}}">Đã xem gần đây</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.wishlist')}}">Sản phẩm yêu thích</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-right-ac">
                <h1 class="title-head margin-top-0">Đơn hàng của tôi<span>0 đơn hàng</span></h1>
                <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                    <div class="my-account">
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive-block tab-all" style="overflow-x:auto;">
                                    <table class="table table-cart table-order" id="my-orders-table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày mua</th>
                                                <th>Địa chỉ</th>
                                                <th>Giá trị<br>đơn hàng</th>
                                                <th>Trạng thái thanh toán</th>
                                                <th>Trạng thái vận chuyển</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td><a href="{{route('account.order.details', ['id' => $order->id])}}" title="">#{{$order->id}}</a></td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    {{$order->customer->address}},{{$order->customer->ward->name}},{{$order->customer->district->name}},{{$order->customer->province->name}}
                                                </td>
                                                <td>
                                                    <span class="price">{{number_format($order->total_price)}}đ</span>
                                                </td>
                                                <td>
                                                    @if($order->payment_status == 1)
                                                    <span class="span_pending">Đã thu tiền</span>
                                                    @else
                                                    <span class="span_pending">Chưa thu tiền</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($order->order_status == 1)
                                                    <span class="span_pending">Đang xử lí</span>
                                                    @else
                                                    <span class="span_pending">Đã giao</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- <tr>
                                    <td colspan="6">
                                        <p>Không có đơn hàng nào.</p>
                                    </td>
                                </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection