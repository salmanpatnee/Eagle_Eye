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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    @stack('styles')
</head>

<body>
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
        <div class="IndiTable">
            @yield('content')
        </div>
    </div>
    @include('components.delete-confirmation-modal')

    @stack('scripts')
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                document.getElementById('deleteRecordId').value = selectedRadio.value;
                window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
            } else {
                alert('Please select a record.');
            }
        });
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- SIDEBAR -->
    {{-- <div class="headersec">
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
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    @include('components.delete-confirmation-modal')

     --}}
</body>

</html>
