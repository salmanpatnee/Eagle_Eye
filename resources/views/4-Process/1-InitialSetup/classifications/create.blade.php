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
            <form id="form"
                action="{{ isset($classification) ? route('classifications.update', $classification->id) : route('classifications.store') }}"
                method="POST">
                @csrf
                @if (isset($classification))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $classification->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف التصنيف</p>
                        <p class="PageHeadEngTxt">Classification Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('classifications.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('classifications.edit'))
                        <a href="{{route('classifications.create')}}" class="MoreButton">
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

                    <button type="button" id="btnDelete"
                        class="{{ request()->routeIs('classifications.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    </div>
                </div>
                <table cellspacing="0">
                    <div style="padding-top:30px; padding-bottom:10px; color:red; font-size:12px;">
                        <p style="text-align:right; padding-right:30px;">ملاحظة: تم إدخال التصنيف بالفعل، يرجى الإضافة أو
                            التغيير فقط بعد تحليل التأثير</p>
                        <p>Note: The classification is already entered, please add or change only after the impact analysis
                        </p>
                    </div>
                    <div class="ContentTableSection" style='margin-top:0px;'>
                        <div class="ContentTable">
                            <div class="column">
                                <x-input label="Classification ID" label_ar="رمز التصنيف" name="classification_id"
                                    placeholder="" :value="$classification?->classification_id" required />
    
                            </div>
                            <div class="column">
                                <x-input label="Classification Name" label_ar="اسم التصنيف" name="classification_name"
                                    placeholder="" :value="$classification?->classification_name" required />
    
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <x-input label="Classification Description" label_ar="وصف التصنيف"
                                    name="classification_description" placeholder="" :value="$classification?->classification_description" class="bg-tx" />
    
    
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                            <x-input label="Classification Source" label_ar="مصدر التصنيف" name="classification_source"
                                placeholder="" :value="$classification?->classification_source" class="bg-tx" />
    
    
                        </div>
                    </div>
                </table>
            </form>
            <form method="POST" action="{{ route('classifications.destroy') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $classification?->id }}">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

    @include('components.delete-confirmation-modal')

    <script src="/css/4-Process/1-Form/1-Form.js"></script>
    <script src="/css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        });
    </script>
</body>

</html>
