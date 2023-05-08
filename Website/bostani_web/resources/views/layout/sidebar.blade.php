<!-- Sidenav -->
<nav id="sidebar"
    class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-[#272727] shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
    data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode="side" data-te-sidenav-content="#content">
    <div class="mx-4 my-6 space-x-4 flex items-center">
        <a class="flex items-center" href="/dashboard">
            <img src="/assets/img/logo_bostani.png" width="75px">
        </a>
        <span class="text-sm text-white font-bold">Selamat Datang, Administrator</span>
    </div>
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative">
            <a class="{{ $active === 'dashboard' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/dashboard">
                <span class="ml-2 text-sm font-medium">Dashboard</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'product' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/produk">
                <span class="ml-2 text-sm font-medium">Data Produk</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'category' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/kategori">
                <span class="ml-2 text-sm font-medium">Data Kategori</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'order' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/pesanan">
                <span class="ml-2 text-sm font-medium">Data Pesanan</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'send-item' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/pengiriman">
                <span class="ml-2 text-sm font-medium">Data Pengiriman</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'sell-item' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/penjualan">
                <span class="ml-2 text-sm font-medium">Data Penjualan</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'customer' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/pelanggan">
                <span class="ml-2 text-sm font-medium">Data Pelanggan</span>
            </a>
        </li>
        <li class="relative">
            <a class="{{ $active === 'user-account' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/kelola-akun">
                <span class="ml-2 text-sm font-medium">Kelola Akun</span>
            </a>
        </li>
    </ul>
</nav>
<!-- Sidenav -->
