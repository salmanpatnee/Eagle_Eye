@extends('layouts.threat')
@section('title', 'Threat Agents Types')
@section('title_ar', 'نوع وكيل التهديد')
@section('parent_title', 'Threat Agents Types')
@section('parent_url', route('threat-agent-types.index'))
@section('breadcrumb_title', $threatAgentType->threat_agent_type_name)

@section('content')
    <div>
        <x-table.action-wrapper title="Threat Agent Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="threat-agent-types.edit"
                route_param="{{ $threatAgentType->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Threat Agent Type ID" label_ar="رمز نوع وكيل التهديد">
                    {{ $threatAgentType->threat_agent_type_id }}
                </x-info-col>
                <x-info-col label="Threat Agent Type Name" label_ar="اسم نوع وكيل التهديد">
                    {{ $threatAgentType->threat_agent_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Threat Agent Type Description" label_ar="وصف نوع وكيل التهديد">
                {{ $threatAgentType->threat_agent_type_description ?? '—' }}
            </x-info-col-lg>

        </div>

    </div>
@endsection
