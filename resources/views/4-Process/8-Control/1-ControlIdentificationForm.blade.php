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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to generate the ID with a sequence
            function generateID() {
                // Get the input element
                var inputElement = document.getElementById('ContId');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'CONT-' + formattedNumber;

                // Update the input field value
                inputElement.value = generatedID;

                // Increment and store the sequence number for the next use
                localStorage.setItem('sequenceNumber', sequenceNumber + 1);
            }

            // Call the generateID function when the page loads
            generateID();
        });
    </script>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تحديد الضوابط</p>
                    <p class="EngTxt">Control Identification</p>
                </div>
                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/8-Control/ControlSidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تعريف الضوابط</p>
                <p class="PageHeadEngTxt">Control Definition</p>
            </div>
            <div class="ButtonContainer">
                <a href="/control-identification-list" class="MoreButton">
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

                <button type="button" onclick="showDeleteModal()"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>


                <form method="POST" action="{{ route($routeName . '.delete') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($controlmaster) ? route('controlmaster.update', $controlmaster->id) : route('controlmaster.store') }}"
            method="POST">
            @csrf
            @if (isset($controlmaster))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $controlmaster->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control ID</p>
                                <p class="FieldHeadArbTxt">رمز الضوابط</p>
                            </div>
                            <p><input type="text" name="control_id" id="control_id" class="sh-tx"
                                    placeholder="Enter Control ID"
                                    value="{{ old('control_id', $controlmaster?->control_id) }}"
                                    {{ $controlmaster?->control_id ? 'readonly' : '' }} required>
                                @error('control_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                            <div class="FieldHead" style="margin-top: 1em">
                                <p class="FieldHeadEngTxt">Control Name</p>
                                <p class="FieldHeadArbTxt">اسم الضوابط</p>
                            </div>
                            <p><input type="text" name="control_name" id="control_name" class="sh-tx"
                                    placeholder="Write Control Name"
                                    value="{{ old('control_name', $controlmaster?->control_name) }}" required>
                                @error('control_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">


                            <div class="FieldHead" style="margin-top: 5em">
                                <p class="FieldHeadEngTxt">Control Name Arabic</p>
                                <p class="FieldHeadArbTxt"> اسم الضوابط</p>
                            </div>
                            <p><input dir="rtl" type="text" name="control_name_ar" id="control_name_ar"
                                    class="sh-tx" style="padding-left: 10px; padding-right: 10px;"
                                    placeholder="اسم الضوابط"
                                    value="{{ old('control_name_ar', $controlmaster?->control_name_ar) }}">
                                @error('control_name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>

                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Description</p>
                                <p class="FieldHeadArbTxt">وصف الضوابط</p>
                            </div>
                            <p><input type="text" name="control_description" id="control_description"
                                    class="bg-tx" placeholder="Write Control Description"
                                    value="{{ old('control_description', $controlmaster?->control_description) }}">
                                @error('control_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                            <div class="FieldHead" style="margin-top: 1em;">
                                <p class="FieldHeadEngTxt">Control Description Arabic</p>
                                <p class="FieldHeadArbTxt">وصف الضوابط</p>
                            </div>
                            <p><input dir="rtl" type="text" name="control_description_ar"
                                    style="padding-left: 10px; padding-right: 10px;" id="control_description_ar"
                                    class="bg-tx" placeholder="وصف الضوابط"
                                    value="{{ old('control_description_ar', $controlmaster?->control_description_ar) }}">
                                @error('control_description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification Name</p>
                                <p class="FieldHeadArbTxt">اسم التصنيف</p>
                            </div>
                            <p>
                                <select name="classification_id" id="classification_id" class="sh-tx" required>
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($classificationtable as $controlClassName)
                                        <option value="{{ $controlClassName->classification_id }}"
                                            {{ $controlClassName->classification_id === old('classification_id', $controlmaster?->classification_id) ? 'selected' : '' }}>

                                            {{ $controlClassName->classification_id }}
                                            {{ $controlClassName->classification_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Owner Name</p>
                                <p class="FieldHeadArbTxt">اسم مالك الضوابط</p>
                            </div>
                            <p>
                                <select name="owner_id" id="owner_id" class="sh-tx" required>
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($ownername as $controlOwnerName)
                                        <option value="{{ $controlOwnerName->owner_role_id }}"
                                            {{ $controlOwnerName->owner_role_id === old('owner_id', $controlmaster?->owner_id) ? 'selected' : '' }}>

                                            {{ $controlOwnerName->owner_role_id }} {{ $controlOwnerName->owner_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">

                        {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Name</p>
                                <p class="FieldHeadArbTxt">اسم الوصي</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#custModal">Add
                                    Custodian</button>
                                <input type="hidden" name="custodians" id="selectedCustodian">
                            <div id="selectedCustodiansText"></div>
                            </p>
                        </div> --}}
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Level</p>
                                <p class="FieldHeadArbTxt">ضوابط مستوى</p>
                            </div>
                            <select name="control_level_title" id="control_level_title" class="sh-tx"
                                value="{{ old('control_level_title', $controlmaster?->control_level_title) }}">
                                <option value="" disabled>Select Control Level</option>
                                <option value="Main"
                                    {{ $controlmaster?->control_level_title == 'Main' ? 'selected' : '' }}>Main Control
                                </option>
                                <option value="Sub"
                                    {{ $controlmaster?->control_level_title == 'Sub' ? 'selected' : '' }}>Sub-Control
                                </option>
                                @error('control_level_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Main Control</p>
                                <p class="FieldHeadArbTxt">ضوابط الرئيسي</p>
                            </div>
                            <p><input type="text" name="control_parent" id="control_parent" class="sh-tx"
                                    placeholder="Write Control Parent Name"
                                    value="{{ old('control_parent', $controlmaster?->control_parent) }}">
                                @error('control_parent')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Type</p>
                                <p class="FieldHeadArbTxt">نوع الضوابط</p>
                            </div>
                            <p>
                                <select name="control_type_id" id="control_type_id" class="sh-tx" required>
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($controltype as $controlTypeName)
                                        <option value="{{ $controlTypeName->control_type_id }}"
                                            data-t="{{ $controlmaster?->control_type_id }}"
                                            {{ $controlTypeName->control_type_id === old('control_type_id', $controlmaster?->control_type_id) ? 'selected' : '' }}>

                                            {{ $controlTypeName->control_type_id }}
                                            {{ $controlTypeName->control_type_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Nature</p>
                                <p class="FieldHeadArbTxt">طبيعة الضوابط</p>
                            </div>
                            <p><input type="text" name="control_nature" id="control_nature" class="sh-tx"
                                    placeholder="Write Control Nature"
                                    value="{{ old('control_nature', $controlmaster?->control_nature) }}">
                                @error('control_nature')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Criticality</p>
                                <p class="FieldHeadArbTxt">الضوابط الحساسة</p>
                            </div>
                            <select name="control_criticality" id="control_criticality" class="sh-tx"
                                value="{{ old('control_criticality', $controlmaster?->control_criticality) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_criticality')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">ISO Related Control</p>
                                <p class="FieldHeadArbTxt">الضوابط المتعلقة بمعيارإ يزو</p>
                            </div>
                            <p><input type="text" name="control_iso_name" id="control_iso_name" class="sh-tx"
                                    placeholder="Write ISO Standard Name"
                                    value="{{ old('control_iso_name', $controlmaster?->control_iso_name) }}">
                                @error('control_iso_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Reference</p>
                                <p class="FieldHeadArbTxt">مرجع الضوابط</p>
                            </div>
                            <p><input type="text" name="control_reference" id="control_reference" class="sh-tx"
                                    placeholder="Write Control Reference"
                                    value="{{ old('control_reference', $controlmaster?->control_reference) }}">
                                @error('control_reference')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Is Parent Control</p>
                                <p class="FieldHeadArbTxt">هل هو التحكم الرئيسي</p>
                            </div>
                            <select name="is_parent_control" id="is_parent_control" class="sh-tx"
                                value="{{ old('is_parent_control', $controlmaster?->is_parent_control) }}">
                                <option value="1" {{($controlmaster?->is_parent_control == "1") ? "selected" : ""}}>Yes</option>
                                <option value="0" {{($controlmaster?->is_parent_control == "0") ? "selected" : ""}}>No</option>
                                @error('is_parent_control')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Main Domain Name</p>
                                <p class="FieldHeadArbTxt">المكون الأساسي</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#mainDomainModal">Add
                                    Best Practices</button>
                                <input type="hidden" name="maindomain" id="selectedMainDomain">
                            <div id="selectedMainDomainText"></div>
                            </p>
                        </div> --}}
                        {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Sub-Domain Name</p>
                                <p class="FieldHeadArbTxt">المكون الفرعي</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#subdomainmodel">Add
                                    Categories</button>
                                <input type="hidden" name="subdomainname" id="selectedsubdomain">
                            <div id="selectedSubDomainText"></div>
                            </p>
                        </div> --}}
                    </div>
                    {{-- <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk</p>
                                <p class="FieldHeadArbTxt">المخاطر</p>
                            </div>
                            <p>
                                <button type="button" class="sh-tx" data-toggle="modal"
                                    data-target="#riskmodel">Add
                                    Risks</button>
                                <input type="hidden" name="risknames" id="selectedriskname">
                            <div id="selectedrisknametext"></div>
                            </p>
                        </div>
                    </div> --}}
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Implementation Mandatories</p>
                                <p class="FieldHeadArbTxt">التزامات التنفيذ</p>
                            </div>
                            <p><input type="text" name="implementation_mandatories"
                                    id="implementation_mandatories" class="bg-tx"
                                    placeholder="Write Implementation Mendatories"
                                    value="{{ old('implementation_mandatories', $controlmaster?->implementation_mandatories) }}">
                                @error('implementation_mandatories')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Maturity Level Required</p>
                                <p class="FieldHeadArbTxt">مستوى النضج مطلوب</p>
                            </div>
                            <p><input type="text" name="maturity_level" id="maturity_level" class="bg-tx"
                                    placeholder="Define Maturity Level"
                                    value="{{ old('maturity_level', $controlmaster?->maturity_level) }}">
                                @error('maturity_level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Implementation Guidelines</p>
                                <p class="FieldHeadArbTxt">إرشادات التنفيذ</p>
                            </div>
                            <p><input type="text" name="implementation_guidelines" id="implementation_guidelines"
                                    class="bg-tx" placeholder="Write Implementation Guidelines"
                                    value="{{ old('implementation_guidelines', $controlmaster?->implementation_guidelines) }}">
                                @error('implementation_guidelines')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Dependency</p>
                                <p class="FieldHeadArbTxt">ضوابط التبعية</p>
                            </div>
                            <p><input type="text" name="control_dependency" id="control_dependency"
                                    class="bg-tx" placeholder="Write Control Dependencies"
                                    value="{{ old('control_dependency', $controlmaster?->control_dependency) }}">
                                @error('control_dependency')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <x-label label="Categories" label_ar="اسم الفئة" />
                            <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                                :data="isset($categoryIds) ? json_encode($categoryIds) : ''" />
                        </div>
                        <div class="column">
                            <x-label label="Best Practice" label_ar="أفضل الممارسات" />
                            <x-modal-button modal_id="bestpracticeModal" label="Add Best Practice"
                                name="bestPractices" :data="isset($bestPracticeIds) ? json_encode($bestPracticeIds) : ''" />
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <x-label label="Custodian Name" label_ar="اسم الوصي" />
                            <x-modal-button modal_id="custodianModal" label="Add Custodian" name="custodians"
                                :data="isset($custodianRoleIds) ? json_encode($custodianRoleIds) : ''" />
                        </div>
                        <div class="column">
                            <x-label label="Domain" label_ar="" />
                            <x-modal-button modal_id="domainModal" label="Add Domain" name="domains"
                                :data="isset($mainDomainIds) ? json_encode($mainDomainIds) : ''" />
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <x-label label="Sub Domain" label_ar=" " />
                            <x-modal-button modal_id="subDomainModal" label="Add Sub Domain" name="subDomains"
                                :data="isset($subDomainIds) ? json_encode($subDomainIds) : ''" />
                        </div>
                        <div class="column">
                            <x-label label="Risk" label_ar="" />
                            <x-modal-button modal_id="riskModal" label="Add Risk" name="risks" :data="isset($riskIds) ? json_encode($riskIds) : ''" />
                        </div>
                    </div>



                    <div class="ContentTable">
                        {{-- ----1---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Critical Assets?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بالأصول الحساسة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_critical_asset" id="control_critical_asset" class="sh-tx"
                                value="{{ old('control_critical_asset', $controlmaster?->control_critical_asset) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>

                                @error('control_critical_asset')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----2---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Cloud?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بالسحابة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_cloud" id="control_cloud" class="sh-tx"
                                value="{{ old('control_cloud', $controlmaster?->control_cloud) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                <option value="cst">CST</option>
                                <option value="csp">CSP</option>
                                @error('control_cloud')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----3---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Telework?</p>
                                <p class="FieldHeadArbTxt">الضوابط مرتبطة حصريًا بالعمل عن بعد؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_telework" id="control_telework" class="sh-tx"
                                value="{{ old('control_telework', $controlmaster?->control_telework) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_telework')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----4---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Social Media?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_social_media" id="control_social_media" class="sh-tx"
                                value="{{ old('control_social_media', $controlmaster?->control_social_media) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_social_media')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----5---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Data Privacy?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا خصوصية البيانات ؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_data_privicy" id="control_data_privicy" class="sh-tx"
                                value="{{ old('control_data_privicy', $controlmaster?->control_data_privicy) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_data_privicy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----6---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to PII?</p>
                                <p class="FieldHeadArbTxt">؟(PII) الضوابط المرتبطة حصريًا بمعلومات تحديد الهوية
                                    الشخصية
                                </p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_pii" id="control_pii" class="sh-tx"
                                value="{{ old('control_pii', $controlmaster?->control_pii) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_pii')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----7---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to PCI/DSS?</p>
                                <p class="FieldHeadArbTxt">؟PCI/DSS الضوابط المرتبطة حصريًا</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_pci_dss" id="control_pci_dss" class="sh-tx"
                                value="{{ old('control_pci_dss', $controlmaster?->control_pci_dss) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_pci_dss')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----8---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to E-Commerce?</p>
                                <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_e_commerce" id="control_e_commerce" class="sh-tx"
                                value="{{ old('control_e_commerce', $controlmaster?->control_e_commerce) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_e_commerce')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----9---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Infrastructure?</p>
                                <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالبنية التحتية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_infrastructure" id="control_infrastructure" class="sh-tx"
                                value="{{ old('control_infrastructure', $controlmaster?->control_infrastructure) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_infrastructure')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----10---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Application?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بالتطبيق؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_application" id="control_application" class="sh-tx"
                                value="{{ old('control_application', $controlmaster?->control_application) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_application')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----11---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to HR?</p>
                                <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالموارد البشرية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_hr" id="control_hr" class="sh-tx"
                                value="{{ old('control_hr', $controlmaster?->control_hr) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_hr')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----12---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Physical Security?</p>
                                <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالأمن المادي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_physical_security" id="control_physical_security" class="sh-tx"
                                value="{{ old('control_physical_security', $controlmaster?->control_physical_security) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_physical_security')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----13---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Third Party?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بطرف خارجي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_third_party" id="control_third_party" class="sh-tx"
                                value="{{ old('control_third_party', $controlmaster?->control_third_party) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_third_party')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----14---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Operational Technology?
                                </p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_operational" id="control_operational" class="sh-tx"
                                value="{{ old('control_operational', $controlmaster?->control_operational) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_operational')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----13---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to Payments?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بالمدفوعات؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_payment" id="control_payment" class="sh-tx"
                                value="{{ old('control_payment', $controlmaster?->control_payment) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        {{-- ----14---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Exclusively Related to E-Banking?</p>
                                <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟
                                </p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <select name="control_e_banking" id="control_e_banking" class="sh-tx"
                                value="{{ old('control_e_banking', $controlmaster?->control_e_banking) }}">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                                @error('control_e_banking')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>
    </div>
    @include('components.delete-confirmation-modal')

    <x-modal id="bestpracticeModal" title="Select Best Practice" :data="$bestPractices" :selectedvalues="isset($bestPracticeIds) ? $bestPracticeIds : []"
        checkboxClass="bestPracticeCheckbox" id_key="best_practices_id" value_key="best_practices_name" />

    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <x-modal id="custodianModal" title="Select Custodian" :data="$custodians" :selectedvalues="isset($custodianRoleIds) ? $custodianRoleIds : []"
        checkboxClass="custodianCheckbox" id_key="custodian_role_id" value_key="custodian_role_title" />

    <x-modal id="domainModal" title="Select Domain" :data="$domains" :selectedvalues="isset($mainDomainIds) ? $mainDomainIds : []"
        checkboxClass="domainCheckbox" id_key="main_domain_id" value_key="main_domain_name" />

    <x-modal id="subDomainModal" title="Select Sub Domain" :data="$subDomains" :selectedvalues="isset($subDomainIds) ? $subDomainIds : []"
        checkboxClass="subDomainCheckbox" id_key="sub_domain_id" value_key="sub_domain_name" />

    <x-modal id="riskModal" title="Select Risk" :data="$risks" :selectedvalues="isset($riskIds) ? $riskIds : []" checkboxClass="riskCheckbox"
        id_key="risk_id" value_key="risk_name" />



    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
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

        $('.bestPracticeCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.bestPracticeCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#bestPractices').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#bestPracticesText').text(selectedOptionsText.length + " Best Practice Selected.");
            } else {
                $('#bestPracticesText').text("Best Practice selected.");
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
                $('#custodiansText').text("Custodian selected.");
            }
        });

        $('.domainCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.domainCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#domains').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#domainsText').text(selectedOptionsText.length + " Domain Selected.");
            } else {
                $('#domainsText').text("Domain selected.");
            }
        });

        $('.subDomainCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.subDomainCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#subDomains').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#subDomainsText').text(selectedOptionsText.length + " Sub domain Selected.");
            } else {
                $('#subDomainsText').text("Sub domain selected.");
            }
        });

        $('.riskCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.riskCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#risks').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#risksText').text(selectedOptionsText.length + " Risk Selected.");
            } else {
                $('#risksText').text("Risk selected.");
            }
        });
    </script>
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
