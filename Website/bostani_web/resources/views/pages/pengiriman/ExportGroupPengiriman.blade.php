<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengiriman - {{ date('d M Y', strtotime(now())) }}</title>
    <style>
        body {
            line-height: 1em;
        }

        small {
            color: gray;
        }

        header h1 {
            text-align: center;
            font-size: 2rem;
        }

        .container {
            margin: 4px auto;
            /* border: 1px solid black; */
            padding: 8px;
        }

        .pesanan-list {
            line-height: 1.2rem;
            margin-left: 1cm;
            margin-top:  1cm;
        }

        .delivery_group_name {
            text-align: left;
            font-size: 1.2rem;
            text-transform: uppercase;
            font-weight: 500;
        }

        .text-message {
            font-size: .8em;
            text-align: center;
        }

        table {
            width : 100%;
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
        }

        .pesanan-list-address{
            width : 30%;
        }

        .pesanan-list-name{
            width : 15%;
        }
        .pesanan-list-ongkir{
            width : 10%;
        }

        td{
            border: 1px solid black;
        }


        .page-break {
            page-break-after: always;
        }

        .info {
            text-align: center;
            font-size: .8em;
            color: lightslategray;
        }
    </style>
</head>

<body>

    <header>
        <h1>Kelompok Pengiriman</h1>
        <p class="info">{{ date('d M Y', strtotime(now())) }}</p>
    </header>
    <hr>
    <div class="container">
        @foreach ($data_pengirimans as $data_pengiriman)
            <div class="page-break">
                <h3 class="delivery_group_name">Group - {{$loop->iteration}} </h3>
                <h4 class="driver">Driver : {{ $data_pengiriman->driver_type }}</h4>

                            <table >
                                <tr>
                                    <th class="pesanan-list-no">No</th>
                                    <th class="pesanan-list-name">Nama Pelanggan</th>
                                    <th class="pesanan-list-address">Alamat</th>
                                    <th class="pesanan-list-kelurahan">Kelurahan</th>
                                    <th class="pesanan-list-kecamatan">Kecamatan</th>
                                    <th class="pesanan-list-kota">Kota</th>
                                    <th class="pesanan-list-ongkir">Total Biaya</th>
                                    <th class="pesanan-list-payment">Payment Method</th>
                                </tr>
                                @foreach ($data_pengiriman->pesanans as $pesanan)

                                <tr>
                                    <td class="pesanan-list-no" style="text-align:center">{{$loop->iteration}}</td>
                                    <td class="pesanan-list-name" style="text-align:center">{{$pesanan->customers->customer_name}}</td>
                                    <td class="pesanan-list-address" style="padding-left: 10px;">{{$pesanan->customers->customer_address}}</td>
                                    <td class="pesanan-list-kelurahan" style="text-align:center">{{$pesanan->customers->kelurahan->urban_village_name??'-'}}</td>
                                    <td class="pesanan-list-kecamatan" style="text-align:center">{{$pesanan->customers->kelurahan->kecamatan->district_name??'-'}}</td>
                                    <td class="pesanan-list-kota" style="text-align:center">{{$pesanan->customers->kelurahan->kecamatan->kota->city_name??'-'}}</td>
                                    <td class="pesanan-list-ongkir" style="text-align:center">{{ number_format($pesanan->shipping_cost, 2, ',', '.') }}</td>
                                    <td class="pesanan-list-payment" style="text-align:center">{{$pesanan->payment_method}}</td>
                                </tr>
                                @endforeach

                            </table>

        @endforeach
</body>

</html>
