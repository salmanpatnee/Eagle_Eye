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
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <style>
        .ck.ck-content.ck-editor__editable {
            height: 300px;
        }

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

    div#selectedCategoriesText {
        margin-top: 1em;
        color: cornflowerblue;
    }

    .modal-body.scroll {
        overflow-y: auto;
        max-height: 200px;
    }

    @media (min-width: 768px) {
        .modal-dialog {
            width: 100vh;
            margin: 200px auto;
        }
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
                    <p class="ArbTxt">الطرف الثالث</p>
                    <p class="EngTxt">Third Party</p>
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
        @include('4-Process/TptExperts/Sidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt"> الطرف الثالث</p>
                <p class="PageHeadEngTxt">Third Party</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{ route('third-party.index') }}" class="MoreButton">
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
                    <input type="hidden" name="record" value="{{ $data?->tpt_id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($thirdParty) ? route('third-party.update', $thirdParty->id) : route('third-party.store') }}"
            method="POST">
            @csrf
            @if (isset($thirdParty))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $thirdParty->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Third Party ID</p>
                                <p class="FieldHeadArbTxt">رمز الطرف الثالث</p>
                            </div>
                            <p><input type="text" name="tpt_id" id="tpt_id" class="sh-tx" placeholder="Enter ID"
                                    value="{{ old('tpt_id', $thirdParty?->tpt_id) }}"
                                    {{ $thirdParty?->tpt_id ? 'readonly' : '' }} required>
                                @error('tpt_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Third Party Name</p>
                                <p class="FieldHeadArbTxt"> اسم الطرف الثالث</p>
                            </div>
                            <p><input type="text" name="tpt_name" id="tpt_name" class="sh-tx"
                                    placeholder="Enter Name" value="{{ old('tpt_name', $thirdParty?->tpt_name) }}"
                                    required>
                                @error('tpt_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Contact Person Name</p>
                                <p class="FieldHeadArbTxt">اسم جهة الاتصال </p>
                            </div>
                            <p><input type="text" name="tpt_contact_person_name" id="tpt_contact_person_name"
                                    class="sh-tx" placeholder="Enter Name"
                                    value="{{ old('tpt_contact_person_name', $thirdParty?->tpt_contact_person_name) }}">
                                @error('tpt_contact_person_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Third Party Address</p>
                                <p class="FieldHeadArbTxt"> عنوان الطرف الثالث</p>
                            </div>
                            <p><input type="text" name="tpt_address" id="tpt_address" class="sh-tx"
                                    placeholder="Enter Address"
                                    value="{{ old('tpt_address', $thirdParty?->tpt_address) }}">
                                @error('tpt_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Country Origin</p>
                                <p class="FieldHeadArbTxt">بلد منشأ الطرف الثالث</p>
                            </div>
                            <p><input type="text" name="tpt_country_origin" id="tpt_country_origin"
                                    class="sh-tx" placeholder="Enter Country"
                                    value="{{ old('tpt_country_origin', $thirdParty?->tpt_country_origin) }}">
                                @error('tpt_country_origin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Established Date</p>
                                <p class="FieldHeadArbTxt"> تاريخ تأسيس الطرف الثالث</p>
                            </div>
                            <p><input type="date" name="tpt_established_date" id="tpt_established_date"
                                    class="sh-tx" placeholder="Enter Date"
                                    value="{{ old('tpt_established_date', $thirdParty?->tpt_established_date) }}">
                                @error('tpt_established_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">

                            <x-label label="Experties" label_ar="اسم الخبرات" />
                            <x-modal-button modal_id="expertiesModal" label="Add Experty" name="experties"
                                :data="isset($expertyIds) ? json_encode($expertyIds) : []" />
                        </div>
                        <div class="column">

                        </div>
                    </div>




                </div>
            </table>
        </form>

    </div>
    @include('components.delete-confirmation-modal')
    <x-modal id="expertiesModal" title="Select Experty" :data="$experties" :selectedvalues="isset($expertyIds) ? $expertyIds : []"
    checkboxClass="expertyCheckbox" id_key="tpt_experties_id" value_key="tpt_experties_name" />

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

    <script>
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
        $('.expertyCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.expertyCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#experties').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#expertiesText').text(selectedOptionsText.length + " Experties Selected.");
            } else {
                $('#expertiesText').text("Experty selected.");
            }
        });
    </script>



</body>
