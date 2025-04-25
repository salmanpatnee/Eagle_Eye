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
                        <p class="PageHeadArbTxt">النوع الفرعي للضعف</p>
                        <p class="PageHeadEngTxt">Vulnerability Sub-Types</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="/va-sub-type-list" class="MoreButton">
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
                <form id="form"
                action="{{ isset($vasubtype) ? route('vasubtype.update', $vasubtype->id) : route('vasubtype.store') }}"
                method="POST">
                @csrf
                @if (isset($vasubtype))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $vasubtype->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Sub-Type ID</p>
                                    <p class="FieldHeadArbTxt">رمز النوع الفرعي للضعف</p>
                                </div>
                                <p><input type="text" name="va_sub_type_id" id="va_sub_type_id" class="sh-tx"
                                        placeholder="Enter VA Sub-Type ID"
                                        value="{{ old('va_sub_type_id', $vasubtype?->va_sub_type_id) }}"
                                        {{ $vasubtype?->va_sub_type_id ? 'readonly' : '' }} required>
                                    @error('va_sub_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Sub-Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم النوع الفرعي للضعف</p>
                                </div>
                                <p><input type="text" name="va_sub_type_name" id="va_sub_type_name" class="sh-tx"
                                        placeholder="Enter VA Sub-Type Name"
                                        value="{{ old('va_sub_type_name', $vasubtype?->va_sub_type_name) }}" required>
                                    @error('va_sub_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Sub-Type Description</p>
                                    <p class="FieldHeadArbTxt">وصف النوع الفرعي للضعف</p>
                                </div>
                                <p><input type="text" name="va_sub_type_description" id="va_sub_type_description"
                                        class="bg-tx" placeholder="Write VA Sub-Type Description"
                                        value="{{ old('va_sub_type_description', $vasubtype?->va_sub_type_description) }}">
                                    @error('va_sub_type_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Remarks</p>
                                    <p class="FieldHeadArbTxt">ملاحظات</p>
                                </div>
                                <p><input type="text" name="va_sub_type_remarks" id="va_sub_type_remarks"
                                        class="bg-tx" placeholder="Write VA Sub-Type Remarks"
                                        value="{{ old('va_sub_type_remarks', $vasubtype?->va_sub_type_remarks) }}">
                                    @error('va_sub_type_remarks')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>

                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Vulnerability Types</p>
                                </div>
                                <select name="va_type_id" id="va_type_id" class="sh-tx" required="">
                                    <option value="">Select Option</option>
                                    @foreach ($vatypes as $type)
                                        <option value="{{ $type?->va_type_id }}"
                                            {{ $type->va_type_id == old('va_type_id', $vasubtype?->va_type_id) ? 'selected' : null }}>
                                            {{ $type->va_type_id . '-' . $type->va_type_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('va_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

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
