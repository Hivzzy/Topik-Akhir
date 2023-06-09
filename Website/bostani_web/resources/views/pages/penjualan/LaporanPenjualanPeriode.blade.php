<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan Periode</title>
    <style>
        body {
            font-size: 1rem;
        }

        header {
            text-align: center;
        }

        header img {
            width: 5rem;
        }

        hr {
            margin: 1rem 0;
        }

        table {
            width: 100%;
        }

        table,
        table th,
        table td {
            border: .1px solid black;
        }

        .text-bold {
            font-weight: 700;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Laporan Penjualan Tanggal {{ date('d M Y', strtotime($tanggal_awal)) }} s/d
            {{ date('d M Y', strtotime($tanggal_akhir)) }}</h1>
        <img src="{{ $pict }}" alt="">
        <h2>Toko Bostani</h2>
    </header>
    <hr>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah Pesanan</th>
                    <th>Pendapatan</th>
                    <th>Modal Belanja</th>
                    <th>Profit</th>
                </tr>
            </thead>
            <tbody>}
                @php
                    $total_pesanan = 0;
                    $total_pendapatan = 0;
                    $total_modal = 0;
                    $total_profit = 0;
                @endphp
                @foreach ($transaksi as $item)
                    @php
                        $total_pendapatan += $item->pendapatan;
                        $total_modal += $item->modal_belanja;
                        $total_profit += $item->pendapatan - $item->modal_belanja;
                    @endphp
                    <tr>
                        <td class="text-center">{{ date('d/m/Y', strtotime($item->tanggal_transaksi)) }}</td>
                        @foreach ($pesanan as $value)
                            @if ($value->tanggal_transaksi == $item->tanggal_transaksi)
                                @php
                                    $total_pesanan += $value->jumlah_pesanan;
                                @endphp
                                <td class="text-center">{{ $value->jumlah_pesanan }}</td>
                            @endif
                        @endforeach
                        <td class="text-right">Rp{{ number_format($item->pendapatan, 2, ',', '.') }}</td>
                        <td class="text-right">Rp{{ number_format($item->modal_belanja, 2, ',', '.') }}</td>
                        <td class="text-right">
                            Rp{{ number_format($item->pendapatan - $item->modal_belanja, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-bold text-center">Total</td>
                    <td class="text-bold text-center">{{ $total_pesanan }}</td>
                    <td class="text-bold text-right">Rp{{ number_format($total_pendapatan, 2, ',', '.') }}</td>
                    <td class="text-bold text-right">Rp{{ number_format($total_modal, 2, ',', '.') }}</td>
                    <td class="text-bold text-right">Rp{{ number_format($total_profit, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>
