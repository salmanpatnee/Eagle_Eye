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

        @include('4-Process/3-Asset/AssetSidebar')
        <!-- SIDEBAR -->
    
    
    
        <!-- CONTENT -->
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($assetsubtype) ? route('assetsubtype.update', $assetsubtype->id) : route('assetsubtype.store') }}"
                method="POST">
                @csrf
                @if (isset($assetsubtype))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $assetsubtype->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف النوع الفرعي الأصل</p>
                        <p class="PageHeadEngTxt">Asset Sub-Type Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="/asset-sub-type-list" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('assetsubtype.edit'))
                            <a href="{{route('assetsubtype.create')}}" class="MoreButton">
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
                            class="{{ auth()->user()->can('delete-data') && request()->routeIs('assetsubtype.edit') ? 'MoreButton' : 'DisabledButton' }}">
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
                                    <p class="FieldHeadEngTxt">Asset Sub-Type ID</p>
                                    <p class="FieldHeadArbTxt">رمز النوع الفرعي للأصول</p>
                                </div>
                                <p><input type="text" name="asset_sub_type_id" id="asset_sub_type_id" class="sh-tx"
                                        placeholder="Enter Asset Sub-Type ID"
                                        value="{{ old('asset_sub_type_id', $assetsubtype?->asset_sub_type_id) }}"
                                        {{ $assetsubtype?->asset_sub_type_id ? 'readonly' : '' }} required>
                                    @error('asset_sub_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Sub-Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم النوع الفرعي للأصول</p>
                                </div>
                                <p><input type="text" name="asset_sub_type_name" id="AssetSubTypeName" class="sh-tx"
                                        placeholder="Asset Sub-Type Name"
                                        value="{{ old('asset_sub_type_name', $assetsubtype?->asset_sub_type_name) }}"
                                        required>
                                    @error('asset_sub_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Sub-Type Description</p>
                                    <p class="FieldHeadArbTxt">وصف النوع الفرعي للأصول</p>
                                </div>
                                <p><input type="text" name="asset_sub_type_description" id="asset_sub_type_description"
                                        class="bg-tx" placeholder="Write Asset Sub-Type Description"
                                        value="{{ old('asset_sub_type_description', $assetsubtype?->asset_sub_type_description) }}">
                                    @error('asset_sub_type_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم نوع الأصل</p>
                                </div>
                                <p>
                                    <select name="asset_type_id" id="asset_type_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assettypes as $assettypesdata)
                                            <option value="{{ $assettypesdata->asset_type_id }}"
                                                {{ $assettypesdata->asset_type_id == old('asset_type_id', $assetsubtype?->asset_type_id) ? 'selected' : '' }}>
                                                {{ $assettypesdata->asset_type_id }}
                                                {{ $assettypesdata->asset_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
            <form method="POST" action="{{ route('assetsubtype.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $assetsubtype?->id }}">
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
