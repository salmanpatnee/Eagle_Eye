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



        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">العملية </p>
                    <p class="PageHeadEngTxt">Process</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('process.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>

                    <a href="{{ route('process.create') }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('process.edit', $process?->id) }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form method="POST" action="{{ route('process.destroy') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $process->id }}">
                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('manage-initial-setup') ? 'DeleteButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            </div>

            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process ID</p>
                                <p class="FieldHeadArbTxt">رمز العملية</p>
                            </div>
                            <p class="sh-tx">{{ $process->process_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process Name</p>
                                <p class="FieldHeadArbTxt">اسم العملية</p>
                            </div>
                            <p class="sh-tx">{{ $process->title }}</p>
                        </div>
                    </div>

                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process Name Arabic</p>
                                <p class="FieldHeadArbTxt">اسم العملية عربي</p>
                            </div>
                            <p class="sh-tx" dir="rtl" style="padding-right: .5em">{{ $process->title_ar }}</p>
                        </div>
                        <div class="column">
                            {{-- <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process City</p>
                                <p class="FieldHeadArbTxt">المدينة العملية</p>
                            </div>
                            <p class="sh-tx">{{ $process->process_city }}</p> --}}
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process Description</p>
                                <p class="FieldHeadArbTxt">وصف العملية</p>
                            </div>
                            <p class="bg-tx">{{ $process->description }}</p>
                        </div>
                    </div>

                </div>

            </table>
            <div class="ListTable" id="attachments">
                <table cellspacing="0">
                    <tr>
                        <th>
                            <p class="ListHeadArbTxt">رمز </p>
                            <p class="ListHeadEngTxt">S.No</p>
                        </th>
                        <th>
                            <p class="ListHeadArbTxt">اسم المورد</p>
                            <p class="ListHeadEngTxt">Resource Name</p>
                        </th>
                        <th>
                            <p class="ListHeadArbTxt">نوع المورد</p>
                            <p class="ListHeadEngTxt">Resource Type</p>
                        </th>
                        <th></th>
                    </tr>

                    @forelse ($process->resources as $resource)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                {{ $resource->file_name }}
                            </td>
                            <td>
                                {{ ucfirst($resource->resource_type) }}
                            </td>
                            <td class="flex items-center justify-end">
                                {{-- <small class="me-1">
                                    <a href="{{ asset('storage/' . $resource->path) }}" download>View</a>
                                </small> --}}
                                <small>
                                    <form method="POST"
                                        action="{{ route('process.resource.destroy', $resource->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn-transparent" type="submit">Delete</button>
                                    </form>
                                </small>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <p>No resources found</p>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>

    </div>
    @include('components.delete-confirmation-modal')



    <script src="{{ asset('Css/4-Process/1-Form/1-Form.js') }}" async></script>
    <script src="{{ asset('/Css/7-Sidebar/2-Sidebar.js') }}" async></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });
    </script>


</body>

</html>
