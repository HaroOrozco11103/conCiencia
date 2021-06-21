@extends('layouts.index')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@if(sizeof($regLin) == 3)
  <div class="card shadow">
    <p>
      En el {{ $regLin[0]["resultado"] }} de las participaciones jugadas para el conjunto de datos que seleccionaste
      el {{ $regLin[1]["nombre"] }} registradas es de {{ $regLin[1]["resultado"] }}.
      <br>
      El {{ $regLin[2]["nombre"] }} es de {{ $regLin[2]["resultado"] }}.
    </p>
  </div>
@else
  <div class="card shadow">
    <p>
      En el {{ $regLin[0]["resultado"] }} de las participaciones jugadas para el conjunto de datos que seleccionaste
      el {{ $regLin[1]["nombre"] }} registradas es de {{ $regLin[1]["resultado"] }}.
      <br>
      Para este conjunto de datos la {{ $regLin[2]["nombre"] }} se acercará un {{ $regLin[2]["resultado"] }}%.
      <br>
      @if($regLin[2]["resultado"] >= 70)
        Lo que indica que la fiabilidad del resultado predecido es alta.
      @endif
      @if($regLin[2]["resultado"] < 70 && $regLin[2]["resultado"] >=50)
        Lo que significa que el valor del resultado predecido puede variar un poco al puntaje real obtenido para ese volumen de datos en un futuro.
      @endif
      @if($regLin[2]["resultado"] < 50)
      Lo que significa que el resultado predecido puede variar mucho al puntaje real obtenido para ese volumen de datos.
      <br>
      La fiabilidad del resultado predecido es baja.
      @endif
      <br><br>
      El {{ $regLin[3]["nombre"] }} de el(los) alumno(s) es de {{ $regLin[3]["resultado"] }}%.
      <br>
      @if($regLin[3]["resultado"] >= 1)
        Los alumnos están mejorando notablemente en sus resultados.
      @endif
      @if($regLin[3]["resultado"] < 1 && $regLin[2]["resultado"] >= 0)
        El progreso de los alumnos es lento o nulo.
      @endif
      @if($regLin[3]["resultado"] < 0)
        Los alumnos están empeorando sus resultados.
      @endif
      <br><br>
      El {{ $regLin[4]["nombre"] }} es de {{ $regLin[4]["resultado"] }}.
    </p>
  </div>
@endif

<div class="indice-abandono">
  <h2>Indice abandono</h2>
</div>
<div class="usuarios-no-reg">
  <h2>Porcentaje de usuarios no registrados</h2>
</div>

<figure class="highcharts-figure">
  <div id="graficaCont"></div>
  <p class="highcharts-description">
    La gráfica muestra la proyección de los puntajes respecto a las participaciones registradas y futuras,
    tomando en cuenta el progreso de los participantes.
  </p>

  <p><b>Recta de predicción:</b> Tendencia de los puntajes con respecto al número de veces jugadas.</p>
  <p><b>Datos:</b> Proporción de los puntajes por el número de veces jugadas.</p>
  <p><b>Predicción:</b> Pronóstico de un resultado sobre el porcentaje de participaciones elegido siguiendo la recta de predicción.</p>
</figure>


<script>
  var recta = <?php echo json_encode($recta); ?>;
  var scatterPlot = <?php echo json_encode($scatterPlot); ?>;
  var puntoPred = <?php echo json_encode($puntoPred); ?>;
</script>
<script src="{{ asset('js/scripts/grafica.js') }}"></script>
<link href="{{ asset('css/style/grafica.css') }}" rel="stylesheet"/>
@endsection
