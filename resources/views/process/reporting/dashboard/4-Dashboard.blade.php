<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
</head>

<body>

    <div class="container mx-auto p-4 my-6">

        <div class="grid grid-cols-1 gap-4 mb-4">
            <div class="col-span-1 bg-blue-900 p-4 rounded-lg">
                <div class="bg-white md:p-6 p-4 rounded-lg shadow w-full">
                    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Best
                                    Practice Implementation Status Overview</h5>
                            </div>
                        </div>
                    </div>
                    <div id="column-chart"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-1 bg-blue-900 p-4 rounded-lg">
                <div class="bg-white md:p-6 p-4 rounded-lg shadow w-full">
                    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Title</h5>
                    </div>

                    <div id="bar-chart"></div>
                </div>

            </div>
            <div class="col-span-1 bg-blue-900 p-4 rounded-lg">
                <div class="bg-white md:p-6 p-4 rounded-lg shadow w-full">

                    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Title
                                </h5>
                            </div>
                        </div>
                    </div>
                    <!-- Line Chart -->
                    <div class="py-6" id="pie-chart"></div>
                </div>
            </div>
            <div class="col-span-1 bg-blue-900 p-4 rounded-lg">
                <div class="bg-white md:p-6 p-4 rounded-lg shadow w-full">
                    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Title
                                </h5>
                            </div>
                        </div>
                    </div>
                    <!-- Donut Chart -->
                    <div class="py-6" id="donut-chart"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/flowbite.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.js') }}"></script>

    <script>
        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                    name: "Organic",
                    color: "#1A56DB",
                    data: [{
                            x: "Mon",
                            y: 231
                        },
                        {
                            x: "Tue",
                            y: 122
                        },
                        {
                            x: "Wed",
                            y: 63
                        },
                        {
                            x: "Thu",
                            y: 421
                        },
                        {
                            x: "Fri",
                            y: 122
                        },
                        {
                            x: "Sat",
                            y: 323
                        },
                        {
                            x: "Sun",
                            y: 111
                        },
                    ],
                },
                {
                    name: "Social media",
                    color: "#FDBA8C",
                    data: [{
                            x: "Mon",
                            y: 232
                        },
                        {
                            x: "Tue",
                            y: 113
                        },
                        {
                            x: "Wed",
                            y: 341
                        },
                        {
                            x: "Thu",
                            y: 224
                        },
                        {
                            x: "Fri",
                            y: 522
                        },
                        {
                            x: "Sat",
                            y: 411
                        },
                        {
                            x: "Sun",
                            y: 243
                        },
                    ],
                },
            ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
        }
    </script>

    <script>
        const getChartOptions = () => {
            return {
                series: [52.8, 26.8, 20.4],
                colors: ["#1C64F2", "#16BDCA", "#9061F9"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25
                        }
                    },
                },
                labels: ["Direct", "Organic search", "Referrals"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
            chart.render();
        }
    </script>

    <script>
        const getDonutChartOptions = () => {
            return {
                series: [35.1, 23.5, 2.4, 5.4],
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Unique visitors",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return '$' + sum + 'k'
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value + "k"
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Direct", "Sponsor", "Affiliate", "Email marketing"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "k"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "k"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getDonutChartOptions());
            chart.render();

            // Get all the checkboxes by their class name
            const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

            // Function to handle the checkbox change event
            function handleCheckboxChange(event, chart) {
                const checkbox = event.target;
                if (checkbox.checked) {
                    switch (checkbox.value) {
                        case 'desktop':
                            chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                            break;
                        case 'tablet':
                            chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                            break;
                        case 'mobile':
                            chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                            break;
                        default:
                            chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                    }

                } else {
                    chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                }
            }

            // Attach the event listener to each checkbox
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
            });
        }
    </script>
    <script>
        const barOptions = {
            series: [{
                    name: "Income",
                    color: "#31C48D",
                    data: ["1420", "1620", "1820", "1420", "1650", "2120"],
                },
                {
                    name: "Expense",
                    data: ["788", "810", "866", "788", "1100", "1200"],
                    color: "#F05252",
                }
            ],
            chart: {
                sparkline: {
                    enabled: false,
                },
                type: "bar",
                width: "100%",
                height: 400,
                toolbar: {
                    show: false,
                }
            },
            fill: {
                opacity: 1,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: "100%",
                    borderRadiusApplication: "end",
                    borderRadius: 6,
                    dataLabels: {
                        position: "top",
                    },
                },
            },
            legend: {
                show: true,
                position: "bottom",
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                shared: true,
                intersect: false,
                formatter: function(value) {
                    return "$" + value
                }
            },
            xaxis: {
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function(value) {
                        return "$" + value
                    }
                },
                categories: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                }
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -20
                },
            },
            fill: {
                opacity: 1,
            }
        }

        if (document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("bar-chart"), barOptions);
            chart.render();
        }
    </script>
</body>

</html>
