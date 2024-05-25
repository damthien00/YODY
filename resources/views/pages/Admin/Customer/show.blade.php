   <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
   @extends('layouts.AdminLayout')
   @section('content')
   <style>
       .select-btn {
           display: flex;
           height: 36px;
           align-items: center;
           justify-content: space-between;
           padding: 0 12px;
           border: 1px solid #d3d5d7;
           cursor: pointer;
           background-color: #fff;
       }

       .select-btn .btn-text {
           font-size: 14px;
           font-weight: 400;
           color: #333;
       }

       .select-btn .arrow-dwn {
           display: flex;
           align-items: center;
           justify-content: center;
           transition: 0.3s;
           margin-left: 12px;
       }

       .select-btn .arrow-dwn svg {
           color: #A3A8AF;
       }

       .select-btn.open .arrow-dwn {
           transform: rotate(-180deg);
       }

       .select-dropdown {
           position: absolute;
           z-index: 999;
           padding: 8px 4px;
           margin-top: 10px;
           box-shadow: 0px 3px 3px -2px rgba(0, 0, 0, 0.2), 0px 3px 4px 0px rgba(0, 0, 0, 0.14), 0px 1px 8px 0px rgba(0, 0, 0, 0.12);
           width: 350px;
           border-radius: 3px;
           background-color: #fff;
           display: none;
       }

       .select-btn.open~.select-dropdown {
           display: block;
       }

       .btn-text-value {
           font-size: 14px;
       }

       .list-items {
           padding-left: 0;
           max-height: 144px;
       }

       .list-items .item {
           display: flex;
           align-items: center;
           list-style: none;
           height: 36px;
           cursor: pointer;
           transition: 0.3s;
           padding: 0 15px;
           border-radius: 3px;
       }

       .item:hover {
           background-color: #D9EDFF;
       }

       .list-items .item label {
           margin-bottom: 0;
       }


       .item .item-text {
           font-size: 14px;
           font-weight: 400;
           color: #333;
       }

       .item input {
           display: flex;
           align-items: center;
           justify-content: center;
           height: 16px;
           width: 16px;
           border-radius: 4px;
           margin-right: 12px;
           border: 1.5px solid #c0c0c0;
           transition: all 0.3s ease-in-out;
       }

       .select-container {
           position: relative;
           max-width: 320px;
       }

       #select-all-option {
           border-bottom: 1px solid rgb(232, 234, 235);
       }

       .select-search {
           display: flex;
           position: relative;
           margin-bottom: 5px;
       }

       .select-search input {
           padding-right: 100px;
       }

       .select-search-label {
           display: flex;
           align-items: center;
           position: absolute;
           height: fit-content;
           right: 10px;
           top: 50%;
           padding: 2px 12px;
           border-radius: 20px;
           background-color: #D9EDFF;
           transform: translateY(-50%);
           bottom: 0;
       }

       .btn-date button {
           font-size: 14px;
       }

       .active {
           background-color: rgb(242, 249, 255);
           color: var(--primary-color);
           border: 1px solid var(--primary-color) !important;
       }

       .hidden {
           display: none;
       }

       .btn-date button {
           border: 1px solid #ccc;
       }
   </style>
   <div class="header">

       <!-- Header Title -->
       <div class="page-title-box">
           <h3>Danh sách khách hàng</h3>
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
               <div class="col">
               </div>
               <div class="col-auto float-right ml-auto">

               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12">
               <!-- Annual Leave -->
               <div class="card leave-box" id="client-info">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-9">
                               <div class="product-info">
                                   <div class="input-group m-b-30" data-toggle="dropdown" href="#" role="button">
                                       <input placeholder="Tìm theo tên, SĐT, mã khách hàng ... (F4)" class="form-control search-input" type="text">
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-3">
                               <div class="row">
                                   <div class="col-md-6">
                                       <button class="btn btn-primary-transparent w-100 d-flex align-items-center justify-content-center">
                                           <span class="pr-2">Bộ lọc</span>
                                           <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" font-size="20" style="font-size: 20px; color: rgb(163, 168, 175);">
                                               <path d="M20.052 3.667H4.5v1.296h15.552V3.667ZM4.811 5.74l5.988 6.066c.078.077.181.181.181.285v8.242l2.592-1.4v-6.842c0-.104.104-.208.182-.285L19.74 5.74H4.811Z" fill="currentColor"></path>
                                           </svg>
                                       </button>
                                   </div>
                                   <div class="col-md-6"><button class="btn btn-primary w-100">Lưu bộ lọc</button></div>
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
                                               <th>Mã</th>
                                               <th>Tên khách hàng</th>
                                               <th class="text-center">Số điện thoại</th>
                                               <th class="text-center">Địa chỉ</th>
                                               <th class="text-center">Tổng chi tiêu</th>
                                               <th class="text-center">Tổng số lượng đơn hàng</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach($customers as $customerData)
                                           <tr>
                                               <td><input type="checkbox" class="checkmail"></td>
                                               <td>
                                                   <a href="#">{{$customerData['customer']->id}}</a>
                                               </td>
                                               <td>{{$customerData['customer']->customer_name}}</td>
                                               <td class="text-center">{{$customerData['customer']->phone}}</td>
                                               <td class="text-center">
                                                   {{$customerData['customer']->province->name}}
                                               </td>
                                               <td class="text-center">
                                                   {{number_format($customerData['total_price'])}}đ
                                               </td>
                                               <td class="text-center">
                                                   {{$customerData['order_count']}}
                                               </td>
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
   </div>
   <script>
       document.addEventListener("DOMContentLoaded", function() {
           const selectContainers = document.querySelectorAll('.select-container');

           selectContainers.forEach(selectContainer => {
               const selectBtn = selectContainer.querySelector(".select-btn");
               const items = selectContainer.querySelectorAll(".item input[type='checkbox']");
               const allItemCheckbox = selectContainer.querySelector("#select-all-checkbox");
               const searchInput = selectContainer.querySelector(".search-input");
               const btnTextValue = selectContainer.querySelector(".btn-text-value");
               const btnCustom = selectContainer.querySelector("#btnCustom");
               const startDateInput = selectContainer.querySelector("#startDateInput");
               const endDateInput = selectContainer.querySelector("#endDateInput");

               // Chức năng mở/collapse dropdown
               selectBtn.addEventListener("click", () => {
                   selectBtn.classList.toggle("open");
               });

               // Chức năng chọn tất cả/bỏ chọn tất cả
               allItemCheckbox.addEventListener("change", () => {
                   const isChecked = allItemCheckbox.checked;
                   items.forEach(item => {
                       item.checked = isChecked;
                   });
                   updateSelectedItemCount();
               });

               // Chức năng chọn từng mục
               items.forEach(item => {
                   item.addEventListener("change", () => {
                       updateAllItemCheckbox();
                       updateSelectedItemCount();
                   });
               });

               // Chức năng tìm kiếm
               searchInput.addEventListener("input", () => {
                   const searchValue = searchInput.value.trim().toLowerCase();
                   items.forEach(item => {
                       const itemText = item.nextElementSibling.textContent.trim().toLowerCase();
                       const itemLi = item.parentElement.parentElement;
                       if (itemText.includes(searchValue)) {
                           itemLi.style.display = "block";
                       } else {
                           itemLi.style.display = "none";
                       }
                   });
                   updateSelectedItemCount();
               });

               // Chức năng tùy chỉnh ngày
               btnCustom.addEventListener("click", toggleCustomDate);

               // Hàm chuyển đổi trạng thái tùy chỉnh ngày
               function toggleCustomDate() {
                   startDateInput.disabled = !startDateInput.disabled;
                   endDateInput.disabled = !endDateInput.disabled;
               }

               // Hàm cập nhật trạng thái kiểm tra của ô "Chọn tất cả" dựa trên số lượng mục được chọn
               function updateAllItemCheckbox() {
                   const checkedItems = selectContainer.querySelectorAll(".item input[type='checkbox']:checked");
                   allItemCheckbox.checked = checkedItems.length === items.length;
               }

               // Hàm cập nhật số lượng mục được chọn và cập nhật hiển thị
               function updateSelectedItemCount() {
                   const checkedItems = selectContainer.querySelectorAll(".item input[type='checkbox']:checked");
                   if (allItemCheckbox.checked) {
                       btnTextValue.innerText = `Đã chọn tất cả`;
                   } else if (checkedItems.length > 0) {
                       btnTextValue.innerText = `Đã chọn ${checkedItems.length} mục`;
                   } else {
                       btnTextValue.innerText = "Chưa chọn mục nào";
                   }
               }
           });
       });
   </script>

   @endsection