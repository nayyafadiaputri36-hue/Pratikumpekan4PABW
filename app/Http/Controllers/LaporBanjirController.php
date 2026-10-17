<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function create()
    {
        return view('lapor');
    }

    // Menyimpan laporan ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi_air' => 'required|integer|min:1',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'required|string|max:500',
        ], [
            'nama.required' => 'Nama pelapor wajib diisi.',
            'lokasi.required' => 'Lokasi kejadian wajib diisi.',
            'tinggi_air.required' => 'Tinggi genangan wajib diisi.',
            'tinggi_air.integer' => 'Tinggi air harus berupa angka bulat.',
            'tinggi_air.min' => 'Tinggi genangan minimal 1 cm.',
            'tanggal_kejadian.required' => 'Tanggal kejadian wajib diisi.',
            'tanggal_kejadian.date' => 'Tanggal kejadian tidak valid.',
            'keterangan.required' => 'Keterangan kejadian wajib diisi.',
        ]);

        // Sesuaikan nama input form dengan kolom database
        $laporan = Laporan::create([
            'nama_pelapor' => $validated['nama'],
            'lokasi' => $validated['lokasi'],
            'tinggi_genangan' => $validated['tinggi_air'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'],
            'keterangan' => $validated['keterangan'],
        ]);

        // Tampilkan data yang baru tersimpan di halaman konfirmasi
        return redirect()
            ->route('konfirmasi')
            ->with('laporan_terbaru', $laporan);
    }

    // Mengambil laporan dari database, bukan array session
    public function index()
    {
        $laporan = Laporan::latest()->get();

        return view('laporan', compact('laporan'));
    }

    public function konfirmasi()
    {
        $laporan = session('laporan_terbaru');

        return view('konfirmasi', compact('laporan'));
    }
}