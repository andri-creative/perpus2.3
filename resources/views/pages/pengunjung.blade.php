@extends('pages.layouts.main')
@section('title', 'Halaman Home')


@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('contents')
    <div class="container-fluid p-0 position-relative  d-flex justify-content-center align-content-center">
        <img src="homes/images/b g-3.png" alt="" class="img-fluid w-100" style="height: 250px" />
        <div style="top: 30px;"
            class="position-absolute  col-md-1-0 col-12 p-4  d-flex justify-content-center align-content-center ">
            <div class="d-flex flex-column justify-content-center align-items-center w-50">
                <h4 class="text-white">Pengunjung</h4>
                <span style="color: #2192D4;">Beranda / Pengunjung</span>
            </div>
        </div>
    </div>
    <div class=" p-4 w-full" style="background-color: rgba(0, 0, 0, 0.05);"></div>

    <div class="container mt-3 mb-4">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="flex-column border rounded">
                    <div class="border-bottom px-4 py-3">
                        <h6>Form Pengunjung</h6>
                    </div>
                    <div class="border-bottom px-4 py-3">
                        <form action="{{ route('create.pengunjung') }}" method="POST">
                            @csrf
                            <div class="form-outline" data-mdb-input-init>
                                <div class="form-grub mb-3">
                                    <label class="form-label" for="typeText">Nama Lengkap</label>
                                    <input type="text" id="typeText" class="form-control" name="first_name"
                                        placeholder="Nana Lengkap" required />
                                </div>
                                <div class="form-grub mb-3">
                                    <label class="form-label" for="typeText">Kelas</label>
                                    <input type="text" id="typeText" class="form-control" name="kelas"
                                        placeholder="(Contoh : 1.1)" required />
                                </div>
                                <div class="form-grub mb-3">
                                    <label class="form-label" for="textAreaExample">Ketertangan</label>
                                    <textarea class="form-control" name="keperluan" id="textAreaExample" placeholder="Contoh (mambaca buku)" rows="4"
                                        required></textarea>
                                </div>
                                <button type="submit" class="btn btn-span btn-sm" data-mdb-ripple-init>Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="d-flex border rounded px-4 py-3 mb-4">
                    <div class="row w-100 justify-content-center">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p style="font-size: 12px;" id="live-time"></p>
                            </div>
                            <div>
                                <h5>Keluar</h5>
                            </div>
                        </div>
                        <div class=" w-50">
                            <div class="input-group ">
                                <input type="text" id="searchInputPengujung" class="form-control"
                                    placeholder="Cari nama kamu..." aria-label="Cari">
                                <button id="searchBtnPengujung" class="btn text-white btn-span">Cari</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="border rounded px-4 py-3">
                    <div class="table-responsive" style="max-height: 280px; overflow-y:auto;">
                        <table id="dataTable" class="table table-striped d-none">
                            <thead>
                                <tr style="font-size: 15px">
                                    <th>Nama lengkap</th>
                                    <th>Kelas</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function updateDateTime() {
            let now = new Date();
            let tgl = now.getDate();
            let bulan = now.toLocaleString("id-ID", {
                month: "long"
            });
            let tahun = now.getFullYear();
            let jam = now.getHours().toString().padStart(2, "0");
            let menit = now.getMinutes().toString().padStart(2, "0");


            let dateTimeString = `${tgl} ${bulan} ${tahun} ${jam}:${menit}`;
            document.getElementById("live-time").innerText = dateTimeString;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>

    <script>
        document.getElementById('searchBtnPengujung').addEventListener('click', function() {
            let query = document.getElementById('searchInputPengujung').value.trim();
            let tableBody = document.getElementById('tableBody');
            let dataTable = document.getElementById('dataTable');

            if (query === "") {
                dataTable.classList.add('d-none');
                return;
            }

            fetch(`/search-pengunjung?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = "";

                    if (data.data.length > 0) {
                        data.data.forEach(item => {
                            let row = `
                    <tr id="row-${item.id}">
                        <td>${item.first_name}</td>
                        <td>${item.kelas}</td>
                        <td>${item.keperluan}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-span btn-sm keluar-btn" data-id="${item.id}" style="font-size: 12px;">Keluar</button>
                        </td>
                    </tr>`;
                            tableBody.innerHTML += row;
                        });

                        dataTable.classList.remove('d-none');

                        document.querySelectorAll('.keluar-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                let id = this.getAttribute('data-id');
                                markAsKembali(id);
                            });
                        });

                    } else {
                        if (data.message === "Anda sudah keluar") {
                            let row = `
                    <tr>
                        <td colspan="4" class="text-center text-danger">${data.name} - ${data.message}</td>
                    </tr>`;
                            tableBody.innerHTML = row;
                            dataTable.classList.remove('d-none');
                        } else {
                            dataTable.classList.add('d-none');
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        function markAsKembali(id) {
            fetch(`/mark-as-kembali/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hapus baris dari tabel jika berhasil
                        let row = document.getElementById(`row-${id}`);
                        if (row) row.remove();
                    } else {
                        alert('Gagal memperbarui status');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
