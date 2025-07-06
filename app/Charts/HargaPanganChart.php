<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Carbon\Carbon;
use App\Models\HargaKandangan;

class HargaPanganChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handles the HTTP request for the chart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // Di dalam file app/Charts/HargaPanganChart.php

    public function handler()
    {
        // 1. Ambil data dari database
        $harga_data = [];
        $tanggal_data = [];
        $tanggalTerakhirUpdate = \App\Models\HargaKandangan::max('tanggal');

        // 2. Hanya proses jika ada data di database
        if ($tanggalTerakhirUpdate) {
            $endDate = \Carbon\Carbon::parse($tanggalTerakhirUpdate);
            $startDate = $endDate->copy()->subDays(29);

            $harga_data = \App\Models\HargaKandangan::whereBetween('tanggal', [$startDate, $endDate])
                ->orderBy('tanggal', 'ASC')
                ->pluck('harga_terendah')
                ->toArray();

            $tanggal_data = \App\Models\HargaKandangan::whereBetween('tanggal', [$startDate, $endDate])
                ->orderBy('tanggal', 'ASC')
                ->pluck('tanggal')
                ->map(fn($date) => \Carbon\Carbon::parse($date)->format('d M'))
                ->toArray();
        }

        // 3. Buat chart berdasarkan ketersediaan data
        // Cek jika $harga_data TIDAK kosong
        if (!empty($harga_data)) {
            // Jika ADA data, buat chart seperti biasa
            return $this
                ->title('Grafik Harga Pangan (30 Hari Terakhir)')
                ->labels($tanggal_data)
                ->dataset('Harga Lokal', 'line', $harga_data)
                ->options([
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'lineTension' => 0.4, // Membuat garis melengkung
                ]);
        } else {
            // Jika TIDAK ADA data, buat chart kosong dengan pesan
            return $this
                ->title('Grafik Harga Pangan')
                ->labels(['Data tidak tersedia untuk ditampilkan'])
                ->dataset('Tidak ada data', 'line', [0]) // Beri nilai dummy agar tidak error
                ->options([
                    'responsive' => true,
                    'plugins' => [
                        'legend' => [
                            'display' => false, // Sembunyikan legenda
                        ],
                        'title' => [
                            'display' => true,
                            'text' => 'Data tidak ditemukan'
                        ]
                    ]
                ]);
        }
    }
}
