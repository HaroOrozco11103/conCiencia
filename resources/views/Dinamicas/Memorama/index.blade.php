@extends('layouts.index')

@section('content')
    
    <div class="cuerpo">    
        @include('Dinamicas.materias')
        @yield('titulo')

        @yield('materias')
        @yield('marcador')
        <div class="row">
            <div class="col-md-12">  
                <div class="contenedor">
                    <!-- Aqui van las cartas, traido de JS-->
                </div>
                
            </div>

        </div>
    </div>

    <link rel="stylesheet" href="{{asset('css/Dinamicas/memorama.css')}}">
    
     <!-- JS PARA EL CRONOMETRO Y LOS MENSAJES -->
     <script type='text/javascript' src="{{ asset('js/Dinamicas/cronometro.js')}}"></script>    
    <script type='text/javascript' src="{{ asset('js/Dinamicas/Memorama/memorama.js')}}"></script>
@endsection