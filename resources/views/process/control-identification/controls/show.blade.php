@extends(getLayoutByRole())
@section('title', 'Control Definition')

@section('content')
    <div>
        <x-table.action-wrapper title="Control Details">
            @if(hasRole(1))
                <x-action.button label="View" route_name="controls.index" />
                <x-action.button label="Edit" route_name="controls.edit" route_param="{{ $control->id }}" />
            @else
                <x-action.button label="Back" onclick="window.history.back()" />
            @endif
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Control ID">
                    {{ $control->control_id }}
                </x-info-col>

            </x-info-row>
            <x-info-row>
                <x-info-col label="Control Name">
                    {{ $control->control_name }}
                </x-info-col>
                <x-info-col label="Control Name Arabic">
                    {{ $control->control_name_ar }}
                </x-info-col>

            </x-info-row>
            <x-info-col-lg label="Control Description">
                {{ $control->control_description ?? '—' }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Description Arabic">
                {{ $control->control_description_ar ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Classification Name">
                    {{ $control->classification_id }}
                </x-info-col>
                <x-info-col label="Control Owner Name">
                    {{ $control->owner?->owner_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Level">
                    {{ $control->control_level_title }}
                </x-info-col>
                <x-info-col label="Main Control">
                    {{ $control->control_parent }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Type">
                    {{ $control->type->control_type_name }}
                </x-info-col>
                <x-info-col label="Control Nature">
                    {{ $control->control_nature }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Criticality">
                    {{ $control->control_criticality }}
                </x-info-col>
                <x-info-col label="ISO Related Control">
                    {{ $control->control_iso_name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Reference">
                    {{ $control->control_reference }}
                </x-info-col>
                <x-info-col label="Is Dependent">
                    {{ $control->is_parent_control == '0' ? 'No' : 'Yes' }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Implementation Mandatories">
                {{ $control->implementation_mandatories }}
            </x-info-col-lg>

            <x-info-col-lg label="Maturity Level Required">
                {{ $control->maturity_level }}
            </x-info-col-lg>

            <x-info-col-lg label="Implementation Guidelines">
                {{ $control->implementation_guidelines }}
            </x-info-col-lg>

            <x-info-col-lg label="Control Dependency">
                {{ $control->control_dependency }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Categories">
                    <x-list :data="$control->categories" id_key="" value_key="category_name" />
                </x-info-col>
                <x-info-col label="Best Practice">
                    <x-list :data="$control->bestPractices" id_key="" value_key="best_practice_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Custodian Name">
                    <x-list :data="$control->custodians" id_key="" value_key="custodian_role_title" />
                </x-info-col>
                <x-info-col label="Domain">
                    <x-list :data="$control->domains" id_key="" value_key="main_domain_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Sub Domain">
                    <x-list :data="$control->subDomains" id_key="" value_key="sub_domain_name" />
                </x-info-col>
                <x-info-col label="Risk">
                    <x-list :data="$control->risks" id_key="" value_key="risk_name" />
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Critical Assets?">
                    {{ $control->control_critical_asset }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Cloud?">
                    {{ $control->control_cloud }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Telework?">
                    {{ $control->control_telework }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Social Media?">
                    {{ $control->control_social_media }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Data Privacy?">
                    {{ $control->control_data_privicy }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to PII?">
                    {{ $control->control_pii }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to PCI/DSS?">
                    {{ $control->control_pci_dss }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to E-Commerce?">
                    {{ $control->control_e_commerce }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Infrastructure?">
                    {{ $control->control_infrastructure }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Application?">
                    {{ $control->control_application }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to HR?">
                    {{ $control->control_hr }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Physical Security?">
                    {{ $control->control_physical_security }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Third Party?">
                    {{ $control->control_third_party }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to Operational Technology?">
                    {{ $control->control_operational }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Control Exclusively Related to Payments?">
                    {{ $control->control_payment }}
                </x-info-col>
                <x-info-col label="Control Exclusively Related to E-Banking?">
                    {{ $control->control_e_banking }}
                </x-info-col>
            </x-info-row>
        </div>
    @endsection
