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

<meta name="csrf-token" content="{{ csrf_token() }}">
<form method="post" action="{{ route('admin.products.variants.update', ['product_id' => $product->id, 'variant_id' => $variantss->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                <button type="submit" class="btn btn-danger-transparent">Hủy</button>
            </li>
            <!-- Notifications -->
            <li class="nav-item dropdown">
                <button type="submit" class="btn btn-primary">Lưu</button>
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

        <div class=" row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin chung</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên sản phẩm
                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                    </svg></span>
                            </label>
                            <input type="text" name="product_name" value='{{ $product->product_name }}' class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả </label>
                                    <textarea name="summary" id="editor">{{ $product->summary }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin bổ sung</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <div class="dropdown" data-control="single-option">
                                <input type="hidden" value='{{ $product->category_id }}' class="dropdown-input" id="category_id" name="category_id">
                                <label class="dropdown-label">
                                    @if(isset($product->category->category_name))
                                    {{ $product->category->category_name }}
                                    @else
                                    Chọn danh mục
                                    @endif
                                </label>
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
                                        @foreach ($categories as $category)
                                        <label class="dropdown-option" data-value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </label>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nhãn hiệu</label>
                            <div class="dropdown" data-control="checkbox-dropdown">
                                <input type="hidden" value='{{ $product->brand_id }}' class="dropdown-input" id="brand_id" name="brand_id">
                                <label class="dropdown-label">
                                    @if(isset($product->brand->brand_name))
                                    {{ $product->brand->brand_name }}
                                    @else
                                    Chọn nhãn hiệu
                                    @endif
                                </label>
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
                                        @foreach ($brands as $brand)
                                        <label class="dropdown-option" data-value="{{ $brand->id }}">
                                            {{ $brand->brand_name}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tags
                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                    </svg></span>
                            </label>
                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-title">Chi tiết phiên bản</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Thông tin bổ sung</h5>
                        <button type="button" class="btn add-btn" onclick="addVersionProduct()">
                            <svg style="color:#fff; display:block;fill: currentColor;" class="mr-1" width="20" height="20" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                            </svg>
                            <span style="font-weight: 500;">Thêm phiên bản</span>
                        </button>
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
                                                            <img class="image-view" src="{{ asset($variant->variant_image_detail[0]->image) }}">
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
                <div class="card">
                    <div class="card-body">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
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
                        <div class="form-group">
                            <label>Tên phiên bản sản phẩm
                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                    </svg></span>
                            </label>
                            <input type="text" value="version_title" class="form-control">
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mã sản phẩm/SKU
                                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                                    </svg></span>
                                            </label>
                                            <input type="text" name='sku' value='{{ $variantss->sku }}' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mã vạch/Barcode
                                            </label>
                                            <input type="text" name='barcode' value='{{ $variantss->barcode }}' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Khối lượng
                                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                                    </svg></span>
                                            </label>
                                            <div class="d-flex">
                                                <input type="text" value='{{ $variantss->weight }}' class="form-control">
                                                <select name="weight_unit" class="form-control" style="width:63px">
                                                    <option value="g" {{ $variantss->weight_unit == 'g' ? 'selected' : '' }}>g</option>
                                                    <option value="kg" {{ $variantss->weight_unit == 'kg' ? 'selected' : '' }}>kg</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Ảnh chi tiết
                                    <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                            <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                        </svg></span>
                                </label>
                                <div class="d-flex flex-column">
                                    <div class="upload-wrapper ">
                                        <div class="upload-area card mb-0 p-4 justify-content-center border-dashed shadow-none flex-row " style="border: 2px dashed #ededed">
                                            <svg width="21" height="21" class="" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"></path>
                                            </svg>
                                        </div>
                                        <div class="upload-img">
                                            @foreach($variantss->variant_image_detail as $item)
                                            <div class="uploaded-img">
                                                <img src="{{asset(asset($item->image))}}" alt="" />
                                                <button class="remove-btn" onclick="deleteVariantImageDetail('{{ $item->id }}')">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m289.94 256 95-95A24 24 0 0 0 351 127l-95 95-95-95a24 24 0 0 0-34 34l95 95-95 95a24 24 0 1 0 34 34l95-95 95 95a24 24 0 0 0 34-34z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <input type="file" multiple name='version_image_update[]' class="visually-hidden" style="width:0;" id="upload-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thuộc tính</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kích thước
                                        <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                            </svg></span>
                                    </label>
                                    <input type="text" name="size" value='{{ $variantss->size->size_name }}' class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Màu sắc
                                        <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                            </svg></span>
                                    </label>
                                    <input type="text" value='{{ $variantss->color->color_name }}' class="form-control">
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
                                <div class="form-group">
                                    <label>Giá bán lẻ
                                        <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                            </svg></span>
                                    </label>
                                    <input type="text" name="retail_price" value='{{ $variantss->retail_price }}' class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá bán buôn
                                        <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                            </svg></span>
                                    </label>
                                    <input type="text" name="wholesale_price" value='{{ $variantss->wholesale_price }}' class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá nhập
                                        <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                                <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                            </svg></span>
                                    </label>
                                    <input type="text" name="import_price" value='{{ $variantss->import_price }}' class="form-control">
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });
</script>
<form id='formAddVersion' action="{{route('admin.products.variant.create', ['product_id' => $product->id])}}" method="POST">
    @csrf
    @method('POST')
</form>
@endsection