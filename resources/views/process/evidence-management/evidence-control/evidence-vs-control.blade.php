@extends('layouts.app-full')
@section('title', 'Evidence vs Controls')
@section('title_ar', 'الأدلة مقابل الضوابط')
@section('content')
    <div>


        <x-table.action-wrapper title="Evidence vs Controls">
            <x-slot:extra>
                <x-action.pdf-button :url="$pdfUrl" />
            </x-slot:extra>
            <x-action.button label="Control vs Evidence" label_ar="الضوابط مقابل الأدلة"
                route_name="control-vs-evidence.index" />
            <x-action.button label="Evidence vs Control" label_ar="الأدلة مقابل الضوابط"
                route_name="evidence-vs-control.index" disabled class="opacity-75" />
        </x-table.action-wrapper>


        <form action="{{ route('evidence-vs-control.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">

                <x-form.grid-4-col>
                    <div>
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="practice" :value="$bestPracticeId"
                            :data="$practices" id_key="best_practices_id" value_key="best_practices_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Main Domains" label_ar="المكون الأساسي" name="domain" :value="$domainId"
                            :data="$domains" id_key="main_domain_id" value_key="main_domain_name"
                            onchange="this.form.submit()" />
                    </div>
                    <div>
                        <x-form.select label="Sub Domains" label_ar="المكون الفرعي" name="subdomain" :value="$subDomainId"
                            :data="$subDomains" id_key="sub_domain_id" value_key="sub_domain_name"
                            onchange="this.form.submit()" />
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
                <x-table.th label="Artifacts" label_ar="المقتنيات" />
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
                        <x-table.td wrap="true">
                            <a href="{{ route('evidences.show', $row->id) }}">
                                {{ $row->evidence_name }}
                            </a>
                        </x-table.td>
                        <x-table.td wrap="true"> {!! $row->controls !!}</x-table.td>
                        <x-table.td> {!! $row->artifacts ?? '' !!}</x-table.td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No evidence with linked controls found.</td>
                    </tr>
                @endforelse
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
