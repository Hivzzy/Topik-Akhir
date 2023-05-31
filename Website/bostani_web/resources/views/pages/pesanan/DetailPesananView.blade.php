@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Detail Pesanan - {{ $order->customers->customer_name }}</h1>
        <div class="bg-white p-4 rounded shadow-md flex space-x-[10px]">
            <a href="/export-invoice"
                class="inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                <div class="flex space-x-1 items-center">
                    <x-icons.download />
                    <span class="hidden sm:block">Export Invoice</span>
                </div>
            </a>
        </div>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <table cellpadding="5">
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td>{{ $order->customers->customer_name }}</td>
                </tr>
                <tr>
                    <td>Tanggal Terima Pesanan</td>
                    <td>:</td>
                    <td>{{ date('d M Y', strtotime($order->order_time)) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Kirim Pesanan</td>
                    <td>:</td>
                    <td>{{ date('d M Y', strtotime($order->delivery_date)) }}</td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman</td>
                    <td>:</td>
                    <td>{{ $order->customers->customer_address }}</td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td>:</td>
                    <td>{{ $order->customers->customer_phone }}</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>:</td>
                    <td>{{ $order->payment_method }}</td>
                </tr>
                <tr>
                    <td>Ongkos Kirim</td>
                    <td>:</td>
                    <td>Rp{{ number_format($order->shipping_cost, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Status Pesanan</td>
                    <td>:</td>
                    <td>
                        {{-- {{ $order->status_pesanan->order_status_name }} --}}
                        <select name="order_status" data-te-select-init>
                            <option value="{{ $order->order_status_id }}">
                                {{ $order->status_pesanan->order_status_name }}</option>
                            @foreach ($order_status as $status)
                                <option value="{{ $status->id }}">
                                    {{ $status->order_status_name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                    </td>
                </tr>
            </table>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b bg-neutral-800 font-medium text-white text-left">
                                    <tr>
                                        <th scope="col" class=" px-6 py-2">Nama Item</th>
                                        <th scope="col" class=" px-6 py-2">Satuan</th>
                                        <th scope="col" class=" px-6 py-2">Harga Satuan</th>
                                        <th scope="col" class=" px-6 py-2">Jumlah</th>
                                        <th scope="col" class=" px-6 py-2">Sub Total Harga</th>
                                        {{-- <th scope="col" class=" px-6 py-2">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_pesanan = 0;
                                    @endphp
                                    @foreach ($items as $item)
                                        @php
                                            $total_pesanan = $total_pesanan + $item->item_selling_price * $item->item_size;
                                        @endphp
                                        <tr class="">
                                            <td class="px-6 py-2">{{ $item->produk->product_name }}</td>
                                            <td class="px-6 py-2">{{ $item->produk->satuan->unit_product_name }}</td>
                                            <td class="px-6 py-2 text-right">Rp{{ number_format($item->item_selling_price, 2, ',', '.') }}</td>
                                            <td class="px-6 py-2">{{ $item->item_size }}</td>
                                            <td class="px-6 py-2 text-right">Rp{{ number_format($item->item_selling_price * $item->item_size, 2, ',', '.') }}
                                            </td>
                                            {{-- <td class="px-6 py-2">
                                                <a href="#"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700"
                                                    data-confirm-delete="true">
                                                    Hapus
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 justify-between items-center">
                <div>
                    <p class="text-xl font-semibold">Total Pesanan : Rp {{ number_format($total_pesanan, 0, ',', '.') }}
                    </p>
                </div>
                <a href="/pesanan"
                    class="flex gap-1 items-center inline-block rounded bg-info p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    <x-icons.arrow-circle-left />
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="order_status"]').on('change', function() {
                var statusID = $(this).val();
                var orderID = $('input[name="order_id"]').val();
                // console.log(statusID,orderID);

                if (statusID) {
                    $.ajax({
                        type: 'GET',
                        url: '/pesanan/status/' + orderID + '/' + statusID,
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                        }
                    });
                }
            });
        });
    </script>
@endsection
