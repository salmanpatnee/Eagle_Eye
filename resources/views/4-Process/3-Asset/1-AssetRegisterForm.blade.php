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
            <form method="POST" action="{{ route('assetreg.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $assetregister?->asset_id }}">
                @csrf
                @method('DELETE')
            </form>

            <form id="form"
                action="{{ isset($assetregister) ? route('assetreg.update', $assetregister->asset_id) : route('assetreg.store') }}"
                method="POST">
                @csrf
                @if (isset($assetregister))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $assetregister->asset_id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تسجيل الأصول</p>
                        <p class="PageHeadEngTxt">Asset Registration</p>
                    </div>

                    <div class="ButtonContainer">
                        <a href="/asset-register-list" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('assetreg.edit'))
                            <a href="{{ route('assetreg.create') }}" class="MoreButton">
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
                            class="{{ auth()->user()->can('delete-data') && request()->routeIs('assetreg.edit') ? 'MoreButton' : 'DisabledButton' }}">
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
                                    <p class="FieldHeadEngTxt">Asset ID</p>
                                    <p class="FieldHeadArbTxt">رمز الأصول</p>
                                </div>
                                <p><input type="text" name="asset_id" id="asset_id" class="sh-tx"
                                        placeholder="Enter Asset ID"
                                        value="{{ old('asset_id', $assetregister?->asset_id) }}"
                                        {{ $assetregister?->asset_id ? 'readonly' : '' }} required>
                                    @error('asset_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Name</p>
                                    <p class="FieldHeadArbTxt">اسم الأصول</p>
                                </div>
                                <p><input type="text" name="asset_name" id="asset_name" class="sh-tx"
                                        placeholder="Enter Asset Name"
                                        value="{{ old('asset_name', $assetregister?->asset_name) }}" required>
                                    @error('asset_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Description</p>
                                    <p class="FieldHeadArbTxt">وصف الأصول</p>
                                </div>
                                <p><input type="text" name="asset_description" id="asset_description"
                                        class="bg-tx" placeholder="Write Asset Description"
                                        value="{{ old('asset_description', $assetregister?->asset_description) }}">
                                    @error('asset_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset IP Address</p>
                                    <p class="FieldHeadArbTxt">عنوان IP للأصول</p>
                                </div>
                                <p><input type="text" name="asset_ip_address" id="asset_ip_address"
                                        class="sh-tx" placeholder="Enter Asset IP Address (If Any)"
                                        value="{{ old('asset_ip_address', $assetregister?->asset_ip_address) }}">
                                    @error('asset_ip_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Client Server Name</p>
                                    <p class="FieldHeadArbTxt">اسم خادم الأصول</p>
                                </div>
                                <p><input type="text" name="asset_host_name" id="asset_host_name" class="sh-tx"
                                        placeholder="Enter Asset Host Name (If Any)"
                                        value="{{ old('asset_host_name', $assetregister?->asset_host_name) }}">
                                    @error('asset_host_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset URL</p>
                                    <p class="FieldHeadArbTxt">رابط الأصول</p>
                                </div>
                                <p><input type="text" name="asset_url" id="asset_url" class="sh-tx"
                                        placeholder="Enter Asset URL (If Any)"
                                        value="{{ old('asset_url', $assetregister?->asset_url) }}">
                                    @error('asset_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">

                                <x-label label="Categories" label_ar="اسم الفئة" />
                                <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                                    :data="isset($categoryIds) ? json_encode($categoryIds) : []" />



                            </div>
                        </div>

                        {{-- <div class="ContentTable">
    
                            <div class="column">
    
                                <x-label label="Custodians" />
                                <x-modal-button modal_id="custodiansModal" label="Add Custodian" name="custodians"
                                    :data="isset($custodianIds) ? json_encode($custodianIds) : []" />
    
    
    
    
                            </div>
                            <div class="column"></div>
                        </div> --}}

                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Group Name</p>
                                    <p class="FieldHeadArbTxt">اسم مجموعة الأصول</p>
                                </div>
                                <p>
                                    <select name="asset_group_id" id="asset_group_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assetgroup as $assetgroupdata)
                                            <option value="{{ $assetgroupdata->asset_group_id }}"
                                                {{ $assetgroupdata->asset_group_id == old('asset_group_id', $assetregister?->asset_group_id) ? 'selected' : '' }}>
                                                {{ $assetgroupdata->asset_group_id }}
                                                {{ $assetgroupdata->asset_group_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('asset_group_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Classification Name</p>
                                    <p class="FieldHeadArbTxt">اسم التصنيف</p>
                                </div>
                                <p>
                                    <select name="classification_id" id="classification_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assetclass as $assetclassdata)
                                            <option value="{{ $assetclassdata->classification_id }}"
                                                {{ $assetclassdata->classification_id == old('classification_id', $assetregister?->classification_id)
                                                    ? 'selected'
                                                    : '' }}>
                                                {{ $assetclassdata->classification_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('classification_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Owner Name</p>
                                    <p class="FieldHeadArbTxt">اسم مالك الأصول</p>
                                </div>
                                <p>
                                    <select name="owner_id" id="owner_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assetOwners as $assetOwnersdata)
                                            <option value="{{ $assetOwnersdata->owner_role_id }}"
                                                {{ $assetOwnersdata->owner_role_id == old('owner_id', $assetregister?->owner_id) ? 'selected' : '' }}>
                                                {{ $assetOwnersdata->owner_role_id }} {{ $assetOwnersdata->owner_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('owner_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
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
                                        @foreach ($assetTypes as $assetTypesdata)
                                            <option value="{{ $assetTypesdata->asset_type_id }}"
                                                {{ $assetTypesdata->asset_type_id == old('asset_type_id', $assetregister?->asset_type_id) ? 'selected' : '' }}>
                                                {{ $assetTypesdata->asset_type_id }}
                                                {{ $assetTypesdata->asset_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('asset_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Sub-Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم النوع الفرعي للأصول</p>
                                </div>
                                <p>
                                    <select name="asset_sub_type_id" id="asset_sub_type_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assetSubType as $assetSubTypedata)
                                            <option value="{{ $assetSubTypedata->asset_sub_type_id }}"
                                                {{ $assetSubTypedata->asset_sub_type_id == old('asset_sub_type_id', $assetregister?->asset_sub_type_id)
                                                    ? 'selected'
                                                    : '' }}>
                                                {{ $assetSubTypedata->asset_sub_type_id }}
                                                {{ $assetSubTypedata->asset_sub_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('asset_sub_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Location Name</p>
                                    <p class="FieldHeadArbTxt">اسم الموقع</p>
                                </div>
                                <p>
                                    <select name="location_id" id="location_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($locations as $locationsdata)
                                            <option value="{{ $locationsdata->location_id }}"
                                                {{ $locationsdata->location_id == old('location_id', $assetregister?->location_id) ? 'selected' : '' }}>
                                                {{ $locationsdata->location_id }}
                                                {{ $locationsdata->location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('location_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Status Name</p>
                                    <p class="FieldHeadArbTxt">اسم حالة الأصل</p>
                                </div>
                                <p>
                                    <select name="asset_status_id" id="asset_status_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assetStatus as $assetStatusdata)
                                            <option value="{{ $assetStatusdata->asset_status_id }}"
                                                {{ $assetStatusdata->asset_status_id == old('asset_status_id', $assetregister?->asset_status_id)
                                                    ? 'selected'
                                                    : '' }}>
                                                {{ $assetStatusdata->asset_status_id }}
                                                {{ $assetStatusdata->asset_current_status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('asset_status_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Classification Name</p>
                                    <p class="FieldHeadArbTxt">اسم التصنيف</p>
                                </div>
                                <p>
                                    <select name="classification_id" id="classification_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($assetclass as $assetclassdata)
                                            <option value="{{ $assetclassdata->classification_id }}"
                                                {{ $assetclassdata->classification_id == old('classification_id', $assetregister?->classification_id)
                                                    ? 'selected'
                                                    : '' }}>
                                                {{ $assetclassdata->classification_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                                @error('classification_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            {{-- <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Category Name</p>
                                    <p class="FieldHeadArbTxt">اسم الفئة</p>
                                </div>
                                <p>
                                    <button type="button" class="sh-tx" data-toggle="modal" data-target="#categorymodel">Add
                                        Categories</button>
                                    <input type="hidden" name="categories" id="selectedCategories">
                                <div id="selectedCategoriesText"></div>
                                </p>
                                @error('CategoryName')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>
                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Confidentiality</p>
                                    <p class="FieldHeadArbTxt">السرية</p>
                                </div>
                                <select name="cs_confidentiality" id="cs_confidentiality" class="sh-tx"
                                    value="{{ old('cs_confidentiality', $assetregister?->cs_confidentiality) }}">
                                    <option {{ $assetregister?->cs_confidentiality == '1' ? 'selected' : null }}
                                        value="1">1</option>
                                    <option {{ $assetregister?->cs_confidentiality == '2' ? 'selected' : null }}
                                        value="2">2</option>
                                    <option {{ $assetregister?->cs_confidentiality == '3' ? 'selected' : null }}
                                        value="3">3</option>
                                    <option {{ $assetregister?->cs_confidentiality == '4' ? 'selected' : null }}
                                        value="4">4</option>
                                    <option {{ $assetregister?->cs_confidentiality == '5' ? 'selected' : null }}
                                        value="5">5</option>
                                    @error('cs_confidentiality')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Integrity</p>
                                    <p class="FieldHeadArbTxt">النزاهة</p>
                                </div>
                                <select name="cs_integrity" id="cs_integrity" class="sh-tx"
                                    value="{{ old('cs_integrity', $assetregister?->cs_integrity) }}">
                                    <option {{ $assetregister?->cs_integrity == '1' ? 'selected' : null }}
                                        value="1">
                                        1</option>
                                    <option {{ $assetregister?->cs_integrity == '2' ? 'selected' : null }}
                                        value="2">
                                        2</option>
                                    <option {{ $assetregister?->cs_integrity == '3' ? 'selected' : null }}
                                        value="3">
                                        3</option>
                                    <option {{ $assetregister?->cs_integrity == '4' ? 'selected' : null }}
                                        value="4">
                                        4</option>
                                    <option {{ $assetregister?->cs_integrity == '5' ? 'selected' : null }}
                                        value="5">
                                        5</option>
                                    @error('cs_integrity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Availability</p>
                                    <p class="FieldHeadArbTxt">التوافر</p>
                                </div>
                                <select name="cs_availability" id="cs_availability" class="sh-tx"
                                    value="{{ old('cs_availability', $assetregister?->cs_availability) }}">
                                    <option {{ $assetregister?->cs_availability == '1' ? 'selected' : null }}
                                        value="1">1</option>
                                    <option {{ $assetregister?->cs_availability == '2' ? 'selected' : null }}
                                        value="2">2</option>
                                    <option {{ $assetregister?->cs_availability == '3' ? 'selected' : null }}
                                        value="3">3</option>
                                    <option {{ $assetregister?->cs_availability == '4' ? 'selected' : null }}
                                        value="4">4</option>
                                    <option {{ $assetregister?->cs_availability == '5' ? 'selected' : null }}
                                        value="5">5</option>
                                    @error('cs_availability')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Risk Rating</p>
                                    <p class="FieldHeadArbTxt">تقييم المخاطرة</p>
                                </div>
                                <select name="risk_rating" id="risk_rating" class="sh-tx">
                                    <option {{ $assetregister?->risk_rating == '1' ? 'selected' : null }}
                                        value="1">1
                                    </option>
                                    <option {{ $assetregister?->risk_rating == '2' ? 'selected' : null }}
                                        value="2">2
                                    </option>
                                    <option {{ $assetregister?->risk_rating == '3' ? 'selected' : null }}
                                        value="3">3
                                    </option>
                                    <option {{ $assetregister?->risk_rating == '4' ? 'selected' : null }}
                                        value="4">4
                                    </option>
                                    <option {{ $assetregister?->risk_rating == '5' ? 'selected' : null }}
                                        value="5">5
                                    </option>
                                    @error('risk_rating')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Regulatory Rating</p>
                                    <p class="FieldHeadArbTxt">تقييم تنظيمات</p>
                                </div>
                                <select name="regulatory_rating" id="regulatory_rating" class="sh-tx">
                                    <option {{ $assetregister?->regulatory_rating == '1' ? 'selected' : null }}
                                        value="1">1</option>
                                    <option {{ $assetregister?->regulatory_rating == '2' ? 'selected' : null }}
                                        value="2">2</option>
                                    <option {{ $assetregister?->regulatory_rating == '3' ? 'selected' : null }}
                                        value="3">3</option>
                                    <option {{ $assetregister?->regulatory_rating == '4' ? 'selected' : null }}
                                        value="4">4</option>
                                    <option {{ $assetregister?->regulatory_rating == '5' ? 'selected' : null }}
                                        value="5">5</option>
                                    @error('regulatory_rating')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            {{-- ----1---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Critical Assets?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالأصول الحساسة؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="critical_asset" id="critical_asset" class="sh-tx"
                                    value="{{ old('critical_asset', $assetregister?->critical_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('critical_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----2---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Cloud?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالسحابة؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cloud_asset" id="cloud_asset" class="sh-tx"
                                    value="{{ old('cloud_asset', $assetregister?->cloud_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('cloud_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----3---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Telework?</p>
                                    <p class="FieldHeadArbTxt">الأصول مرتبطة حصريًا بالعمل عن بعد؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="telework_asset" id="telework_asset" class="sh-tx"
                                    value="{{ old('telework_asset', $assetregister?->telework_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('telework_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----4---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Social Media?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="social_media_asset" id="social_media_asset" class="sh-tx"
                                    value="{{ old('social_media_asset', $assetregister?->social_media_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('social_media_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----5---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Data Privacy?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا خصوصية البيانات ؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="data_privacy_asset" id="data_privacy_asset" class="sh-tx"
                                    value="{{ old('data_privacy_asset', $assetregister?->data_privacy_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('data_privacy_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----6---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to PII?</p>
                                    <p class="FieldHeadArbTxt">؟(PII) الأصول المرتبطة حصريًا بمعلومات تحديد الهوية
                                        الشخصية
                                    </p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="data_pii_asset" id="data_pii_asset" class="sh-tx"
                                    value="{{ old('data_pii_asset', $assetregister?->data_pii_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('data_pii_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----7---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to PCI/DSS?</p>
                                    <p class="FieldHeadArbTxt">؟PCI/DSS الأصول المرتبطة حصريًا </p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="pci_dss_asset" id="pci_dss_asset" class="sh-tx"
                                    value="{{ old('pci_dss_asset', $assetregister?->pci_dss_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('pci_dss_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----8---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to E-Commerce?</p>
                                    <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="e_commerce_asset" id="e_commerce_asset" class="sh-tx"
                                    value="{{ old('e_commerce_asset', $assetregister?->e_commerce_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('e_commerce_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----9---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Infrastructure?</p>
                                    <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالبنية التحتية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="infrastructure_assets" id="infrastructure_assets" class="sh-tx"
                                    value="{{ old('infrastructure_assets', $assetregister?->infrastructure_assets) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('infrastructure_assets')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----10---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Application?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالتطبيق؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="application_assets" id="application_assets" class="sh-tx"
                                    value="{{ old('application_assets', $assetregister?->application_assets) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('application_assets')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----11---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to HR?</p>
                                    <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالموارد البشرية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="hr_asset" id="hr_asset" class="sh-tx"
                                    value="{{ old('hr_asset', $assetregister?->hr_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('hr_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----12---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Physical Security?</p>
                                    <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالأمن المادي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="physical_assets" id="physical_assets" class="sh-tx"
                                    value="{{ old('physical_assets', $assetregister?->physical_assets) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('physical_assets')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----13---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Third Party?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بطرف خارجي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="third_party_asset" id="third_party_asset" class="sh-tx"
                                    value="{{ old('third_party_asset', $assetregister?->third_party_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('third_party_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----14---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Operational Technology?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="operational_asset" id="operational_asset" class="sh-tx"
                                    value="{{ old('operational_asset', $assetregister?->operational_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('operational_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----15---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to E-Banking?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟
                                    </p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="e_banking_asset" id="e_banking_asset" class="sh-tx"
                                    value="{{ old('e_banking_asset', $assetregister?->e_banking_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('e_banking_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            {{-- ----16---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Payments?</p>
                                    <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالمدفوعات؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="payment_asset" id="payment_asset" class="sh-tx"
                                    value="{{ old('payment_asset', $assetregister?->payment_asset) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('payment_asset')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="ContentTableSection" id="CsccStandOneSection" style="display: none;">
                        {{-- -----------------1-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on National Security?
                                    </p>
                                    <p class="FieldHeadArbTxt">التأثير السلبي للأصول الحيوية على الأمن القومي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_1_applicable" id="cscc_standard_1_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('cscc_standard_1_applicable', $assetregister?->cscc_standard_1_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('cscc_standard_1_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_1_value" id="cscc_standard_1_value" class="sh-tx"
                                    value="{{ old('cscc_standard_1_value', $assetregister?->cscc_standard_1_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_1_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------2-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on the Reputation of
                                        the
                                        Kingdom and its Public Image?</p>
                                    <p class="FieldHeadArbTxt">التأثير السلبي للأصول الحيوية على سمعة المملكة وصورتها
                                        العامة؟</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="cscc_standard_2_applicable" id="cscc_standard_2_applicable"
                                    class="sh-tx"
                                    value="{{ old('cscc_standard_2_applicable', $assetregister?->cscc_standard_2_applicable) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_2_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="cscc_standard_2_value" id="cscc_standard_2_value" class="sh-tx"
                                    value="{{ old('cscc_standard_2_value', $assetregister?->cscc_standard_2_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_2_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------3-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Big Financial Loss because of Critical Asset?</p>
                                    <p class="FieldHeadArbTxt">خسارة مالية كبيرة بسبب الأصول الحرجة؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_3_applicable" id="cscc_standard_3_applicable"
                                    class="sh-tx"
                                    value="{{ old('cscc_standard_3_applicable', $assetregister?->cscc_standard_3_applicable) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_3_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_3_value" id="cscc_standard_3_value" class="sh-tx"
                                    value="{{ old('cscc_standard_3_value', $assetregister?->cscc_standard_3_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_3_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------4-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on Services Provided
                                        to a
                                        Large Number of Users?</p>
                                    <p class="FieldHeadArbTxt">التأثير السلبي للأصول الحيوية على الخدمات المقدمة لعدد
                                        كبير
                                        من المستخدمين؟</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="cscc_standard_4_applicable" id="cscc_standard_4_applicable"
                                    class="sh-tx"
                                    value="{{ old('cscc_standard_4_applicable', $assetregister?->cscc_standard_4_applicable) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_4_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="cscc_standard_4_value" id="cscc_standard_4_value" class="sh-tx"
                                    value="{{ old('cscc_standard_4_value', $assetregister?->cscc_standard_4_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_4_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------5-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Life Loss because of Critical Asset?</p>
                                    <p class="FieldHeadArbTxt">خسارة الحياة بسبب الأصول الحرجة؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_5_applicable" id="cscc_standard_5_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('cscc_standard_5_applicable', $assetregister?->cscc_standard_5_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('cscc_standard_5_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_5_value" id="cscc_standard_5_value" class="sh-tx"
                                    value="{{ old('cscc_standard_5_value', $assetregister?->cscc_standard_5_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_5_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------6-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Unauthorized Disclosure of Confidential or Strictly
                                        Classified Data because of Critical Assets?</p>
                                    <p class="FieldHeadArbTxt">الكشف غير المصرح به عن بيانات سرية أو مصنفة بشكل صارم
                                        بسبب
                                        الأصول الحرجة؟</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="cscc_standard_6_applicable" id="cscc_standard_6_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('cscc_standard_6_applicable', $assetregister?->cscc_standard_6_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('cscc_standard_6_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="cscc_standard_6_value" id="cscc_standard_6_value" class="sh-tx"
                                    value="{{ old('cscc_standard_6_value', $assetregister?->cscc_standard_6_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_6_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------7-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on the Business of a
                                        Vital Sector (or more)?</p>
                                    <p class="FieldHeadArbTxt">؟(أو أكثر) التأثير السلبي للأصول الحيوية على أعمال
                                        القطاع
                                        الحيوي</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_7_applicable" id="cscc_standard_7_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('cscc_standard_7_applicable', $assetregister?->cscc_standard_7_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('cscc_standard_7_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="cscc_standard_7_value" id="cscc_standard_7_value" class="sh-tx"
                                    value="{{ old('cscc_standard_7_value', $assetregister?->cscc_standard_7_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('cscc_standard_7_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ContentTableSection" id="OsmaccStandOneSection" style="display: none;">
                        {{-- -----------------1-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Social Media Assets on National
                                        Security?
                                    </p>
                                    <p class="FieldHeadArbTxt">التأثير السلبي لأصول وسائل التواصل الاجتماعي على الأمن
                                        القومي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="osmacc_standard_1_applicable" id="osmacc_standard_1_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('osmacc_standard_1_applicable', $assetregister?->osmacc_standard_1_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('osmacc_standard_1_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="osmacc_standard_1_value" id="osmacc_standard_1_value" class="sh-tx"
                                    value="{{ old('osmacc_standard_1_value', $assetregister?->osmacc_standard_1_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('osmacc_standard_1_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                        {{-- -----------------2-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Social Media Assets on the Reputation
                                        of
                                        the Kingdom and its Public Image?</p>
                                    <p class="FieldHeadArbTxt">التأثير السلبي لأصول وسائل التواصل الاجتماعي على سمعة
                                        المملكة وصورتها العامة؟</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="osmacc_standard_2_applicable" id="osmacc_standard_2_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('osmacc_standard_2_applicable', $assetregister?->osmacc_standard_2_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('osmacc_standard_2_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 25px"></div>
                                <select name="osmacc_standard_2_value" id="osmacc_standard_2_value" class="sh-tx"
                                    value="{{ old('osmacc_standard_2_value', $assetregister?->osmacc_standard_2_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('osmacc_standard_2_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        {{-- -----------------3-------------- --}}
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Negative Impact of Social Media Assets on the Interests
                                        of
                                        the Kingdom?</p>
                                    <p class="FieldHeadArbTxt">التأثير السلبي لأصول وسائل التواصل الاجتماعي على مصالح
                                        المملكة؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="osmacc_standard_3_applicable" id="osmacc_standard_3_applicable"
                                    class="sh-tx" onchange="checkOptions('CsccStandOne')"
                                    value="{{ old('osmacc_standard_3_applicable', $assetregister?->osmacc_standard_3_applicable) }}">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @error('osmacc_standard_3_applicable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Value</p>
                                    <p class="FieldHeadArbTxt">قيمة</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="osmacc_standard_3_value" id="osmacc_standard_3_value" class="sh-tx"
                                    value="{{ old('osmacc_standard_3_value', $assetregister?->osmacc_standard_3_value) }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    @error('osmacc_standard_3_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror>
                                </select>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')

    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <x-modal id="custodiansModal" title="Select Custodian" :data="$custodians" :selectedvalues="isset($custodianIds) ? $custodianIds : []"
        checkboxClass="custodianCheckbox" id_key="custodian_name_id" value_key="custodian_name_name" />


    <script src="{{ asset('Css/4-Process/1-Form/1-Form.js') }}" async></script>
    <script src="{{ asset('/Css/7-Sidebar/2-Sidebar.js') }}" async></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

    <script>
        function showDeleteModal() {
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        }

        document.addEventListener("DOMContentLoaded", function() {
            var relationCriticalAssetSelect = document.getElementById("RelationCriticalAsset");
            var csccStandOneSection = document.getElementById("CsccStandOneSection");

            function toggleCsccStandOneSection() {
                if (relationCriticalAssetSelect.value === "Yes") {
                    csccStandOneSection.style.display = "block";
                } else {
                    csccStandOneSection.style.display = "none";
                }
            }

            relationCriticalAssetSelect.addEventListener("change", toggleCsccStandOneSection);

            toggleCsccStandOneSection(); // Initialize on page load
        });


        document.addEventListener("DOMContentLoaded", function() {
            var relationSocialAssetSelect = document.getElementById("RelationSocialAsset");
            var OsmaccStandOneSection = document.getElementById("OsmaccStandOneSection");

            function toggleOsmaccStandOneSection() {
                if (relationSocialAssetSelect.value === "Yes") {
                    OsmaccStandOneSection.style.display = "block";
                } else {
                    OsmaccStandOneSection.style.display = "none";
                }
            }

            relationSocialAssetSelect.addEventListener("change", toggleOsmaccStandOneSection);

            toggleOsmaccStandOneSection(); // Initialize on page load
        });

        $('.categoryCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.categoryCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#categories').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#categoriesText').text(selectedOptionsText.length + " Category Selected.");
            } else {
                $('#categoriesText').text("Category selected.");
            }
        });

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
                $('#custodiansText').text("Category selected.");
            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>

</html>
