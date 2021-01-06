var canvas = document.getElementById("trafhorafechaLinear");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;
// Grafico 1
var vTot =  document.getElementById("VLivhoraT").innerHTML;
var vLiv =  document.getElementById("VLivhora").innerHTML;
var vMed =  document.getElementById("VMedhora").innerHTML;
var vPes =  document.getElementById("VPeshora").innerHTML;
// Grafico 2
var vTot1 =  document.getElementById("VLivhoraT1").innerHTML;
var vLiv1 =  document.getElementById("VLivhora1").innerHTML;
var vMed1 =  document.getElementById("VMedhora1").innerHTML;
var vPes1 =  document.getElementById("VPeshora1").innerHTML;

var data = {
  labels: ["Total V.","V. Livianos","V. Medianos","V. Pesados"],
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
      data: [vTot, vLiv, vMed, vPes],
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
      data: [vTot1, vLiv1, vMed1, vPes1],
      spanGaps: false,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});