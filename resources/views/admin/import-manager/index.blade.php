@extends('admin.import-manager.app')
@section('title', 'Import Manager')
@section('title_ar', 'مدير الاستيراد')

@section('content')
    <div>

        <x-table.action-wrapper title="New Import">
            <x-action.button label="Manage Mappings" label_ar="إدارة الخرائط" route_name="imports.mappings.index" />
            {{-- <x-action.button label="View History" label_ar="عرض السجل" route_name="imports.history" /> --}}
        </x-table.action-wrapper>


        <div class="mt-8">
            <form id="import-form" action="{{ route('imports.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                    <x-form.grid-col-full>
                        <x-form.select label="Mapping Name" label_ar="اسم الخريطة" name="mapping_id" required="true"
                            placeholder="Enter Mapping Name" :data="$mappings" id_key="id" value_key="name"
                            hide_keys="true" />
                    </x-form.grid-col-full>
                    <x-form.grid-col-full>
                        <x-form.label label="Select File to Import" label_ar="حدد ملف للاستيراد" for="import-file" />
                        <x-file-upload id="import-file" name="file" accept="CSV or XLSX files" maxSize="100MB"
                            acceptTypes=".csv,.xlsx,.xls" required />
                        <x-form.error name="file" />
                    </x-form.grid-col-full>
                    <div class="flex justify-end">

                        <button type="submit" id="submit-btn" class="submit-btn">
                            <span id="submit-text">Upload and Process</span>
                            <span id="loading-spinner" class="hidden">
                                <svg class="animate-spin h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- <div id="upload-progress" class="mt-8 hidden">
            <div class="rounded-md bg-blue-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Processing Import</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <p id="progress-message">Your file is being processed. This may take a few minutes...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <script src="{{ asset('js/import-manager/index.js') }}"></script>
@endsection
