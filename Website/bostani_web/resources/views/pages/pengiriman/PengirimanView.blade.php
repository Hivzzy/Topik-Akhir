@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Pengiriman</h1>
        <div class="bg-white p-4 rounded shadow-md flex space-x-[10px]">
            <a href="#"
                class="inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                <div class="flex space-x-1 items-center">
                    <img src="/assets/icons/add.svg" alt="add icon">
                    <span class="hidden sm:block">Tambah Data</span>
                </div>
            </a>
        </div>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="tabel_pengiriman" class="stripe hover py-4" width="100%">
                                <thead class="bg-[#272727] text-white">
                                    <tr>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Ongkos Kirim</th>
                                        <th>Status Pengiriman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
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
            var table = $("#tabel_pengiriman")
                .DataTable({
                    responsive: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
