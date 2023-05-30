<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table id="tabel_item_pesanan" class="stripe hover" width="100%">
                    <thead class="bg-[#272727] text-white">
                        <tr>
                            <th>Nama Item</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Sub Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_pesanan = 0;
                        @endphp
                        @foreach ($data as $item)
                            @php
                                $total_pesanan = $total_pesanan + $item['item_size'] * $item['item_selling_price'];
                            @endphp
                            <tr>
                                <td>{{ $item['item_name'] }}</td>
                                <td>{{ $item['item_size'] }}</td>
                                <td>{{ $item['item_unit']['unit_product_name'] }}</td>
                                <td>Rp {{ number_format($item['item_selling_price'], 0, ',', '.') }}</td>
                                <td>Rp
                                    {{ number_format($item['item_size'] * $item['item_selling_price'], 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href="/cart/delete/{{ $item['product_id'] }}"
                                        class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var table = $("#tabel_item_pesanan")
        .DataTable({
            responsive: true,
            searching: false,
            lengthChange: false,
            info: true,
        })
        .columns.adjust()
        .responsive.recalc();
</script>
