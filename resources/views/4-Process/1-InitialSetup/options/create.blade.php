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
    <style>
        ul.align-items-center.d-flex.gap-2.user-nav.mt-0 {
    margin-right: 2em;
}
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/1-InitialSetup/initialheader')
        </div>
        @include('partials.roles')
        @include('4-Process/backbutton')
    </div>
    @include('4-Process.1-InitialSetup._partials.sidebar')
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <form
            action="{{route('options.update')}}"
            method="POST">
            @csrf
            @method('PATCH')
            
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt"> إعدادات</p>
                    <p class="PageHeadEngTxt">Options</p>
                </div>
                <div class="ButtonContainer" style="margin-right: 30px;">
                    <a href="{{ route('options.create') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <button type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                   
                    </button>
                    <a href="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </a>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <x-input 
                            label="System Expiry Date" 
                            label_ar="تاريخ انتهاء النظام" 
                            :name="$options[0]->key" 
                            placeholder="Enter System Expiry Date" 
                            :value="$options[0]->value" 
                            type="date" 
                        />
                        </div>
                    </div>                   
                </div>
            </table>
        </form>
    </div>


    <script src="/css/4-Process/1-Form/1-Form.js"></script>
    <script src="/css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
