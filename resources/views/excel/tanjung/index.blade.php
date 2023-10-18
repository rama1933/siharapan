<!DOCTYPE html>
<html>

<head>
    <title>SIHAPOK</title>
</head>
<style>

</style>

<body>

    <table class="table table-bordered table-striped  table-md" id="table">
        <thead>
            <tr>
                <th colspan="7" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        SIHAPOK
                    </h1>
            </tr>
            <tr>
                <th colspan="7" style="vertical-align: middle;text-align:center;width:130px">
                    <h1>
                        Sistem Informasi Harga Pokok IHK Tanjung
                        @if ($tanggal != null)
                            Tanggal {{ date('d-m-Y', strtotime($tanggal)) }}
                        @endif

                    </h1>
            </tr>
            <tr>
                <th colspan="7" style="vertical-align: middle;text-align:center;width:130px">
                    Tanggal Cetak : {{ date('d-m-Y g:i:s') }}
            </tr>
            <tr>
                <th colspan="7" style="vertical-align: middle;text-align:center;width:130px">

            </tr>
            <tr>
                <th rowspan="2" style="vertical-align: middle;text-align:center;width:130px">
                    No
                </th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;width:130px">
                    Nama Bahan
                </th>
                <th rowspan="2" style="vertical-align: middle;text-align:center;width:130px">
                    Satuan
                </th>

                <th rowspan="1" colspan="4" style="vertical-align: middle;text-align:center">Pasar
                    Tanjung</th>
                <th rowspan="2" style="vertical-align: middle;text-align:center">
                    Persediaan
                </th>
            </tr>
            <tr>

                <th
                    style="vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                    Harga Hari Ini</th>
                <th
                    style="vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                    Harga Kemarin</th>
                <th
                    style="vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                    Perubahan Harga</th>
                <th
                    style="vertical-align: middle;text-align:center;padding-right:20px;padding-left:20px;border-spacing: 0px;white-space: nowrap;">
                    Perubahan Harga (%)</th>
            </tr>
        </thead>
        <tbody id="tbl_non_filter">

            @foreach ($table as $key => $value)
                <tr>
                    <td style="background-color: moccasin">
                        <h5>{{ $loop->iteration }}</h5>
                    </td>
                    <td colspan="7" style="background-color: moccasin">
                        <h5>{{ $key }}</h5>
                    </td>
                </tr>
                @foreach ($value as $item)
                    <tr>
                        <td></td>
                        <td>
                            {{ $item['nama'] }}
                        </td>
                        <td>
                            {{ $item['satuan'] }}
                        </td>
                        @if (isset($item['harga_hari_ini_tanjung']))
                            <td>
                                Rp.
                                {{ number_format($item['harga_hari_ini_tanjung'], 0, ',', '.') }}
                            </td>
                            <td>
                                Rp.
                                {{ number_format($item['harga_kemarin_tanjung'], 0, ',', '.') }}
                            </td>
                            <td>
                                Rp.
                                {{ number_format($item['perubahan_harga_tanjung'], 0, ',', '.') }}
                                @if ($item['perubahan_harga_tanjung'] > 0)
                                    <i class="fa fa-arrow-up" style="color:red"></i>
                                @elseif($item['perubahan_harga_tanjung'] < 0)
                                    <i class="fa fa-arrow-down" style="color: green"></i>
                                @elseif($item['perubahan_harga_tanjung'] = 0)
                                @endif
                            </td>
                            <td>
                                {{ number_format($item['perubahan_harga_persen_tanjung'], 0, ',', '.') }}%
                                @if ($item['perubahan_harga_persen_tanjung'] > 0)
                                    <i class="fa fa-arrow-up" style="color:red"></i>
                                @elseif($item['perubahan_harga_persen_tanjung'] < 0)
                                    <i class="fa fa-arrow-down" style="color: green"></i>
                                @elseif($item['perubahan_harga_persen_tanjung'] = 0)
                                @endif
                            </td>
                            <td>
                                {{ $item['persedian'] }}
                            </td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach

        </tbody>
    </table>
</body>

</html>
