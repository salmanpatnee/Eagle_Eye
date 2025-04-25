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

        .text-danger {
            color: red;
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
            @include('4-Process/5-Threat/threatheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">
        @include('4-Process/5-Threat/threat-sidebar')
        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">وكلاء التهديد</p>
                    <p class="PageHeadEngTxt">Threat Agents</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/threat-agent-list" class="MoreButton">
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
                action="{{ isset($threatagent) ? route('threatagent.update', $threatagent->id) : route('threatagent.store') }}"
                method="POST">
                @csrf
                @if (isset($threatagent))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $threatagent->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent ID</p>
                                    <p class="FieldHeadArbTxt">رمز وكلاء التهديد</p>
                                </div>
                                <p><input type="text" name="threat_agent_id" id="threat_agent_id" class="sh-tx"
                                        placeholder="Enter Threat Agent ID"
                                        value="{{ old('threat_agent_id', $threatagent?->threat_agent_id) }}"
                                        {{ $threatagent?->threat_agent_id ? 'readonly' : '' }} required>
                                    @error('threat_agent_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Name</p>
                                    <p class="FieldHeadArbTxt">اسم وكلاء التهديد</p>
                                </div>
                                <p><input type="text" name="threat_agent_name" id="threat_agent_name" class="sh-tx"
                                        placeholder="Write Threat Agent Name"
                                        value="{{ old('threat_agent_name', $threatagent?->threat_agent_name) }}"
                                        required>
                                    @error('threat_agent_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Description</p>
                                    <p class="FieldHeadArbTxt">وصف وكلاء التهديد</p>
                                </div>
                                <p><input type="text" name="threat_agent_description" id="threat_agent_description"
                                        class="bg-tx" placeholder="Write Threat Agent Description"
                                        value="{{ old('threat_agent_description', $threatagent?->threat_agent_description) }}">
                                    @error('threat_agent_description')
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
                                    <p class="FieldHeadEngTxt">Threat Agent Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم نوع وكيل التهديد</p>
                                </div>
                                <p>
                                    <select name="threat_agent_type_id" id="threat_agent_type_id" class="sh-tx"
                                        required>
                                        <option value="">Select Option</option>
                                        @foreach ($threatTypeNames as $threatTypeName)
                                            <option value="{{ $threatTypeName->threat_agent_type_id }}"
                                                {{ $threatTypeName->threat_agent_type_id == old('threat_agent_type_id', $threatagent?->threat_agent_type_id) ? 'selected' : '' }}>
                                                {{ $threatTypeName->threat_agent_type_id }}
                                                {{ $threatTypeName->threat_agent_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Sub-Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم النوع الفرعي لعامل التهديد</p>
                                </div>
                                <p>
                                    <select name="threat_agent_sub_type_id" id="threat_agent_type_id" class="sh-tx"
                                        required>
                                        <option value="">Select Option</option>
                                        @foreach ($threatSubTypeNames as $threatSubTypeName)
                                            <option value="{{ $threatSubTypeName->threat_agent_sub_type_id }}"
                                                {{ $threatSubTypeName->threat_agent_sub_type_id == old('threat_agent_sub_type_id', $threatagent?->threat_agent_sub_type_id) ? 'selected' : '' }}>
                                                {{ $threatSubTypeName->threat_agent_sub_type_id }}
                                                {{ $threatSubTypeName->threat_agent_sub_type_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Rating Title</p>
                                    <p class="FieldHeadArbTxt">عنوان نقاط وكيل التهديد</p>
                                </div>
                                <p>
                                    <select name="threat_agent_rating_id" id="threat_agent_rating_id" class="sh-tx"
                                        required>
                                        <option value="">Select Option</option>
                                        @foreach ($threatRatings as $threatRating)
                                            <option value="{{ $threatRating->threat_agent_rating_id }}"
                                                {{ $threatRating->threat_agent_rating_id == old('threat_agent_rating_id', $threatagent?->threat_agent_rating_id) ? 'selected' : '' }}>
                                                {{ $threatRating->threat_agent_rating_id }}
                                                {{ $threatRating->threat_agent_rating_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="column">
                                <x-label label="Vector Name" label_ar="" />
                                <x-modal-button modal_id="vectorModal" label="Add Vector" name="vectors"
                                    :data="isset($threatAgentVectorIds) ? json_encode($threatAgentVectorIds) : ''" />
                            </div>
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')
    <!-- SIDEBAR -->

    <!-- CONTENT -->

    <x-modal id="vectorModal" title="Select Vector" :data="$vectors" checkboxClass="vectorCheckbox"
        :selectedvalues="isset($threatAgentVectorIds) ? $threatAgentVectorIds : []" id_key="threat_agent_vector_id" value_key="threat_agent_vector_name" />


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        function showDeleteModal() {
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        }

        // When any checkbox is clicked
        $('.vectorCheckbox').change(function() {
            var selectedOptionsText = [];

            var selectedOptions = [];

            $('.vectorCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            // selectedOptionsText.length

            $('#vectors').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#vectorsText').text(selectedOptionsText.length + " Vectors Selected.");
            } else {
                $('#vectorsText').text("No Vectors Selected.");

            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
