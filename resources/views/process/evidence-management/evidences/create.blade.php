@extends('layouts.evidence')
@section('title', 'Evidence Management')
@section('title_ar', 'إدارة الأدلة')
@section('content')
    @php
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ isset($evidence) ? 'Update' : 'New' }} Evidence">
            <x-action.button label="View" label_ar="منظر" route_name="evidences.index" />
        </x-table.action-wrapper>

        @if ($errors->any())
            <div class="mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input:</span>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ isset($evidence) ? route('evidences.update', $evidence->id) : route('evidences.store') }}"
            method="POST">
            @csrf
            @if (isset($evidence))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Evidence ID" label_ar="رمز الأدلة" name="evidence_id" required="true"
                            placeholder="Enter Evidence ID" :value="$evidence?->evidence_id ?? old('evidence_id')" :readonly="$evidence?->evidence_id" />
                    </div>
                    <div>
                        <x-form.field label="Evidence Name" label_ar="اسم الأدلة" name="evidence_name" required="true"
                            placeholder="Enter Evidence Name" :value="$evidence?->evidence_name ?? old('evidence_name')" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Evidence Description" label_ar="وصف الأدلة" name="evidence_description"
                    placeholder="Enter Evidence Description" :value="$evidence?->evidence_description ?? old('evidence_description')" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id"
                            placeholder="Select Option" :value="$evidence?->classification_id ?? old('classification_id')" :data="$classifications" id_key="classification_id"
                            value_key="classification_name" />
                    </div>
                    <div>
                        <x-form.multiselect label="Categories" label_ar="اسم الفئة" name="categories[]" :value="$categoryIds"
                            :data="$categories" id_key="category_id" value_key="category_name" required="true" />

                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Nature" label_ar="طبيعة الأدلة" name="evidence_nature"
                            :custom_data="['Document', 'Record']" :value="$evidence?->evidence_nature ?? old('evidence_nature', 'Document')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Type" label_ar="نوع الأدلة" name="evidence_type" :custom_data="['Document', 'Screenshot']"
                            :value="$evidence?->evidence_type ?? old('evidence_type', 'Document')" />
                    </div>
                </x-form.grid-col>

                <x-form.textarea-field label="Evidence Source" label_ar="مصدر الأدلة" name="evidence_source"
                    placeholder="Enter Evidence Source" :value="$evidence?->evidence_source ?? old('evidence_source')" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Owner Name" label_ar="اسم مالك" name="owner_id" placeholder="Select Option"
                            :value="$evidence?->owner_id ?? old('owner_id')" :data="$owners" id_key="owner_role_id" value_key="owner_name"
                            required="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Artifact
                            Name" label_ar="اسم المرفقات"
                            name="attachments[]" :value="$selectedArtifactIds" :data="$artifacts" id_key="artifact_id"
                            value_key="artifact_name" show_key="true" required="true" />

                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Mapping Controls" label_ar="ضوابط رسم الخرائط" name="controls[]"
                            :value="$selectedControlIds" :data="$controls" id_key="control_id" value_key="control_name"
                            show_key="true" required="true" />

                    </div>
                    <div>

                    </div>
                </x-form.grid-col>


            </div>
            {{-- <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Owner" label_ar="التصنيف" name="owner_id" :value="$evidence?->owner_id ?? old('owner_id')"
                            :data="$owners" id_key="owner_role_id" value_key="owner_name" />
                    </div>
                    <div>
                        <x-form.select label="Artifact Name" label_ar="اسم المرفقات" name="category_id"
                            placeholder="Select Option" :value="$evidence?->category_id ?? old('category_id')" :data="$categories" id_key="category_id"
                            value_key="category_name" />
                    </div>
                </x-form.grid-col>
            </div> --}}
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Critical Assets?"
                            label_ar="الأدلة المرتبطة حصرا بالأصول الحساسة؟" name="evidence_critical_asset"
                            :custom_data="$yesNoOptions" :value="$evidence?->evidence_critical_asset ?? old('evidence_critical_asset', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Cloud?"
                            label_ar="الأدلة المرتبطة حصريًا بالسحابة؟" name="evidence_cloud" :custom_data="$yesNoOptions"
                            :value="$evidence?->evidence_cloud ?? old('evidence_cloud', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Telework?"
                            label_ar="الأدلة مرتبطة حصريًا بالعمل عن بعد؟" name="evidence_telework   " :custom_data="$yesNoOptions"
                            :value="$evidence?->evidence_telework ?? old('evidence_telework ', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Social Media?"
                            label_ar="الأدلة المرتبطة حصريًا بوسائل التواصل الاجتماعي؟" name="Evidence_social_media"
                            :custom_data="$yesNoOptions" :value="$evidence?->Evidence_social_media ?? old('Evidence_social_media', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Data Privacy?"
                            label_ar="الأدلة المرتبطة حصريًا خصوصية البيانات ؟" name="Evidence_data_privacy"
                            :custom_data="$yesNoOptions" :value="$evidence?->Evidence_data_privacy ?? old('Evidence_data_privacy', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to PII?"
                            label_ar="؟(PII) الأدلة المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية" name="evidence_pii"
                            :custom_data="$yesNoOptions" :value="$evidence?->evidence_pii ?? old('evidence_pii', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to PCI/DSS?"
                            label_ar="؟PCI/DSS الأدلة المرتبطة حصريًا" name="evidence_pci_dss" :custom_data="$yesNoOptions"
                            :value="$evidence?->evidence_pci_dss ?? old('evidence_pci_dss', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to E-Commerce?"
                            label_ar="الأدلة المتعلقة حصرا بالتجارة الإلكترونية؟" name="Evidence_e_commerce"
                            :custom_data="$yesNoOptions" :value="$evidence?->Evidence_e_commerce ?? old('Evidence_e_commerce', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Infrastructure?"
                            label_ar="الأدلة المتعلقة حصرا بالبنية التحتية؟" name="Evidence_infrastructure"
                            :custom_data="$yesNoOptions" :value="$evidence?->Evidence_infrastructure ?? old('Evidence_infrastructure', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Application?"
                            label_ar="الأدلة المرتبطة حصرا بالتطبيق؟" name="Evidence_application" :custom_data="$yesNoOptions"
                            :value="$evidence?->Evidence_application ?? old('Evidence_application', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to HR?"
                            label_ar="الأدلة المتعلقة حصرا بالموارد البشرية؟" name="Evidence_hr" :custom_data="$yesNoOptions"
                            :value="$evidence?->Evidence_hr ?? old('Evidence_hr', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Physical Security?"
                            label_ar="الأدلة المتعلقة حصرا بالأمن المادي؟" name="physical_security" :custom_data="$yesNoOptions"
                            :value="$evidence?->physical_security ?? old('physical_security', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Third Party?"
                            label_ar="الأدلة المرتبطة حصرا بطرف خارجي؟" name="third_party" :custom_data="$yesNoOptions"
                            :value="$evidence?->third_party ?? old('third_party', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Operational Technology?"
                            label_ar="الأدلة المرتبطة حصريًا بالتكنولوجيا التشغيلية؟" name="operational_technology"
                            :custom_data="$yesNoOptions" :value="$evidence?->operational_technology ?? old('operational_technology', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to Payments?"
                            label_ar="الأدلة المرتبطة حصرا بالمدفوعات؟" name="payment" :custom_data="$yesNoOptions"
                            :value="$evidence?->payment ?? old('payment', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Evidence Exclusively Related to E-Banking?"
                            label_ar="الأدلة المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟" name="e_banking"
                            :custom_data="$yesNoOptions" :value="$evidence?->e_banking ?? old('e_banking', 'No')" />
                    </div>
                </x-form.grid-col>
                <div class="flex justify-end">
                    <x-form.submit label="Evidence" label_ar="المرفق" :isUpdate="$evidence?->id" />
                </div>
            </div>
        </form>
    </div>
@endsection
