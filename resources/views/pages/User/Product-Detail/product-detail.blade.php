@extends('layouts.UserLayout')
@section('content')
<style>
    .sapo-product-reviews-summary,
    #sapo-product-reviews-noitem {
        background-color: #F2F2F2;
    }

    #sapo-product-reviews #sapo-product-reviews-sub {
        border: 1px solid #f2f2f2;
    }

    .sapo-review-time {
        display: none;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-action {
        width: 40%;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-action .sapo-product-reviews-star i {
        font-size: 38px;
        margin-right: 8px;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-action .bpr-summary-average {
        font-size: 22px;
        font-weight: 600;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-action p {
        margin: 0 0 10px;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-action .sapo-product-reviews-star {
        margin: 10px 0 10px;
    }

    #sapo-product-reviews .sapo-product-reviews-summary {
        padding: 30px 10px;
    }
</style>
<style>
    .sapo-product-reviews-summary,
    #sapo-product-reviews-noitem {
        background-color: rgba(3, 13, 120, 0.1)
    }

    .bpr-summary-average {
        color: #030d78
    }

    .sapo-product-reviews-star {
        color: #fac126
    }

    .btn-new-review {
        background-color: #030d78;
        border-color: #030d78
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter input:checked~.checkmark {
        color: #030d78;
        border-color: #030d78
    }

    #sapo-product-reviews-frm #fileAttach svg path {
        fill: #030d78
    }

    #sapo-product-reviews-frm .bpr-button-submit {
        background-color: #030d78;
        border-color: #030d78
    }

    .sapo-review-verified,
    .sapo-review-actions {
        color: #030d78
    }

    .icon-verified path {
        fill: #030d78
    }

    #sapo-product-reviews .sapo-product-reviews-list .sapo-review-reply-list .sapo-review-reply-item .sapo-review-reply-author .is-admin {
        background-color: #030d78;
        border-color: #030d78
    }

    .simple-pagination li span.current,
    .simple-pagination li a.current {
        color: #030d78;
        border-color: #030d78;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter h4,
    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter p {
        background-color: #030d78;
        border-color: #030d78;
    }

    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter h4.active,
    #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter p.active {
        color: #030d78
    }

    #sapo-product-reviews .sapo-product-reviews-list .sapo-review-reply-list .btn-show-prev {
        background-color: rgba(3, 13, 120, 0.1);
        color: #030d78
    }

    .bpr-success-popup .icon-checked svg path {
        fill: #030d78
    }

    .sapo-review-reply-form .bpr-form-actions .bpr-reply-button-submit {
        border-color: #030d78;
        background: #030d78;
    }
</style>
<div class="page-product_breadcrumb">
    <section class="bread-crumb d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-12 a-left">
                    <ul class="breadcrumb">
                        <li class="home d-none">
                            <a href="/"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>
                        <li>
                            <a href="/ao-thun-ao-phong-nu" title="Áo thun - áo phông nữ">
                                <span>{{$product->category->category_name}}</span>
                            </a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>
                        <li><strong><span>{{$product->product_name}}</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="container-wrapper" class="container">
    <div id="all-info-wrapper" class="product-grid">
        <div class="product-grid-item-image">
            <div class="line-box-mobile d-lg-none" style="margin-bottom: 12px;"></div>
            <div id="image-list-panel" class="image-list-panel container d-none d-lg-block">
                <div class="row">
                </div>
            </div>
            <div class="image-list-slider d-lg-none">
                <div id="image-list-slider" class="slick-initialized slick-slider" style="opacity: 1;"><button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true" style="display: block;">Previous</button>
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);">
                            <div class="image-item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 0px;"><img src="https://bizweb.dktcdn.net/100/438/408/products/ao-polo-nam-apm3519-tit-7-yodyvn-032a32e0-90f7-48f7-82d7-2e655960cdfb.jpg?v=1704250663273" width="343" height="458" style="border-radius: 4px;" alt="image"></div>
                            <div class="image-item slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 0px;"><img src="https://bizweb.dktcdn.net/100/438/408/products/ao-polo-nam-apm3519-tit-8-yodyvn-37aff9b7-3131-4177-9d37-85ff05249575.jpg?v=1690163862267" width="343" height="458" style="border-radius: 4px;" alt="image"></div>
                            <div class="image-item slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 0px;"><img src="https://bizweb.dktcdn.net/100/438/408/products/ao-polo-nam-apm3519-tit-6-yodyvn-549d52bd-33a1-413e-9cb4-f3bda988f168.jpg?v=1690163862267" width="343" height="458" style="border-radius: 4px;" alt="image"></div>
                            <div class="image-item slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 0px;"><img src="https://bizweb.dktcdn.net/100/438/408/products/ao-polo-nam-apm3519-tit-9-yodyvn.jpg?v=1690163862267" width="343" height="458" style="border-radius: 4px;" alt="image"></div>
                            <div class="image-item slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 0px;"><img src="https://bizweb.dktcdn.net/100/438/408/products/ao-polo-nam-apm3519-tit-2-yodyvn-7f518c66-89a4-40ec-8286-bca412e3940c.jpg?v=1690163862267" width="343" height="458" style="border-radius: 4px;" alt="image"></div>
                            <div class="image-item slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 0px;"><img src="https://bizweb.dktcdn.net/100/438/408/products/ao-polo-nam-apm3519-tit-1-yodyvn-12b3e1a2-3587-47de-900f-3fc091d9b20e.jpg?v=1690163862267" width="343" height="458" style="border-radius: 4px;" alt="image"></div>
                        </div>
                    </div><button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;" aria-disabled="false">Next</button>
                </div>
                <div class="image-pagination d-flex align-items-center">
                    <div class="image-pagination-current">1</div>
                    <div>/</div>
                    <div class="image-pagination-total">6</div>
                </div>
            </div>
        </div>
        <div class="product-grid-item-info details-pro">
            <form autocomplete="off" enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('cart.store')}}" method="post" class="wishItem MultiFile-intercepted">
                @csrf
                <div class="px-md-2">
                    <!-- <div id="flashsale-wrapper" class="flashsale-wrapper justify-content-between align-items-center">
                    <div class="flashsale-text">
                        Flash Sale
                    </div>
                    <div class="flashsale-countdown d-flex align-items-stretch">
                        <div class="flashsale-countdown-item flashsale-countdown-hours">00</div>
                        <div class="flashsale-countdown-colon">:</div>
                        <div class="flashsale-countdown-item flashsale-countdown-minutes">00</div>
                        <div class="flashsale-countdown-colon">:</div>
                        <div class="flashsale-countdown-item flashsale-countdown-seconds">00</div>
                    </div>
                </div> -->
                    <div class="box-divider">
                        <h1 class="title-head mb-1">{{$product->product_name}}</h1>
                        <input type="hidden" id="product_id" name="product_id" value='{{$product->id}}' />
                        <div class="product-top clearfix align-items-center mb-1">
                            <div class="sku-product">
                                <span id="sku" class="variant-sku" itemprop="sku" content="">SKU: {{$variantss->sku}}</span>
                            </div>
                            <div class="divider"></div>
                            <div class="product-sold">
                                Đã bán <span class="number-product-sold">171K</span>
                            </div>
                            <div class="divider"></div>
                            <div id="product-review-info" class="product-review">
                                <div class="sapo-product-reviews-badge" data-id="23371828">
                                    <div class="sapo-product-reviews-star" data-score="5" data-number="5" style="color: #fac126" title="gorgeous"><i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-on-png" title="gorgeous"></i><input name="score" type="hidden" value="5" readonly="">
                                    </div>
                                </div>
                                <span>(11)</span>
                            </div>
                            <div class="clearfix d-none">
                                <span itemprop="brand" itemtype="http://schema.org/Brand" itemscope="">
                                    <meta itemprop="name" content="CTCP Thời trang YODY">Thương hiệu: <strong>{{$product->brand->brand_name}}</strong>
                                </span>
                                <br>
                                <span itemprop="type" itemtype="http://schema.org/Type" itemscope="">
                                    <meta itemprop="name" content="Áo polo nam Yody">Chất liệu: <strong>Áo polo nam
                                        Yody</strong>
                                </span>
                            </div>
                        </div>
                        <div class="group-power">
                            <div class="price-box clearfix d-flex align-items-center">
                                <span class="special-price">
                                    <span id="price" class="price product-price">{{number_format($variantss->retail_price)}}đ</span>
                                </span>
                                <span class="old-price" style="display: none;">
                                    <del class="price product-price-old" style="display: none;">
                                        299.000đ
                                    </del>
                                </span>
                                <span class="save-price d-none" style="display: none;">Đang sale:
                                    <span class="price product-price-save" style="display: none;"></span>
                                </span>
                            </div>
                            <div class="pdp-save-price" style="display: none;">
                                <p class="price-sp-discount">
                                    <span class="price-save" style="display: none;">Tiết kiệm: 0đ</span>
                                    <span class="price-save-discount">-11%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="line-box-mobile"></div>
                    <div class="line-box-mobile"></div>
                    <div class="line-box-mobile"></div>
                    <div class="form-product">
                        <div id="product-chonsize">
                            <div class="select-swatch">
                                <div class="swatch-color swatch clearfix">
                                    <div class="options-title">Màu sắc: <span class="var" id="color"></span></div>
                                    <input type="hidden" id="color_id" name="color_id" value="" />
                                    @foreach ($product->variants as $variant )
                                    <div data-image='{{$variant->variant_image_detail}}' data-price="{{number_format($variant->retail_price, 0, ',', '.')}}" data-valueid="{{$variant->color->id}}" data-value="{{$variant->color->color_name}}" data-sku="{{$variant->sku}}" class="swatch-element color  available">
                                        <!-- <input type="radio" value="{{$variant->color->id}}"> -->
                                        <label title="{{$variant->color->color_name}}">
                                            <span style="background-image:url('{{ asset($variant->variant_image_detail[0]->image) }}');background-size:50px;background-repeat:no-repeat;background-position: center;"></span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class=" swatch-size swatch clearfix" data-option-index="1">
                                    <div class="options-title">Kích thước: <span class="var" id='size'></span></div>
                                    <input type="hidden" id="size_id" name="size_id" value="" />
                                    @foreach ($variants as $variant)
                                    <div data-valueid="{{ $variant->size->id }}" data-value="{{ $variant->size->size_name }}" data-color="{{ $variant->color->color_name }}" data-sku="{{ $variant->sku }}" class="swatch-element {{ $variant->size->size_name }} size available">
                                        <input id="swatch-1-{{ $variant->size->size_name }}" type="radio" name="option-1" value="{{ $variant->size->id }}">
                                        <label title="{{ $variant->size->size_name }}" for="swatch-1-{{ $variant->size->size_name }}">
                                            {{ $variant->size->size_name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="size-guide-box size-guide-box-desktop aaa" style="display: block;" id="product-chonsize">
                                    <a href="javascript:" class="d-inline-block" id="btn-open-size">
                                        <p><img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/ic_blue_ruler_pen.svg?1711788816130" alt="size"> <span>Giúp bạn chọn size</span></p>
                                    </a><a href="/bang-size-ao-polo-nam-yody" class="text--center btn-size d-none" target="_blank">Bảng size chuẩn</a>

                                    <div class="size-suggestion__header">
                                    </div>
                                    <div id="myModalSize" class="modal fade" role="dialog">
                                        <div class="modal-bg"></div>
                                        <div class="modal-dialog">
                                            <button type="button" class="close" data-dismiss="modal"></button>
                                            <div class="title">HƯỚNG DẪN CHỌN SIZE CHUẨN</div>
                                            <div class="sum">Áo polo nam Yody</div>
                                            <div class="content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkAvilable">
                            <div class="line-box-mobile"></div>
                            <div id="from-action-addcart" class="clearfix from-action-addcart">
                                <div class="qty-ant clearfix custom-btn-number">
                                    <div class="custom custom-btn-numbers clearfix input_number_product">
                                        <button id="btn-minus" onclick="var result = document.getElementById('qty'); var result2 = document.getElementById('qtyHeader'); var qty = result.value; if( !isNaN(qty) & qty > 1 ){result.value--;result2.value = result.value};return false;" class="btn-minus btn-cts" type="button">–</button>
                                        <input aria-label="Số lượng" type="text" class="qty input-text" id="qty" name="quantity" size="4" value="1" maxlength="3" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                        <button id="btn-plus" onclick="var result = document.getElementById('qty'); var result2 = document.getElementById('qtyHeader'); var qty = result.value; if( !isNaN(qty)) {result.value++;result2.value = result.value};return false;" class="btn-plus btn-cts" type="button">+</button>
                                    </div>
                                </div>
                                <div class="list_user_mua">
                                    <p>
                                        <span class="number_buy">171K</span>
                                        người đã mua
                                    </p>
                                    <ul id="userList">
                                        <li>
                                            <div class="user_side">
                                                <img class="lazyload loading" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/points_icon.svg?1711788816130" alt="points_icon" data-was-processed="true">
                                                <p>
                                                    <span class="user_name_buy">Đ***g</span>
                                                </p>
                                                <p>
                                                    vừa mua
                                                    <span class="variant_buy_size">Size Vàng / 4XL</span>
                                                </p>
                                            </div>
                                            <button type="button" class="btn-click-mua-view" data-id="106740962">
                                                Mua
                                            </button>
                                        </li>
                                        <li>
                                            <div class="user_side">
                                                <img class="lazyload loading" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/points_icon.svg?1711788816130" alt="points_icon" data-was-processed="true">
                                                <p>
                                                    <span class="user_name_buy">Đ*c</span>
                                                </p>
                                                <p>
                                                    vừa mua
                                                    <span class="variant_buy_size">Size Xanh Biển / L</span>
                                                </p>
                                            </div>
                                            <button type="button" class="btn-click-mua-view" data-id="106740992">
                                                Mua
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="btn-mua d-none d-lg-block">
                                    <div id="add-to-cart-wrapper" class="add-to-cart-wrapper d-flex align-items-center">
                                        <button type="submit" data-role="addtocart" class="btn btn-lg btn-gray btn_buy add_to_cart add-card-destop d-flex align-items-center btn-new-update animation_cart"><img style="padding-left: 10px; transform: translateX(96px);" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/shopping-cartupdate.svg?1711788816130" alt="cart"><span class="add-span-cart" style="flex: 1; font-weight: 700;">Thêm
                                                vào giỏ hàng</span></button>
                                        <button type="submit" id="btn-add-to-cart" class="btn-cart btn_buy add_to_cart btn-add-to-cart buy-now-ready" style="color: #1C2430; background: none; border: 2px solid #1C2430;">Mua
                                            ngay</button>
                                    </div>
                                </div>
                            </div>
                            <div class="line-box-mobile"></div>
                            <div class="add-cart-mobile d-block d-lg-none">
                                <div id="add-to-cart-wrapper" class="add-to-cart-wrapper d-flex align-items-center" style="justify-content: space-between;">
                                    <button type="submit" data-role="addtocart" class="btn btn-lg btn-gray btn_buy add_to_cart add-card-mobile d-flex align-items-center btn-new-update animation_cart"><img style="gap: 8px; transform: translateX(90px);" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/shopping-cartupdate.svg?1711788816130" alt="cart"><span class="add-span-cart" style="flex: 1; font-weight: 700;">Thêm vào
                                            giỏ hàng</span></button>
                                    <button type="submit" id="btn-add-to-cart" class="btn-cart btn_buy add_to_cart btn-add-to-cart buy-now-ready">Mua
                                        ngay</button>
                                </div>
                            </div>
                            <div class="line-box-mobile"></div>
                        </div>
                    </div>

                    <div class="ab_quantitybreak_infor" style="display: none;"></div>
                    <div id="bizweb-qty-msg" style="display: none;"></div>
                    <div class=" payment-policy-wrapper" style="padding: 24px 0;">
                        <div class="pdp-thong-tin">
                            <div class="icon">
                                <img class="lazyload loading" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/tag.svg?1711788816130" alt="freeship" data-was-processed="true">
                                <p class="title">
                                    Mã giảm giá sẽ hiển thị trong giỏ hàng
                                </p>
                            </div>
                            <div class="icon">
                                <img class="lazyload loading" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/shield-tick.svg?1711788816130" alt="freeship" data-was-processed="true">
                                <p class="title">
                                    Thông tin được bảo mật và mã hóa
                                </p>
                            </div>
                            <div class="icon">
                                <img class="lazyload loading" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/timer.svg?1711788816130" alt="freeship" data-was-processed="true">
                                <p class="title">
                                    <span>Giao hàng:</span> Từ 1 - 3 ngày
                                </p>
                            </div>
                            <div class="icon">
                                <img class="lazyload loading" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/arrow-swap-horizontal.svg?1711788816130" alt="freeship" data-was-processed="true">
                                <p class="title">
                                    <span>Miễn phí đổi trả:</span> tại 250+ cửa hàng trong 15 ngày
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="product-grid-item-desc description-detail-wrapper">
            <div class="accordion accordion-line-top">
                <div>
                    <div class="property-outstanding">
                        <h2>
                            Đặc tính nổi bật
                        </h2>
                    </div>
                    <div class="accordion-panel" style="transition-duration: 0.25s; max-height: 320px;">
                        <div class="px-3 pt-3 pb-1 accordion-caption-wrapper">
                            <div class="accordion-caption">
                                <div>Đặc tính nổi bật</div>
                                <div class="accordion-close-wrapper">
                                    <img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/close.svg?1711788816130" class="accordion-close" width="15" height="15" alt="close">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <div id="product-dactinh" class="km-hot">
                                <div class="box-km">
                                    <h2 class="title_km">
                                        <img id="toggle-box-promotion" class="d-none" style="float: right;cursor: pointer;margin-right: 45%;" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/right-circle.svg?1711788816130">
                                    </h2>
                                    <div class="box-promotion">
                                        <p><img alt="Áo Polo Nam Coolmax" data-thumb="original" original-height="120" original-width="820" src="//bizweb.dktcdn.net/100/438/408/files/product-highlight-coolmax.jpg?v=1681270743159">
                                        </p>
                                        <p>Chất liệu: 95% Polyester + 5% Spandex</p>
                                        <p>Sợi vải bao gồm nhiều rãnh dẹt giúp thoáng khí, thoát ẩm cực tốt</p>
                                        <p>Áo polo nam Coolmax&nbsp;mang lại cảm giác mát mẻ, dễ chịu cho người mặc ngay
                                            cả khi
                                            vận động
                                            mạnh</p>
                                        <p>Tự tin cùng Thiết kế khỏe khoắn, nam tính&nbsp;</p>
                                        <p>Ứng dụng linh hoạt: Thích hợp mặc đi chơi, đi làm, hoạt động thể thao, cafe,
                                            hẹn hò
                                            với bạn bè
                                        </p>
                                        <p>YODY - Look good. Feel good.</p>
                                        <p>Sản xuất tại Việt Nam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-detail-collapse" class="accordion">
                <div class="accordion-toggle">
                    <div class="toggle-text">
                        <h2>
                            Chi tiết sản phẩm
                        </h2>
                    </div>
                    <div class="toggle-arrow"></div>
                </div>
                <div class="accordion-panel accordion-panel-mobile-fixed">
                    <div class="px-3 pt-3 pb-1 accordion-caption-wrapper">
                        <div class="accordion-caption">
                            <div>Chi tiết sản phẩm</div>
                            <div class="accordion-close-wrapper">
                                <img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/close.svg?1711788816130" class="accordion-close" width="15" height="15" alt="close">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-content">
                        <div id="product-content">
                            <div class="product_getcontent rte">
                                <div class="ba-text-fpt">
                                    <h2 dir="ltr" style="text-align: center;">Vải Coolmax tại YODY có gì đặc biệt?&nbsp;
                                    </h2>
                                    <p dir="ltr" style="text-align: center;"><img alt="Áo Polo Nam Coolmax" data-thumb="original" original-height="2781" original-width="1500" src="//bizweb.dktcdn.net/100/438/408/files/coolmax-ao-polo-yody-c623f5ee-b213-4063-a683-f2af37e7a89a.jpg?v=1686543742569">
                                    </p>
                                    <p dir="ltr" style="text-align: center;"><img alt="Áo Polo Nam Coolmax" data-thumb="original" original-height="619" original-width="619" src="//bizweb.dktcdn.net/100/438/408/files/278253525-2130887197090296-6006055988970008054-n-e8cab371-35a0-46e2-80db-f142c176ccb0.jpg?v=1661577945729">
                                    </p>
                                    <p dir="ltr" style="text-align: center;"><img alt="Áo Polo Nam Coolmax " data-thumb="original" original-height="619" original-width="619" src="//bizweb.dktcdn.net/100/438/408/files/278124072-2130887237090292-2532495583793881986-n-ad88a10f-f20f-40fb-abcf-033dd06bd095.jpg?v=1661577955609">
                                    </p>
                                    <h2 dir="ltr" style="text-align: center;">Kiểu dáng Polo Coolmax tay ngắn phối bo
                                    </h2>
                                    <p dir="ltr" style="text-align: center;">Thiết kế áo polo nam với kiểu dáng suông cơ
                                        bản nên
                                        rất
                                        dễ mặc với mọi người. Áo polo nam form suông sẽ giúp bạn có thể mặc thoải mái
                                        mỗi ngày,
                                        tự
                                        tin trong mọi hoạt động.</p>
                                    <p dir="ltr" style="text-align: center;"><img alt="ao polo nam yody" data-thumb="original" original-height="6224" original-width="4672" src="//bizweb.dktcdn.net/100/438/408/files/dsc03075.jpg?v=1657336155706" style="width: 1000px; height: 1332px;"></p>
                                    <p dir="ltr" style="text-align: center;"><em>Mùa hè năng động và trẻ trung</em></p>
                                    <p dir="ltr" style="text-align: center;">Thiết kế cổ đức có 3 cúc, bo tay tiện lợi:
                                        Đây là
                                        kiểu
                                        áo polo cộc tay có cổ đức dành cho nam giới. Hơn thế nữa, thiết kế áo 3 cúc tạo
                                        sự lịch
                                        lãm,
                                        nam tính cho người mặc.</p>
                                    <p dir="ltr" style="text-align: center;">Phối bo phần cổ và tay áo rất bắt mắt, cách
                                        điệu
                                        với
                                        đường chỉ chuyển màu, bo nhẹ nhàng, tinh tế tạo điểm nhấn đem lại sự trẻ trung,
                                        tươi mới
                                        cho
                                        người mặc.</p>
                                    <p dir="ltr" style="text-align: center;"><img alt="Áo Polo Nam Coolmax" data-thumb="original" original-height="951" original-width="1500" src="//bizweb.dktcdn.net/100/438/408/files/coolmax-ao-polo-yody-2.jpg?v=1686543760085">
                                    </p>
                                    <p dir="ltr" style="text-align: center;">Với bảng màu siêu phong phú cùng thiết kế
                                        hiện đại,
                                        đa
                                        năng, anh em hoàn toàn có thể chọn lựa cho bản thân, gia đình, bạn bè những
                                        chiếc áo
                                        Polo
                                        coolmax đẹp và tiện dụng nhất! Thêm ngay sản phẩm vào giỏ hàng nhé!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel-mobile-fixed-backdrop"></div>
            </div>
            <div id="product-detail-collapse" class="accordion">
                <div class="accordion-toggle">
                    <div class="toggle-text">
                        <h2>
                            HƯỚNG DẪN SỬ DỤNG
                        </h2>
                    </div>
                    <div class="toggle-arrow"></div>
                </div>
                <div class="accordion-panel accordion-panel-mobile-fixed" style="transition-duration: 0.25s; max-height: 0px;">
                    <div class="px-3 pt-3 pb-1 accordion-caption-wrapper">
                        <div class="accordion-caption">
                            <div>HƯỚNG DẪN SỬ DỤNG</div>
                            <div class="accordion-close-wrapper">
                                <img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/close.svg?1711788816130" class="accordion-close" width="15" height="15" alt="close">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-content">
                        <div id="product-content hd-su-dung-content">
                            <div class="product_getcontent rte">
                                <div class="ba-text-fpt hd-su-dung">
                                    <h5 class="d-none d-lg-block">
                                        Hướng dẫn sử dụng chung:
                                    </h5>
                                    <h5 class="d-block d-lg-none">
                                        1. Hướng dẫn sử dụng chung:
                                    </h5>
                                    <ul>
                                        <li>Giặt máy chế độ nhẹ với sản phẩm cùng màu ở nhiệt độ thường</li>
                                        <li>Không giặt chung với các vật sắc nhọn</li>
                                        <li>Không sử dụng chất tẩy rửa</li>
                                        <li>Không ngâm lâu sản phẩm với các chất có tính tẩy rửa</li>
                                        <li>Sử dụng xà phòng trung tính</li>
                                        <li>Lộn trái và phơi bằng móc trong bóng râm, tránh ánh nắng trực tiếp</li>
                                        <li>Là ủi ở mức 1, Nhiệt độ dưới 110 độ C</li>
                                        <li>Không là lên chi tiết trang trí</li>
                                    </ul>
                                    <h5 class="d-none d-lg-block">
                                        Hướng dẫn sử dụng với sản phẩm phụ kiện giày, túi xách:
                                    </h5>
                                    <h5 class="d-block d-lg-none">
                                        2. Hướng dẫn sử dụng với sản phẩm phụ kiện giày, túi xách:
                                    </h5>
                                    <ul>
                                        <li>Bảo quản nơi khô ráo</li>
                                        <li>Không ngâm trong nước</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel-mobile-fixed-backdrop"></div>
            </div>
            <div id="review-wrapper" class="accordion review-wrapper">
                <div class="accordion-toggle title">
                    <div class="toggle-text">
                        Đánh giá
                    </div>
                </div>
                <div>
                    <div id="sapo-product-reviews" class="sapo-product-reviews">
                        <div id="sapo-product-reviews-sub">
                            <div class="sapo-product-reviews-summary">
                                <div class="summary-filter">
                                    <div class="sapo-product-reviews-action">
                                        <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="bpr-summary">
                                            <div class="bpr-summary-average">
                                                <span itemprop="ratingValue">5</span>
                                                <span class="max-score">/5</span>
                                            </div>
                                            <div data-number="5" data-score="5" class="sapo-product-reviews-star" id="sapo-prv-summary-star" title="gorgeous">
                                                <i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-on-png" title="gorgeous"></i><input name="score" type="hidden" value="5" readonly="">
                                            </div>
                                            <p>(<span itemprop="ratingCount">11</span> <span> đánh giá</span>)</p>
                                        </div>
                                        <button type="button" class="btn-new-review" onclick="BPR.newReview(this); return false;">Gửi đánh giá của
                                            bạn</button>
                                    </div>
                                    <div class="sapo-product-reviews-filter">
                                        <p onclick="BPR.showFilterMobile(this);"><i class="fa fa-filter" aria-hidden="true"></i><span>Bộ lọc</span>
                                        </p>
                                        <div class="list-filter">
                                            <label>
                                                <input type="radio" id="FilterAll" name="filter" value="all" onchange="BPR.filterReview(this); return false;" checked="" style="display: none;">
                                                <span class="checkmark"><span>Tất cả</span></span>
                                            </label>
                                            <label>
                                                <input type="radio" id="FiveScore" name="filter" data-filter="score" value="5" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                <span class="checkmark"><span>5 Điểm</span> (<span class="count">2</span>)</span>
                                            </label>
                                            <label>
                                                <input type="radio" id="FourScore" name="filter" data-filter="score" value="4" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                <span class="checkmark"><span>4 Điểm</span> (<span class="count" data-content="four_rating">0</span>)</span>
                                            </label>
                                            <label>
                                                <input type="radio" id="ThreeScore" name="filter" data-filter="score" value="3" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                <span class="checkmark"><span>3 Điểm</span> (<span class="count" data-content="three_rating">0</span>)</span>
                                            </label>
                                            <label>
                                                <input type="radio" id="TwoScore" name="filter" data-filter="score" value="2" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                <span class="checkmark"><span>2 Điểm</span> (<span class="count" data-content="two_rating">0</span>)</span>
                                            </label>
                                            <label>
                                                <input type="radio" id="OneScore" name="filter" data-filter="score" value="1" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                <span class="checkmark"><span>1 Điểm</span> (<span class="count" data-content="one_rating">0</span>)</span>
                                            </label>
                                            <label>
                                                <input type="radio" id="IsImage" name="filter" value="isimage" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                <span class="checkmark"><span>Có hình ảnh</span> (<span class="count">5</span>)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-new-review btn-new-review-mobile" onclick="BPR.newReview(this); return false;">Gửi đánh giá của bạn</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="prefer-products" class="prefer-products">
        <section class="section-product">
            <div class="container p-0">
                <div class="d-flex justify-content-between prefer-header">
                    <h2 class="title-block">GỢI Ý CHO BẠN</h2>
                </div>
                <div class="list">
                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2 product-col">
                            <div class="item_product_main item_product_main-35159375">
                                <div class="wrap-product-sold-info">
                                    <div class="product-review">
                                        <img width="10" height="10" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/icon_start.svg?1711780387339" alt=""> <span class="number-star-23371826">4.9</span>
                                    </div>
                                    <div class="product-sold">
                                        <div class="line"></div>
                                        Đã bán <span class="number-product-sold number-product-sold-23371826">543K</span>
                                    </div>
                                </div>
                                <form action="/cart/add" method="post" enctype="multipart/form" class="variants product-action wishItem">
                                    <div data-id="35159375" class="product-thumbnail">
                                        <span class="hot-tag"></span>
                                        <!-- <span class="new-tag">MỚI</span> -->
                                        <a class="image_thumb" href="/ao-thun-tre-em-phoi-in-noi-tai-nghe" title="Áo Thun Trẻ Em Cotton Compact Phối In Nổi Tai Nghe">
                                            <img class="lazyload loaded" src="//bizweb.dktcdn.net/thumb/large/100/438/408/products/tsk7134-tvx-4.jpg?v=1711504825337" data-src="//bizweb.dktcdn.net/thumb/large/100/438/408/products/tsk7134-tvx-4.jpg?v=1711504825337" alt="Áo Thun Trẻ Em Cotton Compact Phối In Nổi Tai Nghe" data-was-processed="true">
                                        </a>
                                        <a href="#" class="setWishlist btn-views d-none" data-wish="ao-thun-tre-em-phoi-in-noi-tai-nghe" tabindex="0" title="Thêm vào yêu thích">
                                            <img width="22" height="20" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/heart_ico.svg?1711766421559" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info product-info-35159375">
                                        <h3 class="product-name">
                                            <a href="/ao-thun-tre-em-phoi-in-noi-tai-nghe" title="">
                                                Áo Thun Trẻ Em Cotton Compact Phối In Nổi Tai Nghe
                                            </a>
                                        </h3>
                                        <div class="bottom-action">
                                            <div class="price-box">
                                                <span class="price check_price_new ">169.000&nbsp;đ</span>
                                                <span class="compare-price check_price_new_giam" style="display: none;"></span>
                                            </div>
                                        </div>
                                        <div class="sw-group">
                                            <div class="option-swath">
                                                <div id="showIcon2" class="show_again d-none">
                                                    <div class="show_icon"></div>
                                                </div>
                                                <div id="showIcon" class="show_more d-none d-md-block">
                                                    <div class="show_icon"></div>
                                                </div>
                                                <div class="backdrop-show backdrop-left d-none"></div>
                                                <div class="backdrop-show backdrop-right d-none d-md-block"></div>
                                                <div class="swatch-color-wrapper position-relative">
                                                    <div class="swatch-color  swatch clearfix" data-option-index="0" data-swatches="8" style="transform: translateX(0px);">
                                                        <div data-value="Xanh đậm" class="swatch-element color Xanh đậm 1 offset-element">
                                                            <input id="swatch-0-xanh-dam23372413" type="radio" name="option-0" value="Xanh đậm" checked="">
                                                            <label title="Xanh đậm" class="xanh-dam" for="swatch-0-xanh-dam23372413" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/aln3028-tga-qjn3076-xdm-7.jpg?v=1711420488480);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="399.000đ" data-compare_at_price="399.000đ" data-scolor="//bizweb.dktcdn.net/thumb/large/100/438/408/products/aln3028-tga-qjn3076-xdm-7.jpg?v=1711420488480"></label>
                                                        </div>
                                                        <div data-value="Xanh trung" class="swatch-element color Xanh trung 7">
                                                            <input id="swatch-0-xanh-trung23372413" type="radio" name="option-0" value="Xanh trung">
                                                            <label title="Xanh trung" class="xanh-trung" for="swatch-0-xanh-trung23372413" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/qjn3076-xat-23.jpg?v=1699326864783);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="399.000đ" data-compare_at_price="399.000đ" data-scolor="//bizweb.dktcdn.net/thumb/large/100/438/408/products/qjn3076-xat-23.jpg?v=1699326864783"></label>
                                                        </div>
                                                        <div data-value="Đen khói" class="swatch-element color Đen khói 13">
                                                            <input id="swatch-0-den-khoi23372413" type="radio" name="option-0" value="Đen khói">
                                                            <label title="Đen khói" class="den-khoi" for="swatch-0-den-khoi23372413" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/qjn3076-dek-5.jpg?v=1711420518090);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="399.000đ" data-compare_at_price="399.000đ" data-scolor="//bizweb.dktcdn.net/thumb/large/100/438/408/products/qjn3076-dek-5.jpg?v=1711420518090"></label>
                                                        </div>
                                                        <div data-value="Xanh" class="swatch-element color Xanh 19">
                                                            <input id="swatch-0-xanh23372413" type="radio" name="option-0" value="Xanh">
                                                        </div>
                                                        <div data-value="Đen chì" class="swatch-element color Đen chì 25">
                                                            <input id="swatch-0-den-chi23372413" type="radio" name="option-0" value="Đen chì">
                                                            <label title="Đen chì" class="den-chi" for="swatch-0-den-chi23372413" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/qjn3076-dni-1.jpg?v=1711420479877);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="399.000đ" data-compare_at_price="399.000đ" data-scolor="//bizweb.dktcdn.net/thumb/large/100/438/408/products/qjn3076-dni-1.jpg?v=1711420479877"></label>
                                                        </div>
                                                        <div data-value="Đen" class="swatch-element color Đen 31">
                                                            <input id="swatch-0-den23372413" type="radio" name="option-0" value="Đen">
                                                        </div>
                                                        <div data-value="Xanh nhạt" class="swatch-element color Xanh nhạt 37">
                                                            <input id="swatch-0-xanh-nhat23372413" type="radio" name="option-0" value="Xanh nhạt">
                                                            <label title="Xanh nhạt" class="xanh-nhat" for="swatch-0-xanh-nhat23372413" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/qjn3076-xnh-11.jpg?v=1711420839307);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="399.000đ" data-compare_at_price="399.000đ" data-scolor="//bizweb.dktcdn.net/thumb/large/100/438/408/products/qjn3076-xnh-11.jpg?v=1711420839307"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class=""></span>
                                                <div class="backdrop-show backdrop-left d-none"></div>
                                                <div class="backdrop-show backdrop-right d-none d-md-block"></div>
                                                <div class="swatch-color-wrapper position-relative">
                                                    <div class=" swatch clearfix" data-option-index="1" data-swatches="1">
                                                        <div data-value="26" class="swatch-element 26 1 ">
                                                            <input id="swatch-1-2623372413" type="radio" name="option-1" value="26" checked="">
                                                        </div>
                                                        <div data-value="25" class="swatch-element 25 2 ">
                                                            <input id="swatch-1-2523372413" type="radio" name="option-1" value="25">
                                                        </div>
                                                        <div data-value="27" class="swatch-element 27 3 ">
                                                            <input id="swatch-1-2723372413" type="radio" name="option-1" value="27">
                                                        </div>
                                                        <div data-value="28" class="swatch-element 28 4 ">
                                                            <input id="swatch-1-2823372413" type="radio" name="option-1" value="28">
                                                        </div>
                                                        <div data-value="29" class="swatch-element 29 5 ">
                                                            <input id="swatch-1-2923372413" type="radio" name="option-1" value="29">
                                                        </div>
                                                        <div data-value="30" class="swatch-element 30 6 ">
                                                            <input id="swatch-1-3023372413" type="radio" name="option-1" value="30">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-sale-upsell flash-sale-upsell-35159375 d-none" style="display: none;">
                                            <div class="background-process" style="width: 100%;">
                                                <div class="backgorund-sale"></div>
                                                <span class="text-noti"></span>
                                                <img class="d-none" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/icon-fire-upsell.svg?1711703252345">
                                            </div>
                                            <a href="/ao-thun-tre-em-phoi-in-noi-tai-nghe" class="btn-mua-ngay d-none"><span>Mua ngay</span></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>



@endsection