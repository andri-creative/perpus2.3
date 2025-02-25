@if ($pengunjung->isNotEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Kelas</th>
                    <th>Keperluan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengunjung as $item)
                    <tr id="row-{{ $item->id }}">
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->date_time }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->keperluan }}</td>
                        <td>
                            <form action="{{ route('maks.back', $item->id) }}" method="POST" class="keluar-form" data-id="{{ $item->id }}">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-danger keluar-btn">Keluar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div id="alert-message" class="alert alert-warning">Tidak ada data yang sesuai dengan pencarian.</div>
@endif
