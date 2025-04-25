@extends('4-Process/18-Reporting/2-MISReporting/master-layout')
@section('content')
    <div class="herosec">
        <div class="herosecleft">
            <div class="cveButton">
                <h1>الضوابط المتعلقة بأصول خصوصية البيانات</h1>
                <h3>Controls Related to Data Privacy Assets</h3>
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
                        <p>Control ID</p>
                    </th>
                    <th>
                        <p>اسم الأصول</p>
                        <p>Control Name</p>
                    </th>
                    <th>
                        <p>اسم مجموعة الأصول</p>
                        <p>Maturity Level</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($assetregister as $row)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="/control-identification-table/{{ $row->control_id }}">{{ $row->control_id }}</a>
                    </td>
                    <td>{{ $row->control_name }}</td>
                    <td>{{ $row->maturity_level }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

