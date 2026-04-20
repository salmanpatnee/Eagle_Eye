@extends('layouts.risk')
@section('title', 'Risk Identification')
@section('title_ar', 'تحديد المخاطر')

@section('content')
    <div>
        <x-table.action-wrapper title="Risk Details">
            <x-action.button label="View" label_ar="منظر" route_name="risks.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="risks.edit" route_param="{{ $risk->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Risk ID" label_ar="رمز المخاطر">
                    {{ $risk->risk_id }}
                </x-info-col>

                <x-info-col label="Risk Name" label_ar="اسم المخاطر">
                    {{ $risk->risk_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Risk Description" label_ar="وصف المخاطر">
                {{ $risk->risk_description ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Objectives" label_ar="أهداف المخاطر">
                {{ $risk->risk_objectives ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Profile" label_ar="تفاصيل المخاطر">
                {{ $risk->risk_profile ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Risk Consequences" label_ar="آثار المخاطر">
                {{ $risk->risk_consequences ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Risk Group Name" label_ar="اسم مجموعة المخاطر">
                    {{ $risk?->group->risk_group_name ?? '—' }}
                </x-info-col>

                <x-info-col label="Risk Owner Name" label_ar="اسم صاحب المخاطر">
                    {{ $risk?->owner->owner_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Type Name" label_ar="اسم نوع المخاطرة">
                    {{ $risk?->type->risk_type_name ?? '—' }}
                </x-info-col>

                <x-info-col label="Risk Sub-Type Name" label_ar="اسم النوع الفرعي للمخاطر">
                    {{ $risk?->subType->risk_sub_type_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Controls" label_ar="الأحكام">
                    <x-list :data="$risk->controls" id_key="" value_key="control_name" />
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $risk?->classification->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Threat Agents" label_ar="وكيل التهديد">
                    <x-list :data="$risk->agents" id_key="" value_key="threat_agent_name" />
                </x-info-col>
                <x-info-col label="Vulnerability" label_ar="نقاط الضعف">
                    <x-list :data="$risk->vulnerabilities" id_key="" value_key="va_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Categories" label_ar="فئات">
                    <x-list :data="$risk->categories" id_key="" value_key="category_name" />
                </x-info-col>
                <x-info-col label="Asset Group" label_ar="مجموعة الأصول">
                    <x-list :data="$risk->assetGroups" id_key="" value_key="asset_group_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Key Risk Indicators" label_ar="مؤشرات المخاطر الرئيسية">
                    <x-list :data="$risk->kris" id_key="" value_key="key_risk_indicator_name" />
                </x-info-col>
                <x-info-col label="Key Performance Indicator" label_ar="مؤشر الأداء الرئيسي">
                    <x-list :data="$risk->kpis" id_key="" value_key="key_performance_indicatory_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Risk Acceptance" label_ar="قبول المخاطر">
                    <x-list :data="$risk->acceptances" id_key="" value_key="risk_acceptance_source" />
                </x-info-col>
                <x-info-col label="Departments" label_ar="قسم">
                    <x-list :data="$risk->departments" id_key="" value_key="department_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>

                <x-info-col label="Custodian Name" label_ar="اسم الوصي">
                    <x-list :data="$risk->custodians" id_key="" value_key="custodian_role_title" />
                </x-info-col>
                <x-info-col label="Risk Inherent Score" label_ar="المخاطر الكامنة">
                    {{ $risk?->inherent->risk_inherent_score ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to Critical Assets?"
                    label_ar="المخاطر المرتبطة حصرا بالأصول الحساسة؟">
                    {{ $risk->risk_critical_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to Cloud?" label_ar="المخاطر المرتبطة حصريًا بالسحابة؟">
                    {{ $risk->risk_cloud ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to Telework?" label_ar="المخاطر مرتبطة حصريًا بالعمل عن بعد؟">
                    {{ $risk->risk_telework ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to Social Media?"
                    label_ar="المخاطر المرتبطة حصريًا بوسائل التواصل الاجتماعي؟">
                    {{ $risk->risk_social_media ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to Data Privacy?"
                    label_ar="المخاطر المرتبطة حصريًا خصوصية البيانات ؟">
                    {{ $risk->risk_data_privicy ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to PII?"
                    label_ar="؟(PII) المخاطر المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية">
                    {{ $risk->risk_pii ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to PCI/DSS?" label_ar="؟PCI/DSS المخاطر المرتبطة حصريًا">
                    {{ $risk->risk_pci_dss ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to E-Commerce?"
                    label_ar="المخاطر المتعلقة حصرا بالتجارة الإلكترونية؟">
                    {{ $risk->risk_e_commerce ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to Infrastructure?"
                    label_ar="المخاطر المتعلقة حصرا بالبنية التحتية؟">
                    {{ $risk->risk_infrastructure ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to Application?" label_ar="المخاطر المرتبطة حصرا بالتطبيق؟">
                    {{ $risk->risk_application ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to HR?" label_ar="المخاطر المتعلقة حصرا بالموارد البشرية؟">
                    {{ $risk->risk_hr ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to Physical Security?"
                    label_ar="المخاطر المتعلقة حصرا بالأمن المادي؟">
                    {{ $risk->risk_physical_security ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to Third Party?" label_ar="المخاطر المرتبطة حصرا بطرف خارجي؟">
                    {{ $risk->risk_third_party ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to Operational Technology?"
                    label_ar="المخاطر المرتبطة حصريًا بالتكنولوجيا التشغيلية؟">
                    {{ $risk->risk_operational ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Risk Exclusively Related to Payments?" label_ar="المخاطر المرتبطة حصرا بالمدفوعات؟">
                    {{ $risk->risk_payment ?? '—' }}
                </x-info-col>
                <x-info-col label="Risk Exclusively Related to E-Banking?"
                    label_ar="المخاطر المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟">
                    {{ $risk->risk_e_banking ?? '—' }}
                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
