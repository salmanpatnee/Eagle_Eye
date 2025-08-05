@extends('layouts.threat')
@section('title', 'Threat Agents')
@section('title_ar', 'وكلاء التهديد')

@section('content')
    <div>

        <x-table.action-wrapper title="All Threat Agents">
            <x-action.button label="Add Threat Agent" label_ar="وكلاء التهديد" route_name="threat-agents.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Agent ID" label_ar="رمز وكلاء التهديد" />
                <x-table.th label="Agent Name" label_ar="الاسم وكلاء التهديد" />
                <x-table.th label="Rating" label_ar="عنوان نقاط وكيل التهديد" />
                <x-table.th label="Vectors" label_ar="اسم ناقلات" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($threatAgents as $threatAgent)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$threatAgents" /></x-table.td>
                        <x-table.td>{{ $threatAgent->threat_agent_id }}</x-table.td>
                        <x-table.td>{{ $threatAgent->threat_agent_name }}</x-table.td>
                        <x-table.td>{{ $threatAgent?->rating?->threat_agent_rating_title }}</x-table.td>
                        <x-table.td><x-table-list :data="$threatAgent?->vectors" id_key=""
                                value_key="threat_agent_vector_name" /></x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="threat-agents.show" param="{{ $threatAgent->id }}" />
                            <x-action.edit route_name="threat-agents.edit" param="{{ $threatAgent->id }}" />
                            <x-action.delete route_name="threat-agents.destroy" param="{{ $threatAgent->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        <x-pagination>
            {{ $threatAgents->links() }}
        </x-pagination>
    </div>
@endsection
