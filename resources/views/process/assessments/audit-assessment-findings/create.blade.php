@extends('layouts.app-full')
@section('title', 'Audit Findings')
@section('title_ar', 'العثور على')
@section('content')

    <div>
        <x-table.action-wrapper title="{{ isset($auditFinding) ? 'Update' : 'New' }} Audit Finding">
            <x-action.button label="View" label_ar="منظر" route_name="audit-assessments.index" />
        </x-table.action-wrapper>

        <h1 class="text-2xl text-center bg-brand-950 text-white py-2 font-medium">Audit Master</h1>
        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Audit ID" label_ar="رمز تقييم مراجعة">
                    {{ $auditAssessment->audit_id }}
                </x-info-col>
                <x-info-col label="Audit Name" label_ar="اسم تقييم مراجعة">
                    {{ $auditAssessment->audit_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Best Practice Name" label_ar="اسم أفضل الممارسات">
                    {{ $auditAssessment->bestPractice?->best_practices_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Location Name" label_ar="اسم الموقع">
                    {{ $auditAssessment->location?->location_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Auditor Name" label_ar="اسم مدقق">
                    {{ $auditAssessment->auditor->auditor_first_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification Name" label_ar="اسم التصنيف">
                    {{ $auditAssessment->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <h1 class="text-2xl text-center bg-brand-950 text-white py-2 font-medium">Audit Finding</h1>
        <form
            action="{{ isset($auditFinding) ? route('audit-findings.update', $auditFinding->id) : route('audit-findings.store', $auditAssessment->id) }}"
            method="POST">
            @csrf
            @if (isset($auditFinding))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Audit Finding ID" label_ar="رمز العثور على" name="audit_finding_id"
                            required="true" placeholder="Enter Audit Finding ID" :value="$auditFinding?->audit_finding_id ?? old('audit_finding_id')" />
                    </div>
                    <div>
                        <x-form.field label="Audit Finding Name" label_ar="اسم العثور على" name="audit_finding_name"
                            required="true" placeholder="Enter Audit Finding Name" :value="$auditFinding?->audit_finding_name ?? old('audit_finding_name')" />
                    </div>
                </x-form.grid-col>



                <x-form.textarea-field label="Audit Finding Description" label_ar="وصف تقييم مراجعة"
                    name="audit_finding_description" placeholder="Enter Audit Finding Description" :value="$auditFinding?->audit_finding_description ?? old('audit_finding_description')" />


                <x-form.grid-col>
                    <div>
                        <x-form.select label="Auditee Name" label_ar="الشخص الذي يتم التدقيق عليه" name="auditee_id"
                            required="true" :value="$auditFinding?->auditee_id" :data="$auditees" id_key="auditee_id"
                            value_key="auditee_first_name" />
                    </div>
                    <div>
                        <x-form.select label="Auditee Department" label_ar="القسم الذي يتم التدقيق عليه"
                            name="department_id" required="true" :value="$auditFinding?->department_id" :data="$departments" id_key="department_id"
                            value_key="department_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Audit Domain" label_ar="مراجعة المكون" name="domain_id" required="true"
                            :value="$auditFinding?->domain_id" :data="$domains" id_key="main_domain_id" value_key="main_domain_name" />
                    </div>
                    <div>
                        <x-form.field label="Audit Nature" label_ar="مراجعة الطبيعة" name="audit_nature"
                            placeholder="Enter Audit Finding Name" :value="$auditFinding?->audit_nature ?? old('audit_nature')" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Asset" label_ar="الأصل" name="assets[]" :value="$assetIds"
                            :data="$assets" id_key="asset_id" value_key="asset_name" />
                    </div>

                    <div>
                        <x-form.multiselect label="Asset Group" label_ar="اسم مجموعة الأصل" name="assetsGroups[]"
                            :value="$assetGroupIds" :data="$assetGroups" id_key="asset_group_id" value_key="asset_group_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Owner Name" label_ar="اسم صاحب" name="owner_id" required="true"
                            :value="$auditFinding?->owner_id" :data="$owners" id_key="owner_role_id" value_key="owner_name" />
                    </div>

                    <div>
                        <x-form.multiselect label="Custodian Name" label_ar="اسم الوصي" name="custodians[]"
                            :value="$custodianRoleIds" :data="$custodians" id_key="custodian_role_id"
                            value_key="custodian_role_title" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Controls" label_ar="اسم الضوابط" name="controls[]" :value="$controlIds"
                            :data="$controls" id_key="control_id" value_key="control_name" required="true" :show_key="true" />
                    </div>

                    <div>
                        <x-form.multiselect label="Categories" label_ar="اسم الفئة" name="categories[]" :value="$categoryIds"
                            :data="$categories" id_key="category_id" value_key="category_name" required="true" />
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Compliance Level" label_ar="مستوى الالتزام" name="compliance_level"
                    placeholder="Enter Compliance Level" :value="$auditFinding?->compliance_level ?? old('compliance_level')" />

                <x-form.textarea-field label="Auditor Observation" label_ar="ملاحظة المدقق" name="nca_remarks"
                    placeholder="Enter Auditor Observation" :value="$auditFinding?->nca_remarks ?? old('nca_remarks')" />

                <x-form.textarea-field label="Root Cause Analysis" label_ar="تحليل السبب الجذري"
                    name="root_cause_analysis" placeholder="Enter Root Cause Analysis" :value="$auditFinding?->root_cause_analysis ?? old('root_cause_analysis')" />



                <x-form.grid-col>
                    <div>
                        <x-form.field label="Corrective Action" label_ar="إجراءات التصحيح" name="corrective_action"
                            placeholder="Enter Corrective Action" :value="$auditFinding?->corrective_action ?? old('corrective_action')" />
                    </div>
                    <div>
                        <x-form.label label="Corrective Action Due Date" label_ar="تاريخ استحقاق إجراءات التصحيح"
                            for="corrective_action_due_date" />
                        <div class="relative">
                            <input type="date" id="corrective_action_due_date" name="corrective_action_due_date"
                                required
                                value="{{ old('corrective_action_due_date', $auditFinding?->corrective_action_due_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Preventive Action" label_ar="إجراءات الوقائي" name="preventive_action"
                            placeholder="Enter Preventive Action" :value="$auditFinding?->preventive_action ?? old('preventive_action')" />
                    </div>
                    <div>
                        <x-form.label label="Preventive Action Due Date" label_ar="تاريخ استحقاق إجراءات الوقائي"
                            for="preventive_action_due_date" />
                        <div class="relative">
                            <input type="date" id="preventive_action_due_date" name="preventive_action_due_date"
                                required
                                value="{{ old('preventive_action_due_date', $auditFinding?->preventive_action_due_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Audit Finding Status" label_ar="العثور على الحالة"
                            name="audit_finding_status" :value="$auditFinding?->audit_finding_status ??
                                old('audit_finding_status', $auditFinding?->audit_finding_status ?? 'Not Implemented')" :custom_data="['Open - Not Started', 'Open - WIP', 'Closed']" required="true" />
                    </div>
                    <div>
                        <x-form.label label="Closure Expected Date" label_ar="تاريخ الإغلاق المتوقع"
                            for="closure_expected_date" />
                        <div class="relative">
                            <input type="date" id="closure_expected_date" name="closure_expected_date" required
                                value="{{ old('closure_expected_date', $auditFinding?->closure_expected_date) }}"
                                class="input-field" onclick="this.showPicker()" />
                            <x-icons.calendar />
                        </div>
                    </div>
                </x-form.grid-col>


                <x-form.textarea-field label="Lesson Learned" label_ar="الدرس المستفاد" name="lesson_learned"
                    placeholder="Enter Lesson Learned" :value="$auditFinding?->lesson_learned ?? old('lesson_learned')" />


            </div>

            <div class="flex justify-end gap-3">
                <x-form.submit label="Audit Finding" label_ar="العثور على نتائج" :isUpdate="$auditFinding?->id" />
                @if (!$auditFinding?->id)
                    <button type="submit" name="submit" value="exit" class="submit-btn">
                        <span class="inline mx-2">Save and Exit</span>
                        <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">حفظ
                            والخروج</span>
                    </button>
                @endif

            </div>
        </form>
    </div>
@endsection
