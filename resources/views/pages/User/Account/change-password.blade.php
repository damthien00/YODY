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
<section class="signup page_customer_account page-change">
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
                            <a disabled="disabled" class="title-info " href="{{route('account.order')}}">Đơn hàng của tôi</a>
                        </li>
                        <li>
                            <a class="title-info active" href="{{route('account.change-password')}}">Đổi mật khẩu</a>
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
                <h1 class="title-head margin-top-0">Đổi mật khẩu<span>(Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác)</span></h1>
                <form method="post" action="{{route('submit.change.password')}}" id="change_customer_password" accept-charset="UTF-8"><input name="FormType" type="hidden" value="change_customer_password"><input name="utf8" type="hidden" value="true">
                    @csrf
                    <div class="form-signup clearfix row">
                        <fieldset class="form-group col-12">
                            <label for="oldPass">Mật khẩu hiện tại <span class="error">*</span></label>
                            <input type="password" name="old_password" id="OldPass" required="" class="form-control form-control-lg">
                            <a class="forgot" href="/account/login">QUÊN MẬT KHẨU?</a>
                        </fieldset>
                        <fieldset class="form-group col-12">
                            <label for="changePass">Mật khẩu mới <span class="error">*</span></label>
                            <input type="password" name="new_password" id="changePass" required="" class="form-control form-control-lg">
                        </fieldset>
                        <fieldset class="form-group col-12">
                            <label for="confirmPass">Xác nhận mật khẩu mới <span class="error">*</span></label>
                            <input type="password" name="new_password_confirmation" id="confirmPass" required="" class="form-control form-control-lg">
                        </fieldset>
                    </div>
                    <p class="btn-page">
                        <a href="/account">Hủy</a>
                        <button class="button-default" type="submit" onclick="window.location.reload()"><i class="hoverButton"></i>Lưu</button>
                        <a class="forgot d-block d-md-none" href="/account/login">Quên mật khẩu?</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection