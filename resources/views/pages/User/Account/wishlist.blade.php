@extends('layouts.AccountLayout')
@section('content')
<section class="login page_iwish">
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
                            <a class="title-info" href="{{route('account.change-password')}}">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.address')}}">Sổ địa chỉ</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.order')}}">Đã xem gần đây</a>
                        </li>
                        <li>
                            <a class="title-info active" href="{{route('account.wishlist')}}">Sản phẩm yêu thích</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-right-ac">
                <div class="head-title clearfix">
                    <h1 class="title-head">Sản phẩm yêu thích<span><b class="headerWishlistCount"></b> sản phẩm</span></h1>
                </div>
                <div class="content-page rte">
                    <div id="sidebar-all">
                        <div class="sidebar-all-wrap-right" data-type="wishlist">
                            <div class="sidebar-all-wrap-right-main collection">
                                <div class="sidebar-all-wrap-right-main-list page-wishlist category-products">
                                    <div class="sidebar-all-wrap-right-main-top-error col-12"><span>Danh sách yêu thích của bạn
                                            trống <a href="/collections/all">Mua sắm ngay bây giờ</a></span></div>
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