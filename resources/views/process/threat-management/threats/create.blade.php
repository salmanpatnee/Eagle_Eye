@extends('layouts.threat')
@section('title', 'Threat Agents')
@section('title_ar', 'وكلاء التهديد')
@section('parent_url', route('threat-agents.index'))
@if(isset($threatAgent))
    @section('parent_title', 'Threat Agents')
    @section('breadcrumb_title', $threatAgent->threat_agent_name)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $threatAgent?->id ? 'Update' : 'New' }} Threat Agent">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agents.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($threatAgent) ? route('threat-agents.update', $threatAgent->id) : route('threat-agents.store') }}"
            method="POST">
            @csrf
            @if (isset($threatAgent))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Threat Agent ID" label_ar="رمز وكلاء التهديد" name="threat_agent_id"
                            required="true" :readonly="$threatAgent?->threat_agent_id" placeholder="Enter Threat Agent ID" :value="$threatAgent?->threat_agent_id" />
                    </div>
                    <div>
                        <x-form.field label="Threat Agent Name" label_ar="اسم وكلاءالتهديد" name="threat_agent_name"
                            required="true" placeholder="Enter Threat Agent Name" :value="$threatAgent?->threat_agent_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Threat Agent Description" label_ar="وصف وكلاء التهديد"
                    name="threat_agent_description" placeholder="Enter Threat Agent Description" :value="$threatAgent?->threat_agent_description" />


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Threat Agent Type" label_ar="اسم نوع وكيل التهديد" name="threat_agent_type_id"
                            required="true" placeholder="Select Threat Agent Type" :value="$threatAgent?->threat_agent_type_id" :data="$threatAgentTypes"
                            id_key="threat_agent_type_id" value_key="threat_agent_type_name" />
                    </div>

                    <div>
                        <x-form.select label="Threat Agent Sub-Type" label_ar="اسم النوع الفرعي لعامل التهديد"
                            name="threat_agent_sub_type_id" required="true" placeholder="Select Threat Agent Sub-Type"
                            :value="$threatAgent?->threat_agent_sub_type_id" :data="$threatAgentSubTypes" id_key="threat_agent_sub_type_id"
                            value_key="threat_agent_sub_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Threat Agent Rating Title" label_ar="عنوان نقاط وكيل التهديد"
                            name="threat_agent_rating_id" required="true" placeholder="Select Threat Agent Rating Title"
                            :value="$threatAgent?->threat_agent_rating_id" :data="$threatAgentRatings" id_key="threat_agent_rating_id"
                            value_key="threat_agent_rating_title" />
                    </div>

                    <div>
                        <x-form.multiselect label="Vector Name" show_key="true" required="true"
                            label_ar="اسم ناقل وكيل التهديد" name="vectors[]" :value="$threatAgentVectorIds" :data="$threatAgentVectors"
                            id_key="threat_agent_vector_id" value_key="threat_agent_vector_name" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Threat Agent" label_ar="وكلاء التهديد" :isUpdate="$threatAgent?->id" />
                </div>
            </div>
        </form>

    </div>
@endsection
