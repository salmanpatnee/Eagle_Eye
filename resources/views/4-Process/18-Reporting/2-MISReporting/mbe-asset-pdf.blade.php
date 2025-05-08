@extends('4-Process/18-Reporting/2-MISReporting/mbe-pdf-layout')
@section('content')
    
    <div class="tablearea">
        <table class="table">

            <thead class="tablehead">
                <tr>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p>رقم</p> --}}
                        <p>S.No</p>
                    </th>
                    <th style="column-width: 200px;">
                        {{-- <p>رمز الأصول</p> --}}
                        <p>Asset ID</p>
                    </th>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p>اسم الأصول</p> --}}
                        <p>Asset Name</p>
                    </th>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p>اسم مجموعة الأصول</p> --}}
                        <p>Asset Group</p>
                    </th>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p>اسم صاحب</p> --}}
                        <p>Owner</p>
                    </th>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p> اسم الوصي </p> --}}
                        <p>Custodians</p>
                    </th>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p>المخاطر</p> --}}
                        <p>Risks</p>
                    </th>
                    <th style="background-color: #203864; color: #fff; font-weight: bold; text-align: center; padding: 10px; border: 1px solid #ddd;">
                        {{-- <p>الضوابط</p> --}}
                        <p>Controls</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($report as $row)
                    <tr>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">{{ $loop->index + 1 }}</td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            <a href="{{ route('assetreg.show', $row->asset_id) }}" style="color: black">
                                {{ $row->asset_id }}
                            </a>
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {{ $row->asset_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {{ $row->asset_group_name }}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            <a href="owner-table/{{ $row->owner_id }}" style="color: black">

                                {{ $row->owner_name }}
                            </a>
                        </td>

                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {!! $row->custodians !!}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {!! $row->risks !!}
                        </td>
                        <td style="padding: 12px; color: black; font-size: 12px; text-align: center; vertical-align: top;">
                            {!! $row->controls !!}
                        </td>
                    </tr>
                
                @endforeach
            </tbody>            
            
          
        </table>
    </div>
@endsection
