@extends('layouts.risk')
@section('title', 'Risk Identification')
@section('title_ar', 'تحديد المخاطر')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risks">
            <x-action.button label="Add Risk" label_ar="إضافة المخاطر" route_name="risks.create" />
        </x-table.action-wrapper>

        <form action="{{ route('risks.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.multiselect label="Risk" label_ar="المخاطر" name="risk[]"
                            :data="$riskNames" id_key="risk_id" value_key="risk_name"
                            :value="$risk" :show_key="true" />
                    </div>
                    <div>
                        <x-form.select label="Risk Group" label_ar="مجموعة المخاطر" name="group"
                            placeholder="Select Risk Group" :value="$group" :data="$riskGroups" id_key="risk_group_id"
                            value_key="risk_group_name" searchable />
                    </div>
                    <div>
                        <x-form.select label="Owner" label_ar="صاحب الضوابط" name="owner" placeholder="Select Owner"
                            :value="$owner" :data="$owners" id_key="owner_role_id" value_key="owner_name" searchable />
                    </div>
                </x-form.grid-3-col>
                <div class="flex justify-center gap-3">
                    <button class="action-btn text-center justify-center">Filter Risks</button>
                    <a href="{{ route('risks.index') }}" class="action-btn text-center justify-center">Clear Filters</a>
                </div>
            </div>
        </form>

        <x-table.scroll-table height-offset="280" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk ID" label_ar="رمز تحديد المخاطر" />
                <x-table.th label="Risk Name" label_ar="اسم تحديد المخاطر" />
                <x-table.th label="Risk Group" label_ar="اسم مجموعة المخاطر" />
                <x-table.th label="Owner" label_ar="اسم صاحب المخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($risks as $risk)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$risks" />
                        </x-table.td>
                        <x-table.td>{{ $risk->risk_id }}</x-table.td>
                        <x-table.td min-width="300px" max-width="800px" title="{{ $risk->risk_name }}">
                            {{ $risk->risk_name }}
                        </x-table.td>
                        <x-table.td min-width="210px" max-width="210px">
                            {{ $risk?->group?->risk_group_name }}
                        </x-table.td>
                        <x-table.td min-width="210px" max-width="210px">
                            {{ $risk?->owner?->owner_name }}
                        </x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risks.show" param="{{ $risk->id }}" />
                            <x-action.edit route_name="risks.edit" param="{{ $risk->id }}" />
                            <x-action.delete route_name="risks.destroy" param="{{ $risk->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>
        <x-pagination>
            {{ $risks->links() }}
        </x-pagination>

       
    </div>
@endsection
