@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Edit Pelanggan</h1>
        <div class="bg-white p-4 space-y-6 rounded shadown-md">
            <form action="#">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Nama</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">No Telepon</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Alamat</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Kelurahan</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Kecamatan</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Kota</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text">
                    </div>
                </div>
            </form>
            <div class="flex justify-end space-x-2">
                <a href="#"
                    class="inline-block rounded bg-success px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                    Simpan Data
                </a>
                <button type="button" onclick="history.go(-1);"
                    class="inline-block rounded bg-danger px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    Batal
                </button>
            </div>
        </div>
    </div>
@endsection
