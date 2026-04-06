<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Peserta NexEvent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Peserta: {{ $event->title }}</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Status Tiket</th>
                    <th>Aksi Panitia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $index => $participant)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $participant->user->name ?? 'User Tidak Dikenal' }}</td>
                    <td>
                        @if($participant->status === 'terdaftar')
                            <span class="badge bg-primary">Terdaftar</span>
                        @elseif($participant->status === 'waitlist')
                            <span class="badge bg-warning text-dark">Waitlist</span>
                        @elseif($participant->status === 'hadir')
                            <span class="badge bg-success">Hadir</span>
                        @else
                            <span class="badge bg-danger">Batal</span>
                        @endif
                    </td>
                    <td>
                        @if($participant->status === 'terdaftar')
                            <form action="/registration/{{ $participant->id }}/verify" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Verifikasi Kehadiran</button>
                            </form>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>Selesai diproses</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>