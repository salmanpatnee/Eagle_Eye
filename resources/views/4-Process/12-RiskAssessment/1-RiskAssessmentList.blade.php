@extends('partials.app-layout')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex justify-center">


                    <div class="col-12 col-lg-5 text-lg-start">
                        <h3 class="fs-2 fw-bold">ملخص تقييم المخاطر</h3>
                        <small>Risk Assessments Summary</small>


                    </div>
                    <div
                        class="align-content-center col-lg-7 col-12 d-flex flex-wrap justify-content-lg-end justify-content-center">


                        <a href="{{ route('risk-assessments.index') }}" class="btn btn-theme btn-sm px-5 me-2">يضيف <br>
                            View
                        </a>

                        <a href="{{ route('risk.riskAss') }}"
                            class="{{ auth()->user()->can('manage-asset') ? 'btn btn-theme btn-sm px-5 me-2' : 'btn btn-theme btn-sm px-5 me-2 not-allow' }}">يضيف
                            <br>
                            Add
                        </a>

                        <a href="" id="btnUpdate"
                            class="{{ auth()->user()->can('manage-asset') ? 'btn btn-theme btn-sm px-5 me-2' : 'btn btn-theme btn-sm px-5 me-2 not-allow' }}">تحديث
                            <br>
                            Update
                        </a>

                        <button type="button" id="btnDelete" class="btn btn-theme btn-sm px-5"
                            {{ !auth()->user()->can('delete-data') ? 'disabled' : null }}>يمسح <br> Delete </button>



                        {{-- <a href="{{ route('risk-assessments.index') }}" class="btn btn-theme btn-sm px-5 me-2">منظر <br>
                            View
                        </a>

                        <a href="{{ route('risk.riskAss') }}" class="btn btn-theme btn-sm px-5 me-2">يضيف <br> Add
                        </a>

                        <button type="button" class="btn btn-theme btn-sm px-5 me-2" disabled>تحديث <br> Update </button>

                         --}}
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="mb-3">
        <div class="container-fluid">
            <form action="{{ route('risk-assessments.index') }}">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="risk_assessment_id" class="form-label fw-bold">Risk Assessment ID</label>
                        <select class="form-select" id="risk_assessment_id" name="risk_assessment_id"
                            onchange="this.form.submit()">
                            <option value="">Select Risk Assessment</option>
                            @foreach ($riskAssessmentNames as $riskAssessmentName)
                                <option value="{{ $riskAssessmentName->risk_assessment_id }}"
                                    @if ($riskAssessmentName->risk_assessment_id == request('risk_assessment_id')) selected @endif>
                                    {{ $riskAssessmentName->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="risk_id" class="form-label fw-bold">Risk ID</label>
                        <select class="form-select" id="risk_id" name="risk_id" onchange="this.form.submit()">
                            <option value="">Select Risk</option>
                            @foreach ($riskNames as $risk)
                                <option value="{{ $risk->risk_id }}"
                                    {{ $risk->risk_id == request('risk_id') ? 'selected' : null }}>
                                    {{ $risk->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="start_end_date" class="form-label fw-bold">Date</label>
                        <input class="form-control" id="start_end_date" name="start_end_date" type="date"
                            value="{{ old('start_end_date', request('start_end_date')) }}" onchange="this.form.submit()">
                    </div>
                </div>
            </form>
        </div>
    </section>


    <div class="container-fluid">
        <form method="POST" action="{{ route('risk-assessments.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')

            <div class="table-responsive rounded-2">
                <table class="table  rounded-2 table-bordered">
                    <thead>
                        <tr class="table-theme-secondary">
                            <th></th>
                            <th>S.No</th>
                            <th>
                                {{-- رمز المخاطر
                            <br><br> --}}
                                Risk Assessment ID
                            </th>
                            <th>
                                Risk Assessment Name
                            </th>
                            <th>
                                Start and End Date
                            </th>
                            <th>
                                Risks Assessed
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($riskAssessments as $riskAssessment)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record"
                                        value="{{ $riskAssessment->$primaryKey }}" required>
                                </td>


                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('risk-assessments.show', $riskAssessment->risk_assessment_id) }}">
                                        {{ $riskAssessment->risk_assessment_id }}
                                    </a>
                                </td>
                                <td>{{ $riskAssessment->risk_assessment_name }}
                                </td>

                                <td>{{ $riskAssessment->start_end_date }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0 text-end">
                                        @forelse ($riskAssessment->findings as $finding)
                                            <li class="d-flex  justify-content-between mb-1">
                                                <span>
                                                    <a
                                                        href="{{ route('risk-assessment-findings.show', $finding->risk_finding_id) }}">
                                                        {{ $finding->risk?->risk_id }} {{ $finding->risk?->risk_name }}
                                                    </a>
                                                </span>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('risk-assessment-findings.create', $riskAssessment->risk_assessment_id) }}"
                                                        class="{{auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow'}}">Add
                                                        <br>يضيف
                                                    </a>
                                                    {{-- <a href="{{ route('risk-assessment-findings.edit', $finding->risk_finding_id) }}"
                                                        class="{{auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow'}}">Update<br>
                                                        تحديث </a>
                                                    <button type="submit" form="destroy-{{ $finding->risk_finding_id }}"
                                                        class="btn btn-outline-dark btn-sm text-decoration-none rounded-end">Delete<br>
                                                        يمسح </button>
                                                    <form id="destroy-{{ $finding->risk_finding_id }}" method="POST"
                                                        action="{{ route('risk-assessment-findings.destroy', $finding->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form> --}}
                                                </div>
                                            </li>
                                        @empty
                                            <li class="mb-0">
                                                <a href="{{ route('risk-assessment-findings.create', $riskAssessment->risk_assessment_id) }}"
                                                    class="{{auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow'}}">Add <br>يضيف
                                                </a>
                                            </li>
                                        @endforelse
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </form>
    </div>
    @include('components.delete-confirmation-modal')
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
                window.location.href = `/risk-assessments/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        // document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        //     checkbox.addEventListener('change', function() {
        //         let selectedValues = Array.from(document.querySelectorAll('.form-check-input:checked'))
        //             .map(function(checkedBox) {
        //                 return checkedBox.value;
        //             });

        //         document.getElementById('assessments').value = selectedValues.join(',');
        //     });
        // });
    </script>
@endsection
