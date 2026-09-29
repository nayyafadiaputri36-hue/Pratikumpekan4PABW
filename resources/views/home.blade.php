<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LaporBanjir - BPBD Kabupaten Bandung</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <div class="hero">

            <div class="icon">🌊</div>

            <h1>LaporBanjir</h1>

            <p class="subtitle">
                Sistem Pelaporan Banjir
                <br>
                BPBD Kabupaten Bandung
            </p>

            <p class="description">
                Laporkan kejadian banjir di sekitar Anda
                dengan cepat dan mudah.
            </p>

            <a href="{{ route('lapor') }}" class="btn">
                Buat Laporan Banjir
            </a>

        </div>

        <div class="info">

            <div class="info-card">
                <span>📍</span>
                <h3>Lokasi</h3>
                <p>Informasikan lokasi terjadinya banjir.</p>
            </div>

            <div class="info-card">
                <span>💧</span>
                <h3>Tinggi Air</h3>
                <p>Masukkan perkiraan tinggi genangan.</p>
            </div>

            <div class="info-card">
                <span>⚡</span>
                <h3>Cepat</h3>
                <p>Laporkan kejadian dengan mudah.</p>
            </div>

        </div>

        <footer>
            &copy; {{ date('Y') }} LaporBanjir - BPBD Kabupaten Bandung
        </footer>

    </div>

</body>
</html>