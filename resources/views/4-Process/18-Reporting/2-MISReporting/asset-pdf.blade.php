@extends('4-Process/18-Reporting/2-MISReporting/mbe-pdf-layout')
@section('content')
    <div class="tablearea">
        <table class="table">
            <thead>
                <tr>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">رقم</p>
                        <p style="margin: 0; white-space: nowrap;">S.No</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">رمز الأصول</p>
                        <p style="margin: 0; white-space: nowrap;">Asset ID</p>
                    </th>

                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">اسم الأصول</p>
                        <p style="margin: 0; white-space: nowrap;">Asset Name</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">اسم مجموعة الأصول</p>
                        <p style="margin: 0; white-space: nowrap;">Asset Group</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">اسم صاحب</p>
                        <p style="margin: 0; white-space: nowrap;">Owner</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">اسم الوصي</p>
                        <p style="margin: 0; white-space: nowrap;">Custodians</p>
                    </th>

                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">المخاطر</p>
                        <p style="margin: 0; white-space: nowrap;">Risks</p>
                    </th>
                    <th
                        style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        <p style="margin: 0; white-space: nowrap;">الضوابط</p>
                        <p style="margin: 0; white-space: nowrap;">Controls</p>
                    </th>
                </tr>

            </thead>


            <tbody class="tablebody">
                @forelse ($report as $row)
                    <tr>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {{ $loop->index + 1 }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            <a href="{{ route('assets.show', $row->asset_id) }}"
                                style="color: #000; font-size: 12px; text-decoration: none;">
                                {{ $row->asset_id }}
                            </a>
                        </td>

                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {{ $row->asset_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {{ $row->asset_group_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            <a href="owners/{owner}/{{ $row->owner_id }}"
                                style="color: #000; font-size: 12px; text-decoration: none;">
                                {{ $row->owner_name }}
                            </a>
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {!! $row->custodians !!}
                        </td>

                        <td style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top;">
                            {!! $row->risks !!}
                        </td>
                        <td
                            style="padding: 12px; color: black; font-size: 12px; text-align: left; vertical-align: top; white-space: nowrap;">
                            <style>
                                a {
                                    color: black;
                                }
                            </style>
                            {!! $row->controls !!}
                        </td>
                    </tr>



                @empty
                    <div class="alert alert-error">
                        <p>No results were found.</p>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
