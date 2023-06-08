<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table id="penjualan_bulanan" class="min-w-full table-striped">
                    <thead class="bg-neutral-800 font-medium text-left text-white">
                        <tr>
                            <th class="px-6 py-2">Tanggal Transaksi</th>
                            <th class="px-6 py-2">Jumlah Pesanan</th>
                            <th class="px-6 py-2">Pendapatan</th>
                            <th class="px-6 py-2">Modal Belanja</th>
                            <th class="px-6 py-2">Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pesanan_total = 0;
                            $pendapatan_total = 0;
                            $modal_total = 0;
                            $profit_total = 0;
                        @endphp
                        @foreach ($penjualan_bulanan as $penjualan)
                            @php
                                $pesanan_total += $penjualan->jumlah_pesanan;
                                $pendapatan_total += $penjualan->pendapatan;
                                $modal_total += $penjualan->modal_belanja;
                                $profit_total += $penjualan->pendapatan - $penjualan->modal_belanja;
                            @endphp
                            <tr>
                                <td class="px-6 py-2">{{ date('d M Y', strtotime($penjualan->delivery_date)) }}</td>
                                <td class="px-6 py-2">{{ $penjualan->jumlah_pesanan }}</td>
                                <td class="text-right px-6 py-2">Rp{{ number_format($penjualan->pendapatan, 2, ',', '.') }}</td>
                                <td class="text-right px-6 py-2">Rp{{ number_format($penjualan->modal_belanja, 2, ',', '.') }}</td>
                                <td class="text-right px-6 py-2">Rp{{ number_format($penjualan->pendapatan - $penjualan->modal_belanja, 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-lg font-semibold bg-gray-100">
                        <tr>
                            <td colspan="1">Total</td>
                            <td class="px-6 py-2">{{ $pesanan_total }}</td>
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