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

        <div class="IndiTable">
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
                    <a href="{{ route('sub-domains.create') }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('sub-domains.edit', $subDomain->id) }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    @if(auth()->user()->can('manage-initial-setup'))
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
                            <p class="sh-tx">{{ $subDomain->sub_domain_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Sub-Domain Name</p>
                                <p class="FieldHeadArbTxt">اسم المكون الفرعي</p>
                            </div>
                            <p class="sh-tx">{{ $subDomain->sub_domain_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Sub-Domain Description</p>
                                <p class="FieldHeadArbTxt">وصف المكون الفرعي</p>
                            </div>
                            <p class="bg-tx">{{ $subDomain->sub_domain_description }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification</p>
                                <p class="FieldHeadArbTxt">التصنيف</p>
                            </div>
                            <p class="sh-tx">{{ $subDomain->classification?->classification_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice</p>
                                <p class="FieldHeadArbTxt">أفضل الممارسات</p>
                            </div>
                            @foreach ($subDomain->bestPractices as $bestPractice)
                                <p class="sh-tx">{{ $bestPractice->best_practices_name }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Categories</p>
                                <p class="FieldHeadArbTxt">اسم الفئة</p>
                            </div>
                            <ol class="resource-list">
                                @forelse ($subDomain->categories as $category)
                                    <li>{{ $category->category_name }}</li>
                                @empty
                                    <li>No categories found</li>
                                @endforelse
                            </ol>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Domains</p>
                                <p class="FieldHeadArbTxt">المكون الأساسي</p>
                            </div>
                            <p class="sh-tx">{{ $subDomain->domain->main_domain_name }}</p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>

    @if(auth()->user()->can('manage-initial-setup'))
        <form method="POST" action="{{ route('sub-domains.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <input type="hidden" name="record" value="{{ $subDomain->id }}">
        </form>
    @endif

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnDelete')?.addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
