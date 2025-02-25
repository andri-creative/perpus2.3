<div class="table-responsive" id="rackTable">
    <table class="table striped-table mb-0 text-center" id="rack" data-page-length='5'>
        <thead>
            <tr class="text-center">
                <th scope="col" style="text-align: center;">#</th>
                <th scope="col" style="text-align: center;">Kode Rak</th>
                <th scope="col" style="text-align: center;">Nama Rak</th>
                <th scope="col" style="text-align: center;">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($rack as $i => $rack)
                <tr>
                    <td class="text-sm text-secondary-light fw-normal text-center">{{ $i + 1 }}</td>
                    <td class="text-sm text-secondary-light fw-normal text-center">{{ $rack->code_rack }}</td>
                    <td class="text-sm text-secondary-light fw-normal text-center">{{ $rack->name_rack }}</td>
                    <td
                        class="text-sm text-secondary-light fw-normal text-center d-flex align-items-center justify-content-center gap-1">
                        <div>
                            <a href="{{ route('rack.show', $rack->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                        </div>
                        <div>
                            <form action="{{ route('delete.rak', $rack->id) }}" method="POST">
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
