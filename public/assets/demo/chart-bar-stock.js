// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


// Bar Chart Stock
var ctx = document.getElementById("myStock");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["5", "10", "15", "25", "50", "100", "250", "500", "1000"],
    datasets: [{
      label: "Stock",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: chartData,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 9
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: maxStock,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
