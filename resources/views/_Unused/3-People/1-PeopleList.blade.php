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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        header {
            width: auto;
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            letter-spacing: 1px;
        }
    
        header {
            background: linear-gradient(to right, #203864, #2e74b6);
            color: var(--white);
            padding: 10px;
            padding-left: 10px;
            text-align: left;
            width: auto;
            margin-bottom: 10px;
            line-height: 0em;
        }
        
        .header-content {
            display: flex;
            align-items: end;
            justify-content: space-between;
        }
        
        .bold-arbtext {
            font-weight: 500;
            margin-left: 50px;
            margin-top: -48px;
            line-height: 40px;
            font-size: 18px;
            text-decoration: none;
            color: white;
        }
        
        .bold-text {
            font-weight: 500;
            margin-left: 50px;
            margin-top: -20px;
            padding-top: 15px;
            font-size: 18px;
            text-decoration: none;
            color: white;
        }

        .RightButton {
            background-color: #000000;
            color: white;
            width: 140px;
            height: 60px;
            border: solid 1px black;
            border-radius: 20px;
            cursor: pointer;
            transition-duration: 0.3s;
            text-align: center;
            align-items: center;
            padding-top: 15px;
            /*margin-right: 2em;*/
        }
        
        .RightButton .RightButtonArbTxt {
            font-size: 20px;
            font-family: calibri inherit;
        }
        
        .RightButton:hover {
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
            flex-direction: row;
            flex-wrap: wrap;
            align-content: normal;
            justify-content: space-between;
            align-items: center;
            display: flex;
            align-items: center;
            /* justify-content: center; */
            /* flex-wrap: wrap; */
            padding: 0 0 0 0;
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

        .PeopleHeaderTitle {
            font-size: 15px;
            color: white;
            font-weight: 600;
            margin-left: 10px;
        }

        .addpeople {
            font-size: 12px;
            color: white;
            background-color: #203864;
            border-radius: 20px;
            padding: 20px;
            text-decoration: none;
            margin-left: 20px;
        }
        .filterform {
            margin-inline: 20px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content" id="header">
            <div class="TitleText">
                <p class="bold-arbtext">الموارد البشرية</p>
                <p class="bold-text">People</p>
            </div>
            <div>
                <a href="/vciso">
                    <button class="RightButton">
                        <p class="RightButtonArbTxt">ارجع</p>
                        <p class="RightButtonTxt">Back</p>
                    </button>
                </a>
            </div>
        </div>
    </header>

    <div class="IndiTable">
        <h1 style="text-align: center; line-height: 35px; color:#203864;">خبراء الأمن السيبراني في المملكة العربية
            السعودية
        </h1>
        <h2 style="text-align: center; line-height: 35px; color:#203864;">Cybersecurity Experts in Saudi Arabia
        </h2>
        <p style="text-align: center; line-height: 35px; color:#203864;">Current Date: {{ now()->format('d-m-Y') }}</p>
        <div>
            <!--<a class="addpeople" href="https://compliance360grc.com/expert-input">Add Information</a>-->
        </div>

        <div class="filterform">
            <form>
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="organization">
                            <p style="font-size: 20px; font-weight: 600; letter-spacing: 0px">الجهة</p>
                            <p>Organizations:</p>
                        </label>
                        <select class="form-select" name="organization" id="organization" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($organizations as $organization)
                                <option value="{{ $organization->expert_organization_id }}"
                                    @if ($organization->expert_organization_id == request('organization')) selected @endif>
                                    {{ $organization->expert_organization_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="industry">
                            <p style="font-size: 20px; font-weight: 600; letter-spacing: 0px">القطاع</p>
                            <p>Industries:</p>
                        </label>
                        <select class="form-select" name="industry" id="industry" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->industry_id }}"
                                    @if ($industry->industry_id == request('industry')) selected @endif>
                                    {{ $industry->industry_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="certification">
                            <p style="font-size: 20px; font-weight: 600; letter-spacing: 0px">الشهادات</p>
                            <p>Certifications:</p>
                        </label>
                        <select class="form-select" name="certification" id="certification"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($certifications as $certification)
                                <option value="{{ $certification->id }}"
                                    @if ($certification->id == request('certification')) selected @endif>
                                    {{ $certification->certification_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="education">
                            <p style="font-size: 20px; font-weight: 600; letter-spacing: 0px">التعليم</p>
                            <p>Education:</p>
                        </label>
                        <select class="form-select" name="education" id="education" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($educations as $education)
                                <option value="{{ $education->id }}" @if ($education->id == request('education')) selected @endif>
                                    {{ $education->education_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="experty">
                            <p style="font-size: 20px; font-weight: 600; letter-spacing: 0px">ألخبرة</p>
                            <p>Expertise:</p>
                        </label>
                        <select class="form-select" name="experty" id="experty" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($experties as $experty)
                                <option value="{{ $experty->id }}" @if ($experty->id == request('experty')) selected @endif>
                                    {{ $experty->expert_experties_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="role">
                            <p style="font-size: 20px; font-weight: 600; letter-spacing: 0px">الأدوار</p>
                            <p>Roles:</p>
                        </label>
                        <select class="form-select" name="role" id="role" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if ($role->id == request('role')) selected @endif>
                                    {{ $role->expert_role_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">رمز الخبير</p>
                        <p>Expert ID</p>
                    </th>
                    <th style="padding-right: 30px; background-color:gray;">
                        <p class="arabicHeading">اسم الخبير</p>
                        <p>Expert Name</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">الجهة</p>
                        <p>Organization</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">القطاع</p>
                        <p>Industry</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">عنوان</p>
                        <p>Title</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">الخبرة</p>
                        <p>Experience</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">التعليم</p>
                        <p>Education</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">الشهادات</p>
                        <p>Certifications</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">الخبير</p>
                        <p>Experties</p>
                    </th>
                    <th style="padding-right: 0px; background-color:gray;">
                        <p class="arabicHeading">الأدوار</p>
                        <p>Roles</p>
                    </th>
                </tr>
                @foreach ($experts as $expert)
                    <tr>
                        <td>
                            <a href="">
                                {{ $expert->expert_id }}
                            </a>
                        </td>
                        <td>{{ $expert->expert_first_name . ' ' . $expert->expert_middle_name . ' ' . $expert->expert_last_name }}
                        </td>
                        <td>{{ $expert->organization->expert_organization_name }}
                        </td>
                        <td>{{ $expert->industry->industry_name }}</td>
                        <td>{{ $expert->expert_title }}</td>
                        <td>{{ $expert->expert_experience }} Yrs</td>
                        <td>
                            <ul>
                                @foreach ($expert->educations as $education)
                                    <li>{{ $education->education_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($expert->certifications as $certificate)
                                    <li>{{ $certificate->certification_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        </td>
                        <td>
                            <ul>
                                @foreach ($expert->experties as $experty)
                                    <li>{{ $experty->expert_experties_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($expert->roles as $role)
                                    <li>{{ $role->expert_role_name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        {{-- <td>{{ $expert->industry_id }}</td> --}}
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


</body>
