<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Laporan Banjir</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="container">

    <div class="form-container">

        <div class="form-header">

            <div class="icon">🌊</div>

            <h1>Form Laporan Banjir</h1>

            <p>
                Silakan isi data kejadian banjir
                dengan lengkap.
            </p>

        </div>


        {{-- Menampilkan semua error validasi --}}

        @if ($errors->any())

            <div class="alert-error">

                <strong>Terjadi kesalahan:</strong>

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

                <label for="nama">
                    Nama Pelapor
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                >

                @error('nama')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label for="lokasi">
                    Lokasi Kejadian
                </label>

                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    value="{{ old('lokasi') }}"
                    placeholder="Contoh: Kecamatan Baleendah, Desa Bojongsoang"
                >

                @error('lokasi')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label for="tinggi_air">
                    Tinggi Genangan Air (cm)
                </label>

                <input
                    type="number"
                    id="tinggi_air"
                    name="tinggi_air"
                    value="{{ old('tinggi_air') }}"
                    placeholder="Contoh: 50"
                    min="1"
                >

                @error('tinggi_air')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group">

                <label for="keterangan">
                    Keterangan Kejadian
                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="5"
                    placeholder="Jelaskan kondisi banjir yang terjadi..."
                >{{ old('keterangan') }}</textarea>

                @error('keterangan')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>


            <button type="submit" class="btn btn-full">

                📤 Kirim Laporan

            </button>


            <a href="{{ route('home') }}" class="back-link">

                ← Kembali ke halaman utama

            </a>

        </form>

    </div>

</div>

</body>

</html>