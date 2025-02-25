@if (request('search'))
    @if ($pengunjung->isNotEmpty())
        <table class="table" id="tabel-scroal">
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
                    <tr>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->date_time }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->keperluan }}</td>
                        <td>
                            <form action="{{ route('maks.back', $item->id) }}" method="POST"
                                id="keluarForm{{ $item->id }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger"
                                    id="keluarButton{{ $item->id }}">Keluar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">Tidak ada data yang sesuai dengan pencarian.</div>
    @endif
@endif
