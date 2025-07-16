@extends('layouts.app')

@section('content')
    <!-- CONTENT -->
    <form method="POST" action="{{ route('best-practices.destroy') }}" id="deleteForm">
        @csrf
        @method('DELETE')
        <input type="hidden" name="record" id="deleteRecordId">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تعريف أفضل الممارسات</p>
                <p class="PageHeadEngTxt">Best Practices Definition</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{route('best-practices.index')}}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route('best-practices.create') }}"
                    class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>

                <a href="" class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}" id="btnUpdate">
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
        
        @if (session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="ListTable">
            <table cellspacing="0">
                <tr class="table-header">
                    <th style="padding-right: 0px;"></th>
                    <th style="padding-right: 0px">
                        <p class="ListHeadArbTxt">رقم</p>
                        <p class="ListHeadEngTxt">S.No</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">رمز أفضل الممارسات</p>
                        <p class="ListHeadEngTxt">Best Practice IDs</p>
                    </th>
                    <th style="padding-right: 100px;">
                        <p class="ListHeadArbTxt">اسم  أفضل الممارسات</p>
                        <p class="ListHeadEngTxt">Best Practice Names</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">سنة أفضل الممارسات

                        </p>
                        <p class="ListHeadEngTxt">Release Year</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">إصدار نسخة من أفضل الممارسات</p>
                        <p class="ListHeadEngTxt">Best Practice Version</p>
                    </th>
                    <th style="padding-right: 0px;">
                        <p class="ListHeadArbTxt">بلد أفضل الممارسات</p>
                        <p class="ListHeadEngTxt">Best Practice Country</p>
                    </th>
                </tr>
                @foreach ($bestPractices as $bestPractice)
                    <tr>
                        <td>
                            <input type="radio" name="record" class="record" value="{{ $bestPractice->best_practices_id }}" required>
                        </td>
                        <td>{{ $loop->index + 1}}</td>
                        <td style="width: 180px;">
                            <a href="{{route('best-practices.show', $bestPractice->best_practices_id)}}">{{ $bestPractice->best_practices_id }}</a>
                        </td>
                        <td>{{ $bestPractice->best_practices_name }}</td>
                        <td>{{ $bestPractice->best_practices_release_year }}</td>
                        <td style="width: 160px;">{{ $bestPractice->best_practices_version }}</td>
                        <td>{{ $bestPractice->best_practices_country }}</td>
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
                window.location.href = `/best-practices/edit/${selectedRadio.value}`;
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
