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

        label {
            display: inline-block;
            font-size: 0.9rem;
            font-weight: 700;
            line-height: 0.5;
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
    </style>
</head>

<body>
    <div class="fixposition">
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
                    <p>البحث الذكي عن الأصول</p>
                    <p>Asset Smart Search</p>
                </div>
            </div>
            <div class="d-flex align-items-center  gap-3">

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
            <div class="astherosecleft">
                <p>أكمل تقرير البحث الذكي عن الأصول</p>
                <p>Complete Assets Smart Search Report</p>
            </div>
            <form action="{{ route('asset.smart.search') }}" method="GET">
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="asset_name">
                            <p>Asset Name</p>
                            <p>اسم الأصول</p>
                        </label>
                        <select class="form-select" name="asset_name" id="asset_name" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($assetname as $assetnamedata)
                                <option value="{{ $assetnamedata }}"
                                    {{ request('asset_name') == $assetnamedata ? 'selected' : '' }}>
                                    {{ $assetnamedata }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="asset_group_name">
                            <p>Asset Group</p>
                            <p>مجموعة الأصول</p>
                        </label>
                        <select class="form-select" name="asset_group_name" id="asset_group_name"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($astgroup as $astgroupdata)
                                <option value="{{ $astgroupdata }}"
                                    {{ request('asset_group_name') == $astgroupdata ? 'selected' : '' }}>
                                    {{ $astgroupdata }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="relation">
                            <p>Exclusive Category</p>
                            <p>فئة حصرية</p>
                        </label>
                        @php
                            $relations = [
                                'critical_asset' => 'Critical Assets',
                                'cloud_asset' => 'Cloud Assets',
                                'telework_asset' => 'Telework Assets',
                                'social_media_asset' => 'Social Media Assets',
                                'infrastructure_assets' => 'Infrastructure Assets',
                                'application_assets' => 'Application Assets',
                                'hr_asset' => 'HR Assets',
                                'physical_assets' => 'Physical Assets',
                                'third_party_asset' => 'Third Party Assets',
                                'operational_asset' => 'Operational Assets',
                                'it_asset' => 'IT Assets',
                                'data_privacy_asset' => 'Data Privacy Assets',
                                'data_pii_asset' => 'Data PII Assets',
                                'payment_asset' => 'Payment Assets',
                                'pci_dss_asset' => 'PCI DSS Assets',
                                'e_commerce_asset' => 'E-Commerce Assets',
                                'e_banking_asset' => 'E-Banking Assets',
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
                </div>
                <div class="filter-row">
                    <div class="col">
                        <label class="form-label" for="asset_type_name">
                            <p>Asset Type</p>
                            <p>نوع الأصول</p>
                        </label>
                        <select class="form-select" name="asset_type_name" id="asset_type_name"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($asttype as $asttypedata)
                                <option value="{{ $asttypedata }}"
                                    {{ request('asset_type_name') == $asttypedata ? 'selected' : '' }}>
                                    {{ $asttypedata }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="asset_sub_type_name">
                            <p>Asset Sub Type</p>
                            <p>النوع الفرعي للأصول</p>
                        </label>
                        <select class="form-select" name="asset_sub_type_name" id="asset_sub_type_name"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($astsubtype as $astsubtypedata)
                                <option value="{{ $astsubtypedata }}"
                                    {{ request('asset_sub_type_name') == $astsubtypedata ? 'selected' : '' }}>
                                    {{ $astsubtypedata }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="location_name">
                            <p>Location</p>
                            <p>المواقع</p>
                        </label>
                        <select class="form-select" name="location_name" id="location_name"
                            onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($loctable as $loctabledata)
                                <option value="{{ $loctabledata }}"
                                    {{ request('location_name') == $loctabledata ? 'selected' : '' }}>
                                    {{ $loctabledata }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="asmtablearea">
        <table class="table-response">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رقم</p>
                        <p>S.No</p>
                        </th>
                    <th style="width: 200px;">
                        <p>رمز الأصول</p>
                        <p>Asset ID</p>
                    </th>
                    <th style="width: 300px;">
                        <p>اسم الأصل</p>
                        <p>Asset Name</p>
                    </th>
                    <th style="width: 300px;">
                        <p>مجموعة الأصول</p>
                        <p>Asset Group</p>
                    </th>
                    <th style="width: 300px;">
                        <p>نوع الأصول</p>
                        <p>Asset Type</p>
                    </th>
                    <th style="width: 300px;">
                        <p>النوع الفرعي للأصول</p>
                        <p>Asset Sub-Type</p>
                    </th>
                    <th style="width: 300px;">
                        <p>فئة حصرية</p>
                        <p>Exclusive Category</p>
                    </th>
                    <th style="width: 200px;">
                        <p>قيمة الأصول</p>
                        <p>Asset Value</p>
                    </th>
                    <th style="width: 300px;">
                        <p>موقع الأصول</p>
                        <p>Asset Location</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($assetsmart as $row)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1}}</td>
                        <td>{{ $row->asset_id }}</td>
                        <td>{{ $row->asset_name }}</td>
                        <td>{{ $row->asset_group_name }}</td>
                        <td>{{ $row->asset_type_name }}</td>
                        <td>{{ $row->asset_sub_type_name }}</td>
                        <td>
                            <?php $exclusiveCategories = []; ?>

                            @if ($row->critical_asset == 'Yes')
                                <?php $exclusiveCategories[] = 'Critical Asset'; ?>
                            @endif

                            @if ($row->cloud_asset == 'Yes')
                                <?php $exclusiveCategories[] = 'Cloud Asset'; ?>
                            @endif

                            @if (count($exclusiveCategories) > 0)
                                {{ implode(', ', $exclusiveCategories) }}
                            @else
                                No Exclusive Category
                            @endif
                        </td>
                        <td>{{ $row->asset_value }}</td>
                        <td>{{ $row->location_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
