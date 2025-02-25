@if ($paginator->hasPages())
    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center mt-24 mb-5">
        {{-- Tombol Sebelumnya --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px"
                    href="javascript:void(0)">
                    <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px"
                    href="{{ $paginator->previousPageUrl() }}">
                    <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                </a>
            </li>
        @endif

        {{-- Halaman --}}
        @foreach ($elements as $element)
            {{-- Tiga Titik --}}
            @if (is_string($element))
                <li class="page-item disabled">
                    <span
                        class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px">
                        {{ $element }}
                    </span>
                </li>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item">
                            <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px bg-primary-600 text-white"
                                href="javascript:void(0)">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px"
                                href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Berikutnya --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px"
                    href="{{ $paginator->nextPageUrl() }}">
                    <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px"
                    href="javascript:void(0)">
                    <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                </a>
            </li>
        @endif
    </ul>
@endif
