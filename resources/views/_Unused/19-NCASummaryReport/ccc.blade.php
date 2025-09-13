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

        .tablehead tr th,  tr td {
            /* white-space: nowrap; */
            line-height: 1.2;
            text-align: center;
        }
    </style>
</head>

<body>
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
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="dheadertext">
                <p>تقرير ملخص</p>
                <p>NCA CCC {{$controlType == 'csp' ? '(CSP)' : '(CST)'}} Summary Report</p>
            </div>
        </div>
        <div class="dheaderright">

            <button type="dbutton" class="dbutton" onclick="window.location.href='/compliance'">
                <p>للخلف</p>
                <p>Back</p>
            </button>
        </div>
    </div>
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">

                <a href="{{ route('regulatory-reports.create') }}?best_practice=NCA-CCC-2020">
                    <div class="leftButton">
                        <p>تقرير مفصل</p>
                        <p>Detailed Report</p>
                    </div>
                </a>
            </div>
        </div>
        <div>
            <form action="{{ route('ccc-regulatory-summary.show') }}?controlAssessmentId={{$controlAssessmentId}}">
                <input type="hidden" name="controlAssessmentId" value="{{$controlAssessmentId}}">
                <input type="hidden" name="cloudControlType" value="{{$controlType}}">
                <div class="filter-row">

                    <div class="col">
                        <label class="form-label" for="domain">
                            <p>Main Domains</p>
                            <p>المكون الأساسي</p>
                        </label>
                        <select class="form-select" name="domain" id="domain" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($domains as $domain)
                                <option value="{{ $domain->main_domain_id }}"
                                    @if ($domain->main_domain_id == request('domain')) selected @endif>
                                    {{ $domain->main_domain_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="subdomain">
                            <p>Sub Domains</p>
                            <p>المكون الفرعي</p>
                        </label>
                        <select class="form-select" name="subdomain" id="subdomain" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($subDomains as $subDomain)
                                <option value="{{ $subDomain->sub_domain_id }}"
                                    @if ($subDomain->sub_domain_id == request('subdomain')) selected @endif>
                                   {{ $subDomain->sub_domain_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="control_name">
                            <p>Controls</p>
                            <p>الضوابط</p>
                        </label>
                        <select class="form-select" name="control_id" id="control_id" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($controls as $control)
                                <option value="{{ $control->control_id }}" @if ($control->control_id == request('control_id')) selected @endif>
                                    {{ $control->control_id }} - {{ $control->control_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="owner">
                            <p>Owners</p>
                            <p>مالك</p>
                        </label>
                        <select class="form-select" name="owner" id="owner" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->owner_role_id }}"
                                    @if ($owner->owner_role_id == request('owner')) selected @endif>
                                   {{ $owner->owner_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col">
                        <label class="form-label" for="status">
                            <p>Status</p>
                            <p>حالة العثور</p>
                        </label>
                        <select class="form-select" name="status" id="status" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="Implemented" {{old('status', request('status')) == 'Implemented' ? 'selected' : null}}>Implemented</option>
                            <option value="Not Implemented" {{old('status', request('status')) == 'Not Implemented' ? 'selected' : null}}>Not Implemented</option>
                            <option value="Partially Implemented" {{old('status', request('status')) == 'Partially Implemented' ? 'selected' : null}}>Partially Implemented</option>
                            <option value="Not Applicable" {{old('status', request('status')) == 'Not Applicable' ? 'selected' : null}}>Not Applicable</option>
                        </select>
                    </div>
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
                    <th style="column-width: 200px;">
                        <p>المكون الأساسي</p>
                        <p>Domain</p>
                    </th>
                    <th>
                        <p>المكون الفرعي</p>
                        <p>Sub-Domain</p>
                    </th>
                    <th>
                        <p>الضوابط</p>
                        <p>Control</p>
                    </th>
                    <th>
                        <p> مالك الضوابط</p>
                        <p>Control Owner</p>
                    </th>
                    <th>
                        <p>حالة العثور على</p>
                        <p>Implementation Status</p>
                    </th>
                    <th>
                        <p>وصف العثور على</p>
                        <p>Control Assessment</p>
                    </th>
                    <th>
                        <p>تاريخ استحقاق إجراءات التصحيح</p>
                        <p>Expected Compliance Date
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($report as $row)
                    <tr>
                        <td>{{ $loop->index + 1}}</td>
                        <td>{{$row->domain}}</td>
                        <td>{{$row->subdomain}}</td>
                        <td>{{$row->control}}</td>
                        <td>{{$row->owner}}</td>
                        <td>{{$row->status}}</td>
                        <td>
                            @if ($row->control_finding_id)
                                <a href="{{route('control-assessment-findings.show', $row->control_finding_id)}}" target="_blank">
                                    {{$row->control_finding_id}} - {{$row->finding_name}}</td>
                                </a>
                            @endif
                        <td>{{$row->corrective_action_due_date}}</td>
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
