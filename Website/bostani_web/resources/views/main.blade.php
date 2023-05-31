<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Bostani Web</title>
    <link href="/assets/img/logo_bostani.png" rel="icon" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" type="text/css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap');
    </style>
</head>

<body class="flex bg-[#EBF4E2] font-inter">
    @include('layout.sidebar')
    <div class="w-full sm:w-screen overflow-x-auto" id="content">
        @include('layout.header')
        <div class="p-4 sm:p-6">
            @yield('container')
        </div>
    </div>

    @yield('script')
    @include('sweetalert::alert')

    <script type="text/javascript">
        var token = '{{ csrf_token() }}';
    </script>
</body>

</html>
