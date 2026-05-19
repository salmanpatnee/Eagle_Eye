@extends('layouts.threat')
@section('title', 'Threat Agent Vectors')
@section('title_ar', 'ناقل وكيل التهديد')
@section('parent_title', 'Threat Agent Vectors')
@section('parent_url', route('threat-agent-vectors.index'))
@section('breadcrumb_title', $threatAgentVector->threat_agent_vector_name)

@section('content')
    <div>
        <x-table.action-wrapper title="Threat Agent Vector Details">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-vectors.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="threat-agent-vectors.edit"
                route_param="{{ $threatAgentVector->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Threat Agent Vector ID" label_ar="رمز ناقل وكيل التهديد">
                    {{ $threatAgentVector->threat_agent_vector_id }}
                </x-info-col>
                <x-info-col label="Threat Agent Vector Name" label_ar="اسم ناقل وكيل التهديد">
                    {{ $threatAgentVector->threat_agent_vector_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Threat Agent Vector Description" label_ar="وصف ناقل وكيل التهديد">
                {{ $threatAgentVector->threat_agent_vector_description ?? '—' }}
            </x-info-col-lg>

        </div>

    </div>
@endsection
