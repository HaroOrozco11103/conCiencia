@extends('layouts.index')

@section('content')
<div class="background">
  <div class="contenedor-stats">
    <div class="instrucciones">
      <h2>Stats</h2>
      En esta página podrás consultar información del grupo de datos que selecciones, como el promedio de puntajes, el progreso y una proyección que muestra el comportamiento de los datos.
      <ol>
        <li>Selecciona la materia, el tipo de dinámica o la dinámica específica que desees consultar.</li>
        <li>Selecciona el porcentaje para acotar el número de registros a tomar en cuenta.</li>
        <li>Si el porcentaje es igual o menor al 100%, se mostrarán resultados tomando en cuenta los registros existentes.</li>
        <li>Si el porcentaje es mayor a 100%, se mostrará la predicción del promedio de puntajes de acuerdo al porcentaje ingresado.</li>
      </ol>
    </div>
    <div class="separador"></div>
    <div class="estadisticas">
      <div class="regresiones">
        <div class="reg-btn">
          <h3>Materia</h3>
          <form method="POST" action="{{ route('stats.SLR', 'globalMateria') }}">
            @csrf
            <select name="matSelect">
              @foreach($materias as $key => $mat)
              <option value="{{ $mat->id }}">{{ $mat->nombre }}</option>
              @endforeach
            </select>
            <select name="porcentaje">
              @for($i=0.05; $i<=1.01; $i+=0.05) <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
                @for($i=1.5; $i<=10.00; $i+=0.50) <option value="{{ $i }}">{{ $i * 100 }}%</option>
                  @endfor
            </select>
            <div>
              <button type="submit" class="btn btn-outline-primary btn-consultar">
                Consultar
              </button>
            </div>
          </form>
        </div>
        <div class="reg-btn">
          <h3>Tipo de dinámica</h3>
          <form method="POST" action="{{ route('stats.SLR', 'globalTipoDinamica') }}">
            <!--<form method="POST" action="{{ route('stats.SLR', ['globalTipoDinamica', 1, 0]) }}">-->
            @csrf
            <select name="tipoDinSelect">
              @foreach($tipoDinamicas as $key => $tDin)
              <option value="{{ $tDin->nombre }}">{{ $tDin->nombre }}</option>
              @endforeach
            </select>
            <select name="porcentaje">
              @for($i=0.05; $i<=1.01; $i+=0.05) <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
                @for($i=1.5; $i<=10.00; $i+=0.50) <option value="{{ $i }}">{{ $i * 100 }}%</option>
                  @endfor
            </select>
            <div>
              <button type="submit" class="btn btn-outline-primary btn-consultar">
                Consultar
              </button>
            </div>
          </form>
        </div>
        <div class="reg-btn">
          <h3>Dinámica específica</h3>
          <form method="POST" action="{{ route('stats.SLR', 'globalDinamicaEspecifica') }}">
            @csrf
            <select name="dinSelect">
              @foreach($dinamicas as $key => $din)
              <option value="{{ $din->id }}">{{ $din->nombre }} - {{ $din->aNombre }}</option>
              @endforeach
            </select>
            <select name="porcentaje">
              @for($i=0.05; $i<=1.01; $i+=0.05) <option value="{{ $i }}">{{ $i * 100 }}%</option>
                @endfor
                @for($i=1.5; $i<=10.00; $i+=0.50) <option value="{{ $i }}">{{ $i * 100 }}%</option>
                  @endfor
            </select>
            <div>
              <button type="submit" class="btn btn-outline-primary btn-consultar">
                Consultar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection