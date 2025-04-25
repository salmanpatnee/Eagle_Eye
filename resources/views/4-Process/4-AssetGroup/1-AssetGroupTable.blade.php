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
            @include('4-Process/4-AssetGroup/assetgroupheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        @include('4-Process/4-AssetGroup/asset-group-sidebar')
        <!-- SIDEBAR -->
    
    
    
        <!-- CONTENT -->
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">مجموعة الأصول</p>
                    <p class="PageHeadEngTxt">Asset Groups</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/asset-group-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('assetgroup.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('assetgroup.edit', $assetGroup->asset_group_id) }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form method="POST" action="{{ route('assetgroup.delete') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $assetGroup->id }}">
                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Group ID</p>
                                <p class="FieldHeadArbTxt">رمز مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $assetGroup->asset_group_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Group Name</p>
                                <p class="FieldHeadArbTxt">اسم مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $assetGroup->asset_group_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Group Description</p>
                                <p class="FieldHeadArbTxt">وصف مجموعة الأصول</p>
                            </div>
                            <p class="bg-tx">{{ $assetGroup->asset_group_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Group Owner Name</p>
                                <p class="FieldHeadArbTxt">اسم صاحب مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $assetGroup->owner?->owner_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Classification Name</p>
                                <p class="FieldHeadArbTxt">اسم التصنيف مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $assetGroup->classification?->classification_name }}</p>
                            {{-- <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Custodian Name</p>
                                <p class="FieldHeadArbTxt">اسم وصي مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $assetGroup->custodian_name_name }}</p> --}}
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodians</p>
                                <p class="FieldHeadArbTxt">اسم الوصي</p>
                            </div>
                            <ol class="resource-list">
                                @foreach ($assetGroup->custodians as $custodian)
                                    <li>{{ $custodian->custodian_role_title }}</li>
                                @endforeach
                            </ol>
                        </div>
                        {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Group Category Name</p>
                                <p class="FieldHeadArbTxt">اسم الفئة مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $assetGroup->category_name }}</p>
                        </div> --}}
                    </div>
                </div>
            </table>
        </div>
    </div>
    @include('components.delete-confirmation-modal')


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
});
    </script>
</body>

</html>
