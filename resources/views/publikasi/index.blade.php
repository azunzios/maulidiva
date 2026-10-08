<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial- scale=1.0">
        <title>Daftar Publikasi BPS Provinsi Kalimantan Barat</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        @extends('layouts.app')
@section('title', 'Daftar Publikasi')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h3 text-dark fw-bold text-center mb-4">Daftar Publikasi BPS Provinsi Kalimantan Barat</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('publikasi.form') }}" class="btn btn-primary mb-3">+ Tambah Publikasi</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-bps">
                    <thead>
                        <tr>
                            <th>No</th><th>Judul</th><th>Tanggal Rilis</th><th>Sampul</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publikasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->tanggal_rilis }}</td>
                            <td>
                                @if ($item->sampul)
                                    <img src="/images/{{ $item->sampul }}" alt="{{ $item->judul }}"
                                         width="80" class="rounded">
                                @else - @endif
                            </td>
                            <td>
                                <a href="{{ route('publikasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('publikasi.destroy', $item->id) }}" method="POST"
      
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus publikasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
</body>
</html>