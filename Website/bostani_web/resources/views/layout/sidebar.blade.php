<!-- Component Start -->
<div class="sidebar flex flex-col items-center min-w-max sm:min-w-min min-h-screen text-gray-400 bg-[#27272A]"
    x-show="asideOpen"x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
    <div class="mx-4 my-6 space-x-4 flex items-center">
        <a class="flex items-center" href="/dashboard">
            <img src="/assets/img/logo_bostani.png" width="75px">
        </a>
        <span class="text-sm text-white font-bold hidden sm:block">Selamat Datang, Administrator</span>
    </div>
    <div class="w-full px-2">
        <div class="flex flex-col items-center w-full">
            <a class="{{ $active === 'dashboard' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/dashboard">
                <span class="ml-2 text-sm font-me dium">Dashboard</span>
            </a>
            <a class="{{ $active === 'product' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/produk">
                <span class="ml-2 text-sm font-medium">Data Produk</span>
            </a>
            <a class="{{ $active === 'category' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/kategori">
                <span class="ml-2 text-sm font-medium">Data Kategori</span>
            </a>
            <a class="{{ $active === 'order' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/pesanan">
                <span class="ml-2 text-sm font-medium">Data Pesanan</span>
            </a>
            <a class="{{ $active === 'send-item' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/pengiriman">
                <span class="ml-2 text-sm font-medium">Data Pengiriman</span>
            </a>
            <a class="{{ $active === 'sell-item' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/penjualan">
                <span class="ml-2 text-sm font-medium">Data Penjualan</span>
            </a>
            <a class="{{ $active === 'customer' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/pelanggan">
                <span class="ml-2 text-sm font-medium">Data Pelanggan</span>
            </a>
            <a class="{{ $active === 'user-account' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/kelola-akun">
                <span class="ml-2 text-sm font-medium">Kelola Akun</span>
            </a>
        </div>
    </div>
</div>
<!-- Component End  -->
