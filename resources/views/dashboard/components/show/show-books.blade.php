@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Buku</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Buku</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-start">
                <h5 class="card-title mb-0">Buku</h5>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="{{ url()->previous() }}"
                    class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pajamas:go-back" class="text-xl"></iconify-icon>
                    Kembali
                </a>
                <a href="javascript:void(0)" id="editButton"
                    class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                    Edit
                </a>
                <a href="javascript:void(0)" id="cancelButton" style="display: none;"
                    class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:times-circle" class="text-xl"></iconify-icon>
                    Cancel
                </a>
                <form action="{{ route('delete.books', $books->id) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1"><iconify-icon
                            icon="weui:delete-on-filled" class="text-xl"></iconify-icon> Delete</button>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div id="rackDetails" class="card container">
                <div class="card-body">
                    <h5 class="text-center text-2xl mb-4">{{ $books->judul_books ? $books->judul_books : 'N/A' }}</h5>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6 d-flex justify-content-end  d-none d-md-block" style="max-width: 300px;">
                            {{-- <img src="{{ asset('images/books/' . $books->gambar) ? asset('images/books/' . $books->gambar) : asset('assets/images/sampul.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/sampul.png') }}';"
                                class="img-fluid w-100 rounded"
                                style="width: 100%; max-width: 250px; height:400px; object-fit: cover;" alt="Sampul Buku"> --}}
                            <iframe
                                src="{{ $books->gambar ?? 'https://www.temankreasi.com/asset/images/gambar/hias-cover-buku-dengan-benang-12.webp' }}"
                                allow="autoplay" class="img-fluid w-100 rounded"
                                style="width: 100%; max-width: 250px; height:400px; object-fit: cover;"
                                title="{{ $books->judul_books }}">
                            </iframe>

                        </div>
                        <div class="col-md-6  w-full d-flex justify-content-start">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">ISBN</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->isbn_books ? $books->isbn_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Penyusun</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->autor_books ? $books->autor_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Penerbit</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->publisher_books ? $books->publisher_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Tahun</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->year_books ? $books->year_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300" style="width: 170px;   display: inline-block;">
                                                    <span class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Jumlah
                                                        Halaman</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>Buku Matematik</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Jumlah
                                                        Buku</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->number_books ? $books->number_books : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col">
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Kategori</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->category->name_category ? $books->category->name_category : 'N/A' }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Rak Buku</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->rack->name_rack ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">Sub Buku</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->name_rack ? $books->name_rack : 'N/A' }}</li>
                                                </ul>
                                            </div>
                                            <div class="mb-4">
                                                <div class="bg-primary-300 w-10-px"><span
                                                        class="bg-primary-800 ms-10 px-20  custom-radius"
                                                        style="width: 200px">No Klasifikasi</span>
                                                </div>
                                                <ul class="ms-10" style="list-style-type: circle;">
                                                    <li>
                                                        {{ $books->no_klasifikasi ?? 'N/A' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $books->description }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-5" id="editForm" style="display: none;">
                <form class="row" action="{{ route('update.books', $books->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6 gay-6">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Gambar Buku </label>
                                {{-- <input class="form-control form-control-sm" name="gambar" type="file">  --}}
                                <div class="input-group">
                                    <span class="input-group-text bg-base"> http:// </span>
                                    <input type="text" class="form-control" value="{{ $books->gambar }}"
                                        placeholder="www.random.com">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">ISBN</label>
                                <input type="text" name="isbn_books" class="form-control"
                                    value="{{ $books->isbn_books }}" placeholder="Masukkan ISBN" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" name="judul_books" class="form-control"
                                    value="{{ $books->judul_books }}" placeholder="Masukkan Judul Buku" />
                                @error('judul_books')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Jumlah Buku</label>
                                <input type="text" name="number_books" class="form-control"
                                    value="{{ $books->number_books }}" placeholder="Masukkan Jumlah Buku" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nama Penulis</label>
                                <input type="text" name="autor_books" class="form-control"
                                    placeholder="Masukkan Nama Penulis" value="{{ $books->autor_books }}" />
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 gay-6">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Tahun Terbit</label>
                                <input type="text" name="year_books" class="form-control"
                                    placeholder="Masukkan Tahun Terbit" value="{{ $books->year_books }}" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nama Penerbit</label>
                                <input type="text" name="publisher_books" class="form-control"
                                    placeholder="Masukkan Nama Penerbit" value="{{ $books->publisher_books }}" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nama Kategori</label>
                                <select name="id_rack" id="rak" class="form-select">
                                    <option disabled>Pilih Rak</option>
                                    @foreach ($category as $categor)
                                        <option value="{{ $categor->id }}"
                                            {{ $categor->id == $books->id_category ? 'selected' : '' }}>
                                            {{ $categor->name_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nomor Rak</label>
                                <select name="id_rack" id="rak" class="form-select">
                                    <option disabled>Pilih Rak</option>
                                    @foreach ($rack_all as $racks)
                                        <option value="{{ $racks->id }}"
                                            {{ $racks->id == $books->id_rack ? 'selected' : '' }}>
                                            {{ $racks->name_rack }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Sub Nomor</label>
                                <select name="name_rack" id="subs" class="form-select">
                                    @foreach ($subs_all as $subs)
                                        <option value="{{ $subs->id }}"
                                            {{ $subs->id == $books->sub_rack ? 'selected' : '' }}>
                                            {{ $subs->code_sub }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 gay-6">
                        <label class="form-label">Diskripsion</label>
                        <textarea class="form-control" name="description" id="" cols="4" rows="3"></textarea>
                    </div>
                    <div class="col-12 gay-6 mt-3">
                        <button type="submit" class="btn btn-success">Perbarui</button>
                        <button type="button" onclick="hideEditForm()" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
