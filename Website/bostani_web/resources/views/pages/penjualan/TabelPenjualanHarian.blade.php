<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table id="penjualan_harian" class="min-w-full">
                    <thead class="bg-neutral-800 text-left font-medium text-white">
                        <tr>
                            <th class="px-6 py-2">Tanggal</th>
                            <th class="px-6 py-2">Nama Pelanggan</th>
                            <th class="px-6 py-2">Deskripsi</th>
                            <th class="px-6 py-2">Pendapatan</th>
                            <th class="px-6 py-2">Modal Belanja</th>
                            <th class="px-6 py-2">Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pendapatan_total = 0;
                            $modal_total = 0;
                            $profit_total = 0;
                        @endphp
                        @foreach ($penjualan_harian as $penjualan)
                            @php
                                $pendapatan_total += $penjualan->pendapatan;
                                $modal_total += $penjualan->modal_belanja;
                                $profit_total += $penjualan->pendapatan - $penjualan->modal_belanja;
                            @endphp
                            <tr>
                                <td class="px-6 py-2">{{ date('d M Y', strtotime($penjualan->delivery_date)) }}</td>
                                <td class="px-6 py-2">{{ $penjualan->customer_name }}</td>
                                <td class="px-6 py-2">
                                    @foreach ($item_penjualan as $item)
                                        {{ $item->produk->product_name }},
                                    @endforeach
                                </td>
                                <td class="text-right px-6 py-2">Rp{{ number_format($penjualan->pendapatan, 2, ',', '.') }}</td>
                                <td class="text-right px-6 py-2">Rp{{ number_format($penjualan->modal_belanja, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-2">Rp{{ number_format($penjualan->pendapatan - $penjualan->modal_belanja, 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-lg font-semibold bg-gray-100">
                        <tr>
                            <td colspan="3">Total</td>
                            <td class="text-right px-6 py-2">Rp{{ number_format($pendapatan_total, 2, ',', '.') }}</td>
                            <td class="text-right px-6 py-2">Rp{{ number_format($modal_total, 2, ',', '.') }}</td>
                            <td class="text-right px-6 py-2">Rp{{ number_format($profit_total, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/sale.js"></script>