{{-- Export and Datepicker --}}
<div class="flex justify-between items-center">
    <button type="button"
        class="inline-block rounded bg-warning px-4 py-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
        <div class="flex space-x-2">
            <img src="/assets/icons/export.svg">
            <span class="hidden sm:block">Export Laporan Penjualan</span>
        </div>
    </button>
    <div class="relative mb-3" data-te-input-wrapper-init>
        <input type="date"
            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            id="exampleFormControlInput1" placeholder="Example label" />
        <label for="exampleFormControlInput1"
            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Pilih
            Tanggal
        </label>
    </div>
</div>

{{-- Tabel --}}
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full font-light">
                    <thead class="border-b bg-neutral-800 text-left font-medium text-white dark:bg-neutral-900">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nama Pelanggan</th>
                            <th scope="col" class="px-6 py-4">Pendapatan</th>
                            <th scope="col" class="px-6 py-4">Pengeluaran</th>
                            <th scope="col" class="px-6 py-4">Keuntungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">Novie Octavia</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.500.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 500.000</td>
                        </tr>
                        <tr class="border-b">
                            <td class="whitespace-nowrap px-6 py-4">Agnes</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.500.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 500.000</td>
                        </tr>
                    </tbody>
                    <tfoot class="border-b text-lg font-semibold bg-gray-100">
                        <tr class="border-b">
                            <td colspan="1" class="whitespace-nowrap px-6 py-4">Total</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 3.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 2.000.000</td>
                            <td class="whitespace-nowrap px-6 py-4">Rp 1.000.000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
