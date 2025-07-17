@extends('4-Process.1-InitialSetup.layout.app')

@section('content')
    <!-- CONTENT -->
    <form method="POST" action="{{ route('sub-categories.destroy') }}" id="deleteForm">
        @csrf
        @method('DELETE')
        <input type="hidden" name="record" id="deleteRecordId">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تعريف الفئة الفرعية</p>
                <p class="PageHeadEngTxt">Sub-Category Definition</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{ route('sub-categories.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route('sub-categories.create') }}"
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

                <button type="button" id="btnDelete"
                    class="{{ auth()->user()->can('manage-initial-setup') ? 'DeleteButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>
            </div>
        </div>
        <div class="ListTable">
            <table cellspacing="0">
                <tr class="table-header">
                    <th style="padding-right: 0px;"></th>
                    <th style="padding-right: 0px">
                        <p class="ListHeadArbTxt">رقم</p>
                        <p class="ListHeadEngTxt">S.No</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">رمز الفئة الفرعية</p>
                        <p class="ListHeadEngTxt">Sub-Category ID</p>
                    </th>
                    <th style="padding-right: 100px;">
                        <p class="ListHeadArbTxt">اسم الفئة الفرعية</p>
                        <p class="ListHeadEngTxt">Sub-Category Name</p>
                    </th>
                    <th style="padding-right: 100px;">
                        <p class="ListHeadArbTxt">الفئة</p>
                        <p class="ListHeadEngTxt">Category Name</p>
                    </th>
                </tr>
                @foreach ($subCategories as $subCategory)
                    <tr>
                        <td>
                            <input type="radio" name="record" class="record" value="{{ $subCategory->id }}" required>
                        </td>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a
                                href="{{ route('sub-categories.show', $subCategory->id) }}">{{ $subCategory->sub_category_id }}</a>
                        </td>
                        <td>{{ $subCategory->sub_category_name }}</td>
                        <td>{{ $subCategory->category->category_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </form>

    @include('components.delete-confirmation-modal')

    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/sub-categories/edit/${selectedRadio.value}`;
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
