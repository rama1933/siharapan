<?php

namespace App\Exports;

use App\Models\HargaKandangan;
use App\Models\BahanPokokChild;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing;

class DetailHargaPanganExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize, WithEvents
{
    protected $id;
    protected $startDate;
    protected $endDate;
    protected $komoditas;
    private $totalRows = 0;

    public function __construct($id, $startDate, $endDate)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->komoditas = HargaKandangan::findOrFail($id);
    }

    public function collection()
    {
        $query = HargaKandangan::query()
            ->where('bapo_id', $this->komoditas->id);

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('tanggal', [$this->startDate, $this->endDate]);
        }

        $collection = $query->orderBy('tanggal', 'desc')->get();
        // 3 judul + 1 kosong + 1 heading = 5 baris header
        $this->totalRows = $collection->count() + 5;
        return $collection;
    }

    public function headings(): array
    {
        return [
            ['LAPORAN DETAIL HARGA PANGAN'],
            ['Komoditas: ' . ucwords($this->komoditas->nama) . ' - ' . ucwords($this->komoditas->jenis)],
            ['Tanggal Cetak: ' . \Carbon\Carbon::now()->isoFormat('D MMMM YYYY')],
            [], // Baris kosong
            [
                'Tanggal',
                'Nama Komoditas',
                'Jenis',
                'Satuan',
                'Harga Eceran',
                'Harga Grosit',
                'Harga Kios Pagan',
            ]
        ];
    }

    public function map($row): array
    {
        return [
            \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y'),
            $row->nama,
            $row->jenis,
            $row->satuan,
            $row->harga_terendah,
            $row->harga_grosir,
            $row->harga_kios,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Menggabungkan sel untuk judul
        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');
        $sheet->mergeCells('A3:F3');

        // Styling untuk judul laporan
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A3')->getFont()->setItalic(true)->setSize(10);
        $sheet->getStyle('A1:A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Styling untuk header tabel (sekarang di baris 5)
        $sheet->getStyle('A5:G5')->applyFromArray([
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
            $sheet->getStyle('A5:G' . $this->totalRows)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        // Terapkan format angka untuk kolom harga
        return [
            // Data dimulai dari baris ke-6
            'E' => ['numberFormat' => ['formatCode' => '"Rp. "#,##0']],
            'F' => ['numberFormat' => ['formatCode' => '"Rp. "#,##0']],
            'G' => ['numberFormat' => ['formatCode' => '"Rp. "#,##0']],
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
