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
        .IndiTable .ButtonContainer {
            gap: 10px;
        }

        .MoreButton,
        .DisabledButton {
            margin-right: auto;
        }

        .IndiTable .ButtonContainer {
            margin-right: 30px;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="justify-content-between w-100 d-flex align-items-center">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/11-Attachment/attachmentheader')
        </div>
        <div>
            <a href="{{ route('upload.artifact.create') }}" class="btn-report btn btn-primary btn-sm">
                <p>تحميل البيانات</p>
                Upload Data
            </a>
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
        </div>
    </div>
    @include('4-Process/11-Attachment/sidebar')

    <!-- CONTENT -->
    <div class="IndiTable">
        <form method="POST" id="deleteForm" action="{{ route('artifacts.delete') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="record" value="">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">إدارة المقتنيات</p>
                    <p class="PageHeadEngTxt">Artifact Management</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('artifacts.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('artifacts.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>

                    <a href=""
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}"
                        id="btnUpdate">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>

                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>
            <div class="table-container">
                <div class="ListTable">
                    <table cellspacing="0">
                        <tr class="table-header">
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px">
                                <p class="ListHeadArbTxt">رقم</p>
                                <p class="ListHeadEngTxt">S.No</p>
                            </th>
                            <th>
                                <p class="ListHeadArbTxt">رمز المرفقات</p>
                                <p class="ListHeadEngTxt">Artifact ID</p>
                            </th>
                            <th>
                                <p class="ListHeadArbTxt">اسم المرفقات</p>
                                <p class="ListHeadEngTxt">Artifact Name</p>
                            </th>
                            {{-- <th>
                                <p class="ListHeadArbTxt">تاريخ إنشاء</p>
                                <p class="ListHeadEngTxt">Date of Creation</p>
                            </th> --}}
                            <th>
                                <p class="ListHeadArbTxt">عدد المرفقات</p>
                                <p class="ListHeadEngTxt">Number of Attachments</p>
                            </th>
                            <th></th>
                        </tr>
                        @foreach ($artifacts as $artifact)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record" value="{{ $artifact->id }}"
                                        required>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('artifacts.show', $artifact->id) }}">
                                        {{ $artifact->artifact_id }}
                                    </a>
                                </td>
                                <td>{{ $artifact->artifact_name }}</td>
                                {{-- <td>{{ \Carbon\Carbon::parse($artifact->attachment_creation_date)->format('d-m-Y') }}</td> --}}
                                <td>{{ $artifact->attachments_count }}</td>
                                <td>
                                    @if ($artifact->attachments_count)
                                        <a href="{{ route('artifacts.show', $artifact->id) }}#attachments"
                                            style="color: blue">
                                            View Attachments
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </div>

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                window.location.href = `/artifacts/${selectedRadio.value}/edit`;
            } else {
                alert('Please select a record.');
            }
        });

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                document.getElementById('deleteForm').querySelector('input[name="record"]').value = selectedRadio.value;
                window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
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
