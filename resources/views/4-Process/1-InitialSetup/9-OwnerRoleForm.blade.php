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

        @include('4-Process/1-InitialSetup/_partials/sidebar')
        <!-- SIDEBAR -->
    
    
    
        <!-- CONTENT -->
        <div class="IndiTable">
            
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">دور الصاحب</p>
                        <p class="PageHeadEngTxt">Owner Roles</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="/owner-role-list" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('ownerrole.edit'))
                        <a href="{{ route('ownerrole.create') }}" class="MoreButton">
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
                        class="{{ request()->routeIs('ownerrole.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    <form method="POST" action="{{ route('ownerrole.delete') }}" id="delete_form">
                        <input type="hidden" name="record" value="{{ $ownerrole?->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    </div>
                </div>
                <form id="form" action="{{ isset($ownerrole) ? route('ownerrole.update', $ownerrole->id) : route('ownerrole.store') }}"
                method="POST">
                @csrf
                @if (isset($ownerrole))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $ownerrole->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Role ID</p>
                                    <p class="FieldHeadArbTxt">رمز دور الصاحب</p>
                                </div>
                                <p><input type="text" name="owner_role_id" id="owner_role_id" class="sh-tx"
                                        placeholder="Enter Owner's Role ID"
                                        value="{{ old('owner_role_id', $ownerrole?->owner_role_id) }}"
                                        {{ $ownerrole?->owner_role_id ? 'readonly' : '' }} required>
                                    @error('owner_role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Role Name</p>
                                    <p class="FieldHeadArbTxt">اسم دور الصاحب</p>
                                </div>
                                <p><input type="text" name="owner_role_name" id="owner_role_name" class="sh-tx"
                                        placeholder="Enter Owner's Role Name"
                                        value="{{ old('owner_role_name', $ownerrole?->owner_role_name) }}" required>
                                    @error('owner_role_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Role Description</p>
                                    <p class="FieldHeadArbTxt">وصف دور الصاحب</p>
                                </div>
                                <p><input type="text" name="owner_role_description" id="owner_role_description"
                                        class="bg-tx" placeholder="Enter Owner's Role Description"
                                        value="{{ old('owner_role_description', $ownerrole?->owner_role_description) }}">
                                    @error('owner_role_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        }
    </script>
</body>
</html>
