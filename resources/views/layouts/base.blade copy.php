<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ pageTitle() }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('asset/css/basic.css') }}">
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('datatables/css/datatables.min.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    {{-- header --}}
    <x-header-app />
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <x-sidebar-app />
            <!-- Konten Utama -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3">
                    <x-breadcrumb />
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    {{-- datatables js --}}
    {{-- <script src="{{ asset('datatables/js/jquery.js') }}"></script>
    <script src="{{ asset('datatables/js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                columnDefs: [{
                        targets: [0, 1, 3, 4, 16],
                        className: 'text-center'
                    },
                    {
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ]
            });
        });
    </script> --}}
</body>

</html>