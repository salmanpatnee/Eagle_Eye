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
            @include('4-Process/5-Threat/threatheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        @include('4-Process/5-Threat/threat-sidebar')
    
    
    
        <!-- CONTENT -->
        <div class="IndiTable">
            
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">النوع الفرعي الوكيل التهديد</p>
                        <p class="PageHeadEngTxt">Threat Agents Sub-Types</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="/threat-agent-sub-type-list" class="MoreButton">
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

<button type="button" id="btnDelete" form="delete_form"
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
                <form id="form"
                action="{{ isset($threatsubtype) ? route('threatsubtype.update', $threatsubtype->id) : route('threatsubtype.store') }}"
                method="POST">
                @csrf
                @if (isset($threatsubtype))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $threatsubtype->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Sub-Type ID</p>
                                    <p class="FieldHeadArbTxt">رمز النوع الفرعي لعامل التهديد</p>
                                </div>
                                <p><input type="text" name="threat_agent_sub_type_id" id="threat_agent_sub_type_id"
                                        class="sh-tx" placeholder="Enter Threat Agent Sub-Type ID"
                                        value="{{ old('threat_agent_sub_type_id', $threatsubtype?->threat_agent_sub_type_id) }}"
                                        {{ $threatsubtype?->threat_agent_sub_type_id ? 'readonly' : '' }} required>
                                    @error('threat_agent_sub_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Sub-Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم النوع الفرعي لعامل التهديد</p>
                                </div>
                                <p><input type="text" name="threat_agent_sub_type_name" id="threat_agent_sub_type_name"
                                        class="sh-tx" placeholder="Enter Threat Agent Sub-Type Name"
                                        value="{{ old('threat_agent_sub_type_name', $threatsubtype?->threat_agent_sub_type_name) }}"
                                        required>
                                    @error('threat_agent_sub_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Sub-Type Description</p>
                                    <p class="FieldHeadArbTxt">وصف النوع الفرعي لعامل التهديد</p>
                                </div>
                                <p><input type="text" name="threat_agent_type_description"
                                        id="threat_agent_type_description" class="bg-tx"
                                        placeholder="Write Threat Agent Sub-Type Description"
                                        value="{{ old('threat_agent_type_description', $threatsubtype?->threat_agent_type_description) }}">
                                    @error('threat_agent_type_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Threat Agent Type</p>
                                    <p class="FieldHeadArbTxt">نوع وكيل التهديد</p>
                                </div>
                                <select name="threat_agent_type_id" id="threat_agent_type_id" class="sh-tx"
                                    required="">
                                    <option value="">Select Option</option>
                                    @foreach ($threatTypes as $threatType)
                                        <option 
                                            value="{{ $threatType?->threat_agent_type_id }}" 
                                            {{$threatType->threat_agent_type_id == old('threat_agent_type_id', $threatsubtype?->threat_agent_type_id) ? 'selected' : null}}>
                                            {{ $threatType->threat_agent_type_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('threat_agent_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
    
                            </div>
                        </div>
    
                    </div>
                </table>
            </form>
        </div>
    </div>

    @include('components.delete-confirmation-modal')
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
