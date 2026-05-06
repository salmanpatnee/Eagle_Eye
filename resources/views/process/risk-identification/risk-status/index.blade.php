@extends('layouts.app-full')
@section('title', 'Risk Status')
@section('title_ar', 'حالة المخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Status">
            <x-action.excel-button route_name="risk.status.excel" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-status.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Owner" name="owner" placeholder="All Owners"
                            :value="$owner" :data="$owners" id_key="owner_role_id" value_key="owner_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.label label="Status" for="status" />
                        <select name="status" id="status" onchange="this.form.submit()"
                            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden">
                            <option value="">All</option>
                            <option value="Open" {{ $status === 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="Close" {{ $status === 'Close' ? 'selected' : '' }}>Close</option>
                        </select>
                    </div>
                </x-form.grid-3-col>
            </div>
        </form>

        <div class="space-y-6 border-t border-gray-100 p-2 sm:p-4 mb-5">
            <x-form.grid-col>
                <div>
                    <div class="rounded-xl border border-gray-200 bg-white">
                        <h4
                            class="bg-brand-950 border-brand-500 border-y font-medium mb-1 px-3 py-1 rounded-t-xl text-left  text-white">
                            Risk Status Summary
                        </h4>


                        <ul class="flex flex-col">
                            <li
                                class="flex items-center justify-between text-gray-800 gap-2 border-b border-gray-200 px-3 py-2.5 text-sm last:border-b-0">
                                <span class="font-bold text-gray-800">Total Risks:</span> {{ $risksCount->total_risks }}
                            </li>
                            <li
                                class="flex items-center justify-between gap-2 border-b border-gray-200 px-3 py-2.5 text-sm text-gray-500 last:border-b-0">
                                <span class="font-bold text-gray-800">Open Risks:</span> {{ $risksCount->open_risks }}
                            </li>
                            <li
                                class="flex items-center justify-between gap-2 border-b border-gray-200 px-3 py-2.5 text-sm text-gray-500 last:border-b-0">
                                <span class="font-bold text-gray-800">Close Risks:</span> {{ $risksCount->closed_risks }}
                            </li>
                        </ul>

                    </div>
                </div>
                <div>
                    <div class="rounded-xl border border-gray-200 bg-white">
                        <h4
                            class="bg-brand-950 border-brand-500 border-y font-medium mb-1 px-3 py-1 rounded-t-xl text-left  text-white">
                            Control Status Summary
                        </h4>


                        <ul class="flex flex-col">
                            <li
                                class="flex items-center justify-between text-gray-800 gap-2 border-b border-gray-200 px-3 py-2.5 text-sm last:border-b-0">
                                <span class="font-bold text-gray-800">Total Controls:</span>
                                {{ $controlsCount->total_controls }}
                            </li>
                            <li
                                class="flex items-center justify-between gap-2 border-b border-gray-200 px-3 py-2.5 text-sm text-gray-500 last:border-b-0">
                                <span class="font-bold text-gray-800">Implemented:</span>
                                {{ $controlsCount->implemented_controls }}
                            </li>
                            <li
                                class="flex items-center justify-between gap-2 border-b border-gray-200 px-3 py-2.5 text-sm text-gray-500 last:border-b-0">
                                <span class="font-bold text-gray-800">Partially Implemented:</span>
                                {{ $controlsCount->partially_implemented_controls }}
                            </li>
                            <li
                                class="flex items-center justify-between gap-2 border-b border-gray-200 px-3 py-2.5 text-sm text-gray-500 last:border-b-0">
                                <span class="font-bold text-gray-800">Not Applicable:</span>
                                {{ $controlsCount->not_applicable_controls }}
                            </li>
                            <li
                                class="flex items-center justify-between gap-2 border-b border-gray-200 px-3 py-2.5 text-sm text-gray-500 last:border-b-0">
                                <span class="font-bold text-gray-800">Not Implemented:</span>
                                {{ $controlsCount->not_implemented_controls }}
                            </li>
                        </ul>

                    </div>
                </div>
            </x-form.grid-col>
        </div>

        <x-table.scroll-table height-offset="350" min-width="1200px">
            <x-slot:head>
                <x-table.th label="S.No" />
                <x-table.th label="Risk" />
                <x-table.th label="Risk Owner" />
                <x-table.th label="Risk Assessment" />
                <x-table.th label="Risk Assessment Date" />
                <x-table.th label="Risk Finding" />
                <x-table.th label="Risk Status" />
                <x-table.th label="Controls" />
                <x-table.th label="Control Implementation Status" />
                <x-table.th label="Control Owner Name" />
            </x-slot:head>
            <x-slot:body>
                @foreach ($riskStatus as $row)
                    <tr>
                        <x-table.td class="text-center">{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td min-width="350px" max-width="500px">
                            <a href="{{ route('risks.show', $row->rid) }}" target="_blank" class="text-dark">
                                {{ $row->risk }}
                            </a>
                        </x-table.td>
                        <x-table.td min-width="150px" max-width="200px">{{ $row->risk_owner }}</x-table.td>
                        <x-table.td>{{ $row->risk_assessment }}</x-table.td>
                        <x-table.td>{{ $row->risk_assessment_start_date }}</x-table.td>
                        <x-table.td>{{ $row->findings }}</x-table.td>
                        <x-table.td>{{ $row->implementation_status }}</x-table.td>
                        <x-table.td min-width="300px">{!! $row->controls !!}</x-table.td>
                        <x-table.td min-width="180px">{!! $row->control_status !!}</x-table.td>
                        <x-table.td min-width="250px">{!! $row->control_owner !!}</x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>
    </div>
@endsection
