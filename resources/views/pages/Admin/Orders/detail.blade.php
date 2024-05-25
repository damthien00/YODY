<link rel="stylesheet" href="{{asset('assets/css/bootstrap-tagsinput.css')}}">
@extends('layouts.AdminLayout')
@section('content')
<style>
    .personal-info img {
        width: 90px;
        cursor: pointer;
        height: 90px;
        margin: 0 auto;
        display: flex;
        overflow: hidden;
        position: relative;
        align-items: center;
        border-radius: 3px;
        justify-content: center;
    }

    .product-version-image img {
        width: 45px;
        height: 45px;
        display: flex;
        overflow: hidden;
        position: relative;
        align-items: center;
        border-radius: 3px;
        justify-content: center;
        border-radius: 5px;
    }

    .product-version {
        display: flex;
        align-items: center;
    }

    .item-inventory {
        display: flex;
        gap: 10px;
    }

    .item-inventory p {
        color: #747C87;
    }

    .product-version-info {
        display: flex;
        flex-direction: column;
        margin-left: 15px;
    }
</style>
<div class="header">

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>Danh sách sản phẩm</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <!-- Header Menu -->
    <ul class="nav user-menu">
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" font-size="24" class="jss217" color="#A2A8AF">
                    <path d="M19.08 4.93A9.972 9.972 0 0 0 12 2a9.928 9.928 0 0 0-7.07 2.93A9.947 9.947 0 0 0 2 12a9.947 9.947 0 0 0 2.93 7.07A9.947 9.947 0 0 0 12 22a9.947 9.947 0 0 0 7.07-2.93A9.947 9.947 0 0 0 22 12a9.937 9.937 0 0 0-2.92-7.07ZM12 11.38a2.817 2.817 0 0 1 2.81 2.81c0 1.285-.86 2.374-2.048 2.701a.187.187 0 0 0-.141.185v.523c0 .338-.261.621-.6.643a.622.622 0 0 1-.653-.621v-.545a.187.187 0 0 0-.141-.185 2.83 2.83 0 0 1-2.048-2.69c0-.338.261-.632.61-.643a.626.626 0 0 1 .642.62 1.56 1.56 0 0 0 1.678 1.558 1.567 1.567 0 0 0 1.449-1.448A1.567 1.567 0 0 0 12 12.61c-1.547.022-2.81-1.242-2.81-2.8 0-1.274.871-2.363 2.048-2.701a.2.2 0 0 0 .141-.185V6.39c0-.338.261-.62.6-.643a.622.622 0 0 1 .653.621v.545c0 .087.054.163.141.185a2.83 2.83 0 0 1 2.048 2.69.637.637 0 0 1-.61.643.626.626 0 0 1-.642-.62 1.56 1.56 0 0 0-1.678-1.558 1.576 1.576 0 0 0-1.449 1.449A1.567 1.567 0 0 0 12 11.379Z" fill="#A2A8AF"></path>
                </svg>
                <span class="badge badge-pill">Vay vốn kinh doanh</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Messages</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">6 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">5 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">3 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-08.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">27 Feb</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">View all Messages</a>
                </div>
            </div>
        </li>
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" font-size="24" class="jss217" color="#A2A8AF">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2Zm-1 17v-2h2v2h-2Zm3.17-6.83.9-.92c.57-.57.93-1.37.93-2.25 0-2.21-1.79-4-4-4S8 6.79 8 9h2c0-1.1.9-2 2-2s2 .9 2 2c0 .55-.22 1.05-.59 1.41l-1.24 1.26C11.45 12.4 11 13.4 11 14.5v.5h2c0-1.5.45-2.1 1.17-2.83Z" fill="#A2A8AF"></path>
                </svg>
                <span class="badge badge-pill">Trợ giúp</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Messages</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">6 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">5 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">3 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-08.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">27 Feb</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">View all Messages</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <!-- Message Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" font-size="24" class="jss217" color="#A2A8AF">
                    <path d="M12 21C8.387 17.773 2 13.76 2 8.395 2 5.374 4.42 3 7.5 3c1.74 0 3.41.744 4.5 2 1.09-1.256 2.76-2 4.5-2C19.58 3 22 5.374 22 8.395c0 5.356-6.379 9.396-10 12.605Z" fill="#A2A8AF"></path>
                </svg>
                <span class="badge badge-pill">Góp ý</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Messages</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">6 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">5 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">3 Mar</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">
                                            <img alt="" src="assets/img/profiles/avatar-08.jpg">
                                        </span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">27 Feb</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">View all Messages</a>
                </div>
            </div>
        </li>
        <!-- /Message Notifications -->

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="https://tse1.mm.bing.net/th?id=OIP.v21DNCR6TtRbO86K4jVJcAHaHa&pid=Api&P=0&h=180" alt="">
                    <span class="status online"></span></span>
                <span class="user-name">Đàm Thiện</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a>
            <a class="dropdown-item" href="login.html">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

</div>
<div class="content container-fluid p-4">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card leave-box" id="client-info">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin khách hàng</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="fw-1">ĐỊA CHỈ GIAO HÀNG:</h5>
                                    <div class=" ">
                                        <p>{{$order->customer->customer_name}} - {{$order->customer->phone}}</p>
                                        <p>{{$order->customer->address}}, {{$order->customer->ward->name}}, {{$order->customer->district->name}}, {{$order->customer->province->name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="fw-1">LIÊN HỆ:</h5>
                                    <div class=" ">
                                        <p>Email: {{$order->user->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($order->payment_status == 1)
            <div class="card leave-box" id="client-info">
                <div class="card-header">
                    <h5 class="card-title mb-0 d-flex align-items-center">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" font-size="20px" style="font-size: 20px; margin-right: 10px; color: rgb(15, 209, 134);">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2Zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8Zm-2-5.83 6.59-6.59L18 9l-8 8-4-4 1.41-1.41L10 14.17Z" fill="currentColor"></path>
                        </svg>Đã thanh toán
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p>Khách phải trả: {{number_format($order->total_price)}}đ</p>
                                    <p class="mt-1">Đã thanh toán: {{number_format($order->payment->first()->p_money)}}đ</p>
                                    <p class="mt-1">Còn phải trả: <span style="color:red;font-weight:500;">{{number_format($order->total_price - $order->payment->first()->p_money)}}đ</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Người thanh toán: {{$order->customer->customer_name}}</p>
                                    <p>Thời gian: {{$order->created_at}}</p>
                                    <p>Ghi chú: -----</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card leave-box" id="client-info">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0 d-flex align-items-center"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" font-size="20px" style="color: rgb(163, 168, 175); font-size: 20px; margin-right: 10px;">
                            <path d="M19.709 6.502H4.29A2.293 2.293 0 0 0 2 8.792v8.75a2.293 2.293 0 0 0 2.291 2.292h15.417A2.293 2.293 0 0 0 22 17.542v-8.75a2.293 2.293 0 0 0-2.291-2.29Zm-12.5 3.75H5.125a.625.625 0 1 1 0-1.25h2.084a.625.625 0 1 1 0 1.25ZM12 16.084a2.92 2.92 0 0 1-2.916-2.917A2.92 2.92 0 0 1 12 10.252a2.92 2.92 0 0 1 2.916 2.916A2.919 2.919 0 0 1 12 16.084Zm6.875 1.25h-2.084a.625.625 0 1 1 0-1.25h2.084a.625.625 0 1 1 0 1.25ZM19.709 5.667H4.29a.834.834 0 0 1 0-1.667h15.417a.834.834 0 0 1 0 1.667Z" fill="currentColor"></path>
                        </svg>Đơn hàng chờ thanh toán</h5>
                    <button class="btn btn-primary">Thanh toán</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Khách phải trả: 09553535436</p>
                        </div>
                        <div class="col-md-4">
                            <p>Đã thanh toán: <span style="color:red;font-weight:500;">09553535436</span></p>
                        </div>
                        <div class="col-md-4">
                            <p>Còn phải trả: 09553535436</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div class="col-md-4">
            <div class="card leave-box" id="client-info">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin đơn hàng</h5>
                </div>
                <div class="card-body">
                    <ul class="personal-info">
                        <li>
                            <div class="title">Chính sách giá</div>
                            <div class="text">: Giá bán lẻ </div>
                        </li>
                        <li>
                            <div class="title">Bán tại</div>
                            <div class="text">: Website </div>
                        </li>
                        <li>
                            <div class="title">Bán bởi</div>
                            <div class="text">: Mua online</div>
                        </li>
                        <li>
                            <div class="title">Hẹn giao hàng</div>
                            <div class="text">: 17/10/2024</div>
                        </li>
                        <li>
                            <div class="title">Kênh bán hàng</div>
                            <div class="text">: Thương mại điện tử</div>
                        </li>
                        <li>
                            <div class="title">Ngày bán</div>
                            <div class="text">: {{$order->created_at}} </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card leave-box" id="client-info">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th style="width:30px;">STT</th>
                                            <th>Ảnh</th>
                                            <th style="width:300px;">Sản phẩm</th>
                                            <th class="text-center">Loại</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Đơn giá</th>
                                            <th class="text-center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($order->order_details as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td style='width:70px;'>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="{{  asset($item->variant->variant_image_detail->first()->image) }}" alt="">
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="d-flex flex-column">
                                                <a href="{{ route('admin.products.variants.detail', ['product_id' => $item->product->id, 'variant_id' => $item->variant->id]) }}" title="Áo khoác Chino thời thượng SID56708">{{$item->product->product_name}}</a>
                                                <span>Phiên bản: {{$item->variant->size->size_name}}-{{$item->variant->color->color_name}}<span>
                                            </td>
                                            <td class="text-center">{{$item->product->category->category_name}}</td>
                                            <td class="text-center">{{$item->quantity}}</td>
                                            <td class="text-center">{{number_format($item->variant->retail_price)}}đ</td>
                                            <td class="text-center">{{number_format($item->quantity * $item->variant->retail_price)}}đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection