@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Pesanan</h1>
        <div class="bg-white p-4 rounded shadow-md flex space-x-[10px]">
            <a href="/tambah-pesanan"
                class="flex gap-1 items-center inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                <x-icons.plus />
                <span class="hidden sm:block">Tambah Data</span>
            </a>
        </div>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="tabel_pesanan" class="stripe hover py-4" width="100%">
                                <thead class="bg-[#272727] text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Penerima Pesanan</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Waktu Pemesanan</th>
                                        <th>Tanggal Pengriman</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Ongkos Kirim</th>
                                        <th>Status Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->users->name }}</td>
                                            <td>{{ $order->customers->customer_name }}</td>
                                            <td>{{ date('d M Y', strtotime($order->order_time)) }}</td>
                                            <td>{{ date('H:i', strtotime($order->order_time)) }}</td>
                                            <td>{{ date('d M Y', strtotime($order->delivery_date)) }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td class="px-6 py-2 text-right">Rp{{ number_format($order->shipping_cost, 2, ',', '.') }}</td>
                                            <td>{{ $order->status_pesanan->order_status_name }}</td>
                                            <td>
                                                <a href="/pesanan/detail/{{ $order->id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-info-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-info-700">
                                                    Lihat
                                                </a>
                                                <a href="/pesanan/edit/{{ $order->id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                                                    Edit
                                                </a>
                                                <a href="/pesanan/hapus/{{ $order->id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700"
                                                    data-confirm-delete="true">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $("#tabel_pesanan")
                .DataTable({
                    responsive: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
