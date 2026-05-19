@extends('layouts.control')
@section('title', 'Control Definition')
@section('title_ar', 'تعريف الضوابط')
@section('parent_title', 'Control Definition')
@section('parent_url', route('controls.index'))
@section('breadcrumb_title', $control->control_id)

@section('content')
    <div>
        <x-table.action-wrapper title="Control Details">
            <x-action.button label="View" label_ar="منظر" route_name="controls.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="controls.edit" route_param="{{ $control->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Control ID" label_ar="رمز نوع الضوابط">
                    {{ $control->control_id }}
                </x-info-col>

            </x-info-row>
            <x-info-row>
                <x-info-col label="Control Name" label_ar="اسم الضوابط">
                    {{ $control->control_name }}
                </x-info-col>
                <x-info-col label="Control Name Arabic" label_ar="اسم الضوابط العربية">
                    {{ $control->control_name_ar }}
                </x-info-col>

            </x-info-row>
            <x-info-col-lg label="Control Description" label_ar="وصف ">
                {{ $control->control_description ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Description Arabic" label_ar="وصف الضوابط العربية">
                <span dir="rtl" style="text-align: right; display: block;">
                    {{ $control->control_description_ar ?? '—' }}
                </span>
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $control->classification_id }}
                </x-info-col>
                <x-info-col label="Control Owner Name" label_ar="اسم مالك الضوابط">
                    {{ $control->owner?->owner_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Level" label_ar="ضوابط مستوى">
                    {{ $control->control_level_title }}
                </x-info-col>
                <x-info-col label="Main Control" label_ar="ضوابط الرئيسي">
                    {{ $control->control_parent }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Type" label_ar="نوع الضوابط">
                    {{ $control->type->control_type_name }}
                </x-info-col>
                <x-info-col label="Control Nature" label_ar="طبيعة الضوابط">
                    {{ $control->control_nature }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Criticality" label_ar="الضوابط الحساسة">
                    {{ $control->control_criticality }}
                </x-info-col>
                <x-info-col label="ISO Related Control" label_ar="ISO الضوابط المتعلقة بمعيار">
                    {{ $control->control_iso_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Reference" label_ar="مرجع الضوابط">
                    {{ $control->control_reference }}
                </x-info-col>
                <x-info-col label="Is Dependent" label_ar="هل هو تابع">
                    {{ $control->is_parent_control == '0' ? 'No' : 'Yes' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Implementation Mandatories" label_ar="التزامات التنفيذ">
                {{ $control->implementation_mandatories }}
            </x-info-col-lg>

            <x-info-col-lg label="Maturity Level Required" label_ar="مستوى النضج">
                {{ $control->maturity_level }}
            </x-info-col-lg>

            <x-info-col-lg label="Implementation Guidelines" label_ar="إرشادات التنفيذ">
                {{ $control->implementation_guidelines }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Dependency" label_ar="ضوابط التبعية">
                {{ $control->control_dependency }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Categories" label_ar="اسم الفئة">
                    <x-list :data="$control->categories" id_key="" value_key="category_name" />
                </x-info-col>
                <x-info-col label="Best Practice" label_ar="أفضل الممارسات">
                    <x-list :data="$control->bestPractices" id_key="" value_key="best_practices_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Custodian Name" label_ar="اسم الوصي">
                    <x-list :data="$control->custodians" id_key="" value_key="custodian_role_title" />
                </x-info-col>
                <x-info-col label="Domain" label_ar="أفضل الممارسات">
                    <x-list :data="$control->domains" id_key="" value_key="main_domain_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Sub Domain" label_ar="">
                    <x-list :data="$control->subDomains" id_key="" value_key="sub_domain_name" />
                </x-info-col>
                {{-- <x-info-col label="Risk" label_ar="">
                    <x-list :data="$control->risks" id_key="" value_key="risk_name" />
                </x-info-col> --}}
            </x-info-row>
            <hr>
            <x-info-row>
                <x-info-col label="Control Exclusively Related to Critical Assets?"
                    label_ar="الضوابط المرتبطة حصرا بالأصول الحساسة؟">
                    {{ $control->control_critical_asset }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Cloud?" label_ar="الضوابط المرتبطة حصريًا بالسحابة؟">
                    {{ $control->control_cloud }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Telework?"
                    label_ar="الضوابط مرتبطة حصريًا بالعمل عن بعد؟">
                    {{ $control->control_telework }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Social Media?"
                    label_ar="الضوابط المرتبطة حصريًا بوسائل التواصل الاجتماعي؟">
                    {{ $control->control_social_media }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Data Privacy?"
                    label_ar="الضوابط المرتبطة حصريًا خصوصية البيانات ؟">
                    {{ $control->control_data_privicy }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to PII?"
                    label_ar="؟(PII) الضوابط المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية">
                    {{ $control->control_pii }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to PCI/DSS?" label_ar="؟PCI/DSS الضوابط المرتبطة حصريًا">
                    {{ $control->control_pci_dss }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to E-Commerce?"
                    label_ar="الضوابط المتعلقة حصرا بالتجارة الإلكترونية؟">
                    {{ $control->control_e_commerce }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Infrastructure?"
                    label_ar="الضوابط المتعلقة حصرا بالبنية التحتية؟">
                    {{ $control->control_infrastructure }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Application?" label_ar="الضوابط المرتبطة حصرا بالتطبيق؟">
                    {{ $control->control_application }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to HR?" label_ar="الضوابط المتعلقة حصرا بالموارد البشرية؟">
                    {{ $control->control_hr }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Physical Security?"
                    label_ar="الضوابط المتعلقة حصرا بالأمن المادي؟">
                    {{ $control->control_physical_security }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Third Party?"
                    label_ar="الضوابط المرتبطة حصرا بطرف خارجي؟">
                    {{ $control->control_third_party }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Operational Technology?"
                    label_ar="الضوابط المرتبطة حصريًا بالتكنولوجيا التشغيلية؟">
                    {{ $control->control_operational }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Payments?" label_ar="الضوابط المرتبطة حصرا بالمدفوعات؟">
                    {{ $control->control_payment }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to E-Banking?"
                    label_ar="الضوابط المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟">
                    {{ $control->control_e_banking }}
                </x-info-col>
            </x-info-row>
        </div>
    @endsection
