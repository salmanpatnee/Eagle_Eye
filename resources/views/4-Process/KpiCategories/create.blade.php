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
            height: 300px;
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
                    <p class="ArbTxt">مؤشرات الأداء الرئيسية</p>
                    <p class="EngTxt">KPI Categories</p>
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
                <p class="PageHeadArbTxt">مؤشرات الأداء الرئيسية</p>
                <p class="PageHeadEngTxt">Key Performance Indicators</p>
            </div>
            <div class="ButtonContainer">
                <a href="/kpi-categories" class="MoreButton">
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

                <button type="submit" form="delete_form"
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
            action="{{ isset($category) ? route('kpi-categories.update', $category->id) : route('kpi-categories.store') }}"
            method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $category->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI ID</p>
                                <p class="FieldHeadArbTxt">رمز مؤشر الأداء الرئيسية</p>
                            </div>
                            <p><input type="text" name="kpi_id" id="kpi_id" class="sh-tx" placeholder="Enter ID"
                                    value="{{ old('kpi_id', $category?->kpi_id) }}"
                                    {{ $category?->kpi_id ? 'readonly' : '' }} required>
                                @error('kpi_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI Name</p>
                                <p class="FieldHeadArbTxt">اسم مؤشر الأداء الرئيسية</p>
                            </div>
                            <p><input type="text" name="kpi_name" id="kpi_name" class="sh-tx"
                                    placeholder="Enter Name" value="{{ old('kpi_name', $category?->kpi_name) }}"
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
                                <p class="FieldHeadEngTxt">KPI Name Arabic</p>
                                <p class="FieldHeadArbTxt">اسم عربي مؤشر الأداء الرئيسية</p>
                            </div>
                            <p><input type="text" name="kpi_name_ar" id="kpi_name_ar" class="sh-tx" placeholder="Enter Name"
                                    value="{{ old('kpi_name_ar', $category?->kpi_name_ar) }}"
                                    >
                                @error('kpi_name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                          
                        </div>
                    </div>


                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KPI Recommendation</p>
                                <p class="FieldHeadArbTxt">توصية مؤشر الأداء الرئيسية</p>
                            </div>
                            <p>
                                <textarea name="conclusion" id="editor" class="bg-tx" placeholder="Write Conclusion">
                                    {!! html_entity_decode($category?->conclusion) !!}

                                    {{-- {{ old('conclusion', $category?->conclusion) }} --}}
                                </textarea>
                                @error('conclusion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                height: 400
            })
            .catch(error => {
                console.error(error);
            });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
