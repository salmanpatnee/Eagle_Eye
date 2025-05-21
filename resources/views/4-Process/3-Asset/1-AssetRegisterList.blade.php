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
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <style>
        .filter-row .col {
            width: 40%;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="justify-content-between w-100 d-flex align-items-center">

            <div class="headerleft">
                @include('4-Process/headerleft')
                @include('4-Process/3-Asset/assetheader')
            </div>
            <div>
                <a href="{{route('upload.assets.create')}}" class="btn-report btn btn-primary btn-sm">
                    <p>تحميل البيانات</p>
                    Upload Data
                </a>
            </div>
            <div class="text-center d-flex gap-3">
                @include('partials.roles')
                @include('4-Process/backbutton')
            </div>
        </div>
    </div>
    <div class="wrapper">
        @include('4-Process/3-Asset/AssetSidebar')
        <!-- SIDEBAR -->

        <!-- CONTENT -->
        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تسجيل الأصول</p>
                    <p class="PageHeadEngTxt">Asset Registration</p>
                </div>
                <div>

                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('assetreg.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>

                    <a href="{{ route('assetreg.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>

                    <a href=""
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}"
                        id="btnUpdate">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>

                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>
            <div>
                <form action="{{ route('assetreg.index') }}">
                    <div class="filter-row">

                        <div class="col">
                            <label class="form-label" for="asset">
                                <p>Asset</p>
                                <p>الأصول</p>
                            </label>
                            <select class="form-select" name="asset" id="asset" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($assetOptions as $asset)
                                    <option value="{{ $asset->asset_id }}"
                                        {{ request('asset') == $asset->asset_id ? 'selected' : null }}>
                                        {{ $asset->asset_id }} - {{ $asset->asset_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="asset_group">
                                <p>Asset Categories</p>
                                <p>الفئة</p>
                            </label>
                            <select class="form-select" name="category" id="category" onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}"
                                        {{ request('category') == $category->category_id ? 'selected' : null }}>
                                        {{ $category->category_id }} -
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <form method="POST" id="deleteForm" action="{{ route('assetreg.delete') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="record" value="">

                <div class="table-container">

                    <div class="ListTable">
                        <table cellspacing="0">
                            <tr class="table-header">
                                <th style="padding-right: 0px;"></th>
                                <th style="padding-right: 0px">
                                    <p class="ListHeadArbTxt">رقم</p>
                                    <p class="ListHeadEngTxt">S.No</p>
                                </th>
                                <th style="padding-right: 0px;" style="width: 140px;">
                                    <p class="ListHeadArbTxt">رمز الأصول</p>
                                    <p class="ListHeadEngTxt">Asset ID</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">اسم الأصول</p>
                                    <p class="ListHeadEngTxt">Asset Name</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">وصف الأصول</p>
                                    <p class="ListHeadEngTxt">Asset Description</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">اسم الفئة

                                    </p>
                                    <p class="ListHeadEngTxt">Asset Categories</p>
                                </th>
                            </tr>
                            @foreach ($assets as $asset)
                                <tr>
                                    <td>
                                        <input type="radio" name="record" class="record"
                                            value="{{ $asset->asset_id }}" required>
                                    </td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td style="width: 150px;"><a
                                            href="/asset-register-table/{{ $asset->asset_id }}">{{ $asset->asset_id }}</a>
                                    </td>
                                    <td>{{ $asset->asset_name }}</td>
                                    <td>{{ $asset->asset_description }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($asset->categories as $category)
                                                <li>{{ $category->category_name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/asset-register/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                document.getElementById('deleteForm').querySelector('input[name="record"]').value = selectedRadio
                    .value;
                window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
            } else {
                alert('Please select a record.');
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
