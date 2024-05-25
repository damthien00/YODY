<!-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap-tagsinput.css')}}"> -->

@extends('layouts.AdminLayout')
@section('content')
<style>
    .uploader label {
        float: left;
        clear: both;
        width: 100%;
        padding: 2rem 1.5rem;
        text-align: center;
        background: #fff;
        border-radius: 7px;
        border: 3px solid #eee;
        transition: all .2s ease;
        user-select: none;
    }

    .uploader label:hover {
        border-color: #454cad;
    }

    .uploader label.hover {
        border: 3px solid #454cad;
        box-shadow: inset 0 0 0 6px #eee;
    }

    .uploader label.hover #start i.fa {
        transform: scale(0.8);
        opacity: 0.3;
    }

    #start {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    #start.hidden {
        display: none;
    }

    #start i.fa {
        font-size: 50px;
        margin-bottom: 1rem;
        transition: all .2s ease-in-out;
        color: #ccc;
    }

    #response {
        float: left;
        clear: both;
        width: 100%;
    }

    #response.hidden {
        display: none;
    }

    #messages {
        margin-bottom: .5rem;
    }

    #file-image {
        display: inline;
        margin: 0 auto .5rem auto;
        width: 100%;
        height: auto;
    }

    #file-drag {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #fafbfc;
        padding: 40px 20px;
    }

    #notimage {
        display: block;
        float: left;
        clear: both;
        width: 100%;
    }

    #notimage.hidden {
        display: none;
    }

    progress,
    .progress {
        display: inline;
        clear: both;
        margin: 0 auto;
        width: 100%;
        max-width: 180px;
        height: 8px;
        border: 0;
        border-radius: 4px;
        background-color: #eee;
        overflow: hidden;
    }

    .progress[value]::-webkit-progress-bar {
        border-radius: 4px;
        background-color: #eee;
    }

    .progress[value]::-webkit-progress-value {
        background: linear-gradient(to right, #3d429a 0%, #454cad 50%);
        border-radius: 4px;
    }

    .progress[value]::-moz-progress-bar {
        background: linear-gradient(to right, #3d429a 0%, #454cad 50%);
        border-radius: 4px;
    }

    input[type="file"] {
        display: none;
    }

    .uploader div {
        margin: 0 0 .5rem 0;
        color: #5f6982;
    }

    .btn-upload {
        display: inline-block;
        margin: .5rem .5rem 1rem .5rem;
        clear: both;
        font-family: inherit;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        text-transform: initial;
        border: none;
        border-radius: .2rem;
        outline: none;
        padding: 0 1rem;
        height: 36px;
        line-height: 36px;
        color: #fff;
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
        background: #454cad;
        border-color: #454cad;
        cursor: pointer;
    }

    .product-list {
        height: 400px;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    /* Đặt kiểu cho thanh cuộn WebKit */
    .product-list::-webkit-scrollbar {
        width: 4px;
        /* Độ rộng của thanh cuộn */
    }

    .product-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Màu nền của thanh cuộn */
        border-radius: 10px;
    }

    .product-list::-webkit-scrollbar-thumb {
        background: #888;
        /* Màu của thanh cuộn */
        border-radius: 10px;
    }

    .product-list::-webkit-scrollbar-thumb:hover {
        background: #555;
        /* Màu của thanh cuộn khi hover */
    }
</style>
<form method="post" action="{{route('type_category.update',['id'=>$type_category->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="header">
        <!-- Header Title -->
        <div class="page-title-box">
            <div class="">
                <a style="color: #747C87;" class="d-flex align-items-center" href="{{route('products.show')}}">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="width: 24px; height: 24px; margin-left: -9px; margin-right: 6px;">
                        <path d="M14.298 5.99 8.288 12l6.01 6.01 1.414-1.414L11.116 12l4.596-4.596-1.414-1.414Z" fill="currentColor"></path>
                    </svg>
                    <h5 class="mb-0">Quay lại danh sách danh mục</h5>
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
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin danh mục</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên danh mục
                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                    </svg></span>
                            </label>
                            <input type="text" value="{{$type_category->name}}" placeholder="Nhập tên sản phẩm" name="name" id="name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea id="editorBlogDescription" name="description" id="summary">{{$type_category->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Danh sách sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-info ">
                                    <div class="input-group m-b-30">
                                        <span class="search-icon">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="sc-gkJlnC jyLyOo">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.891 13.477a6.002 6.002 0 0 0-9.134-7.72 6 6 0 0 0 7.72 9.134l5.715 5.716 1.415-1.415-5.716-5.715Zm-2.063-6.305a4 4 0 1 1-5.656 5.656 4 4 0 0 1 5.657-5.656Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input placeholder="Tìm theo tên, SĐT, mã khách hàng ... (F4)" class="pl-5 form-control search-input" type="text">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Chọn sản phẩm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-12">
                                <div class="d-flex  align-items-center justify-content-between pt-2 pb-2" style="border-bottom: 1px solid #e7e8ea;">
                                    <div class="d-flex align-items-center">
                                        <div class=" pl-3 pr-3 mr-3">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img width="60" height="60" class="mr-3" style="border-radius:5px; border:1px solid #ccc;padding: 3px;" src="{{ asset($product->variants()->first()->variant_image_detail()->first()->image) }}" alt="" />
                                            <a href="#">
                                                {{ $product->product_name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" class="type_category_id" value="{{ $type_category->id }}" />
                                        <input type="hidden" class="product_id" value="{{ $product->id }}" />
                                        <span id="btnDeleteProduct">
                                            <svg style="font-size:20px;" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M405 136.798L375.202 107 256 226.202 136.798 107 107 136.798 226.202 256 107 375.202 136.798 405 256 285.798 375.202 405 405 375.202 285.798 256z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ảnh danh mục</h5>
                    </div>
                    <div class="card-body">
                        <form id="file-upload-form" class="uploader">
                            <input id="file-upload" type="file" name="image" accept="image/*" />
                            <label for="file-upload" id="file-drag">
                                <img id="file-image" src="{{asset($type_category->image)}}" alt="Preview" class="hidden">
                                <div id="start">
                                    <span id="file-upload-btn" class="btn btn-primary">Upload ảnh</span>
                                </div>
                                <div id="response" class="hidden">
                                    <div id="messages">

                                    </div>
                                </div>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Chọn sản phẩm</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-info ">
                            <div class="input-group m-b-30">
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
                <input type="hidden" id="type_category_id" name="type_category_id" value="{{$type_category->id}}" />
                <div class="product-list">
                    <div class="row">
                        @foreach($list_product as $product)
                        <div class="col-md-12">
                            <div class="d-flex pt-2 pb-2 align-items-center" style="border-top: 1px solid #e7e8ea;">
                                <div class="mr-3">
                                    <input type="checkbox" class="checkmail" name="products[]" value="{{ $product->id }}" @if(in_array($product->id, $associatedProductIds)) checked @endif>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <span class="table-avatar">
                                            <a href="profile.html" class="avatar">
                                                @if($product->variants()->first() && $product->variants()->first()->variant_image_detail()->first())
                                                <img src="{{ asset($product->variants()->first()->variant_image_detail()->first()->image) }}" alt="">
                                                @endif
                                            </a>
                                        </span>
                                        <a href="#">
                                            {{ $product->product_name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary btnSaveProducts">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.btnSaveProducts').addEventListener('click', function() {
        let checkedProducts = [];
        let typeCategoryId = document.getElementById('type_category_id').value;
        document.querySelectorAll('.checkmail:checked').forEach(function(checkbox) {
            checkedProducts.push(checkbox.value);
        });

        // Gửi yêu cầu AJAX để lưu các sản phẩm đã chọn
        fetch('/type_category/saveProducts', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    type_category_id: typeCategoryId,
                    products: checkedProducts
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Sản phẩm đã được lưu thành công!');
                    location.reload(); // Tải lại trang để cập nhật
                } else {
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editorBlogDescription'))
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editorBlogSummary'))
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            // console.error(error);
        });
</script>

<script>
    // File Upload
    // 
    function ekUpload() {
        function Init() {
            var fileSelect = document.getElementById('file-upload'),
                fileDrag = document.getElementById('file-drag'),
                submitButton = document.getElementById('submit-button');
            fileSelect.addEventListener('change', fileSelectHandler, false);

            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            var files = e.target.files || e.dataTransfer.files;
            fileDragHover(e);
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        function output(msg) {
            // Response
            var m = document.getElementById('messages');
            m.innerHTML = msg;
        }

        function parseFile(file) {

            console.log(file.name);
            output(
                '<strong>' + encodeURI(file.name) + '</strong>'
            );

            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
            if (isGood) {
                document.getElementById('start').classList.add("hidden");
                document.getElementById('response').classList.remove("hidden");
                document.getElementById('notimage').classList.add("hidden");
                // Thumbnail Preview
                document.getElementById('file-image').classList.remove("hidden");
                document.getElementById('file-image').src = URL.createObjectURL(file);
            } else {
                document.getElementById('file-image').classList.add("hidden");
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("file-upload-form").reset();
            }
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {

            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById('class-roster-file'),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 1024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    // Progress bar
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function(e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!

                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open('POST', document.getElementById('file-upload-form').action, true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }
    ekUpload();
</script>

<style>
    .ck-editor__editable {
        height: 150px;
        /* Điều chỉnh độ cao tùy ý ở đây */
    }
</style>
@endsection