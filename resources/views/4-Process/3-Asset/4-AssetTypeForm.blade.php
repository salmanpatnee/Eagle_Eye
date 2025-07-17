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
                    <a href="/assets/create">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>تسجيل الأصول</h3>
                            <span class="text">Asset Registration</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/asset-status-input">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>حالة الأصول</h3>
                            <span class="text">Asset Status</span>
                        </div>
                    </a>
                </li>
                <li class="active">
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
                action="{{ isset($assettype) ? route('assettype.update', $assettype->id) : route('assettype.store') }}"
                method="POST">
                @csrf
                @if (isset($assettype))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $assettype->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف نوع الأصل</p>
                        <p class="PageHeadEngTxt">Asset Type Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="/asset-type-list" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('assettype.edit'))
                            <a href="{{ route('assettype.create') }}" class="MoreButton">
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
                            class="{{ auth()->user()->can('delete-data') && request()->routeIs('assettype.edit') ? 'MoreButton' : 'DisabledButton' }}">
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
                                    <p class="FieldHeadEngTxt">Asset Type ID</p>
                                    <p class="FieldHeadArbTxt">رمز نوع الأصل</p>
                                </div>
                                <p><input type="text" name="asset_type_id" id="asset_type_id" class="sh-tx"
                                        placeholder="Enter Asset Type ID"
                                        value="{{ old('asset_type_id', $assettype?->asset_type_id) }}"
                                        {{ $assettype?->asset_type_id ? 'readonly' : '' }} required>
                                    @error('asset_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم نوع الأصل</p>
                                </div>
                                <p><input type="text" name="asset_type_name" id="asset_type_name" class="sh-tx"
                                        placeholder="Asset Type Name"
                                        value="{{ old('asset_type_name', $assettype?->asset_type_name) }}" required>
                                    @error('asset_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Type Description</p>
                                    <p class="FieldHeadArbTxt">وصف نوع الأصل</p>
                                </div>
                                <p><input type="text" name="asset_type_description" id="asset_type_description"
                                        class="bg-tx" placeholder="Write Asset Type Description"
                                        value="{{ old('asset_type_description', $assettype?->asset_type_description) }}">
                                    @error('asset_type_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>

            <form method="POST" action="{{ route('assettype.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $assettype?->id }}">
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
