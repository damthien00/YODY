  @extends('layouts.UserLayout')
  @section('content')
  <div class="section_cate">
      <div class="container">
          <h2 class="title-block">
              DANH MỤC NỔI BẬT
          </h2>
          <div class="list-cate">
              <div class="swiper-main swiper-container-initialized swiper-container-horizontal swiper-container-multirow" style="cursor: grab;">
                  <div class="swiper-wrapper" id="swiper-wrapper-a1e3ff86410b0ef11" aria-live="polite" style="width: 1260px; transform: translate3d(0px, 0px, 0px);">
                      @foreach($categoriesArray as $item)
                      <div class="swiper-slide item swiper-slide-active" role="group" style="order: 0; width: 232px; margin-right: 20px;margin-bottom:20px;">
                          <a href="{{ route('shop.grid', ['slug' => $item['slug']]) }}"><img src="{{asset($item['image'])}}"><span>{{$item['name']}}<span class="new">NEW</span></span></a>
                      </div>
                      @endforeach
                  </div>
                  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
              </div>
              <div class="swiper-pagination swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
          </div>
      </div>
  </div>
  <section class="section-product section-product-tab ajax-product scroll-down">
      <div class="col-product-wrap">
          <div class="content">
              <div class="module-title">
                  <div class="container">
                      <div class="tabs-title-ajax">
                          <h2 class="title-block">
                              ĐỀ XUẤT CHO BẠN
                          </h2>
                          <div class="title-desktop">
                              <ul class="tabs tabs-title ajax">
                                  <li class="tab-link has-content current" data-tab="tab-1" data-url="/ban-chay-nhat-cho-nam">
                                      Bán Chạy Nhất</li>
                                  <li class="tab-link " data-tab="tab-2" data-url="/hang-moi-ve-danh-cho-nam">Hàng Mới Về</li>
                                  <li class="tab-link " data-tab="tab-3" data-url="/ao-nam">Áo</li>
                                  <li class="tab-link " data-tab="tab-4" data-url="/quan-nam">Quần</li>
                                  <li class="tab-link " data-tab="tab-5" data-url="/do-mac-nha-nam">Bộ Đồ Nam</li>
                                  <li class="tab-link " data-tab="tab-6" data-url="/do-mac-trong-nam">Đồ Mặc Trong</li>
                                  <li class="tab-link " data-tab="tab-7" data-url="/phu-kien-nam">Phụ Kiện</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="container">
                  <div class="tab-1 tab-content current">
                      <div class="row">
                          @foreach ($bestSellingProductDetails as $product)
                          <div class="col-xl-2 col-lg-3 col-md-3 col-6">
                              <div class="item_product_main">
                                  <div class="wrap-product-sold-info">
                                      <div class="product-review">
                                          <img width="10" height="10" src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/icon_start.svg?1713844144226" alt=""> <span class="number-star-29896118">5</span>
                                      </div>
                                      <div class="product-sold">
                                          <div class="line"></div>
                                          Đã bán <span class="number-product-sold number-product-sold-29896118">594</span>
                                      </div>
                                  </div>
                                  <form action="/cart/add" method="post" enctype="multipart/form" class="variants product-action wishItem">
                                      <div class="product-thumbnail">
                                          <span class="new-tag">MỚI</span>
                                          <a class="image_thumb" href="{{ route('product-detail', ['id' => $product->id, 'variant_id' => $product->variants->first()->id]) }}">
                                              <img id='image_thumb_{{$product->id}}' class="lazyload loaded" src="{{ asset($product->variants()->first()->variant_image_detail()->first()->image) }}" data-src="//bizweb.dktcdn.net/thumb/large/100/438/408/products/tsk7134-tvx-4.jpg?v=1711504825337" alt="Áo Thun Trẻ Em Cotton Compact Phối In Nổi Tai Nghe" data-was-processed="true">
                                          </a>
                                          <a href="#" class="setWishlist btn-views d-none" data-wish="ao-thun-tre-em-phoi-in-noi-tai-nghe" tabindex="0" title="Thêm vào yêu thích">
                                              <img width="22" height="20" src="//bizweb.dktcdn.net/100/438/408/themes/943787/assets/heart_ico.svg?1711766421559" alt="">
                                          </a>
                                      </div>
                                      <div class="product-info product-info-35159375">
                                          <h3 class="product-name">
                                              <a href="/ao-thun-tre-em-phoi-in-noi-tai-nghe" title="">
                                                  {{ $product->product_name }}
                                              </a>
                                          </h3>
                                          <div class="bottom-action">
                                              <div class="price-box">
                                                  <span class="price check_price_new">{{ number_format($product->variants->first()->retail_price) }}&nbsp;đ</span>
                                                  <span class="compare-price check_price_new_giam" style="display: none;"></span>
                                              </div>
                                          </div>
                                          <div class="sw-group">
                                              <div class="option-swath">
                                                  <div class="swatch-color-wrapper position-relative">
                                                      <div class="swatch-color  swatch clearfix" style="transform: translateX(0px);">
                                                          @php
                                                          $usedColors = [];
                                                          @endphp
                                                          @foreach ($product->variants as $variant)
                                                          @if (!in_array($variant->color_id, $usedColors))
                                                          @php
                                                          $usedColors[] = $variant->color_id;
                                                          @endphp
                                                          <div class="swatch-element color offset-element" data-productid="'{{$product->id}}'" onclick="changeMainImage('{{asset(asset($variant->variant_image_detail[0]->image)) }}','{{$product->id}}',null)">
                                                              <label style="background-image:url('{{asset($variant->variant_image_detail[0]->image)}}');background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="399.000đ" data-compare_at_price="399.000đ" data-scolor="//bizweb.dktcdn.net/thumb/large/100/438/408/products/aln3028-tga-qjn3076-xdm-7.jpg?v=1711420488480"></label>
                                                          </div>
                                                          @endif
                                                          @endforeach
                                                      </div>
                                                  </div>
                                                  <span class=""></span>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          @endforeach
                      </div>
                      <a href="ban-chay-nhat-cho-nam" class="more">Xem thêm</a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  @endsection