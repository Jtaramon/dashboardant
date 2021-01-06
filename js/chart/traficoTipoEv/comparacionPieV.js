var canvas = document.getElementById("trafhorafechaPieV");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
// Grafico 1
var vTot =  document.getElementById("VLivhoraVT").innerHTML;
var vLiv =  document.getElementById("VLivhoraV").innerHTML;
var vMed =  document.getElementById("VMedhoraV").innerHTML;
// Grafico 2
var vTot1 =  document.getElementById("VLivhoraVT1").innerHTML;
var vLiv1 =  document.getElementById("VLivhoraV1").innerHTML;
var vMed1 =  document.getElementById("VMedhoraV1").innerHTML;

var data = {
  labels: ["Total Vehiculos","Ingresan","Salen"],
  datasets: [{
      label: "Trafico Graf 1",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "#1CC88A",
      borderColor: "#1CC88A", // Verde
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "white",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "yellow",
      pointHoverBorderColor: "brown",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [vTot, vLiv, vMed],
      spanGaps: true,
    }, {
      label: "Trafico Graf 2",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "#F6C23F",
      borderColor: "#F6C23F", //Amarillo
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "black",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
      data: [vTot1, vLiv1, vMed1],
      spanGaps: false,
    }

  ]
};



// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'pie',
  data: data,
  options: options
});