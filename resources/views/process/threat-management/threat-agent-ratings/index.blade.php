@extends('layouts.threat')
@section('title', 'Threat Agents Rating')
@section('title_ar', 'نقاط وكيل التهديد')

@section('content')
    <div>

        <x-table.action-wrapper title="All Threat Agent Ratings">
            <x-action.button label="Add Threat Agents Rating" label_ar="نقاط وكيل التهديد"
                route_name="threat-agent-ratings.create" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="130" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Rating ID" label_ar="رمز نقاط وكيل التهديد" />
                <x-table.th label="Rating Name" label_ar="الاسم نقاط وكيل التهديد" />
                <x-table.th label="Rating Description" label_ar="وصف نقاط وكيل التهديد" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($threatAgentRatings as $threatAgentRating)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>{{ $threatAgentRating->threat_agent_rating_id }}</x-table.td>
                        <x-table.td>{{ $threatAgentRating->threat_agent_rating_title }}</x-table.td>
                        <x-table.td min-width="200px" max-width="500px"><span class="line-clamp-3" title="{{ $threatAgentRating->threat_agent_rating_description }}">{{ $threatAgentRating->threat_agent_rating_description }}</span></x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="threat-agent-ratings.show" param="{{ $threatAgentRating->id }}" />
                            <x-action.edit route_name="threat-agent-ratings.edit" param="{{ $threatAgentRating->id }}" />
                            <x-action.delete route_name="threat-agent-ratings.destroy"
                                param="{{ $threatAgentRating->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>

    </div>
@endsection
