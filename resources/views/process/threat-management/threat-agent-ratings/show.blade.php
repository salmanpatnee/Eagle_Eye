@extends('layouts.threat')
@section('title', 'Threat Agents Rating')
@section('title_ar', 'نقاط وكيل التهديد')

@section('content')
    <div>
        <x-table.action-wrapper title="Threat Agents Rating Details">
            <x-action.button label="View" label_ar="منظر" route_name="threat-agent-ratings.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="threat-agent-ratings.edit"
                route_param="{{ $threatAgentRating->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Threat Agents Rating ID" label_ar="رمز ناقل وكيل التهديد">
                    {{ $threatAgentRating->threat_agent_rating_id }}
                </x-info-col>
                <x-info-col label="Threat Agents Rating Name" label_ar="اسم ناقل وكيل التهديد">
                    {{ $threatAgentRating->threat_agent_rating_title }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Threat Agents Rating Description" label_ar="وصف ناقل وكيل التهديد">
                {{ $threatAgentRating->threat_agent_rating_description ?? '—' }}
            </x-info-col-lg>

        </div>

    </div>
@endsection
