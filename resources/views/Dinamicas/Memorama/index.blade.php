@extends('layouts.index')

@section('content')
    
    <div class="cuerpo">    
        <div class="row">
            <div class="col-md-12">
                <header class="cabecera"><h1 class="titulo">ConCienciaSoft <br> MEMO</h1></header>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                    
                <div class="materias">
                    <select id="asignatura">
                        <option value="fisica" selected>Fisica</option>
                        <option value="artes">Artes</option>
                        <option value="geografia">Geografia</option>
                    </select>
                    <input type="button" value="Iniciar Juego" id="btnCorrer" >
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">                

                <div class="marcador">
                    <div class="puntaje">
                        <p class="score">score:</p>
                    </div>

                    <div class="cronometro">
                        <span class="tiempo" id="minuto">00:</span>
                        <span class="tiempo" id="segundo">00</span>
                    </div>
                </div>
                
                <div class="contenedor">
                    <!-- Aqui van las cartas, traido de JS-->
                </div>
                
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{asset('css/Dinamicas/memorama.css')}}">
    
    <script type='text/javascript' src="{{ asset('js/Dinamicas/Memorama/memorama.js')}}"></script>
    <script type='text/javascript' src="{{ asset('js/Dinamicas/cronometro.js')}}"></script>    
@endsection