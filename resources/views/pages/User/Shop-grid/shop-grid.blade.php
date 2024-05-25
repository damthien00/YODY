  @extends('layouts.UserLayout')
  @section('content')
  <link rel="stylesheet" href="{{ asset('assets/user/css/collection.css')}}">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <div class="section wrap_background">
      <div class="flash-title d-block d-md-none">Dễ dàng đổi, trả tại <b>260+</b> cửa hàng trên toàn quốc.</div>
      <section class="bread-crumb d-none d-md-block">
          <div class="container">
              <div class="row">
                  <div class="col-12 a-left">
                      <ul class="breadcrumb">
                          <li class="home d-none">
                              <a href="/"><span>Trang chủ</span></a>
                          </li>
                          @foreach($breadcrumbs as $breadcrumb)
                          @if ($loop->last)
                          <li class="last">
                              <strong><span>{{ $breadcrumb->category_name }}</span></strong>
                          </li>
                          @else
                          <li>
                              <a href="/{{ $breadcrumb->slug }}" title="{{ $breadcrumb->category_name }}">
                                  <span>{{ $breadcrumb->category_name }}</span>
                              </a>
                          </li>
                          @endif
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
      </section>
      <div class="container ">
          <div class="bg_collection section">
              <div class="row">
                  <aside class="dqdt-sidebar sidebar left-content col-lg-3 col-md-4 col-sm-4">
                      <div class="wrap_background_aside asidecollection">
                          <div class="filter-content aside-filter">
                              <div class="title-aside-filter d-block d-md-none">
                                  <span class="close_filter"><img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/i-close.svg?1713514300491" width="16" height="16"></span>BỘ LỌC
                              </div>
                              <div class="filter-container">
                                  <div class="filter-container__selected-filter" style="display: none;">
                                      <div class="filter-container__selected-filter-header clearfix">
                                          <span class="filter-container__selected-filter-header-title">Bạn chọn</span>
                                          <a href="javascript:void(0)" class="filter-container__clear-all d-lg-none">Bỏ hết </a>
                                          <a href="javascript:void(0)" class="filter-container__clear-all close_destop d-none d-lg-block">Bỏ hết</a>
                                      </div>
                                      <div class="filter-container__selected-filter-list">
                                          <ul></ul>
                                      </div>
                                  </div>
                                  <aside class="aside-item filter-mb aside-itemxx filter-tag-style-1 filter-type clearfix" id="accordionExample">
                                      <div class="aside-title" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          <h2 class="title-filter title-head margin-top-0"><span>Loại sản phẩm</span></h2>
                                      </div>
                                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                          <div class="aside-content filter-group">
                                              <ul class="maxheight">
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label for="filter-ao-ba-lo-nam">
                                                              <input type="checkbox" id="cate" value="" name="categories">
                                                              <span class="itemFitter">{{$category->category_name}}</span>
                                                          </label>
                                                      </span>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </aside>
                                  <div class="move-fillter">
                                      <aside class="aside-item filter-mb aside-itemxx filter-tag-style-1 filter-type clearfix" id="accordionExample2">
                                          <div class="aside-title" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                              <h2 class="title-filter title-head margin-top-0"><span>Kích thước</span></h2>
                                          </div>
                                          <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                                              <div class="aside-content filter-group">
                                                  <ul class="ul-filter-size maxheight">
                                                      @foreach($sizes as $size)
                                                      <li class="filter-item filter-item--check-box">
                                                          <span>
                                                              <label for="filter-{{ $size->size_name }}">
                                                                  <input type="checkbox" id="filter-{{ $size->size_name }}" name="sizes" @if(in_array($size->size_name, explode(',', $q_sizes)))
                                                                  checked="checked"
                                                                  @endif
                                                                  value="{{ $size->size_name }}"
                                                                  onchange="filterProductsBySize()">
                                                                  <span>{{ $size->size_name }}</span>
                                                              </label>
                                                          </span>
                                                      </li>
                                                      @endforeach
                                                  </ul>
                                                  <div>
                                                      <span class="finish ul-filter-btn-color d-lg-none">Áp dụng</span>
                                                  </div>
                                                  <p class="showmore more text-center">
                                                      Xem thêm
                                                      <img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/more_filter.svg?1713514300491" alt="more">
                                                  </p>
                                              </div>
                                          </div>
                                      </aside>
                                      <aside class="aside-item filter-mb aside-itemxx filter-tag-style-1 filter-type clearfix" id="accordionExample3">
                                          <div class="aside-title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                              <h2 class="title-filter title-head margin-top-0"><span>Màu sắc</span></h2>
                                          </div>
                                          <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                                              <div class="aside-content filter-group">
                                                  <ul class="ul-color ul-filter-color maxheight">
                                                      @foreach($colors as $color)
                                                      <li class="filter-item color filter-item--check-box">
                                                          <span>
                                                              <label for="filter-{{ $color->color_name }}">
                                                                  <input type="checkbox" id="filter-{{ $color->color_name }}" name="colors" @if(in_array($color->color_name, explode(',', $q_colors)))
                                                                  checked="checked"
                                                                  @endif
                                                                  value="{{ $color->color_name }}"
                                                                  onchange="filterProductsByColor()">
                                                                  <span>{{ $color->color_name }}</span>
                                                              </label>
                                                          </span>
                                                      </li>
                                                      @endforeach
                                                  </ul>
                                                  <div>
                                                      <span class="finish ul-filter-btn-color d-lg-none">Áp dụng</span>
                                                  </div>
                                                  <p class="showmore more text-center">
                                                      Xem thêm
                                                      <img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/more_filter.svg?1713514300491" alt="more">
                                                  </p>
                                              </div>
                                          </div>
                                      </aside>
                                  </div>
                                  <aside class="aside-item filter-mb filter-price f-left clearfix" id="accordionExample4">
                                      <div class="aside-title" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                          <h2 class="title-filter title-head margin-top-0"><span>Khoảng giá (VNĐ)</span></h2>
                                      </div>
                                      <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                                          <div class="aside-content margin-top-0 filter-group content_price">
                                              <ul class="ul-filter-price">
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label data-filter="100-000d" for="filter-duoi-100-000d">
                                                              <input type="checkbox" name='prices' id="filter-duoi-100-000d" data-group="Khoảng giá" data-field="price_min" data-text="Dưới 100.000đ" value="(<100000)" data-operator="OR">
                                                              <i class="fa"></i>
                                                              Nhỏ hơn 100.000đ
                                                          </label>
                                                      </span>
                                                  </li>
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label data-filter="200-000d" for="filter-100-000d-200-000d">
                                                              <input type="checkbox" name='prices' id="filter-100-000d-200-000d" data-group="Khoảng giá" data-field="price_min" data-text="100.000đ - 200.000đ" value="(>=100000 AND <=200000)" data-operator="OR">
                                                              <i class="fa"></i>
                                                              Từ 100.000đ - 200.000đ
                                                          </label>
                                                      </span>
                                                  </li>
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label data-filter="350-000d" for="filter-200-000d-350-000d">
                                                              <input type="checkbox" name='prices' id="filter-200-000d-350-000d" data-group="Khoảng giá" data-field="price_min" data-text="200.000đ - 350.000đ" value="(>=200000 AND <=350000)" data-operator="OR">
                                                              <i class="fa"></i>
                                                              Từ 200.000đ - 350.000đ
                                                          </label>
                                                      </span>
                                                  </li>
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label data-filter="500-000d" for="filter-350-000d-500-000d">
                                                              <input type="checkbox" name='prices' id="filter-350-000d-500-000d" data-group="Khoảng giá" data-field="price_min" data-text="350.000đ - 500.000đ" value="(>=350000 AND <=500000)" data-operator="OR">
                                                              <i class="fa"></i>
                                                              Từ 350.000đ - 500.000đ
                                                          </label>
                                                      </span>
                                                  </li>
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label data-filter="700-000d" for="filter-500-000d-700-000d">
                                                              <input type="checkbox" name='prices' id="filter-500-000d-700-000d" data-group="Khoảng giá" data-field="price_min" data-text="500.000đ - 700.000đ" value="(>=500000 AND <=700000)" data-operator="OR">
                                                              <i class="fa"></i>
                                                              Từ 500.000đ - 700.000đ
                                                          </label>
                                                      </span>
                                                  </li>
                                                  <li class="filter-item filter-item--check-box filter-item--green">
                                                      <span>
                                                          <label data-filter="700-000d" for="filter-tren700-000d">
                                                              <input type="checkbox" name='prices' id="filter-tren700-000d" data-group="Khoảng giá" data-field="price_min" data-text="Trên 700.000đ" value="(>700000)" data-operator="OR">
                                                              <i class="fa"></i>
                                                              Lớn hơn 700.000đ
                                                          </label>
                                                      </span>
                                                  </li>
                                              </ul>
                                              <p class="showmore more text-center">
                                                  Xem thêm
                                                  <img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/more_filter.svg?1714054582943" alt="more">
                                              </p>
                                          </div>
                                      </div>
                                  </aside>

                                  <div class="end_fillter d-block d-md-none">
                                      <span class="text">156 sản phẩm</span>
                                      <div>
                                          <span class="end finish close_and_search d-none d-lg-block">Áp dụng</span>
                                          <span class="end finish close_and_search_mobile d-lg-none">Áp dụng</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </aside>
                  <div class="main_container collection col-lg-9 col-md-12 col-sm-12">
                      <div class="section_sort clearfix no-child scroll-up" style="top: 0px;">
                          <span class="count">{{$products->count()}} sản phẩm</span>
                          <div class="sort-cate-left">
                              <label class="title">Sắp xếp theo<span class="text">Mặc định</span></label>
                              <ul>
                                  <li class="btn-quick-sort default {{ $orderBy == 'default' ? 'active' : '' }}">
                                      <a href="javascript:;" onclick="sortby('default')" title="Mặc định"><i></i>Mặc định</a>
                                  </li>
                                  <li class="btn-quick-sort alpha-asc {{ $orderBy == 'alpha-asc' ? 'active' : '' }}">
                                      <a href="javascript:;" onclick="sortby('alpha-asc')" title="Từ A-Z"><i></i>Từ A-Z</a>
                                  </li>
                                  <li class="btn-quick-sort alpha-desc {{ $orderBy == 'alpha-desc' ? 'active' : '' }}">
                                      <a href="javascript:;" onclick="sortby('alpha-desc')" title="Từ Z-A"><i></i>Từ Z-A</a>
                                  </li>
                                  <li class="btn-quick-sort price-asc {{ $orderBy == 'price-asc' ? 'active' : '' }}">
                                      <a href="javascript:;" onclick="sortby('price-asc')" title="Rẻ nhất"><i></i>Rẻ nhất</a>
                                  </li>
                                  <li class="btn-quick-sort price-desc {{ $orderBy == 'price-desc' ? 'active' : '' }}">
                                      <a href="javascript:;" onclick="sortby('price-desc')" title="Giá giảm dần"><i></i>Giá giảm dần</a>
                                  </li>
                                  <li class="btn-quick-sort created-desc {{ $orderBy == 'created-desc' ? 'active' : '' }}">
                                      <a href="javascript:;" onclick="sortby('created-desc')" title="Mới nhất"><i></i>Mới nhất</a>
                                  </li>
                              </ul>
                          </div>
                          <div class="filter-container">
                          </div>
                          <span class="open-filter-mb">Bộ lọc</span>
                      </div>
                      <div class="category-products products">
                          <section class="products-view products-view-grid collection_reponsive list_hover_pro aaa">
                              <div>
                                  <div class="a-center loading_collect d-none">
                                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                          <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                                              <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                                              <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                                              <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                                          </rect>
                                          <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                                              <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                                              <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                                              <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                                          </rect>
                                          <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                                              <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                                              <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                                              <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                                          </rect>
                                      </svg>
                                  </div>
                              </div>
                              <div class="row list-collect">
                                  @if($products->isEmpty())
                                  <div class="alert alert-warning  green-alert section" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                      Không có sản phẩm nào trong danh mục này.
                                  </div>
                                  @else
                                  @foreach ($products as $product)
                                  <div class="col-6 col-md-4 col-lg-4 col-xl-3 product-col">
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
                                                  <a href="{{ route('product-detail', ['id' => $product->id, 'variant_id' => $product->variants->first()->id]) }}">
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
                                  @endif
                              </div>
                              <div class="pagination-wrapper">
                                  {{ $products->links('vendor.pagination.custom-pagination') }}
                              </div>
                          </section>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <form id="frmFilter" method="GET">
      <input type="hidden" name="q_prices" id="q_prices" value="{{$q_prices}}">
      <input type="hidden" name="q_sizes" id="q_sizes" value="{{$q_sizes}}">
      <input type="hidden" name="q_colors" id="q_colors" value="{{$q_colors}}">
  </form>
  <script>
      function updateURLParameter(url, param, paramVal) {
          var newAdditionalURL = "";
          var tempArray = url.split("?");
          var baseURL = tempArray[0];
          var additionalURL = tempArray[1];
          var temp = "";
          if (additionalURL) {
              tempArray = additionalURL.split("&");
              for (var i = 0; i < tempArray.length; i++) {
                  if (tempArray[i].split('=')[0] !== param) {
                      newAdditionalURL += temp + tempArray[i];
                      temp = "&";
                  }
              }
          }
          var rowsTxt = temp + "" + param + "=" + paramVal;
          return baseURL + "?" + newAdditionalURL + rowsTxt;
      }

      function filterProductsByColor() {
          var colors = '';
          $("input[name='colors']:checked").each(function() {
              if (colors == '') {
                  colors += this.value;
              } else {
                  colors += "," + this.value;
              }
          });
          var url = updateURLParameter(window.location.href, 'q_colors', colors);
          window.location.href = url;
      }

      function filterProductsBySize() {
          var sizes = '';
          $("input[name='sizes']:checked").each(function() {
              if (sizes == '') {
                  sizes += this.value;
              } else {
                  sizes += "," + this.value;
              }
          });
          var url = updateURLParameter(window.location.href, 'q_sizes', sizes);
          window.location.href = url;
      }

      function filterProductsByPrice() {
          var prices = '';
          $("input[name='prices']:checked").each(function() {
              if (prices == '') {
                  prices += this.value;
              } else {
                  prices += "," + this.value;
              }
          });
          var url = updateURLParameter(window.location.href, 'q_prices', prices);
          window.location.href = url;
      }

      function sortby(orderBy) {
          var url = updateURLParameter(window.location.href, 'orderBy', orderBy);
          window.location.href = url;
      }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  @endsection