@extends('main')

@section('container')
    <h1 class="text-lg sm:text-2xl font-semibold mb-4 sm:mb-6">Edit Pesanan</h1>
    <div class="space-y-4 sm:space-y-6">
        <form id="pesanan_form" action="/pesanan/edit/{{ $pesanan->id }}" method="POST" class="space-y-4 sm:space-y-6">
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
                                <option value="{{ $pesanan->customer_id }}"
                                    data-te-select-secondary-text="{{ $pesanan->customers->customer_address }}">
                                    {{ $pesanan->customers->customer_name }}</option>
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
                                value="{{ $pesanan->customers->customer_phone }}" readonly
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                value="{{ $pesanan->customers->customer_address }}" readonly
                                class="text-name relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kota</label>
                            <input type="text" name="kota" id="kota" value="{{ $pesanan->customers->kelurahan->kecamatan->kota->city_name }}" readonly
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                readonly required />
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" value="{{ $pesanan->customers->kelurahan->kecamatan->district_name }}" readonly
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                readonly required />
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kelurahan</label>
                            <input type="text" name="kelurahan" id="kelurahan" value="{{ $pesanan->customers->kelurahan->urban_village_name }}" readonly
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                readonly required />
                        </div>
                        {{-- <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kota</label>
                            <select name="kota" id="kota" data-te-select-init>
                                <option value="{{ $pesanan->customers->kelurahan->kecamatan->city_id }}">
                                    {{ $pesanan->customers->kelurahan->kecamatan->kota->city_name }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" data-te-select-init
                                class="px-2 py-1 border border-1 rounded appearance-none">
                                <option value="{{ $pesanan->customers->kelurahan->district_id }}">
                                    {{ $pesanan->customers->kelurahan->kecamatan->district_name }}</option>
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan" data-te-select-init
                                class="px-2 py-1 border border-1 rounded appearance-none">
                                <option value="{{ $pesanan->customers->urban_village_id }}">
                                    {{ $pesanan->customers->kelurahan->urban_village_name }}</option>
                            </select>
                        </div> --}}
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
                                value="{{ date('Y-m-d', strtotime($pesanan->delivery_date)) }}"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Metode Pembayaran</label>
                            <select name="metode_pembayaran" data-te-select-init
                                class="px-2 py-1 border border-1 rounded appearance-none">
                                <option value="{{ $pesanan->payment_method }}">{{ $pesanan->payment_method }}</option>
                                <option value="COD">COD</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Ongkos Kirim</label>
                            <input type="number" min="0" step="1" oninput="validity.valid||(value='');"
                                name="ongkos_kirim" value="{{ $pesanan->shipping_cost }}"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
                        <input type="number" min="0" step="0.01" name="quantity" id="quantity"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            required />
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="button" id="tambah_item" onclick="add_cart()"
                        class="flex gap-1 items-center inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        <x-icons.plus />
                        <span>Tambah Item</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="bg-white p-4 space-y-6 rounded shadow-md" id="cart"></div>

        <div class="bg-white p-4 gap-4 rounded shadow-md flex flex-wrap items-center justify-end">
            {{-- <p class="text-xl font-semibold">Total Pesanan : Rp {{ number_format($total_pesanan, 0, ',', '.') }}</p> --}}
            <div class="flex space-x-2">
                <button form="pesanan_form"
                    class="flex gap-1 items-center inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                    <x-icons.save />
                    <span>Simpan Pesanan</span>
                </button>
                <button onclick="delete_all_cart()"
                    class="flex gap-1 items-center inline-block rounded bg-warning p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    <x-icons.trash />
                    <span>Hapus Item</span>
                </button>
                <a href="/pesanan"
                    class="flex gap-1 items-center inline-block rounded bg-danger p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    <x-icons.x-circle />
                    <span>Batal</span>
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
    <script src="/assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            get_cart();
        });
    </script>
@endsection
