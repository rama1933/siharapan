<?php

namespace App\Exports;

use App\Services\LandingService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing;

class HomeHargaPanganExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithEvents
{
    protected $service;
    private $totalRows = 0;

    public function __construct(LandingService $service)
    {
        $this->service = $service;
    }

    public function collection()
    {
        $collection = $this->service->getAll();
        // 5 adalah jumlah baris header (2 judul + 1 tanggal + 1 kosong + 1 heading)
        $this->totalRows = $collection->count() + 5;
        return $collection;
    }

    public function headings(): array
    {
        // PERBAIKAN: Menambahkan header laporan dan tanggal cetak
        return [
            ['LAPORAN HARGA PANGAN HARIAN'],
            ['DINAS KETAHANAN PANGAN KABUPATEN HULU SUNGAI SELATAN'],
            ['Tanggal Cetak: ' . \Carbon\Carbon::now()->isoFormat('D MMMM YYYY')],
            [], // Baris kosong untuk spasi
            [
                'Nama Komoditas',
                'Jenis',
                'Satuan',
                'Harga',
                'Tanggal Update',
            ]
        ];
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->jenis,
            $row->satuan,
            $row->harga_terendah,
            \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Menggabungkan sel untuk judul utama dan tanggal cetak
        $sheet->mergeCells('A1:E1');
        $sheet->mergeCells('A2:E2');
        $sheet->mergeCells('A3:E3');

        // Styling untuk judul laporan dan sub-judul
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A2')->getFont()->setSize(12);
        $sheet->getStyle('A3')->getFont()->setItalic(true)->setSize(10);
        $sheet->getStyle('A1:A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Styling untuk header tabel (baris 5)
        $sheet->getStyle('A5:E5')->applyFromArray([
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
            $sheet->getStyle('A5:E' . $this->totalRows)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        // Terapkan format angka untuk kolom harga
        return [
            // Data dimulai dari baris ke-6
            'D' => ['numberFormat' => ['formatCode' => '"Rp. "#,##0']],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // PERBAIKAN: Menambahkan watermark sebagai header gambar
                // Watermark ini akan terlihat saat mencetak atau dalam mode "Page Layout" di Excel
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
