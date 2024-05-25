<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard - HRMS admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/upload-preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-datetimepicker.min.css')}}">
    <script src="{{ asset('assets/admin/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

    <!-- <link rel="stylesheet" href="{{asset('assets/admin/css/virtual-select.min.css')}}" /> -->
    <!-- <link rel="stylesheet" href="{{asset('assets/admin/css/dataTables.bootstrap4.min.css')}}"> -->
    <style>
        /* Spinner styles */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .spinner {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="loading-overlay">
        <div class="spinner"></div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="sidebar" id="sidebar">
            <!-- Logo -->
            <div class="sidebar-logo d-flex align-items-center p-3">
                <a href="/admin" class="logo-link"><img class="logo--full" src="https://sapo.dktcdn.net/fe-cdn-production/images/logo_sapo_white.svg" width="130"></a>
                <button class="btn" id="toggle_btn" href="javascript:void(0);">
                    <svg class="bar-icon" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                    </svg>
                </button>
            </div>
            <!-- /Logo -->
            <div class="sidebar-inner">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="{{ set_active('admin/dashboard') }}">
                            <a href="{{ route('dashboard.index')}}">
                                <svg width="25" height="25" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.002 22a3 3 0 0 1-3-3v-6h-1c-.89 0-1.337-1.077-.707-1.707l9-9a1 1 0 0 1 1.414 0l9 9c.63.63.184 1.707-.707 1.707h-1v6a3 3 0 0 1-3 3h-10Zm5-17.586-6.648 6.65a1 1 0 0 1 .649.936v7a1 1 0 0 0 1 1h2v-4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4h2a1 1 0 0 0 1-1v-7a1 1 0 0 1 .649-.937l-6.65-6.649Zm1 11.586h-2v4h2v-4Z" fill="currentColor"></path>
                                </svg>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        <li class="submenu ">
                            <a href="#" class="noti-dot {{ set_active(['admin/orders/show', 'admin/orders/create', 'admin/orders/classify/create']) }}">
                                <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.38 11.715a1.258 1.258 0 0 0-.424-.454 4.807 4.807 0 0 0-.549-.291 6.72 6.72 0 0 0-.548-.223 1.37 1.37 0 0 1-.424-.228.417.417 0 0 1 .04-.7c.14-.09.338-.134.594-.134.233 0 .444.042.634.124.19.083.306.125.349.125a.307.307 0 0 0 .27-.156.56.56 0 0 0 .1-.301c0-.103-.048-.193-.146-.269A.959.959 0 0 0 8.9 9.04a3.918 3.918 0 0 0-.535-.087V8.26c0-.235-.207-.426-.463-.426s-.463.19-.463.426v.753c-.19.047-.37.119-.537.216-.17.1-.307.24-.409.418a1.23 1.23 0 0 0-.153.62c0 .21.041.396.124.56.083.163.193.294.328.392.135.098.285.187.449.265.163.079.326.15.487.213.162.063.31.128.445.196a.977.977 0 0 1 .328.255.54.54 0 0 1 .125.35.47.47 0 0 1-.228.425 1.048 1.048 0 0 1-.57.143 1.231 1.231 0 0 1-.773-.261 2.402 2.402 0 0 0-.227-.18.383.383 0 0 0-.21-.082c-.105 0-.199.052-.282.154a.485.485 0 0 0-.124.304c0 .2.16.386.484.556.218.115.466.19.743.228v.655c0 .235.207.425.463.425s.463-.19.463-.425v-.675c.28-.056.52-.162.72-.318.31-.242.466-.587.466-1.034 0-.266-.057-.498-.17-.697Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                    <path d="M18.134 3.19h-3.126A1.538 1.538 0 0 0 13.51 2h-2.99c-.728 0-1.34.509-1.496 1.19H5.977C4.887 3.19 4 4.073 4 5.161v14.865C4 21.115 4.887 22 5.977 22h12.157c1.09 0 1.976-.885 1.976-1.973V5.162a1.977 1.977 0 0 0-1.976-1.973Zm-7.976.343c0-.2.163-.362.363-.362h2.99c.2 0 .363.162.363.362v.717c0 .2-.163.363-.363.363h-2.99a.363.363 0 0 1-.363-.363v-.717Zm7.976 17.296H5.977a.804.804 0 0 1-.804-.802V5.162c0-.442.36-.802.804-.802H8.99a1.537 1.537 0 0 0 1.531 1.423h2.99c.81 0 1.475-.629 1.532-1.423h3.09c.444 0 .805.36.805.802v14.865c0 .442-.361.802-.804.802Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                    <path d="M17.14 8.436h-5.715a.586.586 0 1 0 0 1.173h5.715a.586.586 0 0 0 0-1.173ZM17.14 12.513h-5.715a.587.587 0 0 0 0 1.173h5.715a.586.586 0 0 0 0-1.173ZM17.14 16.571h-5.715a.587.587 0 0 0 0 1.173h5.715a.586.586 0 0 0 0-1.173ZM9.157 16.498H6.769a.586.586 0 0 0 0 1.173h2.388a.586.586 0 1 0 0-1.172Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                </svg>
                                </i> <span>Đơn hàng</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li> <a href="#">Tạo đơn và giao hàng
                                <li class="{{ set_active(['admin/orders/show']) }}"><a href="{{ route('order.index')}}">Danh sách đơn hàng</a></li>
                                <li><a href="#">Khách trả hàng<span class="badge badge-pill bg-primary float-right">1</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#" class="noti-dot"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.453 9.323a.605.605 0 0 0-.829 0l-2.617 2.503-1.006-.963a.605.605 0 0 0-.83 0 .544.544 0 0 0 0 .793l1.422 1.36c.114.109.264.164.414.164.15 0 .3-.055.415-.165l3.031-2.9a.544.544 0 0 0 0-.792Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                    <path d="M20.442 5H9.308c-.86 0-1.558.668-1.558 1.49v1.343H4.44C3.096 7.833 2 8.88 2 10.167v5.935c0 .725.617 1.315 1.375 1.315h1.157c.268 1.153 1.346 2.019 2.632 2.019s2.364-.866 2.632-2.02h4.402c.268 1.154 1.346 2.02 2.632 2.02 1.285 0 2.363-.866 2.632-2.02h.98c.86 0 1.558-.668 1.558-1.49V6.49C22 5.668 21.301 5 20.442 5ZM4.532 16.296H3.375a.199.199 0 0 1-.203-.194v-5.935c0-.67.569-1.214 1.269-1.214H7.75v5.386a2.81 2.81 0 0 0-.586-.062c-1.286 0-2.364.866-2.632 2.02Zm2.632 2.02c-.841 0-1.525-.655-1.525-1.46 0-.804.684-1.458 1.525-1.458.84 0 1.525.654 1.525 1.459 0 .804-.684 1.458-1.525 1.458Zm9.666 0c-.841 0-1.525-.655-1.525-1.46 0-.804.684-1.458 1.525-1.458.84 0 1.525.654 1.525 1.459 0 .804-.684 1.458-1.525 1.458Zm3.612-2.02h-.98c-.269-1.153-1.347-2.019-2.633-2.019-1.285 0-2.363.866-2.631 2.02H9.796a2.564 2.564 0 0 0-.874-1.394V6.49c0-.204.173-.37.386-.37h11.134c.213 0 .386.166.386.37v9.437c0 .204-.173.37-.386.37Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                </svg> <span>Vận chuyển<span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="employees.html">Tổng quan
                                <li><a href="holidays.html">Quản lí vận đơn</a></li>
                                <li><a href="leaves.html">Đối soát COD và phí<span class="badge badge-pill bg-primary float-right">1</span></a></li>
                                <li><a href="leaves.html">Kết nối đối tác<span class="badge badge-pill bg-primary float-right">1</span></a></li>
                                <li><a href="leaves.html">Cấu hình giao hàng<span class="badge badge-pill bg-primary float-right">1</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m21.24 6.62-8.832-4.474-.003-.002a1.38 1.38 0 0 0-1.25.012l-3.789 2.01a.59.59 0 0 0-.088.047l-4.54 2.41A1.373 1.373 0 0 0 2 7.841v8.316c0 .514.283.981.738 1.22l8.413 4.465.003.002a1.377 1.377 0 0 0 1.25.011l8.836-4.477c.47-.235.761-.706.761-1.231V7.852c0-.525-.291-.997-.76-1.231Zm-9.543-3.426a.205.205 0 0 1 .184-.002l8.267 4.189-3.217 1.602-8.083-4.277 2.85-1.512Zm-.5 17.347-7.911-4.2-.004-.001a.204.204 0 0 1-.11-.182V8.371l8.025 4.184v7.986Zm.592-8.998L3.808 7.38l3.79-2.012 8.042 4.256-3.851 1.918Zm9.04 4.605a.204.204 0 0 1-.113.183l-8.348 4.23v-7.998l3.844-1.914v2.007a.586.586 0 0 0 1.171 0v-2.59L20.83 8.35v7.798Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                </svg> <span>Sản phẩm</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ route('products.show')}}">Danh sách sản phẩm</a></li>
                                <li><a href="{{ route('type_category.index')}}">Danh mục sản phẩm</a></li>
                                <li><a href="tasks.html">Quản lí kho</a></li>
                                <li><a href="task-board.html">Đặt hàng nhập</a></li>
                                <li><a href="task-board.html">Nhập hàng</a></li>
                                <li><a href="task-board.html">Kiểm hàng</a></li>
                                <li><a href="task-board.html">Chuyển hàng</a></li>
                                <li><a href="task-board.html">Nhà cung cấp</a></li>
                                <li><a href="task-board.html">Điều chỉnh giá vốn</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5Zm0 8c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3Zm9 11v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1h2Z" fill="currentColor"></path>
                                </svg> <span>Khách hàng</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href=" {{ route('customer.show')}}">Danh sách khách hàng</a></li>
                                <li><a href="invoices.html">Nhóm khách hàng</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('blog.index')}}"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m10.806 11.113-1.799-.274-.804-1.707a.223.223 0 0 0-.407 0l-.803 1.707-1.8.274a.223.223 0 0 0-.129.069.244.244 0 0 0 .005.336l1.3 1.329-.307 1.876a.247.247 0 0 0 .014.13.236.236 0 0 0 .077.102.22.22 0 0 0 .238.018L8 14.087l1.609.886a.216.216 0 0 0 .144.023.236.236 0 0 0 .185-.273l-.308-1.877 1.301-1.328a.24.24 0 0 0 .066-.136.235.235 0 0 0-.19-.27Z" stroke="currentColor" stroke-width="1.5"></path>
                                    <rect x="1.875" y="5.875" width="20.25" height="13.25" rx="2.125" stroke="currentColor" stroke-width="1.75"></rect>
                                    <path d="M14 11h5M14 14h3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg> <span>Blog</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12.217c0 1.074.896 1.945 2 1.945a.66.66 0 0 1 .667.648.66.66 0 0 1-.667.649.673.673 0 0 1-.579-.326.678.678 0 0 0-.91-.237.64.64 0 0 0-.243.885c.24.405.624.706 1.065.86v.71c0 .358.3.649.667.649a.66.66 0 0 0 .667-.648v-.707c.776-.267 1.333-.988 1.333-1.835 0-1.073-.896-1.944-2-1.944a.66.66 0 0 1-.667-.649c0-.357.3-.648.667-.648.236 0 .459.123.579.326a.678.678 0 0 0 .91.237.64.64 0 0 0 .243-.885 2.007 2.007 0 0 0-1.065-.861v-.738A.66.66 0 0 0 12 9a.66.66 0 0 0-.667.648v.734c-.776.268-1.333.988-1.333 1.835Z" fill="currentColor" stroke="currentColor" stroke-width="0.5"></path>
                                    <path d="M19.788 5.69V2.91a.91.91 0 0 0-.91-.91H6.732C5.226 2 3.5 3.223 3.5 4.727v14.546C3.5 20.777 5.226 22 6.733 22h12.752c.503 0 1.015-.407 1.015-.91V6.546c0-.395-.358-.73-.712-.856ZM6.733 4h11.233v1.5H6.733c-.503 0-.911-.271-.911-.773 0-.501.408-.727.91-.727ZM18.5 20H6.733a.911.911 0 0 1-.911-.91V7.345c.285.1.591.156.91.156H18.5V20Z" fill="currentColor"></path>
                                </svg> <span>Sổ quỹ</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="expense-reports.html">Phiếu thu</a></li>
                                <li><a href="invoice-reports.html">Phiếu chi</a></li>
                                <li><a href="payments-reports.html">Sổ quỹ</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 3v17a1 1 0 0 0 1 1h17v-2H5V3H3Z" fill="currentColor"></path>
                                    <path d="M14.77 14.098a.985.985 0 0 0 1.374 0L21 9.344 19.627 8l-4.17 4.082-2.227-2.18a.985.985 0 0 0-1.374 0L7 14.656 8.373 16l4.17-4.082 2.227 2.18Z" fill="currentColor"></path>
                                </svg> <span>Báo cáo</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="performance-indicator.html"> Báo cáo bán hàng </a></li>
                                <li><a href="performance.html">Báo cáo nhập hàng</a></li>
                                <li><a href="performance-appraisal.html">Báo cáo kho</a></li>
                                <li><a href="performance-appraisal.html">Báo cáo tài chính</a></li>
                                <li><a href="performance-appraisal.html">Báo cáo khách hàng</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 6h2v3h3v2h-3v3h-2v-3h-3V9h3V6Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2h12c1.103 0 2 .897 2 2v12c0 1.103-.897 2-2 2H8c-1.103 0-2-.897-2-2V4c0-1.103.897-2 2-2Zm0 2v12h12.002L20 4H8Z" fill="currentColor"></path>
                                    <path d="M2 8h2v12h12v2H4c-1.103 0-2-.897-2-2V8Z" fill="currentColor"></path>
                                </svg> <span>Ứng dụng</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Khuyến mại</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Quản lí khuyến mại</span></a></li>
                                        <li><a href="javascript:void(0);"> <span>Quản lí mã giảm giá</span></a></li>
                                        <li><a href="javascript:void(0);"> <span>Cấu hình</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="goal-type.html">Tất cả ứng dụng</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Zm-2 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="m2.43 8.576 1.82-3.152a1 1 0 0 1 1.17-.453l1.836.585a7.971 7.971 0 0 1 1.535-.886l.412-1.884A1 1 0 0 1 10.18 2h3.64a1 1 0 0 1 .977.786l.412 1.884a7.973 7.973 0 0 1 1.535.886l1.837-.585a1 1 0 0 1 1.17.453l1.82 3.152a1 1 0 0 1-.193 1.24l-1.425 1.298a7.981 7.981 0 0 1 0 1.772l1.425 1.299a1 1 0 0 1 .192 1.239l-1.82 3.152a1 1 0 0 1-1.17.453l-1.836-.585a7.967 7.967 0 0 1-1.535.886l-.412 1.884a1 1 0 0 1-.977.786h-3.64a1 1 0 0 1-.977-.786l-.412-1.884a7.967 7.967 0 0 1-1.535-.886l-1.837.585a1 1 0 0 1-1.17-.453l-1.82-3.152a1 1 0 0 1 .193-1.24l1.425-1.298a7.973 7.973 0 0 1 0-1.772L2.622 9.815a1 1 0 0 1-.192-1.239ZM13.015 4l.458 2.092.933.41c.211.092.416.196.614.312l.003.002c.184.107.363.224.536.351l.82.604 2.042-.65 1.015 1.758-1.583 1.443.112 1.012c.024.221.037.442.036.663v.004c0 .222-.012.443-.036.665l-.112 1.012 1.583 1.443-1.015 1.758-2.041-.65-.821.604a5.99 5.99 0 0 1-.543.355l-.003.002a5.97 5.97 0 0 1-.607.309l-.933.409L13.015 20h-2.03l-.458-2.092-.933-.41a5.991 5.991 0 0 1-.573-.288l-.003-.002a5.975 5.975 0 0 1-.577-.375l-.82-.604-2.042.65-1.015-1.758 1.583-1.443-.112-1.012a5.973 5.973 0 0 1-.036-.664v-.004c0-.221.011-.443.036-.664l.112-1.012-1.583-1.443L5.58 7.121l2.041.65.821-.604a5.97 5.97 0 0 1 .57-.371l.004-.002a5.97 5.97 0 0 1 .58-.293l.932-.409L10.985 4h2.03Z" fill="currentColor"></path>
                                </svg><span>Cấu hình</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            @yield('content')
            <!-- Page Content -->

            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- jQuery -->

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/admin/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-table-expandable.js')}}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{asset('assets/admin/js/moment.min.js') }}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/admin/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function addVersionProduct() {
            $('#formAddVersion').submit()
        }
    </script>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Định nghĩa constructor cho Dropdown Checkbox
            function CheckboxDropdown(el) {
                var _this = this;
                this.isOpen = false;
                this.el = el;
                this.isSingleOption = this.el.dataset.control === "single-option";
                this.label = this.el.querySelector(".dropdown-label");
                this.quantitySelect = this.el.querySelector(".quantity-select");
                this.checkAll = this.el.querySelector('[data-toggle="check-all"]');
                this.inputs = this.el.querySelectorAll('[type="checkbox"]');
                this.onCheckBox();

                this.label.addEventListener("click", function(e) {
                    e.preventDefault();
                    _this.toggleOpen();
                });

                this.checkAll.addEventListener("click", function(e) {
                    e.preventDefault();
                    _this.onCheckAll();
                });

                this.inputs.forEach(function(input) {
                    input.addEventListener("change", function(e) {
                        _this.onCheckBox();
                    });
                });

                if (this.isSingleOption) {
                    this.inputs.forEach(function(input) {
                        input.addEventListener("change", function(e) {
                            _this.selectSingleOption(input);
                        });
                    });
                }
            }


            CheckboxDropdown.prototype.onCheckBox = function() {
                this.updateStatus();
            };

            CheckboxDropdown.prototype.updateStatus = function() {
                var checked = this.el.querySelectorAll(":checked");

                if (!this.isSingleOption) {
                    this.checkAll.innerHTML = "Chọn tất cả";

                    if (checked.length <= 0) {
                        this.quantitySelect.innerHTML = "";
                    } else if (checked.length === 1) {
                        this.quantitySelect.innerHTML = checked[0].parentElement.textContent;
                    } else if (checked.length === this.inputs.length) {
                        this.quantitySelect.innerHTML = "All Selected";
                        this.checkAll.innerHTML = "Hủy chọn tất cả";
                    } else {
                        this.quantitySelect.innerHTML = checked.length + " Selected";
                    }
                } else {
                    var _this = this;
                    this.el.querySelectorAll(".dropdown-option").forEach(function(option) {
                        option.addEventListener("click", function() {
                            var selectedOption = option.textContent.trim();
                            var selectedValue = option.dataset.value;
                            _this.label.textContent = selectedOption;
                            _this.el.querySelector(".dropdown-input").value = selectedValue;
                            var dropdownInstance = _this.el.dataset.dropdownInstance;
                            if (dropdownInstance && _this.isOpen) {
                                _this.closeDropdown();
                            }
                        });
                    });
                }
            };

            CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
                if (!this.isSingleOption) {
                    var _this = this;
                    if (!this.areAllChecked || checkAll) {
                        this.areAllChecked = true;
                        this.checkAll.innerHTML = "Uncheck All";
                        this.inputs.forEach(function(input) {
                            input.checked = true;
                        });
                    } else {
                        this.areAllChecked = false;
                        this.checkAll.innerHTML = "Chọn tất cả";
                        this.inputs.forEach(function(input) {
                            input.checked = false;
                        });
                    }
                    this.updateStatus();
                }
            };

            CheckboxDropdown.prototype.closeDropdown = function() {
                this.isOpen = false;
                this.el.classList.remove("on");
                document.removeEventListener("click", this.toggleOpen);
            };

            CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
                var _this = this;

                if (!this.isOpen || forceOpen) {
                    document.querySelectorAll('[data-control="checkbox-dropdown"]').forEach(function(element) {
                        if (element !== _this.el) {
                            var dropdownInstance = element.dataset.dropdownInstance;
                            if (dropdownInstance && _this.isOpen) {
                                _this.toggleOpen();
                            }
                        }
                    });

                    this.isOpen = true;
                    this.el.classList.add("on");
                    document.addEventListener("click", function(e) {
                        if (!e.target.closest("[data-control]")) {
                            _this.toggleOpen();
                        }
                    });
                } else {
                    this.isOpen = false;
                    this.el.classList.remove("on");
                    document.removeEventListener("click", this.toggleOpen);
                }
            };

            CheckboxDropdown.prototype.selectSingleOption = function(selectedOption) {
                this.inputs.forEach(function(input) {
                    input.checked = false;
                });
                selectedOption.checked = true;

                this.updateStatus();
                this.toggleOpen(false);
            };

            // Khởi tạo CheckboxDropdown cho mỗi dropdown
            document.querySelectorAll('[data-control="checkbox-dropdown"], [data-control="single-option"]').forEach(function(el) {
                console.log(1)
                var dropdownInstance = new CheckboxDropdown(el);
                el.dataset.dropdownInstance = dropdownInstance;
            });
        });
    </script> -->



    <!-- Fillter-date -->
    <!-- <script>
        $(document).ready(function() {
            // Xử lý khi click vào một nút ngày
            $(".btnCustom").click(function() {
                var isCustomSelected = $(this).hasClass("btnCustom");
                if (isCustomSelected) {
                    var startDateInputEnabled = $(".startDateInput").prop("disabled");
                    var endDateInputEnabled = $(".endDateInput").prop("disabled");

                    if (!startDateInputEnabled && !endDateInputEnabled) {
                        var startDate = $(".startDateInput").val();
                        var endDate = $(".endDateInput").val();
                        if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
                            alert("Ngày bắt đầu phải nhỏ hơn ngày kết thúc!");
                            return;
                        }
                        $(".startDateInput").prop("disabled", true);
                        $(".endDateInput").prop("disabled", true);
                    } else {
                        $(".startDateInput").prop("disabled", false);
                        $(".endDateInput").prop("disabled", false);
                    }
                }
            });
        });
    </script> -->

    <script type="text/javascript" src="{{ asset('assets/admin/js/dropdown.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/upload-preview.js') }}"></script>
    <!-- Model edit category
    <script>
        $(document).on('show.bs.modal', '#edit_category', function(event) {
            var button = $(event.relatedTarget);
            var categoryId = button.data('category-id');
            var categoryName = button.data('category-name');
            var parentCategoryId = button.data('parent-category-id');
            var showMenu = button.data('show-menu');
            var status = button.data('status');
            var modal = $(this);
            modal.find('#editCategoryName').val(categoryName);
            modal.find('#editParentCategory').val(parentCategoryId);
            modal.find('#editShowMenu').val(showMenu);
            modal.find('#editStatus').val(status);
            modal.find('#editCategoryID').val(categoryId);
        });

        // Xử lý sự kiện submit form sửa danh mục
        $('#editCategoryForm').on('submit', function(event) {
            var categoryId = $('#editCategoryID').val();
            $.ajax({
                type: 'GET',
                url: "/category/edit/" + categoryId,
                success: function(response) {
                    alert("Sửa thành công" + categoryId)
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi xảy ra
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    Model delete category -->
    <!-- <script>
        $(document).on('show.bs.modal', '#delete_category', function(event) {
            var button = $(event.relatedTarget);
            var categoryId = button.data('category-id');
            var categoryName = button.data('category-name');
            var modal = $(this);
            modal.find('#deleteCategoryID').val(categoryId);
            modal.find('#name_delete').text(categoryName);
        });

        // Xử lý sự kiện submit form sửa danh mục
        $('#deleteCategoryForm').on('submit', function(event) {
            var categoryId = $('#deleteCategoryID').val();
            $.ajax({
                type: 'DELETE',
                url: "/category/delete/" + categoryId,
                success: function(response) {
                    alert("Sửa thành công" + categoryId)
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi xảy ra
                    console.error(xhr.responseText);
                }
            });
        });
    </script> -->

    <!-- Model edit brand -->
    <script>
        $(document).on('show.bs.modal', '#edit_brand', function(event) {
            var button = $(event.relatedTarget);
            var brandId = button.data('brand-id');
            var brandName = button.data('brand-name');
            var modal = $(this);
            modal.find('#editBrandName').val(brandName);
            modal.find('#editBrandID').val(brandId);
        });

        // Xử lý sự kiện submit form sửa danh mục
        $('#editBrandForm').on('submit', function(event) {
            var brnadId = $('#editBrandID').val();
            $.ajax({
                type: 'GET',
                url: "/brand/edit/" + brandId,
                success: function(response) {
                    alert("Sửa thành công" + brandId)
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi xảy ra
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    <!-- Model delete brand -->
    <script>
        $(document).on('show.bs.modal', '#delete_brand', function(event) {
            var button = $(event.relatedTarget);
            var brandId = button.data('brand-id');
            var brandName = button.data('brand-name');
            var modal = $(this);
            modal.find('#deleteBrandID').val(brandId);
            modal.find('#name_delete').text(brandName);
        });
        // Xử lý sự kiện submit form sửa danh mục
        $('#deleteBrandForm').on('submit', function(event) {
            var brandId = $('#deleteBrandID').val();
            $.ajax({
                type: 'DELETE',
                url: "/brand/delete/" + brandId,
                success: function(response) {
                    alert("Sửa thành công" + brandId)
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi xảy ra
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    <!-- Even keypress -->
    <script>
        document.addEventListener("keypress", function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            // Sự kiện click cho phần tử upload-area
            $(document).on("click", ".upload-area", function() {
                // Tìm input tương ứng và kích hoạt sự kiện click trên nó
                $(this).siblings("input[type='file']").trigger("click");
            });

            // Sự kiện change cho input file
            $(document).on("change", "input[type='file']", function(event) {
                if (event.target.files) {
                    let filesAmount = event.target.files.length;
                    let $uploadImg = $(this).siblings(".upload-img");
                    let $uploadInfoValue = $(this).siblings(".upload-info-value");

                    // Xóa nội dung cũ
                    $uploadImg.html("");

                    for (let i = 0; i < filesAmount; i++) {
                        let reader = new FileReader();
                        reader.onload = function(event) {
                            let html = `
                        <div class="uploaded-img">
                            <img src="${event.target.result}">
                            <button type="button" class="remove-btn">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m289.94 256 95-95A24 24 0 0 0 351 127l-95 95-95-95a24 24 0 0 0-34 34l95 95-95 95a24 24 0 1 0 34 34l95-95 95 95a24 24 0 0 0 34-34z"></path></svg>
                            </button>
                        </div>
                    `;
                            $uploadImg.append(html);
                        };
                        reader.readAsDataURL(event.target.files[i]);
                    }

                    $uploadInfoValue.text(filesAmount);
                    $uploadImg.css("padding", "20px");
                }
            });
            $(document).on("click", ".uploaded-img", function() {
                $(".uploaded-img").removeClass("active");
                $(this).addClass("active");
            });

            $(document).on("click", ".btn-save-image", function() {
                let activeImgSrc = $(".uploaded-img.active img").attr("src");
                const image_id = $("#upload-version").val();
                const image_input_id = $("#upload-version-input").val();
                $(`#${image_id} svg`).css("display", "none");
                let imgElement = $("<img>").attr("src", activeImgSrc);

                $(`#${image_id}`).append(imgElement);
                $(`#${image_input_id}`).val(activeImgSrc);
                console.log($(`#${image_input_id}`).val());
            });

            // Sự kiện click cho nút xóa
            $(document).on("click", ".remove-btn", function() {
                $(this).parent().remove();
            });
        });
    </script> -->

    <!-- Delete Image -->
    <script>
        function deleteProductDetailImage(productDetailImageId) {
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: '/productdetailimage/delete/' + productDetailImageId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        // Xử lý phản hồi sau khi xóa thành công, nếu cần
                        // Ví dụ: cập nhật giao diện người dùng
                        location.reload(); // hoặc làm bất kỳ điều gì khác tùy theo yêu cầu của bạn
                    },
                    error: function(error) {
                        console.log(error);
                        // Xử lý lỗi, nếu có
                    }
                });
            }
        }
    </script>
    <!-- Delete Variant Image -->
    <script>
        function deleteVariantImageDetail(variantImageDetailId) {
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: '/variantimagedetail/delete/' + variantImageDetailId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        // Xử lý phản hồi sau khi xóa thành công, nếu cần
                        // Ví dụ: cập nhật giao diện người dùng
                        location.reload(); // hoặc làm bất kỳ điều gì khác tùy theo yêu cầu của bạn
                    },
                    error: function(error) {
                        console.log(error);
                        // Xử lý lỗi, nếu có
                    }
                });
            }
        }
    </script>
    <!-- Function Filter Product -->
    <script>
        function applyFilters() {
            var form = document.getElementById('filter-form');
            var categoryIds = collectCheckboxValues(form, 'category_ids[]');
            var brandIds = collectCheckboxValues(form, 'brand_ids[]');
            var dateInput = document.getElementById('date-input');
            var startDateInput = document.querySelector('.startDateInput');
            var endDateInput = document.querySelector('.endDateInput');

            var encodedCategoryIds = categoryIds.join('%2C');
            var encodedBrandIds = brandIds.join('%2C');
            var url = "{{ route('products.show') }}?category_ids=" + encodedCategoryIds;
            if (encodedBrandIds) {
                url += "&brand_ids=" + encodedBrandIds;
            }
            if (startDateInput && endDateInput) {
                console.log
                url += "&created_on_min=" + startDateInput.value + "&created_on_max=" + endDateInput.value;
            }
            window.location.href = url;
        }

        // Hàm để thu thập các giá trị của checkbox
        function collectCheckboxValues(form, checkboxName) {
            var checkboxValues = [];
            var checkboxes = form.querySelectorAll('input[name="' + checkboxName + '"]:checked');
            checkboxes.forEach(function(checkbox) {
                checkboxValues.push(checkbox.value);
            });
            return checkboxValues;
        }

        function applyFiltersDash() {
            var form = document.getElementById('form-filter-dash');
            var startDateInput = document.querySelector('.startDateInputDash');
            var endDateInput = document.querySelector('.endDateInputDash');

            var url = "{{ route('dashboard.index') }}";
            if (startDateInput && endDateInput) {
                url += "?created_on_min=" + startDateInput.value + "&created_on_max=" + endDateInput.value;
            }
            window.location.href = url;
        }
    </script>

</body>

</html>