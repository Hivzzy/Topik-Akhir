@extends('main')

@section('container')
    <div class="space-y-4">
        <h1 class="text-lg sm:text-2xl font-semibold">Visualisasi Data Penjualan</h1>

        {{-- Card --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="block rounded bg-white p-6 shadow-md">
                <h5 class="mb-2 text-2xl font-medium leading-tight">
                    Kentang
                </h5>
                <p class="mb-4 text-base">
                    Produk paling banyak dipesan
                </p>
                <small class="text-xs text-gray-500">Jumlah pemesanan : 100</small>
            </div>
            <div class="block rounded bg-white p-6 shadow-md">
                <h5 class="mb-2 text-2xl font-medium leading-tight">
                    Novie Octavia
                </h5>
                <p class="mb-4 text-base">
                    Pelanggan paling sering memesan
                </p>
                <small class="text-xs text-gray-500">Jumlah Pemesanan : 50</small>
            </div>
            <div class="block rounded bg-white p-6 shadow-md">
                <h5 class="mb-2 text-2xl font-medium leading-tight">
                    Cimahi Utara
                </h5>
                <p class="mb-4 text-base">
                    Wilayah paling banyak pesanan
                </p>
                <small class="text-xs text-gray-500">Jumlah pesanan : 200</small>
            </div>
        </div>

        {{-- Bar Chart --}}
        <div class="grid grid-cols-1">
            <div class="bg-white p-4 space-y-4 rounded shadow-md">
                <div class="text-xl font-medium">Grafik Produk Paling Banyak Dipesan</div>
                <div class="mx-auto w-3/5 overflow-hidden">
                    <canvas id="grafik-produk-pesanan"></canvas>
                </div>
            </div>
        </div>

        <a href="/penjualan"
            class="flex gap-1 items-center w-fit inline-block rounded bg-info p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
            <x-icons.arrow-circle-left />
            <span>Kembali</span>
        </a>
    </div>
@endsection
