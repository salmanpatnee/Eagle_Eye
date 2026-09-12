@extends('layouts.app-full')
@section('title', 'Control vs Evidence')
@section('title_ar', 'الضوابط مقابل الأدلة')
@section('content')
    <div>
        <x-table.action-wrapper title="Control vs Evidence">

            <x-slot:extra>
                <x-action.pdf-button :url="$pdfUrl" />
            </x-slot:extra>

            <x-action.button label="Control vs Evidence" label_ar="الضوابط مقابل الأدلة" route_name="control-vs-evidence.index"
                disabled class="opacity-75" />
            <x-action.button label="Evidence vs Control" label_ar="الأدلة مقابل الضوابط"
                route_name="evidence-vs-control.index" />

        </x-table.action-wrapper>

        <form action="{{ route('control-vs-evidence.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">

                <x-form.grid-5-col>
                    <div>
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="practice" :value="$bestPracticeId"
                            :data="$practices" id_key="best_practices_id" value_key="best_practices_name"
                            onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Main Domains" label_ar="المكون الأساسي" name="domain" :value="$domainId"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains" label_ar="المكون الفرعي" name="subdomain" :value="$subDomainId"
                            :data="$subDomains" id_key="sub_domain_id" value_key="sub_domain_name"
                            onchange="this.form.submit()" searchable />
                    </div>
                    <div>
                        <x-form.select label="Controls" label_ar="الضوابط" name="control_id" :value="$controlId"
                            :data="$controlIds" id_key="control_id" value_key="control_name" onchange="this.form.submit()"
                            searchable />
                    </div>
                    <div>
                        <x-form.select label="Last Updated" label_ar="آخر تحديث للدليل" name="last_updated"
                            :value="$lastUpdated" :data="$ageOptions" id_key="key" value_key="label" hide_keys
                            onchange="this.form.submit()" />
                    </div>
                </x-form.grid-5-col>
            </div>
        </form>



        <x-table.scroll-table height-offset="280">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                <x-table.th label="Evidences" label_ar="الأدلة" />
                <x-table.th label="Artifacts" label_ar="المقتنيات" />
            </x-slot:head>
            <x-slot:body>
                @forelse ($controlEvidence as $row)
                    <tr>
                        <x-table.td><x-table.serial :loop="$loop" :paginator="$controlEvidence" /></x-table.td>
                        <x-table.td>
                            <a href="{{ route('controls.show', $row->id) }}">{{ $row->control_id }}</a>
                        </x-table.td>
                        <x-table.td min-width="250px" max-width="400px">{{ $row->control_name }}</x-table.td>
                        <x-table.td min-width="220px">
                            @forelse (array_filter(explode('||', $row->evidences_raw ?? '')) as $evidenceItem)
                                @php
                                    [$evidenceRowId, $evidenceName, $evidenceUpdatedAt] = array_pad(explode('::', $evidenceItem, 3), 3, null);
                                @endphp
                                <div class="mb-2 last:mb-0">
                                    <a href="{{ route('evidences.show', $evidenceRowId) }}">{{ $evidenceName }}</a>
                                    <div class="text-xs text-gray-400 dark:text-gray-500">
                                        {{ $evidenceUpdatedAt ? 'Updated '.\Carbon\Carbon::parse($evidenceUpdatedAt)->diffForHumans() : 'Last updated: Unknown' }}
                                    </div>
                                </div>
                            @empty
                                —
                            @endforelse
                        </x-table.td>
                        <x-table.td min-width="200px">{!! $row->artifacts !!}</x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">No controls with linked evidence found.</td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table.scroll-table>

        <x-pagination>
            {{ $controlEvidence->links() }}
        </x-pagination>
    </div>
@endsection
