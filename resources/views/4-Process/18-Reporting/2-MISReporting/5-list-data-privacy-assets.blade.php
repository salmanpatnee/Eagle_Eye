@extends('4-Process/18-Reporting/2-MISReporting/master-layout')
@section('content')
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">
                <h1>قائمة الأصول خصوصية البيانات</h1>
                <h3>List of Data Privacy Assets</h3>
            </div>
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
                        <p>رمز الأصول</p>
                        <p>Asset ID</p>
                    </th>
                    <th>
                        <p>اسم الأصول</p>
                        <p>Asset Name</p>
                    </th>
                    <th>
                        <p>اسم مجموعة الأصول</p>
                        <p>Asset Group Name</p>
                    </th>
                    <th>
                        <p>اسم نوع الأصل</p>
                        <p>Asset Type Name</p>
                    </th>
                    <th>
                        <p>اسم الموقع</p>
                        <p>Location Name</p>
                    </th>





                </tr>
            </thead>
            <tbody class="tablebody">

                @foreach ($assetregister as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="/asset-register-table/{{ $row->asset_id }}">{{ $row->asset_id }}</a>
                        </td>
                        <td>{{ $row->asset_name }}</td>
                        <td>{{ $row->asset_group_name }}</td>
                        <td>{{ $row->asset_type_name }}</td>
                        <td>{{ $row->location_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection





