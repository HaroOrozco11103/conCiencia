<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ConCiencia</title>
        <link href="{{ asset('layout/dist/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/juego.css') }}" rel="stylesheet"/>
        
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}"></script>

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
                <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    <a class="navbar-brand">ConCiencia</a>
                    <!--User Navbar-->
                    @include('layouts.user')
                </nav>
            </div>
        </div>

        <div class="juego">
            <!-- Content -->
            @yield('content')
        </div>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('layout/dist/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('layout/dist/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('layout/dist/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('layout/dist/assets/demo/datatables-demo.js') }}"></script>
    </body>
</html>
