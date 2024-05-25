@extends('layouts.AdminLayout')
@section('content')
<style>
    .additional-info form {
        height: 200px;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .additional-info form::-webkit-scrollbar {
        width: 3px;
        /* Chiều rộng của scrollbar */
    }

    /* Thiết lập kiểu và màu của thanh cuộn */
    .additional-info form::-webkit-scrollbar-thumb {
        background: #888;
    }

    .additional-info form::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .client-info-item p {
        font-size: 14px;
    }

    .client-info-item h5 {
        margin-bottom: 0;
        font-size: 15px;
    }

    .client-icon {
        color: #4BA7F3;
        width: 32px;
        height: 32px;
        margin-right: 10px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
    }

    .btn-transport {
        position: relative;
        align-items: center;
    }

    .btn-transport svg {}

    .active {}
</style>
<div class="content container-fluid">

    <!-- Page Header -->
    <!-- <div class="page-header">
          <div class="row">
              <div class="col-sm-12">
                  <h3 class="page-title">Leave Settings</h3>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                      <li class="breadcrumb-item active">Leave Settings</li>
                  </ul>
              </div>
          </div>
      </div> -->
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-8">
            <!-- Annual Leave -->
            <div class="card leave-box" id="client-info">
                <div class="card-body">
                    <div class="h4">
                        Thông tin khách hàng
                    </div>
                    <div class="info-content ">
                        <div class="input-group m-b-30" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                            <input placeholder="Tìm theo tên, SĐT, mã khách hàng ... (F4)" class="form-control search-input" type="text">
                            <span class="input-group-append">
                                <button class="btn btn-primary">Search</button>
                            </span>
                        </div>
                        <div class="dropdown-menu" style="width:calc(100% - 40px);">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <svg class="client-icon" class="MuiSvgIcon-root icon" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                                </svg>
                                <div class="client-info-item">
                                    <p>Chị Cẩm Nhung</p>
                                    <h5>0934555389</h5>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/fr.png" alt="" height="16"> French
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/de.png" alt="" height="16"> German
                            </a>
                        </div>
                        <div class="empty-info d-flex flex-column" style="align-items: center">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="87" height="87" font-size="87" style="color: rgb(232, 234, 235); font-size: 87px;">
                                <path d="M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2ZM18 9h-4v2h4V9ZM18 13h-3v2h3v-2ZM9.715 12.75c2.039 0 3.715 1.876 3.715 3.25H6c0-1.374 1.676-3.25 3.715-3.25Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4Zm0 14-16-.011V6l16 .011V18Z" fill="currentColor"></path>
                            </svg>
                            <p>Chưa có thông tin khách hàng</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Annual Leave -->
        </div>
        <div class="col-md-4">
            <!-- Annual Leave -->
            <div class="card leave-box" id="leave_annual">
                <div class="card-body">
                    <div class="h4">
                        Thông tin bổ sung
                    </div>
                    <div class="additional-info">
                        <form action="#">
                            <div class="form-group row">
                                <label class="col-lg-4 d-flex align-items-center col-form-label">Bán tại</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Bán bởi</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Nguồn</label>
                                <div class="col-lg-8">
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Hẹn giao</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Mã đơn</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Đường dẫn đơn hàng</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Tham chiếu</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4  d-flex align-items-center  d-flex col-form-label">Thanh toán dự kiến</label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Annual Leave -->

    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Annual Leave -->
            <div class="card leave-box" id="leave_annual">
                <div class="card-body">
                    <div class="h4">
                        Thông tin sản phẩm
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="product-info">
                                    <div class="input-group m-b-30" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                                        <input placeholder="Tìm theo tên, SĐT, mã khách hàng ... (F4)" class="form-control search-input" type="text">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary">Chọn nhanh</button>
                                        </span>
                                    </div>
                                    <div class="dropdown-menu" style="width:calc(100% - 40px);">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <svg class="client-icon" class="MuiSvgIcon-root icon" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                                            </svg>
                                            <div class="client-info-item">
                                                <p>Chị Cẩm Nhung</p>
                                                <h5>0934555389</h5>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <img src="assets/img/flags/fr.png" alt="" height="16"> French
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <img src="assets/img/flags/de.png" alt="" height="16"> German
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Select Country</option>
                                                <option value="1">Quét mã Barcode</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="select">
                                                <option value="3">Giá bán lẻ</option>
                                                <option value="4">Giá bán buôn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Annual Leave -->
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-expandable custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">STT</th>
                                            <th class="col-sm-1">Ảnh</th>
                                            <th class="col-md-4">Tên sản phẩm</th>
                                            <th style="width:100px;">Số lượng</th>
                                            <th style="width:80px;">Đơn giá</th>
                                            <th style="width:80px;">Giảm(%)</th>
                                            <th style="width:80px;">Thành tiền</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <img src="https://bizweb.dktcdn.net/100/438/408/products/sqm5005-ghi-2-jpeg.jpg?v=1690163778277" alt="anh-sp" style="width:70px" />
                                            </td>
                                            <td>
                                                <p class="name-product">
                                                    Áo khoác cổ tim phong cách tripal SID50074 - Freesize
                                                </p>
                                                <div>Freesize</div>
                                                <div>PVN02</div>
                                            </td>
                                            <td>
                                                <input class="form-control" style="width:100px" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" style="width:80px" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" style="width:80px" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" readonly="" style="width:120px" type="text">
                                            </td>
                                            <td><a href="javascript:void(0)" class="text-danger font-18" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-white">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">Total</td>
                                            <td style="text-align: right; padding-right: 30px;width: 230px">0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right">Tax</td>
                                            <td style="text-align: right; padding-right: 30px;width: 230px">
                                                <input class="form-control text-right" value="0" readonly="" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right">
                                                Discount %
                                            </td>
                                            <td style="text-align: right; padding-right: 30px;width: 230px">
                                                <input class="form-control text-right" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: right; font-weight: bold">
                                                Grand Total
                                            </td>
                                            <td style="text-align: right; padding-right: 30px; font-weight: bold; font-size: 16px;width: 230px">
                                                $ 0.00
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Other Information</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="empty-info d-flex flex-column" style="align-items: center">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="102" height="102" style="color: rgb(232, 234, 235); height: 102px; width: 102px;">
                                <path d="M21.902 12.64 19.734 9.45l2.168-3.192a.588.588 0 0 0-.3-.882l-7.07-2.344a.58.58 0 0 0-.673.23L12 6.051l-1.855-2.786a.579.579 0 0 0-.672-.23l-7.07 2.344a.589.589 0 0 0-.3.883l2.163 3.187-2.168 3.191a.589.589 0 0 0 .3.883l7.07 2.344a.582.582 0 0 0 .673-.23l1.855-2.786 1.855 2.785a.586.586 0 0 0 .672.23l7.07-2.343a.582.582 0 0 0 .368-.367.562.562 0 0 0-.059-.516ZM12 11.175 6.82 9.45 12 7.722l5.18 1.727L12 11.175Z" fill="currentColor"></path>
                                <path d="M14.898 16.976a1.759 1.759 0 0 1-2.02-.691L12 14.96l-.883 1.325a1.755 1.755 0 0 1-2.023.69l-4.711-1.57v3.418c0 .254.16.477.402.555l7.027 2.344c.02.008.043.011.063.02a.669.669 0 0 0 .258-.005c.02-.003.039-.007.058-.015l7.027-2.344a.588.588 0 0 0 .403-.555v-3.421l-4.723 1.574Z" fill="currentColor"></path>
                            </svg>
                            <p>Chưa có thông tin sản phẩm</p>
                            <button class="btn btn-primary-transparent" href="#">Thêm sản phẩm</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Annual Leave -->
                    <div class="card leave-box" id="leave_annual">
                        <div class="card-body">
                            <div class="h4">
                                Đóng gói và giao hàng
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-transport btn-primary-transparent mr-2 active">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" font-size="24">
                                            <path d="M19 7c0-1.1-.9-2-2-2h-3v2h3v2.65L13.52 14H10V9H6c-2.21 0-4 1.79-4 4v3h2c0 1.66 1.34 3 3 3s3-1.34 3-3h4.48L19 10.35V7ZM7 17c-.55 0-1-.45-1-1h2c0 .55-.45 1-1 1Z" fill="currentColor"></path>
                                            <path d="M10 6H5v2h5V6ZM19 13c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3Zm0 4c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1Z" fill="currentColor"></path>
                                        </svg>
                                        <span>
                                            Đẩy qua hãng vận chuyển
                                        </span>
                                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" font-size="24" class="buttonCheckedIcon">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 23.591 21.965 1v15.532c0 3.899-2.933 7.06-6.551 7.06H1Z" fill="currentColor"></path>
                                            <path d="m13.135 19.035-1.85-1.868a.647.647 0 0 0-.923 0 .662.662 0 0 0 0 .93l2.544 2.569c.13.132.333.132.464 0l5.78-5.836a.662.662 0 0 0 0-.931.647.647 0 0 0-.921 0l-5.094 5.136Z" fill="#fff"></path>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-transport btn-primary-transparent mr-2">Đẩy vận chuyển ngoài</button>
                                    <button type="button" class="btn btn-transport btn-primary-transparent mr-2">Khách nhận tại cửa hàng</button>
                                    <button type="button" class="btn btn-transport btn-primary-transparent mr-2">Giao hàng sau</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Annual Leave -->
                </div>
            </div>
        </div>
    </div>
    @endsection