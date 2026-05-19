@extends('layouts.threat')
@section('title', 'Threat Agent Rating')
@section('title_ar', 'نقاط وكيل التهديد')
@section('parent_url', route('threat-agent-ratings.index'))
@if(isset($threatAgentRating))
    @section('parent_title', 'Threat Agents Rating')
    @section('breadcrumb_title', $threatAgentRating->threat_agent_rating_title)
@endif

@section('content')
    <div>
        <x-table.action-wrapper title="{{ $threatAgentRating?->id ? 'Update' : 'New' }} Threat Agent Rating">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-ratings.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($threatAgentRating) ? route('threat-agent-ratings.update', $threatAgentRating->id) : route('threat-agent-ratings.store') }}"
            method="POST">
            @csrf
            @if (isset($threatAgentRating))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Threat Agent Rating ID" label_ar="رمز نقاط وكيل التهديد"
                            name="threat_agent_rating_id" required="true" :readonly="$threatAgentRating?->threat_agent_rating_id"
                            placeholder="Enter Threat Agent Rating ID" :value="$threatAgentRating?->threat_agent_rating_id" />
                    </div>
                    <div>
                        <x-form.field label="Threat Agent Rating Name" label_ar="اسم نقاط وكيل التهديد"
                            name="threat_agent_rating_title" required="true" placeholder="Enter Threat Agent Rating Name"
                            :value="$threatAgentRating?->threat_agent_rating_title" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Threat Agent Rating Description" label_ar="وصف نقاط وكيل التهديد"
                    name="threat_agent_rating_description" placeholder="Enter Threat Agent Rating Description"
                    :value="$threatAgentRating?->threat_agent_rating_description" />






                <div class="flex justify-end">
                    <x-form.submit label="Threat Agent Rating" label_ar="نقاط وكيل التهديد" :isUpdate="$threatAgentRating?->id" />
                </div>
            </div>

        </form>
    </div>
@endsection
