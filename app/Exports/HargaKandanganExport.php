<?php

namespace App\Exports;

use App\Services\LandingService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HargaKandanganExport implements FromView, ShouldAutoSize
{
    protected $tanggal;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($tanggal)
    {
        $this->service = new LandingService;
        $this->tanggal = $tanggal;
    }

    public function view(): View
    {
        if ($this->tanggal != null) {
            $array = [
                'tanggal' => $this->tanggal
            ];
            // dd($array);
            $data['tanggal'] = $this->tanggal;
            $data['table'] = $this->service->filterData($array);
            return view('excel.kandangan.index', $data);
        } else {
            $data['tanggal'] = $this->tanggal;
            $data['table'] = $this->service->getAll();
            return view('excel.kandangan.index', $data);
        }
    }
}
