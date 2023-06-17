@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Pengiriman - Siap Antar</h1>
        @csrf
        <div class="bg-white p-4 space-y-6 rounded shadow-md" id="list_pengiriman"></div>

        <div class="bg-white p-4 space-y-6 rounded shadow-md" id="list_pesanan"></div>

        <div class="bg-white p-4 gap-4 rounded shadow-md flex flex-wrap items-center justify-end">
            {{-- <p class="text-xl font-semibold">Total Pesanan : Rp {{ number_format($total_pesanan, 0, ',', '.') }}</p> --}}
            <div class="flex space-x-2">
                <button   button onclick="delete_all_list()"
                    class="flex gap-1 items-center inline-block rounded bg-warning p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    <x-icons.trash />
                    <span>Hapus Item</span>
                </button>
                <a href="/pengiriman-detail/edit/{{ $pengirimans->id }}"
                    class="flex gap-1 items-center inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                    <span>Selanjutnya</span>
                </a>
            </div>
        </div>


    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="/assets/js/delivery.js"></script>
    <script>
        $(document).ready(function() {
            get_list_delivery_non_session()
            get_list_delivery();
        });
        $(document).ready(function() {
            var table = $("#tabel_pengiriman")
                .DataTable({
                    responsive: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
