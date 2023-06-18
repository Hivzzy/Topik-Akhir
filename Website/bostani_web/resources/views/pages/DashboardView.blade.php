@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">{{ $products }}</div>
                    <span class="font-semibold text-lg">Barang</span>
                </div>
                <img src="/assets/icons/product.svg" alt="product icon">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">{{ $customers }}</div>
                    <span class="font-semibold text-lg">Pelanggan</span>
                </div>
                <img src="/assets/icons/mdi_people-group.svg" alt="people icon">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">{{ $orders }}</div>
                    <span class="font-semibold text-lg">Pesanan</span>
                </div>
                <img src="/assets/icons/ph_shopping-cart-simple-bold.svg" alt="cart icon">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Pendapatan</span>
                </div>
                <img src="/assets/icons/ph_money.svg" alt="money icon">
            </div>
        </div>

        @if (auth()->user()->role_id == 5)
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="bg-white space-y-4 p-4 rounded shadow-md">
                    <h2 class="text-lg font-medium">Daftar Pesanan 3 Hari Kedepan</h2>
                    <hr>
                    <table id="tabel_info_pesanan" class="text-sm" width="100%">
                        <thead class="bg-[#272727] text-white">
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Pengiriman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_info as $order)
                                <tr>
                                    <td>{{ $order->customers->customer_name }}</td>
                                    <td>{{ date('d M Y', strtotime($order->delivery_date)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $("#tabel_info_pesanan")
                .DataTable({
                    // responsive: true,
                    searching: false,
                    lengthChange: true,
                    info: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
