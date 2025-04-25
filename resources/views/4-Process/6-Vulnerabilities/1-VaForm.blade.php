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
            @include('4-Process/6-Vulnerabilities/vaheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">
        @include('4-Process/6-Vulnerabilities/VaSidebar')
        <!-- CONTENT -->
        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تعريف الضعف</p>
                    <p class="PageHeadEngTxt">Vulnerabilities Definition</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/va-list" class="MoreButton">
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

                    <form method="POST" action="{{ route($routeName . '.delete') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $data?->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'DeleteButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </form>
                </div>
            </div>
            <form id="form" action="{{ isset($va) ? route('va.update', $va->id) : route('va.store') }}" method="POST">
                @csrf
                @if (isset($va))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $va->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Vulnerability ID</p>
                                    <p class="FieldHeadArbTxt">رمز الضعف</p>
                                </div>
                                <p><input type="text" name="va_id" id="va_id" class="sh-tx"
                                        placeholder="Enter Vulnerability ID" value="{{ old('va_id', $va?->va_id) }}"
                                        {{ $va?->va_id ? 'readonly' : '' }} required>
                                    @error('va_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Vulnerability Name</p>
                                    <p class="FieldHeadArbTxt">اسم الضعف</p>
                                </div>
                                <p><input type="text" name="va_name" id="va_name" class="bg-tx"
                                        placeholder="Enter Vulnerability Name"
                                        value="{{ old('va_name', $va?->va_name) }}" required>
                                    @error('va_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Vulnerability Description</p>
                                    <p class="FieldHeadArbTxt">وصف الضعف</p>
                                </div>
                                <p><input type="text" name="va_master_description" id="va_master_description"
                                        class="bg-tx" placeholder="Write Vulnerability Description"
                                        value="{{ old('va_master_description', $va?->va_master_description) }}">
                                    @error('va_master_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Type</p>
                                    <p class="FieldHeadArbTxt">نوع الضعف</p>
                                </div>
                                <p>
                                    <select name="va_type_id" id="va_type_id" class="sh-tx" required>
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($vatypeNames as $vatypeName)
                                            <option value="{{ $vatypeName->va_type_id }}"
                                                {{ $vatypeName?->va_type_id == old('va_type_id', $va?->va_type_id) ? 'selected' : '' }}>

                                                {{ $vatypeName?->va_type_id }} {{ $vatypeName->va_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Sub-Type</p>
                                    <p class="FieldHeadArbTxt">النوع الفرعي للضعف</p>
                                </div>
                                <p>
                                    <select name="va_sub_type_id" id="va_sub_type_id" class="sh-tx" required>
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($vasubtypeNames as $vasubtypeName)
                                            <option value="{{ $vasubtypeName->va_sub_type_id }}"
                                                {{ $vasubtypeName->va_sub_type_id == old('va_sub_type_id', $va?->va_sub_type_id) ? 'selected' : '' }}>

                                                {{ $vasubtypeName->va_sub_type_id }}
                                                {{ $vasubtypeName->va_sub_type_name }}</option>
                                        @endforeach
                                    </select>
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
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
