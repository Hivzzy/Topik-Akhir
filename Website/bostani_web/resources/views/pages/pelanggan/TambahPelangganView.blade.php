@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Tambah Data Pelanggan</h1>
        <div class="bg-white p-4 space-y-6 rounded shadow-md">
            <form action="/pelanggan/tambah" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Nama</label>
                            {{-- <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text"
                                name="nama_pelanggan" placeholder="Nama" required> --}}
                            <input type="text" name="nama_pelanggan"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">No Telepon</label>
                            {{-- <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="no_telepon" placeholder="Nomor Telepon"
                                required> --}}
                            <input type="text" name="no_telepon"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Alamat</label>
                            {{-- <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="alamat" placeholder="Alamat"
                                required> --}}
                            <input type="text" name="alamat"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kota</label>
                            <select name="kota" data-te-select-init title="kota" required>
                                <option value=""></option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kecamatan</label>
                            <select name="kecamatan" data-te-select-init title="kecamatan" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Kelurahan</label>
                            <select name="kelurahan" data-te-select-init title="kelurahan" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-6">
                    <button
                        class="inline-block rounded bg-success px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                        Simpan Data
                    </button>
                    <button type="button" onclick="history.go(-1);"
                        class="inline-block rounded bg-danger px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
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
