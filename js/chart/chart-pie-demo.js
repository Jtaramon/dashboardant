// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

//SELECT * FROM `vehiculos` WHERE vehiculos.evento = 'Salida'
var vLiviano = document.getElementById('vLiviano').innerHTML;
var vMediano = document.getElementById('vMediano').innerHTML;
var vPesado = document.getElementById('vPesado').innerHTML;

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Livianos", "Medianos","Pesados"],
    datasets: [{
      data: [vLiviano, vMediano, vPesado],
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
