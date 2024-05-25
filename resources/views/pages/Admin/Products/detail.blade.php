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
        <div class="">
            <a style="color: #747C87;" class="d-flex align-items-center" href="/admin/products">
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
    <ul class="nav user-menu ">
        <li class="nav-item d-flex align-items-center">
            <form class="mb-0" method="POST" action="{{ route('product.destroy', ['product_id' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger-transparent">Xóa</button>
            </form>
        </li>
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <form class="mb-0" method="POST" action="{{ route('admin.products.variants.edit', ['product_id' => $product->id, 'variant_id' => $variantss->id]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
            </form>
            <!-- <a href="" title="Áo khoác Chino thời thượng SID56708">Sửa</a> -->
        </li>
        <!-- /Notifications -->

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
                <h5 class="page-title">{{ $product->product_name }}</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin chung</h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <ul class="personal-info">
                            <li>
                                <div class="title">Phân loại</div>
                                <div class="text">: ---</div>
                            </li>
                            <li>
                                <div class="title">Loại sản phẩm</div>
                                <div class="text">: {{ $product->category->category_name}}</div>
                            </li>
                            <li>
                                <div class="title">Nhãn hiệu </div>
                                <div class="text">: {{ $product->brand->brand_name}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="personal-info">
                            <li>
                                <div class="title">Tags</div>
                                <div class="text">: John Doe</div>
                            </li>
                            <li>
                                <div class="title">Ngày tạo</div>
                                <div class="text">: {{ $product->created_at}}</div>
                            </li>
                            <li>
                                <div class="title">Ngày cập nhật cuối </div>
                                <div class="text">: {{ $product->updated_at}}</div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin bổ sung</h5>
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <div class="table-responsive">
                            <table id="tableVersionEdit" class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th width="15px"><input type="checkbox" class="checkmail"></th>
                                        <th>Phiên bản</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->variants as $variant)
                                    <tr>
                                        <td><input type="checkbox" class="checkmail"></td>
                                        <td>
                                            <div class="product-version">
                                                <div class="product-version-image" style="margin-left: 0px;">
                                                    <a href="{{ route('admin.products.variants.detail', ['product_id' => $product->id, 'variant_id' => $variant->id]) }}">
                                                        @if($variant->variant_image_detail->isNotEmpty())
                                                        <img class="image-view" src="{{ asset($variant->variant_image_detail->first()->image) }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-version-info">
                                                    <h5 class="">
                                                        {{ $variant->size->size_name}}
                                                        <span>
                                                            <svg class="" focusable="false" viewBox="0 0 24 24" aria-hidden="true" style="width: 8px; height: 8px;">
                                                                <circle cx="12" cy="12" r="8"></circle>
                                                            </svg>
                                                            {{ $variant->color->color_name}}
                                                        </span>
                                                    </h5>
                                                    <div class="item-inventory">
                                                        <p class="  "> Tồn kho: {{ $variant->inventory_quantity}}</p>
                                                        <p class="  "> Có thể bán:{{ $variant->inventory_quantity}}</p>
                                                    </div>
                                                </div>
                                            </div>
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin chi tiết phiên bản</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class='row'>
                                <div class="col-md-6">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Tên phiên bản sản phẩm</div>
                                            <div class="text">: {{ $variantss->sku}} - {{ $variantss->size->size_name}} - {{ $variantss->color->color_name }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Mã SKU</div>
                                            <div class="text">: {{ $variantss->sku}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Mã barcode</div>
                                            <div class="text">: {{ $variantss->barcode}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Khối lượng</div>
                                            <div class="text">: {{ $variantss->weight}}{{ $variantss->weight_unit}}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Đơn vị tính</div>
                                            <div class="text">: {{ $product->unit}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Kích thước</div>
                                            <div class="text">: {{ $variantss->size->size_name}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Màu sắc</div>
                                            <div class="text">: {{ $variantss->color->color_name}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 flex-column">
                            <div class="d-flex">
                                @foreach($variantss->variant_image_detail as $item)
                                <img class='mr-2' width="90" height="90" style="border-radius: 4px;" src="{{ asset($item->image) }}" alt="" class="image-view">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Giá sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Giá bán lẻ</div>
                                    <div class="text">: {{ number_format($variantss->retail_price)}}đ</div>
                                </li>
                                <li>
                                    <div class="title">Giá nhập</div>
                                    <div class="text">: {{ number_format($variantss->import_price)}}đ</div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="personal-info">
                                <li>
                                    <div class="title">Giá bán buôn</div>
                                    <div class="text">: {{ number_format($variantss->wholesale_price)}}đ</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin thêm</h5>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Cho phép thêm</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#bottom-tab1" data-toggle="tab">Tồn kho</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Lịch sử kho</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="bottom-tab1">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th>Tồn kho</th>
                                            <th>Giá vốn</th>
                                            <th class="text-center">Có thể bán</th>
                                            <th class="text-center">Đang giao dịch</th>
                                            <th class="text-center">Hàng đang về</th>
                                            <th class="text-center">Hàng đang giao</th>
                                            <th class="text-center">Tồn tối thiểu</th>
                                            <th class="text-center">Tồn tối đa</th>
                                            <th class="text-center">Điểm lưu kho</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar"><img src="https://sapo.dktcdn.net/100/767/489/variants/1abe9da6-729b-4bc6-b0f3-df59da5fcfe2-1710288803707.jpg" alt=""></a>
                                                </h2>
                                            </td>
                                            <td><a href="{{route('admin/products/detail')}}" title="Áo khoác Chino thời thượng SID56708">Áo khoác Chino thời thượng SID56708</a></td>
                                            <td>Áo khoác</td>
                                            <td class="text-center">Yody</td>
                                            <td class="text-center">
                                                12/02/2023
                                            </td>
                                            <td class="text-center">
                                                <span class="d-block">98</span>
                                                <small>( 1 phiên bản )</small>
                                            </td>
                                            <td class="text-center">
                                                <span class="d-block">98</span>
                                                <small>( 1 phiên bản )</small>
                                            </td>
                                            <td class="text-center">
                                                13/3/2024
                                            </td>
                                            <td class="text-center">
                                                13/3/2024
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-tab2">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th>Ngày ghi nhận</th>
                                            <th>Nhân viên</th>
                                            <th class="text-center">Thao tác</th>
                                            <th class="text-center">Số lượng thay đổi</th>
                                            <th class="text-center">Tồn kho</th>
                                            <th class="text-center">Mã chứng từ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar"><img src="https://sapo.dktcdn.net/100/767/489/variants/1abe9da6-729b-4bc6-b0f3-df59da5fcfe2-1710288803707.jpg" alt=""></a>
                                                </h2>
                                            </td>
                                            <td><a href="{{route('admin/products/detail')}}" title="Áo khoác Chino thời thượng SID56708">Áo khoác Chino thời thượng SID56708</a></td>
                                            <td>Áo khoác</td>
                                            <td class="text-center">Yody</td>
                                            <td class="text-center">
                                                12/02/2023
                                            </td>
                                            <td class="text-center">
                                                <span class="d-block">98</span>
                                                <small>( 1 phiên bản )</small>
                                            </td>
                                        </tr>
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