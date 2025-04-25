<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <style>
        .ck.ck-content.ck-editor__editable {
            height: 200px;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">معيار مؤشرات الأداء الرئيسية</p>
                    <p class="EngTxt">KPI Standards</p>
                </div>
                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/KpiCategories/sidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">معيار مؤشرات الأداء الرئيسية</p>
                <p class="PageHeadEngTxt">Key Performance Indicators Standards</p>
            </div>
            <div class="ButtonContainer">
                <a href="/kpi-standards" class="MoreButton">
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


                <form method="POST" action="{{ route($routeName . '.delete') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($kpi) ? route('kpi-standards.update', $kpi->id) : route('kpi-standards.store') }}"
            method="POST">
            @csrf
            @if (isset($kpi))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $kpi->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI ID</p>
                                <p class="FieldHeadArbTxt">رمز مؤشر الأداء الرئيسية </p>
                            </div>
                            <p><input type="text" name="kpi_id" id="kpi_id" class="sh-tx"
                                    placeholder="Enter KPI ID" value="{{ old('kpi_id', $kpi?->kpi_id) }}"
                                    {{ $kpi?->kpi_id ? 'readonly' : '' }} required>
                                @error('kpi_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>

                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI Name</p>
                                <p class="FieldHeadArbTxt"> اسم مؤشر الأداء الرئيسية </p>
                            </div>
                            <p><input type="text" name="kpi_name" id="kpi_name" class="sh-tx"
                                    placeholder="Enter KPI Name" value="{{ old('kpi_name', $kpi?->kpi_name) }}"
                                    required>
                                @error('kpi_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>



                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Reference</p>
                                <p class="FieldHeadArbTxt"> المرجع </p>
                            </div>
                            <p><input type="text" name="reference" id="reference" class="sh-tx"
                                    placeholder="Enter Reference" value="{{ old('reference', $kpi?->reference) }}"
                                    required>
                                @error('reference')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>

                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Priority</p>
                                <p class="FieldHeadArbTxt">الأولوية</p>
                            </div>
                            <p><input type="number" name="priority" id="priority" class="sh-tx"
                                    placeholder="Enter Priority" value="{{ old('priority', $kpi?->priority) }}">
                                @error('priority')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>


                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Category</p>
                                <p class="FieldHeadArbTxt"> الفئة </p>
                            </div>
                            <select name="category_id" id="category_id" class="sh-tx" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}"
                                        {{ $category->category_id == old('category_id', $kpi?->category_id) ? 'selected' : null }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice</p>
                                <p class="FieldHeadArbTxt"> أفضل الممارسات </p>
                            </div>
                            <select name="best_practice_id" id="best_practice_id" class="sh-tx">
                                <option value="">Select Best Practice</option>
                                @foreach ($bestPractices as $bestPractice)
                                    <option value="{{ $bestPractice->best_practices_id }}"
                                        {{ $bestPractice->best_practices_id == old('best_practice_id', $kpi?->best_practice_id) ? 'selected' : null }}>
                                        {{ $bestPractice->best_practices_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('best_practice_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI Frequency Value</p>
                                <p class="FieldHeadArbTxt"> تكرار قيمة المؤشر الرئيسي </p>
                            </div>
                            <p><input type="number" name="kpi_frequency_value" id="kpi_frequency_value"
                                    class="sh-tx" placeholder="Enter Unit"
                                    value="{{ old('kpi_frequency_value', $kpi?->kpi_frequency_value) }}">
                                @error('kpi_frequency_value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>

                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI Frequency Unit</p>
                                <p class="FieldHeadArbTxt">وحدة تكرار المؤشر الرئيسي</p>
                            </div>

                            <select name="kpi_frequency_unit" id="kpi_frequency_unit" class="sh-tx">
                                <option value="">Select Value</option>
                                @foreach ($frequencyUnits as $unit)
                                    <option value="{{ $unit }}"
                                        {{ $unit == old('kpi_frequency_unit', $kpi?->kpi_frequency_unit) ? 'selected' : null }}>
                                        {{ $unit }}</option>
                                @endforeach
                            </select>
                            <p>
                                @error('kpi_frequency_unit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>


                    <div class="ContentTableBg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Remarks</p>
                                <p class="FieldHeadArbTxt"> ملاحظات </p>
                            </div>
                            <textarea name="remarks" id="remarks" cols="30" rows="10" placeholder="Enter Remarks">
                                {!! html_entity_decode($kpi?->remarks) !!}
                            </textarea>

                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- <p><input type="text" name="remarks" id="remarks" class="bg-tx"
                                    placeholder="Enter Remarks" value="{{ old('remarks', $kpi?->remarks) }}">
                            </p> --}}

                        </div>
                    </div>

                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Frequency</p>
                                <p class="FieldHeadArbTxt">تكرار</p>
                            </div>
                            <textarea name="kpi_value" id="editor" cols="30" rows="10" placeholder="Enter Value">
                            {!! html_entity_decode($kpi?->kpi_value) !!}
                        </textarea>

                            @error('kpi_value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </div>
            </table>
        </form>
    </div>
    @include('components.delete-confirmation-modal')
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#remarks'))
            .catch(error => {
                console.error(error);
            });


            ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
    </script>
</body>
