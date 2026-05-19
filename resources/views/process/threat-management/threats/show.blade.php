@extends('layouts.threat')
@section('title', 'Threat Agents')
@section('title_ar', 'وكلاء التهديد')
@section('parent_title', 'Threat Agents')
@section('parent_url', route('threat-agents.index'))
@section('breadcrumb_title', $threatAgent->threat_agent_name)

@section('content')
    <div>
        <x-table.action-wrapper title="Threat Agent Details">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agents.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="threat-agents.edit"
                route_param="{{ $threatAgent->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Threat Agent ID" label_ar="رمز وكلاءالتهديد">
                    {{ $threatAgent->threat_agent_id }}
                </x-info-col>
                <x-info-col label="Threat Agent Name" label_ar="اسم وكلاءالتهديد">
                    {{ $threatAgent->threat_agent_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Threat Agent Description" label_ar="وصف وكلاءالتهديد">
                {{ $threatAgent->threat_agent_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Threat Agent Type Name" label_ar="اسم نوع وكيل التهديد">
                    {{ $threatAgent?->type?->threat_agent_type_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Threat Agent Sub-Type Name" label_ar="اسم النوع الفرعي لعامل التهديد">
                    {{ $threatAgent?->subType?->threat_agent_sub_type_name ?? '—' }}
                </x-info-col>

            </x-info-row>

            <x-info-row>
                <x-info-col label="Threat Agent Rating Title" label_ar="عنوان نقاط وكيل التهديد">
                    {{ $threatAgent?->rating?->threat_agent_rating_title ?? '—' }}
                </x-info-col>
                <x-info-col label="Threat Agent Vector Name" label_ar="ناقل وكيل التهديد">
                    <x-list :data="$threatAgent?->vectors" id_key="threat_agent_vector_id" value_key="threat_agent_vector_name" />
                </x-info-col>

            </x-info-row>

        </div>

    </div>
@endsection
