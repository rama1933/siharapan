@forelse ($table as $key => $value)
    <tr>
        <td style="background-color: moccasin">
            <h5>{{ $loop->iteration }}</h5>
        </td>
        <td colspan="20" style="background-color: moccasin">
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
            @if (isset($item['harga_hari_ini_kandangan']))
                <td>
                    Rp.
                    {{ number_format($item['harga_hari_ini_kandangan'], 0, ',', '.') }}
                </td>
                <td>
                    Rp.
                    {{ number_format($item['harga_kemarin_kandangan'], 0, ',', '.') }}
                </td>
                <td>
                    Rp.
                    {{ number_format($item['perubahan_harga_kandangan'], 0, ',', '.') }}
                    @if ($item['perubahan_harga_kandangan'] > 0)
                        <i class="fa fa-arrow-up" style="color:red"></i>
                    @elseif($item['perubahan_harga_kandangan'] < 0)
                        <i class="fa fa-arrow-down" style="color: green"></i>
                    @elseif($item['perubahan_harga_kandangan'] = 0)
                    @endif
                </td>
                <td>
                    {{ number_format($item['perubahan_harga_persen_kandangan'], 0, ',', '.') }}%
                    @if ($item['perubahan_harga_persen_kandangan'] > 0)
                        <i class="fa fa-arrow-up" style="color:red"></i>
                    @elseif($item['perubahan_harga_persen_kandangan'] < 0)
                        <i class="fa fa-arrow-down" style="color: green"></i>
                    @elseif($item['perubahan_harga_persen_kandangan'] = 0)
                    @endif
                </td>
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif

            @if (isset($item['harga_hari_ini_negara']))
                <td>
                    Rp.
                    {{ number_format($item['harga_hari_ini_negara'], 0, ',', '.') }}
                </td>
                <td>
                    Rp.
                    {{ number_format($item['harga_kemarin_negara'], 0, ',', '.') }}
                </td>
                <td>
                    Rp.
                    {{ number_format($item['perubahan_harga_negara'], 0, ',', '.') }}
                    @if ($item['perubahan_harga_negara'] > 0)
                        <i class="fa fa-arrow-up" style="color:red"></i>
                    @elseif($item['perubahan_harga_negara'] < 0)
                        <i class="fa fa-arrow-down" style="color: green"></i>
                    @elseif($item['perubahan_harga_negara'] = 0)
                    @endif
                </td>
                <td>
                    {{ number_format($item['perubahan_harga_persen_negara'], 0, ',', '.') }}%
                    @if ($item['perubahan_harga_persen_negara'] > 0)
                        <i class="fa fa-arrow-up" style="color:red"></i>
                    @elseif($item['perubahan_harga_persen_negara'] < 0)
                        <i class="fa fa-arrow-down" style="color: green"></i>
                    @elseif($item['perubahan_harga_persen_negara'] = 0)
                    @endif
                </td>
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif


            @if (isset($item['harga_hari_ini_bjm']))
                <td>
                    Rp.
                    {{ number_format($item['harga_hari_ini_bjm'], 0, ',', '.') }}
                </td>
                <td>
                    Rp.
                    {{ number_format($item['harga_kemarin_bjm'], 0, ',', '.') }}
                </td>
                <td>
                    Rp.
                    {{ number_format($item['perubahan_harga_bjm'], 0, ',', '.') }}
                    @if ($item['perubahan_harga_bjm'] > 0)
                        <i class="fa fa-arrow-up" style="color:red"></i>
                    @elseif($item['perubahan_harga_bjm'] < 0)
                        <i class="fa fa-arrow-down" style="color: green"></i>
                    @elseif($item['perubahan_harga_bjm'] = 0)
                    @endif
                </td>
                <td>
                    {{ number_format($item['perubahan_harga_persen_bjm'], 0, ',', '.') }}%
                    @if ($item['perubahan_harga_persen_bjm'] > 0)
                        <i class="fa fa-arrow-up" style="color:red"></i>
                    @elseif($item['perubahan_harga_persen_bjm'] < 0)
                        <i class="fa fa-arrow-down" style="color: green"></i>
                    @elseif($item['perubahan_harga_persen_bjm'] = 0)
                    @endif
                </td>
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif

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
            @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @endif



            <td>
                {{ $item['persedian'] }}
            </td>
        </tr>
    @endforeach
@empty
    <tr>
        <td colspan="20">-- Data Kosong --</td>
    </tr>
@endforelse
