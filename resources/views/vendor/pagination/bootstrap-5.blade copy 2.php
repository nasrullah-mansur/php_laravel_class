



@if ($paginator->hasPages())
<ul class="custom-pagination">

    {{-- Previous Link --}}
    @if ($paginator->onFirstPage())
        <li><a href="jvascript:void(0)">Prev</a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><a href="javascript:void(0)">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}">Next</a></li>
    @else
        <li><a href="javascript:void(0)">Next</a></li>
    @endif
</ul>

@endif


