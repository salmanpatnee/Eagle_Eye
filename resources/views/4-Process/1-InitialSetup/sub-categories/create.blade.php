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
                action="{{ isset($subCategory) ? route('sub-categories.update', $subCategory->id) : route('sub-categories.store') }}"
                method="POST">
                @csrf
                @if (isset($subCategory))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $subCategory->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف الفئة الفرعية</p>
                        <p class="PageHeadEngTxt">Sub-Category Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('sub-categories.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('sub-categories.edit'))
                            <a href="{{ route('sub-categories.create') }}" class="MoreButton">
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
                            class="{{ request()->routeIs('sub-categories.edit') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <x-input label="Sub-Category ID" label_ar="رمز الفئة الفرعية" name="sub_category_id"
                                    placeholder="Enter Sub-Category ID" :value="$subCategory?->sub_category_id" required />


                            </div>
                            <div class="column">
                                <x-input label="Sub-Category Name" label_ar="اسم الفئة الفرعية" name="sub_category_name"
                                    placeholder="Enter Sub-Category Name" :value="$subCategory?->sub_category_name" required />


                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <x-input label="Sub-Category Description" label_ar="وصف الفئة الفرعية"
                                    name="sub_category_description" placeholder="Enter Sub-Category Description"
                                    :value="$subCategory?->sub_category_description" class="bg-tx" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <x-label label="Category" label_ar="الفئة" />

                                <p>
                                    <select name="category_id" id="category_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}"
                                                {{ $category->category_id == old('category_id', $subCategory?->category_id) ? 'selected' : '' }}>
                                                {{ $category->category_id }} {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                <x-error name="category_id" />

                            </div>
                        </div>
                    </div>
                </table>
            </form>
            <form method="POST" action="{{ route('sub-categories.destroy') }}" id="deleteForm">
                @csrf
                @method('DELETE')
                <input type="hidden" name="record" value="{{ $subCategory?->id }}">
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
</body>

</html>
