@extends(getLayoutByRole(null, $superAdminLayout = 'layouts.user'))
@section('title', 'Evidence Management')
@section('title_ar', 'إدارة الأدلة')
@section('content')
    <div>
        <x-table.action-wrapper title="Evidence Details">
            @if (hasRole(1))
                <x-action.button label="View" route_name="evidences.index" />
                <x-action.button label="Edit" route_name="evidences.edit" route_param="{{ $evidence->id }}" />
            @else
                <x-action.button label="Back" onclick="window.history.back()" />
            @endif
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Evidence ID">
                    {{ $evidence->evidence_id }}
                </x-info-col>
                <x-info-col label="Evidence Name">
                    {{ $evidence->evidence_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Evidence Description">
                {{ $evidence->evidence_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Name">
                    {{ $evidence->classification->classification_name ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Nature">
                    {{ $evidence->evidence_nature ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Type">
                    {{ $evidence->evidence_type ?? '—' }}
                </x-info-col>
                <x-info-col label="Owner Name">
                    {{ $evidence->owner->owner_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Evidence Source">
                {{ $evidence->evidence_source ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Controls">
                    <x-list :data="$evidence->controls" id_key="control_id" value_key="control_name" />
                </x-info-col>
                <x-info-col label="Artifacts">
                    <x-list :data="$evidence->artifacts" id_key="artifact_id" value_key="artifact_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Categories">
                    <x-list :data="$evidence->categories" id_key="category_id" value_key="category_name" />
                </x-info-col>

            </x-info-row>


            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Critical Assets?">
                    {{ $evidence->evidence_critical_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Cloud?">
                    {{ $evidence->evidence_cloud ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Telework?">
                    {{ $evidence->evidence_telework ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Social Media?">
                    {{ $evidence->Evidence_social_media ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Data Privacy?">
                    {{ $evidence->Evidence_data_privacy ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to PII?">
                    {{ $evidence->evidence_pii ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to PCI/DSS?">
                    {{ $evidence->evidence_pci_dss ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to E-Commerce?">
                    {{ $evidence->Evidence_e_commerce ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Infrastructure?">
                    {{ $evidence->Evidence_infrastructure ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Application?">
                    {{ $evidence->Evidence_application ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to HR?">
                    {{ $evidence->Evidence_hr ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Physical Security?">
                    {{ $evidence->physical_security ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to Third Party?">
                    {{ $evidence->third_party ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Operational Technology?">
                    {{ $evidence->operational_technology ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Evidence Exclusively Related to E-Banking?">
                    {{ $evidence->payment ?? '—' }}
                </x-info-col>
                <x-info-col label="Evidence Exclusively Related to Payments?">
                    {{ $evidence->e_banking ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>

    </div>
@endsection
