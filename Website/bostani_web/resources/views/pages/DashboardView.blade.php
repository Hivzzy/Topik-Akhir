@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">{{ $products }}</div>
                    <span class="font-semibold text-lg">Barang</span>
                </div>
                <img src="/assets/icons/product.svg" alt="product icon">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">{{ $customers }}</div>
                    <span class="font-semibold text-lg">Pelanggan</span>
                </div>
                <img src="/assets/icons/mdi_people-group.svg" alt="people icon">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Pesanan</span>
                </div>
                <img src="/assets/icons/ph_shopping-cart-simple-bold.svg" alt="cart icon">
            </div>
            <div class="flex justify-between bg-white p-4 rounded shadow-md">
                <div>
                    <div class="font-semibold text-[32px]">0</div>
                    <span class="font-semibold text-lg">Pendapatan</span>
                </div>
                <img src="/assets/icons/ph_money.svg" alt="money icon">
            </div>
        </div>
    </div>
@endsection
