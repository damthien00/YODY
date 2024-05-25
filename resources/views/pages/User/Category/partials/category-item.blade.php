  <div class="swiper-slide item swiper-slide-active" role="group" style="order: 0; width: 232px; margin-right: 20px;">
      <a href="{{ route('shop.grid', ['slug' => $item->slug]) }}"><img src="{{asset($item->image)}}"><span>{{$item->category_name}}<span class="new">NEW</span></span></a>
  </div>