@extends('layouts.index')

@section('content')
<div class="card shadow">
    @foreach($regLin as $key => $SLR)
      <div class="card-header">{{ $SLR["nombre"] }}: {{ $SLR["resultado"] }}</div>
      <br>
    @endforeach
</div>

<figure class="highcharts-figure">
  <div id="graficaCont"></div>
  <p class="highcharts-description">
    Chart showing how a line series can be used to show a computed
    regression line for a dataset. The source data for the regression line
    is visualized as a scatter series.
  </p>
</figure>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  var recta = <?php echo json_encode($recta); ?>;
  var scatterPlot = <?php echo json_encode($scatterPlot); ?>;
  var puntoPred = <?php echo json_encode($puntoPred); ?>;
</script>
<script src="{{ asset('js/scripts/grafica.js') }}"></script>
<link href="{{ asset('css/style/grafica.css') }}" rel="stylesheet"/>
@endsection
