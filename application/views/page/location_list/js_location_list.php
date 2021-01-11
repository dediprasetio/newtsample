<!-- plugin Chart.js : MIT license -->
<script src="<?php echo base_url("assets/dist/") ?>js/statistics/chartjs/chartjs.bundle.js"></script>
<script>
    var VoltageElm = document.getElementsByClassName("Voltage-R-gauge");
    var VoltageRChart = new Chart(VoltageElm	, {
        type:"doughnut",
        data: {
            labels : ["Green","Blue"],
            datasets: [{
                label: "Gauge",
                data : [0, 300],
                backgroundColor: [
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 0, 86)"
                ]
            }]
        },
        options: {
            circumference: Math.PI,
            rotation : Math.PI,
            cutoutPercentage : 60, // precent
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            }
        }
    });

    var AmpRElm = document.getElementsByClassName("Amp-R-gauge");
    var AmpRChart = new Chart(AmpRElm	, {
        type:"doughnut",
        data: {
            labels : ["Green","Blue"],
            datasets: [{
                label: "Gauge",
                data : [0, 300],
                backgroundColor: [
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 0, 86)"
                ]
            }]
        },
        options: {
            circumference: Math.PI,
            rotation : Math.PI,
            cutoutPercentage : 60, // precent
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            }
        }
    });

    var AmpSElm = document.getElementsByClassName("Amp-S-gauge");
    var AmpSChart = new Chart(AmpSElm	, {
        type:"doughnut",
        data: {
            labels : ["Green","Blue"],
            datasets: [{
                label: "Gauge",
                data : [0, 300],
                backgroundColor: [
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 0, 86)"
                ]
            }]
        },
        options: {
            circumference: Math.PI,
            rotation : Math.PI,
            cutoutPercentage : 60, // precent
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            }
        }
    });

    var AmpTElm = document.getElementsByClassName("Amp-T-gauge");
    var AmpTChart = new Chart(AmpTElm	, {
        type:"doughnut",
        data: {
            labels : ["Green","Blue"],
            datasets: [{
                label: "Gauge",
                data : [0, 300],
                backgroundColor: [
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 0, 86)"
                ]
            }]
        },
        options: {
            circumference: Math.PI,
            rotation : Math.PI,
            cutoutPercentage : 60, // precent
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            }
        }
    });

    var VoltageSElm = document.getElementsByClassName("Voltage-S-gauge");
var VoltageSChart = new Chart(VoltageSElm	, {
    type:"doughnut",
    data: {
        labels : ["Green","Blue"],
        datasets: [{
            label: "Gauge",
            data : [0, 300],
            backgroundColor: [
                "rgb(75, 192, 192)",
                "rgb(54, 162, 235)",
                "rgb(255, 0, 86)"
            ]
        }]
    },
    options: {
        circumference: Math.PI,
        rotation : Math.PI,
        cutoutPercentage : 60, // precent
        legend: {
            display: false
        },
        tooltips: {
            enabled: false
        }
    }
});

var VoltageTElm = document.getElementsByClassName("Voltage-T-gauge");
var VoltageTChart = new Chart(VoltageTElm	, {
    type:"doughnut",
    data: {
        labels : ["Green","Blue"],
        datasets: [{
            label: "Gauge",
            data : [0, 300],
            backgroundColor: [
                "rgb(75, 192, 192)",
                "rgb(54, 162, 235)",
                "rgb(255, 0, 86)"
            ]
        }]
    },
    options: {
        circumference: Math.PI,
        rotation : Math.PI,
        cutoutPercentage : 60, // precent
        legend: {
            display: false
        },
        tooltips: {
            enabled: false
        }
    }
});

var areaChartData = {
      labels  : ["00","01"],
      datasets: [{
                    label: "Primary",
                    backgroundColor     : 'rgba(0, 166, 90)',
                    borderColor         : 'rgba(74,176,255,11)',
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: false,
                    pointHoverRadius: 4,
                    data: [],
                    fill: false
                },
                {
                    label: "Success",
                    backgroundColor     : 'rgba(0, 166, 90)',
                    borderColor         : 'rgba(255,0,0,81)',
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: false,
                    pointHoverRadius: 4,
                    data: [],
                    fill: false
                },
                {
                    label: "Success",
                    backgroundColor     : 'rgba(0, 166, 90)',
                    borderColor         : 'rgba(87,194,0,52)',
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: false,
                    pointHoverRadius: 4,
                    data: [],
                    fill: false
                }
            ]
    }

 

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)

    var VoltlineChartCanvas = $('#VoltlineChart').get(0).getContext('2d')
    VoltlineChart = new Chart(VoltlineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions,
	  animation: false
    })

    var PhaseRAmplineChartCanvas = $('#PhaseRAmplineChart').get(0).getContext('2d')
    PhaseRAmplineChartlineChart = new Chart(PhaseRAmplineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    var dailyStatsVoltage = function() {
        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Primary",
                        backgroundColor: 'rgba(136,106,181, 0.2)',
                        borderColor: myapp_get_color.primary_500,
                        pointBackgroundColor: myapp_get_color.primary_700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: [
                            45,
                            75,
                            26,
                            23,
                            60, -48, -9
                        ],
                        fill: true
                    },
                    {
                        label: "Success",
                        backgroundColor: 'rgba(29,201,183, 0.2)',
                        borderColor: myapp_get_color.success_500,
                        pointBackgroundColor: myapp_get_color.success_700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: [-10,
                            16,
                            72,
                            93,
                            29, -74,
                            64
                        ],
                        fill: true
                    }
                ]
            },
            options: {
                legend: {
                    display: false,
                    position: 'bottom',
                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Area Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        };
        new Chart($("#daily-stats-voltage > canvas").get(0).getContext("2d"), config);
    }

    
  var VoltlineChart;
  var PhaseRAmplineChartlineChart;

    setInterval(function(){      
      $.ajax({
        url: '<?php echo base_url("api-load-data/sensor") ?>',
        dataType: "json",
          success: function(res) {
            var data = res.data;
            var maxVolt = 300;
            var maxAmp = 1;

            PhaseRAmplineChartlineChart.data.datasets[0].data = data.datarow.PHASE_R.Current;
			PhaseRAmplineChartlineChart.data.datasets[1].data = data.datarow.PHASE_S.Current;
		    PhaseRAmplineChartlineChart.data.datasets[2].data = data.datarow.PHASE_T.Current;
			PhaseRAmplineChartlineChart.data.labels = data.datarow.PHASE_R.labels;
            PhaseRAmplineChartlineChart.update();

            VoltlineChart.data.datasets[0].data = data.datarow.PHASE_R.voltage;
			VoltlineChart.data.datasets[1].data = data.datarow.PHASE_S.voltage;
            VoltlineChart.data.datasets[2].data = data.datarow.PHASE_T.voltage;
			VoltlineChart.data.labels = data.datarow.PHASE_R.labels;
            VoltlineChart.update();
            
            //Phase R
            var aMin = data.listrik.PHASE_R.Current;
			var aMax = maxAmp - aMin;
			var vUsage = (aMin/maxAmp)*100;
			change_gauge(AmpRChart, "Gauge", [aMin,aMax], false);
			$('#Amp-R').text(aMin+' Amp');
			$('#Usage-R').text(vUsage.toFixed(2)+'%');

			var vMin = data.listrik.PHASE_R.Voltage;
			var vMax = maxVolt - vMin;
			change_gauge(VoltageRChart, "Gauge", [vMin,vMax], false);
            $('#Voltage-R').text(vMin+' Volt');
            
            //Phase S
            var aMin = data.listrik.PHASE_S.Current;
			var aMax = maxAmp - aMin;
			var vUsage = (aMin/maxAmp)*100;
			change_gauge(AmpSChart, "Gauge", [aMin,aMax], false);
			$('#Amp-S').text(aMin+' Amp');
            $('#Usage-S').text(vUsage.toFixed(2)+'%');

            var vMin = data.listrik.PHASE_S.Voltage;
			var vMax = maxVolt - vMin;
			change_gauge(VoltageSChart, "Gauge", [vMin,vMax], false);
			$('#Voltage-S').text(vMin+' Volt');
            
            //Phase T
            var aMin = data.listrik.PHASE_T.Current;
			var aMax = maxAmp - aMin;
			var vUsage = (aMin/maxAmp)*100;
			change_gauge(AmpTChart, "Gauge", [aMin,aMax], false);
			$('#Amp-T').text(aMin+' Amp');
            $('#Usage-T').text(vUsage.toFixed(2)+'%');
            
            var vMin = data.listrik.PHASE_T.Voltage;
			var vMax = maxVolt - vMin;
			change_gauge(VoltageTChart, "Gauge", [vMin,vMax], false);
			$('#Voltage-T').text(vMin+' Volt');

		}
      });
    }, 1000);

    function change_gauge(chart, label, data, isalert){

	  chart.data.datasets.forEach((dataset) => {
		if(dataset.label == label){
		  dataset.data = data;
		}

		if (isalert == true) {
			dataset.backgroundColor = [
				"rgb(255, 50, 50)",
				"rgb(54, 162, 235)",
				"rgb(255, 205, 86)"
			]
		} else {
			dataset.backgroundColor = [
				"rgb(73, 171, 68)",
				"rgb(54, 162, 235)",
				"rgb(255, 205, 86)"
			]
		}
	  });
	  chart.update();
	}

    /* initilize all charts on DOM ready */
    $(document).ready(function() {
        // phaseR();
        // phaseS();
        // phaseT();
        // voltageR();
        // voltageS();
        // voltageT();
        // dailyStatsAmphere();
        dailyStatsVoltage();
    });
</script>