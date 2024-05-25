@extends('layouts.AdminLayout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
</style>
<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
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
        <ul class="nav user-menu ">
            <li class="nav-item d-flex align-items-center">
                <button type="submit" class="btn btn-primary-transparent" type="submit">Thoát</button>
            </li>
            <li class="nav-item d-flex align-items-center">
                <button type="submit" class="btn btn-primary " type="submit">Lưu</button>
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
        @csrf
        <div class="row">
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
                            <input type="text" placeholder="Nhập tên sản phẩm" name="product_name" id="product_name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea id="editor" name="summary" id="summary"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-0">Thuộc tính</h5>
                            <p>Thêm mới thuộc tính giúp sản phẩm có nhiều lựa chọn, như kích cỡ hay màu sắc</p>
                        </div>
                        <button type="button" class="btn btn-primary" id="getTags">
                            Tạo biến thể
                        </button>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-0">
                                    <label>Tên thuộc tính
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-0">
                                    <label>Giá trị
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input value="Kích cỡ" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control tags1" name="tags1[]" multiple="multiple">
                                        @foreach($sizes as $size)
                                        <option value="{{$size->id . '|' . $size->size_name}}">{{$size->size_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input value="Màu sắc" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="form-control tags" name="tags[]" multiple="multiple">
                                        @foreach($colors as $color)
                                        <option value="{{$color->id . '|' . $color->color_name}}">{{$color->color_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin bổ sung</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <div class="dropdown" data-control="single-option">
                                <input type="hidden" class="dropdown-input" id="category_id" name="category_id">
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
                                <input type="hidden" class="dropdown-input" id="brand_id" name="brand_id">
                                <label class="dropdown-label">Chọn nhãn hiệu</label>
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
                            <textarea data-role="tagsinput" id="tags3" class="form-control" placeholder="Enter message"></textarea>
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Phiên bản</h5>
                    </div>
                    <div class="card-body">
                        <div id="variantsTable" class="table-responsive">
                            Chưa có phiên bản nào
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('.tags').select2();
        $('.tags1').select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#getTags').click(function() {
            var tagsInputValue = $('.tags').val();
            var tagsInputValue2 = $('.tags1').val();
            console.log(tagsInputValue, tagsInputValue2);
            document.getElementById('variantsTable').innerHTML = generateTable(tagsInputValue, tagsInputValue2);
        });
    });
    // $(document).on('click', '.btnSetVersion', function() {
    //     const {
    //         color,
    //         size,
    //         id
    //     } = $(this).data();
    //     $('#upload-version').val(id);
    //     $('#upload-version-input').val(id);
    //     $('#size-color').text(`( Phiên bản: ${size} - ${color})`);
    // })


    function createSKU(productName, size, color) {
        var words = productName.split(" ");
        var abbreviatedProductName = "";
        for (var i = 0; i < words.length; i++) {
            abbreviatedProductName += words[i].charAt(0).toUpperCase();
        }
        var SKU = abbreviatedProductName.substr(0, 6) + "-" + size.toUpperCase().charAt(0) + color.toUpperCase().charAt(0);
        var SKU1 = SKU.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        return SKU1;
    }

    function generateTable(sizes, colors) {
        var productNameInput = document.getElementById("product_name").value;
        let head = `
                <table class="table table-hover table-white" style="width:140%;">
                    <thead>
                        <tr style="background-color:#F4F6F8;">
                            <th class="col-sm-2 fixed-column" style="position:sticky;left:0;background-color:#F4F6F8;">Tên phiên bản</th>
                            <th class="" style="border-left: 1px solid #E8EAEB; ">Mã SKU</th>
                            <th class="" style="border-left: 1px solid #E8EAEB; >Barcode</th>
                            <th class="" style="border-left: 1px solid #E8EAEB;" >Giá bản lẻ</th>
                            <th class="" style="border-left: 1px solid #E8EAEB;" >Giá bản buôn</th>
                            <th class="" style="border-left: 1px solid #E8EAEB;" >Giá nhập</th>
                            <th class="" style="border-left: 1px solid #E8EAEB;" >Khối lượng</th>
                            <th class="" style="border-left: 1px solid #E8EAEB;" >Tồn ban đầu</th>
                        </tr>
                    </thead>
                    <tbody>

                `;

        let body = ``;
        let variantCount = 0;
        colors.forEach((color, i) => {
            var parts = color.split('|');
            var colorId = parts[0];
            var colorName = parts[1];
            sizes.forEach((size, j) => {

                var parts = size.split('|');
                var sizeId = parts[0];
                var sizeName = parts[1];
                var skuAuto = createSKU(productNameInput, sizeName, colorName);
                variantCount++;
                body += `
                        <tr> 
                            <td style="position:sticky;left:0;background-color: #fff;">
                                <div class="d-flex align-items-center">
                                    <div id="version_image_${i}_${j}">
                                        <input type=file multiple name="variants[${variantCount}][image_variant][]"/>
                                        <input type="hidden" name="variants[${variantCount}][color_id]" class="form-control" value="${sizeId}">
                                        <input type="hidden" name="variants[${variantCount}][size_id]" class="form-control" value=${colorId}>
                                    </div>
                                    <p class="mb-0 ml-3" style="font-size:14px">${sizeName} - ${colorName}</p>
                                </div>
                            </td>
                            <td>
                                <input type="text" value="${skuAuto}" name="variants[${variantCount}][sku]" class="form-control" value = "4534534">
                            </td>
                            <td>
                                <input type="text" name="variants[${variantCount}][barcode]" class="form-control"  value = "4534534">
                            </td>
                            <td>
                                <input name="variants[${variantCount}][retail_price]" class="form-control" type="text" style="text-align: right;"  value = "200000">
                            </td>
                            <td>
                                <input name="variants[${variantCount}][wholesale_price]" class="form-control" type="text" style="text-align: right;"  value = "200000">
                            </td>
                            <td>
                                <input name="variants[${variantCount}][import_price]" class="form-control" type="text" style="text-align: right;"  value = "200000">
                            </td>
                            <td class="d-flex ">
                                <input name="variants[${variantCount}][weight]" class="form-control flex-grow-1" type="text" style="text-align: right;"  value = "200000">
                                <select name="variants[${variantCount}][weight_unit]" class="form-control" style="width:63px">
                                    <option selected value="g">g</option>
                                    <option value="kg">kg</option>
                                </select>
                            </td>
                            <td>
                                <input name="variants[${variantCount}][inventory_quantity]" class="form-control" type="text" style="text-align: right;"  value = "200000">
                            </td>
                        </tr>
                    `
            })
        })

        let tail = `
                    </tbody>
                </table>
                `;
        return head + body + tail;
    }
</script>

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
<style>
    .ck-editor__editable {
        height: 150px;
        /* Điều chỉnh độ cao tùy ý ở đây */
    }
</style>
@endsection