@extends('layouts.control')
@section('title', 'Control Definition')
@section('title_ar', 'تعريف الضوابط')

@section('content')
    @php
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $control?->id ? 'Update' : 'New' }} Control">
            <x-action.button label="View" label_ar="منظر" route_name="controls.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($control) ? route('controls.update', $control->id) : route('controls.store') }}"
            method="POST">
            @csrf
            @if (isset($control))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Control ID" label_ar="رمز الضوابط" name="control_id" required="true"
                            :readonly="$control?->control_id" placeholder="Enter Control ID" :value="$control?->control_id" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Control Name" label_ar="اسم الضوابط" name="control_name" required="true"
                            placeholder="Enter Control Name" :value="$control?->control_name" />
                    </div>
                    <div>
                        <x-form.field label="Control Name Arabic" label_ar="اسم الضوابط العربية" name="control_name_ar"
                            placeholder="Enter Control Name Arabic" :value="$control?->control_name_ar" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Control Description" label_ar="وصف الضوابط" name="control_description"
                    placeholder="Enter Control Description" :value="$control?->control_description" />

                <x-form.textarea-field label="Control Description Arabic" label_ar="وصف الضوابط العربية"
                    name="control_description_ar" placeholder="Enter Control Description Arabic" :value="$control?->control_description_ar" />

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification Name" label_ar="اسم التصنيف" name="classification_id"
                            placeholder="Select Option" :value="old('classification_id', $control?->classification_id)" :data="$classifications" id_key="classification_id"
                            value_key="classification_name" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Owner Name" label_ar="اسم مالك الضوابط" name="owner_id"
                            placeholder="Select Option" :value="old('owner_id', $control?->owner_id)" :data="$owners" id_key="owner_role_id"
                            value_key="owner_name" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Level" label_ar="ضوابط مستوى" name="control_level_title"
                            placeholder="Select Option" :value="old('control_level_title', $control?->control_level_title)" :custom_data="['Main Control', 'Sub-Control']" />
                    </div>
                    <div>
                        <x-form.select label="Main Control" label_ar="ضوابط الرئيسي" name="control_parent"
                            placeholder="Select Option" :value="old('control_parent', $control?->control_parent)" :data="$controls" id_key="control_id"
                            value_key="control_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Type" label_ar="نوع الضوابط" name="control_type_id"
                            placeholder="Select Option" :value="old('control_type_id', $control?->control_type_id)" :data="$controlTypes" id_key="control_type_id"
                            value_key="control_type_name" required="true" />
                    </div>
                    <div>
                        <x-form.field label="Control Nature" label_ar="طبيعة الضوابط" name="control_nature"
                            placeholder="Enter Control Nature" :value="$control?->control_nature" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Criticality" label_ar="الضوابط الحساسة" name="control_criticality"
                            placeholder="Select Option" :value="old('control_criticality', $control?->control_criticality ?? 'No')" :custom_data="['No', 'Yes']" />
                    </div>
                    <div>
                        <x-form.field label="ISO Related Control" label_ar="الضوابط المتعلقة بمعيارإ يزو"
                            name="control_iso_name" placeholder="Enter ISO Related Control" :value="$control?->control_iso_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>

                    <div>
                        <x-form.field label="Control Reference" label_ar="مرجع الضوابط" name="control_reference"
                            placeholder="Enter Control Reference" :value="$control?->control_reference" />
                    </div>
                    <div>
                        <x-form.select label="Is Dependant" label_ar="هل هو تابع" name="is_parent_control"
                            placeholder="Select Option" :value="old('is_parent_control', $control?->is_parent_control ?? 'No')" :custom_data="['No', 'Yes']" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Implementation Mandatories" label_ar="التزامات التنفيذ"
                    name="implementation_mandatories" placeholder="Enter Implementation Mandatories" :value="$control?->implementation_mandatories" />

                <x-form.textarea-field label="Maturity Level Required" label_ar="مستوى النضج مطلوب" name="maturity_level"
                    placeholder="Enter Maturity Level Required" :value="$control?->maturity_level" />

                <x-form.textarea-field label="Implementation Guidelines" label_ar="إرشادات التنفيذ"
                    name="implementation_guidelines" placeholder="Enter Implementation Guidelines" :value="$control?->implementation_guidelines" />


                <x-form.textarea-field label="Control Dependency" label_ar="ضوابط التبعية" name="control_dependency"
                    placeholder="Enter Control Dependency" :value="$control?->control_dependency" />


                <x-form.grid-col>

                    <div>
                        <x-form.multiselect label="Categories" required="true" label_ar="اسم الفئة" name="categories[]"
                            :value="$categoryIds" :data="$categories" id_key="category_id" value_key="category_name"
                            show_key="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Best Practices" required="true" label_ar="أفضل الممارسات"
                            name="bestPractices[]" :value="$bestPracticeIds" :data="$bestPractices" id_key="best_practice_id"
                            value_key="best_practice_name" show_key="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>

                    <div>
                        <x-form.multiselect label="Custodians" required="true" label_ar="اسم الوصي" name="custodians[]"
                            :value="$custodianRoleIds" :data="$custodians" id_key="custodian_role_id"
                            value_key="custodian_role_title" show_key="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Domain" required="true" label_ar="المكون الأساسي" name="domains[]"
                            :value="$mainDomainIds" :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            show_key="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>

                    <div>
                        <x-form.multiselect label="Sub Domain" required="true" label_ar="المكون الفرعي"
                            name="subDomains[]" :value="$subDomainIds" :data="$subDomains" id_key="sub_domain_id"
                            value_key="sub_domain_name" show_key="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Risk" required="true" label_ar="المخاطر" name="risks[]"
                            :value="$riskIds" :data="$risks" id_key="risk_id" value_key="risk_name"
                            show_key="true" />
                    </div>
                </x-form.grid-col>



                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to Critical Assets?"
                            label_ar="الضوابط المرتبطة حصرا بالأصول الحساسة؟" name="control_critical_asset"
                            :value="old('control_critical_asset', $control?->control_critical_asset ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to Cloud?"
                            label_ar="الضوابط المرتبطة حصريًا بالسحابة؟" name="control_cloud" :value="old('control_cloud', $control?->control_cloud ?? 'No')"
                            :custom_data="['Yes', 'No', 'CST', 'CSP']" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to Telework?"
                            label_ar="الضوابط مرتبطة حصريًا بالعمل عن بعد؟" name="control_telework" :value="old('control_telework', $control?->control_telework ?? 'No')"
                            :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to Social Media?"
                            label_ar="الضوابط المرتبطة حصريًا بوسائل التواصل الاجتماعي؟" name="control_social_media"
                            :value="old('control_social_media', $control?->control_social_media ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to Data Privacy?"
                            label_ar="الضوابط المرتبطة حصريًا خصوصية البيانات ؟" name="control_data_privicy"
                            :value="old('control_data_privicy', $control?->control_data_privicy ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to PII?"
                            label_ar="؟(PII) الضوابط المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية" name="control_pii"
                            :value="old('control_pii', $control?->control_pii ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to PCI/DSS?"
                            label_ar="؟PCI/DSS الضوابط المرتبطة حصريًا" name="control_pci_dss" :value="old('control_pci_dss', $control?->control_pci_dss ?? 'No')"
                            :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to E-Commerce?"
                            label_ar="الضوابط المتعلقة حصرا بالتجارة الإلكترونية؟" name="control_e_commerce"
                            :value="old('control_e_commerce', $control?->control_e_commerce ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to Infrastructure?"
                            label_ar="الضوابط المتعلقة حصرا بالبنية التحتية؟" name="control_infrastructure"
                            :value="old('control_infrastructure', $control?->control_infrastructure ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to Application?"
                            label_ar="الضوابط المرتبطة حصرا بالتطبيق؟" name="control_application" :value="old('control_application', $control?->control_application ?? 'No')"
                            :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to HR?"
                            label_ar="الضوابط المتعلقة حصرا بالموارد البشرية؟" name="control_hr" :value="old('control_hr', $control?->control_hr ?? 'No')"
                            :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to Physical Security?"
                            label_ar="الضوابط المتعلقة حصرا بالأمن المادي؟" name="control_physical_security"
                            :value="old('control_physical_security', $control?->control_physical_security ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to Third Party?"
                            label_ar="الضوابط المرتبطة حصرا بطرف خارجي؟" name="control_third_party" :value="old('control_third_party', $control?->control_third_party ?? 'No')"
                            :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to Operational Technology?"
                            label_ar="الضوابط المرتبطة حصريًا بالتكنولوجيا التشغيلية؟" name="control_operational"
                            :value="old('control_operational', $control?->control_operational ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Control Exclusively Related to Payments?"
                            label_ar="الضوابط المرتبطة حصرا بالمدفوعات؟" name="control_payment" :value="old('control_payment', $control?->control_payment ?? 'No')"
                            :custom_data="$yesNoOptions" required="true" />
                    </div>
                    <div>
                        <x-form.select label="Control Exclusively Related to E-Banking?"
                            label_ar="الضوابط المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟" name="control_e_banking"
                            :value="old('control_e_banking', $control?->control_e_banking ?? 'No')" :custom_data="$yesNoOptions" required="true" />
                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Control" label_ar="الضوابط" :isUpdate="$control?->id" />
                </div>

            </div>
        </form>

    </div>
@endsection
