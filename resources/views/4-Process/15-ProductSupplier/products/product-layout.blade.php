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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-MainPageHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/1-Process.css') }}">
    <style>
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
            border-bottom: 1px solid #203864;
            padding: .5em;
            color: #fff;
            background-color: #203864;
            border-radius: 6px;
        }

        section.product-detail-page h4 {
            margin-bottom: 1em;
        }

        section.product-detail-page article p {
            font-size: 16px;
            line-height: 1.5em;
            margin-bottom: 1em;
        }

        section.product-detail-page ul,
        section.product-detail-page ol {
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
            background-color: #000;
            color: #fff;
            white-space: nowrap;
        }

        tbody tr {
            background-color: #EEEEEE;
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

        th:last-child,
        td:last-child {
            text-align: inherit;
        }

        .background {
            text-align: justify;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/vciso">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Products</p>
            </div>
            <div class="d-flex align-items-center gap-3">
                @include('partials.roles')
                <a href="/product">
                    <button class="RightButton">
                        <p class="RightButtonArbTxt">ارجع</p>
                        <p class="RightButtonTxt">Back</p>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <div style="margin-top: 50px"></div>
    <section class="product-detail-page">
        <header class="text-center" style="background: black;">
            <h1>
                @yield('heading')
            </h1>
        </header>
        <article>
            <h3>1. Technology Background</h3>
            <div class="background">
                @yield('background')
            </div>
            @yield('infographic')
            @yield('content')
            <h3>Other Resources</h3>
            @yield('resources', 'None')
        </article>
    </section>
</body>

</html>
