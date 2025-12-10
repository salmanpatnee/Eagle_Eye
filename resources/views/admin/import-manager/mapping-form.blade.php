@extends('admin.import-manager.app')
@section('title', 'Import Mapping')
@section('title_ar', 'رسم الخرائط الاستيراد')

@section('content')
<div>
    <x-table.action-wrapper title="{{ $mapping?->id ? 'Update' : 'New' }} Import Mapping">
        <x-action.button label="View" label_ar="منظر" route_name="imports.mappings.index" />
    </x-table.action-wrapper>

    <form action="{{ isset($mapping) ? route('imports.mappings.update', $mapping->id) : route('imports.mappings.store') }}" method="POST">
        @csrf
        @if (isset($mapping))
            @method('PUT')
        @endif

        <!-- Basic Information -->
        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Basic Information</h3>

            <x-form.grid-col>
                <div>
                    <x-form.field label="Mapping Name" label_ar="اسم الخريطة" name="name" required="true"
                        placeholder="e.g., Risk to Control Mapping" :value="$mapping?->name" />
                </div>
                <div>
                    <x-form.field label="Description" label_ar="وصف" name="description"
                        placeholder="Optional description" :value="$mapping?->description" />
                </div>
            </x-form.grid-col>
        </div>

        <!-- Pivot Table Configuration -->
        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Pivot Table Configuration</h3>

            <x-form.grid-col>
                <div>
                    <x-form.select label="Pivot Table Name" name="pivot_table_name"
                        placeholder="Select pivot table" :value="$mapping?->pivot_table_name"
                        :custom_data="$tables" required="true" />
                    <p class="mt-2 text-sm text-gray-500">The many-to-many pivot/junction table where relationships will be stored.</p>
                </div>
                <div></div>
            </x-form.grid-col>
        </div>

        <!-- Left Entity Configuration -->
        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Left Entity (First Column in Spreadsheet)</h3>

            <x-form.grid-col>
                <div>
                    <x-form.select label="Entity Table" name="left_entity_table"
                        placeholder="Select table" :value="$mapping?->left_entity_table"
                        :custom_data="$tables" required="true" />
                </div>
                <div>
                    <x-form.field label="ID Column" name="left_entity_column" required="true"
                        placeholder="e.g., risk_id" :value="$mapping?->left_entity_column" />
                </div>
            </x-form.grid-col>

            <x-form.grid-col>
                <div>
                    <x-form.field label="Display Label" name="left_entity_label" required="true"
                        placeholder="e.g., Risk" :value="$mapping?->left_entity_label" />
                </div>
                <div></div>
            </x-form.grid-col>
        </div>

        <!-- Right Entity Configuration -->
        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
            <h3 class="text-base font-semibold leading-6 text-gray-900">Right Entity (Second Column in Spreadsheet)</h3>

            <x-form.grid-col>
                <div>
                    <x-form.select label="Entity Table" name="right_entity_table"
                        placeholder="Select table" :value="$mapping?->right_entity_table"
                        :custom_data="$tables" required="true" />
                </div>
                <div>
                    <x-form.field label="ID Column" name="right_entity_column" required="true"
                        placeholder="e.g., control_id" :value="$mapping?->right_entity_column" />
                </div>
            </x-form.grid-col>

            <x-form.grid-col>
                <div>
                    <x-form.field label="Display Label" name="right_entity_label" required="true"
                        placeholder="e.g., Control" :value="$mapping?->right_entity_label" />
                </div>
                <div></div>
            </x-form.grid-col>
        </div>

        <!-- Status and Submit -->
        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
            {{-- <x-form.grid-col>
                <div>
                    <label class="flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $mapping?->is_active ?? true) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <span class="ml-3 text-sm font-medium text-gray-900">Active</span>
                    </label>
                    <p class="mt-2 text-sm text-gray-500">Only active mappings will be available for imports.</p>
                </div>
                <div></div>
            </x-form.grid-col> --}}

            <div class="flex justify-end">
                <x-form.submit label="Import Mapping" :isUpdate="$mapping?->id" />
            </div>
        </div>

        <!-- Help Section -->
        {{-- <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 m-5">
            <h4 class="text-sm font-semibold text-blue-900 mb-2">How to configure a mapping:</h4>
            <ul class="text-sm text-blue-800 space-y-1 list-disc list-inside">
                <li>Choose the <strong>pivot table</strong> where relationships will be stored</li>
                <li>For the <strong>left entity</strong>: select the table and column that matches the first column in your spreadsheet</li>
                <li>For the <strong>right entity</strong>: select the table and column that matches the second column in your spreadsheet</li>
                <li>Your spreadsheet should have two columns with entity IDs (e.g., risk_id, control_id)</li>
            </ul>
        </div> --}}
    </form>
</div>
@endsection
