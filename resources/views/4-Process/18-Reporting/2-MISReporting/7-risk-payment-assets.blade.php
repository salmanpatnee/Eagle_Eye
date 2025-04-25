@extends('4-Process/18-Reporting/2-MISReporting/master-layout')
@section('content')
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">
                <h1>المخاطر المتعلقة بأصول الدفع</h1>
                <h3>Risks Related to Payment Assets</h3>
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
                        <p>Risk ID</p>
                    </th>
                    <th>
                        <p>اسم الأصول</p>
                        <p>Risk Name</p>
                    </th>
                    
                    <th>
                        <p>اسم مجموعة الأصول</p>
                        <p>Risk Group Name</p>
                    </th>
                   
                    <th>
                        <p>اسم نوع الأصل</p>
                        <p>Risk Inherent Score</p>
                    </th>
                    <th>
                        <p>اسم الموقع</p>
                        <p>Risk Consequences</p>
                    </th>
                </tr>

            </thead>
            <tbody class="tablebody">
                @foreach ($assetregister as $row)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="/risk-identification-table/{{ $row->risk_id }}">{{ $row->risk_id }}</a>
                    </td>
                    <td>{{ $row->risk_name }}</td>
                    <td>{{ $row->risk_group_name }}</td>
                    <td>{{ $row->risk_inherent_score }}</td>
                    <td>{{ $row->risk_consequences }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection