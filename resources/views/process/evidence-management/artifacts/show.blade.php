@extends(getLayoutByRole(null, $superAdminLayout = 'layouts.user'))
@section('title', 'Artifact Management')
{{-- @section('title_ar', 'إدارة المقتنيات') --}}
@section('content')
    <div>
        <x-table.action-wrapper title="Artifact Details">
            @if (hasRole(1))
                <x-action.button label="View" route_name="artifacts.index" />
                <x-action.button label="Edit" route_name="artifacts.edit" route_param="{{ $artifact->id }}" />
            @else
                <x-action.button label="Back" onclick="window.history.back()" />
            @endif
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Artifact ID">
                    {{ $artifact->artifact_id }}
                </x-info-col>
                <x-info-col label="Artifact Name">
                    {{ $artifact->artifact_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Artifact Description">
                {{ $artifact->artifact_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Creation Date">
                    {{ $artifact->artifact_creation_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification">
                    {{ $artifact->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Category">
                    {{ $artifact->category?->category_name ?? '—' }}
                </x-info-col>
                <x-info-col label="System Name">
                    {{ $artifact->artifact_system_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Critical Assets?">
                    {{ $artifact->artifact_critical_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Cloud?">
                    {{ $artifact->artifact_cloud ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Telework?">
                    {{ $artifact->artifact_telework ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Social Media?">
                    {{ $artifact->artifact_social_media ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Data Privacy?">
                    {{ $artifact->artifact_data_privacy ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to PII?">
                    {{ $artifact->artifact_pii ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to PCI/DSS?">
                    {{ $artifact->artifact_pci_dss ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to E-Commerce?">
                    {{ $artifact->artifact_e_commerce ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Infrastructure?">
                    {{ $artifact->artifact_e_commerce ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Application?">
                    {{ $artifact->artifact_application ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to HR?">
                    {{ $artifact->artifact_hr ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Physical Security?">
                    {{ $artifact->artifact_physical_asset ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Third Party?">
                    {{ $artifact->artifact_third_party ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Operational Technology?">
                    {{ $artifact->artifact_opertaional_tech ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to E-Banking?">
                    {{ $artifact->artifact_payment ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Payments?">
                    {{ $artifact->artifact_e_banking ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" />
                    <x-table.th label="Attachment Name" />
                    <x-table.th label="Action" />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($artifact->attachments as $attachment)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>{{ $attachment->name }}</x-table.td>

                            <x-table.td action_col="true" class="whitespace-normal">

                                <a href="{{ asset('storage/' . $attachment->path) }}" download
                                    class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                    <x-icons.view />
                                </a>
                                @if (hasRole(1))
                                    <x-action.delete route_name="artifacts.attachments.destroy"
                                        param="{{ $attachment->id }}" />
                                @endif
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection
