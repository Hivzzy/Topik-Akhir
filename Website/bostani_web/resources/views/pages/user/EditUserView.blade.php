@extends('main')

@section('container')
    <div class="space-y-4 sm:space-y-6">
        <h1 class="text-lg sm:text-2xl font-semibold">Edit Akun</h1>
        <div class="bg-white p-4 space-y-6 rounded shadown-md">
            <form method="POST" action="/akun/edit/{{ $user->id }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Nama</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="nama_user" value="{{ $user->nama_user }}">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Role</label>
                        <select name="role" id="" class="px-2 py-1 border bg-gray-100 border-1 rounded appearance-none">
                            <option value="{{ $user->id_role }}">{{ $user->role->nama_role }}</option>
                            @foreach ($roles as $role)
                             <option value="{{ $role->id }}">{{ $role->nama_role }}</option>   
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Username</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="text" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="grid grid-rows-1">
                        <label class="font-medium" for="">Password</label>
                        <input class="px-2 py-1 border bg-gray-100 border-1 rounded" type="password" name="password">
                    </div>
                </div>
                <div class="flex justify-end space-x-2 mt-6">
                    <input type="submit"
                        class="inline-block rounded bg-success px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" value="Simpan Data">
                    <button type="button" onclick="history.go(-1);"
                        class="inline-block rounded bg-danger px-4 pb-2 pt-2.5 font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
