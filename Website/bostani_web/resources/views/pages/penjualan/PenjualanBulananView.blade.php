{{-- Export and Datepicker --}}
<div class="flex justify-between items-center">
    <button type="button"
        class="flex gap-1 items-center inline-block rounded bg-warning p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
        <x-icons.download />
        <span class="hidden sm:block">Export Laporan Penjualan</span>
    </button>
    <div>
        <select data-te-select-init>
            <option value="#">Pilih Bulan</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
    </div>
</div>

{{-- Tabel --}}
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full font-light">
                    <thead class="border-b bg-neutral-800 font-medium text-left text-white dark:bg-neutral-900">
                        <tr>
                            <th scope="col" class="px-6 py-4">Tanggal Transaksi</th>
                            <th scope="col" class="px-6 py-4">Pendapatan</th>
                            <th scope="col" class="px-6 py-4">Pengeluaran</th>
                            <th scope="col" class="px-6 py-4">Keuntungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">21 Maret 2023</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.500.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">22 Maret 2023</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.500.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">23 Maret 2023</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.500.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 500.000</td>
                        </tr>
                    </tbody>
                    <tfoot class="border-b text-lg font-semibold bg-gray-100">
                        <tr class="border-b">
                            <td colspan="1" class="whitespace-nowrap px-6 py-4">Total</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 4.500.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 3.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.500.000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
