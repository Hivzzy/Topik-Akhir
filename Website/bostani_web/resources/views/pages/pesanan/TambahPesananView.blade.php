@extends('main')

@section('container')
    <h1 class="text-lg sm:text-2xl font-semibold mb-4 sm:mb-6">Tambah Pesanan</h1>
    <form action="#" method="POST" class="space-y-4 sm:space-y-6">
        @csrf
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <h2 class="text-lg font-semibold">Data Pelanggan</h2>
            <hr>
            {{-- <form action="#" method="post"> --}}
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Nama</label>
                        <select name="customer" id=""
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none" required>
                            <option value=""></option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">No Telepon</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="no_telepon"
                            required>
                    </div>
                </div>
                <div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Alamat</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="alamat" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Kota</label>
                        <select name="kota" id="kota"
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none" required>
                            <option value=""></option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none" required>
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Kelurahan</label>
                        <select name="kelurahan" id="kelurahan"
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none" required>
                        </select>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>

        <div class="bg-white p-4 space-y-6 rounded shadow-md">
            <h2 class="text-lg font-semibold">Data Pesanan</h2>
            <hr>
            {{-- <form action="#" method="post"> --}}
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Tanggal Kirim</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="date" name="tanggal_kirim"
                            required>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Metode Pembayaran</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="metode_pembayaran"
                            required>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Ongkos Kirim</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="ongkos_kirim"
                            required>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>

        <div class="bg-white p-4 space-y-6 rounded shadow-md">
            <h2 class="text-lg font-semibold">Item Pesanan</h2>
            <hr>
            {{-- <form action="#" method="post"> --}}
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Nama Item</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="nama_item"
                            required>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Satuan</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="satuan" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Jumlah</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="jumlah" required>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Harga</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="harga" required>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Total Harga</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="total_harga"
                            required>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button
                    class="inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Tambah
                    Item</button>
            </div>
            {{-- </form> --}}
        </div>

        <div class="bg-white p-4 space-y-6 rounded shadow-md">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="tabel_item_pesanan" class="stripe hover" width="100%">
                                <thead class="bg-[#272727] text-white">
                                    <tr>
                                        <th>Nama Item</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Sub Total Harga</th>
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

        <div class="bg-white p-4 gap-4 rounded shadow-md flex flex-wrap items-center justify-between">
            <p class="text-xl font-semibold">Total Pesanan : </p>
            <div class="flex space-x-2">
                <button
                    class="inline-block rounded bg-success px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">Simpan
                    Pesanan</button>
                <a href="/pesanan"
                    class="inline-block rounded bg-danger px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    Batal
                </a>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $("#tabel_item_pesanan")
                .DataTable({
                    responsive: true,
                    searching: false,
                    lengthChange: false,
                    info: true,
                })
                .columns.adjust()
                .responsive.recalc();
        });

        $(document).ready(function() {
            $('select[name="kota"]').on('change', function() {
                var kotaID = $(this).val();
                if (kotaID) {
                    $.ajax({
                        url: 'kecamatan/get/' + kotaID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('select[name="kecamatan"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kecamatan"]').append(
                                    '<option value="' + value['id'] + '">' + value[
                                        'district_name'] +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kecamatan"]').empty();
                }
            });

            $('select[name="kecamatan"]').on('change', function() {
                var kecamatanID = $(this).val();
                if (kecamatanID) {
                    $.ajax({
                        url: 'kelurahan/get/' + kecamatanID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('select[name="kelurahan"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kelurahan"]').append(
                                    '<option value="' + value['id'] + '">' + value[
                                        'urban_village_name'] +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kelurahan"]').empty();
                }
            });
        });
    </script>
@endsection
