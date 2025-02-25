<div class="table-responsive">
    <table class="table striped-table mb-0" id="category" data-page-length='5'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode kategori</th>
                <th scope="col">Nama Ketegori</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $i => $cas)
                <tr>
                    <td class="text-sm text-secondary-light fw-normal">{{ $i + 1 }}</td>
                    <td class="text-sm text-secondary-light fw-normal">{{ $cas->code_category }}</td>
                    <td class="text-sm text-secondary-light fw-normal">{{ $cas->name_category }}</td>
                    <td
                        class="text-sm text-secondary-light fw-normal text-center d-flex align-items-center justify-content-center gap-1">
                        <div>
                            <a href="{{ route('category.show', $cas->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                        </div>
                        <div>
                            <form action="{{ route('delete.category', $cas->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="ic:baseline-delete"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
