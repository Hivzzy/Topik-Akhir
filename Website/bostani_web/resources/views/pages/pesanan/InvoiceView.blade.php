<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Pesanan - {{ $detail_pesanan->customers->customer_name }}</title>
    <style>
        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .table {
            width: 100%;
            padding: 8px;
            font-size: .8rem;
            border: 1px solid #000000;
        }

        .table img {
            width: 75%;
        }

        .table .first-column {
            width: 5%;
        }

        .table .title {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <table class="table" cellpadding="2">
        <tr>
            <td class="text-center" colspan="2">
                <img src="{{ $pict }}" alt="Logo Bostani">
            </td>
            <td colspan="4">
                <table cellpadding="2">
                    <tr>
                        <th class="text-center title" colspan="3">Invoice - {{ date('d M Y', strtotime(now())) }}
                        </th>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $detail_pesanan->customers->customer_name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $detail_pesanan->customers->customer_address }}</td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td>{{ $detail_pesanan->customers->customer_phone }}</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>:</td>
                        <td>{{ $detail_pesanan->payment_method }}</td>
                    </tr>
                    <tr>
                        <td>Ongkos Kirim</td>
                        <td>:</td>
                        <td>Rp{{ number_format($detail_pesanan->shipping_cost, 2, ',', '.') }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Penanggung Jawab Pesanan</td>
                        <td>:</td>
                        <td>{{ $detail_pesanan->users->name }}</td>
                    </tr> --}}
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <hr>
            </td>
        </tr>
        <tr>
            <th class="first-column">No</th>
            <th>Nama Item</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub Total</th>
            <th>Keterangan</th>
        </tr>
        @php
            $total_harga = 0;
        @endphp
        @foreach ($items as $item)
            @php
                $total_harga += $item->item_selling_price * $item->item_size;
            @endphp
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->produk->product_name }}</td>
                <td class="text-center">
                    {{ $item->item_size }}<small>/{{ $item->produk->satuan->unit_product_name }}</small></td>
                <td class="text-right">Rp{{ number_format($item->item_selling_price, 2, ',', '.') }}</td>
                <td class="text-right">Rp{{ number_format($item->item_selling_price * $item->item_size, 2, ',', '.') }}
                </td>
                <td></td>
            </tr>
        @endforeach
        <tr>
            <th class="text-center" colspan="4">Total Pesanan</th>
            <th class="text-right">Rp{{ number_format($total_harga, 2, ',', '.') }}</th>
            <th></th>
        </tr>
    </table>
</body>

</html>
