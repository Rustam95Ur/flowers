@if ($paginator->hasPages())
    <div class="pagination">
        <ul>
            @if (!$paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a></li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="current"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">→</a></li>
            @endif
        </ul>
    </div>
@endif