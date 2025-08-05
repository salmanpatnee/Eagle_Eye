@extends('layouts.threat')
@section('title', 'Threat Agent Sub-Types')
@section('title_ar', 'النوع الفرعي الوكيل التهديد')

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $threatAgentSubType?->id ? 'Update' : 'New' }} Threat Agent Sub-Type">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-sub-types.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($threatAgentSubType) ? route('threat-agent-sub-types.update', $threatAgentSubType->id) : route('threat-agent-sub-types.store') }}"
            method="POST">
            @csrf
            @if (isset($threatAgentSubType))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Threat Agent Sub-Type ID" label_ar="رمز النوع الفرعي الوكيل التهديد"
                            name="threat_agent_sub_type_id" required="true" :readonly="$threatAgentSubType?->threat_agent_sub_type_id"
                            placeholder="Enter Threat Agent Sub-Type ID" :value="$threatAgentSubType?->threat_agent_sub_type_id" />
                    </div>
                    <div>
                        <x-form.field label="Threat Agent Sub-Type Name" label_ar="اسم النوع الفرعي الوكيل التهديد"
                            name="threat_agent_sub_type_name" required="true" placeholder="Enter Threat Agent Sub-Type Name"
                            :value="$threatAgentSubType?->threat_agent_sub_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Threat Agent Sub-Type Description" label_ar="وصف النوع الفرعي الوكيل التهديد"
                    name="threat_agent_type_description" placeholder="Enter Threat Agent Sub-Type Description"
                    :value="$threatAgentSubType?->threat_agent_type_description" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Threat Agent Types" label_ar="النوع لعامل التهديد" name="threat_agent_type_id"
                            required="true" :value="$threatAgentSubType?->threat_agent_type_id" :data="$threatAgentTypes" id_key="threat_agent_type_id"
                            value_key="threat_agent_type_name" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>




                <div class="flex justify-end">
                    <x-form.submit label="Threat Agent Sub-Type" label_ar="النوع الفرعي الوكيل التهديد" :isUpdate="$threatAgentSubType?->id" />
                </div>
            </div>

        </form>
    </div>
@endsection
