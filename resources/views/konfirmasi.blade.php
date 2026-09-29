<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Berhasil</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>


<body>

<div class="container">

    <div class="confirmation">

        <div class="success-icon">
            ✓
        </div>

        <h1>Laporan Berhasil Dikirim!</h1>

        <p class="success-text">
            Terima kasih telah melaporkan kejadian banjir.
        </p>


        <div class="report-box">

            <h2>Detail Laporan</h2>


            <div class="detail">

                <span>Nama Pelapor</span>

                <strong>
                    {{ $laporan['nama'] }}
                </strong>

            </div>


            <div class="detail">

                <span>Lokasi Kejadian</span>

                <strong>
                    {{ $laporan['lokasi'] }}
                </strong>

            </div>


            <div class="detail">

                <span>Tinggi Genangan</span>

                <strong>
                    {{ $laporan['tinggi_air'] }} cm
                </strong>

            </div>


            <div class="detail">

                <span>Keterangan</span>

                <strong>
                    {{ $laporan['keterangan'] }}
                </strong>

            </div>

        </div>


        <div class="notice">

            <strong>ℹ️ Informasi</strong>

            <p>
                Data laporan ini hanya ditampilkan sebagai
                konfirmasi dan tidak disimpan ke database.
            </p>

        </div>


        <a href="{{ route('lapor') }}" class="btn">

            Buat Laporan Baru

        </a>


        <br>


        <a href="{{ route('home') }}" class="back-link">

            ← Kembali ke halaman utama

        </a>

    </div>

</div>

</body>

</html>