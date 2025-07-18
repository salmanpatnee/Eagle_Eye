@extends('4-Process.risk.risk-methodology.layout')
@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <style>
        h1 {
            font-size: 1.7em;
            margin: 0 0 0 10px;
        }

        .btn {
            color: #fff;
        }

        .btn-dark,
        .btn-dark:hover,
        .btn-dark:active {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .modal-header {

            background: linear-gradient(to right, #203864, #2e74b6);
        }

        .modal-title {

            color: #fff;
        }

        .ck.ck-content.ck-editor__editable {
            height: 200px;
        }

        div#selectedCategoriesText {
            margin-top: 1em;
            color: cornflowerblue;
        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
        }
    </style>
@endpush

@section('content')
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">منهجية المخاطر</p>
                <p class="PageHeadEngTxt">Risk Methodology</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{ route($routeName . '.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                @if (request()->routeIs($routeName . '.edit'))
                    <a href="{{ route($routeName . '.create') }}" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <button type="submit" form="form" class="MoreButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </button>
                @else
                    <button type="submit" form="form" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                @endif

                <button type="button" onclick="showDeleteModal()"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>


                <form method="POST" action="{{ route($routeName . '.destroy') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($riskMethodology) ? route($routeName . '.update', $riskMethodology->id) : route($routeName . '.store') }}"
            method="POST">
            @csrf
            @if (isset($riskMethodology))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $riskMethodology->id }}">
            @endif

            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Methodology ID</p>
                                <p class="FieldHeadArbTxt">رمز منهجية المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_methodology_id" id="risk_methodology_id" class="sh-tx"
                                    placeholder="Enter ID"
                                    value="{{ old('risk_methodology_id', $riskMethodology?->risk_methodology_id) }}"
                                    {{ $riskMethodology?->risk_methodology_id ? 'readonly' : '' }} required>
                                @error('risk_methodology_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Methodology Name</p>
                                <p class="FieldHeadArbTxt">اسم منهجية المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_methodology_name" id="risk_methodology_name" class="sh-tx"
                                    placeholder="Enter Risk Methodology Name"
                                    value="{{ old('risk_methodology_name', $riskMethodology?->risk_methodology_name) }}"
                                    required>
                                @error('risk_methodology_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>

                        
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Function Owner</p>
                                <p class="FieldHeadArbTxt">صاحب منهجية المخاطر</p>
                            </div>
                            <select name="owner_id" id="owner_id" class="sh-tx" required>
                                <option value="">Select Owner</option>
                                @foreach ($owners as $owner)
                                    <option value="{{ $owner->owner_role_id }}"
                                        {{ $owner->owner_role_id == old('owner_id', $riskMethodology?->owner_id) ? 'selected' : '' }}>
                                        {{ $owner->owner_role_id }} - {{ $owner->owner_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('owner_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="column">

                            <x-label label="Objectives" label_ar="أهداف" />
                            <x-modal-button modal_id="objectivesModal" label="Add objectives" name="objectives"
                                :data="isset($objectiveIds) ? json_encode($objectiveIds) : ''" />

                        </div>
                        
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Background</p>
                                <p class="FieldHeadArbTxt">خلفية</p>
                            </div>
                            <p><input type="text" name="background" id="background" class="bg-tx"
                                    placeholder="Write Background"
                                    value="{{ old('background', $riskMethodology?->background) }}">
                                @error('background')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Scope</p>
                                <p class="FieldHeadArbTxt">نِطَاق</p>
                            </div>
                            <p><input type="text" name="scope" id="scope" class="bg-tx" placeholder="Write Scope"
                                    value="{{ old('scope', $riskMethodology?->scope) }}">
                                @error('scope')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Methodology Source</p>
                                <p class="FieldHeadArbTxt">مصدر منهجية المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_methodology_source" id="risk_methodology_source"
                                    class="bg-tx" placeholder="Write Risk Methodology Source"
                                    value="{{ old('risk_methodology_source', $riskMethodology?->risk_methodology_source) }}">
                                @error('risk_methodology_source')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>

                    


                    <div class="">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Context Establishment</p>
                                <p class="FieldHeadArbTxt">إنشاء السياق</p>
                            </div>
                            <textarea name="context" id="editor" class="bg-tx" cols="30" rows="2">{!! html_entity_decode($riskMethodology?->context) !!}</textarea>
                            <x-error name="context" />
                        </div>
                    </div>

                    <div class="">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt"> Risk Identification</p>
                                <p class="FieldHeadArbTxt">تحديد المخاطر</p>
                            </div>
                            <textarea name="risk_identification" id="risk_identification" class="bg-tx" cols="30" rows="2">{!! html_entity_decode($riskMethodology?->risk_identification) !!}</textarea>
                            <x-error name="risk_identification" />
                        </div>
                    </div>

                    <div class="">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Analysis</p>
                                <p class="FieldHeadArbTxt">تحليل المخاطر</p>
                            </div>
                            <textarea name="risk_analysis" id="risk_analysis" class="bg-tx" cols="30" rows="2">{!! html_entity_decode($riskMethodology?->risk_analysis) !!}</textarea>
                            <x-error name="risk_analysis" />
                        </div>
                    </div>

                    <div class="">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Evaluation</p>
                                <p class="FieldHeadArbTxt">تقييم المخاطر</p>
                            </div>
                            <textarea name="risk_evaluation" id="risk_evaluation" class="bg-tx" cols="30" rows="2">{!! html_entity_decode($riskMethodology?->risk_evaluation) !!}</textarea>
                            <x-error name="risk_evaluation" />
                        </div>
                    </div>

                    <div class="">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Documentation and Review</p>
                                <p class="FieldHeadArbTxt">التوثيق والمراجعة</p>
                            </div>
                            <textarea name="documentation" id="documentation" class="bg-tx" cols="30" rows="2">{!! html_entity_decode($riskMethodology?->documentation) !!}</textarea>
                            <x-error name="documentation" />
                        </div>
                    </div>

                    <div class="">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Alignment with ISO/IEC 27005</p>
                                <p class="FieldHeadArbTxt">التوافق مع ISO/IEC 27005</p>
                            </div>
                            <textarea name="alignment_iso" id="alignment_iso" class="bg-tx" cols="30" rows="2">{!! html_entity_decode($riskMethodology?->alignment_iso) !!}</textarea>
                            <x-error name="alignment_iso" />
                        </div>
                    </div>



                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Identification</p>
                                <p class="FieldHeadArbTxt">تحديد الأصول</p>
                            </div>

                            <select name="asset_identification" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($assets as $asset)
                                    <option value="{{ $asset->asset_id }}"
                                        {{ old('asset_identification', $riskMethodology?->asset_identification) == $asset->asset_id ? 'selected' : null }}>
                                        {{ $asset->asset_id }} -
                                        {{ $asset->asset_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="asset_identification" />


                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Identification</p>
                                <p class="FieldHeadArbTxt">تحديد التهديد</p>
                            </div>
                            <select name="threat_identification" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($threats as $threat)
                                    <option value="{{ $threat->threat_agent_id }}"
                                        {{ old('threat_identification', $riskMethodology?->threat_identification) == $threat->threat_agent_id ? 'selected' : null }}>
                                        {{ $threat->threat_agent_id }} -
                                        {{ $threat->threat_agent_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="threat_identification" />


                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Vulnerability Identification</p>
                                <p class="FieldHeadArbTxt">تحديد نقاط الضعف</p>
                            </div>
                            <select name="vulnerability_identification" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($vulnerabilities as $vulnerability)
                                    <option value="{{ $vulnerability->va_id }}"
                                        {{ old('vulnerability_identification', $riskMethodology?->vulnerability_identification) == $vulnerability->va_id ? 'selected' : null }}>
                                        {{ $vulnerability->va_id }} -
                                        {{ $vulnerability->va_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="vulnerability_identification" />


                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Identification</p>
                                <p class="FieldHeadArbTxt">تحديد مخاطر الجوع</p>
                            </div>

                            <select name="risk_appetite_determination" id="risk_appetite_determination" class="sh-tx"
                                required>
                                <option value="">Select Appetite Score</option>
                                @foreach ($appetites as $appetite)
                                    <option value="{{ $appetite->risk_appetite_id }}"
                                        {{ $appetite->risk_appetite_id == old('risk_appetite_determination', $riskMethodology?->risk_appetite_determination) ? 'selected' : '' }}>
                                        {{ $appetite->risk_appetite_id }} - {{ $appetite->risk_score }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_appetite_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Assessment Approach</p>
                                <p class="FieldHeadArbTxt">نهج تقييم المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_assessment_approach" id="risk_assessment_approach"
                                    class="bg-tx" placeholder="Write Risk Assessment Approach"
                                    value="{{ old('risk_assessment_approach', $riskMethodology?->risk_assessment_approach) }}">
                                @error('risk_assessment_approach')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Name</p>
                                <p class="FieldHeadArbTxt">اسم المخاطر</p>
                            </div>
                            <select name="risk_name" id="ClassName" class="sh-tx" required>
                                <option value="">Select Option</option>
                                @foreach ($risks as $risk)
                                    <option value="{{ $risk->risk_id }}"
                                        {{ old('risk_name', $riskMethodology?->risk_name) == $risk->risk_id ? 'selected' : null }}>
                                        {{ $risk->risk_id }} -
                                        {{ $risk->risk_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-error name="risk_name" />


                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Response</p>
                                <p class="FieldHeadArbTxt">الاستجابة للمخاطر</p>
                            </div>
                            <p><input type="text" name="risk_treatment" id="risk_treatment" class="sh-tx"
                                    placeholder="Write Risk Treatment"
                                    value="{{ old('risk_treatment', $riskMethodology?->risk_treatment) }}">
                                @error('risk_treatment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Residual Risk</p>
                                <p class="FieldHeadArbTxt">المخاطر المتبقية</p>
                            </div>
                            <p><input type="text" name="residual_risk" id="residual_risk" class="sh-tx"
                                    placeholder="Write Residual Risk"
                                    value="{{ old('residual_risk', $riskMethodology?->residual_risk) }}">
                                @error('residual_risk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance</p>
                                <p class="FieldHeadArbTxt">قبول المخاطر</p>
                            </div>

                            <select name="risk_acceptance" id="risk_acceptance" class="sh-tx" required>
                                <option value="">Select Acceptance</option>
                                @foreach ($acceptances as $acceptance)
                                    <option value="{{ $acceptance->risk_acceptance_id }}"
                                        {{ $acceptance->risk_acceptance_id == old('risk_acceptance', $riskMethodology?->risk_acceptance) ? 'selected' : '' }}>
                                        {{ $acceptance->risk_acceptance_source }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_acceptance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <p><input type="text" name="risk_acceptance" id="risk_acceptance" class="sh-tx"
                                placeholder="Write Risk Acceptance"
                                value="{{ old('risk_acceptance', $riskMethodology?->risk_acceptance) }}">
                            @error('risk_acceptance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p> --}}
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Audit</p>
                                <p class="FieldHeadArbTxt">مراجعة المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_audit" id="risk_audit" class="bg-tx"
                                    placeholder="Write Risk Audit"
                                    value="{{ old('risk_audit', $riskMethodology?->risk_audit) }}">
                                @error('risk_audit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Change Management</p>
                                <p class="FieldHeadArbTxt">إدارة تغير المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_change_management" id="risk_change_management"
                                    class="bg-tx" placeholder="Write Risk Change Management"
                                    value="{{ old('risk_change_management', $riskMethodology?->risk_change_management) }}">
                                @error('risk_change_management')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>

    <x-modal id="objectivesModal" title="Select Objectives" :data="$objectives" :selectedvalues="isset($objectiveIds) ? $objectiveIds : []"
        checkboxClass="objectiveCheckbox" id_key="objective_id" value_key="objective" />
@endsection


@push('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        const editorSelectors = [
            '#editor',
            '#risk_identification',
            '#risk_analysis',
            '#risk_evaluation',
            '#documentation',
            '#alignment_iso'
        ];

        editorSelectors.forEach(selector => {
            ClassicEditor
                .create(document.querySelector(selector), {
                    height: 300
                })
                .catch(error => {
                    console.error(`Error initializing editor for ${selector}:`, error);
                });
        });



        function showDeleteModal() {
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        }

        $('.objectiveCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.objectiveCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#objectives').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#objectivesText').text(selectedOptionsText.length + " Objectives Selected.");
            } else {
                $('#objectivesText').text("No Objectives Selected.");

            }
        });
    </script>
@endpush
