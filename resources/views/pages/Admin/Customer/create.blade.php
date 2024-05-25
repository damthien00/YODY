<link rel="stylesheet" href="{{asset('assets/css/bootstrap-tagsinput.css')}}">
@extends('layouts.AdminLayout')
@section('content')
<style>

</style>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Danh sách khách hàng</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin chung</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên khách hàng
                            <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                    <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                </svg></span>
                        </label>
                        <input type="text" placeholder="Nhập tên khách hàng" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mã khách hàng
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <input type="text" placeholder="Nhập mã khách hàng" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhóm khách hàng</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Khu vực
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phường xã</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ cụ thể
                            <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                    <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                </svg></span>
                        </label>
                        <textarea placeholder="Nhập địa chỉ" class="form-control" style="height: 5.14286rem;"></textarea>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin bổ sung</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày sinh
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Giới tính</label>
                                <select class="select">
                                    <option>Nam</option>
                                    <option value="1">Nữ</option>
                                    <option selected value="2">Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số fax
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <input placeholder="Nhập số fax" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mã số thuế</label>
                                <input type="text" placeholder="Nhập mã số thuế" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Công nợ</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tổng chi tiêu
                            <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                    <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                </svg></span>
                        </label>
                        <textarea placeholder="Nhập địa chỉ" class="form-control" style="height: 5.14286rem;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin khác</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nhân viên phụ trách</label>
                        <div class="dropdown" data-control="single-option">
                            <label class="dropdown-label">Chọn loại sản phẩm</label>
                            <div class="dropdown-list">
                                <div class="form-group form-search">
                                    <span class="search-icon">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="search-icon" style="width: 20px; height: 20px;">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.891 13.477a6.002 6.002 0 0 0-9.134-7.72 6 6 0 0 0 7.72 9.134l5.715 5.716 1.415-1.415-5.716-5.715Zm-2.063-6.305a4 4 0 1 1-5.656 5.656 4 4 0 0 1 5.656-5.656Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="dropdown-search form-control" placeholder="Tìm kiếm...">
                                    <span class="quantity-select">
                                    </span>
                                </div>
                                <div class="dropdown-list-option">
                                    <label class="dropdown-option">
                                        Selection One
                                    </label>
                                    <label class="dropdown-option">
                                        Selection Two
                                    </label>
                                    <label class="dropdown-option">
                                        Selection Three
                                    </label>
                                    <label class="dropdown-option">
                                        Selection Four
                                    </label>
                                    <label class="dropdown-option">
                                        Selection Five
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả
                            <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                    <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                </svg></span>
                        </label>
                        <textarea placeholder="Nhập mô tả" class="form-control" style="height: 5.14286rem;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <input data-role="tagsinput" id="tags" placeholder="Gõ kí tự và nhấn Enter để thêm giá trị" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection