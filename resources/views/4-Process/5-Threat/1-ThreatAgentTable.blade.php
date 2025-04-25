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
                    <p class="PageHeadArbTxt">وكلاء التهديد</p>
                    <p class="PageHeadEngTxt">Threat Agents</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/threat-agent-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route($routeName . '.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route($routeName. '.edit', $data->$primaryKey) }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form method="POST" action="{{ route($routeName.'.delete') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $data->id }}">
                        <button type="button" onclick="showDeleteModal()"
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
                                <p class="FieldHeadEngTxt">Threat Agent ID</p>
                                <p class="FieldHeadArbTxt">رمز وكلاء التهديد</p>
                            </div>
                            <p class="sh-tx">{{ $threatAgent->threat_agent_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Agent Name</p>
                                <p class="FieldHeadArbTxt">اسم وكلاء التهديد</p>
                            </div>

                            <p class="sh-tx">{{ $threatAgent->threat_agent_name }}</p>

                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Agent Description</p>
                                <p class="FieldHeadArbTxt">وصف وكلاء التهديد</p>
                            </div>

                            <p class="bg-tx">{{ $threatAgent->threat_agent_description }}</p>

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

                            <p class="sh-tx">{{ $threatAgent->type?->threat_agent_type_name }}</p>

                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Agent Sub-Type Name</p>
                                <p class="FieldHeadArbTxt">اسم النوع الفرعي لعامل التهديد</p>
                            </div>

                            <p class="sh-tx">{{ $threatAgent->subType?->threat_agent_sub_type_name }}</p>

                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Agent Rating Title</p>
                                <p class="FieldHeadArbTxt">عنوان نقاط وكيل التهديد</p>
                            </div>

                            <p class="sh-tx">{{ $threatAgent->rating?->threat_agent_rating_title }}</p>

                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Threat Agent Vector Name</p>
                                <p class="FieldHeadArbTxt">ناقل وكيل التهديد</p>
                            </div>

                            <ol class="resource-list">
                                @foreach ($threatAgent?->vectors as $vector)
                                    <li>{{ $vector->threat_agent_vector_name }}</li>
                                @endforeach
                            </ol>

                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
    <!-- SIDEBAR -->
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
