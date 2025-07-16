@extends('4-Process/18-Reporting/2-MISReporting/mbe-pdf-layout')
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
                        <p style="margin: 0;">Control ID</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">اسم الضوابط</p> --}}
                        <p style="margin: 0;">Control Name</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">حالة</p> --}}
                        <p style="margin: 0;">Status</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">اسم صاحب</p> --}}
                        <p style="margin: 0;">Owner</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">اسم الوصي</p> --}}
                        <p style="margin: 0;">Custodians</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p style="margin: 0;">المخاطر</p> --}}
                        <p style="margin: 0;">Risks</p>
                    </th>
                </tr>
            </thead>


            <tbody class="tablebody">
                @foreach ($report as $row)
                    <tr>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $loop->index + 1 }}</td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            <a href="{{ route('controlmaster.show', $row->control_id) }}" style="color: black">
                                {{ $row->control_id }}
                            </a>
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->control_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->status }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            <a href="owners/{owner}/{{ $row->owner_id }}" style="color: black">

                                {{ $row->owner_name }}
                            </a>
                        </td>

                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {!! $row->custodian_links !!}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {!! $row->risks !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
