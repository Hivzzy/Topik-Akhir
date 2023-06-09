<!-- Sidenav -->
<nav id="sidebar"
    class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-[#272727] shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
    data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode="side" data-te-sidenav-content="#content">
    <div class="mx-4 my-6 space-x-4 flex items-center">
        <a class="flex items-center" href="/dashboard">
            <img src="/assets/icons/Logo.svg" width="75px" alt="bostani logo">
        </a>
        <span class="text-sm text-white font-bold">Selamat Datang, {{ auth()->user()->name }}</span>
    </div>
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative">
            <a class="{{ $active === 'dashboard' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/dashboard">
                <x-icons.home />
                <span class="ml-2 text-sm font-medium">Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="relative">
                <a class="{{ $active === 'product' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/produk">
                    <x-icons.cube />
                    <span class="ml-2 text-sm font-medium">Data Produk</span>
                </a>
            </li>
            <li class="relative">
                <a class="{{ $active === 'category' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/kategori">
                    <x-icons.collection />
                    <span class="ml-2 text-sm font-medium">Data Kategori</span>
                </a>
            </li>
            <li class="relative">
                <a class="{{ $active === 'order' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/pesanan">
                    <x-icons.shopping-cart />
                    <span class="ml-2 text-sm font-medium">Data Pesanan</span>
                </a>
            </li>
            <li class="relative">
                <a class="{{ $active === 'deliveries' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/pengiriman">
                    <x-icons.truck />
                    <span class="ml-2 text-sm font-medium">Data Pengiriman</span>
                </a>
            </li>
            <li class="relative">
                <a class="{{ $active === 'customer' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/pelanggan">
                    <x-icons.user-group />
                    <span class="ml-2 text-sm font-medium">Data Pelanggan</span>
                </a>
            </li>
            <li class="relative">
                <a class="{{ $active === 'user-account' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/kelola-akun">
                    <x-icons.users />
                    <span class="ml-2 text-sm font-medium">Kelola Akun</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 5)
            <li class="relative">
                <a class="{{ $active === 'shop-item' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/belanja">
                    <x-icons.shopping-bag />
                    <span class="ml-2 text-sm font-medium">Data Belanja</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3 || auth()->user()->role_id == 4)
            <li class="relative">
                <a class="{{ $active === 'sell-item' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                    href="/penjualan">
                    <x-icons.chart-square-bar />
                    <span class="ml-2 text-sm font-medium">Data Penjualan</span>
                </a>
            </li>
        @endif
        <li class="relative">
            <a class="{{ $active === 'Self-Account' ? 'flex items-center w-full h-12 px-3 mt-2 font-medium text-[#27272A] bg-white rounded' : 'flex items-center w-full h-12 px-3 mt-2 font-medium rounded hover:bg-gray-700 text-white' }}"
                href="/akun/edit-user">
                <x-icons.users />
                <span class="ml-2 text-sm font-medium">Akun</span>
            </a>
        </li>
    </ul>
</nav>
<!-- Sidenav -->
