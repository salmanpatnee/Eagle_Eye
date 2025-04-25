@extends('4-Process/18-Reporting/2-MISReporting/mbe-layout')
@section('content')
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>رقم</p>
                        <p>S.No</p>
                    </th>
                    <th style="column-width: 200px;">
                        <p>رمز الأصول</p>
                        <p>Asset ID</p>
                    </th>
                    <th>
                        <p>اسم الأصول</p>
                        <p>Asset Name</p>
                    </th>
                    <th>
                        <p>اسم مجموعة الأصول</p>
                        <p>Asset Group</p>
                    </th>
                    <th>
                        <p>اسم صاحب</p>
                        <p>Owner</p>
                    </th>
                    <th>
                        <p> اسم الوصي </p>
                        <p>Custodians</p>
                    </th>
                    <th>
                        <p>المخاطر</p>
                        <p>Risks</p>
                    </th>
                    <th>
                        <p>الضوابط</p>
                        <p>Controls</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($report as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('assetreg.show', $row->asset_id) }}">
                                {{ $row->asset_id }}
                            </a>
                        </td>
                        <td>
                            {{ $row->asset_name }}
                        </td>
                        <td>
                            {{ $row->asset_group_name }}
                        </td>
                        <td>
                            <a href="owner-table/{{ $row->owner_id }}">

                                {{ $row->owner_name }}
                            </a>
                        </td>

                        <td>
                            {!! $row->custodians !!}
                        </td>
                        <td>
                            {!! $row->risks !!}
                        </td>
                        <td>
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
