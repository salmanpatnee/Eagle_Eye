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
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
    <style>
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
                    @if (request()->routeIs('assetgroup.edit'))
                    <a href="{{route('assetgroup.create')}}" class="MoreButton">
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
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs('assetgroup.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>
                </div>
            </div>
            <form method="POST" action="{{ route('assetgroup.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $assetGroup?->id }}">
                @csrf
                @method('DELETE')
            </form>
            <form id="form"
                action="{{ isset($assetGroup) ? route('assetgroup.update', $assetGroup->id) : route('assetgroup.store') }}"
                method="POST">
                @csrf
                @if (isset($assetGroup))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $assetGroup->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Group ID</p>
                                    <p class="FieldHeadArbTxt">رمز مجموعة الأصول</p>
                                </div>
                                <p><input type="text" name="asset_group_id" id="asset_group_id" class="sh-tx"
                                        placeholder="Enter Asset Group ID"
                                        value="{{ old('asset_group_id', $assetGroup?->asset_group_id) }}"
                                        {{ $assetGroup?->asset_group_id ? 'readonly' : '' }} required>
                                    @error('asset_group_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Group Name</p>
                                    <p class="FieldHeadArbTxt">اسم مجموعة الأصول</p>
                                </div>
                                <p><input type="text" name="asset_group_name" id="asset_group_name" class="sh-tx"
                                        placeholder="Write Asset Group Name"
                                        value="{{ old('asset_group_name', $assetGroup?->asset_group_name) }}" required>
                                    @error('asset_group_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Group Description</p>
                                    <p class="FieldHeadArbTxt">وصف مجموعة الأصول</p>
                                </div>
                                <p><input type="text" name="asset_group_description" id="asset_group_description"
                                        class="bg-tx" placeholder="Write Asset Group Description"
                                        value="{{ old('asset_group_description', $assetGroup?->asset_group_description) }}">
                                    @error('asset_group_description')
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
                                    <p class="FieldHeadEngTxt">Asset Group Owner Name</p>
                                    <p class="FieldHeadArbTxt">اسم صاحب مجموعة الأصول</p>
                                </div>
                                <p>
                                    <select name="owner_id" id="owner_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($grpowner as $grpownerdata)
                                            <option value="{{ $grpownerdata->owner_role_id }}"
                                                {{ $grpownerdata->owner_role_id == old('owner_id', $assetGroup?->owner_id) ? 'selected' : '' }}>
                                                {{ $grpownerdata->owner_role_id }} - {{ $grpownerdata->owner_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Classification Name</p>
                                    <p class="FieldHeadArbTxt">اسم التصنيف مجموعة الأصول</p>
                                </div>
                                <p>
                                    <select name="classification_id" id="classification_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($classname as $classnamedata)
                                            <option value="{{ $classnamedata->classification_id }}"
                                                {{ $classnamedata->classification_id == old('classification_id', $assetGroup?->classification_id) ? 'selected' : '' }}>
                                                {{ $classnamedata->classification_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                {{-- <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodians</p>
                                    <p class="FieldHeadArbTxt">تسجيل الوصي</p>
                                </div>
                                <p>
                                    <button type="button" class="sh-tx" data-toggle="modal"
                                        data-target="#custodianmodel">Add
                                        Custodians</button>
                                    <input type="hidden" name="custodianname" id="selectedCustodian">
                                <div id="selectedCustodianText"></div>
                                </p> --}}
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <x-label label="Custodians" label_ar="اسم الوصي" />
                                <x-modal-button modal_id="custodianModal" label="Add Custodian" name="custodians"
                                    :data="isset($custodianRoleIds) ? json_encode($custodianRoleIds) : ''" />
                            </div>
                            {{-- <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Category Name</p>
                                    <p class="FieldHeadArbTxt">اسم الفئة</p>
                                </div>
                                <p>
                                    <button type="button" class="sh-tx" data-toggle="modal"
                                        data-target="#categorymodel">Add
                                        Categories</button>
                                    <input type="hidden" name="categories" id="selectedCategories">
                                <div id="selectedCategoriesText"></div>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')
    <x-modal id="custodianModal" title="Select Custodian" :data="$custodians" :selectedvalues="isset($custodianRoleIds) ? $custodianRoleIds : []"
        checkboxClass="custodianCheckbox" id_key="custodian_role_id" value_key="custodian_role_title" />

    {{-- <div class="modal fade" id="custodianmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Custodian</h4>
                </div>
                <div class="modal-body">
                    @foreach ($assetCustNames as $assetCustName)
                        <label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="custodianclass"
                                        name="custodians{{ $assetCustName->custodian_name_id }}"
                                        id="custodians-{{ $assetCustName->custodian_name_id }}"
                                        value="{{ $assetCustName->custodian_name_id }}">
                                    {{ $assetCustName->custodian_name_id }} -
                                    {{ $assetCustName->custodian_name_name }}
                                </label>
                            </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select Custodians</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="modal fade" id="categorymodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select categories</h4>
                </div>
                <div class="modal-body">
                    @foreach ($assetCategory as $CategoryName)
                        <label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="categoryclass"
                                        name="category{{ $CategoryName->category_id }}"
                                        id="category-{{ $CategoryName->category_id }}"
                                        value="{{ $CategoryName->category_id }}">
                                    {{ $CategoryName->category_id }} - {{ $CategoryName->category_name }}
                                </label>
                            </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select categories</button>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

    <script>
        $('.custodianCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.custodianCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#custodians').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#custodiansText').text(selectedOptionsText.length + " Custodian Selected.");
            } else {
                $('#custodiansText').text("Custodian selected.");
            }
        });
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}

        function updateSelectedCustodian() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.custodianclass:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#selectedCustodian').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedCustodianText').text(selectedOptionsText.length + " Custodian Selected.");
            } else {
                $('#selectedCustodianText').text("No Custodian Selected.");

            }

        }

        // When any checkbox is clicked
        $('.custodianclass').change(function() {
            updateSelectedCustodian();
        });



        function updateSelectedOptions() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.categoryclass:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#selectedCategories').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedCategoriesText').text(selectedOptionsText.length + " categories selected.");
            } else {
                $('#selectedCategoriesText').text("No categories selected.");

            }

        }

        // When any checkbox is clicked
        $('.categoryclass').change(function() {
            updateSelectedOptions();
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
