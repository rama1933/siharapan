<!DOCTYPE html>
<html>

<head>
    <title>SIHAPOK</title>
</head>
<style>
    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
    }

    .left {
        width: 10%;
    }

    .right {
        width: 90%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        clear: both;
    }

    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
    }

    header {
        position: fixed;
        top: -30px;
        left: 0px;
        right: 0px;
    }

    footer {
        position: fixed;
        bottom: -10px;
        left: 0px;
        right: 0px;
    }
</style>

<body>
    <header>
        <hr>
    </header>
    <footer>
        <hr>
    </footer>
    <div class="row">
        <div class="column left">
            <img src="{{ public_path() }}/logo/hss.png" style="width:70px">
        </div>
        <div class="column right">
            <h3 style="margin-top: -2px;margin-left: -30px;">SIHAPOK</h3>
            <h6 style="margin-top: -20px;margin-left: -30px;">Sistem Informasi Harga Pokok</h6>
            <h6 style="margin-top: -25px;margin-left: -30px;">Tanggal Cetak : {{ date('d-m-Y H:i:s') }}</h6>
        </div>
    </div>
    <h1 style="text-align: center;">Tabel Harga Bahan Pokok</h1>
    <table style="width: 100%">
        <thead>
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
                            <td></td>
                        @endforelse
                    @endforelse
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
