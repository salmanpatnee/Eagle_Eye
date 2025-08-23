@extends('layouts.risk')
@section('title', 'Risk Identification')
@section('title_ar', 'تحديد المخاطر')

@section('content')
    @php
        $yesNoOptions = ['Yes', 'No'];
    @endphp
    <div>
        <x-table.action-wrapper title="{{ $risk?->id ? 'Update' : 'New' }} Risk">
            <x-action.button label="View" label_ar="منظر" route_name="risks.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($risk) ? route('risks.update', $risk->id) : route('risks.store') }}" method="POST">
            @csrf
            @if (isset($risk))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk ID" label_ar="رمز المخاطر" name="risk_id" required="true" :readonly="$risk?->risk_id"
                            placeholder="Enter Risk ID" :value="$risk?->risk_id" />
                    </div>
                    <div>
                        <x-form.field label="Risk Name" label_ar="اسم المخاطر" name="risk_name" required="true"
                            placeholder="Enter Risk Name" :value="$risk?->risk_name" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Risk Description" label_ar="وصف المخاطر" name="risk_description"
                    placeholder="Enter Risk Description" :value="$risk?->risk_description" />

                <x-form.textarea-field label="Risk Objectives" label_ar="أهداف المخاطر" name="risk_objectives"
                    placeholder="Enter Risk Objectives" :value="$risk?->risk_objectives" />

                <x-form.textarea-field label="Risk Profile" label_ar="تفاصيل المخاطر" name="risk_profile"
                    placeholder="Enter Risk Profile" :value="$risk?->risk_profile" />


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Group Name" label_ar="اسم مجموعة المخاطر" name="risk_group_id"
                            required="true" :value="$risk?->risk_group_id" :data="$riskGroupNames" id_key="risk_group_id"
                            value_key="risk_group_name" />
                    </div>
                    <div>
                        <x-form.select label="Risk Owner Name" label_ar="اسم صاحب المخاطر" name="owner_id" required="true"
                            :value="$risk?->owner_id" :data="$riskOwnerNames" id_key="owner_role_id" value_key="owner_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Type Name" label_ar="اسم نوع المخاطر" name="risk_type_id" required="true"
                            :value="$risk?->risk_type_id" :data="$riskTypeNames" id_key="risk_type_id" value_key="risk_type_name" />
                    </div>
                    <div>
                        <x-form.select label="Risk Sub-Type Name" label_ar="اسم النوع الفرعي للمخاطر"
                            name="risk_sub_type_id" required="true" :value="$risk?->risk_sub_type_id" :data="$riskSubTypeNames"
                            id_key="risk_sub_type_id" value_key="risk_sub_type_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Classification Name" label_ar="اسم التصنيف" name="classification_id"
                            required="true" :value="$risk?->classification_id" :data="$riskClassNames" id_key="classification_id"
                            value_key="classification_name" />
                    </div>
                    <div>
                        <x-form.multiselect label="Threat Agents" required="true" label_ar="وكيل التهديد"
                            name="threatAgents[]" :value="$threatAgentIds" :data="$threatAgents" id_key="threat_agent_id"
                            value_key="threat_agent_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Vulnerabilities" required="true" label_ar="نقاط الضعف"
                            name="vulnerability[]" :value="$vulnerabilityIds" :data="$vulnerabilities" id_key="va_id"
                            value_key="va_name" />
                    </div>
                    <div>
                        <x-form.multiselect label="Categories" required="true" label_ar="فئات" name="category[]"
                            :value="$categoryIds" :data="$categories" id_key="category_id" value_key="category_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Asset Group" required="true" label_ar="مجموعة الأصول" name="assetGroup[]"
                            :value="$assetGroupIds" :data="$assetGroups" id_key="asset_group_id" value_key="asset_group_name" />
                    </div>
                    <div>
                        <x-form.multiselect label="Key Risk Indicators" required="true" label_ar="مؤشرات المخاطر الرئيسية"
                            name="kri[]" :value="$kriIds" :data="$keyRiskIndicators" id_key="key_risk_indicator_id"
                            value_key="key_risk_indicator_value" show_key="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Key Performance Indicator" required="true" label_ar="مؤشر الأداء الرئيسي"
                            name="kpi[]" :value="$kpiIds" :data="$keyPerformancekIndicators" id_key="key_performance_indicatory_id"
                            value_key="key_performance_indicatory_value" show_key="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Risk Acceptance" required="true" label_ar="قبول المخاطر"
                            name="riskAcceptance[]" :value="$riskAcceptanceIds" :data="$riskAcceptances" id_key="risk_acceptance_id"
                            value_key="risk_acceptance_source" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Department" required="true" label_ar="قسم" name="department[]"
                            :value="$departmentIds" :data="$departments" id_key="department_id" value_key="department_name" />
                    </div>
                    <div>
                        <x-form.multiselect label="Custodian Name" required="true" label_ar="اسم الوصي"
                            name="custodians[]" :value="$custodianIds" :data="$custodians" id_key="custodian_role_id"
                            value_key="custodian_role_title" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Inherent Score" label_ar="المخاطر الكامنة" name="risk_inherent_id"
                            required="true" :value="$risk?->risk_inherent_id" :data="$riskInherent" id_key="risk_inherent_id"
                            value_key="risk_inherent_score" />
                    </div>
                    <div>
                        <x-form.field label="Risk Consequences" label_ar="آثار المخاطر" name="risk_consequences"
                            required="true" placeholder="Enter Risk Consequences" :value="$risk?->risk_consequences" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Critical Assets?"
                            label_ar="المخاطر المرتبطة حصرا بالأصول الحساسة؟" name="risk_critical_asset"
                            :value="old('risk_critical_asset', $risk?->risk_critical_asset)" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Cloud?"
                            label_ar="المخاطر المرتبطة حصريًا بالسحابة؟" name="risk_cloud" :value="old('risk_cloud', $risk?->risk_cloud)"
                            :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Telework?"
                            label_ar="المخاطر مرتبطة حصريًا بالعمل عن بعد؟" name="risk_telework" :value="old('risk_telework', $risk?->risk_telework)"
                            :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Social Media?"
                            label_ar="المخاطر المرتبطة حصريًا بوسائل التواصل الاجتماعي؟" name="risk_social_media"
                            :value="old('risk_social_media', $risk?->risk_social_media)" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Data Privacy?"
                            label_ar="المخاطر المرتبطة حصريًا خصوصية البيانات ؟" name="risk_data_privicy"
                            :value="old('risk_data_privicy', $risk?->risk_data_privicy)" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to PII?"
                            label_ar="؟(PII) المخاطر المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية" name="risk_pii"
                            :value="old('risk_pii', $risk?->risk_pii)" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to PCI/DSS?"
                            label_ar="؟PCI/DSS المخاطر المرتبطة حصريًا" name="risk_pci_dss" :value="old('risk_pci_dss', $risk?->risk_pci_dss)"
                            :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to E-Commerce?"
                            label_ar="المخاطر المتعلقة حصرا بالتجارة الإلكترونية؟" name="risk_e_commerce"
                            :value="old('risk_e_commerce', $risk?->risk_e_commerce)" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Infrastructure?"
                            label_ar="المخاطر المتعلقة حصرا بالبنية التحتية؟" name="risk_infrastructure"
                            :value="old('risk_infrastructure', $risk?->risk_infrastructure)" :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Application?"
                            label_ar="المخاطر المرتبطة حصرا بالتطبيق؟" name="risk_application" :value="old('risk_application', $risk?->risk_application)"
                            :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to HR?"
                            label_ar="المخاطر المتعلقة حصرا بالموارد البشرية؟" name="risk_hr" :value="old('risk_hr', $risk?->risk_hr)"
                            :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Physical Security?"
                            label_ar="المخاطر المتعلقة حصرا بالأمن المادي؟" name="risk_physical_security"
                            :value="old('risk_physical_security', $risk?->risk_physical_security)" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Third Party?"
                            label_ar="المخاطر المرتبطة حصرا بطرف خارجي؟" name="risk_third_party" :value="old('risk_third_party', $risk?->risk_third_party)"
                            :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Operational Technology?"
                            label_ar="المخاطر المرتبطة حصريًا بالتكنولوجيا التشغيلية؟" name="risk_operational"
                            :value="old('risk_operational', $risk?->risk_operational)" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Exclusively Related to Payments?"
                            label_ar="المخاطر المرتبطة حصرا بالمدفوعات؟" name="risk_payment" :value="old('risk_payment', $risk?->risk_payment)"
                            :custom_data="$yesNoOptions" />
                    </div>
                    <div>
                        <x-form.select label="Risk Exclusively Related to E-Banking?"
                            label_ar="المخاطر المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟" name="risk_e_banking"
                            :value="old('risk_e_banking', $risk?->risk_e_banking)" :custom_data="$yesNoOptions" />
                    </div>
                </x-form.grid-col>


                <div class="flex justify-end">
                    <x-form.submit label="Risk" label_ar="المخاطر" :isUpdate="$risk?->id" />
                </div>

            </div>
        </form>

    </div>
@endsection
