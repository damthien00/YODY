@extends('layouts.UserLayout')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/user/css/account-order.css') }}">

<style>
    .page-signup-title {
        font-weight: 700;
        font-family: 'SVN-Gilroy Bold';
    }

    .page-signup-title-yellow {
        color: #fcaf17 !important;
    }

    .page-signup-title-darkblue {
        color: #151560 !important;
    }

    .page-signup-error {
        margin-bottom: 24px !important;
        text-align: left;
    }

    .page-signup-field-error {
        border: 1px solid #F5222D !important;
    }

    .page-signup-error * {
        color: #F5222D !important;
    }

    .page-signup-actions {
        margin-bottom: 36px;
    }

    .page-signup-text {
        color: #595959;
        font-size: 16px;
    }

    .page-signup-or {
        border-top: 1px solid #DDE1E3;
    }

    .page-signup-or-item {
        color: #595959;
        margin-bottom: 32px;
        transform: translateY(-55%);
    }

    .page-signup-social-wrapper {
        margin-bottom: 32px;
    }

    .page-signup-social {
        padding: 0 12px;
    }

    .page-signup-social>a {
        height: unset !important;
    }

    .page-signup-redirect-login>a {
        color: #fcaf17 !important;
        font-weight: 700;
        height: unset !important;
    }

    .page-signup-redirect-login>a:hover {
        text-decoration: underline;
    }

    .page-signup-redirect-login>span {
        color: #595959;
    }

    .page-signup-loading {
        position: fixed;
        display: flex;
        background-color: rgba(255, 255, 255, 0.3);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }
</style>
<div class="page-content-account">
    <div class="container">
        <div class="d-group">
            <div class="left-col">
                <div class="group-login group-log">
                    <h1 class="d-none d-md-block"><span>ĐĂNG</span> NHẬP</h1>
                    <div class="acc-top-mb d-block d-md-none">
                        <span style="display: block; margin-bottom: 48px; color: #595959; font-weight: 400;">Chào mừng
                            bạn đến với Yody!</span>
                        <h1><span>ĐĂNG</span> NHẬP</h1>
                    </div>
                    <form method="post" action="{{route('login.post')}}" id="customer_login" accept-charset="UTF-8">
                        @csrf
                        <input name="FormType" type="hidden" value="customer_login">
                        <input name="utf8" type="hidden" value="true">
                        <p id="errorData">
                        </p>
                        <fieldset class="form-group">
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" class="form-control form-control-lg" value="" name="email" id="customer_email" placeholder="Email" oninput="inputFunctionEmail()">
                            <span id="errorEmailText" class="errorEmailText"></span>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="password" class="form-control form-control-lg" value="" name="password" id="customer_password" placeholder="Mật khẩu" oninput="inputFunctionPass()">
                            <span class="showpass"></span>
                            <span id="errorPassText" class="errorPassText"></span>
                        </fieldset>
                        <button class="btn-login btn-login-form" type="submit" value="Đăng nhập" style="width:100%;margin-bottom:16px">Đăng nhập</button>
                        <p class="d-block d-md-none forgot-mb"><a href="#" onclick="showRecoverPasswordForm();return false;" style="font-weight: 600">Quên mật
                                khẩu</a></p>
                    </form>
                    <p class="forgot">
                        <a class="d-none d-md-block" href="{{route('forget.password.get')}}">Quên mật
                            khẩu</a>
                    </p>
                    <p class="loginOr">
                        <span>Hoặc đăng nhập bằng</span>
                    </p>
                    <div class="block social-login--facebooks">
                        <div class="d-flex justify-content-center page-signup-social-wrapper">
                            <div class="page-signup-social">
                                <a href="{{route('login.google')}}" class="social-login--google"><img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/ic_btn_google.svg?1711788816130" class="bg-white" style="height: 48px; width: 120px; border: 1px solid rgb(240, 240, 240); border-radius: 500px;"></a>
                            </div>
                            <div class="page-signup-social">
                                <a href="javascript:void(0)" class="social-login--facebook"><img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/ic_btn_facebook.svg?1711788816130" class="bg-white" style="height: 48px; width: 120px; border: 1px solid rgb(240, 240, 240); border-radius: 500px;"></a>
                            </div>
                        </div>
                    </div>
                    <div class="register">
                        Bạn chưa có tài khoản? <a href="/account/register">Đăng ký ngay!</a>
                    </div>
                </div>
                <div class="group-login group-recover d-none">
                    <h2>QUÊN MẬT KHẨU</h2>
                    <p class="description">Nếu bạn quên mật khẩu, vui lòng nhập địa chỉ email đã đăng ký của bạn. Chúng
                        tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu.</p>
                    <form method="post" action="/account/recover" id="recover_customer_password" accept-charset="UTF-8">
                        <input name="FormType" type="hidden" value="recover_customer_password"><input name="utf8" type="hidden" value="true">
                        <fieldset class="form-group">
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" class="form-control form-control-lg" value="" name="Email" id="recover-email" placeholder="Nhập email" required="">
                        </fieldset>
                        <a href="#" class="btn-ref" onclick="hideRecoverPasswordForm();return false;">HỦY</a>
                        <input class="btn-login" type="submit" value="TIẾP TỤC">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection