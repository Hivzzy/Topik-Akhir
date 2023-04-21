@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Penjualan</h1>

        {{-- Button --}}
        <div class="flex items-center bg-white p-4 rounded space-x-4 shadow-md">
            <a href="#"
                class="inline-block rounded bg-success px-4 py-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                <div class="flex space-x-1">
                    <img src="/assets/icons/chart.svg">
                    <span class="text-white hidden sm:block">Grafik</span>
                </div>
            </a>

            <div class="bg-[#272727] rounded">
                <select id="jenisLaporan" data-te-select-init>
                    <option value="#">-- Pilih Jenis Laporan --</option>
                    <option value="harian">Laporan Harian</option>
                    <option value="bulanan">Laporan Bulanan</option>
                    <option value="periode_waktu">Laporan Per Periode</option>
                </select>
            </div>
        </div>

        {{-- Content --}}
        <div class="content">

            {{-- Harian --}}
            <div id="harian" class="data bg-white p-4 space-y-4 rounded shadow-md">
                @include('pages.penjualan.PenjualanHarianView')
            </div>

            {{-- Bulanan --}}
            <div id="bulanan" class="data bg-white p-4 space-y-4 rounded shadow-md">
                @include('pages.penjualan.PenjualanBulananView')
            </div>

            {{-- Periode Waktu --}}
            <div id="periode_waktu" class="data bg-white p-4 space-y-4 rounded shadow-md">
                @include('pages.penjualan.PenjualanPeriodeView')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#jenisLaporan").on('change', function() {
                $(".data").hide();
                $("#" + $(this).val()).fadeIn(0);
            }).change();
        });
    </script>
@endsection
