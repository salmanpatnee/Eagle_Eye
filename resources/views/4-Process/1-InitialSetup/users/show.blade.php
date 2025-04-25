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
    <style>
        .text-danger {
            --bs-text-opacity: 1;
            color: rgba(220, 53, 69, 1) !important;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }

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
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt"> المستخدم</p>
                <p class="PageHeadEngTxt">User</p>
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
                <a href="{{ route('users.edit', $user->id) }}"
                    class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <form method="POST" action="{{ route('users.destroy') }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $user->id }}">
                    @csrf
                    @method('DELETE')
                </form>
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
                        <div style="display: flex; justify-content: space-between;">
                            <h4>Full Name</h4>
                            <h4>اسم</h4>
                        </div>
                        <p class="sh-tx">{{ $user->first_name . ' ' . $user->last_name }}</p>
                    </div>
                    <div class="column">
                        <div style="display: flex; justify-content: space-between">
                            <h4>Username</h4>
                            <h4>اسم المستخدم</h4>
                        </div>
                        <p class="sh-tx">{{ $user->username }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div style="display: flex; justify-content: space-between">
                            <h4>Email</h4>
                            <h4>بريد إلكتروني</h4>
                        </div>
                        <p class="sh-tx">{{ $user->email }}</p>
                    </div>
                    <div class="column">
                        <div style="display: flex; justify-content: space-between">
                            <h4>Role</h4>
                            <h4>دور</h4>
                        </div>
                        <p class="sh-tx">{{ $user->role->role_name }}</p>
                    </div>
                </div>
            </div>
        </table>
    </div>
    @include('components.delete-confirmation-modal')
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });
    </script>
</body>
