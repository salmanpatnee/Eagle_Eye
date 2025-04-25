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
            @include('4-Process/3-Asset/assetheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        <section id="sidebar">
            <ul class="side-menu top">
                <li>
                    <a href="/asset-register-input">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>تسجيل الأصول</h3>
                            <span class="text">Asset Registration</span>
                        </div>
                    </a>
                </li>
                <li class="active">
                    <a href="/asset-status-input">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>حالة الأصول</h3>
                            <span class="text">Asset Status</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/asset-type-input">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>نوع الأصل</h3>
                            <span class="text">Asset Type</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/asset-sub-type-input">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>النوع الفرعي للأصول</h3>
                            <span class="text">Asset Sub-Type</span>
                        </div>
                        <span class="text"></span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- SIDEBAR -->
    
    
    
        <!-- CONTENT -->
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($assetstatus) ? route('assetstatus.update', $assetstatus->id) : route('assetstatus.store') }}"
                method="POST">
                @csrf
                @if (isset($assetstatus))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $assetstatus->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف حالة الأصول</p>
                        <p class="PageHeadEngTxt">Asset Status Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="/asset-status-list" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('assetstatus.edit'))
                        <a href="{{route('assetstatus.create')}}" class="MoreButton">
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
                        class="{{ auth()->user()->can('delete-data') && request()->routeIs('assetstatus.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    </div>
                </div>
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Status ID</p>
                                    <p class="FieldHeadArbTxt">رمز حالة الأصول</p>
                                </div>
                                <p><input type="text" name="asset_status_id" id="asset_status_id" class="sh-tx"
                                        placeholder="Enter Asset Status ID"
                                        value="{{ old('asset_status_id', $assetstatus?->asset_status_id) }}"
                                        {{ $assetstatus?->asset_status_id ? 'readonly' : '' }} required>
                                    @error('asset_status_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Current Status</p>
                                    <p class="FieldHeadArbTxt">حالة الحالي للأصول</p>
                                </div>
                                <p><input type="text" name="asset_current_status" id="asset_current_status"
                                        class="sh-tx" placeholder="Current Status"
                                        value="{{ old('asset_current_status', $assetstatus?->asset_current_status) }}"
                                        required>
                                    @error('asset_current_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Status Description</p>
                                    <p class="FieldHeadArbTxt">وصف حالة الأصول</p>
                                </div>
                                <p><input type="text" name="asset_status_description" id="asset_status_description"
                                        class="bg-tx" placeholder="Write Asset Status Description"
                                        value="{{ old('asset_status_description', $assetstatus?->asset_status_description) }}">
                                    @error('asset_status_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
            <form method="POST" action="{{ route('assetstatus.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $assetstatus?->id }}">
                @csrf
                @method('DELETE')
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
