<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/11-Dashboard/1-Dashboard.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>


    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
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
            <div class="CSSOCDVBC">
                <h3>Cybersecurity Defense Compliance Status</h3>
                <canvas id="BRCHRT" class="CSSBRCHRT"></canvas>
            </div>
        </div>








        <script>
            function initializeCharts() {
                // Bar Chart
                const xValuesBar = ["Asset Management", "Identity and Access Management",
                    "Information System and Facility Protection", "Email Protection",
                    "Network Security Management", "Mobile Device Security", "Data and Information Security",
                    "Cryptography", "Backup and Recovery Management", "Vulnerability Management", "Penetration Testing",
                    "CS Event and Log Management", "CS Incident and Threat Management", "Physical Security",
                    "Web Application Security"
                ];
                const yValuesBar = [80, 30, 50, 60, 20, 90, 73, 20, 40, 80, 30, 65, 85, 45, 55, 0]
                const barColorsBar = ['#001F3F', '#002134', '#002449', '#00295E', '#003073', '#003588', '#003B9D', '#0040B2',
                    '#0045C7', '#004ADC', '#0050F1', '#005606', '#005B1B', '#006030', '#006545'
                ]


                const chartBar = new Chart("BRCHRT", {
                    type: "bar",
                    data: {
                        labels: xValuesBar,
                        datasets: [{
                            backgroundColor: barColorsBar,
                            data: yValuesBar
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
            };

            // Call the function to initialize both charts
            initializeCharts();
        </script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>


    </body>
