<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <style>
        body {
            background-image: url("/Images/7-GrcBackgrounImg.jpg");
            background-size: cover;

        }

        .profilebody .bodysec {
            margin-bottom: 3em;
            padding: 3em 0;
        }
    </style>
</head>

<body class="profilebody">
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <i class='bx bx-home'></i>
            </div>
            <div class="headertext">
                <p>العمليات</p>
                <p>Process</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p>موارد الحوكمة والمخاطر والامتثال</p>
                <p>GRC Domain Resources</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="headerright">
                <button type="button" class="button" onclick="window.location.href=('/compliance')">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </div>

    <div class="bodysec">
        @yield('content')
    </div>

    <script>
        document.getElementById('VideoExplanation').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl = '#';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('ImplementationDocs').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/CISO Forklift 1/1. CODE - 1-1.STRG-5-STRGY-ART-001 - Cybersecurity Strategy and Roadmap_v5.0.pptx';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('ImplementationPdf').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/CISO Forklift 1/1. CODE - 1-1.STRG-5-STRGY-ART-001 - Cybersecurity Strategy and Roadmap_v5.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('Checklist').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl = '#';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('Glossary').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl = '#';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
    </script>
</body>

</html>
