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
            @include('4-Process/1-InitialSetup/initialheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        @include('4-Process.1-InitialSetup._partials.sidebar')
        <!-- SIDEBAR -->
    
    
    
        <!-- CONTENT -->
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تعريف أفضل الممارسات</p>
                    <p class="PageHeadEngTxt">Best Practices Definition</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{route('best-practices.index')}}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('best-practices.create') }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('best-practices.edit', $bestPractice->best_practices_id) }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'DeleteButton' : 'DisabledButton' }}">
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
                                <p class="FieldHeadEngTxt">Best Practice ID</p>
                                <p class="FieldHeadArbTxt">رمز أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practices_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Name</p>
                                <p class="FieldHeadArbTxt">اسم أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practices_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Source</p>
                                <p class="FieldHeadArbTxt">مصدر أفضل الممارسات</p>
                            </div>
                            <p class="bg-tx">{{ $bestPractice->best_practices_source }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Version</p>
                                <p class="FieldHeadArbTxt">إصدار نسخة من أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practices_version }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Country</p>
                                <p class="FieldHeadArbTxt">بلد أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practices_country }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Regulation</p>
                                <p class="FieldHeadArbTxt">تنظيم أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practices_regulation }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Exclusively Related to ISO?</p>
                                <p class="FieldHeadArbTxt">تتعلق حصرا؟ ISO</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practice_iso }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Year</p>
                                <p class="FieldHeadArbTxt">سنة أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->best_practices_release_year }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Regulatory</p>
                                <p class="FieldHeadArbTxt">تنظيمية</p>
                            </div>
                            <p class="sh-tx">{{ $bestPractice->regulatory }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Remarks</p>
                                <p class="FieldHeadArbTxt">ملاحظات</p>
                            </div>
                            <p class="bg-tx">{{ $bestPractice->remarks }}</p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>

    <form method="POST" action="{{ route('best-practices.destroy') }}" id="deleteForm">
        @csrf
        @method('DELETE')
        <input type="hidden" name="record" value="{{ $bestPractice->best_practices_id }}">
    </form>

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
