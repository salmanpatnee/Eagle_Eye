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
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
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
        {{-- <form action="/best-practices-input/post" method="post">
            @csrf --}}
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($bestPractice) ? route('best-practices.update', $bestPractice->best_practices_id) : route('best-practices.store') }}"
                method="POST">
                @csrf
                @if (isset($bestPractice))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $bestPractice->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">تعريف أفضل الممارسات</p>
                        <p class="PageHeadEngTxt">Best Practices Definition</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('best-practices.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('best-practices.edit'))
                            <a href="{{ route('best-practices.create') }}" class="MoreButton">
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

                        @if (request()->routeIs('best-practices.edit'))
                            <button type="button" id="btnDelete" class="DeleteButton">
                                <p class="ButtonArbTxt">يمسح</p>
                                <p class="ButtonEngTxt">Delete</p>
                            </button>
                        @else
                            <button type="button" class="DisabledButton">
                                <p class="ButtonArbTxt">يمسح</p>
                                <p class="ButtonEngTxt">Delete</p>
                            </button>
                        @endif
                    </div>
                </div>
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice ID</p>
                                    <p class="FieldHeadArbTxt">رمز أفضل الممارسات</p>
                                </div>
                                <p><input type="text" name="best_practices_id" id="best_practices_id" class="sh-tx"
                                        placeholder="Enter Best Practices ID"
                                        value="{{ old('best_practices_id', $bestPractice?->best_practices_id) }}"
                                        {{ $bestPractice?->best_practices_id ? 'readonly' : '' }} required>
                                    @error('best_practices_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice Name</p>
                                    <p class="FieldHeadArbTxt">اسم أفضل الممارسات</p>
                                </div>
                                <p><input type="text" name="best_practices_name" id="best_practices_name"
                                        class="sh-tx" placeholder="Enter Best Practices Name"
                                        value="{{ old('best_practices_name', $bestPractice?->best_practices_name) }}"
                                        required>
                                    @error('best_practices_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice Source</p>
                                    <p class="FieldHeadArbTxt">مصدر أفضل الممارسات</p>
                                </div>
                                <p><input type="text" name="best_practices_source" id="best_practices_source"
                                        class="bg-tx" placeholder="Enter Best Practices Source"
                                        value="{{ old('best_practices_source', $bestPractice?->best_practices_source) }}"
                                        required>
                                    @error('best_practices_source')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice Version</p>
                                    <p class="FieldHeadArbTxt">إصدار نسخة من أفضل الممارسات</p>
                                </div>
                                <p><input type="text" name="best_practices_version" id="best_practices_version"
                                        class="sh-tx" placeholder="Enter Best Practices Version"
                                        value="{{ old('best_practices_version', $bestPractice?->best_practices_version) }}">
                                    @error('best_practices_version')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice Country</p>
                                    <p class="FieldHeadArbTxt">بلد أفضل الممارسات</p>
                                </div>
                                <p><input type="text" name="best_practices_country" id="best_practices_country"
                                        class="sh-tx" placeholder="Enter Best Practices Country"
                                        value="{{ old('best_practices_country', $bestPractice?->best_practices_country) }}">
                                    @error('best_practices_country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice Regulation</p>
                                    <p class="FieldHeadArbTxt">تنظيم أفضل الممارسات</p>
                                </div>

                                <select name="best_practices_regulation" id="best_practices_regulation"
                                    class="sh-tx">
                                    <option value="">Select Option</option>
                                    <option value="No"
                                        {{ 'No' == old('best_practices_regulation', $bestPractice?->best_practices_regulation) ? 'selected' : '' }}>
                                        No</option>
                                    <option value="Yes"
                                        {{ 'Yes' == old('best_practices_regulation', $bestPractice?->best_practices_regulation) ? 'selected' : '' }}>
                                        Yes</option>
                                </select>
                                @error('best_practices_regulation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Exclusively Related to ISO?</p>
                                    <p class="FieldHeadArbTxt">تتعلق حصرا؟ ISO</p>
                                </div>
                                <select name="best_practice_iso" id="best_practice_iso" class="sh-tx">
                                    <option value="">Select Option</option>
                                    <option value="No"
                                        {{ 'No' == old('best_practice_iso', $bestPractice?->best_practice_iso) ? 'selected' : '' }}>
                                        No</option>
                                    <option value="Yes"
                                        {{ 'Yes' == old('best_practice_iso', $bestPractice?->best_practice_iso) ? 'selected' : '' }}>
                                        Yes</option>
                                </select>
                                @error('best_practice_iso')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Best Practice Year</p>
                                    <p class="FieldHeadArbTxt">سنة أفضل الممارسات</p>
                                </div>
                                <p><input type="text" name="best_practices_release_year"
                                        id="best_practices_release_year" class="sh-tx"
                                        placeholder="Enter Best Practices Year"
                                        value="{{ old('best_practices_release_year', $bestPractice?->best_practices_release_year) }}">
                                    @error('best_practices_release_year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Regulatory</p>
                                    <p class="FieldHeadArbTxt">تنظيمية</p>
                                </div>
                                <select name="regulatory" id="regulatory" class="sh-tx">
                                    <option value="">Select Option</option>
                                    <option value="Yes"
                                        {{ 'Yes' == old('regulatory', $bestPractice?->regulatory) ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="No"
                                        {{ 'No' == old('regulatory', $bestPractice?->regulatory) ? 'selected' : '' }}>
                                        No</option>
                                </select>
                                @error('regulatory')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Remarks</p>
                                    <p class="FieldHeadArbTxt">ملاحظات</p>
                                </div>
                                <p><input type="text" name="remarks" id="remarks" class="bg-tx"
                                        placeholder="Write Remarks"
                                        value="{{ old('remarks', $bestPractice?->remarks) }}">
                                    @error('remarks')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>

            @if (request()->routeIs('best-practices.edit'))
                <form method="POST" action="{{ route('best-practices.destroy') }}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="record" value="{{ $bestPractice?->best_practices_id }}">
                </form>
            @endif
        </div>
    </div>

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }

        document.getElementById('btnDelete')?.addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });
    </script>
</body>

</html>
