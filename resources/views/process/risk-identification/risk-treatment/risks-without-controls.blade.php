@extends('layouts.app-full')
@section('title', 'Risks Without Controls')
@section('content')
    <div>
        <x-table.action-wrapper title="Risks Without Controls">
            <x-action.button label="Risk vs Control" label_ar="الضوابط مقابل الأدلة" route_name="risk-vs-control.index" />
            <x-action.button label="Control vs Risk" label_ar="تقرير معالجة المخاطر" route_name="control-vs-risk.index" />
            <x-action.button label="Risks Without Controls" route_name="risks-without-controls.index" disabled
                class="opacity-75" />
        </x-table.action-wrapper>

        <x-table.scroll-table height-offset="250" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" />
                <x-table.th label="Risk ID" />
                <x-table.th label="Risk Name" />
                <x-table.th label="Owner" />
                <x-table.th label="Risk Group" />
                <x-table.th label="Inherent Score" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($risks as $risk)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$risks" /></x-table.td>
                        <x-table.td><a href="{{ route('risks.show', $risk->id) }}"
                                target="_blank">{{ $risk->risk_id }}</a></x-table.td>
                        <x-table.td min-width="200px" max-width="400px">{{ $risk->risk_name }}</x-table.td>
                        <x-table.td>{{ $risk->owner?->owner_name ?? '—' }}</x-table.td>
                        <x-table.td>{{ $risk->group?->risk_group_name ?? '—' }}</x-table.td>
                        <x-table.td>{{ $risk->inherent?->risk_inherent_score ?? '—' }}</x-table.td>
                    </tr>
                @empty
                    <tr>
                        <x-table.td colspan="6">No risks without controls found.</x-table.td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $risks->links() }}
        </x-pagination>
    </div>
@endsection
