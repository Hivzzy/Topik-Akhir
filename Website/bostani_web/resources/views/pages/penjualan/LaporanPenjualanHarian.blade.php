<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan Harian</title>
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
        <h1>Laporan Penjualan Tanggal {{ date('d M Y', strtotime($tanggal)) }}</h1>
        <img src="{{ $pict }}" alt="">
        <h2>Toko Bostani</h2>
    </header>
    <hr>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kuantitas</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>}
                @php
                    $total_pendapatan = 0;
                @endphp
                @foreach ($item_penjualan as $item)
                    @php
                        $total_pendapatan += $item->item_selling_price * $item->item_size;
                    @endphp
                    <tr>
                        <td class="text-center">{{ date('d/m/Y', strtotime($tanggal)) }}</td>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->produk->product_name }}</td>
                        <td class="text-center">{{ $item->item_size }}</td>
                        <td class="text-center">{{ $item->produk->satuan->unit_product_name }}</td>
                        <td class="text-right">Rp{{ number_format($item->item_selling_price, 2, ',', '.') }}</td>
                        <td class="text-right">
                            Rp{{ number_format($item->item_selling_price * $item->item_size, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-bold text-right">Total</td>
                    <td class="text-bold text-right">Rp{{ number_format($total_pendapatan, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>
