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
        <div class="d-group position-relative">
            <div id="signupLoading" class="d-none page-signup-loading justify-content-center align-items-center">
                <img width="100" height="100" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/rolling.svg?1711788816130" alt="loading">
            </div>
            <div class="right-col">
                <div class="group-login group-log">
                    <div class="mb-5 d-block page-signup-text">
                        Chào mừng bạn đến với Yody!
                    </div>
                    <h1 class="d-block">
                        <span class="page-signup-title page-signup-title-darkblue">ĐĂNG</span>
                        <span class="page-signup-title page-signup-title-yellow">KÝ</span>
                    </h1>
                    <form method="post" action="{{route('registation.post')}}" id="customer_register" accept-charset="UTF-8">
                        @csrf
                        <div id="responseErrors" class="d-none">
                        </div>
                        <div id="frmErrorText" class="error page-signup-error d-none flex-column justflex-columnify-content-center align-items-center flex-column">
                        </div>
                        <fieldset class="form-group">
                            <input type="text" class="form-control form-control-lg mb-1 @error('name') page-signup-field-error @enderror" value="{{ old('name') }}" name="name" id="name" placeholder="Họ và tên">
                            <div class="page-signup-error px-1">
                                @error('name')
                                <div>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <input placeholder="Số điện thoại" type="text" id="phone" value="{{ old('phone') }}" class="form-control form-control-comment mb-1 form-control-lg @error('phone') page-signup-field-error @enderror" name=" phone">
                            <div class="page-signup-error px-1">
                                @error('phone')
                                <div>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="text" class="form-control form-control-lg mb-1  @error('email') page-signup-field-error @enderror" value="{{ old('email') }}" name=" email" id="email" placeholder="Địa chỉ email">
                            <div class="page-signup-error px-1">
                                @error('email')
                                <div>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="password" class="form-control form-control-lg mb-1 @error('password') page-signup-field-error @enderror" value="{{ old('password') }}" name=" password" id="password" placeholder="Mật khẩu">
                            <span class="showpass"></span>
                            <div class="page-signup-error px-1">
                                @error('password')
                                <div>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="page-signup-actions">
                            <button id="btnSubmit" class="btn-login btn-reg w-100" value="Đăng ký" type="submit">Đăng
                                ký</button>
                        </div>
                        <div class="block social-login--facebooks d-block d-md-none">
                            <div class="a-center page-signup-or">
                                <div class="page-signup-or-item d-inline-block px-1 bg-white">Hoặc đăng ký bằng</div>
                            </div>
                            <script>
                                function loginFacebook() {
                                    var a = {
                                            client_id: "947410958642584",
                                            redirect_uri: "https://store.mysapo.net/account/facebook_account_callback",
                                            state: JSON.stringify({
                                                redirect_url: window.location.href
                                            }),
                                            scope: "email",
                                            response_type: "code"
                                        },
                                        b = "https://www.facebook.com/v3.2/dialog/oauth" + encodeURIParams(a, !0);
                                    window.location.href = b
                                }

                                function loginGoogle() {
                                    var a = {
                                            client_id: "997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",
                                            redirect_uri: "https://store.mysapo.net/account/google_account_callback",
                                            scope: "email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",
                                            access_type: "online",
                                            state: JSON.stringify({
                                                redirect_url: window.location.href
                                            }),
                                            response_type: "code"
                                        },
                                        b = "https://accounts.google.com/o/oauth2/v2/auth" + encodeURIParams(a, !0);
                                    window.location.href = b
                                }

                                function encodeURIParams(a, b) {
                                    var c = [];
                                    for (var d in a)
                                        if (a.hasOwnProperty(d)) {
                                            var e = a[d];
                                            null != e && c.push(encodeURIComponent(d) + "=" + encodeURIComponent(e))
                                        } return 0 == c.length ? "" : (b ? "?" : "") + c.join("&")
                                }
                            </script>
                            <div class="d-flex justify-content-center page-signup-social-wrapper">
                                <div class="page-signup-social">
                                    <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/ic_btn_google.svg?1711788816130" class="bg-white" style="height: 48px; width: 120px; border: 1px solid rgb(240, 240, 240); border-radius: 500px;"></a>
                                </div>
                                <div class="page-signup-social">
                                    <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/ic_btn_facebook.svg?1711788816130" class="bg-white" style="height: 48px; width: 120px; border: 1px solid rgb(240, 240, 240); border-radius: 500px;"></a>
                                </div>
                            </div>
                            <div class="page-signup-redirect-login page-signup-text">
                                <span>Bạn đã có tài khoản?</span>
                                <a href="/account/login">Đăng nhập ngay!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection