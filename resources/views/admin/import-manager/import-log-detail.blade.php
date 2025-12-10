@extends('admin.import-manager.app')
@section('title', 'Import Job Details')
@section('title_ar', 'تفاصيل وظيفة الاستيراد')

@section('content')
    <x-table.action-wrapper title="Log Details" title_ar="تفاصيل وظيفة الاستيراد">
        <x-action.button label="Back to History" label_ar="العودة إلى السجل" route_name="imports.history" />
    </x-table.action-wrapper>

    <div class="space-y-6">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
               
                <div class=" border-gray-200">
                    <x-info-row>
                        <x-info-col label="File Name" label_ar="اسم الملف">
                            {{ $job->file_name }}
                        </x-info-col>
                        <x-info-col label="Import Mapping" label_ar="خريطة الاستيراد">
                            {{ $job->mapping->name ?? 'N/A' }}
                        </x-info-col>
                    </x-info-row>

                    <x-info-row>
                        <x-info-col label="Uploaded By" label_ar="تم الرفع بواسطة">
                            {{ $job->user->name ?? 'Unknown' }}
                        </x-info-col>
                        <x-info-col label="Status" label_ar="الحالة">
                            <x-status-badge :status="$job->status" />
                        </x-info-col>
                    </x-info-row>

                    <x-info-row>
                        <x-info-col label="Started At" label_ar="بدأ في">
                            {{ $job->started_at ? $job->started_at->format('M d, Y H:i A') : 'N/A' }}
                        </x-info-col>
                        <x-info-col label="Completed At" label_ar="اكتمل في">
                            {{ $job->completed_at ? $job->completed_at->format('M d, Y H:i A') : 'N/A' }}
                        </x-info-col>
                    </x-info-row>
                </div>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Statistics</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-5">
                    <div class="bg-gray-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-gray-500">Total Rows</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $job->total_rows }}</dd>
                    </div>
                    <div class="bg-blue-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-blue-800">Valid Rows</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-blue-900">{{ $job->valid_rows }}</dd>
                    </div>
                    <div class="bg-green-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-green-800">Inserted</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-green-900">{{ $job->inserted_rows }}</dd>
                    </div>
                    <div class="bg-yellow-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-yellow-800">Skipped</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-yellow-900">{{ $job->skipped_rows }}</dd>
                    </div>
                    <div class="bg-red-50 px-4 py-5 sm:p-6 rounded-lg">
                        <dt class="text-sm font-medium text-red-800">Errors</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-red-900">{{ $job->error_rows }}</dd>
                    </div>
                </div>
            </div>
        </div>

        @if($job->errors && count($job->errors) > 0)
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Error Details</h3>
                <div class="overflow-hidden bg-red-50 rounded-lg">
                    <div class="max-h-96 overflow-y-auto">
                        <x-table.table>
                            <x-table.thead>
                                <x-table.th label="Row" label_ar="صف" />
                                <x-table.th label="Error" label_ar="خطأ" />
                                <x-table.th label="Data" label_ar="بيانات" />
                            </x-table.thead>
                            <x-table.tbody>
                                @foreach($job->errors as $error)
                                <tr>
                                    <x-table.td>{{ $error['row'] ?? 'N/A' }}</x-table.td>
                                    <x-table.td>{{ $error['error'] ?? 'Unknown error' }}</x-table.td>
                                    <x-table.td>
                                        @if(isset($error['data']))
                                            {{ json_encode($error['data']) }}
                                        @else
                                            N/A
                                        @endif
                                    </x-table.td>
                                </tr>
                                @endforeach
                            </x-table.tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
