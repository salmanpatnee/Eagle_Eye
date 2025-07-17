@extends('4-Process.1-InitialSetup.layout.app')
@section('title', 'Main Domains')
@section('title_ar', 'المكون الأساسي')
@section('content')
    <div>
        <x-table.action-wrapper title="Main Domain Details">
            <x-action.button label="View" label_ar="منظر" route_name="domains.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="domains.edit" route_param="{{ $domain->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Main Domain ID" label_ar="رمز المكون الأساسي">
                    {{ $domain->main_domain_id }}
                </x-info-col>

                <x-info-col label="Main Domain Name" label_ar="اسم المكون الأساسي">
                    {{ $domain->main_domain_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col-lg label="Domain Description" label_ar="وصف المكون الأساسي">
                    {{ $domain->main_domain_description ?? '—' }}
                </x-info-col-lg>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Classification" label_ar="التصنيف">
                    {{ $domain->classification->classification_id ?? '—' }}
                </x-info-col>

                <x-info-col label="Best Practices" label_ar="أفضل الممارسات">

                    <x-list :data="$domain->bestPractices" id_key="best_practices_id" value_key="best_practices_name" />

                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
