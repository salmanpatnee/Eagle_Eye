@extends('4-Process/18-Reporting/2-MISReporting/mis-pdf-layout')
@section('content')
    <div class="tablearea">
        <table class="table">
            <thead>
                <tr>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">رقم</p> --}}
                        <p style="margin: 0;">S.No</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd; column-width: 200px;">
                        {{-- <p style="margin: 0;">رمز الضوابط</p> --}}
                        <p style="margin: 0;">Risk ID</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">اسم الضوابط</p> --}}
                        <p style="margin: 0;">Risk Name</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">حالة</p> --}}
                        <p style="margin: 0;">Risk Group Name</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">اسم صاحب</p> --}}
                        <p style="margin: 0;">Risk Inherent Score</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">اسم الوصي</p> --}}
                        <p style="margin: 0;">Risk Consequences</p>
                    </th>
                </tr>
            </thead>


            <tbody class="tablebody">
                @foreach ($report as $row)
                    <tr>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $loop->index + 1 }}</td>

                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">

                            <a href="{{ route('riskmaster.show', $row->risk_id) }}" style="color: black">
                                {{ $row->risk_id }}
                            </a>

                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->risk_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->risk_group_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->risk_inherent_score }}

                        </td>

                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->risk_consequences }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
