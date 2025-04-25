@extends('partials.app-layout')

@section('content')
    <div class="herosec">
        <div class="herosecleft">
            <h3>تقرير معالجة المخاطر</h3>
            <h3>Risk Treatment Report</h3>
        </div>
    </div>
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th style="width: 200px">
                        <p>رمز المخاطر</p>
                        <p>Risk ID</p>
                    </th>
                    <th style="width: 500px">
                        <p>اسم المخاطر </p>
                        <p>Risk Name</p>
                    </th>
                    <th style="width: 200px">
                        <p>رمز الضوابط</p>
                        <p>Controls ID</p>
                    </th>
                    <th>
                        <p>اسم الضوابط</p>
                        <p>Control Name</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($risktreatment as $row)
                    <tr>
                        <td>
                            @if ($riskId != $row->risk_id)
                                <a href="#"{{ $row->risk_id }}">
                                    {{ $row->risk_id }}
                                </a>
                            @endif
                        </td>
                        <td>
                            @if ($riskId != $row->risk_id)
                                {{ $row->risk_name }}
                            @endif
                        </td>
                        <td>{{ $row->control_id }}</td>
                        <td>{{ $row->control_name }}</td>
                    </tr>
                    @php
                        $riskId = $row->risk_id;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
