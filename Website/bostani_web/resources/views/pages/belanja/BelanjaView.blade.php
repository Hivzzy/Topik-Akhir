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
                                        <th>No</th>
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
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="px-6 py-2">{{ $item->product_name }}</td>
                                            <td class="px-6 py-2">{{ $item->unit_name }}</td>
                                            <td class="px-6 py-2 text-right">
                                                Rp{{ number_format($item->item_purchase_price, 2, ',', '.') }}</td>
                                            <td class="px-6 py-2">{{ $item->jumlah }}</td>
                                            <td class="px-6 py-2 text-right">
                                                Rp{{ number_format($item->item_purchase_price * $item->jumlah, 2, ',', '.') }}
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
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Nama Item</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @foreach ($belanja as $bj)
                                                @if ($bj->id == $item->order_id)
                                                    <td>{{ $bj->customers->customer_name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $item->produk->product_name }}</td>
                                            <td>{{ $item->item_size }}</td>
                                            <td>
                                                {{ $item->shop_item_information ?? '' }}
                                            </td>
                                            <td>
                                                <a href="#" data-te-toggle="modal"
                                                    data-te-target="#updateInformationModal{{ $item->order_id }}{{ $item->product_id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                                                    Ubah Keterangan
                                                </a>
                                                <a href="/keterangan/hapus/{{ $item->order_id }}/{{ $item->product_id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700 {{ $item->shop_item_information == null ? 'pointer-events-none' : '' }}">
                                                    Hapus Keterangan
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
    @include('pages.belanja.KeteranganModal')
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
