<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    /**
     * Menampilkan halaman form laporan banjir.
     */
    public function create()
    {
        return view('lapor');
    }

    /**
     * Memproses data laporan dari form.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'tinggi_air' => 'required|numeric|min:1',
            'keterangan' => 'required|string|max:500',
        ], [
            'nama.required' => 'Nama pelapor wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',

            'lokasi.required' => 'Lokasi kejadian wajib diisi.',
            'lokasi.max' => 'Lokasi maksimal 150 karakter.',

            'tinggi_air.required' => 'Tinggi genangan wajib diisi.',
            'tinggi_air.numeric' => 'Tinggi genangan harus berupa angka.',
            'tinggi_air.min' => 'Tinggi genangan minimal 1 cm.',

            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.max' => 'Keterangan maksimal 500 karakter.',
        ]);

        // Mengirim data ke halaman konfirmasi
        return view('konfirmasi', [
            'laporan' => $validated
        ]);
    }
}