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
            <div class="headertext">
                <p>نظام إدارة المحتوى: العملية</p>
                <p>CMS: Process</p>
            </div>

        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">
        @include('4-Process/cms/process/sidebar')
        <!-- SIDEBAR -->



        <!-- CONTENT -->
        <div class="IndiTable">
            <form method="POST" action="{{ route('process.destroy') }}" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">العملية</p>
                        <p class="PageHeadEngTxt">Process</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>

                        <a href="{{ route('process.create') }}"
                            class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يضيف</p>
                            <p class="ButtonEngTxt">Add</p>
                        </a>

                        <a href=""
                            class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}"
                            id="btnUpdate">
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
                @if (session('error'))
                    <div class="alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="table-container">

                    <div class="ListTable">

                        <table cellspacing="0">
                            <tr class="table-header">
                                <th style="padding-right: 0px;"></th>
                                <th style="padding-right: 0px">
                                    <p class="ListHeadArbTxt">رقم</p>
                                    <p class="ListHeadEngTxt">S.No</p>
                                </th>
                                <th style="padding-right: 0px;">
                                    <p class="ListHeadArbTxt">رمز الموقع</p>
                                    <p class="ListHeadEngTxt">Process ID</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">اسم الموقع</p>
                                    <p class="ListHeadEngTxt">Process Name</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">إدارة الموارد</p>
                                    <p class="ListHeadEngTxt">Manage Resource</p>
                                </th>


                            </tr>
                            @foreach ($allProcess as $item)
                                <tr>
                                    <td>
                                        <input type="radio" name="record" class="record" value="{{ $item->id }}"
                                            required>
                                    </td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a href="{{ route('process.show', $item->process_id) }}">{{ $item->process_id }}</a>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <a href="{{route('resource.create', $item->id)}}" style="color: blue">Upload/Manage</a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')



    <script src="{{ asset('Css/4-Process/1-Form/1-Form.js') }}" async></script>
    <script src="{{ asset('/Css/7-Sidebar/2-Sidebar.js') }}" async></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    const selectedRadio = document.querySelector('.record:checked');

    if (selectedRadio) {
        window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
    } else {
        alert('Please select a record to delete.');
    }
});
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/process/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>


</body>

</html>
