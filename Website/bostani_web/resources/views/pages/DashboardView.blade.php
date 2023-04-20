@extends('main')

@section('container')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Dashboard</h1>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Barang</span>
                </div>
                <img src="/assets/icons/icon-park-outline_ad-product.svg">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Pelanggan</span>
                </div>
                <img src="/assets/icons/mdi_people-group.svg">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Pesanan</span>
                </div>
                <img src="/assets/icons/ph_shopping-cart-simple-bold.svg">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Pendapatan</span>
                </div>
                <img src="/assets/icons/ph_money.svg">
            </div>
        </div>
    </div>
@endsection
