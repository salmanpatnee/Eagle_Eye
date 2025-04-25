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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('/css/report.css') }}"> --}}
    <style>
        body {
            font-family: "Roboto", sans-serif;
            letter-spacing: 1px;
        }

        .bg-blue-gradient {
            background: linear-gradient(to right, #203864, #2e74b6);
        }

        table td {
            background-color: #eee !important;
        }

        .table-theme-secondary th {
            background-color: #2E74B6;
            color: white;
        }

        .table-theme-secondary th,
        .table-theme-secondary td {
            font-size: 12px;
            font-weight: 700;
        }

        a {
            text-decoration: none;
            color: initial;
        }

        .fs-xs {
            font-size: 12px;
        }

        .btn-theme {
            color: white;
            background-color: #203864;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 500
        }

        .btn-theme:hover {
            background-color: #2E74B6;
            color: white;
        }

        .btn-theme:disabled {
            background-color: #203864;
            color: white;
            opacity: 30%;
        }

        .not-allow {
            pointer-events: none;
            cursor: not-allowed;
            opacity: .5;
        }

        .table-responsive {
            max-height: 70vh;
            overflow-y: auto;
            border: none;
        }

        .table-responsive thead {
            position: sticky;
            top: 0;
            z-index: 1;
            /* background-color: #fff; */
            /* Ensure the header background is visible */
            /* Ensure the header is above the rows */
            /* border-bottom: 2px solid #ddd; */
            /* Optional: add border to the header */
            /* border: none; */
        }

        @media (min-width: 1024px) and (max-width: 1179px) {
            .btn-theme {

                font-size: 12px;
            }
        }
    </style>
</head>

<body class="bg-secondary-subtle">
    <header class="bg-blue-gradient py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <div class="align-content-center flex-shrink-0">
                            <a href="/compliance">
                                <i class="fa fa-home fa-2x text-white" aria-hidden="true"></i>
                            </a>

                        </div>
                        <div class="flex-grow-1 ms-3 text-white fw-bold">
                            <p class="mb-0">العمليات</p>
                            <p class="mb-0">Processes</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            @include('partials.roles')
                            <div class="col justify-content-end d-flex">
                                <button type="button" class="btn btn-dark px-5 fs-xs" onclick="goBack()">
                                    <p class="mb-0">للخلف </p>
                                    <p class="mb-0">Back</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    @yield('content')
    <footer class="py-5">

    </footer>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
