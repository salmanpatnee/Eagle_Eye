@extends('4-Process.risk.risk-methodology.layout.app')
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
                            :data="$objectives" id_key="objective_id" value_key="objective" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col-full>
                    <x-form.textarea-field label="Background" label_ar="خلفية" name="background"
                        placeholder="Enter Background" :value="$riskMethodology?->Methodology_description" />
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



                <div class="flex justify-end">
                    <x-form.submit label="Methodology" label_ar="منهجية المخاطر" :isUpdate="$riskMethodology?->risk_methodology_id" />
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
