@extends('layouts.app-full')
@section('title', 'Audit Findings')
@section('title_ar', 'العثور على')
@section('content')
    <div>
        <x-table.action-wrapper title="Audit Findings">
            <x-action.button label="View" label_ar="منظر" route_name="audit-assessments.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="audit-findings.edit"
                route_param="{{ $auditFinding->id }}" />

        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Audit Finding ID" label_ar="رمز العثور على">
                    {{ $auditFinding->audit_finding_id }}
                </x-info-col>
                <x-info-col label="Audit Finding Name" label_ar="اسم العثور على">
                    {{ $auditFinding->audit_finding_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Audit Finding Description" label_ar="وصف العثور على">
                {{ $auditFinding->audit_finding_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Auditee Name" label_ar="الشخص الذي يتم التدقيق عليه">
                    {{ $auditFinding->auditee->auditee_first_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Auditee Department" label_ar="القسم الذي يتم التدقيق عليه">
                    {{ $auditFinding->department?->department_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Domain" label_ar="مراجعة المكون">
                    {{ $auditFinding->domain->main_domain_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Audit Nature" label_ar="مراجعة الطبيعة">
                    {{ $auditFinding->audit_nature }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset" label_ar="الأصول">
                    <x-list :data="$auditFinding->assets" id_key="asset_id" value_key="asset_name" />
                </x-info-col>
                <x-info-col label="Asset Group" label_ar="مجموعة الأصول">
                    <x-list :data="$auditFinding->assetsGroups" id_key="asset_group_id" value_key="asset_group_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Owner Name" label_ar="اسم صاحب">
                    {{ $auditFinding->owner?->owner_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Custodian Name" label_ar="اسم الوصي">
                    <x-list :data="$auditFinding->custodians" id_key="custodian_role_id" value_key="custodian_role_title" />
                </x-info-col>
            </x-info-row>


            <x-info-row>
                <x-info-col label="Controls" label_ar="اسم الضوابط">
                    <x-list :data="$auditFinding->controls" id_key="control_id" value_key="control_name" />
                </x-info-col>
                <x-info-col label="Categories" label_ar="اسم الفئة">
                    <x-list :data="$auditFinding->categories" id_key="category_id" value_key="category_name" />
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Compliance Level" label_ar="مستوى الالتزام">
                {{ $auditFinding->compliance_level ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="NCA Remarks" label_ar="الملاحظات">
                {{ $auditFinding->nca_remarks ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Root Cause Analysis" label_ar="تحليل السبب الجذري">
                {{ $auditFinding->root_cause_analysis ?? '—' }}
            </x-info-col-lg>


            <x-info-row>
                <x-info-col label="Corrective Action" label_ar="إجراءات التصحيح">
                    {{ $auditFinding->corrective_action ?? '—' }}
                </x-info-col>
                <x-info-col label="Corrective Action Due Date" label_ar="تاريخ استحقاق إجراءات التصحيح">
                    {{ $auditFinding->corrective_action_due_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Preventive Action" label_ar="العمل الإجراء">
                    {{ $auditFinding->preventive_action ?? '—' }}
                </x-info-col>
                <x-info-col label="Preventive Action Due Date" label_ar="تاريخ استحقاق الإجراء الوقائي">
                    {{ $auditFinding->preventive_action_due_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Audit Finding Status" label_ar="العثور على الحالة">
                    {{ $auditFinding->audit_finding_status ?? '—' }}
                </x-info-col>
                <x-info-col label="Closure Expected Date" label_ar="تاريخ الإغلاق المتوقع">
                    {{ $auditFinding->closure_expected_date ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Lesson Learned" label_ar="تعلم الدرس">
                {{ $auditFinding->lesson_learned ?? '—' }}
            </x-info-col-lg>

        </div>
    @endsection
