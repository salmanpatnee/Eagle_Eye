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
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
</head>

<body style="background-color: #f6f6f6">
    <div class="dheadersec ">
        <div class="dheaderleft">
            <div class="dheadericon">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="dheadertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="dheadericon">
                <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div class="dheadertext">
                <p>
                    قياسي مؤشرات الأداء الرئيسية</p>
                <p>KPI Standards Report</p>
            </div>

        </div>

        <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="dheaderright">
                <button type="dbutton" class="dbutton" onclick="goBack()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>

    </div>
    <div class="herosec">

        {{-- <div class="herosecleft" style="margin-bottom: 2em;">
            <div class="cveButton">

                <a href="{{ route('control-risk.index') }}">
                    <div class="rightButton">
                        <p>الضوابط مقابل الأدلة</p>
                        <p>Control vs Risk</p>
                    </div>
                </a>

                <a href="{{ route('control-risk.index') }}" class="disabled">
                    <div class="rightButton">
                        <p>الضوابط مقابل الأدلة</p>
                        <p>Risk vs Control</p>
                    </div>
                </a>

            </div>
        </div>

        <form action="{{ route('risk-treatment.index') }}">
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <label class="form-label" for="practice">
                        <p>Risks</p>
                        <p> المخاطر</p>
                    </label>
                    <select class="form-select" name="risk" id="risk" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($risks as $risk)
                            <option value="{{ $risk->risk_id }}" @if ($risk->risk_id == request('risk')) selected @endif>
                                {{ $risk->risk_id }} - {{ $risk->risk_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label class="form-label" for="domain">
                        <p>Controls</p>
                        <p>الضوابط</p>
                    </label>
                    <select class="form-select" name="control" id="control" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($controls as $control)
                            <option value="{{ $control }}" @if ($control == request('control')) selected @endif>
                                {{ $control }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="col-2"></div>
            </div>
        </form> --}}

        <div class="herosecleft">
            <h3>قياسي مؤشرات الأداء الرئيسية</h3>
            <h3>KPI Standards Report</h3>
        </div>
    </div>
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رمز</p>
                        <p>S.No</p>
                    </th>
                    <th>
                        <p>فئة مؤشرات الأداء الرئيسية</p>
                        <p>KPI Categories</p>
                    </th>
                    <th>
                        <p>عدد المعايير</p>
                        <p>Standards Count</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($report as $row)
                    <tr>
                        <td class="text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            <a href="{{ route('kpi-standards-report.show', $row->kpi_id) }}" class="text-dark">
                                {{ $row->kpi_name }}
                            </a>
                        </td>
                        <td>{{ $row->standards_count }} </td>
                    </tr>
                @empty
                    <div class="alert alert-error">
                        <p>No results were found.</p>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
