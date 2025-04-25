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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
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

        .DisabledButton,
        .MoreButton {

            margin-right: auto;

        }

        .IndiTable .ButtonContainer {
            gap: 20px;
            margin-right: 20px;
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
                    <p class="ArbTxt">الإعداد الأولي</p>
                    <p class="EngTxt">Initial Setup</p>
                </div>
                @include('partials.roles')
                <div class="RightButtonContainer">
                    <a href="/process">
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
    <form action="{{ route('users.update', $user) }}" method="post" id="form">
        @csrf
        @method('PATCH')
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt"> المستخدم</p>
                    <p class="PageHeadEngTxt">User </p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('users.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    @if (request()->routeIs('users.edit'))
                        <a href="{{ route('users.create') }}" class="MoreButton">
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

                    <button ttype="button" onclick="showDeleteModal()" form="delete_form"
                        class="{{ request()->routeIs('users.edit') ? 'MoreButton' : 'DisabledButton' }}">
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
                                <h4>First Name</h4>
                                <h4>الاسم الأول</h4>
                            </div>
                            <p><input type="text" name="first_name" id="firstname" class="sh-tx"
                                    placeholder="Enter First Name" value="{{ old('first_name', $user->first_name) }}">
                            </p>
                            @error('first_name')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="column">
                            <div style="display: flex; justify-content: space-between;">
                                <h4>Last Name</h4>
                                <h4>اسم العائلة</h4>
                            </div>
                            <p><input type="text" name="last_name" id="lastname" class="sh-tx"
                                    placeholder="Enter Last Name" value="{{ old('last_name', $user->last_name) }}">
                            </p>
                            @error('last_name')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div style="display: flex; justify-content: space-between">
                                <h4>Username</h4>
                                <h4>اسم المستخدم</h4>
                            </div>
                            <p><input type="text" name="username" id="username" class="sh-tx"
                                    placeholder="Enter Username" value="{{ old('username', $user->username) }}"></p>
                            @error('username')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="column">
                            <div style="display: flex; justify-content: space-between">
                                <h4>Email</h4>
                                <h4>بريد إلكتروني</h4>
                            </div>
                            <p><input type="email" name="email" id="email" class="sh-tx"
                                    placeholder="Enter Email" value="{{ old('email', $user->email) }}"></p>
                            @error('email')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div style="display: flex; justify-content: space-between">
                                <h4>Password</h4>
                                <h4>كلمة المرور</h4>
                            </div>
                            <p><input type="password" name="password" id="password" class="sh-tx"
                                    placeholder="Enter Password"></p>
                            @error('password')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="column">
                            <div style="display: flex; justify-content: space-between">
                                <h4>Role</h4>
                                <h4>دور</h4>
                            </div>
                            <p>
                                <select name="role_id" id="role" class="sh-tx">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id == old('role', $user->role_id) ? 'selected' : '' }}>
                                            {{ $role->role_name }}</option>
                                    @endforeach
                                </select>

                            </p>

                            @error('role_id')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                        </div>
                    </div>

                </div>
            </table>
        </div>
    </form>
    <form method="POST" action="{{ route('users.destroy') }}" id="delete_form">
        <input type="hidden" name="record" value="{{ $user?->id }}">
        @csrf
        @method('DELETE')
    </form>
    @include('components.delete-confirmation-modal')
    <script>
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
    </script>
</body>
