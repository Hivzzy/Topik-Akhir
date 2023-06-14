@extends('main')

@section('container')
    <div class="space-y-4">
        <h1 class="text-lg sm:text-2xl font-semibold">Visualisasi Data Penjualan</h1>

        {{-- Card --}}
        @if ($data['pelanggan'] != null )
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="block rounded bg-white p-6 shadow-md">
                    <h5 class="mb-2 text-2xl font-medium leading-tight">
                        {{ $data['pelanggan']['pelanggan'] }}
                    </h5>
                    <p class="mb-4 text-base">
                        Pelanggan paling sering memesan 30 hari terakhir
                    </p>
                    <small class="text-xs text-gray-500">Jumlah Pemesanan :
                        {{ $data['pelanggan']['jumlah_pesanan'] }}</small>
                </div>
                <div class="block rounded bg-white p-6 shadow-md">
                    <h5 class="mb-2 text-2xl font-medium leading-tight">
                        {{ $data['kelurahan']['kelurahan'] }}
                    </h5>
                    <p class="mb-4 text-base">
                        Kelurahan paling banyak pesanan 30 hari terakhir
                    </p>
                    <small class="text-xs text-gray-500">Jumlah pesanan : {{ $data['kelurahan']['jumlah_pesanan'] }}</small>
                </div>
                <div class="block rounded bg-white p-6 shadow-md">
                    <h5 class="mb-2 text-2xl font-medium leading-tight">
                        {{ $data['kecamatan']['kecamatan'] }}
                    </h5>
                    <p class="mb-4 text-base">
                        Kecamatan paling banyak pesanan 30 hari terakhir
                    </p>
                    <small class="text-xs text-gray-500">Jumlah pesanan : {{ $data['kecamatan']['jumlah_pesanan'] }}</small>
                </div>
            </div>
        @endif

        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <h3 class="text-lg font-medium"">Grafik Penjualan Produk</h3>
            <hr>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <div class="text-md text-center">Kg</div>
                    <canvas id="produk_kg"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Bungkus</div>
                    <canvas id="produk_bungkus"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Bongkol</div>
                    <canvas id="produk_bongkol"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Tray</div>
                    <canvas id="produk_tray"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Ikat</div>
                    <canvas id="produk_ikat"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Butir</div>
                    <canvas id="produk_butir"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Pack</div>
                    <canvas id="produk_pack"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Paket</div>
                    <canvas id="produk_paket"></canvas>
                </div>
                <div>
                    <div class="text-md text-center">Pasang</div>
                    <canvas id="produk_pasang"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <div class="bg-white p-4 space-y-4 rounded shadow-md">
                <h3 class="text-lg font-medium">Grafik Wilayah Pemesanan</h3>
                <hr>
                <canvas id="region_chart"></canvas>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="/penjualan"
                class="flex gap-1 items-center w-fit inline-block rounded bg-info p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
                <x-icons.arrow-circle-left />
                <span>Kembali</span>
            </a>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/chart.js"></script>
    <script>
        getChart();
    </script>
@endsection
