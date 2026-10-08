<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::all();
        return view('publikasi.index', compact('publikasi'));
    }

    public function form()
    {
        return view('publikasi.form');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul'         => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload sampul ke public/images (sesuai folder di modul)
        $namaFile = null;
        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaFile);
        }

        // Simpan ke database
        Publikasi::create([
            'judul'         => $request->judul,
            'tanggal_rilis' => $request->tanggal_rilis,
            'sampul'        => $namaFile,
        ]);

        // Kembali ke daftar dengan pesan sukses
        return redirect()->route('publikasi.index')
                         ->with('success', 'Publikasi berhasil ditambahkan.');
    }

    public function destroy(Publikasi $publikasi)
    {
    
    if ($publikasi->sampul) {
        $path = public_path('images/' . $publikasi->sampul);
        if (file_exists($path)) {
            unlink($path);
        }
    }

    $publikasi->delete();

    return redirect()->route('publikasi.index')
                     ->with('success', 'Publikasi berhasil dihapus.');
}

public function edit(Publikasi $publikasi)
{
    return view('publikasi.edit', compact('publikasi'));
}

public function update(Request $request, Publikasi $publikasi)
{
    $request->validate([
        'judul'         => 'required|string|max:255',
        'tanggal_rilis' => 'required|date',
        'sampul'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $namaFile = $publikasi->sampul; // default: pakai sampul lama

    // Kalau ada file baru, hapus yang lama lalu simpan yang baru
    if ($request->hasFile('sampul')) {
        if ($publikasi->sampul) {
            $pathLama = public_path('images/' . $publikasi->sampul);
            if (file_exists($pathLama)) {
                unlink($pathLama);
            }
        }

        $file = $request->file('sampul');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $namaFile);
    }

    $publikasi->update([
        'judul'         => $request->judul,
        'tanggal_rilis' => $request->tanggal_rilis,
        'sampul'        => $namaFile,
    ]);

    return redirect()->route('publikasi.index')
                     ->with('success', 'Publikasi berhasil diperbarui.');
}
}