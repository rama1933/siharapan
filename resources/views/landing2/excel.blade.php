<!DOCTYPE html>
<html>

<head>
    <title>SIHAPOK</title>
</head>
<style>

</style>

<body>


    <table style="width: 100%">
        <thead>

            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        SIHAPOK
                    </h1>
            </tr>
            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        Sistem Informasi Harga Pokok
                    </h1>
            </tr>
            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">
                    Tanggal Cetak : {{ date('d-m-Y g:i:s') }}
            </tr>
            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">

            </tr>
            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        Tabel Harga Bahan Pokok
                    </h1>
            </tr>
            <tr>
                <th rowspan="2" style="vertical-align: middle;text-align:center;width:130px">
                    Nama Bahan
                <th rowspan="1" colspan="2" style="vertical-align: middle;text-align:center">
                    Pasar
                    Kandangan</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle;text-align:center">
                    Pasar
                    Negara</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle;text-align:center">
                    Pasar
                    Terpadu</th>
                <th rowspan="1" colspan="1" style="vertical-align: middle;text-align:center">
                    Indeks
                    Harga konsumen (IHK) Banjarmasin</th>
            </tr>
            <tr>
                <th style="vertical-align: middle;text-align:center">Harga
                </th>
                <th style="vertical-align: middle;text-align:center">
                    Persediaan
                </th>
                <th style="vertical-align: middle;text-align:center">Harga
                </th>
                <th style="vertical-align: middle;text-align:center">
                    Persediaan
                </th>
                <th style="vertical-align: middle;text-align:center">Harga
                </th>
                <th style="vertical-align: middle;text-align:center">
                    Persediaan
                </th>
                <th style="vertical-align: middle;text-align:center">Harga
                </th>
            </tr>
        </thead>
        <tbody id="tbl_non_filter">

            @foreach ($bahan as $bahan)
                <tr>
                    <td>
                        {{ $bahan->nama }}
                    </td>
                    @forelse($bahan->hargas->where('tanggal',date('Y-m-d')) as $a)
                        <td>
                            Rp. {{ number_format($a->harga_kandangan, 0, ',', '.') }} / {{ $bahan->satuan }}
                        </td>
                        <td>
                            {{ $a->persedian_kandangan }} {{ $bahan->satuan }}
                        </td>
                        <td>
                            Rp. {{ number_format($a->harga_negara, 0, ',', '.') }} / {{ $bahan->satuan }}
                        </td>
                        <td>
                            {{ $a->persedian_negara }} {{ $bahan->satuan }}
                        </td>
                        <td>
                            Rp. {{ number_format($a->harga_terpadu, 0, ',', '.') }} / {{ $bahan->satuan }}
                        </td>
                        <td>
                            {{ $a->persedian_terpadu }} {{ $bahan->satuan }}
                        </td>
                        <td>
                            Rp. {{ number_format($a->ihk_banjarmasin, 0, ',', '.') }}
                        </td>

                    @empty
                        @forelse ($bahan->hargas->sortByDesc('tanggal')->take(1) as $b)
                            <td>
                                Rp. {{ number_format($b->harga_kandangan, 0, ',', '.') }} / {{ $bahan->satuan }}
                            </td>
                            <td>
                                {{ $b->persedian_kandangan }} {{ $bahan->satuan }}
                            </td>
                            <td>
                                Rp. {{ number_format($b->harga_negara, 0, ',', '.') }} / {{ $bahan->satuan }}
                            </td>
                            <td>
                                {{ $b->persedian_negara }} {{ $bahan->satuan }}
                            </td>
                            <td>
                                Rp. {{ number_format($b->harga_terpadu, 0, ',', '.') }} / {{ $bahan->satuan }}
                            </td>
                            <td>
                                {{ $b->persedian_terpadu }} {{ $bahan->satuan }}
                            </td>
                            <td>
                                Rp. {{ number_format($b->ihk_banjarmasin, 0, ',', '.') }}
                            </td>
                        @empty
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @endforelse
                    @endforelse
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
