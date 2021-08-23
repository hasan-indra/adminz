<div class="row">
    <div class="col-5">
        Showing {{($paginator->currentpage()-1)*$paginator->perpage()+1}}
        to {{$paginator->currentpage()*$paginator->perpage()}}
        of {{$paginator->total()}} entries
    </div>
    <div class="col-6">
        <ul class="pagination pagination-sm m-0" role="navigation">
            @if ($paginator->hasPages())
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">
                    <span class="d-none d-md-block">«</span>
                    <span class="d-block d-md-none">@lang('pagination.previous')</span>
                </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="#" wire:click="previousPage" rel="prev"
                           aria-label="@lang('pagination.previous')">
                            <span class="d-none d-md-block">«</span>
                            <span class="d-block d-md-none">@lang('pagination.previous')</span>
                        </a>
                    </li>
                @endif
                {{-- End Previous Page Link --}}

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- End Array Of Links --}}

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
                            <span class="d-block d-md-none">@lang('pagination.next')</span>
                            <span class="d-none d-md-block">»</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">
                        <span class="d-block d-md-none">@lang('pagination.next')</span>
                        <span class="d-none d-md-block">»</span>
                    </span>
                    </li>
                @endif
                {{-- End Next Page Link --}}
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">
                        <span class="d-none d-md-block">«</span>
                        <span class="d-block d-md-none">@lang('pagination.previous')</span>
                    </span>
                </li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                </li>
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">
                        <span class="d-block d-md-none">@lang('pagination.next')</span>
                        <span class="d-none d-md-block">»</span>
                    </span>
                </li>
            @endif
        </ul>
    </div>
    <div class="col-1">
        <x-admin-total-page />
    </div>
</div>
