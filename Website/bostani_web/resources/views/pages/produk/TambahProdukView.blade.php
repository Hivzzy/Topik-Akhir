@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Tambah Produk</h1>
        <div class="bg-white p-4 space-y-6 rounded shadown-md">
            <form method="POST" action="/produk/tambah" autocapitalize="words">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Nama Produk</label>
                        <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}"
                            class="text-name relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            required />
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Satuan Produk</label>
                        <select name="unit" data-te-select-init required>
                            <option value=""></option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Kategori</label>
                        <select name="category" id="kategori" data-te-select-init required>
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Sub Kategori</label>
                        <select name="sub_category" id="sub_kategori" data-te-select-init>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Harga Beli</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');"
                            name="purchase_price" value="{{ old('purchase_price') }}"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            required />
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Harga Jual</label>
                        <input type="number" min="0" oninput="validity.valid||(value='');"
                            name="selling_price" value="{{ old('selling_price') }}"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            required />
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Ukuran</label>
                        <input type="number" min="0.1" step="0.01" name="size" value="{{ old('size') }}"
                            class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            required />
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-6">
                    <button
                        class="flex gap-1 items-center inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                        <x-icons.save />
                        <span>Simpan Data</span>
                    </button>
                    <a href="/produk"
                        class="flex gap-1 items-center inline-block rounded bg-danger p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                        <x-icons.x-circle />
                        <span>Batal</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="category"]').on('change', function() {
                var kategoriID = $(this).val();
                if (kategoriID) {
                    $.ajax({
                        url: 'subkategori/get/' + kategoriID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('select[name="sub_category"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_category"]').append(
                                    '<option value="' + value['id'] + '">' + value[
                                        'sub_category_name'] +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="sub_category"]').append('<option value="">' + '</option>');
                }
            });
        });

        // // Set product name capitalize
        // $('#product_name').on('change keydown paste', function(e) {
        //     if (this.value.length = 1) {}
        //     var $this_val = $(this).val();
        //     this_val = $this_val.toLowerCase().replace(/\b[a-z]/g, function(char) {
        //         return char.toUpperCase();
        //     });
        //     $(this).val(this_val);
        // });
    </script>
@endsection
