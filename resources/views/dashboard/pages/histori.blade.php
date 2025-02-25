@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Keluar Buku</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Keluar Buku</li>
        </ul>
    </div>

    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="card-title mb-0">Tabel </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0 text-start" id="books" data-page-length="10">
                    <thead>
                        <tr class="cutom-tr-table">
                            <th scope="col">ISBN</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tgl Pinjam</th>
                            <th scope="col">Tgl Kembali</th>
                            <th scope="col">Keterlambatan</th>
                            <th scope="col">Rak & Sub</th>
                            <th scope="col">Jumlah buku</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_detail as $item)
                            <tr class="cutom-tr-table">
                                <td>
                                    {{ $item->books->isbn_books }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <h6 class="text-sm mb-0 fw-medium flex-grow-1">
                                            {{ strlen($item->books->judul_books) > 20 ? substr($item->books->judul_books, 0, 20) . '...' : $item->books->judul_books }}
                                        </h6>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('histori.show', ['id' => $item->id]) }}" class="text-primary"
                                        style="text-decoration: underline;">
                                        {{ $item->borrow->name_borrow ?? 'N/A' }}
                                    </a>
                                </td>
                                <td> <span
                                        class="bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm">{{ $item->status ?? 'N/A' }}</span>
                                </td>
                                <td> <span class="fw-medium text-sm">{{ $item->borrow_date ?? 'N/A' }}</span>
                                </td>
                                <td> <span class="fw-medium text-sm">{{ $item->return_date ?? 'N/A' }}</span>
                                </td>
                                <td> <span class="fw-medium text-sm">{{ $item->keterlambatan ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    {{ $item->books->rack->code_rack . ' ' . '&' . ' ' . $item->books->name_rack }}
                                </td>
                                <td>
                                    <span
                                        class="bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm">{{ $item->counter ?? 'N/A' }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
