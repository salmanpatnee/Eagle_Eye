@extends('layouts.threat')
@section('title', 'Threat Agents Types')
@section('title_ar', 'نوع وكيل التهديد')

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $threatAgentType?->id ? 'Update' : 'New' }} Threat Agent Type">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-types.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($threatAgentType) ? route('threat-agent-types.update', $threatAgentType->id) : route('threat-agent-types.store') }}"
            method="POST">
            @csrf
            @if (isset($threatAgentType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Threat Agent Type ID" label_ar="رمز النوع الوكيل التهديد"
                            name="threat_agent_type_id" required="true" :readonly="$threatAgentType?->threat_agent_type_id"
                            placeholder="Enter Threat Agent Type ID" :value="$threatAgentType?->threat_agent_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Threat Agent Type Name" label_ar="اسم النوع الوكيل التهديد"
                            name="threat_agent_type_name" required="true" placeholder="Enter Threat Agent Type Name"
                            :value="$threatAgentType?->threat_agent_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Threat Agent Type Description" label_ar="وصف النوع الوكيل التهديد"
                    name="threat_agent_type_description" placeholder="Enter Threat Agent Type Description"
                    :value="$threatAgentType?->threat_agent_type_description" />


                <div class="flex justify-end">
                    <x-form.submit label="Threat Agent Type" label_ar="النوع الوكيل التهديد" :isUpdate="$threatAgentType?->id" />
                </div>
            </div>

        </form>
    </div>
@endsection
