<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog Produk - {{ date('d M Y', strtotime(now())) }}</title>
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

        .item-list {
            display: inline-block;
            width: 45%;
            font-size: .8rem;
            line-height: 1.2rem;
            margin-left: 0.05cm;
            margin-top: 0.05cm;
        }

        .category_name {
            text-align: center;
            font-size: 1.2rem;
            text-transform: uppercase;
            font-weight: 500;
        }

        .sub_category_name {
            text-align: center;
            font-size: 1rem;
            margin: 0.5rem auto;
            font-weight: 500;
        }

        .text-message {
            font-size: .8em;
            text-align: center;
        }

        table {
            border: 0.01cm solid;
        }

        table {
            width: 18cm;
        }

        tr {
            margin-top: 1rem;
        }

        th {
            background-color: #9dc183;
            border-bottom: 1px solid #000000;
            color: black;
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
        <h1>Katalog Produk</h1>
        <p class="info">Per {{ date('d M Y', strtotime(now())) }}</p>
    </header>
    <hr>
    <div class="container">
        @foreach ($data_kategori as $kategori)
            <div class="page-break">
                <h3 class="category_name">{{ $kategori->category_name }}</h3>
                @if (array_key_exists($kategori->id, $info_kategori))
                    @foreach ($data_subkategori as $sub_kategori)
                        @if ($sub_kategori->category_id == $kategori->id)
                            <table>
                                <tr>
                                    <th>
                                        <h4 class="sub_category_name">{{ $sub_kategori->sub_category_name }}</h4>
                                    </th>
                                </tr>
                                <tr>
                                    @if (array_key_exists($sub_kategori->id, $info_sub_kategori))
                                        @foreach ($data_produk as $produk)
                                            @if ($produk->sub_category_id == $sub_kategori->id)
                                                <div class="item-list"> {{ $produk->product_name }}
                                                    <small> &nbsp;
                                                        Rp
                                                        {{ number_format($produk->product_selling_price, 0, ',', '.') }}/{{ $produk->satuan->unit_name }}</small>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p class="text-message">Tidak ada produk</p>
                                    @endif
                                </tr>
                            </table>
                        @endif
                    @endforeach
                @else
                    <table>
                        <tr>
                            @foreach ($data_produk as $produk)
                                @if ($produk->category_id == $kategori->id)
                                    <div class="item-list"> {{ $produk->product_name }}
                                        <small> &nbsp;
                                            Rp
                                            {{ number_format($produk->product_selling_price, 0, ',', '.') }}/{{ $produk->satuan->unit_name }}</small>
                                    </div>
                                @endif
                            @endforeach
                        </tr>
                    </table>
                @endif
            </div>
        @endforeach
    </div>
</body>

</html>
