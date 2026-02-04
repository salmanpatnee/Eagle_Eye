@extends('layouts.app-full')
@section('title', 'Evidence vs Controls')
@section('title_ar', 'الأدلة مقابل الضوابط')
@section('content')
    <div>


        <x-table.action-wrapper title="Evidence vs Controls">
            <x-slot:extra>
                <x-action.pdf-button route_name="evidence-vs-control.index" />
            </x-slot:extra>
            <x-action.button label="Evidence vs Controls" label_ar="الأدلة مقابل الضوابط"
                route_name="control-vs-evidence.index" />
            <x-action.button label="Evidence vs Control" label_ar="المخاطر مقابل الضوابط"
                route_name="evidence-vs-control.index" disabled class="opacity-75" />
        </x-table.action-wrapper>


        <form action="{{ route('evidence-vs-control.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">

                <x-form.grid-4-col>
                    <div>
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="practice" :value="$bestPracticeId"
                            :data="$practices" id_key="best_practice_id" value_key="best_practice_name"
                            onchange="loadDomains(this.value)" />
                    </div>
                    <div>
                        <x-form.select label="Main Domains" label_ar="المكون الأساسي" name="domain" :value="$domainId"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="loadSubDomains(this.value)" disabled />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains" label_ar="المكون الفرعي" name="subdomain" :value="$subDomainId"
                            :data="$subDomains" id_key="sub_domain_id" value_key="sub_domain_name"
                            onchange="this.form.submit()" disabled />
                    </div>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_id" :value="$controlId"
                            :custom_data="$controlIds" onchange="this.form.submit()" />
                    </div>
                </x-form.grid-4-col>
            </div>
        </form>



        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Evidence ID" label_ar="رمز الأدلة" />
                <x-table.th label="Evidence Name" label_ar="اسم الأدلة" />
                <x-table.th label="Controls" label_ar="الضوابط" />
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
        // Function to load domains based on selected best practice
        function loadDomains(bestPracticeId) {
            const domainSelect = document.querySelector('select[name="domain"]');
            const subDomainSelect = document.querySelector('select[name="subdomain"]');

            // Reset and disable domain and subdomain selects
            domainSelect.innerHTML = '<option value="">Select a domain</option>';
            subDomainSelect.innerHTML = '<option value="">Select the domain first</option>';
            domainSelect.disabled = true;
            subDomainSelect.disabled = true;

            // If no best practice is selected, submit the form to reset filters
            if (!bestPracticeId) {
                document.querySelector('form').submit();
                return;
            }

            // Enable loading state
            domainSelect.innerHTML = '<option value="">Loading...</option>';
            domainSelect.disabled = true;

            // Fetch domains via AJAX
            fetch(`/ajax/domains-by-best-practice/${bestPracticeId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate domains
                    domainSelect.innerHTML = '<option value="">Select a domain</option>';
                    data.forEach(domain => {
                        const option = document.createElement('option');
                        option.value = domain.main_domain_id;
                        option.textContent = domain.main_domain_name;
                        domainSelect.appendChild(option);
                    });

                    // Enable domain select
                    domainSelect.disabled = false;

                    // If a domain was previously selected and it's available in the new list, select it
                    @if($domainId)
                        domainSelect.value = "{{ $domainId }}";
                        // Load corresponding subdomains
                        loadSubDomains("{{ $domainId }}");
                    @endif
                })
                .catch(error => {
                    console.error('Error loading domains:', error);
                    domainSelect.innerHTML = '<option value="">Error loading domains</option>';
                    domainSelect.disabled = false;
                });
        }

        // Function to load subdomains based on selected domain
        function loadSubDomains(domainId) {
            const subDomainSelect = document.querySelector('select[name="subdomain"]');

            // Reset and disable subdomain select
            subDomainSelect.innerHTML = '<option value="">Select the domain first</option>';
            subDomainSelect.disabled = true;

            // If no domain is selected, keep subdomain disabled
            if (!domainId) {
                return;
            }

            // Enable loading state
            subDomainSelect.innerHTML = '<option value="">Loading...</option>';
            subDomainSelect.disabled = true;

            // Fetch subdomains via AJAX
            fetch(`/ajax/subdomains-by-domain/${domainId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate subdomains
                    subDomainSelect.innerHTML = '<option value="">Select a subdomain</option>';
                    data.forEach(subDomain => {
                        const option = document.createElement('option');
                        option.value = subDomain.sub_domain_id;
                        option.textContent = subDomain.sub_domain_name;
                        subDomainSelect.appendChild(option);
                    });

                    // Enable subdomain select
                    subDomainSelect.disabled = false;

                    // If a subdomain was previously selected and it's available in the new list, select it
                    @if($subDomainId)
                        subDomainSelect.value = "{{ $subDomainId }}";
                    @endif
                })
                .catch(error => {
                    console.error('Error loading subdomains:', error);
                    subDomainSelect.innerHTML = '<option value="">Error loading subdomains</option>';
                    subDomainSelect.disabled = false;
                });
        }

        // Initialize the cascading on page load if a best practice is already selected
        document.addEventListener('DOMContentLoaded', function() {
            const bestPracticeSelect = document.querySelector('select[name="practice"]');
            const domainSelect = document.querySelector('select[name="domain"]');
            const subDomainSelect = document.querySelector('select[name="subdomain"]');

            if (bestPracticeSelect && bestPracticeSelect.value) {
                // If a best practice is already selected, load its domains
                loadDomains(bestPracticeSelect.value);
            } else {
                // If no best practice is selected, show helpful placeholder and disable
                domainSelect.innerHTML = '<option value="">Select the best practice first</option>';
                domainSelect.disabled = true;
                subDomainSelect.innerHTML = '<option value="">Select the domain first</option>';
                subDomainSelect.disabled = true;
            }
        });
    </script>
@endsection
