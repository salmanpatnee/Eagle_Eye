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
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800;900&display=swap");

        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ asset('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        body {
            /* font-family: 'DejaVu Sans', sans-serif; */
            /* direction: rtl; */
            background: #fff;
            font-family: "Roboto", sans-serif;
            font-size: 12px;
            margin: 0;
        }


        .arabic-text {
            font-family: "Noto Sans Arabic", sans-serif;
        }

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
    @if ($organizationData)
        <div class="report-header" style="margin-bottom: 30px; text-align: center">
            @if ($organizationData)
                @if ($organizationData->organization_logo != null)
                    <img src="{{ asset('storage/' . $organizationData?->organization_logo) }}" alt="Organization Logo"
                        width="200" class="mb-4">
                @endif
                <h2 style="font-weight: bold; font-size: 18px; color: #000; margin-top:0;" class="arabic-text mt-0">
                    {{ $organizationData->organization_name_arabic }}</h2>
                <h2 style="font-weight: bold; font-size: 18px; color: #000; margin-top:0; font-family: 'Roboto'"
                    class="mt-0">
                    {{ $organizationData->organization_name_english }}</h2>
                <h2 style="font-weight: bold; font-size: 18px; color: #000; margin-top:0; font-family: 'Roboto'"
                    class="mt-0">Management Information System Reports - {{ $title }}
                </h2>
                <h2 style="font-weight: bold; font-size: 18px; color: #000; margin-top:0; font-family: 'Roboto' margin-bottom:30px;"
                    class="mt-0">
                    {{ \Carbon\Carbon::now()->format('F j, Y') }}</h2>
            @endif
        </div>
    @endif
    @yield('content')
</body>
