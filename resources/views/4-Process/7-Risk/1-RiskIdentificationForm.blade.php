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
                var inputElement = document.getElementById('RiskId');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'RSK-' + formattedNumber;

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
                <a href="/compliance">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تحديد المخاطر</p>
                    <p class="EngTxt">Risk Identification</p>
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
        @include('4-Process/7-Risk/risksidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تحديد المخاطر</p>
                <p class="PageHeadEngTxt">Risk Identification</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-identification-list" class="MoreButton">
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
            action="{{ isset($riskmaster) ? route('riskmaster.update', $riskmaster->id) : route('riskmaster.store') }}"
            method="POST">
            @csrf
            @if (isset($riskmaster))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $riskmaster->id }}">
            @endif
            <div class="ContentTableSection">
                <div class="ContentTable">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk ID</p>
                            <p class="FieldHeadArbTxt">رمز المخاطر</p>
                        </div>
                        <p><input type="text" name="risk_id" id="risk_id" class="sh-tx"
                                value="{{ old('risk_id', $riskmaster?->risk_id) }}"
                                {{ $riskmaster?->risk_id ? 'readonly' : '' }} required>
                            @error('risk_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Name</p>
                            <p class="FieldHeadArbTxt">اسم المخاطر</p>
                        </div>
                        <p><input type="text" name="risk_name" id="risk_name" class="sh-tx"
                                placeholder="Enter Risk Name" value="{{ old('risk_name', $riskmaster?->risk_name) }}"
                                required>
                            @error('risk_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Description</p>
                            <p class="FieldHeadArbTxt">وصف المخاطر</p>
                        </div>
                        <p><input type="text" name="risk_description" id="risk_description" class="bg-tx"
                                placeholder="Enter Risk Description"
                                value="{{ old('risk_description', $riskmaster?->risk_description) }}">
                            @error('risk_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Objectives</p>
                            <p class="FieldHeadArbTxt">أهداف المخاطر</p>
                        </div>
                        <p><input type="text" name="risk_objectives" id="risk_objectives" class="bg-tx"
                                placeholder="Enter Risk Objectives"
                                value="{{ old('risk_objectives', $riskmaster?->risk_objectives) }}">
                            @error('risk_objectives')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Profile</p>
                            <p class="FieldHeadArbTxt">تفاصيل المخاطر</p>
                        </div>
                        <p><input type="text" name="risk_profile" id="risk_profile" class="bg-tx"
                                placeholder="Enter Risk Profile"
                                value="{{ old('risk_profile', $riskmaster?->risk_profile) }}">
                            @error('risk_profile')
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
                            <p class="FieldHeadEngTxt">Risk Group Name</p>
                            <p class="FieldHeadArbTxt">اسم مجموعة المخاطر</p>
                        </div>
                        <p>
                            <select name="risk_group_id" id="risk_group_id" class="sh-tx" required>
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($riskGroupNames as $riskGroupName)
                                    <option value="{{ $riskGroupName->risk_group_id }}"
                                        {{ $riskGroupName->risk_group_id == old('risk_group_id', $riskmaster?->risk_group_id) ? 'selected' : '' }}>

                                        {{ $riskGroupName->risk_group_id }} {{ $riskGroupName->risk_group_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Owner Name</p>
                            <p class="FieldHeadArbTxt">اسم صاحب المخاطر</p>
                        </div>
                        <p>
                            <select name="owner_id" id="owner_id" class="sh-tx" required>
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($riskOwnerNames as $riskOwnerName)
                                    <option value="{{ $riskOwnerName->owner_role_id }}"
                                        {{ $riskOwnerName->owner_role_id == old('owner_id', $riskmaster?->owner_id) ? 'selected' : '' }}>

                                        {{ $riskOwnerName->owner_role_id }} {{ $riskOwnerName->owner_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Type Name</p>
                            <p class="FieldHeadArbTxt">اسم نوع المخاطرة</p>
                        </div>
                        <p>
                            <select name="risk_type_id" id="risk_type_id" class="sh-tx" required>
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($riskTypeNames as $riskTypeName)
                                    <option value="{{ $riskTypeName->risk_type_id }}"
                                        {{ $riskTypeName->risk_type_id == old('risk_type_id', $riskmaster?->risk_type_id) ? 'selected' : '' }}>

                                        {{ $riskTypeName->risk_type_id }} {{ $riskTypeName->risk_type_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Sub-Type Name</p>
                            <p class="FieldHeadArbTxt">اسم النوع الفرعي للمخاطر</p>
                        </div>
                        <p>
                            <select name="risk_sub_type_id" id="risk_sub_type_id" class="sh-tx" required>
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($riskSubTypeNames as $riskSubTypeName)
                                    <option value="{{ $riskSubTypeName->risk_sub_type_id }}"
                                        {{ $riskSubTypeName->risk_sub_type_id == old('risk_sub_type_id', $riskmaster?->risk_sub_type_id)
                                            ? 'selected'
                                            : '' }}>

                                        {{ $riskSubTypeName->risk_sub_type_id }}
                                        {{ $riskSubTypeName->risk_sub_type_name }}
                                    </option>
                                @endforeach
                            </select>
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
                                @foreach ($riskClassNames as $riskClassName)
                                    <option value="{{ $riskClassName->classification_id }}"
                                        {{ $riskClassName->classification_id == old('classification_id', $riskmaster?->classification_id)
                                            ? 'selected'
                                            : '' }}>

                                        {{ $riskClassName->classification_id }}
                                        {{ $riskClassName->classification_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="column">
                        <x-label label="Threat Agents" label_ar="وكيل التهديد" />
                        <x-modal-button modal_id="threatsModal" label="Add threat agent" name="threatAgents"
                            :data="isset($threatAgentIds) ? json_encode($threatAgentIds) : ''" />
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Vulnerability" label_ar="نقاط الضعف" />
                        <x-modal-button modal_id="vulnerabilityModal" label="Add vulnerability" name="vulnerability"
                            :data="isset($vulnerabilityIds) ? json_encode($vulnerabilityIds) : ''" />
                    </div>
                    <div class="column">
                        <x-label label="Categories" label_ar="فئات" />
                        <x-modal-button modal_id="categoriesModal" label="Add category" name="category"
                            :data="isset($categoryIds) ? json_encode($categoryIds) : ''" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Asset Group" label_ar="مجموعة الأصول" />
                        <x-modal-button modal_id="assetGroupModal" label="Add asset group" name="assetGroup"
                            :data="isset($assetGroupIds) ? json_encode($assetGroupIds) : ''" />
                    </div>
                    <div class="column">
                        <x-label label="Key Risk Indicators" label_ar="مؤشرات المخاطر الرئيسية" />
                        <x-modal-button modal_id="kriModal" label="Add key risk indicators" name="kri"
                            :data="isset($kriIds) ? json_encode($kriIds) : ''" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Key Performance Indicator" label_ar="مؤشر الأداء الرئيسي" />
                        <x-modal-button modal_id="kpiModal" label="Add key performance indicator" name="kpi"
                            :data="isset($kpiIds) ? json_encode($kpiIds) : ''" />
                    </div>

                    <div class="column">
                        <x-label label="Risk Acceptance" label_ar="قبول المخاطر" />
                        <x-modal-button modal_id="riskAcceptanceModal" label="Add Risk Acceptance"
                            name="riskAcceptance" :data="isset($riskAcceptanceIds) ? json_encode($riskAcceptanceIds) : ''" />
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Department" label_ar="قسم" />
                        <x-modal-button modal_id="departmentModal" label="Add Department" name="department"
                            :data="isset($departmentIds) ? json_encode($departmentIds) : ''" />
                    </div>
                    <div class="column">
                        <x-label label="Custodian Name" label_ar="اسم الوصي" />
                        <x-modal-button modal_id="custodianModal" label="Add Custodian" name="custodians"
                            :data="isset($custodianids) ? json_encode($custodianids) : ''" />
                    </div>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Inherent Score</p>
                            <p class="FieldHeadArbTxt">المخاطر الكامنة</p>
                        </div>
                        <p>
                            <select name="risk_inherent_id" id="risk_inherent_id" class="sh-tx" required>
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($riskInherent as $riskInherentNames)
                                    <option value="{{ $riskInherentNames->risk_inherent_id }}"
                                        {{ $riskInherentNames->risk_inherent_id == old('risk_inherent_id', $riskmaster?->risk_inherent_id)
                                            ? 'selected'
                                            : '' }}>

                                        {{ $riskInherentNames->risk_inherent_score }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Consequences</p>
                            <p class="FieldHeadArbTxt">آثار المخاطر</p>
                        </div>
                        <p><input type="text" name="risk_consequences" id="risk_consequences" class="sh-tx"
                                placeholder="Enter Risk Consequences"
                                value="{{ old('risk_consequences', $riskmaster?->risk_consequences) }}">
                            @error('risk_consequences')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Critical Assets?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بالأصول الحساسة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_critical_asset" id="risk_critical_asset" class="sh-tx"
                            value="{{ old('risk_critical_asset', $riskmaster?->risk_critical_asset) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_critical_asset')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Cloud?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بالسحابة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_cloud" id="risk_cloud" class="sh-tx"
                            value="{{ old('risk_cloud', $riskmaster?->risk_cloud) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_cloud')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----3---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Telework?</p>
                            <p class="FieldHeadArbTxt">المخاطر مرتبطة حصريًا بالعمل عن بعد؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_telework" id="risk_telework" class="sh-tx"
                            value="{{ old('risk_telework', $riskmaster?->risk_telework) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_telework')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----4---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Social Media?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_social_media" id="risk_social_media" class="sh-tx"
                            value="{{ old('risk_social_media', $riskmaster?->risk_social_media) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_social_media')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----5---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Data Privacy?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا خصوصية البيانات ؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_data_privicy" id="risk_data_privicy" class="sh-tx"
                            value="{{ old('risk_data_privicy', $riskmaster?->risk_data_privicy) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_data_privicy')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----6---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to PII?</p>
                            <p class="FieldHeadArbTxt">؟(PII) المخاطر المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية
                            </p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_pii" id="risk_pii" class="sh-tx"
                            value="{{ old('risk_pii', $riskmaster?->risk_pii) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_pii')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----7---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to PCI/DSS?</p>
                            <p class="FieldHeadArbTxt">؟PCI/DSS المخاطر المرتبطة حصريًا</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_pci_dss" id="risk_pci_dss" class="sh-tx"
                            value="{{ old('risk_pci_dss', $riskmaster?->risk_pci_dss) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_pci_dss')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----8---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to E-Commerce?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_e_commerce" id="risk_e_commerce" class="sh-tx"
                            value="{{ old('risk_e_commerce', $riskmaster?->risk_e_commerce) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_e_commerce')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----9---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Infrastructure?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالبنية التحتية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_infrastructure" id="risk_infrastructure" class="sh-tx"
                            value="{{ old('risk_infrastructure', $riskmaster?->risk_infrastructure) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_infrastructure')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----10---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Application?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بالتطبيق؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_application" id="risk_application" class="sh-tx"
                            value="{{ old('risk_application', $riskmaster?->risk_application) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_application')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----11---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to HR?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالموارد البشرية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_hr" id="risk_hr" class="sh-tx"
                            value="{{ old('risk_hr', $riskmaster?->risk_hr) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_hr')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----12---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Physical Security?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالأمن المادي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_physical_security" id="risk_physical_security" class="sh-tx"
                            value="{{ old('risk_physical_security', $riskmaster?->risk_physical_security) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_physical_security')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Third Party?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بطرف خارجي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_third_party" id="risk_third_party" class="sh-tx"
                            value="{{ old('risk_third_party', $riskmaster?->risk_third_party) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_third_party')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Operational Technology?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_operational" id="risk_operational" class="sh-tx"
                            value="{{ old('risk_operational', $riskmaster?->risk_operational) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_operational')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Payments?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بالمدفوعات؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_payment" id="risk_payment" class="sh-tx"
                            value="{{ old('risk_payment', $riskmaster?->risk_payment) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_payment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to E-Banking?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <select name="risk_e_banking" id="risk_e_banking" class="sh-tx"
                            value="{{ old('risk_e_banking', $riskmaster?->risk_e_banking) }}">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                            @error('risk_e_banking')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                </div>
            </div>
    </div>
    </form>
    <x-modal id="threatsModal" title="Select Threat Agents" :data="$threatAgents" :selectedvalues="isset($threatAgentIds) ? $threatAgentIds : []"
        checkboxClass="threatCheckbox" id_key="threat_agent_id" value_key="threat_agent_name" />

    <x-modal id="vulnerabilityModal" title="Select Vulnerabilities" :data="$vulnerabilities" :selectedvalues="isset($vulnerabilityIds) ? $vulnerabilityIds : []"
        checkboxClass="vulnerabilityCheckbox" id_key="va_id" value_key="va_name" />

    <x-modal id="categoriesModal" title="Select Categories" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <x-modal id="assetGroupModal" title="Select Asset Group" :data="$assetGroups" :selectedvalues="isset($assetGroupIds) ? $assetGroupIds : []"
        checkboxClass="assetGroupCheckbox" id_key="asset_group_id" value_key="asset_group_name" />

    <x-modal id="kriModal" title="Select Key Risk Indicators" :data="$keyRiskIndicators" :selectedvalues="isset($kriIds) ? $kriIds : []"
        checkboxClass="kriCheckbox" id_key="key_risk_indicator_id" value_key="key_risk_indicator_value" />

    <x-modal id="kpiModal" title="Select Key Performance Indicator" :data="$keyPerformancekIndicators" :selectedvalues="isset($kpiIds) ? $kpiIds : []"
        checkboxClass="kpiCheckbox" id_key="key_performance_indicatory_id"
        value_key="key_performance_indicatory_value" />

    <x-modal id="riskAcceptanceModal" title="Select Risk Acceptance" :data="$riskAcceptances" :selectedvalues="isset($riskAcceptanceIds) ? $riskAcceptanceIds : []"
        checkboxClass="riskAcceptanceCheckbox" id_key="risk_acceptance_id" value_key="risk_acceptance_source" />

    <x-modal id="departmentModal" title="Select Department" :data="$departments" :selectedvalues="isset($departmentIds) ? $departmentIds : []"
        checkboxClass="departmentCheckbox" id_key="department_id" value_key="department_name" />

    <x-modal id="custodianModal" title="Select Custodian" :data="$custodians" :selectedvalues="isset($custodianids) ? $custodianids : []"
        checkboxClass="custodianCheckbox" id_key="custodian_role_id" value_key="custodian_role_title" />

        @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>

function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}

        $('.threatCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.threatCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            console.log("Here");

            $('#threatAgents').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#threatAgentsText').text(selectedOptionsText.length + " Threat Agents Selected.");
            } else {
                $('#threatAgentsText').text("No Threat Agents Selected.");

            }
        });

        $('.vulnerabilityCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.vulnerabilityCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#vulnerability').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#vulnerabilityText').text(selectedOptionsText.length + " vulnerability Selected.");
            } else {
                $('#vulnerabilityText').text("No vulnerability Selected.");

            }
        });

        $('.categoryCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.categoryCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#category').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#categoryText').text(selectedOptionsText.length + " category Selected.");
            } else {
                $('#categoryText').text("No category Selected.");

            }
        });

        $('.assetGroupCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.assetGroupCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#assetGroup').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#assetGroupText').text(selectedOptionsText.length + " Asset Group(s) Selected.");
            } else {
                $('#assetGroupText').text("No Asset Group(s) Selected.");

            }
        });

        $('.kriCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.kriCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#kri').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#kriText').text(selectedOptionsText.length + " KRI(s) Selected.");
            } else {
                $('#kriText').text("No KRI(s).");

            }
        });

        $('.kpiCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.kpiCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#kpi').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#kpiText').text(selectedOptionsText.length + " KPI(s) Selected.");
            } else {
                $('#kpiText').text("No KPI(s).");

            }
        });

        $('.riskAcceptanceCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.riskAcceptanceCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#riskAcceptance').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#riskAcceptanceText').text(selectedOptionsText.length + " Risk Acceptance(s) Selected.");
            } else {
                $('#riskAcceptanceText').text("No Asset Group(s).");

            }
        });

        $('.departmentCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.departmentCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#department').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#departmentText').text(selectedOptionsText.length + " department(s) Selected.");
            } else {
                $('#departmentText').text("No department(s).");

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
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
