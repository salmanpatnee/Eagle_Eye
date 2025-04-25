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
                    <p class="ArbTxt">تصحيح</p>
                    <p class="EngTxt">Patch</p>
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
                <p class="PageHeadArbTxt"> تصحيح</p>
                <p class="PageHeadEngTxt">Patch</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{ route('patch.index') }}" class="MoreButton">
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
                    <input type="hidden" name="record" value="{{ $data?->patch_id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form" action="{{ isset($patch) ? route('patch.update', $patch->id) : route('patch.store') }}"
            method="POST">
            @csrf
            @if (isset($patch))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $patch->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Patch ID</p>
                                <p class="FieldHeadArbTxt">رمز تصحيح</p>
                            </div>
                            <p><input type="text" name="patch_id" id="patch_id" class="sh-tx"
                                    placeholder="Enter ID" value="{{ old('patch_id', $patch?->patch_id) }}"
                                    {{ $patch?->patch_id ? 'readonly' : '' }} required>
                                @error('patch_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Patch Name</p>
                                <p class="FieldHeadArbTxt"> اسم تصحيح</p>
                            </div>
                            <p><input type="text" name="patch_name" id="patch_name" class="sh-tx"
                                    placeholder="Enter Name" value="{{ old('patch_name', $patch?->patch_name) }}"
                                    required>
                                @error('patch_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="ContentTable">

                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Technical Reference</p>
                                <p class="FieldHeadArbTxt"> مرجع تقني</p>
                            </div>
                            <p><input type="text" name="technical_reference" id="technical_reference"
                                    class="sh-tx" placeholder="Enter Name"
                                    value="{{ old('technical_reference', $patch?->technical_reference) }}">
                                @error('technical_reference')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>


                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Third Party Name</p>
                                <p class="FieldHeadArbTxt"> اسم الطرف الثالث</p>
                            </div>
                            <p>
                                <select name="tpt_id" id="tpt_id" class="sh-tx" required>
                                    <option value="">Select Third Party</option>
                                    @foreach ($thirdParties as $thirdParty)
                                        <option value="{{ $thirdParty->tpt_id }}"
                                            {{ $patch?->tpt_id == $thirdParty?->tpt_id ? 'selected' : null }}>
                                            {{ $thirdParty->tpt_id }} {{ $thirdParty->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
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
            .create(document.querySelector('#editor'), {
                height: 400
            })
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
