@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Pengiriman - Siap Antar</h1>
        @csrf
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table id="tabel_pengiriman" class="stripe hover"
                                style="width:100%; padding-top: 1em;  padding-bottom: 2em;">
                                    <thead class="bg-[#272727] text-white">
                                        <tr>
                                            <th class="text-center">Nama Pelanggan</th>
                                            <th class="text-center">Jumlah Item </th>
                                            <!-- <th>Alamat</th> -->
                                            <th class="text-center">Kelurahan</th>
                                            <th class="text-center">Kecamatan</th>
                                            <th class="text-center">Kota</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pesanans as $pesanan)
                                        <tr order_id="{{$pesanan->id}}">
                                        <input type="hidden" class="order_id" name="order_id" value="{{$pesanan->id}}">
                                            <td>{{$pesanan->customers->customer_name}}</td>
                                            <td>{{ $jumlahItem[$pesanan->id] }}</td>
                                            <!-- <td>{{$pesanan->customers->customer_address}}</td> -->
                                            <td>{{$pesanan->customers->kelurahan->urban_village_name}}</td>
                                            <td>{{$pesanan->customers->kelurahan->kecamatan->district_name}}</td>
                                            <td>{{$pesanan->customers->kelurahan->kecamatan->kota->city_name}}</td>
                                            <td>
                                            <button onclick="add_pesanan(this)"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                                                Tambah
                                            </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 space-y-6 rounded shadow-md" id="list_pesanan"></div>

        <div class="bg-white p-4 gap-4 rounded shadow-md flex flex-wrap items-center justify-end">
            {{-- <p class="text-xl font-semibold">Total Pesanan : Rp {{ number_format($total_pesanan, 0, ',', '.') }}</p> --}}
            <div class="flex space-x-2">
                <button   button onclick="delete_all_list()"
                    class="flex gap-1 items-center inline-block rounded bg-warning p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                    <x-icons.trash />
                    <span>Hapus Item</span>
                </button>
                <a href="/pengiriman-detail/edit/{{ $pengirimans->id }}"
                    class="flex gap-1 items-center inline-block rounded bg-success p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                    <span>Selanjutnya</span>
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
