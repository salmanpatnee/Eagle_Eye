@extends('4-Process.assets.layout.app')
@section('title', 'Asset Registration')
@section('title_ar', 'تسجيل الأصول')
@section('content')
    @php
        $ratingOptions = [1, 2, 3, 4, 5];
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $asset?->id ? 'Update' : 'New' }} Asset">
            <x-action.button label="View" label_ar="منظر" route_name="assets.index" />
        </x-table.action-wrapper>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="list-disc pl-5 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mb-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-4 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ isset($asset) ? route('assets.update', $asset->id) : route('assets.store') }}" method="POST">
            @csrf
            @if (isset($asset))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Asset Status ID" label_ar="رمز  الأصول" name="asset_id" required="true"
                            :readonly="$asset?->asset_id" placeholder="Enter Asset Status ID" :value="$asset?->asset_id" />
                    </div>
                    <div>
                        <x-form.field label="Asset Status Name" label_ar="اسم  الأصول" name="asset_name" required="true"
                            placeholder="Enter Asset Status Name" :value="$asset?->asset_name" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Asset Description" label_ar="وصف  الأصول" name="asset_description"
                    placeholder="Enter Asset Description" :value="$asset?->asset_description" />

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Asset IP Address" label_ar="عنوان IP للأصول" name="asset_ip_address"
                            placeholder="Enter Asset IP Address" :value="$asset?->asset_ip_address" />
                    </div>
                    <div>
                        <x-form.field label="Client Server Name" label_ar="اسم خادم الأصول" name="asset_host_name"
                            required="true" placeholder="Enter Client Server Name" :value="$asset?->asset_host_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field type="url" label="Asset URL" label_ar="رابط الأصول" name="asset_url"
                            placeholder="Enter Asset URL" :value="$asset?->asset_url" />
                    </div>
                    <div>
                        <x-form.multiselect label="Categories" required="true" label_ar="اسم الفئة" name="categories[]"
                            :value="$categoryIds" :data="$categories" id_key="category_id" value_key="category_name"
                            show_key="true" />
                    </div>
                </x-form.grid-col>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Group Name" label_ar="اسم مجموعة الأصول" name="asset_group_id"
                            placeholder="Select Asset Group" :value="$asset?->asset_group_id" :data="$assetGroups" id_key="asset_group_id"
                            value_key="asset_group_name" />
                    </div>
                    <div>
                        <x-form.select label="Classification Name" label_ar="اسم التصنيف" name="classification_id"
                            placeholder="Select Classification" :value="$asset?->classification_id" :data="$classifications"
                            id_key="classification_id" value_key="classification_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Type Name" label_ar="اسم نوع الأصل" name="asset_type_id"
                            placeholder="Select Asset Type" :value="$asset?->asset_type_id" :data="$assetTypes" id_key="asset_type_id"
                            value_key="asset_type_name" />
                    </div>
                    <div>
                        <x-form.select label="Asset Sub-Type Name" label_ar="اسم النوع الفرعي للأصول"
                            name="asset_sub_type_id" placeholder="Select Asset Sub-Type" :value="$asset?->asset_sub_type_id"
                            :data="$assetSubTypes" id_key="asset_sub_type_id" value_key="asset_sub_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Location Name" label_ar="اسم الموقع" name="location_id"
                            placeholder="Select Location" :value="$asset?->location_id" :data="$locations" id_key="location_id"
                            value_key="location_name" />
                    </div>
                    <div>
                        <x-form.select label="Asset Status Name" label_ar="اسم حالة الأصل" name="asset_status_id"
                            placeholder="Select Status" :value="$asset?->asset_status_id" :data="$assetStatus" id_key="asset_status_id"
                            value_key="asset_current_status" />
                    </div>
                </x-form.grid-col>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Confidentiality" label_ar="السرية" name="cs_confidentiality"
                            placeholder="Select Confidentiality" :value="$asset?->cs_confidentiality" :custom_data="$ratingOptions" />
                    </div>
                    <div>
                        <x-form.select label="Integrity" label_ar="النزاهة" name="cs_integrity"
                            placeholder="Select Confidentiality" :value="$asset?->cs_integrity" :custom_data="$ratingOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Availability" label_ar="التوافر" name="cs_availability"
                            placeholder="Select Availability" :value="$asset?->cs_availability" :custom_data="$ratingOptions" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Rating" label_ar="تقييم المخاطرة" name="risk_rating"
                            placeholder="Select Risk Rating" :value="$asset?->risk_rating" :custom_data="$ratingOptions" />
                    </div>
                    <div>
                        <x-form.select label="Regulatory Rating" label_ar="تقييم تنظيمات" name="cs_integrity"
                            placeholder="Select Regulatory Rating" :value="$asset?->cs_integrity" :custom_data="$ratingOptions" />
                    </div>
                </x-form.grid-col>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Critical Assets?"
                            label_ar="الأصول المرتبطة حصرا بالأصول الحساسة؟" name="critical_asset"
                            placeholder="Select Option" :value="$asset?->critical_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Cloud?"
                            label_ar="الأصول المرتبطة حصريًا بالسحابة؟" name="cloud_asset" placeholder="Select Option"
                            :value="$asset?->cloud_asset" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Telework?"
                            label_ar="الأصول مرتبطة حصريًا بالعمل عن بعد؟" name="telework_asset"
                            placeholder="Select Option" :value="$asset?->telework_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Social Media?"
                            label_ar="الأصول المرتبطة حصريًا بوسائل التواصل الاجتماعي؟" name="social_media_asset"
                            placeholder="Select Option" :value="$asset?->social_media_asset" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Data Privacy?"
                            label_ar="الأصول المرتبطة حصريًا خصوصية البيانات ؟" name="data_privacy_asset"
                            placeholder="Select Option" :value="$asset?->data_privacy_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to PII?"
                            label_ar="؟(PII) الأصول المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية" name="data_pii_asset"
                            placeholder="Select Option" :value="$asset?->data_pii_asset" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to PCI/DSS?"
                            label_ar="؟PCI/DSS الأصول المرتبطة حصريًا " name="pci_dss_asset" placeholder="Select Option"
                            :value="$asset?->pci_dss_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to E-Commerce?"
                            label_ar="الأصول المتعلقة حصرا بالتجارة الإلكترونية؟" name="e_commerce_asset"
                            placeholder="Select Option" :value="$asset?->e_commerce_asset" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Infrastructure?"
                            label_ar="الأصول المتعلقة حصرا بالبنية التحتية؟" name="infrastructure_assets"
                            placeholder="Select Option" :value="$asset?->infrastructure_assets" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Application?"
                            label_ar="الأصول المرتبطة حصرا بالتطبيق؟" name="application_assets"
                            placeholder="Select Option" :value="$asset?->application_assets" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to HR?"
                            label_ar="الأصول المتعلقة حصرا بالموارد البشرية؟" name="hr_asset" placeholder="Select Option"
                            :value="$asset?->hr_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Physical Security?"
                            label_ar="الأصول المتعلقة حصرا بالأمن المادي؟" name="physical_assets"
                            placeholder="Select Option" :value="$asset?->physical_assets" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Third Party?"
                            label_ar="الأصول المرتبطة حصرا بطرف خارجي؟" name="third_party_asset"
                            placeholder="Select Option" :value="$asset?->third_party_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Operational Technology?"
                            label_ar="الأصول المرتبطة حصريًا بالتكنولوجيا التشغيلية؟" name="operational_asset"
                            placeholder="Select Option" :value="$asset?->operational_asset" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Exclusively Related to E-Banking?"
                            label_ar="الأصول المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟" name="e_banking_asset"
                            placeholder="Select Option" :value="$asset?->e_banking_asset" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Asset Exclusively Related to Payments?"
                            label_ar="الأصول المرتبطة حصرا بالمدفوعات؟" name="payment_asset" placeholder="Select Option"
                            :value="$asset?->payment_asset" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Asset Status" label_ar="حالة الأصول" :isUpdate="$asset?->asset_status_id" />
                </div>
            </div>
        </form>
    </div>
@endsection
