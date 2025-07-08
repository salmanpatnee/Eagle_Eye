@extends('layouts.app')

@section('content')

    <!-- CONTENT -->
   
        <form method="POST" action="{{ route('organizations.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <input type="hidden" name="record" id="deleteRecordId">
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

                    <a href="{{ route('organizations.create') }}"
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

                    <button type="button"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'DeleteButton' : 'DisabledButton' }}"
                        id="btnDelete">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>

                </div>
            </div>
            <div class="ListTable">
                <table cellspacing="0">
                    <tr>
                        <th style="padding-right: 0px;"></th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">رقم</p>
                            <p class="ListHeadEngTxt">S.No</p>
                        </th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">رمز الجهة</p>
                            <p class="ListHeadEngTxt">Organization ID</p>
                        </th>
                        <th style="padding-right: 100px;">
                            <p class="ListHeadArbTxt">الاسم الجهة</p>
                            <p class="ListHeadEngTxt">Organization Name</p>
                        </th>
                        <th style="padding-right: 100px;">
                            <p class="ListHeadArbTxt">رقم الاتصال</p>
                            <p class="ListHeadEngTxt">Contact Number</p>
                        </th>
                        <th style="padding-right: 100px;">
                            <p class="ListHeadArbTxt">عنوان البريد الإلكتروني</p>
                            <p class="ListHeadEngTxt">Email Address</p>
                        </th>
                    </tr>
                    @foreach ($organizations as $organization)
                        <tr>
                            <td>
                                <input type="radio" name="record" class="record" value="{{ $organization->id }}"
                                    required>
                            </td>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><a
                                    href="{{ route('organizations.show', $organization->id) }}">{{ $organization->organization_id }}</a>
                            </td>
                            <td>{{ $organization->organization_name_english }}</td>
                            <td>{{ $organization->initiative_owner_contact_number }}</td>
                            <td>{{ $organization->initiative_owner_email }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </form>
    </div>

    @include('components.delete-confirmation-modal')

    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/organizations/edit/${selectedRadio.value}`;
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
@endsection
