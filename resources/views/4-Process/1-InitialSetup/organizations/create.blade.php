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
        <link rel="stylesheet" href="{{ asset('/css/4-Process/1-Form/1-Form.css') }}">
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
                    action="{{ isset($organization) ? route('organizations.update', $organization->id) : route('organizations.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($organization))
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $organization->id }}">
                    @endif
                    <div class="TableHeading">
                        <div class="PageHead">
                            <p class="PageHeadArbTxt">إعداد الجهة</p>
                            <p class="PageHeadEngTxt">Organization Setup</p>
                        </div>
                        <div class="ButtonContainer">
                            <a href="{{ route('organizations.index') }}" class="MoreButton">
                                <p class="ButtonArbTxt">منظر</p>
                                <p class="ButtonEngTxt">View</p>
                            </a>



                            @if (request()->routeIs('organizations.edit'))
                                <a href="{{route('organizations.create')}}" class="MoreButton">
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
                                class="{{ request()->routeIs('organizations.edit') ? 'MoreButton' : 'DisabledButton' }}">
                                <p class="ButtonArbTxt">يمسح</p>
                                <p class="ButtonEngTxt">Delete</p>
                            </button>

                        </div>
                    </div>
                    <table cellspacing="0">
                        <div class="ContentTableSection">
                            <div class="ContentTable">
                                <div class="column">
                                    <x-input label="Organization ID" label_ar="رمز الجهة" name="organization_id"
                                        placeholder="Enter Organization ID" :value="$organization?->organization_id" required />
                                </div>
                            </div>
                            <div class="ContentTable">
                                <div class="column">
                                    <x-input label="Organization Name (English)" label_ar=""
                                        name="organization_name_english" placeholder="Enter Organization Name"
                                        :value="$organization?->organization_name_english" required />


                                </div>
                                <div class="column">
                                    <x-input label="Organization Name (Arabic)" label_ar=""
                                        name="organization_name_arabic" placeholder="Enter Organization Name"
                                        :value="$organization?->organization_name_arabic" />
                                </div>
                            </div>
                            <div class="ContentTablebg">

                                <div class="column">
                                    <x-input label="Organization Address" label_ar="عنوان الجهة" name="organization_address"
                                        placeholder="Enter Organization Address" :value="$organization?->organization_address" class="bg-tx" />
                                </div>
                            </div>
                            <div class="ContentTable">
                                <div class="column">

                                    <x-input label="Owner Name" label_ar="اسم صاحب المبادرة" name="initiative_owner_name"
                                        placeholder="Enter Initiative Owner Name" :value="$organization?->initiative_owner_name" />
                                </div>
                                <div class="column">

                                    <x-input label="Owner Title" label_ar="تسمية صاحب المبادرة"
                                        name="initiative_owner_title" placeholder="Enter Owner Title" :value="$organization?->initiative_owner_title" />
                                </div>
                            </div>
                            <div class="ContentTable">
                                <div class="column">
                                    <x-input label="Contact Number" label_ar="رقم الاتصال"
                                        name="initiative_owner_contact_number"
                                        placeholder="Enter Organization Contact Number" type="tel"
                                        :value="$organization?->initiative_owner_contact_number" />
                                </div>
                                <div class="column">
                                    <x-input label="Email Address" label_ar="عنوان البريد الإلكتروني"
                                        name="initiative_owner_email" placeholder="Enter Organization Email Address"
                                        type="email" :value="$organization?->initiative_owner_email" />
                                </div>
                            </div>
                            <div class="ContentTablebg">
                                <div class="column">
                                    <x-input label="Organization Logo" label_ar="شعار الجهة"
                                        name="organization_logo"
                                        placeholder="Enter Organization Contact Number" type="file"
                                        :value="$organization?->organization_logo" class="bg-tx"/>
                                </div>
                             
                            </div>
                        </div>
                    </table>
                </form>
                <form method="POST" action="{{ route('organizations.destroy') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $organization?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>

        @include('components.delete-confirmation-modal')

        <script src="/css/4-Process/1-Form/1-Form.js"></script>
        <script src="/css/7-Sidebar/2-Sidebar.js"></script>
        <script>
            function goBack() {
                window.history.back();
            }

            function showDeleteModal() {
                window.deleteConfirmationModal.show(document.getElementById('delete_form'));
            }
        </script>
    </body>

</html>
