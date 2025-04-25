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
    <link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        .OCDVBC {
            max-width: 100%;
        }

        .BRCHRT {
            width: 100%;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">

                <div class="flex items-center">
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
                </div>

                <div>
                    <button id="print" class="btn btn-info btn-turqouis btn-sm rounded rounded-5 text-black" data-filename="NCA Domain Compliance Status">
                        <p class="m-0">تنزيل بصيغة بي دي إف</p>
                        <p class="m-0">Download as PDF</p>
                    </button>
                </div>

                <div class="flex items-center">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
    </section>

    <body>
        <div class="OCD" id="print-area">
            <div class="OCDVBC">
                <h3>Domain Compliance Status</h3>
                <canvas id="BRCHRT" class="BRCHRT"></canvas>
            </div>
        </div>

        <script>
            function initializeCharts() {

                const domains = {!! json_encode($domain_names) !!};

                const totalControls = {!! json_encode($countrols_count) !!};
                const implementedCount = {!! json_encode($implemented_count) !!};
                const partiallyImplementedCount = {!! json_encode($partially_implemented_count) !!};
                const notImplementedCount = {!! json_encode($not_implemented_count) !!};
                const notApplicableCount = {!! json_encode($not_applicable_count) !!};

                const barColorsBar = ["#4A90E2", "#4A90E2", "#4A90E2", "#4A90E2", "#4A90E2", "#000"];
                const barColorsBar2 = Array(4).fill('#228B22');
                const barColorsBar3 = Array(10).fill('#FF0000');
                const barColorsBar4 = Array(10).fill('#FFC107');
                const barColorsBar5 = Array(10).fill('#9E9E9E');


                const chartBar = new Chart("BRCHRT", {
                    type: "bar",
                    data: {
                        labels: domains,
                        datasets: [{
                                label: 'Total Controls',
                                data: totalControls,
                                backgroundColor: barColorsBar,
                                customData: {!! json_encode($domain_ids) !!}
                            },
                            {
                                label: 'Implemented',
                                backgroundColor: barColorsBar2,
                                data: implementedCount,
                                customData: {!! json_encode($domain_ids) !!}
                            },

                            {
                                label: 'Partially Implemented',
                                backgroundColor: barColorsBar4,
                                data: partiallyImplementedCount,
                                customData: {!! json_encode($domain_ids) !!}
                            },
                            {
                                label: 'Not Implemented',
                                backgroundColor: barColorsBar3,
                                data: notImplementedCount,
                                customData: {!! json_encode($domain_ids) !!}
                            },
                            {
                                label: 'Not Applicable',
                                backgroundColor: barColorsBar5,
                                data: notApplicableCount,
                                customData: {!! json_encode($domain_ids) !!}
                            }
                        ]
                    },
                    options: {

                        legend: {
                            display: true
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
                                var domainName = dataset.customData[dataIndex];
                                window.location.href=`/subdomain-compliance/${domainName}`
                                // window.open("/subdomain-compliance/" + domainName, '_blank');
                            }
                        }
                    }
                });
            }
            initializeCharts();
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <script src="{{asset('/js/dashboard.js')}}"></script>
    </body>
</body>

</html>
