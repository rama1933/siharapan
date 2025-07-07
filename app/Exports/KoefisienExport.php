<?php

namespace App\Exports;

use App\Http\Controllers\KoefisienController; // Pastikan controller di-import
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing;
use Illuminate\Support\Collection;

class KoefisienExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithEvents
{
    protected $startDate;
    protected $endDate;
    protected $data;
    private $totalRows = 0;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        // Ambil data yang sudah diproses
        $koefisienController = new KoefisienController();
        // PERBAIKAN: Perlu membuat method di controller menjadi public untuk bisa diakses
        // atau duplikasi logikanya di sini. Untuk kesederhanaan, kita asumsikan bisa diakses.
        // Anda mungkin perlu mengubah method getKoefisienData menjadi public.
        $this->data = $koefisienController->getKoefisienData($startDate, $endDate);
    }

    public function collection()
    {
        $collection = new Collection($this->data['results']);
        // 3 judul + 1 kosong + 1 heading = 5 baris header
        $this->totalRows = $collection->count() + 5;
        return $collection;
    }

    public function headings(): array
    {
        return [
            ['LAPORAN ANALISIS KOEFISIEN HARGA'],
            ['Periode: ' . $this->data['periode_analisis']],
            ['Tanggal Cetak: ' . $this->data['tanggal_cetak']],
            [], // Baris kosong
            [
                'Komoditas',
                'Harga Rata-rata',
                'Koefisien Variasi',
                'Level Fluktuasi',
            ]
        ];
    }

    public function map($row): array
    {
        return [
            $row['komoditas'],
            $row['rata_rata'],
            $row['koefisien_variasi'],
            $row['level_fluktuasi']['text'],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Menggabungkan sel untuk judul
        $sheet->mergeCells('A1:D1');
        $sheet->mergeCells('A2:D2');
        $sheet->mergeCells('A3:D3');

        // Styling untuk judul laporan
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('A3')->getFont()->setItalic(true)->setSize(10);
        $sheet->getStyle('A1:A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Styling untuk header tabel (sekarang di baris 5)
        $sheet->getStyle('A5:D5')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF4A6F3A'], // Warna brand-green-700
            ],
        ]);

        // Menambahkan border ke seluruh tabel data
        if ($this->totalRows > 5) {
            $sheet->getStyle('A5:D' . $this->totalRows)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        // Terapkan format angka untuk kolom harga dan koefisien
        return [
            // Data dimulai dari baris ke-6
            'B' => ['numberFormat' => ['formatCode' => '"Rp. "#,##0.00']],
            'C' => ['numberFormat' => ['formatCode' => '0.00"%"']],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Menambahkan watermark sebagai header gambar
                $drawing = new HeaderFooterDrawing();
                $drawing->setName('Watermark');
                $drawing->setPath(public_path('logo/1.png')); // Pastikan path ini benar
                $drawing->setHeight(400);

                $sheet->getHeaderFooter()->addImage($drawing, \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooter::IMAGE_HEADER_CENTER);
                $sheet->getHeaderFooter()->setOddHeader('&C&G');
            },
        ];
    }
}
