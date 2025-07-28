@extends('layouts.risk')
@section('title', 'Risk Groups')
@section('title_ar', 'مجموعة المخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Group Details">
            <x-action.button label="View" label_ar="منظر" route_name="risk-groups.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risk-groups.edit" route_param="{{ $riskGroup->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk Group ID" label_ar="رمز مجموعة المخاطر">
                    {{ $riskGroup->risk_group_id }}
                </x-info-col>

                <x-info-col label="Risk Group Name" label_ar="اسم مجموعة المخاطر">
                    {{ $riskGroup->risk_group_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Group Description" label_ar="وصف مجموعة المخاطر">
                {{ $riskGroup->risk_group_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Risk Group Owner" label_ar="اسم صاحب مجموعة المخاطر">
                    {{ $riskGroup->owner->owner_name ?? '—' }}
                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
