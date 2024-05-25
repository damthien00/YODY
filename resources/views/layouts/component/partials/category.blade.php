<!-- resources/views/layouts/component/partials/category.blade.php -->
<li class="li-item-1">
    <a class="a-img caret-down" href="{{ route('shop', ['slug' => $category->slug]) }}" title="{{ $category->category_name }}">
        {{ $category->category_name }}<i class="fa"></i>
    </a>
    @if($category->children->count() > 0)
    <ul>
        <li>
            <ul>
                @foreach($category->children as $child)
                @include('layouts.component.partials.category', ['category' => $child])
                @endforeach
            </ul>
        </li>
    </ul>
    @endif
</li>