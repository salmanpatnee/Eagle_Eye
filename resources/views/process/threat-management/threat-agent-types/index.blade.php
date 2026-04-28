@extends('layouts.threat')
@section('title', 'Threat Agents Types')
@section('title_ar', 'نوع وكيل التهديد')

@section('content')
    <div>

        <x-table.action-wrapper title="All Threat Agent Types">
            <x-action.button label="Add Threat Agent Type" label_ar="نوع وكيل التهديد"
                route_name="threat-agent-types.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Type ID" label_ar="رمز نوع وكيل التهديد" />
                <x-table.th label="Type Name" label_ar="الاسم نوع وكيل التهديد" />
                <x-table.th label="Description" label_ar="وصف وكيل التهديد" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($threatAgentTypes as $threatAgentType)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$threatAgentTypes" /></x-table.td>
                        <x-table.td>{{ $threatAgentType->threat_agent_type_id }}</x-table.td>
                        <x-table.td>{{ $threatAgentType->threat_agent_type_name }}</x-table.td>
                        <x-table.td wrap="true"><span class="line-clamp-3" title="{{ $threatAgentType?->type?->threat_agent_type_description }}">{{ $threatAgentType?->type?->threat_agent_type_description }}</span></x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="threat-agent-types.show" param="{{ $threatAgentType->id }}" />
                            <x-action.edit route_name="threat-agent-types.edit" param="{{ $threatAgentType->id }}" />
                            <x-action.delete route_name="threat-agent-types.destroy" param="{{ $threatAgentType->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $threatAgentTypes->links() }}
        </x-pagination>
    </div>
@endsection
