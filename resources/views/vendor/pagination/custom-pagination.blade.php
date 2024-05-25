@if ($paginator->hasPages())
<div class="section pagenav">
    <nav class="clearfix relative nav_pagi w_100">
        <ul class="pagination clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item page-prev disabled">
                <a class="page-link" href="#"><img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/arrow-left.svg?1713514300491" alt="prev"></a>
            </li>
            @else
            <li class="page-item page-prev">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/arrow-left.svg?1713514300491" alt="prev"></a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item disabled"><a class="page-link" href="javascript:;">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="active page-item disabled"><a class="page-link" href="javascript:;">{{ $page }}</a></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item page-next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/arrrow-right.svg?1713514300491" alt="next"></a>
            </li>
            @else
            <li class="page-item page-next disabled">
                <a class="page-link" href="#"><img src="//bizweb.dktcdn.net/100/438/408/themes/946371/assets/arrrow-right.svg?1713514300491" alt="next"></a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif