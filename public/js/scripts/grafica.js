Highcharts.chart('graficaCont', {
  title: {
    text: 'Grafica de dispersión de datos con recta de regresión'
  },
  xAxis: {
    min: 0,
    max: recta[1][0]
  },
  yAxis: {
    min: 0
  },
  series: [{
    type: 'line',
    name: 'Recta de regresión',
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
      radius: 6
    }
  }]
});
