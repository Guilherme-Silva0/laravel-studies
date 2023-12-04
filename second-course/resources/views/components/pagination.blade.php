@if ($paginator)
    @php
        $queryParams = isset($appends) && gettype($appends) === 'array' ? '&' . http_build_query($appends) : '';
    @endphp

    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end gap-4">
        {{-- Previous Page Link --}}
        @if ($paginator->isFirstPage())
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-800 text-gray-400 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParams }}" rel="prev"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-blue-600 text-slate-900 leading-5 rounded-md hover:scale-105 focus:outline-none  transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if (!$paginator->isLastPage())
            <a href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParams }}" rel="next"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-blue-600 text-slate-900 leading-5 rounded-md hover:scale-105 focus:outline-none transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-800 text-gray-400 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
