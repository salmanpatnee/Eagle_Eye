@extends('layouts.control')
@section('title', 'KPI Standards')
@section('title_ar', 'معيار مؤشرات الأداء الرئيسية')

@section('content')

    <div>
        <x-table.action-wrapper title="{{ $kpiStandard?->id ? 'Update' : 'New' }} KPI Standard">
            <x-action.button label="View" label_ar="منظر" route_name="kpi-standards.index" />
        </x-table.action-wrapper>

        <form
            action="{{ isset($kpiStandard) ? route('kpi-standards.update', $kpiStandard?->kpi_id) : route('kpi-standards.store') }}"
            method="POST">
            @csrf
            @if (isset($kpiStandard))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="KPI Standard ID" label_ar="رمز معيار مؤشرات الأداء الرئيسية" name="kpi_id"
                            required="true" :readonly="$kpiStandard?->kpi_id" placeholder="Enter KPI Standard ID" :value="$kpiStandard?->kpi_id" />
                    </div>
                    <div>
                        <x-form.field label="KPI Standard Name" label_ar="اسم معيار مؤشرات الأداء الرئيسية" name="kpi_name"
                            required="true" placeholder="Enter KPI Standard Name" :value="$kpiStandard?->kpi_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Reference" label_ar="المرجع" name="reference" placeholder="Enter Reference"
                            :value="$kpiStandard?->reference" required="true" />
                    </div>
                    <div>
                        <x-form.field type="number" label="Priority" label_ar="الأولوية" name="priority"
                            placeholder="Enter Priority" :value="$kpiStandard?->priority" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Category" label_ar="الفئة" name="category_id" required="true"
                            :value="$kpiStandard?->category_id" :data="$categories" id_key="category_id" value_key="category_name" />
                    </div>
                    <div>
                        <x-form.select label="Best Practice" label_ar="أفضل الممارسات" name="best_practice_id"
                            :value="$kpiStandard?->best_practice_id" :data="$bestPractices" id_key="best_practice_id"
                            value_key="best_practice_name" />
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="KPI Frequency Value" label_ar="تكرار قيمة المؤشر الرئيسي"
                            name="kpi_frequency_value" placeholder="Enter Frequency Value" :value="$kpiStandard?->kpi_frequency_value" />
                    </div>
                    <div>
                        <x-form.field label="KPI Frequency Unit" label_ar="وحدة تكرار المؤشر الرئيسي"
                            name="kpi_frequency_unit" placeholder="Enter KPI Frequency Unit" :value="$kpiStandard?->kpi_frequency_unit" />
                    </div>
                </x-form.grid-col>

                <div>
                    <x-form.textarea-field label="Remarks" label_ar="ملاحظات" name="remarks" placeholder="Enter Remarks"
                        :value="$kpiStandard?->remarks" />
                </div>

                <div>
                    <x-form.textarea-field label="Frequency" label_ar="تكرار" name="kpi_value" placeholder="Enter Value"
                        :value="$kpiStandard?->kpi_value" />
                </div>

                <div class="flex justify-end mt-1">
                    <x-form.submit label="KPI Standard" label_ar="معيار مؤشرات الأداء الرئيسية" :isUpdate="$kpiStandard?->id" />
                </div>
            </div>
        </form>

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        const editorSelectors = [
            '#remarks',
            '#kpi_value',
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
