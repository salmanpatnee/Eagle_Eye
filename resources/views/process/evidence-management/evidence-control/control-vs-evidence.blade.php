@extends('layouts.app-full')
@section('title', 'Evidence Management')
{{-- @section('title_ar', 'الضوابط مقابل الأدلة') --}}
@section('content')
    <div>
        <x-table.action-wrapper title="Control vs Evidence">

            <x-slot:extra>
                <div></div>
                {{-- <x-action.pdf-button route_name="control-vs-evidence.index" /> --}}
            </x-slot:extra>

            <x-action.button label="Control vs Evidence" route_name="control-vs-evidence.index" disabled class="opacity-75" />
            <x-action.button label="Evidence vs Control" route_name="evidence-vs-control.index" />

        </x-table.action-wrapper>

        <form action="{{ route('control-vs-evidence.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">

                <x-form.grid-3-col>
                    <div>
                        <x-form.select label="Best Practices"  name="practice" :value="$bestPracticeId"
                            :data="$practices" id_key="best_practice_id" value_key="best_practice_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Main Domains"  name="domain" :value="$domainId"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="this.form.submit()" disabled />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains"  name="subdomain" :value="$subDomainId"
                            :data="$subDomains" id_key="sub_domain_id" value_key="sub_domain_name"
                            onchange="this.form.submit()" disabled />
                    </div>
                    {{-- <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_id" :value="$controlId"
                            :custom_data="$controlIds" onchange="this.form.submit()" />
                    </div> --}}
                </x-form.grid-3-col>
            </div>
        </form>



        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No"  />
                <x-table.th label="Control ID" />
                <x-table.th label="Control Name" />
                <x-table.th label="Evidences" />
                <x-table.th label="Artifacts" />
            </x-table.thead>
            <x-table.tbody>
                @forelse ($controlEvidence as $row)
                    <tr>
                        <x-table.td>{{ $loop->index + 1 }}</x-table.td>
                        <x-table.td>
                            <a href="{{ route('controls.show', $row->id) }}">
                                {{ $row->control_id }}
                            </a>
                        </x-table.td>
                        <x-table.td> {{ $row->control_name }}</x-table.td>
                        <x-table.td> {!! $row->evidences !!}</x-table.td>
                        <x-table.td> {!! $row->artifacts !!}</x-table.td>

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
