@extends('4-Process/18-Reporting/2-MISReporting/mbe-layout')
@section('content')
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        {{-- <p>رقم</p> --}}
                        <p>S.No</p>
                    </th>
                    <th style="column-width: 200px;">
                        {{-- <p>رمز المخاطر</p> --}}
                        <p>Risk ID</p>
                    </th>
                    <th>
                        {{-- <p>اسم المخاطر</p> --}}
                        <p>Risk Name</p>
                    </th>
                    <th>
                        {{-- <p>حالة</p> --}}
                        <p>Status</p>
                    </th>
                    <th>
                        {{-- <p>اسم صاحب</p> --}}
                        <p>Owner</p>
                    </th>
                    <th>
                        {{-- <p> اسم الوصي </p> --}}
                        <p>Custodians</p>
                    </th>
                    <th>
                        {{-- <p>الضوابط</p> --}}
                        <p>Controls</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @forelse ($report as $row)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('riskmaster.show', $row->risk_id) }}">
                                {{ $row->risk_id }}
                            </a>
                        </td>
                        <td>
                            {{ $row->risk_name }}
                        </td>
                        <td>
                            {{ $row->status }}
                        </td>
                        <td>
                            <a href="owners/{owner}/{{ $row->owner_id }}">

                                {{ $row->owner_name }}
                            </a>
                        </td>

                        <td>
                            {!! $row->custodian_links !!}
                        </td>
                        <td>
                            {!! $row->control_links !!}
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
