<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Bostani Web</title>
    <link href="/assets/img/logo_bostani.png" rel="icon">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="flex bg-[#EBF4E2] w-full sm:w-screen">
    @include('layout.sidebar')
    <div class="w-full sm:w-screen overflow-x-auto" id="content">
        @include('layout.header')
        <div class="p-4 sm:p-6">
            @yield('container')
        </div>
    </div>

    @yield('script')
    @include('sweetalert::alert')
</body>

</html>
