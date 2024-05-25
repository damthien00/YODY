@extends('layouts.UserLayout')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/user/css/account-order.css') }}">
<div class="page-content-account">
    <div class="container">
        <div class="d-group position-relative">
            <div class="left-col">
                <div class="group-login group-recover group-log">
                    <h1>TẠO MẬT KHẨU MỚI</h1>
                    <p class="description resetpass-description">Cảm ơn bạn đã trở lại<br>Vui lòng nhập chi tiết mật khẩu dưới đây</p>
                    <form method="post" action="{{route('reset.password.post', ['token' => $token])}}" id="reset_customer_password" accept-charset="UTF-8"><input name="FormType" type="hidden" value="reset_customer_password"><input name="utf8" type="hidden" value="true">
                        @csrf
                        <div id="frmResetPassErrorText" class="error page-signup-error d-none flex-column justflex-columnify-content-center align-items-center flex-column">
                        </div>
                        <fieldset class="form-group pb-3">
                            <input type="password" placeholder="Mật khẩu mới" name="password" id="customer_password" class="form-control m-0">
                            <span class="showpass"></span>
                            <div class="resetpass-field-message-error">
                            </div>
                        </fieldset>
                        <fieldset class="form-group pb-3">
                            <input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation" id="customer_password_confirmation" class="form-control m-0">
                            <span class="showpass"></span>
                            <div class="resetpass-field-message-error">
                            </div>
                        </fieldset>
                        <a href="/" class="btn-ref">HỦY</a>
                        <button class="btn-login" type="submit" value="TIẾP TỤC">TIẾP TỤC</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection