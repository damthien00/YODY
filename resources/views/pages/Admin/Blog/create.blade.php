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

    #file-image.hidden {
        display: none;
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
</style>
<form method="post" action="{{route('blog.store')}}" enctype="multipart/form-data">
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
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thông tin chung</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tiêu đề
                                <span title="Tên sản phẩm không bao gồm các giá trị thuộc tính như màu sắc, chất liệu, kích cỡ...">
                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-size="16" color="primary" style="font-size: 16px; cursor: pointer;">
                                        <path d="M7.4 5v1.2h1.2V5H7.4ZM7.4 8.6V11h1.8V9.8h-.6V7.4H6.8v1.2h.6Z" fill="#0088FF"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 2C4.688 2 2 4.688 2 8s2.688 6 6 6 6-2.688 6-6-2.688-6-6-6ZM3.2 8c0 2.646 2.154 4.8 4.8 4.8s4.8-2.154 4.8-4.8S10.646 3.2 8 3.2A4.806 4.806 0 0 0 3.2 8Z" fill="#0088FF"></path>
                                    </svg></span>
                            </label>
                            <input type="text" placeholder="Nhập tên sản phẩm" name="title" id="product_name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung tin tức</label>
                                    <textarea id="editorBlogDescription" name="content" id="summary"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-2">Tóm tắt</h5>
                            <p>Thêm tóm tắt ngắn để hiển thị trên trang chủ hoặc blog của bạn.</p>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="editorBlogSummary" name="summary" id="summary"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Nguồn bài viết</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tác giả</label>
                            <div class="dropdown" data-control="single-option">
                                <input type="hidden" class="dropdown-input" id="user_id" name="user_id">
                                <label class="dropdown-label">Chọn tác giả</label>
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
                                        <label class="dropdown-option" data-value="1">
                                            1
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <div class="dropdown" data-control="single-option">
                                <input type="hidden" class="dropdown-input" id="blog_cate_id" name="blog_cate_id">
                                <label class="dropdown-label">Chọn loại danh mục</label>
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
                                        @foreach($categories as $category)
                                        <label class="dropdown-option" data-value="1">
                                            {{$category->name}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ảnh bài viết</h5>
                    </div>
                    <div class="card-body">
                        <form id="file-upload-form" class="uploader">
                            <input id="file-upload" type="file" name="image" accept="image/*" />
                            <label for="file-upload" id="file-drag">
                                <img id="file-image" src="#" alt="Preview" class="hidden">
                                <div id="start">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div id="notimage" class="hidden">Please select an image</div>
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
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Trạng thái</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch">
                            <input type="checkbox">
                            <input type="radio">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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