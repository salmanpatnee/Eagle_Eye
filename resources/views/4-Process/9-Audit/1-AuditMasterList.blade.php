@extends('partials.app-layout')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5 text-lg-start">
                    <h3 class="fs-2 fw-bold">ملخص تقييم المخاطر</h3>
                    <small>Audit Registration Summary</small>
                </div>
                <div
                    class="align-content-center col-lg-7 col-12 d-flex flex-wrap justify-content-lg-end justify-content-center">

                    <a href="{{ route('audit-registrations.index') }}" class="btn btn-theme btn-sm px-5 me-2">يضيف <br>
                        View
                    </a>

                    <a href="{{ route('audit-registrations.create') }}"
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

                </div>
            </div>
        </div>
    </section>




    <section class="mb-3">
        <div class="container-fluid">
            <form action="{{ route('audit-registrations.index') }}">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="audit_id" class="form-label fw-bold">Audit Assessment ID</label>
                        <select class="form-select" id="audit_id" name="audit_id" onchange="this.form.submit()">
                            <option value="">Select Audit</option>
                            @foreach ($auditNames as $audit)
                                <option value="{{ $audit->audit_id }}" @if ($audit->audit_id == request('audit_id')) selected @endif>
                                    {{ $audit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-12 mb-2">
                        <label for="control_id" class="form-label fw-bold">Control ID</label>
                        <select class="form-select" id="control_id" name="control_id" onchange="this.form.submit()">
                            <option value="">Select Control</option>
                            @foreach ($controlNames as $controlName)
                                <option value="{{ $controlName->control_id }}"
                                    @if ($controlName->control_id == request('control_id')) selected @endif>
                                    {{ $controlName->name }}</option>
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
        <form method="POST" id="form" action="{{ route('audit-registrations.destroy') }}" id="deleteForm">
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
                                Audit ID
                            </th>
                            <th>
                                Audit Name
                            </th>

                            <th>
                                Start and End Date
                            </th>
                            <th>
                                Control Assessed
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($audits as $audit)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record" value="{{ $audit->$primaryKey }}"
                                        required>
                                </td>


                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('audit-registrations.show', $audit->audit_id) }}">
                                        {{ $audit->audit_id }}
                                    </a>
                                </td>

                                <td>{{ $audit->audit_name }}
                                </td>
                                {{-- <td>{{ $audit->control_assessment_description }}
                            </td> --}}
                                <td>{{ $audit->start_end_date }}
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 text-end">
                                        @forelse ($audit->findings as $finding)
                                            <li class="d-flex  justify-content-between mb-1">
                                                <ul class="list-unstyled mb-0">
                                                    @foreach ($finding->controls as $control)
                                                        <li>
                                                            <span>
                                                                <a
                                                                    href="{{ route('audit-findings.show', $finding->audit_finding_id) }}">
                                                                    {{ $control->control_id }}
                                                                </a>
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('audit-findings.create', $audit->audit_id) }}"
                                                        class="{{ auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow' }}">Add
                                                        <br>يضيف
                                                    </a>


                                                    {{-- <a href="{{ route('audit-findings.edit', $finding->audit_finding_id) }}"
                                                        class="btn btn-outline-dark btn-sm text-decoration-none">Update<br>
                                                        تحديث </a>

                                                    <button type="submit" form="destroy-{{ $finding->audit_finding_id }}"
                                                        class="btn btn-outline-dark btn-sm text-decoration-none rounded-end" ">Delete<br>
                                                                            يمسح </button>
                                                                        <form id="destroy-{{ $finding->audit_finding_id }}" method="POST"
                                                                            action="{{ route('audit-findings.destroy', $finding->id) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form> --}}

                                                </div>
                                            </li>
                                        @empty
                                            <li class="mb-0">
                                                <a href="{{ route('audit-findings.create', $audit->audit_id) }}"
                                                    class="{{ auth()->user()->can('manage-asset') ? 'btn btn-outline-dark btn-sm text-decoration-none' : 'btn btn-outline-dark btn-sm text-decoration-none not-allow' }}">Add
                                                    <br>يضيف
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
                window.location.href = `/audit-registration/${selectedRadio.value}/edit`;
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
