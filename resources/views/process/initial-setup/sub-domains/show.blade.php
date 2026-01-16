@extends('process/initial-setup/layout/app')
@section('title', 'Sub-Domains Setup')
@section('title_ar', 'إعداد المكون الفرعي')
@section('content')
    <div>
        <x-table.action-wrapper title="Sub-Domain Details">
            <x-action.button label="View" label_ar="منظر" route_name="sub-domains.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="sub-domains.edit" route_param="{{ $subDomain->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Sub-Domain ID" label_ar="رمز المكون الفرعي">
                    {{ $subDomain->sub_domain_id }}
                </x-info-col>

                <x-info-col label="Sub-Domain Name" label_ar="اسم المكون الفرعي">
                    {{ $subDomain->sub_domain_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Sub-Domain Description" label_ar="وصف المكون الفرعي">
                {{ $subDomain->sub_domain_description ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Classification" label_ar="التصنيف">
                    {{ $subDomain->classification->classification_id ?? '—' }}
                </x-info-col>

                <x-info-col label="Best Practices" label_ar="أفضل الممارسات">

                    <x-list :data="$subDomain->bestPractices" id_key="best_practice_id" value_key="best_practice_name" />

                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Domains" label_ar="المكون الأساسي">
                    {{ $subDomain->domain->main_domain_name ?? '—' }}
                </x-info-col>

                <x-info-col label="Categories" label_ar="اسم الفئة">

                    <x-list :data="$subDomain->categories" id_key="category_id" value_key="category_name" />

                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
