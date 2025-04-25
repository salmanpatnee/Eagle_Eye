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
    <div class="dheadersec">
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
                <p>تقرير معالجة المخاطر</p>
                <p>Control Vs Risk</p>
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

        <div class="herosecleft" style="margin-bottom: 2em;">
            <div class="cveButton">
                <a href="{{route('control-risk.index')}}" class="disabled">
                    <div class="rightButton ">
                        <p>تقرير معالجة المخاطر</p>
                        <p>Control Vs Risk</p>
                    </div>
                </a>

                <a href="{{route('risk-treatment.index')}}">
                    <div class="rightButton">
                        <p>الضوابط مقابل الأدلة</p>
                        <p>Risk vs Control</p>
                    </div>
                </a>
            </div>
        </div>

        <form action="{{ route('control-risk.index') }}">
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <label class="form-label" for="domain">
                        <p>Controls</p>
                        <p>الضوابط</p>
                    </label>
                    <select class="form-select" name="control" id="control" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($controls as $control)
                            <option value="{{ $control }}"
                                @if ($control == request('control')) selected @endif>
                                {{ $control }}
                            </option>
                        @endforeach
                    </select>
                </div>
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
                
                
                <div class="col-2"></div>
            </div>
        </form>

        <div class="herosecleft">
            <h3>تقرير معالجة المخاطر</h3>
            <h3>Control Vs Risk</h3>
        </div>
    </div>
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رمز المخاطر</p>
                        <p>Control ID</p>
                    </th>
                    <th>
                        <p>اسم المخاطر</p>
                        <p>Control Name</p>
                    </th>
                    <th>
                        <p>اسم الضوابط</p>
                        <p>Risk Name</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($riskTreatments as $riskTreatment)
                    <tr>
                        <td>
                            <a href="{{ route('controlmaster.show', $riskTreatment->control_id) }}" target="_blank"
                                class="text-dark">
                                {{ $riskTreatment->control_id }}
                            </a>
                        </td>
                        <td>{{ $riskTreatment->control_name }} </td>
                        <td>
                            @foreach ($riskTreatment->risks as $risk)
                                <p>
                                    <a href="{{ route('riskmaster.show', $risk->risk_id) }}" target="_blank"
                                        class="text-dark">
                                        {{ $risk->risk_id }} - {{ $risk->risk_name }}
                                    </a>
                                </p>
                            @endforeach
                        </td>
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
