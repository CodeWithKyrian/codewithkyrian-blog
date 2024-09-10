@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center py-4">
        @if ($paginator->onFirstPage())
            <span
                class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-semibold text-zinc-800 dark:text-zinc-400">
                «
            </span>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-semibold text-zinc-800 dark:text-zinc-400 hover:bg-blue-900 hover:text-white">«</button>
        @endif

        @foreach ($elements as $element)
            {{-- <button wire:click="goToPage({$i+1})" @class="" class:bg-blue-800={$i+1===meta.current_page}
                class:!text-white={i+1===meta.current_page}
                class="flex items-center justify-center w-10 h-10 text-sm font-semibold bg-blue-800 hover:bg-blue-900 hover:text-white text-zinc-800 dark:text-white">{i
                + 1}</button> --}}
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                            <span
                                class="flex items-center justify-center w-10 h-10 text-sm font-semibold bg-blue-800 hover:bg-blue-900 hover:text-white text-zinc-800 dark:text-white">{{ $page }}</span>
                        </span>
                    @else
                        <button wire:click="setPage({{ $page }})"
                            class="flex items-center justify-center w-10 h-10 text-sm font-semibold hover:bg-blue-900 hover:text-white text-zinc-800 dark:text-white"
                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->onLastPage())
            <span
                class="flex items-center justify-center w-10 h-10 ml-3 text-sm font-semibold text-zinc-800 dark:text-zinc-400">
                »
            </span>
        @else
            <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                class="flex items-center justify-center w-10 h-10 ml-3 text-sm font-semibold text-zinc-800 dark:text-zinc-400 hover:bg-blue-900 hover:text-white">
                »
            </button>
        @endif

    </nav>
@endif
