$(document).ready(function(){

  Highcharts.setOptions({
    colors: ['#50B432', '#303030', '#ff0000', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
   });
   
  Highcharts.chart('graficaCont', {
    title: {
      text: 'Gráfica de dispersión de datos con recta de regresión'
    },
    xAxis: {
      title: {
        text: "Veces jugadas"
      },
      min: 0,
      max: recta[1][0]
    },
    yAxis: {
      title: {
        text: "Puntaje"
      },
      min: 0
    },
    series: [{
      type: 'line',
      name: 'Recta de predicción',
      data: recta,
      marker: {
        enabled: false
      },
      states: {
        hover: {
          lineWidth: 0
        }
      },
      enableMouseTracking: false
    }, {
      type: 'scatter',
      name: 'Datos',
      data: scatterPlot,
      marker: {
        radius: 4
      }
    }, {
      type: 'scatter',
      name: 'Predicción',
      data: puntoPred,
      marker: {
        symbol: 'circle', 
        radius: 4
      }
    }]
  });
  
});
