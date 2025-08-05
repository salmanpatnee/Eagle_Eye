@extends('layouts.asset')
@section('title', 'Asset Registration')
@section('title_ar', 'تسجيل الأصول')
@section('content')
    <div>
        <x-table.action-wrapper title="Asset Details">
            <x-action.button label="View" label_ar="منظر" route_name="assets.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="assets.edit" route_param="{{ $asset->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Asset ID" label_ar="رمز الأصول">
                    {{ $asset->asset_id }}
                </x-info-col>
                <x-info-col label="Asset Name" label_ar="اسم الأصول">
                    {{ $asset->asset_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Asset Description" label_ar="وصف الأصول">
                {{ $asset->asset_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Asset IP Address" label_ar="عنوان IP للأصول">
                    {{ $asset->asset_ip_address }}
                </x-info-col>
                <x-info-col label="Client Server Name" label_ar="اسم خادم الأصول">
                    {{ $asset->asset_host_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset URL" label_ar="عنوان URL للأصول">
                    {{ $asset->asset_url }}
                </x-info-col>
                <x-info-col label="Categories" label_ar="اسم فئة">
                    <x-list :data="$asset->categories" id_key="category_id" value_key="category_name" />
                </x-info-col>
            </x-info-row>
        </div>
        <div class="border-gray-100 border-t p-3 pt-5">

            <x-info-row>
                <x-info-col label="Asset Group Name" label_ar="اسم مجموعة الأصول">
                    {{ $asset->assetGroup?->asset_group_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $asset->classification?->classification_id ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Type Name" label_ar="اسم نوع الأصل">
                    {{ $asset->assetType?->asset_type_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Sub-Type Name" label_ar="اسم النوع الفرعي للأصول">
                    {{ $asset->assetSubType?->asset_sub_type_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $asset->location?->location_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Status Name" label_ar="اسم حالة الأصل">
                    {{ $asset->assetStatus?->asset_current_status ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <div class="border-gray-100 border-t p-3 pt-5">

            <x-info-row>
                <x-info-col label="Confidentiality" label_ar="السرية">
                    {{ $asset->cs_confidentiality ?? '—' }}
                </x-info-col>
                <x-info-col label="Integrity" label_ar="النزاهة">
                    {{ $asset->cs_integrity ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Availability" label_ar="التوافر">
                    {{ $asset->cs_availability ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <div class="border-gray-100 border-t p-3 pt-5">
            <x-info-row>
                <x-info-col label="Risk Rating" label_ar="تقييم المخاطرة">
                    {{ $asset->risk_rating ?? '—' }}
                </x-info-col>
                <x-info-col label="Regulatory Rating" label_ar="تقييم تنظيمات">
                    {{ $asset->regulatory_rating ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <div class="border-gray-100 border-t p-3 pt-5">

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Critical Assets?"
                    label_ar="الأصول المرتبطة حصرا بالأصول الحساسة؟">
                    {{ $asset->critical_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Cloud?" label_ar="الأصول المرتبطة حصريًا بالسحابة؟">
                    {{ $asset->cloud_asset ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Telework?" label_ar="الأصول مرتبطة حصريًا بالعمل عن بعد؟">
                    {{ $asset->telework_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Social Media?"
                    label_ar="الأصول المرتبطة حصريًا بوسائل التواصل الاجتماعي؟">
                    {{ $asset->social_media_asset ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Data Privacy?"
                    label_ar="الأصول المرتبطة حصريًا خصوصية البيانات ؟">
                    {{ $asset->data_privacy_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to PII?"
                    label_ar="؟(PII) الأصول المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية">
                    {{ $asset->data_pii_asset ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to PCI/DSS?" label_ar="؟PCI/DSS الأصول المرتبطة حصريًا ">
                    {{ $asset->pci_dss_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to E-Commerce?"
                    label_ar="الأصول المتعلقة حصرا بالتجارة الإلكترونية؟">
                    {{ $asset->e_commerce_asset ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Infrastructure?"
                    label_ar="الأصول المتعلقة حصرا بالبنية التحتية؟">
                    {{ $asset->infrastructure_assets ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Application?" label_ar="الأصول المرتبطة حصرا بالتطبيق؟">
                    {{ $asset->application_assets ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to HR?" label_ar="الأصول المتعلقة حصرا بالموارد البشرية؟">
                    {{ $asset->hr_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Physical Security?"
                    label_ar="الأصول المتعلقة حصرا بالأمن المادي؟">
                    {{ $asset->physical_assets ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Third Party?" label_ar="الأصول المرتبطة حصرا بطرف خارجي؟">
                    {{ $asset->third_party_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Operational Technology?"
                    label_ar="الأصول المرتبطة حصريًا بالتكنولوجيا التشغيلية؟">
                    {{ $asset->operational_asset ?? '—' }}
                </x-info-col>
            </x-info-row>
            <x-info-row>
                <x-info-col label="Asset Exclusively Related to E-Banking?"
                    label_ar="الأصول المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟">
                    {{ $asset->e_banking_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Payments?" label_ar="الأصول المرتبطة حصرا بالمدفوعات؟">
                    {{ $asset->payment_asset ?? '—' }}
                </x-info-col>
            </x-info-row>



        </div>
    </div>
@endsection
