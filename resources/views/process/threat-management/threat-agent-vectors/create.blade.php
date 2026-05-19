@extends('layouts.threat')
@section('title', 'Threat Agent Vectors')
@section('title_ar', 'ناقل وكيل التهديد')
@section('parent_url', route('threat-agent-vectors.index'))
@if(isset($threatAgentVector))
    @section('parent_title', 'Threat Agent Vectors')
    @section('breadcrumb_title', $threatAgentVector->threat_agent_vector_name)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $threatAgentVector?->id ? 'Update' : 'New' }} Threat Agent Vector">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-vectors.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($threatAgentVector) ? route('threat-agent-vectors.update', $threatAgentVector->id) : route('threat-agent-vectors.store') }}"
            method="POST">
            @csrf
            @if (isset($threatAgentVector))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Threat Agent Vector ID" label_ar="رمز ناقل وكيل التهديد"
                            name="threat_agent_vector_id" required="true" :readonly="$threatAgentVector?->threat_agent_vector_id"
                            placeholder="Enter Threat Agent Vector ID" :value="$threatAgentVector?->threat_agent_vector_id" />
                    </div>
                    <div>
                        <x-form.field label="Threat Agent Vector Name" label_ar="اسم  ناقل وكيل التهديد"
                            name="threat_agent_vector_name" required="true" placeholder="Enter Threat Agent Vector Name"
                            :value="$threatAgentVector?->threat_agent_vector_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Threat Agent Vector Description" label_ar="وصف  ناقل وكيل التهديد"
                    name="threat_agent_vector_description" placeholder="Enter Threat Agent Vector Description"
                    :value="$threatAgentVector?->threat_agent_vector_description" />





                <div class="flex justify-end">
                    <x-form.submit label="Threat Agent Vector" label_ar="ناقل وكيل التهديد" :isUpdate="$threatAgentVector?->id" />
                </div>
            </div>

        </form>
    </div>
@endsection
