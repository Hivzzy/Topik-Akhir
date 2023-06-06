{{-- Export and Datepicker --}}
<div class="flex flex-col-reverse md:flex-row justify-start md:justify-between items-center">
    <button type="button"
        class="flex gap-1 items-center inline-block rounded bg-warning p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]">
        <x-icons.download />
        <span class="hidden sm:block">Export Laporan Penjualan</span>
    </button>
    <div class="flex space-x-2 items-center">
        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="date"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput1" placeholder="Example label" />
            <label for="exampleFormControlInput1"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Pilih
                Tanggal Awal
            </label>
        </div>
        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="date"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput1" placeholder="Example label" />
            <label for="exampleFormControlInput1"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Pilih
                Tanggal Akhir
            </label>
        </div>
    </div>
</div>

{{-- Tabel --}}
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="tabel-penjualan min-w-full">
                    <thead class="bg-neutral-800 font-medium text-left text-white">
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Pendapatan</th>
                            <th>Modal Belanja</th>
                            <th>Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>21 Maret 2023</td>
                            <td>Rp 1.500.000</td>
                            <td>Rp 1.000.000</td>
                            <td>Rp 500.000</td>
                        </tr>
                        <tr>
                            <td>22 Maret 2023</td>
                            <td>Rp 1.500.000</td>
                            <td>Rp 1.000.000</td>
                            <td>Rp 500.000</td>
                        </tr>
                        <tr>
                            <td>23 Maret 2023</td>
                            <td>Rp 1.500.000</td>
                            <td>Rp 1.000.000</td>
                            <td>Rp 500.000</td>
                        </tr>
                    </tbody>
                    <tfoot class="text-lg font-semibold bg-gray-100">
                        <tr>
                            <td colspan="1">Total</td>
                            <td>Rp 4.500.000</td>
                            <td>Rp 3.000.000</td>
                            <td>Rp 1.500.000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
