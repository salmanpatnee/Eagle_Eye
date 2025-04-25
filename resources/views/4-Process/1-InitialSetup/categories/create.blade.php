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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/1-InitialSetup/initialheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>

    <div class="wrapper">

        @include('4-Process.1-InitialSetup._partials.sidebar')
        <!-- SIDEBAR -->



        <!-- CONTENT -->
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($category) ? route('categories.update', $category->category_id) : route('categories.store') }}"
                method="POST">
                @csrf
                @if (isset($category))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $category->category_id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف الفئة</p>
                        <p class="PageHeadEngTxt">Category Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('categories.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('categories.edit'))
                            <a href="{{ route('categories.create') }}" class="MoreButton">
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

                        <button type="button" id="btnDelete"
                            class="{{ request()->routeIs('categories.edit') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                <table cellspacing="0">
                    <div style="padding-top:30px; padding-bottom:10px; color:red; font-size:12px;">
                        <p style="text-align:right; padding-right:30px;">ملاحظة: تم إدخال الفئات بالفعل، يرجى إضافتها أو
                            تغييرها فقط بعد تحليل التأثير</p>
                        <p>Note: The categories is already entered, please add or change only after the impact analysis
                        </p>
                    </div>
                    <div class="ContentTableSection" style="margin-top:0px;">
                        <div class="ContentTable">

                            <div class="column">
                                <x-input label="Category ID" label_ar="رمز الفئة" name="category_id"
                                    placeholder="Enter Category ID" :value="$category?->category_id" required />

                            </div>
                            <div class="column">
                                <x-input label="Category Name" label_ar="اسم الفئة" name="category_name"
                                    placeholder="Enter Category Name" :value="$category?->category_name" required />


                            </div>
                        </div>

                        <div class="ContentTable">

                            <div class="column">
                                <x-input label="Category Name Arabic" label_ar="اسم الفئة العربية" name="category_name_ar"
                                    placeholder="Enter Category Name" :value="$category?->category_name_ar" />


                            </div>

                            <div class="column">


                            </div>
                        </div>

                        <div class="ContentTablebg">
                            <div class="column">
                                <x-input label="Category Description" label_ar="وصف الفئة" name="category_description"
                                    placeholder="Enter Category Description" :value="$category?->category_description" class="bg-tx" />


                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <x-input label="Category Source" label_ar="مصدر الفئة" name="Category_source"
                                    placeholder="Enter Category Source" :value="$category?->Category_source" class="bg-tx" />


                            </div>
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
    @include('components.delete-confirmation-modal')

    <form method="POST" action="{{ route('categories.destroy') }}" id="deleteForm">
        @csrf
        @method('DELETE')
        <input type="hidden" name="record" value="{{ $category?->category_id }}">
    </form>
</body>

</html>
