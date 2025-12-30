@extends('layouts.artifact')
@section('title', 'Attachment Management')
@section('title_ar', 'إدارة المرفقات')
@section('content')
    @php
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ isset($artifact) ? 'Update' : 'New' }} Attachment">
            <x-action.button label="View" label_ar="منظر" route_name="artifacts.index" />
        </x-table.action-wrapper>



        <form action="{{ isset($artifact) ? route('artifacts.update', $artifact->id) : route('artifacts.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($artifact))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Artifact ID" label_ar="رمز المرفقات" name="artifact_id" required="true"
                            placeholder="Enter Artifact ID" :value="$artifact?->artifact_id ?? old('artifact_id')" :readonly="$artifact?->artifact_id" />
                    </div>
                    <div>
                        <x-form.field label="Artifact Name" label_ar="اسم المرفقات" name="artifact_name" required="true"
                            placeholder="Enter Artifact Name" :value="$artifact?->artifact_name ?? old('artifact_name')" />
                    </div>
                </x-form.grid-col>
                <x-form.textarea-field label="Artifact Description" label_ar="وصف المرفقات" name="artifact_description"
                    placeholder="Enter Artifact Description" :value="$artifact?->artifact_description ?? old('artifact_description')" />
                <x-form.grid-col>
                    <div>
                        <x-form.label label="Creation Date" label_ar="تاريخ إنشاء" for="evalutionDate" />
                        <div class="relative">
                            <input type="date" id="artifact_creation_date" name="artifact_creation_date" required
                                value="{{ old('artifact_creation_date', $artifact?->artifact_creation_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                    <div>
                        <x-form.field label="System Name" label_ar="اسم النظام" name="artifact_system_name"
                            placeholder="Enter Attachment System Name" :value="$artifact?->artifact_system_name ?? old('artifact_system_name')" />

                    </div>
                </x-form.grid-col>
                <div>

                    <x-form.label label="File Attachment" label_ar="إرفاق ملفات" for="fileAttachment" />
                    <input type="file" class="filepond" name="fileAttachment" multiple credits="false"
                        id="fileAttachment" {{ !isset($artifact?->id) ? 'required' : '' }}>
                </div>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification" label_ar="التصنيف" name="classification_id"
                            placeholder="Select Option" :value="$artifact?->classification_id ?? old('classification_id')" :data="$classifications" id_key="classification_id"
                            value_key="classification_name" />
                    </div>
                    <div>
                        <x-form.select label="Categories" label_ar="الفئة" name="category_id" placeholder="Select Option"
                            :value="$artifact?->category_id ?? old('category_id')" :data="$categories" id_key="category_id" value_key="category_name" />
                    </div>
                </x-form.grid-col>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Critical Assets?"
                            label_ar="المرفقات المرتبطة حصرا بالأصول الحساسة؟" name="artifact_critical_asset"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_critical_asset ?? old('artifact_critical_asset', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Cloud?"
                            label_ar="المرفقات المرتبطة حصريًا بالسحابة؟" name="artifact_cloud" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_cloud ?? old('artifact_cloud', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Telework?"
                            label_ar="المرفقات مرتبطة حصريًا بالعمل عن بعد؟" name="artifact_telework" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_telework ?? old('artifact_telework', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Social Media?"
                            label_ar="المرفقات المرتبطة حصريًا بوسائل التواصل الاجتماعي؟" name="artifact_social_media"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_social_media ?? old('artifact_social_media', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Data Privacy?"
                            label_ar="المرفقات المرتبطة حصريًا خصوصية البيانات ؟" name="artifact_data_privacy"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_data_privacy ?? old('artifact_data_privacy', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to PII?"
                            label_ar="؟(PII) المرفقات المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية" name="artifact_pii"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_pii ?? old('artifact_pii', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to PCI/DSS?"
                            label_ar="؟PCI/DSS المرفقات المرتبطة حصريًا" name="artifact_pci_dss" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_pci_dss ?? old('artifact_pci_dss', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to E-Commerce?"
                            label_ar="المرفقات المتعلقة حصرا بالتجارة الإلكترونية؟" name="artifact_e_commerce"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_e_commerce ?? old('artifact_e_commerce', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Infrastructure?"
                            label_ar="المرفقات المتعلقة حصرا بالبنية التحتية؟" name="artifact_infrastructure"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_infrastructure ?? old('artifact_infrastructure', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Application?"
                            label_ar="المرفقات المرتبطة حصرا بالتطبيق؟" name="artifact_application" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_application ?? old('artifact_application', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to HR?"
                            label_ar="المرفقات المتعلقة حصرا بالموارد البشرية؟" name="artifact_hr" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_hr ?? old('artifact_hr', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Physical Security?"
                            label_ar="المرفقات المتعلقة حصرا بالأمن المادي؟" name="artifact_physical_asset"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_physical_asset ?? old('artifact_physical_asset', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Third Party?"
                            label_ar="المرفقات المرتبطة حصرا بطرف خارجي؟" name="artifact_third_party" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_third_party ?? old('artifact_third_party', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Operational Technology?"
                            label_ar="المرفقات المرتبطة حصريًا بالتكنولوجيا التشغيلية؟" name="artifact_opertaional_tech"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_opertaional_tech ?? old('artifact_opertaional_tech', 'No')" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to Payments?"
                            label_ar="المرفقات المرتبطة حصرا بالمدفوعات؟" name="artifact_payment" :custom_data="$yesNoOptions"
                            :value="$artifact?->artifact_payment ?? old('artifact_payment', 'No')" />
                    </div>
                    <div>
                        <x-form.select label="Attachment Exclusively Related to E-Banking?"
                            label_ar="المرفقات المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟" name="artifact_e_banking"
                            :custom_data="$yesNoOptions" :value="$artifact?->artifact_e_banking ?? old('artifact_e_banking', 'No')" />
                    </div>
                </x-form.grid-col>
                <div class="flex justify-end">
                    <x-form.submit label="Attachment" label_ar="المرفق" :isUpdate="$artifact?->id" />
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputElement = document.querySelector('input[type="file"]');
            if (inputElement) {
                FilePond.create(inputElement).setOptions({
                    server: {
                        process: '/uploads',
                        revert: '/tmp/delete',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    },
                });
            }
        });
    </script>
@endpush
