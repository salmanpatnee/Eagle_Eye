<!DOCTYPE html5>
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
    <style>
        .IndiTable .ButtonContainer {
            gap: 10px;
            /* margin-right: 30px; */
        }

        .MoreButton,
        .DisabledButton,
        .RightButton {
            margin-right: auto;
        }
    </style>
</head>

<body>
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
                    <p class="ArbTxt">المستخدم</p>
                    <p class="EngTxt">Users </p>
                </div>
                @include('partials.roles')
                <div class="RightButtonContainer">
                    <a href="/compliance">
                        <button class="RightButton">
                            <p>ارجع</p>
                            <p>Back</p>
                        </button>
                    </a>
                </div>
            </div>
        </header>
        @include('4-Process.1-InitialSetup.users.sidebar')
    </section>
    <div class="IndiTable">
        <form method="POST" action="{{ route('users.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <input type="hidden" name="record" id="deleteRecordId">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt"> المستخدم</p>
                    <p class="PageHeadEngTxt">Users</p>
                </div>
                <div class="ButtonContainer">

                    <a href="{{ route('users.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('users.create') }}"
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
            <div class="table-container">

                <div class="ListTable">
                    <table cellspacing="0">
                        <tr class="table-header">
                            {{-- <th style="padding-right: 0px;"></th> --}}
    
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px;">S.No</th>
                            <th style="padding-right: 0px;">Full Name</th>
                            <th style="padding-right: 100px;">Username</th>
                            <th style="padding-right: 0px;">Email</th>
                            <th style="padding-right: 0px;">Role</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record" value="{{ $user->id }}"
                                        required>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </a>
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->role_name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </div>

    @include('components.delete-confirmation-modal')

    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/users/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

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
    </script>
</body>

</html>
