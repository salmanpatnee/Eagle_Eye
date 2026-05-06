@extends('layouts.threat')
@section('title', 'Threat Agents Sub-Types')
@section('title_ar', 'النوع الفرعي الوكيل التهديد')

@section('content')
    <div>

        <x-table.action-wrapper title="All Threat Agent Sub-Types">
            <x-action.button label="Add Threat Agent Sub-Type" label_ar="النوع الفرعي الوكيل التهديد"
                route_name="threat-agent-sub-types.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="130" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Sub-Type ID" label_ar="رمز النوع الفرعي الوكيل التهديد" />
                <x-table.th label="Sub-Type Name" label_ar="الاسم النوع الفرعي الوكيل التهديد" />
                <x-table.th label="Type" label_ar="نوع وكيل التهديد" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($threatAgentSubTypes as $threatAgentSubType)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $threatAgentSubType->threat_agent_sub_type_id }}</x-table.td>
                        <x-table.td>{{ $threatAgentSubType->threat_agent_sub_type_name }}</x-table.td>
                        <x-table.td>{{ $threatAgentSubType?->type?->threat_agent_type_name }}</x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="threat-agent-sub-types.show" param="{{ $threatAgentSubType->id }}" />
                            <x-action.edit route_name="threat-agent-sub-types.edit" param="{{ $threatAgentSubType->id }}" />
                            <x-action.delete route_name="threat-agent-sub-types.destroy"
                                param="{{ $threatAgentSubType->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

    </div>
@endsection
