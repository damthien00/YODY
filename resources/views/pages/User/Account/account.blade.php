@extends('layouts.AccountLayout')
@section('content')
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
                            <a class="title-info active" href="{{route('account')}}">Tài khoản của tôi</a>
                        </li>
                        <li>
                            <a disabled="disabled" class="title-info" href="{{route('account.order')}}">Đơn hàng của tôi</a>
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
                <h1 class="title-head margin-top-0">Thông tin cá nhân<button class="btn-edit-addr btn btn-primarys btn-more" type="button" onclick="window.location.href='/account/addresses'">Sửa thông tin</button></h1>
                <div class="form-signup name-account m992">
                    <p><strong>Họ và tên:</strong> {{auth()->user()->name}}</p>
                    <p><strong>Địa chỉ email:</strong> {{auth()->user()->email}}</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection