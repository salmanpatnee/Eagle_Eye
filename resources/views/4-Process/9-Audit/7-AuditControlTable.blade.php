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
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.5;
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
    </style>
</head>

<body>
    <div class="dheadersec">
        <div class="justify-content-between w-100 d-flex align-items-center">
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
                    <i class='bx bx-right-arrow-alt'></i>
                </div>
                <div class="dheadertext">
                    <p>
                        بنتائج مراجعة المتعلقة الضوابط</p>
                    <p>Audit vs Controls</p>
                </div>
            </div>
            <div>
                <a href="{{ route('audit-vs-control') }}?pdf=1" class="btn-report btn btn-primary btn-sm">
                    <p>تنزيل بصيغة بي دي إف</p>
                    Download as PDF
                </a>
            </div>
            <div class="d-flex align-items-center gap-3">
                @include('partials.roles')
                <div class="dheaderright">

                    <button type="dbutton" class="dbutton" onclick="window.location.href='/compliance'">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">
                <a href="{{ route('control-vs-audit') }}">
                    <div class="leftButton">
                        <p>
                            الضوابط المتعلقة بنتائج مراجعة</p>
                        <p>Control vs Audit </p>
                    </div>
                </a>
                <a href="{{ route('audit-vs-control') }}" class="disabled">
                    <div class="leftButton">
                        <p>
                            بنتائج مراجعة المتعلقة الضوابط</p>
                        <p>Audit vs Control</p>
                    </div>
                </a>
            </div>
        </div>
        <div>
            <form action="{{ route('audit-vs-control') }}">
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="audit_finding_id">
                            <p>Findings</p>
                        </label>
                        <select class="form-select" name="audit_finding_id" id="audit_finding_id"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($findings as $finding)
                                <option value="{{ $finding->audit_finding_id }}"
                                    @if ($finding->audit_finding_id == request('audit_finding_id')) selected @endif>
                                    {{ $finding->audit_finding_id }} - {{ $finding->audit_finding_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="control_name">
                            <p>Controls</p>
                        </label>
                        <select class="form-select" name="control_id" id="control_id" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($controls as $control)
                                <option value="{{ $control->control_id }}"
                                    @if ($control->control_id == request('control_id')) selected @endif>
                                    {{ $control->control_id }} - {{ $control->control_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="col">
                        <label class="form-label" for="practice">
                            <p>Best Practices</p>
                            <p>أفضل الممارسات</p>
                        </label>
                        <select class="form-select" name="practice" id="practice" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($practices as $practice)
                                <option value="{{ $practice->best_practices_id }}"
                                    @if ($practice->best_practices_id == request('practice')) selected @endif>
                                    {{ $practice->best_practices_name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رقم</p>
                        <p>S.No</p>
                    </th>
                    <th>
                        <p>رمز الضوابط</p>
                        <p>Audit ID</p>
                    </th>
                    <th>
                        <p>اسم الضوابط</p>
                        <p>Audit Name</p>
                    </th>
                    <th>
                        <p>الضوابط</p>
                        <p>Controls</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($auditFindingsWithControls as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('audit-findings.show', $row->audit_finding_id) }}">
                                {{ $row->audit_finding_id }}
                            </a>
                        </td>
                        <td>
                            {{ $row->audit_finding_name }}
                        </td>
                        <td>
                            @foreach ($row->Controls as $control)
                                <p><a href="{{ route('controlmaster.show', $control->control_id) }}">{{ $control->control_id }}
                                        - {{ $control->control_name }}</a> </p>
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
