@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Tambah Produk</h1>
        <div class="bg-white p-4 space-y-6 rounded shadown-md">
            <form method="POST" action="/produk/tambah">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Nama Produk</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="nama_produk" value="{{ old('nama_produk') }}">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Satuan Produk</label>
                        <select name="satuan"
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none ">
                            <option value=""></option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Kategori</label>
                        <select name="kategori" id="kategori"
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Sub Kategori</label>
                        <select name="sub_kategori" id="sub_kategori"
                            class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Harga Beli</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="harga_beli">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Harga Jual</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="harga_jual">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium">Ukuran</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="number" name="ukuran">
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-6">
                    <input type="submit"
                        class="inline-block rounded bg-success px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                        value="Simpan Data">
                    <a href="/produk"
                        class="inline-block rounded bg-danger px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="kategori"]').on('change', function() {
                var kategoriID = $(this).val();
                if (kategoriID) {
                    $.ajax({
                        url: 'subkategori/get/' + kategoriID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('select[name="sub_kategori"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_kategori"]').append(
                                    '<option value="' + value['id'] + '">' + value[
                                        'sub_category_name'] +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="sub_kategori"]').empty();
                }
            });
        });
    </script>
@endsection
