<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/user/css/checkout.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/checkout-vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/flag-icons.min.css') }}">

    <title>Document</title>
    <style>
        .btn-logout {
            display: flex;
            gap: 7px;
            align-items: center;
        }
    </style>
</head>

<body>
    <div id="checkout" class="content">
        <form id="checkoutForm" method="POST" action="{{ route('online.payment') }}">
            @csrf
            @method('POST')
            <div class="wrap">
                <main class="main">
                    <header class="main__header">
                        <div class="logo logo--center">
                            <a href="/">
                                <img class="logo__image  logo__image--small " alt="YODY - Look Good - Feel Good" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/checkout_logo.png?1711788816130">
                            </a>
                        </div>
                    </header>
                    <div class="main__content">
                        <article class="animate-floating-labels row">
                            <div class="col col--two">
                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>
                                                Thông tin giao hàng
                                            </h2>
                                            @if(auth()->check())
                                            <a class="btn-logout" href="/account/logout?returnUrl=/checkout/ba5af62259f7429688fffdd2a34ff51c">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="m17 7-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"></path>
                                                </svg>
                                                <span>Đăng xuất</span>
                                            </a>
                                            @else
                                            <a href="/account/login?returnUrl=/checkout/ba5af62259f7429688fffdd2a34ff51c">
                                                <i class="fa fa-user-circle-o fa-lg"></i>
                                                <span>Đăng nhập </span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="section__content">
                                    </div>
                                </section>
                                <div class="fieldset">
                                    <div class="field  field--show-floating-label">
                                        <div class="field__input-wrapper">
                                            <label for="cus_name" class="field__label">Họ và tên:</label>
                                            <input name="cus_name" id="cus_name" value='{{$user->name}}' type="text" class="field__input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="field  field--show-floating-label">
                                        <div class="field__input-wrapper">
                                            <label for="cus_phone" class="field__label">Số điện thoại</label>
                                            <input name="cus_phone" id="cus_phone" type="text" class="field__input" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="field  field--show-floating-label">
                                        <div class="field__input-wrapper">
                                            <label for="cus_address" class="field__label">Địa chỉ:</label>
                                            <input name="cus_address" id="cus_address" value='' type="text" class="field__input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="field field--show-floating-label ">
                                        <div class="field__input-wrapper field__input-wrapper--select2">
                                            <label for="cus_province" class="field__label">Tỉnh thành</label>
                                            <select name="cus_province" id="province" size="1" class="field__input field__input--select select2-hidden-accessible" data-bind="shipping.province" value="" data-address-type="province" data-address-zone="shipping" data-select2-id="select2-data-shippingProvince" tabindex="-1" aria-hidden="true">
                                                <option value="">
                                                    ---</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field field--show-floating-label ">
                                        <div class="field__input-wrapper field__input-wrapper--select2">
                                            <label for="cus_district" class="field__label">
                                                Quận huyện
                                            </label>
                                            <select name="cus_district" id="district" class="field__input field__input--select select2-hidden-accessible" data-bind="shipping.district" value="">
                                                <option selected value="">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field field--show-floating-label ">
                                        <div class="field__input-wrapper field__input-wrapper--select2">
                                            <label for="cus_ward" class="field__label">
                                                Phường xã
                                            </label>
                                            <select name="cus_ward" id="ward" class="field__input field__input--select select2-hidden-accessible">
                                                <option selected value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="field__input-wrapper">
                                            <label for="note" class="field__label">
                                                Ghi chú (tùy chọn)
                                            </label>
                                            <textarea name="OrderDescription" id="note" class="field__input" value="  "></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col--two">
                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                                                Vận chuyển
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content" data-tg-refresh="refreshShipping" id="shippingMethodList" data-define="{isAddressSelecting: false, shippingMethods: []}">
                                        <div class="content-box hide" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; !isLoadingShippingError">
                                            <div class="content-box__row" data-define-array="{shippingMethods: {name: '693924_0,0 VND', textPrice: 'Miễn phí', textDiscountPrice: 'Miễn phí', subtotalPriceWithShippingFee: '648.000đ'}}">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input type="radio" class="input-radio" name="shippingMethod" id="shippingMethod-693924_0" value="693924_0,0 VND" data-bind="shippingMethod">
                                                    </div>
                                                    <label for="shippingMethod-693924_0" class="radio__label">
                                                        <span class="radio__label__primary">
                                                            <span>Miễn phí vận chuyển đơn hàng từ 199k</span>
                                                        </span>
                                                        <span class="radio__label__accessory">
                                                            <span class="content-box__emphasis price">
                                                                Miễn phí
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert--info" data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
                                            Vui lòng nhập thông tin giao hàng
                                        </div>
                                    </div>
                                </section>
                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                Thanh toán
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="content-box" data-define="{paymentMethod: undefined}">
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-551438" type="radio" class="input-radio" data-bind="paymentMethod" value="551438" data-provider-id="16">
                                                    </div>
                                                    <label for="paymentMethod-551438" class="radio__label">
                                                        <span class="radio__label__primary">Thanh toán qua thẻ thanh toán,
                                                            ứng dụng ngân hàng VNPAY</span>
                                                        <span class="radio__label__accessory">
                                                            <span class="radio__label__icon">
                                                                <i class="payment-icon payment-icon--16"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-534152" type="radio" class="input-radio" data-bind="paymentMethod" value="534152" data-provider-id="19">
                                                    </div>
                                                    <label for="paymentMethod-534152" class="radio__label">
                                                        <span class="radio__label__primary">Thanh toán qua VNPAY-QR</span>
                                                        <span class="radio__label__accessory">
                                                            <span class="radio__label__icon">
                                                                <i class="payment-icon payment-icon--19"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-525095" type="radio" class="input-radio" data-bind="paymentMethod" value="525095" data-provider-id="21">
                                                    </div>
                                                    <label for="paymentMethod-525095" class="radio__label">
                                                        <span class="radio__label__primary">Thanh toán qua Ví MoMo</span>
                                                        <span class="radio__label__accessory">
                                                            <span class="radio__label__icon">
                                                                <i class="payment-icon payment-icon--21"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-516910" type="radio" class="input-radio" data-bind="paymentMethod" value="516910" checked="" data-provider-id="4">
                                                    </div>
                                                    <label for="paymentMethod-516910" class="radio__label">
                                                        <span class="radio__label__primary">Thanh toán khi nhận hàng
                                                            (COD)</span>
                                                        <span class="radio__label__accessory">
                                                            <span class="radio__label__icon">
                                                                <i class="payment-icon payment-icon--4"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="content-box__row__desc" data-bind-show="paymentMethod == 516910" data-provider-id="4">
                                                    <p>Bạn chỉ phải thanh toán khi nhận được hàng</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </article>
                        <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                            <button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
                                <span class="spinner-label">ĐẶT HÀNG</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                    <use href="#spinner"></use>
                                </svg>
                            </button>
                            <a href="/cart" class="previous-link">
                                <i class="previous-link__arrow">❮</i>
                                <span class="previous-link__content">Quay về giỏ hàng</span>
                            </a>
                        </div>
                        <div id="common-alert" data-tg-refresh="refreshError">
                            <div class="alert alert--danger hide-on-desktop hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
                        </div>
                    </div>
                </main>
                <aside class="sidebar">
                    <div class="sidebar__header">
                        <h2 class="sidebar__title">
                            Đơn hàng (2 sản phẩm)
                        </h2>
                    </div>
                    <div class="sidebar__content">
                        <div id="order-summary" class="order-summary order-summary--is-collapsed">
                            <div class="order-summary__sections">
                                <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                    <table class="product-table">
                                        <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                        <thead class="product-table__header">
                                            <tr>
                                                <th>
                                                    <span class="visually-hidden">Ảnh sản phẩm</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Mô tả</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Sổ lượng</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Đơn giá</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                            <tr class="product">
                                                <td class="product__image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail__wrapper">
                                                            <img src="{{ asset($cart['image'])}}" alt="  {{$cart['name']}}" class="product-thumbnail__image">
                                                        </div>
                                                        <span class="product-thumbnail__quantity">{{$cart['quantity']}}</span>
                                                    </div>
                                                </td>
                                                <th class="product__description">
                                                    <span class="product__description__name">
                                                        {{$cart['name']}}
                                                    </span>
                                                    <span class="product__description__property">
                                                        {{$cart['color']}} / {{$cart['size']}}
                                                    </span>
                                                </th>
                                                <td class="product__quantity visually-hidden"><em>Số lượng:</em> 1</td>
                                                <td class="product__price">
                                                    {{number_format($cart['price'])}}đ
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-summary__section order-summary__section--discount-code" data-tg-refresh="refreshDiscount" id="discountCode">
                                    <h3 class="visually-hidden">Mã khuyến mại</h3>
                                    <div class="edit_checkout animate-floating-labels">
                                        <div class="fieldset">
                                            <div class="field ">
                                                <div class="field__input-btn-wrapper">
                                                    <div class="field__input-wrapper">
                                                        <label for="reductionCode" class="field__label">Nhập mã giảm
                                                            giá</label>
                                                        <input name="reductionCode" id="reductionCode" type="text" class="field__input" autocomplete="off" data-bind-disabled="isLoadingReductionCode" data-bind-event-keypress="handleReductionCodeKeyPress(event)" data-define="{reductionCode: null}" data-bind="reductionCode">
                                                    </div>
                                                    <button class="field__input-btn btn spinner btn--disabled" type="button" data-bind-disabled="isLoadingReductionCode || !reductionCode" data-bind-class="{'spinner--active': isLoadingReductionCode, 'btn--disabled': !reductionCode}" data-bind-event-click="applyReductionCode()" disabled="">
                                                        <span class="spinner-label">Áp dụng</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                            <use href="#spinner"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <p class="field__message field__message--error field__message--error-always-show hide" data-bind-show="!isLoadingReductionCode &amp;&amp; isLoadingReductionCodeError" data-bind="loadingReductionCodeErrorMessage">Có lỗi xảy ra khi áp dụng
                                                    khuyến mãi. Vui lòng thử lại</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element" data-define="{subTotalPriceText: '648.000đ'}" data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                                    <table class="total-line-table">
                                        <caption class="visually-hidden">Tổng giá trị</caption>
                                        <thead>
                                            <tr>
                                                <td><span class="visually-hidden">Mô tả</span></td>
                                                <td><span class="visually-hidden">Giá tiền</span></td>
                                            </tr>
                                        </thead>
                                        <tbody class="total-line-table__tbody">
                                            <tr class="total-line total-line--subtotal">
                                                <th class="total-line__name">
                                                    Tạm tính
                                                </th>
                                                <td class="total-line__price">
                                                    <input type="hidden" name='Amount' value='{{$totalPrice}}' />
                                                    {{number_format($totalPrice)}}đ
                                                </td>
                                            </tr>
                                            <tr class="total-line total-line--shipping-fee">
                                                <th class="total-line__name">
                                                    Phí vận chuyển
                                                </th>
                                                <td class="total-line__price" data-bind="getTextShippingPrice()">Miễn phí
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="total-line-table__footer">
                                            <tr class="total-line payment-due">
                                                <th class="total-line__name">
                                                    <span class="payment-due__label-total">
                                                        Tổng cộng
                                                    </span>
                                                </th>
                                                <td class="total-line__price">
                                                    <span class="payment-due__price" data-bind="getTextTotalPrice()">{{number_format($totalPrice)}}đ</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                    <button type="submit" class="btn btn-checkout spinner" name='payment' value='2'>
                                        <span class="spinner-label">ĐẶT HÀNG</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                            <use href="#spinner"></use>
                                        </svg>
                                    </button>
                                    <a href="/cart" class="previous-link">
                                        <i class="previous-link__arrow">❮</i>
                                        <span class="previous-link__content">Quay về giỏ hàng</span>
                                    </a>
                                </div>
                                <div id="common-alert-sidebar" data-tg-refresh="refreshError">
                                    <div class="alert alert--danger hide-on-mobile hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(e) {
            // Lấy danh sách tỉnh/thành phố khi trang được tải
            $.ajax({
                url: '/provinces',
                method: 'GET',
                success: function(data) {
                    data.forEach(element => {
                        var key = element.code;
                        var value = element.name;
                        $('#province').append($("<option></option>")
                            .attr("value", key)
                            .text(value));
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });

            // Khi chọn một tỉnh/thành phố
            $('#province').change(function(e) {
                var code = $(this).val();
                // Lấy danh sách quận/huyện của tỉnh/thành phố đã chọn
                getListDistrict(code);
            });

            // Khi chọn một quận/huyện
            $('#district').change(function(e) {
                var code = $(this).val();
                // Lấy danh sách phường/xã của quận/huyện đã chọn
                getListWard(code);
            });

            // Hàm lấy danh sách quận/huyện
            function getListDistrict(code) {
                $.ajax({
                    url: '/districts/' + code,
                    method: 'GET',
                    success: function(data) {
                        $('#district').empty();
                        data.forEach(element => {
                            var key = element.code;
                            var value = element.name;
                            $('#district').append($("<option></option>")
                                .attr("value", key)
                                .text(value));
                        });
                    }
                });
            }

            // Hàm lấy danh sách phường/xã
            function getListWard(code) {
                $.ajax({
                    url: '/wards/' + code,
                    method: 'GET',
                    success: function(data) {
                        $('#ward').empty();
                        data.forEach(element => {
                            var key = element.code;
                            var value = element.name;
                            $('#ward').append($("<option></option>")
                                .attr("value", key)
                                .text(value));
                        });
                    }
                });
            }
        });
    </script>
</body>

</html>