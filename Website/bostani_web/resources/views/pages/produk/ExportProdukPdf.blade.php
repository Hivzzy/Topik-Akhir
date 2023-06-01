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
            margin-bottom: 6px;
            font-weight: 500;
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
    @foreach ($data_kategori as $kategori)
        <div class="container">
            <h3 class="category_name">{{ $kategori->category_name }}</h3>
            @foreach ($data_subkategori as $sub_kategori)
                <?php
                if ($sub_kategori->category_id == $kategori->id) {
            ?>
                <h4 class="sub_category_name">{{ $sub_kategori->sub_category_name }}</h4>
                @foreach ($data_produk as $produk)
                    <?php
                        if ($produk->sub_category_id != null) {
                            if ($produk->sub_category_id == $sub_kategori->id) {
                                ?>
                    <div class="item-list">{{ $produk->product_name }}
                        <small>{{ $produk->product_selling_price }}/{{ $produk->satuan->unit_product_name }}</small>
                    </div>
                    <?php
                            }
                        } else {
                            ?>
                    <div class="item-list">{{ $produk->product_name }}
                        <small>{{ $produk->product_selling_price }}/{{ $produk->satuan->unit_product_name }}</small>
                    </div>
                    <?php
                        }
                    ?>
                @endforeach
                <?php
                }
            ?>
            @endforeach

            <?php
                if ($kategori->category_name == 'Buah-Buahan') {
                    ?>
            @foreach ($data_produk as $produk)
                <?php
                                if ($produk->kategori->category_name == 'Buah-Buahan') {
                                    ?>
                <div class="item-list">{{ $produk->product_name }}
                    <small>{{ $produk->product_selling_price }}/{{ $produk->satuan->unit_product_name }}</small>
                </div>
                <?php
                                }
                            ?>
            @endforeach
            <?php
                }
            ?>
        </div>
    @endforeach

    <footer class="footer">Katalog Produk per {{ date('d M Y', strtotime(now())) }}</footer>
</body>

</html>
