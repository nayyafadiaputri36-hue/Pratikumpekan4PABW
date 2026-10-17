
@extends('layouts.app')

@section('title', 'Buat Laporan Banjir')

@section('content')
<div class="form-page">
    <div class="form-heading">
        <span class="eyebrow">LAPORBANJIR • PELAPORAN WARGA</span>
        <h1>Buat Laporan Banjir</h1>
        <p>Laporkan kejadian banjir di sekitar Anda agar informasi dapat tercatat dengan baik.</p>
    </div>

    <div class="form-card">
        <div class="form-card-heading">
            <h2>Informasi Kejadian</h2>
            <p>Isi semua kolom yang bertanda wajib.</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Periksa kembali data Anda.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lapor.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Pelapor *</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi Kejadian *</label>
                <select id="lokasi" name="lokasi" required>
                    <option value="">Pilih kecamatan</option>
                    @foreach ([
                        'Dayeuhkolot',
                        'Baleendah',
                        'Bojongsoang',
                        'Rancaekek',
                        'Majalaya',
                        'Cileunyi',
                        'Banjaran',
                        'Pameungpeuk',
                        'Katapang',
                        'Margahayu'
                    ] as $lokasi)
                        <option value="{{ $lokasi }}"
                            @selected(old('lokasi') === $lokasi)>
                            {{ $lokasi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_kejadian">Tanggal Kejadian *</label>
                <input
                    type="date"
                    id="tanggal_kejadian"
                    name="tanggal_kejadian"
                    value="{{ old('tanggal_kejadian', date('Y-m-d')) }}"
                    max="{{ date('Y-m-d') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tinggi_air">Tinggi Genangan Air (cm) *</label>
                <input
                    type="number"
                    id="tinggi_air"
                    name="tinggi_air"
                    value="{{ old('tinggi_air') }}"
                    placeholder="Contoh: 45"
                    min="1"
                    required
                >
                <small>Masukkan perkiraan tinggi air dalam sentimeter.</small>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan Kejadian *</label>
                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    maxlength="500"
                    placeholder="Jelaskan kondisi banjir dan situasi di lokasi..."
                    required
                >{{ old('keterangan') }}</textarea>
            </div>

            <div class="form-actions">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
