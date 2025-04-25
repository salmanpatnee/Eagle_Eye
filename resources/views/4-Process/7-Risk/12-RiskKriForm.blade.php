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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to generate the ID with a sequence
            function generateID() {
                // Get the input element
                var inputElement = document.getElementById('RiskKriId');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'RSK-KRI-' + formattedNumber;

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
    <div class="IndiTable">
        
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">مؤشرات المخاطر الرئيسية</p>
                    <p class="PageHeadEngTxt">Key Risk Indicators</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/kri-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    @if (request()->routeIs($routeName.'.edit'))
                    <a href="{{route($routeName.'.create')}}" class="MoreButton">
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
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName.'.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                    </button>
                    
                    
                    <form method="POST" action="{{ route($routeName.'.delete') }}" id="delete_form">
                        <input type="hidden" name="record" value="{{ $data?->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <form id="form" action="{{ isset($riskkri) ? route('riskkri.update', $riskkri->id) : route('riskkri.store') }}"
                method="POST">
                @csrf
                @if (isset($riskkri))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $riskkri->id }}">
                @endif

            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KRI ID</p>
                                <p class="FieldHeadArbTxt">رمز مؤشر المخاطر الرئيسية</p>
                            </div>
                            <p><input type="text" name="key_risk_indicator_id" id="key_risk_indicator_id"
                                    class="sh-tx" placeholder="Enter ID"
                                    value="{{ old('key_risk_indicator_id', $riskkri?->key_risk_indicator_id) }}"
                                    {{ $riskkri?->key_risk_indicator_id ? 'readonly' : '' }} required>
                                @error('key_risk_indicator_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KRI Name</p>
                                <p class="FieldHeadArbTxt">اسم  مؤشر المخاطر الرئيسية</p>
                            </div>
                            <p><input type="text" name="key_risk_indicator_name" id="key_risk_indicator_name"
                                    class="sh-tx" placeholder="Enter Name"
                                    value="{{ old('key_risk_indicator_name', $riskkri?->key_risk_indicator_name) }}"
                                     required>
                                @error('key_risk_indicator_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KRI Source</p>
                                <p class="FieldHeadArbTxt">مصدر مؤشر المخاطر الرئيسية</p>
                            </div>
                            <p><input type="text" name="key_risk_indicator_source" id="key_risk_indicator_source"
                                    class="sh-tx" placeholder="Write Name"
                                    value="{{ old('key_risk_indicator_source', $riskkri?->key_risk_indicator_source) }}"
                                    required>
                                @error('key_risk_indicator_source')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KRI Value</p>
                                <p class="FieldHeadArbTxt">قيمة مؤشر المخاطر الرئيسي</p>
                            </div>
                            <p><input type="text" name="key_risk_indicator_value" id="key_risk_indicator_value"
                                    class="sh-tx" placeholder="Write Name"
                                    value="{{ old('key_risk_indicator_value', $riskkri?->key_risk_indicator_value) }}"
                                    required>
                                @error('key_risk_indicator_value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">KRI Description</p>
                                <p class="FieldHeadArbTxt">وصف مؤشر المخاطر الرئيسية</p>
                            </div>
                            <p><input type="text" name="key_risk_indicator_description"
                                    id="key_risk_indicator_description" class="bg-tx"
                                    placeholder="Write Description"
                                    value="{{ old('key_risk_indicator_description', $riskkri?->key_risk_indicator_description) }}">
                                @error('key_risk_indicator_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </table>
        </form>
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
