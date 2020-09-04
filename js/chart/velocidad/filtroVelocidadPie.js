// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

//SELECT * FROM `vehiculos` WHERE vehiculos.evento = 'Salida'
var vLiv =  document.getElementById("VLivvelocidad").innerHTML;
var vMed =  document.getElementById("VMedvelocidad").innerHTML;
var vPes =  document.getElementById("VPesvelocidad").innerHTML;

// Pie Chart Example
var ctx = document.getElementById("chartvelocidadPie");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Livianos", "Medianos","Pesados"],
    datasets: [{
      data: [vLiv,vMed,vPes],
      backgroundColor: ['#F6C23E', '#4E73DF', '#1CC88A'],
      hoverBackgroundColor: ['#d8aa34', '#375aba', '#17aa74'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
