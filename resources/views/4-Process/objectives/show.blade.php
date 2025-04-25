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
                    <p class="ArbTxt">موضوعي</p>
                    <p class="EngTxt">Objectives</p>
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
        @include('4-Process/objectives/sidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt"> أهداف</p>
                <p class="PageHeadEngTxt">Objectives</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{ route('objectives.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route($routeName . '.create') }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="{{ route($routeName . '.edit', $data->$primaryKey) }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <form method="POST" action="{{ route($routeName . '.destroy') }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $data->objective_id }}">
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
                            <p class="FieldHeadEngTxt">Objective ID</p>
                            <p class="FieldHeadArbTxt">رمز موضوعي</p>
                        </div>
                        <p class="sh-tx">{{ $objective->objective_id }}</p>
                    </div>
                    <div class="column">
                        
                    </div>
                </div>

                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Objective Name</p>
                            <p class="FieldHeadArbTxt"> اسم موضوعي</p>
                        </div>
                        <p class="bg-tx">{{ $objective->objective }}</p>
                    </div>
                </div>


            </div>
        </table>
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
