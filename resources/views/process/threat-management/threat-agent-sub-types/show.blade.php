@extends('layouts.threat')
@section('title', 'Threat Agent Sub-Types')
@section('title_ar', 'النوع الفرعي الوكيل التهديد')
@section('parent_title', 'Threat Agent Sub-Types')
@section('parent_url', route('threat-agent-sub-types.index'))
@section('breadcrumb_title', $threatAgentSubType->threat_agent_sub_type_name)

@section('content')
    <div>
        <x-table.action-wrapper title="Threat Agent Sub-Type Details">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-sub-types.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="threat-agent-sub-types.edit"
                route_param="{{ $threatAgentSubType->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Threat Agent Sub-Type ID" label_ar="رمز النوع الفرعي الوكيل التهديد">
                    {{ $threatAgentSubType->threat_agent_sub_type_id }}
                </x-info-col>
                <x-info-col label="Threat Agent Sub-Type Name" label_ar="اسم النوع الفرعي الوكيل التهديد">
                    {{ $threatAgentSubType->threat_agent_sub_type_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Threat Agent Sub-Type Description" label_ar="وصف النوع الفرعي الوكيل التهديد">
                {{ $threatAgentSubType->threat_agent_type_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Threat Agent Type" label_ar="رمز النوع  لعامل التهديد">
                    {{ $threatAgentSubType?->type?->threat_agent_type_name ?? '—' }}
                </x-info-col>

            </x-info-row>

        </div>

    </div>
@endsection
