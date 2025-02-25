@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Pengunjung Table</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Pengunjung Table</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center  justify-content-between gap-4">
            <div>
                <h5 class="card-title mb-0">Dartar Pengujung</h5>
            </div>
            <button class="btn btn-danger" id="deleteButton">Delete</button>
        </div>
        <div class="card-body p-24">
            <div class="mb-6">
                <form method="GET" action="{{ route('pengunjung.filter') }}" class="d-flex gap-3">
                    <select name="bulan" class="form-select">
                        <option value="">Pilih Bulan</option>
                        @foreach (range(1, 12) as $bulan)
                            <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                    <select name="tahun" class="form-select">
                        <option value="">Pilih Tahun</option>
                        @foreach (range(date('Y') - 3, date('Y')) as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>

            </div>
            <div class="table-responsive scroll-sm">
                <table id="export-pengunjung" class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="d-flex align-items-center gap-10">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input radius-4 border input-form-dark " type="checkbox"
                                            name="checkbox" id="selectAll" />
                                    </div>
                                    S.L
                                </div>
                            </th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Menit</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keperluan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengunjung as $i => $pengunjungs)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-10">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input radius-4 border border-neutral-400 select-row"
                                                type="checkbox" name="checkbox" id="checkbox-{{ $pengunjungs->id }}" />
                                        </div>
                                        {{ $i + 1 }}
                                    </div>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">{{ $pengunjungs->durasi }}</td>
                                <td>{{ $pengunjungs->first_name }}</td>
                                <td>{{ $pengunjungs->kelas }}</td>
                                <td>{{ $pengunjungs->status }}</td>
                                <td>
                                    <p class="text-toggle"
                                        style="max-width: 200px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        {{ $pengunjungs->keperluan }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
