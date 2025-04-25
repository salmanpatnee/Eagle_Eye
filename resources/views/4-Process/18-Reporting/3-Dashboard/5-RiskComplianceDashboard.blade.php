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
                <h3>Owner's Risk Status</h3>
                <canvas id="BRCHRT" class="BRCHRT"></canvas>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        <script>
            const ownerRisks = {!! json_encode($ownerRisksGraph) !!}
            const owners = ownerRisks.map(row => row.owner_name);
            const ownerIds = ownerRisks.map(row => row.owner_id);
            const totalRisks = ownerRisks.map(row => row.risk_count);
            const openRisks = ownerRisks.map(row => row.open_count);
            const closeRisks = ownerRisks.map(row => row.close_count);
            const colors = {
                BLUE: "#2196F3",
                GREEN: "#228B22",
                ORANGE: "#FFC107",
                RED: '#FF0000',
                GREY: '#9E9E9E'
            };

            new Chart("BRCHRT", {
                type: "bar",
                data: {
                    labels: owners,
                    datasets: [{
                        label: 'Total Risks',
                        backgroundColor: colors.BLUE,
                        data: totalRisks,
                        customData: ownerIds,
                    }, {
                        label: 'Open Risks',
                        backgroundColor: colors.RED,
                        data: openRisks,
                        customData: ownerIds,
                    }, {
                        label: 'Close Risks',
                        backgroundColor: colors.GREEN,
                        data: closeRisks,
                        customData: ownerIds,
                    }]
                },
                options: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: false,
                        text: ""
                    },
                    onClick: function(event, elements) {

                        if (elements && elements.length > 0) {
                            const datasetIndex = elements[0]._datasetIndex;
                            const dataIndex = elements[0]._index;
                            const dataset = this.data.datasets[datasetIndex];
                            const ownerId = dataset.customData[dataIndex];

                            window.open("/risk-owner/" + ownerId, '_blank');
                        }
                    }
                }
            });
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>



    </body>
</body>

</html>
