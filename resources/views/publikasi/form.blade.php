<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Publikasi</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@extends('layouts.app')
@section('title', 'Tambah Publikasi')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h3 text-dark fw-bold text-center mb-4">Tambah Publikasi Baru</h1>

                    <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="judul" class="col-sm-4 col-form-label fw-bold">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" name="judul" id="judul"
                                       class="form-control @error('judul') is-invalid @enderror"
                                       value="{{ old('judul') }}">
                                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal_rilis" class="col-sm-4 col-form-label fw-bold">Tanggal Rilis</label>
                            <div class="col-sm-8">
                                <input type="date" name="tanggal_rilis" id="tanggal_rilis"
                                       class="form-control @error('tanggal_rilis') is-invalid @enderror"
                                       value="{{ old('tanggal_rilis') }}">
                                @error('tanggal_rilis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sampul" class="col-sm-4 col-form-label fw-bold">Sampul</label>
                            <div class="col-sm-8">
                                <input type="file" name="sampul" id="sampul"
                                       class="form-control @error('sampul') is-invalid @enderror">
                                @error('sampul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                            <a href="{{ route('publikasi.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>