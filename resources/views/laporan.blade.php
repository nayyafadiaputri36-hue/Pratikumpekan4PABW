
@extends('layouts.app')

@section('title', 'Daftar Laporan | LaporBanjir')

@section('content')

<div class="page-heading">
    <span class="eyebrow">INFORMASI LAPORAN</span>
    <h1>Daftar Laporan Banjir</h1>
    <p>Data laporan tersimpan di database LaporBanjir.</p>
</div>

<div class="list-toolbar">
    <div>
        <strong>{{ $laporan->count() }} laporan</strong>
        <p>Data diambil langsung dari MySQL.</p>
    </div>

    <a href="{{ route('lapor') }}" class="btn btn-primary">
        + Buat Laporan
    </a>
</div>

@if ($laporan->isNotEmpty())

    <section class="reports-grid">
        @foreach ($laporan as $item)
            @include('partials.laporan-card', [
                'laporan' => [
                    'kode' => 'LB-' . str_pad($item->id, 5, '0', STR_PAD_LEFT),
                    'nama' => $item->nama_pelapor,
                    'lokasi' => $item->lokasi,
                    'tinggi_air' => $item->tinggi_genangan,
                    'keterangan' => $item->keterangan ?? '-',
                    'status' => $item->tinggi_genangan < 30
                        ? 'Waspada'
                        : ($item->tinggi_genangan <= 70 ? 'Siaga' : 'Awas'),
                    'tanggal' => $item->tanggal_kejadian->format('d-m-Y'),
                ]
            ])
        @endforeach
    </section>

@else

    <section class="empty-state">
        <div class="empty-icon">📋</div>
        <h2>Belum Ada Laporan</h2>
        <p>
            Belum ada data laporan di database.
            Silakan buat laporan baru atau jalankan seeder.
        </p>
        <a href="{{ route('lapor') }}" class="btn btn-primary">
            Buat Laporan
        </a>
    </section>

@endif

@endsection
