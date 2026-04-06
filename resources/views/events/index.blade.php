<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Acara - NexEvent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manajemen Acara</h2>
            <a href="/events/create" class="btn btn-primary">Tambah Acara Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Acara</th>
                    <th>Tanggal</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $index => $event)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>{{ $event->capacity }}</td>
                    <td>
                        @if($event->status === 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Arsip</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="/event/{{ $event->id }}/participants" class="btn btn-sm btn-info text-white">Peserta</a>
                            <a href="/events/{{ $event->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="/events/{{ $event->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus acara ini? Semua data pendaftaran terkait juga akan ikut terhapus.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>