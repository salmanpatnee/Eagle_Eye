@extends('4-Process.risk.risk-methodology.layout')
@section('content')
    <div class="IndiTable">
        <form method="POST" action="{{ route($routeName . '.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">منهجية المخاطر</p>
                    <p class="PageHeadEngTxt">Risk Methodology</p>
                </div>
                <div class="ButtonContainer">
                    <a href="" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route($routeName . '.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>

                    <a href="" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}"
                        id="btnUpdate">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>

                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>

            <div class="table-container">

                <div class="ListTable">
                    <table cellspacing="0">
                        <tr class="table-header">
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px">
                                <p class="ListHeadArbTxt">رقم</p>
                                <p class="ListHeadEngTxt">S.No</p>
                            </th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">رمز منهجية المخاطر</p>
                                <p class="ListHeadEngTxt">Risk Method ID</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">صاحب منهجية المخاطر</p>
                                <p class="ListHeadEngTxt">Function Owner Name</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">صاحب منهجية المخاطر</p>
                                <p class="ListHeadEngTxt">Asset</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt"> المخاطر</p>
                                <p class="ListHeadEngTxt">Risk</p>
                            </th>
                        </tr>
                        @foreach ($riskMethodologies as $riskMethodology)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record" value="{{ $riskMethodology->id }}"
                                        required>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a
                                        href="{{ route($routeName . '.show', $riskMethodology->id) }}">{{ $riskMethodology->risk_methodology_id }}</a>
                                </td>
                                <td>{{ $riskMethodology->owner?->owner_name }}</td>
                                <td>{{ $riskMethodology->asset?->asset_name }}</td>
                                <td>{{ $riskMethodology->risk?->risk_name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
            } else {
                alert('Please select a record to delete.');
            }
        });

        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                window.location.href = `/risk-methodology/${selectedRadio.value}/edit`;
            } else {
                alert('Please select a record.');
            }
        });
    </script>
@endpush
