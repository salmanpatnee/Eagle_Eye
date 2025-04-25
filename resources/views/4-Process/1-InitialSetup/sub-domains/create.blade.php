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
    <style>
        h1 {
            font-size: 1.7em;
            margin: 0 0 0 10px;
        }

        .btn {
            color: #fff;
        }

        .btn-dark,
        .btn-dark:hover,
        .btn-dark:active {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .modal-header {

            background: linear-gradient(to right, #203864, #2e74b6);
        }

        .modal-title {

            color: #fff;
        }

        div#selectedCategoriesText {
            margin-top: 1em;
            color: cornflowerblue;
        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
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
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>

    <div class="wrapper">

        @include('4-Process.1-InitialSetup._partials.sidebar')
        <!-- SIDEBAR -->



        <!-- CONTENT -->
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($subDomain) ? route('sub-domains.update', $subDomain->id) : route('sub-domains.store') }}"
                method="POST">
                @csrf
                @if (isset($subDomain))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $subDomain->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">المكون الفرعي</p>
                        <p class="PageHeadEngTxt">Sub-Domains</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('sub-domains.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        @if (request()->routeIs('sub-domains.edit'))
                            <a href="{{ route('sub-domains.create') }}" class="MoreButton">
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

                        @if (request()->routeIs('sub-domains.edit'))
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
                                    <p class="FieldHeadEngTxt">Sub-Domain ID</p>
                                    <p class="FieldHeadArbTxt">رمز المكون الفرعي</p>
                                </div>
                                <p><input type="text" name="sub_domain_id" id="sub_domain_id" class="sh-tx"
                                        placeholder="Enter Sub-Domain ID"
                                        value="{{ old('sub_domain_id', $subDomain?->sub_domain_id) }}"
                                        {{ $subDomain?->sub_domain_id ? 'readonly' : '' }} required>
                                    <error name="sub_domain_id" />

                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Sub-Domain Name</p>
                                    <p class="FieldHeadArbTxt">اسم المكون الفرعي</p>
                                </div>
                                <p><input type="text" name="sub_domain_name" id="sub_domain_name" class="sh-tx"
                                        placeholder="Enter Sub-Domain Name"
                                        value="{{ old('sub_domain_name', $subDomain?->sub_domain_name) }}" required>
                                    <error name="sub_domain_name" />
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Sub-Domain Description</p>
                                    <p class="FieldHeadArbTxt">وصف المكون الفرعي</p>
                                </div>
                                <p><input type="text" name="sub_domain_description" id="sub_domain_description"
                                        class="bg-tx" placeholder="Write Sub-Domain Description"
                                        value="{{ old('sub_domain_description', $subDomain?->sub_domain_description) }}">
                                    <error name="sub_domain_description" />


                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Classification</p>
                                    <p class="FieldHeadArbTxt">التصنيف</p>
                                </div>
                                <p>
                                    <select name="classification_id" id="classification_id" class="sh-tx">
                                        <option value="">Select Option</option>
                                        @foreach ($classifications as $classification)
                                            <option value="{{ $classification->classification_id }}"
                                                {{ $classification->classification_id == old('classification_id', $subDomain?->classification_id) ? 'selected' : '' }}>
                                                {{ $classification->classification_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <error name="classification_id" />
                                </p>
                            </div>
                            <div class="column">
                                <x-label label="Best Practice" label_ar="أفضل الممارسات" />
                                <x-modal-button modal_id="bestpracticeModal" label="Add Best Practice"
                                    name="bestPractices" :data="isset($bestPracticeIds) ? json_encode($bestPracticeIds) : []" />
                                <error name="bestPractices" />

                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <x-label label="Categories" label_ar="اسم الفئة" />
                                <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                                    :data="isset($categoryIds) ? json_encode($categoryIds) : []" />
                                <error name="categories" />
                            </div>


                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Domains</p>
                                    <p class="FieldHeadArbTxt">المكون الأساسي</p>
                                </div>
                                <p>
                                    <select name="main_domain_id" id="main_domain_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($domains as $domain)
                                            <option value="{{ $domain->main_domain_id }}"
                                                {{ $domain->main_domain_id == old('main_domain_id', $subDomain?->main_domain_id) ? 'selected' : '' }}>
                                                {{ $domain->main_domain_id }} - {{ $domain->main_domain_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <error name="main_domain_id" />


                                </p>
                                {{-- <p>
                                    <select name="domainnames" id="domainnames" class="sh-tx"
                                        onchange="updateAssetRegGroupmentId()">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($DomainNames as $DomainName)
                                            <option value="{{ $DomainName->main_domain_id }}">
                                                {{ $DomainName->main_domain_id }} - {{ $DomainName->main_domain_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </table>
            </form>

            @if(request()->routeIs('sub-domains.edit'))
                <form method="POST" action="{{ route('sub-domains.destroy') }}" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="record" value="{{ $subDomain->id }}">
                </form>
            @endif
        </div>
    </div>

    <x-modal id="bestpracticeModal" title="Select Best Practice" :data="$bestPractices" :selectedvalues="isset($bestPracticeIds) ? $bestPracticeIds : []"
        checkboxClass="bestPracticeCheckbox" id_key="best_practices_id" value_key="best_practices_name" />

    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

        @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        $('.categoryCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.categoryCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#categories').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#categoriesText').text(selectedOptionsText.length + " Category Selected.");
            } else {
                $('#categoriesText').text("Category selected.");
            }
        });

        $('.bestPracticeCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.bestPracticeCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#bestPractices').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#bestPracticesText').text(selectedOptionsText.length + " Best Practice Selected.");
            } else {
                $('#bestPracticesText').text("Best Practice selected.");
            }
        });

        document.getElementById('btnDelete')?.addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>
