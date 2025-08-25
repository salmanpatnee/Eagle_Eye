@extends('layouts.app-full')
@section('title', 'Risk Register')
@section('title_ar', 'سجل المخاطر')
@section('content')
    <div>
        <x-table.action-wrapper title="Risk Register">
            <x-action.excel-button route_name="risk.register.excel" />
        </x-table.action-wrapper>

        <form action="{{ route('risk-register.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Risks" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$riskId" :data="$risks" id_key="risk_id" value_key="risk_name"
                            onchange="this.form.submit()" :value="$riskId" />
                    </div>
                    <div>
                        <x-form.select label="Risk Treatment Action Status" label_ar="خيارات علاج المخاطر"
                            name="riskTreatment" placeholder="Select Treatment Action Status" :value="$riskTreatment"
                            :data="$riskTreatments" id_key="risk_treatment_id" value_key="risk_treatment_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.label label="Last Evalution Date" label_ar="تاريخ التقييم الأخير" for="evalutionDate" />
                        <div class="relative">
                            <input type="date" id="evalutionDate" name="evalutionDate"
                                value="{{ old('evalutionDate', $evalutionDate) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
                                onclick="this.showPicker()" onchange="this.form.submit()" />
                            <span
                                class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z"
                                        fill=""></path>
                                </svg>
                            </span>
                        </div>


                    </div>
                </x-form.grid-3-col>
            </div>
        </form>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="Risk Identifier" />
                <x-table.th label="Scope" />
                <x-table.th label="Owner" />
                <x-table.th label="Identification Date" />
                <x-table.th label="Description" />
                <x-table.th label="Cause" />
                <x-table.th label="Threat" />
                <x-table.th label="Risk Analysis and Consequences" />
                <x-table.th label="Risk Analysis Date" />
                <x-table.th label="Inherent Risk Likelihood (1-5)" />
                <x-table.th label="Inherent Risk Magnitude/Impact" />
                <x-table.th label="Inherent Risk Rating" />
                <x-table.th label="Updated Overall Inherent Risk Rating" />
                <x-table.th label="Treatment Action" />
                <x-table.th label="Treatment Description" />
                <x-table.th label="Treatment Action Owner" />
                <x-table.th label="Treatment Status" />
                <x-table.th label="Deadline for Action" />
                <x-table.th label="Residual Risk Description" />
                <x-table.th label="Residual Risk Likelihood (1-5)" />
                <x-table.th label="Residual Risk Magnitude/Impact (1-5)" />
                <x-table.th label="Residual Risk Rating" />
                <x-table.th label="Following Steps Description" />
                <x-table.th label="Last Evaluation Date" />
                <x-table.th label="Comment" />
            </x-table.thead>

            <x-table.tbody>

                @forelse ($riskRegister as $row)
                    <tr>
                        <x-table.td class="text-center">
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('risks.show', $row->risk_id) }}" target="_blank">
                                {{ $row->risk_id }}
                            </a>
                        </x-table.td>
                        <x-table.td class="list">{!! $row->categories !!}</x-table.td>
                        <x-table.td>{{ $row->owner_name }}</x-table.td>
                        <x-table.td>{{ $row->risk_assessment_start_date }}</x-table.td>
                        <x-table.td>
                            <div style="width: 250px;">{{ $row->risk_description }}</div>
                        </x-table.td>
                        <x-table.td>
                            <div style="width: 250px;">{{ $row->remarks }}</div>
                        </x-table.td>
                        <x-table.td class="list">{!! $row->agents !!}</x-table.td>
                        <x-table.td>
                            <div style="width: 250px;">{{ $row->risk_assessment_description }}</div>
                        </x-table.td>
                        <x-table.td>{{ $row->date_of_risk_analysis }}</x-table.td>
                        <x-table.td>{{ $row->risk_inherent_likelihood }}</x-table.td>
                        <x-table.td>{{ $row->risk_inherent_impact }}</x-table.td>
                        {{-- <x-table.td style="background-color: {{ $row->appetite_color }};">{{ $row->risk_appetite_name }}</x-table.td> --}}
                        <x-table.td>{{ $row->risk_appetite_name }}</x-table.td>
                        <x-table.td>&nbsp;</x-table.td>
                        <x-table.td>{{ $row->risk_treatment_name }}</x-table.td>
                        <x-table.td>{{ $row->risk_treatment_description }}</x-table.td>
                        <x-table.td class="list">{!! $row->control_owner !!}</x-table.td>
                        <x-table.td class="list">{!! $row->status !!}</x-table.td>
                        <x-table.td>{{ $row->corrective_action_due_date }}</x-table.td>
                        <x-table.td>{{ $row->risk_finding_description }}</x-table.td>
                        <x-table.td>{{ $row->risk_likelihood }}</x-table.td>
                        <x-table.td>{{ $row->risk_impact }}</x-table.td>
                        <x-table.td>{{ $row->risk_appetite }}</x-table.td>
                        {{-- <x-table.td style="background-color: {{ $row->risk_appetite_color }};">{{ $row->risk_appetite }}</x-table.td> --}}
                        <x-table.td>
                            <div style="width: 250px;">{{ $row->preventive_action }}</div>
                        </x-table.td>
                        <x-table.td>{{ $row->last_evaluation_date }}</x-table.td>
                        <x-table.td>
                            <div style="width: 250px;">{{ $row->lesson_learned }}</div>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
