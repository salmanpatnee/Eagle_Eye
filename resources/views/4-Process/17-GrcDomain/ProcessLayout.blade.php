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
    <link rel="stylesheet" href="{{ asset('/css/4-Process/1-Process.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            letter-spacing: 1px;
            font-family: "Roboto", sans-serif !important;
        }

        section.product-detail-page {
            width: 1200px;
            margin: auto;
            box-shadow: 0px 7px 33px 3px rgba(27, 69, 70, .1);
        }

        section.product-detail-page header {
            width: auto;
            text-align: center;
        }

        section.product-detail-page article {
            padding: 0 30px 30px;
        }

        section.product-detail-page h3 {
            margin-block: 1.5em;
            border-bottom: 1px solid #ccc;
            padding-bottom: .5em;
        }

        section.product-detail-page h4 {
            margin-bottom: 1em;
        }

        section.product-detail-page article p {
            font-size: 16px;
            line-height: 1.5em;
            margin-bottom: 1em;
            text-align: justify;
        }

        section.product-detail-page ul {
            margin-left: 1em;
            line-height: 2em !important;
            max-width: 700px;
            font-size: 14px;
            line-height: 1.2em;
            margin-bottom: 1em;
        }

        section.product-detail-page ul li b {
            color: #203864;
        }

        thead tr {
            background-color: #2e74b6 !important;
            color: #fff;
        }

        tbody tr {
            background-color: #EEEEEE !important;
        }

        tbody tr {
            background-color: #EEEEEE !important;
            /* white-space: nowrap; */
        }

        /* tbody th {
            white-space: nowrap
        } */

        th {
            background-color: transparent !important;
        }

        .products-row {
            display: flex;
            gap: 20px;
        }

        .product-item {
            width: 33%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            background-color: #A1C6EF;
            color: #000;
            /* text-align: center; */
        }

        .product-item h5 {
            font-size: 20px;
        }

        .product-item span {
            font-size: 14px;
            color: blue;
            font-weight: bold;
        }

        .product-item p {
            margin-top: 1em;
            font-size: 14px !important;
        }

        .product-item span {
            font-size: 14px;
            color: blue;
            font-weight: bold;
            border-bottom: 1px solid blue;
            display: inline-block;
            width: 100%;
            margin-bottom: 1em;
        }

        section.product-detail-page .product-item ul {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            list-style-type: none;
            padding: 0;
            margin-left: 0;
        }

        th:first-child,
        th:last-child {
            border-radius: inherit;
        }

        th,
        th,
        td {
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: 0 !important;
            border-bottom: 1px solid #ddd !important;
            text-align: left;
            font-size: 16px !important;
            /* white-space: nowrap; */
        }

        th:last-child,
        td:last-child {
            text-align: left;
        }

        .video-grid {
            display: grid;
            gap: 20px;
            margin: 1em;
        }



        .video-item {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 1em;
        }

        .video-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        video {
            width: 100%;
            border-radius: 4px;
        }

        /* Two-column layout for multiple videos */
        .multiple-videos {
            grid-template-columns: 1fr;
        }
        .parasec {

margin: 0 auto !important;
}
        @media (min-width: 768px) {
            .multiple-videos {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>

<body class="profilebody">
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <a href="/home">
                    <i class='bx bx-home'></i>
                </a>
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
                <button type="button" class="button" onclick="history.back()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </div>
    <div class="bodysec">

        <div class="parasec">
            @yield('header')
        </div>
        <div class="linksec">
            @yield('boxes')
        </div>
    </div>

    <section class="product-detail-page">
        @yield('content')
    </section>
</body>

</html>
