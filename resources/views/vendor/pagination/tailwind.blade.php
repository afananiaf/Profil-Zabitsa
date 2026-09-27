@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="mt-12 flex items-center justify-between">
        <div class="flex flex-1 items-center justify-between gap-4">
            <div>
                <p class="text-[13px] leading-6 text-muted">
                    Menampilkan <span class="font-semibold text-primary">{{ $paginator->firstItem() }}</span>
                    – <span class="font-semibold text-primary">{{ $paginator->lastItem() }}</span>
                    dari <span class="font-semibold text-primary">{{ $paginator->total() }}</span> data
                </p>
            </div>

            <div class="hidden sm:block">
                <p class="text-[13px] leading-6 text-muted">
                    Halaman <span class="font-semibold text-primary">{{ $paginator->currentPage() }}</span>
                    dari <span class="font-semibold text-primary">{{ $paginator->lastPage() }}</span>
                </p>
            </div>
        </div>

        <div>
            <span class="relative z-0 inline-flex -space-x-px gap-1.5">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-muted/50">
                        <x-icon name="chevron-left" class="h-4 w-4" />
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-secondary transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                        <x-icon name="chevron-left" class="h-4 w-4" />
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true" class="inline-flex h-10 w-10 items-center justify-center font-serif text-sm text-muted/60">…</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="relative inline-flex h-10 min-w-10 items-center justify-center rounded-full bg-primary px-2.5 text-[14px] font-bold text-goldlight">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="relative inline-flex h-10 min-w-10 items-center justify-center rounded-full border border-line bg-white px-2.5 text-[14px] font-semibold text-muted transition-all duration-200 hover:border-primary hover:text-primary" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-secondary transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                        <x-icon name="chevron-right" class="h-4 w-4" />
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-muted/50">
                        <x-icon name="chevron-right" class="h-4 w-4" />
                    </span>
                @endif
            </span>
        </div>
    </nav>
@endif