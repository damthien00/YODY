<!-- resources/views/search/results_partial.blade.php -->
@if($searchProducts->isEmpty())
<p>No results found.</p>
@else
@foreach($searchProducts as $item)
<a class="clearfix item_search" href="{{ route('product-detail', ['id' => $item->id, 'variant_id' => $item->variants->first()->id]) }}" title="{{ $item->product_name }}">
    <div class="img"><img src="{{ asset($item->variants()->first()->variant_image_detail()->first()->image) }}" alt="{{ $item->product_name }}"></div>
    <div class="d-title name_SP">{{ $item->product_name }}</div>
    <div class="d-title d-price_init">{{ number_format($item->variants->first()->retail_price) }}đ</div>
</a>
@endforeach
@endif