<!-- plugin Chart.js : MIT license -->
<script src="<?php echo base_url("assets/dist/") ?>js/statistics/chartjs/chartjs.bundle.js"></script>

<script>
    /* doughnut chart */
    var doughnutChart = function() {
        var config = {
            type: 'doughnut',
            data: {
                labels: [
                    'Priok',
                    'Plumpang',
                    'Warakas',
                    'Walang',
                    'Kodamar',
                ],
                datasets: [{
                    data: [7, 12, 2, 3, 4],
                    //ambil data dari DB
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        };
        new Chart($("#doughnutChart > canvas").get(0).getContext("2d"), config);
    }
    /* doughnut chart -- end */


    /* bar chart */
    var barChart = function() {
        var barChartData = {
            labels: ['Priok',
                'Plumpang',
                'Warakas',
                'Walang',
                'Kodamar',
            ],
            datasets: [{
                    label: "Curent KWH",
                    backgroundColor: '#f56954',
                    borderColor: '#f56954',
                    borderWidth: 1,
                    data: [
                        45,
                        75,
                        26,
                        23,
                        60
                    ]
                },
                {
                    label: "Forecast KWH",
                    backgroundColor: '#00a65a',
                    borderColor: '#00a65a',
                    borderWidth: 1,
                    data: [10,
                        16,
                        72,
                        93,
                        29
                    ]
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
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
        }
        new Chart($("#barChart > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* initialize all charts */
    $(document).ready(function() {
        doughnutChart();
        barChart();
    });
</script>