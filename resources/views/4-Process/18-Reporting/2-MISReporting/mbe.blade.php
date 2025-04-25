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
                        <p>رمز الضوابط</p>
                        <p>Control ID</p>
                    </th>
                    <th>
                        <p>اسم الضوابط</p>
                        <p>Control Name</p>
                    </th>
                    <th>
                        <p>حالة</p>
                        <p>Status</p>
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
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($report as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('controlmaster.show', $row->control_id) }}">
                                {{ $row->control_id }}
                            </a>
                        </td>
                        <td>
                            {{ $row->control_name }}
                        </td>
                        <td>
                            {{ $row->status }}
                        </td>
                        <td>
                            <a href="owner-table/{{ $row->owner_id }}">

                                {{ $row->owner_name }}
                            </a>
                        </td>

                        <td>
                            {!! $row->custodian_links !!}
                        </td>
                        <td>
                            {!! $row->risks !!}
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
