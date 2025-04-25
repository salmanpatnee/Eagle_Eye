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
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="dheadertext">
                <p>المخاطر مقابل مجموعة الأصول</p>
                <p>Risk vs Asset Group</p>
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
        <div class="herosecleft">

            <div class="cveButton">
                
                <a href="{{route('riskvsassetgroup')}}" class="disabled">
                    <div class="leftButton">
                        <p>المخاطر مقابل مجموعة الأصول</p>
                        <p>Risk vs Asset Group</p>
                    </div>
                </a>
                <a href="{{route('assetgroupvsrisk')}}"  >
                    <div class="leftButton">
                        <p>مجموعة الأصول مقابل المخاطر</p>
                        <p>Asset Group vs Risk</p>
                    </div>
                </a>
            </div>
        </div>
        <div>
            <form action="/risk-asset-group">
                <div class="filter-row">

                    <div class="col">
                        <label class="form-label" for="risk">
                            <p>Risk</p>
                            <p>المخاطر</p>
                        </label>
                        <select class="form-select" name="risk" id="risk" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($risks as $risk)
                                <option value="{{$risk->risk_id}}"  @if ($risk->risk_id == request('risk')) selected @endif>{{$risk->risk_id}} - {{$risk->risk_name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="asset_group">
                            <p>Asset Group</p>
                            <p>مجموعة الأصول</p>
                        </label>
                        <select class="form-select" name="assetGroup" id="assetGroup" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($assetGroups as $assetGroup)
                                <option value="{{$assetGroup->asset_group_id}}" @if ($assetGroup->asset_group_id == request('assetGroup')) selected @endif>{{$assetGroup->asset_group_id}} - {{$assetGroup->asset_group_name}}</option>
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
                    <th>
                        <p>رمز</p>
                        <p>S.No</p>
                    </th>
                    <th>
                        <p>اسم المخاطر</p>
                        <p>Risk ID</p>
                    </th>
                    <th>
                        <p>رمز المخاطر</p>
                        <p>Risk Name</p>
                    </th>
                    <th>
                        <p>اسم مجموعة الأصول</p>
                        <p>Asset Group</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($riskassetgroup as $row)
                    <tr>
                        <td class="text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            <a href="{{ route('riskmaster.show', $row->risk_id) }}" class="text-dark">
                                {{ $row->risk_id }}
                            </a>
                        </td>
                        <td>{{ $row->risk_name }}</td>
                        <td>
                            @foreach ($row->assetGroups as $group)
                                <p>
                                    <a href="{{ route('assetgroup.show', $group->asset_group_id) }}"
                                        class="text-dark">
                                        {{ $group->asset_group_id }} - {{ $group->asset_group_name }}
                                    </a>
                                </p>
                            @endforeach
                        </td>
                        {{-- <td><a href="/risk-identification-table/{{ $row->risk_id }}">{{ $row->risk_id }}</a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
