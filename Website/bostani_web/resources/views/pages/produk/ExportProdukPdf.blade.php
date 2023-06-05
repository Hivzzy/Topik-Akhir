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
            margin-bottom: 24px;
            font-size: 2rem;
        }

        .container {
            margin: 4px auto;
            /* border: 1px solid black; */
            padding: 8px;
        }

        .item-list {
            display: inline-block;
            width: 30%;
            font-size: .8rem;
            line-height: 1.2rem;
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

        .footer {
            text-align: center;
            font-size: .8em;
            margin-top: 64px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Katalog Produk</h1>
    </header>
    <hr>
    <div class="container">
        @foreach ($data_kategori as $kategori)
            <div class="page-break">
                <h3 class="category_name">{{ $kategori->category_name }}</h3>
                @foreach ($data_subkategori as $sub_kategori)
                    @if ($sub_kategori->category_id == $kategori->id)
                        <table>
                            <th>
                                <h4 class="sub_category_name">{{ $sub_kategori->sub_category_name }}</h4>
                            </th>
                            <tr>
                                @foreach ($data_produk as $produk)
                                    @if ($produk->sub_category_id != null)
                                        @if ($produk->sub_category_id == $sub_kategori->id)
                                            @if ($produk->sub_category_id)
                                                <div class="item-list"> {{ $produk->product_name }}
                                                    <small> &nbsp; {{ $produk->product_selling_price }}/{{ $produk->satuan->unit_product_name }}</small>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </tr>
                        </table>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

    <footer class="footer">Katalog Produk per {{ date('d M Y', strtotime(now())) }}</footer>
</body>

</html>
