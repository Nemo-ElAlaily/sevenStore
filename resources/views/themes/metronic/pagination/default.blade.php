@if ($paginator->hasPages())
    <nav class="navigation pagination">
        <div class="nav-links">
            <ul class="page-numbers">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <li><a class="next page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           aria-label="@lang('pagination.previous')">{{ trans('front.Previous') }}&nbsp;<span class="meta-nav">&larr;</span></a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span class='page-numbers current'>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><span class='page-numbers current' style="color: #fff">{{ $page }}</span></li>
                            @else
                                <li><a class='page-numbers' href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next"
                           aria-label="@lang('pagination.next')">{{ trans('front.Next') }}&nbsp;<span class="meta-nav">&rarr;</span></a></li>
                @endif
            </ul>
        </div>
    </nav>
@endif
