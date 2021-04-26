@extends('layouts.index')

@section('content')
               
    <div class="row">
        <div class="col-md-12">
            <header class="cabecera"><h1 class="titulo">ConCienciaSoft <br> Trivial</h1></header>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                
            <div class="materias">
                <select id="asignatura">
                    <option value="fisica">Física</option>
                    <option value="arte">Artes</option>
                </select>

                <input id="btnCorrer" type="button" value="¡  Iniciar Juego !" > 
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="marcador">
                <div class="puntaje">
                    <p class="score"></p>
                </div>

                <div class="cronometro">
                    <span class="tiempo"  id="minutos"> 00:</span>
                    <span  class="tiempo" id="segundos"> 00</span>
                </div>
            </div>

        </div>
    </div>
    
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