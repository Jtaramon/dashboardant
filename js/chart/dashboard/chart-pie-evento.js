// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

//SELECT * FROM `vehiculos` WHERE vehiculos.evento = 'Salida'
var vIng =  document.getElementById("VIngreso").innerHTML;
var vSal =  document.getElementById("VSalida").innerHTML;

// Pie Chart Example
var ctx = document.getElementById("myPieChartE");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Ingreso", "Salida"],
    datasets: [{
      data: [vIng, vSal],
      backgroundColor: ['#F6C23E', '#4E73DF'],
      hoverBackgroundColor: ['#d8aa34', '#375aba'],
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
