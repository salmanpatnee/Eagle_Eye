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

    <div class="wrapper">

        <!-- SIDEBAR -->
        <div class="headersec">
            <div class="headerleft">
                @include('4-Process/headerleft')
                @include('4-Process/1-InitialSetup/roleheader')
            </div>
            <div class="text-center d-flex gap-3">
                @include('partials.roles')
                @include('4-Process/backbutton')
            </div>
        </div>
        @include('4-Process/1-InitialSetup/_partials/sidebar')

        <!-- CONTENT -->
        <div class="IndiTable">
            <form action="{{ route('upload.owners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3> <a href="{{ asset('templates/owner_template.xls') }}" download="">Download the
                        template file</a> </h3>

                <div class="ContentTableSection">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Upload Excel File</p>
                                <p class="FieldHeadArbTxt">تحميل ملف اكسل</p>
                            </div>
                            <p><input type="file" name="excel_file" id="excel_file" class="bg-tx" value="">
                            </p>
                            <button type="submit" class="MoreButton" style="margin-top: 1em;">
                                <p class="ButtonArbTxt">تحميل الملف</p>
                                <p class="ButtonEngTxt">Upload</p>
                            </button>
                        </div>
                    </div>
                </div>
                <table cellspacing="0">


                </table>
            </form>
        </div>
    </div>


    <script>
       
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
