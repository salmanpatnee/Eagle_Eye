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

        .headersec {
            display: flex;
            justify-content: space-between;
            background: linear-gradient(to right, #203864, #2e74b6);
            padding: 20px 0px 10px 0px;
            margin: 0px 0px 50px 0px;
            width: 100%;
            height: 80px;
            z-index: 1;
        }

        .headerleft {
            display: flex;
            justify-content: left;
            margin: 0px 0px 0px 50px;
            color: white;
            font-weight: 800;
            align-items: center;

        }

        .headericon {
            font-size: 30px;
        }

        .headertext {
            font-size: 18px;
            line-height: 18px;
        }

        .headericon,
        .headertext {
            margin-right: 10px;
        }

        .button {
            background-color: black;
            color: white;
            padding: 0px 50px 0px 50px;
            margin: 0px 56px 0px 0px;
            border: solid 1px black;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 12px;
            width: auto;
            height: 50px;
        }

        .button:hover {
            background-color: white;
            color: black;
        }

        table {
            /* border: 1px solid #ccc; */
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        table td {
            font-size: 12px;
            word-break: break-word;
        }

        .filter-row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0 4em 0 0;
            margin-top: 1em;
        }

        .filter-row .col {
            width: 25%;
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

        .IndiTable {
            padding: 0px 2em 50px 2em;
            margin-left: 0;
            max-width: 100%;
            margin: auto;
        }

        .ListTable td:nth-child(3) {
            white-space: normal;
        }
        .tablearea td:nth-child(2) {
    white-space: normal;
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
                <p>الضوابط في البحث الذكي</p>
                
                <p>Control Smart Search</p>
            </div>
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
    <div class="herosec">

        <div>
            <form action="{{ route('control.smart.search.index') }}">
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="control_name">
                            <p>Controls</p>
                            <p> الضوابط</p>
                        </label>
                        <select class="form-select" name="control_name" id="control_name" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($controlIds as $controlName)
                                <option value="{{ $controlName }}"
                                    {{ $controlName == request('control_name') ? 'selected' : null }}>
                                    {{ $controlName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="classification">
                            <p>Classification</p>
                            <p>التصنيف</p>
                        </label>
                        <select class="form-select" name="classification" id="classification"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($classifications as $classification)
                                <option value="{{ $classification->classification_id }}"
                                    @if ($classification->classification_id == request('classification')) selected @endif>
                                    {{ $classification->classification_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="relation">
                            <p>Relationships</p>
                            <p>علاقة</p>
                        </label>
                        @php
                            $relations = [
                                'control_critical_asset' => 'Control Critical Asset',
                                'control_cloud' => 'Control Cloud',
                                'control_telework' => 'Control Telework',
                                'control_social_media' => 'Control Social Media',
                                'control_data_privicy' => 'Control Data Privicy',
                                'control_pii' => 'Control pii',
                                'control_pci_dss' => 'Control Pci Dss',
                                'control_e_commerce' => 'Control E-Commerce',
                                'control_infrastructure' => 'Control Infrastructure',
                                'control_application' => 'Control Application',
                                'control_hr' => 'Control HR',
                                'control_physical_security' => 'Control Physical Security',
                                'control_operational' => 'Control Third Party',
                                'control_payment' => 'Control Payment',
                                'control_e_banking' => 'Control E-banking',
                            ];
                        @endphp
                        <select class="form-select" name="relation" id="relation" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($relations as $key => $value)
                                <option value="{{ $key }}" @if ($key == request('relation')) selected @endif>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="category">
                            <p>Categories</p>
                            <p>فئة</p>
                        </label>
                        <select class="form-select" name="category" id="category" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}"
                                    @if ($category->category_id == request('category')) selected @endif>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="type">
                            <p>Control Types</p>
                            <p>نوع الضابط</p>
                        </label>
                        <select class="form-select" name="type" id="type" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->control_type_id }}"
                                    @if ($type->control_type_id == request('type')) selected @endif>
                                    {{ $type->control_type_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
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
                    </div>
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
                </div>
            </form>
        </div>
    </div>
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>S.No</th>
                        <th>
                            <p>المكون الفرعي</p>
                            <p>Sub-Domain</p>
                        </th>
                        <th>
                            <p>المكون الأساسي</p>
                            <p>Domain</p>
                        </th>
                        <th>
                            <p>أفضل الممارسات</p>
                            <p>Best Practice</p>
                        </th>
                        <th>
                            <p>نوع الضابط</p>
                            <p>Control Type</p>
                        </th>
                        <th>
                            <p>فئة</p>
                            <p>Category</p>
                        </th>
                        <th>
                            <p>التصنيف</p>
                            <p>Classification</p>
                        </th>
                        <th>
                            <p>رمز الضوابط</p>
                            <p>Control</p>
                        </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($controls as $control)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $control->sub_domain_name }}</td>
                    <td>{{ $control->main_domain_name }}</td>
                    <td>{{ $control->best_practices_name }}</td>
                    <td>{{ $control->control_type_name }}</td>
                    <td>{{ $control->category_name }}</td>
                    <td>{{ $control->classification_name }}</td>
                    <td>{{ $control->control_id }} - {{ $control->control_name }}</td>
                    {{-- <td>{{ $control->control_name }}</td> --}}
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
