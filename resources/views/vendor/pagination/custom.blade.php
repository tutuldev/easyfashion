@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex xl:w-8/12 justify-center mt-6">
        <ul class="inline-flex items-center space-x-1">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 text-gray-400 bg-gray-100 border rounded cursor-not-allowed">Prev</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1 bg-white border border-gray-300 rounded hover:bg-blue-100 text-blue-600">
                        Prev
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Three Dots --}}
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-500">...</li>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-blue-600 text-white rounded font-semibold">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 bg-white border border-gray-300 rounded hover:bg-blue-100 text-blue-600">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1 bg-white border border-gray-300 rounded hover:bg-blue-100 text-blue-600">
                        Next
                    </a>
                </li>
            @else
                <li class="px-3 py-1 text-gray-400 border bg-gray-100 rounded cursor-not-allowed">Next</li>
            @endif

        </ul>
    </nav>
@endif
