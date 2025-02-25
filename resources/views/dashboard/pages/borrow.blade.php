@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Meminjam Buku</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Meminjam Buku</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Masukkan Buku Baru</h5> <span>{{ $user->id }}</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-sm-6">
                            <div class="mb-20 mt-20">
                                <div class="input-group">
                                    <input type="text" class="form-control radius-8" name="searchBooks"
                                        placeholder="Search ISBN & Judul Buku">
                                    <button type="button" class="btn btn-primary button-submit-book">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="table-responsive d-flex justify-content-center outer scroll-sm ">
                            <div class="col-xxl-8">
                                <table class="table bordered-table sm:xsm-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ISBN</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Rak Buku</th>
                                            <th scope="col">Klasifikasi Buku</th>
                                            <th scope="col" class="text-center ">Sisa Buku</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataList-books">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-9">
                        <div id="bookResults"></div>
                    </div> --}}
                </div>
                <div class="card-body ">
                    <form class="row" action="{{ route('borrow.submit') }}" method="POST">
                        @csrf
                        <div class="col-md-5 gay-6">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <label class="form-label">Nama Peminjam</label>
                                    <input type="text" name="name_borrow" class="form-control"
                                        placeholder="Masukkan Nama Peminjam" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nomor ID</label>
                                    <input type="text" name="number_id" class="form-control"
                                        placeholder="Masukkan Nomor ID" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Masukkan Nomor Telepon" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Identitas Buku</label>
                                    <input type="text" name="book_identity" class="form-control"
                                        placeholder="Masukkan Identitas Buku" />
                                </div>
                                <div class="dropdown">
                                    <button id="dropdownButton"
                                        class="btn btn-primary-600 not-active px-18 py-11 dropdown-toggle toggle-icon"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih
                                    </button>
                                    <ul class="dropdown-menu">
                                        <!-- Guru -->
                                        @foreach ($durasi as $item)
                                            @if ($item->category === 'Guru')
                                                <li>
                                                    <a href="#"
                                                        class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900"
                                                        onclick="updateDropdownFromDB('{{ $item->category }}', {{ $item->default_duration }})">
                                                        {{ $item->category }} {{ $item->default_duration }} Bulan
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach

                                        <!-- Siswa (Submenu) -->
                                        <li class="dropdown-submenu">
                                            <a href="#"
                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 dropdown-toggle">
                                                Siswa
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach ($durasi as $item)
                                                    @if (Str::startsWith($item->category, 'Siswa'))
                                                        <li>
                                                            <a href="#"
                                                                class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900"
                                                                onclick="updateDropdownFromDB('{{ $item->category }}', {{ $item->default_duration }})">
                                                                {{ str_replace('Siswa ', '', $item->category) }}
                                                                {{ $item->default_duration }} Bulan
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>


                                </div>
                                <!-- Input Hidden -->
                                <input type="hidden" name="position_borrow" id="positionBorrow" />
                                <input type="hidden" name="duration" id="borrowDuration" />
                                <input type="hidden" name="class_or_notes" id="classOrNotes" />

                                <!-- Input Tambahan -->
                                <div id="inputContainer" style="display: none;">
                                    <label for="customInput" class="form-label">Keterangan/Kelas</label>
                                    <input type="text" id="customInput" class="form-control"
                                        placeholder="Masukkan Keterangan atau Kelas" />
                                </div>

                            </div>
                        </div>
                        <div class="col-md-7 gay-6">
                            <div class="">
                                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                                    <h6 class="mb-2 fw-bold text-lg mb-0">Daftar Yang di Pinjam</h6>
                                </div>
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table sm-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ISBN</th>
                                                <th scope="col">Judul Buku</th>
                                                <th scope="col">Rak</th>
                                                <th scope="col" class="text-center">Jumlah</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="daftar-pinjam">
                                            <tr class="list-Pimjam-buku d-none">
                                                <td>
                                                    <input type="hidden" class="id_books-pinjam">

                                                    <h6 class="text-md mb-0 fw-normal isbn-pinjam"></h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-md mb-0 fw-normal judul-pinjam"></h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-md mb-0 fw-normal rak-pinjam"></h6>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex gap-2 align-items-center justify-content-center">
                                                        <button class="btn-increment" type="button">
                                                            <span
                                                                class="badge text-sm fw-semibold w-32-px h-32-px d-flex justify-content-center align-items-center rounded-circle text-primary-600 bg-primary-50 radius-4 text-white">
                                                                <iconify-icon icon="ic:round-plus"
                                                                    class="menu-icon"></iconify-icon>
                                                            </span>
                                                        </button>
                                                        <input type="number" value="1"
                                                            class="form-control form-control-sm w-32-px text-center mini-input counter_value-pinjam counter-pinjam"
                                                            min="1" style="height: 32px;">
                                                        <button class="btn-decrement" type="button">
                                                            <span
                                                                class="badge text-sm fw-semibold w-32-px h-32-px d-flex justify-content-center align-items-center rounded-circle text-danger-600 bg-danger-100 radius-4 text-white">
                                                                <iconify-icon icon="tabler:minus"
                                                                    class="menu-icon"></iconify-icon>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="text-center  d-flex justify-content-center align-items-center">
                                                    <span
                                                        class="badge text-sm fw-semibold w-32-px h-32-px d-flex justify-content-center align-items-center radius-4 bg-danger-600 text-white delete-daftar-buku">
                                                        <iconify-icon icon="material-symbols:close-rounded"
                                                            class="menu-icon"></iconify-icon>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 gay-6 mt-3">
                            <button type="submit" class="btn btn-primary-600">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
<tr>
    <td>
        <h6 class="text-md mb-0 fw-normal">7500</h6>
    </td>
    <td>
        <h6 class="text-md mb-0 fw-normal">7500</h6>
    </td>
    <td>$7,500.00</td>
    <td class="text-center">
        <div class="d-flex gap-2 align-items-center justify-content-center">
            <button class="btn-increment">
                <span
                    class="badge text-sm fw-semibold w-32-px h-32-px d-flex justify-content-center align-items-center rounded-circle text-primary-600 bg-primary-50 radius-4 text-white">
                    <iconify-icon icon="ic:round-plus" class="menu-icon"></iconify-icon>
                </span>
            </button>
            <input type="number" value="1" class="form-control form-control-sm w-32-px text-center mini-input"
                min="1" style="height: 32px;">
            <button class="btn-decrement">
                <span
                    class="badge text-sm fw-semibold w-32-px h-32-px d-flex justify-content-center align-items-center rounded-circle text-danger-600 bg-danger-100 radius-4 text-white">
                    <iconify-icon icon="tabler:minus" class="menu-icon"></iconify-icon>
                </span>
            </button>
        </div>
    </td>
    <td class="text-center  d-flex justify-content-center align-items-center">
        <span
            class="badge text-sm fw-semibold w-32-px h-32-px d-flex justify-content-center align-items-center radius-4 bg-danger-600 text-white delete-daftar-buku">
            <iconify-icon icon="material-symbols:close-rounded" class="menu-icon"></iconify-icon>
        </span>
    </td>
</tr> --}}

{{--
<label class="form-label">Buku yang Dipinjam</label>

<div class="row mt-24 gy-0 border rounded book-info-template books-container" style="display: none;">
    <input type="text" class="id_books">
    <div class="col-xxl-3 col-sm-6 pe-0">
        <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
            <span class="fw-semibold text-primary-light mb-1">ISBN</span>
            <p class="text-sm mb-0 isbn_pinjam"></p>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6 px-0">
        <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
            <span class="fw-semibold text-primary-light mb-1">Judul Buku</span>
            <p class="text-sm mb-0 judul_buku"></p>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6 px-0">
        <div class="card-body p10 bg-base d-flex flex-column justify-content-center">
            <span class="fw-semibold text-primary-light mb-1">Rak & Sub</span>
            <p class="text-sm mb-0 rack_buku"></p>
        </div>
    </div>
    <div class="col-xxl-3 col-sm-6 ps-0">
        <div class="card-body p-10 bg-base d-flex flex-column justify-content-center">
            <span class="fw-semibold text-primary-light mb-1">Jumlah Buku</span>
            <div class="d-flex flex-row justify-content-center align-items-center">
                <div class="btn btn-icon btn-minus">
                    &#45;
                </div>
                <span class="mx-2 counter">1</span>
                <input type="hidden" class="counter_value" value="1">
                <div class="btn btn-icon btn-plus">
                    &#43;
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-remove mt-3">Hapus</button>
        </div>
    </div>
</div> --}}
