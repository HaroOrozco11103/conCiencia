@extends('layouts.index')

@section('content')
               
    @include('Dinamicas.materias')

    @yield('titulo')
    @yield('materias')
    @yield('marcador')
    
    <div class="row">
        <div class="col-md-12">
        
            <div class="preguntas">
                <p id="txtPregunta"></p>
            </div>
        
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">    
        
            <div id="respuestas">
                <input type="button" id="respuesta1" class="boton" >
                <input type="button" id="respuesta2" class="boton" >
                <input type="button" id="respuesta3" class="boton" >
                <input type="button" id="respuesta4" class="boton" >
            </div>

        </div>
        
    </div>

    <link rel="stylesheet" href="{{asset('css/Dinamicas/trivial.css')}}">
    
    <script type='text/javascript' src="{{ asset('js/Dinamicas/cronometro.js')}}"></script>     
    <script type='text/javascript' src="{{ asset('js/Dinamicas/Trivial/trivial.js')}}"></script>
    
@endsection