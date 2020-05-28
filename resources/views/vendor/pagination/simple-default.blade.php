@if ($paginator->hasPages())
    <ul class="pagination flex justify-between mx-4 mt-4 list-reset text-gray-700 text-sm font-thin">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span class="button bg-transparent border border-gray-400 py-2 px-2 rounded opacity-50 cursor-not-allowed">@lang('pagination.previous')</span>
            </li>
        @else
            <li>
                <a class="button bg-transparent border border-gray-400 py-2 px-2 rounded opacity-85" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="button bg-transparent border border-gray-400 py-2 px-2 rounded opacity-85" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="disabled ">
                <span class="button bg-transparent border border-gray-400 py-2 px-2 rounded opacity-50 cursor-not-allowed">@lang('pagination.next')</span>
            </li>
        @endif
    </ul>
@endif
