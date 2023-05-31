@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Detail Data Pengiriman</h1>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <table cellpadding="5">
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tanggal Pengiriman</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Ongkos Kirim</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Status Pengiriman</td>
                    <td>:</td>
                    <td>
                        <select name="delivery_status" data-te-select-init>
                            <option value=""></option>
                            {{-- <option value="{{ $order->order_status_id }}">
                                {{ $order->status_pesanan->order_status_name }}</option>
                            @foreach ($order_status as $status)
                                <option value="{{ $status->id }}">
                                    {{ $status->order_status_name }}</option>
                            @endforeach --}}
                        </select>
                        <input type="hidden" name="order_id" value="">
                    </td>
                </tr>
            </table>

            <div class="flex flex-wrap gap-2 justify-end items-center">
                <a href="/pengiriman"
                    class="flex gap-1 items-center inline-block rounded bg-info p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    <x-icons.arrow-circle-left />
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="delivery_status"]').on('change', function() {
                var statusID = $(this).val();
                var orderID = $('input[name="delivery_id"]').val();
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
@endsection --}}
