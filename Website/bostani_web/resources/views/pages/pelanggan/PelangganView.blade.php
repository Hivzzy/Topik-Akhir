@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Data Pelanggan</h1>
        <div class="bg-white p-4 space-y-4 rounded shadow-md">
            <div class="flex justify-between items-center">
                <a href="/tambah-pelanggan"
                    class="inline-block rounded bg-primary p-2 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    <div class="flex space-x-1 items-center">
                        <img src="/assets/icons/add.svg">
                        <span class="hidden sm:block">Tambah Data</span>
                    </div>
                </a>
                <div>
                    <div class="flex w-full flex-wrap items-stretch">
                        <input type="search"
                            class="relative m-0 -mr-0.5 block w-[1px] w-fit rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            placeholder="Cari pelanggan" aria-label="Search" aria-describedby="button-addon1" />

                        <!--Search button-->
                        <button
                            class="relative z-[2] flex items-center rounded-r bg-primary px-4 sm:px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                            type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full font-light">
                                    <thead
                                        class="border-b bg-neutral-800 font-medium text-left text-white dark:border-neutral-500 dark:bg-neutral-900">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Nama Pelanggan</th>
                                            <th scope="col" class="px-6 py-4">No Telepon</th>
                                            <th scope="col" class="px-6 py-4">Alamat</th>
                                            <th scope="col" class="px-6 py-4">Kelurahan</th>
                                            <th scope="col" class="px-6 py-4">Kecamatan</th>
                                            <th scope="col" class="px-6 py-4">Kota</th>
                                            <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b">
                                            <td class="whitespace-nowrap px-6 py-4">1</td>
                                            <td class="whitespace-nowrap px-6 py-4">Mark</td>
                                            <td class="whitespace-nowrap px-6 py-4">Otto</td>
                                            <td class="whitespace-nowrap px-6 py-4">@mdo</td>
                                            <td class="whitespace-nowrap px-6 py-4">Mark</td>
                                            <td class="whitespace-nowrap px-6 py-4">Otto</td>
                                            <td class="whitespace-nowrap text-center">
                                                <a href="/pelanggan/edit/1"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700">
                                                    Edit
                                                    {{-- <img src="/assets/icons/edit.svg"> --}}
                                                </a>
                                                <a href="/pelanggan/delete/1"
                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700"
                                                    data-confirm-delete="true">
                                                    Hapus
                                                    {{-- <img src="/assets/icons/delete.svg"> --}}
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
