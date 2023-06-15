<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table id="tabel_list_pesanan" class="stripe hover" width="100%">
                    <thead class="bg-[#272727] text-white">
                        <tr>
                        <th class="text-center">Nama Pelanggan</th>
                        <th class="text-center">Alamat Pesanan</th>
                        <!-- <th class="text-center">Kelurahan</th>
                        <th class="text-center">Kecamatan</th>
                        <th class="text-center">Kota</th> -->
                        <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item['customer_name'] }}</td>
                                <td>{{ $item['alamat'] }}</td>
                                <!-- <td>{{ $item['kelurahan'] }}</td>
                                <td>{{ $item['kecamatan'] }}</td>
                                <td>{{ $item['kota'] }}</td> -->
                                <td>
                                    <button onclick="delete_item_list({{ $item['order_id'] }})"
                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                                            Hapus
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
    var table = $("#tabel_list_pesanan")
        .DataTable({
            responsive: true,
            searching: false,
            lengthChange: false,
            info: true,
        })
        .columns.adjust()
        .responsive.recalc();

    function delete_item_list(order_id) {
        $.ajax({
            url: "/pengiriman/list/delete/" + order_id,
            method: "GET",
            contentType: "application/json",
        }).done(function (data) {
            // get_list_delivery_non_session();
            get_list_delivery();
        });
    }
</script>
