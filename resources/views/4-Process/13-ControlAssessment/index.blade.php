@extends('partials.app-layout')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex">

                    <div class="col-12 col-lg-5 text-lg-start">
                        <h3 class="fs-2 fw-bold">ملخص تقييم الضوابط</h3>
                        <small>Control Assessments Summary</small>
                    </div>

                    <div
                        class="align-content-center col-lg-7 col-12 d-flex flex-wrap justify-content-lg-end justify-content-center">

                        <a href="{{ route('control-assessments.index') }}" class="btn btn-theme btn-sm px-5 me-2">يضيف <br>
                            View
                        </a>

                        <a href="{{ route('control-assessments.create') }}"
                            class="{{ auth()->user()->can('manage-asset') ? 'btn btn-theme btn-sm px-5 me-2' : 'btn btn-theme btn-sm px-5 me-2 not-allow' }}">يضيف
                            <br>
                            Add
                        </a>

                        <a href="" id="btnUpdate"
                            class="{{ auth()->user()->can('manage-asset') ? 'btn btn-theme btn-sm px-5 me-2' : 'btn btn-theme btn-sm px-5 me-2 not-allow' }}">تحديث
                            <br>
                            Update
                        </a>

                        <button type="button" id="btnDelete" form="form" class="btn btn-theme btn-sm px-5"
                            {{ !auth()->user()->can('delete-data') ? 'disabled' : null }}>يمسح <br> Delete </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="mb-3">
        <div class="container-fluid">
            <form action="{{ route('control-assessments.index') }}">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="control_assessment_id" class="form-label fw-bold">Control Assessment ID</label>
                        <select class="form-select" id="control_assessment_id" name="control_assessment_id"
                            onchange="this.form.submit()">
                            <option value="">Select Control Assessment</option>
                            @foreach ($assessments as $assessment)
                                <option value="{{ $assessment->control_assessment_id }}"
                                    @if ($assessment->control_assessment_id == request('control_assessment_id')) selected @endif>
                                    {{ $assessment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="control_id" class="form-label fw-bold">Control ID</label>
                        <select class="form-select" id="control_id" name="control_id" onchange="this.form.submit()">
                            <option value="">Select Control</option>
                            @foreach ($controls as $control)
                                <option value="{{ $control->control_id }}"
                                    @if ($control->control_id == request('control_id')) selected @endif>
                                    {{ $control->name }}
                                </option>
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
        <form method="POST" action="{{ route('control-assessments.destroy') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="table-responsive rounded-3">
                <table class="table  rounded-3 table-bordered">
                    <thead>
                        <tr class="table-theme-secondary">
                            <th>

                            </th>
                            <th>S.No</th>
                            <th>
                                {{-- رمز المخاطر
                                <br><br> --}}
                                Assessment ID
                            </th>
                            <th>
                                Name
                            </th>
                            {{-- <th>
                            Description
                        </th> --}}
                            <th>
                                Start and End Date
                            </th>
                            <th>
                                Control Assessed
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($controlAssessments as $controlAssessment)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record"
                                        value="{{ $controlAssessment->$primaryKey }}" required>
                                </td>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a
                                        href="{{ route('control-assessments.show', $controlAssessment->control_assessment_id) }}">

                                        {{ $controlAssessment->control_assessment_id }}
                                    </a>
                                </td>

                                <td>{{ $controlAssessment->control_assessment_name }}
                                </td>
                                {{-- <td>{{ $controlAssessment->control_assessment_description }}
                            </td> --}}
                                <td>{{ $controlAssessment->start_end_date }}
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 text-end">
                                        @forelse ($controlAssessment->findings as $finding)
                                            <li class="d-flex  justify-content-between mb-1">
                                                <span>
                                                    <a
                                                        href="{{ route('control-assessment-findings.show', $finding->control_finding_id) }}">
                                                        {{ $finding->control->control_id }}
                                                    </a>
                                                </span>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('control-assessment-findings.create', $controlAssessment->control_assessment_id) }}"
                                                        class="{{ auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow' }}">Add
                                                        Findings
                                                        <br>إضافة نتيجة
                                                    </a>


                                                    {{-- <a href="{{ route('control-assessment-findings.edit', $finding->control_finding_id) }}"
                                                        class="btn btn-outline-dark btn-sm text-decoration-none">Update<br>
                                                        تحديث </a>
                                                    <button type="submit"
                                                        form="destroy-{{ $finding->control_finding_id }}"
                                                        class="btn btn-outline-dark btn-sm text-decoration-none rounded-end">Delete<br>
                                                        يمسح </button>
                                                    <form id="destroy-{{ $finding->control_finding_id }}" method="POST"
                                                        action="{{ route('control-assessment-findings.destroy', $finding->control_finding_id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form> --}}
                                                </div>
                                            </li>
                                        @empty
                                            <li class="mb-0">
                                                <a href="{{ route('control-assessment-findings.create', $controlAssessment->control_assessment_id) }}"
                                                    class="{{ auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow' }}">Add
                                                    Findings
                                                    <br>إضافة نتيجة
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
                window.location.href = `/control-assessments/edit/${selectedRadio.value}`;
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
