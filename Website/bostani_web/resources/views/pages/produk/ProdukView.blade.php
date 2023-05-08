@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Produk</h1>
        <div class="bg-white p-4 rounded shadow-md flex space-x-[10px]">
            <a href="/tambah-produk"
                class="inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                <div class="flex space-x-1 items-center">
                    <img src="/assets/icons/add.svg">
                    <span class="hidden sm:block">Tambah Data</span>
                </div>
            </a>
            <a href="#"
                class="inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                <div class="flex space-x-1 items-center">
                    <img src="/assets/icons/export.svg">
                    <span class="hidden sm:block">Eksport Katalog</span>
                </div>
            </a>
        </div>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="tabel_produk" class="stripe hover"
                                style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead class="bg-[#272727] text-white">
                                    <tr>
                                        <th>Nama Item</th>
                                        <th>Satuan</th>
                                        <th>Kategori</th>
                                        <th>Sub Kategori</th>
                                        {{-- <th>Ukuran</th> --}}
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $produk->product_name }}</td>
                                            <td>{{ $produk->satuan->unit_product_name }}</td>
                                            <td>
                                                {{ $produk->kategori->category_name }}</td>
                                            <td>
                                                {{ $produk->sub_kategori != null ? $produk->sub_kategori->sub_category_name : '-' }}
                                            </td>
                                            {{-- <td>{{ $produk->product_size }}</td> --}}
                                            <td>Rp
                                                {{ number_format($produk->product_purchase_price, 0, ',', '.') }}</td>
                                            <td>Rp
                                                {{ number_format($produk->product_selling_price, 0, ',', '.') }}</td>
                                            <td class="flex space-x-1">
                                                <a href="/produk/edit/{{ $produk->id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                                                    Edit
                                                    {{-- <img src="/assets/icons/edit.svg"> --}}
                                                </a>
                                                <a href="/produk/hapus/{{ $produk->id }}"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700"
                                                    data-confirm-delete="true">
                                                    Hapus
                                                    {{-- <img src="/assets/icons/delete.svg"> --}}
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
            var table = $("#tabel_produk")
                .DataTable({
                    responsive: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
