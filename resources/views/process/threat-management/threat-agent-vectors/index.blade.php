@extends('layouts.threat')
@section('title', 'Threat Agent Vectors')
@section('title_ar', 'ناقل وكيل التهديد')

@section('content')
    <div>

        <x-table.action-wrapper title="All Threat Agents">
            <x-action.button label="Add Threat Agent Vectors" label_ar="ناقل وكيل التهديد"
                route_name="threat-agent-vectors.create" />
        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Vector ID" label_ar="رمز ناقل وكيل التهديد" />
                <x-table.th label="Vector Name" label_ar="الاسم ناقل وكيل التهديد" />
                <x-table.th label="Vector Description" label_ar="وصف ناقل وكيل التهديد" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead>
            <x-table.tbody>
                @foreach ($threatAgents as $threatAgent)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$threatAgents" /></x-table.td>
                        <x-table.td>{{ $threatAgent->threat_agent_vector_id }}</x-table.td>
                        <x-table.td>{{ $threatAgent->threat_agent_vector_name }}</x-table.td>
                        <x-table.td>{{ $threatAgent->threat_agent_vector_description }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="threat-agent-vectors.show" param="{{ $threatAgent->id }}" />
                            <x-action.edit route_name="threat-agent-vectors.edit" param="{{ $threatAgent->id }}" />
                            <x-action.delete route_name="threat-agent-vectors.destroy" param="{{ $threatAgent->id }}" />
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
