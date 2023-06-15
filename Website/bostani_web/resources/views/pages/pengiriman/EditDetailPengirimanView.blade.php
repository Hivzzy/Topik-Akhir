@extends('main')

@section('container')
    <h1 class="text-lg sm:text-2xl font-semibold mb-4 sm:mb-6">Tambah Pengiriman</h1>
    <div class="space-y-4 sm:space-y-6">
        <form id="pengiriman_form" action="/pengiriman/edit/{{$pengirimans->id}}" method="POST" class="space-y-4 sm:space-y-6">
            @csrf
            <div class="bg-white p-4 space-y-4 rounded shadow-md">
                <h2 class="text-lg font-semibold">Detail Pengiriman</h2>
                <hr>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid grid-rows-1">
                            <label class="font-medium" for="">Nama Group Pengiriman</label>
                            <input type="text" name="delivery_group_name" id="delivery_group_name" value="{{ $pengirimans->delivery_group_name }}"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                required />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid grid-rows-1">
                                <label class="font-medium" for="">Tipe Driver</label>
                                <select name="driver_type" data-te-select-init
                                    class="px-2 py-1 border border-1 rounded appearance-none">
                                    <option value="{{ $pengirimans->driver_type }}">{{ $pengirimans->driver_type }}</option>
                                    <option value="Bostani">Bostani</option>
                                    <option value="Non Bostani">Non Bostani</option>
                                </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <div class="bg-white p-4 space-y-6 rounded shadow-md" id="list_pesanan"></div>

        <div class="bg-white p-4 gap-4 rounded shadow-md flex flex-wrap items-center justify-end">
            <div class="flex space-x-2">
                <button form="pengiriman_form"
                    class="flex gap-1 items-center inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                    <x-icons.save />
                    <span>Simpan Pembaharuan</span>
                </button>
                <a href="/pengiriman/edit/{{$pengirimans->id}}"
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
    <script src="/assets/js/delivery.js"></script>
    <script>
        $(document).ready(function() {
            get_list_delivery();
        });
        // $(document).ready(function() {
        //     var table = $("#tabel_pengiriman")
        //         .DataTable({
        //             responsive: true,
        //         })
        //         .columns.adjust()
        //         .responsive.recalc();
        // });
    </script>
@endsection

