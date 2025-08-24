@if ($paginator->hasPages())
        <div class="gallery-indicator" style="  display: flex; justify-content: center; align-items: center;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        
        <div class="gallery-indicator-item disable">
            <i class="gallery-chevron fas fa-chevron-left"></i>
        </div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <div class="gallery-indicator-item">
                    <i class="gallery-chevron fas fa-chevron-left"></i>
                </div>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{-- <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li> --}}
                <div class="gallery-indicator-item dd active">
                    <div class="gallery-indicator-number">{{ $element }}</div>
                </div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="gallery-indicator-item dd active">
                            <div class="gallery-indicator-number">{{ $page }}</div>
                        </div>
                        {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                    @else
                        <a href="{{ $url }}">
                            <div class="gallery-indicator-item dd">
                                <div class="gallery-indicator-number">{{ $page }}</div>
                            </div>
                        </a>
                        {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <div class="gallery-indicator-item">
                    <i class="gallery-chevron fas fa-chevron-right"></i>
                </div>
            </a>
        @else
            <div class="gallery-indicator-item disable">
                <i class="gallery-chevron fas fa-chevron-right"></i>
            </div>
        @endif
    </div>
@endif
