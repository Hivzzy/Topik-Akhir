@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Penjualan</h1>
        <div class="flex items-center bg-white p-4 rounded space-x-4 shadow-md">
            <a href="/penjualan/grafik"
                class="flex gap-1 items-center inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                <x-icons.chart-pie />
                <span class="text-white hidden sm:block">Grafik</span>
            </a>
            <div>
                <select id="jenisLaporan" data-te-select-init>
                    <option value="blank">-- Pilih Jenis Laporan --</option>
                    <option value="harian">Laporan Harian</option>
                    <option value="bulanan">Laporan Bulanan</option>
                    <option value="periode_waktu">Laporan Per Periode</option>
                </select>
            </div>
        </div>
        <div class="content">
            <div id="harian" class="data bg-white p-4 space-y-4 rounded shadow-md">
                @include('pages.penjualan.PenjualanHarianView')
            </div>

            <div id="bulanan" class="data bg-white p-4 space-y-4 rounded shadow-md">
                @include('pages.penjualan.PenjualanBulananView')
            </div>

            <div id="periode_waktu" class="data bg-white p-4 space-y-4 rounded shadow-md">
                @include('pages.penjualan.PenjualanPeriodeView')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
    </script>
    <script src="/assets/js/sale.js"></script>
    <script>
        $(document).ready(function() {
            tanggal = new Date().toISOString().slice(0, 10)
            getPenjualanHarian(tanggal);
            getPenjualanBulanan(tanggal);
            getPenjualanPeriode(tanggal, tanggal);
        });
    </script>
@endsection
