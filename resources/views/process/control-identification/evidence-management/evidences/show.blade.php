@extends('layouts.evidence')
@section('title', 'Evidence Management')
@section('title_ar', 'إدارة الأدلة')
@section('content')
    <div>
        <x-table.action-wrapper title="Evidence Details">
            <x-action.button label="View" label_ar="منظر" route_name="evidences.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="evidences.edit" route_param="{{ $evidence->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Evidence ID" label_ar="رمز الأدلة">
                    {{ $evidence->evidence_id }}
                </x-info-col>
                <x-info-col label="Evidence Name" label_ar="اسم الأدلة">
                    {{ $evidence->evidence_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Evidence Description" label_ar="وصف الأدلة">
                {{ $evidence->evidence_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $evidence->classification->classification_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Nature" label_ar="طبيعة الدليل">
                    {{ $evidence->evidence_nature ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Type" label_ar="نوع الأدلة">
                    {{ $evidence->evidence_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Owner Name" label_ar="اسم مالك">
                    {{ $evidence->owner->owner_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Evidence Source" label_ar="مصدر الأدلة">
                {{ $evidence->evidence_source ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Controls" label_ar="الضوابط">
                    <x-list :data="$evidence->controls" id_key="control_id" value_key="control_name" />
                </x-info-col>
                <x-info-col label="Artifacts" label_ar=" المرفقات">
                    <x-list :data="$evidence->artifacts" id_key="artifact_id" value_key="artifact_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Categories" label_ar="الفئة">
                    <x-list :data="$evidence->categories" id_key="category_id" value_key="category_name" />
                </x-info-col>

            </x-info-row>


            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Critical Assets?"
                    label_ar="الأدلة المرتبطة حصرا بالأصول الحساسة؟">
                    {{ $evidence->evidence_critical_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Cloud?" label_ar="الأدلة المرتبطة حصريًا بالسحابة؟">
                    {{ $evidence->evidence_cloud ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Telework?"
                    label_ar="الأدلة مرتبطة حصريًا بالعمل عن بعد؟">
                    {{ $evidence->evidence_telework ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Social Media?"
                    label_ar="الأدلة المرتبطة حصريًا بوسائل التواصل الاجتماعي؟">
                    {{ $evidence->Evidence_social_media ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Data Privacy?"
                    label_ar="الأدلة المرتبطة حصريًا خصوصية البيانات ؟">
                    {{ $evidence->Evidence_data_privacy ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to PII?"
                    label_ar="؟(PII) الأدلة المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية">
                    {{ $evidence->evidence_pii ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to PCI/DSS?" label_ar="؟PCI/DSS الأدلة المرتبطة حصريًا">
                    {{ $evidence->evidence_pci_dss ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to E-Commerce?"
                    label_ar="الأدلة المتعلقة حصرا بالتجارة الإلكترونية؟">
                    {{ $evidence->Evidence_e_commerce ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Infrastructure?"
                    label_ar="الأدلة المتعلقة حصرا بالبنية التحتية؟">
                    {{ $evidence->Evidence_infrastructure ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Application?" label_ar="الأدلة المرتبطة حصرا بالتطبيق؟">
                    {{ $evidence->Evidence_application ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to HR?" label_ar="الأدلة المتعلقة حصرا بالموارد البشرية؟">
                    {{ $evidence->Evidence_hr ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Physical Security?"
                    label_ar="الأدلة المتعلقة حصرا بالأمن المادي؟">
                    {{ $evidence->physical_security ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Third Party?"
                    label_ar="الأدلة المرتبطة حصرا بطرف خارجي؟">
                    {{ $evidence->third_party ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Operational Technology?"
                    label_ar="الأدلة المرتبطة حصريًا بالتكنولوجيا التشغيلية؟">
                    {{ $evidence->operational_technology ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to E-Banking?"
                    label_ar="الأدلة المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟">
                    {{ $evidence->payment ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Payments?" label_ar="الأدلة المرتبطة حصرا بالمدفوعات؟">
                    {{ $evidence->e_banking ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>

    </div>
@endsection
