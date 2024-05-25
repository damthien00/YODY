<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>YODY Store</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://bizweb.dktcdn.net/100/438/408/themes/943787/assets/logo.svg?1711703252345">
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/product-review.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/product-detail.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/user/css/account-order.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/pbr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/index.css') }}">

    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            /* background: #eee; */
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide a {
            width: 100%;
        }

        .swiper-slide img {
            /* display: block;
            width: 100%;
            height: 100%; */
            object-fit: cover;
        }

        .swiper-pagination-bullet {
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 12px;
            color: #000;
            opacity: 1;
            background: rgba(0, 0, 0, 0.2);
        }

        .swiper-pagination-bullet-active {
            color: #fff;
            background: #007aff;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('layouts.component.header')
        @yield('content')
        @include('layouts.component.footer')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/user/js/swiper-bundle.min.js')}}" type="text/javascript"></script>
    <script>
        var swiper = new Swiper(".slide-container", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".menu_silebar_wrapper", {
            slidesPerView: 9,
            navigation: {
                nextEl: ".section-home-danh-muc .swiper-button-next",
                prevEl: ".section-home-danh-muc .swiper-button-prev",
            },
        });
    </script>
    <!-- <script>
        var swatchColorElements = document.querySelector('.swatch-color');
        document.getElementById('showIcon2').addEventListener('click', function() {
            swatchColorElements.style.transform = 'translateX(0)';
            var backdropRight = document.querySelector('.backdrop-right');
            if (backdropRight) {
                backdropRight.classList.add('d-none');
            }

            var showIcon2 = document.getElementById('showIcon2');
            if (showIcon2) {
                showIcon2.classList.add('d-none');
            }

            var showIcon = document.getElementById('showIcon');
            if (showIcon) {

                showIcon.classList.add('d-block');
            }
        });

        document.getElementById('showIcon').addEventListener('click', function() {
            swatchColorElements.style.transform = 'translateX(-160px)';
            var backdropRight = document.querySelector('.backdrop-right');
            if (backdropRight) {
                backdropRight.classList.remove('d-none');
            }

            var showIcon2 = document.getElementById('showIcon2');
            if (showIcon2) {
                showIcon2.classList.remove('d-none');
            }

            var showIcon = document.getElementById('showIcon');
            if (showIcon) {
                showIcon.classList.remove('d-md-block');
                showIcon.classList.remove('d-block');
            }
        });
    </script> -->
    <script>
        function changeMainImage(imageUrl, idProduct, idTypeCategory) {
            let elementId;

            if (idTypeCategory) {
                elementId = `image_thumb_${idTypeCategory}_${idProduct}`;
            } else {
                elementId = `image_thumb_${idProduct}`;
            }

            var mainImage = document.getElementById(elementId);

            if (mainImage) {
                mainImage.src = imageUrl;
            } else {
                console.error(`Element with ID ${elementId} not found.`);
            }
        }
    </script>
    <!-- <script>
        function changeMainImage(imageUrl, id) {
            console.log("Aaa")
            console.log(imageUrl[1]);
            var mainImage = document.querySelectorAll('.lazyload#image_thumb_' + id);
            fo
        }
    </script> -->
    <!-- <script>
        function changeSecondMainImage(imageUrl, id) {
            var secondMainImage = document.getElementById('second_image_thumb_' + id);
            secondMainImage.src = imageUrl;
        }
    </script> -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.swatch-element.color label', function(event) {
                event.stopPropagation();
                console.log(1);
                $('.swatch-element.color label').removeClass('active');
                $(this).addClass('active');
            });

            $(document).on('click', '.swatch-element.size label', function(event) {
                event.stopPropagation();
                $('.swatch-element.size label').removeClass('active');
                $(this).addClass('active');
            });

            // Tự động click vào label đầu tiên của phần tử .swatch-element.color
            $('.swatch-element.color label:first').click();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var swatchElements = document.querySelectorAll('.swatch-element.color');

            swatchElements.forEach(function(swatchElement) {
                swatchElement.addEventListener('click', function() {
                    var sku = swatchElement.dataset.sku;
                    var color = swatchElement.dataset.value;
                    var colorId = swatchElement.dataset.valueid;
                    var imagesJson = swatchElement.dataset.image;
                    var price = swatchElement.dataset.price;
                    try {
                        var imagesArr = JSON.parse(imagesJson);
                    } catch (error) {
                        console.error('Invalid JSON data:', error);
                        return; // Thoát khỏi sự kiện nếu dữ liệu JSON không hợp lệ
                    }

                    // document.getElementById('product_id').value = productId;
                    document.getElementById('sku').textContent = 'SKU: ' + sku;
                    document.getElementById('color').textContent = color;
                    document.getElementById('price').textContent = price.toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }) + 'đ';
                    $('.swatch-size .swatch-element').hide();
                    $('.swatch-size .swatch-element[data-color="' + color + '"]').show();
                    $('#color_id').val(colorId);

                    // Tạo HTML cho các hình ảnh và thêm vào phần tử #image-list-panel
                    const imagesHtml = imagesArr.map((image) => {
                        return (
                            `<div class="col-6 d-flex justify-content-center">
                                <div class="image-item d-flex justify-content-center">
                                    <img src="${image.image}" width="400" height="535" alt="image">
                                </div>
                            </div>
                            `
                        );
                    });

                    $('#image-list-panel .row').empty().append(imagesHtml);
                });
            });

            $('.swatch-element.size').on('click', function() {
                var size = $(this).data('value');
                var sizeId = $(this).data('valueid');
                $('#size').text(size);
                $('#size_id').val(sizeId);
            });

            if (document.getElementById('add-to-cart-form')) {
                document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {
                    var sizeId = document.getElementById('size_id').value.trim();
                    if (sizeId === '') {
                        alert('Vui lòng chọn kích thước trước khi thêm vào giỏ hàng!');
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
    <script>
        function updateCart(id) {
            $('#update_cart_id').val(id);
            var qty = $(`#update_cart_quantity-${id}`).val();
            $(`#update_cart_quantity`).val(qty);
            $('#updateCart').submit()
        }

        function deleteCart(id) {
            $('#delete_cart_id').val(id);
            $('#deleteCart').submit()
        }
    </script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var asideTitles = document.querySelectorAll('.aside-title');
            asideTitles.forEach(function(asideTitle) {
                asideTitle.addEventListener('click', function() {
                    var filterGroup = this.nextElementSibling;
                    asideTitle.classList.toggle('active');
                    filterGroup.style.transition = 'height 0.3s ease, padding 0.3s ease';
                    if (asideTitle.classList.contains('active')) {
                        filterGroup.style.overflow = 'hidden';
                        filterGroup.style.height = '0';
                        filterGroup.style.padding = '0';
                        setTimeout(function() {
                            filterGroup.style.display = 'none';
                        }, 300);
                    } else {
                        filterGroup.style.display = 'block';
                        var height = filterGroup.scrollHeight;
                        filterGroup.style.height = height + 'px';
                        filterGroup.style.overflow = 'hidden';
                        filterGroup.style.paddingTop = '10px';
                        setTimeout(function() {
                            filterGroup.style.height = height + 'px';
                            filterGroup.style.paddingTop = '10px';
                        }, 10);
                    }
                });
            });
        });
    </script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            console.log(data);
                            $('#search-results').html(data);
                        }
                    });
                } else {
                    $('#search-results').html('');
                }
            });
        });
    </script>
</body>

</html>