@extends('layouts.risk')
@section('sidebar-menu-items')
    <x-sidebar-menu-item route_name="risk-methodology.index" label_ar="منهجية المخاطر" label="Risk Methodology" />
@endsection
@section('title', 'Risk Methodology')
@section('title_ar', 'منهجية المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="New Methodology">
            <x-action.button label="View" label_ar="منظر" route_name="risk-methodology.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($riskMethodology) ? route('risk-methodology.update', $riskMethodology->id) : route('risk-methodology.store') }}"
            method="POST">
            @csrf
            @if (isset($riskMethodology))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $riskMethodology->id }}">
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Risk Methodology ID" label_ar="رمز منهجية المخاطر" name="risk_methodology_id"
                            required="true" :readonly="$riskMethodology?->risk_methodology_id" placeholder="Enter Risk Methodology ID" :value="$riskMethodology?->risk_methodology_id" />
                    </div>
                    <div>
                        <x-form.field label="Risk Methodology Name" label_ar="اسم منهجية المخاطر"
                            name="risk_methodology_name" required="true" placeholder="Enter Risk Methodology Name"
                            :value="$riskMethodology?->risk_methodology_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Function Owner" label_ar="صاحب منهجية المخاطر" name="owner_id"
                            required="true" placeholder="Enter Risk Function Owner" :value="$riskMethodology?->owner_id" :data="$owners"
                            id_key="owner_role_id" value_key="owner_name" />
                    </div>

                    <div>
                        <x-form.multiselect label="Objectives" label_ar="أهداف" name="objectives[]" :value="$objectiveIds"
                            :data="$objectives" id_key="objective_id" value_key="objective" required="true" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>

                    <x-form.textarea-field label="Background" label_ar="خلفية" name="background"
                        placeholder="Enter Background" :value="$riskMethodology?->background" />
                </x-form.grid-col-full>
                <x-form.grid-col-full>
                    <x-form.textarea-field label="Scope" label_ar="نِطَاق" name="scope" placeholder="Enter scope"
                        :value="$riskMethodology?->scope" />
                </x-form.grid-col-full>
                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Methodology Source" label_ar="مصدر منهجية المخاطر"
                        name="risk_methodology_source" placeholder="Enter Risk Methodology Source" :value="$riskMethodology?->risk_methodology_source" />
                </x-form.grid-col-full>


                <x-form.grid-col-full>
                    <x-form.textarea-field label="Context Establishment" label_ar="إنشاء السياق" name="context"
                        placeholder="Enter Context Establishment" :value="$riskMethodology?->context" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Identification" label_ar="تحديد المخاطر" name="risk_identification"
                        placeholder="Enter Risk Identification" :value="$riskMethodology?->risk_identification" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Analysis" label_ar="تحليل المخاطر" name="risk_analysis"
                        placeholder="Enter Risk Analysis" :value="$riskMethodology?->risk_analysis" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Evaluation" label_ar="تقييم المخاطر" name="risk_evaluation"
                        placeholder="Enter Risk Evaluation" :value="$riskMethodology?->risk_evaluation" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Documentation and Review" label_ar="التوثيق والمراجعة"
                        name="documentation" placeholder="Enter Documentation and Review" :value="$riskMethodology?->documentation" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Alignment with ISO/IEC 27005" label_ar="التوافق مع ISO/IEC 27005"
                        name="alignment_iso" placeholder="Enter Alignment with ISO/IEC 27005" :value="$riskMethodology?->alignment_iso" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Asset Identification" label_ar="تحديد الأصول" name="asset_identification"
                            required="true" :value="$riskMethodology?->asset_identification" :data="$assets" id_key="asset_id"
                            value_key="asset_name" />
                    </div>

                    <div>
                        <x-form.select label="Threat Identification" label_ar="تحديد التهديد" name="threat_identification"
                            required="true" :value="$riskMethodology?->threat_identification" :data="$threats" id_key="threat_agent_id"
                            value_key="threat_agent_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Vulnerability Identification" label_ar="تحديد نقاط الضعف"
                            name="vulnerability_identification" required="true" :value="$riskMethodology?->vulnerability_identification" :data="$vulnerabilities"
                            id_key="va_id" value_key="va_name" />
                    </div>

                    <div>
                        <x-form.select label="Risk Appetite Identification" label_ar="تحديد مخاطر الجوع"
                            name="risk_appetite_determination" required="true" :value="$riskMethodology?->risk_appetite_determination" :data="$appetites"
                            id_key="risk_appetite_id" value_key="risk_score" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Assessment Approach" label_ar="نهج تقييم المخاطر"
                        name="risk_assessment_approach" placeholder="Enter Risk Assessment Approach" :value="$riskMethodology?->risk_assessment_approach" />
                </x-form.grid-col-full>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Risk Name" label_ar="اسم المخاطر" name="risk_name" required="true"
                            :value="$riskMethodology?->risk_name" :data="$risks" id_key="risk_id" value_key="risk_name" />
                    </div>

                    <div>
                        <x-form.select label="Risk Treatment" label_ar="خيارات علاج المخاطر" name="risk_treatment"
                            required="true" :value="$riskMethodology?->risk_treatment" :data="$riskTreatments" id_key="risk_treatment_id"
                            value_key="risk_treatment_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Residual Risk" label_ar="المخاطر المتبقية" name="residual_risk"
                            placeholder="Enter Residual Risk" :value="$riskMethodology?->residual_risk" />
                    </div>

                    <div>
                        <x-form.select label="Risk Acceptance" label_ar="قبول المخاطر" name="risk_acceptance"
                            required="true" :value="$riskMethodology?->risk_acceptance" :data="$acceptances" id_key="risk_acceptance_id"
                            value_key="risk_acceptance_source" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Audit" label_ar="مراجعة المخاطر" name="risk_audit"
                        placeholder="Enter Risk Audit" :value="$riskMethodology?->risk_audit" />
                </x-form.grid-col-full>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Risk Change Management" label_ar="إدارة تغير المخاطر"
                        name="risk_change_management" placeholder="Enter Risk Change Management" :value="$riskMethodology?->risk_change_management" />
                </x-form.grid-col-full>


                <div class="flex justify-end">
                    <x-form.submit label="Risk Methodology" label_ar="منهجية المخاطر" :isUpdate="$riskMethodology?->id" />
                </div>


            </div>
        </form>

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        const editorSelectors = [
            '#context',
            '#risk_identification',
            '#risk_analysis',
            '#risk_evaluation',
            '#documentation',
            '#alignment_iso'
        ];

        editorSelectors.forEach(selector => {
            ClassicEditor
                .create(document.querySelector(selector))
                .catch(error => {
                    console.error(`Error initializing editor for ${selector}:`, error);
                });
        });
    </script>
@endsection
