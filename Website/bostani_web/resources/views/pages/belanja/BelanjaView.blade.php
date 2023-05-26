@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Belanja - {{ date('d M Y', strtotime(now())) }}</h1>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <h2 class="text-xl font-semibold">Info Item Belanja</h2>
            <hr>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="tabel_belanja stripe hover" width="100%">
                                <thead class="bg-[#272727] text-white">
                                    <tr>
                                        <th>Nama Item</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_item as $item)
                                        <tr class="">
                                            <td class="px-6 py-2">{{ $item->produk->product_name }}</td>
                                            <td class="px-6 py-2">{{ $item->produk->satuan->unit_product_name }}</td>
                                            <td class="px-6 py-2">Rp
                                                {{ number_format($item->item_selling_price, 0, ',', '.') }}</td>
                                            <td class="px-6 py-2">{{ $item->item_size }}</td>
                                            <td class="px-6 py-2">Rp
                                                {{ number_format($item->item_selling_price * $item->item_size, 0, ',', '.') }}
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
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <h2 class="text-xl font-semibold">Info Pesanan</h2>
            <hr>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="tabel_belanja stripe hover" width="100%">
                                <thead class="bg-[#272727] text-white">
                                    <tr>
                                        <th>Nama Pemesan</th>
                                        <th>Nama Item</th>
                                        <th>Jumlah</th>
                                        {{-- <th>Satuan</th>
                                        <th>Modal</th>
                                        <th>Sub Total Harga</th> --}}
                                        <th>Check</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            @foreach ($belanja as $bj)
                                                @if ($bj->id == $item->order_id)
                                                    <td>{{ $bj->customers->customer_name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $item->produk->product_name }}</td>
                                            <td>{{ $item->item_size }}</td>
                                            {{-- <td>{{ $item->produk->satuan->unit_product_name }}</td>
                                            <td>Rp {{ number_format($item->item_purchase_price, 0, ',', '.') }}</td>
                                            <td>Rp
                                                {{ number_format($item->item_size * $item->item_purchase_price, 0, ',', '.') }}
                                            </td> --}}
                                            <td>
                                                <input type="checkbox" name="check" id="check">
                                            </td>
                                            <td>
                                                <input type="text">
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
            var table = $(".tabel_belanja")
                .DataTable({
                    responsive: true,
                    searching: false,
                    lengthChange: false,
                    info: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
