@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Detail Data Pengiriman</h1>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <table cellpadding="5">
                <tr>
                    <td>Tanggal Pengiriman</td>
                    <td>:</td>
                    <td>{{date('d M Y', strtotime($detail_pengiriman->delivery_date))}}</td>
                </tr>
                <tr>
                    <td>Nama Driver</td>
                    <td>:</td>
                    <td>{{ $detail_pengiriman->driver_type??'-'}}</td>
                </tr>
                <tr>
                    <td>Total Ongkos Kirim</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($jumlahTotalOngkir->pesanans[0]->total_shipping_cost, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Status Pengiriman</td>
                    <td>:</td>
                    <td>{{$delivery_status[0]->delivery_status_name}}
                        <!-- <select name="delivery_status" data-te-select-init>
                            <option value=""></option>
                            {{-- <option value="{{ $detail_pengiriman->statusPengiriman->delivery_status_id }}">
                                {{ $detail_pengiriman->statusPengiriman->delivery_status_name }}</option>
                            @foreach ($delivery_status as $status)
                                <option value="{{ $status->id }}">
                                    {{ $status->delivery_status_name }}</option>
                            @endforeach --}}
                        </select>
                        <input type="hidden" name="delivery_id" value="{{ $detail_pengiriman->id }}">
                    </td> -->
                </tr>
            </table>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b bg-neutral-800 font-medium text-white text-left">
                                    <tr>
                                        <th scope="col" class=" px-6 py-2">No</th>
                                        <th scope="col" class=" px-6 py-2">Nama Pelanggan</th>
                                        <th scope="col" class=" px-6 py-2">Alamat</th>
                                        <th scope="col" class=" px-6 py-2">Kelurahan</th>
                                        <th scope="col" class=" px-6 py-2">Kecamatan</th>
                                        <th scope="col" class=" px-6 py-2">Kota</th>
                                        <th scope="col" class=" px-6 py-2">Ongkos Kirim</th>
                                        <th scope="col" class=" px-6 py-2">Payment Method</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($detail_pengiriman->pesanans as $list_pesanan)
                                    <tr>
                                            <td scope="col" class=" px-6 py-2">{{$loop->iteration}}</td>
                                            <td scope="col" class=" px-6 py-2">{{$list_pesanan->customers->customer_name}}</td>
                                            <td scope="col" class=" px-6 py-2">{{$list_pesanan->customers->customer_address}}</td>
                                            <td scope="col" class=" px-6 py-2">{{$list_pesanan->customers->kelurahan->urban_village_name??'-'}}</td>
                                            <td scope="col" class=" px-6 py-2">{{$list_pesanan->customers->kelurahan->kecamatan->district_name??'-'}}</td>
                                            <td scope="col" class=" px-6 py-2">{{$list_pesanan->customers->kelurahan->kecamatan->kota->city_name??'-'}}</td>
                                            <td scope="col" class=" px-6 py-2">{{ number_format($list_pesanan->shipping_cost, 2, ',', '.') }}</td>
                                            <td scope="col" class=" px-6 py-2">{{$list_pesanan->payment_method}}</td>
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
                </div>
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
