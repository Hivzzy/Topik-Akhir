<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table id="tabel_pengiriman" class="stripe hover" width="100%">
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
                            <tr order_id="{{$pesanan->id}}" id="row-{{$pesanan->id}}">
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
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/delivery.js"></script>
<script>
    var table = $("#tabel_pengiriman")
        .DataTable({
            responsive: true,
            searching: false,
            lengthChange: false,
            info: true,
        })
        .columns.adjust()
        .responsive.recalc();
</script>
