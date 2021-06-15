@section('titulo')

    <div class="row">
        <div class="col-md-12">
            <header class="cabecera"><h1 class="titulo">ConCienciaSoft <br> {{$dinamicas[0]->nombre}}</h1></header>
        </div>
    </div>
@endsection

@section('materias')
    
    <div class="row">
        <div class="col-md-12">
                
            <div class="materias">
                <select id="asignatura" >
                    @foreach ($dinamicas as $dinamica)
                        @if ($dinamica->id == $dinamica_id)
                            <option value={{$dinamica->id}} selected>{{$dinamica->asignatura}}</option>    
                        @else
                            <option value={{$dinamica->id}}>{{$dinamica->asignatura}}</option>        
                        @endif
                    @endforeach
                    
                </select>

                <input id="btnCorrer" type="button" value="¡  Iniciar Juego !" > 
            </div>

        </div>
    </div>

@endsection

@section('marcador')
    
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

@endsection