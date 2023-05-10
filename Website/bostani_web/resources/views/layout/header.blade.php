<div class="w-full bg-white shadow-md">
    <div class="px-4 py-2 flex justify-between items-center">
        <div>
            <button title="sidebar" data-te-sidenav-toggle-ref data-te-target="#sidebar" aria-controls="#sidebar"
                aria-haspopup="true">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.33333 24C4.95556 24 4.63911 23.872 4.384 23.616C4.128 23.3609 4 23.0444 4 22.6667C4 22.2889 4.128 21.9724 4.384 21.7173C4.63911 21.4613 4.95556 21.3333 5.33333 21.3333H26.6667C27.0444 21.3333 27.3609 21.4613 27.616 21.7173C27.872 21.9724 28 22.2889 28 22.6667C28 23.0444 27.872 23.3609 27.616 23.616C27.3609 23.872 27.0444 24 26.6667 24H5.33333ZM5.33333 17.3333C4.95556 17.3333 4.63911 17.2053 4.384 16.9493C4.128 16.6942 4 16.3778 4 16C4 15.6222 4.128 15.3053 4.384 15.0493C4.63911 14.7942 4.95556 14.6667 5.33333 14.6667H26.6667C27.0444 14.6667 27.3609 14.7942 27.616 15.0493C27.872 15.3053 28 15.6222 28 16C28 16.3778 27.872 16.6942 27.616 16.9493C27.3609 17.2053 27.0444 17.3333 26.6667 17.3333H5.33333ZM5.33333 10.6667C4.95556 10.6667 4.63911 10.5391 4.384 10.284C4.128 10.028 4 9.71111 4 9.33333C4 8.95556 4.128 8.63867 4.384 8.38267C4.63911 8.12756 4.95556 8 5.33333 8H26.6667C27.0444 8 27.3609 8.12756 27.616 8.38267C27.872 8.63867 28 8.95556 28 9.33333C28 9.71111 27.872 10.028 27.616 10.284C27.3609 10.5391 27.0444 10.6667 26.6667 10.6667H5.33333Z"
                        fill="#111512" />
                </svg>
            </button>
        </div>
        <div>
            <button class="p-2 font-medium rounded" data-te-toggle="modal" data-te-target="#exampleModal"
                data-te-ripple-init data-te-ripple-color="light">
                <div class="flex space-x-1 items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 5H11C11.55 5 12 4.55 12 4C12 3.45 11.55 3 11 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H11C11.55 21 12 20.55 12 20C12 19.45 11.55 19 11 19H5V5Z"
                            fill="black" />
                        <path
                            d="M20.65 11.65L17.86 8.86004C17.7905 8.78859 17.7012 8.73952 17.6036 8.71911C17.506 8.69869 17.4045 8.70787 17.3121 8.74545C17.2198 8.78304 17.1408 8.84733 17.0851 8.93009C17.0295 9.01286 16.9999 9.11033 17 9.21004V11H10C9.45 11 9 11.45 9 12C9 12.55 9.45 13 10 13H17V14.79C17 15.24 17.54 15.46 17.85 15.14L20.64 12.35C20.84 12.16 20.84 11.84 20.65 11.65Z"
                            fill="black" />
                    </svg>
                    <div class="">Logout</div>
                </div>
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <!--Modal title-->
                <h5 class="text-xl font-medium leading-normal" id="exampleModalLabel">
                    Keluar
                </h5>
                <!--Close button-->
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!--Modal body-->
            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                Anda yakin ingin keluar aplikasi ?
            </div>

            <!--Modal footer-->
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button type="button"
                    class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    data-te-modal-dismiss data-te-ripple-init>
                    Batal
                </button>
                <form action="/user/logout" method="POST">
                    @csrf
                    <button
                        class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-ripple-init>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
