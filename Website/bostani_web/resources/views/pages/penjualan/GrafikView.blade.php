@extends('main')

@section('container')
    <div class="space-y-4">
        <h1 class="text-lg sm:text-2xl font-semibold">Visualisasi Data Penjualan</h1>

        {{-- Card --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="block rounded bg-white p-6 shadow-md">
                <h5 class="mb-2 text-2xl font-medium leading-tight">
                    {{ $penjualan_produk[0]['nama_item'] }}
                </h5>
                <p class="mb-4 text-base">
                    Produk paling banyak dipesan 7 hari terakhir
                </p>
                <small class="text-xs text-gray-500">Total Pesanan : {{ $penjualan_produk[0]['jumlah_item'] }}
                    {{ $penjualan_produk[0]['satuan'] }}</small>
            </div>
            <div class="block rounded bg-white p-6 shadow-md">
                <h5 class="mb-2 text-2xl font-medium leading-tight">
                    {{ $pelanggan->pelanggan }}
                </h5>
                <p class="mb-4 text-base">
                    Pelanggan paling sering memesan 7 hari terakhir
                </p>
                <small class="text-xs text-gray-500">Jumlah Pemesanan : {{ $pelanggan->jumlah_pesanan }}</small>
            </div>
            <div class="block rounded bg-white p-6 shadow-md">
                <h5 class="mb-2 text-2xl font-medium leading-tight">
                    {{ $wilayah_penjualan[0]['kelurahan'] }}
                </h5>
                <p class="mb-4 text-base">
                    Wilayah paling banyak pesanan 7 hari terakhir
                </p>
                <small class="text-xs text-gray-500">Jumlah pesanan : {{ $wilayah_penjualan[0]['jumlah_pesanan'] }}</small>
            </div>
        </div>

        <div class="grid grid-cols-1">
            <div class="bg-white p-4 space-y-4 rounded shadow-md">
                <div class="text-xl font-medium">Grafik Produk Paling Banyak Dipesan</div>
                <canvas id="product_chart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1">
            <div class="bg-white p-4 space-y-4 rounded shadow-md">
                <div class="text-xl font-medium">Grafik Wilayah Pemesanan</div>
                <canvas id="region_chart"></canvas>
            </div>
        </div>

        <a href="/penjualan"
            class="flex gap-1 items-center w-fit inline-block rounded bg-info p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
            <x-icons.arrow-circle-left />
            <span>Kembali</span>
        </a>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const c_product = document.getElementById("product_chart");
        const c_region = document.getElementById("region_chart");

        // Grafik Produk
        new Chart(c_product, {
            type: "bar",
            data: {
                labels: [
                    <?php
                    foreach ($penjualan_produk as $item) {
                        echo '"' . $item['nama_item'] . ' (' . $item['satuan'] . ')", ';
                    }
                    ?>
                ],
                datasets: [{
                    label: "Penjualan Produk 7 Hari Terakhir",
                    data: [
                        <?php
                        foreach ($penjualan_produk as $item) {
                            echo '"' . $item['jumlah_item'] . '", ';
                        }
                        ?>
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        // Grafik Wilayah
        new Chart(c_region, {
            type: "bar",
            data: {
                labels: [
                    <?php
                    foreach ($wilayah_penjualan as $item) {
                        echo '"' . $item['kelurahan'] . '", ';
                    }
                    ?>
                ],
                datasets: [{
                    label: "Wilayah Penjualan 7 Hari Terakhir",
                    data: [
                        <?php
                        foreach ($wilayah_penjualan as $item) {
                            echo '"' . $item['jumlah_pesanan'] . '", ';
                        }
                        ?>
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
@endsection
