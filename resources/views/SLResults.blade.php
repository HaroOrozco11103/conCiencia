@extends('layouts.index')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="card shadow">
    @foreach($regLin as $key => $SLR)
      <div class="card-header">{{ $SLR["nombre"] }}: {{ $SLR["resultado"] }}</div>
      <br>
    @endforeach
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
