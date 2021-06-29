@if ($paginator->hasPages())
    <div class="store-filter clearfix">
        <span class="store-qty">{!! __('Showing') !!} {{ $paginator->lastItem() }} - {{ $paginator->total() }} {!! __('products') !!}</span>
        <ul class="store-pagination">
            @if (!$paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">{{ $page }}</li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="fa fa-angle-right"></i> </a></li>
            @endif
        </ul>
    </div>
@endif
