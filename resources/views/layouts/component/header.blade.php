<div class="header header-index">
    <div class="wrap-container d-none d-lg-block">
        <div class="container container-mb">
            <div class="topbar-wrap">
                <div class="topbar-top">
                    <div class="topbar-top__left">
                        <div class="logo">
                            <a href="/">
                                <img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/logo.svg?1711703252345" alt="YODY">
                            </a>
                        </div>
                        <div class="theme-search-smart">
                            <div class="header_search theme-searchs">
                                <form action="/search" id="header-search-product" class="input-group search-bar theme-header-search-form ultimate-search" role="search">
                                    <input type="text" name="query" value="" id="search-input" placeholder="Tìm kiếm" class="search-auto auto-search" required="">
                                    <input type="hidden" name="type" value="product">
                                    <button type="submit" class="btn icon-fallback-text input-group-btn" aria-label="Justify"></button>
                                </form>
                                <div class="results-box box_banner">
                                    <div class="goi_y"></div>
                                    <div id="search-results">

                                    </div>
                                    <div class="history"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topbar-top__right">
                        <div class="list-contact">
                            <a href="/he-thong-cua-hang" class="map">Tìm <span class="number">267</span> cửa hàng</a>
                            <a href="tel:18002086" class="phone"><b>1800 2086</b> </a>
                            <span class="text-free">FREE</span>
                            <span style="margin: 0 8px;">-</span>
                            <span style="margin: 0 8px; color: #11006F; font-weight: 600; font-size: 16px;">Đặt hàng gọi</span>
                            <a href="tel:02499986999" class="phone">02499986999 </a>
                        </div>
                    </div>
                </div>
                <div class="topbar-bottom">
                    <div class="topbar-bottom__left">
                        <nav class="header-nav d-none d-lg-flex">
                            <ul class="item_big">
                                <li class="nav-item ">
                                    <a class="a-img" href="/don-kho-sale-to" title="SALE OFF 50%">
                                        SALE OFF 50%
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                <li class="nav-item has-child  has-mega">
                                    <a class="a-img caret-down" href="/category/{{$category->slug}}" title="NỮ">
                                        {{$category->category_name}}<i class="fa"></i>
                                    </a>
                                    <ul class="mega_type_2_group mega_menu">
                                        @foreach($category->children as $category1)
                                        @include('layouts.component.partials.category', ['category' => $category1])
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li class="nav-item has-child  has-mega">
                                    <a class="a-img caret-down" href="#" title="BỘ SƯU TẬP">
                                        BỘ SƯU TẬP<i class="fa"></i>
                                    </a>
                                    <ul class="mega_type_2_group mega_menu">
                                        <li class="parrent-mega">
                                            <ul>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/yodyyeu" title="YODY Yêu">
                                                        YODY Yêu
                                                    </a>
                                                </li>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/mickey" title="BST Mickey">
                                                        BST Mickey
                                                    </a>
                                                </li>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/yoguu" title="YOGUU">
                                                        YOGUU
                                                    </a>
                                                </li>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/yody-sport-new-collection" title="YODY Sport">
                                                        YODY Sport
                                                    </a>
                                                </li>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/collection-officestyle-nam" title="Thời Trang Công Sở">
                                                        Thời Trang Công Sở
                                                    </a>
                                                </li>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/ao-polo-yody" title="Polo Yody - Everyday Wear">
                                                        Polo Yody - Everyday Wear
                                                    </a>
                                                </li>
                                                <li class="li-item-1">
                                                    <a class="title-m " href="/ao-gio-3c-plus-can-nuoc-can-gio-can-bui" title="Áo Khoác 3C Plus">
                                                        Áo Khoác 3C Plus
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="banner banner_2"><a href="/trang-phuc-di-choi-cho-be"><img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/thumb/grande/100/438/408/themes/943787/assets/link_image_5_1.jpg?1711703252345" alt="BỘ SƯU TẬP"></a></li>
                                    </ul>
                                </li>
                                <li class="nav-item ">
                                    <a class="a-img" href="/dong-phuc-yody" title="ĐỒNG PHỤC" rel="Dofollow">
                                        ĐỒNG PHỤC
                                    </a>
                                </li>
                                <li class="nav-item has-child  ">
                                    <a class="a-img caret-down" href="/ve-yody" title="VỀ YODY">
                                        VỀ YODY<i class="fa"></i>
                                    </a>
                                    <ul class="item_small child">
                                        <li>
                                            <a class="" href="/yody-sale" title="Tin Khuyến Mãi">
                                                Tin Khuyến Mãi
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/dang-ky-doi-tac" title="Đăng ký Đối tác">
                                                Đăng ký Đối tác
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/bao-ve-khach-hang" title="Bảo vệ Khách hàng">
                                                Bảo vệ Khách hàng
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/uu-dai-chinh-sach" title="Ưu đãi &amp; Chính sách">
                                                Ưu đãi &amp; Chính sách
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="https://yody.vn/ve-yody/cau-chuyen-va-nhan-vat" title="Câu chuyện &amp; Nhân vật">
                                                Câu chuyện &amp; Nhân vật
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/yoki" title="Khu Vui Chơi Trẻ Em">
                                                Khu Vui Chơi Trẻ Em
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item ">
                                    <a class="a-img" href="/dang-ky-doi-tac" title="ĐỐI TÁC YODY">
                                        ĐỐI TÁC YODY
                                    </a>
                                </li>
                                <li class="nav-item has-child  ">
                                    <a class="a-img caret-down" href="{{route('blog')}}" title="BLOG">
                                        BLOG<i class="fa"></i>
                                    </a>
                                    <ul class="item_small child">
                                        <li>
                                            <a class="" href="/blog-thoi-trang-nu" title="Em Đẹp">
                                                Em Đẹp
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/blog-thoi-trang-nam" title="Chàng Bảnh Bao">
                                                Chàng Bảnh Bao
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/blog-thoi-trang-tre-em" title="Bé Khoẻ Đẹp">
                                                Bé Khoẻ Đẹp
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="https://yody.vn/tin-tuc/co-the-ban-chua-biet" title="Có Thể Bạn Chưa Biết">
                                                Có Thể Bạn Chưa Biết
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="https://yody.vn/tin-tuc/lam-dep" title="Làm Đẹp">
                                                Làm Đẹp
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="https://yody.vn/tin-tuc/du-lich" title="Du Lịch">
                                                Du Lịch
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/blog-dong-phuc" title="Đồng Phục">
                                                Đồng Phục
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="/thoi-trang-the-gioi" title="Thời Trang Thế Giới">
                                                Thời Trang Thế Giới
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="topbar-bottom__right">
                        <div class="cart-drop d-none d-lg-flex">
                            <a class="cart-wrap" href="{{route('cart.index')}}">
                                <img width="28" height="28" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/icon-cart-header.svg?1711703252345" alt="giỏ hàng">
                                @if(session('cart'))
                                <span class="count_item count_item_pr hidden-count">{{ count(session('cart')) }}</span>
                                @endif
                                <span class="gio-hang">GIỎ HÀNG</span>
                            </a>
                            <div class="top-cart-content">
                                <img style="position: absolute; top: -10px; left: 213px;" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/arrow-cart.png?1711703252345">
                                <div class="CartHeaderContainer">
                                    @if(session('cart'))
                                    <form action="{{route('cart.index')}}" method="post" novalidate="" class="cart ajaxcart cartheader">
                                        <div class="cart-top">
                                            <a href="/account/login">
                                                <span>ĐĂNG NHẬP</span>Đăng nhập và đồng bộ sản phẩm đến giỏ hàng của bạn
                                            </a>
                                        </div>
                                        <div class="timeline-gift d-none d-md-block">
                                            <div class="buy">
                                                <label>Mua</label>
                                                <div class="detail">
                                                    <span class="number-1">498k</span>
                                                    <span class="number-2">996k</span>
                                                    <span class="number-3">1494k</span>
                                                </div>
                                            </div>
                                            <div class="line">
                                                <div class="detail">
                                                    <span class="percent"></span>
                                                    <label class="line-detail line-1"></label>
                                                    <label class="line-detail line-2"></label>
                                                    <label class="line-detail line-3"></label>
                                                </div>
                                            </div>
                                            <div class="receive">
                                                <label>Nhận</label>
                                                <div class="detail">
                                                    <span class="number-1">1</span>
                                                    <span class="number-2">2</span>
                                                    <span class="number-3">3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                            @foreach(session('cart') as $item)
                                            <div class="ajaxcart__row " data-id="29844054">
                                                <div class="ajaxcart__product cart_product" data-line="1">
                                                    <a href="/quan-au-nam-slim-cap-di-dong" class="ajaxcart__product-image cart_image" title="{{$item['name']}}"><img width="83" height="111" src="{{ asset($item['image'])}}" alt="Quần Âu Nam Slim Lịch Lãm Vải Nano Thoáng Mát"></a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a href="/quan-au-nam-slim-cap-di-dong" class="ajaxcart__product-name" title="{{$item['name']}}">{{$item['name']}}</a>
                                                            <span class="cart-price">{{number_format($item['price'])}}đ</span>
                                                            <span class="ajaxcart__product-meta variant-title">{{$item['color']}} / {{$item['size']}}</span>
                                                            <a class="cart__btn-remove remove-item-cart ajaxifyCart--remove" href="javascript:;" data-line="1"></a>
                                                        </div>
                                                        <div class="grid grid-gift">
                                                            <div class="grid__item one-half cart_select cart_item_name">
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" data-id="" data-qty="0" data-line="1" aria-label="-">
                                                                        -
                                                                    </button>
                                                                    <input type="text" name="updates[]" class="ajaxcart__qty-num number-sidebar" maxlength="3" value="{{$item['quantity']}}" min="0" data-id="" data-line="1" aria-label="quantity" pattern="[0-9]*">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" data-id="" data-line="1" data-qty="2" aria-label="+">
                                                                        +
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                Tổng cộng: <span class="cart-price">{{number_format($item['price'] * $item['quantity'])}}đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="ship-cart ship-cart-head">
                                            <span>Đủ điều kiện nhận <a href="/chinh-sach-giao-nhan-hang-online">miễn phí 2 đôi tất, hoặc 1 áo ba lỗ, hoặc 1 túi canvas!</a> <a href="/cart" class="click">Click vào đây để chọn quà tặng</a>.</span>
                                        </div>
                                        <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                            <div class="ajaxcart__subtotal">
                                                <div class="cart__subtotal">
                                                    @php
                                                    $totalPrice = 0;
                                                    @endphp
                                                    @foreach(session('cart') as $item)
                                                    @php
                                                    $totalPrice += $item['price'] * $item['quantity'];
                                                    @endphp
                                                    @endforeach
                                                    <div class="text-right cart__totle">Tổng cộng: <span class="total-price">{{ number_format($totalPrice, 0, ',', '.') }}đ</span></div>
                                                </div>
                                            </div>
                                            <div class="cart__btn-proceed-checkout-dt">
                                                <button onclick="location.href='/cart'" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Xem giỏ hàng">Xem giỏ hàng</button>
                                            </div>
                                        </div>
                                    </form>
                                    @else
                                    <div class="cart--empty-message"><img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/blank_cart.svg?1711591693591" alt="cart">
                                        <p>Giỏ hàng của bạn trống</p><a href="/account" class="logincart">Đăng nhập/Đăng ký</a><span class="clearfix"></span><a class="buy-now" href="/collections/all">Mua ngay</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="wrap-noti-add-to-cart-product-popup wrap-noti-add-to-cart-product-popup-desktop">
                            <div class="noti-content-product-popup">
                                <div class="title">Đã thêm vào giỏ hàng!</div>
                                <div class="product-info">
                                    <div class="product-info-left">
                                        <div class="image"></div>
                                    </div>
                                    <div class="product-info-right">
                                        <div class="product-name"></div>
                                        <div class="product-variant">
                                            <div class="color-size">
                                                <span class="color-text"></span><span class="line-color">/</span><span class="size-text"></span>
                                            </div>
                                            <div class="price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti-gift d-none" style="margin-top: 12px;">
                                    <img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/dau-cong-noti.svg?1711703252345">
                                    <img style="margin: 0 4px;" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/gift-noti.svg?1711703252345">
                                    <span>Bạn đã nhận <span class="noti-gift-quantity">01</span> quà tặng</span>
                                </div>
                                <div class="noti-gift-2 d-none" style="margin-top: 12px;">
                                    <img src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/dau-cong-noti.svg?1711703252345">
                                    <img style="margin: 0 4px;" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/gift-noti.svg?1711703252345">
                                    <span class="noti-gift-2-message"></span>
                                </div>
                                <a href="/cart" class="show-cart">Xem giỏ hàng</a>
                            </div>
                        </div>
                        <div class="header-tool d-none d-lg-flex">
                            <div class="user">
                                @if(auth()->check())
                                <a href="/account" class="logined">
                                    <img width="28" height="28" src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/icon-user.svg?1712987449898" alt="tài khoản">
                                    <span>Cá nhân</span>
                                </a>
                                <div class="account_header" style="z-index:100">
                                    <ul style="margin-top: 10px;">
                                        <li>
                                            <a href="/account" style="border-bottom: 1px #dde1ef solid;color:#fcaf17"><b>{{auth()->user()->name}}</b></a>
                                        </li>
                                        <li>
                                            <a href="{{route('account')}}">Tài khoản của tôi</a>
                                        </li>
                                        <li>
                                            <a href="/account/changepassword">Đổi mật khẩu</a>
                                        </li>
                                        <li>
                                            <a href="/account/addresses">Sổ địa chỉ</a>
                                        </li>
                                        <li>
                                            <a href="/san-pham-da-xem">Đã xem gần đây</a>
                                        </li>
                                        <li>
                                            <a href="/yeu-thich">Sản phẩm yêu thích</a>
                                        </li>
                                        <li class="logout">
                                            <a href="{{route('logout')}}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="user-login">
                                    <a class="register" href="{{route('registation')}}">ĐĂNG KÝ</a>
                                    /
                                    <a class="login" href="{{route('login')}}">ĐĂNG NHẬP</a>
                                </div>
                                @endif
                            </div>
                            <div class="category-action">
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 2.01399V0.356445H22.0001V2.01399H0ZM0
                                        19.6442V17.9866H22.0001V19.6442H0ZM22.0001 9.17154H0V10.8291H22.0001V9.17154Z" fill="black"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>