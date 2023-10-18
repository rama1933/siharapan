<!DOCTYPE html>
<html>

<head>
    <title>SIHARAPAN</title>
</head>
<style>

</style>

<body>


    <table style="width: 100%">
        <thead>

            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        SIHARAPAN
                    </h1>
            </tr>
            <tr>
                <th colspan="10" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        Sistem Informasi Harga Pangan
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
                        Tabel Harga Pangan
                    </h1>
            </tr>
            <tr>
                <th rowspan="2" style="vertical-align: middle;text-align:center;width:130px">
                    Nama
                <th rowspan="1" colspan="2" style="vertical-align: middle;text-align:center">
                    Harga
                    Eceran</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle;text-align:center">
                    Harga
                    Produsen</th>
                {{-- <th rowspan="1" colspan="2" style="vertical-align: middle;text-align:center">
                    Pasar
                    Terpadu</th> --}}
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
                {{-- <th style="vertical-align: middle;text-align:center">Harga
                </th>
                <th style="vertical-align: middle;text-align:center">
                    Persediaan
                </th> --}}
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
                            Rp. {{ number_format($a->harga_eceran, 0, ',', '.') }} / {{ $bahan->satuan }}
                        </td>
                        <td>
                            {{ $a->persedian_eceran }} {{ $bahan->satuan }}
                        </td>
                        <td>
                            Rp. {{ number_format($a->harga_produsen, 0, ',', '.') }} / {{ $bahan->satuan }}
                        </td>
                        <td>
                            {{ $a->persedian_produsen }} {{ $bahan->satuan }}
                        </td>
                        <td>
                            Rp. {{ number_format($a->harga_terpadu, 0, ',', '.') }} / {{ $bahan->satuan }}
                        </td>
                        <td>
                            {{ $a->persedian_terpadu }} {{ $bahan->satuan }}
                        </td>

                    @empty
                        @forelse ($bahan->hargas->sortByDesc('tanggal')->take(1) as $b)
                            <td>
                                Rp. {{ number_format($b->harga_eceran, 0, ',', '.') }} / {{ $bahan->satuan }}
                            </td>
                            <td>
                                {{ $b->persedian_eceran }} {{ $bahan->satuan }}
                            </td>
                            <td>
                                Rp. {{ number_format($b->harga_produsen, 0, ',', '.') }} / {{ $bahan->satuan }}
                            </td>
                            <td>
                                {{ $b->persedian_produsen }} {{ $bahan->satuan }}
                            </td>
                            {{-- <td>
                                Rp. {{ number_format($b->harga_terpadu, 0, ',', '.') }} / {{ $bahan->satuan }}
                            </td>
                            <td>
                                {{ $b->persedian_terpadu }} {{ $bahan->satuan }}
                            </td> --}}
                        @empty
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            {{-- <td></td>
                            <td></td> --}}
                        @endforelse
                    @endforelse
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
