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

        /* label {
            display: inline-block;
            font-size: 0.9rem;
            font-weight: 700;
            line-height: 0.5;
            color: #000;
        } */
        label {
            display: inline-block;
            font-size: inherit;
            font-weight: 400;
            line-height: inherit;
            color: #000;
        }

        .form-label {
            margin-bottom: 0px;
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

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {

            vertical-align: text-top;
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
        .asmtablearea {
            top: 450px;
        }
        .herosec {
    
    padding-block: 50px;
}
    </style>
</head>

<body>
    <div class="fixposition">
        <div class="dheadersec">
            <div class="dheaderleft">
                <div class="dheadericon">
                    <a href="/home" style="color: white">
                        <i class='bx bx-home'></i>
                    </a>
                </div>
                <div class="dheadertext">
                    <p>العمليات</p>
                    <p>Processes</p>
                </div>
                <div class="dheadericon" >
                    <i class='bx bx-right-arrow-alt'></i>
                </div>
                <div class="dheadertext">
                    <p>موارد الخبراء</p>
                    <p>Expert Resources</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="dheaderright">
                <button type="dbutton" class="dbutton" onclick="window.location.href=('/vciso')">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
            </div>
        </div>
        <div class="herosec">
            <div class="astherosecleft">
                <p>خبراء ذوو صلة بالحوكمة والمخاطر والامتثال</p>
                <p>Experts Related to Governance, Risk, & Compliance</p>
            </div>
            <form action="{{ route('hr.expert') }}" method="GET">
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="nationality">
                            <p>Nationality</p>
                        </label>
                        <select name="nationality[]" id="nationality" multiple="multiple" class="multi-select">
                            <option value="">All</option>
                            @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality }}"
                                    {{ is_array(request('nationality')) && in_array($nationality, request('nationality')) ? 'selected' : '' }}>
                                    {{ $nationality }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col">
                        <label class="form-label" for="industry_name">
                            <p>Industry Name</p>
                        </label>
                        <select name="industry_name[]" multiple="multiple" id="industry_name" class="multi-select">
                            <option value="">All</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->industry_id }}"
                                    {{ is_array(request('industry_name')) && in_array($industry->industry_id, request('industry_name')) ? 'selected' : '' }}>
                                    {{ $industry->industry_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="organization_name">
                            <p>Organization</p>
                        </label>
                        <select class="multi-select" name="organization_name[]" id="organization_name" multiple>
                            <option value="">All</option>
                            @foreach ($organizations as $organization)
                                <option value="{{ $organization->organization_id }}"
                                    {{ is_array(request('organization_name')) && in_array($organization->organization_id, request('organization_name')) ? 'selected' : '' }}>
                                    {{ $organization->organization_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                  
                </div>
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="certification_title">
                            <p>Certification</p>
                        </label>
                        <select class="multi-select" multiple name="certification_title[]" id="certification_title">
                            <option value="">All</option>
                            @foreach ($certifications as $certification)
                                <option value="{{ $certification->certification_id }}"
                                    {{ is_array(request('certification_title')) && in_array($certification->certification_id, request('certification_title')) ? 'selected' : '' }}>
                                    {{ $certification->certification_id }} - {{ $certification->certification_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="expertise_title">
                            <p>Expertise</p>
                        </label>
                        <select class="multi-select" multiple name="expertise_title[]" id="expertise_title">
                            <option value="">All</option>
                            @foreach ($experties as $experty)
                                <option value="{{ $experty->expertise_id }}"
                                    {{ is_array(request('expertise_title')) && in_array($experty->expertise_id, request('expertise_title')) ? 'selected' : '' }}>
                                    {{ $experty->expertise_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="designation">
                            <p>Designation</p>
                        </label>
                        <select class="multi-select" multiple name="designation[]" id="designation">
                            <option value="">All</option>
                            @foreach ($designations as $designation)
                                <option value="{{ $designation }}"
                                    {{ is_array(request('designation')) && in_array(urldecode($designation), request('designation')) ? 'selected' : '' }}>
                                    {{ $designation }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                  
                </div>
                <div class="filter-row">
                    <div class="col text-center">
                        <button class="btn btn-lg btn-primary w-full">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="asmtablearea">
        <table class="table-response">
            <thead class="tablehead">
                <tr>
                    <th style="width: 100px;">
                        <p>S.No</p>
                    </th>
                    <th style="width: 200px;">
                        <p>Expert ID</p>
                    </th>
                    <th style="width: 200px;">
                        <p>Expert Name</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Nationality</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Certification</p>
                    </th>
                    <th style="width: 300px;">
                        <p>LinkedIn Profile</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Organization</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Designation</p>
                    </th>
                    <th style="width: 200px;">
                        <p>Expert Roles</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Industry</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Experience</p>
                    </th>
                    <th style="width: 300px;">
                        <p>Expertise</p>
                    </th>
                    {{-- <th style="width: 300px;">
                        <p>Education</p>
                    </th> --}}
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($humanResource as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            @if ($id != $row->expert_id)
                                {{ $row->expert_id }}
                            @endif
                        </td>
                        <td>
                            @if ($id != $row->expert_id)
                                {{ $row->name }}
                            @endif
                        </td>
                        {{-- <td>{{ $row->nationality }}</td> --}}
                        <td>
                            @if ($id != $row->expert_id)
                                {{ $row->nationality }}
                            @endif
                        </td>
                        <td>
                            @foreach ($row->certifications as $certification)
                                <p>{{ $certification->certification_id }} - {{ $certification->certification_title }}
                                </p>
                            @endforeach
                        </td>
                        {{-- <td>{{ $row->linkedin_profile }}</td> --}}
                        <td>
                            <a href="{{ $row->linkedin_profile }}" target="_blank">
                                {{ $row->linkedin_profile }}
                            </a>
                        </td>
                        {{-- <td>{{ $row->organization_name }}</td> --}}
                        <td>
                            {{ $row->organization->organization_name }}

                        </td>
                        {{-- <td>{{ $row->designation }}</td> --}}
                        <td>
                            @if ($id != $row->expert_id)
                                {{ $row->designation }}
                            @endif
                        </td>
                        {{-- <td>{{ $row->role_title }}</td> --}}
                        <td>
                            @foreach ($row->roles as $role)
                                <p>{{ $role->role_title }}</p>
                            @endforeach
                            @if ($id != $row->expert_id)
                                {{ $row->role_title }}
                            @endif
                        </td>
                        {{-- <td>{{ $row->industry_name }}</td> --}}
                        <td>
                            {{ $row->industry->industry_name }}

                        </td>
                        {{-- <td>{{ $row->experience }}</td> --}}
                        <td>
                            {{ $row->experience }}

                        </td>
                        {{-- <td>{{ $row->expertise_title }}</td> --}}
                        <td>
                            @foreach ($row->experties as $experty)
                                <p>{{ $experty->expertise_title }}</p>
                            @endforeach

                        </td>
                        {{-- <td>{{ $row->education_name }}</td> --}}
                        @php $id = $row->expert_id @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $(document).ready(function() {
            $('#nationality').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });
            $('#industry_name').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });
            $('#organization_name').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });
            $('#certification_title').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });
            $('#expertise_title').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });
            $('#designation').multiselect({
                includeSelectAllOption: false,
                maxHeight: 150,
                dropUp: true
            });



        });
    </script>

</body>
