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
        .ck.ck-content.ck-editor__editable {
            height: 300px;
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
                    <p class="ArbTxt">موضوعي</p>
                    <p class="EngTxt">Objectives</p>
                </div>
                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/objectives/sidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt"> أهداف</p>
                <p class="PageHeadEngTxt">Objectives</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{route('objectives.index')}}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                @if (request()->routeIs($routeName . '.edit'))
                    <a href="{{ route($routeName . '.create') }}" class="MoreButton">
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

                <button type="button" onclick="showDeleteModal()"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>


                <form method="POST" action="{{ route($routeName . '.destroy') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->objective_id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($objective) ? route('objectives.update', $objective->id) : route('objectives.store') }}"
            method="POST">
            @csrf
            @if (isset($objective))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $objective->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Objective ID</p>
                                <p class="FieldHeadArbTxt">رمز موضوعي</p>
                            </div>
                            <p><input type="text" name="objective_id" id="objective_id" class="sh-tx" placeholder="Enter ID"
                                    value="{{ old('objective_id', $objective?->objective_id) }}"
                                    {{ $objective?->objective_id ? 'readonly' : '' }} required>
                                @error('objective_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>

                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Objective Name</p>
                                    <p class="FieldHeadArbTxt"> اسم موضوعي</p>
                                </div>
                                <p><input type="text" name="objective" id="objective" class="bg-tx" placeholder="Write Objective" value="{{ old('objective', $objective?->objective) }}" required>
                                                                    </p>
                            </div>
                        </div>

                        
                    </div>

                </div>
            </table>
        </form>
    </div>
    @include('components.delete-confirmation-modal')
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                height: 400
            })
            .catch(error => {
                console.error(error);
            });

        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
    </script>
</body>
