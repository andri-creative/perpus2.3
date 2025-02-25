<div class="table-responsive">
    <table class="table striped-table mb-0" id="sub" data-page-length='5'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Sub</th>
                <th scope="col">Nama Rak</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sub as $i => $subs)
                <tr>
                    <td class="text-sm text-secondary-light fw-normal">{{ $i + 1 }}</td>
                    <td class="text-sm text-secondary-light fw-normal">{{ $subs->code_sub }}</td>
                    <td class="text-sm text-secondary-light fw-normal ">
                        {{ $subs->rack->name_rack ?? 'Rak Tidak Ditemukan' }}</td>
                    <td
                        class="text-sm text-secondary-light fw-normal text-center d-flex align-items-center justify-content-center gap-1">

                        <div>
                            <a href="{{ route('subs.show', $subs->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                        </div>
                        <div>
                            <form action="{{ route('delete.sub', $subs->id) }}" method="POST">
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
