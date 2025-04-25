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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <style>

        td a {
            color: #000 !importants;
            margin-bottom: .5em;
            display: inline-block;
        }

        th {
            white-space: nowrap;
        }

        .tablehead tr th,
        .tablebody tr td {
            padding-inline: 10px;
            padding-block: 20px;
        }

        .multi-select+.btn-group,
        .multi-select+.btn-group>button,
        .multi-select+.btn-group>ul {
            width: 100%;
            text-align: left
        }

        .dropdown-menu>li>a,
        .btn {

            white-space: normal;
        }

        .multi-select+.btn-group,
        .multi-select+.btn-group>button,
        .multi-select+.btn-group>ul {
            min-height: 46px;
        }
    </style>
</head>

<body>
    @yield('content')
</body>
