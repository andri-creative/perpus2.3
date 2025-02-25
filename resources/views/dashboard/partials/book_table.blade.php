@foreach ($books as $item)
    <tr class="px-6 mt-10">
        <td>
            <input type="hidden" value="{{ $item->id }}" class="id-buku" name="id">
            <span class="text-primary-light d-block fw-medium isbn-buku">{{ $item->isbn_books }}</span>
        </td>
        <td>
            <span class="text-primary-light d-block fw-medium judul-buku">{{ $item->judul_books }}</span>
        </td>
        <td>
            <span class="text-primary-light d-block fw-medium rak-buku">{{ $item->rack->name_rack }}</span>
        </td>
        <td>
            <span class="text-primary-light d-block fw-medium">{{ $item->no_klasifikasi }}</span>
        </td>
        <td class="text-center ">
            @if ($item->number_books > 0)
                <span
                    class="bg-success-focus text-success-main px-16 py-4 radius-4 fw-medium text-sm number-books">{{ $item->number_books }}</span>
            @else
                <span
                    class="bg-danger-focus text-danger-main px-16 py-4 radius-4 fw-medium text-sm number-books">0</span>
            @endif

        </td>
        <td class="text-center">
            <button class="tambah-buku">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <span
                        class="text-success-main bg-success-focus w-32-px h-32-px d-flex align-items-center justify-content-center rounded-circle text-xl">
                        <iconify-icon icon="tabler:arrow-up-right" class="icon"></iconify-icon>
                    </span>
                    <span class="fw-medium sm:d-none">Tambah</span>
                </div>
            </button>
        </td>
    </tr>
@endforeach
