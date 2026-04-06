<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara - NexEvent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Acara</h2>
        <a href="/events" class="btn btn-secondary mb-4">Kembali</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="/events/{{ $event->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Judul Acara</label>
                        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal & Waktu</label>
                        <input type="datetime-local" name="event_date" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($event->event_date)) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kapasitas Peserta</label>
                        <input type="number" name="capacity" class="form-control" min="1" value="{{ $event->capacity }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="aktif" {{ $event->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="arsip" {{ $event->status == 'arsip' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Perbarui Acara</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>