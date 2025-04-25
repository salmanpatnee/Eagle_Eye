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
        {{-- <form action="/location-input/post" method="post">
        @csrf --}}
        <div class="IndiTable">
            <form id="form" action="{{ isset($location) ? route('locations.update', $location->id) : route('locations.store') }}"
                method="POST">
                @csrf
                @if (isset($location))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $location->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">المواقع الجهة</p>
                        <p class="PageHeadEngTxt">Office Locations</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('locations.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>

                        @if (request()->routeIs('locations.edit'))
                            <a href="{{ route('locations.create') }}" class="MoreButton">
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



                        <button type="button" id="btnDelete"
                            class="{{ request()->routeIs('locations.edit') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                <div class="formcanvas">
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Location ID" label_ar="رمز الموقع" name="location_id"
                                placeholder="Enter Location ID" :value="$location?->location_id" required />
                        </div>
                        <div class="sidefiled">
                            <x-input label="Location Name" label_ar="اسم الموقع" name="location_name"
                                placeholder="Enter Location Name" :value="$location?->location_name" required />

                        </div>
                    </div>
                    <div class="onefieldrow">

                        <x-input label="Location Description" label_ar="وصف الموقع" name="location_description"
                            placeholder="Enter Location Description" :value="$location?->location_description" class="bg-tx" />


                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Location Country" label_ar="عنوان الجهة" name="location_country"
                                placeholder="Enter Location Country" :value="$location?->location_country" />


                        </div>
                        <div class="sidefiled">
                            <x-input label="Location City" label_ar="المدينة الموقع" name="location_city"
                                placeholder="Enter Location City" :value="$location?->location_city" />

                        </div>
                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Location Area" label_ar="موقع المنطقة" name="location_area"
                                placeholder="Enter Location Area" :value="$location?->location_area" />

                        </div>
                        <div class="sidefiled">
                            <x-input label="Location Address" label_ar="موقع العنوان" name="location_address"
                                placeholder="Enter Location Address" :value="$location?->location_address" />


                        </div>
                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Contact Person Name" label_ar="اسم جهة الاتصال بالموقع"
                                name="location_contact_name" placeholder="Enter Contact Person Name"
                                :value="$location?->location_contact_name" />


                        </div>
                        <div class="sidefiled">
                            <x-input label="Contact Person Number" label_ar="رقم الجوال"
                                name="location_contact_number" placeholder="Enter Contact Person Number"
                                :value="$location?->location_contact_number" type="tel" />


                        </div>
                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Contact Person Email" label_ar="البريد الإلكتروني لجهة الاتصال"
                                name="location_contact_email" placeholder="Enter Contact Person Email"
                                :value="$location?->location_contact_email" type="email" />
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('locations.destroy') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $location?->id }}">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')





    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        });
    </script>
</body>

</html>
