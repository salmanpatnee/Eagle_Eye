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
        .tablearea td:nth-child(2) {
            white-space: initial;
        }

        small {
            width: 300px;
            display: inline-block;
            margin-top: .5em;
        }

        ol,
        ul {
            padding-left: 1rem;
        }
    </style>
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
                    مؤشرات الأداء الرئيسية المتاحة مع المراجع</p>
                <p>Available KPIs with References</p>

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
            <h3>مؤشرات الأداء الرئيسية المتاحة مع المراجع</h3>
            <h3>Available KPIs with References</h3>
            <h3>{{ $category->category_name }}</h3>
        </div>

        <form action="{{ route('kpi-standards-report.show', $category->category_id) }}" class="mt-4">
            <div class="row">
                <div class="col-4"></div>
                <div class="col">
                    <label class="form-label mb-0" for="bestPractice">
                        <p>Best Practices</p>
                        <p> أفضل الممارسات</p>
                    </label>
                    <select class="form-select" name="bestPractice" id="bestPractice" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($bestPractices as $bestPractice)
                            <option value="{{ $bestPractice->best_practices_id }}"
                                {{ request('bestPractice') == $bestPractice->best_practices_id ? 'selected' : null }}>
                                {{ $bestPractice->best_practices_id }} </option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col">
                    <label class="form-label mb-0" for="category">
                        <p>Categories</p>
                        <p> الفئة</p>
                    </label>
                    <select class="form-select" name="kpiCategory" id="kpiCategory" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($kpiCategories as $kpiCategory)
                            <option value="{{ $kpiCategory->category_id }}"
                                @if ($kpiCategory->category_id == request('kpiCategory')) selected @endif>
                                {{ $kpiCategory->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}


                <div class="col-4"></div>
            </div>
        </form>
    </div>
    <div class="herosec bg-light" style="border-top:1px solid #ccc">
        {{-- <h3 class="text-center">{{ $category->category_name }}</h3> --}}
        <h4 class="mb-4 text-center">KPI Recommendation</h4>
        @if (count($category->recommededPriorites))

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">KPI ID</th>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">KPI Name</th>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">KPI Value</th>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">Category</th>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">Best Practice
                            </th>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">Reference</th>
                            <th style="background-color: #203864; white-space: nowrap" class="text-light">Remarks/Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->recommededPriorites as $standard)
                            <tr class="table-info">
                                <td style="white-space: nowrap">{{ $standard->kpi_id }}</td>
                                <td style="white-space: nowrap">{{ $standard->kpi_name }}</td>
                                <td style="white-space: nowrap">{!! html_entity_decode($standard?->kpi_value) !!}</td>
                                <td style="white-space: nowrap">{{ $standard->category->category_name }}</td>
                                <td style="white-space: nowrap">{{ $standard->bestPractice->best_practices_name }}</td>
                                <td style="white-space: nowrap">{{ $standard->reference }}</td>
                                <td style="white-space: nowrap">{!! html_entity_decode($standard?->remarks) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">No recommendations.</p>
        @endif


    </div>
    @if (count($category->standardPriorities))

        <div class="tablearea">
            <table class="table">
                <thead class="tablehead">

                    <tr>
                        <th colspan="7" class="text-center">
                            Other KPIs References
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <p>KPI ID</p>
                        </th>
                        <th>
                            <p>KPI Name</p>
                        </th>
                        <th>
                            <p>KPI Value</p>
                        </th>
                        <th>
                            <p>Category</p>
                        </th>

                        <th>
                            <p>Best Practice</p>
                        </th>
                        <th>
                            <p>Reference</p>
                        </th>
                        <th>
                            <p>Remarks/Comments</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="tablebody">
                    @forelse ($category->standardPriorities as $standard)
                        @if ($standard->priority !== 1)
                            <tr class="table-info">
                                <td style="white-space: nowrap">{{ $standard->kpi_id }}</td>
                                <td style="width: 230px">{{ $standard->kpi_name }}</td>
                                <td>{!! html_entity_decode($standard?->kpi_value) !!}</td>
                                <td>{{ $standard->category->category_name }}</td>
                                <td>{{ $standard->bestPractice->best_practices_name }}</td>
                                <td style="white-space: nowrap">{{ $standard->reference }}</td>
                                <td>{!! html_entity_decode($standard?->remarks) !!}</td>
                            </tr>
                        @endif
                    @empty
                        <div class="alert alert-error">
                            <p>No results were found.</p>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
