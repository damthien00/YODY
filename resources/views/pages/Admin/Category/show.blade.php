@extends('layouts.AdminLayout')
@section('content')
<style>
    .modal-dialog {
        width: 580px;
    }

    .search-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 99;
    }

    .search-icon svg {
        width: 24px;
        height: 24px;
    }
</style>
<div class="header">
    <!-- Header Title -->
    <div class="page-title-box">
        <div class="">
            <a style="color: #747C87;" class="d-flex align-items-center" href="{{route('products.show')}}">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="width: 24px; height: 24px; margin-left: -9px; margin-right: 6px;">
                    <path d="M14.298 5.99 8.288 12l6.01 6.01 1.414-1.414L11.116 12l4.596-4.596-1.414-1.414Z" fill="currentColor"></path>
                </svg>
                <h5 class="mb-0">Quay lại danh sách sản phẩm</h5>
            </a>
        </div>
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
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto float-right ml-auto">
                <a href="{{route('admin.category.create')}}" class="btn add-btn">
                    <svg style="color:#fff; display:block;fill: currentColor;" class="mr-1" width="20" height="20" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                    </svg>
                    <span style="font-weight: 500;">Thêm danh mục</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Annual Leave -->
            <div class="card leave-box" id="client-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-info ">
                                <div class="input-group m-b-30" data-toggle="dropdown" href="#" role="button">
                                    <span class="search-icon">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="sc-gkJlnC jyLyOo">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.891 13.477a6.002 6.002 0 0 0-9.134-7.72 6 6 0 0 0 7.72 9.134l5.715 5.716 1.415-1.415-5.716-5.715Zm-2.063-6.305a4 4 0 1 1-5.656 5.656 4 4 0 0 1 5.657-5.656Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <input placeholder="Tìm theo tên, SĐT, mã khách hàng ... (F4)" class="pl-5 form-control search-input" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Annual Leave -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="checkmail"></th>
                                            <th>Tên loại sản phẩm</th>
                                            <th class="text-center">Danh mục cha</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Hiển thị menu</th>
                                            <th class="text-center">Ngày khởi tạo</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sortedCategories as $category)
                                        @include('pages.Admin.Category.partials.category', ['category' => $category])
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