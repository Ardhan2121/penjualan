@php
    $totalKeseluruhan = 0;
@endphp
@forelse ($dataPesanan as $pesanan)
    <tr>
        <td>{{ $pesanan->{'2122091_KdBarang'} }}</td>
        <td>{{ $pesanan->{'2122091_NmBarang'} }}</td>
        <td>{{ $pesanan->{'2122091_Stok'} }}</td>
        <td>{{ $pesanan->pivot->{'2122091_JmlJual'} }}</td>
        <td>@rupiah($pesanan->pivot->{'2122091_HrgJual'})</td>
        <td>@rupiah($pesanan->pivot->{'2122091_JmlJual'} * $pesanan->pivot->{'2122091_HrgJual'})</td>
    </tr>
    @php
        $totalKeseluruhan += $pesanan->pivot->{'2122091_JmlJual'} * $pesanan->pivot->{'2122091_HrgJual'}; // Menambahkan total produk ke total keseluruhan
    @endphp
@empty
<tr>
    <td colspan="65">Tidak ada pesanan</td>
</tr>
@endforelse
<tr class="bg-light">
    <td colspan="5">Total</td>
    <td>@rupiah($totalKeseluruhan)</td>
</tr>
