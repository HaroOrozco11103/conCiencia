<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>ConCiencia</title>
        <script src="{{ asset('js/app.js') }}"></script>
        <link href="{{ asset('layout/dist/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/juego.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/modal.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/style/style.css') }}" rel="stylesheet"/>    <!--CSS Vistas general -->
        

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>


        <script>
            var css = "{{ asset('css') }}"
            var json = "{{ asset('json') }}"
            var js = "{{ asset('js') }}"
            var image = "{{ asset('images') }}"
        </script>

    </head>
    <body class="sb-nav-fixed cuerpo">

        <div class="row">
            <div class="col-md-12">
                <!--Top Navbar-->
                <nav class="sb-topnav nav-profesor">
                    <a class="top-nav-links nav-stats" href="{{ route('stats.index') }}" class="estadisticas-glob-link">Stats Globales</a>
                    <a class="top-nav-links nav-title" href="{{ route('inicio')}}">ConCiencia</a>
                    <!--User Navbar-->
                    @include('layouts.user')
                </nav>
            </div>
        </div>

        <div class="juego">
            <!-- Content -->
            @yield('content')
        </div>

        <!-- Modal -->
        @include('layouts.modal')

        <script src="{{ asset('layout/dist/js/scripts.js') }}"></script>
        <script src="{{ asset('js/scripts/app.js') }}"></script> <!--JS usado para vistas-->
    </body>
</html>
