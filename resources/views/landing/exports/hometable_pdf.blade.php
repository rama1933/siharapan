<!DOCTYPE html>
<html>

<head>
    <title>Laporan Harga Pangan Harian</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            margin: 2.5cm 2cm 2cm 2cm;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            z-index: -1000;
            opacity: 0.1;
            font-size: 120px;
            font-weight: bold;
            color: #d1a943;
            text-align: center;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
            line-height: 1.5cm;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            text-align: center;
            line-height: 1cm;
            font-size: 10px;
        }

        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .report-title h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .report-title p {
            margin: 5px 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: #4A6F3A;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="watermark">SIHARAPAN</div>

    <header>
        {{-- Anda bisa menambahkan logo di sini jika perlu --}}
    </header>

    <footer>
        Laporan ini dibuat oleh Sistem Informasi Harga Pangan (SIHARAPAN) &copy; {{ date('Y') }}
    </footer>

    <main>
        <div class="report-title">
            <h2>Laporan Harga Pangan Harian</h2>
            <p><strong>Tanggal Cetak:</strong> {{ $tanggal_cetak }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th class="text-right">Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($table as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td class="text-right">Rp. {{ number_format($item->harga_terendah, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">Tidak ada data yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>

</html>
