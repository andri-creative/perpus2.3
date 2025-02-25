@if ($books->isEmpty())
    <p>No books found.</p>
@else
    @foreach ($books as $item)
        <div class="col-md-9 book-item {{ $item->number_books <= 0 ? 'stock-out' : '' }}"
            style="cursor: {{ $item->number_books <= 0 ? 'not-allowed' : 'pointer' }};"
            data-id-books="{{ $item->id }}" data-isbn="{{ $item->isbn_books }}" data-judul="{{ $item->judul_books }}"
            data-rack="{{ $item->rack->name_rack ?? '' }}" data-sub-rack="{{ $item->name_rack ?? '' }}"
            data-qty="{{ $item->number_books }}">
            <div class="row mt-24 gy-0 border rounded">
                <div class="col-xxl-3 col-sm-6 pe-0">
                    <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
                        <span class="fw-semibold text-primary-light mb-1">ISBN</span>
                        <p class="text-sm mb-0">{{ $item->isbn_books }}</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6 px-0">
                    <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
                        <span class="fw-semibold text-primary-light mb-1">Judul Buku</span>
                        <p class="text-sm mb-0">{{ $item->judul_books }}</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6 px-0">
                    <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
                        <span class="fw-semibold text-primary-light mb-1">Rack & Sub</span>
                        <p class="text-sm mb-0">{{ $item->rack->name_rack ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6 px-0">
                    <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
                        <span class="fw-semibold text-primary-light mb-1">Quantity Books</span>
                        <p class="text-sm mb-0">
                            @if ($item->number_books > 0)
                                <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">{{ $item->number_books }}</span>
                            @else
                                <span
                                    class="bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm">Buku
                                    telah habis</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
