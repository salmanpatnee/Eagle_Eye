<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool" />
    <meta name="description" content="Zain Cloud GRC Tool" />
    <!-- Boxicons Icons-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/11-Dashboard/1-Dashboard.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        .OCDVBC {
            max-width: 100% !important;
        }

        canvas#BRCHRT {
            margin: auto;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">
                <a href="/compliance">
                    <i class="bx bx-home"></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class="bx bx-right-arrow-alt"></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">لوحة التحكم بالامتثال الشامل</p>
                    <p class="EngTxt">Overall Compliance Dashboard</p>
                </div>
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
    </section>

    <body>
        <div class="OCD">
            <div class="OCDVBC">
                <h3>NCA Domain Compliance Status</h3>
                <canvas id="BRCHRT" class="BRCHRT" width="100%"></canvas>
            </div>
            <!--<div class="OCDBRCS">-->
            <!--    <div class="OCDBRCONE">-->
            <!--        <h3>Overall Compliance Status</h3>-->
            <!--        <canvas id="DONTCHRT" class="DONTCHRT"></canvas>-->
            <!--    </div>-->
            <!--    <div class="OCDBRCTWO">-->
            <!--        <h3>NCA Domain Compliance Status</h3>-->
            <!--        <canvas id="PIRCHRT" class="DONTCHRT"></canvas>-->
            <!--    </div>-->
            <!--</div>-->
        </div>

        <script>
            function initializeCharts() {
                // Bar Chart
                // const xValuesBar = ["CS Governance", "CS Defense", "CS Resilience", "Third Party & Cloud Computing",
                //     "ICS Cybersecurity"
                // ];
                const xValuesBar = {!! json_encode($best_practices_name) !!};
                const yValuesBar = {!! json_encode($domain_count) !!};

                const barColorsBar = ['#001F3F', '#003366', '#004080', '#00509E', '#0066CC', '#0477ea'];

                const chartBar = new Chart("BRCHRT", {
                    type: "bar",
                    data: {
                        labels: xValuesBar,
                        datasets: [{
                            backgroundColor: barColorsBar,
                            data: yValuesBar,
                            customData: {!! json_encode($best_practices_name) !!}
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false,
                            text: "NCA-ECC"
                        },
                        onClick: function(event, elements) {
                            if (elements && elements.length > 0) {
                                var datasetIndex = elements[0]._datasetIndex;
                                var dataIndex = elements[0]._index;
                                var dataset = this.data.datasets[datasetIndex];
                                // Access custom data associated with the clicked data point
                                var bestPracticeName = dataset.customData[dataIndex];
                                window.open("/domain-controller-dashboard/" + bestPracticeName, '_blank');
                            }

                            // if (elements.length > 0) {
                            //     const index = elements[0]._index;
                            //     const urls = ["/cs-strategy-dashboard", "/cs-defense-dashboard",
                            //         "/cs-resilience-dashboard", "/cs-third-party-dashboard",
                            //         "/cs-ics-dashboard"
                            //     ];
                            //     window.open(urls[index], '_blank');
                            // }
                        }
                    }
                });

                // Doughnut Chart
                const xValuesDoughnut = ["Compliance", "Non-Compliance"];
                const yValuesDoughnut = [80, 20];
                const barColorsDoughnut = ['#001F3F', '#0066CC'];

                const chartDoughnut = new Chart("DONTCHRT", {
                    type: "doughnut",
                    data: {
                        labels: xValuesDoughnut,
                        datasets: [{
                            backgroundColor: barColorsDoughnut,
                            data: yValuesDoughnut
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: false,
                            text: "NCA-ECC"
                        },
                    }
                });
            }


            const xValuesBarPieChrt = ["CS Governance", "CS Defense", "CS Resilience", "Third Party & Cloud Computing",
                "ICS Cybersecurity"
            ];
            const yValuesBarPieChart = [80, 50, 96, 60, 40, 0];
            const barColorsPieChart = ['#001F3F', '#003366', '#004080', '#00509E', '#0066CC'];

            const chartBar = new Chart("PIRCHRT", {
                type: "pie",
                data: {
                    labels: xValuesBarPieChrt,
                    datasets: [{
                        backgroundColor: barColorsPieChart,
                        data: yValuesBarPieChart
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false,
                        text: "NCA-ECC"
                    },
                }
            });

            // Call the function to initialize both charts
            initializeCharts();
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</body>

</html>
