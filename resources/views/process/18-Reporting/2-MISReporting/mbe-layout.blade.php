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
        .filter-row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0 4em 0 0;
            margin-top: 3em;
        }

        .filter-row .col {
            width: 20%;
            padding: 0 .5em;
        }

        label {
            display: inline-block;
            font-size: inherit;
            font-weight: 400;
            line-height: inherit;
            color: #000;
        }

        .form-label {
            margin-bottom: .5rem;
            display: flex;
            justify-content: space-between
        }

        .form-select {
            display: block;
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin-bottom: 1em;
        }

        .alert.alert-error {
            background-color: tomato;
            color: #fff;
            padding: 1em;
            max-width: 300px;
            margin: auto;
            border-radius: 10px;
            text-align: center;
        }

        td a {
            color: #000;
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
    <div class="dheadersec">
        <div class="dheaderleft">
            <div class="dheadericon">
                <a href="/compliance" style="color: white">

                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="dheadertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="dheadericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="dheadertext">
                <p>إدارة بواسطة الاستثناءات

                </p>
                <p>Management by Exceptions (MBE)</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="dheaderright">
                <button type="dbutton" class="dbutton" onclick="window.history.back()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>

                
            </div>
        </div>
    </div>
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">
                <a href="{{ route('mbe.index') }}" class="{{ request()->routeIs('mbe.index') ? 'disabled' : null }}">
                    <div class="leftButton">
                        <p>حالة الضوابط</p>
                        <p>Control Status</p>
                    </div>
                </a>
                <a href="{{ route('mbe-risk.index') }}"
                    class="{{ request()->routeIs('mbe-risk.index') ? 'disabled' : null }}">
                    <div class="leftButton">
                        <p>حالة المخاطر</p>
                        <p>Risk Status</p>
                    </div>
                </a>
                <a href="{{ route('mbe-asset.index') }}"
                    class="{{ request()->routeIs('mbe-asset.index') ? 'disabled' : null }}">
                    <div class="leftButton">
                        <p>حالة الأصول </p>
                        <p>Asset Status</p>
                    </div>
                </a>
            </div>
        </div>
        <div>
            <form action="{{ url()->current() }}" method="GET">
                <div class="filter-row">
                    <div class="col">
                        <select name="asset_type[]" id="asset_type" multiple="multiple" class="multi-select">
                            @foreach ($types as $value => $label)
                                <option value="{{ $value }}"
                                    {{ is_array(request('asset_type')) && in_array($value, request('asset_type')) ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-lg btn-primary w-full">Filter</button>
                    </div>
                    <div class="col">
                        <a  href="{{ $pdfUrl }}" class="btn btn-lg btn-primary w-full">Download as PDF</a>
                    </div>
                    <div class="col">
                        <a  href="{{ $excelUrl }}" class="btn btn-lg btn-primary w-full">Download as Excel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @yield('content')

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $(document).ready(function() {
            $('#asset_type').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
