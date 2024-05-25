@extends('layouts.AccountLayout')
@section('content')

<section class="login page_order">
    <div class="container">
        <div class="row">
            <div class="col-left-ac">
                <div class="block-account">
                    <div class="info info-1">
                        <img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/account_ava.jpg?1713495880758" alt="Thiện">
                        <p>Thiện</p>
                        <a class="click_logout" href="/account/logout">Đăng xuất</a>
                    </div>
                    <ul>
                        <li>
                            <a class="title-info" href="{{route('account')}}">Tài khoản của tôi</a>
                        </li>
                        <li>
                            <a disabled="disabled" class="title-info active" href="{{route('account.order')}}">Đơn hàng của tôi</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.change-password')}}">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.address')}}">Sổ địa chỉ</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.order')}}">Đã xem gần đây</a>
                        </li>
                        <li>
                            <a class="title-info" href="{{route('account.wishlist')}}">Sản phẩm yêu thích</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-right-ac">
                <div class="head-title clearfix">
                    <h1 class="has-back"><a class="back" href="/account/orders"></a>Chi tiết đơn hàng #{{$order->id}}</h1>
                    <span class="note order_date">Ngày tạo: {{$order->created_at}}</span>
                </div>
                <div class="details">
                    <div class="payment_status">
                        <span class="note">Trạng thái thanh toán:</span>
                        @if($order->payment_status == 1)
                        <span class="status_pending">
                            <span class="span_pending" style="color: #fcaf17"><strong>Đã thanh toán</strong></span>
                        </span>
                        @else
                        <span class="status_pending">
                            <span class="span_pending" style="color: #fcaf17"><strong>Chưa thanh toán</strong></span>
                        </span>
                        @endif
                    </div>
                    <div class="shipping_status">
                        <span class="note">Trạng thái vận chuyển:</span>
                        @if($order->order_status == 1)
                        <b style="color:#fcaf17" class="span_">
                            Đã giao
                        </b>
                        @else
                        <b style="color:#fcaf17" class="span_">
                            Đang xử lí
                        </b>
                        @endif
                    </div>
                    <div class="code_order">
                        <span class="note">Mã vận đơn:</span>
                        <a style="color:#2196f3;font-weight:bold;text-transform: uppercase;" href=""></a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 body_order">
                            <div class="box-address">
                                <h2 class="title-head">Địa chỉ giao hàng</h2>
                                <div class="address box-des">
                                    <p> <strong>{{$order->customer->customer_name}}</strong></p>
                                    <p>Địa chỉ:
                                        {{$order->customer->address}},{{$order->customer->ward->name}},{{$order->customer->district->name}},{{$order->customer->province->name}}
                                    </p>
                                    <p>Số điện thoại: {{$order->customer->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 body_order">
                            <div class="box-address">
                                <h2 class="title-head">
                                    Thanh toán
                                </h2>
                                <div class="box-des">
                                    <p>
                                        Thanh toán qua thẻ thanh toán, ứng dụng ngân hàng VNPAY
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 body_order">
                            <div class="box-address">
                                <h2 class="title-head">
                                    Ghi chú
                                </h2>
                                <div class="box-des">
                                    <p>
                                        Không có ghi chú
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="table-order">
                                <div class="table-responsive-block table_mobile">
                                    <table id="order_details" class="table table-cart">
                                        <thead class="thead-default theborder">
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->order_details as $order_detail)
                                            <tr>
                                                <td class="link" data-title="Tên">
                                                    <div class="image_order">
                                                        <a title="Quần Kaki Nam Siêu Co Giãn" href="/quan-kaki-nam-sieu-co-gian-regular"><img src="{{ asset($order_detail->variant->variant_image_detail->first()->image) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="content_right">
                                                        <a class="title_order" href="/quan-kaki-nam-sieu-co-gian-regular" title="{{$order_detail->product->product_name}}">{{$order_detail->product->product_name}}</a>
                                                        <p style="color:#828282;font-size:12px;">
                                                            {{$order_detail->variant->color->color_name}} / {{$order_detail->variant->size->size_name}}
                                                        </p>
                                                        <p class="sku_order">
                                                            Mã sản phẩm: {{$order_detail->variant->sku}}
                                                        </p>
                                                        <div class="bottom_mb">
                                                            <div class="quantity_mb">
                                                                x{{$order_detail->quantity}}
                                                            </div>
                                                            <div class="sum_mb">
                                                                409.000đ
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-title="Giá" class="price">
                                                    {{number_format($order_detail->variant->retail_price)}}đ
                                                    <!-- <span style="text-decoration: line-through;color: #a9a9a9;display:block">459.000đ</span> -->
                                                </td>
                                                <td data-title="Số lượng">1</td>
                                                <td data-title="Tổng" class="price numeric">
                                                    {{number_format($order_detail->variant->retail_price * $order_detail->quantity)}}đ
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <table class="table totalorders">
                                    <tfoot>
                                        <tr class="order_summary discount">
                                            <td>Khuyến mãi</td>
                                            <td class="total money right">100.000đ</td>
                                        </tr>
                                        <tr class="order_summary ">
                                            <td colspan="">Phí vận chuyển</td>
                                            <td class="total money right">
                                                0đ
                                                (Miễn phí vận chuyển đơn hàng từ 498k)
                                            </td>
                                        </tr>
                                        <tr class="order_summary order_total">
                                            <td>Tổng tiền</td>
                                            <td class="right"><strong style="color:#fcaf17;font-size:16px;"> {{number_format($order->total_price)}}đ</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('account.order')}}" class="back">QUAY LẠI</a>
            </div>
        </div>
    </div>
</section>

@endsection