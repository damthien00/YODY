@extends('layouts.UserLayout')
@section('content')
<section class="main-cart-page main-container col1-layout 11">
    <div class="main container cartpcstyle">
        <div class="wrap_background_aside margin-bottom-40">
            <div class="cart-page">
                <div class="drawer__inner">
                    <div class="CartPageContainer">
                        @if(session('cart'))
                        <form action="/cart" method="post" novalidate="" class="cart ajaxcart cartpage container">
                            <div class="row">
                                <div class="col-12 col-xl-8 order-1 order-xl-1">
                                    <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                        <p class="title"><span class="text-uppercase">Giỏ hàng</span><span class="total-cart">(<span class="count_item_pr">{{ count(session('cart')) }}</span>) Sản
                                                phẩm<span></span></span></p>
                                        <div class="count-down-card">
                                            <div class="count-down-card-content">
                                                <div class="count-down-card-content-item">
                                                    <img class="minibanner_img" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/degree_of_heat_1.svg?1711788816130" alt="minibanner">
                                                    <div class="text-count-down">
                                                        Ưu đãi giỏ hàng sắp kết thúc!! Thanh toán trong <span class="text-countdown-cart" id="countdown">03 : 10</span>
                                                        phút nữa trước khi hết hàng.
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display: flex; align-items: center; margin-top: 10px;" class="count-down-card-content">

                                                <img class="minibanner_img" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/icon_start_cart.svg?1711788816130" alt="minibanner">

                                                <p style="padding-left: 10px; margin: 0">
                                                    Hãy chia thành nhiều đơn nhỏ để áp dụng nhiều lần khuyến
                                                    mãi
                                                </p>
                                            </div>
                                        </div>
                                        <div class="buymore_notification-wrapper d-none">
                                            <div id="buymore_notification" class="buymore_notification d-none">
                                                <div>
                                                    <div class="message-normal">Mua thêm 399.000đ để nhận quà tặng từ
                                                        YODY</div>
                                                    <div class="message-note">* CTKM áp dụng với hóa đơn nguyên giá
                                                    </div>
                                                </div>
                                                <div class="d-none">
                                                    <a href="/dai-tiec-tri-an" class="message-link">
                                                        <span>Xem danh sách sản phẩm</span>
                                                        <span class="arrow"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-header-info d-none d-md-flex">
                                            <div>Sản phẩm</div>
                                            <div>Đơn giá</div>
                                            <div>Số lượng</div>
                                            <div>Tổng tiền</div>
                                        </div>
                                        <div class="items-available">
                                            @foreach ($carts as $cart)
                                            <div class="ajaxcart__row cart-item  ">
                                                <div class="ajaxcart__product cart_product" data-line="1">
                                                    <a href="/ao-polo-nam-bo-co-phoi-mau" class="ajaxcart__product-image cart_image" title="{{$cart['name']}}">
                                                        <img src="{{ asset($cart['image'])}}" alt="{{$cart['name']}}">
                                                    </a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a href="/ao-polo-nam-bo-co-phoi-mau" class="ajaxcart__product-name h4" title="{{$cart['name']}}">
                                                                {{$cart['name']}}
                                                            </a>
                                                            <span class="ajaxcart__product-meta variant-title d-none d-md-block">{{$cart['color']}}
                                                                / {{$cart['size']}}</span>
                                                        </div>
                                                        <div class="grid grid-price-1">
                                                            <div class="grid__item one-half text-center cart_prices">
                                                                <span class="cart-price ">{{number_format($cart['price'])}}đ</span>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-qty">
                                                            <span class="ajaxcart__product-meta variant-title-mobile d-md-none">Nâu
                                                                / L</span>
                                                            <div class="grid__item one-half cart_select">
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" aria-label="-" onclick="if(parseInt(this.nextElementSibling.value) > 0) this.nextElementSibling.value = parseInt(this.nextElementSibling.value) - 1">
                                                                        -
                                                                    </button>
                                                                    <input type="text" id="update_cart_quantity-{{$cart['id']}}" name="updates[]" readonly="" class="ajaxcart__qty-num number-sidebar" maxlength="3" value="{{$cart['quantity']}}" min="0" aria-label="quantity" pattern="[0-9]*">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" aria-label="+" onclick="this.previousElementSibling.value = parseInt(this.previousElementSibling.value) + 1">
                                                                        +
                                                                    </button>
                                                                    <button type="button" class="btn-update-quantity" onclick="updateCart(`{{$cart['id']}}`)">
                                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill="none" stroke-width="2" d="M1.7507,16.0022 C3.3517,20.0982 7.3367,23.0002 11.9997,23.0002 C18.0747,23.0002 22.9997,18.0752 22.9997,12.0002 M22.2497,7.9982 C20.6487,3.9012 16.6627,1.0002 11.9997,1.0002 C5.9247,1.0002 0.9997,5.9252 0.9997,12.0002 M8.9997,16.0002 L0.9997,16.0002 L0.9997,24.0002 M22.9997,0.0002 L22.9997,8.0002 L14.9997,8.0002"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-price grid-price-2">
                                                            <div class="grid__item one-half text-center cart_prices d-none d-md-block">
                                                                <span class="cart-price">{{number_format($cart['price'] * $cart['quantity'])}}đ</span>
                                                            </div>
                                                            <p class="remove-cart">
                                                                <a href="#" class="cart__btn-remove remove-item-cart ajaxifyCart--remove delete-cart-link" onclick="deleteCart(`{{$cart['id']}}`)"></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4 order-3 order-xl-2 ajaxcart__wrap-footer">
                                    <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                        <div class="ship-cart ship-cart-cart">
                                            <b>Ưu đãi sinh nhật YODY</b>
                                            <span>Đủ điều kiện nhận <a href="/chinh-sach-giao-nhan-hang-online">miễn phí
                                                    2 đôi tất, hoặc 1 áo ba lỗ, hoặc 1 túi canvas!</a> <i class="pick-gift">Click vào đây để chọn quà tặng</i>.</span>
                                        </div>
                                        <div class="update-checkout">
                                            <div class="ajaxcart__subtotal pb-2">
                                                <div class="cart__subtotal" style="gap: 4px;">
                                                    <div class="cart__col-6">Tổng đơn hàng (tạm tính):</div>
                                                    <div class="text-right cart__totle"><span class="total-price">{{ number_format($totalPrice) }}đ</span></div>
                                                </div>
                                            </div>
                                            <div class="cart__btn-proceed-checkout-dt">
                                                <a href="{{Auth::check() ? route('checkout.index') : '#'}}">
                                                    <button type="button" style="display: flex; justify-content: center; align-items: center; gap: 6px; box-shadow: 0px 2px 0px 0px #CA8C12;" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Thanh toán">
                                                        <img class="minibanner_img" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/shield-security.svg?1711788816130" alt="icon">
                                                        <span class="text-payment">Thanh Toán Ngay</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="pdp-thong-tin">
                                            <div class="icon">
                                                <img class="lazyload" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/tag.svg?1711788816130" alt="freeship">
                                                <p class="title">
                                                    Sử dụng mã giảm giá ở bước thanh toán
                                                </p>
                                            </div>
                                            <div class="icon">

                                                <img class="lazyload" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/shield-tick.svg?1711788816130" alt="freeship">

                                                <p class="title">
                                                    Thông tin bảo mật và mã̃ hóa
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <img class="lazyload" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/timer.svg?1711788816130" alt="freeship">
                                                <p class="title">
                                                    <span>Giao hàng:</span> Từ 1 - 3 ngày
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <img class="lazyload" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/arrow-swap-horizontal.svg?1711788816130" alt="freeship">
                                                <p class="title">
                                                    <span>Miễn phí đổi trả:</span> tại 250+ cửa hàng trong 15 ngày
                                                </p>
                                            </div>
                                        </div>
                                        <div class="popup-confirm-payment">
                                            <div class="content">
                                                Có sản phẩm đang hết hàng, bạn có muốn tiếp tục mua các sản phẩm còn lại
                                                không?
                                            </div>
                                            <button class="button btn btn-back-to-cart">Xem lại giỏ hàng</button>
                                            <button class="button btn btn-go-to-payment">Tiếp tục</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        <div class="main container cartpcstyle">
                            <div class="wrap_background_aside margin-bottom-40">
                                <div class="cart-page">
                                    <div class="drawer__inner">
                                        <div class="CartPageContainer">
                                            <div class="cart--empty-message"><img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/blank_cart.svg?1713488617455" alt="cart">
                                                <p>Giỏ hàng của bạn trống</p><a href="/account" class="logincart">Đăng nhập/Đăng ký</a><span class="clearfix"></span><a class="buy-now" href="/collections/all">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<form id="deleteCart" method="post" action="{{route('cart.destroy')}}" class="mb-0">
    @csrf
    @method('DELETE')
    <input type="hidden" name="delete_cart_id" id="delete_cart_id" value="" />
</form>

<form id="updateCart" method="POST" action="{{route('cart.update')}}" class="mb-0">
    @csrf
    <input type="hidden" name="update_cart_id" id="update_cart_id" value="" />
    <input type="hidden" name="update_cart_quantity" id="update_cart_quantity" value="" />
</form>

@endsection