@extends('layouts.app-full')
@section('title', 'Evidence Management')
{{-- @section('title_ar', 'الأدلة مقابل الضوابط') --}}
@section('content')
    <div>


        <x-table.action-wrapper title="Evidence vs Controls">
            <x-slot:extra>
                <div></div>
                {{-- <x-action.pdf-button route_name="evidence-vs-control.index" /> --}}
            </x-slot:extra>
            <x-action.button label="Control vs Evidences" 
                route_name="control-vs-evidence.index" />
            <x-action.button label="Evidence vs Controls" 
                route_name="evidence-vs-control.index" disabled class="opacity-75" />
        </x-table.action-wrapper>


        <form action="{{ route('evidence-vs-control.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">

                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Best Practices"  name="practice" :value="$bestPracticeId"
                            :data="$practices" id_key="best_practice_id" value_key="best_practice_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Main Domains" name="domain" :value="$domainId"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="this.form.submit()" disabled />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains" name="subdomain" :value="$subDomainId"
                            :data="$subDomains" id_key="sub_domain_id" value_key="sub_domain_name"
                            onchange="this.form.submit()" disabled />
                    </div>
                    {{-- <div>
                        <x-form.select label="Controls" name="control_id" :value="$controlId"
                            :custom_data="$controlIds" onchange="this.form.submit()" />
                    </div> --}}
                </x-form.grid-3-col>
            </div>
        </form>



        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No"  />
                <x-table.th label="Evidence ID" />
                <x-table.th label="Evidence Name" />
                <x-table.th label="Controls" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($evidenceControl as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('evidences.show', $row->id) }}">
                                {{ $row->evidence_id }}
                            </a>
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('evidences.show', $row->id) }}">
                                {{ $row->evidence_name }}
                            </a>
                        </x-table.td>
                        <x-table.td> {!! $row->controls !!}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bestPracticeSelect = document.querySelector('select[name="practice"]');
            const domainSelect = document.querySelector('select[name="domain"]');
            const subDomainSelect = document.querySelector('select[name="subdomain"]');

            if (bestPracticeSelect && bestPracticeSelect.value) {
                // Best practice is selected, enable domain
                domainSelect.disabled = false;

                if (domainSelect.value) {
                    // Domain is selected, enable subdomain
                    subDomainSelect.disabled = false;
                } else {
                    // No domain selected, show helpful placeholder
                    subDomainSelect.innerHTML = '<option value="">Select the domain first</option>';
                    subDomainSelect.disabled = true;
                }
            } else {
                // No best practice selected, show helpful placeholders
                domainSelect.innerHTML = '<option value="">Select the best practice first</option>';
                domainSelect.disabled = true;
                subDomainSelect.innerHTML = '<option value="">Select the domain first</option>';
                subDomainSelect.disabled = true;
            }
        });
    </script>
@endsection
