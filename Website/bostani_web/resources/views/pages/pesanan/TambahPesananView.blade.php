@extends('main')

@section('container')
    <h1 class="text-lg sm:text-2xl font-semibold mb-4 sm:mb-6">Tambah Pesanan</h1>
    <div class="space-y-4 sm:space-y-6">
        <form id="pesanan_form" action="/pesanan/tambah" method="POST" class="space-y-4 sm:space-y-6">
            @csrf
            <div class="bg-white p-4 space-y-4 rounded shadow-md">
                <h2 class="text-lg font-semibold">Data Pelanggan</h2>
                <hr>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Nama</label>
                            <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52"
                                id="pelanggan" name="pelanggan">
                                <option value=""></option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        data-te-select-secondary-text="{{ $customer->customer_address }}">
                                        {{ $customer->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kota</label>
                            <select name="kota" id="kota" data-te-select-init>
                                <option value=""></option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" data-te-select-init
                                class="px-2 py-1 border border-1 rounded appearance-none">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" data-te-select-init
                                class="px-2 py-1 border border-1 rounded appearance-none">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 space-y-6 rounded shadow-md">
                <h2 class="text-lg font-semibold">Data Pesanan</h2>
                <hr>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Tanggal Kirim</label>
                            <input type="date" name="tanggal_kirim" min="{{ date('Y-m-d') }}"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Metode Pembayaran</label>
                            <select name="metode_pembayaran" data-te-select-init
                                class="px-2 py-1 border border-1 rounded appearance-none">
                                <option value=""></option>
                                <option value="COD">COD</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Ongkos Kirim</label>
                            <input type="text" name="ongkos_kirim"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- <form id="item_pesanan_form" action="/cart/add" method="POST"> --}}
        <form id="item_pesanan_form">
            @csrf
            <div class="bg-white p-4 space-y-6 rounded shadow-md">
                <h2 class="text-lg font-semibold">Item Pesanan</h2>
                <hr>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Nama Item</label>
                        <select data-te-select-init data-te-select-filter="true" id="product_id" name="product_id">
                            <option value=""></option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Satuan</label>
                        <input type="text" name="satuan" id="satuan"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            readonly required />
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Harga</label>
                        <input type="text" name="harga" id="harga"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            readonly required />
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Jumlah</label>
                        <input type="text" name="quantity" id="quantity"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            required />
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    {{-- <input type="submit" form="item_pesanan_form"
                        class="inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        value="Tambah Item"> --}}
                    <button type="button" id="tambah_item" onclick="add_cart()"
                        class="inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Tambah
                        Item</button>
                </div>
            </div>
        </form>

        <div class="bg-white p-4 space-y-6 rounded shadow-md" id="cart"></div>

        <div class="bg-white p-4 gap-4 rounded shadow-md flex flex-wrap items-center justify-end">
            {{-- <p class="text-xl font-semibold">Total Pesanan : Rp {{ number_format($total_pesanan, 0, ',', '.') }}</p> --}}
            <div class="flex space-x-2">
                <input type="submit" form="pesanan_form"
                    class="inline-block rounded bg-success px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                    value="Simpan Pesanan">
                <button onclick="delete_all_cart()"
                    class="inline-block rounded bg-warning px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    Hapus Item
                </button>
                <a href="/pesanan"
                    class="inline-block rounded bg-danger px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    Batal
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="/assets/js/cart.js"></script>
    <script>
        $(document).ready(function() {
            get_cart();
            $(document).on('change', '#pelanggan', function() {
                var p_id = $(this).val();
                // console.log(p_id);

                $.ajax({
                    type: 'GET',
                    url: '/pelanggan/get',
                    data: {
                        'id': p_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        // Set Nilai
                        $('#no_telepon').val(data[0].customer_phone);
                        $('#alamat').val(data[0].customer_address);
                        // $('#kota_input').val(data[0].city_name);
                        // $('#kecamatan_input').val(data[0].district_name);
                        // $('#kelurahan_input').val(data[0].urban_village_name);
                    },
                    error: function() {}
                });
            });

            $(document).on('change', '#product_id', function() {
                var p_id = $(this).val();
                // console.log(p_id);

                $.ajax({
                    type: 'GET',
                    url: '/produk/get',
                    data: {
                        'id': p_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        // Set Nilai
                        $('#satuan').val(data[0].unit_product_name);
                        $('#harga').val(data[0].product_selling_price);
                    },
                    error: function() {}
                });
            });

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
